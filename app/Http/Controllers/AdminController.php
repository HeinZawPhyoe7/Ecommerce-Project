<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->category_name = $request->category_name;

        $category->save();

        toastr()->timeOut(10000)->closeButton()->success('Category Added Successfully');

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $category = Category::find($id);

        $category->delete();

        toastr()->timeOut(10000)->closeButton()->success('Category Deleted Successfully');

        return redirect()->back();
    }
}
