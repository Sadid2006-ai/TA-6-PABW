<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Idea;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class IdeaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $userIds = User::pluck('id')->all();
        $categoryIds = Category::pluck('id')->all();

        $judul = [
            'Bank sampah digital tingkat RW',
            'Aplikasi pantau jadwal angkot real-time',
            'Taman baca di halte bus',
            'Sensor banjir murah berbasis IoT',
            'Pasar tani online warga',
            'Lampu jalan tenaga surya',
            'Layanan ambulans warga terintegrasi',
            'Kampung hemat energi',
            'CCTV komunitas untuk ronda digital',
            'Pelatihan UMKM go digital',
            'Jalur sepeda antar kecamatan',
            'Biopori massal di lahan kosong',
        ];

        foreach ($judul as $j) {
            Idea::create([
                'user_id' => $faker->randomElement($userIds),
                'category_id' => $faker->randomElement($categoryIds),
                'judul' => $j,
                'gambar' => null,
                'deskripsi' => $faker->paragraphs(3, true),
                'status' => $faker->randomElement(['Diajukan', 'Progress', 'Selesai']),
            ]);
        }
    }
}