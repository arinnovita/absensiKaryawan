<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_karyawan' => $this->faker->name,
            'jabatan' => $this->faker->randomElement(['Manager', 'Supervisor', 'Daily Worker', 'IT', 'Human Resource']),
            'alamat' => $this->faker->address,
            'no_tlp' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
