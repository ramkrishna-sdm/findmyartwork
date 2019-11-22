<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\GalleryUserRepository;
use Validator;
use Exception;
use Session;
use Mail;
use DB;
use Hash;
use Cookie;
use Segment;
use DateTime;

class GalleryUserController extends Controller
{
    /**
    * Construction function
    * @param $request(Array), $galleryUserRepository
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function __construct(Request $request, GalleryUserRepository $galleryUserRepository)
    {
        $this->request = $request;
        $this->galleryUserRepository = $galleryUserRepository;
    }

    /**
    * Function to galleries listing page
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function index()
    {
    	$galleries = $this->galleryUserRepository->getData(['user_type'=>'gallery'],'get',[],0);
        return view('backend/galleries', compact('galleries'));
    }

    /**
    * Function to add galleries page
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function add_gallery()
    {
    	return view('backend/add_gallery');
    }

    /**
    * Function to edit galleries page
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function edit_gallery($id)
    {
    	$gallery = $this->galleryUserRepository->getData(['id'=>$id],'first',[],0);
    	return view('backend/edit_gallery', compact('gallery'));
    }

    /**
    * Function to delete galleries
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function delete_gallery($id)
    {
    	$gallery = $this->galleryUserRepository->getData(['id'=>$id],'delete',[],0);
    	\Session::flash('success_message', 'Gallery User Deleted Succssfully!.'); 
            return redirect('gallery');
    }

    /**
    * Function to change galleries status
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function change_gallery_status($id, $status)
    {
    	if($status == 'yes'){
    		$data['is_active'] = 'no';
    	}else{
    		$data['is_active'] = 'yes';
    	}
    	$gallery = $this->galleryUserRepository->createUpdateData(['id'=> $id],$data);
    	\Session::flash('success_message', 'Gallery User Status Changed Succssfully!.'); 
        return redirect('gallery');
    }

    /**
    * Function to create/update gallery
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 18Sept2019 
    */

    public function update_gallery()
    {
        $validate = $this->validate($this->request, [
            'email'         => trim('required|string|email|max:255|unique:gallery_users,email,'.$this->request->id),
            'first_name'         => 'required|string',
            'last_name'         => 'required|string',
            'user_type'         => 'required|string'
        ]);
        $gallery = $this->galleryUserRepository->createUpdateData(['id'=> $this->request->id],$this->request->all());
        if($gallery){
            \Session::flash('success_message', 'Gallery User Details Updated Succssfully.'); 
            return redirect('gallery');
        }else{
            \Session::flash('error_message', 'Something went wrong.');
            return back()->withInput();
        }
    }


}