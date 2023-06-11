<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProductWishlistController;

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

// WISHLIST
Route::post('/add-to-wishlist', [WishlistController::class, 'update'])->middleware('auth'); // create or delete a product, from wishlist
Route::get('/show-wishlist', [ProductWishlistController::class, 'index'])->middleware('auth'); // show saved products, from wishlist

Route::get('/welcome', function () {
    return view('welcome');
});

// PROFILE
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// AUTH
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
