<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\ArtworkRepository;
use App\Repository\CategoryRepository;
use App\Repository\ArtworkImageRepository;
use App\Repository\VariantRepository;
use App\Repository\StyleRepository;
use App\Repository\SubjectRepository;
use App\Repository\SavedArtworkRepository;
use Illuminate\Support\Facades\Auth;
use Validator;
use Exception;
use Session;
use Mail;
use DB;
use Hash;
use Cookie;
use Segment;
use DateTime;

class ArtworkController extends Controller
{
	private $artwork_files;
    /**
    * Construction function
    * @param $request(Array), $galleryUserRepository
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function __construct(Request $request, ArtworkRepository $artworkRepository, ArtworkImageRepository $artworkImageRepository, VariantRepository $variantRepository,SavedArtworkRepository $savedArtworkRepository,CategoryRepository $categoryRepository,StyleRepository $styleRepository,SubjectRepository $subjectRepository)
    {
        $this->request = $request;
        $this->artworkRepository = $artworkRepository;
        $this->artworkImageRepository = $artworkImageRepository;
        $this->variantRepository = $variantRepository;
        $this->savedArtworkRepository = $savedArtworkRepository;
        $this->categoryRepository = $categoryRepository;
        $this->styleRepository = $styleRepository;
        $this->subjectRepository = $subjectRepository;
        $this->artwork_files = '/images/artwork_files/';
    }

    public function items_cart(){
        $items_cart = [];
        if(Auth::user()){
            $items_cart = $this->savedArtworkRepository->getData(['user_id'=> Auth::user()->id, 'status' => 'cart'],'get',['saved_artwork','saved_artwork.artist','saved_artwork.variants','saved_artwork.artwork_images','saved_artwork.artwork_like'],0);
        }else{
            $items_cart = $this->savedArtworkRepository->getData(['guest_id'=> Session::get('random_id'), 'status' => 'cart'],'get',['saved_artwork','saved_artwork.artist','saved_artwork.variants','saved_artwork.artwork_images','saved_artwork.artwork_like'],0);
        }
        return view('frontend/items_cart', compact('items_cart'));
    }

    public function saved_artwork(){
        $saved_artwork = [];
        if(Auth::user()){
            $saved_artwork = $this->savedArtworkRepository->getData(['user_id'=> Auth::user()->id, 'status' => 'saved'],'get',['saved_artwork','saved_artwork.artist','saved_artwork.variants','saved_artwork.artwork_images','saved_artwork.artwork_like'],0);
        }else{
            $saved_artwork = $this->savedArtworkRepository->getData(['guest_id'=> Session::get('random_id'), 'status' => 'saved'],'get',['saved_artwork','saved_artwork.artist','saved_artwork.variants','saved_artwork.artwork_images','saved_artwork.artwork_like'],0);
        }
        // echo "<pre>";
        // print_r($saved_artwork[0]->saved_artwork); die;
        return view('frontend/saved_artwork', compact('saved_artwork'));
    }

    public function artworks($cat_id = null){
        if(!empty($cat_id)){
            $all_artwork = $this->artworkRepository->getData(['is_deleted'=> 'no', 'is_publised' => 'yes', 'category'=> $cat_id],'get',['artwork_images', 'variants', 'artist', 'artwork_like'],0);
        }else{
            $all_artwork = $this->artworkRepository->getData(['is_deleted'=> 'no', 'is_publised' => 'yes'],'get',['artwork_images', 'variants', 'artist', 'artwork_like'],0);
        }
            
        $categories = $this->categoryRepository->getData([],'get',['subcategories'],0);
        $styles= $this->styleRepository->getData([], 'get', [], 0);
        $subjects= $this->subjectRepository->getData([], 'get', [], 0);
        return view('frontend/artwork_lists', compact('all_artwork', 'categories', 'styles', 'subjects', 'cat_id'));
    }

    public function artwork_details($id){
        $artwork_result = $this->artworkRepository->getData(['id'=> $id],'first',['artwork_images', 'variants', 'artist', 'artwork_like', 'category_detail', 'sub_category_detail','style_detail', 'subject_detail'],0);
        // echo "<pre>";
        // print_r($artwork_result->variants[0]); die;
        $similar_artwork = $this->artworkRepository->getData(['category'=> $artwork_result['category']],'get',['artwork_images', 'variants', 'artist', 'artwork_like'],0);
        return view('frontend/artwork_details',compact('artwork_result', 'similar_artwork'));
    }

    /**
    * Function to create/update artist
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At:
    */
    public function update_artwork()
    {
    	$validator = Validator::make($this->request->all(), [
            'title'	=> 'required|max:255',
			'description'	=> 'required',
			'category'	=> 'required',
			'sub_category'	=> 'required',
			'style'	=> 'required',
			'subject'	=> 'required',
			'gallery_user_id'	=> 'required',
			'variant_type'	=> 'required|max:255',
			'editions_count'	=> 'required|max:255',
			'width'	=> 'required|max:255',
			'height'	=> 'required|max:255',
			'price'	=> 'required|max:255',
			'worldwide_shipping_charge'	=> 'required|max:255',
			// 'main_image' => 'required|mimes:jpg,png,jpeg,gif',
			// 'upload_files.*' => 'mimes:jpg,png,jpeg,gif',
        ]);
        if ($validator->fails()) {
        	return response()->json(['error' => $validator->messages()]);
            // foreach ($validator->messages()->getMessages() as $field_name => $messages){
            //     throw new Exception($messages[0], 1);
            // }
        }
        $artwork_array = [];
        $artwork_array['title'] = $this->request->title;
        $artwork_array['description'] = $this->request->description;
        $artwork_array['category'] = $this->request->category;
        $artwork_array['sub_category'] = $this->request->sub_category;
        $artwork_array['style'] = $this->request->style;
        $artwork_array['subject'] = $this->request->subject;
        $artwork_array['user_id'] = $this->request->gallery_user_id;
        $artwork = $this->artworkRepository->createUpdateData(['id'=> $this->request->id],$artwork_array);
        if($artwork){
        	$upload_files = $this->request->file('upload_files');
        	$main_image = $this->request->file('main_image');

        	$parts = pathinfo($main_image->getClientOriginalName());
            $extension = strtolower($parts['extension']);
            $imageName = uniqid() . mt_rand(999, 9999) . '.' . $extension;
        	$imageName = uniqid() . mt_rand(999, 9999) . '.' . $extension;
            $main_image->move(public_path() . $this->artwork_files, $imageName);  
            $image_name = url($this->artwork_files . $imageName); 
            $uploads['media_url'] = $image_name;
            $uploads['artwork_id'] = $artwork['id'];
            $upload_file = $this->artworkImageRepository->createUpdateData(['id'=> $this->request->doc_id],$uploads);

        	if($this->request->hasFile('upload_files')){
                foreach ($upload_files as $file) {
                    $parts = pathinfo($file->getClientOriginalName());
                    $extension = strtolower($parts['extension']);
                    $imageName = uniqid() . mt_rand(999, 9999) . '.' . $extension;
                    $file->move(public_path() . $this->artwork_files, $imageName);  
                    $image_name = url($this->artwork_files . $imageName); 
                    $uploads['media_url'] = $image_name;
                    $uploads['artwork_id'] = $artwork['id'];
                    $upload_file = $this->artworkImageRepository->createUpdateData(['id'=> $this->request->doc_id],$uploads);
                }
            }
            $variant = [];
            $variant['artwork_id'] = $artwork['id'];
            $variant['variant_type'] = $this->request->variant_type;
            $variant['editions_count'] = $this->request->editions_count;
            $variant['width'] = $this->request->width;
            $variant['height'] = $this->request->height;
            $variant['price'] = $this->request->price;
            $variant['worldwide_shipping_charge'] = $this->request->worldwide_shipping_charge;
            $variant['not_for_sale'] = $this->request->not_for_sale;
            $variants = $this->variantRepository->createUpdateData(['id'=> $this->request->id],$variant);
            // \Session::flash('success_message', 'Artwork Details Updated Succssfully.'); 
            // return redirect('artwork');
            $artwork_details = $this->artworkRepository->getData(['id'=>$artwork['id']],'get',['artist', 'artwork_images', 'variants', 'artwork_images'],0);
            return response()->json([
                'status' => 'success',
                'message' => 'Artwork Updated Succssfully',
                'data'  => $artwork_details,
            ], 200);
        }else{
            \Session::flash('error_message', 'Something went wrong.');
            return back()->withInput();
        }
    }
}








