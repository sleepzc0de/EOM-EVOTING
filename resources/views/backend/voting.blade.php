<x-layouts-backend>
  <x-slot:title>{{ $title }}</x-slot>
  <h1>
    Untuk melihat deskripsi setiap kandidat silahkan <a class="btn text-blue-500 hover:text-blue-700 px-4 py-2 rounded-md" href="/kandidat">Klik Disini</a>
  </h1>
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
    <table class="w-full mt-4 text-left table-auto min-w-max border-collapse border border-gray-300">
      <thead>
        <tr class="bg-gray-200">
          <th class="p-4 border border-gray-300">
            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900">
              Nama
            </p>
          </th>
          <th class="p-4 border border-gray-300">
            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900">
              Unit Kerja
            </p>
          </th>
          <th class="p-4 border border-gray-300">
            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900">
              Voting
            </p>
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kandidat as $k)
        <tr class="hover:bg-gray-100">
          <td class="p-4 border border-gray-300">
            <div class="flex items-center gap-3">
              <img src="img/user.jpg"
                   alt="{{ $k->username }}" class="relative inline-block h-9 w-9 rounded-full object-cover object-center" />
              <div class="flex flex-col">
                <p class="block font-sans text-sm antialiased font-normal leading-normal text-gray-900">
                  {{ $k->username }}
                </p>
              </div>
            </div>
          </td>
          <td class="p-4 border border-gray-300">
            <div class="flex flex-col">
              <p class="block font-sans text-sm antialiased font-normal leading-normal text-gray-900">
                {{ $k->unit_kerja }}
              </p>
            </div>
          </td>
          <td class="p-4 border border-gray-300 text-center">
            <input type="radio" name="vote" value="{{ $k->id }}" data-username="{{ $k->username }}" class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-4">
      <button type="submit" class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
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
