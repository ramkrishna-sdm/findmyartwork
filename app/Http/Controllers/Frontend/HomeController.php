<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
       
        return view('frontend/home_page');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    
}
