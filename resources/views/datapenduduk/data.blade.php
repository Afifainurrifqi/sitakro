@extends('layout.main')


@section('content')
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
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
                            <h2 class="card-title">Data Penduduk</h2>
                            <button type="button" class="btn mb-1 btn-primary"
                                onclick="window.location='{{ url('datapenduduk/add') }}'">Tambah penduduk<span
                                    class="btn-icon-right"><i class="fa fa-plus-circle"></i></span>
                            </button>
                            <a href="{{ url('datapenduduk/export/datapenduduk') }}"
                            class="btn btn-primary btn-sm">Export</a>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#importModal">Impor Data</button> <br><br>
                            <form action="{{ route('datapenduduk.index') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Cari berdasarkan NIK" name="search" value="{{ request('search') }}">
                                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                        
                            <table class="table table-striped table-bordered zero-configuration" data-s-dom="lrtip" id="tabledatap">
                                
                                <thead>
                                   
                                    <tr>
                                        <th>Action</th>
                                        <th>No</th> 
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
                                        <th>Statu kependudukan</th>
                                    </tr>
                                </thead>
                                <tbody>
    
                                    @foreach ($datapenduduk as $row)   
                                        <tr>
                                            <td><a href="{{ route('datapenduduk.show', ['nik' => $row->nik]) }}" class="btn mb-1 btn-info btn-sm" title="Edit data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                                <form onsubmit="return deleteData('{{ $row->nama }}')"
                                                    action="{{ url('datapenduduk/' . $row->nik) }}" style="display: inline "
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
    
                                                </form>
                                            </td>
                                            <th>{{ $loop->iteration }}</th>        
                                            <td>{{ $row->detailkk->kk->nokk }}</td>
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
                                            <td>@if($row->tanggal_perkawinan == NULL)
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
                                    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="importModalLabel">Impor Data Penduduk</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="post" action="{{ route('import_excel') }}" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        {{ csrf_field() }}
                                                        <label>Pilih file excel</label>
                                                        <div class="form-group">
                                                            <input type="file" name="file" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Import</button>
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
    {{-- <style>
        .dataTables_wrapper .dataTables_paginate {
            display: none;
        }
    </style> --}}
    <script>
        $(document).ready(function() {
            $('#tabledatap').DataTable({
                serverSide: true,
                processing: true,
                ajax: '',
                paging: false  // Menyembunyikan pagination
            });
        });
    </script>
@endsection
