<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\GalleryUserRepository;
use App\Repository\ArtworkRepository;
use App\Repository\ArtworkImageRepository;
use App\Repository\VariantRepository;
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
    /**
    * Construction function
    * @param $request(Array), $galleryUserRepository
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function __construct(Request $request, GalleryUserRepository $galleryUserRepository, ArtworkRepository $artworkRepository, ArtworkImageRepository $artworkImageRepository, VariantRepository $variantRepository)
    {
        $this->request = $request;
        $this->galleryUserRepository = $galleryUserRepository;
        $this->artworkRepository = $artworkRepository;
        $this->artworkImageRepository = $artworkImageRepository;
        $this->variantRepository = $variantRepository;
    }

    /**
    * Function to artwork listing page
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function index($artist_id)
    {
    	$artworks = $this->artworkRepository->getData(['gallery_user_id'=>$artist_id],'get',['category_detail', 'sub_category_detail'],0);
    	
        return view('backend/artworks', compact('artworks', 'artist_id'));
    }

    /**
    * Function to artwork detail page
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function view_artwork($artwork_id)
    {
    	$artworks = $this->artworkRepository->getData(['id'=>$artwork_id],'first',['category_detail', 'sub_category_detail', 'artist', 'artwork_images', 'variants', 'artwork_images', 'style_detail', 'subject_detail'],0);
    	$artist_id = $artworks['gallery_user_id'];
        return view('backend/artwork_detail', compact('artworks', 'artist_id'));
    }

    /**
    * Function to artwork detail page
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function get_gallery_images($artwork_id)
    {
    	$gallery = $this->artworkImageRepository->getData(['artwork_id'=>$artwork_id],'get',[],0);
    	return view('backend/ajax/gallery_slider', compact('gallery'));
    }

    /**
    * Function to change artists status
    * @param $request(Array)
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function change_artwork_status($id, $status, $page, $user_id)
    {
    	if($status == 'publish'){
    		$data['is_publised'] = 'unpublish';
    	}else{
    		$data['is_publised'] = 'publish';
    	}
    	$artist = $this->artworkRepository->createUpdateData(['id'=> $id],$data);
    	\Session::flash('success_message', 'Artist Status Changed Succssfully!.'); 
    	if($page == "list"){
	        return redirect('artwork/'.$user_id);
    	}else{
    		return redirect('view_artwork/'.$id);
    	}
    }
}
