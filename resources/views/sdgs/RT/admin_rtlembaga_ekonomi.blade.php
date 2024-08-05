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
                            <h2 class="card-title">LEMBAGA EKONOMI</h2>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatartlembaga_ekonomi">
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
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">AGEN
                                            PENGERAHAN TKI KE LUAR NEGERI</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">JUMLAH TATA
                                            RUANG INDUSTRI</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KEBERADAAN
                                            PUB/DISKOTIK/TEMPAT KARAOKE</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PANGKALAN
                                            MINYAK TANAH DAN LPG</th>
                                        <th colspan="8"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">JUMLAH
                                            KEBERADAAN KOPERASI</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KIOS SARANA
                                            PRODUKSI PETANI/NELAYAN</th>
                                    </tr>

                                    <tr>

                                        <th>Jumlah Perusahaan</th>
                                        <th style="border-right: 1px solid #000;">Jumlah Tenaga Kerja</th>
                                        <th>Sentra Industri</th>
                                        <th>Lingkungan Industri Kecil</th>
                                        <th style="border-right: 1px solid #000;">Perkampungan Industri Kecil</th>
                                        <th>Keberadaan PUB/Diskotik/Tempat Karaoke</th>
                                        <th style="border-right: 1px solid #000;">Jarak terdekat ke Lokasi</th>
                                        <th>Keberadaan pangkalan/agen/penjual minyak tanah</th>
                                        <th style="border-right: 1px solid #000;">Keberadaan pangkalan/agen/penjual LPG</th>
                                        <th>Jumlah KUD</th>
                                        <th>KUD yang membeli/menjual hasil/produksi pertanian</th>
                                        <th>KUD yang menyediakan Kredit Usaha</th>
                                        <th>KUD kegiatan lainnya</th>
                                        <th>Koperasi Industri Kecil dan Kerajinan Rakyat</th>
                                        <th>Koperasi Simpan Pinjam</th>
                                        <th>Koperasi Serba Usaha</th>
                                        <th style="border-right: 1px solid #000;">Koperasi Lainnya</th>
                                        <th>Milik KUD (unit)</th>
                                        <th>Milik BUMDES (unit)</th>
                                        <th style="border-right: 1px solid #000;">Milik selain KUD dan BUMDES</th>


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
            $('#tabledatartlembaga_ekonomi').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                searching: true,
                ajax: {
                    url: '{!! route('rtlembaga_ekonomi.jsonadmin') !!}',
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
                            // Menambahkan nomor urut otomatis
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
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
                        data: 'agentik_jp',
                        name: 'agentik_jp'
                    },

                    // Columns related to 'agentik_jtk'
                    {
                        data: 'agentik_jtk',
                        name: 'agentik_jtk'
                    },

                    // Columns related to 'jtri_sentra'
                    {
                        data: 'jtri_sentra',
                        name: 'jtri_sentra'
                    },

                    // Columns related to 'jtri_lingkungan'
                    {
                        data: 'jtri_lingkungan',
                        name: 'jtri_lingkungan'
                    },

                    // Columns related to 'jtri_kampung'
                    {
                        data: 'jtri_kampung',
                        name: 'jtri_kampung'
                    },

                    // Columns related to 'diskotik_kpd'
                    {
                        data: 'diskotik_kpd',
                        name: 'diskotik_kpd'
                    },

                    // Columns related to 'diskotik_jtl'
                    {
                        data: 'diskotik_jtl',
                        name: 'diskotik_jtl'
                    },

                    // Columns related to 'lpg_kpapm'
                    {
                        data: 'lpg_kpapm',
                        name: 'lpg_kpapm'
                    },

                    // Columns related to 'lpg_kpapg'
                    {
                        data: 'lpg_kpapg',
                        name: 'lpg_kpapg'
                    },

                    // Columns related to 'koperasi_jumlah'
                    {
                        data: 'koperasi_jumlah',
                        name: 'koperasi_jumlah'
                    },

                    // Columns related to 'koperasi_kudproduksi'
                    {
                        data: 'koperasi_kudproduksi',
                        name: 'koperasi_kudproduksi'
                    },

                    // Columns related to 'koperasi_kudkredit'
                    {
                        data: 'koperasi_kudkredit',
                        name: 'koperasi_kudkredit'
                    },

                    // Columns related to 'koperasi_kudkegiatan'
                    {
                        data: 'koperasi_kudkegiatan',
                        name: 'koperasi_kudkegiatan'
                    },

                    // Columns related to 'koperasi_kudindustrik'
                    {
                        data: 'koperasi_kudindustrik',
                        name: 'koperasi_kudindustrik'
                    },

                    // Columns related to 'koperasi_kudksp'
                    {
                        data: 'koperasi_kudksp',
                        name: 'koperasi_kudksp'
                    },

                    // Columns related to 'koperasi_kudksu'
                    {
                        data: 'koperasi_kudksu',
                        name: 'koperasi_kudksu'
                    },

                    // Columns related to 'koperasi_kudlainnya'
                    {
                        data: 'koperasi_kudlainnya',
                        name: 'koperasi_kudlainnya'
                    },

                    // Columns related to 'kos_kud'
                    {
                        data: 'kos_kud',
                        name: 'kos_kud'
                    },

                    // Columns related to 'kos_bumdes'
                    {
                        data: 'kos_bumdes',
                        name: 'kos_bumdes'
                    },

                    // Columns related to 'kos_selain'
                    {
                        data: 'kos_selain',
                        name: 'kos_selain'
                    }
                ]
            });

            $('#search_nokk').on('keyup', function() {
                $('#tabledatartlembaga_ekonomi').DataTable().ajax.reload();
            });
        });
    </script>
@endsection
