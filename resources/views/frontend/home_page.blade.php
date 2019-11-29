
 @include('layouts.header')
   <!-- Banner/Slider -->
         <div class="message-alert-top">
             @if(Session::has('success'))
             <div><div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success_message') !!}</em></div></div>
             @endif
             @if(Session::has('error'))
             <div><div class="alert alert-danger"><em> {!! session('error_message') !!}</em></div></div>
             @endif
         </div>
         <section class="banner">
            <div class="banner-content align-items-center customCarousel carousel slide" id="bannerCarousel"  data-ride="carousel">
               <div class="carousel-inner">
                  <!-- Carousel Item -->
                  <div class="carousel-item active ">
                     @foreach($homes as $key => $home)
                     <div class="bannerImg align-items-center" style="background-image: url({{$home->first_img_url}}); background-size: cover;">
                        <div class="container text-left">
                           <h3>{{$home->title}}</h3>
                           <p class="mt-3">{{strip_tags($home->des_first)}}</p>
                           <a href="#" class="btn btn-default btn-lg mt-4">SELL NOW</a>
                        </div>
                     </div>
                     @endforeach
                  </div>
                  <!-- //Carousel Item -->
               </div>
            </div>
         </section>
         <!-- End Banner/Slider -->
         <!-- Start Category Section -->
         <section class="Categories">
            <div class="container">
               <div class="categoryList">
                  <!-- Category Item -->
                  @foreach($categories as $key => $category)

                  <div class="categoryItem">
                     <a href="#">
                        <div class="image"><img src="{{$category->media_url}}" alt=""></div>
                        <h3>{{$category->name}}</h3>
                     </a>
                  </div>
                  @endforeach
                  
               </div>
            </div>
         </section>
         <!-- End Category Section -->
         <!-- Featured Artwork -->
         <section class="featuredArt">
            <div class="featuredImage">
               <img src="{{$featuredArtworks->artwork_images[1]->media_url}}" alt="">
            </div>
            <div class="featuredDetail">
               <h4>Featured Art</h4>
               <h1>{{$featuredArtworks->title}}</h1>
               <p>{{$featuredArtworks->description}} </p>
               <div class="specifications"> <span class="dimension">65 .45 x 55.35 in</span> <span class="weight">Weight : 10Kg</span></div>
               <h2>Price: ${{$featuredArtworks->variants[0]->price}}</h2>
               <div class="col-lg-5 pl-0">
                  <a href="#" class="btn btn-default btn-lg btn-block">BUY NOW</a>
               </div>
            </div>
         </section>
         <!--End Featured Artwork -->
         <!-- Top Artworks Section -->
         <section class="topArtworks">
            <div class="container">
               <div class="sectionHeading">
                  <h2 >Top Artworks</h2>
               </div>
            </div>
            <div class="container">
               <div class="row">

                 
                   <div class="artistSLider owl-carousel artistCarousel">
                         @foreach($topartworks as $key => $artwork)
                        <div class="artPost">
                           <div class="postHeader">
                              <div class="username">
                                 <div class="image" style="width: 43px; height: 44px;"><a href="/profile_details"><img src="{{$artwork->artist->media_url}}" alt=""></a></div>
                                 <span class="name">{{$artwork->artist->first_name}} {{$artwork->artist->last_name}}</span>
                              </div>
                              <span class="Posted">2 hours ago</span>
                           </div>
                           <div class="postImage">
                             <a href="#"><img src="{{$artwork->artwork_images[1]->media_url}}" alt=""></a> 
                           </div>
                           <div class="postFooter">
                              <div class="leftBlock">
                                 <h5>{{$artwork->title}}</h5>
                                 <h6>${{$artwork->variants[0]->price}}</h6>
                              </div>
                              <div class="rightBlock">
                                 <span class="likes">456 Likes</span> 
                                 <div class="actionIcons">
                     <a href="#"><img src="assets/images/like.png" alt=""></a>
                     <a href="#"><img src="assets/images/dislike.png" alt=""></a>
                     <a href="#"><img src="assets/images/saved.png" alt=""></a>
                     </div></div>
                     </div>
                     </div>
                    @endforeach
                
                   </div>
              
               
                 <!--  <div class="col-lg-4 col-md-6">
              
                        <div class="artPost">
                           <div class="postHeader">
                              <div class="username">
                                 <div class="image"><img src="assets/images/profile-sm.jpg" alt=""></div>
                                 <span class="name">Amenda Berry</span>
                              </div>
                              <span class="Posted">2 hours ago</span>
                           </div>
                           <div class="postImage">
                                <a href="#"><img src="assets/images/post.jpg" alt=""></a>
                           </div>
                           <div class="postFooter">
                              <div class="leftBlock">
                                 <h5>The Wave</h5>
                                 <h6>$2076</h6>
                              </div>
                              <div class="rightBlock">
                                 <span class="likes">456 Likes</span> 
                                 <div class="actionIcons">
                     <a href="#"><img src="assets/images/like.png" alt=""></a>
                     <a href="#"><img src="assets/images/dislike.png" alt=""></a>
                     <a href="#"><img src="assets/images/saved.png" alt=""></a>
                     </div></div>
                     </div>
                     </div>
               
                  </div> -->
                 <!--  <div class="col-lg-4 col-md-6">
                
                        <div class="artPost">
                           <div class="postHeader">
                              <div class="username">
                                 <div class="image"><img src="assets/images/profile-sm.jpg" alt=""></div>
                                 <span class="name">Amenda Berry</span>
                              </div>
                              <span class="Posted">2 hours ago</span>
                           </div>
                           <div class="postImage">
                                <a href="#"> <img src="assets/images/post.jpg" alt=""></a>
                           </div>
                           <div class="postFooter">
                              <div class="leftBlock">
                                 <h5>The Wave</h5>
                                 <h6>$2076</h6>
                              </div>
                              <div class="rightBlock">
                                 <span class="likes">456 Likes</span> 
                                 <div class="actionIcons">
                     <a href="#"><img src="assets/images/like.png" alt=""></a>
                     <a href="#"><img src="assets/images/dislike.png" alt=""></a>
                     <a href="#"><img src="assets/images/saved.png" alt=""></a>
                     </div></div>
                     </div>
                     </div>
                    
                  </div> -->
               </div>
            </div>
         </section>
         <!-- End Top Artworks Section -->
         <!-- Top Artists Section -->
         <section class="topArtworks topArtists">
            <div class="container">
               <div class="sectionHeading">
                  <h2 >Top Artists</h2>
               </div>
            </div>
            <div class="container">
               <div class="row">
                  @foreach($topartists as $key => $artist)
                  <div class="col-lg-4 col-md-6">
                            <div class="artPost">
                           <div class="postHeader">
                              <div class="username">
                                 <div class="image">
                                    <div class="profile_img"><a href="/profile_details"><img src="{{$artist->artist->media_url}}" alt=""></a></div>
                                 </div>
                                 <span class="name">{{$artist->artist->first_name}} {{$artist->artist->last_name}}</span>
                              </div>
                              <span class="Posted">2 hours ago</span>
                           </div>
                           <div class="postImage">
                                <a href="#"> <img src="{{$artist->artwork_images[1]->media_url}}" alt=""></a>
                           </div>
                           <div class="postFooter">
                              <div class="leftBlock">
                                 <h5>{{$artist->title}}</h5>
                                 <h6>${{$artist->variants[0]->price}}</h6>
                              </div>
                              <div class="rightBlock">
                                 <span class="likes">456 Likes</span> 
                                 <div class="actionIcons">
                     <a href="#"><img src="assets/images/like.png" alt=""></a>
                     <a href="#"><img src="assets/images/dislike.png" alt=""></a>
                     <a href="#"><img src="assets/images/saved.png" alt=""></a>
                     </div></div>
                     </div>
                     </div>
                 
                  </div>
                  @endforeach
                <!--   <div class="col-lg-4 col-md-6">
                    
                        <div class="artPost">
                           <div class="postHeader">
                              <div class="username">
                                 <div class="image"><img src="assets/images/profile-sm.jpg" alt=""></div>
                                 <span class="name">Amenda Berry</span>
                              </div>
                              <span class="Posted">2 hours ago</span>
                           </div>
                           <div class="postImage">
                                <a href="#"> <img src="assets/images/colorfull.png" alt=""></a>
                           </div>
                           <div class="postFooter">
                              <div class="leftBlock">
                                 <h5>The Wave</h5>
                                 <h6>$2076</h6>
                              </div>
                              <div class="rightBlock">
                                 <span class="likes">456 Likes</span> 
                                 <div class="actionIcons">
                     <a href="#"><img src="assets/images/like.png" alt=""></a>
                     <a href="#"><img src="assets/images/dislike.png" alt=""></a>
                     <a href="#"><img src="assets/images/saved.png" alt=""></a>
                     </div></div>
                     </div>
                     </div>
                  
                  </div> -->
                 <!--  <div class="col-lg-4 col-md-6">
                   
                        <div class="artPost">
                           <div class="postHeader">
                              <div class="username">
                                 <div class="image"><img src="assets/images/profile-sm.jpg" alt=""></div>
                                 <span class="name">Amenda Berry</span>
                              </div>
                              <span class="Posted">2 hours ago</span>
                           </div>
                           <div class="postImage">
                                <a href="#"> <img src="assets/images/post.jpg" alt=""></a>
                           </div>
                           <div class="postFooter">
                              <div class="leftBlock">
                                 <h5>The Wave</h5>
                                 <h6>$2076</h6>
                              </div>
                              <div class="rightBlock">
                                 <span class="likes">456 Likes</span> 
                                 <div class="actionIcons">
                     <a href="#"><img src="assets/images/like.png" alt=""></a>
                     <a href="#"><img src="assets/images/dislike.png" alt=""></a>
                     <a href="#"><img src="assets/images/saved.png" alt=""></a>
                     </div></div>
                     </div>
                     </div>
                   
                  </div> -->
               </div>
               <!-- <div class="row">
                  <div class="col-lg-4 col-md-6">
                   
                        <div class="artPost">
                           <div class="postHeader">
                              <div class="username">
                                 <div class="image"><img src="assets/images/profile-sm.jpg" alt=""></div>
                                 <span class="name">Amenda Berry</span>
                              </div>
                              <span class="Posted">2 hours ago</span>
                           </div>
                           <div class="postImage">
                                <a href="#"> <img src="assets/images/post.jpg" alt=""></a>
                           </div>
                           <div class="postFooter">
                              <div class="leftBlock">
                                 <h5>The Wave</h5>
                                 <h6>$2076</h6>
                              </div>
                              <div class="rightBlock">
                                 <span class="likes">456 Likes</span> 
                                 <div class="actionIcons">
                     <a href="#"><img src="assets/images/like.png" alt=""></a>
                     <a href="#"><img src="assets/images/dislike.png" alt=""></a>
                     <a href="#"><img src="assets/images/saved.png" alt=""></a>
                     </div></div>
                     </div>
                     </div>
                    
                  </div>
                  <div class="col-lg-4 col-md-6">
                   
                        <div class="artPost">
                           <div class="postHeader">
                              <div class="username">
                                 <div class="image"><img src="assets/images/profile-sm.jpg" alt=""></div>
                                 <span class="name">Amenda Berry</span>
                              </div>
                              <span class="Posted">2 hours ago</span>
                           </div>
                           <div class="postImage">
                                <a href="#"><img src="assets/images/post.jpg" alt=""></a>
                           </div>
                           <div class="postFooter">
                              <div class="leftBlock">
                                 <h5>The Wave</h5>
                                 <h6>$2076</h6>
                              </div>
                              <div class="rightBlock">
                                 <span class="likes">456 Likes</span> 
                                 <div class="actionIcons">
                     <a href="#"><img src="assets/images/like.png" alt=""></a>
                     <a href="#"><img src="assets/images/dislike.png" alt=""></a>
                     <a href="#"><img src="assets/images/saved.png" alt=""></a>
                     </div></div>
                     </div>
                     </div>
                  
                  </div>
                  <div class="col-lg-4 col-md-6">
                 
                        <div class="artPost">
                           <div class="postHeader">
                              <div class="username">
                                 <div class="image"><img src="assets/images/profile-sm.jpg" alt=""></div>
                                 <span class="name">Amenda Berry</span>
                              </div>
                              <span class="Posted">2 hours ago</span>
                           </div>
                           <div class="postImage">
                                <a href="#"> <img src="assets/images/post.jpg" alt=""></a>
                           </div>
                           <div class="postFooter">
                              <div class="leftBlock">
                                 <h5>The Wave</h5>
                                 <h6>$2076</h6>
                              </div>
                              <div class="rightBlock">
                                 <span class="likes">456 Likes</span> 
                                 <div class="actionIcons">
                     <a href="#"><img src="assets/images/like.png" alt=""></a>
                     <a href="#"><img src="assets/images/dislike.png" alt=""></a>
                     <a href="#"><img src="assets/images/saved.png" alt=""></a>
                     </div></div>
                     </div>
                     </div>
                 
                  </div>
               </div> -->
            </div>
            <div class="container text-center mt-5">
               <a href="/artist" class="btn btn-default">VIEW ALL</a>
            </div>
         </section>
         <!-- End Top Artists Section -->
         @include('layouts.comman_footer')
      