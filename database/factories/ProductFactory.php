<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
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
        $names = ['Ariel', 'Belle', 'Cinderella', 'Mulan', 'Rapunzel'];

        $name = fake()->randomElement($names);

        return [
            'category_id' => fake()->numberBetween(1, 4),
            'name' => $name,
            'description' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 1, 199),
            'stock' => fake()->randomNumber(2),
            'is_active' => fake()->boolean(0.90),
            'slug' => Str::slug($name) . '-' . fake()->unique()->randomNumber(5),
        ];
    }
}
