@extends('layout.appdashboard')

@section('content')
    <div class="container">
        <h1 class="h3 mb-2 text-gray-800">Tambah Kandidat</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('kandidat.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="unit_bagian">Unit Bagian</label>
                        <select name="unit_bagian" class="form-control" required>
                            <option value="">-- Pilih Unit Bagian --</option>
                            <option value="Biro Perencanaan dan Keuangan">Biro Perencanaan dan Keuangan</option>
                            <option value="Biro Organisasi dan Ketatalaksanaan">Biro Organisasi dan Ketatalaksanaan</option>
                            <option value="Biro Hukum">Biro Hukum</option>
                            <option value="Biro Advokasi">Biro Advokasi</option>
                            <option value="Biro Sumber Daya Manusia">Biro Sumber Daya Manusia</option>
                            <option value="Biro Komunikasi dan Layanan Informasi">Biro Komunikasi dan Layanan Informasi
                            </option>
                            <option value="Biro Manajemen Barang Milik Negara dan Pengadaan">Biro Manajemen Barang Milik
                                Negara dan Pengadaan</option>
                            <option value="Biro Umum">Biro Umum</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
