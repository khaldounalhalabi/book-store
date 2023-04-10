<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

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
            'is_original' => fake()->boolean(50),
            'author_name' => fake()->name(),
            'publisher' => fake()->name,
            'category' => fake()->name,
            'small_description' => fake()->sentence(30),
            'long_description' => fake()->realText,
            'price' => fake()->numberBetween(10 , 100),
            'order_number' => fake()->numberBetween(10 , 1000) ,
            'face_image' => fake()->image(null , 1024 , 768 , 'book') ,
            'back_image' => fake()->image(null , 1024 , 768 , 'book') ,
            'likes' => fake()->numberBetween(1 , 1000) ,
            'dislikes' => fake()->numberBetween(1 , 1000) ,
        ];
    }
}
