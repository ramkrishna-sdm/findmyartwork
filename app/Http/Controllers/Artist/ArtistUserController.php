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
    public function __construct(Request $request, ArtworkRepository $artworkRepository, ArtworkImageRepository $artworkImageRepository, VariantRepository $variantRepository,CategoryRepository $categoryRepository,SubCategoryRepository $SubCategoryRepository,SubjectRepository $subjectRepository,StyleRepository $styleRepository)
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
        $subcategories = $this->SubCategoryRepository->getData(['is_deleted'=>'no'],'get',['category'],0);
        $subjects = $this->subjectRepository->getData(['is_deleted'=>'no'],'get',[],0);
        $styles = $this->styleRepository->getData(['is_deleted'=>'no'],'get',[],0);
        return view('artist.add_artwork', compact('categories','subcategories','subjects','styles'));
    }
    
    function upload_artwork(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all()); die;
        $validator = $this->validate($request,[
            'media_url' => 'required_without:old_image|mimes:jpg,png,jpeg,gif',
        ]);
            
            if($this->request->hasFile('media_url')){
                $media_url = $this->request->file('media_url');
                $parts = pathinfo($media_url->getClientOriginalName());
                $extension = strtolower($parts['extension']);
                $imageName = uniqid() . mt_rand(999, 9999) . '.' . $extension;
                $imageName = uniqid() . mt_rand(999, 9999) . '.' . $extension;
                $media_url->move(public_path() . $this->artwork_files, $imageName);  
                $image_name = url($this->artwork_files . $imageName);

            }
           
     
    }

}
