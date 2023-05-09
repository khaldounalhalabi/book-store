<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'country_code' => fake()->countryCode(),
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

    public function withCartItems($count = 0): UserFactory
    {
        if ($count == 0) {
            $count = fake()->numberBetween(1, 20);
        }

        return $this->has(Cart::factory($count), 'cart');
    }

    public function withAddress(): UserFactory
    {
        return $this->has(Address::factory(), 'address');
    }
}
