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
                             <h2 class="card-title">SDGS JENIS DISABILITAS</h2>

                         </div>
                         <div class="table-responsive">
                             <table class="table table-striped table-bordered" id="tabledatadisabilitas">
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
                                         <th>JENIS DISABILITAS</th>

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
             $('#tabledatadisabilitas').DataTable({
                 processing: true,
                 serverSide: true,
                 searching: true,
                 ajax: {
                     url: '{!! route('datadisabilitas.jsonadmin') !!}',
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
                         data: 'disabilitas',
                         name: 'disabilitas'
                     },

                 ]
             });
             $('#search_nokk').on('keyup', function() {
                 $('#tabledatadisabilitas').DataTable().ajax.reload();
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
