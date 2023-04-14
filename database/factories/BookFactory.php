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
            'is_original' => fake()->boolean(50),
            'author_name' => fake()->name(),
            'publisher' => fake()->name,
            'category' => fake()->name,
            'small_description' => fake()->sentence(30),
            'long_description' => fake()->realText,
            'price' => fake()->numberBetween(10, 100),
            'order_number' => fake()->numberBetween(10, 1000),
            'face_image' => 'none',
            'back_image' => 'none',
            'likes_count' => fake()->numberBetween(1, 1000),
        ];
    }

    /**
     * adding views to the created book
     * @return BookFactory
     */
    public function configure()
    {
        return $this->afterCreating(function (Book $book) {
            $rand = fake()->numberBetween(1 , 20) ;
            for($i = 0 ; $i <= $rand ; $i++){
                $book->visitsCounter()->increment() ;
            }
        });
    }

    /**
     * bookes with likes
     * @param int $count
     * @return BookFactory
     */
    public function withLikes(int $count = 0): BookFactory
    {
        if($count == 0){
            $count = fake()->numberBetween(1 , 20) ;
        }
        return $this->has(Like::factory($count) , 'likes') ;
    }

    /**
     * bookes with rates
     * @param int $count
     * @return BookFactory
     */
    public function withRates(int $count = 0): BookFactory
    {
        if($count == 0){
            $count = fake()->numberBetween(1 , 20) ;
        }
        return $this->has(Rate::factory($count) , 'rates') ;
    }
}
