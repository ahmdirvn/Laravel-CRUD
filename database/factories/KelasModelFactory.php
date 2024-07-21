<?php

namespace Database\Factories;

use App\Models\GuruModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KelasModel>
 */
class KelasModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kelas' => $this->faker->unique()->bothify('Kelas ##??'),
            'guru_id' => GuruModel::factory(), //  membuat Guru baru setiap kali Kelas dibuat
        ];
    }
}
