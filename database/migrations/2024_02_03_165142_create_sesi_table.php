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
        Schema::create('sesi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelatihan_id'); // Menambahkan kolom pelatihan_id sebagai foreign key
            $table->string('namasesi');
            $table->date('tanggal');
            $table->time('waktuMulai');
            $table->time('waktuBerakhir');
            $table->string('deskripsi');
            $table->string('link');
            $table->timestamps();

            $table->foreign('pelatihan_id')->references('id')->on('pelatihan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesi');
    }
};
