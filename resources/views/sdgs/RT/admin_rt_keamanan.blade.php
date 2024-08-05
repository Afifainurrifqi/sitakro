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
                            <h2 class="card-title">KEAMANAN</h2>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tablertkeamanan">
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
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">ANTAR
                                            KELOMPOK MASYARAKAT</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KELOMPOK
                                            MASYARAKAT ANTAR DESA</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KELOMPOK
                                            MASYARAKAT DENGAN APARAT KEAMANAN</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KELOMPOK
                                            MASYARAKAT DENGAN APARAT PEMERINTAH</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">ANTAR
                                            APARAT KEAMANAN</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">ANTAR
                                            APARAT PEMERINTAH</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            PELAJAR/MAHASISWA</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">ANTAR SUKU
                                        </th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">LAINNYA
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>PENYEBAB UTAMA</th>
                                        <th>JUMLAH KEJADIAN</th>
                                        <th>JUMLAH KORBAN LUKA</th>
                                        <th>JUMLAH TEWAS</th>
                                        <th>PENYELESAIAN</th>
                                        <th style="border-right: 1px solid #000;">PIHAK PENDAMAI</th>

                                        <th>PENYEBAB UTAMA</th>
                                        <th>JUMLAH KEJADIAN</th>
                                        <th>JUMLAH KORBAN LUKA</th>
                                        <th>JUMLAH TEWAS</th>
                                        <th>PENYELESAIAN</th>
                                        <th style="border-right: 1px solid #000;">PIHAK PENDAMAI</th>

                                        <th>PENYEBAB UTAMA</th>
                                        <th>JUMLAH KEJADIAN</th>
                                        <th>JUMLAH KORBAN LUKA</th>
                                        <th>JUMLAH TEWAS</th>
                                        <th>PENYELESAIAN</th>
                                        <th style="border-right: 1px solid #000;">PIHAK PENDAMAI</th>

                                        <th>PENYEBAB UTAMA</th>
                                        <th>JUMLAH KEJADIAN</th>
                                        <th>JUMLAH KORBAN LUKA</th>
                                        <th>JUMLAH TEWAS</th>
                                        <th>PENYELESAIAN</th>
                                        <th style="border-right: 1px solid #000;">PIHAK PENDAMAI</th>

                                        <th>PENYEBAB UTAMA</th>
                                        <th>JUMLAH KEJADIAN</th>
                                        <th>JUMLAH KORBAN LUKA</th>
                                        <th>JUMLAH TEWAS</th>
                                        <th>PENYELESAIAN</th>
                                        <th style="border-right: 1px solid #000;">PIHAK PENDAMAI</th>

                                        <th>PENYEBAB UTAMA</th>
                                        <th>JUMLAH KEJADIAN</th>
                                        <th>JUMLAH KORBAN LUKA</th>
                                        <th>JUMLAH TEWAS</th>
                                        <th>PENYELESAIAN</th>
                                        <th style="border-right: 1px solid #000;">PIHAK PENDAMAI</th>

                                        <th>PENYEBAB UTAMA</th>
                                        <th>JUMLAH KEJADIAN</th>
                                        <th>JUMLAH KORBAN LUKA</th>
                                        <th>JUMLAH TEWAS</th>
                                        <th>PENYELESAIAN</th>
                                        <th style="border-right: 1px solid #000;">PIHAK PENDAMAI</th>

                                        <th>PENYEBAB UTAMA</th>
                                        <th>JUMLAH KEJADIAN</th>
                                        <th>JUMLAH KORBAN LUKA</th>
                                        <th>JUMLAH TEWAS</th>
                                        <th>PENYELESAIAN</th>
                                        <th style="border-right: 1px solid #000;">PIHAK PENDAMAI</th>

                                        <th>PENYEBAB UTAMA</th>
                                        <th>JUMLAH KEJADIAN</th>
                                        <th>JUMLAH KORBAN LUKA</th>
                                        <th>JUMLAH TEWAS</th>
                                        <th>PENYELESAIAN</th>
                                        <th style="border-right: 1px solid #000;">PIHAK PENDAMAI</th>
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
            $('#tablertkeamanan').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                searching: true,
                ajax: {
                    url: '{!! route('rt_keamanan.jsonadmin') !!}',
                    type: 'POST', // Correct the method to POST
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
                        data: 'penyebabu_antarkelompokmas',
                        name: 'penyebabu_antarkelompokmas',
                    },
                    {
                        data: 'jk_antarkelompokmas',
                        name: 'jk_antarkelompokmas',
                    },
                    {
                        data: 'jkl_antarkelompokmas',
                        name: 'jkl_antarkelompokmas',
                    },
                    {
                        data: 'jt_antarkelompokmas',
                        name: 'jt_antarkelompokmas',
                    },
                    {
                        data: 'pen_antarkelompokmas',
                        name: 'pen_antarkelompokmas',
                    },
                    {
                        data: 'pp_antarkelompokmas',
                        name: 'pp_antarkelompokmas',
                    },
                    {
                        data: 'penyebabu_antardesa',
                        name: 'penyebabu_antardesa',
                    },
                    {
                        data: 'jk_antardesa',
                        name: 'jk_antardesa',
                    },
                    {
                        data: 'jkl_antardesa',
                        name: 'jkl_antardesa',
                    },
                    {
                        data: 'jt_antardesa',
                        name: 'jt_antardesa',
                    },
                    {
                        data: 'pen_antardesa',
                        name: 'pen_antardesa',
                    },
                    {
                        data: 'pp_antardesa',
                        name: 'pp_antardesa',
                    },
                    {
                        data: 'penyebabu_aparatmk',
                        name: 'penyebabu_aparatmk',
                    },
                    {
                        data: 'jk_aparatmk',
                        name: 'jk_aparatmk',
                    },
                    {
                        data: 'jkl_aparatmk',
                        name: 'jkl_aparatmk',
                    },
                    {
                        data: 'jt_aparatmk',
                        name: 'jt_aparatmk',
                    },
                    {
                        data: 'pen_aparatmk',
                        name: 'pen_aparatmk',
                    },
                    {
                        data: 'pp_aparatmk',
                        name: 'pp_aparatmk',
                    },
                    {
                        data: 'penyebabu_aparatmp',
                        name: 'penyebabu_aparatmp',
                    },
                    {
                        data: 'jk_aparatmp',
                        name: 'jk_aparatmp',
                    },
                    {
                        data: 'jkl_aparatmp',
                        name: 'jkl_aparatmp',
                    },
                    {
                        data: 'jt_aparatmp',
                        name: 'jt_aparatmp',
                    },
                    {
                        data: 'pen_aparatmp',
                        name: 'pen_aparatmp',
                    },
                    {
                        data: 'pp_aparatmp',
                        name: 'pp_aparatmp',
                    },
                    {
                        data: 'penyebabu_aparatk',
                        name: 'penyebabu_aparatk',
                    },
                    {
                        data: 'jk_aparatk',
                        name: 'jk_aparatk',
                    },
                    {
                        data: 'jkl_aparatk',
                        name: 'jkl_aparatk',
                    },
                    {
                        data: 'jt_aparatk',
                        name: 'jt_aparatk',
                    },
                    {
                        data: 'pen_aparatk',
                        name: 'pen_aparatk',
                    },
                    {
                        data: 'pp_aparatk',
                        name: 'pp_aparatk',
                    },
                    {
                        data: 'penyebabu_aparatp',
                        name: 'penyebabu_aparatp',
                    },
                    {
                        data: 'jk_aparatp',
                        name: 'jk_aparatp',
                    },
                    {
                        data: 'jkl_aparatp',
                        name: 'jkl_aparatp',
                    },
                    {
                        data: 'jt_aparatp',
                        name: 'jt_aparatp',
                    },
                    {
                        data: 'pen_aparatp',
                        name: 'pen_aparatp',
                    },
                    {
                        data: 'pp_aparatp',
                        name: 'pp_aparatp',
                    },
                    {
                        data: 'penyebabu_pelajar',
                        name: 'penyebabu_pelajar',
                    },
                    {
                        data: 'jk_pelajar',
                        name: 'jk_pelajar',
                    },
                    {
                        data: 'jkl_pelajar',
                        name: 'jkl_pelajar',
                    },
                    {
                        data: 'jt_pelajar',
                        name: 'jt_pelajar',
                    },
                    {
                        data: 'pen_pelajar',
                        name: 'pen_pelajar',
                    },
                    {
                        data: 'pp_pelajar',
                        name: 'pp_pelajar',
                    },
                    {
                        data: 'penyebabu_suku',
                        name: 'penyebabu_suku',
                    },
                    {
                        data: 'jk_suku',
                        name: 'jk_suku',
                    },
                    {
                        data: 'jkl_suku',
                        name: 'jkl_suku',
                    },
                    {
                        data: 'jt_suku',
                        name: 'jt_suku',
                    },
                    {
                        data: 'pen_suku',
                        name: 'pen_suku',
                    },
                    {
                        data: 'pp_suku',
                        name: 'pp_suku',
                    },
                    {
                        data: 'penyebabu_lainnya',
                        name: 'penyebabu_lainnya',
                    },
                    {
                        data: 'jk_lainnya',
                        name: 'jk_lainnya',
                    },
                    {
                        data: 'jkl_lainnya',
                        name: 'jkl_lainnya',
                    },
                    {
                        data: 'jt_lainnya',
                        name: 'jt_lainnya',
                    },
                    {
                        data: 'pen_lainnya',
                        name: 'pen_lainnya',
                    },
                    {
                        data: 'pp_lainnya',
                        name: 'pp_lainnya',
                    },


                ],
                "error": function(xhr, error, thrown) {
                    console.log(xhr.responseText);
                }

            });

            $('#search_nokk').on('keyup', function() {
                $('#tablertkeamanan').DataTable().ajax.reload();
            });
        });
    </script>
@endsection
