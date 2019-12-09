<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\ArtworkRepository;
use App\Repository\ArtworkImageRepository;
use App\Repository\VariantRepository;
use App\Repository\CategoryRepository;
use App\Repository\SubCategoryRepository;
use App\Repository\SubjectRepository;
use App\Repository\StyleRepository;
use App\Repository\UserRepository;

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

class ArtistUserController extends Controller
{
    private $artwork_files;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request, ArtworkRepository $artworkRepository, ArtworkImageRepository $artworkImageRepository, VariantRepository $variantRepository,CategoryRepository $categoryRepository,SubCategoryRepository $SubCategoryRepository,SubjectRepository $subjectRepository,StyleRepository $styleRepository,UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->artworkRepository = $artworkRepository;
        $this->artworkImageRepository = $artworkImageRepository;
        $this->variantRepository = $variantRepository;
        $this->categoryRepository = $categoryRepository;
        $this->SubCategoryRepository = $SubCategoryRepository;
        $this->subjectRepository = $subjectRepository;
        $this->styleRepository = $styleRepository;
        $this->artwork_files = '/images/artwork_files/';
    }

    public function index(){
    	return view('artist.artist_dashboard');
    }

    public function add_artwork(){
        $categories = $this->categoryRepository->getData(['is_deleted'=>'no'],'get',[],0);
        $subjects = $this->subjectRepository->getData(['is_deleted'=>'no'],'get',[],0);
        $styles = $this->styleRepository->getData(['is_deleted'=>'no'],'get',[],0);
        return view('artist.add_artwork', compact('categories','subjects','styles'));
    }

    public function profile(){
        
        return view('artist.profile');
    } 

    public function update_artist(){
        $validate = $this->validate($this->request, [
            'email'         => trim('required|string|email|max:255|unique:users,email,'.$this->request->id),
            'user_name'         => trim('required|string|max:255|unique:users,user_name,'.$this->request->id),
            'first_name'         => 'required|string',
            'last_name'         => 'required|string',
        ]);
        $artist_array = [];
        $artist_array['first_name'] = $this->request->first_name;
        $artist_array['last_name'] = $this->request->last_name;
        $artist_array['email'] = $this->request->email;
        $artist_array['address'] = $this->request->address;
        $artist_array['postal_code'] = $this->request->postal_code;
        $artist_array['city'] = $this->request->city;
        $artist_array['user_name'] = $this->request->user_name;
        $artist_array['country'] = $this->request->country;
        if($this->request->hasFile('media_url')){
            $media_url = $this->request->file('media_url');
            $parts = pathinfo($media_url->getClientOriginalName());
            $extension = strtolower($parts['extension']);
            $imageName = uniqid() . mt_rand(999, 9999) . '.' . $extension;
            $imageName = uniqid() . mt_rand(999, 9999) . '.' . $extension;
            $media_url->move(public_path() . $this->users_files, $imageName);  
            $image_name = url($this->users_files . $imageName);
            $artist_array['media_url'] = $image_name;

        }
      
        $artist = $this->userRepository->createUpdateData(['id'=> $this->request->id],$artist_array);
        if($artist){
            \Session::flash('success_message', 'Artist Details Updated Succssfully.'); 
            return redirect('/artist/profile/'.$artist->id);
        }else{
            \Session::flash('error_message', 'Something went wrong.');
            return back()->withInput();
        }
    }
    
    function upload_artwork(Request $request)
    {

        // echo "<pre>";
        // print_r($this->request->all()); die;
        // $validator = $this->validate($request,[
        //     'media_url' => 'required_without:old_image|mimes:jpg,png,jpeg,gif',
        // ]);
            
        // if($this->request->hasFile('media_url')){
        //     $media_url = $this->request->file('media_url');
        //     $parts = pathinfo($media_url->getClientOriginalName());
        //     $extension = strtolower($parts['extension']);
        //     $imageName = uniqid() . mt_rand(999, 9999) . '.' . $extension;
        //     $imageName = uniqid() . mt_rand(999, 9999) . '.' . $extension;
        //     $media_url->move(public_path() . $this->artwork_files, $imageName);  
        //     $image_name = url($this->artwork_files . $imageName);

        // }

        $artwork_array = [];
        $artwork_array['title'] = $this->request->title;
        $artwork_array['description'] = $this->request->description;
        $artwork_array['category'] = $this->request->category;
        $artwork_array['sub_category'] = $this->request->sub_category;
        $artwork_array['style'] = $this->request->style;
        $artwork_array['subject'] = $this->request->subject;
        $artwork_array['user_id'] = Auth::user()->id;
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
            // $variant['worldwide_shipping_charge'] = $this->request->worldwide_shipping_charge;
            // $variant['not_for_sale'] = $this->request->not_for_sale;
            $variants = $this->variantRepository->createUpdateData(['id'=> $this->request->id],$variant);
            // \Session::flash('success_message', 'Artwork Details Updated Succssfully.'); 
            // return redirect('artwork');
            $artwork_details = $this->artworkRepository->getData(['id'=>$artwork['id']],'get',['artist', 'artwork_images', 'variants', 'artwork_images'],0);
            // echo "<pre>";
            // print_r($artwork_details); die;
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

    public function getSubcategory(){
        if(!empty($this->request->category_id)){
            $subcategories = $this->SubCategoryRepository->getData(['category_id'=>$this->request->category_id],'get',[],0);
        }
        $options = "";
        $options .='<option value="">Select Sub-category</option>';
        if(!empty($this->request->category_id)){
            if(count($subcategories) > 0){
                foreach ($subcategories as $key => $value) {
                    $options .= '<option value="'.$value->id.'">'.$value->name.'</option>';
                }
            }
        }
        return response()->json(array(
            'result' => $options,
            'status' => 200,
        ), 200);
    }

}
