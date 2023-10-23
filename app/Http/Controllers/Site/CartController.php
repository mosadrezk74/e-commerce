<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller {
    public function cart(Request $request)
    {
        $cartData = $request->cookie('prods');
        $cart = [];

        foreach ($cartData as $id => $quantity) {
            $product = Product::find($id);
            $product->quantity = $quantity;
            $cart[] = $product;
        }

        return view('site.cart', compact('cart'));
    }

    public function addToCart(Request $request)
    {
        $prods = cookie("prods[{$request->id}]", $request->quantity, 1000);

        return back()->withCookie($prods);
    }
}
