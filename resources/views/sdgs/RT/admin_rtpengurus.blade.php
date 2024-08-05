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
                            <h2 class="card-title">PENGURUS</h2>


                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatartpengurus">
                                <thead>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <tr>
                                        <th rowspan="2">Action</th>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">NIK</th>
                                        <th rowspan="2">NAMA KETUA RT</th>
                                        <th rowspan="2">ALAMAT</th>
                                        <th rowspan="2">RT</th>
                                        <th rowspan="2">RW</th>
                                        <th rowspan="2">NO. HP / TELEPON</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KETUA RW
                                        </th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SEKRETARIS
                                            RW</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">BENDAHARA
                                            RW</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KETUA RT
                                        </th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SEKRETARIS
                                            RT</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">BENDAHARA
                                            RT</th>
                                    </tr>
                                    <tr>
                                        <th>NAMA</th>
                                        <th>NIK</th>
                                        <th>NO. HP</th>
                                        <th style="border-right: 1px solid #000;">MENJABAT SEJAK</th>

                                        <th>NAMA</th>
                                        <th>NIK</th>
                                        <th>NO. HP</th>
                                        <th style="border-right: 1px solid #000;">MENJABAT SEJAK</th>

                                        <th>NAMA</th>
                                        <th>NIK</th>
                                        <th>NO. HP</th>
                                        <th style="border-right: 1px solid #000;">MENJABAT SEJAK</th>

                                        <th>NAMA</th>
                                        <th>NIK</th>
                                        <th>NO. HP</th>
                                        <th style="border-right: 1px solid #000;">MENJABAT SEJAK</th>

                                        <th>NAMA</th>
                                        <th>NIK</th>
                                        <th>NO. HP</th>
                                        <th style="border-right: 1px solid #000;">MENJABAT SEJAK</th>

                                        <th>NAMA</th>
                                        <th>NIK</th>
                                        <th>NO. HP</th>
                                        <th style="border-right: 1px solid #000;">MENJABAT SEJAK</th>

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
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Presentase Penyelesaian Data</h4>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{ number_format($presentase, 2) }}%;"
                        aria-valuenow="{{ number_format($presentase, 2) }}" aria-valuemin="0" aria-valuemax="100">
                        {{ number_format($presentase, 2) }}%
                    </div>
                </div>
            </div>
        </div>
        <style>
            .progress-bar {
                background-color: #28a745;
                color: green;
                /* Warna hijau, bisa disesuaikan */
            }
        </style>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        var $ = jQuery.noConflict();
        $(function() {
            $('#tabledatartpengurus').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                searching: true,
                ajax: {
                    url: '{!! route('rtpengurus.jsonadmin') !!}',
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
                        name: 'action'
                    },
                    {
                        data: null,
                        render: function(data, type, row, meta) {
                            // Menambahkan nomor urut otomatis
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
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
                        data: 'nama_ketuarw',
                        name: 'nama_ketuarw'
                    },
                    {
                        data: 'nik_ketuarw',
                        name: 'nik_ketuarw'
                    },
                    {
                        data: 'nohp_ketuarw',
                        name: 'nohp_ketuarw'
                    },
                    {
                        data: 'menjabat_ketuarw',
                        name: 'menjabat_ketuarw'
                    },

                    // Columns related to 'nama_sekrw'
                    {
                        data: 'nama_sekrw',
                        name: 'nama_sekrw'
                    },
                    {
                        data: 'nik_sekrw',
                        name: 'nik_sekrw'
                    },
                    {
                        data: 'nohp_sekrw',
                        name: 'nohp_sekrw'
                    },
                    {
                        data: 'menjabat_sekrw',
                        name: 'menjabat_sekrw'
                    },

                    // Columns related to 'nama_benrw'
                    {
                        data: 'nama_benrw',
                        name: 'nama_benrw'
                    },
                    {
                        data: 'nik_benrw',
                        name: 'nik_benrw'
                    },
                    {
                        data: 'nohp_benrw',
                        name: 'nohp_benrw'
                    },
                    {
                        data: 'menjabat_benrw',
                        name: 'menjabat_benrw'
                    },

                    // Columns related to 'nama_ketuart'
                    {
                        data: 'nama_ketuart',
                        name: 'nama_ketuart'
                    },
                    {
                        data: 'nik_ketuart',
                        name: 'nik_ketuart'
                    },
                    {
                        data: 'nohp_ketuart',
                        name: 'nohp_ketuart'
                    },
                    {
                        data: 'menjabat_ketuart',
                        name: 'menjabat_ketuart'
                    },

                    // Columns related to 'nama_sekrt'
                    {
                        data: 'nama_sekrt',
                        name: 'nama_sekrt'
                    },
                    {
                        data: 'nik_sekrt',
                        name: 'nik_sekrt'
                    },
                    {
                        data: 'nohp_sekrt',
                        name: 'nohp_sekrt'
                    },
                    {
                        data: 'menjabat_sekrt',
                        name: 'menjabat_sekrt'
                    },

                    // Columns related to 'nama_benrt'
                    {
                        data: 'nama_benrt',
                        name: 'nama_benrt'
                    },
                    {
                        data: 'nik_benrt',
                        name: 'nik_benrt'
                    },
                    {
                        data: 'nohp_benrt',
                        name: 'nohp_benrt'
                    },
                    {
                        data: 'menjabat_benrt',
                        name: 'menjabat_benrt'
                    },


                ]
            });

            $('#search_nokk').on('keyup', function() {
                $('#tabledatartpengurus').DataTable().ajax.reload();
            });
        });
    </script>
@endsection
