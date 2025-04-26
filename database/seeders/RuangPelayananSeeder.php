<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuangPelayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $i) {
            DB::table('ms_ruang_pelayanan')->insert([
                'nama_ruang_pelayanan' => 'Ruang ' . $faker->word,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
