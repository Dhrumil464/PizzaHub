{{-- $itemModalSql = "SELECT * FROM `orders`";
    $itemModalResult = mysqli_query($conn, $itemModalSql);
    while($itemModalRow = mysqli_fetch_assoc($itemModalResult)){
        $orderid = $itemModalRow['orderId'];
        $userid = $itemModalRow['userId'];
        $orderStatus = $itemModalRow['orderStatus']; --}}

@foreach ($orders as $order)
    <!-- Modal -->
    <div class="modal fade" id="orderStatus{{ $order->orderid }}" tabindex="-1" role="dialog" aria-labelledby="orderStatus{{ $order->orderid }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-light" style="background-color: #4b5366;">
                    <h5 class="modal-title" id="orderStatus{{ $order->orderid }}">Order Status and Delivery Details</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="partials/_orderManage.php" method="post" style="border-bottom: 2px solid #dee2e6;">
                        <div class="text-left my-2">
                            <b><label for="name">Order Status</label></b>
                            <div class="row mx-2">
                                <input class="form-control col-md-3" id="status" name="status" value="$orderStatus"
                                    type="number" min="0" max="6" required>
                                <button type="button" class="btn btn-secondary ml-1" data-container="body"
                                    data-toggle="popover" title="Order Status" data-placement="bottom" data-html="true"
                                    data-content="0=Order Placed.<br> 1=Order Confirmed.<br> 2=Preparing your Order.<br> 3=Your order is on the way!<br> 4=Order Delivered.<br> 5=Order Denied.<br> 6=Order Cancelled.">
                                    <i class="fas fa-info"></i>
                                </button>
                            </div>
                        </div>
                        <input type="hidden" id="orderId" name="orderId" value="$orderid">
                        <button type="submit" class="btn btn-success mb-2" name="updateStatus">Update</button>
                    </form>
                    {{-- $deliveryDetailSql = "SELECT * FROM `deliverydetails` WHERE `orderId`= $orderid";
            $deliveryDetailResult = mysqli_query($conn, $deliveryDetailSql);
            $deliveryDetailRow = mysqli_fetch_assoc($deliveryDetailResult);
            $trackId = $deliveryDetailRow['id'];
            $deliveryBoyName = $deliveryDetailRow['deliveryBoyName'];
            $deliveryBoyPhoneNo = $deliveryDetailRow['deliveryBoyPhoneNo'];
            $deliveryTime = $deliveryDetailRow['deliveryTime']; --}}
                    @php
                        $orderStatus = 1;
                    @endphp
                    @if ($orderStatus > 0 && $orderStatus < 5)
                        <form action="partials/_orderManage.php" method="post">
                            <div class="text-left my-2">
                                <b><label for="name">Delivery Boy Name</label></b>
                                <input class="form-control" id="name" name="name" value="$deliveryBoyName"
                                    type="text" required>
                            </div>
                            <div class="text-left my-2 row">
                                <div class="form-group col-md-6">
                                    <b><label for="phone">Phone No</label></b>
                                    <input class="form-control" id="phone" name="phone"
                                        value="$deliveryBoyPhoneNo" type="tel" required pattern="[0-9]{10}">
                                </div>
                                <div class="form-group col-md-6">
                                    <b><label for="catId">Estimate Time(minute)</label></b>
                                    <input class="form-control" id="time" name="time" value="$deliveryTime"
                                        type="number" min="1" max="120" required>
                                </div>
                            </div>
                            <input type="hidden" id="trackId" name="trackId" value="$trackId">
                            <input type="hidden" id="orderId" name="orderId" value="$orderid">
                            <button type="submit" class="btn btn-success" name="updateDeliveryDetails">Update</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach

<style>
    .popover {
        top: -77px !important;
    }
</style>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap Bundle (Includes Popper.js) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


<script>
    $(function() {
        var popoverElement = $('[data-toggle="popover"]').popover();
    });
</script>
