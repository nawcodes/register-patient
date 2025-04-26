<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $i) {
            DB::table('ms_pasien')->insert([
                'nama' => $faker->name,
                'tgl_lahir' => $faker->date('Y-m-d', '-18 years'), // minimal 18 tahun
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
