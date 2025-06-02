<?php

namespace Database\Seeders;

use App\Models\Dokumentasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokumentasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Dokumentasi::create([
            'judul' => 'Dokumentasi Pertama',
            'deskripsi' => 'Ini adalah dokumentasi pertama.',
            'file_path' => null,
        ]);
    }
}
