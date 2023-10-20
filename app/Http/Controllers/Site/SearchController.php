<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $products = Product::with('category')
            ->where('name', 'like', "%{$request->keyword}%")
            ->orWhere('description', 'like', "%{$request->keyword}%")
            ->paginate(9);

        return view('site.shop', compact('products'));
    }
}
