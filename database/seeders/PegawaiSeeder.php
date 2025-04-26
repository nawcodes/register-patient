<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $i) {
            DB::table('ms_pegawai')->insert([
                'id_pegawai' => 'PGW-' . $faker->unique()->randomNumber(8),
                'nama_pegawai' => $faker->name,
                'no_hp' => $faker->phoneNumber,
                'email' => $faker->email,
                'alamat' => $faker->address,
                'jabatan' => $faker->jobTitle,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
