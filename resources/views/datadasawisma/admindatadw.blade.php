@extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                @if (session('msg'))
                                    <div class="alert alert-success mb-2">
                                        {{ session('msg') }}
                                    </div>
                                @endif
                                <h2 class="card-title mb-0">Data Dasa Wisma</h2>
                            </div>
                        </div>
                        <button type="button" class="btn mb-1 btn-primary"
                            onclick="window.location='{{ url('datadasawisma/tambah') }}'">
                            Tambah Dasawisma <span class="btn-icon-right"><i class="fa fa-plus-circle"></i></span>
                        </button>


                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatadw">
                                <thead>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <tr>
                                        <th>Action</th>
                                        {{-- <th>Status</th> --}}
                                        <th>No</th>
                                        {{-- <th>NOKK</th> --}}
                                        <th>NIK</th>
                                        {{-- <th>Gelar Awal</th> --}}
                                        <th>Nama</th>
                                        {{-- <th>Gelar Akhir</th> --}}
                                        <th>Alamat</th>
                                        <th>RT</th>
                                        <th>RW</th>
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
    <script type="text/javascript">
        $(function() {
            var table = $('#tabledatadw').DataTable({
                processing: true,
                serverSide: true,

                ajax: {
                    url: '{!! route('datadw.jsonadmin') !!}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                },
                columns: [{
                        data: 'action',
                        name: 'action'
                    },
                    // {
                    //     data: 'statusdw',
                    //     name: 'statusdw'
                    // },
                    {
                        data: null,
                        render: function(data, type, row, meta) {
                            // Menambahkan nomor urut otomatis
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    // {
                    //     data: 'nokk',
                    //     name: 'nokk'
                    // },
                    {
                        data: 'nik',
                        name: 'nik'
                    },
                    // {
                    //     data: 'gelarawal',
                    //     name: 'gelarawal'
                    // },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    // {
                    //     data: 'gelarakhir',
                    //     name: 'gelarakhir'
                    // },

                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'rt',
                        name: 'rt'
                    },
                    {
                        data: 'rw',
                        name: 'rw'
                    },
                ],
            });


        });
    </script>
@endsection
