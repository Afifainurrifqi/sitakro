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
                            <h2 class="card-title">BENCANA</h2>
                            <div class="form-group">
                                <label for="search_nik">Cari berdasarkan NIK:</label>
                                <input type="text" id="search_nik" class="form-control" placeholder="Masukkan NIK">
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatartbencana">
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
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">TANAH
                                            LONGSOR</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">BANJIR</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">BANJIR
                                            BANDANG</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">GEMPA BUMI
                                        </th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">TSUNAMI
                                        </th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">ANGIN PUYUH
                                            / PUTING BELIUNG / TOPAN</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">GUNUNG
                                            MELETUS</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KEBAKARAN
                                            HUTAN / LAHAN</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KEKERINGAN
                                        </th>
                                    </tr>

                                    <tr>

                                        <th>KEJADIAN</th>
                                        <th>FREKUENSI KEJADIAN</th>
                                        <th>KORBAN JIWA</th>
                                        <th>JUMLAH PENGUNGSI</th>
                                        <th style="border-right: 1px solid #000;">WARGA TERDAMPAK</th>

                                        <th>KEJADIAN</th>
                                        <th>FREKUENSI KEJADIAN</th>
                                        <th>KORBAN JIWA</th>
                                        <th>JUMLAH PENGUNGSI</th>
                                        <th style="border-right: 1px solid #000;">WARGA TERDAMPAK</th>

                                        <th>KEJADIAN</th>
                                        <th>FREKUENSI KEJADIAN</th>
                                        <th>KORBAN JIWA</th>
                                        <th>JUMLAH PENGUNGSI</th>
                                        <th style="border-right: 1px solid #000;">WARGA TERDAMPAK</th>

                                        <th>KEJADIAN</th>
                                        <th>FREKUENSI KEJADIAN</th>
                                        <th>KORBAN JIWA</th>
                                        <th>JUMLAH PENGUNGSI</th>
                                        <th style="border-right: 1px solid #000;">WARGA TERDAMPAK</th>

                                        <th>KEJADIAN</th>
                                        <th>FREKUENSI KEJADIAN</th>
                                        <th>KORBAN JIWA</th>
                                        <th>JUMLAH PENGUNGSI</th>
                                        <th style="border-right: 1px solid #000;">WARGA TERDAMPAK</th>

                                        <th>KEJADIAN</th>
                                        <th>FREKUENSI KEJADIAN</th>
                                        <th>KORBAN JIWA</th>
                                        <th>JUMLAH PENGUNGSI</th>
                                        <th style="border-right: 1px solid #000;">WARGA TERDAMPAK</th>

                                        <th>KEJADIAN</th>
                                        <th>FREKUENSI KEJADIAN</th>
                                        <th>KORBAN JIWA</th>
                                        <th>JUMLAH PENGUNGSI</th>
                                        <th style="border-right: 1px solid #000;">WARGA TERDAMPAK</th>

                                        <th>KEJADIAN</th>
                                        <th>FREKUENSI KEJADIAN</th>
                                        <th>KORBAN JIWA</th>
                                        <th>JUMLAH PENGUNGSI</th>
                                        <th style="border-right: 1px solid #000;">WARGA TERDAMPAK</th>

                                        <th>KEJADIAN</th>
                                        <th>FREKUENSI KEJADIAN</th>
                                        <th>KORBAN JIWA</th>
                                        <th>JUMLAH PENGUNGSI</th>
                                        <th style="border-right: 1px solid #000;">WARGA TERDAMPAK</th>






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
            $('#tabledatartbencana').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
 searching: false,
                ajax: {
                    url: '{!! route('rtbencana.json') !!}',
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
                        data: 'k_longsor',
                        name: 'k_longsor'
                    },
                    {
                        data: 'f_longsor',
                        name: 'f_longsor'
                    },
                    {
                        data: 'kj_longsor',
                        name: 'kj_longsor'
                    },
                    {
                        data: 'jp_longsor',
                        name: 'jp_longsor'
                    },
                    {
                        data: 'wt_longsor',
                        name: 'wt_longsor'
                    },
                    {
                        data: 'k_banjir',
                        name: 'k_banjir'
                    },
                    {
                        data: 'f_banjir',
                        name: 'f_banjir'
                    },
                    {
                        data: 'kj_banjir',
                        name: 'kj_banjir'
                    },
                    {
                        data: 'jp_banjir',
                        name: 'jp_banjir'
                    },
                    {
                        data: 'wt_banjir',
                        name: 'wt_banjir'
                    },
                    {
                        data: 'k_bandang',
                        name: 'k_bandang'
                    },
                    {
                        data: 'f_bandang',
                        name: 'f_bandang'
                    },
                    {
                        data: 'kj_bandang',
                        name: 'kj_bandang'
                    },
                    {
                        data: 'jp_bandang',
                        name: 'jp_bandang'
                    },
                    {
                        data: 'wt_bandang',
                        name: 'wt_bandang'
                    },
                    {
                        data: 'k_gempa',
                        name: 'k_gempa'
                    },
                    {
                        data: 'f_gempa',
                        name: 'f_gempa'
                    },
                    {
                        data: 'kj_gempa',
                        name: 'kj_gempa'
                    },
                    {
                        data: 'jp_gempa',
                        name: 'jp_gempa'
                    },
                    {
                        data: 'wt_gempa',
                        name: 'wt_gempa'
                    },
                    {
                        data: 'k_tsunami',
                        name: 'k_tsunami'
                    },
                    {
                        data: 'f_tsunami',
                        name: 'f_tsunami'
                    },
                    {
                        data: 'kj_tsunami',
                        name: 'kj_tsunami'
                    },
                    {
                        data: 'jp_tsunami',
                        name: 'jp_tsunami'
                    },
                    {
                        data: 'wt_tsunami',
                        name: 'wt_tsunami'
                    },
                    {
                        data: 'k_puyuh',
                        name: 'k_puyuh'
                    },
                    {
                        data: 'f_puyuh',
                        name: 'f_puyuh'
                    },
                    {
                        data: 'kj_puyuh',
                        name: 'kj_puyuh'
                    },
                    {
                        data: 'jp_puyuh',
                        name: 'jp_puyuh'
                    },
                    {
                        data: 'wt_puyuh',
                        name: 'wt_puyuh'
                    },
                    {
                        data: 'k_gunungm',
                        name: 'k_gunungm'
                    },
                    {
                        data: 'f_gunungm',
                        name: 'f_gunungm'
                    },
                    {
                        data: 'kj_gunungm',
                        name: 'kj_gunungm'
                    },
                    {
                        data: 'jp_gunungm',
                        name: 'jp_gunungm'
                    },
                    {
                        data: 'wt_gunungm',
                        name: 'wt_gunungm'
                    },
                    {
                        data: 'k_hutank',
                        name: 'k_hutank'
                    },
                    {
                        data: 'f_hutank',
                        name: 'f_hutank'
                    },
                    {
                        data: 'kj_hutank',
                        name: 'kj_hutank'
                    },
                    {
                        data: 'jp_hutank',
                        name: 'jp_hutank'
                    },
                    {
                        data: 'wt_hutank',
                        name: 'wt_hutank'
                    },
                    {
                        data: 'k_kekeringan',
                        name: 'k_kekeringan'
                    },
                    {
                        data: 'f_kekeringan',
                        name: 'f_kekeringan'
                    },
                    {
                        data: 'kj_kekeringan',
                        name: 'kj_kekeringan'
                    },
                    {
                        data: 'jp_kekeringan',
                        name: 'jp_kekeringan'
                    },
                    {
                        data: 'wt_kekeringan',
                        name: 'wt_kekeringan'
                    },


                ]

            });
            $('#search_nik').on('keyup', function() {
                        $('#tabledatartbencana').DataTable().ajax.reload();
                    });
        });
    </script>
@endsection
