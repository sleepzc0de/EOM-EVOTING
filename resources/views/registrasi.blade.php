<x-layouts>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="container mx-auto mt-5">
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
    </div>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="image-container">
                <img src="{{ asset('img/logo.png') }}" alt="logo" class="image">
            </div>
            <h2 class="mt-5 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 mb-1">Registrasi your account</h2>
        </div>
        <div class="mt-5 flex justify-center items-center bg-gray-100">
            <div class="w-full max-w-sm p-6 bg-white shadow-lg rounded-lg">
                <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="/registrasi" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">E-mail address</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email" placeholder="E-mail" required value="{{ old('email') }}"
                                class="block w-full rounded-md border-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('email') is-invalid @enderror">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">User Name</label>
                            <div class="mt-2">
                                <input id="username" name="username" type="text" autocomplete="username" placeholder="User Name" required value="{{ old('username') }}"
                                class="block w-full rounded-md border-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('username') is-invalid @enderror">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="unit_kerja" class="block text-sm font-medium leading-6 text-gray-900">Unit Kerja</label>
                            <div class="mt-2">
                                <input id="unit_kerja" name="unit_kerja" type="text" autocomplete="unit_kerja" placeholder="Unit Kerja" required value="{{ old('unit_kerja') }}"
                                class="block w-full rounded-md border-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('unit_kerja') is-invalid @enderror">
                                @error('unit_kerja')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="no_telpon" class="block text-sm font-medium leading-6 text-gray-900">No Telpon</label>
                            <div class="mt-2">
                                <input id="no_telpon" name="no_telpon" type="text" autocomplete="tel" placeholder="No Telpon" required value="{{ old('no_telpon') }}"
                                class="block w-full rounded-md border-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('no_telpon') is-invalid @enderror">
                                @error('no_telpon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <div class="mt-2 relative">
                              <input id="password" name="password" type="password" autocomplete="current-password" placeholder="Password" required value="{{ old('password') }}"
                                class="block w-full rounded-md border-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('password') is-invalid @enderror">
                                <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-6">
                                    <!-- Icon mata terbuka -->
                                    <svg id="openEye" class="h-5 w-5 text-gray-500 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h.01M19 12h.01M9 12h.01M5 12h.01M12 15.5c3.5 0 5-1.5 5-1.5M12 15.5c-3.5 0-5-1.5-5-1.5M12 8.5c3.5 0 5 1.5 5 1.5M12 8.5c-3.5 0-5 1.5-5 1.5"></path>
                                    </svg>
                                    <!-- Icon mata tertutup -->
                                    <svg id="closedEye" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h.01M19 12h.01M9 12h.01M5 12h.01M12 15.5c3.5 0 5-1.5 5-1.5M12 15.5c-3.5 0-5-1.5-5-1.5M12 8.5c3.5 0 5 1.5 5 1.5M12 8.5c-3.5 0-5 1.5-5 1.5"></path>
                                    </svg>
                                  </button>
                              @error('password')
                              <div class="invalid-feedback text-red-500 text-sm mt-1">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        <div>
                            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Registrasi</button>
                        </div>
                    </form>
                    <p class="mt-10 text-center text-sm text-gray-500">
                        Sudah punya akun? Silahkan Login |
                        <a href="/login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Klik disini</a>
                    </p>
                </div>
            </div> 
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const dismissButtons = document.querySelectorAll('[data-dismiss-target]');
        
        dismissButtons.forEach(button => {
          button.addEventListener('click', function() {
            const target = document.querySelector(this.getAttribute('data-dismiss-target'));
            if (target) {
              target.style.display = 'none';
                }
            });
            });
        });

        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const openEye = document.getElementById('openEye');
            const closedEye = document.getElementById('closedEye');
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            
            // Toggle icon visibility
            if (type === 'text') {
            closedEye.classList.add('hidden');
            openEye.classList.remove('hidden');
            } else {
            closedEye.classList.remove('hidden');
            openEye.classList.add('hidden');
            }
        });
      </script>
</x-layouts>