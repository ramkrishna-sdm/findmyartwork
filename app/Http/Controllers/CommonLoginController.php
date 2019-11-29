<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Session;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class CommonLoginController extends Controller
{
    public function login(){

    	if(!Auth::check()){
    		return redirect()->to('/');
    	}else{
    		
        $user_role = Auth::user()->role;

	        if($user_role == "admin"){
	         	return redirect()->to('/home');
	        }
	        elseif($user_role == "buyer"){
	         	return redirect()->to('/buyer/dashboard');
	        } 
	        elseif($user_role == "artist"){
	         	return redirect()->to('/artist/dashboard');
	        } 
	        elseif($user_role == "gallery"){
	         	return redirect()->to('/gallery/dashboard');
	        }else{
	        	return redirect()->back()->with('message', 'Information not appropriate');
	        }
    	}  
    }

    public function submitLogin(Request $request){
	    
	    $rules = array(
				'email' => 'required|min:6',
				'password' => 'required|min:6',
			);

		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()){
	  		return redirect()->back()->withErrors($validator);   
		}else{
	  
		   $userdata = array(
	        'email' => Input::get('email'),
	        'password' => Input::get('password'),
	        );
	            if(Auth::attempt($userdata)){		
								$user_role = Auth::user()->role;
		                
	              if($user_role == "admin"){
	                	return redirect()->to('/home'); 
	              }
		                 
	              if($user_role == "buyer"){
	                	return redirect()->to('/buyer/dashboard'); 
	              }
		                 
	              if($user_role == "artist"){
	                	return redirect()->to('/artist/dashboard'); 
	              }
		                 
	              if($user_role == "gallery"){
	                	return redirect()->to('/gallery/dashboard'); 
	              }
		                 
		        }else{
	              return redirect()->back()->with('error', 'User with these credentials is not found!');
	            }
	    }       
                                                                             
    }

    public function logout(){
         Auth::logout();
         Session::flush();
         return redirect()->to('/')->with('message', 'You are Successfully Logged Out');
    }           

}
