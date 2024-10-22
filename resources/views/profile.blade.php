<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-xl rounded-2xl p-8 max-w-md w-full transform transition-all hover:scale-105 hover:shadow-2xl duration-300 ease-in-out">
        <div class="flex items-center justify-center mb-6">
            <img src="https://via.placeholder.com/100" alt="Profile Picture" class="w-24 h-24 rounded-full border-4 border-purple-500 shadow-lg">
        </div>
        <h1 class="text-3xl font-extrabold text-center text-gray-800 mb-8">Profil Mahasiswa</h1>
        
        <div class="space-y-4">
            <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
                <span class="block text-gray-700 font-semibold">Nama:</span>
                <p class="text-lg text-gray-900">{{ $nama }}</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
                <span class="block text-gray-700 font-semibold">NPM:</span>
                <p class="text-lg text-gray-900">{{ $npm }}</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
                <span class="block text-gray-700 font-semibold">Kelas:</span>
                <p class="text-lg text-gray-900">{{ $kelas }}</p>
            </div>
        </div>

        <div class="mt-8 text-center">
            <button class="px-6 py-2 text-white font-semibold bg-purple-600 hover:bg-purple-700 rounded-full shadow-lg transform hover:-translate-y-1 transition duration-300">
                Edit Profil
            </button>
        </div>
    </div>
</body>
</html>