<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        $this->call([
            ProgramKerjaSeeder::class,
            PengurusBemSeeder::class,
            MahasiswaSeeder::class,
            DokumentasiSeeder::class,
            PendaftaranBemSeeder::class,
        ]);
    }
}
