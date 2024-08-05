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
                            <h2 class="card-title">INDUSTRI</h2>
                            <div class="form-group">
                                <label for="search_nik">Cari berdasarkan NIK:</label>
                                <input type="text" id="search_nik" class="form-control" placeholder="Masukkan NIK">
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatartindustri">
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
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">Industri
                                            Barang dari Kulit (Tas, Sepatu, Sandal, dll)</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">Industri
                                            Barang dari Kayu (Meja, Kursi, Lemari, dll)</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">Industri
                                            Barang dari Logam Mulia atau bahan Logam (Perabot, Perhiasan, dll)</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">Industri
                                            Logam Berat</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">Industri
                                            Barang dari Kain (Tenun, Konveksi, dll)</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">Industri
                                            gerabah/keramik/batu (porselen, keramik, tegel, dll)</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">Industri
                                            Genteng dan Batu Bata</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">Industri
                                            Anyaman dari Rotan / Bambu / Rumput / Pandan, dll</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">Industri
                                            makanan dan minuman</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">Industri
                                            lainnya, tuliskan di bawah</th>
                                    </tr>


                                    <tr>
                                        <th>JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA</th>
                                        <th>JUMLAH INDUSTRI SEDANG DAN BESAR</th>
                                        <th>JUMLAH MANAJEMEN</th>
                                        <th tyle="border-right: 1px solid #000;">JUMLAH PEKERJA</th>

                                        <th>JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA</th>
                                        <th>JUMLAH INDUSTRI SEDANG DAN BESAR</th>
                                        <th>JUMLAH MANAJEMEN</th>
                                        <th tyle="border-right: 1px solid #000;">JUMLAH PEKERJA</th>

                                        <th>JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA</th>
                                        <th>JUMLAH INDUSTRI SEDANG DAN BESAR</th>
                                        <th>JUMLAH MANAJEMEN</th>
                                        <th tyle="border-right: 1px solid #000;">JUMLAH PEKERJA</th>

                                        <th>JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA</th>
                                        <th>JUMLAH INDUSTRI SEDANG DAN BESAR</th>
                                        <th>JUMLAH MANAJEMEN</th>
                                        <th tyle="border-right: 1px solid #000;">JUMLAH PEKERJA</th>

                                        <th>JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA</th>
                                        <th>JUMLAH INDUSTRI SEDANG DAN BESAR</th>
                                        <th>JUMLAH MANAJEMEN</th>
                                        <th tyle="border-right: 1px solid #000;">JUMLAH PEKERJA</th>

                                        <th>JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA</th>
                                        <th>JUMLAH INDUSTRI SEDANG DAN BESAR</th>
                                        <th>JUMLAH MANAJEMEN</th>
                                        <th tyle="border-right: 1px solid #000;">JUMLAH PEKERJA</th>

                                        <th>JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA</th>
                                        <th>JUMLAH INDUSTRI SEDANG DAN BESAR</th>
                                        <th>JUMLAH MANAJEMEN</th>
                                        <th tyle="border-right: 1px solid #000;">JUMLAH PEKERJA</th>

                                        <th>JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA</th>
                                        <th>JUMLAH INDUSTRI SEDANG DAN BESAR</th>
                                        <th>JUMLAH MANAJEMEN</th>
                                        <th tyle="border-right: 1px solid #000;">JUMLAH PEKERJA</th>

                                        <th>JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA</th>
                                        <th>JUMLAH INDUSTRI SEDANG DAN BESAR</th>
                                        <th>JUMLAH MANAJEMEN</th>
                                        <th tyle="border-right: 1px solid #000;">JUMLAH PEKERJA</th>

                                        <th>JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA</th>
                                        <th>JUMLAH INDUSTRI SEDANG DAN BESAR</th>
                                        <th>JUMLAH MANAJEMEN</th>
                                        <th tyle="border-right: 1px solid #000;">JUMLAH PEKERJA</th>

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
            $('#tabledatartindustri').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
 searching: false,
                ajax: {
                    url: '{!! route('rtindustri.json') !!}',
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
                        data: 'jumlahindustrik_kulit',
                        name: 'jumlahindustrik_kulit',
                    },
                    {
                        data: 'jumlahindustris_kulit',
                        name: 'jumlahindustris_kulit',
                    },
                    {
                        data: 'jumlahmanajemen_kulit',
                        name: 'jumlahmanajemen_kulit',
                    },
                    {
                        data: 'jumlahpekerja_kulit',
                        name: 'jumlahpekerja_kulit',
                    },
                    {
                        data: 'jumlahindustrik_kayu',
                        name: 'jumlahindustrik_kayu',
                    },
                    {
                        data: 'jumlahindustris_kayu',
                        name: 'jumlahindustris_kayu',
                    },
                    {
                        data: 'jumlahmanajemen_kayu',
                        name: 'jumlahmanajemen_kayu',
                    },
                    {
                        data: 'jumlahpekerja_kayu',
                        name: 'jumlahpekerja_kayu',
                    },
                    {
                        data: 'jumlahindustrik_logam',
                        name: 'jumlahindustrik_logam',
                    },
                    {
                        data: 'jumlahindustris_logam',
                        name: 'jumlahindustris_logam',
                    },
                    {
                        data: 'jumlahmanajemen_logam',
                        name: 'jumlahmanajemen_logam',
                    },
                    {
                        data: 'jumlahpekerja_logam',
                        name: 'jumlahpekerja_logam',
                    },
                    {
                        data: 'jumlahindustrik_logamb',
                        name: 'jumlahindustrik_logamb',
                    },
                    {
                        data: 'jumlahindustris_logamb',
                        name: 'jumlahindustris_logamb',
                    },
                    {
                        data: 'jumlahmanajemen_logamb',
                        name: 'jumlahmanajemen_logamb',
                    },
                    {
                        data: 'jumlahpekerja_logamb',
                        name: 'jumlahpekerja_logamb',
                    },
                    {
                        data: 'jumlahindustrik_kain',
                        name: 'jumlahindustrik_kain',
                    },
                    {
                        data: 'jumlahindustris_kain',
                        name: 'jumlahindustris_kain',
                    },
                    {
                        data: 'jumlahmanajemen_kain',
                        name: 'jumlahmanajemen_kain',
                    },
                    {
                        data: 'jumlahpekerja_kain',
                        name: 'jumlahpekerja_kain',
                    },
                    {
                        data: 'jumlahindustrik_keramik',
                        name: 'jumlahindustrik_keramik',
                    },
                    {
                        data: 'jumlahindustris_keramik',
                        name: 'jumlahindustris_keramik',
                    },
                    {
                        data: 'jumlahmanajemen_keramik',
                        name: 'jumlahmanajemen_keramik',
                    },
                    {
                        data: 'jumlahpekerja_keramik',
                        name: 'jumlahpekerja_keramik',
                    },
                    {
                        data: 'jumlahindustrik_genteng',
                        name: 'jumlahindustrik_genteng',
                    },
                    {
                        data: 'jumlahindustris_genteng',
                        name: 'jumlahindustris_genteng',
                    },
                    {
                        data: 'jumlahmanajemen_genteng',
                        name: 'jumlahmanajemen_genteng',
                    },
                    {
                        data: 'jumlahpekerja_genteng',
                        name: 'jumlahpekerja_genteng',
                    },
                    {
                        data: 'jumlahindustrik_anyaman',
                        name: 'jumlahindustrik_anyaman',
                    },
                    {
                        data: 'jumlahindustris_anyaman',
                        name: 'jumlahindustris_anyaman',
                    },
                    {
                        data: 'jumlahmanajemen_anyaman',
                        name: 'jumlahmanajemen_anyaman',
                    },
                    {
                        data: 'jumlahpekerja_anyaman',
                        name: 'jumlahpekerja_anyaman',
                    },
                    {
                        data: 'jumlahindustrik_makanan',
                        name: 'jumlahindustrik_makanan',
                    },
                    {
                        data: 'jumlahindustris_makanan',
                        name: 'jumlahindustris_makanan',
                    },
                    {
                        data: 'jumlahmanajemen_makanan',
                        name: 'jumlahmanajemen_makanan',
                    },
                    {
                        data: 'jumlahpekerja_makanan',
                        name: 'jumlahpekerja_makanan',
                    },
                    {
                        data: 'jumlahindustrik_lainnya',
                        name: 'jumlahindustrik_lainnya',
                    },
                    {
                        data: 'jumlahindustris_lainnya',
                        name: 'jumlahindustris_lainnya',
                    },
                    {
                        data: 'jumlahmanajemen_lainnya',
                        name: 'jumlahmanajemen_lainnya',
                    },
                    {
                        data: 'jumlahpekerja_lainnya',
                        name: 'jumlahpekerja_lainnya',
                    },


                ]

            });

            $('#search_nik').on('keyup', function() {
                        $('#tabledatartindustri').DataTable().ajax.reload();
                    });
        });
    </script>
@endsection
