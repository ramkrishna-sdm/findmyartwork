@include('layouts.frontend.header')
<!-- Page Header Title -->
<div class="page-title">
<div class="page-title-inner">
   <span class="pagetitleText">trending artists</span> 
   <img src="{{asset('assets/images/artists-graphic.svg')}}" class="title-img" alt="">
</div>
</div>
<!--End Page Header Title -->
<div class="sorter">
<div class="container d-flex align-items-center justify-content-between">
   <h3>Artists</h3>
   <!-- <div class="form-group">
      <span class="input-icon"><img src="{{asset('assets/images/dropdown.svg')}}" alt=""></span>
      <select  id="" class="form-control">
         <option value="">Trending</option>
         <option value="">Latest</option>
         <option value="">Popular</option>
      </select>
   </div> -->
</div>
</div>
<!-- Trending Artists Page  -->
<section class="TrendingArtists">
<div class="container">
   @if(!empty($artists) > 0)
   @foreach($artists as $key => $artist)
   <div class="artistContainer">
      <div class="artistHeader d-flex justify-content-between">
         <div class="artistHeaderLeft d-flex justify-content-between align-items-center">
            <div class="image"><img src="{{$artist->media_url}}"  alt=""></div>
            <div class="nameFollowers">
               <span class="name">{{$artist->first_name}} {{$artist->last_name}}</span>
               <span class="followersNum">(50k followers)</span>
            </div>
            <a href="#" class="btn btn-border btn-sm">Follow</a>
         </div>
         <div class="artistHeaderRight d-flex justify-content-between align-items-center">
            <span class="artworkNumber"><img src="{{asset('assets/images/artworkIcon.svg')}}" alt=""> {{count($artist->artworks)}} artworks</span>
         </div>
      </div>
      <div class="artistSLider">
         <div class="owl-carousel artistCarousel">
            @foreach($artist->artworks as $artwork)
            <div class="artPost">
               <div class="postImage">

                  <a href="#"> <img src="{{$artwork->artwork_images[0]->media_url}}" alt=""></a>
               </div>
               <div class="postFooter">
                  <div class="leftBlock">
                     <h5>{{$artwork->title}}</h5>
                     <h6>$2076</h6>
                  </div>
                  <div class="rightBlock">
                     <span class="likes">456 Likes</span> 
                     <div class="actionIcons">
                        <a href="#"><img src="{{asset('assets/images/like.png')}}" alt=""></a>
                        <a href="#"><img src="{{asset('assets/images/saved.png')}}" alt=""></a>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
            
         </div>
      </div>
   </div>
   @endforeach
   @endif

</div>

<div class="container">
  
    <div class="col-lg-12  py-4 border d-flex paginationContainer">
        <ul class="pagination mx-auto">
            <!-- <li class="page-item disabled">
                <a class="page-link" href="http://127.0.0.1:8000/artist?page=1" aria-label="Previous">
                    <span aria-hidden="true"> <img src="{{asset('assets/images/left-arrow.svg')}}" alt=""> Previous</span>
                </a>
            </li> -->
              {{ $artists->onEachSide(1)->links() }}
           <!--  <li class="page-item">
                <a class="page-link" href="http://127.0.0.1:8000/artist?page=2" aria-label="Next">
                    <span aria-hidden="true">Next <img src="{{asset('assets/images/right-arrow.svg')}}" alt=""></span>
                    
                </a>
            </li> -->
        </ul>
    </div>
     
  </div>
</section>
<!--End Trending Artists Page  -->
@include('layouts.frontend.comman_footer')