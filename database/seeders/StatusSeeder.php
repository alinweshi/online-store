<?php

namespace Database\Seeders;

use Database\Factories\StatusFactory;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusFactory::new ()->count(1000)->create();
    }
}
