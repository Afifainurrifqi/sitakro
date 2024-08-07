@extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            @if (session('msg'))
                                <div class="alert alert-success">
                                    {{ session('msg') }}
                                </div>
                            @endif
                            <h2 class="card-title">Data Dasa Wisma</h2><br>
                             <form id="search-form">
                                <div class="form-group">
                                    <label for="nik">Cari berdasarkan NIK:</label>
                                    <input type="text" class="form-control" id="searchNIK" name="nik" placeholder="Masukkan NIK">
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatadw">
                                <thead>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <tr>
                                        <th>Action</th>
                                        {{-- <th>Status</th> --}}
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Gelar Awal</th>
                                        <th>Nama</th>
                                        <th>Gelar Akhir</th>
                                        <th>Jenis Kelamin</th>
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
                searching: false,
                ajax: {
                    url: '{!! route('datadw.json') !!}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(d) {
                        d.nik = $('#searchNIK').val();
                    }
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
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin'
                    },
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

            $('#searchNIK').on('keyup', function() {
                table.draw();
            });
        });
    </script>
@endsection
