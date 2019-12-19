<div class="modal-dialog" role="document">
    <!-- Summary Modal -->
    <div class="modal-content" id="summary_info">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sumamry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
      $json_info = json_decode($order_info->artwork_info);
      ?>
      <div class="modal-body">
        <i class="fa fa-check-circle" aria-hidden="true"></i>
        Send Order Fulfilled Notification
        <div style="margin-top: 25px; font-size: 14px; margin-left: 25px;">
          <p>Send an email notification to customer that the order has been fulfilled</p>
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
        <table class="table table-dark table-responsive">
          <thead>
            <tr>
              <th scope="col">Recipient</th>
              <th scope="col">Tracking Number</th>
              <th scope="col">Carrier</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$user_name}}</td>
              <td> <input type="text" name="tracking_number" value="{{$order_info->tracking_number}}"> </td>
              <td> <input type="text" name="carrier" value="{{$order_info->carrier}}"> </td>
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