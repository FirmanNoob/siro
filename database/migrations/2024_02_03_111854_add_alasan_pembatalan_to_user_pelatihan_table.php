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
        Schema::table('user_pelatihan', function (Blueprint $table) {
            $table->text('alasanPembatalan')->nullable()->after('certificate_path');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending')->after('alasanPembatalan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_pelatihan', function (Blueprint $table) {
            //
        });
    }
};
