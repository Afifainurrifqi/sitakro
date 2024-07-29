 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT KESEHATAN
                            <h1  class="card-title"> RT : {{ $datart->rt }}</h1> <h1 class="card-title"> RW :  {{ $datart->rw }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rt_kesehatan.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rt_kesehatan.update') }}" method="POST" id="form-edit-rtkesehatan">
                                @csrf
                                <div class="form-group row" >
                                    <label class="col-lg-4 col-form-label" for="valnik">NIK <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="hidden" value="{{ old('valnik', $datart->nik) }}" class="form-control @error('valnik') is-invalid @enderror" id="valnik" name="valnik" placeholder="Nama Lengkap...">
                                        <div class="col-lg-6">
                                            {{ $datart->nik }}
                                        </div>
                                        @error('valnik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valnama_ketuart">Nama Ketua RT <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="hidden" value="{{ old('valnama_ketuart', $datart->nama) }}" class="form-control @error('valnama_ketuart') is-invalid @enderror" id="valnama_ketuart" name="valnama_ketuart" placeholder="Nama Lengkap...">
                                        <div class="col-lg-6">
                                            {{ $datart->nama }}
                                        </div>
                                        @error('valnama_ketuart')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valalamat">ALAMAT<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input value="{{ old('valnama_ketuart', $datart->alamat) }}" type="hidden"
                                            class="form-control @error('valalamat') is-invalid @enderror" id="valalamat"
                                            name="valalamat" placeholder="Alamat...">
                                            <div class="col-lg-6">
                                                {{ $datart->alamat }}
                                            </div>
                                        @error('valalamat')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valrt">RT<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input value="{{ old('valnama_ketuart', $datart->rt) }}" type="hidden"
                                            class="form-control @error('valrt') is-invalid @enderror" id="valrt"
                                            name="valrt" placeholder="RT...">
                                            <div class="col-lg-6">
                                                {{ $datart->rt }}
                                            </div>
                                        @error('valrt')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valrw">RW <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input value="{{ old('valnama_ketuart', $datart->rw) }}" type="hidden"
                                            class="form-control @error('valrw') is-invalid @enderror" id="valrw"
                                            name="valrw" placeholder="RW..">
                                            <div class="col-lg-6">
                                                {{ $datart->rw }}
                                            </div>
                                        @error('valrw')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valnohp">NO HP <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input value="{{ old('valnama_ketuart', $datart->nohp) }}" type="hidden"
                                            class="form-control @error('valnohp') is-invalid @enderror" id="valnohp"
                                            name="valnohp" placeholder="RW..">
                                            <div class="col-lg-6">
                                                {{ $datart->nohp }}
                                            </div>
                                        @error('valnohp')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">RUMAH SAKIT
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_rs">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_kesehatan->nama_rs ?? '' }}"
                                                class="form-control @error('valnama_rs') is-invalid @enderror"
                                                id="valnama_rs" name="valnama_rs" placeholder="Nama...">

                                            @error('valnama_rs')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_rs">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_rs') is-invalid @enderror"
                                                id="valpemilik_rs" name="valpemilik_rs">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_rs') == 'negeri' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_rs == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_rs') == 'swasta' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_rs == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_rs')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_rs">JUMLAH DOKTER
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jd_rs ?? '' }}"
                                                class="form-control @error('valjd_rs') is-invalid @enderror" id="valjd_rs"
                                                name="valjd_rs" placeholder="Jumlah...">
                                            @error('valjd_rs')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_rs">JUMLAH BIDAN
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jb_rs ?? '' }}"
                                                class="form-control @error('valjb_rs') is-invalid @enderror" id="valjb_rs"
                                                name="valjb_rs" placeholder="Jumlah...">
                                            @error('valjb_rs')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_rs">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jts_rs ?? '' }}"
                                                class="form-control @error('valjts_rs') is-invalid @enderror" id="valjts_rs"
                                                name="valjts_rs" placeholder="Jumlah...">
                                            @error('valjts_rs')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_rs">JUMLAH PEGAWAI

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jp_rs ?? '' }}"
                                                class="form-control @error('valjp_rs') is-invalid @enderror" id="valjp_rs"
                                                name="valjp_rs" placeholder="Jumlah...">
                                            @error('valjp_rs')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">RUMAH SAKIT BERSALIN
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_rsb">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_kesehatan->nama_rsb ?? '' }}"
                                                class="form-control @error('valnama_rsb') is-invalid @enderror"
                                                id="valnama_rsb" name="valnama_rsb" placeholder="Nama...">

                                            @error('valnama_rsb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_rsb">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_rsb') is-invalid @enderror"
                                                id="valpemilik_rsb" name="valpemilik_rsb">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_rsb') == 'negeri' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_rsb == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_rsb') == 'swasta' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_rsb == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_rsb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_rsb">JUMLAH DOKTER
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jd_rsb ?? '' }}"
                                                class="form-control @error('valjd_rsb') is-invalid @enderror" id="valjd_rsb"
                                                name="valjd_rsb" placeholder="Jumlah...">
                                            @error('valjd_rsb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_rsb">JUMLAH BIDAN
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jb_rsb ?? '' }}"
                                                class="form-control @error('valjb_rsb') is-invalid @enderror" id="valjb_rsb"
                                                name="valjb_rsb" placeholder="Jumlah...">
                                            @error('valjb_rsb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_rsb">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jts_rsb ?? '' }}"
                                                class="form-control @error('valjts_rsb') is-invalid @enderror" id="valjts_rsb"
                                                name="valjts_rsb" placeholder="Jumlah...">
                                            @error('valjts_rsb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_rsb">JUMLAH PEGAWAI

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jp_rsb ?? '' }}"
                                                class="form-control @error('valjp_rsb') is-invalid @enderror" id="valjp_rsb"
                                                name="valjp_rsb" placeholder="Jumlah...">
                                            @error('valjp_rsb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PUSKESMAS DENGAN RAWAT INAP

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_pdri">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_kesehatan->nama_pdri ?? '' }}"
                                                class="form-control @error('valnama_pdri') is-invalid @enderror"
                                                id="valnama_pdri" name="valnama_pdri" placeholder="Nama...">

                                            @error('valnama_pdri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_pdri">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_pdri') is-invalid @enderror"
                                                id="valpemilik_pdri" name="valpemilik_pdri">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_pdri') == 'negeri' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_pdri == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_pdri') == 'swasta' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_pdri == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_pdri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_pdri">JUMLAH DOKTER
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jd_pdri ?? '' }}"
                                                class="form-control @error('valjd_pdri') is-invalid @enderror" id="valjd_pdri"
                                                name="valjd_pdri" placeholder="Jumlah...">
                                            @error('valjd_pdri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_pdri">JUMLAH BIDAN
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jb_pdri ?? '' }}"
                                                class="form-control @error('valjb_pdri') is-invalid @enderror" id="valjb_pdri"
                                                name="valjb_pdri" placeholder="Jumlah...">
                                            @error('valjb_pdri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_pdri">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jts_pdri ?? '' }}"
                                                class="form-control @error('valjts_pdri') is-invalid @enderror" id="valjts_pdri"
                                                name="valjts_pdri" placeholder="Jumlah...">
                                            @error('valjts_pdri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_pdri">JUMLAH PEGAWAI

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jp_pdri ?? '' }}"
                                                class="form-control @error('valjp_pdri') is-invalid @enderror" id="valjp_pdri"
                                                name="valjp_pdri" placeholder="Jumlah...">
                                            @error('valjp_pdri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PUSKESMAS TANPA RAWAT INAP

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_ptri">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_kesehatan->nama_ptri ?? '' }}"
                                                class="form-control @error('valnama_ptri') is-invalid @enderror"
                                                id="valnama_ptri" name="valnama_ptri" placeholder="Nama...">

                                            @error('valnama_ptri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_ptri">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_ptri') is-invalid @enderror"
                                                id="valpemilik_ptri" name="valpemilik_ptri">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_ptri') == 'negeri' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_ptri == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_ptri') == 'swasta' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_ptri == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_ptri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_ptri">JUMLAH DOKTER
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jd_ptri ?? '' }}"
                                                class="form-control @error('valjd_ptri') is-invalid @enderror" id="valjd_ptri"
                                                name="valjd_ptri" placeholder="Jumlah...">
                                            @error('valjd_ptri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_ptri">JUMLAH BIDAN
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jb_ptri ?? '' }}"
                                                class="form-control @error('valjb_ptri') is-invalid @enderror" id="valjb_ptri"
                                                name="valjb_ptri" placeholder="Jumlah...">
                                            @error('valjb_ptri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_ptri">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jts_ptri ?? '' }}"
                                                class="form-control @error('valjts_ptri') is-invalid @enderror" id="valjts_ptri"
                                                name="valjts_ptri" placeholder="Jumlah...">
                                            @error('valjts_ptri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_ptri">JUMLAH PEGAWAI

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jp_ptri ?? '' }}"
                                                class="form-control @error('valjp_ptri') is-invalid @enderror" id="valjp_ptri"
                                                name="valjp_ptri" placeholder="Jumlah...">
                                            @error('valjp_ptri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PUSKESMAS PEMBANTU

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_pp">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_kesehatan->nama_pp ?? '' }}"
                                                class="form-control @error('valnama_pp') is-invalid @enderror"
                                                id="valnama_pp" name="valnama_pp" placeholder="Nama...">

                                            @error('valnama_pp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_pp">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_pp') is-invalid @enderror"
                                                id="valpemilik_pp" name="valpemilik_pp">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_pp') == 'negeri' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_pp == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_pp') == 'swasta' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_pp == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_pp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_pp">JUMLAH DOKTER
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jd_pp ?? '' }}"
                                                class="form-control @error('valjd_pp') is-invalid @enderror" id="valjd_pp"
                                                name="valjd_pp" placeholder="Jumlah...">
                                            @error('valjd_pp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_pp">JUMLAH BIDAN
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jb_pp ?? '' }}"
                                                class="form-control @error('valjb_pp') is-invalid @enderror" id="valjb_pp"
                                                name="valjb_pp" placeholder="Jumlah...">
                                            @error('valjb_pp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_pp">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jts_pp ?? '' }}"
                                                class="form-control @error('valjts_pp') is-invalid @enderror" id="valjts_pp"
                                                name="valjts_pp" placeholder="Jumlah...">
                                            @error('valjts_pp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_pp">JUMLAH PEGAWAI

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jp_pp ?? '' }}"
                                                class="form-control @error('valjp_pp') is-invalid @enderror" id="valjp_pp"
                                                name="valjp_pp" placeholder="Jumlah...">
                                            @error('valjp_pp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">POLIKLINIK/BALAI PENGOBATAN
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_pbp">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_kesehatan->nama_pbp ?? '' }}"
                                                class="form-control @error('valnama_pbp') is-invalid @enderror"
                                                id="valnama_pbp" name="valnama_pbp" placeholder="Nama...">

                                            @error('valnama_pbp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_pbp">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_pbp') is-invalid @enderror"
                                                id="valpemilik_pbp" name="valpemilik_pbp">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_pbp') == 'negeri' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_pbp == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_pbp') == 'swasta' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_pbp == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_pbp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_pbp">JUMLAH DOKTER
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jd_pbp ?? '' }}"
                                                class="form-control @error('valjd_pbp') is-invalid @enderror" id="valjd_pbp"
                                                name="valjd_pbp" placeholder="Jumlah...">
                                            @error('valjd_pbp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_pbp">JUMLAH BIDAN
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jb_pbp ?? '' }}"
                                                class="form-control @error('valjb_pbp') is-invalid @enderror" id="valjb_pbp"
                                                name="valjb_pbp" placeholder="Jumlah...">
                                            @error('valjb_pbp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_pbp">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jts_pbp ?? '' }}"
                                                class="form-control @error('valjts_pbp') is-invalid @enderror" id="valjts_pbp"
                                                name="valjts_pbp" placeholder="Jumlah...">
                                            @error('valjts_pbp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_pbp">JUMLAH PEGAWAI

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jp_pbp ?? '' }}"
                                                class="form-control @error('valjp_pbp') is-invalid @enderror" id="valjp_pbp"
                                                name="valjp_pbp" placeholder="Jumlah...">
                                            @error('valjp_pbp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">TEMPAT PRAKTIK DOKTER
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_tpd">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_kesehatan->nama_tpd ?? '' }}"
                                                class="form-control @error('valnama_tpd') is-invalid @enderror"
                                                id="valnama_tpd" name="valnama_tpd" placeholder="Nama...">

                                            @error('valnama_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_tpd">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_tpd') is-invalid @enderror"
                                                id="valpemilik_tpd" name="valpemilik_tpd">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_tpd') == 'negeri' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_tpd == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_tpd') == 'swasta' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_tpd == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_tpd">JUMLAH DOKTER
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jd_tpd ?? '' }}"
                                                class="form-control @error('valjd_tpd') is-invalid @enderror" id="valjd_tpd"
                                                name="valjd_tpd" placeholder="Jumlah...">
                                            @error('valjd_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_tpd">JUMLAH BIDAN
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jb_tpd ?? '' }}"
                                                class="form-control @error('valjb_tpd') is-invalid @enderror" id="valjb_tpd"
                                                name="valjb_tpd" placeholder="Jumlah...">
                                            @error('valjb_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_tpd">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jts_tpd ?? '' }}"
                                                class="form-control @error('valjts_tpd') is-invalid @enderror" id="valjts_tpd"
                                                name="valjts_tpd" placeholder="Jumlah...">
                                            @error('valjts_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_tpd">JUMLAH PEGAWAI

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jp_tpd ?? '' }}"
                                                class="form-control @error('valjp_tpd') is-invalid @enderror" id="valjp_tpd"
                                                name="valjp_tpd" placeholder="Jumlah...">
                                            @error('valjp_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">RUMAH BERSALIN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_rb">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_kesehatan->nama_rb ?? '' }}"
                                                class="form-control @error('valnama_rb') is-invalid @enderror"
                                                id="valnama_rb" name="valnama_rb" placeholder="Nama...">

                                            @error('valnama_rb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_rb">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_rb') is-invalid @enderror"
                                                id="valpemilik_rb" name="valpemilik_rb">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_rb') == 'negeri' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_rb == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_rb') == 'swasta' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_rb == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_rb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_rb">JUMLAH DOKTER
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jd_rb ?? '' }}"
                                                class="form-control @error('valjd_rb') is-invalid @enderror" id="valjd_rb"
                                                name="valjd_rb" placeholder="Jumlah...">
                                            @error('valjd_rb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_rb">JUMLAH BIDAN
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jb_rb ?? '' }}"
                                                class="form-control @error('valjb_rb') is-invalid @enderror" id="valjb_rb"
                                                name="valjb_rb" placeholder="Jumlah...">
                                            @error('valjb_rb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_rb">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jts_rb ?? '' }}"
                                                class="form-control @error('valjts_rb') is-invalid @enderror" id="valjts_rb"
                                                name="valjts_rb" placeholder="Jumlah...">
                                            @error('valjts_rb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_rb">JUMLAH PEGAWAI

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jp_rb ?? '' }}"
                                                class="form-control @error('valjp_rb') is-invalid @enderror" id="valjp_rb"
                                                name="valjp_rb" placeholder="Jumlah...">
                                            @error('valjp_rb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">TEMPAT PRAKTEK BIDAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_tpb">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_kesehatan->nama_tpb ?? '' }}"
                                                class="form-control @error('valnama_tpb') is-invalid @enderror"
                                                id="valnama_tpb" name="valnama_tpb" placeholder="Nama...">

                                            @error('valnama_tpb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_tpb">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_tpb') is-invalid @enderror"
                                                id="valpemilik_tpb" name="valpemilik_tpb">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_tpb') == 'negeri' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_tpb == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_tpb') == 'swasta' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_tpb == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_tpb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_tpb">JUMLAH DOKTER
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jd_tpb ?? '' }}"
                                                class="form-control @error('valjd_tpb') is-invalid @enderror" id="valjd_tpb"
                                                name="valjd_tpb" placeholder="Jumlah...">
                                            @error('valjd_tpb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_tpb">JUMLAH BIDAN
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jb_tpb ?? '' }}"
                                                class="form-control @error('valjb_tpb') is-invalid @enderror" id="valjb_tpb"
                                                name="valjb_tpb" placeholder="Jumlah...">
                                            @error('valjb_tpb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_tpb">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jts_tpb ?? '' }}"
                                                class="form-control @error('valjts_tpb') is-invalid @enderror" id="valjts_tpb"
                                                name="valjts_tpb" placeholder="Jumlah...">
                                            @error('valjts_tpb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_tpb">JUMLAH PEGAWAI

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jp_tpb ?? '' }}"
                                                class="form-control @error('valjp_tpb') is-invalid @enderror" id="valjp_tpb"
                                                name="valjp_tpb" placeholder="Jumlah...">
                                            @error('valjp_tpb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">POSKESDES

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_poskedes">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_kesehatan->nama_poskedes ?? '' }}"
                                                class="form-contropolindesl @error('valnama_poskedes') is-invalid @enderror"
                                                id="valnama_poskedes" name="valnama_poskedes" placeholder="Nama...">

                                            @error('valnama_poskedes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_poskedes">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_poskedes') is-invalid @enderror"
                                                id="valpemilik_poskedes" name="valpemilik_poskedes">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_poskedes') == 'negeri' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_poskedes == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_poskedes') == 'swasta' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_poskedes == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_poskedes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_poskedes">JUMLAH DOKTER
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jd_poskedes ?? '' }}"
                                                class="form-control @error('valjd_poskedes') is-invalid @enderror" id="valjd_poskedes"
                                                name="valjd_poskedes" placeholder="Jumlah...">
                                            @error('valjd_poskedes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_poskedes">JUMLAH BIDAN
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jb_poskedes ?? '' }}"
                                                class="form-control @error('valjb_poskedes') is-invalid @enderror" id="valjb_poskedes"
                                                name="valjb_poskedes" placeholder="Jumlah...">
                                            @error('valjb_poskedes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_poskedes">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jts_poskedes ?? '' }}"
                                                class="form-control @error('valjts_poskedes') is-invalid @enderror" id="valjts_poskedes"
                                                name="valjts_poskedes" placeholder="Jumlah...">
                                            @error('valjts_poskedes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_poskedes">JUMLAH PEGAWAI

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jp_poskedes ?? '' }}"
                                                class="form-control @error('valjp_poskedes') is-invalid @enderror" id="valjp_poskedes"
                                                name="valjp_poskedes" placeholder="Jumlah...">
                                            @error('valjp_poskedes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">POLINDES

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_polindes">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_kesehatan->nama_polindes ?? '' }}"
                                                class="form-control @error('valnama_polindes') is-invalid @enderror"
                                                id="valnama_polindes" name="valnama_polindes" placeholder="Nama...">

                                            @error('valnama_polindes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_polindes">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_polindes') is-invalid @enderror"
                                                id="valpemilik_polindes" name="valpemilik_polindes">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_polindes') == 'negeri' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_polindes == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_polindes') == 'swasta' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_polindes == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_polindes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_polindes">JUMLAH DOKTER
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jd_polindes ?? '' }}"
                                                class="form-control @error('valjd_polindes') is-invalid @enderror" id="valjd_polindes"
                                                name="valjd_polindes" placeholder="Jumlah...">
                                            @error('valjd_polindes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_polindes">JUMLAH BIDAN
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jb_polindes ?? '' }}"
                                                class="form-control @error('valjb_polindes') is-invalid @enderror" id="valjb_polindes"
                                                name="valjb_polindes" placeholder="Jumlah...">
                                            @error('valjb_polindes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_polindes">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jts_polindes ?? '' }}"
                                                class="form-control @error('valjts_polindes') is-invalid @enderror" id="valjts_polindes"
                                                name="valjts_polindes" placeholder="Jumlah...">
                                            @error('valjts_polindes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_polindes">JUMLAH PEGAWAI

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jp_polindes ?? '' }}"
                                                class="form-control @error('valjp_polindes') is-invalid @enderror" id="valjp_polindes"
                                                name="valjp_polindes" placeholder="Jumlah...">
                                            @error('valjp_polindes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">APOTIK

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_apotik">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_kesehatan->nama_apotik ?? '' }}"
                                                class="form-control @error('valnama_apotik') is-invalid @enderror"
                                                id="valnama_apotik" name="valnama_apotik" placeholder="Nama...">

                                            @error('valnama_apotik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_apotik">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_apotik') is-invalid @enderror"
                                                id="valpemilik_apotik" name="valpemilik_apotik">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_apotik') == 'negeri' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_apotik == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_apotik') == 'swasta' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_apotik == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_apotik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_apotik">JUMLAH DOKTER
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jd_apotik ?? '' }}"
                                                class="form-control @error('valjd_apotik') is-invalid @enderror" id="valjd_apotik"
                                                name="valjd_apotik" placeholder="Jumlah...">
                                            @error('valjd_apotik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_apotik">JUMLAH BIDAN
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jb_apotik ?? '' }}"
                                                class="form-control @error('valjb_apotik') is-invalid @enderror" id="valjb_apotik"
                                                name="valjb_apotik" placeholder="Jumlah...">
                                            @error('valjb_apotik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_apotik">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jts_apotik ?? '' }}"
                                                class="form-control @error('valjts_apotik') is-invalid @enderror" id="valjts_apotik"
                                                name="valjts_apotik" placeholder="Jumlah...">
                                            @error('valjts_apotik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_apotik">JUMLAH PEGAWAI

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jp_apotik ?? '' }}"
                                                class="form-control @error('valjp_apotik') is-invalid @enderror" id="valjp_apotik"
                                                name="valjp_apotik" placeholder="Jumlah...">
                                            @error('valjp_apotik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">TOKO KHUSUS OBAT / JAMU
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_tokojamu">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_kesehatan->nama_tokojamu ?? '' }}"
                                                class="form-control @error('valnama_tokojamu') is-invalid @enderror"
                                                id="valnama_tokojamu" name="valnama_tokojamu" placeholder="Nama...">

                                            @error('valnama_tokojamu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_tokojamu">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_tokojamu') is-invalid @enderror"
                                                id="valpemilik_tokojamu" name="valpemilik_tokojamu">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_tokojamu') == 'negeri' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_tokojamu == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_tokojamu') == 'swasta' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_tokojamu == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_tokojamu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_tokojamu">JUMLAH DOKTER
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jd_tokojamu ?? '' }}"
                                                class="form-control @error('valjd_tokojamu') is-invalid @enderror" id="valjd_tokojamu"
                                                name="valjd_tokojamu" placeholder="Jumlah...">
                                            @error('valjd_tokojamu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_tokojamu">JUMLAH BIDAN
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jb_tokojamu ?? '' }}"
                                                class="form-control @error('valjb_tokojamu') is-invalid @enderror" id="valjb_tokojamu"
                                                name="valjb_tokojamu" placeholder="Jumlah...">
                                            @error('valjb_tokojamu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_tokojamu">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jts_tokojamu ?? '' }}"
                                                class="form-control @error('valjts_tokojamu') is-invalid @enderror" id="valjts_tokojamu"
                                                name="valjts_tokojamu" placeholder="Jumlah...">
                                            @error('valjts_tokojamu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_tokojamu">JUMLAH PEGAWAI

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jp_tokojamu ?? '' }}"
                                                class="form-control @error('valjp_tokojamu') is-invalid @enderror" id="valjp_tokojamu"
                                                name="valjp_tokojamu" placeholder="Jumlah...">
                                            @error('valjp_tokojamu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">POSYANDU
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_posyandu">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_kesehatan->nama_posyandu ?? '' }}"
                                                class="form-control @error('valnama_posyandu') is-invalid @enderror"
                                                id="valnama_posyandu" name="valnama_posyandu" placeholder="Nama...">

                                            @error('valnama_posyandu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_posyandu">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_posyandu') is-invalid @enderror"
                                                id="valpemilik_posyandu" name="valpemilik_posyandu">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_posyandu') == 'negeri' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_posyandu == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_posyandu') == 'swasta' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_posyandu == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_posyandu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_posyandu">JUMLAH DOKTER
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jd_posyandu ?? '' }}"
                                                class="form-control @error('valjd_posyandu') is-invalid @enderror" id="valjd_posyandu"
                                                name="valjd_posyandu" placeholder="Jumlah...">
                                            @error('valjd_posyandu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_posyandu">JUMLAH BIDAN
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jb_posyandu ?? '' }}"
                                                class="form-control @error('valjb_posyandu') is-invalid @enderror" id="valjb_posyandu"
                                                name="valjb_posyandu" placeholder="Jumlah...">
                                            @error('valjb_posyandu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_posyandu">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jts_posyandu ?? '' }}"
                                                class="form-control @error('valjts_posyandu') is-invalid @enderror" id="valjts_posyandu"
                                                name="valjts_posyandu" placeholder="Jumlah...">
                                            @error('valjts_posyandu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_posyandu">JUMLAH PEGAWAI

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jp_posyandu ?? '' }}"
                                                class="form-control @error('valjp_posyandu') is-invalid @enderror" id="valjp_posyandu"
                                                name="valjp_posyandu" placeholder="Jumlah...">
                                            @error('valjp_posyandu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">POSBINDU

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_posbindu">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_kesehatan->nama_posbindu ?? '' }}"
                                                class="form-control @error('valnama_posbindu') is-invalid @enderror"
                                                id="valnama_posbindu" name="valnama_posbindu" placeholder="Nama...">

                                            @error('valnama_posbindu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_posbindu">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_posbindu') is-invalid @enderror"
                                                id="valpemilik_posbindu" name="valpemilik_posbindu">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_posbindu') == 'negeri' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_posbindu == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_posbindu') == 'swasta' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_posbindu == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_posbindu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_posbindu">JUMLAH DOKTER
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jd_posbindu ?? '' }}"
                                                class="form-control @error('valjd_posbindu') is-invalid @enderror" id="valjd_posbindu"
                                                name="valjd_posbindu" placeholder="Jumlah...">
                                            @error('valjd_posbindu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_posbindu">JUMLAH BIDAN
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jb_posbindu ?? '' }}"
                                                class="form-control @error('valjb_posbindu') is-invalid @enderror" id="valjb_posbindu"
                                                name="valjb_posbindu" placeholder="Jumlah...">
                                            @error('valjb_posbindu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_posbindu">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jts_posbindu ?? '' }}"
                                                class="form-control @error('valjts_posbindu') is-invalid @enderror" id="valjts_posbindu"
                                                name="valjts_posbindu" placeholder="Jumlah...">
                                            @error('valjts_posbindu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_posbindu">JUMLAH PEGAWAI

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jp_posbindu ?? '' }}"
                                                class="form-control @error('valjp_posbindu') is-invalid @enderror" id="valjp_posbindu"
                                                name="valjp_posbindu" placeholder="Jumlah...">
                                            @error('valjp_posbindu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">TEMPAT PRAKTEK DUKUN
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_tpd">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_kesehatan->nama_tpd ?? '' }}"
                                                class="form-control @error('valnama_tpd') is-invalid @enderror"
                                                id="valnama_tpd" name="valnama_tpd" placeholder="Nama...">

                                            @error('valnama_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_tpd">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_tpd') is-invalid @enderror"
                                                id="valpemilik_tpd" name="valpemilik_tpd">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_tpd') == 'negeri' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_tpd == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_tpd') == 'swasta' || (isset($rt_kesehatan) && $rt_kesehatan->pemilik_tpd == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_tpd">JUMLAH DOKTER
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jd_tpd ?? '' }}"
                                                class="form-control @error('valjd_tpd') is-invalid @enderror" id="valjd_tpd"
                                                name="valjd_tpd" placeholder="Jumlah...">
                                            @error('valjd_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_tpd">JUMLAH BIDAN
                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jb_tpd ?? '' }}"
                                                class="form-control @error('valjb_tpd') is-invalid @enderror" id="valjb_tpd"
                                                name="valjb_tpd" placeholder="Jumlah...">
                                            @error('valjb_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_tpd">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jts_tpd ?? '' }}"
                                                class="form-control @error('valjts_tpd') is-invalid @enderror" id="valjts_tpd"
                                                name="valjts_tpd" placeholder="Jumlah...">
                                            @error('valjts_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_tpd">JUMLAH PEGAWAI

                                            </label>
                                            <input type="number" value="{{ $rt_kesehatan->jp_tpd ?? '' }}"
                                                class="form-control @error('valjp_tpd') is-invalid @enderror" id="valjp_tpd"
                                                name="valjp_tpd" placeholder="Jumlah...">
                                            @error('valjp_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmModal">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah kamu sudah yakin?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="confirmSave">Yakin</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('confirmSave').addEventListener('click', function() {
            document.getElementById('form-edit-rtkesehatan').submit();
        });
    </script>
@endsection
