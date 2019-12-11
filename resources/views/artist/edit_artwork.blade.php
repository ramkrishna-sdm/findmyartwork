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
                        <div class="form-group">
                              <label>Title: <span>*</span></label>
                              <input id="mkl" type="text" name="title" placeholder="Title" class="form-control required" value="">
                              <span class="characterLeft">Characters left: 50</span>
                        </div>
                        <div class="form-group">
                              <label>Description: <span>*</span></label>
                              <textarea class="form-control textarea" name="description" rows="9" cols="50"></textarea>
                              <span class="characterLeft">Characters left: 50</span>
                        </div>
                        <div class="form-group">
                           <label>Additional Images: </label>
                           <div class="imagesRow">
                              <div class="addedImage" style="display: none;">
                                 <div class="imageBox">
                                    <img src="{{asset('assets/images/image_placeholder.jpg')}}" alt="">
                                    <button><i class="fa fa-trash" aria-hidden="true"></i></button>
                                 </div>
                              </div>
                              <!-- <button class="addImage" data-toggle="modal" data-target="#addArtworkModal" >+</button> -->
                           <button class="addImage">+<input type="file" multiple id="gallery-photo-add" name="upload_files[]"></button>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                           <div class="form-group">
                              <label>Category: <span>*</span></label>
                              <select class="form-control" name="category" id="category_id">
                                 <option value="">Select Category</option>
                            </select>
                           </div>
                    
                           <div class="form-group">
                              <label>Type of painting: <span>*</span></label>
                              <select class="form-control" name="sub_category" id="sub_category_id">
                                 <option value="">Select Type</option>
                            </select>
                           </div>
                            <div class="form-group">
                           <label>Style: <span>*</span></label>
                           <select class="form-control" name="style" id="style_id">
                          
                           </select>
                        </div>
                        <div>
                           <label>Subject: <span>*</span></label>
                           <select class="form-control" name="subject" id="subject_id">
                              <option value="">Slecte Subject</option>
                        
                           </select>
                        </div>


                     </div>

                  </div>

                  <h3>Variants</h3>
                  <div class="">

                     <table class="table">
                       <thead>
                         <tr>
                           
                           <th scope="col">Type</th>
                           <th scope="col">Size</th>
                           <th scope="col">Price</th>
                           <th scope="col">Action</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr>
                           
                           <td>Original</td>
                           <td>10*10 cm</td>
                           <td>100</td>
                         </tr>
                         <td><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                         <tr>

                         </tr>
                       </tbody>
                     </table>
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