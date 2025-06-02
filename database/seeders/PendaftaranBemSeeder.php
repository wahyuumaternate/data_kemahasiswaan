<?php

namespace Database\Seeders;

use App\Models\PendaftaranBem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendaftaranBemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         PendaftaranBem::factory()->count(10)->create();
    }
}
