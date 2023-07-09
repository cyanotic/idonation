<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DaftarDonasi>
 */
class DaftarDonasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kategori_id' => \mt_rand(1,3),
            'judul' => \fake()->sentence(4),
            'deskripsi' => \fake()->paragraph(\mt_rand(1,3)),
            'excerpt' => \fake()->text()
        ];
    }
}
