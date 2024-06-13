<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create()->each(function ($user){
             if ($user->isStore()){
                 Order::factory(10)->create([
                     'user_id' => $user->id,
                 ]);
             }
         });

        User::factory()->create([
            'name' => 'Test User',
            'username' => 'user_test',
        ]);
    }
}
