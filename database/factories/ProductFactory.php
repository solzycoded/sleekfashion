<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    // protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $allCategories = Category::select(['id'])->get();

        return [
            'title' => $this->faker->word,
            'quantity' => rand(1, 200),
            'price' => rand(10, 500000),
            'details' => $this->faker->paragraph,
            'category_id' => $allCategories[rand(0, count($allCategories) - 1)]->id
        ];
    }
}
