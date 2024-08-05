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
                             <h2 class="card-title">AKSES KESEHATAN</h2>
                             <div class="form-group">
                                 <label for="search_nokk">Cari berdasarkan noKK:</label>
                                 <input type="text" id="search_nokk" class="form-control" placeholder="Masukkan noKK">
                             </div>
                         </div>

                         <div class="table-responsive">
                             <table class="table table-striped table-bordered" id="tabledataakseskesehatan">
                                 <thead>
                                     <meta name="csrf-token" content="{{ csrf_token() }}">
                                     <tr>
                                         <th rowspan="2">Action</th>
                                         <th rowspan="2">No</th>
                                         <th rowspan="2">KK</th>
                                         <th rowspan="2">NIK</th>
                                         <th rowspan="2">Gelar awal</th>
                                         <th rowspan="2">Nama</th>
                                         <th rowspan="2">Gelar akhir</th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">RUMAH
                                             SAKIT</th>
                                         <th colspan="3"
                                             style="border-bottom: 1px solid #000; border-right: 1px solid #000;">RUMAH
                                             SAKIT BERSALIN</th>
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
                                     </tr>
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

     <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
     <script>
         var $ = jQuery.noConflict();
         $(function() {
             $('#tabledataakseskesehatan').DataTable({
                 processing: true,
                 serverSide: true,
                 scrollX: true,
                 searching: false,
                 ajax: {
                     url: '{!! route('akseskesehatan.json') !!}',
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
                         data: 'nik',
                         name: 'nik'
                     }, // Use dot notation to access related data
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
                     }
                 ]
             });
             $('#search_nokk').on('keyup', function() {
                 $('#tabledataakseskesehatan').DataTable().ajax.reload();
             });
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
