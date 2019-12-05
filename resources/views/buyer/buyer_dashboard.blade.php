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
                           <input type="text" value="$50"> <input type="text" value="$999999">
                        </div>
                     </div>

                     <div class="size-space">
                        <div class="text-right"><span class="unit">Width</span></div>
                        <input type="range" class="custom-range" id="customRange1">
                        <div class="price-fields d-flex justify-content-between">
                           <input type="text" value="$50"> <input type="text" value="$999999">
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
         <div id="sub-category" class="col-12 col-md-8 col-lg-9">
           
         </div>

      </div>
   </div>
</section>
<!-- End Artworks Section -->
@include('layouts.frontend.comman_footer')
<script>
  $( window ).on( "load", function() {
    getSubCategory(1);
});
</script>

<script>
   function getSubCategory(id) {
      var url = "{{url('buyer/sub-categories')}}";
      var data = id;

      $.ajax({
         url: url,
         type: 'POST',
         data: { id: data },
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },

         success: function (res) {
            if (res.status == "200") {
               console.log(res.html);
               $("#sub-category").html(res.html);
            } else {

               return false;
            }
         },
         error: function (errormessage) {

            return false;
         }
      });
   }

</script>