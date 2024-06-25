<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    private function item(){
        $item = 'hasoub';
        if (rand(0,1)){
            $item = 'konafa';
        }
        return $item;
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item' => $this->item(),
            'pickup' => $this->faker->streetAddress,
            'location' => $this->faker->streetAddress,
            'contact' => $this->faker->phoneNumber,
            'status' => rand(1,5),
            'token' => fake()->sha256(),
        ];
    }
}
