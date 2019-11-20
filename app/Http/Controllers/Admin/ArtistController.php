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

class ArtistController extends Controller
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
    * Function to artists listing page
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function index()
    {
    	$artists = $this->galleryUserRepository->getData(['user_type'=>'artist'],'get',[],0);
        return view('backend/artists', compact('artists'));
    }

    /**
    * Function to add artists page
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function add_artist()
    {
    	return view('backend/add_artist');
    }

    /**
    * Function to edit artists page
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function edit_artist($id)
    {
    	$artist = $this->galleryUserRepository->getData(['id'=>$id],'first',[],0);
    	return view('backend/edit_artist', compact('artist'));
    }

    /**
    * Function to delete artists
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function delete_artist($id)
    {
    	$artist = $this->galleryUserRepository->getData(['id'=>$id],'delete',[],0);
    	\Session::flash('success_message', 'Artist Deleted Succssfully!.'); 
            return redirect('artist');
    }

    /**
    * Function to change artists status
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function change_artist_status($id, $status)
    {
    	if($status == 'yes'){
    		$data['is_active'] = 'no';
    	}else{
    		$data['is_active'] = 'yes';
    	}
    	$artist = $this->galleryUserRepository->createUpdateData(['id'=> $id],$data);
    	\Session::flash('success_message', 'Artist Status Changed Succssfully!.'); 
        return redirect('artist');
    }

    /**
    * Function to create/update artist
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 18Sept2019 
    */

    public function update_artist()
    {
        $validate = $this->validate($this->request, [
            'email'         => trim('required|string|email|max:255|unique:gallery_users,email,'.$this->request->id),
            'first_name'         => 'required|string',
            'last_name'         => 'required|string',
            'user_type'         => 'required|string'
        ]);
        $artist = $this->galleryUserRepository->createUpdateData(['id'=> $this->request->id],$this->request->all());
        if($artist){
            \Session::flash('success_message', 'Artist Details Updated Succssfully.'); 
            return redirect('artist');
        }else{
            \Session::flash('error_message', 'Something went wrong.');
            return back()->withInput();
        }
    }


}
