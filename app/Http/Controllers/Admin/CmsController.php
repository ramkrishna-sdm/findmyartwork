<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CmsController extends Controller
{
    public function test()
    {
        return view('index');
    }
}