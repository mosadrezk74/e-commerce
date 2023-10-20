<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(10);

        return view('dashboard.product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('dashboard.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $inputs = $request->all();

        if ($request->hasFile('photo')) {
            $path = $request->photo->store('images');
            $inputs['photo'] = $path;
        }

        $newProduct = Product::create($inputs);

        return back()->with('success_msg', 'Product saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $product = Product::findorfail($id);
        $categories= Category::all();
        return view('dashboard.product.edit',compact('product'  ,'categories'));
    }

    public function update(Request $request, $product)
    {

        Product::findOrFail($product);
        $product = new Product();
        $product ->name = strip_tags(  $request -> input ('name'));
        $product ->price = strip_tags(  $request -> input ('price'));
        $product ->description = strip_tags(  $request -> input ('description'));
        $product ->category_id = strip_tags(  $request -> input ('category_id'));
        $product ->photo = strip_tags(  $request -> input ('photo'));
         $product->deleteOldRecord();
        $product->save();
        return redirect()->route('products.edit' , $product );
    }



    public function destroy($product)
    {
        $to_delete = Product::find($product);
        $to_delete->delete();
        return redirect() -> route('products.index');
    }



}
