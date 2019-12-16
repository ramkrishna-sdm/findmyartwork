@include('layouts.frontend.header') 
 <section class="blogDetails">
    <div class="container">
        <div class="row">
       @if(!empty($blog_detail) > 0)
          <div class="col-md-8">
  
            <div class="card mb-4">
              <img class="card-img-top" src="{{$blog_detail->media_url}}" alt="Card image cap">
              <div class="card-body">
                <h2 class="card-title">{{$blog_detail->title}}</h2>
                <p class="card-text"><?=htmlspecialchars_decode($blog_detail->des_first)?></p>
         
              </div>
              <!-- <div class="card-footer text-muted">
                Posted on January 1, 2020 by&nbsp;
                <a href="#">Will Smith</a>
              </div> -->
            </div>
            <ul class="pagination justify-content-center mb-4">
              <li class="page-item">
                <a class="page-link" href="#">← Older</a>
              </li>
              <li class="page-item disabled">
                <a class="page-link" href="#">Newer →</a>
              </li>
            </ul>
  
          </div>
          @endif
          <div class="col-md-4">
            <div class="card my-3">
              <h5 class="card-header">Leatest</h5>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                  @foreach($leatests as $key=>$leatest)
                   <div class="blogSnippet">
                       <div class="image">
                       <img src="{{$leatest->media_url}}" style="width: 40px; height: 40px;"  alt="">
                       </div>

                       <div class="blogText">
                        <p><?=htmlspecialchars_decode($leatest->des_first)?></p>
                       <!--  <span class="comments">287 Comments</span> -->
                       </div>
                   </div>
                  @endforeach

                 
               
                  </div>
              
                </div>
              </div>
            </div>
  
          
   <!-- Side Widget -->
           <!--  <div class="card my-4">
              <h5 class="card-header">Trending</h5>
              <div class="card-body">
                <img class="card-img-top" src="{{asset('assets/images/featured.png')}}" alt="Card image cap">
              </div>
            </div> -->
        
        
          </div>
            
        </div>
        
      </div>
 </section>
 @include('layouts.frontend.comman_footer')
        