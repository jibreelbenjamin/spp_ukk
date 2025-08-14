<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PembayaranFactory extends Factory
{
    public function definition()
    {
        return [
            'nama_pembayaran' => $this->faker->randomElement(['Tunai', 'BCA Transfer', 'BNI Transfer', 'BRI Transfer', 'Mandiri Transfer']),
        ];
    }
}
