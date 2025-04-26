<?php

namespace App\Http\Controllers;

use App\Models\PizzaItems;
use Illuminate\Http\Request;
use App\Http\Controllers\Validator;
use Carbon\Carbon;

class PizzaItemController extends Controller
{
    public function index()
    {
        $pizzitems = PizzaItems::get();
        return view('admin.menuManage', ['pizzaitems' => $pizzitems]);
    }

    public function addPizzaItem(Request $request)
    {
        $request->validate([
            'pizzaname' => 'required|string|max:50',
            'pizzaprice' => 'required|numeric',
            'pizzaimage' => 'required|image|mimes:jpeg,png,jpg|max:10000',
            'pizzadesc' => 'nullable|string',
            'catid' => 'required',
        ], [
            'pizzaname.required' => 'The name field is required.',
            'pizzaname.string' => 'The name must be a string.',
            'pizzaname.max' => 'The name must be less than 50 characters.',
            'pizzaprice.required' => 'The price field is required.',
            'pizzaprice.numeric' => 'The price must be a number.',
            'pizzaimage.required' => 'The image field is required.',
            'pizzaimage.mimes' => 'The image must be type of jpeg, jpg or png.',
            'pizzaimage.max' => 'The image size less then 10000.',
            'catid.required' => 'The category field is required.',
        ]);

        $imageName = time() . '.' . $request->pizzaimage->extension();
        $request->pizzaimage->move(public_path('pizzaimages'), $imageName);

        $pizzaItem = PizzaItems::create([
            'pizzaname' => $request->pizzaname,
            'pizzaprice' => $request->pizzaprice,
            'pizzaimage' => $imageName ?? null,
            'pizzadesc' => $request->pizzadesc,
            'catid' => $request->catid,
            'discount' => $request->discount ? $request->discount : 0,
            'pizzacreatedate' => Carbon::now('Asia/Kolkata'),
            'pizzaupdatedate' => Carbon::now('Asia/Kolkata'),
        ]);

        return back()->with('success', 'Pizza Item added successfully!');
    }

    public function updatePizzaImage(Request $request, $pizzaid)
    {
        $request->validate([
            'pizzaimagee' => 'required|image|mimes:jpeg,png,jpg|max:10000'
        ], [
            'pizzaimagee.required' => 'The image field is required.',
            'pizzaimagee.mimes' => 'The image must be type of jpeg, jpg or png.',
            'pizzaimagee.max' => 'The image size less then 10000.',
        ]);

        $pizzaItem = PizzaItems::where('pizzaid', $pizzaid)->first();

        if (isset($request->pizzaimagee)) {
            $imageName = time() . '.' . $request->pizzaimagee->extension();
            $request->pizzaimagee->move(public_path('pizzaimages'), $imageName);
            $pizzaItem->pizzaimage = $imageName;
        }

        $pizzaItem->save();
        return back()->with('success', 'Image updated successfully!');
    }

    public function updatePizzaItem(Request $request, $pizzaid)
    {
        $request->validate([
            'pizzanamee' => 'required|string|max:50',
            'pizzadesce' => 'nullable|string',
            'pizzapricee' => 'required|numeric'
        ], [
            'pizzanamee.required' => 'The name field is required.',
            'pizzanamee.string' => 'The name must be a string.',
            'pizzanamee.max' => 'The name must be less than 50 characters.',
            'pizzaprice.required' => 'The price field is required.',
        ]);

        $pizzaItem = PizzaItems::where('pizzaid', $pizzaid)->first();

        $pizzaItem->pizzaname = $request->pizzanamee;
        $pizzaItem->pizzadesc = $request->pizzadesce;
        $pizzaItem->pizzaprice = $request->pizzapricee;
        $pizzaItem->discount = $request->discounte;
        $pizzaItem->pizzaupdatedate = Carbon::now('Asia/Kolkata');

        $pizzaItem->save();
        return back()->with('success', 'Pizza Item updated successfully!');
    }

    public function destroyPizzaItem($pizzaid)
    {
        $pizzaItem = PizzaItems::where('pizzaid', $pizzaid)->first();
        $pizzaItem->delete();
        return back()->withSuccess('Pizza Item Removed Successfully!');
    }

    /******************************   User side   ******************************/

    public function viewPizzaList($catid)
    {
        $pizzaItems = PizzaItems::where('catid', $catid)->get();
        return view('viewPizzaList', ['pizzaItems' => $pizzaItems]);
    }

    public function viewPizza()
    {
        return view('viewPizza');
    }
}
