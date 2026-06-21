<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * URUTAN PENTING: data master dulu (Category, Tag, User),
     * baru data yang punya foreign key ke mereka (Report, Announcement).
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,     // data master kategori sampah
            TagSeeder::class,          // data master tag
            UserSeeder::class,         // admin + warga (dibutuhkan Report & Announcement)
            ReportSeeder::class,       // butuh User & Category & Tag sudah ada
            AnnouncementSeeder::class, // butuh User (admin) sudah ada
        ]);
    }
}