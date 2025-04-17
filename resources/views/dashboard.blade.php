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
                 var ctxPekerjaan = document.getElementById('pekerjaanChart').getContext('2d');
                 var pekerjaanLabels = @json($pekerjaanLabels);
                 var pekerjaanCounts = @json($pekerjaanCounts);

                 var ctxDisabilitas = document.getElementById('disabilitasChart').getContext('2d');
                 var disabilitasLabels = @json($disabilitasLabels);
                 var disabilitasCounts = @json($disabilitasCounts);

                 // Fungsi untuk menggabungkan label dan jumlah, dengan pengecekan angka valid
                 function combineLabelsAndCounts(labels, counts) {
                     var combined = {};
                     labels.forEach(function(label, index) {
                         var cleanedLabel = (label || '').trim().toUpperCase();
                         var count = parseInt(counts[index]);

                         if (!cleanedLabel || isNaN(count)) return;

                         if (combined[cleanedLabel]) {
                             combined[cleanedLabel] += count;
                         } else {
                             combined[cleanedLabel] = count;
                         }
                     });

                     return Object.entries(combined).map(function([label, value]) {
                         return {
                             label: label,
                             value: value
                         };
                     });
                 }

                 // ------ PEKERJAAN ------
                 var pekerjaanData = combineLabelsAndCounts(pekerjaanLabels, pekerjaanCounts);
                 var pekerjaanChartLabels = pekerjaanData.map(d => d.label);
                 var pekerjaanChartCounts = pekerjaanData.map(d => d.value);
                 var pekerjaanColors = pekerjaanChartCounts.map(() =>
                     'rgba(' + Math.floor(Math.random() * 256) + ',' +
                     Math.floor(Math.random() * 256) + ',' +
                     Math.floor(Math.random() * 256) + ', 0.7)'
                 );

                 var topPekerjaanData = pekerjaanData
                     .sort((a, b) => b.value - a.value)
                     .slice(0, 5);

                 var topPekerjaanList = document.getElementById('topPekerjaanList');
                 topPekerjaanList.innerHTML = '';
                 topPekerjaanData.forEach(item => {
                     var li = document.createElement('li');
                     li.className = 'list-group-item d-flex justify-content-between align-items-center';
                     li.innerHTML =
                         `<span>${item.label}</span><span class="badge badge-primary badge-pill">${item.value}</span>`;
                     topPekerjaanList.appendChild(li);
                 });

                 new Chart(ctxPekerjaan, {
                     type: 'pie',
                     data: {
                         labels: pekerjaanChartLabels,
                         datasets: [{
                             data: pekerjaanChartCounts,
                             backgroundColor: pekerjaanColors,
                         }]
                     },
                     options: {

                             legend: {
                                 display: false
                             }

                     }
                 });

                 // ------ DISABILITAS ------
                 var disabilitasData = combineLabelsAndCounts(disabilitasLabels, disabilitasCounts);
                 var disabilitasChartLabels = disabilitasData.map(d => d.label);
                 var disabilitasChartCounts = disabilitasData.map(d => d.value);
                 var disabilitasColors = disabilitasChartCounts.map(() =>
                     'rgba(' + Math.floor(Math.random() * 256) + ',' +
                     Math.floor(Math.random() * 256) + ',' +
                     Math.floor(Math.random() * 256) + ', 0.7)'
                 );

                 var topDisabilitasData = disabilitasData
                     .sort((a, b) => b.value - a.value)
                     .slice(0, 5);

                 var topDisabilitasList = document.getElementById('topDisabilitasList');
                 topDisabilitasList.innerHTML = '';
                 topDisabilitasData.forEach(item => {
                     var li = document.createElement('li');
                     li.className = 'list-group-item d-flex justify-content-between align-items-center';
                     li.innerHTML =
                         `<span>${item.label}</span><span class="badge badge-success badge-pill">${item.value}</span>`;
                     topDisabilitasList.appendChild(li);
                 });

                 new Chart(ctxDisabilitas, {
                     type: 'pie',
                     data: {
                         labels: disabilitasChartLabels,
                         datasets: [{
                             data: disabilitasChartCounts,
                             backgroundColor: disabilitasColors,
                         }]
                     },
                     options: {

                             legend: {
                                 display: false
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
