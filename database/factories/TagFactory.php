<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Nama model yang terhubung dengan factory ini.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Definisikan data palsu bawaan untuk isi tabel tags.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Membuat bank data hashtag tiruan agar otomatis terisi saat diseed
            'nama_tag' => $this->faker->unique()->randomElement([
                'Bau Menyengat',
                'Menumpuk',
                'Berserakan',
            ]),
        ];
    }
}