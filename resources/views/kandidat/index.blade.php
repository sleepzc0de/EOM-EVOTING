@extends('layout.appdashboard')

@section('content')
    <div class="container">
        <h1 class="h3 mb-2 text-gray-800">Daftar Kandidat</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                @if ($MaxKandidats >= 3)
                    <a href="#" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Data sudah {{ $MaxKandidats }} </span>
                    </a>
                @else
                    <a href="{{ route('kandidat.create') }}" class="btn btn-primary mb-3">Tambah Kandidat</a>
                @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Unit Bagian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kandidats as $kandidat)
                            <tr>
                                <td>{{ $kandidat->nama }}</td>
                                <td><img src="{{ asset('images/' . basename($kandidat->foto)) }}" width= '100'
                                        height='100' class="img img-responsive" /></td>
                                <td>{{ $kandidat->unit_bagian }}</td>
                                <td>
                                    <a href="{{ route('kandidat.show', $kandidat->id) }}"
                                        class="btn btn-info btn-sm">Lihat</a>
                                    <a href="{{ route('kandidat.edit', $kandidat->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('kandidat.destroy', $kandidat->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
