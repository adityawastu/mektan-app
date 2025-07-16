<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   @vite(['resources/css/app.css', 'resources/js/app.js'])
   <title>GreenTek</title>
</head>

<body class="bg-gray-100">
   <div class="flex min-h-screen">
      <!-- Kiri: Ilustrasi -->
      <div class="hidden md:flex md:w-3/4 bg-cover bg-center relative"
         style="background-image: url('/images/balai.png');">
         {{-- <div class="absolute inset-0 bg-white bg-opacity-70 backdrop-blur-sm"></div> --}}
         {{-- <div class="relative z-10 flex flex-col justify-center items-center text-center px-10 text-gray-800">
            <img src="{{ asset('images/illustrasi-smb.svg') }}" alt="Student Admission" class="w-64 mb-6">
            <h2 class="text-xl font-medium">Selamat Datang di</h2>
            <h1 class="text-3xl font-extrabold text-gray-900">STUDENT ADMISSION</h1>
            <p class="mt-2 text-sm font-medium">Seleksi Mahasiswa Baru Telkom University</p>
            <p class="text-sm">Admisi - Universitas Telkom</p>
            <div class="mt-6">
               <img src="{{ asset('images/situ-logo.png') }}" class="w-32 mx-auto" alt="SITU Logo">
            </div>
         </div> --}}
      </div>

      <!-- Kanan: Form Login -->
      <div class="flex items-center justify-center w-full md:w-1/4 px-6 py-12 bg-white">
         <div class="w-full max-w-md">
            <div class="text-center mb-8">
               <img src="{{ asset('images/logo-mektan.png') }}" alt="Logo" class="w-20 mx-auto mb-2">
               <h2 class="text-lg text-green-600 font-semibold">GreenTrek/Balai Mekanisasi Pertanian</h2>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
               @csrf
               <div>
                  <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                  <input type="email" name="email" id="email"
                     class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                     placeholder="Email" required>
               </div>
               <div class="relative">
                  <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                  <input type="password" name="password" id="password" placeholder="••••••••"
                     class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                     required>
                  <span class="absolute right-3 top-10 text-gray-400 text-sm cursor-pointer">👁</span>
               </div>

               <button type="submit"
                  class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-semibold transition">Login</button>

               {{-- <div class="text-center text-sm mt-4">
                  <a href="#" class="text-red-500 font-semibold flex items-center justify-center gap-1">
                     🔒 Lupa Password ?
                  </a>
                  <p class="mt-1">Belum memiliki akun? <a href="#" class="text-red-500 font-bold">Register</a>
                  </p>
               </div> --}}
            </form>
         </div>
      </div>
   </div>
</body>

</html>
