<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller {
    function index()
    {
        $cats = Category::all();

        return view('dashboard.category.list', compact('cats'));
    }

    function create()
    {
        return view('dashboard.category.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2'
        ]);

        $newCat = new Category;
        $newCat->name = $request->name;
        $newCat->save();

        return back()->with('success_msg', 'Category saved successfully!');
    }

    function edit($id)
    {
        $category = Category::find($id);

        return view('dashboard.category.edit', compact('category'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:2'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return back()->with('success_msg', 'Category updated successfully!');
    }

    function destroy($id)
    {
        Category::destroy($id);

        return back()->with('success_msg', 'Category deleted successfully!');
    }
}