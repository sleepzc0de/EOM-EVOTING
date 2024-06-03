<x-layouts-backend>
  <x-slot:title>{{ $title }}</x-slot>
  <div class="container">
    @foreach ($kandidat as $k )
    <div class="flip flip-vertical">
      <div class="front">
        <img src="img/user.jpg" alt="Kandidat" />
        <h1>Nama:{{ $k->username }}</h1>
        <h2>Unit:{{ $k ->unit_kerja }}</h2>
      </div>
      <div class="back">
        <p>{{ $k->description }}</p>
      </div>
    </div>
    @endforeach
  </div>  
</x-layouts-backend>