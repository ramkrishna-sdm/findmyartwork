@include('layouts.frontend.header')
<!-- Profile Cover -->
<!-- <div class="profileCover">
    <img src="{{asset('assets/images/cover.jpg')}}" alt="">
</div> -->
<!-- End Profile Cover -->
<section class="profilePage">
    <div class="userStats">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center mainInfo">
                <div class="image">
                    <img src="{{$profileDetails->media_url}}" class="img-fluid" alt="">
                </div>
                <div class="userStatsinfo">
                    <span class="name">{{$profileDetails->first_name}} {{$profileDetails->last_name}}</span>  
                    <div class="stats"><span>56.6k Likes</span> <span>10k Followers</span> <span class="following">3k Following</span> <a href="#" class="btn btn-border btn-sm">Follow</a></div>
                    <p>{{$profileDetails->biography}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="artWorksAbout">
        <div class="container">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#artWorks" role="tab" aria-controls="artWorks" aria-selected="true"><img src="{{asset('assets/images/artwork-icon.svg')}}" alt=""> Artworks</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false"><img src="{{asset('assets/images/about-icon-light.svg')}}" alt=""> About</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="artWorks" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="artwork-images" id="artwork-images">
                        @if(count($profileDetails->artworks) > 0)
                        @foreach($profileDetails->artworks as $key => $artwork)
                        <figure><img src="{{asset('assets/images/art1.jpg')}}"></figure>
                        @endforeach
                        @endif
                    </div>
                    <!-- <div class="container">
                        <div class="col-lg-12  py-4 border d-flex paginationContainer">
                            <ul class="pagination mx-auto">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true"> <img src="{{asset('assets/images/left-arrow.svg')}}" alt=""> Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item"><a class="page-link" href="#">.....</a></li>
                                <li class="page-item"><a class="page-link" href="#">87</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">Next <img src="{{asset('assets/images/right-arrow.svg')}}" alt=""></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                </div>
                <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="profileAbout">
                        <div class="aboutHeader d-flex justify-content-between align-items-center">
                            <h4>about amenda</h4>
                            <a href="#" class="btn btn-default">edit profile</a>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h6>contact information</h6>
                                <div class="infoItem"><span class="title">Email:</span> <span class="data">{{$profileDetails->email}}</span></div>
                                <div class="infoItem"><span class="title">Address:</span> <span class="data">{{$profileDetails->city}}, {{$profileDetails->state}}, {{$profileDetails->country}}, {{$profileDetails->postal_code}}</span></div>
                                <div class="divider"></div>
                                <!-- <h6>basic information</h6> -->
                            </div>
                            <div class="col-md-8">
                                <div class="extraInfo">
                                    <h5>Professional in</h5>
                                    <ul class="skills">
                                        @if(count($professional) > 0)
                                        @foreach($professional as $key => $value)
                                        <li>{{$value}}</li>
                                        @endforeach
                                        @endif
                                    </ul>
                                    <p>{{$profileDetails->biography}} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.frontend.comman_footer')