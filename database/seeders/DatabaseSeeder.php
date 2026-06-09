<?php

namespace Database\Seeders;

use App\Models\Report;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
            TagSeeder::class,
        ]);

        Report::factory(15)->create()->each(function ($report) {
            // Ambil 1-3 ID tag secara acak dari database
            $tags = Tag::inRandomOrder()->limit(rand(1, 3))->pluck('id');
            // Tempelkan tag tersebut ke laporan ini di tabel pivot report_tag
            $report->tags()->attach($tags);
        });
    }
}
