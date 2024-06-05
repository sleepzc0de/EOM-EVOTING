@extends('layout.appdashboard')

@section('content')
    <div class="container">
        <h1 class="h3 mb-2 text-gray-800">Edit Kandidat</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('kandidat.update', $kandidat->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $kandidat->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control">
                        @if ($kandidat->foto)
                            <img src="{{ asset('images/' . basename($kandidat->foto)) }}" alt="{{ $kandidat->nama }}"
                                width="100">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="unit_bagian">Unit Bagian</label>
                        <input type="text" name="unit_bagian" class="form-control" value="{{ $kandidat->unit_bagian }}"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
