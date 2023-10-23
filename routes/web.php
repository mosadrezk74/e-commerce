<?php

use App\Http\Controllers\Site\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\SearchController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\CategoryController;

############################################
############################################

Route::get('/', [HomeController::class, 'home']);

Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'postRegister']);

Route::get('login', [AuthController::class, 'login']);

Route::get('/shop/{id?}', [CategoryController::class, 'index']);
Route::get('/search', SearchController::class);

Route::get('/products/{id}', [ProductController::class, 'show']);



Route::get('cart', [CartController::class, 'cart']);
Route::post('add-to-cart', [CartController::class, 'addToCart']);