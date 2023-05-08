<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

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

Route::get('/', [ProductController::class, 'index'])->name('/');

Route::post('/product-details', [ProductController::class, 'show']);

Route::post('/store-viewall-trigger', [ProductController::class, 'storeViewAllTrigger']);

// Route::post('/', [ProductController::class, 'index'])->name('.');

// Route::post('/products/search', [ProductController::class, 'index'])->name('products.search');