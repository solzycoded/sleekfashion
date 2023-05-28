<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProductWishlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// HOME
Route::get('/', [ProductController::class, 'index'])->name('/');

// PRODUCT DETAILS
Route::post('/product-details', [ProductController::class, 'show']);
Route::post('/store-viewall-trigger', [ProductController::class, 'storeViewAllTrigger']);

// WISHLIST
Route::post('/add-to-wishlist', [WishlistController::class, 'update']); // create or delete a product, from wishlist
Route::get('/show-wishlist', [ProductWishlistController::class, 'index']); // create or delete a product, from wishlist