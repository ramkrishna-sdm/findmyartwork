 @include('layouts.frontend.header')
<!-- Artworks Section -->
<section class="artworksSection">
 <div class="container">
    <div class="row">
       <div class="col-12 col-md-4 col-lg-3">
          <div class="galleryFilters">
             <h4>Filters</h4>

             <div class="filterBlock">
                <ul class="list-group gallery-list-group">
                   <li class="list-group-item"><a href="javascript:;"><span class="artType"><div class="image"><img src="{{asset('assets/images/paintings-icon.jpg')}}" alt=""></div> Paintings</span> <span class="artNumbers">(1002)</span></a></li>
                   <li class="list-group-item"><a href="javascript:;"><span class="artType"><div class="image"><img src="{{asset('assets/images/drawings-icon.jpg')}}" alt=""></div> Drawings</span> <span class="artNumbers">(365)</span></a></li>
                   <li class="list-group-item active"><a href="javascript:;"><span class="artType"><div class="image"><img src="{{asset('assets/images/digitalarts-icon.jpg')}}" alt=""></div> Digital Arts</span> <span class="artNumbers">(5263)</span></a></li>
                   <li class="list-group-item"><a href="javascript:;"><span class="artType"> <div class="image"><img src="{{asset('assets/images/digitalarts-icon.jpg')}}" alt=""></div> Photography</span> <span class="artNumbers">(1155)</span></a></li>
                   <li class="list-group-item"><a href="javascript:;"><span class="artType"> <div class="image"><img src="{{asset('assets/images/digitalarts-icon.jpg')}}" alt=""></div> Sculptures</span> <span class="artNumbers">(1090)</span></a></li>
                </ul>   
             </div>
             
             <div class="filterBlock">
                <ul class="list-group gallery-list-group">
                   <li class="list-group-item"><a href="javascript:;"><span class="artType">2019 Collections</span> <span class="artNumbers">(1256)</span></a></li>
                   <li class="list-group-item"><a href="javascript:;"><span class="artType">2018 Collections</span> <span class="artNumbers">(5236)</span></a></li>
                   <li class="list-group-item"><a href="javascript:;"><span class="artType">2017 Collections</span> <span class="artNumbers">(7842)</span></a></li>
                   <li class="list-group-item"><a href="javascript:;"><span class="artType">2016 Collections</span> <span class="artNumbers">(1152)</span></a></li>
                   <li class="list-group-item"><a href="javascript:;"><span class="artType">2015 Collections</span> <span class="artNumbers">(1524)</span></a></li>
                </ul>   
             </div>
          </div>
       </div>

       <div class="col-12 col-md-8 col-lg-9">
          <div class="sorter">
             <div class="container d-flex align-items-center justify-content-between">
                <h3>Paintings</h3>
                <div class="form-group">
                   <span class="input-icon"><img src="{{asset('assets/images/dropdown.svg')}}" alt=""></span>
                   <select  id="" class="form-control">
                      <option value="" selected="true" disabled>Sort By</option>
                      <option value="">Trending</option>
                      <option value="">Latest</option>
                      <option value="">Popular</option>
                   </select>
                </div>
             </div>
          </div>

          <!-- Top Artworks Section -->
          <section class="galleryImages">
             <div class="container">
                <div class="sectionHeading headingSpace">
                   <h2 >Gallery</h2>
                </div>
             </div>

             <div class="artwork-images" id="artwork-images">
                   <div class="row">
                         <div class="col-lg-4 col-md-6">
                            <div class="artPost">
                               <div class="postHeader">
                                  <div class="username">
                                     <div class="image"><img src="{{asset('assets/images/profile-sm.jpg')}}" alt=""></div>
                                     <span class="name">Amenda Berry</span>
                                  </div>
                                  <span class="Posted">2 hours ago</span>
                               </div>
                               <div class="postImage">
                                  <a href="#"><img src="{{asset('assets/images/post.jpg')}}" alt=""></a> 
                               </div>
                               <div class="postFooter">
                                  <div class="leftBlock">
                                     <h5>The Wave</h5>
                                     <h6>$2076</h6>
                                  </div>
                                  <div class="rightBlock">
                                     <span class="likes">456 Likes</span> 
                                     <div class="actionIcons">
                                        <a href="#"><img src="{{asset('assets/images/like.png')}}" alt=""></a>
                                        <a href="#"><img src="{{asset('assets/images/dislike.png')}}" alt=""></a>
                                        <a href="#"><img src="{{asset('assets/images/saved.png')}}" alt=""></a>
                                     </div>
                                  </div>
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
                                     </div>
                                  </div>
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
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>

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
                                        </div>
                                     </div>
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
                                        </div>
                                     </div>
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
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
             </div>
             
             <div class="container">
                <div class="row">
                   <div class="col-lg-12  py-4 border d-flex paginationContainer">
                      <ul class="pagination mx-auto">
                         <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                               <span aria-hidden="true"> <img src="assets/images/left-arrow.svg" alt=""> Previous</span>
                            </a>
                         </li>
                         <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                         </li>
                         <li class="page-item"><a class="page-link" href="#">2</a></li>
                         <li class="page-item"><a class="page-link" href="#">3</a></li>
                         <li class="page-item"><a class="page-link" href="#">4</a></li>
                         <li class="page-item"><a class="page-link" href="#">5</a></li>
                         <li class="page-item"><a class="page-link" href="#">6</a></li>
                         <li class="page-item"><a class="page-link" href="#">.....</a></li>
                         <li class="page-item"><a class="page-link" href="#">87</a></li>
                         <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                               <span aria-hidden="true">Next <img src="{{asset('assets/images/right-arrow.svg')}}" alt=""></span>
                            </a>
                         </li>
                      </ul>
                   </div>
                </div>
             </div>
          </section>
          <!-- End Top Artworks Section -->
       </div>
    </div>
 </div>
</section>
<!-- End Artworks Section -->
@include('layouts.frontend.comman_footer')