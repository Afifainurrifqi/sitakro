{{-- resources/views/datapenduduk/admindata.blade.php --}}
@extends(optional(Auth::user())->role === 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                @if (session('msg'))
                    <div class="alert alert-success">{{ session('msg') }}</div>
                @endif
                @if ($errors->has('file'))
                    <div class="alert alert-danger">{{ $errors->first('file') }}</div>
                @endif

                <div class="card">
                    <div class="card-body">

                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h2 class="card-title mb-0">Data Penduduk</h2>
                        </div>
 <div class="d-flex flex-wrap gap-2">
                                {{-- Tombol Import --}}
                                <button type="button" class="btn mb-1 btn-success" data-toggle="modal"
                                    data-target="#importModal">
                                    Import <span class="btn-icon-right"><i class="fa fa-file-excel-o"></i></span>
                                </button>

                                {{-- Tombol Tambah --}}
                                <button type="button" class="btn mb-1 btn-primary"
                                    onclick="window.location='{{ url('datapenduduk/add') }}'">
                                    Tambah penduduk <span class="btn-icon-right"><i class="fa fa-plus-circle"></i></span>
                                </button>
                            </div>
                        {{-- Modal Import --}}
                        <div class="modal fade" id="importModal" tabindex="-1" role="dialog"
                            aria-labelledby="importModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{ route('import_excel') }}" method="POST" enctype="multipart/form-data"
                                    class="modal-content">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="importModalLabel">Import Data Penduduk (CSV/XLS/XLSX)
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="file">Pilih file</label>
                                            <input type="file" name="file" id="file" class="form-control"
                                                accept=".csv,.xls,.xlsx" required>
                                            <small class="form-text text-muted">
                                                Format: CSV, XLS, atau XLSX. Baris pertama harus header. Contoh kolom:
                                                <code>NIK, Nama, JK, TempatLahir, TanggalLahir(YYYY-MM-DD), Alamat, RT,
                                                    RW</code>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success">Import</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <table class="table table-striped table-bordered" id="tabledatapenduduk_b">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>No</th>
                                        <th>Updated</th>
                                        <th>No KK</th>
                                        <th>NIK</th>
                                        <th>Gelar awal</th>
                                        <th>Nama</th>
                                        <th>Gelar akhir</th>
                                        <th>Jenis kelamin</th>
                                        <th>Tempat lahir</th>
                                        <th>Tanggal_lahir</th>
                                        <th>Agama</th>
                                        <th>Pendidikan</th>
                                        <th>Pekejaan</th>
                                        <th>Goldar</th>
                                        <th>Status</th>
                                        <th>Tanggal perkawinan</th>
                                        <th>Hubungan</th>
                                        <th>Ayah</th>
                                        <th>Ibu</th>
                                        <th>alamat</th>
                                        <th>RT</th>
                                        <th>RW</th>
                                        <th>Status kependudukan</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    {{-- DataTables + Buttons + JSZip --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

    <script type="text/javascript">
        var $ = jQuery.noConflict();
        $(function() {
            // Filename export dinamis
            var now = new Date();
            var pad = n => String(n).padStart(2, '0');
            var stamp = now.getFullYear() + pad(now.getMonth() + 1) + pad(now.getDate()) + '_' + pad(now
            .getHours()) + pad(now.getMinutes());
            var excelFileName = 'datapenduduk_' + stamp;

            function mapJK(val) {
                const m = {
                    '1': 'Laki-laki',
                    '2': 'Perempuan',
                    '0': 'Perempuan'
                };
                return m[String(val)] ?? (val ?? '');
            }

            var table = $('#tabledatapenduduk_b').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                searching: true,
                dom: 'Bfrtip',
                ajax: {
                    url: '{!! route('datapenduduk.jsonadmin') !!}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                },
                buttons: [{
                    extend: 'excelHtml5',
                    text: '<button class="btn"><i class="fa fa-file-excel-o" style="color: green;"></i>  EXPORT EXCEL</button>',
                    titleAttr: 'Excel',
                    action: newexportaction,
                    filename: excelFileName,
                    title: null,
                    sheetName: 'Data Penduduk',
                    exportOptions: {
                        columns: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
                            20, 21, 22, 23
                        ],
                        orthogonal: 'export',
                    }
                }],
                columns: [{
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'updated_by',
                        name: 'updated_by'
                    },

                    {
                        data: 'nokk',
                        name: 'nokk',
                        render: function(data, type) {
                            if (type === 'export') return '"' + String(data ?? '').trim() + '"';
                            return data;
                        }
                    },
                    {
                        data: 'nik',
                        name: 'nik',
                        render: function(data, type) {
                            if (type === 'export') return '"' + String(data ?? '').trim() + '"';
                            return data;
                        }
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
                        name: 'jenis_kelamin',
                        render: function(data, type) {
                            if (type === 'export' || type === 'display' || type === 'filter')
                            return mapJK(data);
                            return data;
                        }
                    },

                    {
                        data: 'tempat_lahir',
                        name: 'tempat_lahir'
                    },
                    {
                        data: 'tanggal_lahir',
                        name: 'tanggal_lahir'
                    },
                    {
                        data: 'agama.nama',
                        name: 'agama.nama'
                    },
                    {
                        data: 'pendidikan.nama',
                        name: 'pendidikan.nama'
                    },
                    {
                        data: 'pekerjaan.nama',
                        name: 'pekerjaan.nama'
                    },
                    {
                        data: 'goldar.nama',
                        name: 'goldar.nama'
                    },
                    {
                        data: 'status.nama',
                        name: 'status.nama'
                    },
                    {
                        data: 'tanggal_perkawinan',
                        name: 'tanggal_perkawinan'
                    },
                    {
                        data: 'hubungan',
                        name: 'hubungan'
                    },
                    {
                        data: 'ayah',
                        name: 'ayah'
                    },
                    {
                        data: 'ibu',
                        name: 'ibu'
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
                    {
                        data: 'datak',
                        name: 'datak'
                    },
                ]
            });

            // Export semua data (serverSide)
            function newexportaction(e, dt, button, config) {
                var self = this;
                var oldStart = dt.settings()[0]._iDisplayStart;
                dt.one('preXhr', function(e, s, data) {
                    data.start = 0;
                    data.length = 2147483647;
                    dt.one('preDraw', function(e, settings) {
                        if (button[0].className.indexOf('buttons-excel') >= 0) {
                            $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button,
                                config);
                        }
                        dt.one('preXhr', function(e, s, data) {
                            settings._iDisplayStart = oldStart;
                            data.start = oldStart;
                        });
                        setTimeout(dt.ajax.reload, 0);
                        return false;
                    });
                });
                dt.ajax.reload();
            }
        });
    </script>
@endsection
