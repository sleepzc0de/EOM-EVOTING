@extends('layout.apsdashboard')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pemilihan Kandidat</h3>
                        <p>Keterangan: Sekretariat Jendral Bagian Manajemen Teknologi Data dan Informasi</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('vote.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                @foreach ($kandidats as $kandidat)
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kandidat_id"
                                                id="kandidat{{ $kandidat->id }}" value="{{ $kandidat->id }}" required>
                                            <label class="form-check-label" for="kandidat{{ $kandidat->id }}">
                                                <div style="text-align: center;">
                                                    <div style="margin-bottom: 50px;">{{ $kandidat->nama }}</div>

                                                    <img src="{{ asset('images/' . basename($kandidat->foto)) }}"
                                                        alt="Foto {{ $kandidat->nama }}" class="img-thumbnail"
                                                        style="margin-bottom: 50px;" style="width: 100px; height: 100px;">

                                                    <div class="text-muted">Unit Bagian :
                                                        {{ $kandidat->unit_bagian }}</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-center" style="margin-bottom: 10px;">
                                <button type="submit" class="btn btn-primary" onclick="sumbitform()">Vote</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('voteForm').addEventListener('submit', function(event) {
            var selectedRadio = document.querySelector('input[name="kandidat_id"]:checked');
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
@endsection
