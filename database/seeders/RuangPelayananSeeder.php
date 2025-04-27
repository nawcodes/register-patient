<?php

namespace Database\Seeders;

use App\Models\MsRuangPelayanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class RuangPelayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $ruangPelayanan = [
            ['id_ruang_pelayanan' => 'R-UGD', 'nama_ruang_pelayanan' => 'Ruang UGD', 'keterangan' => 'Unit Gawat Darurat untuk penanganan darurat.'],
            ['id_ruang_pelayanan' => 'R-RINAP', 'nama_ruang_pelayanan' => 'Ruang Rawat Inap', 'keterangan' => 'Perawatan inap untuk pasien.'],
            ['id_ruang_pelayanan' => 'R-OPERASI', 'nama_ruang_pelayanan' => 'Ruang Operasi', 'keterangan' => 'Tempat dilakukannya operasi bedah.'],
            ['id_ruang_pelayanan' => 'R-POLIUMUM', 'nama_ruang_pelayanan' => 'Poli Umum', 'keterangan' => 'Pelayanan umum untuk pasien.'],
            ['id_ruang_pelayanan' => 'R-POLIGIGI', 'nama_ruang_pelayanan' => 'Poli Gigi', 'keterangan' => 'Pelayanan kesehatan gigi dan mulut.'],
        ];

        foreach ($ruangPelayanan as $item) {
            MsRuangPelayanan::create($item);
        }
    }
}
