<?php

namespace Database\Factories;

use App\Models\KelasModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiswaModel>
 */
class SiswaModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'nis' => $this->faker->unique()->numerify('######'),
            'email' => $this->faker->unique()->safeEmail,
            'kelas_id' => KelasModel::factory(), // menjalankan factory Kelas
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
        ];
    }
}
