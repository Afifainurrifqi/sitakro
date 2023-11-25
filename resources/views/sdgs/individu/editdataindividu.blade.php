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
                    <h1 class="card-title">EDIT DATA INDIVIDU {{ $datap->nama }}</h1>
                    <button type="button" class="btn mb-1 btn-warning" onclick="window.location='{{ url('/sdgs/individu/dataindividu') }}'">Kembali
                     </button> 
                     <br><br><br>
                    <div class="form-validation">
                       
                        <form class="form-valide" action="{{ route('individu.update') }}" method="POST">
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
                                <label class="col-lg-4 col-form-label" for="valJeniskelamin">Jenis kelamin <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select name="valJeniskelamin" class="form-control-plaintext @error('valJeniskelamin') is-invalid @enderror" id="valJeniskelamin" required disabled>
                                        <option value="1" {{ ($datap->jenis_kelamin =='1') ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="0"  {{ ($datap->jenis_kelamin =='0') ? 'selected' : '' }} >Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valconfirm-Tempatlahir">Tempat Lahir <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    {{ $datap->tempat_lahir }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valTanggallahir">Tanggal Lahir <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="date" vc class="form-control-plaintext @error('valTanggallahir') is-invalid @enderror" id="valTanggallahir" name="valTanggallahir" value="{{ $datap->tanggal_lahir }}" required disabled>
                                    @error('valTanggallahir')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>              
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valUsia">Usia <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    @php
                                    $usia = Carbon\Carbon::parse($datap->tanggal_lahir)->age;
                                @endphp
                                
                                 {{ $usia }} tahun.
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valStatus">Status <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control-plaintext @error('valStatus') is-invalid @enderror" id="valStatus" name="valStatus" required disabled>
                                        <option value="0" disabled selected>--Pilih Status--</option>
                                        @foreach ( $status  as $item)
                                        <option value="{{ $item->id }}" {{ $datap->status_id == $item->id ? 'selected' : '' }} >{{ $item->nama }}</option>
                                    @endforeach
                                    </select>
                                    @error('valStatus')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valUsiapertamamenikah">Usia saat pertama kali menikah <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="number"  class="form-control @error('valUsiapertamamenikah') is-invalid @enderror" id="valUsiapertamamenikah" name="valUsiapertamamenikah" value="{{ $datai->usia_saat_pertama_kali_menikah ?? ''}}" placeholder="Usia berapa tahun...">
                                    @error('valUsiapertamamenikah')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valAgama">Agama <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control-plaintext @error('valAgama') is-invalid @enderror" id="valAgama" name="valAgama" required disabled>
                                        <option value="0" disabled selected>--Pilih Agama--</option>
                                        @foreach ($agama as $item)
                                        <option value="{{ $item->id }}" {{ $datap->agama_id == $item->id ? 'selected' : '' }} >{{ $item->nama }}</option>
                                    @endforeach
                                    </select>
                                    @error('valAgama')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valSukubangsa">Suku Bangsa <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $datai->suku_bangsa ?? '' }}" class="form-control @error('valSukubangsa') is-invalid @enderror" id="valSukubangsa" name="valSukubangsa"  placeholder="Tulis suku bangsamu...">
                                    @error('valSukubangsa')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valWarganegara">Warga Nergara <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $datai->suku_bangsa ?? '' }}" class="form-control @error('valWarganegara') is-invalid @enderror" id="valWarganegara" name="valWarganegara"  placeholder="Tulis suku bangsamu...">
                                    @error('valWarganegara')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valNohp">Nomer HP <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $datai->nohp ?? '' }}" pattern="[0-9]+" class="form-control @error('valNohp') is-invalid @enderror" id="valNohp" name="valNohp"  placeholder="Tulis Nomermu">
                                    @error('valNohp')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valNowa">Nomer Whatsapp <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $datai->nowa ?? '' }}" pattern="[0-9]+" class="form-control @error('valNowa') is-invalid @enderror" id="valNowa" name="valNowa"  placeholder="Tulis Nomermu">
                                    @error('valNowa')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valEmail">Email <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $datai->email ?? '' }}" class="form-control @error('valEmail') is-invalid @enderror" id="valEmail" name="valEmail"  placeholder="Tulis Emailmu">
                                    @error('valEmail')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valFacebook">Facebook <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $datai->facebook ?? '' }}" class="form-control @error('valFacebook') is-invalid @enderror" id="valFacebook" name="valFacebook"  placeholder="Tulis link facebookmu">
                                    @error('valFacebook')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valTwitter">Twitter <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $datai->twitter ?? '' }}" class="form-control @error('valTwitter') is-invalid @enderror" id="valTwitter" name="valTwitter"  placeholder="Tulis link Twitter">
                                    @error('valTwitter')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valInstagram">Instagram <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $datai->instagram ?? '' }}" class="form-control @error('valInstagram') is-invalid @enderror" id="valInstagram" name="valInstagram"  placeholder="Tulis link Instagram">
                                    @error('valInstagram')
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
