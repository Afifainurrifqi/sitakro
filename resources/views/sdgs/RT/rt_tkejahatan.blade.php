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
                            <h2 class="card-title">TINDAK KEJAHATAN</h2>
                            <div class="form-group">
                                <label for="search_nik">Cari berdasarkan NIK:</label>
                                <input type="text" id="search_nik" class="form-control" placeholder="Masukkan NIK">
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tablertkejahatan">
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
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PENCURIAN
                                        </th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PENCURIAN
                                            DENGAN KEKERASAN</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PENIPUAN /
                                            PENGGELAPAN</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            PENGANIAYAAN</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PEMBAKARAN
                                        </th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PEMERKOSAAN
                                            / KEJAHATAN KESUSILAAN</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            PENYALAHGUNAAN / PEREDARAN NARKOBA</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PERJUDIAN
                                        </th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PEMBUNUHAN
                                        </th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PERDAGANGAN
                                            ORANG</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KORUPSI
                                        </th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">LAINYA</th>
                                    </tr>

                                    <tr>
                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>





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
            $('#tablertkejahatan').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
 searching: false,
                ajax: {
                    url: '{!! route('rt_tkejahatan.json') !!}',
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
                        data: 'jk_pencurian',
                        name: 'jk_pencurian'
                    },
                    {
                        data: 'jumlahselesai_pencurian',
                        name: 'jumlahselesai_pencurian'
                    },
                    {
                        data: 'jktbd_pencurian',
                        name: 'jktbd_pencurian'
                    },
                    {
                        data: 'kll_pencurian',
                        name: 'kll_pencurian'
                    },
                    {
                        data: 'kt_pencurian',
                        name: 'kt_pencurian'
                    },
                    {
                        data: 'jk_pencuriankeras',
                        name: 'jk_pencuriankeras'
                    },
                    {
                        data: 'jumlahselesai_pencuriankeras',
                        name: 'jumlahselesai_pencuriankeras'
                    },
                    {
                        data: 'jktbd_pencuriankeras',
                        name: 'jktbd_pencuriankeras'
                    },
                    {
                        data: 'kll_pencuriankeras',
                        name: 'kll_pencuriankeras'
                    },
                    {
                        data: 'kt_pencuriankeras',
                        name: 'kt_pencuriankeras'
                    },
                    {
                        data: 'jk_penipuan',
                        name: 'jk_penipuan'
                    },
                    {
                        data: 'jumlahselesai_penipuan',
                        name: 'jumlahselesai_penipuan'
                    },
                    {
                        data: 'jktbd_penipuan',
                        name: 'jktbd_penipuan'
                    },
                    {
                        data: 'kll_penipuan',
                        name: 'kll_penipuan'
                    },
                    {
                        data: 'kt_penipuan',
                        name: 'kt_penipuan'
                    },
                    {
                        data: 'jk_penganiyayaan',
                        name: 'jk_penganiyayaan'
                    },
                    {
                        data: 'jumlahselesai_penganiyayaan',
                        name: 'jumlahselesai_penganiyayaan'
                    },
                    {
                        data: 'jktbd_penganiyayaan',
                        name: 'jktbd_penganiyayaan'
                    },
                    {
                        data: 'kll_penganiyayaan',
                        name: 'kll_penganiyayaan'
                    },
                    {
                        data: 'kt_penganiyayaan',
                        name: 'kt_penganiyayaan'
                    },
                    {
                        data: 'jk_pembakaran',
                        name: 'jk_pembakaran'
                    },
                    {
                        data: 'jumlahselesai_pembakaran',
                        name: 'jumlahselesai_pembakaran'
                    },
                    {
                        data: 'jktbd_pembakaran',
                        name: 'jktbd_pembakaran'
                    },
                    {
                        data: 'kll_pembakaran',
                        name: 'kll_pembakaran'
                    },
                    {
                        data: 'kt_pembakaran',
                        name: 'kt_pembakaran'
                    },
                    {
                        data: 'jk_pemerkosaan',
                        name: 'jk_pemerkosaan'
                    },
                    {
                        data: 'jumlahselesai_pemerkosaan',
                        name: 'jumlahselesai_pemerkosaan'
                    },
                    {
                        data: 'jktbd_pemerkosaan',
                        name: 'jktbd_pemerkosaan'
                    },
                    {
                        data: 'kll_pemerkosaan',
                        name: 'kll_pemerkosaan'
                    },
                    {
                        data: 'kt_pemerkosaan',
                        name: 'kt_pemerkosaan'
                    },
                    {
                        data: 'jk_narkoba',
                        name: 'jk_narkoba'
                    },
                    {
                        data: 'jumlahselesai_narkoba',
                        name: 'jumlahselesai_narkoba'
                    },
                    {
                        data: 'jktbd_narkoba',
                        name: 'jktbd_narkoba'
                    },
                    {
                        data: 'kll_narkoba',
                        name: 'kll_narkoba'
                    },
                    {
                        data: 'kt_narkoba',
                        name: 'kt_narkoba'
                    },
                    {
                        data: 'jk_perjudian',
                        name: 'jk_perjudian'
                    },
                    {
                        data: 'jumlahselesai_perjudian',
                        name: 'jumlahselesai_perjudian'
                    },
                    {
                        data: 'jktbd_perjudian',
                        name: 'jktbd_perjudian'
                    },
                    {
                        data: 'kll_perjudian',
                        name: 'kll_perjudian'
                    },
                    {
                        data: 'kt_perjudian',
                        name: 'kt_perjudian'
                    },
                    {
                        data: 'jk_pembunuhan',
                        name: 'jk_pembunuhan'
                    },
                    {
                        data: 'jumlahselesai_pembunuhan',
                        name: 'jumlahselesai_pembunuhan'
                    },
                    {
                        data: 'jktbd_pembunuhan',
                        name: 'jktbd_pembunuhan'
                    },
                    {
                        data: 'kll_pembunuhan',
                        name: 'kll_pembunuhan'
                    },
                    {
                        data: 'kt_pembunuhan',
                        name: 'kt_pembunuhan'
                    },
                    {
                        data: 'jk_perdaganganorang',
                        name: 'jk_perdaganganorang'
                    },
                    {
                        data: 'jumlahselesai_perdaganganorang',
                        name: 'jumlahselesai_perdaganganorang'
                    },
                    {
                        data: 'jktbd_perdaganganorang',
                        name: 'jktbd_perdaganganorang'
                    },
                    {
                        data: 'kll_perdaganganorang',
                        name: 'kll_perdaganganorang'
                    },
                    {
                        data: 'kt_perdaganganorang',
                        name: 'kt_perdaganganorang'
                    },
                    {
                        data: 'jk_korupsi',
                        name: 'jk_korupsi'
                    },
                    {
                        data: 'jumlahselesai_korupsi',
                        name: 'jumlahselesai_korupsi'
                    },
                    {
                        data: 'jktbd_korupsi',
                        name: 'jktbd_korupsi'
                    },
                    {
                        data: 'kll_korupsi',
                        name: 'kll_korupsi'
                    },
                    {
                        data: 'kt_korupsi',
                        name: 'kt_korupsi'
                    },
                    {
                        data: 'jk_lainnya',
                        name: 'jk_lainnya'
                    },
                    {
                        data: 'jumlahselesai_lainnya',
                        name: 'jumlahselesai_lainnya'
                    },
                    {
                        data: 'jktbd_lainnya',
                        name: 'jktbd_lainnya'
                    },
                    {
                        data: 'kll_lainnya',
                        name: 'kll_lainnya'
                    },
                    {
                        data: 'kt_lainnya',
                        name: 'kt_lainnya'
                    }


                ],
                "error": function(xhr, error, thrown) {
                    console.log(xhr.responseText);
                }

            });

            $('#search_nik').on('keyup', function() {
                $('#tablertkejahatan').DataTable().ajax.reload();
            });
        });
    </script>
@endsection
