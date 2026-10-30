<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Transportasi', 'Lingkungan', 'Pendidikan', 'Kesehatan', 'Ekonomi Digital', 'Keamanan', 'Energi'] as $nama) {
            Category::create(['nama' => $nama]);
        }
    }
}