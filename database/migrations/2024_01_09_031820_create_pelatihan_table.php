<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelatihan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_Pelatihan');
            $table->string('lokasi');
            $table->dateTime('tanggal_awal');
            $table->dateTime('tanggal_berakhir');
            $table->time('waktu_mulai');
            $table->time('waktu_berakhir');
            $table->string('kouta');
            $table->string('gambar');
            $table->string('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelatihan');
    }
};
