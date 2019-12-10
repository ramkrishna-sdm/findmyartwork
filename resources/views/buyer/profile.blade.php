@include('layouts.frontend.header')
<section class="artworksSection">  
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-3 col-sm-3">
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
            <div id="" class="col-md-9 col-lg-9 col-sm-9">
                <h4 class="text-center">Profile Mangement</h4>
                <form method="post"  action="{{ url('/buyer/update_buyer') }}" enctype="multipart/form-data" id="buyer-profile-form">
                @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="picture-container">
                                <div class="picture">
                                    <img src="@if(!empty($buyer->media_url)){{$buyer->media_url}}@endif" class="picture-src" id="wizardPicturePreview" title="" height="100" width="100"  style="border-radius:50%;">
                                    <input  type="file" id="wizard-picture" name="media_url">
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="hidden" name="id" value="{{$buyer->id}}">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class=" form-control"  placeholder="Enter First Name" value="{{$buyer->first_name}}" name="first_name" id="buyer-first_name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class=" form-control"  placeholder="Enter Last Name" value="{{$buyer->last_name}}" name="last_name" id="buyer-last_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class=" form-control"  placeholder="Enter Email" value="{{$buyer->email}}" name="email" id="buyer-email" id="buyer-first_name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class=" form-control"  placeholder="Enter Address" value="{{$buyer->address}}" name="address" id="buyer-address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="postal_code">Postal Code</label>
                                <input type="text" class=" form-control"  placeholder="Enter Postal Code" value="{{$buyer->postal_code}}" name="postal_code" id="buyer-postal_code">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class=" form-control"  placeholder="Enter City" value="{{$buyer->city}}" name="city" id="buyer-city">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                                <label for="user_name">User Name</label>
                                <input type="text" class=" form-control"  placeholder="Enter UserName" value="{{$buyer->user_name}}" name="user_name" id="buyer-user_name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                                <label for="postal_code">Country</label>
                                <input type="text" class=" form-control"  placeholder="Enter Country" value="{{$buyer->country}}" name="country" id="buyer-country">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                                <label for="postal_code">Biography</label>
                                <input type="text" class=" form-control"  placeholder="Enter Biography" value="{{$buyer->biography}}" name="biography" id="buyer-biography">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 text-center" >
                            <button type="submit" class="btn btn-primary" id="update-profile">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
@include('layouts.frontend.comman_footer')

<script type="text/javascript">
  $(document).ready(function() {
  $('#update-profile').click(function(e) {
  e.preventDefault();
  var email = $('#buyer-email').val();       
  var first_name=$('#buyer-first_name').val();
  var last_name=$('#buyer-last_name').val();
  var user_name=$('#buyer-user_name').val();
  var address=$('#buyer-address').val();
  var postal_code=$('#buyer-postal_code').val();
  var city=$('#buyer-city').val();
  var country=$('#buyer-country').val();
  var biography=$('#buyer-biography').val();
  var email_filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if($.trim(first_name)==''){
      toastr.options.timeOut = 1500; // 1.5s
      toastr.error('Please Enter First Name.');
      return false;
  }else if($.trim(last_name)==''){
      toastr.options.timeOut = 1500; // 1.5s
      toastr.error('Please Enter Last Name.');
      return false;
  }else if($.trim(email) == '')
    {
      toastr.options.timeOut = 1500; // 1.5s
      toastr.error('Please Enter Email.');
      return false;
    }
    else if(!email_filter.test(email))
    {
      toastr.options.timeOut = 1500; // 1.5s
      toastr.error('Please Enter Valid Email.');
      return false;
    }else if($.trim(user_name)==''){
      toastr.options.timeOut = 1500; // 1.5s
      toastr.error('Please Enter User Name.');
      return false;
    }else if($.trim(address)==''){
      toastr.options.timeOut = 1500; // 1.5s
      toastr.error('Please Enter Address.');
      return false;
    }else if($.trim(postal_code)==''){
      toastr.options.timeOut = 1500; // 1.5s
      toastr.error('Please Enter Postal Code.');
      return false;
    }else if($.trim(city)==''){
      toastr.options.timeOut = 1500; // 1.5s
      toastr.error('Please Enter City.');
      return false;
    }else if($.trim(country)==''){
      toastr.options.timeOut = 1500; // 1.5s
      toastr.error('Please Enter Country.');
      return false;
    }else if($.trim(biography)==''){
      toastr.options.timeOut = 1500; // 1.5s
      toastr.error('Please Enter Biography.');
      return false;
    }else{
      
        toastr.options.timeOut = 1500; // 1.5s
        toastr.success('Buyer Details Updated Succssfully');    
        setTimeout(function(){ document.getElementById("buyer-profile-form").submit(); }, 600);
       
    }
});
});
</script>
