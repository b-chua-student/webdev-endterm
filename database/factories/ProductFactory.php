<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $name = $this->faker->words(3, true);
        return [
            'name' => $name,
            'slug' => \Illuminate\Support\Str::slug($name) . '-' . $this->faker->unique()->numberBetween(1, 999),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 100, 5000), 
            'stock' => $this->faker->numberBetween(0, 50),
            'is_active' => true,
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}
