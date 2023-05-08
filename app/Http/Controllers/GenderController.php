<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gender;

class GenderController extends Controller
{
    // create
    public function index(){
        $gender = Gender::all();

        return $gender;
    }

    // read
    public function show($id){
        $gender = Gender::find($id);

        return $gender;
    }
    
    // update
    // delete
}
