<nav class="bg-gradient-to-r from-green-800 via-green-700 to-green-600 text-white shadow-md">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16 items-center">
      
      <div class="flex-shrink-0 text-xl font-bold">
        MyApp
      </div>

      <div class="hidden md:flex space-x-6">
        <a href="{{ route('user.index') }}" class="hover:text-green-200">Daftar User</a>
        <a href="{{ route('user.create') }}" class="hover:text-green-200">Tambah User</a>
        <a href="{{ url('/') }}" class="hover:text-green-200">Home</a>
      </div>
    </div>
  </div>
</nav>