<?php

namespace Database\Factories;

use App\Models\Order;
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
        $o = new Order();
        return [
            'item' => $this->item(),
            'pickup' => $this->faker->streetAddress,
            'location' => $this->faker->streetAddress,
            'contact' => $this->faker->phoneNumber,
            'status' => rand(1,5),
            'token' => $o->createToken(),
        ];
    }
}
