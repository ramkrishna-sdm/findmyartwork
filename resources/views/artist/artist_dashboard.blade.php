@extends('layouts.frontend.artist.app', [
    'class' => '',
    'elementActive' => 'dashboard',
])
@section('content')
 <div class="container">
    <div class="row">

    <div class="dashboardHome container-medium">
      <h1 class="text-big text-bold">Good Evening sam<!-- -->!</h1>
      <p class="text-medium text-thin">Here is what is happening with your ArtViaYou profile lately.</p>
    </div>
  </div>

 </div>

    <div class="row dashBoardRow">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big  icon-warning">
                  <i class="nc-icon nc-favourite-28 text-primary"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Likes</p>
                  <p class="card-title">0
                    <p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big unlikeIcon  icon-warning">
                  <i class="nc-icon nc-favourite-28 text-primary"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Un-Likes</p>
                  <p class="card-title">0
                    <p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big  icon-warning">
                  <i class="nc-icon nc-single-02 text-primary"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Followers</p>
                  <p class="card-title">+0
                    <p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      	<div class="col-md-6">
	        <div class="card ">
	          <div class="card-header ">
	            <h5 class="card-title">Start your gallery</h5>
	            <p class="card-category">Your gallery is empty. For now, buyers and other artists won’t see you on ArtViaYou.</p>
	            <p class="card-category">Your gallery is empty. For now, buyers and other artists won’t see you on ArtViaYou.</p>
	          </div>
	          <div class="card-body ">
	            <a  href="{{ url('/artist/add_artwork') }}" class="btn btn-outline-primary">Add your first artwork<i class="icon-arrow-right-long right"></i></a>
	          </div>
	          
	        </div>
      	</div>
    </div>
@endsection