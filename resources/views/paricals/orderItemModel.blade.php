{{-- $itemModalSql = "SELECT * FROM `orders` WHERE `userId`= $userId";
$itemModalResult = mysqli_query($conn, $itemModalSql);
while($itemModalRow = mysqli_fetch_assoc($itemModalResult)){
$orderid = $itemModalRow['orderId']; --}}

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
                                            <div class="px-3">Item</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="text-center">Quantity</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- $mysql = "SELECT * FROM `orderitems` WHERE orderId = $orderid";
                                    $myresult = mysqli_query($conn, $mysql);
                                    while ($myrow = mysqli_fetch_assoc($myresult)) {
                                    $pizzaId = $myrow['pizzaId'];
                                    $itemQuantity = $myrow['itemQuantity'];

                                    $itemsql = "SELECT * FROM `pizza` WHERE pizzaId = $pizzaId";
                                    $itemresult = mysqli_query($conn, $itemsql);
                                    $itemrow = mysqli_fetch_assoc($itemresult);
                                    $pizzaName = $itemrow['pizzaName'];
                                    $pizzaPrice = $itemrow['pizzaPrice'];
                                    $pizzaDesc = $itemrow['pizzaDesc'];
                                    $pizzaCategorieId = $itemrow['pizzaCategorieId']; --}}

                                    <tr>
                                        <th scope="row">
                                            <div class="p-2">
                                                <img src="img/pizza-5.jpg" alt="" width="70"
                                                    class="img-fluid rounded shadow-sm">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0">
                                                        <a href="#"class="text-dark d-inline-block align-middle">Pizza
                                                            1</a>
                                                    </h5>
                                                    <span
                                                        class="text-muted font-weight-normal font-italic d-block">Rs.99/-</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="align-middle text-center"><strong>2</strong></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="p-2">
                                                <img src="img/pizza-5.jpg" alt="" width="70"
                                                    class="img-fluid rounded shadow-sm">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0">
                                                        <a href="#"
                                                            class="text-dark d-inline-block align-middle">Pizza 2</a>
                                                    </h5>
                                                    <span
                                                        class="text-muted font-weight-normal font-italic d-block">Rs.99/-</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="align-middle text-center"><strong>2</strong></td>
                                    </tr>
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

@yield('orderItemModel')
