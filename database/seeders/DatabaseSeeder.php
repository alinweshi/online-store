<?php

namespace Database\Seeders;

use Database\Factories\StatusFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Category::factory(20)->create();
        // Product::factory(20)->create();
        StatusFactory::factory()->count(1000)->create();
    }
}
