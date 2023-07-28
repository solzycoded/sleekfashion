<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    // CREATE
    public function store(){

    }

    protected function validateInput(){
        return request()->validate([
            'address' => 'bail|required|string|unique:addresses,address'
        ]);
    }
}
