<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PendaftaranBemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'npm' => $this->faker->unique()->numerify('20########'),
            'program_studi' => $this->faker->randomElement(['Teknik Informatika', 'Sistem Informasi']),
            'jurusan' => $this->faker->randomElement(['Ilmu Komputer', 'Teknologi Informasi']),
            'angkatan' => $this->faker->numberBetween(2019, 2025),
            'departemen' => $this->faker->randomElement(['Kaderisasi', 'Humas', 'Media & Informasi']),
            'alamat' => $this->faker->address,
            'ktm' => 'ktm/dummy.pdf',
            'foto' => 'foto/dummy.jpg',
            'alasan' => $this->faker->sentence(12),
        ];
    }
}
