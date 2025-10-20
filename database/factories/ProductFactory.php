<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Product>
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
        $faker = Factory::create('en_US');

        return [
            'name' => $faker->unique()->words(3, true),
            'brief_description' => $faker->sentence,
            'description' => $faker->paragraph,
            'price' => $faker->randomFloat(2, 1, 10),
            'old_price' => $faker->randomFloat(2, 1, 10),
            'SKU' => $faker->unique()->bothify('SKU-####'),
            'stock_status' => $faker->randomElement(['instock', 'outstock']),
            'quantity' => $faker->numberBetween(1, 100),
            'image' => $this->faker->imageUrl(),
            'images' => json_encode([$this->faker->imageUrl(), $this->faker->imageUrl()]),
        ];
    }
}
