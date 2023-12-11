<?php

namespace App\Services;

use App\Models\CustomerContact;

class StoreCustomerContactService
{
    // STORE
    public function createContact($attributes): CustomerContact{
        return CustomerContact::firstOrCreate($attributes);
    }
}
