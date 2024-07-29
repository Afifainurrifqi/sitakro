 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title"> AKSES TENAGA KESEHATAN {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('aksestenagakerja.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('aksestenagakerja.update') }}" method="POST">
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
                                    <label class="col-lg-4 col-form-label">DOKTER SPESIALIS<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_dr_spesialis">JARAK TEMPUH (KM)</label>
                                            {{-- <input type="number" value="{{ old('valjaraktempuh_paud') }}"
                                                class="form-control @error('valjaraktempuh_paud') is-invalid @enderror"
                                                id="valjaraktempuh_paud" name="valjaraktempuh_paud"
                                                placeholder="Berapa kilometer..."> --}}

                                            @if (isset($akses_tenagakerja->jaraktempuh_dr_spesialis)) <br>
                                                {{ $akses_tenagakerja->jaraktempuh_dr_spesialis }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjaraktempuh_dr_spesialis')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_dr_spesialis">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_tenagakerja->waktutempuh_dr_spesialis)) <br>
                                            {{ $akses_tenagakerja->waktutempuh_dr_spesialis }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_dr_spesialis')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_dr_spesialis">KEMUDAHAN</label>
                                            @if (isset($akses_tenagakerja->kemudahan_dr_spesialis)) <br>
                                            {{ $akses_tenagakerja->kemudahan_dr_spesialis }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_dr_spesialis')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">DOKTER UMUM<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_dr_umum">JARAK TEMPUH (KM)</label>
                                            @if (isset($akses_tenagakerja->jaraktempuh_dr_umum)) <br>
                                            {{ $akses_tenagakerja->jaraktempuh_dr_umum }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjaraktempuh_dr_umum')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_dr_umum">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_tenagakerja->waktutempuh_dr_umum)) <br>
                                            {{ $akses_tenagakerja->waktutempuh_dr_umum }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_dr_umum')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_dr_umum">KEMUDAHAN</label>
                                            @if (isset($akses_tenagakerja->kemudahan_dr_umum)) <br>
                                            {{ $akses_tenagakerja->kemudahan_dr_umum }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_dr_umum')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BIDAN <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_bidan">JARAK TEMPUH (KM)</label>
                                            @if (isset($akses_tenagakerja->jaraktempuh_bidan)) <br>
                                            {{ $akses_tenagakerja->jaraktempuh_bidan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjaraktempuh_bidan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_bidan">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_tenagakerja->waktutempuh_bidan)) <br>
                                            {{ $akses_tenagakerja->waktutempuh_bidan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_bidan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bidan">KEMUDAHAN</label>
                                            @if (isset($akses_tenagakerja->kemudahan_bidan)) <br>
                                            {{ $akses_tenagakerja->kemudahan_bidan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_bidan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">TENAGA KESEHATAN<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_tenagakes">JARAK TEMPUH (KM)</label>
                                            @if (isset($akses_tenagakerja->jaraktempuh_tenagakes)) <br>
                                            {{ $akses_tenagakerja->jaraktempuh_tenagakes }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjaraktempuh_tenagakes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_tenagakes">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_tenagakerja->waktutempuh_tenagakes)) <br>
                                            {{ $akses_tenagakerja->waktutempuh_tenagakes }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_tenagakes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_tenagakes">KEMUDAHAN</label>
                                            @if (isset($akses_tenagakerja->kemudahan_tenagakes)) <br>
                                            {{ $akses_tenagakerja->kemudahan_tenagakes }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_tenagakes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">DUKUN<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_dukun">JARAK TEMPUH (KM)</label>
                                            @if (isset($akses_tenagakerja->jaraktempuh_dukun)) <br>
                                            {{ $akses_tenagakerja->jaraktempuh_dukun }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjaraktempuh_dukun')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_dukun">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_tenagakerja->waktutempuh_dukun)) <br>
                                            {{ $akses_tenagakerja->waktutempuh_dukun }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_dukun')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_dukun">KEMUDAHAN</label>
                                            @if (isset($akses_tenagakerja->kemudahan_dukun)) <br>
                                            {{ $akses_tenagakerja->kemudahan_dukun }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_dukun')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
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
