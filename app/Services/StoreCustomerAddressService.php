<?php

namespace App\Services;

use App\Models\CustomerAddress;

class StoreCustomerAddressService
{
    // CREATE
    public function createAddress($attributes): CustomerAddress{
        return CustomerAddress::firstOrCreate($attributes);
    }
}
