<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Like;
use App\Models\Rate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'author_name' => fake()->name(),
            'publisher' => fake()->name,
            'category' => fake()->name,
            'small_description' => fake()->sentence(30),
            'long_description' => fake()->realText,
            'price' => fake()->numberBetween(10, 100),
            'order_number' => fake()->numberBetween(10, 1000),
            'face_image' => 'books/images/'.fake()->numberBetween(1, 18).'.jpg',
            'likes_count' => fake()->numberBetween(1, 1000),
            'quantity' => random_int(0, 10),
        ];
    }

    /**
     * adding views to the created book
     */
    public function configure(): BookFactory
    {
        return $this->afterCreating(function (Book $book) {
            $rand = fake()->numberBetween(1, 20);
            for ($i = 0; $i <= $rand; $i++) {
                $book->visitsCounter()->increment();
            }
        });
    }

    /**
     * books with likes
     */
    public function withLikes(int $count = 0): BookFactory
    {
        if ($count == 0) {
            $count = fake()->numberBetween(1, 20);
        }

        return $this->has(Like::factory($count), 'likes');
    }

    /**
     * books with rates
     */
    public function withRates(int $count = 0): BookFactory
    {
        if ($count == 0) {
            $count = fake()->numberBetween(1, 20);
        }

        return $this->has(Rate::factory($count), 'rates');
    }
}
