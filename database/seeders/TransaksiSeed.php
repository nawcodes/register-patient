<?php

namespace Database\Seeders;

use App\Models\MsAsuransi;
use App\Models\MsPasien;
use App\Models\MsPegawai;
use App\Models\MsRuangPelayanan;
use App\Models\MsTindakan;
use App\Models\TrRegistrasi;
use App\Models\TrTransaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();

        // random id tindakan return array of id tindakan, 1-4
        $id_tindakan = MsTindakan::all()->pluck('id_tindakan')->toArray();

        // make sure id_tindakan more than 1
        $id_tindakan = array_map(function ($id) {
            return [$id];
        }, $id_tindakan);


        foreach (range(1, 10) as $i) {
            TrTransaksi::create([
                'id_transaksi' => 'TRX-' . $faker->unique()->randomNumber(8),
                'id_registrasi' => TrRegistrasi::all()->random()->id_registrasi,
                'id_tindakan' => $id_tindakan[array_rand($id_tindakan)],
                'id_pegawai' => MsPegawai::all()->random()->id_pegawai,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
