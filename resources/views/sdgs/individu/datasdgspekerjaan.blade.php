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
                             <h2 class="card-title">SDGS DATA PEKERJAAN</h2>
                             <div class="form-group">
                                 <label for="search_nokk">Cari berdasarkan noKK:</label>
                                 <input type="text" id="search_nokk" class="form-control" placeholder="Masukkan noKK">
                             </div>

                         </div>
                         <div class="table-responsive">
                             <table class="table table-striped table-bordered" id="tabledatapekerjaansdgs">
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
                                         <th>Kondisi pekerjaan</th>
                                         <th>Pekerjaan Utama</th>
                                         <th>Jaminan Sosial Ketenagakerjaan</th>
                                         <th>Penghasilan Setahun Terakhir</th>
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


                 <div class="col-lg-12 col-md-12">
                     <div class="card">
                         <div class="card-body">
                             <h4 class="card-title">PERKEJAAN UTAMA</h4>
                             <canvas id="pekerjaanChart"></canvas>
                         </div>
                     </div>
                 </div>

             </div>

             <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
             <script src="https://cdn.jsdelivr.net/morris.js/0.5.1/morris.min.js"></script>
             <script>
                 var $ = jQuery.noConflict();
                 $(function() {
                     $('#tabledatapekerjaansdgs').DataTable({
                         processing: true,
                         serverSide: true,
                         //  scrollX: true,
                         searching: false,
                         ajax: {
                             url: '{!! route('datasdgspekerjaan.json') !!}',
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

                         ]
                     });

                     $('#search_nokk').on('keyup', function() {
                         $('#tabledatapekerjaansdgs').DataTable().ajax.reload();
                     });
                 });

                 document.addEventListener('DOMContentLoaded', function() {
                     var ctxPekerjaan = document.getElementById('pekerjaanChart').getContext('2d');
                     var pekerjaanLabels = @json($pekerjaanLabels);
                     var pekerjaanCounts = @json($pekerjaanCounts);

                     var barChart = new Chart(ctxPekerjaan, {
                         type: 'pie', // Change the chart type to 'bar'
                         data: {
                             labels: pekerjaanLabels,
                             datasets: [{
                                 data: pekerjaanCounts,
                                 backgroundColor: [
                                     'rgba(75, 192, 192, 0.7)',
                                     'rgba(54, 162, 235, 0.7)',
                                     // ... add other colors if needed
                                 ],
                             }]
                         },
                         options: {
                             scales: {
                                 x: [{
                                     gridLines: {
                                         display: false,
                                     }
                                 }],
                                 y: [{
                                     ticks: {
                                         beginAtZero: true,
                                     },
                                     gridLines: {
                                         display: false,
                                     }
                                 }]
                             },
                             tooltips: {
                                 callbacks: {
                                     label: function(tooltipItem, data) {
                                         var label = data.labels[tooltipItem.index];
                                         var value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem
                                             .index];
                                         return label + ': ' + value;
                                     }
                                 }
                             }
                         }
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
