<x-layouts-backend>
  <x-slot:title>{{ $title }}</x-slot:title>
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
  @if(session()->has('error'))
  <div id="alert-error" class="flex items-center p-4 mb-4 text-sm text-red-800 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
      <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-4h2v2H9v-2zm0-8h2v6H9V6z" clip-rule="evenodd"></path></svg>
      <span class="sr-only">Error</span>
      <div>
          {{ session('error') }}
      </div>
      <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-dismiss-target="#alert-error" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      </button>
  </div>
  @endif
  <form id="votingForm" action="{{ route('voting.store') }}" method="POST">
    @csrf
    <div class="container">
      @forelse ($kandidat as $k)
      <div class="conten p-3">
        <div class="flip flip-vertical">
          <div class="front">
            @if($k->gambar)       
              <div class="image-container">
                <img src="{{ asset('storage/' . $k->gambar) }}" alt="{{ $k->username }}"> 
              </div>       
            @else
              <div class="image-container">
                <img src="{{ asset('img/user.jpg') }}" alt="{{ $k->username }}">
              </div>          
            @endif       
            <h1>Nama: {{ $k->username }}</h1>
            <h2>Unit kerja : {{ $k->unit_kerja }}</h2>
          </div>
          <div class="back">
            <p>{{ $k->description }}</p>
          </div>
        </div>
        <a class="flex justify-center items-center mt-4 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
        href="{{ route('voting.show', $k->id) }}">Detail</a>
        <p class="p-2 mt-5 border border-gray-400 text-center rounded-md">
          <input type="radio" name="vote" value="{{ $k->id }}" data-username="{{ $k->username }}" class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
        </p>      
      </div>
      @empty
      <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
        <span class="font-medium">Tidak ada kandidat yang tersedia.</span>
      </div>
    </div> 
    @endforelse
  </div>
    <div class="p-2">
      <button type="submit" class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-3">
        Submit Vote
      </button>
      
    </div> 
  </form>
</x-layouts-backend>

<script>
  document.getElementById('votingForm').addEventListener('submit', function(event) {
      var selectedRadio = document.querySelector('input[name="vote"]:checked');
      if (selectedRadio) {
          var username = selectedRadio.getAttribute('data-username');
          var confirmed = confirm('Apakah Anda yakin memilih ' + username + '?');
          if (!confirmed) {
              event.preventDefault();
          }
      } else {
          alert('Silakan pilih seorang kandidat.');
          event.preventDefault();
      }
  });

  document.querySelectorAll('[data-dismiss-target]').forEach(function(button) {
      button.addEventListener('click', function() {
          var target = document.querySelector(button.getAttribute('data-dismiss-target'));
          target.remove();
      });
  });
</script>
