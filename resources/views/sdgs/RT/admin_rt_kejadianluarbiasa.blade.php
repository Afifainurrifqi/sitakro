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
                            <h2 class="card-title">KEJADIAN LUAR BIASA</h2>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatart_kejadianluarbiasa">
                                <thead>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <tr>
                                        <th rowspan="2">Action</th>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">NIK</th>
                                        <th rowspan="2">NAMA KETUA RT</th>
                                        <th rowspan="2">ALAMAT</th>
                                        <th rowspan="2">RT</th>
                                        <th rowspan="2">RW</th>
                                        <th rowspan="2">NO. HP / TELEPON</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            MUNTABER/DIARE</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">DEMAM
                                            BERDARAH</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">CAMPAK
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">MALARIA
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">FLU
                                            BURUNG/SARS</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">COVID-19
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">HEPATITIS
                                            B
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">HEPATITIS
                                            E
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">DIPTERI
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            CHIKUNGUNYA
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            LEPTOSPIROSIS</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KOLERA
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">GIZI BURUK
                                            (MARASMUS KWASHIORKOR)</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">LAINNYA
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>



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
            $('#tabledatart_kejadianluarbiasa').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                searching: true,
                ajax: {
                    url: '{!! route('rt_kejadianluarbiasa.jsonadmin') !!}',
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
                        name: 'action',
                    },
                    {
                        data: null,
                        render: function(data, type, row, meta) {
                            // Menambahkan nomor urut otomatis
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {
                        data: 'nik',
                        name: 'nik',
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                    },
                    {
                        data: 'alamat',
                        name: 'alamat',
                    },
                    {
                        data: 'rt',
                        name: 'rt',
                    },
                    {
                        data: 'rw',
                        name: 'rw',
                    },
                    {
                        data: 'nohp',
                        name: 'nohp',
                    },
                    {
                        data: 'nama_muntaber',
                        name: 'nama_muntaber'
                    },
                    {
                        data: 'jp_muntaber',
                        name: 'jp_muntaber'
                    },
                    {
                        data: 'jm_muntaber',
                        name: 'jm_muntaber'
                    },
                    {
                        data: 'nama_dbd',
                        name: 'nama_dbd'
                    },
                    {
                        data: 'jp_dbd',
                        name: 'jp_dbd'
                    },
                    {
                        data: 'jm_dbd',
                        name: 'jm_dbd'
                    },
                    {
                        data: 'nama_campak',
                        name: 'nama_campak'
                    },
                    {
                        data: 'jp_campak',
                        name: 'jp_campak'
                    },
                    {
                        data: 'jm_campak',
                        name: 'jm_campak'
                    },
                    {
                        data: 'nama_malaria',
                        name: 'nama_malaria'
                    },
                    {
                        data: 'jp_malaria',
                        name: 'jp_malaria'
                    },
                    {
                        data: 'jm_malaria',
                        name: 'jm_malaria'
                    },
                    {
                        data: 'nama_fluburung',
                        name: 'nama_fluburung'
                    },
                    {
                        data: 'jp_fluburung',
                        name: 'jp_fluburung'
                    },
                    {
                        data: 'jm_fluburung',
                        name: 'jm_fluburung'
                    },
                    {
                        data: 'nama_covid19',
                        name: 'nama_covid19'
                    },
                    {
                        data: 'jp_covid19',
                        name: 'jp_covid19'
                    },
                    {
                        data: 'jm_covid19',
                        name: 'jm_covid19'
                    },
                    {
                        data: 'nama_hepatitisb',
                        name: 'nama_hepatitisb'
                    },
                    {
                        data: 'jp_hepatitisb',
                        name: 'jp_hepatitisb'
                    },
                    {
                        data: 'jm_hepatitisb',
                        name: 'jm_hepatitisb'
                    },
                    {
                        data: 'nama_hepatitise',
                        name: 'nama_hepatitise'
                    },
                    {
                        data: 'jp_hepatitise',
                        name: 'jp_hepatitise'
                    },
                    {
                        data: 'jm_hepatitise',
                        name: 'jm_hepatitise'
                    },
                    {
                        data: 'nama_dipteri',
                        name: 'nama_dipteri'
                    },
                    {
                        data: 'jp_dipteri',
                        name: 'jp_dipteri'
                    },
                    {
                        data: 'jm_dipteri',
                        name: 'jm_dipteri'
                    },
                    {
                        data: 'nama_chikung',
                        name: 'nama_chikung'
                    },
                    {
                        data: 'jp_chikung',
                        name: 'jp_chikung'
                    },
                    {
                        data: 'jm_chikung',
                        name: 'jm_chikung'
                    },
                    {
                        data: 'nama_leptos',
                        name: 'nama_leptos'
                    },
                    {
                        data: 'jp_leptos',
                        name: 'jp_leptos'
                    },
                    {
                        data: 'jm_leptos',
                        name: 'jm_leptos'
                    },
                    {
                        data: 'nama_kolera',
                        name: 'nama_kolera'
                    },
                    {
                        data: 'jp_kolera',
                        name: 'jp_kolera'
                    },
                    {
                        data: 'jm_kolera',
                        name: 'jm_kolera'
                    },
                    {
                        data: 'nama_giziburuk',
                        name: 'nama_giziburuk'
                    },
                    {
                        data: 'jp_giziburuk',
                        name: 'jp_giziburuk'
                    },
                    {
                        data: 'jm_giziburuk',
                        name: 'jm_giziburuk'
                    },
                    {
                        data: 'nama_lainnya',
                        name: 'nama_lainnya'
                    },
                    {
                        data: 'jp_lainnya',
                        name: 'jp_lainnya'
                    },
                    {
                        data: 'jm_lainnya',
                        name: 'jm_lainnya'
                    },

                ]

            });
            $('#search_nokk').on('keyup', function() {
                $('#tabledatart_kejadianluarbiasa').DataTable().ajax.reload();
            });
        });
    </script>
@endsection
