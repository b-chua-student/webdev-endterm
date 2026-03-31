<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name'        => fake()->firstName(),
            'last_name'         => fake()->lastName(),
            'email'             => fake()->unique()->safeEmail(),
            'instagram_account' => '@' . fake()->unique()->userName(),
            'address'           => fake()->address(),
            'role'              => fake()->randomElement(['admin', 'user']),
            'password'          => Hash::make('password'),
            'remember_token'    => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function create_admin(): static
    {
        return $this->state(fn () => ['role' => 'admin']);
    }

    public function create_user(): static
    {
        return $this->state(fn () => ['role' => 'user']);
    }

    public function create_guest(): static
    {
        return $this->state(fn () => ['role' => 'guest']);
    }
}
