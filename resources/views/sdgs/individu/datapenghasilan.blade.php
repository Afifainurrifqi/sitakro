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
                             <h2 class="card-title">SDGS DATA PENGHASILAN</h2>
                             <div class="form-group">
                                 <label for="search_nokk">Cari berdasarkan noKK:</label>
                                 <input type="text" id="search_nokk" class="form-control" placeholder="Masukkan noKK">
                             </div>
                         </div>
                         <table class="table table-striped table-bordered zero-configuration" id="tabledatapenghasilan">
                             <thead>
                                 <meta name="csrf-token" content="{{ csrf_token() }}">
                                 <tr>
                                     <th>Action</th>
                                     <th>No</th>
                                     <th>KK</th>
                                     <th>NIK</th>
                                     <th>Gelar awal</th>
                                     <th>Nama</th>
                                     <th>Gelar akhir</th>
                                     <th>SUMBER PENGHASILAN</th>
                                     <th>JUMLAH ASET DARI SUMBER PENGHASILAN</th>
                                     <th>SATUAN</th>
                                     <th>PENGHASILAN SETAHUN</th>
                                     <th>DI EKSPOR</th>
                                 </tr>
                             </thead>
                             <tbody>
                             </tbody>
                         </table>
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

             <div class="col-lg-12 col-md-12">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="card-title">SUMBER PENGHASILAN</h4>
                         <div id="sumberPenghasilanChart"></div>
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
             var dataTable = $('#tabledatapenghasilan').DataTable({
                 processing: true,
                 serverSide: true,
                 searching: false,
                 // scrollX: true,
                 searching: false,
                 ajax: {
                     url: '{!! route('datapenghasilan.json') !!}',
                     type: 'POST',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     dataType: 'json',
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
                     },
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
                 ]
             });
             $('#search_nokk').on('keyup', function() {
                 $('#tabledatapenghasilan').DataTable().ajax.reload();
             });

             // Fetch data for Morris Bar Chart


             function processDataForChart(data) {
                 var chartData = {
                     'Padi': 0,
                     'Paliwijaya': 0,
                     'Hortikultura': 0,
                     'Karet': 0,
                     'Kelapa Sawit': 0,
                     'Kakao': 0,
                     'Kelapa': 0,
                     'Lada': 0,
                     'Tembakau': 0,
                     'Tebu': 0,
                     'Sapi Potong': 0,
                     'Susu Sapi': 0,
                     'Ternak Besar Lainnya (Kuda, Kerbau dll)': 0,
                     ' Perikanan Tangkap (termasuk biota lainnya)': 0,
                     'Perikanan Budidaya (termasuk biota lainnya)': 0,
                     ' Budidaya Tanaman Kehutanan (Jati, Mahoni, Sengon, dll)': 0,
                     ' Pemungutan Hasil Hutan (Madu, Gaharu, Buah-buahan, Kayu Bakar, Rotan,dll)': 0,
                     ' Penangkapan Satwa Liar (Babi, Ayam Hutan, Kijang, dll)': 0,
                     'Penangkaran Satwa Liar (Arwana, Buaya, dll)': 0,
                     'Jasa Pertanian (Sewa Traktor, Penggilingan, dll)': 0,
                     'Pertambangan dan Penggalian': 0,
                     'Industri Kerajinan': 0,
                     'Perdagangan': 0,
                     'Komunikasi': 0,
                     'Jasa Pertanian': 0,
                     'Lainnya': 0,
                     'Karyawan Tetap': 0,
                     'Karyawan Tidak Tetap': 0,
                     'PNS': 0,
                     'Uang Pensiunan': 0,
                     ' TKI di luar ngeri': 0,
                     'Uang Pensiunan': 0,
                     'Sumbangan (dari keluarga, dari pemerintah)': 0,
                 };

                 data.forEach(function(row) {
                     var selectedOption = row.sumber;
                     if (selectedOption in chartData) {
                         chartData[selectedOption]++;
                     }
                 });

                 return chartData;
             }

             function renderMorrisBarChart(chartData) {
                 var chartArray = [];
                 for (var key in chartData) {
                     if (chartData.hasOwnProperty(key)) {
                         chartArray.push({
                             y: key,
                             value: chartData[key],
                         });
                     }
                 }

                 Morris.Bar({
                     element: 'sumberPenghasilanChart',
                     data: chartArray,
                     xkey: 'y',
                     ykeys: ['value'],
                     labels: ['Jumlah'],
                     barColors: ['#7571F9'],
                     hideHover: 'auto',
                     resize: true,
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
