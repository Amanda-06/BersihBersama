<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1 akun Admin tetap (login pasti bisa dipakai untuk demo/presentasi)
        User::updateOrCreate(
            ['email' => 'admin@bisa.test'],
            [
                'name' => 'Pak RT Ahmad',
                'email' => 'admin@bisa.test',
                'password' => bcrypt('password'),
                'no_hp' => '081234567890',
                'blok_rumah' => 'Kantor RT',
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // 1 akun Warga tetap (untuk demo/presentasi, supaya gampang login tanpa nebak data acak)
        User::updateOrCreate(
            ['email' => 'warga@bisa.test'],
            [
                'name' => 'Budi Santoso',
                'email' => 'warga@bisa.test',
                'password' => bcrypt('password'),
                'no_hp' => '081298765432',
                'blok_rumah' => 'Blok A No. 12',
                'role' => 'warga',
                'email_verified_at' => now(),
            ]
        );

        // 13 warga tambahan (acak) via Factory -> total 15 user dummy sesuai target awal kelompok
        User::factory()
            ->count(13)
            ->warga()
            ->create();
    }
}