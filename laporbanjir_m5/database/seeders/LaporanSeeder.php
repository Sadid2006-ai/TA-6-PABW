<?php

namespace Database\Seeders;

use App\Models\Laporan;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class LaporanSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $kecamatan = [
            'Baleendah', 'Banjaran', 'Bojongsoang', 'Cicalengka', 'Ciparay',
            'Dayeuhkolot', 'Katapang', 'Majalaya', 'Margaasih', 'Pameungpeuk',
            'Rancaekek', 'Soreang',
        ];

        for ($i = 0; $i < 15; $i++) {
            Laporan::create([
                'nama_pelapor'  => $faker->name(),
                'kecamatan'     => $faker->randomElement($kecamatan),
                'alamat'        => $faker->streetAddress(),
                'tinggi_air'    => $faker->numberBetween(10, 150),
                'deskripsi'     => $faker->sentence(10),
                'tanggal_lapor' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
            ]);
        }
    }
}