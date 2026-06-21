<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\View\View;

class LandingController extends Controller
{
    /**
     * Tampilkan Landing Page (Akses Publik).
     *
     * Sesuai konsep UI User (revisi final):
     * - 1 section saja: judul aplikasi, jargon, fitur utama
     * - Statistik Ringkas: card total laporan yang sudah SELESAI diatasi (Read dari DB)
     * - Tombol "Masuk ke Aplikasi" -> ke halaman Login
     */
    public function index(): View
    {
        $totalLaporanSelesai = Report::status('selesai')->count();

        return view('landing', [
            'totalLaporanSelesai' => $totalLaporanSelesai,
        ]);
    }
}