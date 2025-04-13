@foreach ($orders as $order)
    <!-- Modal -->
    <div class="modal fade" id="orderStatus{{ $order->orderid }}" tabindex="-1" role="dialog"
        aria-labelledby="orderStatus{{ $order->orderid }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-light" style="background-color: #4b5366;">
                    <h5 class="modal-title" id="orderStatus{{ $order->orderid }}">Order Status and Delivery Details</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.updateOrderStatus', ['orderid' => $order->orderid]) }}" method="post"
                        style="border-bottom: 2px solid #dee2e6;">
                        @csrf
                        @method('put')
                        <div class="row align-items-end mb-3">
                            <!-- Order Status -->
                            <div class="col-md-7">
                                <label for="orderstatus"><strong>Order Status</strong></label>
                                <div class="d-flex align-items-center">
                                    <select name="orderstatus" id="orderstatus" class="form-control mr-2">
                                        <option value="1" {{ $order->orderstatus == 1 ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="2" {{ $order->orderstatus == 2 ? 'selected' : '' }}>
                                            Confirmed</option>
                                        <option value="3" {{ $order->orderstatus == 3 ? 'selected' : '' }}>
                                            Preparing</option>
                                        <option value="4" {{ $order->orderstatus == 4 ? 'selected' : '' }}>
                                            Out for Delivery</option>
                                        <option value="5" {{ $order->orderstatus == 5 ? 'selected' : '' }}>
                                            Delivered</option>
                                        <option value="6" {{ $order->orderstatus == 6 ? 'selected' : '' }}>
                                            Denied </option>
                                    </select>
                                    <button type="button" class="btn btn-secondary" data-container="body"
                                        data-toggle="popover" title="Order Status" data-placement="bottom"
                                        data-html="true"
                                        data-content="1=Pending.<br>2=Confirmed.<br>3=Preparing.<br>4=Out for Delivery.<br>5=Delivered.<br>6=Denied.">
                                        <i class="fas fa-info"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Current Status -->
                            <div class="col-md-5">
                                <label for="currstatus"><strong>Current Status</strong></label>
                                <input type="text" name="currstatus" id="currstatus" class="form-control"
                                    value="{{ $order->orderstatus }}" readonly>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mb-2" name="updateStatus">Update</button>
                    </form>
                    <form action="{{ route('admin.updateDeliveryBoy', ['orderid' => $order->orderid]) }}"
                        method="post">
                        @csrf
                        @method('put')
                        <div class="text-left my-2">
                            @php
                                $boyDetails = DB::table('delivery_boy_details')->get();
                                $deliveryDetails = DB::table('delivery_details')
                                    ->where('orderid', $order->orderid)
                                    ->first();
                            @endphp
                            <b><label for="boySelect">Delivery Boy Name</label></b>
                            <select name="dbid" id="boySelect{{ $order->orderid }}" class="form-control">
                                @foreach ($boyDetails as $boy)
                                    <option value="{{ $boy->dbid }}"
                                        {{ isset($deliveryDetails) && $deliveryDetails->dbid == $boy->dbid ? 'selected' : '' }}>
                                        {{ $boy->deliveryboyname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-left my-2 row">
                            <div class="form-group col-md-6">
                                <b><label for="phone">Phone No</label></b>
                                <input class="form-control" id="phone{{ $order->orderid }}" name="phone"
                                    value="{{ $boy->deliveryboyphoneno }}" type="tel">
                            </div>
                            <div class="form-group col-md-6">
                                <b><label for="catId">Estimate Time(minute)</label></b>
                                <input class="form-control" id="time" name="time"
                                    value="{{ isset($deliveryDetails) && $deliveryDetails->deliverytime ? $deliveryDetails->deliverytime : 20 }}"
                                    type="number" min="1" max="120">
                            </div>
                        </div>
                        @if ($order->orderstatus == 3 || $order->orderstatus == 4)
                            <button type="submit" class="btn btn-success" name="updateDeliveryDetails">Update</button>
                        @else
                            <button type="submit" class="btn btn-success" name="updateDeliveryDetails"
                                disabled>Update</button>
                        @endif
                    </form>
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

<script>
    const deliveryBoys = @json($boyDetails);

    document.addEventListener('DOMContentLoaded', function() {
        @foreach ($orders as $order)
            const select{{ $order->orderid }} = document.getElementById('boySelect{{ $order->orderid }}');
            const phoneInput{{ $order->orderid }} = document.getElementById('phone{{ $order->orderid }}');

            if (select{{ $order->orderid }}) {
                select{{ $order->orderid }}.addEventListener('change', function() {
                    const selectedId = this.value;
                    const selectedBoy = deliveryBoys.find(boy => boy.dbid == selectedId);
                    if (selectedBoy) {
                        phoneInput{{ $order->orderid }}.value = selectedBoy.deliveryboyphoneno;
                    } else {
                        phoneInput{{ $order->orderid }}.value = '';
                    }
                });

                // Trigger change manually to set phone initially
                select{{ $order->orderid }}.dispatchEvent(new Event('change'));
            }
        @endforeach
    });
</script>
