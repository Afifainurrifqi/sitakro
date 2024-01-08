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
                            <h2 class="card-title">DATA RT</h2>
                            <button type="button" class="btn mb-1 btn-primary"
                                onclick="window.location='{{ route('datart.create') }}'">
                                Tambah Data RT<span class="btn-icon-right"><i class="fa fa-plus-circle"></i></span>
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatart">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>NAMA RT</th>
                                        <th>ALAMAT</th>
                                        <th>RT</th>
                                        <th>RW</th>
                                        <th>NO HP</th>
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
            $('#tabledatart').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: '/datart/json',
                columns: [{
                        data: 'action',
                        name: 'action'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },

                    // Columns related to 'alamat'
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },

                    // Columns related to 'rt'
                    {
                        data: 'rt',
                        name: 'rt'
                    },

                    // Columns related to 'rw'
                    {
                        data: 'rw',
                        name: 'rw'
                    },

                    // Columns related to 'nohp'
                    {
                        data: 'nohp',
                        name: 'nohp'
                    },


                ],
                rowCallback: function(row, data, index) {
                    var table = $('#tabledatart').DataTable();
                    $('td:eq(1)', row).html(table.page.info().start + index + 1);
                }

            });
        });
    </script>
@endsection
