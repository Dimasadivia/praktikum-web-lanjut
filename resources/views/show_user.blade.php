@extends('layouts.app') <!-- Menggunakan layout dari app.blade.php -->

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gradient-to-r from-pastel-blue to-pastel-pink">
    <div class="text-center bg-white p-12 rounded-[30px] shadow-2xl transform transition duration-300 hover:scale-105 hover:shadow-2xl w-full max-w-3xl">
        <!-- Logo Profile -->
        @php
            $defaultFoto = 'path/to/default-foto.jpg'; // Pastikan path ke foto default benar
            $userFoto = $user->foto ? asset('storage/uploads/' . $user->foto) : asset($defaultFoto);
        @endphp

        <!-- Foto Profil -->
        <img src="{{ $userFoto }}" alt="Profile Logo" class="mx-auto mb-6 rounded-full w-40 h-40 object-cover ring-4 ring-pastel-blue shadow-lg">

        <!-- Tabel Data -->
        <div class="space-y-6">
            <!-- Nama -->
            <div class="flex items-center justify-center bg-gradient-to-r from-pastel-purple to-pastel-pink p-4 rounded-lg shadow-md hover:from-pastel-purple-dark hover:to-pastel-pink-dark transition duration-300 hover:scale-105">
                <span class="text-gray-800 text-xl font-semibold">{{ $user->nama }}</span>
            </div>

            <!-- NPM -->
            <div class="flex items-center justify-center bg-gradient-to-r from-pastel-green to-pastel-yellow p-4 rounded-lg shadow-md hover:from-pastel-green-dark hover:to-pastel-yellow-dark transition duration-300 hover:scale-105">
                <span class="text-gray-800 text-xl font-semibold">{{ $user->npm }}</span>
            </div>

            <!-- Kelas -->
            <div class="flex items-center justify-center bg-gradient-to-r from-pastel-blue to-pastel-cyan p-4 rounded-lg shadow-md hover:from-pastel-blue-dark hover:to-pastel-cyan-dark transition duration-300 hover:scale-105">
                <span class="text-gray-800 text-xl font-semibold">{{ $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan' }}</span>
            </div>
        </div>

        <!-- Tombol Kembali -->
        <div class="mt-8">
            <a href="{{ route('user.list') }}" class="px-8 py-3 bg-gradient-to-r from-pastel-purple to-pastel-pink text-black text-lg font-bold rounded-full shadow-lg hover:from-pastel-purple-dark hover:to-pastel-pink-dark transition duration-300 transform hover:scale-105">
                Kembali ke Daftar
            </a>
        </div>
    </div>
</div>
@endsection