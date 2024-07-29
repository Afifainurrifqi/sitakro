 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">AKSES PENDIDIKAN {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('aksespendidikan.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('aksespendidikan.update') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valNokk">KK <span
                                            class="text-danger">*</span>
                                        <input type="hidden" name="valNokk" value="{{ $datap->detailkk->kk->nokk }}">
                                    </label>
                                    <div class="col-lg-6">
                                        {{ $datap->detailkk->kk->nokk }}
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
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
                                    <label class="col-lg-4 col-form-label">PAUD<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_paud">JARAK TEMPUH (KM)</label>
                                            {{-- <input type="number" value="{{ old('valjaraktempuh_paud') }}"
                                                class="form-control @error('valjaraktempuh_paud') is-invalid @enderror"
                                                id="valjaraktempuh_paud" name="valjaraktempuh_paud"
                                                placeholder="Berapa kilometer..."> --}}

                                            @if (isset($akses_pendidikan->jaraktempuh_paud)) <br>
                                                {{ $akses_pendidikan->jaraktempuh_paud }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjaraktempuh_paud')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_paud">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_pendidikan->waktutempuh_paud)) <br>
                                            {{ $akses_pendidikan->waktutempuh_paud }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_paud')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_paud">KEMUDAHAN</label>
                                            @if (isset($akses_pendidikan->kemudahan_paud)) <br>
                                            {{ $akses_pendidikan->kemudahan_paud }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_paud')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">TK/RA<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_tk">JARAK TEMPUH (KM)</label>
                                            @if (isset($akses_pendidikan->jaraktempuh_tk)) <br>
                                            {{ $akses_pendidikan->jaraktempuh_tk }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjaraktempuh_tk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_tk">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_pendidikan->waktutempuh_tk)) <br>
                                            {{ $akses_pendidikan->waktutempuh_tk }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_tk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_tk">KEMUDAHAN</label>
                                            @if (isset($akses_pendidikan->kemudahan_tk)) <br>
                                            {{ $akses_pendidikan->kemudahan_tk }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_tk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SD/MI ATAU SEDERAJAT <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_sd">JARAK TEMPUH (KM)</label>
                                            @if (isset($akses_pendidikan->jaraktempuh_sd)) <br>
                                            {{ $akses_pendidikan->jaraktempuh_sd }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjaraktempuh_sd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_sd">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_pendidikan->waktutempuh_sd)) <br>
                                            {{ $akses_pendidikan->waktutempuh_sd }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_sd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_sd">KEMUDAHAN</label>
                                            @if (isset($akses_pendidikan->kemudahan_sd)) <br>
                                            {{ $akses_pendidikan->kemudahan_sd }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_sd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SMP/MTs ATAU SEDERAJAT<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_smp">JARAK TEMPUH (KM)</label>
                                            @if (isset($akses_pendidikan->jaraktempuh_smp)) <br>
                                            {{ $akses_pendidikan->jaraktempuh_smp }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjaraktempuh_smp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_smp">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_pendidikan->waktutempuh_smp)) <br>
                                            {{ $akses_pendidikan->waktutempuh_smp }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_smp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_smp">KEMUDAHAN</label>
                                            @if (isset($akses_pendidikan->kemudahan_smp)) <br>
                                            {{ $akses_pendidikan->kemudahan_smp }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_smp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SMA/MA ATAU SEDERAJAT<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_sma">JARAK TEMPUH (KM)</label>
                                            @if (isset($akses_pendidikan->jaraktempuh_sma)) <br>
                                            {{ $akses_pendidikan->jaraktempuh_sma }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjaraktempuh_sma')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_sma">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_pendidikan->waktutempuh_sma)) <br>
                                            {{ $akses_pendidikan->waktutempuh_sma }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_sma')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_sma">KEMUDAHAN</label>
                                            @if (isset($akses_pendidikan->kemudahan_sma)) <br>
                                            {{ $akses_pendidikan->kemudahan_sma }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_sma')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PERGURUAN TINGGI<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_pt">JARAK TEMPUH (KM)</label>
                                            @if (isset($akses_pendidikan->jaraktempuh_pt)) <br>
                                            {{ $akses_pendidikan->jaraktempuh_pt }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjaraktempuh_pt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_pt">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_pendidikan->waktutempuh_pt)) <br>
                                            {{ $akses_pendidikan->waktutempuh_pt }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_pt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_pt">KEMUDAHAN</label>
                                            @if (isset($akses_pendidikan->kemudahan_pt)) <br>
                                            {{ $akses_pendidikan->kemudahan_pt }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_pt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PESANTREN<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_ps">JARAK TEMPUH (KM)</label>
                                            @if (isset($akses_pendidikan->jaraktempuh_ps)) <br>
                                            {{ $akses_pendidikan->jaraktempuh_ps }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjaraktempuh_ps')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_ps">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_pendidikan->waktutempuh_ps)) <br>
                                            {{ $akses_pendidikan->waktutempuh_ps }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_ps')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_ps">KEMUDAHAN</label>
                                            @if (isset($akses_pendidikan->kemudahan_ps)) <br>
                                            {{ $akses_pendidikan->kemudahan_ps }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_ps')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SEMINARI <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_seminari">JARAK TEMPUH (KM)</label>
                                            @if (isset($akses_pendidikan->jaraktempuh_seminari)) <br>
                                            {{ $akses_pendidikan->jaraktempuh_seminari }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjaraktempuh_seminari')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_seminari">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_pendidikan->waktutempuh_seminari)) <br>
                                            {{ $akses_pendidikan->waktutempuh_seminari }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_seminari')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_seminari">KEMUDAHAN</label>
                                            @if (isset($akses_pendidikan->kemudahan_seminari)) <br>
                                            {{ $akses_pendidikan->kemudahan_seminari }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_seminari')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PENDIDIKAN KEAGAMAAN LAIN<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_pagamalain">JARAK TEMPUH (KM)</label>
                                            @if (isset($akses_pendidikan->jaraktempuh_pagamalain)) <br>
                                            {{ $akses_pendidikan->jaraktempuh_pagamalain }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjaraktempuh_pagamalain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_pagamalain">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_pendidikan->waktutempuh_pagamalain)) <br>
                                            {{ $akses_pendidikan->waktutempuh_pagamalain }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_pagamalain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_pagamalain">KEMUDAHAN</label>
                                            @if (isset($akses_pendidikan->kemudahan_pagamalain)) <br>
                                            {{ $akses_pendidikan->kemudahan_pagamalain }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_pagamalain')
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
