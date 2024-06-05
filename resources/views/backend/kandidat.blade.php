<x-layouts-backend>
  <x-slot:title>{{ $title }}</x-slot>
  <h1>
    Untuk memberikan voting ada silahkan 
    <a class="btn text-blue-500 hover:text-blue-700 px-4 py-2 rounded-md" href="/voting">Klik Disini</a>
  </h1>
  <div class="container">
    @forelse ($kandidat as $k)
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
    @empty
      <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
        <span class="font-medium">Tidak ada kandidat yang tersedia.</span>
      </div>
    @endforelse
  </div>  
</x-layouts-backend>
