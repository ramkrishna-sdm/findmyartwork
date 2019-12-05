<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('paper') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('paper') }}/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <title>
        {{ __('ArtViaYou') }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('paper') }}/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('paper') }}/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <!-- <link href="{{ asset('paper') }}/css/paper-dashboard.min.css?v=2.0.1" rel="stylesheet" /> -->
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('paper') }}/demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css')  }}">
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NKDMSK6');</script>
    <!-- End Google Tag Manager -->
    <style>
  .form-box {
  padding-top: 40px;
  padding-bottom: 40px;
  
  background: rgb(234,88,4); /* Old browsers */
  background: -moz-linear-gradient(top,  rgba(234,88,4,1) 0%, rgba(234,40,3,1) 51%, rgba(234,88,4,1) 100%); /* FF3.6-15 */
  background: -webkit-linear-gradient(top,  rgba(234,88,4,1) 0%,rgba(234,40,3,1) 51%,rgba(234,88,4,1) 100%); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to bottom,  rgba(234,88,4,1) 0%,rgba(234,40,3,1) 51%,rgba(234,88,4,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ea5804', endColorstr='#ea5804',GradientType=0 ); /* IE6-9 */
}

.form-wizard {
  padding: 25px; 
  background: #fff;
  -moz-border-radius: 4px; 
  -webkit-border-radius: 4px; 
  border-radius: 4px; 
  box-shadow: 0px 0px 6px 3px #777;
  font-family: 'Roboto', sans-serif;
    font-size: 16px;
    font-weight: 300;
    color: #888;
    line-height: 30px;
    text-align: center;
}
  
.form-wizard strong { font-weight: 500; }

.form-wizard a, .form-wizard a:hover, .form-wizard a:focus {
  color: #ea2803;
  text-decoration: none;
    -o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;
}

.form-wizard h1, .form-wizard h2 {
  margin-top: 10px;
  font-size: 38px;
    font-weight: 100;
    color: #555;
    line-height: 50px;
}

.form-wizard h3 {
  font-size: 25px;
    font-weight: 300;
    color: #ea2803;
    line-height: 30px;
  margin-top: 0; 
  margin-bottom: 5px; 
  text-transform: uppercase; 
}

.form-wizard h4 {
  float:left;
  font-size: 20px;
    font-weight: 300;
    color: #ea2803;
    line-height: 26px;
  width:100%;
}
.form-wizard h4  span{
  float:right;
  font-size: 18px;
    font-weight: 300;
    color: #555;
    line-height: 26px;
}

.form-wizard table tr th{font-weight:normal;}

.form-wizard img { max-width: 100%; }

.form-wizard ::-moz-selection { background: #ea2803; color: #fff; text-shadow: none; }
.form-wizard ::selection { background: #ea2803; color: #fff; text-shadow: none; }


.form-control {
  height: 44px;
  width:100%;
    margin: 0;
    padding: 0 20px;
    vertical-align: middle;
    background: #fff;
    border: 1px solid #ddd;
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    font-weight: 300;
    line-height: 44px;
    color: #888;
    -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;
    -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
    -o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;
}
.checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"], .radio input[type="radio"], .radio-inline input[type="radio"] {
  position: absolute;
  margin-top: 9px;
  margin-left: -20px;
}

.form-control option:hover, .form-control option:checked  {
    box-shadow: 0 0 10px 100px #ea2803 inset;
}

.form-control:focus {
  outline: 0;
  background: #fff;
    border: 1px solid #ccc;
    -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
}

.form-control:-moz-placeholder { color: #888; }
.form-control:-ms-input-placeholder { color: #888; }
.form-control::-webkit-input-placeholder { color: #888; }

.form-wizard label { font-weight: 300; }
.form-wizard label span { color:#ea2803; }


.form-wizard .btn {
  min-width: 105px;
  height: 40px;
    margin: 0;
    padding: 0 20px;
    vertical-align: middle;
    border: 0;
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    font-weight: 300;
    line-height: 40px;
    color: #fff;
    -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;
    text-shadow: none;
    -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
    -o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;
}

.form-wizard .btn:hover {
  background:#f34727; 
  color: #fff; 
  }
.form-wizard .btn:active { 
  outline: 0; 
  background:#f34727; 
  color: #fff; 
  -moz-box-shadow: none; 
  -webkit-box-shadow: none; 
  box-shadow: none; 
  }
.form-wizard .btn:focus,
.form-wizard .btn:active:focus,
.form-wizard .btn.active:focus { 
  outline: 0; 
  background:#f34727; 
  color: #fff; 
}

.form-wizard .btn.btn-next,
.form-wizard .btn.btn-next:focus,
.form-wizard .btn.btn-next:active:focus, 
.form-wizard .btn.btn-next.active:focus { 
background: #ea2803; 
}

.form-wizard .btn.btn-submit,
.form-wizard .btn.btn-submit:focus,
.form-wizard .btn.btn-submit:active:focus, 
.form-wizard .btn.btn-submit.active:focus { 
background: #ea2803; 
}

.form-wizard .btn.btn-previous,
.form-wizard .btn.btn-previous:focus,
.form-wizard .btn.btn-previous:active:focus, 
.form-wizard .btn.btn-previous.active:focus { 
background: #bbb;
}

.form-wizard .success h3{
  color: #4F8A10;
  text-align: center;
  margin: 20px auto !important;
}
.form-wizard .success .success-icon {
  color: #4F8A10;
  font-size: 100px;
  border: 5px solid #4F8A10;
  border-radius: 100px;
  text-align: center !important;
  width: 110px;
  margin: 25px auto;
}
.form-wizard .progress-bar {
  background-color: #ea2803;
}

.form-wizard-steps{ 
  margin:auto; 
  overflow: hidden; 
  position: relative; 
  margin-top: 20px;
}
.form-wizard-step{
  padding-top:10px !important;
  border:2px solid #fff;
  background:#ccc;
  -ms-transform: skewX(-30deg); /* IE 9 */
    -webkit-transform: skewX(-30deg); /* Safari */
    transform: skewX(-30deg); /* Standard syntax */
}
.form-wizard-step.active{
  background:#ea2803;
}
.form-wizard-step.activated{
  background:#ea2803;
}
.form-wizard-progress { 
  position: absolute; 
  top: 36px;
  left: 0; 
  width: 100%; 
  height: 0px; 
  background: #ea2803;
}
.form-wizard-progress-line { 
  position: absolute; 
  top: 0; 
  left: 0; 
  height: 0px; 
  background: #ea2803; 
}

.form-wizard-tolal-steps-3 .form-wizard-step { 
  position: relative;
  float: left; 
  width: 33.33%; 
  padding: 0 5px; 
}
.form-wizard-tolal-steps-4 .form-wizard-step { 
  position: relative; 
  float: left; 
  width: 25%; 
  padding: 0 5px; 
}
.form-wizard-tolal-steps-5 .form-wizard-step { 
  position: relative;
  float: left;
  width: 20%;
  padding: 0 5px;
}

.form-wizard-step-icon {
  display: inline-block;
  width: 40px; 
  height: 40px; 
  margin-top: 4px; 
  background: #ddd;
  font-size: 16px; 
  color: #777; 
  line-height: 40px;
  -moz-border-radius: 50%; 
  -webkit-border-radius: 50%; 
  border-radius: 50%;
  -ms-transform: skewX(30deg); /* IE 9 */
    -webkit-transform: skewX(30deg); /* Safari */
    transform: skewX(30deg); /* Standard syntax */
}
.form-wizard-step.activated .form-wizard-step-icon {
  background: #ea2803; 
  border: 1px solid #fff; 
  color: #fff; 
  line-height: 38px;
}
.form-wizard-step.active .form-wizard-step-icon {
  background: #fff; 
  border: 1px solid #fff; 
  color: #ea2803; 
  line-height: 38px;
}

.form-wizard-step p { 
  color: #fff;
  -ms-transform: skewX(30deg); /* IE 9 */
    -webkit-transform: skewX(30deg); /* Safari */
    transform: skewX(30deg); /* Standard syntax */
}
.form-wizard-step.activated p { color: #fff; }
.form-wizard-step.active p { color: #fff; }

.form-wizard fieldset { 
  display: none; 
  text-align: left; 
  border:0px !important
}

.form-wizard-buttons { text-align: right; }

.form-wizard .input-error { border-color: #ea2803;}

/** image uploader **/
.image-upload a[data-action] {
  cursor: pointer;
  color: #555;
  font-size: 18px;
  line-height: 24px;
  transition: color 0.2s;
}
.image-upload a[data-action] i {
  width: 1.25em;
  text-align: center;
}
.image-upload a[data-action]:hover {
  color: #ea2803;
}
.image-upload a[data-action].disabled {
  opacity: 0.35;
  cursor: default;
}
.image-upload a[data-action].disabled:hover {
  color: #555;
}
.settings_wrap{
  margin-top:20px;
}
.image_picker .settings_wrap {
  overflow: hidden;
  position: relative;
}
.image_picker .settings_wrap .drop_target,
.image_picker .settings_wrap .settings_actions {
  float: left;
}
.image_picker .settings_wrap .drop_target {
  margin-right: 18px;
}
.image_picker .settings_wrap .settings_actions {
  float: left;
  margin-top: 100px;
  margin-left: 20px;
}
.settings_actions.vertical a {
  display: block;
}
.drop_target {
  position: relative;
  cursor: pointer;
  transition: all 0.2s;
    width: 250px;
    height: 250px;
    background: #f2f2f2;
    border-radius: 100%;
    margin: 0 auto 25px auto;
    overflow: hidden;
    border: 8px solid #E0E0E0;
}
.drop_target input[type="file"] {
  visibility: hidden;
}
.drop_target::before {
  content: 'Drop Hear';
  font-family: FontAwesome;
  position: absolute;
  display: block;
  width: 100%;
  line-height: 220px;
  text-align: center;
  font-size: 40px;
  color: rgba(0, 0, 0, 0.3);
  transition: color 0.2s;
}
.drop_target:hover,
.drop_target.dropping {
  background: #f80;
  border-top-color: #cc6d00;
}
.drop_target:hover:before,
.drop_target.dropping:before {
  color: rgba(0, 0, 0, 0.6);
}
.drop_target .image_preview {
  width: 100%;
  height: 100%;
  background: no-repeat center;
  background-size: contain;
  position: relative;
  z-index: 2;
}
</style>
   
</head>

<body class="">
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
            <a href="{{url('/artist/dashboard')}}" class="simple-text logo-mini">
              <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
              </div>
            </a>
            <a href="{{url('/artist/dashboard')}}" class="simple-text logo-normal">
             ArtViaYou
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
              <li class="active ">
                <a href="{{url('/artist/dashboard')}}">
                  <i class="nc-icon nc-bank"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
        </div>
    </div>
<div class="main-panel">
    <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <div class="navbar-toggle">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <a class="navbar-brand" href="{{url('/artist/dashboard')}}">{{ __('Artist Dashboard') }}</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul class="navbar-nav">
                    
                    <li class="nav-item btn-rotate dropdown">
                        <a class="nav-link dropdown-toggle" href="{{url('/artist/dashboard')}}" id="navbarDropdownMenuLink2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="nc-icon nc-settings-gear-65"></i>
                            <p>
                                <span class="d-lg-none d-md-block">{{ __('Account') }}</span>
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                            <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" onclick="document.getElementById('formLogOut').submit();">{{ __('Log out') }}</a>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('My profile') }}</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="content">
    @yield('content')
    </div>
    @include('layouts.footer')
</div>
</div>
    <script src="{{ asset('paper') }}/js/core/jquery.min.js"></script>
    <script src="{{ asset('paper') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('paper') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('paper') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{url('ckeditor/ckeditor.js')}}"></script>
    <!--  Google Maps Plugin    -->
    <!-- script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script-->
    <!-- Chart JS -->
    <script src="{{ asset('paper') }}/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('paper') }}/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('paper') }}/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('paper') }}/demo/demo.js"></script>
    <!-- Sharrre libray -->
    <!-- <script src="../assets/demo/jquery.sharrre.js"></script> -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>    
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
  
    <script src="{{ asset('js/sweetalert-data.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>


    @stack('scripts')

    @include('layouts.navbars.fixed-plugin-js')
    <script type="text/javascript">
        "use strict";
function scroll_to_class(element_class, removed_height) {
    var scroll_to = $(element_class).offset().top - removed_height;
    if($(window).scrollTop() != scroll_to) {
        $('.form-wizard').stop().animate({scrollTop: scroll_to}, 0);
    }
}

function bar_progress(progress_line_object, direction) {
    var number_of_steps = progress_line_object.data('number-of-steps');
    var now_value = progress_line_object.data('now-value');
    var new_value = 0;
    if(direction == 'right') {
        new_value = now_value + ( 100 / number_of_steps );
    }
    else if(direction == 'left') {
        new_value = now_value - ( 100 / number_of_steps );
    }
    progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
}

jQuery(document).ready(function() {
    
    /*
        Form
    */
    $('.form-wizard fieldset:first').fadeIn('slow');
    
    $('.form-wizard .required').on('focus', function() {
        $(this).removeClass('input-error');
    });
    
    // next step
    $('.form-wizard .btn-next').on('click', function() {
        var parent_fieldset = $(this).parents('fieldset');
        var next_step = true;
        // navigation steps / progress steps
        var current_active_step = $(this).parents('.form-wizard').find('.form-wizard-step.active');
        var progress_line = $(this).parents('.form-wizard').find('.form-wizard-progress-line');
        
        // fields validation
        parent_fieldset.find('.required').each(function() {
            if( $(this).val() == "" ) {
                $(this).addClass('input-error');
                next_step = false;
            }
            else {
                $(this).removeClass('input-error');
            }
        });
        // fields validation
        
        if( next_step ) {
            parent_fieldset.fadeOut(400, function() {
                // change icons
                current_active_step.removeClass('active').addClass('activated').next().addClass('active');
                // progress bar
                bar_progress(progress_line, 'right');
                // show next step
                $(this).next().fadeIn();
                // scroll window to beginning of the form
                scroll_to_class( $('.form-wizard'), 20 );
            });
        }
        
    });
    
    // previous step
    $('.form-wizard .btn-previous').on('click', function() {
        // navigation steps / progress steps
        var current_active_step = $(this).parents('.form-wizard').find('.form-wizard-step.active');
        var progress_line = $(this).parents('.form-wizard').find('.form-wizard-progress-line');
        
        $(this).parents('fieldset').fadeOut(400, function() {
            // change icons
            current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
            // progress bar
            bar_progress(progress_line, 'left');
            // show previous step
            $(this).prev().fadeIn();
            // scroll window to beginning of the form
            scroll_to_class( $('.form-wizard'), 20 );
        });
    });
    
    // submit
    $('.form-wizard').on('submit', function(e) {
        
        // fields validation
        $(this).find('.required').each(function() {
            if( $(this).val() == "" ) {
                e.preventDefault();
                $(this).addClass('input-error');
            }
            else {
                $(this).removeClass('input-error');
            }
        });
        // fields validation
        
    });
    
    
});





// image uploader scripts 

var $dropzone = $('.image_picker'),
    $droptarget = $('.drop_target'),
    $dropinput = $('#inputFile'),
    $dropimg = $('.image_preview'),
    $remover = $('[data-action="remove_current_image"]');

$dropzone.on('dragover', function() {
  $droptarget.addClass('dropping');
  return false;
});

$dropzone.on('dragend dragleave', function() {
  $droptarget.removeClass('dropping');
  return false;
});

$dropzone.on('drop', function(e) {
  $droptarget.removeClass('dropping');
  $droptarget.addClass('dropped');
  $remover.removeClass('disabled');
  e.preventDefault();
  
  var file = e.originalEvent.dataTransfer.files[0],
      reader = new FileReader();

  reader.onload = function(event) {
    $dropimg.css('background-image', 'url(' + event.target.result + ')');
  };
  
  console.log(file);
  reader.readAsDataURL(file);

  return false;
});

$dropinput.change(function(e) {
  $droptarget.addClass('dropped');
  $remover.removeClass('disabled');
  $('.image_title input').val('');
  
  var file = $dropinput.get(0).files[0],
      reader = new FileReader();
  
  reader.onload = function(event) {
    $dropimg.css('background-image', 'url(' + event.target.result + ')');
  }
  
  reader.readAsDataURL(file);
});

$remover.on('click', function() {
  $dropimg.css('background-image', '');
  $droptarget.removeClass('dropped');
  $remover.addClass('disabled');
  $('.image_title input').val('');
});

$('.image_title input').blur(function() {
  if ($(this).val() != '') {
    $droptarget.removeClass('dropped');
  }
});

// image uploader scripts
    </script>

</body>

</html>
