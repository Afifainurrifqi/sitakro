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
                        </div>
                       
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" 
                            id="tabledatamutasi">
                                <thead>
                                    <tr>
                                        {{-- <th>Action</th> --}}
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript">
        var $ = jQuery.noConflict();
        $(function () {
            $('#tabledatamutasi').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: '/datam/json',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'nokk', name: 'nokk'}, // Use dot notation to access related data
                    {data: 'nik', name: 'nik'},
                    {data: 'gelarawal', name: 'gelarawal'},
                    {data: 'nama', name: 'nama'},
                    {data: 'gelarakhir', name: 'gelarakhir'},
                    {data: 'jenis_kelamin', name: 'jenis_kelamin'},
                    {data: 'tempat_lahir', name: 'tempat_lahir'},
                    {data: 'tanggal_lahir', name: 'tanggal_lahir'},
                    {data: 'agama.nama', name: 'agama.nama'}, // Use dot notation for related table fields
                    {data: 'pendidikan.nama', name: 'pendidikan.nama'},
                    {data: 'pekerjaan.nama', name: 'pekerjaan.nama'},
                    {data: 'goldar.nama', name: 'goldar.nama'},
                    {data: 'status.nama', name: 'status.nama'},
                    {data: 'tanggal_perkawinan', name: 'tanggal_perkawinan'},
                    {data: 'hubungan', name: 'hubungan'},
                    {data: 'ayah', name: 'ayah'},
                    {data: 'ibu', name: 'ibu'},
                    {data: 'alamat', name: 'alamat'},
                    {data: 'rt', name: 'rt'},
                    {data: 'rw', name: 'rw'},
                    {data: 'datak', name: 'datak'},
                ],
                
            });
        });
    </script>
@endsection
