<?php

namespace App\Http\Controllers;

class AddressController extends Controller
{
    // CREATE
    public function store(){
        $attributes = $this->validateInput();

        echo $attributes['address'];
    }

    protected function validateInput(){
        return request()->validate([
            'address' => 'bail|required|string|unique:order_addresses,address|max:200'
        ]);
    }
}
