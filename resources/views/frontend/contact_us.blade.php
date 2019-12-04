@include('layouts.frontend.header')
<!-- Page Header Title -->
<!-- End Header Navigation -->
<!-- Page Header Title -->
<div class="page-title">
<h1 class="page-title-inner">
   <span class="pagetitleText">contact</span> 
   <img src="{{asset('assets/images/contact-graphic.svg')}}" class="title-img" alt="">
</h1>
</div>
<!--End Page Header Title -->
<!-- About text 1 -->
<!-- Contact Page -->

<section class="contactPage" >
<div class="container contact">
   <div class="row">
      <div class="col-12">
         <div class="contact-frame">
            <div class="contact-text">
               <h3>Contact</h3>
               <h4>Have any <span>question</span> in mind?</h4>
               <p class="link"><a href="javascript:;">Let’s ask now <i class="fas fa-arrow-right"></i></a></p>

               <h5>Email</h5>
               <p><a href="mailto:contact@artviayou.com">contact@artviayou.com</a></p>

               <h5>Phone</h5>
               <p><a href="tel:4564567678">+(456) 4567-678</a></p>
            </div>
            <div class="contact-form">
               <h3>Fill the form</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt  el facilisis.</p>

               <form class="row" method="POST" action="{{url('/save_contact_form')}}" id="contact-us-form">
                  @csrf
                  <div class="col-12 col-sm-6 form-group">
                     <input type="text" class="form-control" placeholder="Your Name" name="name" id="name">
                  </div>
                  <div class="col-12 col-sm-6 form-group">
                     <input type="tel" class="form-control" placeholder="Phone" name="mobile_number" id="mobile_number">
                  </div>
                  <div class="col-12 form-group">
                     <input type="email" class="form-control"  placeholder="Email Address" name="email" id="address">
                  </div>
                  <div class="col-12 form-group">
                     <textarea class="form-control" placeholder="Message" name="message"></textarea>
                  </div>
                  <div class="col-12">
                     <button type="submit" class="btn btn-default" id="contact-form">Submit</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="map">
   <!-- <img src="assets/images/map.jpg" alt="map" /> -->
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d65276.652233651694!2d76.63564970785154!3d30.69923820549952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390feef68f84e54b%3A0x6d1fe6ad02834905!2ssmartData%20Enterprises!5e0!3m2!1sen!2sin!4v1575501651733!5m2!1sen!2sin" width="800" height="800" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</section>
<!-- End contact page -->
@include('layouts.frontend.comman_footer')

<script type="text/javascript">
  $(document).ready(function() {
    $('#contact-form').click(function(e) {
      e.preventDefault();
      var name = $('#name').val();
      var mobile_number = $('#mobile_number').val();
      var contact_email = $('#address').val();
      var email_filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      var mobile_filter = /^[0-9-+]+$/;
      console.log('email',contact_email);
      if($.trim(name) == ''){
        toastr.options.timeOut = 1500; // 2s
        toastr.error('Please Enter Name');
        return false;
      }else if($.trim(mobile_number)==''){
              toastr.options.timeOut = 1500; // 2s
              toastr.error('Please Enter Mobile Number');
              return false;
      }else if(!mobile_filter.test(mobile_number)){
              toastr.options.timeOut = 1500; // 2s
              toastr.error('Please Enter Valid Mobile Number');
              return false;
      }else if ($.trim(contact_email)==''){
              toastr.options.timeOut = 1500; // 2s
              toastr.error('Please Enter Email');
              return false;
      }else if(!email_filter.test(contact_email)){
              toastr.options.timeOut = 1500; // 1.5s
              toastr.error('Please Enter Valid Email.');
              return false;
      }else{
            toastr.options.timeOut = 3000; // 1.5s
            toastr.success('Form Submitted. We will Contact You Soon....!');
            setTimeout(function(){
               document.getElementById("contact-us-form").submit();
            }, 2000);
            
           
      }
    });
  });
</script>
