{{--
    Halaman Edit Profil. Diadaptasi dari desain Naufal (FrontEnd).
    Variabel dari ProfileController@edit:
    - $user (Auth::user())

    Catatan penting: field name="phone" milik Naufal DIGANTI jadi name="no_hp"
    supaya konsisten dengan UpdateProfileRequest & kolom database yang sudah ada
    (sebelumnya pakai no_hp di semua file lain). Sampaikan ke Naufal ya, Manda.

    Field Unit (blok_rumah), Password & Konfirmasi Password DITAMBAHKAN karena
    validasi backend mewajibkannya (blok_rumah required, password opsional tapi
    perlu confirmed) - styling input mengikuti pola Naufal persis, tidak menambah
    style baru.

    JANGAN ubah name="..." pada setiap input (harus sama dengan UpdateProfileRequest).
--}}
@extends('layouts.user')

@section('title', 'Edit Profil Saya')

@section('content')
<div class="max-w-2xl mx-auto pb-12">
    <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-sm">
        <h2 class="text-2xl font-black text-slate-900 mb-6">Profil Akun Saya</h2>

        <form action="{{ route('profile.update') }}" method="POST" class="space-y-5">
            @csrf @method('PUT')

            <div class="flex flex-col items-center mb-6">
                <div class="w-24 h-24 bg-[#1a8e5f] rounded-full flex items-center justify-center mb-4">
                    <i class="fa-regular fa-user text-white text-4xl"></i>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-800 mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full bg-slate-50 border border-gray-300 rounded-lg p-3.5 focus:border-[#1a8e5f] focus:ring-2">
                @error('name')
                    <p class="text-rose-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-800 mb-2">Email</label>
                <input type="email" value="{{ $user->email }}" disabled
                    class="w-full bg-slate-100 border border-gray-300 rounded-lg p-3.5 text-slate-500">
                <p class="text-xs text-slate-500 mt-1">Email tidak dapat diubah.</p>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-800 mb-2">Nomor HP</label>
                <input type="tel" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}"
                    class="w-full bg-slate-50 border border-gray-300 rounded-lg p-3.5 focus:border-[#1a8e5f] focus:ring-2">
                @error('no_hp')
                    <p class="text-rose-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-800 mb-2">Unit (Blok/No. Rumah)</label>
                <input type="text" name="blok_rumah" value="{{ old('blok_rumah', $user->blok_rumah) }}"
                    placeholder="Contoh: Blok A No. 12"
                    class="w-full bg-slate-50 border border-gray-300 rounded-lg p-3.5 focus:border-[#1a8e5f] focus:ring-2">
                @error('blok_rumah')
                    <p class="text-rose-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-800 mb-2">Password Baru</label>
                <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah"
                    class="w-full bg-slate-50 border border-gray-300 rounded-lg p-3.5 focus:border-[#1a8e5f] focus:ring-2">
                @error('password')
                    <p class="text-rose-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-800 mb-2">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" placeholder="Ulangi password baru"
                    class="w-full bg-slate-50 border border-gray-300 rounded-lg p-3.5 focus:border-[#1a8e5f] focus:ring-2">
            </div>

            <button type="submit" class="w-full bg-[#1a8e5f] hover:bg-emerald-700 text-white font-bold py-3.5 rounded-lg shadow-sm mt-4">
                Simpan Perubahan Data
            </button>
        </form>
    </div>
</div>
@endsection