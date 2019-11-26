
 @include('layouts.header')
   <!-- Banner/Slider -->
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
               <img src="assets/images/featured.png" alt="">
            </div>
            <div class="featuredDetail">
               <h4>Featured Art</h4>
               <h1>The Animal kingdom</h1>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
               <div class="specifications"> <span class="dimension">65 .45 x 55.35 in</span> <span class="weight">Weight : 10Kg</span></div>
               <h2>Price: $9456</h2>
               <div class="col-lg-5pl-0">
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
                  @foreach($artworks as $key => $artwork)
                  <div class="col-lg-4 col-md-6">
                        <div class="artPost">
                           <div class="postHeader">
                              <div class="username">
                                 <div class="image"><img src="assets/images/profile-sm.jpg" alt=""></div>
                                 <span class="name">{{$artwork->artist->first_name}} {{$artwork->artist->last_name}}</span>
                              </div>
                             <!--  <?php
                              $now = time(); // or your date as well
                              $your_date = strtotime($artwork->artist->created_at);
                              $datediff = $now - $your_date;

                              echo round($datediff / (60 * 60 * 24)); 
                              ?> -->
                              <span class="Posted">2 hours ago</span>
                           </div>
                           <div class="postImage">
                             <a href="#"><img src="{{$artwork->category_detail->media_url}}" alt=""></a> 
                           </div>
                           <div class="postFooter">
                              <div class="leftBlock">
                                 <h5>{{$artwork->category_detail->name}}</h5>
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
                 @endforeach
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
               <!--    <div class="col-lg-4 col-md-6">
                    
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
               <a href="#" class="btn btn-default">VIEW ALL</a>
            </div>
         </section>
         <!-- End Top Artists Section -->
         @include('layouts.comman_footer')
      