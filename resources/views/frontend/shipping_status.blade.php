<div class="modal-dialog modal-lg" role="document">
    <!-- Summary Modal -->
    <div class="modal-content" id="summary_info">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sumamry #{{str_pad($order_info->id, 5, '0', STR_PAD_LEFT)}}</h5>
        <button type="button" class="close_modal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
      $json_info = json_decode($order_info->artwork_info);
      ?>
      <div class="modal-body">
        <i class="fa fa-check-circle" aria-hidden="true"></i>
        Send Order Fulfilled Notification
        <div style="margin-top: 25px; font-size: 14px;">
          <p>Send an email notification to customer that the order has been fulfilled</p>


          <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="slipUpper">
<h5>SHIPPED TO</h5>
<h6>Perry Kankam</h6>
<p>98746 Real Street, Lorem Ipsum</p>
<p>The Art Studio</p>
<p>New York, USA, 34567</p>


            </div>

          </div>

             <div class="col-md-4 col-sm-6">
            <div class="slipUpper">
<h5>SHIPPED TO</h5>
<h6>Perry Kankam</h6>
<p>98746 Real Street, Lorem Ipsum</p>
<p>The Art Studio</p>
<p>New York, USA, 34567</p>


            </div>

          </div>
          </div>
   <hr>
          <h4>Order Summary</h4>
       
          <div class="slip-table-container">
                <table class="table table-responsive-sm table-striped table-border">
            <thead>
            <tr>
            <th>item</th><th>qty</th><th>unit price</th><th>sub total</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                   <td>Artwork Wall Painting</td>
                   <td>2</td>
                   <td>$324</td>
                   <td>$648</td>
              </tr>
            </tbody>  
          </table>
          </div>

          <div class="col-md-4 offset-md-8">
            <div class="table-subTotal">
      <table class="table table-responsive-sm borderless">
           
            <tbody>
              <tr>
                   <td>item subtotal</td>  <td>$567</td>
                    
                       
                           
                  
                        
              </tr>
              <tr>  <td>shipping</td>  <td>$56</td></tr>
               <tr>  <td>discount</td>  <td>$15</td></tr>
                <tr> <td>tax</td>  <td>$1</td></tr>
                 <tr> <td>total</td>  <td>$4574</td></tr>

            </tbody>  
          </table>
            </div>

          </div>

          <div class="col-md-12">
                 <table class="table table-responsive-sm borderless table-bordered">
           
            <tbody>
             <tr class="align-items-center">
<td>CHARGE</td> <td>JHGFHJ&^%&^&**</td> <td class="text-right"> <a href="#" class="btn btn-link">Payment</a> </td>
             </tr>

            </tbody>  
          </table>

          </div>


      
        </div>
      </div>
      <div class="modal-footer">
        <div class="col-md-12" id="change_shipping_status">
          Mark Fulfilled
        </div>
      </div>
    </div>

    <!-- Shipping Status -->
    <div class="modal-content" id="shipping_status" style="display:none">
      <form method="post" action="{{ url('/update_shipping_status') }}" autocomplete="off">
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MARK ORDER FULFILLED</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
      $json_info = json_decode($order_info->artwork_info);
      ?>
      <input type="hidden" name="order_id" value="{{$order_info->id}}">
      <input type="hidden" name="shipping_status" value="Shipped">
      <div class="modal-body">
        <i class="fa fa-check-circle" aria-hidden="true"></i>
        Send Order Fulfilled Notification
        <div style="margin-top: 25px; font-size: 14px; margin-left: 25px;">
          <p>Send an email notification to customer that the order has been fulfilled</p>
        </div>
        <table class="table table-striped  table-responsive-md">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Recipient</th>
              <th scope="col">Tracking Number</th>
              <th scope="col">Carrier</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>#{{str_pad($order_info->id, 5, '0', STR_PAD_LEFT)}}</td>
              <td>{{$user_name}}</td>
              <td> <input type="text" name="tracking_number" class="form-control" value="{{$order_info->tracking_number}}" disabled> </td>
              <td> <input type="text" name="carrier" class="form-control" value="{{$order_info->carrier}}" disabled> </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>


$(document).on('click', '#closeChatList', function(){
  $('#chatModal').html('');
  $('#chatModal').hide;
})