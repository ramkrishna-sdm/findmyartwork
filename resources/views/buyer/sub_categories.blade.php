<div class="sorter">
    <div class="container d-flex align-items-center justify-content-between">
        <h3>{{$categories->name}} <span class="count">({{count($categories->artwork)}}) &nbsp;&nbsp;></span> <span
                class="property">Abstract</span></h3>
        <div class="form-group">
            <span class="input-icon"><img src="{{asset('assets/images/dropdown.svg')}}" alt=""></span>
            <select id="" class="form-control">
                <option value="">Sort by</option>
                <option value="">Trending</option>
                <option value="">Latest</option>
                <option value="">Popular</option>
            </select>
        </div>
    </div>
</div>

<!-- Start Category Section -->
<section class="Categories">
    <div class="container">
        <div class="categoryList">
            <!-- Category Item -->
            @foreach($categories->subcategories as $subcategory)
            <div class="categoryItem">
                <a href="#">
                    <div class="image"><img src="{{$subcategory->media_url}}" alt=""></div>
                    <h3>{{$subcategory->name}}</h3>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Category Section -->

<!-- Top Artworks Section -->
<section class="topArtworks">
    <div class="container">
        <div class="sectionHeading">
            <h2>Top Artworks</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($categories->artwork as $artworks)
            <div class="col-lg-4 col-md-6">
                <div class="artPost">
                    <div class="postHeader">
                        <div class="username">
                            <div class="image"><img src="{{$artworks->artist->media_url}}" alt=""></div>
                            <span class="name">{{$artworks->artist->first_name}}</span>
                        </div>
                        <span class="Posted">2 hours ago</span>
                    </div>
                    <div class="postImage">
                        <a href="#"><img src="{{asset('assets/images/post.jpg')}}" alt=""></a>
                    </div>
                    <div class="postFooter">
                        <div class="leftBlock">
                            <h5>The Wave</h5>
                            @if($artworks->variants)
                            <h6>$ {{$artworks->variants[0]->price}}</h6>
                            @endif
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
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-lg-12  py-4 border d-flex paginationContainer">
                <ul class="pagination mx-auto">
                    <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span
                                aria-hidden="true"> <img src="{{asset('assets/images/left-arrow.svg')}}" alt="">
                                Previous</span></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">Next
                                <img src="{{asset('assets/images/right-arrow.svg')}}" alt=""></span></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Top Artworks Section -->