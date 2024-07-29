 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT LOKASI DAN PEMUKIMAN {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                        onclick="window.location='{{ route('lokasipemukiman.index')}}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">

                            <form class="form-valide" action="{{ route('lokasipemukiman.update') }}" method="POST" id="form-edit-kklokasi">
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
                                            <input type="hidden" name="valNama" value=" {{ $datap->nama }}">
                                    </label>
                                    <div class="col-lg-6">
                                        {{ $datap->nama }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valAlamat">Alamat <span
                                            class="text-danger">*</span>
                                            <input type="hidden" name="valAlamat" value=" {{ $datap->alamat }}">
                                    </label>
                                    <div class="col-lg-6">
                                        {{ $datap->alamat }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    @if ($datai)
                                        <label class="col-lg-4 col-form-label" for="valNowa">No Hp <span class="text-danger">*</span>
                                            <input type="hidden" name="valNowa" value="{{ $datai->nowa }}">
                                        </label>
                                        <div class="col-lg-6">
                                            {{ $datai->nowa }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    @if ($datai)
                                        <label class="col-lg-4 col-form-label" for="valNohp">NO. Telpon Rumah
                                            <span class="text-danger">*</span>
                                            <input type="hidden" name="valNohp" value="{{ $datai->nohp }}">
                                        </label>
                                        <div class="col-lg-6">
                                            {{ $datai->nohp }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valnik_kepala">NIK Kepala Keluarga
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $lokasi->nik_kepala ?? '' }}" class="form-control @error('valnik_kepala') is-invalid @enderror"
                                            id="valnik_kepala" name="valnik_kepala" placeholder="NIK..." oninput="this.value = this.value.replace(/[^0-9]/g, '')" >
                                        @error('valnik_kepala')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valtempat_tinggal">TEMPAT TINGGAL YANG DITEMPATI
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valtempat_tinggal') is-invalid @enderror" id="valtempat_tinggal" name="valtempat_tinggal">
                                            <option value="0" disabled selected>--Pilih Tempat tinggal--</option>
                                            <option value="Milik sendiri" {{ old('valtempat_tinggal') == 'Milik sendiri' || (isset($lokasi) && $lokasi->tempat_tinggal == 'Milik sendiri') ? 'selected' : '' }}>Milik sendiri</option>
                                            <option value="Kontrak/Sewa" {{ old('valtempat_tinggal') == 'Kontrak/Sewa' || (isset($lokasi) && $lokasi->tempat_tinggal == 'Kontrak/Sewa') ? 'selected' : '' }}>Kontrak/Sewa</option>
                                            <option value="Bebas Sewa" {{ old('valtempat_tinggal') == 'Bebas Sewa' || (isset($lokasi) && $lokasi->tempat_tinggal == 'Bebas Sewa') ? 'selected' : '' }}>Bebas Sewa</option>
                                            <option value="DIpinjami" {{ old('valtempat_tinggal') == 'DIpinjami' || (isset($lokasi) && $lokasi->tempat_tinggal == 'DIpinjami') ? 'selected' : '' }}>DIpinjami</option>
                                            <option value="Dinas" {{ old('valtempat_tinggal') == 'Dinas' || (isset($lokasi) && $lokasi->tempat_tinggal == 'Dinas') ? 'selected' : '' }}>Dinas</option>
                                            <option value="Lainnya" {{ old('valtempat_tinggal') == 'Lainnya' || (isset($lokasi) && $lokasi->tempat_tinggal == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                        @error('valtempat_tinggal')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valstatus_lahan">STATUS LAHAN
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valstatus_lahan') is-invalid @enderror" id="valstatus_lahan" name="valstatus_lahan">
                                            <option value="0" disabled selected>--Pilih Status Lahan--</option>
                                            <option value="Milik sendiri" {{ old('valstatus_lahan') == 'Milik sendiri' || (isset($lokasi) && $lokasi->status_lahan == 'Milik sendiri') ? 'selected' : '' }}>Milik sendiri</option>
                                            <option value="Milik Orang lain" {{ old('valstatus_lahan') == 'Milik Orang lain' || (isset($lokasi) && $lokasi->status_lahan == 'Milik Orang lain') ? 'selected' : '' }}>Milik Orang lain</option>
                                            <option value="Tanah negara" {{ old('valstatus_lahan') == 'Tanah negara' || (isset($lokasi) && $lokasi->status_lahan == 'Tanah negara') ? 'selected' : '' }}>Tanah negara</option>
                                            <option value="Lainnya" {{ old('valstatus_lahan') == 'Lainnya' || (isset($lokasi) && $lokasi->status_lahan == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>
                                        </select>

                                        @error('valstatus_lahan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valluas_lantai_tinggal">LUAS LANTAI TEMPAT TINGGAL m2
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $lokasi->luas_lantai_tinggal ?? '' }}"
                                            class="form-control @error('valluas_lantai_tinggal') is-invalid @enderror"
                                            id="valluas_lantai_tinggal" name="valluas_lantai_tinggal" placeholder="Masukkan nilai...">
                                        @error('valluas_lantai_tinggal')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valluas_tanah_tinggal">LUAS TANAH TEMPAT TINGGAL m2
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $lokasi->luas_tanah_tinggal ?? '' }}"
                                            class="form-control @error('valluas_tanah_tinggal') is-invalid @enderror"
                                            id="valluas_tanah_tinggal" name="valluas_tanah_tinggal" placeholder="Luas tanah...">
                                        @error('valluas_tanah_tinggal')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjenis_lantai_tinggal">JENIS LANTAI TEMPAT TINGGAL
                                        TERLUAS
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valjenis_lantai_tinggal') is-invalid @enderror" id="valjenis_lantai_tinggal" name="valjenis_lantai_tinggal">
                                            <option value="0" disabled selected>--Pilih Jenis Lantai--</option>
                                            <option value="Marmer/Granit" {{ old('valjenis_lantai_tinggal') == 'Marmer/Granit' || (isset($lokasi) && $lokasi->jenis_lantai_tinggal == 'Marmer/Granit') ? 'selected' : '' }}>Marmer/Granit</option>
                                            <option value="Keramik" {{ old('valjenis_lantai_tinggal') == 'Keramik' || (isset($lokasi) && $lokasi->jenis_lantai_tinggal == 'Keramik') ? 'selected' : '' }}>Keramik</option>
                                            <option value="Parket/Vinil/Permadani" {{ old('valjenis_lantai_tinggal') == 'Parket/Vinil/Permadani' || (isset($lokasi) && $lokasi->jenis_lantai_tinggal == 'Parket/Vinil/Permadani') ? 'selected' : '' }}>Parket/Vinil/Permadani</option>
                                            <option value="Ubin/Tegel/Teraso" {{ old('valjenis_lantai_tinggal') == 'Ubin/Tegel/Teraso' || (isset($lokasi) && $lokasi->jenis_lantai_tinggal == 'Ubin/Tegel/Teraso') ? 'selected' : '' }}>Ubin/Tegel/Teraso</option>
                                            <option value="Kayu/Papan kualitas Tinggi" {{ old('valjenis_lantai_tinggal') == 'Kayu/Papan kualitas Tinggi' || (isset($lokasi) && $lokasi->jenis_lantai_tinggal == 'Kayu/Papan kualitas Tinggi') ? 'selected' : '' }}>Kayu/Papan kualitas Tinggi</option>
                                            <option value="Semen/Batamerah" {{ old('valjenis_lantai_tinggal') == 'Semen/Batamerah' || (isset($lokasi) && $lokasi->jenis_lantai_tinggal == 'Semen/Batamerah') ? 'selected' : '' }}>Semen/Batamerah</option>
                                            <option value="Bambu/Kayu/Papan Kualitas rendah" {{ old('valjenis_lantai_tinggal') == 'Bambu/Kayu/Papan Kualitas rendah' || (isset($lokasi) && $lokasi->jenis_lantai_tinggal == 'Bambu/Kayu/Papan Kualitas rendah') ? 'selected' : '' }}>Bambu/Kayu/Papan Kualitas rendah</option>
                                            <option value="Lainnya" {{ old('valjenis_lantai_tinggal') == 'Lainnya' || (isset($lokasi) && $lokasi->jenis_lantai_tinggal == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>
                                        </select>

                                        @error('valjenis_lantai_tinggal')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valdinding_sebagian">DINDING SEBAGIAN BESAR
                                        RUMAH
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valdinding_sebagian') is-invalid @enderror" id="valdinding_sebagian" name="valdinding_sebagian">
                                            <option value="0" disabled selected>--Pilih Jenis Dinding--</option>
                                            <option value="Semen/Beton/Kayu berkualitas tinggi" {{ old('valdinding_sebagian') == 'Semen/Beton/Kayu berkualitas tinggi' || (isset($lokasi) && $lokasi->dinding_sebagian == 'Semen/Beton/Kayu berkualitas tinggi') ? 'selected' : '' }}>Semen/Beton/Kayu berkualitas tinggi</option>
                                            <option value="Kayu berkualitas rendah/bambu" {{ old('valdinding_sebagian') == 'Kayu berkualitas rendah/bambu' || (isset($lokasi) && $lokasi->dinding_sebagian == 'Kayu berkualitas rendah/bambu') ? 'selected' : '' }}>Kayu berkualitas rendah/bambu</option>
                                            <option value="Lainnya" {{ old('valdinding_sebagian') == 'Lainnya' || (isset($lokasi) && $lokasi->dinding_sebagian == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>
                                        </select>

                                        @error('valdinding_sebagian')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjendela">Jendela
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valjendela') is-invalid @enderror" id="valjendela" name="valjendela">
                                            <option value="0" disabled selected>--Pilih Jenis Jendela--</option>
                                            <option value="Ada, berfungsi" {{ old('valjendela') == 'Ada, berfungsi' || (isset($lokasi) && $lokasi->jendela == 'Ada, berfungsi') ? 'selected' : '' }}>Ada, berfungsi</option>
                                            <option value="Ada, tidak berfungsi" {{ old('valjendela') == 'Ada, tidak berfungsi' || (isset($lokasi) && $lokasi->jendela == 'Ada, tidak berfungsi') ? 'selected' : '' }}>Ada, tidak berfungsi</option>
                                            <option value="Tidak Ada" {{ old('valjendela') == 'Tidak Ada' || (isset($lokasi) && $lokasi->jendela == 'Tidak Ada') ? 'selected' : '' }}>Tidak Ada</option>
                                        </select>

                                        @error('valjendela')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valatap">ATAP
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valatap') is-invalid @enderror" id="valatap" name="valatap">
                                            <option value="0" disabled selected>--Pilih Jenis Atap--</option>
                                            <option value="Genteng" {{ old('valatap') == 'Genteng' || (isset($lokasi) && $lokasi->atap == 'Genteng') ? 'selected' : '' }}>Genteng</option>
                                            <option value="Kayu/Jerami" {{ old('valatap') == 'Kayu/Jerami' || (isset($lokasi) && $lokasi->atap == 'Kayu/Jerami') ? 'selected' : '' }}>Kayu/Jerami</option>
                                            <option value="Lainnya" {{ old('valatap') == 'Lainnya' || (isset($lokasi) && $lokasi->atap == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>
                                        </select>

                                        @error('valatap')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpenerangan">PENERANGAN RUMAH<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valpenerangan') is-invalid @enderror" id="valpenerangan" name="valpenerangan">
                                            <option value="0" disabled selected>--Pilih Jenis Penerangan Rumah--</option>
                                            <option value="Listrik PLN" {{ old('valpenerangan') == 'Listrik PLN' || (isset($lokasi) && $lokasi->penerangan == 'Listrik PLN') ? 'selected' : '' }}>Listrik PLN</option>
                                            <option value="Listrik Non-PLN" {{ old('valpenerangan') == 'Listrik Non-PLN' || (isset($lokasi) && $lokasi->penerangan == 'Listrik Non-PLN') ? 'selected' : '' }}>Listrik Non-PLN</option>
                                            <option value="Lampu Minyak/Lilin" {{ old('valpenerangan') == 'Lampu Minyak/Lilin' || (isset($lokasi) && $lokasi->penerangan == 'Lampu Minyak/Lilin') ? 'selected' : '' }}>Lampu Minyak/Lilin</option>
                                            <option value="Sumber Penerangan Lainnya" {{ old('valpenerangan') == 'Sumber Penerangan Lainnya' || (isset($lokasi) && $lokasi->penerangan == 'Sumber Penerangan Lainnya') ? 'selected' : '' }}>Sumber Penerangan Lainnya</option>
                                            <option value="Tidak ada" {{ old('valpenerangan') == 'Tidak ada' || (isset($lokasi) && $lokasi->penerangan == 'Tidak ada') ? 'selected' : '' }}>Tidak ada</option>
                                        </select>

                                        @error('valpenerangan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valenergi_masak">ENERGI UNTUK MEMASAK<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valenergi_masak') is-invalid @enderror" id="valenergi_masak" name="valenergi_masak">
                                            <option value="0" disabled selected>--Pilih Jenis Energi--</option>
                                            <option value="Gas Kota/LPG/Biogas" {{ old('valenergi_masak') == 'Gas Kota/LPG/Biogas' || (isset($lokasi) && $lokasi->energi_masak == 'Gas Kota/LPG/Biogas') ? 'selected' : '' }}>Gas Kota/LPG/Biogas</option>
                                            <option value="Minyak tanah/Batu Bara" {{ old('valenergi_masak') == 'Minyak tanah/Batu Bara' || (isset($lokasi) && $lokasi->energi_masak == 'Minyak tanah/Batu Bara') ? 'selected' : '' }}>Minyak tanah/Batu Bara</option>
                                            <option value="Kayu Bakar" {{ old('valenergi_masak') == 'Kayu Bakar' || (isset($lokasi) && $lokasi->energi_masak == 'Kayu Bakar') ? 'selected' : '' }}>Kayu Bakar</option>
                                            <option value="Lainnya" {{ old('valenergi_masak') == 'Lainnya' || (isset($lokasi) && $lokasi->energi_masak == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>
                                        </select>

                                        @error('valenergi_masak')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjika_kayu_jenis">JIKA MENGGUNAKAN KAYU
                                        BAKAR, SUMBER KAYU BAKAR
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valjika_kayu_jenis') is-invalid @enderror" id="valjika_kayu_jenis" name="valjika_kayu_jenis">
                                            <option value="0" disabled selected>--Pilih Jenis Bahan Bakar--</option>
                                            <option value="Pembelian" {{ old('valjika_kayu_jenis') == 'Pembelian' || (isset($lokasi) && $lokasi->jika_kayu_jenis == 'Pembelian') ? 'selected' : '' }}>Pembelian</option>
                                            <option value="Diambil dari hutan" {{ old('valjika_kayu_jenis') == 'Diambil dari hutan' || (isset($lokasi) && $lokasi->jika_kayu_jenis == 'Diambil dari hutan') ? 'selected' : '' }}>Diambil dari hutan</option>
                                            <option value="Diambil di luar/bukan hutan" {{ old('valjika_kayu_jenis') == 'Diambil di luar/bukan hutan' || (isset($lokasi) && $lokasi->jika_kayu_jenis == 'Diambil di luar/bukan hutan') ? 'selected' : '' }}>Diambil di luar/bukan hutan</option>
                                            <option value="Lainnya" {{ old('valjika_kayu_jenis') == 'Lainnya' || (isset($lokasi) && $lokasi->jika_kayu_jenis == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>
                                        </select>

                                        @error('valjika_kayu_jenis')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valtempat_sampah">TEMPAT PEMBUANGAN SAMPAH
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valtempat_sampah') is-invalid @enderror" id="valtempat_sampah" name="valtempat_sampah">
                                            <option value="0" disabled selected>--Pilih Jenis Pembuangan Sampah--</option>
                                            <option value="Tidak ada" {{ old('valtempat_sampah') == 'Tidak ada' || (isset($lokasi) && $lokasi->tempat_sampah == 'Tidak ada') ? 'selected' : '' }}>Tidak ada</option>
                                            <option value="Di kebun/Sungai/Drainase" {{ old('valtempat_sampah') == 'Di kebun/Sungai/Drainase' || (isset($lokasi) && $lokasi->tempat_sampah == 'Di kebun/Sungai/Drainase') ? 'selected' : '' }}>Di kebun/Sungai/Drainase</option>
                                            <option value="Dibakar" {{ old('valtempat_sampah') == 'Dibakar' || (isset($lokasi) && $lokasi->tempat_sampah == 'Dibakar') ? 'selected' : '' }}>Dibakar</option>
                                            <option value="Tempat Sampah" {{ old('valtempat_sampah') == 'Tempat Sampah' || (isset($lokasi) && $lokasi->tempat_sampah == 'Tempat Sampah') ? 'selected' : '' }}>Tempat Sampah</option>
                                            <option value="Tempat sampah diangkut/reguler" {{ old('valtempat_sampah') == 'Tempat sampah diangkut/reguler' || (isset($lokasi) && $lokasi->tempat_sampah == 'Tempat sampah diangkut/reguler') ? 'selected' : '' }}>Tempat sampah diangkut/reguler</option>
                                        </select>

                                        @error('valtempat_sampah')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valmck">FASILITAS MCK
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valmck') is-invalid @enderror" id="valmck" name="valmck">
                                            <option value="0" disabled selected>--Pilih Jenis Fasilitas MCK--</option>
                                            <option value="Sendiri" {{ old('valmck') == 'Sendiri' || (isset($lokasi) && $lokasi->mck == 'Sendiri') ? 'selected' : '' }}>Sendiri</option>
                                            <option value="Berkelompok/Tetangga" {{ old('valmck') == 'Berkelompok/Tetangga' || (isset($lokasi) && $lokasi->mck == 'Berkelompok/Tetangga') ? 'selected' : '' }}>Berkelompok/Tetangga</option>
                                            <option value="MCK Umum" {{ old('valmck') == 'MCK Umum' || (isset($lokasi) && $lokasi->mck == 'MCK Umum') ? 'selected' : '' }}>MCK Umum</option>
                                            <option value="Tidak ada" {{ old('valmck') == 'Tidak ada' || (isset($lokasi) && $lokasi->mck == 'Tidak ada') ? 'selected' : '' }}>Tidak ada</option>
                                        </select>

                                        @error('valmck')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valsumber_air_mandi">SUMBER AIR MANDI TERBANYAK DARI
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valsumber_air_mandi') is-invalid @enderror" id="valsumber_air_mandi" name="valsumber_air_mandi">
                                            <option value="0" disabled selected>--Pilih Jenis Sumber Air--</option>
                                            <option value="Ledeng/Perpipaan berbayar/Air isi ulang/Kemasan" {{ old('valsumber_air_mandi') == 'Ledeng/Perpipaan berbayar/Air isi ulang/Kemasan' || (isset($lokasi) && $lokasi->sumber_air_mandi == 'Ledeng/Perpipaan berbayar/Air isi ulang/Kemasan') ? 'selected' : '' }}>Ledeng/Perpipaan berbayar/Air isi ulang/Kemasan</option>
                                            <option value="Perpipaan" {{ old('valsumber_air_mandi') == 'Perpipaan' || (isset($lokasi) && $lokasi->sumber_air_mandi == 'Perpipaan') ? 'selected' : '' }}>Perpipaan</option>
                                            <option value="Mata air/Sumur" {{ old('valsumber_air_mandi') == 'Mata air/Sumur' || (isset($lokasi) && $lokasi->sumber_air_mandi == 'Mata air/Sumur') ? 'selected' : '' }}>Mata air/Sumur</option>
                                            <option value="Sungai, Danau, Embung" {{ old('valsumber_air_mandi') == 'Sungai, Danau, Embung' || (isset($lokasi) && $lokasi->sumber_air_mandi == 'Sungai, Danau, Embung') ? 'selected' : '' }}>Sungai, Danau, Embung</option>
                                            <option value="Tadah air hujan" {{ old('valsumber_air_mandi') == 'Tadah air hujan' || (isset($lokasi) && $lokasi->sumber_air_mandi == 'Tadah air hujan') ? 'selected' : '' }}>Tadah air hujan</option>
                                            <option value="Lainnya" {{ old('valsumber_air_mandi') == 'Lainnya' || (isset($lokasi) && $lokasi->sumber_air_mandi == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                        @error('valsumber_air_mandi')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valsumber_air_mck">FASILITAS BUANG AIR BESAR
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valsumber_air_mck') is-invalid @enderror" id="valsumber_air_mck" name="valsumber_air_mck">
                                            <option value="0" disabled selected>--Pilih Jenis Fasilitas Buang Air Besar--</option>
                                            <option value="Jamban Sendiri" {{ old('valsumber_air_mck') == 'Jamban Sendiri' || (isset($lokasi) && $lokasi->sumber_air_mck == 'Jamban Sendiri') ? 'selected' : '' }}>Jamban Sendiri</option>
                                            <option value="Jamban Umum" {{ old('valsumber_air_mck') == 'Jamban Umum' || (isset($lokasi) && $lokasi->sumber_air_mck == 'Jamban Umum') ? 'selected' : '' }}>Jamban Umum</option>
                                            <option value="Jamban Bersama/Tetangga" {{ old('valsumber_air_mck') == 'Jamban Bersama/Tetangga' || (isset($lokasi) && $lokasi->sumber_air_mck == 'Jamban Bersama/Tetangga') ? 'selected' : '' }}>Jamban Bersama/Tetangga</option>
                                            <option value="Lainnya" {{ old('valsumber_air_mck') == 'Lainnya' || (isset($lokasi) && $lokasi->sumber_air_mck == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>
                                        </select>

                                        @error('valsumber_air_mck')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valsumber_air_minum">SUMBER AIR MINUM TERBANYAK
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valsumber_air_minum') is-invalid @enderror" id="valsumber_air_minum" name="valsumber_air_minum">
                                            <option value="0" disabled selected>--Pilih Jenis Sumber Air--</option>
                                            <option value="Ledeng/Perpipaan berbayar/Air isi ulang/Kemasan" {{ old('valsumber_air_minum') == 'Ledeng/Perpipaan berbayar/Air isi ulang/Kemasan' || (isset($lokasi) && $lokasi->sumber_air_minum == 'Ledeng/Perpipaan berbayar/Air isi ulang/Kemasan') ? 'selected' : '' }}>Ledeng/Perpipaan berbayar/Air isi ulang/Kemasan</option>
                                            <option value="Mata air/Perpipaan/Sumur" {{ old('valsumber_air_minum') == 'Mata air/Perpipaan/Sumur' || (isset($lokasi) && $lokasi->sumber_air_minum == 'Mata air/Perpipaan/Sumur') ? 'selected' : '' }}>Mata air/Perpipaan/Sumur</option>
                                            <option value="Sungai, Danau, Embung" {{ old('valsumber_air_minum') == 'Sungai, Danau, Embung' || (isset($lokasi) && $lokasi->sumber_air_minum == 'Sungai, Danau, Embung') ? 'selected' : '' }}>Sungai, Danau, Embung</option>
                                            <option value="Tadah air hujan" {{ old('valsumber_air_minum') == 'Tadah air hujan' || (isset($lokasi) && $lokasi->sumber_air_minum == 'Tadah air hujan') ? 'selected' : '' }}>Tadah air hujan</option>
                                            <option value="Lainnya" {{ old('valsumber_air_minum') == 'Lainnya' || (isset($lokasi) && $lokasi->sumber_air_minum == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>
                                        </select>

                                        @error('valsumber_air_minum')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valtempat_pembuangan_limbah">TEMPAT PEMBUANGAN AIR LIMBAH
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valtempat_pembuangan_limbah') is-invalid @enderror" id="valtempat_pembuangan_limbah" name="valtempat_pembuangan_limbah">
                                            <option value="0" disabled selected>--Pilih Jenis Pembuangan Limbah--</option>
                                            <option value="Tangki/Instalasi Pengelolaan Limbah" {{ old('valtempat_pembuangan_limbah') == 'Tangki/Instalasi Pengelolaan Limbah' || (isset($lokasi) && $lokasi->tempat_pembuangan_limbah == 'Tangki/Instalasi Pengelolaan Limbah') ? 'selected' : '' }}>Tangki/Instalasi Pengelolaan Limbah</option>
                                            <option value="Sawah/Kolam/Sungai/Drainase/Laut" {{ old('valtempat_pembuangan_limbah') == 'Sawah/Kolam/Sungai/Drainase/Laut' || (isset($lokasi) && $lokasi->tempat_pembuangan_limbah == 'Sawah/Kolam/Sungai/Drainase/Laut') ? 'selected' : '' }}>Sawah/Kolam/Sungai/Drainase/Laut</option>
                                            <option value="Lubang di tanah" {{ old('valtempat_pembuangan_limbah') == 'Lubang di tanah' || (isset($lokasi) && $lokasi->tempat_pembuangan_limbah == 'Lubang di tanah') ? 'selected' : '' }}>Lubang di tanah</option>
                                            <option value="Lainnya" {{ old('valtempat_pembuangan_limbah') == 'Lainnya' || (isset($lokasi) && $lokasi->tempat_pembuangan_limbah == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>
                                        </select>

                                        @error('valtempat_pembuangan_limbah')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valrumah_sutet">RUMAH DILEWATI SUTET
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valrumah_sutet') is-invalid @enderror" id="valrumah_sutet" name="valrumah_sutet">
                                            <option value="0" disabled selected>--Ya/Tidak--</option>
                                            <option value="Ya" {{ old('valrumah_sutet') == 'Ya' || (isset($lokasi) && $lokasi->rumah_sutet == 'Ya') ? 'selected' : '' }}>Ya</option>
                                            <option value="Tidak" {{ old('valrumah_sutet') == 'Tidak' || (isset($lokasi) && $lokasi->rumah_sutet == 'Tidak') ? 'selected' : '' }}>Tidak</option>
                                        </select>

                                        @error('valrumah_sutet')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valrumah_sungai">RUMAH DIPANTARAN SUNGAI
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valrumah_sungai') is-invalid @enderror" id="valrumah_sungai" name="valrumah_sungai">
                                            <option value="0" disabled selected>--Ya/Tidak--</option>
                                            <option value="Ya" {{ old('valrumah_sungai') == 'Ya' || (isset($lokasi) && $lokasi->rumah_sungai == 'Ya') ? 'selected' : '' }}>Ya</option>
                                            <option value="Tidak" {{ old('valrumah_sungai') == 'Tidak' || (isset($lokasi) && $lokasi->rumah_sungai == 'Tidak') ? 'selected' : '' }}>Tidak</option>
                                        </select>

                                        @error('valrumah_sungai')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valrumah_lereng_gunung">RUMAH DI LERENG GUNUNG / BUKIT
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valrumah_lereng_gunung') is-invalid @enderror" id="valrumah_lereng_gunung" name="valrumah_lereng_gunung">
                                            <option value="0" disabled selected>--Ya/Tidak--</option>
                                            <option value="Ya" {{ old('valrumah_lereng_gunung') == 'Ya' || (isset($lokasi) && $lokasi->rumah_lereng_gunung == 'Ya') ? 'selected' : '' }}>Ya</option>
                                            <option value="Tidak" {{ old('valrumah_lereng_gunung') == 'Tidak' || (isset($lokasi) && $lokasi->rumah_lereng_gunung == 'Tidak') ? 'selected' : '' }}>Tidak</option>
                                        </select>

                                        @error('valrumah_lereng_gunung')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valkondi_rumah_kumuh">KONDISI RUMAH KUMUH / TIDAK
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valkondi_rumah_kumuh') is-invalid @enderror" id="valkondi_rumah_kumuh" name="valkondi_rumah_kumuh">
                                            <option value="0" disabled selected>--Pilih Kondisi--</option>
                                            <option value="Kumuh" {{ old('valkondi_rumah_kumuh') == 'Kumuh' || (isset($lokasi) && $lokasi->kondi_rumah_kumuh == 'Kumuh') ? 'selected' : '' }}>Kumuh</option>
                                            <option value="Tidak Kumuh" {{ old('valkondi_rumah_kumuh') == 'Tidak Kumuh' || (isset($lokasi) && $lokasi->kondi_rumah_kumuh == 'Tidak Kumuh') ? 'selected' : '' }}>Tidak Kumuh</option>
                                        </select>

                                        @error('valkondi_rumah_kumuh')
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
            document.getElementById('form-edit-kklokasi').submit();
        });
    </script>


@endsection
