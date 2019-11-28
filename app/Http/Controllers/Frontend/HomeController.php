<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\CategoryRepository;
use App\Repository\GalleryUserRepository;
use App\Repository\ArtworkRepository;
use App\Repository\ArtworkImageRepository;
use App\Repository\VariantRepository;
use App\Repository\CmsRepository;
class HomeController extends Controller
{
    /**
    * Construction function
    * @param $request(Array), $categoryRepository
    * @return 
    *
    * Created By: Shambhu Thakur
    * Created At: 
    */
    public function __construct(Request $request, CategoryRepository $categoryRepository,GalleryUserRepository $galleryUserRepository, ArtworkRepository $artworkRepository, ArtworkImageRepository $artworkImageRepository, VariantRepository $variantRepository,CmsRepository $CmsRepository)
    {
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
        $this->galleryUserRepository = $galleryUserRepository;
        $this->artworkRepository = $artworkRepository;
        $this->artworkImageRepository = $artworkImageRepository;
        $this->variantRepository = $variantRepository;
        $this->CmsRepository = $CmsRepository;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $topartworks = $this->artworkRepository->getData(['top'=>'yes', 'is_deleted'=>'no'],'get',['category_detail', 'sub_category_detail', 'artist', 'artwork_images', 'variants','style_detail', 'subject_detail'],0);
        $featuredArtworks = $this->artworkRepository->getData(['is_featured'=>'yes', 'is_deleted'=>'no'],'first',['category_detail', 'sub_category_detail', 'artist', 'artwork_images', 'variants','style_detail', 'subject_detail'],0);
        $topartists  = $this->artworkRepository->getData(['trending'=>'yes','user_type'=>'artist', 'is_deleted'=>'no'],'get',['category_detail', 'sub_category_detail', 'artist', 'artwork_images', 'variants','style_detail', 'subject_detail'],0);
        $categories = $this->categoryRepository->getData(['is_deleted'=>'no'],'get',[],0);
        $homes = $this->CmsRepository->getData(['slug'=>'home_page','is_deleted'=>'no'],'get',[],0);
        return view('frontend/home_page',compact('categories','topartworks','featuredArtworks','homes','topartists'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function about_us(){
          $about = $this->CmsRepository->getData(['slug'=>'about_us','is_deleted'=>'no'],'get',[],0);
        return view('frontend/about_us',compact('about'));
    }
    

    public function artist(){
        return view('frontend/artist');
    }

    public function save_artist(){
        return view('frontend/save_artist');
    }

    public function profile_details(){
        return view('frontend/profile_details');
    }
}
