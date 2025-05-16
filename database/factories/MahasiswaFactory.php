<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nama' => fake() -> name(),
            'nim' => fake() -> bothify('########'),
            'email' => fake() -> unique() -> safeEmail,
            'nohp' => fake() -> phoneNumber(),
            'jurusan' => fake() -> randomElement(['TI', 'Mesin', 'Elektro', 'Sipil']),
            'prodi' => fake() -> randomElement(['TRPL', 'Manufaktur', 'Telekomunikasi', 'Chicken Jockey']),
            'tgllahir' => fake() -> date('Y-m-d')
        ];
    }
}
