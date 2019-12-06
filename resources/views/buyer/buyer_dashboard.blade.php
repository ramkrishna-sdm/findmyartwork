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
                   <input type="range" class="custom-range price_range" id="price-filter" min="1" max="9999" value="1">
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
                      <input type="range" class="custom-range size_range" id="height-filter" min="1" max="9999" value="1">
                      <div class="price-fields d-flex justify-content-between">
                         <input type="text" value="1 In">  <input type="text" value="9999 In">
                      </div>
                   </div>

                   <div class="size-space unit_filter">
                      <div class="text-right"><span class="unit">Width</span><span class="unit selected_unit"> (1 In)</span></div>
                      <input type="range" class="custom-range size_range" id="width-filter" min="1" max="9999" value="1">
                      <div class="price-fields d-flex justify-content-between">
                         <input type="text" value="1 In">  <input type="text" value="9999 In">
                      </div>
                   </div>
                </div>
             </div>


               <div class="filterBlock no-border">
                  <div class="form-group">
                     <select name="" id="" class="form-control">
                        <option value="" selected="true" disabled="disabled">Style</option>
                        @foreach($styles as $style)
                         <option value="">{{$style->name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>


               <div class="filterBlock no-border">
                  <div class="form-group">
                     <select name="" id="subject_id" class="form-control">
                        <option value="" selected="true" disabled="disabled">Subject</option>
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
   var category_id = '';
   function getSubCategory(id) {
      category_id = id;
      // var url = "{{url('buyer/sub-categories')}}";
      var data = {'id':category_id};
      applyFilter(data);
   }
   
   function applyFilter(data){
      $.ajax({
            url: '{{url('buyer/sub-categories')}}',
            type: 'POST',
            data: data,
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function (res) {
               if (res.status == "200") {
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
<script>
$(document).on('click', '.variant_checkbox', function () { 
  // alert("here");
  var favorite = [];
  $.each($("input[name='variant_type']:checked"), function(){
    favorite.push($(this).val());
  });
   // alert("My favourite sports are: " + favorite.join(", "));
});
</script>   
<script>
     $("#price-filter").on('change keyup paste', function () {
        var favorite = [];
      $.each($("input[name='variant_type']:checked"), function(){
        favorite.push($(this).val());
      });
      data = {'id':category_id,'price':$("#price-filter").val(),'height':$("#height-filter").val(),'width':$("#width-filter").val(),'subject_id':$("#subject_id").val(),'variant_type':favorite.join(",")}
      applyFilter(data);
   });
</script>

<script>
     $("#height-filter").on('change keyup paste', function () {
        var favorite = [];
      $.each($("input[name='variant_type']:checked"), function(){
        favorite.push($(this).val());
      });
      data = {'id':category_id,'height':$("#height-filter").val(),'price':$("#price-filter").val(),'width':$("#width-filter").val(),'subject_id':$("#subject_id").val(),'variant_type':favorite.join(",")}
      applyFilter(data);
   });
</script>

<script>
     $("#width-filter").on('change keyup paste', function () {
        var favorite = [];
      $.each($("input[name='variant_type']:checked"), function(){
        favorite.push($(this).val());
      });
      data = {'id':category_id,'width':$("#width-filter").val(),'height':$("#height-filter").val(),'price':$("#price-filter").val(),'subject_id':$("#subject_id").val(),'variant_type':favorite.join(",")}
      applyFilter(data);
   });
</script>