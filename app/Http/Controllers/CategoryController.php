<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    // create
    public function index(){
        $category = Category::orderBy('name', 'asc')->get();

        return $category;
    }

    // read
    public function show($id){
        $category = Category::find($id);

        return $category;
    }
    // update
    // delete
}
