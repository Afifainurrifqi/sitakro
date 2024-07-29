 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title"> AKSES KESEHATAN {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('akseskesehatan.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('akseskesehatan.update') }}" method="POST">
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
                                    <label class="col-lg-4 col-form-label">Rumah Sakit<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_paud">JARAK TEMPUH (KM)</label>
                                            {{-- <input type="number" value="{{ old('valjaraktempuh_paud') }}"
                                                class="form-control @error('valjaraktempuh_paud') is-invalid @enderror"
                                                id="valjaraktempuh_paud" name="valjaraktempuh_paud"
                                                placeholder="Berapa kilometer..."> --}}

                                            @if (isset($akses_kesehatan->jaraktempuh_rumahs)) <br>
                                                {{ $akses_kesehatan->jaraktempuh_rumahs }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjaraktempuh_rumahs')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_rumahs">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_kesehatan->waktutempuh_rumahs)) <br>
                                            {{ $akses_kesehatan->waktutempuh_rumahs }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_rumahs')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_rumahs">KEMUDAHAN</label>
                                            @if (isset($akses_kesehatan->kemudahan_rumahs)) <br>
                                            {{ $akses_kesehatan->kemudahan_rumahs }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_rumahs')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Rumah Bersalin<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_rumahb">JARAK TEMPUH (KM)</label>
                                            @if (isset($akses_kesehatan->jaraktempuh_rumahb)) <br>
                                            {{ $akses_kesehatan->jaraktempuh_rumahb }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjaraktempuh_rumahb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_rumahb">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_kesehatan->waktutempuh_rumahb)) <br>
                                            {{ $akses_kesehatan->waktutempuh_rumahb }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_rumahb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_rumahb">KEMUDAHAN</label>
                                            @if (isset($akses_kesehatan->kemudahan_rumahb)) <br>
                                            {{ $akses_kesehatan->kemudahan_rumahb }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_rumahb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">POLIKLINIK <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_poliklinik">JARAK TEMPUH (KM)</label>
                                            @if (isset($akses_kesehatan->jaraktempuh_poliklinik)) <br>
                                            {{ $akses_kesehatan->jaraktempuh_poliklinik }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjaraktempuh_poliklinik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_poliklinik">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_kesehatan->waktutempuh_poliklinik)) <br>
                                            {{ $akses_kesehatan->waktutempuh_poliklinik }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_poliklinik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_poliklinik">KEMUDAHAN</label>
                                            @if (isset($akses_kesehatan->kemudahan_poliklinik)) <br>
                                            {{ $akses_kesehatan->kemudahan_poliklinik }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_poliklinik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PUSKESMAS<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_puskesmas">JARAK TEMPUH (KM)</label>
                                            @if (isset($akses_kesehatan->jaraktempuh_puskesmas)) <br>
                                            {{ $akses_kesehatan->jaraktempuh_puskesmas }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjaraktempuh_puskesmas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_puskesmas">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_kesehatan->waktutempuh_puskesmas)) <br>
                                            {{ $akses_kesehatan->waktutempuh_puskesmas }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_puskesmas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_puskesmas">KEMUDAHAN</label>
                                            @if (isset($akses_kesehatan->kemudahan_puskesmas)) <br>
                                            {{ $akses_kesehatan->kemudahan_puskesmas }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_puskesmas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">POSKEDES<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_poskedes">JARAK TEMPUH (KM)</label>
                                            @if (isset($akses_kesehatan->jaraktempuh_poskedes)) <br>
                                            {{ $akses_kesehatan->jaraktempuh_poskedes }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjaraktempuh_poskedes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_poskedes">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_kesehatan->waktutempuh_poskedes)) <br>
                                            {{ $akses_kesehatan->waktutempuh_poskedes }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_poskedes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_poskedes">KEMUDAHAN</label>
                                            @if (isset($akses_kesehatan->kemudahan_poskedes)) <br>
                                            {{ $akses_kesehatan->kemudahan_poskedes }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_poskedes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">POSYANDU<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_posyandu">JARAK TEMPUH (KM)</label>
                                            @if (isset($akses_kesehatan->jaraktempuh_posyandu)) <br>
                                            {{ $akses_kesehatan->jaraktempuh_posyandu }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjaraktempuh_posyandu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_posyandu">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_kesehatan->waktutempuh_posyandu)) <br>
                                            {{ $akses_kesehatan->waktutempuh_posyandu }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_posyandu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_posyandu">KEMUDAHAN</label>
                                            @if (isset($akses_kesehatan->kemudahan_posyandu)) <br>
                                            {{ $akses_kesehatan->kemudahan_posyandu }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_posyandu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">APOTIK<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_apotik">JARAK TEMPUH (KM)</label>
                                            @if (isset($akses_kesehatan->jaraktempuh_apotik)) <br>
                                            {{ $akses_kesehatan->jaraktempuh_apotik }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjaraktempuh_apotik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_apotik">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_kesehatan->waktutempuh_apotik)) <br>
                                            {{ $akses_kesehatan->waktutempuh_apotik }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_apotik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_apotik">KEMUDAHAN</label>
                                            @if (isset($akses_kesehatan->kemudahan_apotik)) <br>
                                            {{ $akses_kesehatan->kemudahan_apotik }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_apotik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">TOKO OBAT <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_toko_obat">JARAK TEMPUH (KM)</label>
                                            @if (isset($akses_kesehatan->jaraktempuh_toko_obat)) <br>
                                            {{ $akses_kesehatan->jaraktempuh_toko_obat }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjaraktempuh_toko_obat')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_toko_obat">WAKTU TEMPUH (JAM) </label>
                                            @if (isset($akses_kesehatan->waktutempuh_toko_obat)) <br>
                                            {{ $akses_kesehatan->waktutempuh_toko_obat }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_toko_obat')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_toko_obat">KEMUDAHAN</label>
                                            @if (isset($akses_kesehatan->kemudahan_toko_obat)) <br>
                                            {{ $akses_kesehatan->kemudahan_toko_obat }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_toko_obat')
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
