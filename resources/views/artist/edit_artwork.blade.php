@extends('layouts.frontend.artist.app', [
    'class' => '',
    'elementActive' => 'artworks',
])
@section('content')
<section class="form-box" >
   <div class="container">
      <div class="row">
         <div class="col-md-12 form-wizard">
            <!-- Form Wizard -->
            <form role="form" enctype="multipart/form-data" action="{{url('artist/upload_artwork')}}" autocomplete="off" method="post">
                @csrf
                <?php //dd($artwork);?>
                <input type="hidden" name="role" value="artist">
               
                <input type="hidden" name="id" value="{{$artwork->id}}">
            
               <h2>Artwork details</h2>
               <fieldset>
                  <div class="row">
                     
                     <div class="col-md-8 categorySection">
                        <div class="form-group">
                           <label>Title: <span>*</span></label>
                           <input id="mkl" type="text" name="title" placeholder="Title" maxlength="100" class="form-control required" value="{{$artwork->title}}">
                           <span class="characterLeft">Characters left: 100</span>
                        </div>
                        <div class="form-group">
                           <label>Description: <span></span></label>
                           <textarea class="form-control textarea" maxlength="1000" name="description" onkeyup="countChar(this)" rows="9" cols="50">{{$artwork->description}}</textarea>
                           <span class="descCharacterLeft">Characters left: 1000</span>
                        </div>
                        <div class="form-group">
                           <label>Additional Images: </label>
                           <!-- <div class="imagesRow">
                              <div class="addedImage">
                                 <div class="imageBox">
                                    @foreach($artwork->artwork_images as $artwork_images)
                                    <img src="{{$artwork_images->media_url}}" alt="">
                                    <button><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    @endforeach
                                 </div>
                              </div>
                           </div> -->
                           <div class="imagesRow">
                              <div class="addedImage">
                                 <div class="imageBox">
                                     @foreach($artwork->artwork_images as $artwork_images)
                                    <img src="{{$artwork_images->media_url}}" alt="">
                                    <button><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    @endforeach
                                   
                                    <button><i class="fa fa-trash" aria-hidden="true"></i></button>
                                 </div>
                              </div>
                           <button class="addImage">+<input type="file" multiple id="gallery-photo-add" name="upload_files[]"></button>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                           <div class="form-group">
                              <label>Category: <span>*</span></label>
                              <select class="form-control" name="category" id="category_id">
   
                              <option value="">Select Category</option>
                                
                              @foreach ($categories as $key => $category)
                                <option value="{{ $category->id }}" @if($category->id == $artwork->category_detail->id) selected @endif>{{ $category->name }}</option>
                              @endforeach    
                            </select>
                           </div>
                    
                           <div class="form-group">
                              <label>Type of painting: <span>*</span></label>
                              <select class="form-control" name="sub_category" id="sub_category">
                                 <option value="">Select Type</option>
                                  @foreach ($subcategories as $key => $subcategory)
                                   <option value="{{$subcategory->id}}"  @if($subcategory->id == $artwork->sub_category_detail->id) selected @endif>{{$subcategory->name }}</option>
                                 @endforeach 
                              </select>
                           </div>
                            <div class="form-group">
                           <label>Style: <span>*</span></label>
                           <select class="form-control" name="style" id="style_id">
                              <option value="">Slecte Style</option>
                              @foreach ($styles as $key => $style)
                                <option value="{{$style->id}}"  @if($style->id == $artwork->style_detail->id) selected @endif>{{$style->name }}</option>
                              @endforeach  
                           </select>
                        </div>
                        <div>
                           <label>Subject: <span>*</span></label>
                            <select class="form-control" name="subject" id="subject_id">
                              <option value="">Slecte Subject</option>
                              @foreach ($subjects as $key => $subject)
                                <option value="{{$subject->id}}"@if($subject->id == $artwork->subject_detail->id) selected @endif>{{ $subject->name }}</option>
                              @endforeach  
                           </select>
                        </div>


                     </div>

                  </div>

                  <!-- <h3>Variants</h3>
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
                  </div> -->
                  <div class="form-wizard-buttons">
                     <button type="submit" class="btn btn-submit formSubmit">Submit</button>
                  </div>
               </fieldset>
              
            </form>
            <!-- Form Wizard -->
         </div>
      </div>
   </div>
</section>
@endsection