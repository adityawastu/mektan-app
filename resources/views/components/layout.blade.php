<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   @vite(['resources/css/app.css', 'resources/js/app.js'])
   <title>Mektan-App</title>
</head>

<body class="bg-gray-50 dark:bg-gray-900">

   <div class="min-h-screen antialiased bg-gray-50 dark:bg-gray-900 ">
      <div class="fixed top-0 left-0 z-40 w-64 h-16 flex items-center justify-center ">
         <a href="https://flowbite.com" class="flex items-center space-x-3">
            <img src="{{ asset('images/logo-mektan.png') }}" class="h-8" alt="Flowbite Logo" />
            <span class="text-base font-semibold text-gray-900 dark:text-white">Balai Mekanisasi Pertanian</span>
         </a>
      </div>

      <!-- Sidebar -->
      <x-sidebar></x-sidebar>
      <!-- End Sidebar -->

      <main class="p-4 md:ml-64 h-auto pt-20">
         <div class="rounded-2xl shadow-sm h-auto bg-white dark:bg-gray-800 p-6">
            {{ $slot }}
         </div>
   </div>
   </main>
   </div>
</body>

</html>
