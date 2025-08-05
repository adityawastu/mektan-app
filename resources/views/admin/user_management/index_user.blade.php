<x-layout>
   <div class="bg-white dark:bg-gray-800 relative sm:rounded-lg overflow-hidden">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
         <div class="w-full flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold text-green-700 dark:text-gray-200">
               Data User Alat dan Mesin Pertanian
            </h1>
            <a href="{{ route('user.create') }}"
               class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
               Tambah User
            </a>
         </div>
      </div>
      <div class="overflow-x-auto">
         <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-green-100 dark:bg-gray-700 dark:text-gray-400">
               <tr>
                  <th scope="col" class="px-4 py-2">Nama</th>
                  <th scope="col" class="px-4 py-2">NIP</th>
                  <th scope="col" class="px-4 py-2">No HP</th>
                  <th scope="col" class="px-4 py-2">Email</th>
                  <th scope="col" class="px-4 py-2">Jabatan</th>
                  <th scope="col" class="px-4 py-2">Unit Kerja</th>
                  <th scope="col" class="px-4 py-2">Wilayah Kerja</th>
                  <th scope="col" class="px-4 py-2">Role</th>
                  <th scope="col" class="px-4 py-2">Aksi</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($users as $user)
                  <tr>
                     <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->name }}
                     </td>

                     <td class="px-4 py-2">
                        {{ $user->nip ?? '-' }}
                     </td>
                     <td class="px-4 py-2">
                        {{ $user->no_hp ?? '-' }}
                     </td>
                     <td class="px-4 py-2">
                        {{ $user->email }}
                     </td>
                     <td class="px-4 py-2">
                        {{ $user->jabatan ?? '-' }}
                     </td>
                     <td class="px-4 py-2">
                        {{ $user->unit_kerja ?? '-' }}
                     </td>
                     <td class="px-4 py-2">
                        {{ $user->wilayah_kerja ?? '-' }}
                     </td>
                     <td class="px-4 py-2">
                        @if ($user->role === 'super_admin')
                           <span class="text-indigo-600 font-semibold">Super Admin</span>
                        @else
                           <span class="text-gray-600">Admin</span>
                        @endif
                     </td>

                     <td class="px-4 py-2">
                        <div class="flex gap-2">
                           {{-- <a href="{{ route('user.show', $user->id) }}"
                              class="inline-block px-3 py-1 text-sm font-semibold text-white bg-green-600 rounded hover:bg-green-700">
                              View
                           </a> --}}

                           <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                              @csrf
                              @method('DELETE')
                              <button type="submit"
                                 class="px-3 py-1 text-sm font-semibold text-white bg-red-600 rounded hover:bg-red-700">
                                 Delete
                              </button>
                           </form>

                        </div>
                     </td>

                  </tr>
               @endforeach
            </tbody>

         </table>
      </div>
      <nav>

         {{-- Tombol halaman --}}
         {{-- <div>
            {{ $alsintans->links() }}
         </div> --}}
   </div>
   </nav>
   </div>

</x-layout>
