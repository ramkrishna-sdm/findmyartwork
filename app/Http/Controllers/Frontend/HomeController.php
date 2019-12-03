<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\CategoryRepository;
use App\Repository\UserRepository;
use App\Repository\ArtworkRepository;
use App\Repository\ArtworkImageRepository;
use App\Repository\VariantRepository;
use App\Repository\CmsRepository;
use App\Repository\FaqRepository;
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
    public function __construct(Request $request, CategoryRepository $categoryRepository,UserRepository $userRepository, ArtworkRepository $artworkRepository, ArtworkImageRepository $artworkImageRepository, VariantRepository $variantRepository,CmsRepository $CmsRepository,FaqRepository $faqRepository)
    {
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
        $this->userRepository = $userRepository;
        $this->artworkRepository = $artworkRepository;
        $this->artworkImageRepository = $artworkImageRepository;
        $this->variantRepository = $variantRepository;
        $this->CmsRepository = $CmsRepository;
        $this->FaqRepository = $faqRepository;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $topartworks = $this->artworkRepository->getData(['top'=>'yes', 'is_deleted'=>'no'],'get',['category_detail', 'sub_category_detail', 'artist', 'artwork_images', 'variants','style_detail', 'subject_detail'],0);
        // dd($topartworks);die;
        $featuredArtworks = $this->artworkRepository->getData(['is_featured'=>'yes', 'is_deleted'=>'no'],'first',['category_detail', 'sub_category_detail', 'artist', 'artwork_images', 'variants','style_detail', 'subject_detail'],0);
        // echo "<pre>";
        // print_r($featuredArtworks); die;
        $topartists  = $this->userRepository->getData(['is_featured'=>'yes','role'=>'artist', 'is_deleted'=>'no'],'get',[],0);
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
          $about = $this->CmsRepository->getData(['slug'=>'about_us','is_deleted'=>'no'],'first',[],0);
        return view('frontend/about_us',compact('about'));
    }
    
    public function terms_conditions(){
          $terms = $this->CmsRepository->getData(['slug'=>'terms_n_conditions','is_deleted'=>'no'],'first',[],0);
        return view('frontend/terms_conditions',compact('terms'));
    }
    
    public function faq(){
        // $clientIP = request()->ip();
        // dd($clientIP);
        return view('frontend/faq');

        //$faq = $this->FaqRepository->getData(['is_deleted'=>'no'],'get',[],0);
        //return view('frontend.faq', compact('faq'));
    }
    

    public function artist(){
        return view('frontend/artist');
    }

    public function save_artist(){
        return view('frontend/save_artist');
    }

    public function profile_details($id){
        $professional = [];
        $profileDetails = $this->userRepository->getData(['id'=>$id, 'is_deleted'=>'no'],'first',['artworks', 'artworks.artwork_images', 'artworks.category_detail'],0);    
        
        if(!empty($profileDetails)){
            foreach ($profileDetails->artworks as $key => $value) {
                $professional[] = $value['category_detail']['name'];
            }
        }
        $professional = array_unique($professional);
        return view('frontend/profile_details',compact('profileDetails', 'professional'));
    }
}
