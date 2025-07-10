<x-layout>
   <div class="bg-white dark:bg-gray-800 relative sm:rounded-lg overflow-hidden">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
         <div class="w-full flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold text-green-700 dark:text-gray-200">
               Data Alsintan
            </h1>
            <a href="{{ route('create_alsintan') }}"
               class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
               Tambah Data
            </a>
         </div>
      </div>
      <div class="overflow-x-auto">
         <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
               <tr>
                  <th scope="col" class="px-4 py-2">Nama</th>
                  <th scope="col" class="px-4 py-2">Kategori</th>
                  <th scope="col" class="px-4 py-2">Merk</th>
                  <th scope="col" class="px-4 py-2">Stock</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($alsintans as $item)
                  <tr>
                     <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->name }}
                     </td>
                     <td class="px-4 py-2">
                        {{ $item->category->name ?? '-' }}
                     </td>
                     <td class="px-4 py-2">
                        {{ $item->merk->name ?? '-' }}
                     </td>
                     <td class="px-4 py-2">
                        {{ $item->stock }}
                     </td>
                  </tr>
               @endforeach
            </tbody>
         </table>
      </div>
      <nav>

         {{-- Tombol halaman --}}
         <div>
            {{ $alsintans->links() }}
         </div>
   </div>
   </nav>
   </div>

</x-layout>
