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
                            <h2 class="card-title">INFRASTUKTUR</h2>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" data-s-dom="lrtip">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Action</th>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">NIK</th>
                                        <th rowspan="2">NAMA KETUA RT</th>
                                        <th rowspan="2">ALAMAT</th>
                                        <th rowspan="2">RT</th>
                                        <th rowspan="2">RW</th>
                                        <th rowspan="2">NO. HP / TELEPON</th>
                                        <th rowspan="2">PENERANGAN DI JALAN</th>
                                        <th rowspan="2">PRASARANA TRANSPORTASI ANTAR RT</th>
                                        <th colspan="6">PANJANG JALAN (KM)</th>
                                        <th rowspan="2">JALAN DARAT DAPAT DILALUI KENDARAAN BERMOTOR RODA 4 ATAU LEBIH</th>
                                        <th colspan="3">KEBERADAAN ANGKUTAN UMUM</th>
                                        <th rowspan="2">DERMAGA LAUT / SUNGAI</th>
                                        <th colspan="8">SINYAL HP</th>
                                        <th rowspan="2">KANTOR POS PEMBANTU</th>
                                        <th rowspan="2">LAYANAN POS KELILING</th>
                                        <th rowspan="2">PERUSAHAAN / AGEN JASA EKSPEDISI SWASTA</th>
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

    <script></script>
@endsection
