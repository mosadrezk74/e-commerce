<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller {
    function index($id = null)
    {
        $products = Product::with('category');

        if ($id) {
            $products = $products->where('category_id', $id);
        }

        $products = $products->paginate(9);


        return view('site.shop', compact('products'));
    }
}