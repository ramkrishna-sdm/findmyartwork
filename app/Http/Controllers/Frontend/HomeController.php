<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\CategoryRepository;
use App\Repository\UserRepository;
use App\Repository\ArtworkRepository;
use App\Repository\ArtworkImageRepository;
use App\Repository\VariantRepository;
use App\Repository\SavedArtistRepository;
use App\Repository\SavedArtworkRepository;
use App\Repository\CmsRepository;
use App\Repository\FaqRepository;
use App\Repository\ContactFormRepository;
use App\SavedArtwork;
use App\SavedArtist;
use Illuminate\Support\Facades\Auth;
use Session;
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
    public function __construct(Request $request, CategoryRepository $categoryRepository,UserRepository $userRepository, ArtworkRepository $artworkRepository, ArtworkImageRepository $artworkImageRepository, VariantRepository $variantRepository,CmsRepository $CmsRepository,FaqRepository $faqRepository,SavedArtistRepository $savedArtistRepository,SavedArtworkRepository $savedArtworkRepository,ContactFormRepository $contactFormRepository)
    {
        // dd(Session::has('random_id'));
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
        $this->userRepository = $userRepository;
        $this->artworkRepository = $artworkRepository;
        $this->artworkImageRepository = $artworkImageRepository;
        $this->variantRepository = $variantRepository;
        $this->CmsRepository = $CmsRepository;
        $this->FaqRepository = $faqRepository;
        $this->savedArtistRepository = $savedArtistRepository;
        $this->savedArtworkRepository = $savedArtworkRepository;
        $this->contactFormRepository = $contactFormRepository;
    }

    public function __destruct(){
        // echo "<pre>";
        // print_r(Session::get('random_id'));
        // dd(Session::has('random_id'));
    }

    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Session::flush();
        if(Session::has('random_id')) {
            
        }else{
            $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
            $rand = substr(str_shuffle($str_result), 0, 5);
            Session::put('random_id', $rand);
        }
        // dd(Session::get('random_id'));
        $topartworks = $this->artworkRepository->getData(['top'=>'yes', 'is_deleted'=>'no'],'get',['category_detail', 'sub_category_detail', 'artist', 'artwork_images', 'variants','style_detail', 'subject_detail'],0);
        if(count($topartworks)>0){
            foreach ($topartworks as $key => $artwork) {
                $artwork['like_count'] = SavedArtwork::where(['artwork_id' => $artwork['id'], 'status' => 'like'])->count();
                $artwork['save_count'] = SavedArtwork::where(['artwork_id' => $artwork['id'], 'status' => 'saved'])->count();
            }
        }
        // dd($topartworks);die;
        $featuredArtworks = $this->artworkRepository->getData(['is_featured'=>'yes', 'is_deleted'=>'no'],'first',['category_detail', 'sub_category_detail', 'artist', 'artwork_images', 'variants','style_detail', 'subject_detail'],0);
        // echo "<pre>";
        // print_r($featuredArtworks); die;
        $topartists  = $this->userRepository->getData(['is_featured'=>'yes','role'=>'artist', 'is_deleted'=>'no'],'get',[],0);
        if(count($topartists)>0){
            foreach ($topartists as $key => $artist) {
                $artist['like_count'] = SavedArtist::where(['artist_id' => $artist['id'], 'status' => 'like'])->count();
                $artist['save_count'] = SavedArtist::where(['artist_id' => $artist['id'], 'status' => 'saved'])->count();
            }
        }
        $categories = $this->categoryRepository->getData(['is_deleted'=>'no'],'get',[],0);
        $homes = $this->CmsRepository->getData(['slug'=>'home_page','is_deleted'=>'no'],'first',[],0);
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

    public function privacy_policy(){
          $policy = $this->CmsRepository->getData(['slug'=>'privacy_policy','is_deleted'=>'no'],'first',[],0);
        return view('frontend/privacy_policy',compact('policy'));
    }
    
    public function faq(){
        $faq = $this->FaqRepository->getData(['is_deleted'=>'no'],'get',[],0);
        return view('frontend.faq', compact('faq'));
    }
    

    public function artist(){
        return view('frontend/artist');
    }

    public function saved_artist(){
        return view('frontend/save_artist');
    }

    public function contact_us(){
        return view('frontend/contact_us');
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

    public function like_artist(){
        // dd($this->request->artist_id);
        if(Auth::user()){
            $saved_artist = [];
            $saved_artist['user_id'] = Auth::user()->id;
            $saved_artist['artist_id'] = $this->request->artist_id;
            $saved_artist['status'] = 'like';

            $count_saved = $this->savedArtistRepository->getData(['user_id'=> Auth::user()->id, 'artist_id' => $this->request->artist_id, 'status' => 'like'],'count',[],0);    
            if(empty($count_saved)){
                $artist = $this->savedArtistRepository->createUpdateData(['id'=> $this->request->id],$saved_artist);
            }else{
                $count_saved = $this->savedArtistRepository->getData(['user_id'=> Auth::user()->id, 'artist_id' => $this->request->artist_id, 'status' => 'like'],'delete',[],0);
            }
        }else{
            $saved_artist = [];
            $saved_artist['guest_id'] = Session::get('random_id');
            $saved_artist['artist_id'] = $this->request->artist_id;
            $saved_artist['status'] = 'like';

            $count_saved = $this->savedArtistRepository->getData(['guest_id'=> Session::get('random_id'), 'artist_id' => $this->request->artist_id, 'status' => 'like'],'count',[],0);    
            if(empty($count_saved)){
                $artist = $this->savedArtistRepository->createUpdateData(['id'=> $this->request->id],$saved_artist);
            }else{
                $count_saved = $this->savedArtistRepository->getData(['guest_id'=> Session::get('random_id'), 'artist_id' => $this->request->artist_id, 'status' => 'like'],'delete',[],0);
            }
        }
        $artist_liked = $this->savedArtistRepository->getData(['artist_id'=> $this->request->artist_id, 'status' => 'like'],'count',[],0);    
        return response()->json(array(
            'like_count' => $artist_liked.' Likes',
            'status' => 200,
        ), 200);
    }

    public function save_artist(){
        // dd(Session::get('random_id'));
        if(Auth::user()){
            $saved_artist = [];
            $saved_artist['user_id'] = Auth::user()->id;
            $saved_artist['artist_id'] = $this->request->artist_id;
            $saved_artist['status'] = 'saved';

            $count_saved = $this->savedArtistRepository->getData(['user_id'=> Auth::user()->id, 'artist_id' => $this->request->artist_id, 'status' => 'saved'],'count',[],0);    
            if(empty($count_saved)){
                $artist = $this->savedArtistRepository->createUpdateData(['id'=> $this->request->id],$saved_artist);
            }else{
                $count_saved = $this->savedArtistRepository->getData(['user_id'=> Auth::user()->id, 'artist_id' => $this->request->artist_id, 'status' => 'saved'],'delete',[],0);
            }
            $artist_saved = $this->savedArtistRepository->getData(['user_id'=> Auth::user()->id, 'status' => 'saved'],'count',[],0);
        }else{
            $saved_artist = [];
            $saved_artist['guest_id'] = Session::get('random_id');
            $saved_artist['artist_id'] = $this->request->artist_id;
            $saved_artist['status'] = 'saved';

            $count_saved = $this->savedArtistRepository->getData(['guest_id'=> Session::get('random_id'), 'artist_id' => $this->request->artist_id, 'status' => 'saved'],'count',[],0);    
            if(empty($count_saved)){
                $artist = $this->savedArtistRepository->createUpdateData(['id'=> $this->request->id],$saved_artist);
            }else{
                $count_saved = $this->savedArtistRepository->getData(['guest_id'=> Session::get('random_id'), 'artist_id' => $this->request->artist_id, 'status' => 'saved'],'delete',[],0);
            }
            $artist_saved = $this->savedArtistRepository->getData(['guest_id'=> Session::get('random_id'), 'status' => 'saved'],'count',[],0);
        }
        
        return response()->json(array(
            'saved_count' => $artist_saved,
            'status' => 200,
        ), 200);
    }

    public function like_artwork(){
        if(Auth::user()){
            $saved_artwork = [];
            $saved_artwork['user_id'] = Auth::user()->id;
            $saved_artwork['artwork_id'] = $this->request->artwork_id;
            $saved_artwork['status'] = 'like';

            $count_saved = $this->savedArtworkRepository->getData(['user_id'=> Auth::user()->id, 'artwork_id' => $this->request->artwork_id, 'status' => 'like'],'count',[],0);    
            if(empty($count_saved)){
                $artwork = $this->savedArtworkRepository->createUpdateData(['id'=> $this->request->id],$saved_artwork);
            }else{
                $count_saved = $this->savedArtworkRepository->getData(['user_id'=> Auth::user()->id, 'artwork_id' => $this->request->artwork_id, 'status' => 'like'],'delete',[],0);
            }
        }else{
            $saved_artwork = [];
            $saved_artwork['guest_id'] = Session::get('random_id');
            $saved_artwork['artwork_id'] = $this->request->artwork_id;
            $saved_artwork['status'] = 'like';

            $count_saved = $this->savedArtworkRepository->getData(['guest_id'=> Session::get('random_id'), 'artwork_id' => $this->request->artwork_id, 'status' => 'like'],'count',[],0);    
            if(empty($count_saved)){
                $artwork = $this->savedArtworkRepository->createUpdateData(['id'=> $this->request->id],$saved_artwork);
            }else{
                $count_saved = $this->savedArtworkRepository->getData(['guest_id'=> Session::get('random_id'), 'artwork_id' => $this->request->artwork_id, 'status' => 'like'],'delete',[],0);
            }
        }
        $artwork_liked = $this->savedArtworkRepository->getData(['artwork_id'=> $this->request->artwork_id, 'status' => 'like'],'count',[],0);    
        return response()->json(array(
            'like_count' => $artwork_liked.' Likes',
            'status' => 200,
        ), 200);
    }

    public function save_artwork(){
        // dd(Session::get('random_id'));
        if(Auth::user()){
            $saved_artwork = [];
            $saved_artwork['user_id'] = Auth::user()->id;
            $saved_artwork['artwork_id'] = $this->request->artwork_id;
            $saved_artwork['status'] = 'saved';

            $count_saved = $this->savedArtworkRepository->getData(['user_id'=> Auth::user()->id, 'artwork_id' => $this->request->artwork_id, 'status' => 'saved'],'count',[],0);    
            if(empty($count_saved)){
                $artwork = $this->savedArtworkRepository->createUpdateData(['id'=> $this->request->id],$saved_artwork);
            }else{
                $count_saved = $this->savedArtworkRepository->getData(['user_id'=> Auth::user()->id, 'artwork_id' => $this->request->artwork_id, 'status' => 'saved'],'delete',[],0);
            }
            $artwork_saved = $this->savedArtworkRepository->getData(['user_id'=> Auth::user()->id, 'status' => 'saved'],'count',[],0);
        }else{
            $saved_artwork = [];
            $saved_artwork['guest_id'] = Session::get('random_id');
            $saved_artwork['artwork_id'] = $this->request->artwork_id;
            $saved_artwork['status'] = 'saved';

            $count_saved = $this->savedArtworkRepository->getData(['guest_id'=> Session::get('random_id'), 'artwork_id' => $this->request->artwork_id, 'status' => 'saved'],'count',[],0);    
            if(empty($count_saved)){
                $artwork = $this->savedArtworkRepository->createUpdateData(['id'=> $this->request->id],$saved_artwork);
            }else{
                $count_saved = $this->savedArtworkRepository->getData(['guest_id'=> Session::get('random_id'), 'artwork_id' => $this->request->artwork_id, 'status' => 'saved'],'delete',[],0);
            }
            $artwork_saved = $this->savedArtworkRepository->getData(['guest_id'=> Session::get('random_id'), 'status' => 'saved'],'count',[],0);
        }
        
        return response()->json(array(
            'saved_count' => $artwork_saved,
            'status' => 200,
        ), 200);
    }



    public function save_contact_form_details(){
      
       $contactForm = $this->contactFormRepository->createUpdateData(['id'=>  $this->request->id], $this->request->all());

       return redirect()->to('/contact_us')->with('message', 'Contact Form Submit Successfully');

    }


    public static function header_counter()
    {
        $saved_count = "";
        $cart_count = 12;
        if(Auth::user()){
            $saved_count = SavedArtwork::where(['user_id'=> Auth::user()->id, 'status' => 'saved'])->count();
        }else{
            $saved_count = SavedArtwork::where(['guest_id'=> Session::get('random_id'), 'status' => 'saved'])->count();
        }
        session(['saved_count' => $saved_count, 'cart_count' => $cart_count]);
    }
        
}
