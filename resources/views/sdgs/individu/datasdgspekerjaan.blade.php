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
                            <h2 class="card-title">SDGS DATA PEKERJAAN</h2>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatapekerjaansdgs">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>No</th>
                                        <th>KK</th>
                                        <th>NIK</th>
                                        <th>Gelar awal</th>
                                        <th>Nama</th>
                                        <th>Gelar akhir</th>
                                        <th>Kondisi pekerjaan</th>
                                        <th>Pekerjaan Utama</th>
                                        <th>Jaminan Sosial Ketenagakerjaan</th>
                                        <th>Penghasilan Setahun Terakhir</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- @foreach ($datapenduduk as $row)
                                <tr> 
                                    <td><a href="{{ route('pekerjaan.show', ['show' => $row->nik]) }}" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                        <i class="fas fa-book"></i></a>
                                        <a href="{{ route('pekerjaan.create', ['nik' => $row->nik]) }}" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $row->nik }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>@if ($row->jenis_kelamin == 1)
                                        Laki-Laki
                                        @else
                                        Perempuan
                                        @endif</td>
                                    <td>{{ $row->tempat_lahir }}</td>
                                    <td>{{ $row->tanggal_lahir }}</td>
                                    <td>{{ $row->agama->nama }}</td>
                                    <td>{{ $row->pendidikan->nama }}</td>
                                    <td>{{ $row->pekerjaan->nama }}</td>
                                    <td>{{ $row->goldar->nama }}</td>
                                    <td>{{ $row->status->nama }}</td>
                                    <td>@if ($row->tanggal_perkawinan == '1970-01-01')
                                        Belum Kawin
                                    @else
                                        {{ $row->tanggal_perkawinan }}
                                    @endif</td>
                                    <td>{{ $row->hubungan }}</td>
                                    <td>{{ $row->ayah }}</td>
                                    <td>{{ $row->ibu }}</td>
                                    <td>{{ $row->alamat }}</td>
                                    <td>{{ $row->rt }}</td>
                                    <td>{{ $row->rw }}</td>    
                                    <td>{{ $row->datak }}</td>                          
                                </tr>   
                            @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Pie Chart</h4>
                            <canvas id="pie-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                var $ = jQuery.noConflict();
                $(function() {
                    $('#tabledatapekerjaansdgs').DataTable({
                        processing: true,
                        serverSide: true,
                        scrollX: true,
                        ajax: '/datasdgspekerjaan/json',
                        columns: [{
                                data: 'action',
                                name: 'action'
                            },
                            {
                                data: 'id',
                                name: 'id'
                            },
                            {
                                data: 'nokk',
                                name: 'nokk'
                            }, // Use dot notation to access related data
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
                                data: 'kondisi_pekerjaan',
                                name: 'kondisi_pekerjaan'
                            },
                            {
                                data: 'pekerjaan_utama',
                                name: 'pekerjaan_utama'
                            },
                            {
                                data: 'jaminan_sosial_ketenagakerjaan',
                                name: 'jaminan_sosial_ketenagakerjaan'
                            },
                            {
                                data: 'penghasilan_setahun_terakhir',
                                name: 'penghasilan_setahun_terakhir'
                            },

                        ]
                    });
                });
            </script>
        @endsection
