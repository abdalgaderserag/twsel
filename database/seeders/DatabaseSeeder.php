<?php

namespace Database\Seeders;

use App\Models\Deliver;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        User::factory()->create([
//            'name' => 'Test User',
//            'username' => 'user_test',
//        ]);
        User::factory(1)->create([
            'type' => 1,
        ])->each(function ($user){
            if ($user->isUser()){
                Order::factory(10)->create([
                    'user_id' => $user->id,
                    'status' => 1,
                ]);
                Order::factory(40)->create([
                    'user_id' => $user->id,
                    'status' => 2,
                ])->each(function ($order) use ($user){
                    Deliver::factory(1)->create([
                        'user_id' => 2,
                        'order_id' => $order->id
                    ]);
                });;
            }
        });




        User::factory(2)->create([
            'type' => 2,
            'name' => 'abd al-gader'
        ]);


//        User::factory(10)->create()->each(function ($user){
//            if ($user->isStore()){
//                Order::factory(5)->create([
//                    'user_id' => $user->id,
//                    'status' => 1,
//                ]);
//            }
//            if ($user->isDriver()){
//                Order::factory(5)->create([
//                    'user_id' => rand(1,10),
//                    'status' => rand(2,5),
//                ])->each(function ($order) use ($user){
//                    Deliver::factory(5)->create([
//                        'user_id' => $user->id,
//                        'order_id' => $order->id
//                    ]);
//                });
//            }
//        });
    }
}
