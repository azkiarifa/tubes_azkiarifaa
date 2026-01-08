<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'seller05',
            'email' => 'seller5@seller.com',
            'password' => bcrypt('seller05')
        ]);

        \App\Models\Product::factory(10)->create();
        \App\Models\Order::factory(5)->create();
    }
}
