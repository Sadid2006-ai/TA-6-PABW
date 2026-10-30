<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // 1 akun tetap untuk demo login
        User::create([
            'name' => 'Admin Kolaborasa',
            'email' => 'admin@kolaborasa.test',
            'tanggal_lahir' => '2000-01-01',
            'password' => Hash::make('password123'),
        ]);

        // 6 akun dummy dari Faker (total 7 akun)
        for ($i = 0; $i < 6; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'tanggal_lahir' => $faker->dateTimeBetween('-30 years', '-17 years')->format('Y-m-d'),
                'password' => Hash::make('password123'),
            ]);
        }
    }
}