@extends('layouts.frontend.artist.app')
@section('content')
<section class="form-box" >
   <div class="container">
      <!-- Form Wizard -->
      <form role="form" enctype="multipart/form-data" action="{{url('artist/update_artist')}}" autocomplete="off" method="post">
         @csrf
         <input type="hidden" name="user_type" value="artist">
         <input type="hidden" name="id" value="{{$artist->id}}">
         <div class="row">

            <div class="col-12 col-sm- 6 col-md-4 profile-pic">
               <div class="frame"><img src="{{$artist->media_url}}" alt="..."></div>
               <button class="browse-btn">
                  <span>Browser Me</span>
                  <input class="image-label" name="media_url" type="file" accept="image/*"> 
               </button>
            
            </div>

            <div class="col-12 col-sm-6 col-md-8 form-wizard profile-setting">
               <h2>Profile Management</h2>
               @if(!empty($artist))
               <div class="row">
                  <div class="col-12 categorySection">
                     <div class="d-flex justify-content-between cat-sub">
                        <div class="form-group">
                           <label>First Name: <span>*</span></label>
                           <input type="text" name=" first_name" placeholder="First Name" class="form-control required" value="{{$artist->first_name}}">

                        </div>
                        <div class="form-group">
                           <label>Last Name: <span>*</span></label>
                           <input  type="text" name="last_name" placeholder="Last Name" class="form-control required" value="{{$artist->last_name}}">
                        </div>
                     </div>
                     <div class="form-group">
                           <label>Email: <span>*</span></label>
                           <input  type="email" name="email" placeholder="Email" class="form-control required" value="{{$artist->email}}">
                     </div>
                     <div class="form-group">
                           <label>Alias: <span>*</span></label>
                           <input  type="text" name="user_name" placeholder="Gallery/artist name" class="form-control required" value="{{$artist->user_name}}">
                     </div>
                     <div class="form-group">
                           <label>Biography: <span></span></label>
                           <textarea class="form-control textarea" name="biography" rows="9" cols="50" 
                           value="{{$artist->biography}}">{{$artist->biography}}</textarea>
                     </div>
                     <div class="d-flex justify-content-between cat-sub">
                        <div class="form-group">
                           <label>Address / Street name: <span>*</span></label>
                           <input type="text" name="address" placeholder="Address / Street name" class="form-control required" value="{{$artist->address}}">
                        </div>
                        <div class="form-group">

                           <label>Zip / Postal code: <span>*</span></label>
                           <input  type="text" name=" postal_code" placeholder="Zip / Postal code" class="form-control required" value="{{$artist->postal_code}}">

                        </div>
                     </div>
                      <div class="d-flex justify-content-between cat-sub">
                        <div class="form-group">
                           <label>State: <span>*</span></label>
                           <input type="text" name="state" placeholder="State" class="form-control required" value="{{$artist->state}}">
                        </div>
                        <div class="form-group">
                           <label>Country: <span>*</span></label>
                           <input  type="text" name=" country" placeholder="Country" class="form-control required" value="{{$artist->country}}">
                        </div>
                     </div>
                  </div>

               </div>
               @endif
               <div class="form-wizard-buttons">
                  <button type="submit" class="btn btn-submit">Submit</button>
               </div>
            </div>
         </div>
      </form>
      <!-- Form Wizard -->
   </div>
</section>


<section class="form-box">
   <div class="container">
  
   <form class="col-md-12" action="{{ url('artist/profile/password') }}" method="POST">
         @csrf
         @method('PUT')
         <div class="card">
         @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
         @endif
        @if (session('password_status'))
            <div class="alert alert-success" role="alert">
                {{ session('password_status') }}
            </div>
        @endif
         <div class="card-header">
               <h5 class="title">{{ __('Change Password') }}</h5>
         </div>
            <div class="card-body">
                  <div class="row">
                     <label class="col-md-3 col-form-label">{{ __('Old Password') }}</label>
                     <div class="col-md-9">
                        <div class="form-group">
                              <input type="password" name="old_password" class="form-control" placeholder="Old password" required>
                        </div>
                        @if ($errors->has('old_password'))
                              <span class="invalid-feedback" style="display: block;" role="alert">
                                 <strong>{{ $errors->first('old_password') }}</strong>
                              </span>
                        @endif
                     </div>
                  </div>
                  <div class="row">
                     <label class="col-md-3 col-form-label">{{ __('New Password') }}</label>
                     <div class="col-md-9">
                        <div class="form-group">
                              <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        @if ($errors->has('password'))
                              <span class="invalid-feedback" style="display: block;" role="alert">
                                 <strong>{{ $errors->first('password') }}</strong>
                              </span>
                        @endif
                     </div>
                  </div>
                  <div class="row">
                     <label class="col-md-3 col-form-label">{{ __('Password Confirmation') }}</label>
                     <div class="col-md-9">
                        <div class="form-group">
                              <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required>
                        </div>
                        @if ($errors->has('password_confirmation'))
                              <span class="invalid-feedback" style="display: block;" role="alert">
                                 <strong>{{ $errors->first('password_confirmation') }}</strong>
                              </span>
                        @endif
                     </div>
                  </div>
            </div>
            <div class="card-footer ">
                  <div class="row">
                     <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-info btn-round">{{ __('Save Changes') }}</button>
                     </div>
                  </div>
            </div>
         </div>
      </form>
   </div>
</section>
@endsection



