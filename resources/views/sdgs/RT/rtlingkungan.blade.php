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
                            <h2 class="card-title">LINGKUNGAN</h2>
                            <div class="form-group">
                                <label for="search_nik">Cari berdasarkan NIK:</label>
                                <input type="text" id="search_nik" class="form-control" placeholder="Masukkan NIK">
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatartlingkungan">
                                <thead>
                                    <tr>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <th rowspan="2">Action</th>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">NIK</th>
                                        <th rowspan="2">NAMA KETUA RT</th>
                                        <th rowspan="2">ALAMAT</th>
                                        <th rowspan="2">RT</th>
                                        <th rowspan="2">RW</th>
                                        <th rowspan="2">NO. HP / TELEPON</th>
                                        <th rowspan="2">LAHAN SAWAH IRIGASI (Ha)</th>
                                        <th rowspan="2">LAHAN SAWAH NON IRIGASI (Ha)</th>
                                        <th rowspan="2">KEBUN (Ha)</th>
                                        <th rowspan="2">HUMA / LADANG (Ha)</th>
                                        <th rowspan="2">TAMBAK (Ha)</th>
                                        <th rowspan="2">KOLAM / TEBAT / EMPANG (Ha)</th>
                                        <th rowspan="2">LAHAN GEMBALA TERNAK (Ha)</th>
                                        <th rowspan="2">LAHAN PERUSAHAAN PERKEBUNAN (Ha)</th>
                                        <th rowspan="2">AREA HUTAN (Ha)</th>
                                        <th rowspan="2">LAHAN PERTANIAN NON SAWAH LAINNYA (Ha)</th>
                                        <th rowspan="2">LAHAN PERTAMBANGAN (Ha)</th>
                                        <th rowspan="2">LAHAN PERUMAHAN (Ha)</th>
                                        <th rowspan="2">LAHAN PERKANTORAN (Ha)</th>
                                        <th rowspan="2">LAHAN INDUSTRI (Ha)</th>
                                        <th rowspan="2">FASILITAS UMUM (Lapangan, Jalan, dll) (Ha)</th>
                                        <th rowspan="2">LAHAN LAINNYA (Ha)</th>
                                        <th rowspan="2">NAMA SUNGAI YANG MELINTASI</th>
                                        <th rowspan="2">NAMA DANAU / WADUK / SITU</th>
                                        <th rowspan="2">JUMLAH MATA AIR</th>
                                        <th rowspan="2">JUMLAH EMBUNG</th>
                                        <th rowspan="2">KETERSEDIAAN SUMUR BOR</th>
                                        <th rowspan="2">KONDISI SUNGAI</th>
                                        <th rowspan="2">KONDISI IRIGASI</th>
                                        <th rowspan="2">KONDISI DANAU</th>
                                        <th rowspan="2">KONDISI EMBUNG</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PENCEMARAN
                                            1 TAHUN TERAKHIR</th>
                                        <th rowspan="2">PENGOLAHAN / DAUR ULANG SAMPAH / LIMBAH</th>
                                        <th rowspan="2">KEBIASAAN MASYARAKAT MEMBAKAR LADANG UNTUK PROSES USAHA PERTANIAN
                                        </th>
                                        <th rowspan="2">KEBERADAAN LOKASI PENGGALIAN GOLONGAN C</th>
                                    </tr>

                                    <tr>
                                        <th>AIR</th>
                                        <th>TANAH</th>
                                        <th style="border-right: 1px solid #000;">UDARA</th>
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
            $('#tabledatartlingkungan').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
 searching: false,
                ajax: {
                    url: '{!! route('rtlingkungan.json') !!}',
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
                        data: 'lingkungan_lsi',
                        name: 'lingkungan_lsi',
                    },
                    {
                        data: 'lingkungan_slno',
                        name: 'lingkungan_slno',
                    },
                    {
                        data: 'lingkungan_k',
                        name: 'lingkungan_k',
                    },
                    {
                        data: 'lingkungan_hl',
                        name: 'lingkungan_hl',
                    },
                    {
                        data: 'lingkungan_t',
                        name: 'lingkungan_t',
                    },
                    {
                        data: 'lingkungan_kte',
                        name: 'lingkungan_kte',
                    },
                    {
                        data: 'lingkungan_lgt',
                        name: 'lingkungan_lgt',
                    },
                    {
                        data: 'lingkungan_lpp',
                        name: 'lingkungan_lpp',
                    },
                    {
                        data: 'lingkungan_ah',
                        name: 'lingkungan_ah',
                    },
                    {
                        data: 'lingkungan_lpns',
                        name: 'lingkungan_lpns',
                    },
                    {
                        data: 'lingkungan_lpertambangan',
                        name: 'lingkungan_lpertambangan',
                    },
                    {
                        data: 'lingkungan_lperumahan',
                        name: 'lingkungan_lperumahan',
                    },
                    {
                        data: 'lingkungan_lperkantoran',
                        name: 'lingkungan_lperkantoran',
                    },
                    {
                        data: 'lingkungan_lindustri',
                        name: 'lingkungan_lindustri',
                    },
                    {
                        data: 'lingkungan_fu',
                        name: 'lingkungan_fu',
                    },
                    {
                        data: 'lingkungan_ll',
                        name: 'lingkungan_ll',
                    },
                    {
                        data: 'lingkungan_nsym',
                        name: 'lingkungan_nsym',
                    },
                    {
                        data: 'lingkungan_ndws',
                        name: 'lingkungan_ndws',
                    },
                    {
                        data: 'lingkungan_jma',
                        name: 'lingkungan_jma',
                    },
                    {
                        data: 'lingkungan_je',
                        name: 'lingkungan_je',
                    },
                    {
                        data: 'lingkungan_ksb',
                        name: 'lingkungan_ksb',
                    },
                    {
                        data: 'lingkungan_ks',
                        name: 'lingkungan_ks',
                    },
                    {
                        data: 'lingkungan_ki',
                        name: 'lingkungan_ki',
                    },
                    {
                        data: 'lingkungan_kd',
                        name: 'lingkungan_kd',
                    },
                    {
                        data: 'lingkungan_ke',
                        name: 'lingkungan_ke',
                    },
                    {
                        data: 'lingkungan_pair',
                        name: 'lingkungan_pair',
                    },
                    {
                        data: 'lingkungan_ptanah',
                        name: 'lingkungan_ptanah',
                    },
                    {
                        data: 'lingkungan_pudara',
                        name: 'lingkungan_pudara',
                    },
                    {
                        data: 'lingkungan_pdusl',
                        name: 'lingkungan_pdusl',
                    },
                    {
                        data: 'lingkungan_kmml',
                        name: 'lingkungan_kmml',
                    },
                    {
                        data: 'lingkungan_klpg',
                        name: 'lingkungan_klpg',
                    },


                ]

            });

            $('#search_nik').on('keyup', function() {
                        $('#tabledatartlingkungan').DataTable().ajax.reload();
                    });
        });
    </script>
@endsection
