<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            'item' => $this->faker->name,
            'name' => $this->faker->name,
            'location' => $this->faker->streetAddress,
            'contact' => $this->faker->phoneNumber,
            'status' => rand(1,4)
        ];
    }
}
