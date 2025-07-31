<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   @php
      $isProduction = app()->environment('production');
      $manifestPath = $isProduction ? '../public_html/build/manifest.json' : public_path('build/manifest.json');
   @endphp

   @if ($isProduction && file_exists($manifestPath))
      @php
         $manifest = json_decode(file_get_contents($manifestPath), true);
      @endphp
      <link rel="stylesheet" href="{{ config('app.url') }}/build/{{ $manifest['resources/css/app.css']['file'] }}">
      <script type="module" src="{{ config('app.url') }}/build/{{ $manifest['resources/js/app.js']['file'] }}"></script>
   @else
      @viteReactRefresh
      @vite(['resources/js/app.js', 'resources/css/app.css'])
   @endif
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <title>GreenTek</title>
   <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>

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
