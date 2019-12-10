@extends('layouts.frontend.artist.app')
@section('content')
<section class="form-box" >
   <div class="container">
      <div class="row">
         <div class="col-md-12 form-wizard">
            <!-- Form Wizard -->
            <div class="message-alert-top">
                @if(Session::has('validation'))
                <div><div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success_message') !!}</em></div></div>
                @endif
                <!-- @if(Session::has('error_message'))
                <div><div class="alert alert-danger"><em> {!! session('error_message') !!}</em></div></div>
                @endif -->
            </div>
            <div class="message-alert-top">
                 @if ($errors->any())
                     <div class="alert alert-danger">
                         <ul>
                             @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                 @endif
             </div>
            <form role="form" enctype="multipart/form-data" action="{{url('artist/update_artist')}}" autocomplete="off" method="post" id="artist-profile-form">
                @csrf
               <input type="hidden" name="user_type" value="artist">
               <input type="hidden" name="id" value="{{$artist->id}}">
               <h2>Profile Setting</h2>
               <fieldset>
                  @if(!empty($artist))
                  <div class="row">
                     
                     <div class="col-md-8 categorySection">
                        <div class="d-flex justify-content-between cat-sub">
                           <div class="form-group">
                              <label>First Name: <span>*</span></label>
                              <input type="text" name=" first_name" placeholder="First Name" class="form-control " value="{{$artist->first_name}}" id="artist-first_name">
                           </div>
                           <div class="form-group">
                              <label>Last Name: <span>*</span></label>
                              <input  type="text" name="last_name" placeholder="Last Name" class="form-control " value="{{$artist->last_name}}" id="artist-last_name">
                           </div>
                        </div>
                        <div class="form-group">
                              <label>Email: <span>*</span></label>
                              <input  type="email" name="email" placeholder="Email" class="form-control " value="{{$artist->email}}" id="artist-email">
                        </div>
                        <div class="form-group">
                              <label>Alias: <span>*</span></label>
                              <input  type="text" name="user_name" placeholder="Gallery/artist name" class="form-control " value="{{$artist->user_name}}" id="artist-user_name">
                              @if(Session::has('validator')) 
                                <div class="alert" style="color:red;background-color:none;font-size:12px;">
                                    *{{ Session::get('validator')}}
                                </div>
                              @endif
                        </div>
                        <div class="form-group">
                              <label>Biography: <span>*</span></label>
                              <textarea class="form-control textarea" name="biography" rows="9" cols="50" value="{{$artist->  biography}}" id="artist-biography">{{$artist->  biography}}</textarea>
                        </div>
                        <div class="d-flex justify-content-between cat-sub">
                           <div class="form-group">
                              <label>Address / Street name: <span>*</span></label>
                              <input type="text" name="address" placeholder="Address / Street name" class="form-control " value="{{$artist->address}}" id="artist-address">
                           </div>
                           <div class="form-group">
                              <label>Zip / Postal code: <span>*</span></label>
                              <input  type="text" name=" postal_code" placeholder="Zip / Postal code" class="form-control " value="{{$artist->postal_code}}" id="artist-postal_code">
                           </div>
                        </div>
                         <div class="d-flex justify-content-between cat-sub">
                           <div class="form-group">
                              <label>State: <span>*</span></label>
                              <input type="text" name="state" placeholder="State" class="form-control " value="{{$artist->state}}" id="artist-state">
                           </div>
                           <div class="form-group">
                              <label>Country: <span>*</span></label>
                              <input  type="text" name=" country" placeholder="Country" class="form-control " value="{{$artist->country}}" id="artist-country">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                     <img src="{{$artist->media_url}}" alt="...">
                     <input class="image-label" name="media_url" type="file" accept="image/*"> 
                     </div>

                  </div>
                  @endif
                  <div class="form-wizard-buttons">
                     <button type="submit" class="btn btn-submit" id="update-artist-profile">Update</button>
                  </div>
               </fieldset>
              
            </form>
            <!-- Form Wizard -->
         </div>
      </div>
   </div>
</section>
@endsection

