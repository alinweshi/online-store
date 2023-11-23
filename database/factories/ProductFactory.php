<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(10),
            'image' => $this->faker->imageUrl(),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'discount_price' => $this->faker->randomFloat(2, 5, 50),
            'category_id' => $this->faker->numberBetween(1, 5),
            'quantity' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->boolean(),
        ];
    }
}
