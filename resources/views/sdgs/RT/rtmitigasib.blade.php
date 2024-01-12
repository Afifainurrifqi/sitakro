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
                            <h2 class="card-title">MITIGASI BENCANA</h2>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatartmitigasib">
                                <thead>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <tr>
                                        <th>Action</th>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>NAMA KETUA RT</th>
                                        <th>ALAMAT</th>
                                        <th>RT</th>
                                        <th>RW</th>
                                        <th>NO. HP / TELEPON</th>
                                        <th>SISTEM PERINGATAN DINI BENCANA ALAM</th>
                                        <th>SISTEM PERINGATAN DINI KHUSUS TSUNAMI</th>
                                        <th>PERLENGKAPAN KESELAMATAN</th>
                                        <th>RAMBU-RAMBU JALUR EVAKUASI BENCANA</th>
                                        <th>PEMBUATAN / PERAWATAN / NORMALISASI SUNGAI, KANAL, PARIT, DRAINASE, DLL</th>
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
            $('#tabledatartmitigasib').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: {
                    url: '{!! route('rtmitigasib.json') !!}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                },
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
                        data: 'mitigasi_sp',
                        name: 'mitigasi_sp',
                    },
                    {
                        data: 'mitigasi_spd',
                        name: 'mitigasi_spd',
                    },
                    {
                        data: 'mitigasi_pk',
                        name: 'mitigasi_pk',
                    },
                    {
                        data: 'mitigasi_rrj',
                        name: 'mitigasi_rrj',
                    },
                    {
                        data: 'mitigasi_ppn',
                        name: 'mitigasi_ppn',
                    },


                ]

            });
        });
    </script>
@endsection
