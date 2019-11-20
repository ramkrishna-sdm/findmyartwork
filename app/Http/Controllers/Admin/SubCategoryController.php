<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\SubCategoryRepository;
use Validator;
use Exception;
use Session;
use Mail;
use DB;
use Hash;
use Cookie;
use Segment;
use DateTime;

class SubCategoryController extends Controller
{
    /**
    * Construction function
    * @param $request(Array), $SubCategoryRepository(Repository Interface)
    * @return 
    *
    * Created By: Shambhu Thakur
    * Created At: 19Nov2019 
    */
    public function __construct(Request $request, SubCategoryRepository $SubCategoryRepository)
    {
        $this->request = $request;
        $this->SubCategoryRepository = $SubCategoryRepository;
    }
    /**
    * Function To List all SubCategory
    * @param
    * @return 
    *
    * Created By: Shambhu Thakur
    * Created At: 19Nov2019 
    */
    public function index() {
        $subcategories = $this->SubCategoryRepository->getData(['is_deleted'=>'no'],'get',[],0);
        return view('backend.subcategories', compact('subcategories'));
    }
     /**
    * Function to render Add SubCategory Page
    * @param
    * @return 
    *
    * Created By: Shambhu Thakur
    * Created At: 19Nov2019 
    */
    public function add_subcategory() {
        return view('backend.add_subcategory');
    }

    /**
    * Function to Create/Update SubCategory
    * @param
    * @return 
    *
    * Created By: Shambhu Thakur
    * Created At: 19Nov2019 
    */
    public function update_subcategory(Request $request) {
        $validator = $this->validate($request,[
            'name' => 'required',
        ]);
        try{
            $subcategory = $this->SubCategoryRepository->createUpdateData(['id'=> $request->id],$request->all());
            \Session::flash('success_message', "SubCategory Saved Successfully!");
            return redirect('/subcategory');
        }catch (\Exception $ex){
            \Session::flash('error_message', $ex->getMessage());
            return back()->withInput();
        }
    }

    /**
    * Function to subcategory edit page
    * @param $request(Array)
    * @return 
    *
    * Created By: Shambhu Thakur
    * Created At: 19Nov2019
    */
    public function edit_subcategory($id)
    {
        $subcategory = $this->SubCategoryRepository->getData(['id'=>$id],'first',[],0);
        return view('backend/edit_subcategory', compact('subcategory'));
    }

     /**
    * Function to delete subject
    * @param $request(Array)
    * @return 
    *
    * Created By: shambhu thakur
    * Created At: 19Nov2019
    */
    public function delete_subcategory($id)
    {
        $subcategory = $this->SubCategoryRepository->getData(['id'=>$id],'delete',[],0);
        \Session::flash('success_message', 'Subcategory Deleted Succssfully!.'); 
            return redirect('subcategory');
    }

    /**
    * Function to change SubCategory status
    * @param $request(Array)
    * @return 
    *
    * Created By: Shambhu thakur
    * Created At:19Nov2019 
    */
    public function change_subcategory_status($id, $status)
    {
        if($status == 'yes'){
            $data['is_active'] = 'no';
        }else{
            $data['is_active'] = 'yes';
        }
        $subcategory = $this->SubCategoryRepository->createUpdateData(['id'=> $id],$data);
        \Session::flash('success_message', 'Subcategory Status Changed Succssfully!.'); 
        return redirect('subcategory');
    }


    
}
