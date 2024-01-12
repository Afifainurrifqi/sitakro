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
                            <h2 class="card-title">LOKASI</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatartlokasi">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Action</th>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">NIK</th>
                                        <th rowspan="2">NAMA KETUA RT</th>
                                        <th rowspan="2">ALAMAT</th>
                                        <th rowspan="2">RT</th>
                                        <th rowspan="2">RW</th>
                                        <th rowspan="2">NO. HP / TELEPON</th>
                                        <th rowspan="2">LOKASI RT TERLETAK DI PULAU</th>
                                        <th rowspan="2">TOPOGRAFI TERLUAS WILAYAH RT</th>
                                        <th rowspan="2">JUMLAH WARGA DI LERENG / PUNCAK</th>
                                        <th rowspan="2">PENANAMAN / PEMELIHARAAN PEPOHONAN DI LAHAN KRITIS</th>
                                        <th rowspan="2">PANJANG GARIS PANTAI</th>
                                        <th rowspan="2">PEMANFAATAN LAUT PERIKANAN TANGKAP</th>
                                        <th rowspan="2">PEMANFAATAN LAUT PERIKANAN BUDIDAYA</th>
                                        <th rowspan="2">PEMANFAATAN LAUT TAMBAK GARAM</th>
                                        <th rowspan="2">PEMANFAATAN LAUT WISATA BAHARI</th>
                                        <th rowspan="2">PEMANFAATAN LAUT TRANSPORTASI UMUM</th>
                                        <th rowspan="2">KONDISI MANGROVE</th>
                                        <th rowspan="2">PENANAMAN MANGROVE</th>
                                        <th rowspan="2">JUMLAH WARGA DI WILAYAH PESISIR</th>
                                        <th rowspan="2">JUMLAH WARGA TINGGAL DI ATAS AIR</th>
                                        <th rowspan="2">WILAYAH DESA DI DALAM HUTAN (ha)</th>
                                        <th rowspan="2">WILAYAH DESA DI TEPI HUTAN (ha)</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">FUNGSI
                                            HUTAN</th>
                                        <th rowspan="2">JUMLAH WARGA YANG TINGGAL DI DALAM HUTAN</th>
                                        <th rowspan="2">JUMLAH WARGA YANG TINGGAL DI SEKITAR HUTAN</th>
                                        <th rowspan="2">KETERGANTUNGAN WARGA TERHADAP HUTAN</th>
                                        <th rowspan="2">REBOISASI (PENGHIJAUAN) HUTAN</th>
                                        <th rowspan="2">JUMLAH PENDUDUK LUAR DESA YANG MASUK DAN MENETAP DI DESA SETAHUN
                                            TERAKHIR</th>
                                        <th rowspan="2">JUMLAH PENDUDUK YANG KELUAR DARI DESA SETAHUN TERAKHIR</th>
                                    </tr>
                                    <tr>
                                        <th>Konservasi (ha)</th>
                                        <th>Lindung (ha)</th>
                                        <th>Produksi (ha)</th>
                                        <th style="border-right: 1px solid #000;">Hutan Desa (ha)</th>
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        var $ = jQuery.noConflict();
        $(function() {
            $('#tabledatartlokasi').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: '/rtlokasi/json',
                columns: [{
                        data: 'action',
                        name: 'action',
                    },
                    {
                        data: 'id',
                        name: 'id',
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
                        data: 'lokasi_rt_pulau',
                        name: 'lokasi_rt_pulau',
                    },
                    {
                        data: 'topo_terluas_rt',
                        name: 'topo_terluas_rt',
                    },
                    {
                        data: 'jumlah_warga_lereng',
                        name: 'jumlah_warga_lereng',
                    },
                    {
                        data: 'penanaman_pohon_lahan_kritis',
                        name: 'penanaman_pohon_lahan_kritis',
                    },
                    {
                        data: 'pantai_garis_panjang',
                        name: 'pantai_garis_panjang',
                    },
                    {
                        data: 'pemanfaatan_laut_perangkap',
                        name: 'pemanfaatan_laut_perangkap',
                    },
                    {
                        data: 'pemanfaatan_laut_budidaya',
                        name: 'pemanfaatan_laut_budidaya',
                    },
                    {
                        data: 'pemanfaatan_laut_tambakg',
                        name: 'pemanfaatan_laut_tambakg',
                    },
                    {
                        data: 'pemanfaatan_laut_bahari',
                        name: 'pemanfaatan_laut_bahari',
                    },
                    {
                        data: 'pemanfaatan_laut_transport',
                        name: 'pemanfaatan_laut_transport',
                    },
                    {
                        data: 'kondisi_mangrove',
                        name: 'kondisi_mangrove',
                    },
                    {
                        data: 'penanaman_mangrove',
                        name: 'penanaman_mangrove',
                    },
                    {
                        data: 'jumlah_warga_pesisir',
                        name: 'jumlah_warga_pesisir',
                    },
                    {
                        data: 'jumlah_warga_atasair',
                        name: 'jumlah_warga_atasair',
                    },
                    {
                        data: 'wilayah_desa_dalamhutan',
                        name: 'wilayah_desa_dalamhutan',
                    },
                    {
                        data: 'wilayah_desa_tepihutan',
                        name: 'wilayah_desa_tepihutan',
                    },
                    {
                        data: 'fungsihutan_kons',
                        name: 'fungsihutan_kons',
                    },
                    {
                        data: 'fungsihutan_lindung',
                        name: 'fungsihutan_lindung',
                    },
                    {
                        data: 'fungsihutan_produk',
                        name: 'fungsihutan_produk',
                    },
                    {
                        data: 'fungsihutan_hutandes',
                        name: 'fungsihutan_hutandes',
                    },
                    {
                        data: 'jumlahwarga_tinggal_dalamhutan',
                        name: 'jumlahwarga_tinggal_dalamhutan',
                    },
                    {
                        data: 'jumlahwarga_tinggal_sekitarhutan',
                        name: 'jumlahwarga_tinggal_sekitarhutan',
                    },
                    {
                        data: 'ketergantungan_hutan',
                        name: 'ketergantungan_hutan',
                    },
                    {
                        data: 'reboisasi',
                        name: 'reboisasi',
                    },
                    {
                        data: 'jumlah_produk_luardesa_masuk',
                        name: 'jumlah_produk_luardesa_masuk',
                    },
                    {
                        data: 'jumlah_produk_luardesa_keluar',
                        name: 'jumlah_produk_luardesa_keluar',
                    },


                ],
                "error": function(xhr, error, thrown) {
                    console.log(xhr.responseText);
                }

            });
        });
    </script>
@endsection
