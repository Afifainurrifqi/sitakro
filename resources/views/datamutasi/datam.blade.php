@extends('layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            @if (session('msg'))
                            @endif
                            <h2 class="card-title">Data Mutasi Penduduk</h2>
                            <form action="/import" method="POST" enctype="multipart/form-data">
                                @csrf
                                <a href="{{ route('export.meninggal') }}" class="btn btn-primary">Export Meninggal</a>
                                <a href="{{ route('export.pindah') }}" class="btn btn-primary">Export Pindah</a>
                            </form><br><br>
                            <form action="{{ route('mutasi.index') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Cari berdasarkan NIK"
                                        name="search" value="{{ request('search') }}">
                                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                </div>
                            </form>
                        </div>
                       
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" data-s-dom="lrtip">
                                <thead>
                                    <tr>
                                        {{-- <th>Action</th> --}}
                                        <th>No</th>
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
                                        <th>Statu kependudukan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($datapenduduk as $row)
                                        <tr>
                                            {{-- <td><a href="{{ route('mutasi.update', ['nik' => $row->nik]) }}"
                                                    class="btn mb-1 btn-info btn-sm" title="Edit data">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td> --}}
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $row->nik }}</td>
                                            <td>{{ $row->gelarawal }}</td>
                                            <td>{{ $row->nama }}</td>
                                            <td>{{ $row->gelarakhir }}</td>
                                            <td>
                                                @if ($row->jenis_kelamin == 1)
                                                    Laki-Laki
                                                @else
                                                    Perempuan
                                                @endif
                                            </td>
                                            <td>{{ $row->tempat_lahir }}</td>
                                            <td>{{ $row->tanggal_lahir }}</td>
                                            <td>{{ $row->agama->nama }}</td>
                                            <td>{{ $row->pendidikan->nama }}</td>
                                            <td>{{ $row->pekerjaan->nama }}</td>
                                            <td>{{ $row->goldar->nama }}</td>
                                            <td>{{ $row->status->nama }}</td>
                                            <td>@if($row->tanggal_perkawinan == '1970-01-01')
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
                                    @endforeach

                                    <!-- Modal Import -->
                                    <div class="modal fade" id="importModal" tabindex="-1" role="dialog"
                                        aria-labelledby="importModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="importModalLabel">Impor Data Penduduk</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/import" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="importFile">Pilih File</label>
                                                            <input type="file" accept=".xlsx, .xls"
                                                                class="form-control-file" id="importFile" name="importFile"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Impor Data</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                </tbody>
                            </table>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
