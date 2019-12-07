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
                    <div class="head align-items-center">
                        <div class="title">
                            <h3>{{$artwork_result->title}}</h3>
                            <div class="breadcrumb">
                                Arist &gt; {{$artwork_result->artist->first_name}} {{$artwork_result->artist->last_name}}
                            </div>
                        </div>
                        <div class="price">
                            ${{$artwork_result->variants[0]->price}}
                        </div>
                    </div>
                    <div class="text">
                        <p>{{$artwork_result->desacription}}</p>
                        <ul>
                            <li>Dimensions, 87 x 110 cm</li>
                            <li>Mechanism,  Oil colors</li>
                            <li>Frame,  Wooden</li>
                            <li>Shipping,  Free</li>
                        </ul>
                    </div>
                    <div class="button d-flex align-items-center">
                        <a href="#" class="btn btn-default btn-block mr-2 mb-2">ADD TO CART</a>
                        <a href="#" class="btn btn-border btn-block ml-2 mt-0 mb-2">BUY NOW</a>
                    </div>
                    <div class="actionBlock">
                        <span class="likes">{{count($artwork_result->like_count)}} Likes</span> 
                        <div class="actionIcons">
                            <a href="#"><img src="{{asset('assets/images/like.png')}}" alt=""></a>
                            <a href="#"><img src="{{asset('assets/images/saved.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //Product Details -->
<!-- Top Artworks Section -->
<section class="topArtworks">
    <div class="container">
        <div class="sectionHeading">
            <h2 >Top Artworks</h2>
        </div>
    </div>
    <div class="container">
        <div class="artistSLider">
            <div class="owl-carousel artistCarousel">
                @foreach($similar_artwork as $artworks)
                <div class="artPost">
                    <div class="postHeader">
                        <div class="username">
                            <div class="image"><img src="{{$artworks->artist->media_url}}" alt=""></div>
                            <span class="name">{{$artworks->artist->first_name}}</span>
                        </div>
                        <span class="Posted">2 hours ago</span>
                    </div>
                    <div class="postImage">
                        <a href="#"> <img src="{{$artworks->artwork_images[0]->media_url}}" alt=""></a>
                    </div>
                    <div class="postFooter">
                        <div class="leftBlock">
                            <h5>{{$artworks->title}}</h5>
                            @if($artworks->variants)
                            <h6>$ {{$artworks->variants[0]->price}}</h6>
                            @endif
                        </div>
                        <div class="rightBlock">
                            <span class="likes">{{count($artworks->like_count)}} Likes</span> 
                            <div class="actionIcons">
                                <a  class="like_artwork" data-artwork-id="{{$artwork->id}}" href="javascript:void(0);"><img class="like_image" src="{{asset('assets/images/like.png')}}" title="Like Artwork"></a>
                                <a class="save_artwork" data-artwork-id="{{$artwork->id}}" href="javascript:void(0);"><img class="save_image" src="{{asset('assets/images/saved.png')}}"  title="Save for later"></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
               <!--  <div class="artPost">
                    <div class="postHeader">
                        <div class="username">
                            <div class="image"><img src="assets/images/profile-sm.jpg" alt=""></div>
                            <span class="name">Amenda Berry</span>
                        </div>
                        <span class="Posted">2 hours ago</span>
                    </div>
                    <div class="postImage">
                        <a href="#"> <img src="assets/images/post.jpg" alt=""></a>
                    </div>
                    <div class="postFooter">
                        <div class="leftBlock">
                            <h5>The Wave</h5>
                            <h6>$2076</h6>
                        </div>
                        <div class="rightBlock">
                            <span class="likes">456 Likes</span> 
                            <div class="actionIcons">
                                <a href="#"><img src="{{asset('assets/images/like.png')}}" alt=""></a>
                                <a href="#"><img src="{{asset('assets/images/saved.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="artPost">
                    <div class="postHeader">
                        <div class="username">
                            <div class="image"><img src="assets/images/profile-sm.jpg" alt=""></div>
                            <span class="name">Amenda Berry</span>
                        </div>
                        <span class="Posted">2 hours ago</span>
                    </div>
                    <div class="postImage">
                        <a href="#"> <img src="assets/images/post.jpg" alt=""></a>
                    </div>
                    <div class="postFooter">
                        <div class="leftBlock">
                            <h5>The Wave</h5>
                            <h6>$2076</h6>
                        </div>
                        <div class="rightBlock">
                            <span class="likes">456 Likes</span> 
                            <div class="actionIcons">
                                <a href="#"><img src="{{asset('assets/images/like.png')}}" alt=""></a>
                                <a href="#"><img src="{{asset('assets/images/saved.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!-- End Top Artworks Section -->
<!-- End Top Artists Section -->
<!-- Footer Section -->
@include('layouts.frontend.comman_footer')