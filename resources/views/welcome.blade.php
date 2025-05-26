<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Mektan-App</title>
</head>

<body>
    <div class="min-h-screen antialiased bg-gray-100 dark:bg-gray-900">

        <div class="fixed top-0 left-0 z-40 w-64 h-16 flex items-center justify-center ">
            <a href="https://flowbite.com" class="flex items-center space-x-3">
                <img src="{{ asset('storage/images/logo-mektan.png') }}" class="h-8" alt="Flowbite Logo" />
                <span class="text-base font-semibold text-gray-900 dark:text-white">Balai Mekanisasi Pertanian</span>
            </a>
        </div>

        <!-- Sidebar -->
        <x-sidebar></x-sidebar>
        <!-- End Sidebar -->

        <main class="p-4 md:ml-64 h-auto pt-20">
            <div class="rounded-2xl shadow-sm h-auto bg-white dark:bg-gray-800 p-6">
                <div class="flex flex-wrap md:flex-nowrap items-center justify-between md:gap-x-4">
                    <div class="w-full sm:w-1/2 md:w-1/4 mb-4 md:mb-0">
                        <img src="{{ asset('storage/images/beranda.png') }}" alt="Ilustrasi Mekanisasi"
                            class="w-full h-auto rounded-lg" />
                    </div>
                    <div class="w-full sm:w-1/2 md:w-3/4 text-gray-800 dark:text-gray-200">
                        <h2 class="text-xl font-bold mb-2">Sistem Mekanisasi Pertanian</h2>
                        <p class="text-base">
                            Selamat datang di Sistem Mekanisasi Pertanian, sebuah platform inovatif yang dirancang untuk
                            mendukung transformasi pertanian menuju era modern yang efisien dan berbasis teknologi.
                            Melalui integrasi data dan pemantauan alat secara real-time, kami membantu petani dan pelaku
                            sektor pertanian mengelola peralatan dengan lebih cerdas, meningkatkan produktivitas lahan,
                            serta membuat keputusan yang tepat berbasis analisis. Dengan dukungan teknologi seperti IoT
                            dan dashboard interaktif, sistem ini hadir sebagai solusi praktis dalam mewujudkan pertanian
                            presisi dan berkelanjutan.
                        </p>
                    </div>
                </div>
            </div>

    </div>

    </main>
    </div>
</body>

</html>
