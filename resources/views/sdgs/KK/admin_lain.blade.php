@extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            @if (session('msg'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Berhasil</strong> {{ session('msg') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <h2 class="card-title">LAIN-LAIN</h2>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatalaink">
                                <thead>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <tr>
                                        <th rowspan="2">Action</th>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">KK</th>
                                        <th rowspan="2">NIK</th>
                                        <th rowspan="2">Gelar awal</th>
                                        <th rowspan="2">Nama</th>
                                        <th rowspan="2">Gelar akhir</th>
                                        <th rowspan="2">JUMLAH ANGGOTA KELUARGA PENGGUNA TRANSPORTASI UMUM 1 BULAN
                                            TERAKHIR</th>
                                        <th rowspan="2">JUMLAH ANGGOTA KELUARGA PENGGUNA TRANSPORTASI UMUM 1 BULAN
                                            SEBELUMNYA</th>
                                        <th colspan="8">PEMANFAAT/PENERIMA PROGRAM PEMERINTAH</th>
                                        <th rowspan="2">BERAPA RATA-RATA PENGELUARAN SATU KELUARGA DALAM SEBULAN (Rp.)
                                        </th>

                                    </tr>

                                    <tr>
                                        <th>BLT</th>
                                        <th>PKH</th>
                                        <th>BST</th>
                                        <th>Bantuan Presiden</th>
                                        <th>Bantuan UMKM</th>
                                        <th>Bantuan untuk Pekerja</th>
                                        <th>Bantuan Pendidikan Anak</th>
                                        <th>Lainnya</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Presentase Penyelesaian Data</h4>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{ number_format($presentase, 2) }}%;"
                        aria-valuenow="{{ number_format($presentase, 2) }}" aria-valuemin="0" aria-valuemax="100">
                        {{ number_format($presentase, 2) }}%
                    </div>
                </div>
            </div>
        </div>
        <style>
            .progress-bar {
                background-color: #28a745;
                color: green;
                /* Warna hijau, bisa disesuaikan */
            }
        </style>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        var $ = jQuery.noConflict();
        $(function() {
            $('#tabledatalaink').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                searching: true,
                ajax: {
                    url: '{!! route('laink.jsonadmin') !!}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(d) {
                        d.nik = $('#search_nik').val(); // Pass the NIK input value
                    }
                },
                columns: [{
                        data: 'action',
                        name: 'action'
                    },
                    {
                        data: null,
                        render: function(data, type, row, meta) {
                            // Menambahkan nomor urut otomatis
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'nokk',
                        name: 'nokk'
                    },
                    {
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'gelarawal',
                        name: 'gelarawal'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'gelarakhir',
                        name: 'gelarakhir'
                    },
                    {
                        data: 'pengtransportsebelum',
                        name: 'pengtransportsebelum'
                    },
                    {
                        data: 'pengtransportsesudah',
                        name: 'pengtransportsesudah'
                    },
                    {
                        data: 'blt',
                        name: 'blt'
                    },
                    {
                        data: 'pkh',
                        name: 'pkh'
                    },
                    {
                        data: 'bst',
                        name: 'bst'
                    },
                    {
                        data: 'bantuan_presiden',
                        name: 'bantuan_presiden'
                    },
                    {
                        data: 'bantuan_umkm',
                        name: 'bantuan_umkm'
                    },
                    {
                        data: 'bantuan_pekerja',
                        name: 'bantuan_pekerja'
                    },
                    {
                        data: 'bantuan_anak',
                        name: 'bantuan_anak'
                    },
                    {
                        data: 'lainnya',
                        name: 'lainnya'
                    },
                    {
                        data: 'rata_rata',
                        name: 'rata_rata'
                    },
                ]
            });
            $('#search_nokk').on('keyup', function() {
                $('#tabledatalaink').DataTable().ajax.reload();
            });
        });
    </script>
@endsection
