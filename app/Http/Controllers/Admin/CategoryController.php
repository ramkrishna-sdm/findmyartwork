<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Exception;
use Session;

class CategoryController extends Controller
{
     /**
    * Function to render Add Category Page
    * @param
    * @return 
    *
    * Created By: Shambhu Thakur
    * Created At: 19Nov2019 
    */
    public function add_category() {
    	return view('backend.add_category');
    }

    /**
    * Function to Create/Update Category
    * @param
    * @return 
    *
    * Created By: Shambhu Thakur
    * Created At: 19Nov2019 
    */
    public function save_category(Request $request) {
    	$validator = $this->validate($request,[
			'name' => 'required',
		]);
    	try{
            
            category::create($request->all());
	    	$save_template = $this->templateRepository->createUpdateData(['id'=> $this->request->id],$this->request->all());
	    	\Session::flash('success_message', "Template Saved Successfully!");
	    	return redirect('/admin/category');
    	}catch (\Exception $ex){
    		\Session::flash('error_message', $ex->getMessage());
    		return back()->withInput();
        }
    }


    
}
