{{-- $itemModalSql = "SELECT * FROM `orders` WHERE `userId`= $userId";
$itemModalResult = mysqli_query($conn, $itemModalSql);
while($itemModalRow = mysqli_fetch_assoc($itemModalResult)){
$orderid = $itemModalRow['orderId']; --}}
@foreach ($orders as $order)
    <!-- Modal -->
    <div class="modal fade" id="orderItem" tabindex="-1" role="dialog" aria-labelledby="orderItem" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-light" style="background: #4b5366;">
                    <h5 class="modal-title" id="orderItem">Order Items</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <!-- Shopping cart table -->
                            <div class="table-responsive">
                                <table class="table text">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="px-3">Pizza Item</div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="text-center">Quantity</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $orderItems = App\Models\OrderItem::where('orderid',$order->orderid)->get();
                                        @endphp
                                        @foreach ($orderItems as $orderItem)
                                            @php
                                                $pizzaId = $orderItem->pizzaid;
                                                $itemQuantity = $orderItem->quantity;
                                                $pizzaItem = App\Models\PizzaItems::find($pizzaId);

                                                $itemTotalPrice = $pizzaItem->pizzaprice * $itemQuantity;
                                                $discountedPrice =
                                                    $itemTotalPrice - ($itemTotalPrice * $pizzaItem->discount) / 100;
                                            @endphp
                                            <tr>
                                                <th scope="row">
                                                    <div class="p-2">
                                                        <img src="/pizzaimages/{{ $pizzaItem->pizzaimage }}"
                                                            alt="" width="70"
                                                            class="img-fluid rounded shadow-sm">
                                                        <div class="ml-3 d-inline-block align-middle">
                                                            <h5 class="mb-0">
                                                                <a
                                                                    href="#"class="text-dark d-inline-block align-middle">{{ $pizzaItem->pizzaname }}</a>
                                                            </h5>
                                                            @if ($pizzaItem->discount > 0)
                                                                <h6 style="color: #ff0000">
                                                                    <del>Rs.{{ number_format($itemTotalPrice, 2) }}/-</del>
                                                                    <span class="ml-2"
                                                                        style="color: green;">Rs.{{ number_format($discountedPrice, 2) }}/-</span>
                                                                </h6>
                                                            @else
                                                                <h6 style="color: green">
                                                                    Rs.{{ number_format($itemTotalPrice, 2) }}/-
                                                                </h6>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </th>
                                                <td class="align-middle text-center"><strong>{{ $itemQuantity }}</strong></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@yield('orderItemModel')
