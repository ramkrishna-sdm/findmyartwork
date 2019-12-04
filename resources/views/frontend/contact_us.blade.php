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
      <div class="col-sm-12">
          @if(Session::has('message'))
            <div>
               <div class="alert alert-success"><em> {{session('message')}}</em></div>
            </div>
    @endif
      </div>
   </div>
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

               <form class="row" method="POST" action="{{url('/save_contact_form')}}" >
                  @csrf
                  <div class="col-12 col-sm-6 form-group">
                     <input type="text" class="form-control" placeholder="Your Name" name="name">
                  </div>
                  <div class="col-12 col-sm-6 form-group">
                     <input type="tel" class="form-control" placeholder="Phone" name="mobile_number">
                  </div>
                  <div class="col-12 form-group">
                     <input type="email" class="form-control" id="" placeholder="Email Address" name="email">
                  </div>
                  <div class="col-12 form-group">
                     <textarea class="form-control" placeholder="Message" name="message"></textarea>
                  </div>
                  <div class="col-12">
                     <button type="submit" class="btn btn-default">Submit</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="map">
   <img src="assets/images/map.jpg" alt="map" />
</div>
</section>
<!-- End contact page -->
@include('layouts.frontend.comman_footer')