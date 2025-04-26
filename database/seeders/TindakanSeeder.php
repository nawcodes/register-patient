<?php

namespace Database\Seeders;

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

        foreach (range(1, 10) as $i) {
            DB::table('ms_tindakan')->insert([
                'id_tindakan' => 'TIN-' . $faker->unique()->randomNumber(8),
                'nama_tindakan' => 'Tindakan ' . $faker->word,
                'tarif_tindakan' => $faker->randomFloat(2, 50000, 500000),
                'keterangan' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
