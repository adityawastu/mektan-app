<x-layout>
   <div class="flex items-center justify-between mb-4">
      <h1 class="text-black text-xl">Lokasi Real Time Traktor A</h1>
      <span id="realtime-clock" class="text-sm text-gray-600"></span>
   </div>

   <!-- Container untuk peta -->
   <div id="map" class="w-full h-[400px] rounded shadow mb-6"></div>

   <!-- Kartu Informasi -->
   <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-10">
      <!-- Kecepatan Saat Ini -->
      <div class="p-4 bg-white border-2 border-green-400 rounded-lg shadow-md text-center">
         <div class="text-green-600 text-3xl mb-2">
            <i class="fas fa-tachometer-alt"></i>
         </div>
         <p class="text-sm text-gray-600">Kecepatan Saat Ini</p>
         <p class="text-xl font-bold text-gray-800">0.00 km/h</p>
      </div>

      <!-- Kecepatan Rata-rata -->
      <div class="p-4 bg-white border-2 border-green-400 rounded-lg shadow-md text-center">
         <div class="text-green-600 text-3xl mb-2">
            <i class="fas fa-tachometer-alt"></i>
         </div>
         <p class="text-sm text-gray-600">Kecepatan Rata-rata</p>
         <p class="text-xl font-bold text-gray-800">0.80 km/h</p>
      </div>

      <!-- Total Jarak -->
      <div class="p-4 bg-white border-2 border-green-400 rounded-lg shadow-md text-center">
         <div class="text-green-600 text-3xl mb-2">
            <i class="fas fa-road"></i>
         </div>
         <p class="text-sm text-gray-600">Total Jarak</p>
         <p class="text-xl font-bold text-gray-800">87.17 km</p>
      </div>

      <!-- Tegangan Bus -->
      <div class="p-4 bg-white border-2 border-green-400 rounded-lg shadow-md text-center">
         <div class="text-green-600 text-3xl mb-2">
            <i class="fas fa-battery-half"></i>
         </div>
         <p class="text-sm text-gray-600">Tegangan Bus</p>
         <p class="text-xl font-bold text-gray-800">1.03 V</p>
      </div>

      <!-- Kecepatan Maksimum -->
      <div class="p-4 bg-white border-2 border-green-400 rounded-lg shadow-md text-center">
         <div class="text-green-600 text-3xl mb-2">
            <i class="fas fa-chart-line"></i>
         </div>
         <p class="text-sm text-gray-600">Kecepatan Maksimum</p>
         <p class="text-xl font-bold text-gray-800">3.00 km/h</p>
      </div>

      <!-- Durasi Penggunaan -->
      <div class="p-4 bg-white border-2 border-green-400 rounded-lg shadow-md text-center">
         <div class="text-green-600 text-3xl mb-2">
            <i class="fas fa-clock"></i>
         </div>
         <p class="text-sm text-gray-600">Durasi Penggunaan</p>
         <p class="text-xl font-bold text-gray-800">00:00:00</p>
      </div>
   </div>

   <!-- Leaflet JS dan inisialisasi -->
   <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
   <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
   <script>
      document.addEventListener('DOMContentLoaded', function() {
         var map = L.map('map').setView([-6.200000, 106.816666], 13);

         L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
         }).addTo(map);

         L.marker([-6.200000, 106.816666])
            .addTo(map)
            .bindPopup('Last known location')
            .openPopup();
      });


      // Realtime Clock
      function updateClock() {
         const now = new Date();
         const options = {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false,
         };
         const timeString = now.toLocaleTimeString('id-ID', options);
         document.getElementById('realtime-clock').textContent = `Waktu: ${timeString}`;
      }

      setInterval(updateClock, 1000); // Update tiap detik
      updateClock(); // Inisialisasi pertama
   </script>

   <!-- Font Awesome for Icons -->
   <script src="https://kit.fontawesome.com/yourkitid.js" crossorigin="anonymous"></script>
   <!-- Ganti "yourkitid" dengan ID dari akun Font Awesome kamu atau ganti dengan CDN jika pakai yang free -->
</x-layout>
