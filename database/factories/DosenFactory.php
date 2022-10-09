<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nip' => $this->faker->unique()->isbn10,
            'nama' => $this->faker->name,
            'alamat' => $this->faker->address,
        ];
    }
}
