<?php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\CategoryController;

Route::get('/', [HomeController::class, 'home']);

Route::get('/shop/{id?}', [CategoryController::class, 'index']);

Route::get('/product/{id}', function ($id) {

    // $product = Product::find($id);
    $title = 'Product';

    return view('site.details', compact('title'));
});
