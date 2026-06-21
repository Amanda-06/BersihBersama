{{--
    Landing Page (Akses Publik). Variabel dari LandingController@index:
    - $totalLaporanSelesai (int, jumlah laporan dengan status "selesai")

    Sesuai konsep UI (revisi final): HANYA 1 SECTION/PANEL SAJA.
    Komponen: Judul aplikasi, jargon, fitur utama, statistik ringkas (dari DB),
    tombol "Masuk ke Aplikasi" -> Halaman Login.

    Naufal: styling bebas dipoles, tapi pertahankan:
    - route('login') pada tombol masuk
    - variabel {{ $totalLaporanSelesai }} untuk card statistik
--}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiSa - Bersih itu Sama-sama</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F8FAFC] font-sans antialiased">

    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-12">

        {{-- Logo & Judul Aplikasi --}}
        <div class="w-14 h-14 bg-[#1a8e5f] rounded-xl flex items-center justify-center mb-5 shadow-md">
            <i class="fa-solid fa-leaf text-white text-3xl"></i>
        </div>

        <h1 class="text-3xl md:text-4xl font-bold text-slate-900 mb-2 text-center">BiSa</h1>
        <p class="text-slate-600 text-center max-w-md mb-8">
            Bersihkan Sampah Sama-sama. Lapor masalah sampah di area komplek Anda,
            pantau prosesnya, dan wujudkan lingkungan yang lebih bersih bersama warga lain.
        </p>

        {{-- Fitur-Fitur Utama (ringkas) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 max-w-2xl w-full mb-8">
            <div class="bg-white rounded-xl shadow-sm p-5 text-center">
                <i class="fa-solid fa-pen-to-square text-[#1a8e5f] text-2xl mb-2"></i>
                <p class="text-sm font-bold text-slate-900">Lapor Mudah</p>
                <p class="text-xs text-slate-600">Buat laporan sampah dalam hitungan detik</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-5 text-center">
                <i class="fa-solid fa-location-dot text-[#1a8e5f] text-2xl mb-2"></i>
                <p class="text-sm font-bold text-slate-900">Lacak Status</p>
                <p class="text-xs text-slate-600">Pantau progres laporan secara real-time</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-5 text-center">
                <i class="fa-solid fa-users text-[#1a8e5f] text-2xl mb-2"></i>
                <p class="text-sm font-bold text-slate-900">Gotong Royong</p>
                <p class="text-xs text-slate-600">Bersama warga & pengurus komplek</p>
            </div>
        </div>

        {{-- Statistik Ringkas: Card Total Laporan Sukses Diatasi (Read dari DB) --}}
        <div class="bg-emerald-50 rounded-xl px-8 py-5 text-center mb-8">
            <p class="text-3xl font-bold text-emerald-700">{{ $totalLaporanSelesai }}</p>
            <p class="text-sm text-emerald-700">Laporan Sukses Diatasi</p>
        </div>

        {{-- Tombol Masuk ke Aplikasi --}}
        <a href="{{ route('login') }}"
           class="bg-[#1a8e5f] hover:bg-emerald-700 text-white font-bold px-8 py-3 rounded-xl shadow-sm transition">
            Masuk ke Aplikasi
        </a>

    </div>

</body>
</html>