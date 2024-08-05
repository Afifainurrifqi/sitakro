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
                             <h2 class="card-title">LOKASI DAN PEMUKIMAN</h2>
                             <div class="form-group">
                                 <label for="search_nokk">Cari berdasarkan NOKK:</label>
                                 <input type="text" id="search_nokk" class="form-control" placeholder="Masukkan NOKK">
                             </div>
                         </div>

                         <div class="table-responsive">
                             <table class="table table-striped table-bordered" id="tabledatalokasidanpemukiman">
                                 <thead>
                                     <meta name="csrf-token" content="{{ csrf_token() }}">
                                     <tr>
                                         <th rowspan="2">Action</th>
                                         <th rowspan="2">No</th>
                                         <th rowspan="2">NO KK</th>
                                         <th rowspan="2">NIK</th>
                                         <th rowspan="2">NAMA</th>
                                         <th rowspan="2">ALAMAT</th>
                                         <th rowspan="2">NO. HP</th>
                                         <th rowspan="2">NO. Telpon Rumah</th>
                                         <th rowspan="2">NIK Kepala Keluarga</th>
                                         <th rowspan="2">TEMPAT TINGGAL YANG DITEMPATI</th>
                                         <th rowspan="2">STATUS LAHAN</th>
                                         <th rowspan="2">LUAS LANTAI TEMPAT TINGGAL (m2)</th>
                                         <th rowspan="2">LUAS TANAH TEMPAT TINGGAL (m2)</th>
                                         <th rowspan="2">JENIS LANTAI TEMPAT TINGGAL TERLUAS</th>
                                         <th rowspan="2">DINDING SEBAGIAN BESAR RUMAH</th>
                                         <th rowspan="2">JENDELA</th>
                                         <th rowspan="2">ATAP</th>
                                         <th rowspan="2">PENERANGAN RUMAH</th>
                                         <th rowspan="2">ENERGI UNTUK MEMASAK</th>
                                         <th rowspan="2">JIKA MENGGUNAKAN KAYU BAKAR, SUMBER KAYU BAKAR</th>
                                         <th rowspan="2">TEMPAT PEMBUANGAN SAMPAH</th>
                                         <th rowspan="2">FASILITAS MCK</th>
                                         <th rowspan="2">SUMBER AIR MANDI TERBANYAK DARI</th>
                                         <th rowspan="2">FASILITAS BUANG AIR BESAR</th>
                                         <th rowspan="2">SUMBER AIR MINUM TERBANYAK</th>
                                         <th rowspan="2">TEMPAT PEMBUANGAN AIR LIMBAH</th>
                                         <th rowspan="2">RUMAH DILEWATI SUTET</th>
                                         <th rowspan="2">RUMAH DIPANTARAN SUNGAI</th>
                                         <th rowspan="2">RUMAH DI LERENG GUNUNG / BUKIT</th>
                                         <th rowspan="2">KONDISI RUMAH KUMUH / TIDAK</th>

                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PAUD</th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">TK/RA</th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SD/MI ATAU
                                             SEDERAJAT</th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SMP/MTs
                                             ATAU SEDERAJAT</th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SMA/MA
                                             ATAU
                                             SEDERAJAT</th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PERGURUAN
                                             TINGGI</th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PESANTREN
                                         </th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SEMINARI
                                         </th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PENDIDIKAN
                                             KEAGAMAAN LAIN</th>

                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">RUMAH
                                             SAKIT
                                         </th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">RUMAH
                                             SAKIT
                                             BERSALIN</th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">POLIKLINIK
                                         </th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PUSKESMAS
                                         </th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">POSKESDES
                                         </th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">POSYANDU
                                         </th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">APOTIK
                                         </th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">TOKO OBAT
                                         </th>

                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">DOKTER
                                             SPESIALIS</th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">DOKTER
                                             UMUM
                                         </th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">BIDAN</th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">TENAGA
                                             KESEHATAN / PERAWAT</th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">DUKUN</th>

                                         <th colspan="5"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">LOKASI
                                             PEKERJAAN UTAMA</th>
                                         <th colspan="5"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">LAHAN
                                             PERTANIAN YANG SEDANG DIUSAHAKAN</th>
                                         <th colspan="5"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SEKOLAH
                                         </th>
                                         <th colspan="5"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">BEROBAT
                                         </th>
                                         <th colspan="5"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">BERIBADAH
                                             MINGGUAN / BULANAN / TAHUNAN</th>
                                         <th colspan="5"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">REKREASI
                                             TERDEKAT</th>


                                         <th rowspan="2">JUMLAH ANGGOTA KELUARGA PENGGUNA TRANSPORTASI UMUM 1 BULAN
                                             TERAKHIR</th>
                                         <th rowspan="2">JUMLAH ANGGOTA KELUARGA PENGGUNA TRANSPORTASI UMUM 1 BULAN
                                             SEBELUMNYA</th>
                                         <th colspan="8">PEMANFAAT/PENERIMA PROGRAM PEMERINTAH</th>
                                         <th rowspan="2">BERAPA RATA-RATA PENGELUARAN SATU KELUARGA DALAM SEBULAN (Rp.)
                                         </th>


                                     </tr>


                                     {{-- batas --}}

                                     <tr>


                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>
                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>
                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JARAK TEMPUH (KM)</th>
                                         <th>WAKTU TEMPUH (JAM)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JENIS TRANSPORTASI</th>
                                         <th>PENGGUNAAN TRANSPORTASI UMUM</th>
                                         <th>WAKTU TEMPUH SEKALI JALAN (JAM)</th>
                                         <th>BIAYA SEKALI JALAN (Rp.)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JENIS TRANSPORTASI</th>
                                         <th>PENGGUNAAN TRANSPORTASI UMUM</th>
                                         <th>WAKTU TEMPUH SEKALI JALAN (JAM)</th>
                                         <th>BIAYA SEKALI JALAN (Rp.)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JENIS TRANSPORTASI</th>
                                         <th>PENGGUNAAN TRANSPORTASI UMUM</th>
                                         <th>WAKTU TEMPUH SEKALI JALAN (JAM)</th>
                                         <th>BIAYA SEKALI JALAN (Rp.)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JENIS TRANSPORTASI</th>
                                         <th>PENGGUNAAN TRANSPORTASI UMUM</th>
                                         <th>WAKTU TEMPUH SEKALI JALAN (JAM)</th>
                                         <th>BIAYA SEKALI JALAN (Rp.)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JENIS TRANSPORTASI</th>
                                         <th>PENGGUNAAN TRANSPORTASI UMUM</th>
                                         <th>WAKTU TEMPUH SEKALI JALAN (JAM)</th>
                                         <th>BIAYA SEKALI JALAN (Rp.)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>JENIS TRANSPORTASI</th>
                                         <th>PENGGUNAAN TRANSPORTASI UMUM</th>
                                         <th>WAKTU TEMPUH SEKALI JALAN (JAM)</th>
                                         <th>BIAYA SEKALI JALAN (Rp.)</th>
                                         <th style="border-right: 1px solid #000;">KEMUDAHAN</th>

                                         <th>BLT</th>
                                         <th>PKH</th>
                                         <th>BST</th>
                                         <th>Bantuan Presiden</th>
                                         <th>Bantuan UMKM</th>
                                         <th>Bantuan untuk Pekerja</th>
                                         <th>Bantuan Pendidikan Anak</th>
                                         <th>Lainnya</th>


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
     </div>
     </div>

     <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
     <script>
         var $ = jQuery.noConflict();
         $(function() {
             $('#tabledatalokasidanpemukiman').DataTable({
                 processing: true,
                 serverSide: true,
                 scrollX: true,
                 searching: false,
                 // dom: 'Bfrtip',
                 ajax: {
                     url: '{!! route('lokasidanpemukiman.json') !!}',
                     type: 'POST',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     data: function(d) {
                         d.nokk = $('#search_nokk').val(); // Pass the noKK input value
                     }
                 },
                 "buttons": [{
                     "extend": 'excel',
                     "text": '<button class="btn"><i class="fa fa-file-excel-o" style="color: green;"></i>  EXPORT EXCEL</button>',
                     "titleAttr": 'Excel',
                     "action": newexportaction
                 }, ],
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
                         data: 'nokk',
                         name: 'nokk'
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
                         data: 'nohp',
                         name: 'nohp'
                     },
                     {
                         data: 'nowa',
                         name: 'nowa'
                     },
                     {
                         data: 'nik_kepala',
                         name: 'nik_kepala'
                     },
                     {
                         data: 'tempat_tinggal',
                         name: 'tempat_tinggal'
                     },
                     {
                         data: 'status_lahan',
                         name: 'status_lahan'
                     },
                     {
                         data: 'luas_lantai_tinggal',
                         name: 'luas_lantai_tinggal'
                     },
                     {
                         data: 'luas_tanah_tinggal',
                         name: 'luas_tanah_tinggal'
                     },
                     {
                         data: 'jenis_lantai_tinggal',
                         name: 'jenis_lantai_tinggal'
                     },
                     {
                         data: 'dinding_sebagian',
                         name: 'dinding_sebagian'
                     },
                     {
                         data: 'jendela',
                         name: 'jendela'
                     },
                     {
                         data: 'atap',
                         name: 'atap'
                     },
                     {
                         data: 'penerangan',
                         name: 'penerangan'
                     },
                     {
                         data: 'energi_masak',
                         name: 'energi_masak'
                     },
                     {
                         data: 'jika_kayu_jenis',
                         name: 'jika_kayu_jenis'
                     },
                     {
                         data: 'tempat_sampah',
                         name: 'tempat_sampah'
                     },
                     {
                         data: 'mck',
                         name: 'mck'
                     },
                     {
                         data: 'sumber_air_mandi',
                         name: 'sumber_air_mandi'
                     },
                     {
                         data: 'sumber_air_mck',
                         name: 'sumber_air_mck'
                     },
                     {
                         data: 'sumber_air_minum',
                         name: 'sumber_air_minum'
                     },
                     {
                         data: 'tempat_pembuangan_limbah',
                         name: 'tempat_pembuangan_limbah'
                     },
                     {
                         data: 'rumah_sungai',
                         name: 'rumah_sungai'
                     },
                     {
                         data: 'rumah_sutet',
                         name: 'rumah_sutet'
                     },
                     {
                         data: 'rumah_lereng_gunung',
                         name: 'rumah_lereng_gunung'
                     },
                     {
                         data: 'kondi_rumah_kumuh',
                         name: 'kondi_rumah_kumuh'
                     },

                     {
                         data: 'jaraktempuh_paud',
                         name: 'jaraktempuh_paud'
                     },
                     {
                         data: 'waktutempuh_paud',
                         name: 'waktutempuh_paud'
                     },
                     {
                         data: 'kemudahan_paud',
                         name: 'kemudahan_paud'
                     },
                     {
                         data: 'jaraktempuh_tk',
                         name: 'jaraktempuh_tk'
                     },
                     {
                         data: 'waktutempuh_tk',
                         name: 'waktutempuh_tk'
                     },
                     {
                         data: 'kemudahan_tk',
                         name: 'kemudahan_tk'
                     },
                     {
                         data: 'jaraktempuh_sd',
                         name: 'jaraktempuh_sd'
                     },
                     {
                         data: 'waktutempuh_sd',
                         name: 'waktutempuh_sd'
                     },
                     {
                         data: 'kemudahan_sd',
                         name: 'kemudahan_sd'
                     },
                     {
                         data: 'jaraktempuh_smp',
                         name: 'jaraktempuh_smp'
                     },
                     {
                         data: 'waktutempuh_smp',
                         name: 'waktutempuh_smp'
                     },
                     {
                         data: 'kemudahan_smp',
                         name: 'kemudahan_smp'
                     },
                     {
                         data: 'jaraktempuh_sma',
                         name: 'jaraktempuh_sma'
                     },
                     {
                         data: 'waktutempuh_sma',
                         name: 'waktutempuh_sma'
                     },
                     {
                         data: 'kemudahan_sma',
                         name: 'kemudahan_sma'
                     },
                     {
                         data: 'jaraktempuh_pt',
                         name: 'jaraktempuh_pt'
                     },
                     {
                         data: 'waktutempuh_pt',
                         name: 'waktutempuh_pt'
                     },
                     {
                         data: 'kemudahan_pt',
                         name: 'kemudahan_pt'
                     },
                     {
                         data: 'jaraktempuh_ps',
                         name: 'jaraktempuh_ps'
                     },
                     {
                         data: 'waktutempuh_ps',
                         name: 'waktutempuh_ps'
                     },
                     {
                         data: 'kemudahan_ps',
                         name: 'kemudahan_ps'
                     },
                     {
                         data: 'jaraktempuh_seminari',
                         name: 'jaraktempuh_seminari'
                     },
                     {
                         data: 'waktutempuh_seminari',
                         name: 'waktutempuh_seminari'
                     },
                     {
                         data: 'kemudahan_seminari',
                         name: 'kemudahan_seminari'
                     },
                     {
                         data: 'jaraktempuh_pagamalain',
                         name: 'jaraktempuh_pagamalain'
                     },
                     {
                         data: 'waktutempuh_pagamalain',
                         name: 'waktutempuh_pagamalain'
                     },
                     {
                         data: 'kemudahan_pagamalain',
                         name: 'kemudahan_pagamalain'
                     },

                     {
                         data: 'jaraktempuh_rumahs',
                         name: 'jaraktempuh_rumahs'
                     },
                     {
                         data: 'waktutempuh_rumahs',
                         name: 'waktutempuh_rumahs'
                     },
                     {
                         data: 'kemudahan_rumahs',
                         name: 'kemudahan_rumahs'
                     },
                     {
                         data: 'jaraktempuh_rumahb',
                         name: 'jaraktempuh_rumahb'
                     },
                     {
                         data: 'waktutempuh_rumahb',
                         name: 'waktutempuh_rumahb'
                     },
                     {
                         data: 'kemudahan_rumahb',
                         name: 'kemudahan_rumahb'
                     },
                     {
                         data: 'jaraktempuh_poliklinik',
                         name: 'jaraktempuh_poliklinik'
                     },
                     {
                         data: 'waktutempuh_poliklinik',
                         name: 'waktutempuh_poliklinik'
                     },
                     {
                         data: 'kemudahan_poliklinik',
                         name: 'kemudahan_poliklinik'
                     },
                     {
                         data: 'jaraktempuh_puskesmas',
                         name: 'jaraktempuh_puskesmas'
                     },
                     {
                         data: 'waktutempuh_puskesmas',
                         name: 'waktutempuh_puskesmas'
                     },
                     {
                         data: 'kemudahan_puskesmas',
                         name: 'kemudahan_puskesmas'
                     },
                     {
                         data: 'jaraktempuh_poskedes',
                         name: 'jaraktempuh_poskedes'
                     },
                     {
                         data: 'waktutempuh_poskedes',
                         name: 'waktutempuh_poskedes'
                     },
                     {
                         data: 'kemudahan_poskedes',
                         name: 'kemudahan_poskedes'
                     },
                     {
                         data: 'jaraktempuh_posyandu',
                         name: 'jaraktempuh_posyandu'
                     },
                     {
                         data: 'waktutempuh_posyandu',
                         name: 'waktutempuh_posyandu'
                     },
                     {
                         data: 'kemudahan_posyandu',
                         name: 'kemudahan_posyandu'
                     },
                     {
                         data: 'jaraktempuh_apotik',
                         name: 'jaraktempuh_apotik'
                     },
                     {
                         data: 'waktutempuh_apotik',
                         name: 'waktutempuh_apotik'
                     },
                     {
                         data: 'kemudahan_apotik',
                         name: 'kemudahan_apotik'
                     },
                     {
                         data: 'jaraktempuh_toko_obat',
                         name: 'jaraktempuh_toko_obat'
                     },
                     {
                         data: 'waktutempuh_toko_obat',
                         name: 'waktutempuh_toko_obat'
                     },
                     {
                         data: 'kemudahan_toko_obat',
                         name: 'kemudahan_toko_obat'
                     },
                     {
                         data: 'jaraktempuh_dr_spesialis',
                         name: 'jaraktempuh_dr_spesialis'
                     },
                     {
                         data: 'waktutempuh_dr_spesialis',
                         name: 'waktutempuh_dr_spesialis'
                     },
                     {
                         data: 'kemudahan_dr_spesialis',
                         name: 'kemudahan_dr_spesialis'
                     },
                     {
                         data: 'jaraktempuh_dr_umum',
                         name: 'jaraktempuh_dr_umum'
                     },
                     {
                         data: 'waktutempuh_dr_umum',
                         name: 'waktutempuh_dr_umum'
                     },
                     {
                         data: 'kemudahan_dr_umum',
                         name: 'kemudahan_dr_umum'
                     },
                     {
                         data: 'jaraktempuh_bidan',
                         name: 'jaraktempuh_bidan'
                     },
                     {
                         data: 'waktutempuh_bidan',
                         name: 'waktutempuh_bidan'
                     },
                     {
                         data: 'kemudahan_bidan',
                         name: 'kemudahan_bidan'
                     },
                     {
                         data: 'jaraktempuh_tenagakes',
                         name: 'jaraktempuh_tenagakes'
                     },
                     {
                         data: 'waktutempuh_tenagakes',
                         name: 'waktutempuh_tenagakes'
                     },
                     {
                         data: 'kemudahan_tenagakes',
                         name: 'kemudahan_tenagakes'
                     },
                     {
                         data: 'jaraktempuh_dukun',
                         name: 'jaraktempuh_dukun'
                     },
                     {
                         data: 'waktutempuh_dukun',
                         name: 'waktutempuh_dukun'
                     },
                     {
                         data: 'kemudahan_dukun',
                         name: 'kemudahan_dukun'
                     },
                     {
                         data: 'jenistrasport_lokasipu',
                         name: 'jenistrasport_lokasipu'
                     },
                     {
                         data: 'pengtransportumum_lokasipu',
                         name: 'pengtransportumum_lokasipu'
                     },
                     {
                         data: 'waktutempuh_lokasipu',
                         name: 'waktutempuh_lokasipu'
                     },
                     {
                         data: 'biaya_lokasipu',
                         name: 'biaya_lokasipu'
                     },
                     {
                         data: 'kemudahan_lokasipu',
                         name: 'kemudahan_lokasipu'
                     },
                     {
                         data: 'jenistrasport_lahanpertanian',
                         name: 'jenistrasport_lahanpertanian'
                     },
                     {
                         data: 'pengtransportumum_lahanpertanian',
                         name: 'pengtransportumum_lahanpertanian'
                     },
                     {
                         data: 'waktutempuh_lahanpertanian',
                         name: 'waktutempuh_lahanpertanian'
                     },
                     {
                         data: 'biaya_lahanpertanian',
                         name: 'biaya_lahanpertanian'
                     },
                     {
                         data: 'kemudahan_lahanpertanian',
                         name: 'kemudahan_lahanpertanian'
                     },
                     {
                         data: 'jenistrasport_sekolah',
                         name: 'jenistrasport_sekolah'
                     },
                     {
                         data: 'pengtransportumum_sekolah',
                         name: 'pengtransportumum_sekolah'
                     },
                     {
                         data: 'waktutempuh_sekolah',
                         name: 'waktutempuh_sekolah'
                     },
                     {
                         data: 'biaya_sekolah',
                         name: 'biaya_sekolah'
                     },
                     {
                         data: 'kemudahan_sekolah',
                         name: 'kemudahan_sekolah'
                     },
                     {
                         data: 'jenistrasport_berobat',
                         name: 'jenistrasport_berobat'
                     },
                     {
                         data: 'pengtransportumum_berobat',
                         name: 'pengtransportumum_berobat'
                     },
                     {
                         data: 'waktutempuh_berobat',
                         name: 'waktutempuh_berobat'
                     },
                     {
                         data: 'biaya_berobat',
                         name: 'biaya_berobat'
                     },
                     {
                         data: 'kemudahan_berobat',
                         name: 'kemudahan_berobat'
                     },
                     {
                         data: 'jenistrasport_beribadah',
                         name: 'jenistrasport_beribadah'
                     },
                     {
                         data: 'pengtransportumum_beribadah',
                         name: 'pengtransportumum_beribadah'
                     },
                     {
                         data: 'waktutempuh_beribadah',
                         name: 'waktutempuh_beribadah'
                     },
                     {
                         data: 'biaya_beribadah',
                         name: 'biaya_beribadah'
                     },
                     {
                         data: 'kemudahan_beribadah',
                         name: 'kemudahan_beribadah'
                     },
                     {
                         data: 'jenistrasport_rekreasi',
                         name: 'jenistrasport_rekreasi'
                     },
                     {
                         data: 'pengtransportumum_rekreasi',
                         name: 'pengtransportumum_rekreasi'
                     },
                     {
                         data: 'waktutempuh_rekreasi',
                         name: 'waktutempuh_rekreasi'
                     },
                     {
                         data: 'biaya_rekreasi',
                         name: 'biaya_rekreasi'
                     },
                     {
                         data: 'kemudahan_rekreasi',
                         name: 'kemudahan_rekreasi'
                     },

                     {
                         data: 'pengtransportsebelum',
                         name: 'pengtransportsebelum'
                     },
                     {
                         data: 'pengtransportsesudah',
                         name: 'pengtransportsesudah'
                     },
                     {
                         data: 'blt',
                         name: 'blt'
                     },
                     {
                         data: 'pkh',
                         name: 'pkh'
                     },
                     {
                         data: 'bst',
                         name: 'bst'
                     },
                     {
                         data: 'bantuan_presiden',
                         name: 'bantuan_presiden'
                     },
                     {
                         data: 'bantuan_umkm',
                         name: 'bantuan_umkm'
                     },
                     {
                         data: 'bantuan_pekerja',
                         name: 'bantuan_pekerja'
                     },
                     {
                         data: 'bantuan_anak',
                         name: 'bantuan_anak'
                     },
                     {
                         data: 'lainnya',
                         name: 'lainnya'
                     },
                     {
                         data: 'rata_rata',
                         name: 'rata_rata'
                     },
                 ]
             });

             $('#search_nokk').on('keyup', function() {
                 $('#tabledatalokasidanpemukiman').DataTable().ajax.reload();
             });

             function newexportaction(e, dt, button, config) {
                 var self = this;
                 var oldStart = dt.settings()[0]._iDisplayStart;
                 dt.one('preXhr', function(e, s, data) {
                     // Just this once, load all data from the server...
                     data.start = 0;
                     data.length = 2147483647;
                     dt.one('preDraw', function(e, settings) {
                         // Call the original action function
                         if (button[0].className.indexOf('buttons-copy') >= 0) {
                             $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button,
                                 config);
                         } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                             $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                                 $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt,
                                     button, config) :
                                 $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt,
                                     button, config);
                         } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                             $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                                 $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button,
                                     config) :
                                 $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button,
                                     config);
                         } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                             $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                                 $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button,
                                     config) :
                                 $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button,
                                     config);
                         } else if (button[0].className.indexOf('buttons-print') >= 0) {
                             $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                         }
                         dt.one('preXhr', function(e, s, data) {
                             // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                             // Set the property to what it was before exporting.
                             settings._iDisplayStart = oldStart;
                             data.start = oldStart;
                         });
                         // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                         setTimeout(dt.ajax.reload, 0);
                         // Prevent rendering of the full data to the DOM
                         return false;
                     });
                 });
                 // Requery the server with the new one-time export settings
                 dt.ajax.reload();
             }
         });
     </script>

     <style>
         .progress-bar {
             background-color: #28a745;
             color: green;
             /* Warna hijau, bisa disesuaikan */
         }
     </style>
 @endsection
