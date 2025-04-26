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
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_registrasi');
            $table->string('id_tindakan');
            $table->string('id_pegawai');
            $table->integer('jml_tindakan')->default(1);
            $table->timestamps();

            $table->foreign('id_registrasi')->references('id_registrasi')->on('tr_registrasi');
            $table->foreign('id_tindakan')->references('id_tindakan')->on('ms_tindakan');
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
