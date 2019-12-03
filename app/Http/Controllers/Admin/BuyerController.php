<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\UserRepository;
use Validator;
use Exception;
use Session;
use Mail;
use DB;
use Hash;
use Cookie;
use Segment;
use DateTime;

class BuyerController extends Controller
{
    /**
    * Construction function
    * @param $request(Array), $userRepository
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function __construct(Request $request, UserRepository $userRepository)
    {
        $this->request = $request;
        $this->userRepository = $userRepository;
    }

    /**
    * Function to buyers listing page
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function index()
    {
    	$buyers = $this->userRepository->getData(['role'=>'buyer'],'get',[],0);
        return view('backend/buyers', compact('buyers'));
    }

    /**
    * Function to add buyers page
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function add_buyer()
    {
    	return view('backend/add_buyer');
    }

    /**
    * Function to edit buyers page
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function edit_buyer($id)
    {
    	$buyer = $this->userRepository->getData(['id'=>$id],'first',[],0);
    	return view('backend/edit_buyer', compact('buyer'));
    }

    /**
    * Function to delete buyers
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function delete_buyer($id)
    {
    	$buyer = $this->userRepository->getData(['id'=>$id],'delete',[],0);
    	\Session::flash('success_message', 'Buyer Deleted Succssfully!.'); 
            return redirect('/admin/buyer');
    }

    /**
    * Function to change buyers status
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function change_buyer_status($id, $status)
    {
    	if($status == 'yes'){
    		$data['is_active'] = 'no';
    	}else{
    		$data['is_active'] = 'yes';
    	}
    	$buyer = $this->userRepository->createUpdateData(['id'=> $id],$data);
    	\Session::flash('success_message', 'Buyer Status Changed Succssfully!.'); 
        return redirect('/admin/buyer');
    }

    /**
    * Function to create/update buyer
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At:  
    */

    public function update_buyer()
    {
        $validate = $this->validate($this->request, [
            'email'         => trim('required|string|email|max:255|unique:gallery_users,email,'.$this->request->id),
            'first_name'         => 'required|string',
            'last_name'         => 'required|string',
            'user_type'         => 'required|string'
        ]);
        $buyer = $this->userRepository->createUpdateData(['id'=> $this->request->id],$this->request->all());
        if($buyer){
            \Session::flash('success_message', 'Buyer Details Updated Succssfully.'); 
            return redirect('/admin/buyer');
        }else{
            \Session::flash('error_message', 'Something went wrong.');
            return back()->withInput();
        }
    }


}
