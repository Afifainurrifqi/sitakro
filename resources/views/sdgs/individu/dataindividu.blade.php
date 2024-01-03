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
                            <h2 class="card-title">SDGS DATA INDIVIDU</h2>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" id="tabledataindividu">
                                <thead>
                                    <!-- DATA INDIVIDU -->
                                    <tr>
                                        <th>Action</th>
                                        <th>No</th>
                                        <th>KK</th>
                                        <th>NIK</th>
                                        <th>Gelar awal</th>
                                        <th>Nama</th>
                                        <th>Gelar akhir</th>
                                        <th>Jenis kelamin</th>
                                        <th>Tempat lahir</th>
                                        <th>Tanggal_lahir</th>
                                        <th>Usia</th>
                                        <th>Status</th>
                                        <th>Usia Saat pertama kali menikah</th>
                                        <th>Agama</th>
                                        <th>Suku Bangsa</th>
                                        <th>Warga Negara</th>
                                        <th>No. Hp</th>
                                        <th>No. Wa</th>
                                        <th>Email</th>
                                        <th>Facebook</th>
                                        <th>Twitter</th>
                                        <th>Instagram</th>
                                        
                                        
                                        
                                    </tr>
                                    
                                </thead>
                                
                                <tbody>

                                    {{-- @foreach ($datapenduduk as $row)
                                    <tr> 
                                        <td><a href="{{ route('individu.show', ['show' => $row->nik]) }}" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                            <i class="fas fa-book"></i>                                        </a>
                                            <a href="{{ route('individu.edit', ['nik' => $row->nik]) }}" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            
                                        </td>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $row->detailkk->kk->nokk }}</td>
                                        <td>{{ $row->nik }}</td>
                                        <td>{{ $row->gelarawal }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->gelarakhir}}</td>
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
                

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        var $ = jQuery.noConflict();
        $(function() {
            $('#tabledataindividu').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: '/dataindividu/json',
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
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin'
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
                        data: 'Usia',
                        name: 'Usia'
                    },
                    {
                        data: 'status.nama',
                        name: 'status.nama'
                    },
                    {
                        data: 'usia_nikah',
                        name: 'usia_nikah'
                    },
                    {
                        data: 'agama.nama',
                        name: 'agama.nama'
                    }, // Use dot notation for related table fields
                    {
                        data: 'suku_bangsa',
                        name: 'suku_bangsa'
                    },
                    {
                        data: 'warga_negara',
                        name: 'warga_negara'
                    },
                    {
                        data: 'hp',
                        name: 'hp'
                    },
                    {
                        data: 'wa',
                        name: 'wa'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'facebook',
                        name: 'facebook'
                    },
                    {
                        data: 'twitter',
                        name: 'twitter'
                    },
                    {
                        data: 'instagram',
                        name: 'instagram'
                    },
                ]
            });
        });
    </script>
@endsection
