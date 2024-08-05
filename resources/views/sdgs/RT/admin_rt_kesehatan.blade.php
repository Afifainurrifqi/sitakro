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
                            <h2 class="card-title">KESEHATAN</h2>


                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tablert_kesehatan">
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
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">RUMAH SAKIT
                                        </th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">RUMAH SAKIT
                                            BERSALIN</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PUSKESMAS
                                            DENGAN RAWAT INAP</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PUSKESMAS
                                            TANPA RAWAT INAP</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PUSKESMAS
                                            PEMBANTU</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            POLIKLINIK/BALAI PENGOBATAN</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">TEMPAT
                                            PRAKTIK DOKTER</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">RUMAH
                                            BERSALIN</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">TEMPAT
                                            PRAKTEK BIDAN</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">POSKESDES
                                        </th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">POLINDES
                                        </th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">APOTIK</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">TOKO KHUSUS
                                            OBAT / JAMU</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">POSYANDU
                                        </th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">POSBINDU
                                        </th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">TEMPAT
                                            PRAKTEK DUKUN</th>
                                    </tr>

                                    <tr>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>



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
            $('#tablert_kesehatan').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                searching: true,
                ajax: {
                    url: '{!! route('rt_kesehatan.jsonadmin') !!}',
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
                    //1
                    {
                        data: 'nama_rs',
                        name: 'nama_rs'
                    },
                    {
                        data: 'pemilik_rs',
                        name: 'pemilik_rs'
                    },
                    {
                        data: 'jd_rs',
                        name: 'jd_rs'
                    },
                    {
                        data: 'jb_rs',
                        name: 'jb_rs'
                    },
                    {
                        data: 'jts_rs',
                        name: 'jts_rs'
                    },
                    {
                        data: 'jp_rs',
                        name: 'jp_rs'
                    },
                    {
                        data: 'nama_rsb',
                        name: 'nama_rsb'
                    },
                    {
                        data: 'pemilik_rsb',
                        name: 'pemilik_rsb'
                    },
                    {
                        data: 'jd_rsb',
                        name: 'jd_rsb'
                    },
                    {
                        data: 'jb_rsb',
                        name: 'jb_rsb'
                    },
                    {
                        data: 'jts_rsb',
                        name: 'jts_rsb'
                    },
                    {
                        data: 'jp_rsb',
                        name: 'jp_rsb'
                    },
                    {
                        data: 'nama_pdri',
                        name: 'nama_pdri'
                    },
                    {
                        data: 'pemilik_pdri',
                        name: 'pemilik_pdri'
                    },
                    {
                        data: 'jd_pdri',
                        name: 'jd_pdri'
                    },
                    {
                        data: 'jb_pdri',
                        name: 'jb_pdri'
                    },
                    {
                        data: 'jts_pdri',
                        name: 'jts_pdri'
                    },
                    {
                        data: 'jp_pdri',
                        name: 'jp_pdri'
                    },
                    {
                        data: 'nama_ptri',
                        name: 'nama_ptri'
                    },
                    {
                        data: 'pemilik_ptri',
                        name: 'pemilik_ptri'
                    },
                    {
                        data: 'jd_ptri',
                        name: 'jd_ptri'
                    },
                    {
                        data: 'jb_ptri',
                        name: 'jb_ptri'
                    },
                    {
                        data: 'jts_ptri',
                        name: 'jts_ptri'
                    },
                    {
                        data: 'jp_ptri',
                        name: 'jp_ptri'
                    },
                    {
                        data: 'nama_pp',
                        name: 'nama_pp'
                    },
                    {
                        data: 'pemilik_pp',
                        name: 'pemilik_pp'
                    },
                    {
                        data: 'jd_pp',
                        name: 'jd_pp'
                    },
                    {
                        data: 'jb_pp',
                        name: 'jb_pp'
                    },
                    {
                        data: 'jts_pp',
                        name: 'jts_pp'
                    },
                    {
                        data: 'jp_pp',
                        name: 'jp_pp'
                    },
                    {
                        data: 'nama_pbp',
                        name: 'nama_pbp'
                    },
                    {
                        data: 'pemilik_pbp',
                        name: 'pemilik_pbp'
                    },
                    {
                        data: 'jd_pbp',
                        name: 'jd_pbp'
                    },
                    {
                        data: 'jb_pbp',
                        name: 'jb_pbp'
                    },
                    {
                        data: 'jts_pbp',
                        name: 'jts_pbp'
                    },
                    {
                        data: 'jp_pbp',
                        name: 'jp_pbp'
                    },
                    {
                        data: 'nama_tpd',
                        name: 'nama_tpd'
                    },
                    {
                        data: 'pemilik_tpd',
                        name: 'pemilik_tpd'
                    },
                    {
                        data: 'jd_tpd',
                        name: 'jd_tpd'
                    },
                    {
                        data: 'jb_tpd',
                        name: 'jb_tpd'
                    },
                    {
                        data: 'jts_tpd',
                        name: 'jts_tpd'
                    },
                    {
                        data: 'jp_tpd',
                        name: 'jp_tpd'
                    },
                    {
                        data: 'nama_rb',
                        name: 'nama_rb'
                    },
                    {
                        data: 'pemilik_rb',
                        name: 'pemilik_rb'
                    },
                    {
                        data: 'jd_rb',
                        name: 'jd_rb'
                    },
                    {
                        data: 'jb_rb',
                        name: 'jb_rb'
                    },
                    {
                        data: 'jts_rb',
                        name: 'jts_rb'
                    },
                    {
                        data: 'jp_rb',
                        name: 'jp_rb'
                    },
                    {
                        data: 'nama_tpb',
                        name: 'nama_tpb'
                    },
                    {
                        data: 'pemilik_tpb',
                        name: 'pemilik_tpb'
                    },
                    {
                        data: 'jd_tpb',
                        name: 'jd_tpb'
                    },
                    {
                        data: 'jb_tpb',
                        name: 'jb_tpb'
                    },
                    {
                        data: 'jts_tpb',
                        name: 'jts_tpb'
                    },
                    {
                        data: 'jp_tpb',
                        name: 'jp_tpb'
                    },
                    {
                        data: 'nama_poskedes',
                        name: 'nama_poskedes'
                    },
                    {
                        data: 'pemilik_poskedes',
                        name: 'pemilik_poskedes'
                    },
                    {
                        data: 'jd_poskedes',
                        name: 'jd_poskedes'
                    },
                    {
                        data: 'jb_poskedes',
                        name: 'jb_poskedes'
                    },
                    {
                        data: 'jts_poskedes',
                        name: 'jts_poskedes'
                    },
                    {
                        data: 'jp_poskedes',
                        name: 'jp_poskedes'
                    },

                    {
                        data: 'nama_polindes',
                        name: 'nama_polindes'
                    },
                    {
                        data: 'pemilik_polindes',
                        name: 'pemilik_polindes'
                    },
                    {
                        data: 'jd_polindes',
                        name: 'jd_polindes'
                    },
                    {
                        data: 'jb_polindes',
                        name: 'jb_polindes'
                    },
                    {
                        data: 'jts_polindes',
                        name: 'jts_polindes'
                    },
                    {
                        data: 'jp_polindes',
                        name: 'jp_polindes'
                    },
                    {
                        data: 'nama_apotik',
                        name: 'nama_apotik'
                    },
                    {
                        data: 'pemilik_apotik',
                        name: 'pemilik_apotik'
                    },
                    {
                        data: 'jd_apotik',
                        name: 'jd_apotik'
                    },
                    {
                        data: 'jb_apotik',
                        name: 'jb_apotik'
                    },
                    {
                        data: 'jts_apotik',
                        name: 'jts_apotik'
                    },
                    {
                        data: 'jp_apotik',
                        name: 'jp_apotik'
                    },
                    {
                        data: 'nama_tokojamu',
                        name: 'nama_tokojamu'
                    },
                    {
                        data: 'pemilik_tokojamu',
                        name: 'pemilik_tokojamu'
                    },
                    {
                        data: 'jd_tokojamu',
                        name: 'jd_tokojamu'
                    },
                    {
                        data: 'jb_tokojamu',
                        name: 'jb_tokojamu'
                    },
                    {
                        data: 'jts_tokojamu',
                        name: 'jts_tokojamu'
                    },
                    {
                        data: 'jp_tokojamu',
                        name: 'jp_tokojamu'
                    },
                    {
                        data: 'nama_posyandu',
                        name: 'nama_posyandu'
                    },
                    {
                        data: 'pemilik_posyandu',
                        name: 'pemilik_posyandu'
                    },
                    {
                        data: 'jd_posyandu',
                        name: 'jd_posyandu'
                    },
                    {
                        data: 'jb_posyandu',
                        name: 'jb_posyandu'
                    },
                    {
                        data: 'jts_posyandu',
                        name: 'jts_posyandu'
                    },
                    {
                        data: 'jp_posyandu',
                        name: 'jp_posyandu'
                    },
                    {
                        data: 'nama_posbindu',
                        name: 'nama_posbindu'
                    },
                    {
                        data: 'pemilik_posbindu',
                        name: 'pemilik_posbindu'
                    },
                    {
                        data: 'jd_posbindu',
                        name: 'jd_posbindu'
                    },
                    {
                        data: 'jb_posbindu',
                        name: 'jb_posbindu'
                    },
                    {
                        data: 'jts_posbindu',
                        name: 'jts_posbindu'
                    },
                    {
                        data: 'jp_posbindu',
                        name: 'jp_posbindu'
                    },
                    {
                        data: 'nama_tpd',
                        name: 'nama_tpd'
                    },
                    {
                        data: 'pemilik_tpd',
                        name: 'pemilik_tpd'
                    },
                    {
                        data: 'jd_tpd',
                        name: 'jd_tpd'
                    },
                    {
                        data: 'jb_tpd',
                        name: 'jb_tpd'
                    },
                    {
                        data: 'jts_tpd',
                        name: 'jts_tpd'
                    },
                    {
                        data: 'jp_tpd',
                        name: 'jp_tpd'
                    },



                ]

            });
            $('#search_nokk').on('keyup', function() {
                $('#tablert_kesehatan').DataTable().ajax.reload();
            });
        });
    </script>
@endsection
