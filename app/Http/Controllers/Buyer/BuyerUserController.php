<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\CategoryRepository;

class BuyerUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request,CategoryRepository $categoryRepository)
    {
        $this->middleware('auth');

        $this->request = $request;

        $this->categoryRepository = $categoryRepository;
    }

    public function index(){
        $categories = $this->categoryRepository->getData([],'get',['artwork'],0);
    
    	return view('buyer.buyer_dashboard',compact('categories'));
    }

    public function getSubCategories(){
        
        $categories = $this->categoryRepository->getData(['id'=>$this->request->id],'first',['artwork','subcategories','artwork.artist','artwork.variants'],0);
       
        $returnHTML = view('buyer.sub_categories',compact('categories'))->render();// or method that you prefere to return data + RENDER is the key here
                      return response()->json(array('status' => '200', 'html'=>$returnHTML));


    }


}
