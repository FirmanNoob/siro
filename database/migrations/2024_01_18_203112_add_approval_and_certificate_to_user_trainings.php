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
            $table->boolean('is_approved')->default(false)->after('pelatihan_id');
            $table->string('certificate_path')->nullable()->after('is_approved');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_pelatihan', function (Blueprint $table) {
            $table->dropColumn('is_approved');
            $table->dropColumn('certificate_path');
        });
    }
};
