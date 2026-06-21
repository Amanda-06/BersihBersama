<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Tag bebas tambahan untuk laporan, bisa dipilih lebih dari satu (Many-to-Many).
     */
    public function run(): void
    {
        // Sesuai revisi UI Form Buat Laporan: 3 checkbox tag tetap yang bisa dipilih warga.
        $tags = [
            'Bau Menyengat',
            'Menumpuk',
            'Berserakan',
        ];

        foreach ($tags as $namaTag) {
            Tag::updateOrCreate(
                ['nama_tag' => $namaTag],
                ['nama_tag' => $namaTag]
            );
        }
    }
}