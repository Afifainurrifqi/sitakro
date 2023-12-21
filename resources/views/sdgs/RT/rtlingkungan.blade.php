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
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                    @endif
                        <h2 class="card-title">LINGKUNGAN</h2>
                        <form action="{{ route('rtlingkungan.index') }}" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cari berdasarkan NIK" name="search" value="{{ request('search') }}">
                                <button class="btn btn-outline-secondary" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>
                   
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration" data-s-dom="lrtip">
                            <thead>
                                <tr>
                                    <th>Action</th>
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
                                
                                @foreach ( $datapenduduk as $row )
                                    <tr> 
                                        <td><a href="{{ route('rtlingkungan.show', ['show' => $row->nik]) }}" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                            <i class="fas fa-book"></i>                                        </a>
                                            <a href="{{ route('rtlingkungan.edit', ['nik' => $row->nik]) }}" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            
                                        </td>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $row->nik }}</td>
                                        <td>{{ $row->gelarawal }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->gelarakhir}}</td>
                                        <td>@if ($row->jenis_kelamin ==1)
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


                                
                            </tbody>
                        </table>
                    </div>
                   
                </div>
                
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Progress bars</h4>
                        <div class="progress" style="height: 9px">
                            <div class="progress-bar bg-success" style="width: {{ $persentaseProses }}%;" role="progressbar">{{ $persentaseProses }}%</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script>

    function deleteData(name){
    pesan = confirm('Yakin data penduduk dengan nama $name ini dihapus ?')
    if (pesan) return true;
    else return false; 
    }

</script>
@endsection