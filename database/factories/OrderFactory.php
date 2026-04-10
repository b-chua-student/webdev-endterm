<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'email' => $this->faker->safeEmail(),
            'shipped_to' => $this->faker->address(), // Matches your column name
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'shipped', 'delivered']),
            'total_price' => $this->faker->randomFloat(2, 500, 10000),
            'ordered_at' => now(),
        ];
    }
}
