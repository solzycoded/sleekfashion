<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\CustomerAddress;
use App\Models\CustomerContact;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_tag'           => Str::random(15),
            'user_id'             => User::factory(),
            'customer_address_id' => CustomerAddress::factory(),
            'customer_contact_id' => CustomerContact::factory()
        ];
    }
}
