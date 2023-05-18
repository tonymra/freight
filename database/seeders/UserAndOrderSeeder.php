<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAndOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 users
        User::factory(10)->create();

        $users = User::all();

        foreach ($users as $user) {
            // Create 3 orders for each user
            Order::factory(3)->create([
                'bl_release_user_id' => $user->id,
            ]);
        }
    }
}
