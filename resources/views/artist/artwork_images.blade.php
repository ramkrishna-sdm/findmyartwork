@foreach($artwork_images as $images)
<div class="addedImage">
 <div class="imageBox">
    <img src="{{$images->media_url}}" alt="">
 <!--    <button><i class="fa fa-trash remove_artwork_image" aria-hidden="true" data-artwork-image-id="{{$images->id}}"></i></button> -->
  <button type="button" onClick="removeImage({{$images->id}},{{$images->artwork_id}})"><i class="fa fa-trash" aria-hidden="true"></i></button>
 </div>
</div>
@endforeach

<div class="addedImage" style="display: none;">
 <div class="imageBox">
    <img src="{{$images->media_url}}" alt="">
    <button><i class="fa fa-trash" aria-hidden="true"></i></button>
 </div>
</div>
<button class="addImage">+<input type="file" multiple id="gallery-photo-add" name="upload_files[]"></button>