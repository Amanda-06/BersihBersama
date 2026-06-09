<?php

namespace Database\Factories;

use App\Models\Report;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Report>
 */
class ReportFactory extends Factory
{
    protected $model = Report::class;

    public function definition(): array
    {
        // Mengambil ID warga secara acak yang sudah ada di database
        $wargaId = User::where('peran', 'warga')->inRandomOrder()->first()?->id;
        // Mengambil ID kategori secara acak
        $categoryId = Category::inRandomOrder()->first()?->id;

        return [
            'user_id' => $wargaId,
            'category_id' => $categoryId,
            'judul' => $this->faker->sentence(4), // Mengarang judul 4 kata
            'deskripsi' => $this->faker->paragraph(3), // Mengarang deskripsi 3 kalimat
            'foto' => null, // Sementara kosong dulu, aman
            'lokasi' => 'RT 0' . $this->faker->numberBetween(1, 9) . ', Blok ' . $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'status' => $this->faker->randomElement(['Menunggu Validasi', 'Diterima', 'Diproses', 'Selesai']),
        ];
    }
}
