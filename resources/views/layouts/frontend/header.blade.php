<?php  
use \App\Http\Controllers\Frontend\HomeController;
HomeController::header_counter(); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.ico')}}">
    <title>:: ArtViaYou ::</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Theme CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

  </head>
  <body>
    <div id="loader_gif">
      <img src="{{asset('assets/images/loader.gif')}}">
    </div>
    <!-- Wrapper -->
    <div class="wrapper">
      <!-- Header Navigation -->
      <nav class="navbar navbar-expand-lg navbar-header flex-column">
        <!-- Top Bar -->
        <div class="topbar">
          <div class="container d-flex ">
            <!-- <ul class="navbar-nav mr-auto topBarOptions">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Country
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">USA</a>
                  <a class="dropdown-item" href="#">UNITED KINGDOM</a>
                  
                  
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Sizes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">CM</a>
                  <a class="dropdown-item" href="#">INCHES</a>
                  
                </div>
              </li>
            </ul> -->
            
            <div class="collapse navbar-collapse mainNavbar" id="navbarToggle">
              <ul class="navbar-nav nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('artworks')}}">Artwork</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('about_us')}}">About</a></li>
                <li class="nav-item"><a href="{{url('contact_us')}}" class="nav-link">Contact</a></li>
                 @if (Auth::user())
                    <li class="nav-item"><a href="/{{Auth::user()->role}}/chat" class="nav-link">Chat</a></li>
                 @endif
              </ul>
            </div>
          </div>
        </div>
        <!-- Top Bar -->
        <!-- Header -->
        <div class="header">
          <div class="container d-flex align-items-center flex-wrap">
            <a class="navbar-brand" href="/"><img src="{{asset('assets/images/logo.png')}}" alt="" class="img-fluid" /></a>
              <div class="searchbar">
                <form method="get" action="{{ url('/filter_search') }}" autocomplete="off">
                  <input type="hidden" name="data_from" value="form">
                  <input id="site_filter" type="text" class="form-control" name="filter_key" placeholder="Search for paintings, drawings">
                  <button class="btn-search" type="submit"><img src="{{asset('assets/images/search.svg')}}" alt="" /></button>
                  <div class="filter_result">
                    
                  </div>
                </form>
              </div>
            <div class="ml-auto d-flex align-items-center">
              <ul class="navbar-nav nav navbar-icon navbar-icons-only align-items-center">
                <li class="nav-item" ><a class="nav-link" href="{{url('items_cart')}}"><img src="{{asset('assets/images/shopping-cart.svg')}}" alt="" /><span class="count cart_count">{{session('cart_count')}}</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('saved_artwork')}}"><img src="{{asset('assets/images/saved.svg')}}" alt="" /><span class="count saved_count">{{session('saved_count')}}</span></a></li>

                @if (Auth::user())
                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><img src="{{asset('assets/images/avatar.svg')}}" alt="" />
                    {{ Auth::user()->first_name }} <span class="caret"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/{{Auth::user()->role}}/dashboard">Dashboard</a>
                  <a class="dropdown-item" href="/{{Auth::user()->role}}/profile/{{Auth::user()->id}}">My Profile</a>
                    <a class="dropdown-item" href="{{ url('logout') }}"> {{ __('Logout') }} </a>
                  </div>
                </li>
                @else
                <li class="nav-divider"></li>
                @endif

                <!-- <li class="nav-item"><a class="nav-link" href="javascript:void(0);"><img src="{{asset('assets/images/avatar.svg')}}" alt="" /></a></li> -->
              </ul>
              <ul class="navbar-nav nav navbar-icon  align-items-center">
                @if (Auth::user())
                
                @else
                <li class="nav-btn"><a href="#" class="btn btn-default" data-toggle="modal" data-target="#LoginModal" id="show-toaster">SIGN IN</a></li>
                @endif
                <li class="humburger-btn"><button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                </button></li>
              </ul>
              
            </div>
          </div>
        </div>
        <!-- //Header -->
      </nav>
      <!-- End Header Navigation -->