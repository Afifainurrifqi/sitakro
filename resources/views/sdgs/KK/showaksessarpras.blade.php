 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT AKSES SARANA DAN PRASARANA {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('aksessarpras.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('aksessarpras.update') }}" method="POST">
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
                                    <label class="col-lg-4 col-form-label">LOKASI PEKERJAAN UTAMA<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjenistrasport_lokasipu">JENIS TRANSPORTASI</label>
                                            @if (isset($akses_sarpras->jenistrasport_lokasipu))
                                                <br>
                                                {{ $akses_sarpras->jenistrasport_lokasipu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjenistrasport_lokasipu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valpengtransportumum_lokasipu">PENGGUNAAN TRANSPORTASI UMUM</label>
                                            @if (isset($akses_sarpras->pengtransportumum_lokasipu))
                                                <br>
                                                {{ $akses_sarpras->pengtransportumum_lokasipu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpengtransportumum_lokasipu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valwaktutempuh_lokasipu">WAKTU TEMPUH SEKALI JALAN (JAM)
                                            </label>
                                            @if (isset($akses_sarpras->waktutempuh_lokasipu))
                                                <br>
                                                {{ $akses_sarpras->waktutempuh_lokasipu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valwaktutempuh_lokasipu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valbiaya_lokasipu">BIAYA SEKALI JALAN (Rp.)
                                            </label>
                                            @if (isset($akses_sarpras->biaya_lokasipu))
                                                <br>
                                                {{ $akses_sarpras->biaya_lokasipu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valbiaya_lokasipu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_lokasipu">KEMUDAHAN</label>
                                            @if (isset($akses_sarpras->kemudahan_lokasipu))
                                                <br>
                                                {{ $akses_sarpras->kemudahan_lokasipu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkemudahan_lokasipu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">LAHAN PERTANIAN YANG SEDANG DIUSAHAKAN<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjenistrasport_lahanpertanian">JENIS TRANSPORTASI</label>
                                            @if (isset($akses_sarpras->jenistrasport_lahanpertanian))
                                                <br>
                                                {{ $akses_sarpras->jenistrasport_lahanpertanian }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjenistrasport_lahanpertanian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valpengtransportumum_lahanpertanian">PENGGUNAAN TRANSPORTASI
                                                UMUM</label>
                                            @if (isset($akses_sarpras->pengtransportumum_lahanpertanian))
                                                <br>
                                                {{ $akses_sarpras->pengtransportumum_lahanpertanian }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpengtransportumum_lahanpertanian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valwaktutempuh_lahanpertanian">WAKTU TEMPUH SEKALI JALAN (JAM)
                                            </label>
                                            @if (isset($akses_sarpras->waktutempuh_lahanpertanian))
                                                <br>
                                                {{ $akses_sarpras->waktutempuh_lahanpertanian }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valwaktutempuh_lahanpertanian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valbiaya_lahanpertanian">BIAYA SEKALI JALAN (Rp.)
                                            </label>
                                            @if (isset($akses_sarpras->biaya_lahanpertanian))
                                                <br>
                                                {{ $akses_sarpras->biaya_lahanpertanian }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valbiaya_lahanpertanian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_lahanpertanian">KEMUDAHAN</label>
                                            @if (isset($akses_sarpras->biaya_lahanpertanian))
                                                <br>
                                                {{ $akses_sarpras->biaya_lahanpertanian }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkemudahan_lahanpertanian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SEKOLAH<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjenistrasport_sekolah">JENIS TRANSPORTASI</label>
                                            @if (isset($akses_sarpras->jenistrasport_sekolah))
                                                <br>
                                                {{ $akses_sarpras->jenistrasport_sekolah }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjenistrasport_sekolah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valpengtransportumum_sekolah">PENGGUNAAN TRANSPORTASI UMUM</label>
                                            @if (isset($akses_sarpras->pengtransportumum_sekolah))
                                                <br>
                                                {{ $akses_sarpras->pengtransportumum_sekolah }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpengtransportumum_sekolah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valwaktutempuh_sekolah">WAKTU TEMPUH SEKALI JALAN (JAM)
                                            </label>
                                            @if (isset($akses_sarpras->waktutempuh_sekolah))
                                                <br>
                                                {{ $akses_sarpras->waktutempuh_sekolah }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valwaktutempuh_sekolah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valbiaya_sekolah">BIAYA SEKALI JALAN (Rp.)
                                            </label>
                                            @if (isset($akses_sarpras->biaya_sekolah))
                                                <br>
                                                {{ $akses_sarpras->biaya_sekolah }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valbiaya_sekolah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_sekolah">KEMUDAHAN</label>
                                            @if (isset($akses_sarpras->kemudahan_sekolah))
                                                <br>
                                                {{ $akses_sarpras->kemudahan_sekolah }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkemudahan_sekolah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BEROBAT<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjenistrasport_berobat">JENIS TRANSPORTASI</label>
                                            @if (isset($akses_sarpras->jenistrasport_berobat))
                                                <br>
                                                {{ $akses_sarpras->jenistrasport_berobat }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjenistrasport_berobat')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valpengtransportumum_berobat">PENGGUNAAN TRANSPORTASI UMUM</label>
                                            @if (isset($akses_sarpras->pengtransportumum_berobat))
                                                <br>
                                                {{ $akses_sarpras->pengtransportumum_berobat }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpengtransportumum_berobat')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valwaktutempuh_berobat">WAKTU TEMPUH SEKALI JALAN (JAM)
                                            </label>
                                            @if (isset($akses_sarpras->waktutempuh_berobat))
                                            <br>
                                            {{ $akses_sarpras->waktutempuh_berobat }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_berobat')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valbiaya_berobat">BIAYA SEKALI JALAN (Rp.)
                                            </label>
                                            @if (isset($akses_sarpras->biaya_berobat))
                                            <br>
                                            {{ $akses_sarpras->biaya_berobat }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valbiaya_berobat')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_berobat">KEMUDAHAN</label>
                                            @if (isset($akses_sarpras->kemudahan_berobat))
                                            <br>
                                            {{ $akses_sarpras->kemudahan_berobat }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_berobat')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BERIBADAH MINGGUAN / BULANAN / TAHUNAN<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjenistrasport_beribadah">JENIS TRANSPORTASI</label>
                                            @if (isset($akses_sarpras->jenistrasport_beribadah))
                                            <br>
                                            {{ $akses_sarpras->jenistrasport_beribadah }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjenistrasport_beribadah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valpengtransportumum_beribadah">PENGGUNAAN TRANSPORTASI
                                                UMUM</label>
                                                @if (isset($akses_sarpras->pengtransportumum_beribadah))
                                                <br>
                                                {{ $akses_sarpras->pengtransportumum_beribadah }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpengtransportumum_beribadah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valwaktutempuh_beribadah">WAKTU TEMPUH SEKALI JALAN (JAM)
                                            </label>
                                            @if (isset($akses_sarpras->waktutempuh_beribadah))
                                            <br>
                                            {{ $akses_sarpras->waktutempuh_beribadah }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_beribadah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valbiaya_beribadah">BIAYA SEKALI JALAN (Rp.)
                                            </label>
                                            @if (isset($akses_sarpras->biaya_beribadah))
                                            <br>
                                            {{ $akses_sarpras->biaya_beribadah }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valbiaya_beribadah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_beribadah">KEMUDAHAN</label>
                                            @if (isset($akses_sarpras->kemudahan_beribadah))
                                            <br>
                                            {{ $akses_sarpras->kemudahan_beribadah }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_beribadah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">REKREASI TERDEKAT<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjenistrasport_rekreasi">JENIS TRANSPORTASI</label>
                                            @if (isset($akses_sarpras->jenistrasport_rekreasi))
                                            <br>
                                            {{ $akses_sarpras->jenistrasport_rekreasi }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjenistrasport_rekreasi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valpengtransportumum_rekreasi">PENGGUNAAN TRANSPORTASI UMUM</label>
                                            @if (isset($akses_sarpras->pengtransportumum_rekreasi))
                                            <br>
                                            {{ $akses_sarpras->pengtransportumum_rekreasi }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valpengtransportumum_rekreasi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valwaktutempuh_rekreasi">WAKTU TEMPUH SEKALI JALAN (JAM)
                                            </label>
                                            @if (isset($akses_sarpras->waktutempuh_rekreasi))
                                            <br>
                                            {{ $akses_sarpras->waktutempuh_rekreasi }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valwaktutempuh_rekreasi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valbiaya_rekreasi">BIAYA SEKALI JALAN (Rp.)
                                            </label>
                                            @if (isset($akses_sarpras->biaya_rekreasi))
                                            <br>
                                            {{ $akses_sarpras->biaya_rekreasi }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valbiaya_rekreasi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_rekreasi">KEMUDAHAN</label>
                                            @if (isset($akses_sarpras->kemudahan_rekreasi))
                                            <br>
                                            {{ $akses_sarpras->kemudahan_rekreasi }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkemudahan_rekreasi')
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
