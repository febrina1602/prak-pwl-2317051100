{{-- @extends('layouts.app')

@section('content') --}}
@include('components.navbar')

{{-- Notifikasi --}}
<div class="max-w-4xl mx-auto mt-6">
    @if (session()->get('success'))
        <div id="alert-success" class="mb-4 flex items-center justify-between bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative fadeIn">
            <span>{{ session()->get('success') }}</span>
            <button type="button" onclick="this.parentElement.remove()" class="text-green-700 font-bold">×</button>
        </div>
    @endif

    @if (session()->get('error'))
        <div id="alert-error" class="mb-4 flex items-center justify-between bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative fadeIn">
            <span>{{ session()->get('error') }}</span>
            <button type="button" onclick="this.parentElement.remove()" class="text-red-700 font-bold">×</button>
        </div>
    @endif

    @if (session()->get('warning'))
        <div id="alert-warning" class="mb-4 flex items-center justify-between bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative fadeIn">
            <span>{{ session()->get('warning') }}</span>
            <button type="button" onclick="this.parentElement.remove()" class="text-yellow-700 font-bold">×</button>
        </div>
    @endif
</div>

{{-- Daftar Pengguna --}}
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
  <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Daftar Pengguna</h1>

  <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full divide-y divide-gray-300">
      <thead class="bg-gradient-to-r from-green-800 via-green-700 to-green-600 text-white">
        <tr>
          <th class="px-6 py-3 text-left font-medium uppercase tracking-wider">Nama</th>
          <th class="px-6 py-3 text-left font-medium uppercase tracking-wider">NPM</th>
          <th class="px-6 py-3 text-left font-medium uppercase tracking-wider">Kelas</th>
          <th class="px-6 py-3 text-left font-medium uppercase tracking-wider">Aksi</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($users as $user)
        <tr>
          <td class="px-6 py-4 whitespace-nowrap">{{ $user->nama }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ $user->nim }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ $user->kelas->nama_kelas ?? '-' }}</td>
          <td class="px-6 py-4 whitespace-nowrap">
            <a href="{{ route('user.edit', $user->id) }}" class="text-blue-600 hover:underline mr-3">Edit</a>
            <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="inline-block">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus Data Mahasiswa ini?')" class="text-red-600 hover:underline">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@include('components.footer')

{{-- Auto-close alert --}}
<script>
  setTimeout(() => {
    document.querySelectorAll('[id^="alert-"]').forEach(el => {
      el.style.transition = "opacity 0.5s ease";
      el.style.opacity = 0;
      setTimeout(() => el.remove(), 500);
    });
  }, 4000);
</script>
{{-- @endsection --}}
