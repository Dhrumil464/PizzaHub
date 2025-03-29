<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Validator;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categories::get();
        return view('admin.categoryManage', ['categories' => $categories]);
        // return redirect()->route('admin.dashboard', ['page' => 'categoryManage']);
    }

    public function addCategory(Request $request)
    {
        $request->validate([
            'catname' => 'required|string|unique:categories,catname|max:50',
            'catimage' => 'required|image|mimes:jpeg,png,jpg|max:10000',
            'catdesc' => 'nullable|string|max:60',
            'cattype' => 'required|integer|max:2',
        ], [
            'catname.required' => 'The name field is required.',
            'catname.string' => 'The name must be a string.',
            'catname.unique' => 'Category already exists.',
            'catname.max' => 'The name must be less than 50 characters.',
            'catimage.required' => 'The image field is required.',
            'catimage.mimes' => 'The image must be type of jpeg, jpg or png.',
            'catimage.max' => 'The image size less then 10000.',
            'catdesc.string' => 'The description must be a string.',
            'catdesc.max' => 'The description must be less than 60 characters.',
            'cattype.required' => 'The type field is required.',
            'cattype.integer' => 'The type must be a integer.',
        ]);

        $imageName = time() . '.' . $request->catimage->extension();
        $request->catimage->move(public_path('catimages'), $imageName);

        $category = Categories::create([
            'catname' => $request->catname,
            'catimage' => $imageName ?? null,
            'catdesc' => $request->catdesc,
            'cattype' => $request->cattype,
            'catcreatedate' => Carbon::now('Asia/Kolkata'),
            'catupdatedate' => Carbon::now('Asia/Kolkata'),
        ]);

        return back()->with('success', 'Category added successfully!');
    }

    public function updateImage(Request $request, $catid)
    {
        $request->validate([
            'catimagee' => 'required|image|mimes:jpeg,png,jpg|max:10000'
        ], [
            'catimagee.required' => 'The image field is required.',
            'catimagee.mimes' => 'The image must be type of jpeg, jpg or png.',
            'catimagee.max' => 'The image size less then 10000.',
        ]);

        $category = Categories::where('catid', $catid)->first();

        if (isset($request->catimagee)) {
            $imageName = time() . '.' . $request->catimagee->extension();
            $request->catimagee->move(public_path('catimages'), $imageName);
            $category->catimage = $imageName;
        }

        $category->save();
        return back()->with('success', 'Image updated successfully!');
    }

    public function updateCategory(Request $request, $catid)
    {
        $request->validate([
            'catnamee' => 'required|string|max:50',
            'catdesce' => 'nullable|string|max:60',
        ], [
            'catname.required' => 'The name field is required.',
            'catname.string' => 'The name must be a string.',
            'catname.unique' => 'Category already exists.',
            'catname.max' => 'The name must be less than 50 characters.',
            'catdesc.text' => 'The description must be a text.',
            'catdesc.max' => 'The description must be less than 60 characters.',
        ]);

        $category = Categories::where('catid', $catid)->first();

        $category->catname = $request->catnamee;
        $category->catdesc = $request->catdesce;
        $category->catupdatedate = Carbon::now('Asia/Kolkata');

        $category->save();
        return back()->with('success', 'Category updated successfully!');
    }

    public function destroyCategory($catid)
    {
        $category = Categories::where('catid', $catid)->first();
        $category->delete();
        return back()->withSuccess('Category Removed Successfully!');
    }

    /******************************   User side   ******************************/

    public function userIndex()
    {
        $categories = Categories::get();
        return view('index', ['categories' => $categories]);
    }
}
