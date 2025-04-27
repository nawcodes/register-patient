<?php

namespace Database\Seeders;

use App\Models\MsAsuransi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsuransiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $asuransi = [
            ['nama_asuransi' => 'BPJS Kesehatan', 'keterangan' => 'Asuransi pemerintah untuk kesehatan rakyat.'],
            ['nama_asuransi' => 'Asuransi AXA Mandiri', 'keterangan' => 'Asuransi swasta untuk kesehatan individu dan keluarga.'],
            ['nama_asuransi' => 'Prudential', 'keterangan' => 'Asuransi swasta untuk perlindungan kesehatan dan jiwa.'],
            ['nama_asuransi' => 'Manulife', 'keterangan' => 'Asuransi kesehatan dan asuransi jiwa internasional.'],
            ['nama_asuransi' => 'Allianz', 'keterangan' => 'Asuransi kesehatan premium dan proteksi investasi.'],
        ];

        foreach ($asuransi as $item) {
            MsAsuransi::create($item);
        }
    }
}
