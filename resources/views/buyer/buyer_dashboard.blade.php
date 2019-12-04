 @include('layouts.frontend.header')
<!-- Artworks Section -->
<section class="artworksSection">
 <div class="container">
    <div class="row">
       <div class="col-12 col-md-4 col-lg-3">
          <div class="artworkfilters">
             <div class="artworkSorting">
                <h4>Filters</h4>
                <div class="filterBlock">
                   <h5>Artworks <i class="fas fa-caret-right"></i></h5>
                   <ul>
                      <li class="active"><a href="javascript:;">Paintings</a> <span class="float-right">(4635)</span></li>
                      <li><a href="javascript:;">Drawings</a> <span class="float-right">(1635)</span> </li>
                      <li><a href="javascript:;">Digital art</a> <span class="float-right">(2635)</span></li>
                      <li><a href="javascript:;">Photography</a> <span class="float-right">(4635)</span></li>
                      <li><a href="javascript:;">Sculptures</a> <span class="float-right">(6645)</span></li>
                   </ul>             
                </div>
             </div> 


             <div class="filterBlock">
                <h5>Price</h5>
                <div class="form-group">
                   <input type="range" class="custom-range" id="customRange1">
                   <div class="price-fields clearfix">
                      <input type="text" value="$50" class="float-left">  
                      <input type="text" value="$999999" class="float-right">
                   </div>
                </div>
             </div>

             <div class="filterBlock">
                <h5>Size</h5>
                <div class="form-group">
                   <div class="size-space">
                      <div class="text-right"><span class="unit">Height</span></div>
                      <input type="range" class="custom-range" id="customRange1">
                      <div class="price-fields d-flex justify-content-between">
                         <input type="text" value="$50">  <input type="text" value="$999999">
                      </div>
                   </div>

                   <div class="size-space">
                      <div class="text-right"><span class="unit">Width</span></div>
                      <input type="range" class="custom-range" id="customRange1">
                      <div class="price-fields d-flex justify-content-between">
                         <input type="text" value="$50">  <input type="text" value="$999999">
                      </div>
                   </div>
                </div>
             </div>

             <div class="filterBlock no-border">
                <div class="form-group">
                   <select name="" id="" class="form-control">
                      <option value="" selected="true" disabled="disabled">Style</option>
                      <option value="">Style 1</option>
                      <option value="">Style 2</option>
                      <option value="">Style 3</option>
                   </select>
                </div>
             </div>

                
             <div class="filterBlock no-border">
                <div class="form-group">
                   <select name="" id="" class="form-control">
                      <option value="" selected="true" disabled="disabled">Subject</option>
                      <option value="">Style 1</option>
                      <option value="">Style 2</option>
                      <option value="">Style 3</option>
                   </select>
                </div>
             </div>

             <div class="filterBlock">
                <h5>Type</h5>
                <div class="form-group">
                   <div class="custom-control custom-checkbox d-flex align-items-center">
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">Limited Periods</label>
                   </div>
                   <div class="custom-control custom-checkbox d-flex align-items-center">
                      <input type="checkbox" class="custom-control-input" id="customCheck2">
                      <label class="custom-control-label" for="customCheck2">Originals</label>
                   </div>
                   <div class="custom-control custom-checkbox d-flex align-items-center">
                      <input type="checkbox" class="custom-control-input" id="customCheck3">
                      <label class="custom-control-label" for="customCheck3">Prints</label>
                   </div>
                </div>
             </div>
             <div class="btn btn-default btn-block mt-3">reset filters</div>
          </div>
       </div>
       
       <div class="col-12 col-md-8 col-lg-9">
          <div class="sorter">
             <div class="container d-flex align-items-center justify-content-between">
                <h3>Paintings <span class="count">(4635) &nbsp;&nbsp;></span> <span class="property">Abstract</span></h3>
                <div class="form-group">
                   <span class="input-icon"><img src="{{asset('assets/images/dropdown.svg')}}" alt=""></span>
                   <select  id="" class="form-control">
                      <option value="">Sort by</option>
                      <option value="">Trending</option>
                      <option value="">Latest</option>
                      <option value="">Popular</option>
                   </select>
                </div>
             </div>
          </div>
          
          <!-- Start Category Section -->
          <section class="Categories">
             <div class="container">
                <div class="categoryList">
                   <!-- Category Item -->
                   <div class="categoryItem">
                      <a href="#">
                         <div class="image"><img src="{{asset('assets/images/paintings.jpg')}}" alt=""></div>
                         <h3>Paintings</h3>
                      </a>
                   </div>
                   <!-- //Category Item -->
                   <!-- Category Item -->
                   <div class="categoryItem">
                      <a href="#">
                         <div class="image"><img src="{{asset('assets/images/drawings.jpg')}}" alt=""></div>
                         <h3>Drawings</h3>
                      </a>
                   </div>
                   <!-- //Category Item -->
                   <!-- Category Item -->
                   <div class="categoryItem">
                      <a href="#">
                         <div class="image"><img src="{{asset('assets/images/digitalarts.jpg')}}" alt=""></div>
                         <h3>Digital Arts</h3>
                      </a>
                   </div>
                   <!-- //Category Item -->
                   <!-- Category Item -->
                   <div class="categoryItem">
                      <a href="#">
                         <div class="image"><img src="{{asset('assets/images/photography.jpg')}}" alt=""></div>
                         <h3>Photography</h3>
                      </a>
                   </div>
                   <!-- //Category Item -->
                   <!-- Category Item -->
                   <div class="categoryItem">
                      <a href="#">
                         <div class="image"><img src="{{asset('assets/images/scul.jpg')}}" alt=""></div>
                         <h3>Sculptures</h3>
                      </a>
                   </div>
                   <!-- //Category Item -->
                </div>
             </div>
          </section>
          <!-- End Category Section -->
          
          <!-- Top Artworks Section -->
          <section class="topArtworks">
             <div class="container">
                <div class="sectionHeading">
                   <h2 >Top Artworks</h2>
                </div>
             </div>
             <div class="container">
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
                               <div class="image"><img src="{{asset('assets/images/profile-sm.jpg')}}" alt=""></div>
                               <span class="name">Amenda Berry</span>
                            </div>
                            <span class="Posted">2 hours ago</span>
                         </div>
                         <div class="postImage">
                            <a href="#"> <img src="{{asset('assets/images/post.jpg')}}" alt=""></a>
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
                               <div class="image"><img src="{{asset('assets/images/profile-sm.jpg')}}" alt=""></div>
                               <span class="name">Amenda Berry</span>
                            </div>
                            <span class="Posted">2 hours ago</span>
                         </div>
                         <div class="postImage">
                            <a href="#"> <img src="{{asset('assets/images/post.jpg')}}" alt=""></a>
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
                </div>

                <div class="row">
                   <div class="col-lg-12  py-4 border d-flex paginationContainer">
                      <ul class="pagination mx-auto">
                         <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true"> <img src="{{asset('assets/images/left-arrow.svg')}}" alt=""> Previous</span></a></li>
                         <li class="page-item active"><a class="page-link" href="#">1</a></li>
                         <li class="page-item"><a class="page-link" href="#">2</a></li>
                         <li class="page-item"><a class="page-link" href="#">3</a></li>
                         <li class="page-item"><a class="page-link" href="#">4</a></li>
                         <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">Next <img src="{{asset('assets/images/right-arrow.svg')}}" alt=""></span></a></li>
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