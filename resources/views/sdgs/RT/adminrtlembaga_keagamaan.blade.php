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
                            <h2 class="card-title">LEMBAGA KEAGAMAAN</h2>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tablertagama">
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
                                        <th>NAMA</th>
                                        <th>JUMLAH PENGURUS</th>
                                        <th>JUMLAH ANGGOTA</th>
                                        <th>FASILITAS</th>
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
            $('#tablertagama').DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                ajax: {
                    url: '{!! route('rtlembaga_keagamaan.jsonadmin') !!}',
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
                        data: 'namalembaga',
                        name: 'namalembaga',
                    },
                    {
                        data: 'jumlah_peng',
                        name: 'jumlah_peng',
                    },
                    {
                        data: 'jumlah_ang',
                        name: 'jumlah_ang',
                    },
                    {
                        data: 'fasilitas',
                        name: 'fasilitas',
                    },


                ],
                "error": function(xhr, error, thrown) {
                    console.log(xhr.responseText);
                }

            });
            $('#search_nik').on('keyup', function() {
                        $('#tabledatartagama').DataTable().ajax.reload();
                    });
        });
    </script>
@endsection

