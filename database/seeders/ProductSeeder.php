<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Models\Category();
        $category->name = 'Electronics';
        $category->image = '/images/electronics.jpg';
        $category->save();

        $product = new \App\Models\Product();
        $product->name = 'Laptop';
        $product->price = 10000;
        $product->description = 'Laptop 15 inch';
        $product->category_id = $category->id;
        $product->image = '/images/electronics.jpg';
        $product->save();
    }
}
