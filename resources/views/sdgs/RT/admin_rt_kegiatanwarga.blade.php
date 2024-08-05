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
                            <h2 class="card-title">KEGIATAN WARGA UNTUK MENJAGA KEAMANAN LINGKUNGAN SELAMA SATU TAHUN
                                TERAKHIR</h2>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatartkegiatanwarga">
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
                                        <th rowspan="2">JUMLAH KEGIATAN PEMBANGUNAN / PEMELIHARAAN POSKAMLING</th>
                                        <th rowspan="2">JUMLAH KEGIATAN PEMBENTUKAN / PENGATURAN REGU KEAMANAN</th>
                                        <th rowspan="2">JUMLAH ANGGOTA HANSIP / LINMAS YANG DITAMBAHKAN</th>
                                        <th rowspan="2">PELAPORAN TAMU YANG MENGINAP LEBIH DARI 24 JAM KE APARAT
                                            LINGKUNGAN</th>
                                        <th rowspan="2">PENGAKTIFAN SISTEM KEAMANAN LINGKUNGAN BERASAL DARI INISIATIF
                                            WARGA</th>
                                        <th rowspan="2">JUMLAH ANGGOTA LINMAS ATAU HANSIP</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">JUMLAH POS
                                            POLISI</th>
                                        <th rowspan="2">JARAK KE POS POLISI TERDEKAT</th>
                                        <th rowspan="2">KEMUDAHAN UNTUK MENCAPAI POS POLISI</th>
                                        <th rowspan="2">JUMLAH KORBAN (TERMASUK PERCOBAAN) BUNUH DIRI</th>
                                        <th rowspan="2">JUMLAH LOKASI BERKUMPUL / MANGKAL ANAK JALANAN</th>
                                        <th rowspan="2">JUMLAH TEMPAT MANGKAL GELANDANGAN / PENGEMIS</th>
                                        <th rowspan="2">JUMLAH LOKALISASI / LOKASI / TEMPAT MANGKAL PEKERJA SEKS
                                            KOMERSIAL (PSK)</th>
                                    </tr>
                                    <tr>
                                        <th>YANG DIGUNAKAN</th>
                                        <th style="border-right: 1px solid #000;">YANG TIDAK DIGUNAKAN</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
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
            $('#tabledatartkegiatanwarga').DataTable({
                processing: true,
                serverSide: true,
               //  scrollX: true,
                searching: true,
                ajax: {
                    url: '{!! route('rt_kegiatanwarga.jsonadmin') !!}',
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
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
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
                        data: 'rt',
                        name: 'rt'
                    },
                    {
                        data: 'rw',
                        name: 'rw'
                    },
                    {
                        data: 'nohp',
                        name: 'nohp'
                    },
                    {
                        data: 'jumlah_kpp',
                        name: 'jumlah_kpp'
                    },
                    {
                        data: 'jumlah_ppr',
                        name: 'jumlah_ppr'
                    },
                    {
                        data: 'jumlah_hansip',
                        name: 'jumlah_hansip'
                    },
                    {
                        data: 'pelaporan_tamu_lebih24',
                        name: 'pelaporan_tamu_lebih24'
                    },
                    {
                        data: 'sistem_keamanan',
                        name: 'sistem_keamanan'
                    },
                    {
                        data: 'sistem_linmas',
                        name: 'sistem_linmas'
                    },
                    {
                        data: 'jumlahpos_digunakan',
                        name: 'jumlahpos_digunakan'
                    },
                    {
                        data: 'jumlahpos_tidakdigunakan',
                        name: 'jumlahpos_tidakdigunakan'
                    },
                    {
                        data: 'jarak_ppt',
                        name: 'jarak_ppt'
                    },
                    {
                        data: 'kemudahan_ppt',
                        name: 'kemudahan_ppt'
                    },
                    {
                        data: 'jarak_korban',
                        name: 'jarak_korban'
                    },
                    {
                        data: 'jarak_lokasikumpul',
                        name: 'jarak_lokasikumpul'
                    },
                    {
                        data: 'jarak_mangkal',
                        name: 'jarak_mangkal'
                    },
                    {
                        data: 'jarak_lokalisasi',
                        name: 'jarak_lokalisasi'
                    },
                ],
                error: function(xhr, error, thrown) {
                    console.log(xhr.responseText);
                }
            });

            $('#search_nokk').on('keyup', function() {
                $('#tabledatartkegiatanwarga').DataTable().ajax.reload();
            });
        });
    </script>
@endsection
