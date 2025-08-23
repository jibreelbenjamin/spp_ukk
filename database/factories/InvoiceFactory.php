<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    public function definition()
    {
        return [
            'id_user' => User::factory(),
            'nisn' => Siswa::factory(),
            'tanggal_bayar' => $this->faker->date(),
            'bulan_dibayar' => $this->faker->numberBetween(1, 12),
            'tahun_dibayar' => $this->faker->numberBetween(2020, 2025),
            'id_spp' => Spp::factory(),
            'jumlah_bayar' => $this->faker->numberBetween(100000, 300000),
            'keterangan' => $this->faker->sentence(),
            'id_pembayaran' => Pembayaran::factory(),
            'status' => $this->faker->randomElement(['lunas', 'pending', 'gagal']),
        ];
    }
}
