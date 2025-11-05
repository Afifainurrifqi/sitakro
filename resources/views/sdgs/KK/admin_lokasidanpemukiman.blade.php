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
                            <h2 class="card-title">LOKASI DAN PEMUKIMAN</h2>
                        </div>
                        <form action="{{ route('lokasipemukiman.import') }}" method="POST" enctype="multipart/form-data"
                            class="mb-3">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="file" name="file" class="form-control" required>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-upload"></i> Import Excel
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="col-md-6 text-end">
                            <a href="{{ route('lokasipemukiman.export') }}" class="btn btn-success">
                                <i class="fa fa-file-excel-o"></i> Export Seluruh Data (Excel)
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatalokasidanpemukiman">
                                <thead>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <tr>
                                        <th rowspan="2">Action</th>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">NO KK</th>
                                        <th rowspan="2">NIK</th>
                                        <th rowspan="2">NAMA</th>
                                        <th rowspan="2">ALAMAT</th>
                                        <th rowspan="2">NO. HP</th>
                                        <th rowspan="2">NO. Telpon Rumah</th>
                                        <th rowspan="2">NIK Kepala Keluarga</th>
                                        <th rowspan="2">TEMPAT TINGGAL YANG DITEMPATI</th>
                                        <th rowspan="2">STATUS LAHAN</th>
                                        <th rowspan="2">LUAS LANTAI TEMPAT TINGGAL (m2)</th>
                                        <th rowspan="2">LUAS TANAH TEMPAT TINGGAL (m2)</th>
                                        <th rowspan="2">JENIS LANTAI TEMPAT TINGGAL TERLUAS</th>
                                        <th rowspan="2">DINDING SEBAGIAN BESAR RUMAH</th>
                                        <th rowspan="2">JENDELA</th>
                                        <th rowspan="2">ATAP</th>
                                        <th rowspan="2">PENERANGAN RUMAH</th>
                                        <th rowspan="2">ENERGI UNTUK MEMASAK</th>
                                        <th rowspan="2">JIKA MENGGUNAKAN KAYU BAKAR, SUMBER KAYU BAKAR</th>
                                        <th rowspan="2">TEMPAT PEMBUANGAN SAMPAH</th>
                                        <th rowspan="2">FASILITAS MCK</th>
                                        <th rowspan="2">SUMBER AIR MANDI TERBANYAK DARI</th>
                                        <th rowspan="2">FASILITAS BUANG AIR BESAR</th>
                                        <th rowspan="2">SUMBER AIR MINUM TERBANYAK</th>
                                        <th rowspan="2">TEMPAT PEMBUANGAN AIR LIMBAH</th>
                                        <th rowspan="2">RUMAH DILEWATI SUTET</th>
                                        <th rowspan="2">RUMAH DIPANTARAN SUNGAI</th>
                                        <th rowspan="2">RUMAH DI LERENG GUNUNG / BUKIT</th>
                                        <th rowspan="2">KONDISI RUMAH KUMUH / TIDAK</th>

                                        <!-- Kolom PAUD, TK, SD, SMP, dll tetap seperti yang ada -->
                                        <!-- Disesuaikan dengan kolom yang ada di tabel -->
                                        <!-- .. semua lainnya -->
                                    </tr>
                                    <tr>
                                        <th>JARAK TEMPUH (KM)</th>
                                        <th>WAKTU TEMPUH (JAM)</th>
                                        <th style="border-right: 1px solid #000;">KEMUDAHAN</th>
                                        <!-- Kolom yang lain juga tetap -->
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
            $('#tabledatalokasidanpemukiman').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                searching: true,
                // dom: 'Bfrtip',
                ajax: {
                    url: '{!! route('lokasidanpemukiman.jsonadmin') !!}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(d) {
                        d.nik = $('#search_nokk').val(); // Pass the NIK input value
                    }
                },
                "buttons": [{
                    "extend": 'excel',
                    "text": '<button class="btn"><i class="fa fa-file-excel-o" style="color: green;"></i>  EXPORT EXCEL</button>',
                    "titleAttr": 'Excel',
                    "action": newexportaction
                }],
                columns: [{
                        data: 'action',
                        name: 'action'
                    },
                    {
                        data: null,
                        render: function(data, type, row, meta) {
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
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'nohp',
                        name: 'nohp'
                    },
                    {
                        data: 'nowa',
                        name: 'nowa'
                    },
                    {
                        data: 'nik_kepala',
                        name: 'nik_kepala'
                    },
                    {
                        data: 'tempat_tinggal',
                        name: 'tempat_tinggal'
                    },
                    {
                        data: 'status_lahan',
                        name: 'status_lahan'
                    },
                    {
                        data: 'luas_lantai_tinggal',
                        name: 'luas_lantai_tinggal'
                    },
                    {
                        data: 'luas_tanah_tinggal',
                        name: 'luas_tanah_tinggal'
                    },
                    {
                        data: 'jenis_lantai_tinggal',
                        name: 'jenis_lantai_tinggal'
                    },
                    {
                        data: 'dinding_sebagian',
                        name: 'dinding_sebagian'
                    },
                    {
                        data: 'jendela',
                        name: 'jendela'
                    },
                    {
                        data: 'atap',
                        name: 'atap'
                    },
                    {
                        data: 'penerangan',
                        name: 'penerangan'
                    },
                    {
                        data: 'energi_masak',
                        name: 'energi_masak'
                    },
                    {
                        data: 'jika_kayu_jenis',
                        name: 'jika_kayu_jenis'
                    },
                    {
                        data: 'tempat_sampah',
                        name: 'tempat_sampah'
                    },
                    {
                        data: 'mck',
                        name: 'mck'
                    },
                    {
                        data: 'sumber_air_mandi',
                        name: 'sumber_air_mandi'
                    },
                    {
                        data: 'sumber_air_mck',
                        name: 'sumber_air_mck'
                    },
                    {
                        data: 'sumber_air_minum',
                        name: 'sumber_air_minum'
                    },
                    {
                        data: 'tempat_pembuangan_limbah',
                        name: 'tempat_pembuangan_limbah'
                    },
                    {
                        data: 'rumah_sungai',
                        name: 'rumah_sungai'
                    },
                    {
                        data: 'rumah_sutet',
                        name: 'rumah_sutet'
                    },
                    {
                        data: 'rumah_lereng_gunung',
                        name: 'rumah_lereng_gunung'
                    },
                    {
                        data: 'kondi_rumah_kumuh',
                        name: 'kondi_rumah_kumuh'
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
                    // Kolom lainnya tetap
                ]
            });

            $('#search_nokk').on('keyup', function() {
                $('#tabledatalokasidanpemukiman').DataTable().ajax.reload();
            });

            function newexportaction(e, dt, button, config) {
                var self = this;
                var oldStart = dt.settings()[0]._iDisplayStart;
                dt.one('preXhr', function(e, s, data) {
                    data.start = 0;
                    data.length = 2147483647; // Ambil semua data
                    dt.one('preDraw', function(e, settings) {
                        if (button[0].className.indexOf('buttons-excel') >= 0) {
                            $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button,
                                config);
                        }
                        dt.one('preXhr', function(e, s, data) {
                            settings._iDisplayStart = oldStart;
                            data.start = oldStart;
                        });
                        setTimeout(dt.ajax.reload, 0);
                        return false;
                    });
                });
                dt.ajax.reload();
            }
        });
    </script>

    <style>
        .progress-bar {
            background-color: #28a745;
            color: green;
        }
    </style>
@endsection
