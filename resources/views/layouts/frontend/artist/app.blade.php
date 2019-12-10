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
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    <link href="{{asset('css/artwork.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css')  }}">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NKDMSK6');</script>
    <!-- End Google Tag Manager -->
    <style>
        .container {  text-align: center; }
        
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
            <a href="{{url('/')}}" class="simple-text logo-normal">
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
            <ul class="nav">
                <li class="active ">
                    <a href="{{url('/artist/add_artwork')}}">
                        <i class="nc-icon nc-bank"></i>
                        <p>Add Artwork</p>
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
                                <!-- <a class="dropdown-item" href="{{url('/artist/profile') }}">{{ __('My profile') }}</a> -->
                                <a class="dropdown-item" href="/{{Auth::user()->role}}/profile/{{Auth::user()->id}}"> My Profile</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="{{asset('js/artwork.js')}}"></script>
    <script src="{{asset('js/cropzee.js')}}"></script>
<!-- 
    @stack('scripts')

    @include('layouts.navbars.fixed-plugin-js') -->

<script type="text/javascript">
$(document).ready(function(){
    $('.change_artwork_status').click(function(event) {
        event.preventDefault();
        var link = $(this).attr('href');
        swal({
            title: "Please confirm this action",
            text: "By this action you are confirming that the selected Artwork status will be changed.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, I am sure!',
            cancelButtonText: "No, cancel it!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                window.location = link;
            } else {
               swal("Cancelled", "You cancelled this action", "error");
            }
        });
    });
    $('.delete_artwork').click(function(event) {
            event.preventDefault();
            var link = $(this).attr('href');
            swal({
                title: "Please confirm this action",
                text: "By this action you are confirming that the selected Artwork will be deleted permanently.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "No, cancel it!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location = link;
                } else {
                   swal("Cancelled", "You cancelled this action", "error");
                }
            });
        });
    $("#cropzee-input").cropzee({startSize: [85, 85, '%'],});
    $('#upload_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:"{{ url('/artist/upload_artwork') }}",
            method:"POST",
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(data)
            {
                // $('#message').css('display', 'block');
                // $('#message').html(data.message);
                // $('#message').addClass(data.class_name);
                // $('#uploaded_image').html(data.uploaded_image);
                window.location.reload('/artist/add_artwork')
                toastr.options.timeOut = 3500; // 2s
                toastr.success('Artwork Saved Successfully');
            }
        })
    }); 
    $(".sizeRow").hide();
    $(document).on('click', '#originalCheck', function(){
        if($(this).prop("checked") == true){
            $("#original").show();
        }
        else{
            $("#original").hide();
        }
    });
    $(document).on('click', '#limitedCheck', function(){
        if($(this).prop("checked") == true){
            $(".limitedEdition").show();
        }
        else{
            $(".limitedEdition").hide();
        }
    });
    $(document).on('click', '#printsCheck', function(){
        if($(this).prop("checked") == true){
            $(".artPrint").show();
        }
        else{
            $(".artPrint").hide();
        }
    });

    $(document).on('click', '.deleteLimtedEdition', function(){
        var newlen = $('.another_limited_edition').length;
        if(newlen == 1){
            var val = 'limited_edition';
            $('input:checkbox[value="' + val + '"]').prop('checked', false);
            $(".limitedEdition").hide();
        }else{
            $(this).parents('.another_limited_edition').remove();
        }
    })

    $(document).on('click','.addAnother', function(){ 
        var clone = $('.'+$(this).attr('rel')).last().clone();
        // clone.find('.addAnother').remove();
        clone.find('input[type=text]').val('');
        clone.insertAfter($('.limitedEdition').last());
        
    });


    $(document).on('click', '.deleteArtprint', function(){
        var newlen = $('.another_art_print').length;
        if(newlen == 1){
            var val = 'art_paint';
            $('input:checkbox[value="' + val + '"]').prop('checked', false);
            $(".artPrint").hide();
        }else{
            $(this).parents('.another_art_print').remove();
        }
    });

    $(document).on('click', '.deleteOriginal', function(){
        var newlen = $('.another_original').length;
        if(newlen){
            var val = 'original';
            $('input:checkbox[value="' + val + '"]').prop('checked', false);
            $(".original").hide();
        }else{
            $(this).parents('.another_original').remove();
        }
    })

    // $(document).on('click','.addAnother', function(){ 
    //     var clone = $('.'+$(this).attr('rel')).last().clone();

    //     clone.insertAfter($('.artPrint').last());
        
    // });

    // $('#addlimtedEadi').click(function() {
    //     var clone_ltd = $('#limitedEdition').clone();
    //     clone_ltd.find('.addAnother').remove();
    //     clone_ltd.remove_
    //     .appendTo($('#limitedEdition'));
    // });

    // $('#addArtprint').click(function() {
    // $('#artPrint')
    // .clone()
    // .appendTo($('#artPrint'));
    // });

});


      

