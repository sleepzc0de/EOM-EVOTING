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
    <div class="flex justify-center items-start space-x-6 p-6">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
            <div class="text-center">
                @if($user->gambar)       
                    <div class="image-container">
                    <img src="{{ asset('storage/' . $user->gambar) }}" alt="{{ $user->username }}"> 
                    </div>       
                @else
                    <div class="image-container">
                    <img src="{{ asset('img/user.jpg') }}" alt="{{ $user->username }}">
                    </div>          
                @endif 
                    <h2 class="text-2xl font-semibold mt-4">{{ $user->username }}</h2>
                    <p class="text-gray-600 mt-4">{{ $user->email }}</p>
                    <p class="text-gray-600">Unit Kerja: {{ $user->unit_kerja }}</p>
                    <p class="text-gray-600">No. Telpon: {{ $user->no_telpon }}</p>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full flex flex-col items-center justify-center space-y-4">
            <a href="profil/{profil}/edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Ubah Profil
            </a>
            <a href="/changepassword" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Ubah Password
            </a>
        </div>
    </div>
    
</x-layouts-backend>

<script>
    document.querySelectorAll('[data-dismiss-target]').forEach(function(button) {
    button.addEventListener('click', function() {
        var target = document.querySelector(button.getAttribute('data-dismiss-target'));
        target.remove();
    });
});
</script>