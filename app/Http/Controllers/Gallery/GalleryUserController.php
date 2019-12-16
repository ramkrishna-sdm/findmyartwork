<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\CategoryRepository;
use App\Repository\VariantRepository;
use App\Repository\UserRepository;
use Exeception;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Style;
use App\Subject;
use Exception;
use Session;
use Mail;
use DB;
use Hash;
use Cookie;
use Segment;
use Validator;
use DateTime;

class GalleryUserController extends Controller
{
    private $users_files;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request,UserRepository $userRepository,CategoryRepository $categoryRepository,VariantRepository $variantRepository)
    {
        $this->middleware('auth');

        $this->request = $request;

        $this->users_files = '/images/users_files/';

        $this->userRepository = $userRepository;

        $this->categoryRepository = $categoryRepository;

        $this->variantRepository = $variantRepository;
    }

    public function index(){
        $categories = $this->categoryRepository->getData([],'get',['artwork'],0);

        $styles= Style::get();
    
        $subjects= Subject::get();
    	return view('gallery.gallery_dashboard',compact('categories','styles','subjects'));
    }

    //Profile
    public function profile($id){
        
        $gallery = $this->userRepository->getData(['id'=>$id],'first',[],0);
        
        return view('gallery.profile', compact('gallery'));
    }

    public function update_buyer()
    {
        $validation = Validator::make($this->request->all(), [
            // $validate = $this->validate($this->request, [
                'email'         => trim('required|string|email|max:255|unique:users,email,'.$this->request->id),
                'user_name'         => trim('required|string|max:255|unique:users,user_name,'.$this->request->id),
                'first_name'         => trim('required|string'),
                'last_name'         => trim('required|string'),
                'address'         => trim('required|string'),
                'postal_code'         => trim('required|string'),
                'city'         => trim('required|string'),
                'country'         => trim('required|string'),
            ]);
    
            // $validator = Validator::make($this->request->all() , $rules);
    
           if ($validation->fails()) {
                    throw new ValidationException($validation);
            }
        $gallery_array = [];
        $gallery_array['first_name'] = $this->request->first_name;
        $gallery_array['last_name'] = $this->request->last_name;
        $gallery_array['email'] = $this->request->email;
        $gallery_array['address'] = $this->request->address;
        $gallery_array['postal_code'] = $this->request->postal_code;
        $gallery_array['city'] = $this->request->city;
        $gallery_array['user_name'] = $this->request->user_name;
        $gallery_array['country'] = $this->request->country;
        $gallery_array['biography']=$this->request->biography;
        if($this->request->hasFile('media_url')){
            $media_url = $this->request->file('media_url');
            $parts = pathinfo($media_url->getClientOriginalName());
            $extension = strtolower($parts['extension']);
            $imageName = uniqid() . mt_rand(999, 9999) . '.' . $extension;
            $imageName = uniqid() . mt_rand(999, 9999) . '.' . $extension;
            $media_url->move(public_path() . $this->users_files, $imageName);  
            $image_name = url($this->users_files . $imageName);
            $gallery_array['media_url'] = $image_name;

        }
      
        $gallery = $this->userRepository->createUpdateData(['id'=> $this->request->id],$gallery_array);
        if($gallery){
            \Session::flash('success_message', 'Gallery Details Updated Succssfully.'); 
            return redirect('/gallery/profile/'.$gallery->id);
        }else{
            \Session::flash('error_message', 'Something went wrong.');
            return back()->withInput();
        }
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
