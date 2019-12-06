<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtistUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');

        $this->request = $request;
    }

    public function index(){
    	return view('artist.artist_dashboard');
    }

    public function add_artwork(){
        return view('artist.add_artwork');
    }
    public function upload_artwork(){
        dd('hii');
    }

}
