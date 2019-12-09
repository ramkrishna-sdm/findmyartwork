@include('layouts.frontend.header')
<!-- Artworks Section -->
<section class="artworksSection">
   <div class="container">
      <div class="row">
         <div class="col-md-4 col-lg-3">
            <div class="artworkfilters">
               <div class="artworkSorting">
                  <h4>Filters</h4>
                  <div class="filterBlock">
                     <h5>Artworks <i class="fas fa-caret-right"></i></h5>
                     <ul>
                        @foreach($categories as $category)
                        <li onclick="getSubCategory('{{$category->id}}')"><a href="javascript:;">{{$category->name}}</a>
                           <span class="float-right">({{count($category->artwork)}})</span> </li>
                        @endforeach
                        <!-- <li class="active"><a href="javascript:;">Paintings</a> <span class="float-right">(4635)</span></li>
                      <li><a href="javascript:;">Drawings</a> <span class="float-right">(1635)</span> </li>
                      <li><a href="javascript:;">Digital art</a> <span class="float-right">(2635)</span></li>
                      <li><a href="javascript:;">Photography</a> <span class="float-right">(4635)</span></li>
                      <li><a href="javascript:;">Sculptures</a> <span class="float-right">(6645)</span></li> -->
                     </ul>
                  </div>
               </div>


               <div class="filterBlock">
                <h5 class="price_selected">Price ($1)</h5>
                <div class="form-group">
                   <input type="range" class="custom-range price_range" id="price-filter" min="0" max="9999" value="0">
                   <div class="price-fields clearfix">
                      <input type="text" value="$1" class="float-left">  
                      <input type="text" value="$9999" class="float-right">
                   </div>
                </div>
            </div>

            <div class="filterBlock">
                <h5>Size</h5>
                <div class="form-group">
                   <div class="size-space unit_filter">
                      <div class="text-right"><span class="unit">Height</span><span class="unit selected_unit"> (1 In)</span></div>
                      <input type="range" class="custom-range size_range" id="height-filter" min="0" max="9999" value="0">
                      <div class="price-fields d-flex justify-content-between">
                         <input type="text" value="1 In">  <input type="text" value="9999 In">
                      </div>
                   </div>

                   <div class="size-space unit_filter">
                      <div class="text-right"><span class="unit">Width</span><span class="unit selected_unit"> (1 In)</span></div>
                      <input type="range" class="custom-range size_range" id="width-filter" min="0" max="9999" value="0">
                      <div class="price-fields d-flex justify-content-between">
                         <input type="text" value="1 In">  <input type="text" value="9999 In">
                      </div>
                   </div>
                </div>
             </div>


               <div class="filterBlock no-border">
                  <div class="form-group">
                     <select name="selected_style" id="style_id" class="form-control">
                        <option value="">Select Style</option>
                        @foreach($styles as $style)
                         <option value="{{$style->id}}">{{$style->name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>


               <div class="filterBlock no-border">
                  <div class="form-group">
                     <select name="selected_subject" id="subject_id" class="form-control">
                        <option value="">Select Subject</option>
                        @foreach($subjects as $subject)
                         <option value="{{$subject->id}}">{{$subject->name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>

               <div class="filterBlock">
                  <h5>Type</h5>
                  <div class="form-group">
                     <div class="custom-control custom-checkbox d-flex align-items-center">
                        <!-- custom-control-input -->
                        <label class="custom-control-label variant_checkbox" for="customCheck">Limited Periods<input type="checkbox" class="" name="variant_type" value="limited_edition"></label>
                     </div>
                     <div class="custom-control custom-checkbox d-flex align-items-center">
                        
                        <label class="custom-control-label variant_checkbox" for="customCheck">Originals<input type="checkbox" class="" name="variant_type" value="original"></label>
                     </div>
                     <div class="custom-control custom-checkbox d-flex align-items-center">
                        
                        <label class="custom-control-label variant_checkbox" for="customCheck">Prints<input type="checkbox" class="" name="variant_type" value="art_paint"></label>
                     </div>
                  </div>
               </div>
               <div class="btn btn-default btn-block mt-3">reset filters</div>
            </div>
         </div>
         <div id="sub-category" class="col-12 col-md-8 col-lg-9">
           

          <!-- Start Category Section -->
          <section class="Categories">
              <div class="container">
                  <div class="categoryList">
                      <!-- Category Item -->
                      @foreach($categories[0]->subcategories as $subcategory)
                      <div class="categoryItem">
                          <a href="#">
                              <div class="image"><img src="{{$subcategory->media_url}}" alt=""></div>
                              <h3>{{$subcategory->name}}</h3>
                          </a>
                      </div>
                      @endforeach
                  </div>
              </div>
          </section>
          <!-- End Category Section -->

          <!-- Top Artworks Section -->
          <section class="topArtworks">
              <div class="container">
                  <div class="sectionHeading">
                      <h2>Top Artworks</h2>
                  </div>
              </div>
              <div class="container">
                  <div class="row">
                      @foreach($all_artwork as $artworks)
                      <div class="col-lg-4 col-md-6">
                          <div class="artPost">
                              <div class="postHeader">
                                  <div class="username">
                                      <div class="image"><img src="{{$artworks->artist->media_url}}" alt=""></div>
                                      <span class="name">{{$artworks->artist->first_name}}</span>
                                  </div>
                                  <span class="Posted">2 hours ago</span>
                              </div>
                              <div class="postImage">
                                  <a href="#"><img src="{{asset('assets/images/post.jpg')}}" alt=""></a>
                              </div>
                              <div class="postFooter">
                                  <div class="leftBlock">
                                      <h5>{{$artworks->title}}</h5>
                                      @if($artworks->variants)
                                      <h6>$ {{$artworks->variants[0]->price}}</h6>
                                      @endif
                                  </div>
                                  <div class="rightBlock">
                                      <span class="likes">{{count($artworks->artwork_like)}} Likes</span> 
                                      <div class="actionIcons">
                                          <a  class="like_artwork" data-artwork-id="{{$artworks->id}}" href="javascript:void(0);"><img src="{{asset('assets/images/like.png')}}" title="Like Artwork"></a>
                                          <a class="save_artwork" data-artwork-id="{{$artworks->id}}" href="javascript:void(0);"><img src="{{asset('assets/images/saved.png')}}"  title="Save for later"></a>
                                      </div>
                                      <!-- <span class="likes">{{count($artworks->artwork_like)}} Likes</span>
                                      <div class="actionIcons">
                                          <a href="#"><img src="{{asset('assets/images/like.png')}}" alt=""></a>
                                          <a href="#"><img src="{{asset('assets/images/saved.png')}}" alt=""></a>
                                      </div> -->
                                  </div>
                              </div>
                          </div>
                      </div>
                      @endforeach
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
<script>
  
</script>

