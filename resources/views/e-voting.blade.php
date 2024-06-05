@extends('layout.apsdashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Pemilihan Kandidat</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Voting</h5>
                            <p class="card-text">Lakukan voting untuk kandidat pilihan Anda.</p>
                            <a href="{{ route('vote.index') }}" class="btn btn-primary">Mulai Voting</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Hasil Voting</h5>
                            <p class="card-text">Lihat hasil voting terbaru.</p>
                            <a href="{{ route('hasil.vote') }}" class="btn btn-success">Lihat Hasil Voting</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
