@extends('layout.appdashboard')

@section('content')
    <div class="container">
        <h1 class="h3 mb-2 text-gray-800">Detail Kandidat</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <p>{{ $kandidat->nama }}</p>
                </div>
                <div class="form-group">
                    <label for="foto">Foto:</label>
                    <img src="{{ asset('images/' . basename($kandidat->foto)) }}" alt="{{ $kandidat->nama }}" width="200">
                </div>
                <div class="form-group">
                    <label for="unit_bagian">Unit Bagian:</label>
                    <p>{{ $kandidat->unit_bagian }}</p>
                </div>
                <a href="{{ route('kandidat.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
