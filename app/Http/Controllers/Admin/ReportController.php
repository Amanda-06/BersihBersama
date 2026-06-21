<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Report\UpdateStatusRequest;
use App\Models\Category;
use App\Models\Report;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportController extends Controller
{
    /**
     * Tampilkan Halaman Data Laporan Warga (R - Read).
     *
     * Sesuai konsep UI Admin:
     * - Tabel Besar Data Laporan (Kolom: No, Nama Pelapor, Judul Aduan, Tanggal, Kategori, Status)
     * - Dropdown Filter berdasarkan Status atau Kategori Sampah
     * - Pagination untuk data yang banyak
     */
    public function index(Request $request): View
    {
        $reports = Report::with(['user', 'category'])
            ->status($request->query('status'))
            ->category($request->query('category'))
            ->latest()
            ->paginate(10)
            ->withQueryString(); // supaya filter tetap nempel saat pindah halaman pagination

        $categories = Category::all();

        return view('admin.reports.index', [
            'reports' => $reports,
            'categories' => $categories,
            'filterStatus' => $request->query('status'),
            'filterCategory' => $request->query('category'),
        ]);
    }

    /**
     * Tampilkan Halaman Detail & Validasi Laporan (U - Update Status).
     *
     * Sesuai konsep UI Admin:
     * - Tampilan data aduan warga secara utuh (termasuk tags sebagai hashtag)
     * - Panel Aksi Validasi sesuai status saat ini
     *
     * Logika CRUD Efektif: Admin TIDAK BISA mengedit teks/foto laporan warga.
     */
    public function show(Report $report): View
    {
        $report->load(['user', 'category', 'tags']);

        return view('admin.reports.show', [
            'report' => $report,
        ]);
    }

    /**
     * Update status laporan (Panel Aksi Validasi).
     *
     * Alur status sesuai konsep UI:
     * - menunggu -> diproses ("Setujui & Proses")
     * - diproses -> selesai ("Tandai Selesai")
     * - admin juga bisa menolak aduan palsu/spam (ditolak)
     */
    public function updateStatus(UpdateStatusRequest $request, Report $report): RedirectResponse
    {
        $statusBaru = $request->validated()['status'];

        // Business logic alur status: pastikan transisi status masuk akal,
        // tidak bisa loncat sembarangan (mis. dari "menunggu" langsung ke "selesai").
        $alurValid = match ($report->status) {
            'menunggu' => in_array($statusBaru, ['diproses', 'ditolak']),
            'diproses' => in_array($statusBaru, ['selesai', 'ditolak']),
            default => false,
        };

        if (! $alurValid) {
            return back()->withErrors([
                'status' => 'Perubahan status tidak valid dari status saat ini.',
            ]);
        }

        $report->update(['status' => $statusBaru]);

        return back()->with('success', 'Status laporan berhasil diperbarui.');
    }

    /**
     * Hapus laporan (D - Delete).
     *
     * Sesuai konsep UI Admin: untuk menghapus data aduan palsu langsung dari database.
     */
    public function destroy(Report $report): RedirectResponse
    {
        $report->delete();

        return redirect()
            ->route('admin.reports.index')
            ->with('success', 'Laporan berhasil dihapus dari sistem.');
    }
}