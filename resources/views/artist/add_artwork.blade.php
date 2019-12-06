@extends('layouts.frontend.artist.app')
@section('content')
<section class="form-box" >
    <div class="container">
        <div class="row">
            <div class="col-md-12 form-wizard">
                <!-- Form Wizard -->
                <form role="form" enctype="multipart/form-data" action="{{ url('update_artwork') }}" autocomplete="off" method="post">
                @csrf
                    <p>Fill all form field to go next step</p>
                    <!-- Form progress -->
                    <div class="form-wizard-steps form-wizard-tolal-steps-4">
                        <div class="form-wizard-progress">
                            <div class="form-wizard-progress-line" data-now-value="12.25" data-number-of-steps="4" style="width: 12.25%;"></div>
                        </div>
                        <!-- Step 1 -->
                        <div class="form-wizard-step active">
                            <div class="form-wizard-step-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                            <p>Images</p>
                        </div>
                        <!-- Step 1 -->
                        <!-- Step 2 -->
                        <div class="form-wizard-step">
                            <div class="form-wizard-step-icon"><i class="fa fa-location-arrow" aria-hidden="true"></i></div>
                            <p>Title and description</p>
                        </div>
                        <!-- Step 2 -->
                        <!-- Step 3 -->
                        <div class="form-wizard-step">
                            <div class="form-wizard-step-icon"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
                            <p>Categorization</p>
                        </div>
                        <!-- Step 3 -->
                        <!-- Step 4 -->
                        <div class="form-wizard-step">
                            <div class="form-wizard-step-icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                            <p>Inventory and pricing</p>
                        </div>
                        <!-- Step 4 -->
                    </div>
                    <!-- Form progress -->
                    <!-- Form Step 1 -->
                    <fieldset>
                        <h4>Add a primary image of your artwork. To create the best listing, please crop the image to only show the artwork itself: <span>Step 1 - 4</span></h4>
                        <div class="form-group">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                              <div class="fileinput-new thumbnail">
                                <div id="" class="image-previewer" data-cropzee="cropzee-input"></div>

                                <img src="{{asset('assets/images/image_placeholder.jpg')}}" alt="...">
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                              <div>
                                <span class="btn btn-rose btn-round btn-file">
                                  <span class="fileinput-new">Upload</span>
                                  <span class="fileinput-exists">image</span>
                                  <input id="cropzee-input" type="file" accept="image/*">
                                </span>
                              </div>
                            </div>
                        </div>
                        <div class="form-wizard-buttons">
                            <button type="button" class="btn btn-next">Next</button>
                        </div>
                    </fieldset>
                    <!-- Form Step 1 -->
                    <!-- Form Step 2 -->
                    <fieldset>
                        <h4>Please choose the category of the original, even if you’re not selling it on ArtViaYou. : <span>Step 2 - 4</span></h4>
                        <div class="form-group">
                            <div class="col-md-4">
                                <img src="{{asset('assets/images/image_placeholder.jpg')}}" alt="...">
                            </div>
                            <div class="col-md-8"  style="float: left;">
                                    <label>title: <span>*</span></label>
                                    <input type="text" name="title" placeholder="Title" class="form-control required">
                                    <label>Description: <span>*</span></label>
                                    <div class="textarea textarea-muted">
                                    <textarea rows="4" cols="50">
                                    At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies. 
                                    </textarea>
                                    </div>
                             </div>
                        </div>
                       
                        <div class="form-wizard-buttons">
                            <button type="button" class="btn btn-previous">Previous</button>
                            <button type="button" class="btn btn-next">Next</button>
                        </div>
                    </fieldset>
                    <!-- Form Step 2 -->
                    <!-- Form Step 3 -->
                    <fieldset>
                        <h4>The better you describe your artwork using keywords, the higher you will get ranked by search engines: <span>Step 3 - 4</span></h4>
                        <div class="form-group">
                            <div class="col-md-4">
                                <img src="{{asset('assets/images/image_placeholder.jpg')}}" alt="...">
                            </div>
                            <div class="col-md-8"  style="float: left;">
                                <div class="container-fluid">
                                <div class="row form-inline">
                                <div class="form-group col-md-6 col-xs-6">
                                  <label>Category: <span>*</span></label>
                                    <select class="form-control">
                                      <option>Australia</option>
                                      <option>America</option>
                                      <option>Bangladesh</option>
                                      <option>Canada</option>
                                      <option>England</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-xs-6">
                                    <label>Sub-category: <span>*</span></label>
                                    <select class="form-control">
                                      <option>Australia</option>
                                      <option>America</option>
                                      <option>Bangladesh</option>
                                      <option>Canada</option>
                                      <option>England</option>
                                    </select>
                                </div>
                                </div>
                                </div>
                                <div class="form-group">
                                     <label>Category: <span>*</span></label>
                                    <select class="form-control">
                                      <option>Australia</option>
                                      <option>America</option>
                                      <option>Bangladesh</option>
                                      <option>Canada</option>
                                      <option>England</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Style: <span>*</span></label>
                                    <div style="float: right;"><input type="checkbox" id="subject_animals"><label for="subject_animals">Animals</label></div>
                                    <div style="float: right;"><input type="checkbox" id="subject_animals"><label for="subject_animals">Architecture</label></div>
                                    <div style="float: right;"><input type="checkbox" id="subject_animals"><label for="subject_animals">Flowers and plants</label></div>
                                    <div style="float: right;"><input type="checkbox" id="subject_animals"><label for="subject_animals">Landscapes</label></div>
                                </div>     
                            </div>
                        </div>
                        
                        <br/>
                        <div class="form-wizard-buttons">
                            <button type="button" class="btn btn-previous">Previous</button>
                            <button type="button" class="btn btn-next">Next</button>
                        </div>
                    </fieldset>
                    <!-- Form Step 3 -->
                    <!-- Form Step 4 -->
                    <fieldset>
                        <h4>Are you selling an original piece, limited editions or art prints? You can add as many variants as you want now, and always add more later on: <span>Step 4 - 4</span></h4>
                        <div style="clear:both;"></div>
                        <div class="form-group">
                            <label>Bank Name: <span>*</span></label>
                            <input type="text" name="Bank Name" placeholder="Bank Name" class="form-control required">
                        </div>
                        
                        <br/>
                        <div class="form-wizard-buttons">
                            <button type="button" class="btn btn-previous">Previous</button>
                            <button type="submit" class="btn btn-submit">Submit</button>
                        </div>
                    </fieldset>
                    <!-- Form Step 4 -->
                </form>
                <!-- Form Wizard -->
            </div>
        </div>
    </div>
</section>
@endsection
