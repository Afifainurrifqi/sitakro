 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT MITIGASI BENCANA
                            <h1  class="card-title"> RT : {{ $datart->rt }}</h1> <h1 class="card-title"> RW :  {{ $datart->rw }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rtmitigasib.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rtmitigasib.update') }}" method="POST" id="form-edit-rtmitigasibencana">
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
            document.getElementById('form-edit-rtmitigasibencana').submit();
        });
    </script>
@endsection
