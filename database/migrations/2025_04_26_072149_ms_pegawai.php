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
        Schema::create('ms_pegawai', function (Blueprint $table) {
            $table->string('id_pegawai')->primary();
            $table->string('nama_pegawai');
            $table->string('no_hp')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('alamat')->nullable();
            $table->string('jabatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_pegawai');
    }
};
