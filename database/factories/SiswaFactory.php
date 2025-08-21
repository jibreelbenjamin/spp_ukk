<?php

namespace Database\Factories;

use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    public function definition()
    {
        return [
            'nisn' => $this->faker->unique()->numerify('###########'),
            'nis' => $this->faker->unique()->numerify('##/###'),
            'nama_siswa' => $this->faker->name(),
            'id_kelas' => Kelas::factory(),
            'alamat' => $this->faker->streetAddress(),
            'no_telp' => $this->faker->numerify('08##########'),
            'id_spp' => Spp::factory(),
        ];
    }
}
