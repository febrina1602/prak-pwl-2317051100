<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-gray-50 to-green-100">
  <div class="min-h-screen flex items-center justify-center p-6">
    <div class="flex flex-col md:flex-row items-center justify-between gap-8 max-w-5xl w-full">
      
      <!-- Card Info -->
      <div class="bg-white p-8 rounded-2xl shadow-lg w-full md:w-2/3">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">
          Hello There 👋,
        </h2>
        <h1 class="text-3xl font-extrabold text-gray-900 mb-4">
          I am {{ $nama }}
        </h1>
        <p class="text-gray-600 mb-1">From Class {{ $kelas }} <br></p>
        <p class="text-gray-600 mb-1">NPM  {{ $npm }}</p>
      </div>

      <!-- Foto Profil -->
      <div class="md:w-1/3 flex justify-center">
        <img src="{{ asset('media/profileferbina.jpeg') }}" 
             alt="Foto Profil" 
             class="rounded-2xl shadow-lg w-72 h-auto object-cover">
      </div>

    </div>
  </div>
</body>
</html>