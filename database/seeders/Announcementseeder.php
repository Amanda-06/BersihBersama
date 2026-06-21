<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();

        if (! $admin) {
            $this->command->warn('UserSeeder belum dijalankan, AnnouncementSeeder dilewati.');
            return;
        }

        // 3 pengumuman tetap (representatif untuk tiap tipe, ditampilkan di dashboard user)
        $announcements = [
            [
                'judul' => 'Kerja Bakti Bersama Warga Minggu Ini',
                'tipe' => 'jadwal_kerja_bakti',
                'isi' => 'Diinformasikan kepada seluruh warga bahwa akan diadakan kerja bakti bersama pada hari Minggu pukul 07.00 WIB. Mohon kehadiran dan partisipasinya.',
            ],
            [
                'judul' => 'Jadwal Pengangkutan Truk Sampah',
                'tipe' => 'jadwal_truk_sampah',
                'isi' => 'Truk sampah akan beroperasi setiap hari Senin, Rabu, dan Jumat pukul 06.00-08.00 WIB. Mohon sampah sudah disiapkan di depan rumah sebelum jam tersebut.',
            ],
            [
                'judul' => 'Himbauan Pemilahan Sampah',
                'tipe' => 'himbauan',
                'isi' => 'Mohon seluruh warga memilah sampah organik, anorganik, dan B3 sebelum dibuang agar memudahkan proses pengangkutan dan pengolahan.',
            ],
        ];

        foreach ($announcements as $announcement) {
            Announcement::updateOrCreate(
                ['judul' => $announcement['judul']],
                array_merge($announcement, ['user_id' => $admin->id])
            );
        }

        // Tambahan pengumuman acak untuk variasi data
        Announcement::factory()
            ->count(4)
            ->state(['user_id' => $admin->id])
            ->create();
    }
}