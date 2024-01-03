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
                            <h2 class="card-title">LOKASI DAN PEMUKIMAN</h2>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatalokasidanpemukiman">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>No</th>
                                        <th>NO KK</th>
                                        <th>NAMA</th>
                                        <th>ALAMAT</th>
                                        <th>NO. HP</th>
                                        <th>NO. Telpon Rumah</th>
                                        <th>NIK Kepala Keluarga</th>
                                        <th>TEMPAT TINGGAL YANG DITEMPATI</th>
                                        <th>STATUS LAHAN</th>
                                        <th>LUAS LANTAI TEMPAT TINGGAL (m2)</th>
                                        <th>LUAS TANAH TEMPAT TINGGAL (m2)</th>
                                        <th>JENIS LANTAI TEMPAT TINGGAL TERLUAS</th>
                                        <th>DINDING SEBAGIAN BESAR RUMAH</th>
                                        <th>JENDELA</th>
                                        <th>ATAP</th>
                                        <th>PENERANGAN RUMAH</th>
                                        <th>ENERGI UNTUK MEMASAK</th>
                                        <th>JIKA MENGGUNAKAN KAYU BAKAR, SUMBER KAYU BAKAR</th>
                                        <th>TEMPAT PEMBUANGAN SAMPAH</th>
                                        <th>FASILITAS MCK</th>
                                        <th>SUMBER AIR MANDI TERBANYAK DARI</th>
                                        <th>FASILITAS BUANG AIR BESAR</th>
                                        <th>SUMBER AIR MINUM TERBANYAK</th>
                                        <th>TEMPAT PEMBUANGAN AIR LIMBAH</th>
                                        <th>RUMAH DILEWATI SUTET</th>
                                        <th>RUMAH DIPANTARAN SUNGAI</th>
                                        <th>RUMAH DI LERENG GUNUNG / BUKIT</th>
                                        <th>KONDISI RUMAH KUMUH / TIDAK</th>
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
            $('#tabledatalokasidanpemukiman').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: '/lokasidanpemukiman/json',
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
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'nohp',
                        name: 'nohp'
                    },
                    {
                        data: 'nowa',
                        name: 'nowa'
                    },
                    {
                        data: 'nik_kepala',
                        name: 'nik_kepala'
                    },
                    {
                        data: 'tempat_tinggal',
                        name: 'tempat_tinggal'
                    },
                    {
                        data: 'status_lahan',
                        name: 'status_lahan'
                    },
                    {
                        data: 'luas_lantai_tinggal',
                        name: 'luas_lantai_tinggal'
                    },
                    {
                        data: 'luas_tanah_tinggal',
                        name: 'luas_tanah_tinggal'
                    },
                    {
                        data: 'jenis_lantai_tinggal',
                        name: 'jenis_lantai_tinggal'
                    },
                    {
                        data: 'dinding_sebagian',
                        name: 'dinding_sebagian'
                    },
                    {
                        data: 'jendela',
                        name: 'jendela'
                    },
                    {
                        data: 'atap',
                        name: 'atap'
                    },
                    {
                        data: 'penerangan',
                        name: 'penerangan'
                    },
                    {
                        data: 'energi_masak',
                        name: 'energi_masak'
                    },
                    {
                        data: 'jika_kayu_jenis',
                        name: 'jika_kayu_jenis'
                    },
                    {
                        data: 'tempat_sampah',
                        name: 'tempat_sampah'
                    },
                    {
                        data: 'mck',
                        name: 'mck'
                    },
                    {
                        data: 'sumber_air_mandi',
                        name: 'sumber_air_mandi'
                    },
                    {
                        data: 'sumber_air_mck',
                        name: 'sumber_air_mck'
                    },
                    {
                        data: 'sumber_air_minum',
                        name: 'sumber_air_minum'
                    },
                    {
                        data: 'tempat_pembuangan_limbah',
                        name: 'tempat_pembuangan_limbah'
                    },
                    {
                        data: 'rumah_sungai',
                        name: 'rumah_sungai'
                    },
                    {
                        data: 'rumah_sutet',
                        name: 'rumah_sutet'
                    },
                    {
                        data: 'rumah_lereng_gunung',
                        name: 'rumah_lereng_gunung'
                    },
                    {
                        data: 'kondi_rumah_kumuh',
                        name: 'kondi_rumah_kumuh'
                    },
                ]
            });
        });
    </script>
@endsection
