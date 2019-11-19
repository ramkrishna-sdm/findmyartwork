<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\CategoryRepository;
use Validator;
use Exception;
use Session;

class CategoryController extends Controller
{
    /**
    * Construction function
    * @param $request(Array), $categoryRepository(Repository Interface)
    * @return 
    *
    * Created By: Shambhu Thakur
    * Created At: 19Nov2019 
    */
    public function __construct(Request $request, CategoryRepository $categoryRepository)
    {
        //$this->middleware('auth');
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
    }
    /**
    * Function To List all Category
    * @param
    * @return 
    *
    * Created By: Shambhu Thakur
    * Created At: 19Nov2019 
    */
    public function index() {
    	$categories = $this->categoryRepository->getData(['is_deleted'=>'no'],'get',[],0);
    	return view('backend.categories', compact('categories'));
    }
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
            $save_category = $this->categoryRepository->createUpdateData(['id'=> $request->id],$request->all());
            //dd($save_category);
	    	\Session::flash('success_message', "Template Saved Successfully!");
	    	return redirect('/category');
    	}catch (\Exception $ex){
    		\Session::flash('error_message', $ex->getMessage());
    		return back()->withInput();
        }
    }


    
}
