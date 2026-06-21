<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Tampilkan Halaman Login.
     */
    public function showLogin(): View
    {
        return view('auth.login');
    }

    /**
     * Proses Login.
     *
     * Sesuai konsep UI: Form Login menggunakan Email dan Password.
     * Memakai session (Auth::attempt) sesuai SESSION_DRIVER=database di .env.
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $request->ensureIsNotRateLimited();

        $credentials = $request->only('email', 'password');

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            RateLimiter::hit($request->throttleKey());

            return back()
                ->withErrors(['email' => 'Email atau password yang Anda masukkan salah.'])
                ->onlyInput('email');
        }

        RateLimiter::clear($request->throttleKey());
        $request->session()->regenerate(); // mencegah session fixation attack

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Redirect sesuai role, langsung mengecek kolom role di database agar aman dari error
        return $user->role === 'admin'
            ? redirect()->intended(route('admin.dashboard'))
            : redirect()->intended(route('user.dashboard'));
    }

    /**
     * Tampilkan Halaman Register.
     */
    public function showRegister(): View
    {
        return view('auth.register');
    }

    /**
     * Proses Register Warga.
     *
     * Sesuai konsep UI: Form Register Input Nama Lengkap, Nomor Rumah/Blok,
     * Nomor HP, dan Password. Role otomatis "warga" (admin dibuat manual via seeder).
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'no_hp' => $validated['no_hp'],
            'blok_rumah' => $validated['blok_rumah'],
            'password' => Hash::make($validated['password']),
            'role' => 'warga',
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()
            ->route('user.dashboard')
            ->with('success', 'Akun berhasil dibuat. Selamat datang di BiSa!');
    }

    /**
     * Proses Logout.
     *
     * Sesuai konsep UI: Menu Pop-up Melayang berisi tombol Keluar/Logout,
     * tersedia baik di sidebar Admin maupun User.
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda berhasil keluar.');
    }
}