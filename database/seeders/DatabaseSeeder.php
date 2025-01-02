<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Clients\Client;
use App\Models\Orders\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'nick@mail.com',
         ]);

         \App\Models\User::factory(10)->create();

        Order::factory(100)->create();
        Client::factory(25)->create();
    }
}
