<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Report\StoreReportRequest;
use App\Http\Requests\Report\UpdateReportRequest;
use App\Models\Category;
use App\Models\Report;
use App\Models\Tag;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ReportController extends Controller
{
    /**
     * Tampilkan Halaman Laporan Saya (R - Read).
     *
     * Sesuai konsep UI User:
     * - Daftar seluruh laporan milik warga tersebut (List Card)
     * - Badge Status otomatis (Kuning/Biru/Hijau)
     * - Logika CRUD Efektif: Tombol Edit & Hapus hanya muncul jika status "menunggu"
     * (logic ini dihitung di Model->bisaDiubahWarga(), dipakai langsung di Blade)
     */
    public function index(): View
    {
        $reports = Report::with(['category', 'tags'])
            ->milikUser(Auth::id())
            ->latest()
            ->paginate(10);

        return view('user.reports.index', [
            'reports' => $reports,
        ]);
    }

    /**
     * Tampilkan Halaman Form Buat Laporan (C - Create).
     *
     * Sesuai konsep UI User:
     * - Dropdown Kategori Sampah
     * - Checkbox multi-select Tags (Bau Menyengat, Menumpuk, Berserakan)
     */
    public function create(): View
    {
        return view('user.reports.create', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Simpan laporan baru ke database.
     *
     * Sesuai konsep UI: Tanggal otomatis diatur sistem (timestamps),
     * setelah simpan otomatis diarahkan ke Detail Tracking (sesuai Alur Navigasi Warga).
     */
    public function store(StoreReportRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Memanggil relasi reports dengan aman melalui variabel $user yang sudah ditandai
        $report = $user->reports()->create([
            'category_id' => $validated['category_id'],
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'lokasi' => $validated['lokasi'],
            'status' => 'menunggu', // status awal selalu menunggu validasi admin
        ]);

        // Simpan tags pilihan checkbox (Many-to-Many), aman walau tidak ada yang dicentang
        $report->tags()->sync($validated['tags'] ?? []);

        return redirect()
            ->route('user.reports.show', $report)
            ->with('success', 'Laporan berhasil dikirim. Terima kasih atas partisipasi Anda!');
    }

    /**
     * Tampilkan Halaman Detail & Tracking Laporan (R - Read).
     *
     * Sesuai konsep UI User:
     * - Data laporan statis lengkap + Tags sebagai hashtag (bg-emerald-100 text-emerald-700)
     * - Timeline Track Component (progres status)
     *
     * Otorisasi: warga hanya boleh melihat detail laporan miliknya sendiri.
     */
    public function show(Report $report): View
    {
        $this->pastikanLaporanMilikSendiri($report);

        $report->load(['category', 'tags']);

        return view('user.reports.show', [
            'report' => $report,
        ]);
    }

    /**
     * Tampilkan Halaman Form Edit Laporan (U - Update).
     *
     * Otorisasi penuh sudah dihandle UpdateReportRequest->authorize(),
     * tapi method GET edit ini juga perlu pengecekan manual karena tidak
     * lewat Form Request (request GET biasa, bukan submit form).
     */
    public function edit(Report $report): View
    {
        $this->pastikanLaporanMilikSendiri($report);

        if (! $report->bisaDiubahWarga()) {
            abort(403, 'Laporan ini sudah diproses and tidak dapat diubah lagi.');
        }

        $report->load('tags');

        return view('user.reports.edit', [
            'report' => $report,
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Update laporan (U - Update).
     *
     * Otorisasi (kepemilikan + status masih "menunggu") sudah divalidasi
     * penuh di dalam UpdateReportRequest->authorize().
     */
    public function update(UpdateReportRequest $request, Report $report): RedirectResponse
    {
        $validated = $request->validated();

        $report->update([
            'category_id' => $validated['category_id'],
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'lokasi' => $validated['lokasi'],
        ]);

        $report->tags()->sync($validated['tags'] ?? []);

        return redirect()
            ->route('user.reports.show', $report)
            ->with('success', 'Laporan berhasil diperbarui.');
    }

    /**
     * Hapus/batalkan laporan (D - Delete).
     *
     * Sesuai konsep UI: muncul pop-up konfirmasi "Yakin ingin membatalkan laporan ini?"
     * (konfirmasi itu di sisi frontend/JS, di sini cukup proses delete-nya).
     */
    public function destroy(Report $report): RedirectResponse
    {
        $this->pastikanLaporanMilikSendiri($report);

        if (! $report->bisaDiubahWarga()) {
            abort(403, 'Laporan ini sudah diproses and tidak dapat dibatalkan lagi.');
        }

        $report->delete();

        return redirect()
            ->route('user.reports.index')
            ->with('success', 'Laporan berhasil dibatalkan.');
    }

    /**
     * Helper privat: pastikan laporan yang diakses benar milik user yang login.
     * Mencegah warga A mengintip/mengubah laporan milik warga B lewat URL manual.
     *
     * @throws AuthorizationException
     */
    private function pastikanLaporanMilikSendiri(Report $report): void
    {
        if ($report->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke laporan ini.');
        }
    }
}