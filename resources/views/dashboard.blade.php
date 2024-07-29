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
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">PERKEJAAN UTAMA</h4>
                        <canvas id="pekerjaanChart"></canvas>
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

                var pieChart = new Chart(ctxPekerjaan, {
                    type: 'pie',
                    data: {
                        labels: pekerjaanLabels,
                        datasets: [{
                            data: pekerjaanCounts,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.7)',
                                'rgba(54, 162, 235, 0.7)',
                                // ... tambahkan warna lain jika diperlukan
                            ],
                        }]
                    },
                    options: {
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

            // {{-- DISABILITAS --}}
            document.addEventListener('DOMContentLoaded', function() {
                var ctxDisabilitas = document.getElementById('disabilitasChart').getContext('2d');
                var disabilitasLabels = @json($disabilitasLabels);
                var disabilitasCounts = @json($disabilitasCounts);

                var pieChart = new Chart(ctxDisabilitas, {
                    type: 'pie',
                    data: {
                        labels: disabilitasLabels,
                        datasets: [{
                            data: disabilitasCounts,
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(153, 102, 255, 0.7)',
                                // ... tambahkan warna lain jika diperlukan
                            ],
                        }]
                    },
                    options: {
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
