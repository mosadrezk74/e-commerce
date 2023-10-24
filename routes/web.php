<?php

<<<<<<< Updated upstream
=======
use App\Http\Controllers\ProfileController;
>>>>>>> Stashed changes
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\SearchController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\CategoryController;
<<<<<<< Updated upstream

=======
############################################
############################################
>>>>>>> Stashed changes
Route::get('/', [HomeController::class, 'home']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'postRegister']);
Route::get('login', [AuthController::class, 'login']);
Route::get('/shop/{id?}', [CategoryController::class, 'index']);
Route::get('/search', SearchController::class);
Route::get('/products/{id}', [ProductController::class, 'show']);
<<<<<<< Updated upstream
=======
Route::get('cart', [CartController::class, 'cart']);
Route::post('add-to-cart', [CartController::class, 'addToCart']);
############################################
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');
############################################














































Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});












require __DIR__.'/auth.php';
>>>>>>> Stashed changes
