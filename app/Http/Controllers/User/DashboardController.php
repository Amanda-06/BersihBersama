<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Tampilkan Halaman Dashboard User.
     *
     * Sesuai konsep UI User:
     * - Section Ringkasan: 3 card jumlah laporan milik user (Menunggu, Diproses, Selesai)
     * - Section Pengumuman Terbaru: 3 pengumuman teratas dari admin dalam bentuk card
     *   (BUKAN menu sidebar terpisah - hanya tampil di sini)
     */
    public function index(): View
    {
        $userId = Auth::id();

        $ringkasan = [
            'menunggu' => Report::milikUser($userId)->status('menunggu')->count(),
            'diproses' => Report::milikUser($userId)->status('diproses')->count(),
            'selesai' => Report::milikUser($userId)->status('selesai')->count(),
        ];

        $pengumumanTerbaru = Announcement::latest()
            ->take(3)
            ->get();

        return view('user.dashboard.index', [
            'ringkasan' => $ringkasan,
            'pengumumanTerbaru' => $pengumumanTerbaru,
        ]);
    }
}