<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('Password123'),
        ]);

        $this->call([
            PasienSeeder::class,
            AsuransiSeeder::class,
            PegawaiSeeder::class,
            RuangPelayananSeeder::class,
            TindakanSeeder::class,
            RegisterSeeder::class,
        ]);
    }
}
