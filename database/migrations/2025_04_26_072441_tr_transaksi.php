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
        Schema::create('tr_transaksi', function (Blueprint $table) {
            $table->string('id_transaksi')->primary();
            $table->string('id_registrasi');
            // id tindakan as array cause has multiple tindakan
            $table->json('id_tindakan');
            $table->string('id_pegawai');
            $table->timestamps();

            $table->foreign('id_registrasi')->references('id_registrasi')->on('tr_registrasi');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('ms_pegawai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tr_transaksi');
    }
};
