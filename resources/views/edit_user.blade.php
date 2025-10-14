@extends('layouts.app')
@section('content')
@include('components.navbar')
<div class="min-h-screen flex items-center justify-center bg-white p-6">
    <div class="bg-white shadow-2xl rounded-2xl w-full max-w-lg p-8">
        
        <h1 class="text-3xl font-extrabold text-center text-gray-800 mb-8">
            Formulir Pengguna 
        </h1>

        <form action="{{ route('user.update', $user->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="nama" class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="{{ $user->nama }}" 
                    class="mt-2 w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition"
                    placeholder="Masukkan nama lengkap" required>
            </div>

            <div>
                <label for="npm" class="block text-sm font-semibold text-gray-700">NIM</label>
                <input type="text" id="npm" name="npm" value="{{ $user->nim }}"
                    class="mt-2 w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition"
                    placeholder="Masukkan NIM" required>
            </div>

            <div>
                <label for="kelas_id" class="block text-sm font-semibold text-gray-700">Pilih Kelas</label>
                <select name="kelas_id" id="kelas_id" value="{{ $user->kelas->nama_kelas }}"
                    class="mt-2 w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                    <option value="{{ $user->kelas_id }}" selected>{{ $user->kelas->nama_kelas }}</option>
                    @foreach ($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-green-800 via-green-700 to-green-600 text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:opacity-90 transform hover:scale-105 transition duration-300">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@include('components.footer')
@endsection
