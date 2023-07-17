<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Order;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomerOrder>
 */
class CustomerOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $quantity = rand(20, 1000);
        $product = Product::inRandomOrder()->limit(1)->get()[0];

        return [
            'quantity'   => $quantity,
            'total'      => $quantity * $product->price,
            'order_id'   => Order::factory(),
            'product_id' => $product->id
        ];
    }
}
