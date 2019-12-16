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
                         <input type="checkbox" class="custom-control-input" name="variant_type" value="limited_edition" id="limitedPeriods">
                         <label class="custom-control-label variant_checkbox" for="limitedPeriods">Limited Periods</label>
                       
                     </div>
                     <div class="custom-control custom-checkbox d-flex align-items-center">
                         
                        <input type="checkbox" class="custom-control-input" name="variant_type" value="original" id="originals">
                        <label class="custom-control-label variant_checkbox" for="originals">Originals</label>
                       
                     </div>
                     <div class="custom-control custom-checkbox d-flex align-items-center">
                        <input type="checkbox" class="custom-control-input" name="variant_type" value="art_paint" id="prints">
                        <label class="custom-control-label variant_checkbox" for="prints">Prints</label>
                       
                     </div>
                  </div>
               </div>
               <div class="btn btn-default btn-block mt-3">reset filters</div>
            </div>
         </div>
        <div class="col-12 col-md-8 col-lg-9">
            <form method="post" id="add_blog" action="{{ url('/gallery/update_blog') }}" enctype="multipart/form-data" id="buyer-profile-form">
            @csrf
                 <div class="col-sm-12">
                    <div class="form-group">
                        <label for="first_name">Title</label>
                        <input type="text" class=" form-control"  placeholder="Enter titile" value="" name="title" id="title_id">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="last_name">Description</label>
                       <textarea name="des_first" id="des_first" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center" >
                        <button type="submit" class="btn btn-default addblog" id="update-blog">Submit</button>
                    </div>
                </div>
            </form>
         </div>

      </div>
   </div>
</section>

@include('layouts.frontend.comman_footer')
<script>
  $( window ).on( "load", function() {
    getSubCategory(1);
});
</script>

