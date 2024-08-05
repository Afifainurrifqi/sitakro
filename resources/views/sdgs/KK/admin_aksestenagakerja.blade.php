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
                            <h2 class="card-title">AKSES TENAGA KESEHATAN</h2>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledataaksestenagakesehatan">
                                <thead>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <tr>
                                        <th rowspan="2">Action</th>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">NO KK</th>
                                        <th rowspan="2">NIK</th>
                                        <th rowspan="2">Gelar awal</th>
                                        <th rowspan="2">Nama</th>
                                        <th rowspan="2">Gelar akhir</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">DOKTER
                                            SPESIALIS</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">DOKTER UMUM
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">BIDAN</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">TENAGA
                                            KESEHATAN / PERAWAT</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">DUKUN</th>
                                    </tr>

                                    <tr>
                                        <th>JARAK TEMPUH (KM)</th>
                                        <th>WAKTU TEMPUH (JAM)</th>
                                        <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                        <th>JARAK TEMPUH (KM)</th>
                                        <th>WAKTU TEMPUH (JAM)</th>
                                        <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                        <th>JARAK TEMPUH (KM)</th>
                                        <th>WAKTU TEMPUH (JAM)</th>
                                        <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                        <th>JARAK TEMPUH (KM)</th>
                                        <th>WAKTU TEMPUH (JAM)</th>
                                        <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                        <th>JARAK TEMPUH (KM)</th>
                                        <th>WAKTU TEMPUH (JAM)</th>
                                        <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

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
            $('#tabledataaksestenagakesehatan').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                searching: true,
                ajax: {
                    url: '{!! route('aksestenagakerja.jsonadmin') !!}',
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
                    }, // Use dot notation to access related data
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
                        data: 'jaraktempuh_dr_spesialis',
                        name: 'jaraktempuh_dr_spesialis'
                    },
                    {
                        data: 'waktutempuh_dr_spesialis',
                        name: 'waktutempuh_dr_spesialis'
                    },
                    {
                        data: 'kemudahan_dr_spesialis',
                        name: 'kemudahan_dr_spesialis'
                    },
                    {
                        data: 'jaraktempuh_dr_umum',
                        name: 'jaraktempuh_dr_umum'
                    },
                    {
                        data: 'waktutempuh_dr_umum',
                        name: 'waktutempuh_dr_umum'
                    },
                    {
                        data: 'kemudahan_dr_umum',
                        name: 'kemudahan_dr_umum'
                    },
                    {
                        data: 'jaraktempuh_bidan',
                        name: 'jaraktempuh_bidan'
                    },
                    {
                        data: 'waktutempuh_bidan',
                        name: 'waktutempuh_bidan'
                    },
                    {
                        data: 'kemudahan_bidan',
                        name: 'kemudahan_bidan'
                    },
                    {
                        data: 'jaraktempuh_tenagakes',
                        name: 'jaraktempuh_tenagakes'
                    },
                    {
                        data: 'waktutempuh_tenagakes',
                        name: 'waktutempuh_tenagakes'
                    },
                    {
                        data: 'kemudahan_tenagakes',
                        name: 'kemudahan_tenagakes'
                    },
                    {
                        data: 'jaraktempuh_dukun',
                        name: 'jaraktempuh_dukun'
                    },
                    {
                        data: 'waktutempuh_dukun',
                        name: 'waktutempuh_dukun'
                    },
                    {
                        data: 'kemudahan_dukun',
                        name: 'kemudahan_dukun'
                    }
                ]
            });
            $('#search_nokk').on('keyup', function() {
                $('#tabledataaksestenagakesehatan').DataTable().ajax.reload();
            });
        });
    </script>
@endsection
