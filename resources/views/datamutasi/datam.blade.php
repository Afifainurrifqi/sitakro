@extends(Auth::user()->role === 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                        @if (session('msg'))
                        @endif
                        <h2 class="card-title">Data Mutasi Penduduk</h2>
                        <form action="/import" method="POST" enctype="multipart/form-data">
                            @csrf
                            <a href="{{ route('export.meninggal') }}" class="btn btn-primary">Export Meninggal</a>
                            <a href="{{ route('export.pindah') }}" class="btn btn-primary">Export Pindah</a>
                        </form><br><br>
                    </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered w-100" id="tabledatamutasi">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No KK</th>
                                        <th>NIK</th>
                                        <th>Gelar awal</th>
                                        <th>Nama</th>
                                        <th>Gelar akhir</th>
                                        <th>Jenis kelamin</th>
                                        <th>Tempat lahir</th>
                                        <th>Tanggal_lahir</th>
                                        <th>Agama</th>
                                        <th>Pendidikan</th>
                                        <th>Pekerjaan</th>
                                        <th>Goldar</th>
                                        <th>Status</th>
                                        <th>Tanggal perkawinan</th>
                                        <th>Hubungan</th>
                                        <th>Ayah</th>
                                        <th>Ibu</th>
                                        <th>Alamat</th>
                                        <th>RT</th>
                                        <th>RW</th>
                                        <th>Status kependudukan</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                    </div>
                </div>

                {{-- Modal Import --}}
                {{-- <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data"
                            class="modal-content">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="importModalLabel">Impor Data Penduduk</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group mb-0">
                                    <label for="importFile">Pilih File (.xlsx, .xls)</label>
                                    <input type="file" accept=".xlsx, .xls" class="form-control-file" id="importFile"
                                        name="importFile" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Impor Data</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>

    {{-- jQuery & DataTables (sesuaikan asset Anda) --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        var $ = jQuery.noConflict();
        $(function() {
            var table = $('#tabledatamutasi').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                searching: true,
                ajax: {
                    url: "{{ route('datam.json') }}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(d) {
                        // Kalau ingin filter nik di endpoint lain, bisa kirim ke jsonadmin juga
                        d.nik = $('#search_nik').val() || '';
                        d.nokk = $('#search_nokk').val() || '';
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    }, // nomor urut
                    {
                        data: 'nokk',
                        name: 'nokk',
                        defaultContent: '-'
                    },
                    {
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'gelarawal',
                        name: 'gelarawal',
                        defaultContent: '-'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'gelarakhir',
                        name: 'gelarakhir',
                        defaultContent: '-'
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin',
                        defaultContent: '-'
                    },
                    {
                        data: 'tempat_lahir',
                        name: 'tempat_lahir',
                        defaultContent: '-'
                    },
                    {
                        data: 'tanggal_lahir',
                        name: 'tanggal_lahir',
                        defaultContent: '-'
                    },
                    {
                        data: 'agama.nama',
                        name: 'agama.nama',
                        defaultContent: '-'
                    },
                    {
                        data: 'pendidikan.nama',
                        name: 'pendidikan.nama',
                        defaultContent: '-'
                    },
                    {
                        data: 'pekerjaan.nama',
                        name: 'pekerjaan.nama',
                        defaultContent: '-'
                    },
                    {
                        data: 'goldar.nama',
                        name: 'goldar.nama',
                        defaultContent: '-'
                    },
                    {
                        data: 'status.nama',
                        name: 'status.nama',
                        defaultContent: '-'
                    },
                    {
                        data: 'tanggal_perkawinan',
                        name: 'tanggal_perkawinan',
                        defaultContent: '-'
                    },
                    {
                        data: 'hubungan',
                        name: 'hubungan',
                        defaultContent: '-'
                    },
                    {
                        data: 'ayah',
                        name: 'ayah',
                        defaultContent: '-'
                    },
                    {
                        data: 'ibu',
                        name: 'ibu',
                        defaultContent: '-'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat',
                        defaultContent: '-'
                    },
                    {
                        data: 'rt',
                        name: 'rt',
                        defaultContent: '-'
                    },
                    {
                        data: 'rw',
                        name: 'rw',
                        defaultContent: '-'
                    },
                    {
                        data: 'datak',
                        name: 'datak'
                    },
                ],
                order: [
                    [2, 'asc']
                ], // urut default by NIK
            });

            // Trigger reload ketika filter berubah
            $('#search_nik, #search_nokk').on('keyup change', function() {
                table.ajax.reload();
            });
        });
    </script>
@endsection
