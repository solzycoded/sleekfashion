<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\City;
use App\Models\UserRole;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userRoles = UserRole::all();
        $rand = rand(0, ($userRoles->count() - 1));
        $userRoleId = $userRoles[$rand];

        return [
            'address'      => $this->faker->address(),
            'city_id'      => City::factory(),
            'user_role_id' => $userRoleId
        ];
    }
}
