<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Announcement\StoreAnnouncementRequest;
use App\Http\Requests\Announcement\UpdateAnnouncementRequest;
use App\Models\Announcement;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AnnouncementController extends Controller
{
    /**
     * Tampilkan Halaman Kelola Pengumuman.
     *
     * Sesuai konsep UI Admin:
     * - Tabel Pengumuman (Kolom: No, Judul Pengumuman, Tipe, Tanggal Dibuat)
     * - Tombol + Tambah Pengumuman Baru (memicu Modal Form Kosong - Create)
     * - Tombol Edit (memicu Modal yang sama, terisi data lama - Update)
     *
     * Catatan: Create & Update dipakai via Modal Pop-up (bukan halaman terpisah),
     * jadi data untuk modal-modal itu sudah ikut dikirim bersama tabel di view ini.
     */
    public function index(): View
    {
        $announcements = Announcement::with('user')
            ->latest()
            ->paginate(10);

        return view('admin.announcements.index', [
            'announcements' => $announcements,
        ]);
    }

    /**
     * Simpan pengumuman baru (C - Create), dipicu dari Modal Form Kosong.
     */
    public function store(StoreAnnouncementRequest $request): RedirectResponse
    {
        $request->user()->announcements()->create($request->validated());

        return redirect()
            ->route('admin.announcements.index')
            ->with('success', 'Pengumuman baru berhasil ditambahkan.');
    }

    /**
     * Update pengumuman (U - Update), dipicu dari Modal yang sudah terisi data lama.
     */
    public function update(UpdateAnnouncementRequest $request, Announcement $announcement): RedirectResponse
    {
        $announcement->update($request->validated());

        return redirect()
            ->route('admin.announcements.index')
            ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    /**
     * Hapus pengumuman (D - Delete).
     */
    public function destroy(Announcement $announcement): RedirectResponse
    {
        $announcement->delete();

        return redirect()
            ->route('admin.announcements.index')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }
}