<!-- Footer Section ------->
<footer class="siteFooter">
  <div class="container footerLink">
    <div class="row">
      <div class="col-md-7 d-flex">
        <div class="Links">
          <h3>About</h3>
          <ul class="navLink">
            <li><a href="{{url('about_us')}}">About Us</a></li>
            <!-- <li><a href="#">Careers</a></li> -->
          </ul>
        </div>
        <div class="Links">
          <h3>Support</h3>
          <ul class="navLink">
            <!-- <li><a href="#">Shipping & Returns</a></li> -->
            <li><a href="{{url('faq')}}">Help/FAQ</a></li>
            <li><a href="{{url('terms_conditions')}}">Terms of use</a></li>
            <!-- <li><a href="javascript:void(0);">Project Management</a></li> -->
            <!-- <li><a href="javascript:void(0);">Mounting Instructions</a></li> -->
            <li><a href="{{url('privacy_policy')}}">Privacy Policy</a></li>
            <li><a href="{{url('contact_us')}}">Contact Us</a></li>
          </ul>
        </div>
        <!-- <div class="Links">
          <h3>Important Links</h3>
          <ul class="navLink">
            <li><a href="#">Sell your Art</a></li>
            <li><a href="#">Buy Art</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Sitemap</a></li>
          </ul>
        </div>
        <div class="Links">
          <h3>Other Links</h3>
          <ul class="navLink">
            <li><a href="#">Sell your Art</a></li>
            <li><a href="#">Buy Art</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Sitemap</a></li>
          </ul>
        </div> -->
      </div>
      <div class="col-md-5 text-right">
        <div class="social-links">
          <a href="#"><img src="{{asset('assets/images/fb.png')}}" alt=""></a>
          <a href="#"><img src="{{asset('assets/images/insta.png')}}" alt=""></a>
          <a href="#"><img src="{{asset('assets/images/twitter.png')}}" alt=""></a>
          <a href="#"><img src="{{asset('assets/images/youtube.png')}}" alt=""></a>
        </div>
        <div class="footerLower">
          <div class="lowerLinks">
            <a href="javascript:void(0);">Sell on ArtViaYou</a>
            <a href="javascript:void(0);">Help</a>
            <a href="javascript:void(0);">Pricing</a>
            <a href="javascript:void(0);">Cart</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Copyright -->
  <div class="copyright">
    <div class="container">
      <p class="copyTxt">© All Right Reserved Artviayou {{date('Y')}}.</p>
    </div>
  </div>
  <!-- //Copyright -->
