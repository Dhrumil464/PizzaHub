<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Validator;
use App\Models\DeliveryDetails;
use App\Models\UsersAdmin;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PizzaItems;
use App\Models\PizzaCart;
use Carbon\Carbon;

use function PHPUnit\Framework\assertNotEmpty;

class CartController extends Controller
{
    public function showCart()
    {
        if (session('userloggedin') && session('userloggedin') == true) {
            $userId = session('userId');
            $cartItems = PizzaCart::where('userid', $userId)->get();
            return view('viewcart', compact('cartItems'));
        } else {
            $cartItems = [];
            return view('viewcart', compact('cartItems'));
            // return back()->with('error', 'Please log in to view your cart.');
        }
    }

    public function addToCart()
    {
        if (session('userloggedin') && session('userloggedin') == true) {
            $userId = session('userId');
        } else {
            return back()->with('error', 'Please log in to add items to cart.');
        }
        $pizzaid = request('pizzaid');
        $cartItem = PizzaCart::where('userid', $userId)->where('pizzaid', $pizzaid)->first();

        if ($cartItem) {
            return back()->with('error', 'Item already added!');
        } else {
            PizzaCart::create([
                'pizzaid' => $pizzaid,
                'userid' => $userId,
                'quantity' => 1,
                'itemadddate' => Carbon::now('Asia/Kolkata'),
            ]);
        }
        return back()->with('success', 'Item added to cart successfully!');
    }

    public function removeFromCart($cartitemid)
    {
        if (session('userloggedin') && session('userloggedin') == true) {
            $userId = session('userId');
        } else {
            return back()->with('error', 'Please log in to remove items from cart.');
        }

        $cartItem = PizzaCart::where('userid', $userId)->where('cartitemid', $cartitemid)->first();
        if ($cartItem) {
            $cartItem->delete();
            return back()->with('success', 'Item removed from cart successfully!');
        } else {
            return back()->with('error', 'Item not found in cart!');
        }
    }

    public function clearCart()
    {
        if (session('userloggedin') && session('userloggedin') == true) {
            $userId = session('userId');
        } else {
            return back()->with('error', 'Please log in to clear the cart.');
        }

        PizzaCart::where('userid', $userId)->delete();
        return back()->with('success', 'Cart cleared successfully!');
    }

    public function updateQuantity(Request $request)
    {
        $cartItem = PizzaCart::find($request->cartitemid);

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        $itemTotal = $cartItem->pizza->price * $cartItem->quantity;
        $discount = $cartItem->pizza->discount;
        $finalPrice = $itemTotal - ($itemTotal * $discount / 100);

        return response()->json([
            'itemTotal' => number_format($itemTotal, 2),
            'finalPrice' => number_format($finalPrice, 2),
            'hasDiscount' => $discount > 0,
        ]);
    }

    /************************* checkout orders *************************/

    public function showCheckoutModal(Request $request)
    {
        $paymentMethod = $request->paymentMethod;

        session(['paymentMethod' => $paymentMethod]);

        return redirect()->back()->with('showModal', true);
    }

    public function checkout(Request $request)
    {
        if (session('userloggedin') && session('userloggedin') == true) {
            $userId = session('userId');
        }

        $user = UsersAdmin::find($userId);

        // orders -> orderid, userid, fullname, email, address, zip, phoneNo, totalFinalPrice, discountedTotalPrice, paymentMethod, orderStatus, orderDate
        // orderItems -> orderItemId, orderId, pizzaid, quantity

        do {
            $orderId = 'O' . rand(1000, 9999); // 4-digit number
            $exists = Order::where('orderid', $orderId)->exists();
        } while ($exists);

        $fullname = $request->fullname;
        $email = $request->email;
        $address = $request->address;
        $zipcode = $request->zipcode;
        $phoneNo = $request->phoneNo;
        $totalFinalPrice = session('totalFinalPrice');
        $discountedTotalPrice = session('discountedTotalPrice');
        $paymentMethod = session('paymentMethod');
        $orderStatus = 1;
        $orderDate = Carbon::now('Asia/Kolkata');
        $password = $request->password;

        if (password_verify($password, $user->password)) {
            if ($paymentMethod == 1) {
                $order = Order::create([
                    'orderid' => $orderId,
                    'userid' => $userId,
                    'fullname' => $fullname,
                    'email' => $email,
                    'address' => $address,
                    'zip' => $zipcode,
                    'phoneno' => $phoneNo,
                    'totalfinalprice' => $totalFinalPrice,
                    'discountedtotalprice' => $discountedTotalPrice,
                    'paymentmethod' => $paymentMethod,
                    'orderstatus' => $orderStatus,
                    'orderdate' => $orderDate,
                ]);

                if ($order) {
                    $cartItems = PizzaCart::where('userid', $userId)->get();
                    foreach ($cartItems as $item) {
                        $pizza = PizzaItems::find($item->pizzaid);
                        $discount = $pizza->discount;
                        OrderItem::create([
                            'orderid' => $orderId,
                            'pizzaid' => $item->pizzaid,
                            'quantity' => $item->quantity,
                            'discount' => $discount,
                        ]);
                    }
                    PizzaCart::where('userid', $userId)->delete();
                    return back()->with('success', 'Order placed successfully!');
                } else {
                    return back()->with('error', 'Order Failed Try Again!');
                }
            } elseif ($paymentMethod == 2) {
                return back()->with('success', 'online');
            }
        } else {
            return back()->with('error', 'Password is incorrect!');
        }
    }

    public function viewOrders()
    {
        if (session('userloggedin') && session('userloggedin') == true) {
            $userId = session('userId');
            $orders = Order::where('userid', $userId)->orderBy('orderdate')->get();
            return view('viewOrder', compact('orders'));
        } else {
            $orders = [];
            return view('viewOrder', compact('orders'));
        }
    }

    public function manageOrders()
    {
        $orders = Order::orderBy('orderdate')->get();
        return view('admin.orderManage', compact('orders'));
    }

    public function updateOrderStatus(Request $request, $orderid)
    {
        $order = Order::where('orderid', $orderid)->first();
        if ($order) {
            $order->orderstatus = $request->orderstatus;
            $order->save();
            return back()->with('success', 'Order id : ' . $orderid . ' status updated successfully!');
        } else {
            return back()->with('error', 'Order id : ' . $orderid . ' not found!');
        }
    }

    public function updateDeliveryBoy(Request $request, $orderid)
    {
        do {
            $trackId = 'TRACK' . rand(1000, 9999);
            $exists = DeliveryDetails::where('trackid', $trackId)->exists();
        } while ($exists);

        $deliveryDetail = DeliveryDetails::where('orderid', $orderid)->first();
        if ($deliveryDetail) {
            $deliveryDetail->dbid = $request->dbid;
            $deliveryDetail->deliverytime = $request->time;
            $deliveryDetail->save();

            if ($deliveryDetail) {
                return back()->with('success', 'Order delivery details updated.');
            } else {
                return back()->with('error', 'Order delivery fail.');
            }
        } else {
            $deliveryDetail = DeliveryDetails::create([
                'orderid' => $orderid,
                'dbid' => $request->dbid,
                'deliverytime' => $request->time,
                'trackid' => $trackId,
                'deliverydate' => Carbon::now('Asia/Kolkata')
            ]);

            if ($deliveryDetail) {
                $order = Order::where('orderid', $orderid)->first();
                $order->orderstatus = 4;
                $order->save();
                return back()->with('success', 'Order out of delivery.');
            } else {
                return back()->with('error', 'Order delivery fail.');
            }
        }
    }
}
