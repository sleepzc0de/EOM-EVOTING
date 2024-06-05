@extends('layout.appdashboard')

@section('content')
    <div class="container">
        <h1 class="h3 mb-2 text-gray-800">Hasil Voting</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <h3>Jumlah Suara untuk Setiap Kandidat</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Kandidat</th>
                            <th>Total Suara</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($voteCounts as $voteCount)
                            <tr>
                                <td>{{ $voteCount->kandidat->nama ?? 'Unknown' }}</td>
                                <td>{{ $voteCount->total_votes }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">Belum ada suara yang masuk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <h3>Detail Voting</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama User</th>
                            <th>Email User</th>
                            <th>Kandidat yang Dipilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($results as $result)
                            <tr>
                                <td>{{ $result->user->name }}</td>
                                <td>{{ $result->user->email }}</td>
                                <td>{{ $result->kandidat->nama }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Belum ada data voting.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
