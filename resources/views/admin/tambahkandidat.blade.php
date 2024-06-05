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
<a class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
   href="/admin">Back</a> 
  <form id="kandidatForm" action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">       
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="col-span-full">
            <label for="gambar" class="block text-sm font-medium leading-6 text-gray-900">poto</label>
            <div class="mt-2 flex items-center gap-x-3">
              <input type="file" name="gambar" id="gambar" class="hidden" onchange="previewImage(event)">
              <label for="gambar" class="cursor-pointer rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                <svg class="h-12 w-12 text-gray-300 inline-block" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                </svg>
                <span>Upload</span>
              </label>
              <img id="photoPreview" src="#" alt="Preview" class="hidden h-12 w-12 rounded-full object-cover">
            </div>
          </div>
          <div class="sm:col-span-4">
            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <input type="text" name="username" id="username" autocomplete="username" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Username">
              </div>
            </div>
          </div>
          <div class="sm:col-span-4">
            <label for="unit_kerja" class="block text-sm font-medium leading-6 text-gray-900">Unit Kerja</label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <input type="text" name="unit_kerja" id="unit_kerja" autocomplete="unit_kerja" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Unit Kerja">
              </div>
            </div>
          </div>
  
          <div class="col-span-full">
            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Deskripsi</label>
            <div class="mt-2">
              <textarea id="description" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Silahkan diisi"></textarea>
            </div>
          </div>
        </div>
      </div>  
    </div>  
    <div class="mt-6 flex items-center justify-start gap-x-6">
      <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </form>

  <script>
    function previewImage(event) {
      var reader = new FileReader();
      reader.onload = function() {
        var output = document.getElementById('photoPreview');
        output.src = reader.result;
        output.classList.remove('hidden');
      }
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>
</x-layouts-backend>
