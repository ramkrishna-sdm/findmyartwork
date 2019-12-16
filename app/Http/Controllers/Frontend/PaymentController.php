<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use Illuminate\Support\Facades\Auth;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
use Exception;
use App\Repository\ArtworkRepository;
use App\Repository\OrderRepository;
use App\Repository\UserRepository;

class PaymentController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ArtworkRepository $artworkRepository, OrderRepository $orderRepository, UserRepository $userRepository)
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
        $this->artworkRepository = $artworkRepository;
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        return view('paywithpaypal');
    }
    public function payWithpaypal(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all()); die;
        Session::put('artwork_id', $request->artwork_arr);
        $artwork_name = "";
        $price = 0;
        if(count($request->artwork_arr) > 0){
            foreach($request->artwork_arr as $key => $artwork_id){
                $artwork = $this->artworkRepository->getData(['id'=> $artwork_id],'first',['variants'],0);
                if($key == 0){
                    $artwork_name .= Auth::user()->id.'_'.$artwork->title;
                }else{
                    $artwork_name .= ','.$artwork->title;
                }
                $price = $price + $artwork->variants[0]->price + $artwork->variants[0]->worldwide_shipping_charge;
            }
        }
        $description = time().'_'.$artwork_name;
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName($artwork_name) /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($price); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($price);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($description);
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
            ->setCancelUrl(URL::to('status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::to('cart');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('cart');
            }
        }
        
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('cart');
    }
    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        // dd($payment_id);
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error', 'Payment failed');
            return Redirect::to('cart');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        // echo "<pre>";
        // print_r($payment); die("BKL");
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
            $artwork_id = Session::get('artwork_id');
            $artwork_info = "";
            if(count($artwork_id) > 0){
                foreach ($artwork_id as $key => $artwork) {
                    $order = [];
                    $artwork_result = $this->artworkRepository->getData(['id'=> $artwork],'first',['artwork_images', 'variants', 'artist', 'category_detail', 'sub_category_detail','style_detail', 'subject_detail'],0);
                    $order['artwork_info'] = json_encode($artwork_result);
                    

                    $order['user_id'] = Auth::user()->id;
                    $order['artwork_id'] = $artwork;
                    $order['payment_id'] = $result->getId();
                    $order['status'] = $result->getState();
                    $order['paypal_response'] = $result;
                    $user_info = $this->userRepository->getData(['id'=> Auth::user()->id],'first',[],0);
                    $order['delivery_address'] = $user_info->address.', '.$user_info->city.', '.$user_info->state.', '.$user_info->country.', '.$user_info->postal_code;
                    $order_info = $this->orderRepository->createUpdateData(['id'=> 0],$order);
                }
            }

            /* Save order in database */
            \Session::put('success', 'Payment success');
            return Redirect::to('cart');
        }
        \Session::put('error', 'Payment failed');
        return Redirect::to('cart');
    }
}