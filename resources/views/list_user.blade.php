@extends('layouts.app')
@section('content')
@include('components.navbar')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
  <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Daftar Pengguna</h1>

  <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full divide-y divide-gray-300 ">
      <thead class="bg-gradient-to-r from-green-800 via-green-700 to-green-600 text-white">
        <tr>
          <th class="px-6 py-3 text-left font-medium uppercase tracking-wider">Nama</th>
          <th class="px-6 py-3 text-left font-medium uppercase tracking-wider">NPM</th>
          <th class="px-6 py-3 text-left font-medium uppercase tracking-wider">Kelas</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($users as $user)
        <tr>
          <td class="px-6 py-4 whitespace-nowrap">{{ $user->nama }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ $user->nim }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ $user->kelas->nama_kelas ?? '-' }}</td>
          
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@include('components.footer')
@endsection
