<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard.index');
});

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
