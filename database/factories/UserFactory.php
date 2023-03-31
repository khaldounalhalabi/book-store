<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['first_name' => 'string', 'last_name' => 'string', 'address_id' => 'mixed', 'email' => 'string', 'email_verified_at' => "\Illuminate\Support\Carbon", 'password' => 'string', 'remember_token' => 'string'])]
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'phone_number' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '12345678',
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
