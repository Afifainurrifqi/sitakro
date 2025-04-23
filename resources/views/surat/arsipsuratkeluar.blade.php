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
                            <h2 class="card-title">ARSIP SURAT KELUAR</h2>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatakesehatan">
                                <thead>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Jenis Surat</th>
                                        <th>No Whatsapp</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Verifikasi</th>
                                        <th>Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>Nama Dummy {{ $i }}</td>
                                            <td>327601010101000{{ $i }}</td>
                                            <td>Surat Keterangan {{ $i }}</td>
                                            <td>
                                                <a href="https://wa.me/6289500197611{{ $i }}" target="_blank"
                                                    class="btn btn-success btn-sm">
                                                    0895-0019-7611{{ $i }}
                                                </a>
                                            </td>
                                            <td>{{ $i % 2 == 0 ? 'Laki-laki' : 'Perempuan' }}</td>
                                            <td>Jalan Dummy No. {{ $i }}, Kota Contoh</td>
                                            <td>
                                                <select
                                                    class="form-select form-select-sm rounded-pill shadow-sm border-0 status-select">
                                                    <option value="Pending" {{ $i == 1 ? 'selected' : '' }}>Pending
                                                    </option>
                                                    <option value="Di cek" {{ $i == 2 ? 'selected' : '' }}>Di cek</option>
                                                    <option value="Di terima" {{ $i == 3 ? 'selected' : '' }}>Di terima
                                                    </option>
                                                    <option value="Ditolak" {{ $i == 4 ? 'selected' : '' }}>Ditolak
                                                    </option>
                                                </select>
                                            </td>


                                            <td>
                                                <select class="form-select form-select-sm rounded-pill shadow-sm border-0 verifikasi-select">
                                                    <option value="Belum Verifikasi" {{ $i % 2 == 0 ? '' : 'selected' }}>Belum Verifikasi</option>
                                                    <option value="Terverifikasi" {{ $i % 2 == 0 ? 'selected' : '' }}>Terverifikasi</option>
                                                </select>
                                            </td>

                                            <td>
                                                <button class="btn btn-primary btn-sm">Export PDF</button>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <!-- Card Kedua (Lebar 4) -->

            </div>
        </div>
    </div>
    </div>

    <style>
        .bg-pending {
            background-color: #6c757d !important;
            /* Bootstrap bg-secondary */
            color: #fff !important;
        }

        .bg-cek {
            background-color: #ffff00 !important;
            /* Pure Yellow */
            color: #000 !important;
        }

        .bg-diterima {
            background-color: #198754 !important;
            /* Bootstrap bg-success */
            color: #fff !important;
        }

        .bg-ditolak {
            background-color: #dc3545 !important;
            /* Bootstrap bg-danger */
            color: #fff !important;
        }

        .bg-belum-verifikasi {
            background-color: #0d6efd !important;
            /* Bootstrap bg-primary */
            color: #fff !important;
        }

        .bg-terverifikasi {
            background-color: #198754 !important;
            /* Bootstrap bg-success */
            color: #fff !important;
        }
    </style>

    <script>
        function updateVerifikasiColor(select) {
            select.classList.remove('bg-belum-verifikasi', 'bg-terverifikasi');

            const value = select.value;
            if (value === 'Belum Verifikasi') {
                select.classList.add('bg-belum-verifikasi');
            } else if (value === 'Terverifikasi') {
                select.classList.add('bg-terverifikasi');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const verifSelects = document.querySelectorAll('.verifikasi-select');
            verifSelects.forEach(select => {
                updateVerifikasiColor(select);
                select.addEventListener('change', function() {
                    updateVerifikasiColor(this);
                });
            });
        });

        function updateStatusColor(select) {
            // Reset all status classes
            select.classList.remove('bg-pending', 'bg-cek', 'bg-diterima', 'bg-ditolak');

            const value = select.value;

            switch (value) {
                case 'Pending':
                    select.classList.add('bg-pending');
                    break;
                case 'Di cek':
                    select.classList.add('bg-cek');
                    break;
                case 'Di terima':
                    select.classList.add('bg-diterima');
                    break;
                case 'Ditolak':
                    select.classList.add('bg-ditolak');
                    break;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const selects = document.querySelectorAll('.status-select');
            selects.forEach(select => {
                updateStatusColor(select);
                select.addEventListener('change', function() {
                    updateStatusColor(this);
                });
            });
        });
    </script>
@endsection
