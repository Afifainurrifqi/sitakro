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
                        <h2 class="card-title">LOKASI</h2>
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
                                
                               


                                
                            </tbody>
                        </table>
                    </div>
                   
                </div>
                
            </div>

        </div>
    </div>
</div>

<script>

  

</script>
@endsection