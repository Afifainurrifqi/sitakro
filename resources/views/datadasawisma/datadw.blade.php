@extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if (session('msg'))
                            <div class="alert alert-success">{{ session('msg') }}</div>
                        @endif
                        <h2 class="card-title">Data Dasa Wisma</h2><br>
                        <form id="search-form" onsubmit="return false;">
                            <div class="form-group mb-0">
                                <label for="searchNIK">Cari berdasarkan NIK:</label>
                                <input type="text" class="form-control" id="searchNIK" name="nik"
                                    placeholder="Masukkan NIK (min. 4 digit)">
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered w-100" id="tabledatadw">
                                <thead>
                                    <tr>
                                        <th>Action</th>
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
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script>
        (function($) {
            // util debounce sederhana
            function debounce(fn, delay) {
                let t;
                return function() {
                    clearTimeout(t);
                    const ctx = this,
                        args = arguments;
                    t = setTimeout(() => fn.apply(ctx, args), delay);
                }
            }

            $(function() {
                var $nik = $('#searchNIK');

                var table = $('#tabledatadw').DataTable({
                    processing: true,
                    serverSide: true,
                    searching: false, // kita kontrol sendiri via input
                    deferLoading: 0, // tampilkan 0 records dulu
                    ajax: function(data, callback, settings) {
                        var nikVal = ($nik.val() || '').trim();

                        // Jika NIK blm diisi atau terlalu pendek, jangan call server — kembalikan kosong
                        if (nikVal.length < 4) {
                            callback({
                                draw: data.draw, // penting agar DataTables tidak error
                                recordsTotal: 0,
                                recordsFiltered: 0,
                                data: []
                            });
                            return;
                        }

                        // Kalau valid, baru panggil server
                        $.ajax({
                            url: "{{ route('datadw.jsonadmin') }}",
                            type: 'POST',
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: $.extend({}, data, {
                                nik: nikVal
                            }), // kirim parameter NIK + payload DataTables
                            success: function(json) {
                                callback(json);
                            },
                            error: function(xhr) {
                                // fallback agar tidak TN/7
                                callback({
                                    draw: data.draw,
                                    recordsTotal: 0,
                                    recordsFiltered: 0,
                                    data: []
                                });
                                console.error('Ajax error:', xhr.responseText || xhr
                                    .statusText);
                            }
                        });
                    },
                    columns: [{
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'nik',
                            name: 'nik'
                        },
                        {
                            data: 'gelarawal',
                            name: 'gelarawal',
                            defaultContent: '-'
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'gelarakhir',
                            name: 'gelarakhir',
                            defaultContent: '-'
                        },
                        {
                            data: 'jenis_kelamin',
                            name: 'jenis_kelamin',
                            defaultContent: '-'
                        },
                        {
                            data: 'alamat',
                            name: 'alamat',
                            defaultContent: '-'
                        },
                        {
                            data: 'rt',
                            name: 'rt',
                            defaultContent: '-'
                        },
                        {
                            data: 'rw',
                            name: 'rw',
                            defaultContent: '-'
                        },
                    ],
                    order: [
                        [2, 'asc']
                    ], // urut default by NIK
                });

                // Trigger reload dengan debounce (ketik 300ms)
                $nik.on('keyup change', debounce(function() {
                    table.ajax.reload();
                }, 300));
            });
        })(jQuery);
    </script>
@endsection
