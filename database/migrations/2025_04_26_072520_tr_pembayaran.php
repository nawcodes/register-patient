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
        Schema::create('tr_pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->string('id_registrasi');
            $table->date('tgl_pembayaran');
            $table->decimal('total_tagihan', 12, 2);
            $table->decimal('jumlah_bayar', 12, 2);
            $table->enum('metode_pembayaran', ['cash', 'asuransi', 'transfer']);
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_registrasi')->references('id_registrasi')->on('tr_registrasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tr_pembayaran');
    }
};
