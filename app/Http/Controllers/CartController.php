<?php

namespace App\Http\Controllers;

use App\Models\PizzaCart;
use App\Models\PizzaItems;
use Illuminate\Http\Request;
use App\Http\Controllers\Validator;
use Carbon\Carbon;

class CartController extends Controller
{
    public function addToCart()
    {
        // $request->validate([
        //     'pizzaid' => 'required|exists:pizza_items,id',
        //     'quantity' => 'required|integer|min:1',
        //     'size' => 'nullable|integer|min:1',
        // ]);

        if (session('userloggedin') && session('userloggedin') == true) {
            $userId = session('userId');
        }
        $pizzaid = request('pizzaid');

        $cartItem = PizzaCart::where('userid', $userId)->where('pizzaid', $pizzaid)->first();

        if ($cartItem) {
            // If item exists, update quantity
            return back()->with('error', 'Item already added!');
        } else {
            // If item does not exist, create a new cart entry
            PizzaCart::create([
                'userid' => $userId,
                'pizzaid' => $pizzaid,
                'quantity' => 1,
                'size' => 9, // Default size
                'itemadddate' => Carbon::now('Asia/Kolkata'),
            ]);
        }

        return back()->with('success', 'Item added to cart successfully!');
    }
}
