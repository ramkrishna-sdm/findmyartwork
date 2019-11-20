<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    public function __construct(Request $request, ArtworkRepository $artworkRepository, ArtworkImageRepository $artworkImageRepository, VariantRepository $variantRepository)
    {
        $this->request = $request;
        $this->artworkRepository = $artworkRepository;
        $this->artworkImageRepository = $artworkImageRepository;
        $this->variantRepository = $variantRepository;
    }
}
