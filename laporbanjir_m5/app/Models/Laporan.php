<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';

    protected $fillable = [
        'nama_pelapor', 'kecamatan', 'alamat',
        'tinggi_air', 'deskripsi', 'tanggal_lapor',
    ];

    protected function casts(): array
    {
        return ['tanggal_lapor' => 'date'];
    }

    // Status dihitung otomatis dari tinggi air
    protected function status(): Attribute
    {
        return Attribute::get(fn () => match (true) {
            $this->tinggi_air >= 100 => 'Awas',
            $this->tinggi_air >= 50  => 'Siaga',
            default                  => 'Waspada',
        });
    }
}