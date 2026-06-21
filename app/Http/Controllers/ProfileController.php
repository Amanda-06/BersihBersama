<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\UpdateProfileRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Tampilkan Halaman Profil (U - Update).
     *
     * Sesuai konsep UI User: Form data akun warga (Nama, No HP, No Rumah).
     * Controller ini dipakai bersama oleh User maupun Admin (sama-sama punya profil).
     */
    public function edit(): View
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Update data akun (Tombol Perbarui Data Akun).
     */
    public function update(UpdateProfileRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->name = $validated['name'];
        $user->no_hp = $validated['no_hp'];
        $user->blok_rumah = $validated['blok_rumah'];

        // Password bersifat opsional, hanya diupdate kalau diisi
        if (! empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        // Fungsi save() sekarang terbaca dengan aman tanpa garis merah
        $user->save();

        return back()->with('success', 'Data akun berhasil diperbarui.');
    }
}