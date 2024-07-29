 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">LAIN-LAIN
                            {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('laink.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('laink.update') }}" method="POST">
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
                                    <label class="col-lg-4 col-form-label" for="valpengtransportsebelum">JUMLAH ANGGOTA KELUARGA
                                        PENGGUNA TRANSPORTASI UMUM 1 BULAN TERAKHIR
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($laink->pengtransportsebelum))
                                        <br>
                                        {{ $laink->pengtransportsebelum }}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                        @error('valpengtransportsebelum')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpengtransportsesudah">JUMLAH ANGGOTA KELUARGA
                                        PENGGUNA TRANSPORTASI UMUM 1 BULAN SEBELUMNYA
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($laink->pengtransportsesudah))
                                        <br>
                                        {{ $laink->pengtransportsesudah }}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                        @error('valpengtransportsesudah')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PEMANFAAT/PENERIMA PROGRAM PEMERINTAH
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valblt">BLT
                                            </label>
                                            @if (isset($laink->blt))
                                            <br>
                                            {{ $laink->blt }}
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
                                            <label for="valpkh">PKH
                                            </label>
                                            @if (isset($laink->pkh))
                                            <br>
                                            {{ $laink->pkh }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valpkh')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valbst">BST
                                            </label>
                                            @if (isset($laink->bst))
                                            <br>
                                            {{ $laink->bst }}
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
                                            <label for="valbantuan_presiden">BANTUAN PRESIDEN

                                            </label>
                                            @if (isset($laink->bantuan_presiden))
                                            <br>
                                            {{ $laink->bantuan_presiden }}
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
                                            <label for="valbantuan_umkm">BANTUAN UMKM

                                            </label>
                                            @if (isset($laink->bantuan_umkm))
                                            <br>
                                            {{ $laink->bantuan_umkm }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valbantuan_umkm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valbantuan_pekerja">BANTUAN UNTUK PEKERJA

                                            </label>
                                            @if (isset($laink->bantuan_pekerja))
                                            <br>
                                            {{ $laink->bantuan_pekerja }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valbantuan_pekerja')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valbantuan_anak">BANTUAN PENDIDIKAN ANAK

                                            </label>
                                            @if (isset($laink->bantuan_anak))
                                            <br>
                                            {{ $laink->bantuan_anak }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valbantuan_anak
                                            bantuan_anak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="vallainnya">LAINNYA

                                            </label>
                                            @if (isset($laink->lainnya))
                                            <br>
                                            {{ $laink->lainnya }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('vallainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>



                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valrata_rata">BERAPA RATA-RATA PENGELUARAN SATU KELUARGA DALAM SEBULAN (Rp.)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($laink->rata_rata))
                                            <br> Rp
                                            {{ $laink->rata_rata }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valrata_rata')
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
