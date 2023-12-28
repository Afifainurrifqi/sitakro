@extends('layout.main')


@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT LEMBAGA KEAGAMAAN	
                            {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rtlembaga_keagamaan.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rtlembaga_keagamaan.update') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valNIK">NIK <span
                                            class="text-danger">*</span>
                                        <input type="hidden" name="valNIK" value="{{ $datap->nik }}">
                                    </label>
                                    <div class="col-lg-6">
                                        {{ $datap->nik }}
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valnama">Nama
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $rtlembaga_keagamaan->nama ?? '' }}"
                                            class="form-control @error('valnama') is-invalid @enderror"
                                            id="valnama" name="valnama" placeholder="berapa jumlahnya...">
                                        @error('valnama')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlah_peng">JUMLAH PENGURUS


                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $rtlembaga_keagamaan->jumlah_peng ?? '' }}"
                                            class="form-control @error('valjumlah_peng') is-invalid @enderror"
                                            id="valjumlah_peng" name="valjumlah_peng" placeholder="berapa jumlahnya...">
                                        @error('valjumlah_peng')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlah_ang">JUMLAH ANGGOTA


                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $rtlembaga_keagamaan->jumlah_ang ?? '' }}"
                                            class="form-control @error('valjumlah_ang') is-invalid @enderror"
                                            id="valjumlah_ang" name="valjumlah_ang" placeholder="berapa jumlahnya...">
                                        @error('valjumlah_ang')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valfasilitas">FASILITAS


                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valfasilitas') is-invalid @enderror"
                                        id="valfasilitas" name="valfasilitas">
                                    <option value="" disabled selected>Pilih...</option>
                                    <option value="ada, dikelola"
                                        {{ old('valfasilitas') == 'ada, dikelola' || (isset($rtlembaga_keagamaan) && $rtlembaga_keagamaan->fasilitas == 'ada, dikelola') ? 'selected' : '' }}>
                                        Ada, dikelola
                                    </option>
                                    <option value="ada, tidak dikelola"
                                        {{ old('valfasilitas') == 'ada, tidak dikelola' || (isset($rtlembaga_keagamaan) && $rtlembaga_keagamaan->fasilitas == 'ada, tidak dikelola') ? 'selected' : '' }}>
                                        Ada, tidak dikelola
                                    </option>
                                    <option value="ridak ada"
                                        {{ old('valfasilitas') == 'ridak ada' || (isset($rtlembaga_keagamaan) && $rtlembaga_keagamaan->fasilitas == 'ridak ada') ? 'selected' : '' }}>
                                        Tidak Ada
                                    </option>
                                    <option value="ada baik"
                                        {{ old('valfasilitas') == 'ada baik' || (isset($rtlembaga_keagamaan) && $rtlembaga_keagamaan->fasilitas == 'ada baik') ? 'selected' : '' }}>
                                        Ada, baik
                                    </option>
                                    <option value="ada rusak sedang"
                                        {{ old('valfasilitas') == 'ada rusak sedang' || (isset($rtlembaga_keagamaan) && $rtlembaga_keagamaan->fasilitas == 'ada rusak sedang') ? 'selected' : '' }}>
                                        Ada, rusak sedang
                                    </option>
                                    <option value="ada rusak parah"
                                        {{ old('valfasilitas') == 'ada rusak parah' || (isset($rtlembaga_keagamaan) && $rtlembaga_keagamaan->fasilitas == 'ada rusak parah') ? 'selected' : '' }}>
                                        Ada, rusak parah
                                    </option>
                                </select>
                                
                                        @error('valfasilitas')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                                

                             
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
