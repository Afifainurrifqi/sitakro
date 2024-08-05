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
                            <h2 class="card-title">AKSES PENDIDIKAN</h2>


                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledataaksespendidikan">
                                <thead>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <tr>
                                        <th rowspan="2">Action</th>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">NO KK</th>
                                        <th rowspan="2">NIK</th>
                                        <th rowspan="2">NAMA</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PAUD</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">TK/RA</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SD/MI ATAU
                                            SEDERAJAT</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SMP/MTs
                                            ATAU SEDERAJAT</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SMA/MA ATAU
                                            SEDERAJAT</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PERGURUAN
                                            TINGGI</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PESANTREN
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SEMINARI
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PENDIDIKAN
                                            KEAGAMAAN LAIN</th>


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
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        var $ = jQuery.noConflict();
        $(function() {
            $('#tabledataaksespendidikan').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                searching: true,
                ajax: {
                    url: '{!! route('aksespendidikan.jsonadmin') !!}',
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
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'jaraktempuh_paud',
                        name: 'jaraktempuh_paud'
                    },
                    {
                        data: 'waktutempuh_paud',
                        name: 'waktutempuh_paud'
                    },
                    {
                        data: 'kemudahan_paud',
                        name: 'kemudahan_paud'
                    },
                    {
                        data: 'jaraktempuh_tk',
                        name: 'jaraktempuh_tk'
                    },
                    {
                        data: 'waktutempuh_tk',
                        name: 'waktutempuh_tk'
                    },
                    {
                        data: 'kemudahan_tk',
                        name: 'kemudahan_tk'
                    },
                    {
                        data: 'jaraktempuh_sd',
                        name: 'jaraktempuh_sd'
                    },
                    {
                        data: 'waktutempuh_sd',
                        name: 'waktutempuh_sd'
                    },
                    {
                        data: 'kemudahan_sd',
                        name: 'kemudahan_sd'
                    },
                    {
                        data: 'jaraktempuh_smp',
                        name: 'jaraktempuh_smp'
                    },
                    {
                        data: 'waktutempuh_smp',
                        name: 'waktutempuh_smp'
                    },
                    {
                        data: 'kemudahan_smp',
                        name: 'kemudahan_smp'
                    },
                    {
                        data: 'jaraktempuh_sma',
                        name: 'jaraktempuh_sma'
                    },
                    {
                        data: 'waktutempuh_sma',
                        name: 'waktutempuh_sma'
                    },
                    {
                        data: 'kemudahan_sma',
                        name: 'kemudahan_sma'
                    },
                    {
                        data: 'jaraktempuh_pt',
                        name: 'jaraktempuh_pt'
                    },
                    {
                        data: 'waktutempuh_pt',
                        name: 'waktutempuh_pt'
                    },
                    {
                        data: 'kemudahan_pt',
                        name: 'kemudahan_pt'
                    },
                    {
                        data: 'jaraktempuh_ps',
                        name: 'jaraktempuh_ps'
                    },
                    {
                        data: 'waktutempuh_ps',
                        name: 'waktutempuh_ps'
                    },
                    {
                        data: 'kemudahan_ps',
                        name: 'kemudahan_ps'
                    },
                    {
                        data: 'jaraktempuh_seminari',
                        name: 'jaraktempuh_seminari'
                    },
                    {
                        data: 'waktutempuh_seminari',
                        name: 'waktutempuh_seminari'
                    },
                    {
                        data: 'kemudahan_seminari',
                        name: 'kemudahan_seminari'
                    },
                    {
                        data: 'jaraktempuh_pagamalain',
                        name: 'jaraktempuh_pagamalain'
                    },
                    {
                        data: 'waktutempuh_pagamalain',
                        name: 'waktutempuh_pagamalain'
                    },
                    {
                        data: 'kemudahan_pagamalain',
                        name: 'kemudahan_pagamalain'
                    },
                ]
            });

            $('#search_nokk').on('keyup', function() {
                $('#tabledataaksespendidikan').DataTable().ajax.reload();
            });
        });
    </script>

    <style>
        .progress-bar {
            background-color: #28a745;
            color: green;
            /* Warna hijau, bisa disesuaikan */
        }
    </style>
@endsection
