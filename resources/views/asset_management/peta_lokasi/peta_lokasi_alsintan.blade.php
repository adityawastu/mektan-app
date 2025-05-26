<x-layout>
   <h1 class="text-white text-xl mb-4">Ini adalah halaman peta dan lokasi</h1>

   <!-- Container untuk peta -->
   <div id="map" class="w-full h-[400px] rounded shadow mb-6"></div>

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
   </script>
</x-layout>
