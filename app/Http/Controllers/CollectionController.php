<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Collection;

class CollectionController extends Controller
{
    // create
    public function index(){
        $collection = Collection::orderBy('name', 'asc')->get();

        return $collection;
    }

    // read
    public function show($id){
        $collection = Collection::find($id);

        return $collection;
    }
    
    // update
    // delete
}
