<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelapor', 100);
            $table->string('kecamatan', 100);
            $table->string('alamat');
            $table->unsignedSmallInteger('tinggi_air'); // cm
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_lapor');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};