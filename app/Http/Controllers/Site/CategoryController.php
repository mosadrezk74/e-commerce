<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller {
    function index($id = null)
    {
        $category = null;
        $products = Product::with('category');

        if ($id) {
            $category = Category::find($id);
            $products = $products->where('category_id', $id);
        }

        $products = $products->paginate(9);


        return view('site.shop', compact('products', 'category'));
    }
}
