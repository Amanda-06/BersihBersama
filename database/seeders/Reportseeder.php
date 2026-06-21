<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Report;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Membuat laporan dummy milik warga (bukan admin), dengan kategori
     * dan tag acak untuk menguji relasi One-to-Many & Many-to-Many.
     */
    public function run(): void
    {
        $wargaIds = User::where('role', 'warga')->pluck('id');
        $categoryIds = Category::pluck('id');
        $tagIds = Tag::pluck('id');

        if ($wargaIds->isEmpty() || $categoryIds->isEmpty()) {
            $this->command->warn('UserSeeder/CategorySeeder belum dijalankan, ReportSeeder dilewati.');
            return;
        }

        // Beberapa laporan dengan status spesifik (memastikan setiap status
        // muncul minimal beberapa kali, untuk testing tampilan dashboard & filter)
        $statuses = ['menunggu', 'menunggu', 'diproses', 'diproses', 'selesai', 'selesai', 'ditolak'];

        foreach ($statuses as $status) {
            Report::factory()
                ->state([
                    'user_id' => $wargaIds->random(),
                    'category_id' => $categoryIds->random(),
                    'status' => $status,
                ])
                ->create()
                ->tags()
                ->attach(
                    $tagIds->random(rand(0, 2))->all() // 0-2 tag acak per laporan
                );
        }

        // Tambahan laporan acak sepenuhnya (status & kategori random) untuk variasi data
        Report::factory()
            ->count(8)
            ->create()
            ->each(function (Report $report) use ($tagIds) {
                $report->tags()->attach(
                    $tagIds->random(rand(0, 2))->all()
                );
            });
    }
}