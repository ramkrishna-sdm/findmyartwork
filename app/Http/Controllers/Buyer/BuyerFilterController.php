<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\CategoryRepository;
use App\Repository\VariantRepository;
use App\Repository\ArtworkRepository;
use App\Style;
use App\Subject;

class BuyerFilterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request,CategoryRepository $categoryRepository,VariantRepository $variantRepository, ArtworkRepository $artworkRepository)
    {
        $this->middleware('auth');

        $this->request = $request;

        $this->categoryRepository = $categoryRepository;

        $this->variantRepository = $variantRepository;
        
        $this->artworkRepository = $artworkRepository;
    }

    public function getSubCategories(){
        $filter_artwork = [];
        $variant_array = [];
        $artwork_array = [];
        $artwork_id = [];
        $categories = $this->categoryRepository->getData(['id'=>$this->request->id],'first',['artwork','subcategories','artwork.artist','artwork.variants','artwork.artwork_images'],0);
        
        if(count($categories['artwork']) > 0){
            foreach ($categories['artwork'] as $key => $artworks) {
                if(!in_array($artworks->id, $artwork_id)){
                    $artwork_id[] = $artworks->id;
                    $filter_artwork[] = $artworks;  
                }
            }
        }
        if(!empty($this->request->price)) {
            $variant_array[] = $this->variantRepository->getData(['price'=>$this->request->price],'get',['artwork','artwork.artist','artwork.variants','artwork.artwork_images','artwork.artwork_like'],0);
        }

        if(!empty($this->request->height)) {
            $variant_array[] = $this->variantRepository->getData(['height'=>$this->request->height],'get',['artwork','artwork.artist','artwork.variants','artwork.artwork_images','artwork.artwork_like'],0);            
        }

        if(!empty($this->request->width)){
            $variant_array[] = $this->variantRepository->getData(['width'=>$this->request->width],'get',['artwork','artwork.artist','artwork.variants','artwork.artwork_images','artwork.artwork_like'],0);
        }

        if(!empty($this->request->variant_type)){
            $var_type = explode(',', $this->request->variant_type);
            $var_type = array_filter($var_type);
            $variant_array[] = $this->variantRepository->getData(['variant_type'=>$var_type],'get',['artwork','artwork.artist','artwork.artwork_images','artwork.variants','artwork.artwork_like'],0);            
        }
        
        if(!empty($this->request->style_id)){
            $artwork_array[] = $this->artworkRepository->getData(['style'=>$this->request->style_id],'get',['artist', 'artwork_images', 'variants', 'artwork_like'],0);   
        }

        if(!empty($this->request->subject_id)){
           $artwork_array[] = $this->artworkRepository->getData(['subject'=>$this->request->subject_id],'get',['artist', 'artwork_images', 'variants', 'artwork_like'],0);
        }
        
        if(count($variant_array) > 0){
            foreach ($variant_array as $key => $variant) {
                foreach ($variant as $key => $value) {
                    if(!in_array($value->artwork->id, $artwork_id)){
                        $artwork_id[] = $value->artwork->id;
                        $filter_artwork[] = $value->artwork;
                    }
                }
            }
        }

        if(count($artwork_array) > 0){
            foreach ($artwork_array as $key => $value) {
                foreach ($value as $key => $artwork) {
                    if(!in_array($artwork->id, $artwork_id)){
                        $artwork_id[] = $artwork->id;
                        $filter_artwork[] = $artwork;
                    }
                }
            }
        }
        // echo "<pre>";
        // print_r($filter_artwork); die;
        $categories['artwork'] = $filter_artwork;
        // echo "<pre>";
        // print_r($categories['artwork'] = $filter_artwork); die;

        $returnHTML = view('buyer.sub_categories',compact('categories'))->render();
        return response()->json(array('status' => '200', 'html'=>$returnHTML));
    }


}

