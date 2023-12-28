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
                        <h1 class="card-title">EDIT KEJADIAN LUAR BIASA
                            {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rt_kejadianluarbiasa.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rt_kejadianluarbiasa.update') }}" method="POST">
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
                                    <label class="col-lg-4 col-form-label">MUNTABER/DIARE
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_muntaber">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valnama_muntaber') is-invalid @enderror"
                                                id="valnama_muntaber" name="valnama_muntaber">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valnama_muntaber') == 'ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_muntaber == 'ada') ? 'selected' : '' }}>
                                                    Ada
                                                </option>
                                                <option value="tidak ada"
                                                    {{ old('valnama_muntaber') == 'tidak ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_muntaber == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada
                                                </option>
                                            </select>


                                            @error('valnama_muntaber')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_muntaber">JUMLAH PENDERITA
                                            </label>
                                            <input type="text" value="{{ $rt_kejadianluarbiasa->jp_muntaber ?? '' }}"
                                                class="form-control @error('valjp_muntaber') is-invalid @enderror"
                                                id="valjp_muntaber" name="valjp_muntaber" placeholder="jumlah...">

                                            @error('valjp_muntaber')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_muntaber">JUMLAH MENINGGAL

                                            </label>
                                            <input type="number" value="{{ $rt_kejadianluarbiasa->jm_muntaber ?? '' }}"
                                                class="form-control @error('valjm_muntaber') is-invalid @enderror"
                                                id="valjm_muntaber" name="valjm_muntaber" placeholder="Jumlah...">
                                            @error('valjm_muntaber')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">DEMAM BERDARAH		

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_dbd">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valnama_dbd') is-invalid @enderror"
                                                id="valnama_dbd" name="valnama_dbd">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valnama_dbd') == 'ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_dbd == 'ada') ? 'selected' : '' }}>
                                                    Ada
                                                </option>
                                                <option value="tidak ada"
                                                    {{ old('valnama_dbd') == 'tidak ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_dbd == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada
                                                </option>
                                            </select>


                                            @error('valnama_dbd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_dbd">JUMLAH PENDERITA
                                            </label>
                                            <input type="text" value="{{ $rt_kejadianluarbiasa->jp_dbd ?? '' }}"
                                                class="form-control @error('valjp_dbd') is-invalid @enderror"
                                                id="valjp_dbd" name="valjp_dbd" placeholder="jumlah...">

                                            @error('valjp_dbd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_dbd">JUMLAH MENINGGAL

                                            </label>
                                            <input type="number" value="{{ $rt_kejadianluarbiasa->jm_dbd ?? '' }}"
                                                class="form-control @error('valjm_dbd') is-invalid @enderror"
                                                id="valjm_dbd" name="valjm_dbd" placeholder="Jumlah...">
                                            @error('valjm_dbd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">CAMPAK		

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_campak">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valnama_campak') is-invalid @enderror"
                                                id="valnama_campak" name="valnama_campak">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valnama_campak') == 'ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_campak == 'ada') ? 'selected' : '' }}>
                                                    Ada
                                                </option>
                                                <option value="tidak ada"
                                                    {{ old('valnama_campak') == 'tidak ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_campak == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada
                                                </option>
                                            </select>


                                            @error('valnama_campak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_campak">JUMLAH PENDERITA
                                            </label>
                                            <input type="text" value="{{ $rt_kejadianluarbiasa->jp_campak ?? '' }}"
                                                class="form-control @error('valjp_campak') is-invalid @enderror"
                                                id="valjp_campak" name="valjp_campak" placeholder="jumlah...">

                                            @error('valjp_campak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_campak">JUMLAH MENINGGAL

                                            </label>
                                            <input type="number" value="{{ $rt_kejadianluarbiasa->jm_campak ?? '' }}"
                                                class="form-control @error('valjm_campak') is-invalid @enderror"
                                                id="valjm_campak" name="valjm_campak" placeholder="Jumlah...">
                                            @error('valjm_campak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">MALARIA		

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_malaria">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valnama_malaria') is-invalid @enderror"
                                                id="valnama_malaria" name="valnama_malaria">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valnama_malaria') == 'ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_malaria == 'ada') ? 'selected' : '' }}>
                                                    Ada
                                                </option>
                                                <option value="tidak ada"
                                                    {{ old('valnama_malaria') == 'tidak ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_malaria == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada
                                                </option>
                                            </select>


                                            @error('valnama_malaria')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_malaria">JUMLAH PENDERITA
                                            </label>
                                            <input type="text" value="{{ $rt_kejadianluarbiasa->jp_malaria ?? '' }}"
                                                class="form-control @error('valjp_malaria') is-invalid @enderror"
                                                id="valjp_malaria" name="valjp_malaria" placeholder="jumlah...">

                                            @error('valjp_malaria')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_malaria">JUMLAH MENINGGAL

                                            </label>
                                            <input type="number" value="{{ $rt_kejadianluarbiasa->jm_malaria ?? '' }}"
                                                class="form-control @error('valjm_malaria') is-invalid @enderror"
                                                id="valjm_malaria" name="valjm_malaria" placeholder="Jumlah...">
                                            @error('valjm_malaria')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">FLU BURUNG/SARS		

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_fluburung">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valnama_fluburung') is-invalid @enderror"
                                                id="valnama_fluburung" name="valnama_fluburung">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valnama_fluburung') == 'ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_fluburung == 'ada') ? 'selected' : '' }}>
                                                    Ada
                                                </option>
                                                <option value="tidak ada"
                                                    {{ old('valnama_fluburung') == 'tidak ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_fluburung == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada
                                                </option>
                                            </select>


                                            @error('valnama_fluburung')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_fluburung">JUMLAH PENDERITA
                                            </label>
                                            <input type="text" value="{{ $rt_kejadianluarbiasa->jp_fluburung ?? '' }}"
                                                class="form-control @error('valjp_fluburung') is-invalid @enderror"
                                                id="valjp_fluburung" name="valjp_fluburung" placeholder="jumlah...">

                                            @error('valjp_fluburung')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_fluburung">JUMLAH MENINGGAL

                                            </label>
                                            <input type="number" value="{{ $rt_kejadianluarbiasa->jm_fluburung ?? '' }}"
                                                class="form-control @error('valjm_fluburung') is-invalid @enderror"
                                                id="valjm_fluburung" name="valjm_fluburung" placeholder="Jumlah...">
                                            @error('valjm_fluburung')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">COVID-19		

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_covid19">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valnama_covid19') is-invalid @enderror"
                                                id="valnama_covid19" name="valnama_covid19">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valnama_covid19') == 'ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_covid19 == 'ada') ? 'selected' : '' }}>
                                                    Ada
                                                </option>
                                                <option value="tidak ada"
                                                    {{ old('valnama_covid19') == 'tidak ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_covid19 == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada
                                                </option>
                                            </select>


                                            @error('valnama_covid19')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_covid19">JUMLAH PENDERITA
                                            </label>
                                            <input type="text" value="{{ $rt_kejadianluarbiasa->jp_covid19 ?? '' }}"
                                                class="form-control @error('valjp_covid19') is-invalid @enderror"
                                                id="valjp_covid19" name="valjp_covid19" placeholder="jumlah...">

                                            @error('valjp_covid19')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_covid19">JUMLAH MENINGGAL

                                            </label>
                                            <input type="number" value="{{ $rt_kejadianluarbiasa->jm_covid19 ?? '' }}"
                                                class="form-control @error('valjm_covid19') is-invalid @enderror"
                                                id="valjm_covid19" name="valjm_covid19" placeholder="Jumlah...">
                                            @error('valjm_covid19')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">HEPATITIS B		

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_hepatitisb">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valnama_hepatitisb') is-invalid @enderror"
                                                id="valnama_hepatitisb" name="valnama_hepatitisb">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valnama_hepatitisb') == 'ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_hepatitisb == 'ada') ? 'selected' : '' }}>
                                                    Ada
                                                </option>
                                                <option value="tidak ada"
                                                    {{ old('valnama_hepatitisb') == 'tidak ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_hepatitisb == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada
                                                </option>
                                            </select>


                                            @error('valnama_hepatitisb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_hepatitisb">JUMLAH PENDERITA
                                            </label>
                                            <input type="text" value="{{ $rt_kejadianluarbiasa->jp_hepatitisb ?? '' }}"
                                                class="form-control @error('valjp_hepatitisb') is-invalid @enderror"
                                                id="valjp_hepatitisb" name="valjp_hepatitisb" placeholder="jumlah...">

                                            @error('valjp_hepatitisb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_hepatitisb">JUMLAH MENINGGAL

                                            </label>
                                            <input type="number" value="{{ $rt_kejadianluarbiasa->jm_hepatitisb ?? '' }}"
                                                class="form-control @error('valjm_hepatitisb') is-invalid @enderror"
                                                id="valjm_hepatitisb" name="valjm_hepatitisb" placeholder="Jumlah...">
                                            @error('valjm_hepatitisb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">HEPATITIS E		

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_hepatitise">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valnama_hepatitise') is-invalid @enderror"
                                                id="valnama_hepatitise" name="valnama_hepatitise">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valnama_hepatitise') == 'ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_hepatitise == 'ada') ? 'selected' : '' }}>
                                                    Ada
                                                </option>
                                                <option value="tidak ada"
                                                    {{ old('valnama_hepatitise') == 'tidak ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_hepatitise == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada
                                                </option>
                                            </select>


                                            @error('valnama_hepatitise')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_hepatitise">JUMLAH PENDERITA
                                            </label>
                                            <input type="text" value="{{ $rt_kejadianluarbiasa->jp_hepatitise ?? '' }}"
                                                class="form-control @error('valjp_hepatitise') is-invalid @enderror"
                                                id="valjp_hepatitise" name="valjp_hepatitise" placeholder="jumlah...">

                                            @error('valjp_hepatitise')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_hepatitise">JUMLAH MENINGGAL

                                            </label>
                                            <input type="number" value="{{ $rt_kejadianluarbiasa->jm_hepatitise ?? '' }}"
                                                class="form-control @error('valjm_hepatitise') is-invalid @enderror"
                                                id="valjm_hepatitise" name="valjm_hepatitise" placeholder="Jumlah...">
                                            @error('valjm_hepatitise')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">DIPTERI		

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_dipteri">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valnama_dipteri') is-invalid @enderror"
                                                id="valnama_dipteri" name="valnama_dipteri">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valnama_dipteri') == 'ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_dipteri == 'ada') ? 'selected' : '' }}>
                                                    Ada
                                                </option>
                                                <option value="tidak ada"
                                                    {{ old('valnama_dipteri') == 'tidak ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_dipteri == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada
                                                </option>
                                            </select>


                                            @error('valnama_dipteri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_dipteri">JUMLAH PENDERITA
                                            </label>
                                            <input type="text" value="{{ $rt_kejadianluarbiasa->jp_dipteri ?? '' }}"
                                                class="form-control @error('valjp_dipteri') is-invalid @enderror"
                                                id="valjp_dipteri" name="valjp_dipteri" placeholder="jumlah...">

                                            @error('valjp_dipteri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_dipteri">JUMLAH MENINGGAL

                                            </label>
                                            <input type="number" value="{{ $rt_kejadianluarbiasa->jm_dipteri ?? '' }}"
                                                class="form-control @error('valjm_dipteri') is-invalid @enderror"
                                                id="valjm_dipteri" name="valjm_dipteri" placeholder="Jumlah...">
                                            @error('valjm_dipteri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">CHIKUNGUNYA		
                                        <span class="text-danger">*</span></label>		
                                        
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_chikung">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valnama_chikung') is-invalid @enderror"
                                                id="valnama_chikung" name="valnama_chikung">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valnama_chikung') == 'ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_chikung == 'ada') ? 'selected' : '' }}>
                                                    Ada
                                                </option>
                                                <option value="tidak ada"
                                                    {{ old('valnama_chikung') == 'tidak ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_chikung == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada
                                                </option>
                                            </select>


                                            @error('valnama_chikung')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_chikung">JUMLAH PENDERITA
                                            </label>
                                            <input type="text" value="{{ $rt_kejadianluarbiasa->jp_chikung ?? '' }}"
                                                class="form-control @error('valjp_chikung') is-invalid @enderror"
                                                id="valjp_chikung" name="valjp_chikung" placeholder="jumlah...">

                                            @error('valjp_chikung')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_chikung">JUMLAH MENINGGAL
                                            </label>
                                            <input type="number" value="{{ $rt_kejadianluarbiasa->jm_chikung ?? '' }}"
                                                class="form-control @error('valjm_chikung') is-invalid @enderror"
                                                id="valjm_chikung" name="valjm_chikung" placeholder="Jumlah...">
                                            @error('valjm_chikung')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">LEPTOSPIROSIS
                                        <span class="text-danger">*</span></label>		
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_leptos">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valnama_leptos') is-invalid @enderror"
                                                id="valnama_leptos" name="valnama_leptos">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valnama_leptos') == 'ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_leptos == 'ada') ? 'selected' : '' }}>
                                                    Ada
                                                </option>
                                                <option value="tidak ada"
                                                    {{ old('valnama_leptos') == 'tidak ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_leptos == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada
                                                </option>
                                            </select>
                                            @error('valnama_leptos')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_leptos">JUMLAH PENDERITA
                                            </label>
                                            <input type="text" value="{{ $rt_kejadianluarbiasa->jp_leptos ?? '' }}"
                                                class="form-control @error('valjp_leptos') is-invalid @enderror"
                                                id="valjp_leptos" name="valjp_leptos" placeholder="jumlah...">

                                            @error('valjp_leptos')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_leptos">JUMLAH MENINGGAL

                                            </label>
                                            <input type="number" value="{{ $rt_kejadianluarbiasa->jm_leptos ?? '' }}"
                                                class="form-control @error('valjm_leptos') is-invalid @enderror"
                                                id="valjm_leptos" name="valjm_leptos" placeholder="Jumlah...">
                                            @error('valjm_leptos')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>


                               


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KOLERA
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_kolera">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valnama_kolera') is-invalid @enderror"
                                                id="valnama_kolera" name="valnama_kolera">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valnama_kolera') == 'ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_kolera == 'ada') ? 'selected' : '' }}>
                                                    Ada
                                                </option>
                                                <option value="tidak ada"
                                                    {{ old('valnama_kolera') == 'tidak ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_kolera == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada
                                                </option>
                                            </select>


                                            @error('valnama_kolera')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_kolera">JUMLAH PENDERITA
                                            </label>
                                            <input type="text" value="{{ $rt_kejadianluarbiasa->jp_kolera ?? '' }}"
                                                class="form-control @error('valjp_kolera') is-invalid @enderror"
                                                id="valjp_kolera" name="valjp_kolera" placeholder="jumlah...">

                                            @error('valjp_kolera')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_kolera">JUMLAH MENINGGAL

                                            </label>
                                            <input type="number" value="{{ $rt_kejadianluarbiasa->jm_kolera ?? '' }}"
                                                class="form-control @error('valjm_kolera') is-invalid @enderror"
                                                id="valjm_kolera" name="valjm_kolera" placeholder="Jumlah...">
                                            @error('valjm_kolera')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">GIZI BURUK (MARASMUS KWASHIORKOR)
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_giziburuk">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valnama_giziburuk') is-invalid @enderror"
                                                id="valnama_giziburuk" name="valnama_giziburuk">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valnama_giziburuk') == 'ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_giziburuk == 'ada') ? 'selected' : '' }}>
                                                    Ada
                                                </option>
                                                <option value="tidak ada"
                                                    {{ old('valnama_giziburuk') == 'tidak ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_giziburuk == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada
                                                </option>
                                            </select>


                                            @error('valnama_giziburuk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_giziburuk">JUMLAH PENDERITA
                                            </label>
                                            <input type="text" value="{{ $rt_kejadianluarbiasa->jp_giziburuk ?? '' }}"
                                                class="form-control @error('valjp_giziburuk') is-invalid @enderror"
                                                id="valjp_giziburuk" name="valjp_giziburuk" placeholder="jumlah...">

                                            @error('valjp_giziburuk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_giziburuk">JUMLAH MENINGGAL

                                            </label>
                                            <input type="number" value="{{ $rt_kejadianluarbiasa->jm_giziburuk ?? '' }}"
                                                class="form-control @error('valjm_giziburuk') is-invalid @enderror"
                                                id="valjm_giziburuk" name="valjm_giziburuk" placeholder="Jumlah...">
                                            @error('valjm_giziburuk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">LAINNYA		

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_lainnya">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valnama_lainnya') is-invalid @enderror"
                                                id="valnama_lainnya" name="valnama_lainnya">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valnama_lainnya') == 'ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_lainnya == 'ada') ? 'selected' : '' }}>
                                                    Ada
                                                </option>
                                                <option value="tidak ada"
                                                    {{ old('valnama_lainnya') == 'tidak ada' || (isset($rt_kejadianluarbiasa) && $rt_kejadianluarbiasa->nama_lainnya == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada
                                                </option>
                                            </select>


                                            @error('valnama_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_lainnya">JUMLAH PENDERITA
                                            </label>
                                            <input type="text" value="{{ $rt_kejadianluarbiasa->jp_lainnya ?? '' }}"
                                                class="form-control @error('valjp_lainnya') is-invalid @enderror"
                                                id="valjp_lainnya" name="valjp_lainnya" placeholder="jumlah...">

                                            @error('valjp_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_lainnya">JUMLAH MENINGGAL

                                            </label>
                                            <input type="number" value="{{ $rt_kejadianluarbiasa->jm_lainnya ?? '' }}"
                                                class="form-control @error('valjm_lainnya') is-invalid @enderror"
                                                id="valjm_lainnya" name="valjm_lainnya" placeholder="Jumlah...">
                                            @error('valjm_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
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
