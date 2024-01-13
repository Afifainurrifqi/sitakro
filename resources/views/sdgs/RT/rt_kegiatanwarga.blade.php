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
                            <h2 class="card-title">KEGIATAN WARGA UNTUK MENJAGA KEAMANAN LINGKUNGAN SELAMA SATU TAHUN
                                TERAKHIR</h2>
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
                                        <th rowspan="2">JUMLAH KEGIATAN PEMBANGUNAN / PEMELIHARAAN POSKAMLING</th>
                                        <th rowspan="2">JUMLAH KEGIATAN PEMBENTUKAN / PENGATURAN REGU KEAMANAN</th>
                                        <th rowspan="2">JUMLAH ANGGOTA HANSIP / LINMAS YANG DITAMBAHKAN</th>
                                        <th rowspan="2">PELAPORAN TAMU YANG MENGINAP LEBIH DARI 24 JAM KE APARAT
                                            LINGKUNGAN</th>
                                        <th rowspan="2">PENGAKTIFAN SISTEM KEAMANAN LINGKUNGAN BERASAL DARI INISIATIF
                                            WARGA</th>
                                        <th rowspan="2">JUMLAH ANGGOTA LINMAS ATAU HANSIP</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">JUMLAH POS
                                            POLISI</th>
                                        <th rowspan="2">JARAK KE POS POLISI TERDEKAT</th>
                                        <th rowspan="2">KEMUDAHAN UNTUK MENCAPAI POS POLISI</th>
                                        <th rowspan="2">JUMLAH KORBAN (TERMASUK PERCOBAAN) BUNUH DIRI</th>
                                        <th rowspan="2">JUMLAH LOKASI BERKUMPUL / MANGKAL ANAK JALANAN</th>
                                        <th rowspan="2">JUMLAH TEMPAT MANGKAL GELANDANGAN / PENGEMIS</th>
                                        <th rowspan="2">JUMLAH LOKALISASI / LOKASI / TEMPAT MANGKAL PEKERJA SEKS
                                            KOMERSIAL (PSK)</th>
                                    </tr>

                                    <tr>
                                        <th>YANG DIGUNAKAN</th>
                                        <th style="border-right: 1px solid #000;">YANG TIDAK DIGUNAKAN</th>
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

    
@endsection
