<?php

use App\Http\Controllers\CategoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

//CATEGORIES
// list
Route::get('/categories', function () {
    return view('collections.categories.index');
});

Route::get('/categories', 'CategoriesController@index');

// show
Route::get('/categories/{id}', function ($id) {
    return view('collections.categories.index');
});

// edit
Route::get('/categories/{category}/edit', [CategoriesController::class, 'collections.categories.edit']); 

// update
Route::put('/categories/{category}', [CategoriesController::class, 'collections.categories.edit']);

//REGISTER
// show
Route::get('/register', [CategoriesController::class, 'create']);

//HOME
Route::get('/', function () {
    return view('index');
});

// Route::get('/', [CategoriesController::class, 'index']);

// update

// create
Route::put('/user/{id}', [UserController::class, 'update']);

// show
Route::get('/user/{id}', [UserController::class, 'show']);