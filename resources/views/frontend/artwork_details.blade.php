@include('layouts.frontend.header')
<section class="productDetails">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="image">
                    <div class="owl-carousel productDetailCarousel">
                        @if(count($artwork_result['artwork_images']) > 0)
                        @foreach($artwork_result['artwork_images'] as $key => $image)
                        <div class="item">
                            <img src="{{$image->media_url}}" />
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="detail">
                    <div class="head justify-content-between">
                        <div class="title">
                            <h3>{{$artwork_result->title}}</h3>
                            <div class="breadcrumb">
                                Arist &gt; {{$artwork_result->artist->first_name}} {{$artwork_result->artist->last_name}}
                            </div>
                        </div>
                        <div class="price">
                            @if(count($artwork_result->variants) > 0)
                            ${{$artwork_result->variants[0]->price}}
                            @endif
                            
                        </div>
                    </div>
                    <div class="text">
                        <p>{{$artwork_result->desacription}}</p>
                        <ul>
                            <li>Dimensions, @if(count($artwork_result->variants) > 0){{$artwork_result->variants[0]->height}} x {{$artwork_result->variants[0]->width}} @endif cm</li>
                            <li>{{$artwork_result->category_detail->name}}</li>
                            <li>{{$artwork_result->sub_category_detail->name}}</li>
                            <li>{{$artwork_result->style_detail->name}}</li>
                            <li>{{$artwork_result->subject_detail->name}}</li>
                        </ul>
                    </div>
                    <div class="button d-flex align-items-center">
                        <a href="javascript:void(0)" data-artwork-id="{{$artwork_result->id}}" class="add_to_cart btn btn-default btn-block mr-2 mb-2">ADD TO CART</a>
                        @if(Auth::user())
                            <a href="#" class="btn btn-border btn-block ml-2 mt-0 mb-2">BUY NOW</a>
                        @else
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#LoginModal" class="btn btn-border btn-block ml-2 mt-0 mb-2">BUY NOW</a>
                        @endif
                            
                    </div>
                    <div class="actionBlock">
                        <span class="likes">{{count($artwork_result->artwork_like)}} Likes</span> 
                        <div class="actionIcons">
                            <a  class="like_artwork" data-artwork-id="{{$artwork_result->id}}" href="javascript:void(0);"><img class="like_image" src="{{asset('assets/images/like.png')}}" title="Like Artwork"></a>
                            <a class="save_artwork" data-artwork-id="{{$artwork_result->id}}" href="javascript:void(0);"><img class="save_image" src="{{asset('assets/images/saved.png')}}"  title="Save for later"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //Product Details -->
<!-- Similar Artworks Section -->
<section class="topArtworks">
    <div class="container">
        <div class="sectionHeading">
            <h2 >Similar Artworks</h2>
        </div>
    </div>
    <div class="container">
        <div class="artistSLider">
            <div class="owl-carousel artistCarousel">
                @foreach($similar_artwork as $artworks)
                @if($artwork_result->id != $artworks->id)
                <div class="artPost">
                    <div class="postHeader">
                        <div class="username">
                            <div class="image"><img src="{{$artworks->artist->media_url}}" alt=""></div>
                            <span class="name">{{$artworks->artist->first_name}}</span>
                        </div>
                        <span class="Posted">2 hours ago</span>
                    </div>
                    <div class="postImage">
                        <a href="{{url('artwork_details')}}/{{$artworks->id}}"> <img src="{{$artworks->artwork_images[0]->media_url}}" alt=""></a>
                    </div>
                    <div class="postFooter">
                        <div class="leftBlock">
                            <h5>{{$artworks->title}}</h5>
                            @if(count($artworks->variants) > 0)
                            <h6>$ {{$artworks->variants[0]->price}}</h6>
                            @endif
                        </div>
                        <div class="rightBlock">
                            <span class="likes">{{count($artworks->artwork_like)}} Likes</span> 
                            <div class="actionIcons">
                                <a  class="like_artwork" data-artwork-id="{{$artworks->id}}" href="javascript:void(0);"><img class="like_image" src="{{asset('assets/images/like.png')}}" title="Like Artwork"></a>
                                <a class="save_artwork" data-artwork-id="{{$artworks->id}}" href="javascript:void(0);"><img class="save_image" src="{{asset('assets/images/saved.png')}}"  title="Save for later"></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End Similar Artworks Section -->
<!-- Footer Section -->
@include('layouts.frontend.comman_footer')