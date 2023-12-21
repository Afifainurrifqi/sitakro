@extends('layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT FASILITAS EKONOMI
                            {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rt_fasilitas_ekonomi.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rt_fasilitas_ekonomi.update') }}" method="POST">
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
                                    <label class="col-lg-4 col-form-label" for="valkredit_usaha">KREDIT USAHA RAKYAT
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valkredit_usaha') is-invalid @enderror"
                                            id="valkredit_usaha" name="valkredit_usaha">
                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="ya"
                                                {{ old('valkredit_usaha') == 'ya' || (isset($rt_fasilitas_ekonomi) && $rt_fasilitas_ekonomi->kredit_usaha == 'ya') ? 'selected' : '' }}>
                                                Ya</option>
                                            <option value="tidak"
                                                {{ old('valkredit_usaha') == 'tidak' || (isset($rt_fasilitas_ekonomi) && $rt_fasilitas_ekonomi->kredit_usaha == 'tidak') ? 'selected' : '' }}>
                                                Tidak</option>
                                        </select>
                                        @error('valkredit_usaha')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valkredit_ketahanan">KREDIT KETAHANAN PANGAN DAN ENERGI
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valkredit_ketahanan') is-invalid @enderror"
                                            id="valkredit_ketahanan" name="valkredit_ketahanan">
                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="ya"
                                                {{ old('valkredit_ketahanan') == 'ya' || (isset($rt_fasilitas_ekonomi) && $rt_fasilitas_ekonomi->kredit_ketahanan == 'ya') ? 'selected' : '' }}>
                                                Ya</option>
                                            <option value="tidak"
                                                {{ old('valkredit_ketahanan') == 'tidak' || (isset($rt_fasilitas_ekonomi) && $rt_fasilitas_ekonomi->kredit_ketahanan == 'tidak') ? 'selected' : '' }}>
                                                Tidak</option>
                                        </select>
                                        @error('valkredit_ketahanan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valkredit_kecil">KREDIT USAHA KECIL
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valkredit_kecil') is-invalid @enderror"
                                            id="valkredit_kecil" name="valkredit_kecil">
                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="ya"
                                                {{ old('valkredit_kecil') == 'ya' || (isset($rt_fasilitas_ekonomi) && $rt_fasilitas_ekonomi->kredit_kecil == 'ya') ? 'selected' : '' }}>
                                                Ya</option>
                                            <option value="tidak"
                                                {{ old('valkredit_kecil') == 'tidak' || (isset($rt_fasilitas_ekonomi) && $rt_fasilitas_ekonomi->kredit_kecil == 'tidak') ? 'selected' : '' }}>
                                                Tidak</option>
                                        </select>
                                        @error('valkredit_kecil')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valkelompok_usaha">KELOMPOK USAHA BERSAMA
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valkelompok_usaha') is-invalid @enderror"
                                            id="valkelompok_usaha" name="valkelompok_usaha">
                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="ya"
                                                {{ old('valkelompok_usaha') == 'ya' || (isset($rt_fasilitas_ekonomi) && $rt_fasilitas_ekonomi->kelompok_usaha == 'ya') ? 'selected' : '' }}>
                                                Ya</option>
                                            <option value="tidak"
                                                {{ old('valkelompok_usaha') == 'tidak' || (isset($rt_fasilitas_ekonomi) && $rt_fasilitas_ekonomi->kelompok_usaha == 'tidak') ? 'selected' : '' }}>
                                                Tidak</option>
                                        </select>
                                        @error('valkelompok_usaha')
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
