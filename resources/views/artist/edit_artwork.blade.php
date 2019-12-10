@extends('layouts.frontend.artist.app')
@section('content')
<section class="form-box" >
   <div class="container">
      <div class="row">
         <div class="col-md-12 form-wizard">
            <!-- Form Wizard -->
            <form role="form" enctype="multipart/form-data" action="{{url('artist/update_artist')}}" autocomplete="off" method="post">
                @csrf
            
               <h2>Artwork details</h2>
               <fieldset>
                  <div class="row">
                     
                     <div class="col-md-8 categorySection">
                        <div class="d-flex justify-content-between cat-sub">
                           <div class="form-group">
                              <label>First Name: <span>*</span></label>
                              <input type="text" name=" first_name" placeholder="First Name" class="form-control required" value="">
                           </div>
                           <div class="form-group">
                              <label>Last Name: <span>*</span></label>
                              <input  type="text" name="last_name" placeholder="Last Name" class="form-control required" value="">
                           </div>
                        </div>
                        <div class="form-group">
                              <label>Email: <span>*</span></label>
                              <input  type="email" name="email" placeholder="Email" class="form-control required" value="">
                        </div>
                        <div class="form-group">
                              <label>Alias: <span>*</span></label>
                              <input  type="text" name="user_name" placeholder="Gallery/artist name" class="form-control required" value="">
                        </div>
                        <div class="form-group">
                              <label>Biography: <span>*</span></label>
                              <textarea class="form-control textarea" name="biography" rows="9" cols="50" value=""></textarea>
                        </div>
                        <div class="d-flex justify-content-between cat-sub">
                           <div class="form-group">
                              <label>Address / Street name: <span>*</span></label>
                              <input type="text" name="address" placeholder="Address / Street name" class="form-control required" value="">
                           </div>
                           <div class="form-group">
                              <label>Zip / Postal code: <span>*</span></label>
                              <input  type="text" name=" postal_code" placeholder="Zip / Postal code" class="form-control required" value="">
                           </div>
                        </div>
                         <div class="d-flex justify-content-between cat-sub">
                           <div class="form-group">
                              <label>State: <span>*</span></label>
                              <input type="text" name="state" placeholder="State" class="form-control required" value="">
                           </div>
                           <div class="form-group">
                              <label>Country: <span>*</span></label>
                              <input  type="text" name=" country" placeholder="Country" class="form-control required" value="">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                     <img src="" alt="...">
                     <input class="image-label" name="media_url" type="file" accept="image/*"> 
                     </div>

                  </div>
                  <div class="form-wizard-buttons">
                     <button type="submit" class="btn btn-submit">Submit</button>
                  </div>
               </fieldset>
              
            </form>
            <!-- Form Wizard -->
         </div>
      </div>
   </div>
</section>
@endsection