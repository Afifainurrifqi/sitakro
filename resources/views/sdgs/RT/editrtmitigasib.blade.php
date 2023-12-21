@extends('layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT MITIGASI BENCANA
                            {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rtmitigasib.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rtmitigasib.update') }}" method="POST">
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
                                    <label class="col-lg-4 col-form-label" for="valNama">Nama <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        {{ $datap->nama }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valmitigasi_sp">SISTEM PERINGATAN DINI
                                        BENCANA ALAM
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valmitigasi_sp') is-invalid @enderror"
                                            id="valmitigasi_sp" name="valmitigasi_sp">
                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="ada"
                                                {{ old('valmitigasi_sp') == 'ada' || (isset($rtmitigasib) && $rtmitigasib->mitigasi_sp == 'ada') ? 'selected' : '' }}>
                                                Ada</option>
                                            <option value="tidak ada"
                                                {{ old('valmitigasi_sp') == 'tidak ada' || (isset($rtmitigasib) && $rtmitigasib->mitigasi_sp == 'tidak ada') ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                        </select>
                                        @error('valmitigasi_sp')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valmitigasi_sp">SISTEM PERINGATAN DINI
                                        KHUSUS TSUNAMI
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valmitigasi_spd') is-invalid @enderror"
                                            id="valmitigasi_spd" name="valmitigasi_spd">
                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="ada"
                                                {{ old('valmitigasi_spd') == 'ada' || (isset($rtmitigasib) && $rtmitigasib->mitigasi_spd == 'ada') ? 'selected' : '' }}>
                                                Ada</option>
                                            <option value="tidak ada"
                                                {{ old('valmitigasi_spd') == 'tidak ada' || (isset($rtmitigasib) && $rtmitigasib->mitigasi_spd == 'tidak ada') ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                            <option value="bukan wilayah potensi tsunami"
                                                {{ old('valmitigasi_spd') == 'bukan wilayah potensi tsunami' || (isset($rtmitigasib) && $rtmitigasib->mitigasi_spd == 'bukan wilayah potensi tsunami') ? 'selected' : '' }}>
                                                Bukan Wilayah Potensi Tsunami</option>
                                            <option value="gempa bumi"
                                                {{ old('valmitigasi_spd') == 'gempa bumi' || (isset($rtmitigasib) && $rtmitigasib->mitigasi_spd == 'gempa bumi') ? 'selected' : '' }}>
                                                Gempa Bumi</option>
                                        </select>
                                        @error('valmitigasi_sp')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valmitigasi_pk">PERLENGKAPAN KESELAMATAN
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valmitigasi_pk') is-invalid @enderror"
                                            id="valmitigasi_pk" name="valmitigasi_pk">
                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="ada"
                                                {{ old('valmitigasi_pk') == 'ada' || (isset($rtmitigasib) && $rtmitigasib->mitigasi_pk == 'ada') ? 'selected' : '' }}>
                                                Ada</option>
                                            <option value="tidak ada"
                                                {{ old('valmitigasi_pk') == 'tidak ada' || (isset($rtmitigasib) && $rtmitigasib->mitigasi_pk == 'tidak ada') ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                        </select>
                                        @error('valmitigasi_pk')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valmitigasi_rrj">RAMBU-RAMBU JALUR EVAKUASI BENCANA
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valmitigasi_rrj') is-invalid @enderror"
                                            id="valmitigasi_rrj" name="valmitigasi_rrj">
                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="ada"
                                                {{ old('valmitigasi_rrj') == 'ada' || (isset($rtmitigasib) && $rtmitigasib->mitigasi_rrj == 'ada') ? 'selected' : '' }}>
                                                Ada</option>
                                            <option value="tidak ada"
                                                {{ old('valmitigasi_rrj') == 'tidak ada' || (isset($rtmitigasib) && $rtmitigasib->mitigasi_rrj == 'tidak ada') ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                        </select>
                                        @error('valmitigasi_rrj')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valmitigasi_ppn">PEMBUATAN / PERAWATAN / NORMALISASI SUNGAI, KANAL, PARIT, DRAINASE, DLL
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valmitigasi_ppn') is-invalid @enderror"
                                            id="valmitigasi_ppn" name="valmitigasi_ppn">
                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="ada"
                                                {{ old('valmitigasi_ppn') == 'ada' || (isset($rtmitigasib) && $rtmitigasib->mitigasi_ppn == 'ada') ? 'selected' : '' }}>
                                                Ada</option>
                                            <option value="tidak ada"
                                                {{ old('valmitigasi_ppn') == 'tidak ada' || (isset($rtmitigasib) && $rtmitigasib->mitigasi_ppn == 'tidak ada') ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                        </select>
                                        @error('valmitigasi_ppn')
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