</footer>
<!-- //Footer Section -->
<form class="form" method="POST" action="{{url('/submit_login')}}" id="login_form">
  @csrf
  <div class="modal fade getStartedModals LoginModal" id="LoginModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
          <div class="loginForm text-center">
            <h3>Sign In to your account</h3>
            <div class="col-md-8 offset-md-2">
              
              <div class="form-group">
                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}"  autofocus id="email">
                
                @if ($errors->has('email'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
                
              </div>
              <div class="form-group">
                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password" id="password">
                
                @if ($errors->has('password'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
              <button type="submit" class="btn btn-default btn-block" id="submit-form">{{ __('Sign in') }}</button>
              <a href="#" class="btn btn-link btn-sm my-3" data-toggle="modal" data-target="#forgetModel" data-dismiss="modal" aria-label="Close">Forgot Password?</a>
              <a href="#" class="btn btn-border btn-block" data-toggle="modal" data-target="#SignUpModal" data-dismiss="modal" aria-label="Close">create account</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<div class="modal fade getStartedModals SignUpModal2" id="forgetModel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <a href="#" class="goBack" data-toggle="modal" data-target="#SignUpModal"  data-dismiss="modal" aria-label="Close"><img src="{{asset('assets/images/left-arrow.svg')}}" alt=""> Go back</a>
        <div class="loginForm text-center">
          <h3>Enter your details to sign up</h3>
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <form method="POST"  action="{{ route('password.email') }}" id="forgot-password">
            @csrf
            <div class="col-md-8 offset-md-2">
              <div class="form-group">
                <input id="forgot-email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-default btn-block" id="submit-password">{{ __('Send Verification Link') }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade getStartedModals SignUpModal" id="SignUpModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <a href="#" class="goBack"  data-dismiss="modal" aria-label="Close"><img src="{{asset('assets/images/left-arrow.svg')}}" alt=""> Go back</a>
        <div class="loginForm text-center">
          <h3>Sign Up with artviayou</h3>
          <div class="col-md-8 offset-md-2">
            <a href="#" class="btn btn-default btn-block" data-toggle="modal" data-target="#SignUpModal2" data-dismiss="modal" aria-label="Close">sign up with email</a>
            <span class="or-divider">Or</span>
            <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-default btn-block btn-facebook">sign up with facebook</a>
          </div>
          <span class="mt-4"> <a href="#" class="btn btn-link btn-sm" data-toggle="modal" data-target="#LoginModal" data-dismiss="modal" aria-label="Close">Already a member of ArtviaYou Login</a></span>
        </div>
      </div>
    </div>
  </div>
</div>
<form class="form" method="POST" id="registerForm" action="{{ route('register') }}">
  @csrf
  <div class="modal fade getStartedModals SignUpModal2" id="SignUpModal2">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
          <a href="#" class="goBack" data-toggle="modal" data-target="#SignUpModal"  data-dismiss="modal" aria-label="Close"><img src="{{asset('assets/images/left-arrow.svg')}}" alt=""> Go back</a>
          <div class="loginForm text-center">
            <h3>Enter your details to sign up</h3>
            <div class="col-md-8 offset-md-2">
              <div class="form-group">
                <input name="first_name" type="text" class="form-control" placeholder="First Name" value="{{ old('first_name') }}" required autofocus id="first_name">
                @if ($errors->has('first_name'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                  <strong>{{ $errors->first('first_name') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group">
                <input name="last_name" type="text" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}" required autofocus id="last_name">
                @if ($errors->has('last_name'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                  <strong>{{ $errors->first('last_name') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group">
                <input name="email" type="email" class="form-control" placeholder="Email" required value="{{ old('email') }}" id="email-address">
                @if ($errors->has('email'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Password" required id="register-password">
                @if ($errors->has('password'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
              <input type="hidden" id="user_role" name="role" required>
              <a href="#" class="btn btn-default btn-block" id="registration-form" data-toggle="modal" data-target="#SignUpModal3"  data-dismiss="modal" aria-label="Close">Next Step</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade getStartedModals SignUpModal3" id="SignUpModal3">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
          <a href"=#" class="goBack" data-toggle="modal" data-target="#SignUpModal2" data-dismiss="modal" aria-label="Close"><img src="{{asset('assets/images/left-arrow.svg')}}" alt=""> Go back</a>
          <div class="loginForm text-center">
            <h3>Account type</h3>
            <div class="col-md-8 offset-md-2">
              <div class="userTypes d-flex justify-content-between mb-3">
                <button type="button" onclick="setUserRole('buyer')" class="btn btn-border btn-lg role_btn" >Buyer</button>
                <button type="button" onclick="setUserRole('artist')" class="btn btn-border btn-lg role_btn" >Artist</button>
                <button type="button" onclick="setUserRole('gallery')" class="btn btn-border btn-lg role_btn" >Gallery</button>
              </div>
              <div class="custom-control custom-checkbox d-flex align-items-center mb-4">
                <input type="checkbox" class="custom-control-input" name="agree_terms_and_conditions" value="1" id="customCheck1" required>
                <label class="custom-control-label" for="customCheck1">By signing up you agree to our <a href="#">Terms & Conditions</a>.</label>
              </div>
              <button type="submit" class="btn btn-default btn-block">{{ __('Sign Up') }}</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</div>
<!-- //Wrapper -->
<!-- jQuery CDN Link -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>
<script type="text/javascript">
$(document).on('click', '.role_btn', function(){
  $('.role_btn').css("background-color", "");  
  $(this).css("background-color", "#0e0f11");  
})
$(document).on('keyup', '#site_filter', function(){
  var this_filter = $(this);
  var site_filter = $('#site_filter').val();
  $.ajax({
    url: "{{url('filter_search')}}",
    type: 'POST',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {filter_key:site_filter},

    success: function(res){
        if(res.status=="200"){
            $(this_filter).parents('.searchbar').find('.filter_result').html(res.result);
        }else{
            
        }
    },
    error: function (errormessage) {
        console.log(errormessage);
    }
});
})

$(document).ready(function(){
  $('#site_filter').typeahead({
    ajax: {
        url: '/cities/list',
        method: 'post',
        triggerLength: 1
    },
    onSelect: displayResult
  });  
  $('#site_filter').typeahead({
    ajax:'AJAX URL'
  // source: [
  //   { id: 1, name:'Value 1' },
  //   { id: 2, name:'Value 2' },
  //   { id: 3, name:'Value 3' },
  // ]
});

function displayResult(item) {
  $('.alert').show().html('You selected <strong>' + item.value + '</strong>: <strong>' + item.text + '</strong>');
}

})
function setUserRole(value){
// alert(value);

$('#user_role').val(value);
}
$(document).ready(function() {
$('#registerForm').submit(function(e) {
e.preventDefault();
var user_role = $('#user_role').val();
if($.trim(user_role) == ''){
toastr.options.timeOut = 2000; // 2s
toastr.error('Please Select Account Type!');
return false;
}else{
toastr.options.timeOut = 1000; // 42s
toastr.success(' Verification Mail has been sent to your Email Id ');
document.getElementById("registerForm").submit();
}
});
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#registration-form').click(function(e) {
      e.preventDefault();
      var first_name = $('#first_name').val();
      var last_name = $('#last_name').val();
      var email = $('#email-address').val();
      var password = $('#register-password').val();
      var email_filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if($.trim(first_name) == ''){
        toastr.options.timeOut = 1500; // 2s
        toastr.error('Please Enter First Name');
        return false;
      }else if($.trim(last_name)==''){
              toastr.options.timeOut = 1500; // 2s
              toastr.error('Please Enter Last Name');
              return false;
      }else if ($.trim(email)==''){
              toastr.options.timeOut = 1500; // 2s
              toastr.error('Please Enter Email');
              return false;
      }else if(!email_filter.test(email)){
              toastr.options.timeOut = 1500; // 1.5s
              toastr.error('Please Enter Valid Email.');
              return false;
      }else if($.trim(password)==''){
              toastr.options.timeOut = 1500; // 2s
              toastr.error('Please Enter Password');
              return false;
      }else if($.trim(password).length<6){
              toastr.options.timeOut = 1500; // 1.5s
              toastr.error('Please enter Password more than 6 characters.');
              return false;
      }
      else{
              $("#SignUpModal3").show();
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('#submit-form').click(function(e) {
  e.preventDefault();
  var email = $('#email').val();
  var password = $('#password').val();
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
    }
      else if($.trim(password)==''){
      toastr.options.timeOut = 1500; // 1.5s
      toastr.error('Please Enter Password.');
      return false;
    }
      else if($.trim(password).length<6){
      toastr.options.timeOut = 1500; // 1.5s
      toastr.error('Please enter Password more than 6 characters.');
      return false;
    }else{
      makeUserLogin();
      // document.getElementById("login_form").submit();
  }
});
});

function makeUserLogin(){
    var url = "{{url('submit_login')}}";
    var loginDetails = $('#login_form').serialize();
    console.log(loginDetails);
    $.ajax({
        url: url,
        type: 'POST',
        data:loginDetails,
        
  success: function(res){
    if(res.status=="200"){
      window.location.href = res.redirect_url;
    }else{
      toastr.options.timeOut = 1500; // 1.5s
      toastr.error(res.message);
      return false;
    }
  },
  error: function (errormessage) {
    toastr.options.timeOut = 1500; // 1.5s
    toastr.error('You are Not Authorised Person.');
    return false;
  }
});
}  
</script>

<script type="text/javascript">
  $(document).ready(function() {
  $('#submit-password').click(function(e) {
  e.preventDefault();
  var email = $('#forgot-email').val();
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
      toastr.options.timeOut = 1500; // 1.5s
      toastr.error('Email has been sent to your verify email Id');
      document.getElementById("forgot-password").submit();
  }
});
});
</script>



<script type="text/javascript">
$(document).on('click', '.like_artist', function(){
    var artist_id = $(this).attr('data-artist-id');
    var this_like = $(this);
    $.ajax({
        url: "{{url('like_artist')}}",
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {artist_id:artist_id},

        success: function(res){
            if(res.status=="200"){
                $(this_like).parents('.rightBlock').find('.likes').html(res.like_count);
            }else{
                
            }
        },
        error: function (errormessage) {
            console.log(errormessage);
        }
    });
})
$(document).on('click', '.save_artist', function(){
    var artist_id = $(this).attr('data-artist-id');
    var this_like = $(this);
    $.ajax({
        url: "{{url('save_artist')}}",
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {artist_id:artist_id},

        success: function(res){
            if(res.status=="200"){
                // $(document).find('.saved_count').html(res.saved_count);
            }else{
                
            }
        },
        error: function (errormessage) {
            console.log(errormessage);
        }
    });
})
$(document).on('click', '.like_artwork', function(){
    var artwork_id = $(this).attr('data-artwork-id');
    var this_like = $(this);
    $.ajax({
        url: "{{url('like_artwork')}}",
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {artwork_id:artwork_id},

        success: function(res){
            if(res.status=="200"){
                $(this_like).parents('.rightBlock').find('.likes').html(res.like_count);
            }else{
                
            }
        },
        error: function (errormessage) {
            console.log(errormessage);
        }
    });
})
$(document).on('click', '.save_artwork', function(){
    var artwork_id = $(this).attr('data-artwork-id');
    var this_like = $(this);
    $.ajax({
        url: "{{url('save_artwork')}}",
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {artwork_id:artwork_id},

        success: function(res){
            if(res.status=="200"){
                $(document).find('.saved_count').html(res.saved_count);
            }else{
                
            }
        },
        error: function (errormessage) {
            console.log(errormessage);
        }
    });
})
</script>


</body>
</html>