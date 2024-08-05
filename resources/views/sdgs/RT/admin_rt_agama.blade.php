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
                            <h2 class="card-title">AGAMA</h2>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tablertagama">
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
                                        <th rowspan="2">JUMLAH WARGA PESERTA JAMSKES</th>
                                        <th rowspan="2">JUMLAH WARGA PESERTA JAMS KETENAGAKERJAAN</th>
                                        <th colspan="9"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">JUMLAH
                                            TEMPAT IBADAH</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SITUS
                                            CAGAR
                                            BUDAYA</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KEBERADAAN
                                            SUKU TERASING</th>
                                        <th rowspan="2">RUANG PUBLIK TERBUKA UNTUK SANTAI/ BERMAIN</th>
                                        <th colspan="7"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">NAMA
                                            KEARIFAN LOKAL ATAU ADAT</th>

                                    </tr>

                                    <tr>
                                        <th>MASJID</th>
                                        <th>MUSHOLLAH</th>
                                        <th>GEREJA KRISTEN</th>
                                        <th>GEREJA KATOLIK</th>
                                        <th>KAPEL</th>
                                        <th>PURA</th>
                                        <th>WIHARA</th>
                                        <th>KELENTENG</th>
                                        <th style="border-right: 1px solid #000;">LAINNYA</th>


                                        <th>SITUS CAGAR BUDAYA 1</th>
                                        <th>SITUS CAGAR BUDAYA 2</th>
                                        <th style="border-right: 1px solid #000;">SITUS CAGAR BUDAYA 3</th>


                                        <th>JUMLAH KELUARGA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH JIWA</th>


                                        <th>KEHAMILAN</th>
                                        <th>KELAHIRAN</th>
                                        <th>PEKERJAAN</th>
                                        <th>ALAM / LINGKUNGAN HIDUP</th>
                                        <th>PERKAWINAN</th>
                                        <th>KEHIDUPAN WARGA</th>
                                        <th style="border-right: 1px solid #000;">KEMATIAN</th>


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
            $('#tablertagama').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                searching: true,
                ajax: {
                    url: '{!! route('rt_agama.jsonadmin') !!}',
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
                        data: 'jumlahwarga_jamkes',
                        name: 'jumlahwarga_jamkes',
                    },
                    {
                        data: 'jumlahwarga_jamketerangan',
                        name: 'jumlahwarga_jamketerangan',
                    },
                    {
                        data: 'jumlahtempat_masjid',
                        name: 'jumlahtempat_masjid',
                    },
                    {
                        data: 'jumlahtempat_musholla',
                        name: 'jumlahtempat_musholla',
                    },
                    {
                        data: 'jumlahtempat_kristen',
                        name: 'jumlahtempat_kristen',
                    },
                    {
                        data: 'jumlahtempat_katolik',
                        name: 'jumlahtempat_katolik',
                    },
                    {
                        data: 'jumlahtempat_kapel',
                        name: 'jumlahtempat_kapel',
                    },
                    {
                        data: 'jumlahtempat_pura',
                        name: 'jumlahtempat_pura',
                    },
                    {
                        data: 'jumlahtempat_wihara',
                        name: 'jumlahtempat_wihara',
                    },
                    {
                        data: 'jumlahtempat_kelenteng',
                        name: 'jumlahtempat_kelenteng',
                    },
                    {
                        data: 'jumlahtempat_lainnya',
                        name: 'jumlahtempat_lainnya',
                    },
                    {
                        data: 'cagar_bud1',
                        name: 'cagar_bud1',
                    },
                    {
                        data: 'cagar_bud2',
                        name: 'cagar_bud2',
                    },
                    {
                        data: 'cagar_bud3',
                        name: 'cagar_bud3',
                    },
                    {
                        data: 'sukuasing_keluarga',
                        name: 'sukuasing_keluarga',
                    },
                    {
                        data: 'sukuasing_jiwa',
                        name: 'sukuasing_jiwa',
                    },
                    {
                        data: 'ruangpublik_terbuka',
                        name: 'ruangpublik_terbuka',
                    },
                    {
                        data: 'adat_kehamilan',
                        name: 'adat_kehamilan',
                    },
                    {
                        data: 'adat_kelahiran',
                        name: 'adat_kelahiran',
                    },
                    {
                        data: 'adat_pekerjaan',
                        name: 'adat_pekerjaan',
                    },
                    {
                        data: 'adat_alam',
                        name: 'adat_alam',
                    },
                    {
                        data: 'adat_perkawinan',
                        name: 'adat_perkawinan',
                    },
                    {
                        data: 'adat_kehidupanwarga',
                        name: 'adat_kehidupanwarga',
                    },
                    {
                        data: 'adat_kematian',
                        name: 'adat_kematian',
                    },


                ],
                "error": function(xhr, error, thrown) {
                    console.log(xhr.responseText);
                }

            });

            $('#search_nokk').on('keyup', function() {
                       $('#tablertagama').DataTable().ajax.reload();
                   });
        });
    </script>
@endsection
