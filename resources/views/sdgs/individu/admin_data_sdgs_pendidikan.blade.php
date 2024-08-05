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
                            <h2 class="card-title">SDGS PENDIDIKAN</h2>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatapendidikansdgs">
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
                                        <th>Pendidikan Tertinggi</th>
                                        <th>Berapa Tahun mengenyam pendidikan dasar (SD,SMP,SMA)</th>
                                        <th>Pendidikan yang sedang di ikuti</th>
                                        <th>Bahasa yang digunakan di Rumah dan Pemukiman</th>
                                        <th>Bahasa yang digunakan di Lembaga Formal</th>
                                        <th>Jumlah kerja bakti 1 tahun terakhir</th>
                                        <th>Siskamling 1 tahun terakhir</th>
                                        <th>Pesta Rakyat (Adat) 1 tahun terakhir</th>
                                        <th>Frekuensi Melayat 1 tahun terakhir</th>
                                        <th>Frekuensi besuk orang sakit 1 tahun terakhir</th>
                                        <th>Frekuensi menolong kecelakaan 1 tahun terakhir</th>
                                        <th>Mendapatkan Pelayanan Desa 1 tahun terakhir</th>
                                        <th>Bagaimana pelayanan desa yang diperoleh?</th>
                                        <th>Pernah menyampaikan masukan/saran kepada pihak Desa?</th>
                                        <th>Bagaimana keterbukaan desa terhadap masukan?</th>
                                        <th>Terjadi Bencana 1 tahun terakhir</th>
                                        <th>Apakah anda terkena dampak bencana</th>
                                        <th>Apakah menerima pemenuhan Kebutuhan Dasar saat Bencana (makanan, pakaian, tempat
                                            tinggal)?</th>
                                        <th>Apakah ada penanganan psikososial keluarga terdampak bencana
                                            (penyuluhan/konseling/terapi)?</th>
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
                            <h4 class="card-title">PENDIDIKAN TERTINGGI</h4>
                            <canvas id="pendidikanChart"></canvas>
                        </div>
                    </div>
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
            $('#tabledatapendidikansdgs').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                searching: true,
                ajax: {
                    url: '{!! route('datasdgspendidikan.jsonadmin') !!}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(d) {
                        d.nik = $('#search_nik').val(); // Pass the NIK input value
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
                        data: 'pendidikan_tertinggi',
                        name: 'pendidikan_tertinggi'
                    },
                    {
                        data: 'berapa_tahunp',
                        name: 'berapa_tahunp'
                    },
                    {
                        data: 'pendidikan_diikuti',
                        name: 'pendidikan_diikuti'
                    },
                    {
                        data: 'bahasa_Rumah',
                        name: 'bahasa_Rumah'
                    },
                    {
                        data: 'bahasa_Formal',
                        name: 'bahasa_Formal'
                    },
                    {
                        data: 'jumlah_kerja1',
                        name: 'jumlah_kerja1'
                    },
                    {
                        data: 'skamling1',
                        name: 'skamling1'
                    },
                    {
                        data: 'pesta_rakyat1',
                        name: 'pesta_rakyat1'
                    },
                    {
                        data: 'frekuensiml',
                        name: 'frekuensiml'
                    },
                    {
                        data: 'frekuensib',
                        name: 'frekuensib'
                    },
                    {
                        data: 'frekuensimn',
                        name: 'frekuensimn'
                    },
                    {
                        data: 'mendapatp1',
                        name: 'mendapatp1'
                    },
                    {
                        data: 'bagaiamanap',
                        name: 'bagaiamanap'
                    },

                    {
                        data: 'pernahmasukan',
                        name: 'pernahmasukan'
                    },
                    {
                        data: 'keterbukaands',
                        name: 'keterbukaands'
                    },
                    {
                        data: 'bencana1',
                        name: 'bencana1'
                    },
                    {
                        data: 'apakahb',
                        name: 'apakahb'
                    },
                    {
                        data: 'apakahd',
                        name: 'apakahd'
                    },
                    {
                        data: 'apakahp',
                        name: 'apakahp'
                    },


                ]
            });
            $('#search_nokk').on('keyup', function() {
                $('#tabledatapendidikansdgs').DataTable().ajax.reload();
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var ctxPekerjaan = document.getElementById('pendidikanChart').getContext('2d');
            var pendidikanLabels = @json($pendidikanLabels);
            var pendidikanCounts = @json($pendidikanCounts);

            var barChart = new Chart(ctxPekerjaan, {
                type: 'pie', // Change the chart type to 'bar'
                data: {
                    labels: pendidikanLabels,
                    datasets: [{
                        data: pendidikanCounts,
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
