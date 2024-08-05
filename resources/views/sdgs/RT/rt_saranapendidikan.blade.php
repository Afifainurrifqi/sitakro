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
                            <h2 class="card-title">SARANA PENDIDIKAN</h2>
                            <div class="form-group">
                                <label for="search_nik">Cari berdasarkan NIK:</label>
                                <input type="text" id="search_nik" class="form-control" placeholder="Masukkan NIK">
                            </div>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tablert_saranapendidikan">
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
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            POS PAUD</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            TK/RA/BA</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            SD/MI</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            SMP/MTs</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            SMPLB</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            SMA/MA</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            SMK</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            SMA/LB</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            AKADEMI/PERGURUAN TINGGI</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            PESANTREN</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            MADRASAH DINIYAH</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            SEMINARI/SEJENISNYA</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            SEKOLAH AGAMA LAINYA</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KEGIATAN PEMBERANTASAN BUTA AKSARA</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KEGIATAN KEJAR PAKET A</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KEGIATAN KEJAR PAKET B</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KEGIATAN KEJAR PAKET C</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KELOMPOK BERMAIN/PLAYGRUP</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            TEMPAT PENITIPAN ANAK</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            TAMAN PENDIDIKAN AL QURAN</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KURSUS BAHASA ASING</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KURSUS KOMPUTER</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KURSUS
                                            MENJAHIT / TATA BUSANA</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KURSUS KECANTIKAN</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KURSUS MONTIR MOBIL/MOTOR</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KURSUS MENYETIR</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KURSUS ELEKTRONIKA</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KURSUS MEMASAK/TATABOGA</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KURSUS MENGETIK</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KURSUS AKUNTANSI</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KURSUS LAINNYA</th>
                                    </tr>

                                    <tr>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
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
            $('#tablert_saranapendidikan').DataTable({
                processing: true,
                // serverSide: true,
                scrollX: true,
                searching: true,
                ajax: {
                    url: '{!! route('rt_saranapendidikan.json') !!}',
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
                        data: 'nama_paud',
                        name: 'nama_paud'
                    },
                    {
                        data: 'pemilik_paud',
                        name: 'pemilik_paud'
                    },
                    {
                        data: 'kondisi_paud',
                        name: 'kondisi_paud'
                    },
                    {
                        data: 'jumlahguru_paud',
                        name: 'jumlahguru_paud'
                    },
                    {
                        data: 'jumlahmurid_paud',
                        name: 'jumlahmurid_paud'
                    },
                    {
                        data: 'jumlahpegawai_paud',
                        name: 'jumlahpegawai_paud'
                    },
                    //2
                    {
                        data: 'nama_tk',
                        name: 'nama_tk'
                    },
                    {
                        data: 'pemilik_tk',
                        name: 'pemilik_tk'
                    },
                    {
                        data: 'kondisi_tk',
                        name: 'kondisi_tk'
                    },
                    {
                        data: 'jumlahguru_tk',
                        name: 'jumlahguru_tk'
                    },
                    {
                        data: 'jumlahmurid_tk',
                        name: 'jumlahmurid_tk'
                    },
                    {
                        data: 'jumlahpegawai_tk',
                        name: 'jumlahpegawai_tk'
                    },
                    //3
                    {
                        data: 'nama_sd',
                        name: 'nama_sd'
                    },
                    {
                        data: 'pemilik_sd',
                        name: 'pemilik_sd'
                    },
                    {
                        data: 'kondisi_sd',
                        name: 'kondisi_sd'
                    },
                    {
                        data: 'jumlahguru_sd',
                        name: 'jumlahguru_sd'
                    },
                    {
                        data: 'jumlahmurid_sd',
                        name: 'jumlahmurid_sd'
                    },
                    {
                        data: 'jumlahpegawai_sd',
                        name: 'jumlahpegawai_sd'
                    },
                    //4
                    {
                        data: 'nama_smp',
                        name: 'nama_smp'
                    },
                    {
                        data: 'pemilik_smp',
                        name: 'pemilik_smp'
                    },
                    {
                        data: 'kondisi_smp',
                        name: 'kondisi_smp'
                    },
                    {
                        data: 'jumlahguru_smp',
                        name: 'jumlahguru_smp'
                    },
                    {
                        data: 'jumlahmurid_smp',
                        name: 'jumlahmurid_smp'
                    },
                    {
                        data: 'jumlahpegawai_smp',
                        name: 'jumlahpegawai_smp'
                    },
                    //5
                    {
                        data: 'nama_smplb',
                        name: 'nama_smplb'
                    },
                    {
                        data: 'pemilik_smplb',
                        name: 'pemilik_smplb'
                    },
                    {
                        data: 'kondisi_smplb',
                        name: 'kondisi_smplb'
                    },
                    {
                        data: 'jumlahguru_smplb',
                        name: 'jumlahguru_smplb'
                    },
                    {
                        data: 'jumlahmurid_smplb',
                        name: 'jumlahmurid_smplb'
                    },
                    {
                        data: 'jumlahpegawai_smplb',
                        name: 'jumlahpegawai_smplb'
                    },
                    //6
                    {
                        data: 'nama_sma',
                        name: 'nama_sma'
                    },
                    {
                        data: 'pemilik_sma',
                        name: 'pemilik_sma'
                    },
                    {
                        data: 'kondisi_sma',
                        name: 'kondisi_sma'
                    },
                    {
                        data: 'jumlahguru_sma',
                        name: 'jumlahguru_sma'
                    },
                    {
                        data: 'jumlahmurid_sma',
                        name: 'jumlahmurid_sma'
                    },
                    {
                        data: 'jumlahpegawai_sma',
                        name: 'jumlahpegawai_sma'
                    },
                    //7
                    {
                        data: 'nama_smk',
                        name: 'nama_smk'
                    },
                    {
                        data: 'pemilik_smk',
                        name: 'pemilik_smk'
                    },
                    {
                        data: 'kondisi_smk',
                        name: 'kondisi_smk'
                    },
                    {
                        data: 'jumlahguru_smk',
                        name: 'jumlahguru_smk'
                    },
                    {
                        data: 'jumlahmurid_smk',
                        name: 'jumlahmurid_smk'
                    },
                    {
                        data: 'jumlahpegawai_smk',
                        name: 'jumlahpegawai_smk'
                    },
                    //8
                    {
                        data: 'nama_smalb',
                        name: 'nama_smalb'
                    },
                    {
                        data: 'pemilik_smalb',
                        name: 'pemilik_smalb'
                    },
                    {
                        data: 'kondisi_smalb',
                        name: 'kondisi_smalb'
                    },
                    {
                        data: 'jumlahguru_smalb',
                        name: 'jumlahguru_smalb'
                    },
                    {
                        data: 'jumlahmurid_smalb',
                        name: 'jumlahmurid_smalb'
                    },
                    {
                        data: 'jumlahpegawai_smalb',
                        name: 'jumlahpegawai_smalb'
                    },
                    //9
                    {
                        data: 'nama_akademi',
                        name: 'nama_akademi'
                    },
                    {
                        data: 'pemilik_akademi',
                        name: 'pemilik_akademi'
                    },
                    {
                        data: 'kondisi_akademi',
                        name: 'kondisi_akademi'
                    },
                    {
                        data: 'jumlahguru_akademi',
                        name: 'jumlahguru_akademi'
                    },
                    {
                        data: 'jumlahmurid_akademi',
                        name: 'jumlahmurid_akademi'
                    },
                    {
                        data: 'jumlahpegawai_akademi',
                        name: 'jumlahpegawai_akademi'
                    },
                    //10
                    {
                        data: 'nama_pesantren',
                        name: 'nama_pesantren'
                    },
                    {
                        data: 'pemilik_pesantren',
                        name: 'pemilik_pesantren'
                    },
                    {
                        data: 'kondisi_pesantren',
                        name: 'kondisi_pesantren'
                    },
                    {
                        data: 'jumlahguru_pesantren',
                        name: 'jumlahguru_pesantren'
                    },
                    {
                        data: 'jumlahmurid_pesantren',
                        name: 'jumlahmurid_pesantren'
                    },
                    {
                        data: 'jumlahpegawai_pesantren',
                        name: 'jumlahpegawai_pesantren'
                    },
                    //11
                    {
                        data: 'nama_madrasahdn',
                        name: 'nama_madrasahdn'
                    },
                    {
                        data: 'pemilik_madrasahdn',
                        name: 'pemilik_madrasahdn'
                    },
                    {
                        data: 'kondisi_madrasahdn',
                        name: 'kondisi_madrasahdn'
                    },
                    {
                        data: 'jumlahguru_madrasahdn',
                        name: 'jumlahguru_madrasahdn'
                    },
                    {
                        data: 'jumlahmurid_madrasahdn',
                        name: 'jumlahmurid_madrasahdn'
                    },
                    {
                        data: 'jumlahpegawai_madrasahdn',
                        name: 'jumlahpegawai_madrasahdn'
                    },
                    //12
                    {
                        data: 'nama_seminari',
                        name: 'nama_seminari'
                    },
                    {
                        data: 'pemilik_seminari',
                        name: 'pemilik_seminari'
                    },
                    {
                        data: 'kondisi_seminari',
                        name: 'kondisi_seminari'
                    },
                    {
                        data: 'jumlahguru_seminari',
                        name: 'jumlahguru_seminari'
                    },
                    {
                        data: 'jumlahmurid_seminari',
                        name: 'jumlahmurid_seminari'
                    },
                    {
                        data: 'jumlahpegawai_seminari',
                        name: 'jumlahpegawai_seminari'
                    },
                    //13
                    {
                        data: 'nama_sekolahag',
                        name: 'nama_sekolahag'
                    },
                    {
                        data: 'pemilik_sekolahag',
                        name: 'pemilik_sekolahag'
                    },
                    {
                        data: 'kondisi_sekolahag',
                        name: 'kondisi_sekolahag'
                    },
                    {
                        data: 'jumlahguru_sekolahag',
                        name: 'jumlahguru_sekolahag'
                    },
                    {
                        data: 'jumlahmurid_sekolahag',
                        name: 'jumlahmurid_sekolahag'
                    },
                    {
                        data: 'jumlahpegawai_sekolahag',
                        name: 'jumlahpegawai_sekolahag'
                    },
                    //13
                    {
                        data: 'nama_butaaksara',
                        name: 'nama_butaaksara'
                    },
                    {
                        data: 'pemilik_butaaksara',
                        name: 'pemilik_butaaksara'
                    },
                    {
                        data: 'kondisi_butaaksara',
                        name: 'kondisi_butaaksara'
                    },
                    {
                        data: 'jumlahguru_butaaksara',
                        name: 'jumlahguru_butaaksara'
                    },
                    {
                        data: 'jumlahmurid_butaaksara',
                        name: 'jumlahmurid_butaaksara'
                    },
                    {
                        data: 'jumlahpegawai_butaaksara',
                        name: 'jumlahpegawai_butaaksara'
                    },

                    //14
                    {
                        data: 'nama_paketa',
                        name: 'nama_paketa'
                    },
                    {
                        data: 'pemilik_paketa',
                        name: 'pemilik_paketa'
                    },
                    {
                        data: 'kondisi_paketa',
                        name: 'kondisi_paketa'
                    },
                    {
                        data: 'jumlahguru_paketa',
                        name: 'jumlahguru_paketa'
                    },
                    {
                        data: 'jumlahmurid_paketa',
                        name: 'jumlahmurid_paketa'
                    },
                    {
                        data: 'jumlahpegawai_paketa',
                        name: 'jumlahpegawai_paketa'
                    },

                    //15
                    {
                        data: 'nama_paketb',
                        name: 'nama_paketb'
                    },
                    {
                        data: 'pemilik_paketb',
                        name: 'pemilik_paketb'
                    },
                    {
                        data: 'kondisi_paketb',
                        name: 'kondisi_paketb'
                    },
                    {
                        data: 'jumlahguru_paketb',
                        name: 'jumlahguru_paketb'
                    },
                    {
                        data: 'jumlahmurid_paketb',
                        name: 'jumlahmurid_paketb'
                    },
                    {
                        data: 'jumlahpegawai_paketb',
                        name: 'jumlahpegawai_paketb'
                    },
                    //16
                    {
                        data: 'nama_paketc',
                        name: 'nama_paketc'
                    },
                    {
                        data: 'pemilik_paketc',
                        name: 'pemilik_paketc'
                    },
                    {
                        data: 'kondisi_paketc',
                        name: 'kondisi_paketc'
                    },
                    {
                        data: 'jumlahguru_paketc',
                        name: 'jumlahguru_paketc'
                    },
                    {
                        data: 'jumlahmurid_paketc',
                        name: 'jumlahmurid_paketc'
                    },
                    {
                        data: 'jumlahpegawai_paketc',
                        name: 'jumlahpegawai_paketc'
                    },
                    //17
                    {
                        data: 'nama_playgrup',
                        name: 'nama_playgrup'
                    },
                    {
                        data: 'pemilik_playgrup',
                        name: 'pemilik_playgrup'
                    },
                    {
                        data: 'kondisi_playgrup',
                        name: 'kondisi_playgrup'
                    },
                    {
                        data: 'jumlahguru_playgrup',
                        name: 'jumlahguru_playgrup'
                    },
                    {
                        data: 'jumlahmurid_playgrup',
                        name: 'jumlahmurid_playgrup'
                    },
                    {
                        data: 'jumlahpegawai_playgrup',
                        name: 'jumlahpegawai_playgrup'
                    },
                    //18
                    {
                        data: 'nama_penitipananak',
                        name: 'nama_penitipananak'
                    },
                    {
                        data: 'pemilik_penitipananak',
                        name: 'pemilik_penitipananak'
                    },
                    {
                        data: 'kondisi_penitipananak',
                        name: 'kondisi_penitipananak'
                    },
                    {
                        data: 'jumlahguru_penitipananak',
                        name: 'jumlahguru_penitipananak'
                    },
                    {
                        data: 'jumlahmurid_penitipananak',
                        name: 'jumlahmurid_penitipananak'
                    },
                    {
                        data: 'jumlahpegawai_penitipananak',
                        name: 'jumlahpegawai_penitipananak'
                    },
                    //19
                    {
                        data: 'nama_pendidikanq',
                        name: 'nama_pendidikanq'
                    },
                    {
                        data: 'pemilik_pendidikanq',
                        name: 'pemilik_pendidikanq'
                    },
                    {
                        data: 'kondisi_pendidikanq',
                        name: 'kondisi_pendidikanq'
                    },
                    {
                        data: 'jumlahguru_pendidikanq',
                        name: 'jumlahguru_pendidikanq'
                    },
                    {
                        data: 'jumlahmurid_pendidikanq',
                        name: 'jumlahmurid_pendidikanq'
                    },
                    {
                        data: 'jumlahpegawai_pendidikanq',
                        name: 'jumlahpegawai_pendidikanq'
                    },
                    //20
                    {
                        data: 'nama_bahasaas',
                        name: 'nama_bahasaas'
                    },
                    {
                        data: 'pemilik_bahasaas',
                        name: 'pemilik_bahasaas'
                    },
                    {
                        data: 'kondisi_bahasaas',
                        name: 'kondisi_bahasaas'
                    },
                    {
                        data: 'jumlahguru_bahasaas',
                        name: 'jumlahguru_bahasaas'
                    },
                    {
                        data: 'jumlahmurid_bahasaas',
                        name: 'jumlahmurid_bahasaas'
                    },
                    {
                        data: 'jumlahpegawai_bahasaas',
                        name: 'jumlahpegawai_bahasaas'
                    },
                    //21
                    {
                        data: 'nama_kursuskomp',
                        name: 'nama_kursuskomp'
                    },
                    {
                        data: 'pemilik_kursuskomp',
                        name: 'pemilik_kursuskomp'
                    },
                    {
                        data: 'kondisi_kursuskomp',
                        name: 'kondisi_kursuskomp'
                    },
                    {
                        data: 'jumlahguru_kursuskomp',
                        name: 'jumlahguru_kursuskomp'
                    },
                    {
                        data: 'jumlahmurid_kursuskomp',
                        name: 'jumlahmurid_kursuskomp'
                    },
                    {
                        data: 'jumlahpegawai_kursuskomp',
                        name: 'jumlahpegawai_kursuskomp'
                    },
                    //22
                    {
                        data: 'nama_kursusmenjahit',
                        name: 'nama_kursusmenjahit'
                    },
                    {
                        data: 'pemilik_kursusmenjahit',
                        name: 'pemilik_kursusmenjahit'
                    },
                    {
                        data: 'kondisi_kursusmenjahit',
                        name: 'kondisi_kursusmenjahit'
                    },
                    {
                        data: 'jumlahguru_kursusmenjahit',
                        name: 'jumlahguru_kursusmenjahit'
                    },
                    {
                        data: 'jumlahmurid_kursusmenjahit',
                        name: 'jumlahmurid_kursusmenjahit'
                    },
                    {
                        data: 'jumlahpegawai_kursusmenjahit',
                        name: 'jumlahpegawai_kursusmenjahit'
                    },
                    //23
                    {
                        data: 'nama_kursuskecantikan',
                        name: 'nama_kursuskecantikan'
                    },
                    {
                        data: 'pemilik_kursuskecantikan',
                        name: 'pemilik_kursuskecantikan'
                    },
                    {
                        data: 'kondisi_kursuskecantikan',
                        name: 'kondisi_kursuskecantikan'
                    },
                    {
                        data: 'jumlahguru_kursuskecantikan',
                        name: 'jumlahguru_kursuskecantikan'
                    },
                    {
                        data: 'jumlahmurid_kursuskecantikan',
                        name: 'jumlahmurid_kursuskecantikan'
                    },
                    {
                        data: 'jumlahpegawai_kursuskecantikan',
                        name: 'jumlahpegawai_kursuskecantikan'
                    },
                    //24
                    {
                        data: 'nama_kursusmontir',
                        name: 'nama_kursusmontir'
                    },
                    {
                        data: 'pemilik_kursusmontir',
                        name: 'pemilik_kursusmontir'
                    },
                    {
                        data: 'kondisi_kursusmontir',
                        name: 'kondisi_kursusmontir'
                    },
                    {
                        data: 'jumlahguru_kursusmontir',
                        name: 'jumlahguru_kursusmontir'
                    },
                    {
                        data: 'jumlahmurid_kursusmontir',
                        name: 'jumlahmurid_kursusmontir'
                    },
                    {
                        data: 'jumlahpegawai_kursusmontir',
                        name: 'jumlahpegawai_kursusmontir'
                    },
                    //25
                    {
                        data: 'nama_kursussetir',
                        name: 'nama_kursussetir'
                    },
                    {
                        data: 'pemilik_kursussetir',
                        name: 'pemilik_kursussetir'
                    },
                    {
                        data: 'kondisi_kursussetir',
                        name: 'kondisi_kursussetir'
                    },
                    {
                        data: 'jumlahguru_kursussetir',
                        name: 'jumlahguru_kursussetir'
                    },
                    {
                        data: 'jumlahmurid_kursussetir',
                        name: 'jumlahmurid_kursussetir'
                    },
                    {
                        data: 'jumlahpegawai_kursussetir',
                        name: 'jumlahpegawai_kursussetir'
                    },
                    //26
                    {
                        data: 'nama_kursuselektronik',
                        name: 'nama_kursuselektronik'
                    },
                    {
                        data: 'pemilik_kursuselektronik',
                        name: 'pemilik_kursuselektronik'
                    },
                    {
                        data: 'kondisi_kursuselektronik',
                        name: 'kondisi_kursuselektronik'
                    },
                    {
                        data: 'jumlahguru_kursuselektronik',
                        name: 'jumlahguru_kursuselektronik'
                    },
                    {
                        data: 'jumlahmurid_kursuselektronik',
                        name: 'jumlahmurid_kursuselektronik'
                    },
                    {
                        data: 'jumlahpegawai_kursuselektronik',
                        name: 'jumlahpegawai_kursuselektronik'
                    },
                    //27
                    {
                        data: 'nama_tataboga',
                        name: 'nama_tataboga'
                    },
                    {
                        data: 'pemilik_tataboga',
                        name: 'pemilik_tataboga'
                    },
                    {
                        data: 'kondisi_tataboga',
                        name: 'kondisi_tataboga'
                    },
                    {
                        data: 'jumlahguru_tataboga',
                        name: 'jumlahguru_tataboga'
                    },
                    {
                        data: 'jumlahmurid_tataboga',
                        name: 'jumlahmurid_tataboga'
                    },
                    {
                        data: 'jumlahpegawai_tataboga',
                        name: 'jumlahpegawai_tataboga'
                    },
                    //28
                    {
                        data: 'nama_kursusketik',
                        name: 'nama_kursusketik'
                    },
                    {
                        data: 'pemilik_kursusketik',
                        name: 'pemilik_kursusketik'
                    },
                    {
                        data: 'kondisi_kursusketik',
                        name: 'kondisi_kursusketik'
                    },
                    {
                        data: 'jumlahguru_kursusketik',
                        name: 'jumlahguru_kursusketik'
                    },
                    {
                        data: 'jumlahmurid_kursusketik',
                        name: 'jumlahmurid_kursusketik'
                    },
                    {
                        data: 'jumlahpegawai_kursusketik',
                        name: 'jumlahpegawai_kursusketik'
                    },
                    //29
                    {
                        data: 'nama_kursusakuntan',
                        name: 'nama_kursusakuntan'
                    },
                    {
                        data: 'pemilik_kursusakuntan',
                        name: 'pemilik_kursusakuntan'
                    },
                    {
                        data: 'kondisi_kursusakuntan',
                        name: 'kondisi_kursusakuntan'
                    },
                    {
                        data: 'jumlahguru_kursusakuntan',
                        name: 'jumlahguru_kursusakuntan'
                    },
                    {
                        data: 'jumlahmurid_kursusakuntan',
                        name: 'jumlahmurid_kursusakuntan'
                    },
                    {
                        data: 'jumlahpegawai_kursusakuntan',
                        name: 'jumlahpegawai_kursusakuntan'
                    },
                    //30
                    {
                        data: 'nama_kursuslain',
                        name: 'nama_kursuslain'
                    },
                    {
                        data: 'pemilik_kursuslain',
                        name: 'pemilik_kursuslain'
                    },
                    {
                        data: 'kondisi_kursuslain',
                        name: 'kondisi_kursuslain'
                    },
                    {
                        data: 'jumlahguru_kursuslain',
                        name: 'jumlahguru_kursuslain'
                    },
                    {
                        data: 'jumlahmurid_kursuslain',
                        name: 'jumlahmurid_kursuslain'
                    },
                    {
                        data: 'jumlahpegawai_kursuslain',
                        name: 'jumlahpegawai_kursuslain'
                    },




                ]

            });

            $('#search_nik').on('keyup', function() {
                $('#tablert_saranapendidikan').DataTable().ajax.reload();
            });
        });
    </script>
@endsection
