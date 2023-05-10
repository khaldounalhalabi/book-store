<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteContent>
 */
class SiteContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'facebook' => 'https://www.facebook.com',
            'twitter' => 'https://www.twitter.com',
            'youtube' => 'https://www.youtube.com',
            'whatsapp' => 'https://www.whatsapp.com',
            'telegram' => 'https://www.telegram.com',
            'instgram' => 'https://www.telegram.com',
            'snapchat' => 'https://www.snapchat.com',
            'tiktok' => 'https://www.tiktok.com',
            'logo' => fake()->imageUrl(),
            'footer_quot' => fake()->sentence(30),
            'about' => fake()->realText(5000),
            'phone_number' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'address' => fake()->address(),
            'contact_content' => fake()->realText(5000),
        ];
    }
}
