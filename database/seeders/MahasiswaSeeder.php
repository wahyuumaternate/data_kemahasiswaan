<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        // Mahasiswa::factory()->count(10)->create(); // Jika pakai factory
        // Atau manual:
        Mahasiswa::create([
            'npm' => '230101001',
            'nama' => 'Andi Saputra',
            'jurusan' => 'Informatika',
            'angkatan' => 2023,
            // 'email' => 'andi@example.com',
            // 'no_hp' => '081234567890',
            'kegiatan_diikuti' => 'Jl. Merdeka No.1'
        ]);
    }
}
