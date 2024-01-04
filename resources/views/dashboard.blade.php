@extends('layout.main')


@section('content')
    @error('field-name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Jumlah Penduduk Tetap</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $datapenduduk_tetap->count() }}</h2>
                            <p class="text-white mb-0" id="tanggal"></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Jumlah Penduduk Tidak tetap</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $datapenduduk_tidaktetap->count() }}</h2>
                            <p class="text-white mb-0" id="tanggal"></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">MASYARAKAT DISABILITAS</h4>
                        <canvas id="disabilitasChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">PERKEJAAN UTAMA</h4>
                        <canvas id="pekerjaanChart"></canvas>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">STATISTIK KELAHIRAN BAYI</h4>
                        <div class="form-group">
                            <label for="selectYear">Pilih Tahun:</label>
                            <select class="form-control" id="selectYear">
                                @for ($year = date('Y'); $year >= 2000; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        <canvas id="bayiChart"></canvas>
                    </div>
                </div>
            </div>
        </div>







        {{-- PEKRJAAN UTAMA --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    



    </div>





    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
