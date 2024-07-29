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
                            <form class="form-valide" action="{{ route('rtmitigasib.update') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valnik">NIK <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                       @if (isset($datart->nik))
                                                <br>
                                                {{ $datart->nik }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                        @error('valnik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valnama_ketuart">Nama Ketua RT <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                       @if (isset($datart->nama))
                                                <br>
                                                {{ $datart->nama }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                       @if (isset($datart->nik))
                                                <br>
                                                {{ $datart->nik }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                      @if (isset($datart->rt))
                                                <br>
                                                {{ $datart->rt }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                        @if (isset($datart->rw))
                                                <br>
                                                {{ $datart->rw }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                        @if (isset($datart->nohp))
                                                <br>
                                                {{ $datart->nohp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                        @if (isset($rtmitigasib->mitigasi_sp))
                                            <br>
                                            {{ $rtmitigasib->mitigasi_sp }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
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
                                        @if (isset($rtmitigasib->mitigasi_spd))
                                        <br>
                                        {{ $rtmitigasib->mitigasi_spd }}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
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
                                        @if (isset($rtmitigasib->mitigasi_pk))
                                        <br>
                                        {{ $rtmitigasib->mitigasi_pk}}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                        @error('valmitigasi_pk')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valmitigasi_rrj">RAMBU-RAMBU JALUR EVAKUASI
                                        BENCANA
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rtmitigasib->mitigasi_rrj))
                                        <br>
                                        {{ $rtmitigasib->mitigasi_rrj }}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                        @error('valmitigasi_rrj')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valmitigasi_ppn">PEMBUATAN / PERAWATAN /
                                        NORMALISASI SUNGAI, KANAL, PARIT, DRAINASE, DLL
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rtmitigasib->mitigasi_ppn))
                                        <br>
                                        {{ $rtmitigasib->mitigasi_ppn }}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                        @error('valmitigasi_ppn')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
