<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GuruModel>
 */
class GuruModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nip' => $this->faker->unique()->numerify('############'),
            'nama' => $this->faker->name,
            'mata_pelajaran' => $this->faker->word,
        ];
    }
}
