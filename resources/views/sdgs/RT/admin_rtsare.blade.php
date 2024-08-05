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
                            <h2 class="card-title">SARANA EKONOMI</h2>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatartsare">
                                <thead>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <tr>
                                        <th rowspan="2">Action</th>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">NIK</th>
                                        <th rowspan="2">NAMA KETUA RT</th>
                                        <th rowspan="2">ALAMAT</th>
                                        <th rowspan="2">RT</th>
                                        <th rowspan="2">RW</th>
                                        <th rowspan="2">NO. HP / TELEPON</th>
                                        <th colspan="4">Kelompok Pertokoan</th>
                                        <th colspan="4">Pasar dengan Bangunan Permanen</th>
                                        <th colspan="4">Pasar dengan Bangunan Semi Permanen</th>
                                        <th colspan="4">Pasar Tanpa Bangunan</th>
                                        <th colspan="4">Jumlah Minimarket/Swalayan</th>
                                        <th colspan="4">Toko/Warung Kelontong</th>
                                        <th colspan="4">Toko/Warung Kelontong (Bahan Pangan)</th>
                                        <th colspan="4">Restoran/Rumah Makan</th>
                                        <th colspan="4">Warung/Kedai Makanan Minuman</th>
                                        <th colspan="4">Hotel</th>
                                        <th colspan="4">Penginapan (Hostel/Motel/Losmen/Wisma)</th>
                                        <th colspan="4">Bengkel Mobil/Motor</th>
                                        <th colspan="4">Salon Kecantikan</th>
                                        <th colspan="4">Agen Tiket/Travel/Biro Perjalanan</th>
                                        <th colspan="4">Bank BRI</th>
                                        <th colspan="4">Agen BRI</th>
                                        <th colspan="4">Bank BNI</th>
                                        <th colspan="4">Agen BNI</th>
                                        <th colspan="4">Bank Mandiri</th>
                                        <th colspan="4">Agen Mandiri</th>
                                        <th colspan="4">Bank BPD</th>
                                        <th colspan="4">Agen BPD</th>
                                        <th colspan="4">Bank Umum Pemerintah Lainnya</th>
                                        <th colspan="4">Bank BCA</th>
                                        <th colspan="4">Bank CIMB/Niaga/Maybank</th>
                                        <th colspan="4">Bank Sinarmas</th>
                                        <th colspan="4">Bank Permata</th>
                                        <th colspan="4">Bank Swasta Lainnya</th>
                                        <th colspan="4">BPR (Bank Perkreditan Rakyat)</th>
                                        <th colspan="4">Baitul Maal Wa Tamwil (BMT)</th>
                                        <th colspan="4">Pegadaian</th>
                                        <th colspan="4">Anjungan Tunai Mandiri (ATM)</th>
                                        <th colspan="4">Sarana Ekonomi Lain</th>
                                    </tr>


                                    <tr>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>
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
        <style>
            .progress-bar {
                background-color: #28a745;
                color: green;
                /* Warna hijau, bisa disesuaikan */
            }
        </style>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        var $ = jQuery.noConflict();
        $(function() {
            $('#tabledatartsare').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                searching: true,
                ajax: {
                    url: '{!! route('rtsare.jsonadmin') !!}',
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
                        name: 'action',
                    },
                    {
                        data: null,
                        render: function(data, type, row, meta) {
                            // Menambahkan nomor urut otomatis
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {
                        data: 'nik',
                        name: 'nik',
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                    },
                    {
                        data: 'alamat',
                        name: 'alamat',
                    },
                    {
                        data: 'rt',
                        name: 'rt',
                    },
                    {
                        data: 'rw',
                        name: 'rw',
                    },
                    {
                        data: 'nohp',
                        name: 'nohp',
                    },
                    {
                        data: 'jumlah_toko',
                        name: 'jumlah_toko'
                    },
                    {
                        data: 'kondisi_toko',
                        name: 'kondisi_toko'
                    },
                    {
                        data: 'Jarak_toko',
                        name: 'Jarak_toko'
                    },
                    {
                        data: 'kemudahan_toko',
                        name: 'kemudahan_toko'
                    },
                    {
                        data: 'jumlah_pasar_permanen',
                        name: 'jumlah_pasar_permanen'
                    },
                    {
                        data: 'kondisi_pasar_permanen',
                        name: 'kondisi_pasar_permanen'
                    },
                    {
                        data: 'Jarak_pasar_permanen',
                        name: 'Jarak_pasar_permanen'
                    },
                    {
                        data: 'kemudahan_pasar_permanen',
                        name: 'kemudahan_pasar_permanen'
                    },
                    {
                        data: 'jumlah_semip',
                        name: 'jumlah_semip'
                    },
                    {
                        data: 'kondisi_semip',
                        name: 'kondisi_semip'
                    },
                    {
                        data: 'Jarak_semip',
                        name: 'Jarak_semip'
                    },
                    {
                        data: 'kemudahan_semip',
                        name: 'kemudahan_semip'
                    },
                    {
                        data: 'jumlah_tanpap',
                        name: 'jumlah_tanpap'
                    },
                    {
                        data: 'kondisi_tanpap',
                        name: 'kondisi_tanpap'
                    },
                    {
                        data: 'Jarak_tanpap',
                        name: 'Jarak_tanpap'
                    },
                    {
                        data: 'kemudahan_tanpap',
                        name: 'kemudahan_tanpap'
                    },
                    {
                        data: 'jumlah_minimarket',
                        name: 'jumlah_minimarket'
                    },
                    {
                        data: 'kondisi_minimarket',
                        name: 'kondisi_minimarket'
                    },
                    {
                        data: 'Jarak_minimarket',
                        name: 'Jarak_minimarket'
                    },
                    {
                        data: 'kemudahan_minimarket',
                        name: 'kemudahan_minimarket'
                    },
                    {
                        data: 'jumlah_warungk',
                        name: 'jumlah_warungk'
                    },
                    {
                        data: 'kondisi_warungk',
                        name: 'kondisi_warungk'
                    },
                    {
                        data: 'Jarak_warungk',
                        name: 'Jarak_warungk'
                    },
                    {
                        data: 'kemudahan_warungk',
                        name: 'kemudahan_warungk'
                    },
                    {
                        data: 'jumlah_warungp',
                        name: 'jumlah_warungp'
                    },
                    {
                        data: 'kondisi_warungp',
                        name: 'kondisi_warungp'
                    },
                    {
                        data: 'Jarak_warungp',
                        name: 'Jarak_warungp'
                    },
                    {
                        data: 'kemudahan_warungp',
                        name: 'kemudahan_warungp'
                    },
                    {
                        data: 'jumlah_restoran',
                        name: 'jumlah_restoran'
                    },
                    {
                        data: 'kondisi_restoran',
                        name: 'kondisi_restoran'
                    },
                    {
                        data: 'Jarak_restoran',
                        name: 'Jarak_restoran'
                    },
                    {
                        data: 'kemudahan_restoran',
                        name: 'kemudahan_restoran'
                    },
                    {
                        data: 'jumlah_kedaim',
                        name: 'jumlah_kedaim'
                    },
                    {
                        data: 'kondisi_kedaim',
                        name: 'kondisi_kedaim'
                    },
                    {
                        data: 'Jarak_kedaim',
                        name: 'Jarak_kedaim'
                    },
                    {
                        data: 'kemudahan_kedaim',
                        name: 'kemudahan_kedaim'
                    },
                    {
                        data: 'jumlah_hotel',
                        name: 'jumlah_hotel'
                    },
                    {
                        data: 'kondisi_hotel',
                        name: 'kondisi_hotel'
                    },
                    {
                        data: 'Jarak_hotel',
                        name: 'Jarak_hotel'
                    },
                    {
                        data: 'kemudahan_hotel',
                        name: 'kemudahan_hotel'
                    },
                    {
                        data: 'jumlah_hostel',
                        name: 'jumlah_hostel'
                    },
                    {
                        data: 'kondisi_hostel',
                        name: 'kondisi_hostel'
                    },
                    {
                        data: 'Jarak_hostel',
                        name: 'Jarak_hostel'
                    },
                    {
                        data: 'kemudahan_hostel',
                        name: 'kemudahan_hostel'
                    },
                    {
                        data: 'jumlah_bengkelm',
                        name: 'jumlah_bengkelm'
                    },
                    {
                        data: 'kondisi_bengkelm',
                        name: 'kondisi_bengkelm'
                    },
                    {
                        data: 'Jarak_bengkelm',
                        name: 'Jarak_bengkelm'
                    },
                    {
                        data: 'kemudahan_bengkelm',
                        name: 'kemudahan_bengkelm'
                    },
                    {
                        data: 'jumlah_salonk',
                        name: 'jumlah_salonk'
                    },
                    {
                        data: 'kondisi_salonk',
                        name: 'kondisi_salonk'
                    },
                    {
                        data: 'Jarak_salonk',
                        name: 'Jarak_salonk'
                    },
                    {
                        data: 'kemudahan_salonk',
                        name: 'kemudahan_salonk'
                    },
                    {
                        data: 'jumlah_agent',
                        name: 'jumlah_agent'
                    },
                    {
                        data: 'kondisi_agent',
                        name: 'kondisi_agent'
                    },
                    {
                        data: 'Jarak_agent',
                        name: 'Jarak_agent'
                    },
                    {
                        data: 'kemudahan_agent',
                        name: 'kemudahan_agent'
                    },
                    {
                        data: 'jumlah_bankbri',
                        name: 'jumlah_bankbri'
                    },
                    {
                        data: 'kondisi_bankbri',
                        name: 'kondisi_bankbri'
                    },
                    {
                        data: 'Jarak_bankbri',
                        name: 'Jarak_bankbri'
                    },
                    {
                        data: 'kemudahan_bankbri',
                        name: 'kemudahan_bankbri'
                    },
                    {
                        data: 'jumlah_briag',
                        name: 'jumlah_briag'
                    },
                    {
                        data: 'kondisi_briag',
                        name: 'kondisi_briag'
                    },
                    {
                        data: 'Jarak_briag',
                        name: 'Jarak_briag'
                    },
                    {
                        data: 'kemudahan_briag',
                        name: 'kemudahan_briag'
                    },
                    {
                        data: 'jumlah_bankbni',
                        name: 'jumlah_bankbni'
                    },
                    {
                        data: 'kondisi_bankbni',
                        name: 'kondisi_bankbni'
                    },
                    {
                        data: 'Jarak_bankbni',
                        name: 'Jarak_bankbni'
                    },
                    {
                        data: 'kemudahan_bankbni',
                        name: 'kemudahan_bankbni'
                    },
                    {
                        data: 'jumlah_bniag',
                        name: 'jumlah_bniag'
                    },
                    {
                        data: 'kondisi_bniag',
                        name: 'kondisi_bniag'
                    },
                    {
                        data: 'Jarak_bniag',
                        name: 'Jarak_bniag'
                    },
                    {
                        data: 'kemudahan_bniag',
                        name: 'kemudahan_bniag'
                    },
                    {
                        data: 'jumlah_bankmandiri',
                        name: 'jumlah_bankmandiri'
                    },
                    {
                        data: 'kondisi_bankmandiri',
                        name: 'kondisi_bankmandiri'
                    },
                    {
                        data: 'Jarak_bankmandiri',
                        name: 'Jarak_bankmandiri'
                    },
                    {
                        data: 'kemudahan_bankmandiri',
                        name: 'kemudahan_bankmandiri'
                    },
                    {
                        data: 'jumlah_mandiriag',
                        name: 'jumlah_mandiriag'
                    },
                    {
                        data: 'kondisi_mandiriag',
                        name: 'kondisi_mandiriag'
                    },
                    {
                        data: 'Jarak_mandiriag',
                        name: 'Jarak_mandiriag'
                    },
                    {
                        data: 'kemudahan_mandiriag',
                        name: 'kemudahan_mandiriag'
                    },
                    {
                        data: 'jumlah_bankbpd',
                        name: 'jumlah_bankbpd'
                    },
                    {
                        data: 'kondisi_bankbpd',
                        name: 'kondisi_bankbpd'
                    },
                    {
                        data: 'Jarak_bankbpd',
                        name: 'Jarak_bankbpd'
                    },
                    {
                        data: 'kemudahan_bankbpd',
                        name: 'kemudahan_bankbpd'
                    },
                    {
                        data: 'jumlah_bpdag',
                        name: 'jumlah_bpdag'
                    },
                    {
                        data: 'kondisi_bpdag',
                        name: 'kondisi_bpdag'
                    },
                    {
                        data: 'Jarak_bpdag',
                        name: 'Jarak_bpdag'
                    },
                    {
                        data: 'kemudahan_bpdag',
                        name: 'kemudahan_bpdag'
                    },
                    {
                        data: 'jumlah_bankumum',
                        name: 'jumlah_bankumum'
                    },
                    {
                        data: 'kondisi_bankumum',
                        name: 'kondisi_bankumum'
                    },
                    {
                        data: 'Jarak_bankumum',
                        name: 'Jarak_bankumum'
                    },
                    {
                        data: 'kemudahan_bankumum',
                        name: 'kemudahan_bankumum'
                    },
                    {
                        data: 'jumlah_bankbca',
                        name: 'jumlah_bankbca'
                    },
                    {
                        data: 'kondisi_bankbca',
                        name: 'kondisi_bankbca'
                    },
                    {
                        data: 'Jarak_bankbca',
                        name: 'Jarak_bankbca'
                    },
                    {
                        data: 'kemudahan_bankbca',
                        name: 'kemudahan_bankbca'
                    },
                    {
                        data: 'jumlah_bankcimb',
                        name: 'jumlah_bankcimb'
                    },
                    {
                        data: 'kondisi_bankcimb',
                        name: 'kondisi_bankcimb'
                    },
                    {
                        data: 'Jarak_bankcimb',
                        name: 'Jarak_bankcimb'
                    },
                    {
                        data: 'kemudahan_bankcimb',
                        name: 'kemudahan_bankcimb'
                    },
                    {
                        data: 'jumlah_banksinarm',
                        name: 'jumlah_banksinarm'
                    },
                    {
                        data: 'kondisi_banksinarm',
                        name: 'kondisi_banksinarm'
                    },
                    {
                        data: 'Jarak_banksinarm',
                        name: 'Jarak_banksinarm'
                    },
                    {
                        data: 'kemudahan_banksinarm',
                        name: 'kemudahan_banksinarm'
                    },
                    {
                        data: 'jumlah_bankpermata',
                        name: 'jumlah_bankpermata'
                    },
                    {
                        data: 'kondisi_bankpermata',
                        name: 'kondisi_bankpermata'
                    },
                    {
                        data: 'Jarak_bankpermata',
                        name: 'Jarak_bankpermata'
                    },
                    {
                        data: 'kemudahan_bankpermata',
                        name: 'kemudahan_bankpermata'
                    },
                    {
                        data: 'jumlah_bankswastalain',
                        name: 'jumlah_bankswastalain'
                    },
                    {
                        data: 'kondisi_bankswastalain',
                        name: 'kondisi_bankswastalain'
                    },
                    {
                        data: 'Jarak_bankswastalain',
                        name: 'Jarak_bankswastalain'
                    },
                    {
                        data: 'kemudahan_bankswastalain',
                        name: 'kemudahan_bankswastalain'
                    },
                    {
                        data: 'jumlah_bankbpr',
                        name: 'jumlah_bankbpr'
                    },
                    {
                        data: 'kondisi_bankbpr',
                        name: 'kondisi_bankbpr'
                    },
                    {
                        data: 'Jarak_bankbpr',
                        name: 'Jarak_bankbpr'
                    },
                    {
                        data: 'kemudahan_bankbpr',
                        name: 'kemudahan_bankbpr'
                    },
                    {
                        data: 'jumlah_bmt',
                        name: 'jumlah_bmt'
                    },
                    {
                        data: 'kondisi_bmt',
                        name: 'kondisi_bmt'
                    },
                    {
                        data: 'Jarak_bmt',
                        name: 'Jarak_bmt'
                    },
                    {
                        data: 'kemudahan_bmt',
                        name: 'kemudahan_bmt'
                    },
                    {
                        data: 'jumlah_pegadaian',
                        name: 'jumlah_pegadaian'
                    },
                    {
                        data: 'kondisi_pegadaian',
                        name: 'kondisi_pegadaian'
                    },
                    {
                        data: 'Jarak_pegadaian',
                        name: 'Jarak_pegadaian'
                    },
                    {
                        data: 'kemudahan_pegadaian',
                        name: 'kemudahan_pegadaian'
                    },
                    {
                        data: 'jumlah_atm',
                        name: 'jumlah_atm'
                    },
                    {
                        data: 'kondisi_atm',
                        name: 'kondisi_atm'
                    },
                    {
                        data: 'Jarak_atm',
                        name: 'Jarak_atm'
                    },
                    {
                        data: 'kemudahan_atm',
                        name: 'kemudahan_atm'
                    },
                    {
                        data: 'jumlah_saranalain',
                        name: 'jumlah_saranalain'
                    },
                    {
                        data: 'kondisi_saranalain',
                        name: 'kondisi_saranalain'
                    },
                    {
                        data: 'Jarak_saranalain',
                        name: 'Jarak_saranalain'
                    },
                    {
                        data: 'kemudahan_saranalain',
                        name: 'kemudahan_saranalain'
                    },

                ],

            });

            $('#search_nokk').on('keyup', function() {
                $('#tabledatartsare').DataTable().ajax.reload();
            });
        });
    </script>
@endsection
