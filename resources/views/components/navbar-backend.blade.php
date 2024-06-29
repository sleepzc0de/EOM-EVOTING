<nav class="bg-gray-800" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-12 w-12" src="{{ asset('img/logo.png') }}" alt="logo">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <x-nav-link href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-nav-link>
              <x-nav-link href="voting/{voting}" :active="request()->is('voting/{voting}')">Kandidat voting</x-nav-link>
              @if(Auth::check() && Auth::user()->is_admin)
                <x-nav-link href="/admin" :active="request()->is('admin')">Kandidat</x-nav-link>
              @endif
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <!-- Profile dropdown -->
            <div class="relative ml-3" >
              <div>
                <button @click="isOpen = !isOpen" type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                  @auth
                    @if(auth()->user()->gambar)
                        <img class="h-10 w-10 rounded-full" src="{{ asset('storage/' . auth()->user()->gambar) }}" alt="{{ auth()->user()->username }}">
                    @else
                        <img class="h-10 w-10 rounded-full" src="{{ asset('img/user.jpg') }}" alt="{{ auth()->user()->username }}">
                    @endif
                  @endauth
                </button>
              </div>
              <div x-show="isOpen"
              x-transition:enter="transition ease-out duration-100 transform"
              x-transition:enter-start="opacity-0 scale-95"
              x-transition:enter-end="opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-75 transform"
              x-transition:leave-start="opacity-100 scale-100"
              x-transition:leave-end="opacity-0 scale-95"
              class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <!-- Active: "bg-gray-100", Not Active: "" -->
                <a href="profil" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                <a href="/logout" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Logout</a>
              </div>
            </div>
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg :class="{'hiden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg :class="{'block': isOpen, 'hiden': !isOpen }" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
      <div class="border-t border-gray-700 pb-3 pt-4">
        <div class="flex items-center px-5">
          <div class="flex-shrink-0">
            @auth
              @if(auth()->user()->gambar)
                <img class="h-10 w-10 rounded-full" src="{{ asset('storage/' . auth()->user()->gambar) }}" alt="{{ auth()->user()->username }}">
              @else
                <img class="h-10 w-10 rounded-full" src="{{ asset('img/user.jpg') }}" alt="{{ auth()->user()->username }}">
              @endif
            @endauth
          </div>
          <div class="ml-3">
            <div class="text-base font-medium leading-none text-white">{{ auth()->user()->username }} </div>
          </div>
        </div>
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3 mt-3">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <x-nav-link href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-nav-link>
          <x-nav-link href="voting/{voting}" :active="request()->is('voting/{voting}')">Kandidat voting</x-nav-link>
          @if(Auth::check() && Auth::user()->is_admin)
            <x-nav-link href="/admin" :active="request()->is('admin')">Kandidat</x-nav-link>
          @endif
        </div>
        <div class="mt-3 space-y-1 px-2">
          <x-nav-link href="profil" :active="request()->is('#')">Your Profil</x-nav-link>
          <x-nav-link href="/logout" :active="request()->is('logout')">Logout</x-nav-link>
        </div>
      </div>
    </div>
  </nav>

  