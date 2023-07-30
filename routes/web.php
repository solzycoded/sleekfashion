<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProductWishlistController;

use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\ProductShoppingCartController;

use App\Http\Controllers\OrderAddressController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// HOME
Route::get('/', [ProductController::class, 'index'])->name('/');

// PRODUCT DETAILS
Route::post('/product-details', [ProductController::class, 'show']);
Route::post('/store-viewall-trigger', [ProductController::class, 'storeViewAllTrigger']);

// Route::get('/show-wishlist', [ProductWishlistController::class, 'index']); // show saved products, from wishlist

// PROFILE
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// AUTH
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // SHOPPING CART
    Route::post('/add-to-cart', [ShoppingCartController::class, 'update']); // create or delete a product, from wishlist
    Route::post('/save-cart', [ProductShoppingCartController::class, 'update']); // create or delete a product, from wishlist

    // WISHLIST
    Route::post('/add-to-wishlist', [WishlistController::class, 'update']); // create or delete a product, from wishlist
    Route::get('/show-wishlist', [ProductWishlistController::class, 'index']); // show saved products, from wishlist

    // CHECKOUT
    Route::post('/new-customer-address', [OrderAddressController::class, 'store']);
});

require __DIR__.'/auth.php';