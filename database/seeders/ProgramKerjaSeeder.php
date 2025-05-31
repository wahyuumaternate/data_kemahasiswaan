<?php

namespace Database\Seeders;

use App\Models\ProgramKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $data = [
            'Sumberdaya manusia' => [
                ['program_kerja' => 'Pelatihan Kepemimpinan', 'keterangan' => 'Meningkatkan kualitas SDM'],
                ['program_kerja' => 'Workshop Soft Skill', 'keterangan' => 'Pelatihan komunikasi dan teamwork'],
            ],
            'Sosial dan hubungan masyarakat' => [
                ['program_kerja' => 'Bakti Sosial', 'keterangan' => 'Kegiatan sosial di masyarakat'],
                ['program_kerja' => 'Open House', 'keterangan' => 'Mengenalkan BEM ke masyarakat kampus'],
            ],
            'Minat dan bakat' => [
                ['program_kerja' => 'Festival Seni', 'keterangan' => 'Ajang unjuk bakat seni'],
                ['program_kerja' => 'Turnamen Olahraga', 'keterangan' => 'Kompetisi antar mahasiswa'],
                ['program_kerja' => 'Klub Hobi', 'keterangan' => 'Pengembangan minat mahasiswa'],
            ],
            'Keagamaan' => [
                ['program_kerja' => 'Kajian Islam', 'keterangan' => 'Kajian rutin untuk mahasiswa'],
                ['program_kerja' => 'Peringatan Hari Besar', 'keterangan' => 'Kegiatan keagamaan tahunan'],
            ],
        ];

        $urutan = 1;
        foreach ($data as $departemen => $programs) {
            foreach ($programs as $program) {
                ProgramKerja::create([
                    'departemen' => $departemen,
                    'program_kerja' => $program['program_kerja'],
                    'keterangan' => $program['keterangan'],
                    'urutan' => $urutan++,
                ]);
            }
        }
    }
}
