<style>
    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 0.10rem
    }

    .card-header:first-child {
        border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1)
    }

    .track {
        position: relative;
        background-color: #ddd;
        height: 7px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 60px;
        margin-top: 50px
    }

    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative
    }

    .track .step.active:before {
        background: #FF5722
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px
    }

    .track .step.active .icon {
        background: #ee5435;
        color: #fff
    }

    .track .step.deactive:before {
        background: #030303;
    }

    .track .step.deactive .icon {
        background: #030303;
        color: #fff
    }

    .track .icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000
    }

    .track .text {
        display: block;
        margin-top: 7px
    }

    .btn-warning {
        color: #ffffff;
        background-color: #ee5435;
        border-color: #ee5435;
        border-radius: 1px
    }

    .btn-warning:hover {
        color: #ffffff;
        background-color: #ff2b00;
        border-color: #ff2b00;
        border-radius: 1px
    }
</style>
{{-- $statusmodalsql = "SELECT * FROM `orders` WHERE `userId`= $userId";
    $statusmodalresult = mysqli_query($conn, $statusmodalsql);
    while($statusmodalrow = mysqli_fetch_assoc($statusmodalresult)){
        $orderid = $statusmodalrow['orderId'];
        $status = $statusmodalrow['orderStatus'];
        if ($status == 0) 
            $tstatus = "Order Placed.";
        elseif ($status == 1) 
            $tstatus = "Order Confirmed.";
        elseif ($status == 2)
            $tstatus = "Preparing your Order.";
        elseif ($status == 3)
            $tstatus = "Your order is on the way!";
        elseif ($status == 4) 
            $tstatus = "Order Delivered.";
        elseif ($status == 5) 
            $tstatus = "Order Denied.";
        else
            $tstatus = "Order Cancelled."; --}}

@php
    $status = 0;
@endphp

@if ($status >= 1 && $status <= 4)
    {{-- $deliveryDetailSql = "SELECT * FROM `deliverydetails` WHERE `orderId`= $orderid";
    $deliveryDetailResult = mysqli_query($conn, $deliveryDetailSql);
    $deliveryDetailRow = mysqli_fetch_assoc($deliveryDetailResult);
    $trackId = $deliveryDetailRow['id'];
    $deliveryBoyName = $deliveryDetailRow['deliveryBoyName'];
    $deliveryBoyPhoneNo = $deliveryDetailRow['deliveryBoyPhoneNo'];
    $deliveryTime = $deliveryDetailRow['deliveryTime']; --}}

    @if ($status == 4)
        {{-- $deliveryTime = 'xx'; --}}
    @endif
@else
    {{-- $trackId = 'xxxxx';
        $deliveryBoyName = '';
        $deliveryBoyPhoneNo = '';
        $deliveryTime = 'xx'; --}}
@endif
@foreach ($orders as $order)
    <!-- Modal -->
    <div class="modal fade" id="orderStatus{{ $order->orderid }}" tabindex="-1" role="dialog" aria-labelledby="orderStatus{{ $order->orderid }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-light" style="background: #4b5366;">
                    <h5 class="modal-title" id="orderStatus{{ $order->orderid }}">Order Status</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="printThis">
                    <div class="container" style="padding-right: 0px;padding-left: 0px;">
                        <article class="card">
                            <div class="card-body">
                                <h6><strong>Order ID : </strong>{{ $order->orderid }}</h6>
                                <article class="card">
                                    <div class="card-body row">
                                        <div class="col"> <strong>Estimated Delivery time : </strong>
                                            <br>$deliveryTime minute
                                        </div>
                                        <div class="col"> <strong>Shipping By : </strong> <br> $deliveryBoyName | <i
                                                class="fa fa-phone"></i> $deliveryBoyPhoneNo </div>
                                        <div class="col"> <strong>Status : </strong> <br> $tstatus </div>
                                        <div class="col"> <strong>Tracking # : </strong> <br> $trackId
                                        </div>
                                    </div>
                                </article>
                                <div class="track">
                                    @if ($status == 0)
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i>
                                            </span> <span class="text">Order Placed</span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span>
                                            <span class="text">Order Confirmed</span>
                                        </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span>
                                            <span class="text"> Preparing your Order</span>
                                        </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span>
                                            <span class="text"> On the way </span>
                                        </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span>
                                            <span class="text">Order Delivered</span>
                                        </div>
                                    @elseif($status == 1)
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i>
                                            </span> <span class="text">Order Placed</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i>
                                            </span> <span class="text">Order Confirmed</span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span>
                                            <span class="text"> Preparing your Order</span>
                                        </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span>
                                            <span class="text"> On the way </span>
                                        </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span>
                                            <span class="text">Order Delivered</span>
                                        </div>
                                    @elseif($status == 2)
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i>
                                            </span> <span class="text">Order Placed</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i>
                                            </span> <span class="text">Order Confirmed</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i>
                                            </span> <span class="text"> Preparing your Order</span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span>
                                            <span class="text"> On the way </span>
                                        </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span>
                                            <span class="text">Order Delivered</span>
                                        </div>
                                    @elseif($status == 3)
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i>
                                            </span> <span class="text">Order Placed</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i>
                                            </span> <span class="text">Order Confirmed</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i>
                                            </span> <span class="text"> Preparing your Order</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i>
                                            </span> <span class="text"> On the way </span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span>
                                            <span class="text">Order Delivered</span>
                                        </div>
                                    @elseif($status == 4)
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i>
                                            </span> <span class="text">Order Placed</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i>
                                            </span> <span class="text">Order Confirmed</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i>
                                            </span> <span class="text"> Preparing your Order</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i>
                                            </span> <span class="text"> On the way </span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-box"></i>
                                            </span> <span class="text">Order Delivered</span> </div>
                                    @elseif($status == 5)
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i>
                                            </span> <span class="text">Order Placed</span> </div>
                                        <div class="step deactive"> <span class="icon"> <i class="fa fa-times"></i>
                                            </span> <span class="text">Order Denied.</span> </div>
                                    @else
                                        <div class="step deactive"> <span class="icon"> <i class="fa fa-times"></i>
                                            </span> <span class="text">Order Cancelled.</span> </div>
                                    @endif
                                </div>
                                <a href="contact.php" class="btn btn-warning" data-abc="true">Help <i
                                        class="fa fa-chevron-right"></i></a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@yield('orderStatusModel')
