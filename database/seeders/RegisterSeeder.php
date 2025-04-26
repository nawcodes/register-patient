<?php

namespace Database\Seeders;

use App\Models\MsPasien;
use App\Models\MsAsuransi;
use App\Models\MsPegawai;
use App\Models\MsRuangPelayanan;
use App\Models\TrRegistrasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            TrRegistrasi::create([
                'tgl_registrasi' => $faker->date(),
                'mr_pasien' => MsPasien::all()->random()->mr_pasien,
                'id_asuransi' => MsAsuransi::all()->random()->id_asuransi,
                'id_pegawai' => MsPegawai::all()->random()->id_pegawai,
                'id_ruang_pelayanan' => MsRuangPelayanan::all()->random()->id_ruang_pelayanan,
                'nomor_kartu_asuransi' => $faker->randomNumber(5),
            ]);
        }
    }
}
