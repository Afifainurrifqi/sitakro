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
                             <h2 class="card-title">AKSES SARANA PRASARANA</h2>
                             <div class="form-group">
                                 <label for="search_nokk">Cari berdasarkan noKK:</label>
                                 <input type="text" id="search_nokk" class="form-control" placeholder="Masukkan noKK">
                             </div>
                         </div>

                         <div class="table-responsive">
                             <table class="table table-striped table-bordered " id="tabledataaksessarpras">
                                 <thead>
                                     <meta name="csrf-token" content="{{ csrf_token() }}">
                                     <tr>
                                         <th rowspan="2">Action</th>
                                         <th rowspan="2">No</th>
                                         <th rowspan="2">KK</th>
                                         <th rowspan="2">Gelar awal</th>
                                         <th rowspan="2">Nama</th>
                                         <th rowspan="2">Gelar akhir</th>
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

                                     </tr>
                                     <tr>
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
             $('#tabledataaksessarpras').DataTable({
                 processing: true,
                 serverSide: true,
                 scrollX: true,
                 searching: false,
                 ajax: {
                     url: '{!! route('aksessarpras.json') !!}',
                     type: 'POST',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     data: function(d) {
                         d.nokk = $('#search_nokk').val(); // Pass the noKK input value
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
                         data: 'nokk',
                         name: 'nokk'
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
                     }
                 ]
             });
             $('#search_nokk').on('keyup', function() {
                 $('#tabledataaksessarpras').DataTable().ajax.reload();
             });
         });
     </script>
 @endsection
