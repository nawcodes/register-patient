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
        Schema::create('tr_registrasi', function (Blueprint $table) {
            $table->string('id_registrasi')->primary();
            $table->date('tgl_registrasi');
            $table->unsignedBigInteger('mr_pasien');
            $table->unsignedBigInteger('id_asuransi')->nullable();
            $table->string('id_pegawai');
            $table->string('id_ruang_pelayanan');
            $table->string('nomor_kartu_asuransi')->nullable();
            $table->timestamps();


            $table->foreign('mr_pasien')->references('mr_pasien')->on('ms_pasien');
            $table->foreign('id_asuransi')->references('id_asuransi')->on('ms_asuransi');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('ms_pegawai');
            $table->foreign('id_ruang_pelayanan')->references('id_ruang_pelayanan')->on('ms_ruang_pelayanan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tr_registrasi');
    }
};
