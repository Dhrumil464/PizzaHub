<?php

namespace App\Http\Controllers;

use App\Models\PizzaCart;
use App\Models\PizzaItems;
use Illuminate\Http\Request;
use App\Http\Controllers\Validator;
use Carbon\Carbon;

class CartController extends Controller
{
    public function showCart()
    {
        if (session('userloggedin') && session('userloggedin') == true) {
            $userId = session('userId');
        } else {
            return back()->with('error', 'Please log in to view your cart.');
        }

        $cartItems = PizzaCart::where('userid', $userId)->get();
        return view('viewcart', compact('cartItems'));
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
                'userid' => $userId,
                'pizzaid' => $pizzaid,
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

    public function updateCart(Request $request, $cartitemid)
    {
        if (session('userloggedin') && session('userloggedin') == true) {
            $userId = session('userId');
        } else {
            return back()->with('error', 'Please log in to update items in cart.');
        }

        $cartItem = PizzaCart::where('userid', $userId)->where('cartitemid', $cartitemid)->first();
        if ($cartItem) {
            $cartItem->quantity = $request->input('quantity');
            $cartItem->save();
            return back()->with('success', 'Cart updated successfully!');
        } else {
            return back()->with('error', 'Item not found in cart!');
        }
    }

    public function updateQuantity(Request $request)
    {
        $cartItem = PizzaCart::find($request->cartitemid);

        $cartItem->quantity = $request->quantity;
        $cartItem->save();


        // return back()->with('success',$cartItem);

        $itemTotal = $cartItem->pizza->price * $cartItem->quantity;
        $discount = $cartItem->pizza->discount;
        $finalPrice = $itemTotal - ($itemTotal * $discount / 100);

        return response()->json([
            'itemTotal' => number_format($itemTotal, 2),
            'finalPrice' => number_format($finalPrice, 2),
            'hasDiscount' => $discount > 0,
        ]);
    }

    public function checkout()
    {
        if (session('userloggedin') && session('userloggedin') == true) {
            $userId = session('userId');
        } else {
            return back()->with('error', 'Please log in to proceed to checkout.');
        }

        $cartItems = PizzaCart::where('userid', $userId)->get();
        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Your cart is empty!');
        }

        return back()->with('success', 'Checkout successful!');
    }
}
