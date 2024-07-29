 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT LOKASI RT</h1>
                        <h1  class="card-title"> RT : {{ $datart->rt }}</h1> <h1 class="card-title"> RW :  {{ $datart->rw }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rtlokasi.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rtlokasi.update') }}" method="POST" id="form-edit-rtlokasi">
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
                                    <label class="col-lg-4 col-form-label" for="vallokasi_rt_pulau">LOKASI RT TERLETAK DI PULAU
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rt_lokasi->lokasi_rt_pulau ?? '' }}"
                                            class="form-control @error('vallokasi_rt_pulau') is-invalid @enderror"
                                            id="vallokasi_rt_pulau" name="vallokasi_rt_pulau" placeholder="Lokasi...">
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
                                        <select class="form-control @error('valtopo_terluas_rt') is-invalid @enderror"
                                            id="valtopo_terluas_rt" name="valtopo_terluas_rt">
                                            <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                            <option value="lereng/puncak"
                                                {{ old('valtopo_terluas_rt') == 'lereng/puncak' || (isset($rt_lokasi) && $rt_lokasi->topo_terluas_rt == 'lereng/puncak') ? 'selected' : '' }}>
                                                Lereng/Puncak</option>
                                            <option value="lembah"
                                                {{ old('valtopo_terluas_rt') == 'lembah' || (isset($rt_lokasi) && $rt_lokasi->topo_terluas_rt == 'lembah') ? 'selected' : '' }}>
                                                Lembah</option>
                                            <option value="daratan"
                                                {{ old('valtopo_terluas_rt') == 'daratan' || (isset($rt_lokasi) && $rt_lokasi->topo_terluas_rt == 'daratan') ? 'selected' : '' }}>
                                                Daratan</option>
                                            <option value="pesisir"
                                                {{ old('valtopo_terluas_rt') == 'pesisir' || (isset($rt_lokasi) && $rt_lokasi->topo_terluas_rt == 'pesisir') ? 'selected' : '' }}>
                                                Pesisir</option>
                                        </select>
                                        @error('valtopo_terluas_rt')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlah_warga_lereng">JUMLAH WARGA DI LERENG /
                                        PUNCAK
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $rt_lokasi->jumlah_warga_lereng ?? '' }}"
                                            class="form-control @error('valjumlah_warga_lereng') is-invalid @enderror"
                                            id="valjumlah_warga_lereng" name="valjumlah_warga_lereng" placeholder="Jumlah...">
                                        @error('valjumlah_warga_lereng')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpenanaman_pohon_lahan_kritis">PENANAMAN /
                                        PEMELIHARAAN PEPOHONAN DI LAHAN KRITIS
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valpenanaman_pohon_lahan_kritis') is-invalid @enderror"
                                            id="valpenanaman_pohon_lahan_kritis" name="valpenanaman_pohon_lahan_kritis">
                                            <option value="" disabled selected>Pilih Penanaman...</option>
                                            <option value="Ada, Sebagian warga terlibat"
                                                {{ old('valpenanaman_pohon_lahan_kritis') == 'Ada, Sebagian warga terlibat' || (isset($rt_lokasi) && $rt_lokasi->penanaman_pohon_lahan_kritis == 'Ada, Sebagian warga terlibat') ? 'selected' : '' }}>
                                                Ada, Sebagian warga terlibat</option>
                                            <option value="Ada, warga tidak terlibat"
                                                {{ old('valpenanaman_pohon_lahan_kritis') == 'Ada, warga tidak terlibat' || (isset($rt_lokasi) && $rt_lokasi->penanaman_pohon_lahan_kritis == 'Ada, warga tidak terlibat') ? 'selected' : '' }}>
                                                Ada, warga tidak terlibat</option>
                                            <option value="Tidak ada kegiatan"
                                                {{ old('valpenanaman_pohon_lahan_kritis') == 'Tidak ada kegiatan' || (isset($rt_lokasi) && $rt_lokasi->penanaman_pohon_lahan_kritis == 'Tidak ada kegiatan') ? 'selected' : '' }}>
                                                Tidak ada kegiatan</option>
                                        </select>
                                        @error('valpenanaman_pohon_lahan_kritis')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpantai_garis_panjang">PANJANG GARIS PANTAI
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $rt_lokasi->pantai_garis_panjang ?? '' }}"
                                            class="form-control @error('valpantai_garis_panjang') is-invalid @enderror"
                                            id="valpantai_garis_panjang" name="valpantai_garis_panjang" placeholder="Panjang...">
                                        @error('valpantai_garis_panjang')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpemanfaatan_laut_perangkap">PEMANFAATAN LAUT
                                        PERIKANAN TANGKAP
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valpemanfaatan_laut_perangkap') is-invalid @enderror"
                                            id="valpemanfaatan_laut_perangkap" name="valpemanfaatan_laut_perangkap">

                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="Ya"
                                                {{ old('valpemanfaatan_laut_perangkap') == 'Ya' || (isset($rt_lokasi) && $rt_lokasi->pemanfaatan_laut_perangkap == 'Ya') ? 'selected' : '' }}>
                                                Ya</option>
                                            <option value="Tidak"
                                                {{ old('valpemanfaatan_laut_perangkap') == 'Tidak' || (isset($rt_lokasi) && $rt_lokasi->pemanfaatan_laut_perangkap == 'Tidak') ? 'selected' : '' }}>
                                                Tidak</option>
                                        </select>
                                        @error('valpemanfaatan_laut_perangkap')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpemanfaatan_laut_budidaya">PEMANFAATAN LAUT PERIKANAN
                                        BUDIDAYA
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valpemanfaatan_laut_budidaya') is-invalid @enderror"
                                            id="valpemanfaatan_laut_budidaya" name="valpemanfaatan_laut_budidaya">

                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="Ya"
                                                {{ old('valpemanfaatan_laut_budidaya') == 'Ya' || (isset($rt_lokasi) && $rt_lokasi->pemanfaatan_laut_budidaya == 'Ya') ? 'selected' : '' }}>
                                                Ya</option>
                                            <option value="Tidak"
                                                {{ old('valpemanfaatan_laut_budidaya') == 'Tidak' || (isset($rt_lokasi) && $rt_lokasi->pemanfaatan_laut_budidaya == 'Tidak') ? 'selected' : '' }}>
                                                Tidak</option>
                                        </select>
                                        @error('valpemanfaatan_laut_budidaya')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpemanfaatan_laut_tambakg">PEMANFAATAN LAUT
                                        TAMBAK GARAM
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valpemanfaatan_laut_tambakg') is-invalid @enderror"
                                            id="valpemanfaatan_laut_tambakg" name="valpemanfaatan_laut_tambakg">

                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="Ya"
                                                {{ old('valpemanfaatan_laut_tambakg') == 'Ya' || (isset($rt_lokasi) && $rt_lokasi->pemanfaatan_laut_tambakg == 'Ya') ? 'selected' : '' }}>
                                                Ya</option>
                                            <option value="Tidak"
                                                {{ old('valpemanfaatan_laut_tambakg') == 'Tidak' || (isset($rt_lokasi) && $rt_lokasi->pemanfaatan_laut_tambakg == 'Tidak') ? 'selected' : '' }}>
                                                Tidak</option>
                                        </select>
                                        @error('valpemanfaatan_laut_tambakg')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpemanfaatan_laut_bahari">PEMANFAATAN LAUT
                                        WISATA BAHARI
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valpemanfaatan_laut_bahari') is-invalid @enderror"
                                            id="valpemanfaatan_laut_bahari" name="valpemanfaatan_laut_bahari">

                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="Ya"
                                                {{ old('valpemanfaatan_laut_bahari') == 'Ya' || (isset($rt_lokasi) && $rt_lokasi->pemanfaatan_laut_bahari == 'Ya') ? 'selected' : '' }}>
                                                Ya</option>
                                            <option value="Tidak"
                                                {{ old('valpemanfaatan_laut_bahari') == 'Tidak' || (isset($rt_lokasi) && $rt_lokasi->pemanfaatan_laut_bahari == 'Tidak') ? 'selected' : '' }}>
                                                Tidak</option>
                                        </select>
                                        @error('valpemanfaatan_laut_bahari')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpemanfaatan_laut_transport">PEMANFAATAN LAUT
                                        TRANSPORTASI UMUM
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valpemanfaatan_laut_transport') is-invalid @enderror"
                                            id="valpemanfaatan_laut_transport" name="valpemanfaatan_laut_transport">
                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="Ya"
                                                {{ old('valpemanfaatan_laut_transport') == 'Ya' || (isset($rt_lokasi) && $rt_lokasi->pemanfaatan_laut_transport == 'Ya') ? 'selected' : '' }}>
                                                Ya</option>
                                            <option value="Tidak"
                                                {{ old('valpemanfaatan_laut_transport') == 'Tidak' || (isset($rt_lokasi) && $rt_lokasi->pemanfaatan_laut_transport == 'Tidak') ? 'selected' : '' }}>
                                                Tidak</option>
                                        </select>
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
                                        <select class="form-control @error('valkondisi_mangrove') is-invalid @enderror"
                                            id="valkondisi_mangrove" name="valkondisi_mangrove">
                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="Seluruhnya baik"
                                                {{ old('valkondisi_mangrove') == 'Seluruhnya baik' || (isset($rt_lokasi) && $rt_lokasi->kondisi_mangrove == 'Seluruhnya baik') ? 'selected' : '' }}>
                                                Seluruhnya baik</option>
                                            <option value="Sebagian besar baik"
                                                {{ old('valkondisi_mangrove') == 'Sebagian besar baik' || (isset($rt_lokasi) && $rt_lokasi->kondisi_mangrove == 'Sebagian besar baik') ? 'selected' : '' }}>
                                                Sebagian besar baik</option>
                                            <option value="Sebagian besar buruk"
                                                {{ old('valkondisi_mangrove') == 'Sebagian besar buruk' || (isset($rt_lokasi) && $rt_lokasi->kondisi_mangrove == 'Sebagian besar buruk') ? 'selected' : '' }}>
                                                Sebagian besar buruk</option>
                                            <option value="Seluruhnya buruk"
                                                {{ old('valkondisi_mangrove') == 'Seluruhnya buruk' || (isset($rt_lokasi) && $rt_lokasi->kondisi_mangrove == 'Seluruhnya buruk') ? 'selected' : '' }}>
                                                Seluruhnya buruk</option>
                                            <option value="Tidak ada"
                                                {{ old('valkondisi_mangrove') == 'Tidak ada' || (isset($rt_lokasi) && $rt_lokasi->kondisi_mangrove == 'Tidak ada') ? 'selected' : '' }}>
                                                Tidak ada</option>
                                        </select>
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
                                        <select class="form-control @error('valpenanaman_mangrove') is-invalid @enderror"
                                            id="valpenanaman_mangrove" name="valpenanaman_mangrove">
                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="Ada, Sebagian warga terlibat"
                                                {{ old('valpenanaman_mangrove') == 'Ada, Sebagian warga terlibat' || (isset($rt_lokasi) && $rt_lokasi->penanaman_mangrove == 'Ada, Sebagian warga terlibat') ? 'selected' : '' }}>
                                                Ada, Sebagian warga terlibat</option>
                                            <option value="Ada, warga tidak terlibat"
                                                {{ old('valpenanaman_mangrove') == 'Ada, warga tidak terlibat' || (isset($rt_lokasi) && $rt_lokasi->penanaman_mangrove == 'Ada, warga tidak terlibat') ? 'selected' : '' }}>
                                                Ada, warga tidak terlibat</option>
                                            <option value="Tidak ada kegiatan"
                                                {{ old('valpenanaman_mangrove') == 'Tidak ada kegiatan' || (isset($rt_lokasi) && $rt_lokasi->penanaman_mangrove == 'Tidak ada kegiatan') ? 'selected' : '' }}>
                                                Tidak ada kegiatan</option>
                                        </select>

                                        @error('valpenanaman_mangrove')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlah_warga_pesisir">JUMLAH WARGA DI WILAYAH PESISIR
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                    </label>
                                    <input type="number" value="{{ $rt_lokasi->jumlah_warga_pesisir ?? '' }}"
                                        class="form-control @error('valjumlah_warga_pesisir') is-invalid @enderror"
                                        id="valjumlah_warga_pesisir" name="valjumlah_warga_pesisir" placeholder="Jumlah...">
                                        @error('valjumlah_warga_pesisir')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlah_warga_atasair">JUMLAH WARGA TINGGAL
                                        DI ATAS AIR
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                    </label>
                                    <input type="number" value="{{ $rt_lokasi->jumlah_warga_atasair ?? '' }}"
                                        class="form-control @error('valjumlah_warga_atasair') is-invalid @enderror"
                                        id="valjumlah_warga_atasair" name="valjumlah_warga_atasair" placeholder="Jumlah...">
                                        @error('valjumlah_warga_atasair')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valwilayah_desa_dalamhutan">WILAYAH DESA DI DALAM
                                        HUTAN (ha)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                    </label>
                                    <input type="number" value="{{ $rt_lokasi->wilayah_desa_dalamhutan ?? '' }}"
                                        class="form-control @error('valwilayah_desa_dalamhutan') is-invalid @enderror"
                                        id="valwilayah_desa_dalamhutan" name="valwilayah_desa_dalamhutan" placeholder="Jumlah...">
                                        @error('valwilayah_desa_dalamhutan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valwilayah_desa_tepihutan">WILAYAH DESA DI TEPI HUTAN (ha)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                    </label>
                                    <input type="number" value="{{ $rt_lokasi->wilayah_desa_tepihutan ?? '' }}"
                                        class="form-control @error('valwilayah_desa_tepihutan') is-invalid @enderror"
                                        id="valwilayah_desa_tepihutan" name="valwilayah_desa_tepihutan" placeholder="Jumlah...">
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
                                            <input type="number" value="{{ $rt_lokasi->fungsihutan_kons ?? '' }}"
                                                class="form-control @error('valfungsihutan_kons') is-invalid @enderror"
                                                id="valfungsihutan_kons" name="valfungsihutan_kons" placeholder="jumlah...">
                                            @error('valfungsihutan_kons')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valfungsihutan_lindung">Lindung (ha)
                                            </label>
                                            <input type="number" value="{{ $rt_lokasi->fungsihutan_lindung ?? '' }}"
                                                class="form-control @error('valfungsihutan_lindung') is-invalid @enderror"
                                                id="valfungsihutan_lindung" name="valfungsihutan_lindung" placeholder="jumlah...">
                                            @error('valfungsihutan_lindung')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valfungsihutan_produk">Produksi (ha)
                                            </label>
                                            <input type="number" value="{{ $rt_lokasi->fungsihutan_produk ?? '' }}"
                                                class="form-control @error('valfungsihutan_produk') is-invalid @enderror"
                                                id="valfungsihutan_produk" name="valfungsihutan_produk"
                                                placeholder="jumlah...">
                                            @error('valfungsihutan_produk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valfungsihutan_hutandes">Hutan Desa (ha)
                                            </label>
                                            <input type="number" value="{{ $rt_lokasi->fungsihutan_hutandes ?? '' }}"
                                                class="form-control @error('valfungsihutan_hutandes') is-invalid @enderror"
                                                id="valfungsihutan_hutandes" name="valfungsihutan_hutandes"
                                                placeholder="jumlah...">
                                            @error('valfungsihutan_hutandes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlahwarga_tinggal_dalamhutan">JUMLAH WARGA YANG TINGGAL
                                        DI DALAM HUTAN
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $rt_lokasi->jumlahwarga_tinggal_dalamhutan ?? '' }}"
                                            class="form-control @error('valjumlahwarga_tinggal_dalamhutan') is-invalid @enderror"
                                            id="valjumlahwarga_tinggal_dalamhutan" name="valjumlahwarga_tinggal_dalamhutan" placeholder="Jumlah...">
                                        @error('valjumlahwarga_tinggal_dalamhutan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlahwarga_tinggal_sekitarhutan">JUMLAH WARGA YANG TINGGAL
                                        DI SEKITAR HUTAN
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $rt_lokasi->jumlahwarga_tinggal_sekitarhutan ?? '' }}"
                                            class="form-control @error('valjumlahwarga_tinggal_sekitarhutan') is-invalid @enderror"
                                            id="valjumlahwarga_tinggal_sekitarhutan" name="valjumlahwarga_tinggal_sekitarhutan" placeholder="Jumlah...">
                                        @error('valjumlahwarga_tinggal_sekitarhutan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valketergantungan_hutan">KETERGANTUNGAN WARGA
                                        TERHADAP HUTAN
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valketergantungan_hutan') is-invalid @enderror"
                                        id="valketergantungan_hutan" name="valketergantungan_hutan">

                                        <option value="" disabled selected>Pilih...</option>
                                    <option value="tinggi"
                                        {{ old('valketergantungan_hutan') == 'tinggi' || (isset($rt_lokasi) && $rt_lokasi->ketergantungan_hutan == 'tinggi') ? 'selected' : '' }}>
                                        Tinggi</option>
                                    <option value="sedang"
                                        {{ old('valketergantungan_hutan') == 'sedang' || (isset($rt_lokasi) && $rt_lokasi->ketergantungan_hutan == 'sedang') ? 'selected' : '' }}>
                                        Sedang</option>
                                    <option value="rendah"
                                        {{ old('valketergantungan_hutan') == 'rendah' || (isset($rt_lokasi) && $rt_lokasi->ketergantungan_hutan == 'rendah') ? 'selected' : '' }}>
                                        Rendah</option>
                                    <option value="Tidak tergantung"
                                        {{ old('valketergantungan_hutan') == 'Tidak tergantung' || (isset($rt_lokasi) && $rt_lokasi->ketergantungan_hutan == 'Tidak tergantung') ? 'selected' : '' }}>
                                        Tidak tergantung</option>
                                </select>


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
                                        <select class="form-control @error('valreboisasi') is-invalid @enderror"
                                        id="valreboisasi" name="valreboisasi">
                                        <option value="" disabled selected>Pilih...</option>
                                    <option value="Ada, Sebagian warga terlibat"
                                        {{ old('valreboisasi') == 'Ada, Sebagian warga terlibat' || (isset($rt_lokasi) && $rt_lokasi->reboisasi == 'Ada, Sebagian warga terlibat') ? 'selected' : '' }}>
                                        Ada, Sebagian warga terlibat</option>
                                    <option value="Ada, warga tidak terlibat"
                                        {{ old('valreboisasi') == 'Ada, warga tidak terlibat' || (isset($rt_lokasi) && $rt_lokasi->reboisasi == 'Ada, warga tidak terlibat') ? 'selected' : '' }}>
                                        Ada, warga tidak terlibat</option>
                                    <option value="Tidak ada kegiatan"
                                        {{ old('valreboisasi') == 'Tidak ada kegiatan' || (isset($rt_lokasi) && $rt_lokasi->reboisasi == 'Tidak ada kegiatan') ? 'selected' : '' }}>
                                        Tidak ada kegiatan</option>
                                </select>
                                        @error('valreboisasi')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlah_produk_luardesa_masuk">JUMLAH PENDUDUK LUAR DESA
                                        YANG MASUK DAN MENETAP DI DESA SETAHUN TERAKHIR
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $rt_lokasi->jumlah_produk_luardesa_masuk ?? '' }}"
                                            class="form-control @error('valjumlah_produk_luardesa_masuk') is-invalid @enderror"
                                            id="valjumlah_produk_luardesa_masuk" name="valjumlah_produk_luardesa_masuk" placeholder="Jumlah...">
                                        @error('valjumlah_produk_luardesa_masuk')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlah_produk_luardesa_keluar">JUMLAH PENDUDUK YANG KELUAR
                                        DARI DESA SETAHUN TERAKHIR
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $rt_lokasi->jumlah_produk_luardesa_keluar ?? '' }}"
                                            class="form-control @error('valjumlah_produk_luardesa_keluar') is-invalid @enderror"
                                            id="valjumlah_produk_luardesa_keluar" name="valjumlah_produk_luardesa_keluar" placeholder="Jumlah...">
                                        @error('valjumlah_produk_luardesa_keluar')
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
            document.getElementById('form-edit-rtlokasi').submit();
        });
    </script>

@endsection
