<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\CmsRepository;
use Validator;
use Exception;
use Session;
use Mail;
use DB;
use Hash;
use Cookie;
use Segment;
use DateTime;
class CmsController extends Controller
{
	private $aboutus_files;
	/**
    * Construction function
    * @param $request(Array), $CmsRepository(Repository Interface)
    * @return 
    *
    * Created By: Shambhu Thakur
    * Created At: 21Nov2019 
    */
    public function __construct(Request $request, CmsRepository $CmsRepository)
    {
        $this->request = $request;
        $this->CmsRepository = $CmsRepository;
        $this->aboutus_files = '/images/aboutus_files/';
    }
     /**
    * Function to add aboutus page
    * @param $request(Array)
    * @return 
    *0
    * Created By: Shambhu thakur
    * Created At: 21Nov2019
    */
    public function add_aboutus()
    {
    	return view('backend/add_aboutus');
    }

    /**
    * Function to Create/Update About Us
    * @param
    * @return 
    *
    * Created By: Shambhu Thakur
    * Created At: 21Nov2019 
    */
    public function update_aboutus(Request $request) {
    	
		$validator = Validator::make($this->request->all(), [
            'title'	=> 'required|max:255',
			'des_first' => 'required',
			'des_second' => 'required',
			'first_img_url' => 'required|mimes:jpg,png,jpeg,gif',
			'second_img_url' => 'required|mimes:jpg,png,jpeg,gif',
        ]);
        if ($validator->fails()) {
        	return response()->json(['error' => $validator->messages()]);
        }
        try{
        $aboutus_array = [];
        $aboutus_array['title'] = $this->request->title;
        $aboutus_array['des_first'] = $this->request->des_first;
        $aboutus_array['des_second'] = $this->request->des_second;
        $aboutus_array['slug'] = $this->request->slug;
    	$first_img_url = $this->request->file('first_img_url');
    	$second_img_url = $this->request->file('second_img_url');

        	$parts = pathinfo($first_img_url->getClientOriginalName());
            $extension = strtolower($parts['extension']);
            $imageName = uniqid() . mt_rand(999, 9999) . '.' . $extension;
        	$imageName = uniqid() . mt_rand(999, 9999) . '.' . $extension;
            $first_img_url->move(public_path() . $this->aboutus_files, $imageName);  
            $image_name = url($this->aboutus_files . $imageName); 
            $aboutus_array['first_img_url'] = $image_name;

            $parts1 = pathinfo($second_img_url->getClientOriginalName());
            $extension1 = strtolower($parts['extension']);
            $imageName1 = uniqid() . mt_rand(999, 9999) . '.' . $extension;
        	$imageName1 = uniqid() . mt_rand(999, 9999) . '.' . $extension;
            $second_img_url->move(public_path() . $this->aboutus_files, $imageName1);  
            $image_name1 = url($this->aboutus_files . $imageName1); 
            $aboutus_array['second_img_url'] = $image_name1;
            $upload_file = $this->CmsRepository->createUpdateData(['id'=> $this->request->id],$aboutus_array);
             \Session::flash('success_message', "AboutUs Saved Successfully!");
            return redirect('/category');
        }catch (\Exception $ex){
            \Session::flash('error_message', $ex->getMessage());
            return back()->withInput();
        }
    }

     /**
    * Function to add cms page
    * @param $request(Array)
    * @return 
    *0
    * Created By: Shambhu thakur
    * Created At: 21Nov2019
    */
    public function add_cms()
    {
    	return view('backend/add_cms');
    }

     /**
    * Function to Create/Update cms
    * @param
    * @return 
    *
    * Created By: Shambhu Thakur
    * Created At: 21Nov2019 
    */
    public function update_cms(Request $request) {
        $validator = $this->validate($request,[
            'title' => 'required',
            'slug' => 'required',
            'des_first' => 'required'
        ]);
        try{

            $cms = $this->CmsRepository->createUpdateData(['id'=> $request->id],$request->all());
            \Session::flash('success_message', "Cms Saved Successfully!");
            return redirect('/subcategory');
        }catch (\Exception $ex){
            \Session::flash('error_message', $ex->getMessage());
            return back()->withInput();
        }
    }


}
