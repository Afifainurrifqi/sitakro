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
                            <h2 class="card-title">SDGS DATA PEKERJAAN</h2>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatapekerjaansdgs">
                                <thead>
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


            </div>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                var $ = jQuery.noConflict();
                $(function() {
                    $('#tabledatapekerjaansdgs').DataTable({
                        processing: true,
                        serverSide: true,
                        scrollX: true,
                        ajax: '/datasdgspekerjaan/json',
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
                });
            </script>
        @endsection
