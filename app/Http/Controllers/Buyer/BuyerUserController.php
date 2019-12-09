<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\CategoryRepository;
use App\Repository\VariantRepository;
use App\Repository\UserRepository;
use App\Style;
use App\Subject;
use Exception;
use Session;
use Mail;
use DB;
use Hash;
use Cookie;
use Segment;
use DateTime;

class BuyerUserController extends Controller
{
    private $users_files;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository,Request $request,CategoryRepository $categoryRepository,VariantRepository $variantRepository)
    {
        $this->middleware('auth');

        $this->request = $request;

        $this->users_files = '/images/users_files/';

        $this->categoryRepository = $categoryRepository;

        $this->variantRepository = $variantRepository;

        $this->userRepository = $userRepository;
    }

    public function index(){
        $categories = $this->categoryRepository->getData([],'get',['artwork'],0);

        $styles= Style::get();

        $subjects= Subject::get();
    
    	return view('buyer.buyer_dashboard',compact('categories','styles','subjects'));
    }

    public function getSubCategories(){
        
        $categories = $this->categoryRepository->getData(['id'=>$this->request->id],'first',['artwork','subcategories','artwork.artist','artwork.variants'],0);
      
        if($this->request->price){
           
        }

        if($this->request->height){
            
        }

        if($this->request->width){
            
        }
        
        $returnHTML = view('buyer.sub_categories',compact('categories'))->render();// or method that you prefere to return data + RENDER is the key here
                      return response()->json(array('status' => '200', 'html'=>$returnHTML));
    }

    public function profile($id){
        $buyer = $this->userRepository->getData(['id'=>$id],'first',[],0);
    	return view('buyer.profile', compact('buyer'));
    }

    public function update_buyer()
    {
        $validate = $this->validate($this->request, [
            'email'         => trim('required|string|email|max:255|unique:users,email,'.$this->request->id),
            'first_name'         => 'required|string',
            'last_name'         => 'required|string',
        ]);
        $buyer_array = [];
        $buyer_array['first_name'] = $this->request->first_name;
        $buyer_array['last_name'] = $this->request->last_name;
        $buyer_array['email'] = $this->request->email;
        $buyer_array['address'] = $this->request->address;
        $buyer_array['postal_code'] = $this->request->postal_code;
        $buyer_array['city'] = $this->request->city;
        $buyer_array['user_name'] = $this->request->user_name;
        $buyer_array['country'] = $this->request->country;
        if($this->request->hasFile('media_url')){
            $media_url = $this->request->file('media_url');
            $parts = pathinfo($media_url->getClientOriginalName());
            $extension = strtolower($parts['extension']);
            $imageName = uniqid() . mt_rand(999, 9999) . '.' . $extension;
            $imageName = uniqid() . mt_rand(999, 9999) . '.' . $extension;
            $media_url->move(public_path() . $this->users_files, $imageName);  
            $image_name = url($this->users_files . $imageName);
            $buyer_array['media_url'] = $image_name;

        }
      
        $buyer = $this->userRepository->createUpdateData(['id'=> $this->request->id],$buyer_array);
        if($buyer){
            \Session::flash('success_message', 'Buyer Details Updated Succssfully.'); 
            return redirect('/buyer/profile/'.$buyer->id);
        }else{
            \Session::flash('error_message', 'Something went wrong.');
            return back()->withInput();
        }
    }


}
