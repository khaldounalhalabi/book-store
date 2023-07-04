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
        $user = User::create([
            'first_name' => 'Khaldoun',
            'last_name' => 'Alhalabi',
            'country_code' => '+963',
            'phone_number' => '0936955531',
            'email' => 'khaldoun1222@hotmail.com',
            'email_verified_at' => now(),
            'password' => '12345678',
            'remember_token' => Str::random(10),
        ]);

        $user->assignRole('super-admin');

        $admin = User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@test.com',
            'password' => '12345678',
        ]);

        $admin->assignRole('admin');

        $customer = User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'customer@test.com',
            'password' => '12345678',
        ]);

        $customer->assignRole('customer');

        User::factory(10)->withAddress()->create();
    }
}