// $('.first_step').on('click', function (ev) {
//     $.ajax({
//         url: "/validate_first_step",
//         type: "POST",
//         data: {"image":resp},
//         success: function (data) {
//             html = '<img src="' + resp + '" />';
//             $("#upload-demo-i").html(html);
//         }
//     });
// });

$(document).on('change', '#category_id', function() {
    var category_id = $(this).val();
    $.ajax({
        url: "{{ url('/artist/getSubcategory') }}",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: "category_id="+category_id,
        success: function(res){
            if(res.status=="200"){
                $("#sub_category").html(res.result);
            }else{
                
            }
        },
        error: function (errormessage) {
            console.log(errormessage);
        }
    });
});



$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    var html = '<div class="addedImage" style="margin-left: 15px;"><div class="imageBox"><img src="'+event.target.result+'"><button><i class="fa fa-trash" aria-hidden="true" onClick="removeDiv(this)"></i></button></div><input type="hidden" name="hidden_image[]" value="'+event.target.result+'"></div>'
                    $($.parseHTML(html)).insertAfter($('[class^="addedImage"]').last());

                    // $($.parseHTML(html)).appendTo(placeToInsertImagePreview);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.imagesRow');
    });
});

function removeDiv(elem){
    $(elem).parent('div.addedImage').remove();
}


</script>

<script type="text/javascript">
  $(document).ready(function() {
  $('#update-artist-profile').click(function(e) {
  e.preventDefault();
  console.log('test');
  var email = $('#artist-email').val();        
  var first_name=$('#artist-first_name').val();
  var last_name=$('#artist-last_name').val();
  var user_name=$('#artist-user_name').val();
  var biography=$('#artist-biography').val();
  var address=$('#artist-address').val();
  var postal_code=$('#artist-postal_code').val();
  var state=$('#artist-state').val();
  var country=$('#artist-country').val();
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
    }else if($.trim(biography)==''){
      toastr.options.timeOut = 1500; // 1.5s
      toastr.error('Please Enter Biography.');
      return false;
    }else if($.trim(address)==''){
      toastr.options.timeOut = 1500; // 1.5s
      toastr.error('Please Enter Address.');
      return false;
    }else if($.trim(postal_code)==''){
      toastr.options.timeOut = 1500; // 1.5s
      toastr.error('Please Enter Postal Code.');
      return false;
    }else if($.trim(state)==''){
      toastr.options.timeOut = 1500; // 1.5s
      toastr.error('Please Enter State.');
      return false;
    }else if($.trim(country)==''){
      toastr.options.timeOut = 1500; // 1.5s
      toastr.error('Please Enter Country.');
      return false;
    }else{
      
        toastr.options.timeOut = 1500; // 1.5s
        toastr.success('Artist Details Updated Succssfully');    
        setTimeout(function(){ document.getElementById("artist-profile-form").submit(); }, 600);
       
    }
});
});
</script>

</body>

</html>
