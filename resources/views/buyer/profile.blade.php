@include('layouts.frontend.header')
    
    <div class="container">
        <div class="row">
           <div class="col-sm-12 text-center">
                <h4>Profile Management</h4>
            </div>      
        </div>
        <form method="post"  action="{{ url('/buyer/update_buyer') }}" enctype="multipart/form-data" id="buyer-profile-form">
        @csrf
            <div class="row">
                <div class="col-sm-4">
                    <div class="picture-container">
                        <div class="picture">
                            <img src="@if(!empty($buyer->media_url)){{$buyer->media_url}}@endif" class="picture-src" id="wizardPicturePreview" title="" height="100" width="100">
                            <input  type="file" id="wizard-picture" name="media_url">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <input type="hidden" name="id" value="{{$buyer->id}}">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class=" form-control"  placeholder="Enter First Name" value="{{$buyer->first_name}}" name="first_name">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class=" form-control"  placeholder="Enter Last Name" value="{{$buyer->last_name}}" name="last_name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class=" form-control"  placeholder="Enter Email" value="{{$buyer->email}}" name="email" id="buyer-email">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class=" form-control"  placeholder="Enter Address" value="{{$buyer->address}}" name="address">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" class=" form-control"  placeholder="Enter Postal Code" value="{{$buyer->postal_code}}" name="postal_code">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class=" form-control"  placeholder="Enter City" value="{{$buyer->city}}" name="city">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                        <label for="user_name">User Name</label>
                        <input type="text" class=" form-control"  placeholder="Enter UserName" value="{{$buyer->user_name}}" name="user_name">
                    </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                        <label for="postal_code">Country</label>
                        <input type="text" class=" form-control"  placeholder="Enter Country" value="{{$buyer->country}}" name="country">
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
</section>
@include('layouts.frontend.comman_footer')

<script type="text/javascript">
  $(document).ready(function() {
  $('#update-profile').click(function(e) {
  e.preventDefault();
  var email = $('#buyer-email').val();
  var email_filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if($.trim(email) == '')
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
    }else{
        document.getElementById("buyer-profile-form").submit();
        toastr.options.timeOut = 1500; // 1.5s
        toastr.submit('Buyer Details Updated Succssfully');    
    }
});
});
</script>
