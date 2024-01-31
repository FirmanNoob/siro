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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nik')->nullable()->after('email');
            $table->string('jabatan')->nullable()->after('nik');
            $table->string('nip')->nullable()->after('jabatan');
            $table->string('str')->nullable()->after('nip');
            $table->string('jkelamin')->nullable()->after('str');
            $table->date('tlahir')->nullable()->after('jkelamin');
            $table->string('agama')->nullable()->after('tlahir');
            $table->string('pterakhir')->nullable()->after('agama');
            $table->string('pangkat')->nullable()->after('pterakhir');
            $table->text('alamat')->nullable()->after('pangkat');
            $table->string('nohp')->nullable()->after('alamat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
