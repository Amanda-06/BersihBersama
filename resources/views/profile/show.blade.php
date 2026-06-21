{{--
    Halaman Profil (R - Read saja). Variabel dari ProfileController@show:
    - $user (Auth::user())

    Sesuai konsep UI (revisi final): Halaman Profil terpisah dari Halaman Edit Profil.
    Styling mengikuti pola desain Naufal di edit.blade.php (avatar bulat, card putih rounded-2xl).
--}}
@extends('layouts.user')

@section('title', 'Profil Saya')

@section('content')
<div class="max-w-2xl mx-auto pb-12">
    <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-sm">

        <div class="flex flex-col items-center mb-6">
            <div class="w-24 h-24 bg-[#1a8e5f] rounded-full flex items-center justify-center mb-4">
                <i class="fa-regular fa-user text-white text-4xl"></i>
            </div>
            <h2 class="text-2xl font-black text-slate-900">{{ $user->name }}</h2>
            <p class="text-slate-500 text-sm font-medium">Unit: {{ $user->blok_rumah }}</p>
        </div>

        <div class="space-y-5">
            <div>
                <label class="block text-sm font-bold text-slate-800 mb-1">Email</label>
                <p class="w-full bg-slate-50 border border-gray-200 rounded-lg p-3.5 text-slate-700">{{ $user->email }}</p>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-800 mb-1">Nomor HP</label>
                <p class="w-full bg-slate-50 border border-gray-200 rounded-lg p-3.5 text-slate-700">{{ $user->no_hp }}</p>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-800 mb-1">Unit (Blok/No. Rumah)</label>
                <p class="w-full bg-slate-50 border border-gray-200 rounded-lg p-3.5 text-slate-700">{{ $user->blok_rumah }}</p>
            </div>
        </div>

        <a href="{{ route('profile.edit') }}"
           class="block text-center w-full bg-[#1a8e5f] hover:bg-emerald-700 text-white font-bold py-3.5 rounded-lg shadow-sm mt-6 transition">
            Edit Profil
        </a>

        <form action="{{ route('logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit"
                class="w-full bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-3.5 rounded-lg transition">
                Keluar
            </button>
        </form>

    </div>
</div>
@endsection