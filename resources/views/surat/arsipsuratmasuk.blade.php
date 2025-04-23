@extends(Auth::user() && Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
<div class="container-fluid py-3">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    @if (session('msg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil:</strong> {{ session('msg') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <h5 class="card-title mb-0">ARSIP SURAT MASUK</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th>Nama Instansi</th>
                                    <th>Keterangan</th>
                                    <th>File</th>
                                    <th style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1; $i <= 5; $i++)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>Instansi Dummy {{ $i }}</td>
                                        <td>Keterangan Dummy ke-{{ $i }}</td>
                                        <td>
                                            <a href="{{ asset('storage/dummy-file-' . $i . '.pdf') }}" class="btn btn-sm btn-primary" target="_blank">
                                                Lihat File
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('surat-masuk/' . $i . '/edit') }}" class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
