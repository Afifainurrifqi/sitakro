@extends(Auth::user() && Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Tambah Surat Masuk</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('suratmasuk.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="nama_instansi" class="form-label">Nama Instansi</label>
                                <input type="text" name="nama_instansi" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                                <input type="date" name="tanggal_masuk" class="form-control" required>
                            </div>


                            <div class="mb-3">
                                <label for="file" class="form-label">Upload File</label>
                                <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx,.jpg,.png"
                                    required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ url('surat/suratmasuk') }}" class="btn btn-danger">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
