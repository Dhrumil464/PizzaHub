<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Cart</title>
    <link rel = "icon" href ="img/logo.jpg" type = "image/x-icon">
    <style>
        #cont {
            min-height: 626px;
        }

        .table-responsive::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body>
    @extends('layouts.nav')
    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-center border rounded bg-light my-3">
                    <h1>My Cart</h1>
                </div>
            </div>
            <div class="container" id="cont">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card wish-list mb-3">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Item Name</th>
                                            <th scope="col">Item Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total Price</th>
                                            <th scope="col">
                                                <form action="{{ route('cart.clear') }}" method="POST">
                                                    @csrf
                                                    <button name="removeAllItem"
                                                        class="btn btn-sm btn-outline-danger">Remove
                                                        All</button>
                                                </form>
                                            </th>
                                        </tr>
                                    </thead>
                                    @php
                                        $totalFinalPrice = 0;
                                        $discountedTotalPrice = 0;
                                    @endphp
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                            @php
                                                $pizzaItem = App\Models\PizzaItems::where(
                                                    'pizzaId',
                                                    $item->pizzaid,
                                                )->first();
                                                $pizzaId = $pizzaItem->pizzaid;
                                                $pizzaName = $pizzaItem->pizzaname;
                                                $pizzaPrice = $pizzaItem->pizzaprice;
                                                $discount = $pizzaItem->discount;
                                                $quantity = $item->quantity;
                                                $itemTotalPrice = $pizzaPrice * $quantity;
                                                $discountedPrice =
                                                    $itemTotalPrice - ($itemTotalPrice * $discount) / 100;

                                                $totalFinalPrice += $itemTotalPrice;
                                                $discountedTotalPrice += $discountedPrice;
                                            @endphp
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pizzaName }}</td>
                                                <td>{{ number_format($pizzaPrice, 2) }}</td>
                                                <td>
                                                    <form id="frm{{ $item->cartitemid }}">
                                                        <input type="hidden" name="cartitemid"
                                                            value="{{ $item->cartitemid }}">
                                                        <input type="number" name="quantity" value="{{ $quantity }}"
                                                            class="text-center"
                                                            onchange="console.log('cartItemId:', {{ $item->cartitemid }}); updateQuantity({{ $item->cartitemid }})"
                                                            style="width:60px" min=1 max=8 onClick="this.select();">
                                                    </form>
                                                </td>
                                                <td>
                                                    @if ($pizzaItem->discount > 0)
                                                        <h6 style="color: #ff0000">
                                                            <del>Rs.{{ number_format($itemTotalPrice, 2) }}/-</del><br>
                                                            <span
                                                                style="color: green;">Rs.{{ number_format($discountedPrice, 2) }}/-</span>
                                                        </h6>
                                                    @else
                                                        <h6 style="color: green">
                                                            Rs.{{ number_format($itemTotalPrice, 2) }}/-
                                                        </h6>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form
                                                        action="{{ route('cart.remove', ['cartitemid' => $item->cartitemid]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button name="removeItem"
                                                            class="btn btn-sm btn-outline-danger">Remove</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if ($cartItems->isEmpty())
                                            <script>
                                                document.getElementById("cont").innerHTML =
                                                    '<div class="col-md-12 my-5"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="img/emptyCart.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>Your Cart is Empty</strong></h3><h4>Add something to make me happy :)</h4> <a href="{{ route('user.index') }}" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a> </div></div></div></div>'
                                            </script>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card wish-list mb-3">
                            <div class="pt-4 border bg-light rounded p-3">
                                <h5 class="mb-3 text-uppercase font-weight-bold text-center">Order summary</h5>
                                <ul class="list-group list-group-flush">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 bg-light">
                                        Total Price<span>Rs.{{ number_format($totalFinalPrice, 2) }}/-</span></li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0  bg-light">
                                        Shipping<span>Rs.{{ number_format(0, 2) }}/-</span></li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0  bg-light">
                                        Total
                                        Discount<span>Rs.{{ number_format($totalFinalPrice - $discountedTotalPrice, 2) }}/-</span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3 bg-light">
                                        <div>
                                            <strong>The total amount of</strong>
                                            <strong>
                                                <p class="mb-0">(including Tax & Charge)</p>
                                            </strong>
                                        </div>
                                        <span><strong>Rs.{{ number_format($discountedTotalPrice, 2) }}/-</strong></span>
                                    </li>
                                </ul>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Cash On Delivery
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Online Payment
                                    </label>
                                </div><br>
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                    data-target="#checkoutModal">Checkout</button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="pt-4">
                                <a class="dark-grey-text d-flex justify-content-between"
                                    style="text-decoration: none; color: #050607;" data-toggle="collapse"
                                    href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    Add a discount code (optional)
                                    <span><i class="fas fa-chevron-down pt-1"></i></span>
                                </a>
                                <div class="collapse" id="collapseExample">
                                    <div class="mt-3">
                                        <div class="md-form md-outline mb-0">
                                            <input type="text" id="discount-code" class="form-control font-weight-light"
                                                placeholder="Enter discount code">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @extends('paricals.checkoutModel')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script>
        function check(input) {
            if (input.value < 1) {
                input.value = 1;
            }
        }

        function updateQuantity(cartItemId) {
            const form = document.getElementById('frm' + cartItemId);
            if (!form) {
                console.error("Form not found for cartItemId:", form);
                return;
            }
            const formData = new FormData(form);

            fetch("{{ route('cart.updateQuantity') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log("success", data);
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</body>

</html>
