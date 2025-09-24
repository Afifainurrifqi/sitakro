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
                        <br>
                        <h5 class="card-title mb-0">Surat Masuk</h5>
                    </div>

                    <div class="card-body">
                        <button type="button" class="btn mb-1 btn-primary"
                            onclick="window.location='{{ url('surat/tambahsuratmasuk') }}'">
                            Tambah Surat Masuk
                            <span class="btn-icon-right"><i class="fa fa-plus-circle"></i></span>
                        </button>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th>Nama Instansi</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal Masuk</th>
                                        <th>File</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->nama_instansi }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d-m-Y') }}</td>
                                            <td>
                                                @if ($item->file && Storage::disk('suratdesa')->exists($item->file))
                                                    <a href="{{ Storage::disk('suratdesa')->url($item->file) }}"
                                                        class="btn btn-sm btn-primary" target="_blank"
                                                        rel="noopener">Lihat</a>

                                                    <a href="{{ Storage::disk('suratdesa')->url($item->file) }}"
                                                        class="btn btn-sm btn-success" download>Download</a>
                                                @else
                                                    <span class="text-muted">Tidak Ada</span>
                                                @endif
                                            </td>


                                            <td>
                                                <a href="{{ route('suratmasuk.edit', $item->_id) }}"
                                                    class="btn btn-sm btn-warning">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
