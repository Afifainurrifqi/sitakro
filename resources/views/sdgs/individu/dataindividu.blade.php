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
