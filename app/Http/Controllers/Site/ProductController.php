<?php

namespace App\Http\Controllers\Site;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller {
    public function show($id)
    {
        $product = Product::find($id);
        $category = Category::all();

        return view('site.details', compact('product', 'category'));
    }
}
