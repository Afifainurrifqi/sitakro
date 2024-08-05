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
                             <h2 class="card-title">SDGS DATA KESEHATAN</h2>
                             <div class="form-group">
                                 <label for="search_nokk">Cari berdasarkan noKK:</label>
                                 <input type="text" id="search_nokk" class="form-control" placeholder="Masukkan noKK">
                             </div>
                         </div>
                         <div class="table-responsive">
                             <table class="table table-striped table-bordered" id="tabledatakesehatan">
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
                                         <th rowspan="2">PENYAKIT YANG DIDERITA SETAHUN TERAKHIR</th>
                                         <th colspan="16" style="border-bottom: 1px solid #000;">FASILITAS KESEHATAN</th>
                                         <th rowspan="2">JAMKES</th>
                                         <th rowspan="2">BAYI Usia 1-6 bulan Konsumsi ASI</th>
                                     </tr>
                                     <tr>
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
                                 <tbody>


                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
                 <div class="card">
                     <div class="card-body">
                         <h4 class="card-title">Presentase Penyelesaian Data</h4>
                         <div class="progress">
                             <div class="progress-bar" role="progressbar"
                                 style="width: {{ number_format($presentase, 2) }}%;"
                                 aria-valuenow="{{ number_format($presentase, 2) }}" aria-valuemin="0" aria-valuemax="100">
                                 {{ number_format($presentase, 2) }}%
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="row">
                     <!-- Card Pertama (Lebar 8) -->
                     <div class="col-lg-8 col-md-12">
                         <div class="card">
                             <div class="card-body">
                                 <h4 class="card-title">JUMLAH PENYAKIT YANG DIDERITA SELAMA SETAHUN TERAKHIR</h4>
                                 <div id="penyakitChart"></div>
                             </div>
                         </div>
                     </div>

                     <!-- Card Kedua (Lebar 4) -->
                     <div class="col-lg-4 col-md-12">
                         <div class="card">
                             <div class="card-body">
                                 <div class="card-body">
                                     <h4 class="card-title">peserta/bukan peserta masyarakat JAMKES </h4>
                                     <div id="jamkesChart"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

     <script>
         $(function() {
             // Initialize DataTable
             var dataTable = $('#tabledatakesehatan').DataTable({
                 processing: true,
                 serverSide: true,
                 scrollX: true,
                 searching: false,

                 ajax: {
                     url: '{!! route('datakesehatan.json') !!}',
                     type: 'POST',
                     dataType: 'json',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     dataSrc: function(data) {
                         // Process data for Morris Bar Chart
                         var chartData = processDataForChart(data.data);
                         renderMorrisBarChart(chartData);

                         // Return data for DataTables
                         return data.data;
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
                     }, // Use dot notation to access related data
                     {
                         data: 'nik',
                         name: 'nik'
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
                 ]
             });
             $('#search_nokk').on('keyup', function() {
                 $('#tabledatakesehatan').DataTable().ajax.reload();
             });


             function processDataForChart(data) {
                 var diseases = [
                     'MUNTABER',
                     'DEMAM BERDARAH',
                     'CAMPAK',
                     'MALARIA',
                     'FLU BURUNG',
                     'COVID-19',
                     'HEPATITIS B',
                     'LEPTOSPIROSIS',
                     'KOLERA',
                     'GIZI BURUK (STUNTING)',
                     'JANTUNG',
                     'TBC PARU PARU',
                     'KANKER',
                     'DIABETES / KENCING MANIS / GULA',
                     'HEPATITIS E',
                     'DIFTERI',
                     'CHIKUNGUNYA',
                     'LUMPUH',
                 ];

                 var chartData = {};
                 var jamkesData = {
                     'Peserta': 0,
                     'Bukan Peserta': 0
                 };
                 diseases.forEach(function(disease) {
                     chartData[disease] = 0;
                 });

                 data.forEach(function(row) {
                     var rowDiseases = row.penyakit.split(', ');
                     rowDiseases.forEach(function(disease) {
                         if (diseases.includes(disease)) {
                             chartData[disease]++;
                         }
                     });
                     if (row.jamkes.toLowerCase() === 'peserta') {
                         jamkesData['Peserta']++;
                     } else if (row.jamkes.toLowerCase() === 'bukan peserta') {
                         jamkesData['Bukan Peserta']++;
                     }
                 });
                 chartData = {
                     ...chartData,
                     ...jamkesData
                 };
                 return chartData;
             }

             function renderMorrisBarChart(chartData) {
                 var chartArray = [];
                 for (var key in chartData) {
                     if (chartData.hasOwnProperty(key) && key !== 'Peserta' && key !== 'Bukan Peserta') {
                         chartArray.push({
                             y: key,
                             value: chartData[key],
                         });
                     }
                 }
                 Morris.Bar({
                     element: 'penyakitChart',
                     data: chartArray,
                     xkey: 'y',
                     ykeys: ['value'],
                     labels: ['Jumlah'],
                     barColors: ['#7571F9'],
                     hideHover: 'auto',
                     resize: true,
                 });

                 // Donut chart for Peserta and Bukan Peserta
                 Morris.Donut({
                     element: 'jamkesChart',
                     data: [{
                             label: 'Peserta',
                             value: chartData['Peserta']
                         },
                         {
                             label: 'Bukan Peserta',
                             value: chartData['Bukan Peserta']
                         }
                     ],
                     resize: true,
                     colors: ['#4d7cff', '#7571F9'],
                 });
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
