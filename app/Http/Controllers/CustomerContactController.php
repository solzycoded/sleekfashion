<?php

namespace App\Http\Controllers;

use App\Models\CustomerContact;

class CustomerContactController extends Controller
{
    // CREATE
    public function store(){
        $attributes    = $this->validateInput();
        $contactExists = $this->exists($attributes['phone']);

        if(!$contactExists){
            $contact = CustomerContact::create([
                'phone'   => $attributes['phone'], 
                'user_id' => auth()->user()->id
            ]); 
        }

        return response()->json([
            'success' => isset($contact->id)
        ], 200);
    }

    protected function validateInput(){
        return request()->validate([
            'phone' => 'bail|required|string'
        ]);
    }

    protected function exists($phone){
        return CustomerContact::where('phone', $phone)
            ->where('user_id', auth()->user()->id)
            ->exists();
    }

    // READ
    public function index(){
        if(isset(auth()->user()->id)){
            $customerContacts = CustomerContact::where('user_id', auth()->user()->id)->get();

            return $customerContacts;
        }

        return;
    }
}
