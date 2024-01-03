@extends('layout.main')


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
                                        <th>Apakah menerima pemenuhan Kebutuhan Dasar saat Bencana (makanan, pakaian, tempat tinggal)?</th>
                                        <th>Apakah ada penanganan psikososial keluarga terdampak bencana (penyuluhan/konseling/terapi)?</th>
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
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        var $ = jQuery.noConflict();
        $(function() {
            $('#tabledatapendidikansdgs').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: '/datasdgspendidikan/json',
                columns: [{
                        data: 'action',
                        name: 'action'
                    },
                    {
                        data: 'id',
                        name: 'id'
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
        });
    </script>
@endsection
