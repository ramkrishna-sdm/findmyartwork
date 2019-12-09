@include('layouts.frontend.header')
    <div class="message-alert-top">
        @if(Session::has('success_message'))
        <div><div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success_message') !!}</em></div></div>
        @endif
        @if(Session::has('error_message'))
        <div><div class="alert alert-danger"><em> {!! session('error_message') !!}</em></div></div>
        @endif
    </div>
    <div class="container">
        <div class="row">
           <div class="col-sm-12 text-center">
                <h4>Profile Management</h4>
            </div>      
        </div>
        <form method="post"  action="{{ url('/buyer/update_buyer') }}">
        @csrf
            <div class="row">
                <div class="col-sm-6">
                    <input type="hidden" name="id" value="{{$buyer->id}}">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class=" form-control"  placeholder="Enter First Name" value="{{$buyer->first_name}}" name="first_name">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class=" form-control"  placeholder="Enter Last Name" value="{{$buyer->last_name}}" name="last_name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class=" form-control"  placeholder="Enter Email" value="{{$buyer->email}}" name="email">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class=" form-control"  placeholder="Enter Address" value="{{$buyer->address}}" name="address">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" class=" form-control"  placeholder="Enter Postal Code" value="{{$buyer->postal_code}}" name="postal_code">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class=" form-control"  placeholder="Enter City" value="{{$buyer->city}}" name="city">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center" >
                    <button type="submit" class="btn btn-primary" >Update</button>
                </div>
            </div>

        </form>
    </div>
</section>
@include('layouts.frontend.comman_footer')