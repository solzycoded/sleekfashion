<?php

namespace App\Services;

use App\Models\Profile;

class StoreCustomerProfileService
{
    // STORE
    public function createProfile($attributes): void{
        Profile::firstOrCreate(array_merge($attributes, ['user_id' => auth()->user()->id]));
    }
}
