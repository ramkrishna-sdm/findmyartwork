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
                            <span style="cursor: help;">£{{$artwork->saved_artwork->variants[0]->price}}</span>
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
                    <span>Artworks total</span><span>£{{$total_price}}</span>
                </div>
                <div class="text-thin">
                    <span>Shipping Charge</span><span>£{{$total_shipping}}</span>
                </div>
                <hr>
                <div class="total">
                    <div class="text-medium text-thin">Total (in GBP)</div>
                    <span class="text-big text-bold">£{{$total_price + $total_shipping}}</span>
                </div>
                <hr>
                @if(Auth::user())
                <a class="btn btn-default checkout_btn" href="javascript:void(0);">Go to checkout</a>
                @else
                <a class="btn btn-default" data-toggle="modal" data-target="#LoginModal" id="show-toaster" href="javascript:void(0);">Go to checkout</a>
                @endif
                <!-- <a class="btn btn-default" href="javascript:void(0);" data-toggle="modal" data-target="#userCheckoutModal">Go to checkout</a> -->
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
        <div class="text-center">
            <h4>No Item in Cart</h4>
        </div>
        @endif
    </div>
    <!-- The Modal -->
    <div class="modal" id="userCheckoutModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- <form id="checkout_form" method="post" action="{{url('paypal')}}">
                        @csrf
                        @if(count($item_id) > 0)
                        @foreach($item_id as $key => $id)
                        <input type="hidden" name="artwork_arr[]" value="{{$id}}">
                        @endforeach
                        @endif
                    </form> -->
                    <div class="row">
                        <form class="needs-validation" novalidate="">
                            <div class="col-md-10 offset-md-1 order-md-1">
                                <div class="py-2 ">
                                    <h2>Checkout</h2>
                                </div>
                                <h4 class="mb-3">Billing address</h4>
                                <div class="row">
                                    <div class="col-md-8 mb-3">
                                        <label for="firstName">Name</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="lastName">Company (Optional)</label>
                                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                                        <div class="invalid-feedback">
                                            Valid last name is required.
                                        </div>
                                    </div>
                                    <div class=" col-md-12 mb-3">
                                        <label for="address">Address</label>
                                        <textarea type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                                        </textarea>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="country">Country</label>
                                        <select class="form-control d-block w-100" id="country" required="">
                                            <option value="">Choose...</option>
                                            <option>United States</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="state">State</label>
                                        <select class="form-control d-block w-100" id="state" required="">
                                            <option value="">Choose...</option>
                                            <option>California</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please provide a valid state.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="zip">Zip</label>
                                        <input type="text" class="form-control" id="zip" placeholder="" required="">
                                        <div class="invalid-feedback">
                                            Zip code required.
                                        </div>
                                    </div>
                                    <div class="col-md-8 offset-md-2 mb-3">
                                        <button class="btn btn-default btn-block" type="submit">Continue to checkout</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@include('layouts.frontend.comman_footer')