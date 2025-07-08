<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use function Illuminate\Support\enum_value;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'picture' => 'https://flowbite.s3.amazonaws.com/blocks/application-ui/products/imac-front-image.png',
            'price' => fake()->numberBetween(1 , 1000),
            'price_before' => fake()->numberBetween(100 , 1000),
            'discription' => fake()->text(50),
            'rating' => fake()->numberBetween(0 , 5),
            'inventory' => fake()->numberBetween(0 , 800),
        ];
    }
}
