@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto pb-12">
        @include('bisa.partials.dashboard')
        @include('bisa.partials.laporan')
        @include('bisa.partials.buat_laporan')
        @include('bisa.partials.pengumuman')
        @include('bisa.partials.profil')
        
        @include('bisa.partials.detail_laporan')
    </div>
@endsection