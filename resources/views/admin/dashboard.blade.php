<x-layouts-backend>
    <x-slot:title>{{ $title }}</x-slot>
    @if(session()->has('success'))
    <div id="alert-1" class="flex items-center p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-4h2v2H9v-2zm0-8h2v6H9V6z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Info</span>
        <div>
            {{ session('success') }}
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300" data-dismiss-target="#alert-1" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    @endif
    @if(session()->has('danger'))
    <div id="alert-success" class="flex items-center p-4 mb-4 text-sm text-red-800 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-4h2v2H9v-2zm0-8h2v6H9V6z" clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Error</span>
        <div>
            {{ session('danger') }}
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-dismiss-target="#alert-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    @endif
  
    <div class="flex justify-between mb-4">
      <a class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" href="admin/create">Tambah Kandidat</a> 
    </div>
  
    <table class="w-full text-left table-auto min-w-max border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-4 border border-gray-300">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900">Nama</p>
                </th>
                <th class="p-4 border border-gray-300">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900">Deskripsi</p>
                </th>
                <th class="p-4 border border-gray-300">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900">Unit Kerja</p>
                </th>
                <th class="p-4 border border-gray-300">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900">Lainnya</p>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kandidat as $k)
            <tr class="hover:bg-gray-100">
                <td class="p-4 border border-gray-300">
                    <div class="flex items-center gap-3">
                        @if($k->gambar)       
                            <img src="{{ asset('storage/' . $k->gambar) }}" alt="{{ $k->username }}" class="relative inline-block h-9 w-9 rounded-full object-cover object-center">        
                        @else
                            <img src="img/user.jpg" alt="{{ $k->username }}" class="relative inline-block h-9 w-9 rounded-full object-cover object-center" />          
                        @endif             
                        <div class="flex flex-col">
                            <p class="block font-sans text-sm antialiased font-normal leading-normal text-gray-900">{{ $k->username }}</p>
                        </div>
                    </div>
                </td>
                <td class="p-4 border border-gray-300">
                    <div class="flex flex-col">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-gray-900 break-words">{{ $k->description }}</p>
                    </div>
                </td>
                <td class="p-4 border border-gray-300">
                    <div class="flex flex-col">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-gray-900">{{ $k->unit_kerja }}</p>
                    </div>
                </td>
                <td class="p-4 border border-gray-300">
                  <div class="flex flex-col space-y-2">
                      <form id="deleteForm{{ $k->id }}" action="{{ route('admin.destroy', $k->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="button" onclick="confirmDelete({{ $k->id }})" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Hapus</button>
                      </form>
                      <a class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" href="{{ route('admin.edit', $k->id) }}">Edit Kandidat</a> 
                  </div>
              </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </x-layouts-backend>
  
  <script>   
    document.querySelectorAll('[data-dismiss-target]').forEach(function(button) {
        button.addEventListener('click', function() {
            var target = document.querySelector(button.getAttribute('data-dismiss-target'));
            target.remove();
        });
    });
    function confirmDelete(id) {
        var result = confirm("Apakah Anda yakin ingin menghapus kandidat ini?");
        if (result) {
            // Jika pengguna menekan OK, submit formulir hapus
            document.getElementById('deleteForm' + id).submit();
        }
    }
    
  </script>
  