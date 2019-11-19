<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\GalleryUserRepository;
use Validator;
use Exception;
use Session;
use Mail;
use DB;
use Hash;
use Cookie;
use Segment;
use DateTime;

class BuyerController extends Controller
{
    /**
    * Construction function
    * @param $request(Array), $galleryUserRepository
    * @return 
    *
    * Created By: Ram Krishna Murthy
    * Created At: 
    */
    public function __construct(Request $request, GalleryUserRepository $galleryUserRepository)
    {
        $this->request = $request;
        $this->galleryUserRepository = $galleryUserRepository;
    }
}
