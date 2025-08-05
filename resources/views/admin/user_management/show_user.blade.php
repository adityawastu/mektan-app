<x-layout>
   <div class="relative p-4 h-full shadow shadow-green-200 rounded-2xl md:h-auto">
      <div>
         <!-- Modal content -->
         <div class="relative p-4 sm:p-5">
            <div class="flex flex-col lg:flex-row gap-6 items-start">
               <!-- Gambar di kiri -->
               <div class="flex-shrink-0">
                  {{-- <img src="{{ asset('storage/' . $alsintan->image) }}" alt="Gambar Alsintan"
                     class="w-64 h-64 object-cover rounded-lg"
                     onerror="this.onerror=null;this.src='{{ asset('images/default.png') }}';"> --}}
               </div>

               <!-- Keterangan di kanan -->
               <div class="flex-grow">
                  <div class="mb-4">
                     <h3 class="text-2xl font-semibold text-gray-900">
                        {{-- {{ ucwords($alsintan->name) }} --}}
                     </h3>
                  </div>
                  <dl>
                     <dt class="mb-2 font-semibold leading-none text-gray-900">Deskripsi</dt>
                     {{-- <dd class="mb-4 font-light text-gray-500 sm:mb-5">{{ $alsintan->description ?? '-' }}</dd> --}}
                     <dt class="mb-2 font-semibold leading-none text-gray-900">Kategori</dt>
                     {{-- <dd class="mb-4 font-light text-gray-500 sm:mb-5">{{ $alsintan->category->name ?? '-' }}</dd> --}}
                     <dt class="mb-2 font-semibold leading-none text-gray-900">Merk</dt>
                     {{-- <dd class="mb-4 font-light text-gray-500 sm:mb-5">{{ $alsintan->merk->name ?? '-' }}</dd> --}}
                     <dt class="mb-2 font-semibold leading-none text-gray-900">Stok Alat</dt>
                     {{-- <dd class="mb-4 font-light text-gray-500 sm:mb-5">{{ $alsintan->stock }}</dd> --}}
                     <dt class="mb-2 font-semibold leading-none text-gray-900">Sensor</dt>
                     {{-- <dd class="mb-4 font-light text-gray-500 sm:mb-5">{{ $alsintan->sensor_id }}</dd> --}}

                  </dl>

                  <!-- Tombol Edit -->
                  {{-- <div class="flex items-center space-x-4 mt-4">
                     <a href="{{ route('alsintan.edit', $alsintan->id) }}" type="button"
                        class="text-white inline-flex items-center bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                           xmlns="http://www.w3.org/2000/svg">
                           <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                           <path fill-rule="evenodd"
                              d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                              clip-rule="evenodd" />
                        </svg>
                        Edit
                     </a>
                  </div> --}}
               </div>
            </div>
         </div>
      </div>

   </div>
</x-layout>
