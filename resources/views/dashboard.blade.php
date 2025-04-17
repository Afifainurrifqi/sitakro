 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


 @section('content')
     @error('field-name')
         <div class="alert alert-danger">{{ $message }}</div>
     @enderror
     <div class="container-fluid mt-3">
         <div class="row">
             <div class="col-lg-12 col-sm-6">
                 <div class="card gradient-1">
                     <div class="card-body">
                         <h3 class="card-title text-white">Jumlah Penduduk Tetap</h3>
                         <div class="d-inline-block">
                             <h2 class="text-white">{{ $datapenduduk_tetap->count() }}</h2>
                             <p class="text-white mb-0" id="tanggal"></p>
                         </div>
                         <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                     </div>
                 </div>
             </div>
             <div class="col-lg-12 col-sm-6">
                 <div class="card gradient-2">
                     <div class="card-body">
                         <h3 class="card-title text-white">Jumlah Penduduk Tidak tetap</h3>
                         <div class="d-inline-block">
                             <h2 class="text-white">{{ $datapenduduk_tidaktetap->count() }}</h2>
                             <p class="text-white mb-0" id="tanggal"></p>
                         </div>
                         <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                     </div>
                 </div>
             </div>
         </div>

         <div class="row">

             <div class="col-lg-6 col-md-12">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="card-title">MASYARAKAT DISABILITAS</h4>
                         <canvas id="disabilitasChart"></canvas>
                         <h5 class="mt-4">5 Terbanyak</h5>
                         <ul id="topDisabilitasList" class="list-group"></ul>
                     </div>
                 </div>
             </div>

             <div class="col-lg-6 col-md-12">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="card-title">PEKERJAAN UTAMA</h4>
                         <canvas id="pekerjaanChart"></canvas>
                         <h5 class="mt-4">5 Terbanyak</h5>
                         <ul id="topPekerjaanList" class="list-group"></ul>
                     </div>
                 </div>
             </div>
         </div>


         <div class="row">
             <div class="col-lg-12 col-md-12">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="card-title">STATISTIK KELAHIRAN BAYI</h4>
                         <div class="form-group">
                             <label for="selectYear">Pilih Tahun:</label>
                             <select class="form-control" id="selectYear">
                                 @for ($year = date('Y'); $year >= 2000; $year--)
                                     <option value="{{ $year }}">{{ $year }}</option>
                                 @endfor
                             </select>
                         </div>
                         <canvas id="bayiChart"></canvas>
                     </div>
                 </div>
             </div>
         </div>







         {{-- PEKRJAAN UTAMA --}}
         {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
         <script>
             document.addEventListener('DOMContentLoaded', function() {

                 function combineLabelsAndCounts(labels, counts) {
                     var combined = {};
                     labels.forEach(function(label, index) {
                         var cleanedLabel = (label || '').trim().toUpperCase();
                         if (!cleanedLabel) return;
                         if (combined[cleanedLabel]) {
                             combined[cleanedLabel] += counts[index];
                         } else {
                             combined[cleanedLabel] = counts[index];
                         }
                     });
                     return Object.entries(combined).map(function([label, value]) {
                         return {
                             label: label,
                             value: value
                         };
                     });
                 }

                 function renderTopList(containerId, data, badgeClass) {
                     var container = document.getElementById(containerId);
                     container.innerHTML = '';
                     data.forEach(function(item) {
                         var li = document.createElement('li');
                         li.className = 'list-group-item d-flex justify-content-between align-items-center';
                         li.innerHTML = '<span>' + item.label + '</span><span class="badge ' + badgeClass +
                             ' badge-pill">' + item.value + '</span>';
                         container.appendChild(li);
                     });
                 }

                 // ===================== PEKERJAAN UTAMA =====================
                 var rawPekerjaanLabels = @json($pekerjaanLabels);
                 var rawPekerjaanCounts = @json($pekerjaanCounts);
                 var pekerjaanData = combineLabelsAndCounts(rawPekerjaanLabels, rawPekerjaanCounts);
                 var topPekerjaan = pekerjaanData.sort(function(a, b) {
                     return b.value - a.value;
                 }).slice(0, 5);
                 renderTopList('topPekerjaanList', topPekerjaan, 'badge-primary');

                 var ctxPekerjaan = document.getElementById('pekerjaanChart').getContext('2d');
                 var pekerjaanChart = new Chart(ctxPekerjaan, {
                     type: 'pie',
                     data: {
                         labels: pekerjaanData.map(function(item) {
                             return item.label;
                         }),
                         datasets: [{
                             data: pekerjaanData.map(function(item) {
                                 return item.value;
                             }),
                             backgroundColor: pekerjaanData.map(function() {
                                 return 'rgba(' + Math.floor(Math.random() * 256) + ',' +
                                     Math.floor(Math.random() * 256) + ',' +
                                     Math.floor(Math.random() * 256) + ', 0.7)';
                             }),
                         }]
                     },
                     options: {
                         plugins: {
                             legend: {
                                 display: false
                             },
                             tooltip: {
                                 callbacks: {
                                     label: function(tooltipItem) {
                                         var index = tooltipItem.dataIndex;
                                         var label = pekerjaanData[index].label;
                                         var value = pekerjaanData[index].value;
                                         return label + ': ' + value;
                                     }
                                 }
                             }
                         }
                     }
                 });

                 // ===================== DISABILITAS =====================
                 var rawDisabilitasLabels = @json($disabilitasLabels);
                 var rawDisabilitasCounts = @json($disabilitasCounts);
                 var disabilitasData = combineLabelsAndCounts(rawDisabilitasLabels, rawDisabilitasCounts);
                 var topDisabilitas = disabilitasData.sort(function(a, b) {
                     return b.value - a.value;
                 }).slice(0, 5);
                 renderTopList('topDisabilitasList', topDisabilitas, 'badge-success');

                 var ctxDisabilitas = document.getElementById('disabilitasChart').getContext('2d');
                 var disabilitasChart = new Chart(ctxDisabilitas, {
                     type: 'pie',
                     data: {
                         labels: disabilitasData.map(function(item) {
                             return item.label;
                         }),
                         datasets: [{
                             data: disabilitasData.map(function(item) {
                                 return item.value;
                             }),
                             backgroundColor: disabilitasData.map(function() {
                                 return 'rgba(' + Math.floor(Math.random() * 256) + ',' +
                                     Math.floor(Math.random() * 256) + ',' +
                                     Math.floor(Math.random() * 256) + ', 0.7)';
                             }),
                         }]
                     },
                     options: {
                         plugins: {
                             legend: {
                                 display: false
                             },
                             tooltip: {
                                 callbacks: {
                                     label: function(tooltipItem) {
                                         var index = tooltipItem.dataIndex;
                                         var label = disabilitasData[index].label;
                                         var value = disabilitasData[index].value;
                                         return label + ': ' + value;
                                     }
                                 }
                             }
                         }
                     }
                 });

             });

             // {{-- KELAHIRAN --}}
             document.addEventListener('DOMContentLoaded', function() {
                 // Ambil elemen canvas dan tahun dari halaman
                 const canvas = document.getElementById('bayiChart');
                 const selectYear = document.getElementById('selectYear');

                 // Inisialisasi konteks dan set default tahun
                 var ctx3 = canvas.getContext('2d');
                 let selectedYear = selectYear.value;

                 // Inisialisasi variabel untuk menyimpan instance grafik
                 let bayiChartInstance = null;

                 // Fungsi untuk memperbarui grafik dengan data baru
                 function updateChart(year) {
                     // Gunakan AJAX untuk mengambil data dari metode Anda
                     fetch(`/get-birth-data/${year}`)
                         .then(response => response.json())
                         .then(data => {
                             const months = Object.keys(data);
                             const counts = Object.values(data);

                             // Periksa apakah ada instance grafik sebelumnya
                             if (bayiChartInstance) {
                                 bayiChartInstance.data.labels = months;
                                 bayiChartInstance.data.datasets[0].data = counts;
                                 bayiChartInstance.update();
                             } else {
                                 // Jika tidak ada instance grafik, buat baru
                                 bayiChartInstance = new Chart(ctx3, {
                                     type: 'line',
                                     data: {
                                         labels: months,
                                         datasets: [{
                                             label: 'Jumlah Kelahiran',
                                             data: counts,
                                             backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                             borderColor: 'rgba(75, 192, 192, 1)',
                                             borderWidth: 1
                                         }]
                                     },
                                     options: {
                                         scales: {
                                             y: {
                                                 beginAtZero: true
                                             }
                                         }
                                     }
                                 });
                             }
                         });
                 }

                 // Panggil fungsi pertama kali
                 updateChart(selectedYear);

                 // Tambahkan event listener untuk mengupdate grafik saat tahun berubah
                 selectYear.addEventListener('change', function() {
                     selectedYear = selectYear.value;
                     // Perbarui grafik dengan tahun baru
                     updateChart(selectedYear);
                 });
             });


             // {{-- stastik penduduk --}}
             var today = new Date();
             var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
                 "November", "December"
             ];
             var month = months[today.getMonth()]; // Ambil nama bulan dari array

             var date = today.getDate() + ' ' + month + ' ' + today.getFullYear();
             document.getElementById("tanggal").innerHTML = date;
         </script>



     </div>





     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 @endsection
