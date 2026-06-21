<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WargaController extends Controller
{
    /**
     * Tampilkan Halaman Data Warga (R - Read).
     *
     * Sesuai konsep UI Admin:
     * - Tabel daftar akun warga terdaftar (Kolom: No, Nama, Blok/No Rumah, No HP)
     * - Dipakai untuk validasi apakah pengguna aplikasi benar warga komplek atau bukan
     */
    public function index(Request $request): View
    {
        $wargas = User::where('role', 'warga')
            ->when($request->query('search'), function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('blok_rumah', 'like', "%{$search}%")
                        ->orWhere('no_hp', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.wargas.index', [
            'wargas' => $wargas,
            'search' => $request->query('search'),
        ]);
    }
}