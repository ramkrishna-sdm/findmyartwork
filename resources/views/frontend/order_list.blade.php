@include('layouts.frontend.header')
<section class="checkout">
    <div class="basket container">
        <div class="basketHeader">
            <h1 class="text-huge">Orders ({{count($orders)}})</h1>
        </div>
        @if(count($orders) > 0)
            <div class="basketContent">
                <div class="basketContentSaleGroups">
                    @foreach($orders as $key => $artwork)
                    <?php
                    $json_info = json_decode($artwork->artwork_info);
                    ?>
                    <div class="basketSaleGroup">
                        <div class="basketSaleGroupHeader"><span class="text-left">Order from {{$json_info->artist->first_name}} {{$json_info->artist->last_name}}</span><span class="text-right text-thin">Price</span></div>
                        <div class="basketSaleGroupSale">
                            <div class="details">
                                <a href="{{url('artwork_details')}}/{{$artwork->artwork_id}}" class="">
                                <img alt="{{$json_info->title}}  | ArtViaYou.com" src="{{$json_info->artwork_images[0]->media_url}}?auto=compress&amp;fm=jpeg&amp;w=70&amp;fit=max" class=" loaded">
                                </a>
                                <div class="title">
                                    <div class="text-bold">{{$json_info->title}} </div>
                                    <p class="text-thin" style="margin-bottom: 0px;">
                                        <br><span class="">{{$json_info->variants[0]->width}}</span> x <span class="">{{$json_info->variants[0]->height}} cm</span>
                                        <br>
                                        @if($user_type == "artist")
                                        <button class="shipping_status" data-order-id="{{$artwork->id}}" data-toggle="modal" data-target="#changeShippingStatus" class="btn btn-light">{{$artwork->shipping_status}}</button>
                                        @else
                                        <button class="btn btn-light">{{$artwork->shipping_status}}</button>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="text-right text-thin">
                                <span style="cursor: help;">${{$json_info->variants[0]->price}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        @else
        <div class="text-center"><h4>No Order Found</h4></div>
        @endif
    </div>
</section>
@include('layouts.frontend.comman_footer')