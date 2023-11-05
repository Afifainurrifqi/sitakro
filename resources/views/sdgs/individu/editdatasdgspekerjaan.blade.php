@extends('layout.main')


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">EDIT DATA PEKERJAAN {{ $datap->nama }}</h1>
                    <button type="button" class="btn mb-1 btn-warning" onclick="window.location='{{ route('pekerjaan.index') }}'">Kembali
                     </button> 
                     <br><br><br>
                    <div class="form-validation">
                       
                        <form class="form-valide" action="{{ route('pekerjaan.update') }}" method="POST">
                             @csrf
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valNIK">NIK <span class="text-danger">*</span>
                                    <input type="hidden" name="valNIK" value="{{ $datap->nik }}">
                                </label>
                                <div class="col-lg-6">
                                    {{ $datap->nik }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valNama">Nama <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    {{ $datap->nama }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valKondisipekerjaan">KONDISI PEKERJAAN <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control @error('valKondisipekerjaan') is-invalid @enderror" id="valKondisipekerjaan" name="valKondisipekerjaan">
                                        <option value="Bersekolah" {{ (old('valKondisipekerjaan') == 'Bersekolah' || (isset($datapk) && $datapk->kondisi_pekerjaan == 'Bersekolah')) ? 'selected' : '' }}>Bersekolah</option>
                                        <option value="Ibu Rumah Tangga" {{ (old('valKondisipekerjaan') == 'Ibu Rumah Tangga' || (isset($datapk) && $datapk->kondisi_pekerjaan == 'Ibu Rumah Tangga')) ? 'selected' : '' }}>Ibu Rumah Tangga</option>
                                        <option value="Tidak Bekerja" {{ (old('valKondisipekerjaan') == 'Tidak Bekerja' || (isset($datapk) && $datapk->kondisi_pekerjaan == 'Tidak Bekerja')) ? 'selected' : '' }}>Tidak Bekerja</option>
                                        <option value="Sedang Mencari Pekerjaan" {{ (old('valKondisipekerjaan') == 'Sedang Mencari Pekerjaan' || (isset($datapk) && $datapk->kondisi_pekerjaan == 'Sedang Mencari Pekerjaan')) ? 'selected' : '' }}>Sedang Mencari Pekerjaan</option>
                                        <option value="Bekerja" {{ (old('valKondisipekerjaan') == 'Bekerja' || (isset($datapk) && $datapk->kondisi_pekerjaan == 'Bekerja')) ? 'selected' : '' }}>Bekerja</option>
                                    </select>                                    
                                    @error('valKondisipekerjaan')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valPekerjaanutama">PEKERJAAN UTAMA <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control @error('valPekerjaanutama') is-invalid @enderror" id="valPekerjaanutama" name="valPekerjaanutama">
                                        <option value="0" disabled selected>--Pilih Pekerjaan--</option>
                                        @foreach ($pekerjaan as $item)
                                            <option value="{{ $item->id }}" {{ $datap->agama_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    
                                    
                                    @error('valPekerjaanutama')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valJaminanketenagakerjaan">JAMINAN SOSISAL KETENAGAKERJAAN <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control @error('valJaminanketenagakerjaan') is-invalid @enderror" id="valJaminanketenagakerjaan" name="valJaminanketenagakerjaan">
                                        <option value="Peserta" {{ (old('valJaminanketenagakerjaan') == 'Peserta' || (isset($datapk) && $datapk->jaminan_sosial_ketenagakerjaan == 'Peserta')) ? 'selected' : '' }}>Peserta</option>
                                        <option value="Bukan peserta" {{ (old('valJaminanketenagakerjaan') == 'Bukan peserta' || (isset($datapk) && $datapk->jaminan_sosial_ketenagakerjaan == 'Bukan peserta')) ? 'selected' : '' }}>Bukan peserta</option>
                                    </select>
                                    @error('valJaminanketenagakerjaan')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valPenghasilansetahun">PENGHASILAN SETAHUN TERKAHIR <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $datapk->penghasilan_setahun_terakhir ?? '' }}"  class="form-control @error('valPenghasilansetahun') is-invalid @enderror" id="valPenghasilansetahun" name="valPenghasilansetahun"  placeholder="Tulis Nominalnya">
                                    @error('valPenghasilansetahun')
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
