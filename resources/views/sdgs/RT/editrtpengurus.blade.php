@extends('layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT PENGURUS
                            {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rtpengurus.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rtpengurus.update') }}" method="POST">
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
                                    <label class="col-lg-4 col-form-label">KETUA RW
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_ketuarw">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_pengurus->nama_ketuarw ?? '' }}"
                                                class="form-control @error('valnama_ketuarw') is-invalid @enderror"
                                                id="valnama_ketuarw" name="valnama_ketuarw" placeholder="Nama...">
                                            @error('valnama_ketuarw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnik_ketuarw">NIK
                                            </label>
                                            <input type="text"
                                            value="{{ $rt_pengurus->nik_ketuarw ?? '' }}"
                                            class="form-control @error('valnik_ketuarw') is-invalid @enderror"
                                            id="valnik_ketuarw"
                                            name="valnik_ketuarw"
                                            placeholder="NIK..."
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            @error('valnik_ketuarw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnohp_ketuarw">NO HP
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->nohp_ketuarw ?? '' }}"
                                                class="form-control @error('valnohp_ketuarw') is-invalid @enderror"
                                                id="valnohp_ketuarw" name="valnohp_ketuarw" placeholder="Nohp...">
                                            @error('valnohp_ketuarw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valmenjabat_ketuarw">MENJABAT SEJAK
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->menjabat_ketuarw ?? '' }}"
                                                class="form-control @error('valmenjabat_ketuarw') is-invalid @enderror"
                                                id="valmenjabat_ketuarw" name="valmenjabat_ketuarw" placeholder="jumlah...">
                                            @error('valmenjabat_ketuarw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SEKRETARIS RW			

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_sekrw">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_pengurus->nama_sekrw ?? '' }}"
                                                class="form-control @error('valnama_sekrw') is-invalid @enderror"
                                                id="valnama_sekrw" name="valnama_sekrw" placeholder="Nama...">
                                            @error('valnama_sekrw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnik_sekrw">NIK
                                            </label>
                                            <input type="text"
                                            value="{{ $rt_pengurus->nik_sekrw ?? '' }}"
                                            class="form-control @error('valnik_sekrw') is-invalid @enderror"
                                            id="valnik_sekrw"
                                            name="valnik_sekrw"
                                            placeholder="NIK..."
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            @error('valnik_sekrw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnohp_sekrw">NO HP
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->nohp_sekrw ?? '' }}"
                                                class="form-control @error('valnohp_sekrw') is-invalid @enderror"
                                                id="valnohp_sekrw" name="valnohp_sekrw" placeholder="Nohp...">
                                            @error('valnohp_sekrw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valmenjabat_sekrw">MENJABAT SEJAK
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->menjabat_sekrw ?? '' }}"
                                                class="form-control @error('valmenjabat_sekrw') is-invalid @enderror"
                                                id="valmenjabat_sekrw" name="valmenjabat_sekrw" placeholder="jumlah...">
                                            @error('valmenjabat_sekrw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BENDAHARA RW	
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_benrw">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_pengurus->nama_benrw ?? '' }}"
                                                class="form-control @error('valnama_benrw') is-invalid @enderror"
                                                id="valnama_benrw" name="valnama_benrw" placeholder="jumlah...">
                                            @error('valnama_benrw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnik_benrw">NIK
                                            </label>
                                            <input type="text"
                                            value="{{ $rt_pengurus->nik_benrw ?? '' }}"
                                            class="form-control @error('valnik_benrw') is-invalid @enderror"
                                            id="valnik_benrw"
                                            name="valnik_benrw"
                                            placeholder="NIK..."
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            @error('valnik_benrw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnohp_benrw">NO HP
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->nohp_benrw ?? '' }}"
                                                class="form-control @error('valnohp_benrw') is-invalid @enderror"
                                                id="valnohp_benrw" name="valnohp_benrw" placeholder="Nohp...">
                                            @error('valnohp_benrw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valmenjabat_benrw">MENJABAT SEJAK
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->menjabat_benrw ?? '' }}"
                                                class="form-control @error('valmenjabat_benrw') is-invalid @enderror"
                                                id="valmenjabat_benrw" name="valmenjabat_benrw" placeholder="jumlah...">
                                            @error('valmenjabat_benrw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KETUA RT		
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_ketuart">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_pengurus->nama_ketuart ?? '' }}"
                                                class="form-control @error('valnama_ketuart') is-invalid @enderror"
                                                id="valnama_ketuart" name="valnama_ketuart" placeholder="Nama...">
                                            @error('valnama_ketuart')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnik_ketuart">NIK
                                            </label>
                                            <input type="text"
                                            value="{{ $rt_pengurus->nik_ketuart ?? '' }}"
                                            class="form-control @error('valnik_ketuart') is-invalid @enderror"
                                            id="valnik_ketuart"
                                            name="valnik_ketuart"
                                            placeholder="NIK..."
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            @error('valnik_ketuart')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnohp_ketuart">NO HP
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->nohp_ketuart ?? '' }}"
                                                class="form-control @error('valnohp_ketuart') is-invalid @enderror"
                                                id="valnohp_ketuart" name="valnohp_ketuart" placeholder="Nohp...">
                                            @error('valnohp_ketuart')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valmenjabat_ketuart">MENJABAT SEJAK
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->menjabat_ketuart ?? '' }}"
                                                class="form-control @error('valmenjabat_ketuart') is-invalid @enderror"
                                                id="valmenjabat_ketuart" name="valmenjabat_ketuart" placeholder="jumlah...">
                                            @error('valmenjabat_ketuart')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SEKRETARIS RT
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_sekrt">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_pengurus->nama_sekrt ?? '' }}"
                                                class="form-control @error('valnama_sekrt') is-invalid @enderror"
                                                id="valnama_sekrt" name="valnama_sekrt" placeholder="Nama...">
                                            @error('valnama_sekrt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnik_sekrt">NIK
                                            </label>
                                            <input type="text"
                                            value="{{ $rt_pengurus->nik_sekrt ?? '' }}"
                                            class="form-control @error('valnik_sekrt') is-invalid @enderror"
                                            id="valnik_sekrt"
                                            name="valnik_sekrt"
                                            placeholder="NIK..."
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            @error('valnik_sekrt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnohp_sekrt">NO HP
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->nohp_sekrt ?? '' }}"
                                                class="form-control @error('valnohp_sekrt') is-invalid @enderror"
                                                id="valnohp_sekrt" name="valnohp_sekrt" placeholder="Nohp...">
                                            @error('valnohp_sekrt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valmenjabat_sekrt">MENJABAT SEJAK
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->menjabat_sekrt ?? '' }}"
                                                class="form-control @error('valmenjabat_sekrt') is-invalid @enderror"
                                                id="valmenjabat_sekrt" name="valmenjabat_sekrt" placeholder="jumlah...">
                                            @error('valmenjabat_sekrt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BENDAHARA RT	
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_benrt">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_pengurus->nama_benrt ?? '' }}"
                                                class="form-control @error('valnama_benrt') is-invalid @enderror"
                                                id="valnama_benrt" name="valnama_benrt" placeholder="Nama...">
                                            @error('valnama_benrt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnik_benrt">NIK
                                            </label>
                                            <input type="text"
                                            value="{{ $rt_pengurus->nik_benrt ?? '' }}"
                                            class="form-control @error('valnik_benrt') is-invalid @enderror"
                                            id="valnik_benrt"
                                            name="valnik_benrt"
                                            placeholder="NIK..."
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            @error('valnik_benrt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnohp_benrt">NO HP
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->nohp_benrt ?? '' }}"
                                                class="form-control @error('valnohp_benrt') is-invalid @enderror"
                                                id="valnohp_benrt" name="valnohp_benrt" placeholder="Nohp...">
                                            @error('valnohp_benrt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valmenjabat_benrt">MENJABAT SEJAK
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->menjabat_benrt ?? '' }}"
                                                class="form-control @error('valmenjabat_benrt') is-invalid @enderror"
                                                id="valmenjabat_benrt" name="valmenjabat_benrt" placeholder="jumlah...">
                                            @error('valmenjabat_benrt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
