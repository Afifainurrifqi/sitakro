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
                            <h2 class="card-title">SDGS DATA PENGHASILAN</h2>
                        </div>
                        <table class="table table-striped table-bordered zero-configuration" id="tabledatapenghasilan">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>No</th>
                                    <th>KK</th>
                                    <th>NIK</th>
                                    <th>Gelar awal</th>
                                    <th>Nama</th>
                                    <th>Gelar akhir</th>
                                    <th>SUMBER PENGHASILAN</th>
                                    <th>JUMLAH ASET DARI SUMBER PENGHASILAN</th>
                                    <th>SATUAN</th>
                                    <th>PENGHASILAN SETAHUN</th>
                                    <th>DI EKSPOR</th>
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
            $('#tabledatapenghasilan').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: '/datapenghasilan/json',
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
                        data: 'sumber',
                        name: 'sumber'
                    },
                    {
                        data: 'jumlah_aset',
                        name: 'jumlah_aset'
                    },
                    {
                        data: 'satuan',
                        name: 'satuan'
                    },
                    {
                        data: 'penghasilan',
                        name: 'penghasilan'
                    },
                    {
                        data: 'ekspor',
                        name: 'ekspor'
                    },
                ]
            });
        });
    </script>
@endsection
