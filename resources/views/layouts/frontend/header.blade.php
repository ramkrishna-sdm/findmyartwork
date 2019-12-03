<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.ico')}}">
    <title>:: Mobile Application Development Company & Office 365 Professional ::</title>
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
  </head>
  <body>
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
            
            <div class="collapse navbar-collapse mainNavbar"   id="navbarToggle">
              <ul class="navbar-nav nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Artwork</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="/about_us">About</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
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
              <input type="text" class="form-control" placeholder="Search for paintings, drawings">
              <button class="btn-search" type="button"><img src="{{asset('assets/images/search.svg')}}" alt="" /></button>
            </div>
            <div class="ml-auto d-flex align-items-center">
              <ul class="navbar-nav nav navbar-icon navbar-icons-only align-items-center">
                <li class="nav-item" ><a class="nav-link" href="#"><img src="{{asset('assets/images/shopping-cart.svg')}}" alt="" /><span class="count">5</span></a></li>
                <li class="nav-item"><a class="nav-link" href="/save_artist"><img src="{{asset('assets/images/saved.svg')}}" alt="" /><span class="count">5</span></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><img src="{{asset('assets/images/avatar.svg')}}" alt="" /></a></li>
                <li class="nav-divider"></li>
              </ul>
              <ul class="navbar-nav nav navbar-icon  align-items-center">
                @if (Auth::user())
                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->first_name }} <span class="caret"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </div>
                </li>
                @else
                <li class="nav-btn"><a href="#" class="btn btn-default" data-toggle="modal" data-target="#LoginModal">SIGN IN</a></li>
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