<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\CategoryRepository;
use App\Repository\VariantRepository;
use App\Style;
use App\Subject;

class BuyerUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request,CategoryRepository $categoryRepository,VariantRepository $variantRepository)
    {
        $this->middleware('auth');

        $this->request = $request;

        $this->categoryRepository = $categoryRepository;

        $this->variantRepository = $variantRepository;
    }

    public function index(){
        $categories = $this->categoryRepository->getData([],'get',['artwork'],0);

        $styles= Style::get();

        $subjects= Subject::get();
    
    	return view('buyer.buyer_dashboard',compact('categories','styles','subjects'));
    }

    public function getSubCategories(){
        
        $categories = $this->categoryRepository->getData(['id'=>$this->request->id],'first',['artwork','subcategories','artwork.artist','artwork.variants'],0);
      
        if($this->request->price){
           
        }

        if($this->request->height){
            
        }

        if($this->request->width){
            
        }
        
        $returnHTML = view('buyer.sub_categories',compact('categories'))->render();// or method that you prefere to return data + RENDER is the key here
                      return response()->json(array('status' => '200', 'html'=>$returnHTML));
    }

    public function profile(){
        return view('buyer.profile');
    }


}
