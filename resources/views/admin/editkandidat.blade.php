<x-layouts-backend>
    <x-slot:title>{{ $title }}</x-slot>
    <form id="kandidatForm" action="{{ route('admin.update', $kandidat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="gambar" class="block text-sm font-medium leading-6 text-gray-900">Foto</label>
                        <div class="mt-2 flex items-center gap-x-3">
                            <input type="file" name="gambar" id="gambar" class="hidden" onchange="previewImage(event)">
                            <label for="gambar" class="cursor-pointer rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                <img id="photoPreview" src="{{ asset('storage/' . $kandidat->gambar) }}" alt="Preview" class="h-12 w-12 rounded-full object-cover">                                
                                <span>Change</span>
                            </label>
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="username" id="username" value="{{ $kandidat->username }}" autocomplete="username" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Username">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="unit_kerja" class="block text-sm font-medium leading-6 text-gray-900">Unit Kerja</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="unit_kerja" id="unit_kerja" value="{{ $kandidat->unit_kerja }}" autocomplete="unit_kerja" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Unit Kerja">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-full">
                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Deskripsi</label>
                        <div class="mt-2">
                            <textarea id="description" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Silahkan diisi">{{ $kandidat->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-start gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900" onclick="window.history.back()">Cancel</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</x-layouts-backend>

<script>
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('photoPreview');
        output.src = reader.result;
        output.classList.remove('hidden');
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
