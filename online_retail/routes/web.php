<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;

Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', function () {
    return view('home.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin/dashboard', [HomeController::class, 'index']) -> middleware(['auth', 'admin']) ;

Route::get('/shop', [ProductController::class, 'shop'])->name('shop');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/shop/category/{id}', [ProductController::class, 'showCategory'])->name('shop.category');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
});

route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);

route::get('view_category',[AdminController::class,'view_category'])->middleware(['auth','admin']);

route::post('add_category',[AdminController::class,'add_category'])->middleware(['auth','admin']);

route::get('delete_category/{id}',[AdminController::class,'delete_category'])->middleware(['auth','admin']);

route::get('edit_category/{id}',[AdminController::class,'edit_category'])->middleware(['auth','admin']);

route::post('update_category/{id}',[AdminController::class,'update_category'])->middleware(['auth','admin']);

route::get('add_product',[AdminController::class,'add_product'])->middleware(['auth','admin']);

route::post('upload_product',[AdminController::class,'upload_product'])->middleware(['auth','admin']);

route::get('view_product',[AdminController::class,'view_product'])->middleware(['auth','admin']);



require __DIR__.'/auth.php';