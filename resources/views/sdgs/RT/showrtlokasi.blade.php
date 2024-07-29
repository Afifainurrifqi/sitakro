 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">LOKASI RT</h1>
                        <h1 class="card-title"> RT : {{ $datart->rt }}</h1>
                        <h1 class="card-title"> RW : {{ $datart->rw }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rtlokasi.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rtlokasi.update') }}" method="POST">
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
                                    <label class="col-lg-4 col-form-label" for="vallokasi_rt_pulau">LOKASI RT TERLETAK DI
                                        PULAU
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_lokasi->lokasi_rt_pulau))
                                            <br>
                                            {{ $rt_lokasi->lokasi_rt_pulau }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('vallokasi_rt_pulau')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valtopo_terluas_rt">TOPOGRAFI TERLUAS
                                        WILAYAH RT
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_lokasi->topo_terluas_rt))
                                            <br>
                                            {{ $rt_lokasi->topo_terluas_rt }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valtopo_terluas_rt')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlah_warga_lereng">JUMLAH WARGA DI
                                        LERENG /
                                        PUNCAK
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_lokasi->jumlah_warga_lereng))
                                            <br>
                                            {{ $rt_lokasi->jumlah_warga_lereng }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valjumlah_warga_lereng')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpenanaman_pohon_lahan_kritis">PENANAMAN
                                        /
                                        PEMELIHARAAN PEPOHONAN DI LAHAN KRITIS
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_lokasi->penanaman_pohon_lahan_kritis))
                                            <br>
                                            {{ $rt_lokasi->penanaman_pohon_lahan_kritis }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valpenanaman_pohon_lahan_kritis')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpantai_garis_panjang">PANJANG GARIS
                                        PANTAI
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_lokasi->pantai_garis_panjang))
                                            <br>
                                            {{ $rt_lokasi->pantai_garis_panjang }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valpantai_garis_panjang')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpemanfaatan_laut_perangkap">PEMANFAATAN
                                        LAUT
                                        PERIKANAN TANGKAP
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_lokasi->pemanfaatan_laut_perangkap))
                                            <br>
                                            {{ $rt_lokasi->pemanfaatan_laut_perangkap }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valpemanfaatan_laut_perangkap')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpemanfaatan_laut_budidaya">PEMANFAATAN
                                        LAUT PERIKANAN
                                        BUDIDAYA
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_lokasi->pemanfaatan_laut_budidaya))
                                            <br>
                                            {{ $rt_lokasi->pemanfaatan_laut_budidaya }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valpemanfaatan_laut_budidaya')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpemanfaatan_laut_tambakg">PEMANFAATAN
                                        LAUT
                                        TAMBAK GARAM
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_lokasi->pemanfaatan_laut_tambakg))
                                            <br>
                                            {{ $rt_lokasi->pemanfaatan_laut_tambakg }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valpemanfaatan_laut_tambakg')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpemanfaatan_laut_bahari">PEMANFAATAN
                                        LAUT
                                        WISATA BAHARI
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_lokasi->pemanfaatan_laut_bahari))
                                            <br>
                                            {{ $rt_lokasi->pemanfaatan_laut_bahari }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valpemanfaatan_laut_bahari')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpemanfaatan_laut_transport">PEMANFAATAN
                                        LAUT
                                        TRANSPORTASI UMUM
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_lokasi->pemanfaatan_laut_transport))
                                            <br>
                                            {{ $rt_lokasi->pemanfaatan_laut_transport }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valpemanfaatan_laut_transport')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valkondisi_mangrove">KONDISI MANGROVE
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_lokasi->kondisi_mangrove))
                                            <br>
                                            {{ $rt_lokasi->kondisi_mangrove }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valkondisi_mangrove')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpenanaman_mangrove">PENANAMAN MANGROVE
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_lokasi->penanaman_mangrove))
                                            <br>
                                            {{ $rt_lokasi->penanaman_mangrove }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valpenanaman_mangrove')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlah_warga_pesisir">JUMLAH WARGA DI
                                        WILAYAH PESISIR
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        </label>
                                        @if (isset($rt_lokasi->jumlah_warga_pesisir))
                                            <br>
                                            {{ $rt_lokasi->jumlah_warga_pesisir }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valjumlah_warga_pesisir')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlah_warga_atasair">JUMLAH WARGA
                                        TINGGAL
                                        DI ATAS AIR
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        </label>
                                        @if (isset($rt_lokasi->jumlah_warga_atasair))
                                            <br>
                                            {{ $rt_lokasi->jumlah_warga_atasair }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valjumlah_warga_atasair')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valwilayah_desa_dalamhutan">WILAYAH DESA
                                        DI DALAM
                                        HUTAN (ha)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        </label>
                                        @if (isset($rt_lokasi->wilayah_desa_dalamhutan))
                                            <br>
                                            {{ $rt_lokasi->wilayah_desa_dalamhutan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valwilayah_desa_dalamhutan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valwilayah_desa_tepihutan">WILAYAH DESA DI
                                        TEPI HUTAN (ha)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        </label>
                                        @if (isset($rt_lokasi->wilayah_desa_tepihutan))
                                            <br>
                                            {{ $rt_lokasi->wilayah_desa_tepihutan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valwilayah_desa_tepihutan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">FUNGSI HUTAN
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valfungsihutan_kons">Konservasi (ha)
                                            </label>
                                            @if (isset($rt_lokasi->fungsihutan_kons))
                                                <br>
                                                {{ $rt_lokasi->fungsihutan_kons }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valfungsihutan_kons')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valfungsihutan_lindung">Lindung (ha)
                                            </label>
                                            @if (isset($rt_lokasi->fungsihutan_lindung))
                                                <br>
                                                {{ $rt_lokasi->fungsihutan_lindung }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valfungsihutan_lindung')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valfungsihutan_produk">Produksi (ha)
                                            </label>
                                            @if (isset($rt_lokasi->fungsihutan_produk))
                                                <br>
                                                {{ $rt_lokasi->fungsihutan_produk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valfungsihutan_produk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valfungsihutan_hutandes">Hutan Desa (ha)
                                            </label>
                                            @if (isset($rt_lokasi->fungsihutan_hutandes))
                                                <br>
                                                {{ $rt_lokasi->fungsihutan_hutandes }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valfungsihutan_hutandes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlahwarga_tinggal_dalamhutan">JUMLAH
                                        WARGA YANG TINGGAL
                                        DI DALAM HUTAN
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_lokasi->jumlahwarga_tinggal_dalamhutan))
                                            <br>
                                            {{ $rt_lokasi->jumlahwarga_tinggal_dalamhutan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valjumlahwarga_tinggal_dalamhutan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label"
                                        for="valjumlahwarga_tinggal_sekitarhutan">JUMLAH WARGA YANG TINGGAL
                                        DI SEKITAR HUTAN
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_lokasi->jumlahwarga_tinggal_sekitarhutan))
                                            <br>
                                            {{ $rt_lokasi->jumlahwarga_tinggal_sekitarhutan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valjumlahwarga_tinggal_sekitarhutan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valketergantungan_hutan">KETERGANTUNGAN
                                        WARGA
                                        TERHADAP HUTAN
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_lokasi->ketergantungan_hutan))
                                            <br>
                                            {{ $rt_lokasi->ketergantungan_hutan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif


                                        @error('valketergantungan_hutan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valreboisasi">REBOISASI
                                        (PENGHIJAUAN) HUTAN
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_lokasi->reboisasi))
                                            <br>
                                            {{ $rt_lokasi->reboisasi }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif

                                        @error('valreboisasi')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlah_produk_luardesa_masuk">JUMLAH
                                        PENDUDUK LUAR DESA
                                        YANG MASUK DAN MENETAP DI DESA SETAHUN TERAKHIR
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_lokasi->jumlah_produk_luardesa_masuk))
                                            <br>
                                            {{ $rt_lokasi->jumlah_produk_luardesa_masuk }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valjumlah_produk_luardesa_masuk')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlah_produk_luardesa_keluar">JUMLAH
                                        PENDUDUK YANG KELUAR
                                        DARI DESA SETAHUN TERAKHIR
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_lokasi->jumlah_produk_luardesa_keluar))
                                            <br>
                                            {{ $rt_lokasi->jumlah_produk_luardesa_keluar }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valjumlah_produk_luardesa_keluar')
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
