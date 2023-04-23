<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Khaldoun',
            'last_name' => 'Alhalabi',
            'country_code' => '+963' ,
            'phone_number' => '0936955531',
            'email' => 'khaldoun1222@hotmail.com',
            'email_verified_at' => now(),
            'password' => 'D@rkl0rd',
            'remember_token' => Str::random(10),
        ]);
        User::factory(10)->withAddress()->withCartItems()->create();
    }
}
