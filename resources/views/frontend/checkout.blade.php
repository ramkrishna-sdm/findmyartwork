@include('layouts.frontend.header')
<section class="checkout">
    <div class="basket container">
        <div class="basketHeader">
            <h1 class="text-huge">Basket ({{count($items_cart)}})</h1>
        </div>
        @if(count($items_cart) > 0)
            <div class="basketContent">
                <div class="basketContentSaleGroups">
                    @foreach($items_cart as $key => $artwork)
                    <div class="basketSaleGroup">
                        <div class="basketSaleGroupHeader"><span class="text-left">Order from {{$artwork->saved_artwork->artist->first_name}} {{$artwork->saved_artwork->artist->last_name}}</span><span class="text-right text-thin">Price</span></div>
                        <div class="basketSaleGroupSale">
                            <div class="details">
                                <a href="" class="">
                                <img alt="{{$artwork->saved_artwork->title}}  | ArtViaYou.com" src="{{$artwork->saved_artwork->artwork_images[0]->media_url}}?auto=compress&amp;fm=jpeg&amp;w=70&amp;fit=max" class=" loaded">
                                </a>
                                <div class="title">
                                    <div class="text-bold">{{$artwork->saved_artwork->title}} </div>
                                    <p class="text-thin" style="margin-bottom: 0px;">
                                        <br><span class="">{{$artwork->saved_artwork->variants[0]->width}}</span> x <span class="">{{$artwork->saved_artwork->variants[0]->height}} cm</span>
                                        <br>
                                        <a href="{{url('remove_from_cart')}}/{{$artwork->saved_artwork->id}}"><button class="btn btn-default">Remove</button></a>
                                    </p>
                                </div>
                            </div>
                            <div class="text-right text-thin">
                                <span style="cursor: help;">${{$artwork->saved_artwork->variants[0]->price}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- basket sale group  -->
                <div class="basketPanel">
                    <div class="text-medium text-bold">Basket summary</div>
                    <hr>
                    <div class="text-thin">
                        <span>Artworks total</span><span>${{$total_price}}</span>
                    </div>
                    <div class="text-thin">
                        <span>Shipping to India</span><span>${{$total_shipping}}</span>
                    </div>
                    <hr>
                    <div class="total">
                        <div class="text-medium text-thin">Total (in USD)</div>
                        <span class="text-big text-bold">${{$total_price + $total_shipping}}</span>
                    </div>
                    <hr>
                    <a class="btn btn-default checkout_btn" href="javascript:void(0);">Go to checkout</a>
                </div>
            </div>
            <form id="checkout_form" method="post" action="{{url('paypal')}}">
                @csrf
                @if(count($item_id) > 0)
                @foreach($item_id as $key => $id)
                <input type="hidden" name="artwork_arr[]" value="{{$id}}">
                @endforeach
                @endif
            </form>
        @else
        <div class="text-center"><h4>No Item in Cart</h4></div>
        @endif
    </div>
</section>
@include('layouts.frontend.comman_footer')