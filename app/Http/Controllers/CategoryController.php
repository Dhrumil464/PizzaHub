<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Validator;

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
            'catname' => 'required|string|unique:categories,catname',
            'catimage' => 'required|image|mimes:jpeg,png,jpg|max:10000',
            'catdesc' => 'nullable|string'
        ], [
            'catname.required' => 'The name field is required.',
            'catname.string' => 'The name must be a string.',
            'catname.unique' => 'Category already exists.',
            'catimage.required' => 'The image field is required.',
            'catimage.mimes' => 'The image must be type of jpeg, jpg or png.',
            'catimage.max' => 'The image size less then 10000.',
        ]);

        $imageName = time() . '.' . $request->catimage->extension();
        $request->catimage->move(public_path('catimages'), $imageName);

        $category = Categories::create([
            'catname' => $request->catname,
            'catimage' => $imageName ?? null,
            'catdesc' => $request->catdesc,
            'catcreatedate' => now(),
            'catupdatedate' => now(),
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

        if (isset($request->catimage)) {
            $imageName = time() . '.' . $request->catimage->extension();
            $request->catimage->move(public_path('catimages'), $imageName);
            $category->catimage = $imageName;
        }

        $category->save();
        return back()->with('success', 'Image updated successfully!');
    }

    public function updateCategory(Request $request, $catid)
    {
        $request->validate([
            'catnamee' => 'required|string  ',
            'catdesce' => 'nullable|string'
        ], [
            'catname.required' => 'The name field is required.',
            'catname.string' => 'The name must be a string.',
            'catname.unique' => 'Category already exists.',
        ]);

        $category = Categories::where('catid', $catid)->first();

        $category->catname = $request->catnamee;
        $category->catdesc = $request->catdesce;

        $category->save();
        return back()->with('success', 'Category updated successfully!');
    }

    public function destroyCategory($catid)
    {
        $category = Categories::where('catid', $catid)->first();
        $category->delete();
        return back()->withSuccess('Category Removed Successfully!');
    }
}
