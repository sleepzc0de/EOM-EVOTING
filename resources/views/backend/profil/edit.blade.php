<x-layouts-backend>
    <x-slot:title>{{ $title }}</x-slot>
    <a class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" href="/profil">Back</a>
    <form id="UserForm" action="{{ route('profil.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf       
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="gambar" class="block text-sm font-medium leading-6 text-gray-900">Foto</label>
                        <div class="mt-2 flex items-center gap-x-3">
                            <input type="file" name="gambar" id="gambar" class="hidden" onchange="previewImage(event)">
                            <label for="gambar" class="cursor-pointer rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                <img id="photoPreview" src="{{ $user->gambar ? asset('storage/' . $user->gambar) : asset('img/user.jpg') }}" alt="{{ $user->username }}" class="w-24 h-24 rounded-full mb-3 mt-3">
                                <span class="mt-3">Change</span>
                            </label>
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="username" id="username" value="{{ $user->username }}" autocomplete="username" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Username">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">E-Mail</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="email" name="email" id="email" value="{{ $user->email }}" autocomplete="email" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="email">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="unit_kerja" class="block text-sm font-medium leading-6 text-gray-900">Unit Kerja</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="unit_kerja" id="unit_kerja" value="{{ $user->unit_kerja }}" autocomplete="unit_kerja" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Unit Kerja">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="no_telpon" class="block text-sm font-medium leading-6 text-gray-900">No Telpon</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="no_telpon" id="no_telpon" value="{{ $user->no_telpon }}" autocomplete="no_telpon" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="No telpon">
                            </div>
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
