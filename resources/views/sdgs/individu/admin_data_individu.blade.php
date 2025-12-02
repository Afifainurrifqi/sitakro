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
                            <h2 class="card-title">SDGS DATA INDIVIDU</h2>
                        </div>

                        <form action="{{ route('individu.import') }}" method="POST" enctype="multipart/form-data"
                            class="mb-3">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="file" name="file" class="form-control" required>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-upload"></i> Import Excel
                                    </button>
                                </div>
                            </div>
                        </form>
                        {{-- <div class="mb-3">
                            <a href="{{ route('individu.export.all') }}" class="btn btn-success">
                                <i class="fa fa-file-excel-o"></i> Export Seluruh Data (Excel)
                            </a>
                        </div> --}}

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" id="tabledataindividu">
                                <thead>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <!-- DATA INDIVIDU -->
                                    <tr>
                                        <th rowspan="2">Action</th>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">KK</th>
                                        <th rowspan="2">NIK</th>
                                        <th rowspan="2">Gelar awal</th>
                                        <th rowspan="2">Nama</th>
                                        <th rowspan="2">Gelar akhir</th>
                                        <th rowspan="2">Jenis kelamin</th>
                                        <th rowspan="2">Tempat lahir</th>
                                        <th rowspan="2">Tanggal_lahir</th>
                                        <th rowspan="2">Usia</th>
                                        <th rowspan="2">Status</th>
                                        <th rowspan="2">Usia Saat pertama kali menikah</th>
                                        <th rowspan="2">Agama</th>
                                        <th rowspan="2">Suku Bangsa</th>
                                        <th rowspan="2">Warga Negara</th>
                                        <th rowspan="2">No. Hp</th>
                                        <th rowspan="2">No. Wa</th>
                                        <th rowspan="2">Email</th>
                                        <th rowspan="2">Facebook</th>
                                        <th rowspan="2">Twitter</th>
                                        <th rowspan="2">Instagram</th>
                                        <th colspan="4">PEKRJAAN</th>
                                        <th colspan="5">PENGHASILAN</th>
                                        <th rowspan="2">PENYAKIT YANG DIDERITA SETAHUN TERAKHIR</th>
                                        <th colspan="16" style="border-bottom: 1px solid #000;">FASILITAS KESEHATAN</th>
                                        <th rowspan="2">JAMKES</th>
                                        <th rowspan="2">BAYI Usia 1-6 bulan Konsumsi ASI</th>
                                        <th rowspan="2">JENIS DISABILITAS</th>
                                        <th rowspan="2">Pendidikan Tertinggi</th>
                                        <th rowspan="2">Berapa Tahun mengenyam pendidikan dasar (SD,SMP,SMA)</th>
                                        <th rowspan="2">Pendidikan yang sedang di ikuti</th>
                                        <th rowspan="2">Bahasa yang digunakan di Rumah dan Pemukiman</th>
                                        <th rowspan="2">Bahasa yang digunakan di Lembaga Formal</th>
                                        <th rowspan="2">Jumlah kerja bakti 1 tahun terakhir</th>
                                        <th rowspan="2">Siskamling 1 tahun terakhir</th>
                                        <th rowspan="2">Pesta Rakyat (Adat) 1 tahun terakhir</th>
                                        <th rowspan="2">Frekuensi Melayat 1 tahun terakhir</th>
                                        <th rowspan="2">Frekuensi besuk orang sakit 1 tahun terakhir</th>
                                        <th rowspan="2">Frekuensi menolong kecelakaan 1 tahun terakhir</th>
                                        <th rowspan="2">Mendapatkan Pelayanan Desa 1 tahun terakhir</th>
                                        <th rowspan="2">Bagaimana pelayanan desa yang diperoleh?</th>
                                        <th rowspan="2">Pernah menyampaikan masukan/saran kepada pihak Desa?</th>
                                        <th rowspan="2">Bagaimana keterbukaan desa terhadap masukan?</th>
                                        <th rowspan="2">Terjadi Bencana 1 tahun terakhir</th>
                                        <th rowspan="2">Apakah anda terkena dampak bencana</th>
                                        <th rowspan="2">Apakah menerima pemenuhan Kebutuhan Dasar saat Bencana (makanan,
                                            pakaian, tempat tinggal)?</th>
                                        <th rowspan="2">Apakah ada penanganan psikososial keluarga terdampak bencana
                                            (penyuluhan/konseling/terapi)?</th>

                                    </tr>

                                    <tr>
                                        <th>Kondisi pekerjaan</th>
                                        <th>Pekerjaan Utama</th>
                                        <th>Jaminan Sosial Ketenagakerjaan</th>
                                        <th>Penghasilan Setahun Terakhir</th>

                                        <th>SUMBER PENGHASILAN</th>
                                        <th>JUMLAH ASET DARI SUMBER PENGHASILAN</th>
                                        <th>SATUAN</th>
                                        <th>PENGHASILAN SETAHUN</th>
                                        <th>DI EKSPOR</th>

                                        <th>RUMAH SAKIT</th>
                                        <th>RUMAH SAKIT BERSALIN</th>
                                        <th>PUSKESMAS DENGAN RAWAT INAP</th>
                                        <th>PUSKESMAS TANPA RAWAT INAP</th>
                                        <th>PUSKEMAS PEMBANTU</th>
                                        <th>POLIKLINIK</th>
                                        <th>TEMPAT PRAKTEK DOKTER</th>
                                        <th>RUMAH BERSALIN</th>
                                        <th>TEMPAT PRAKTEK BIDAN</th>
                                        <th>POSKESDES</th>
                                        <th>POLINDES</th>
                                        <th>APOTIK</th>
                                        <th>TOKO KHUSUS OBAT / JAMU</th>
                                        <th>POSYANDU</th>
                                        <th>POSBINDU</th>
                                        <th>TEMPAT PRAKTIK DUKUN BAYI / BERSALIN</th>
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
    </div>

    {{-- jQuery (pastikan DataTables + Buttons sudah ada di layout) --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        var $ = jQuery.noConflict();
        $(function() {
            $('#tabledataindividu').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                searching: true,
                // kalau butuh toolbar tombol di atas tabel:
                dom: 'Bfrtip',

                ajax: {
                    url: '{!! route('dataindividu.jsonadmin') !!}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(d) {
                        d.nik = $('#search_nik').val();
                    }
                },

                // ⬇️ tombol export sekarang hanya redirect ke route exportAll
                buttons: [{
                    text: '<button class="btn"><i class="fa fa-file-excel-o" style="color: green;"></i>  EXPORT EXCEL</button>',
                    action: function(e, dt, button, config) {
                        // export semua data lewat Laravel-Excel
                        window.location = '{{ route('individu.export.all') }}';
                    }
                }],

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
                        data: 'nokk',
                        name: 'nokk',
                        render: function(data, type, row) {
                            if (type === 'export') {
                                return '"' + String(data ?? '').trim() + '"';
                            }
                            return data;
                        }
                    },
                    {
                        data: 'nik',
                        name: 'nik',
                        render: function(data, type, row) {
                            if (type === 'export') {
                                return '"' + String(data ?? '').trim() + '"';
                            }
                            return data;
                        }
                    },
                    {
                        data: 'gelarawal',
                        name: 'gelarawal'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'gelarakhir',
                        name: 'gelarakhir'
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin',
                        render: function(data, type) {
                            const map = {
                                '1': 'Laki-laki',
                                '0': 'Perempuan'
                            };
                            const label = map[String(data)] ?? (data ?? '');
                            if (type === 'export' || type === 'display' || type === 'filter')
                                return label;
                            return data;
                        }
                    },
                    {
                        data: 'tempat_lahir',
                        name: 'tempat_lahir'
                    },
                    {
                        data: 'tanggal_lahir',
                        name: 'tanggal_lahir'
                    },
                    {
                        data: 'Usia',
                        name: 'Usia'
                    },
                    {
                        data: 'status.nama',
                        name: 'status.nama'
                    },
                    {
                        data: 'usia_nikah',
                        name: 'usia_nikah'
                    },
                    {
                        data: 'agama.nama',
                        name: 'agama.nama'
                    },
                    {
                        data: 'suku_bangsa',
                        name: 'suku_bangsa'
                    },
                    {
                        data: 'warga_negara',
                        name: 'warga_negara'
                    },
                    {
                        data: 'hp',
                        name: 'hp'
                    },
                    {
                        data: 'wa',
                        name: 'wa'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'facebook',
                        name: 'facebook'
                    },
                    {
                        data: 'twitter',
                        name: 'twitter'
                    },
                    {
                        data: 'instagram',
                        name: 'instagram'
                    },
                    {
                        data: 'kondisi_pekerjaan',
                        name: 'kondisi_pekerjaan'
                    },
                    {
                        data: 'pekerjaan_utama',
                        name: 'pekerjaan_utama'
                    },
                    {
                        data: 'jaminan_sosial_ketenagakerjaan',
                        name: 'jaminan_sosial_ketenagakerjaan'
                    },
                    {
                        data: 'penghasilan_setahun_terakhir',
                        name: 'penghasilan_setahun_terakhir'
                    },
                    {
                        data: 'sumber',
                        name: 'sumber'
                    },
                    {
                        data: 'jumlah_aset',
                        name: 'jumlah_aset'
                    },
                    {
                        data: 'satuan',
                        name: 'satuan'
                    },
                    {
                        data: 'penghasilan',
                        name: 'penghasilan'
                    },
                    {
                        data: 'ekspor',
                        name: 'ekspor'
                    },
                    {
                        data: 'penyakit',
                        name: 'penyakit'
                    },
                    {
                        data: 'rumahsakit',
                        name: 'rumahsakit'
                    },
                    {
                        data: 'rumahsakitb',
                        name: 'rumahsakitb'
                    },
                    {
                        data: 'pusekesmas_denganri',
                        name: 'pusekesmas_denganri'
                    },
                    {
                        data: 'pusekesmas_tanpari',
                        name: 'pusekesmas_tanpari'
                    },
                    {
                        data: 'puskesmas_pembantu',
                        name: 'puskesmas_pembantu'
                    },
                    {
                        data: 'poliklinik',
                        name: 'poliklinik'
                    },
                    {
                        data: 'tempat_prakterkdr',
                        name: 'tempat_prakterkdr'
                    },
                    {
                        data: 'rumah_bersalin',
                        name: 'rumah_bersalin'
                    },
                    {
                        data: 'tempat_praktek',
                        name: 'tempat_praktek'
                    },
                    {
                        data: 'poskedes',
                        name: 'poskedes'
                    },
                    {
                        data: 'polindes',
                        name: 'polindes'
                    },
                    {
                        data: 'apotik',
                        name: 'apotik'
                    },
                    {
                        data: 'toko_obat',
                        name: 'toko_obat'
                    },
                    {
                        data: 'posyandu',
                        name: 'posyandu'
                    },
                    {
                        data: 'posbindu',
                        name: 'posbindu'
                    },
                    {
                        data: 'tempat_praktikdb',
                        name: 'tempat_praktikdb'
                    },
                    {
                        data: 'jamkes',
                        name: 'jamkes'
                    },
                    {
                        data: 'bayi',
                        name: 'bayi'
                    },
                    {
                        data: 'disabilitas',
                        name: 'disabilitas'
                    },
                    {
                        data: 'pendidikan_tertinggi',
                        name: 'pendidikan_tertinggi'
                    },
                    {
                        data: 'berapa_tahunp',
                        name: 'berapa_tahunp'
                    },
                    {
                        data: 'pendidikan_diikuti',
                        name: 'pendidikan_diikuti'
                    },
                    {
                        data: 'bahasa_Rumah',
                        name: 'bahasa_Rumah'
                    },
                    {
                        data: 'bahasa_Formal',
                        name: 'bahasa_Formal'
                    },
                    {
                        data: 'jumlah_kerja1',
                        name: 'jumlah_kerja1'
                    },
                    {
                        data: 'skamling1',
                        name: 'skamling1'
                    },
                    {
                        data: 'pesta_rakyat1',
                        name: 'pesta_rakyat1'
                    },
                    {
                        data: 'frekuensiml',
                        name: 'frekuensiml'
                    },
                    {
                        data: 'frekuensib',
                        name: 'frekuensib'
                    },
                    {
                        data: 'frekuensimn',
                        name: 'frekuensimn'
                    },
                    {
                        data: 'mendapatp1',
                        name: 'mendapatp1'
                    },
                    {
                        data: 'bagaiamanap',
                        name: 'bagaiamanap'
                    },
                    {
                        data: 'pernahmasukan',
                        name: 'pernahmasukan'
                    },
                    {
                        data: 'keterbukaands',
                        name: 'keterbukaands'
                    },
                    {
                        data: 'bencana1',
                        name: 'bencana1'
                    },
                    {
                        data: 'apakahb',
                        name: 'apakahb'
                    },
                    {
                        data: 'apakahd',
                        name: 'apakahd'
                    },
                    {
                        data: 'apakahp',
                        name: 'apakahp'
                    },
                ],
            });

            $('#search_nokk').on('keyup', function() {
                $('#tabledataindividu').DataTable().ajax.reload();
            });
        });
    </script>


    <style>
        .progress-bar {
            background-color: #28a745;
            color: green;
        }
    </style>
@endsection
