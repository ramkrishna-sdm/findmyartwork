<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\CategoryRepository;
use Validator;
use Exception;
use Session;
use Mail;
use DB;
use Hash;
use Cookie;
use Segment;
use DateTime;

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
    public function update_category(Request $request) {
    	$validator = $this->validate($request,[
			'name' => 'required',
		]);
    	try{
            $save_category = $this->categoryRepository->createUpdateData(['id'=> $request->id],$request->all());
            //dd($save_category);
	    	\Session::flash('success_message', "Category Saved Successfully!");
	    	return redirect('/category');
    	}catch (\Exception $ex){
    		\Session::flash('error_message', $ex->getMessage());
    		return back()->withInput();
        }
    }

    /**
    * Function to category edit page
    * @param $request(Array)
    * @return 
    *
    * Created By: Shambhu Thakur
    * Created At: 19Nov2019
    */
    public function edit_category($id)
    {
        $category = $this->categoryRepository->getData(['id'=>$id],'first',[],0);
        return view('backend/edit_category', compact('category'));
    }

     /**
    * Function to delete category
    * @param $request(Array)
    * @return 
    *
    * Created By: shambhu thakur
    * Created At: 19Nov2019
    */
    public function delete_category($id)
    {
        $category = $this->categoryRepository->getData(['id'=>$id],'delete',[],0);
        \Session::flash('success_message', 'Category Deleted Succssfully!.'); 
            return redirect('category');
    }

    /**
    * Function to change category status
    * @param $request(Array)
    * @return 
    *
    * Created By: Shambhu thakur
    * Created At:19Nov2019 
    */
    public function change_category_status($id, $status)
    {
        if($status == 'yes'){
            $data['is_active'] = 'no';
        }else{
            $data['is_active'] = 'yes';
        }
        $category = $this->categoryRepository->createUpdateData(['id'=> $id],$data);
        \Session::flash('success_message', 'Category Status Changed Succssfully!.'); 
        return redirect('category');
    }


    
}
