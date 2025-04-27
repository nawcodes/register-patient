<?php

namespace Database\Seeders;

use App\Models\MsTindakan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TindakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $tindakan = [
            [
                'id_tindakan' => 'T-KONSUL-UMUM',
                'nama_tindakan' => 'Konsultasi Dokter Umum',
                'tarif_tindakan' => 100000,
            ],
            [
                'id_tindakan' => 'T-KONSUL-SPESIALIS',
                'nama_tindakan' => 'Konsultasi Dokter Spesialis',
                'tarif_tindakan' => 250000,
            ],
            [
                'id_tindakan' => 'T-LAB-DARAH',
                'nama_tindakan' => 'Pemeriksaan Laboratorium Darah Lengkap',
                'tarif_tindakan' => 200000,
            ],
            [
                'id_tindakan' => 'T-RONTGEN',
                'nama_tindakan' => 'Rontgen Dada',
                'tarif_tindakan' => 300000,
            ],
            [
                'id_tindakan' => 'T-OPERASI-APENDIKS',
                'nama_tindakan' => 'Operasi Apendiks (Usus Buntu)',
                'tarif_tindakan' => 7500000,
            ],
            [
                'id_tindakan' => 'T-PERSALINAN-NORMAL',
                'nama_tindakan' => 'Persalinan Normal',
                'tarif_tindakan' => 5000000,
            ],
            [
                'id_tindakan' => 'T-PERSALINAN-CAESAR',
                'nama_tindakan' => 'Persalinan Caesar',
                'tarif_tindakan' => 12000000,
            ],
            [
                'id_tindakan' => 'T-PERAWATAN-LUKA',
                'nama_tindakan' => 'Pembersihan Luka Ringan',
                'tarif_tindakan' => 150000,
            ],
            [
                'id_tindakan' => 'T-VAKSIN',
                'nama_tindakan' => 'Suntik Vaksinasi',
                'tarif_tindakan' => 250000,
            ],
            [
                'id_tindakan' => 'T-FISIOTERAPI',
                'nama_tindakan' => 'Fisioterapi Sesi 1',
                'tarif_tindakan' => 300000,
            ],
        ];

        foreach ($tindakan as $item) {
            // Check apakah ID sudah ada
            if (!MsTindakan::where('id_tindakan', $item['id_tindakan'])->exists()) {
                MsTindakan::create($item);
            }
        }
    }
}
