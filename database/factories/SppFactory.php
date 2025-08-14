<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SppFactory extends Factory
{
    public function definition()
    {
        return [
            'tahun' => $this->faker->year(),
            'nominal' => $this->faker->numberBetween(100000, 300000),
        ];
    }
}
