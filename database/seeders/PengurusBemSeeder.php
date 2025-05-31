<?php

namespace Database\Seeders;

use App\Models\PengurusBem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengurusBemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Pengurus Inti
            [ 'jabatan' => 'Ketua Umum', 'nama' => 'Ahmad Rizki', 'npm' => '220101001', 'angkatan' => '2022', 'departemen' => null ],
            [ 'jabatan' => 'Wakil Ketua', 'nama' => 'Nina Sari', 'npm' => '220101002', 'angkatan' => '2022', 'departemen' => null ],
            [ 'jabatan' => 'Sekretaris', 'nama' => 'Budi Santoso', 'npm' => '220101003', 'angkatan' => '2022', 'departemen' => null ],
            [ 'jabatan' => 'Bendahara', 'nama' => 'Siti Aminah', 'npm' => '220101004', 'angkatan' => '2022', 'departemen' => null ],

            // Departemen SDM
            [ 'jabatan' => 'Kepala Departemen', 'nama' => 'Rina Dewi', 'npm' => '220101101', 'angkatan' => '2022', 'departemen' => 'Departemen Sumber daya Manusia' ],
            [ 'jabatan' => 'Anggota', 'nama' => 'Fajar Maulana', 'npm' => '220101102', 'angkatan' => '2023', 'departemen' => 'Departemen Sumber daya Manusia' ],

            // Departemen Sosial
            [ 'jabatan' => 'Kepala Departemen', 'nama' => 'Yusuf Hakim', 'npm' => '220101201', 'angkatan' => '2022', 'departemen' => 'Departemen sosial dan hubungan masyarakat' ],
            [ 'jabatan' => 'Anggota', 'nama' => 'Maya Lestari', 'npm' => '220101202', 'angkatan' => '2023', 'departemen' => 'Departemen sosial dan hubungan masyarakat' ],

            // Departemen Minat dan Bakat
            [ 'jabatan' => 'Kepala Departemen', 'nama' => 'Iqbal Ramadhan', 'npm' => '220101301', 'angkatan' => '2022', 'departemen' => 'Departemen Minat dan Bakat' ],
            [ 'jabatan' => 'Anggota', 'nama' => 'Lina Agustina', 'npm' => '220101302', 'angkatan' => '2023', 'departemen' => 'Departemen Minat dan Bakat' ],

            // Departemen Keagamaan
            [ 'jabatan' => 'Kepala Departemen', 'nama' => 'Zaki Anwar', 'npm' => '220101401', 'angkatan' => '2022', 'departemen' => 'Departemen Keagamaan' ],
            [ 'jabatan' => 'Anggota', 'nama' => 'Rahmawati', 'npm' => '220101402', 'angkatan' => '2023', 'departemen' => 'Departemen Keagamaan' ],
        ];

        $urutan = 1;
        foreach ($data as $item) {
            PengurusBem::create([
                'jabatan' => $item['jabatan'],
                'nama' => $item['nama'],
                'npm' => $item['npm'],
                'angkatan' => $item['angkatan'],
                'departemen' => $item['departemen'],
                'urutan' => $urutan++,
            ]);
        }
    }
}
