<?php

namespace App\Http\Controllers;

use App\Models\OrderContact;

class OrderContactController extends Controller
{
    // CREATE
    public function store(){
        $attributes = $this->validateInput();

        $addressExists = $this->exists($attributes['address']);

        if(!$addressExists){
            $address = OrderContact::create([
                'address' => $attributes['address'], 
                'user_id' => auth()->user()->id
            ]); 
        }

        return response()->json([
            'success' => isset($address->id),
            'exists'  => $addressExists
        ], 200);
    }

    protected function validateInput(){
        return request()->validate([
            'address' => 'bail|required|string|max:200'
        ]);
    }

    protected function exists($address){
        return OrderContact::where('address', $address)
            ->where('user_id', auth()->user()->id)
            ->exists();
    }

    // READ
    public function index(){
        if(isset(auth()->user()->id)){
            $customerContacts = OrderContact::where('user_id', auth()->user()->id)
                ->orderBy('address', 'asc')
                ->get();

            return $customerContacts;
        }

        return;
    }
}
