@extends('layout.apsdashboard')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Hasil Vote</h3>
                        <p>Pemilihan kandidat Sekretariat Jendral Bagian Manajemen Teknologi Data dan Informasi</p>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Kandidat</th>
                                    <th>Unit Bagian</th>
                                    <th>Jumlah Vote</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kandidats as $kandidat)
                                    <tr>
                                        <td>{{ $kandidat->nama }}</td>
                                        <td>{{ $kandidat->unit_bagian }}</td>
                                        <td>{{ $kandidat->votes_count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
