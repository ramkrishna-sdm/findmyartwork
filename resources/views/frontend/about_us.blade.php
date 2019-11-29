@include('layouts.header')
<!-- Page Header Title -->
@foreach($about as $key => $aboutus)
<div class="page-title">
<div class="page-title-inner">
   <span class="pagetitleText">{{$aboutus->title}}</span> 
   <img src="{{asset('assets/images/about-graphic.svg')}}" class="title-img" alt="">
</div>
</div>
<!--End Page Header Title -->
<!-- About text 1 -->
<section class="about aboutText-1">
<div class="container">
   <div class="row">
      <div class="col-md-6">
         {!!$aboutus->des_first!!}
      </div>
      <div class="col-md-5 offset-md-1 text-center">
         <div class="aboutTextImage-1">
            <img src="{{$aboutus->first_img_url}}"  class="img-fluid" alt="">
         </div>
      </div>
   </div>
</div>
</section>
<!-- End About text 1 -->
<!-- About text 2 -->
<section class="about aboutText-2">
<div class="container">
   <div class="row align-items-center">
      <div class="col-md-5  text-center">
         <div class="aboutTextImage-1">
            <img src="{{$aboutus->second_img_url}}" class="img-fluid" alt="">
         </div>
      </div>
      <div class="col-md-7 pl-4 ">
         {!!$aboutus->des_second!!}
      </div>
   </div>
</div>
</section>
@endforeach
<!-- End About text 2 -->
<!-- Team Section -->
<section class="ourteam">
<div class="container">
   <div class="sectionHeading">
      <h2 >Our Team</h2>
   </div>
</div>
<div class="container">
   <div class="row">
      <div class="col-md-4 col-sm-4">
         <div class="teamMember">
            <div class="image"><img src="{{asset('assets/images/member1.jpg')}}" class="img-fluid" alt=""></div>
            <div class="text"><span class="memberName">Jamie Carter</span> <span class="type">oil painter</span></div>
         </div>
      </div>
      <div class="col-md-4 col-sm-4">
         <div class="teamMember">
            <div class="image"><img src="{{asset('assets/images/member2.jpg')}}" alt=""></div>
            <div class="text"><span class="memberName">Jamie Carter</span> <span class="type">oil painter</span></div>
         </div>
      </div>
      <div class="col-md-4 col-sm-4">
         <div class="teamMember">
            <div class="image"><img src="{{asset('assets/images/member3.jpg')}}" alt=""></div>
            <div class="text"><span class="memberName">Jamie Carter</span> <span class="type">oil painter</span></div>
         </div>
      </div>
      <div class="col-md-4 col-sm-4">
         <div class="teamMember">
            <div class="image"><img src="{{asset('assets/images/member1.jpg')}}" alt=""></div>
            <div class="text"><span class="memberName">Jamie Carter</span> <span class="type">oil painter</span></div>
         </div>
      </div>
      <div class="col-md-4 col-sm-4">
         <div class="teamMember">
            <div class="image"><img src="{{asset('assets/images/member2.jpg')}}" alt=""></div>
            <div class="text"><span class="memberName">Jamie Carter</span> <span class="type">oil painter</span></div>
         </div>
      </div>
      <div class="col-md-4 col-sm-4">
         <div class="teamMember">
            <div class="image"><img src="{{asset('assets/images/member3.jpg')}}" alt=""></div>
            <div class="text"><span class="memberName">Jamie Carter</span> <span class="type">oil painter</span></div>
         </div>
      </div>
   </div>
</div>
</section>
<!-- End Team Section -->
@include('layouts.comman_footer')