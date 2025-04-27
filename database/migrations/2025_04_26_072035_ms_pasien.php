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

        Schema::create('ms_pasien', function (Blueprint $table) {
            $table->id('mr_pasien');
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('no_hp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('email')->unique()->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_pasien');
    }
};
