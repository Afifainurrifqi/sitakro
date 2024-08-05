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
                            <h2 class="card-title">INFRASTUKTUR</h2>
                            <div class="form-group">
                                <label for="search_nik">Cari berdasarkan NIK:</label>
                                <input type="text" id="search_nik" class="form-control" placeholder="Masukkan NIK">
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatartinfrastuktur">
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
                                        <th rowspan="2">PENERANGAN DI JALAN</th>
                                        <th rowspan="2">PRASARANA TRANSPORTASI ANTAR RT</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PANJANG
                                            JALAN (KM)</th>
                                        <th rowspan="2">JALAN DARAT DAPAT DILALUI KENDARAAN BERMOTOR RODA 4 ATAU LEBIH
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KEBERADAAN
                                            ANGKUTAN UMUM</th>
                                        <th rowspan="2">DERMAGA LAUT / SUNGAI</th>
                                        <th colspan="8"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SINYAL HP
                                        </th>
                                        <th rowspan="2">KANTOR POS PEMBANTU</th>
                                        <th rowspan="2">LAYANAN POS KELILING</th>
                                        <th rowspan="2">PERUSAHAAN / AGEN JASA EKSPEDISI SWASTA</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SIARAN TVRI
                                        </th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SIARAN TVRI
                                            DAERAH</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SIARAN TV
                                            SWASTA</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SIARAN TV
                                            LUAR NEGERI</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SIARAN RRI
                                        </th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SIARAN RRI
                                            DAERAH</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SIARAN
                                            RADIO SWASTA</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SIARAN
                                            RADIO KOMUNITAS</th>
                                        <th rowspan="2">JUMLAH LOKASI PEMUKIMAN LIAR</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">JUMLAH
                                            FASILITAS UMUM YANG DITINGGALI PENDUDUK</th>
                                        <th colspan="7"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">JUMLAH
                                            LOKASI PEMUKIMAN KHUSUS</th>
                                    </tr>


                                    <tr>
                                        <th>JALAN ASPAL</th>
                                        <th>JALAN MAKADAM/TELFORD</th>
                                        <th>JALAN TANAH</th>
                                        <th>JALAN PAPAN DI ATAS AIR</th>
                                        <th>JALAN SETAPAK</th>
                                        <th style="border-right: 1px solid #000;">JALAN LAINNYA</th>

                                        <th>Trayek Angkutan Umum</th>
                                        <th>Operasional Angkutan Umum</th>
                                        <th style="border-right: 1px solid #000;">Jam Operasional Angkutan Umum</th>

                                        <th>JUMLAH MENARA BTS</th>
                                        <th>TELKOMSEL</th>
                                        <th>INDOSAT</th>
                                        <th>XL/AXIS</th>
                                        <th>HUTCHISON 3</th>
                                        <th>PSN by RU</th>
                                        <th>SMARTFREN</th>
                                        <th style="border-right: 1px solid #000;">BAKRIE TELCOM</th>

                                        <th>CHANEL DAPAT DITERIMA ATAU TIDAK</th>
                                        <th style="border-right: 1px solid #000;">PERLU PARABOLA</th>

                                        <th>CHANEL DAPAT DITERIMA ATAU TIDAK</th>
                                        <th style="border-right: 1px solid #000;">PERLU PARABOLA</th>

                                        <th>CHANEL DAPAT DITERIMA ATAU TIDAK</th>
                                        <th style="border-right: 1px solid #000;">PERLU PARABOLA</th>

                                        <th>CHANEL DAPAT DITERIMA ATAU TIDAK</th>
                                        <th style="border-right: 1px solid #000;">PERLU PARABOLA</th>

                                        <th>CHANEL DAPAT DITERIMA ATAU TIDAK</th>
                                        <th style="border-right: 1px solid #000;">PERLU PARABOLA</th>

                                        <th>CHANEL DAPAT DITERIMA ATAU TIDAK</th>
                                        <th style="border-right: 1px solid #000;">PERLU PARABOLA</th>

                                        <th>CHANEL DAPAT DITERIMA ATAU TIDAK</th>
                                        <th style="border-right: 1px solid #000;">PERLU PARABOLA</th>

                                        <th>CHANEL DAPAT DITERIMA ATAU TIDAK</th>
                                        <th style="border-right: 1px solid #000;">PERLU PARABOLA</th>





                                        <th>PASAR</th>
                                        <th>STASIUN</th>
                                        <th>TERMINAL</th>
                                        <th>KOLONG JEMBATAN</th>
                                        <th style="border-right: 1px solid #000;">PELABUHAN</th>


                                        <th>PERUMAHAN MEWAH</th>
                                        <th>APARTEMEN</th>
                                        <th>RUMAH SUSUN</th>
                                        <th>BOARDING SCHOOL</th>
                                        <th>KOS-KOSAN</th>
                                        <th>ASRAMA/BARAK MILITER</th>
                                        <th style="border-right: 1px solid #000;">LP/RUTAN</th>


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
            $('#tabledatartinfrastuktur').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
 searching: false,
                ajax: {
                    url: '{!! route('rtinfrastuktur.json') !!}',
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
                        data: 'penerangan_jalan',
                        name: 'penerangan_jalan',
                    },
                    {
                        data: 'pra_transportrt',
                        name: 'pra_transportrt',
                    },
                    {
                        data: 'jalan_aspal',
                        name: 'jalan_aspal',
                    },
                    {
                        data: 'jalan_makadam',
                        name: 'jalan_makadam',
                    },
                    {
                        data: 'jalan_tanah',
                        name: 'jalan_tanah',
                    },
                    {
                        data: 'jalan_papan_atasaair',
                        name: 'jalan_papan_atasaair',
                    },
                    {
                        data: 'jalan_setapak',
                        name: 'jalan_setapak',
                    },
                    {
                        data: 'jalan_lainnya',
                        name: 'jalan_lainnya',
                    },
                    {
                        data: 'jalan_darat_roda4',
                        name: 'jalan_darat_roda4',
                    },
                    {
                        data: 'angkutanumum_trayek',
                        name: 'angkutanumum_trayek',
                    },
                    {
                        data: 'angkutanumum_opra',
                        name: 'angkutanumum_opra',
                    },
                    {
                        data: 'angkutanumum_jamopra',
                        name: 'angkutanumum_jamopra',
                    },
                    {
                        data: 'dermaga_laut',
                        name: 'dermaga_laut',
                    },
                    {
                        data: 'sinyalhp_bts',
                        name: 'sinyalhp_bts',
                    },
                    {
                        data: 'sinyalhp_telkom',
                        name: 'sinyalhp_telkom',
                    },
                    {
                        data: 'sinyalhp_indo',
                        name: 'sinyalhp_indo',
                    },
                    {
                        data: 'sinyalhp_xl',
                        name: 'sinyalhp_xl',
                    },
                    {
                        data: 'sinyalhp_hut',
                        name: 'sinyalhp_hut',
                    },
                    {
                        data: 'sinyalhp_psn',
                        name: 'sinyalhp_psn',
                    },
                    {
                        data: 'sinyalhp_smart',
                        name: 'sinyalhp_smart',
                    },
                    {
                        data: 'sinyalhp_bakrie',
                        name: 'sinyalhp_bakrie',
                    },
                    {
                        data: 'pos_pembantu',
                        name: 'pos_pembantu',
                    },
                    {
                        data: 'pos_keliling',
                        name: 'pos_keliling',
                    },
                    {
                        data: 'agen_jasa',
                        name: 'agen_jasa',
                    },
                    {
                        data: 'chanel_tvri',
                        name: 'chanel_tvri',
                    },
                    {
                        data: 'parabola_tvri',
                        name: 'parabola_tvri',
                    },
                    {
                        data: 'chanel_tvrid',
                        name: 'chanel_tvrid',
                    },
                    {
                        data: 'parabola_tvrid',
                        name: 'parabola_tvrid',
                    },
                    {
                        data: 'chanel_s',
                        name: 'chanel_s',
                    },
                    {
                        data: 'parabola_s',
                        name: 'parabola_s',
                    },
                    {
                        data: 'chanel_ln',
                        name: 'chanel_ln',
                    },
                    {
                        data: 'parabola_ln',
                        name: 'parabola_ln',
                    },
                    {
                        data: 'chanel_rri',
                        name: 'chanel_rri',
                    },
                    {
                        data: 'parabola_rri',
                        name: 'parabola_rri',
                    },
                    {
                        data: 'chanel_rrid',
                        name: 'chanel_rrid',
                    },
                    {
                        data: 'parabola_rrid',
                        name: 'parabola_rrid',
                    },
                    {
                        data: 'chanel_radios',
                        name: 'chanel_radios',
                    },
                    {
                        data: 'parabola_radios',
                        name: 'parabola_radios',
                    },
                    {
                        data: 'chanel_radiok',
                        name: 'chanel_radiok',
                    },
                    {
                        data: 'parabola_radiok',
                        name: 'parabola_radiok',
                    },
                    {
                        data: 'jumlah_lokasi_air',
                        name: 'jumlah_lokasi_air',
                    },
                    {
                        data: 'fasilitas_umump_pasar',
                        name: 'fasilitas_umump_pasar',
                    },
                    {
                        data: 'fasilitas_umump_stasiun',
                        name: 'fasilitas_umump_stasiun',
                    },
                    {
                        data: 'fasilitas_umump_terminal',
                        name: 'fasilitas_umump_terminal',
                    },
                    {
                        data: 'fasilitas_umump_kolong',
                        name: 'fasilitas_umump_kolong',
                    },
                    {
                        data: 'fasilitas_umump_pelabuhan',
                        name: 'fasilitas_umump_pelabuhan',
                    },
                    {
                        data: 'pemukiman_khusus_mewah',
                        name: 'pemukiman_khusus_mewah',
                    },
                    {
                        data: 'pemukiman_khusus_apart',
                        name: 'pemukiman_khusus_apart',
                    },
                    {
                        data: 'pemukiman_khusus_susun',
                        name: 'pemukiman_khusus_susun',
                    },
                    {
                        data: 'pemukiman_khusus_school',
                        name: 'pemukiman_khusus_school',
                    },
                    {
                        data: 'pemukiman_khusus_kos',
                        name: 'pemukiman_khusus_kos',
                    },
                    {
                        data: 'pemukiman_khusus_asrama',
                        name: 'pemukiman_khusus_asrama',
                    },
                    {
                        data: 'pemukiman_khusus_lp',
                        name: 'pemukiman_khusus_lp',
                    },


                ]

            });
            $('#search_nik').on('keyup', function() {
                        $('#tabledatartinfrastuktur').DataTable().ajax.reload();
                    });
        });
    </script>
@endsection
