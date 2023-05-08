<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Product;
use App\Models\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCollection>
 */
class ProductCollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $allProducts = Product::select(['id'])->get();

        return [
            'collection_id' => Collection::factory(),
            'product_id' => $allProducts[rand(0, count($allProducts) - 1)]->id

        ];
    }
}
