<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                @if(count($gallery)>0)
                @foreach($gallery as $key => $image)
                <div class="item active">
                    <img class="img-responsive" src="{{$image->media_url}}" alt="...">
                </div>
                @endforeach
                @endif
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
</div>