<x-layout>
   <a href="{{ url()->previous() }}"
      class="inline-flex items-center px-4 py-2 mb-4 text-sm font-medium text-white bg-green-700 rounded hover:bg-green-800">
      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
         <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
      </svg>
      Kembali
   </a>
   <div class="h-full sm:h-auto">
      <!-- Modal content -->
      <div class="relative p-4 mb-3 rounded-lg shadow sm:p-5">
         <!-- Modal header -->
         <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
            <h3 class="text-lg font-semibold text-gray-900">
               Tambah Data Alsintan
            </h3>
            <a href="/import"
               class="flex items-center justify-center  bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">

               <svg class="h-4 w-4 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                  height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M5 12V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-4m5-13v4a1 1 0 0 1-1 1H5m0 6h9m0 0-2-2m2 2-2 2" />
               </svg>
               Import Data Alsintan
            </a>
         </div>
         <form action="{{ route('dataalsintan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="gap-6 mb-4
                sm:grid-cols-2">
               {{-- nama --}}
               <div class="mb-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Alat</label>
                  <input type="text" name="name" id="name"
                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                     placeholder="Masukkan nama alat" required="">
               </div>
               {{-- jenis --}}
               <div class="mb-2">
                  <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Kategori Alsintan</label>
                  <select id="category" name="category_id"
                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                     <option selected="">Pilih jenis Kategori</option>
                     @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                     @endforeach
                  </select>

               </div>
               {{-- merk --}}
               <div class="mb-2">
                  <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Merk</label>
                  <select id="merk" name="merk_id"
                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                     <option selected="">Pilih Merk alat</option>
                     @foreach ($merks as $merk)
                        <option value="{{ $merk->id }}">{{ $merk->name }}</option>
                     @endforeach
                  </select>
               </div>

               {{-- sensor-id --}}
               <div class="mb-2">
                  <label for="sensor_id" class="block mb-2 text-sm font-medium text-gray-900">Sensor</label>
                  <select id="sensor_id" name="sensor_id"
                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                     <option selected="">Pilih Sensor</option>
                     @foreach ($sensors as $sensor)
                        <option value="{{ $sensor->sensor_id }}">Sensor Monitoring {{ $sensor->sensor_id }}</option>
                     @endforeach

                  </select>
               </div>
               {{-- stock --}}
               <div class="mb-2">
                  <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Stock</label>
                  <input type="number" name="stock" id="stock"
                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                     placeholder="Masukkan jumlah alat" required="">
               </div>

               {{-- deskripsi --}}
               <div class="mb-2">
                  <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                  <textarea id="description" name="description" rows="4"
                     class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500"
                     placeholder="Tulis produk deskripsi disini"></textarea>
               </div>
               {{-- upload gambar --}}
               <div class="mb-2">
                  <label class="block text-sm font-medium text-gray-700">Upload Gambar</label>
                  <div id="drop-area"
                     class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer mt-2 hover:border-gray-400 transition mb-2">
                     <input type="file" name="image" id="image" accept="image/*" class="hidden"
                        onchange="handleFiles(this.files)">

                     <div class="flex flex-col items-center justify-center">
                        <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" stroke-width="2"
                           viewBox="0 0 24 24">
                           <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 16v-4m0 0V8m0 4h4m-4 0H8m4-4a4 4 0 110 8 4 4 0 010-8z" />
                        </svg>
                        <p class="text-gray-600"><b>Click to upload</b> or drag and drop</p>
                        <p class="text-xs text-gray-400">SVG, PNG, JPG, or GIF (MAX. 800x400px) only 1 x 1</p>
                     </div>

                     <!-- Preview Gambar -->

                  </div>
                  <div class="mb-2">
                     <p id="fileLabel" class="text-sm font-medium text-gray-700 mb-1 hidden">Files</p>
                     <div id="borderLabel" class="border-2 border-dashed border-gray-300 rounded-lg p-4 hidden">
                        <div id="previewContainer"
                           class="relative grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 items-center ">
                           <!-- Preview Gambar -->
                           <div class="col-span-1">
                              <img id="preview" class="w-40 h-40 object-cover rounded-lg">
                              <button id="removeImage" type="button"
                                 class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-7 h-7 flex items-center justify-center shadow-lg hover:bg-red-600">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"
                                    stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                       d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                       clip-rule="evenodd"></path>
                                 </svg>
                              </button>
                           </div>
                           <!-- Informasi File -->
                           <div class="text-sm text-gray-700 col-span-5">
                              <p><strong>File:</strong> <span id="fileName">-</span></p>
                              <p><strong>Ukuran:</strong> <span id="fileSize">-</span></p>
                              <p><strong>Tipe:</strong> <span id="fileType">-</span></p>
                           </div>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
      </div>
      <button type="submit"
         class="text-white inline-flex items-center  bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 text-center">
         <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
               d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
               clip-rule="evenodd"></path>
         </svg>
         Tambahkan produk
      </button>
      </form>
   </div>
   </div>
   <script>
      const dropArea = document.getElementById("drop-area");
      const fileInput = document.getElementById("image");
      const preview = document.getElementById("preview");

      // Saat klik area, buka file picker
      dropArea.addEventListener("click", () => fileInput.click());

      // Drag & Drop
      dropArea.addEventListener("dragover", (e) => {
         e.preventDefault();
         dropArea.classList.add("border-gray-400");
      });

      dropArea.addEventListener("dragleave", () => {
         dropArea.classList.remove("border-gray-400");
      });

      dropArea.addEventListener("drop", (e) => {
         e.preventDefault();
         dropArea.classList.remove("border-gray-400");
         handleFiles(e.dataTransfer.files);
      });

      function handleFiles(files) {
         if (files.length > 0) {
            let file = files[0];

            let reader = new FileReader();
            reader.onload = function() {
               // Menampilkan gambar preview
               document.getElementById("preview").src = reader.result;
               document.getElementById("borderLabel").classList.remove("hidden");
               document.getElementById("fileLabel").classList.remove("hidden");

               // Menampilkan informasi file
               document.getElementById("fileName").textContent = file.name;
               document.getElementById("fileSize").textContent = (file.size / 1024).toFixed(2) + " KB";
               document.getElementById("fileType").textContent = file.type;
            };
            reader.readAsDataURL(file);
         }
      }

      // Fungsi untuk menghapus gambar dan informasi file
      document.getElementById("removeImage").addEventListener("click", function() {
         document.getElementById("preview").src = "";
         document.getElementById("borderLabel").classList.add("hidden");
         document.getElementById("fileLabel").classList.add("hidden");
         document.getElementById("image").value = ""; // Reset input file

         // Reset informasi file
         document.getElementById("fileName").textContent = "-";
         document.getElementById("fileSize").textContent = "-";
         document.getElementById("fileType").textContent = "-";
      });
   </script>
</x-layout>
