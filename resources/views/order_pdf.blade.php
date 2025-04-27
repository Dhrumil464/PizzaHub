<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Invoice - {{ $orderDetails->orderid ?? 0 }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin-top: 30px;
        }

        .main {
            font-size: 12px;
            border: 1px solid #000;
            padding: 20px;
            width: 90%;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            font-size: 20px;
        }

        .order-info,
        .user-info {
            margin-bottom: 10px;
        }

        .order-info table,
        .user-info table {
            width: 100%;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            text-align: right;
            margin-top: 5px;
            font-size: 12px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 10px;
        }

        .payment-info {
            margin-top: 10px;
            font-size: 12px;
        }

        .payment-info table {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="header">
            <h2>Pizza Hub - Order Invoice</h2>
        </div>
        <div class="order-info">
            <h4>Order Details:</h4>
            <table>
                <tr>
                    <td><strong>Order ID:</strong></td>
                    <td>{{ $orderDetails->orderid ?? 0 }}</td>
                </tr>
                <tr>
                    <td><strong>Order Date:</strong></td>
                    <td>{{ \Carbon\Carbon::parse($orderDetails->orderdate ?? 'N/A')->format('d-m-Y h:i A') }}</td>
                </tr>
                <tr>
                    <td><strong>Payment Method:</strong></td>
                    <td>
                        @if ($orderDetails->paymentmethod == 1)
                            Cash On Delivery
                        @else
                            Online Payment
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        <div class="user-info">
            <h4>Customer Details:</h4>
            <table>
                <tr>
                    <td><strong>Name:</strong></td>
                    <td>{{ $orderDetails->fullname ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><strong>Email:</strong></td>
                    <td>{{ $orderDetails->email ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><strong>Phone No:</strong></td>
                    <td>{{ $orderDetails->phoneno ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><strong>Address:</strong></td>
                    <td>{{ $orderDetails->address ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><strong>Zip Code:</strong></td>
                    <td>{{ $orderDetails->zip ?? 'N/A' }}</td>
                </tr>
            </table>
        </div>
        <h4>Order Items:</h4>
        <table>
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Pizza Name</th>
                    <th>Quantity</th>
                    <th>Price (Rs.)</th>
                    <th>Total (Rs.)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderItems as $index => $item)
                    @php
                        $pizzaId = $item->pizzaid;
                        $pizzaItem = App\Models\PizzaItems::find($pizzaId);
                    @endphp
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $pizzaItem->pizzaname ?? 'N/A' }}</td>
                        <td>{{ $item->quantity ?? 'N/A' }}</td>
                        <td>{{ $pizzaItem->pizzaprice ?? 'N/A' }}</td>
                        <td>{{ $item->quantity * $pizzaItem->pizzaprice ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="total">
            <p><strong>Total Final Price:</strong> ₹{{ number_format($orderDetails->totalfinalprice, 2) }}/-Rs.
            </p>
            @php
                $discountPrice = $orderDetails->totalfinalprice - $orderDetails->discountedtotalprice;
            @endphp
            <p><strong>Total Discount:</strong>
                ₹{{ number_format($discountPrice, 2) }}/-Rs.</p>
            <p><strong>Discounted Price:</strong>
                ₹{{ number_format($orderDetails->discountedtotalprice ?? 0, 2) }}/-Rs.</p>
        </div>

        @if ($orderDetails->paymentmethod == 2)
            <div class="payment-info">
                <h4>Payment Information:</h4>
                <table>
                    <tr>
                        <td><strong>Payment ID:</strong></td>
                        <td>{{ $paymentDetails->payment_id ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Payment Email:</strong></td>
                        <td>{{ $paymentDetails->email ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Payment Name:</strong></td>
                        <td>{{ $paymentDetails->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Total Paid:</strong></td>
                        <td>₹{{ number_format($paymentDetails->total_amount ?? 0, 2) }}</td>
                    </tr>
                    <tr>
                        <td><strong>Payment Status:</strong></td>
                        <td>{{ $paymentDetails->status ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>IP Address:</strong></td>
                        <td>{{ $paymentDetails->ip ?? 'N/A' }}</td>
                    </tr>
                </table>
            </div>
        @endif

        <div class="footer">
            <p>Thank you for ordering from Pizza Hub!</p>
        </div>
    </div>
</body>

</html>
