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
                            <form class="form-valide" action="{{ route('aksessarpras.update') }}" method="POST" id="form-edit-sarpras">
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
                                    <label class="col-lg-4 col-form-label">LOKASI PEKERJAAN UTAMA<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjenistrasport_lokasipu">JENIS TRANSPORTASI</label>
                                            <select class="form-control @error('valjenistrasport_lokasipu') is-invalid @enderror" id="valjenistrasport_lokasipu" name="valjenistrasport_lokasipu">
                                                <option value="Darat" {{ old('valjenistrasport_lokasipu') == 'Darat' || (isset($akses_sarpras) && $akses_sarpras->jenistrasport_lokasipu == 'Darat') ? 'selected' : '' }}>Darat</option>
                                                <option value="Air" {{ old('valjenistrasport_lokasipu') == 'Air' || (isset($akses_sarpras) && $akses_sarpras->jenistrasport_lokasipu == 'Air') ? 'selected' : '' }}>Air</option>
                                                <option value="Laut" {{ old('valjenistrasport_lokasipu') == 'Laut' || (isset($akses_sarpras) && $akses_sarpras->jenistrasport_lokasipu == 'Laut') ? 'selected' : '' }}>Laut</option>
                                            </select>
                                            @error('valjenistrasport_lokasipu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valpengtransportumum_lokasipu">PENGGUNAAN TRANSPORTASI UMUM</label>
                                            <select class="form-control @error('valpengtransportumum_lokasipu') is-invalid @enderror" id="valpengtransportumum_lokasipu" name="valpengtransportumum_lokasipu">
                                                <option value="Ya" {{ old('valpengtransportumum_lokasipu') == 'Ya' || (isset($akses_sarpras) && $akses_sarpras->pengtransportumum_lokasipu == 'Ya') ? 'selected' : '' }}>Ya</option>
                                                <option value="Tidak" {{ old('valpengtransportumum_lokasipu') == 'Tidak' || (isset($akses_sarpras) && $akses_sarpras->pengtransportumum_lokasipu == 'Tidak') ? 'selected' : '' }}>Tidak</option>
                                            </select>
                                            @error('valpengtransportumum_lokasipu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valwaktutempuh_lokasipu">WAKTU TEMPUH SEKALI JALAN (JAM)
                                            </label>
                                            <input type="number" value="{{ $akses_sarpras->waktutempuh_lokasipu ?? ''  }}"
                                                class="form-control @error('valwaktutempuh_lokasipu') is-invalid @enderror"
                                                id="valwaktutempuh_lokasipu" name="valwaktutempuh_lokasipu"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_lokasipu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valbiaya_lokasipu">BIAYA SEKALI JALAN (Rp.)
                                            </label>
                                            <input type="number" value="{{ $akses_sarpras->biaya_lokasipu ?? ''  }}"
                                                class="form-control @error('valbiaya_lokasipu') is-invalid @enderror"
                                                id="valbiaya_lokasipu" name="valbiaya_lokasipu"
                                                placeholder="Berapa rupiah...">
                                            @error('valbiaya_lokasipu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_lokasipu">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_lokasipu') is-invalid @enderror"
                                                id="valkemudahan_lokasipu" name="valkemudahan_lokasipu">
                                                <option value="Mudah"
                                                    {{ old('valkemudahan_lokasipu') == 'Mudah' || (isset($akses_sarpras) && $akses_sarpras->kemudahan_lokasipu == 'Mudah') ? 'selected' : '' }}>
                                                    Mudah</option>
                                                <option value="Tidak Mudah"
                                                    {{ old('valkemudahan_lokasipu') == 'Tidak Mudah' || (isset($akses_sarpras) && $akses_sarpras->kemudahan_lokasipu == 'Tidak Mudah') ? 'selected' : '' }}>
                                                    Tidak Mudah</option>
                                            </select>
                                            @error('valkemudahan_lokasipu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">LAHAN PERTANIAN YANG SEDANG DIUSAHAKAN<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjenistrasport_lahanpertanian">JENIS TRANSPORTASI</label>
                                            <select class="form-control @error('valjenistrasport_lahanpertanian') is-invalid @enderror" id="valjenistrasport_lahanpertanian" name="valjenistrasport_lahanpertanian">
                                                <option value="Darat" {{ old('valjenistrasport_lahanpertanian') == 'Darat' || (isset($akses_sarpras) && $akses_sarpras->jenistrasport_lahanpertanian == 'Darat') ? 'selected' : '' }}>Darat</option>
                                                <option value="Air" {{ old('valjenistrasport_lahanpertanian') == 'Air' || (isset($akses_sarpras) && $akses_sarpras->jenistrasport_lahanpertanian == 'Air') ? 'selected' : '' }}>Air</option>
                                                <option value="Laut" {{ old('valjenistrasport_lahanpertanian') == 'Laut' || (isset($akses_sarpras) && $akses_sarpras->jenistrasport_lahanpertanian == 'Laut') ? 'selected' : '' }}>Laut</option>
                                            </select>
                                            @error('valjenistrasport_lahanpertanian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valpengtransportumum_lahanpertanian">PENGGUNAAN TRANSPORTASI UMUM</label>
                                            <select class="form-control @error('valpengtransportumum_lahanpertanian') is-invalid @enderror" id="valpengtransportumum_lahanpertanian" name="valpengtransportumum_lahanpertanian">
                                                <option value="Ya" {{ old('valpengtransportumum_lahanpertanian') == 'Ya' || (isset($akses_sarpras) && $akses_sarpras->pengtransportumum_lahanpertanian == 'Ya') ? 'selected' : '' }}>Ya</option>
                                                <option value="Tidak" {{ old('valpengtransportumum_lahanpertanian') == 'Tidak' || (isset($akses_sarpras) && $akses_sarpras->pengtransportumum_lahanpertanian == 'Tidak') ? 'selected' : '' }}>Tidak</option>
                                            </select>
                                            @error('valpengtransportumum_lahanpertanian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valwaktutempuh_lahanpertanian">WAKTU TEMPUH SEKALI JALAN (JAM)
                                            </label>
                                            <input type="number" value="{{ $akses_sarpras->waktutempuh_lahanpertanian ?? ''  }}"
                                                class="form-control @error('valwaktutempuh_lahanpertanian') is-invalid @enderror"
                                                id="valwaktutempuh_lahanpertanian" name="valwaktutempuh_lahanpertanian"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_lahanpertanian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valbiaya_lahanpertanian">BIAYA SEKALI JALAN (Rp.)
                                            </label>
                                            <input type="number" value="{{ $akses_sarpras->biaya_lahanpertanian ?? ''  }}"
                                                class="form-control @error('valbiaya_lahanpertanian') is-invalid @enderror"
                                                id="valbiaya_lahanpertanian" name="valbiaya_lahanpertanian"
                                                placeholder="Berapa rupiah...">
                                            @error('valbiaya_lahanpertanian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_lahanpertanian">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_lahanpertanian') is-invalid @enderror"
                                                id="valkemudahan_lahanpertanian" name="valkemudahan_lahanpertanian">
                                                <option value="Mudah"
                                                    {{ old('valkemudahan_lahanpertanian') == 'Mudah' || (isset($akses_sarpras) && $akses_sarpras->kemudahan_lahanpertanian == 'Mudah') ? 'selected' : '' }}>
                                                    Mudah</option>
                                                <option value="Tidak Mudah"
                                                    {{ old('valkemudahan_lahanpertanian') == 'Tidak Mudah' || (isset($akses_sarpras) && $akses_sarpras->kemudahan_lahanpertanian == 'Tidak Mudah') ? 'selected' : '' }}>
                                                    Tidak Mudah</option>
                                            </select>
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
                                            <select class="form-control @error('valjenistrasport_sekolah') is-invalid @enderror" id="valjenistrasport_sekolah" name="valjenistrasport_sekolah">
                                                <option value="Darat" {{ old('valjenistrasport_sekolah') == 'Darat' || (isset($akses_sarpras) && $akses_sarpras->jenistrasport_sekolah == 'Darat') ? 'selected' : '' }}>Darat</option>
                                                <option value="Air" {{ old('valjenistrasport_sekolah') == 'Air' || (isset($akses_sarpras) && $akses_sarpras->jenistrasport_sekolah == 'Air') ? 'selected' : '' }}>Air</option>
                                                <option value="Laut" {{ old('valjenistrasport_sekolah') == 'Laut' || (isset($akses_sarpras) && $akses_sarpras->jenistrasport_sekolah == 'Laut') ? 'selected' : '' }}>Laut</option>
                                            </select>
                                            @error('valjenistrasport_sekolah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valpengtransportumum_sekolah">PENGGUNAAN TRANSPORTASI UMUM</label>
                                            <select class="form-control @error('valpengtransportumum_sekolah') is-invalid @enderror" id="valpengtransportumum_sekolah" name="valpengtransportumum_sekolah">
                                                <option value="Ya" {{ old('valpengtransportumum_sekolah') == 'Ya' || (isset($akses_sarpras) && $akses_sarpras->pengtransportumum_sekolah == 'Ya') ? 'selected' : '' }}>Ya</option>
                                                <option value="Tidak" {{ old('valpengtransportumum_sekolah') == 'Tidak' || (isset($akses_sarpras) && $akses_sarpras->pengtransportumum_sekolah == 'Tidak') ? 'selected' : '' }}>Tidak</option>
                                            </select>
                                            @error('valpengtransportumum_sekolah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valwaktutempuh_sekolah">WAKTU TEMPUH SEKALI JALAN (JAM)
                                            </label>
                                            <input type="number" value="{{ $akses_sarpras->waktutempuh_sekolah ?? ''  }}"
                                                class="form-control @error('valwaktutempuh_sekolah') is-invalid @enderror"
                                                id="valwaktutempuh_sekolah" name="valwaktutempuh_sekolah"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_sekolah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valbiaya_sekolah">BIAYA SEKALI JALAN (Rp.)
                                            </label>
                                            <input type="number" value="{{ $akses_sarpras->biaya_sekolah ?? ''  }}"
                                                class="form-control @error('valbiaya_sekolah') is-invalid @enderror"
                                                id="valbiaya_sekolah" name="valbiaya_sekolah"
                                                placeholder="Berapa rupiah...">
                                            @error('valbiaya_sekolah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_sekolah">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_sekolah') is-invalid @enderror"
                                                id="valkemudahan_sekolah" name="valkemudahan_sekolah">
                                                <option value="Mudah"
                                                    {{ old('valkemudahan_sekolah') == 'Mudah' || (isset($akses_sarpras) && $akses_sarpras->kemudahan_sekolah == 'Mudah') ? 'selected' : '' }}>
                                                    Mudah</option>
                                                <option value="Tidak Mudah"
                                                    {{ old('valkemudahan_sekolah') == 'Tidak Mudah' || (isset($akses_sarpras) && $akses_sarpras->kemudahan_sekolah == 'Tidak Mudah') ? 'selected' : '' }}>
                                                    Tidak Mudah</option>
                                            </select>
                                            @error('valkemudahan_sekolah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BEROBAT<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjenistrasport_berobat">JENIS TRANSPORTASI</label>
                                            <select class="form-control @error('valjenistrasport_berobat') is-invalid @enderror" id="valjenistrasport_berobat" name="valjenistrasport_berobat">
                                                <option value="Darat" {{ old('valjenistrasport_berobat') == 'Darat' || (isset($akses_sarpras) && $akses_sarpras->jenistrasport_berobat == 'Darat') ? 'selected' : '' }}>Darat</option>
                                                <option value="Air" {{ old('valjenistrasport_berobat') == 'Air' || (isset($akses_sarpras) && $akses_sarpras->jenistrasport_berobat == 'Air') ? 'selected' : '' }}>Air</option>
                                                <option value="Laut" {{ old('valjenistrasport_berobat') == 'Laut' || (isset($akses_sarpras) && $akses_sarpras->jenistrasport_berobat == 'Laut') ? 'selected' : '' }}>Laut</option>
                                            </select>
                                            @error('valjenistrasport_berobat')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valpengtransportumum_berobat">PENGGUNAAN TRANSPORTASI UMUM</label>
                                            <select class="form-control @error('valpengtransportumum_berobat') is-invalid @enderror" id="valpengtransportumum_berobat" name="valpengtransportumum_berobat">
                                                <option value="Ya" {{ old('valpengtransportumum_berobat') == 'Ya' || (isset($akses_sarpras) && $akses_sarpras->pengtransportumum_berobat == 'Ya') ? 'selected' : '' }}>Ya</option>
                                                <option value="Tidak" {{ old('valpengtransportumum_berobat') == 'Tidak' || (isset($akses_sarpras) && $akses_sarpras->pengtransportumum_berobat == 'Tidak') ? 'selected' : '' }}>Tidak</option>
                                            </select>
                                            @error('valpengtransportumum_berobat')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valwaktutempuh_berobat">WAKTU TEMPUH SEKALI JALAN (JAM)
                                            </label>
                                            <input type="number" value="{{ $akses_sarpras->waktutempuh_berobat ?? ''  }}"
                                                class="form-control @error('valwaktutempuh_berobat') is-invalid @enderror"
                                                id="valwaktutempuh_berobat" name="valwaktutempuh_berobat"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_berobat')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valbiaya_berobat">BIAYA SEKALI JALAN (Rp.)
                                            </label>
                                            <input type="number" value="{{ $akses_sarpras->biaya_berobat ?? ''  }}"
                                                class="form-control @error('valbiaya_berobat') is-invalid @enderror"
                                                id="valbiaya_berobat" name="valbiaya_berobat"
                                                placeholder="Berapa rupiah...">
                                            @error('valbiaya_berobat')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_berobat">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_berobat') is-invalid @enderror"
                                                id="valkemudahan_berobat" name="valkemudahan_berobat">
                                                <option value="Mudah"
                                                    {{ old('valkemudahan_berobat') == 'Mudah' || (isset($akses_sarpras) && $akses_sarpras->kemudahan_berobat == 'Mudah') ? 'selected' : '' }}>
                                                    Mudah</option>
                                                <option value="Tidak Mudah"
                                                    {{ old('valkemudahan_berobat') == 'Tidak Mudah' || (isset($akses_sarpras) && $akses_sarpras->kemudahan_berobat == 'Tidak Mudah') ? 'selected' : '' }}>
                                                    Tidak Mudah</option>
                                            </select>
                                            @error('valkemudahan_berobat')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BERIBADAH  MINGGUAN / BULANAN / TAHUNAN<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjenistrasport_beribadah">JENIS TRANSPORTASI</label>
                                            <select class="form-control @error('valjenistrasport_beribadah') is-invalid @enderror" id="valjenistrasport_beribadah" name="valjenistrasport_beribadah">
                                                <option value="Darat" {{ old('valjenistrasport_beribadah') == 'Darat' || (isset($akses_sarpras) && $akses_sarpras->jenistrasport_beribadah == 'Darat') ? 'selected' : '' }}>Darat</option>
                                                <option value="Air" {{ old('valjenistrasport_beribadah') == 'Air' || (isset($akses_sarpras) && $akses_sarpras->jenistrasport_beribadah == 'Air') ? 'selected' : '' }}>Air</option>
                                                <option value="Laut" {{ old('valjenistrasport_beribadah') == 'Laut' || (isset($akses_sarpras) && $akses_sarpras->jenistrasport_beribadah == 'Laut') ? 'selected' : '' }}>Laut</option>
                                            </select>
                                            @error('valjenistrasport_beribadah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valpengtransportumum_beribadah">PENGGUNAAN TRANSPORTASI UMUM</label>
                                            <select class="form-control @error('valpengtransportumum_beribadah') is-invalid @enderror" id="valpengtransportumum_beribadah" name="valpengtransportumum_beribadah">
                                                <option value="Ya" {{ old('valpengtransportumum_beribadah') == 'Ya' || (isset($akses_sarpras) && $akses_sarpras->pengtransportumum_beribadah == 'Ya') ? 'selected' : '' }}>Ya</option>
                                                <option value="Tidak" {{ old('valpengtransportumum_beribadah') == 'Tidak' || (isset($akses_sarpras) && $akses_sarpras->pengtransportumum_beribadah == 'Tidak') ? 'selected' : '' }}>Tidak</option>
                                            </select>
                                            @error('valpengtransportumum_beribadah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valwaktutempuh_beribadah">WAKTU TEMPUH SEKALI JALAN (JAM)
                                            </label>
                                            <input type="number" value="{{ $akses_sarpras->waktutempuh_beribadah ?? ''  }}"
                                                class="form-control @error('valwaktutempuh_beribadah') is-invalid @enderror"
                                                id="valwaktutempuh_beribadah" name="valwaktutempuh_beribadah"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_beribadah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valbiaya_beribadah">BIAYA SEKALI JALAN (Rp.)
                                            </label>
                                            <input type="number" value="{{ $akses_sarpras->biaya_beribadah ?? ''  }}"
                                                class="form-control @error('valbiaya_beribadah') is-invalid @enderror"
                                                id="valbiaya_beribadah" name="valbiaya_beribadah"
                                                placeholder="Berapa rupiah...">
                                            @error('valbiaya_beribadah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_beribadah">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_beribadah') is-invalid @enderror"
                                                id="valkemudahan_beribadah" name="valkemudahan_beribadah">
                                                <option value="Mudah"
                                                    {{ old('valkemudahan_beribadah') == 'Mudah' || (isset($akses_sarpras) && $akses_sarpras->kemudahan_beribadah == 'Mudah') ? 'selected' : '' }}>
                                                    Mudah</option>
                                                <option value="Tidak Mudah"
                                                    {{ old('valkemudahan_beribadah') == 'Tidak Mudah' || (isset($akses_sarpras) && $akses_sarpras->kemudahan_beribadah == 'Tidak Mudah') ? 'selected' : '' }}>
                                                    Tidak Mudah</option>
                                            </select>
                                            @error('valkemudahan_beribadah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">REKREASI TERDEKAT<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjenistrasport_rekreasi">JENIS TRANSPORTASI</label>
                                            <select class="form-control @error('valjenistrasport_rekreasi') is-invalid @enderror" id="valjenistrasport_rekreasi" name="valjenistrasport_rekreasi">
                                                <option value="Darat" {{ old('valjenistrasport_rekreasi') == 'Darat' || (isset($akses_sarpras) && $akses_sarpras->jenistrasport_rekreasi == 'Darat') ? 'selected' : '' }}>Darat</option>
                                                <option value="Air" {{ old('valjenistrasport_rekreasi') == 'Air' || (isset($akses_sarpras) && $akses_sarpras->jenistrasport_rekreasi == 'Air') ? 'selected' : '' }}>Air</option>
                                                <option value="Laut" {{ old('valjenistrasport_rekreasi') == 'Laut' || (isset($akses_sarpras) && $akses_sarpras->jenistrasport_rekreasi == 'Laut') ? 'selected' : '' }}>Laut</option>
                                            </select>
                                            @error('valjenistrasport_rekreasi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valpengtransportumum_rekreasi">PENGGUNAAN TRANSPORTASI UMUM</label>
                                            <select class="form-control @error('valpengtransportumum_rekreasi') is-invalid @enderror" id="valpengtransportumum_rekreasi" name="valpengtransportumum_rekreasi">
                                                <option value="Ya" {{ old('valpengtransportumum_rekreasi') == 'Ya' || (isset($akses_sarpras) && $akses_sarpras->pengtransportumum_rekreasi == 'Ya') ? 'selected' : '' }}>Ya</option>
                                                <option value="Tidak" {{ old('valpengtransportumum_rekreasi') == 'Tidak' || (isset($akses_sarpras) && $akses_sarpras->pengtransportumum_rekreasi == 'Tidak') ? 'selected' : '' }}>Tidak</option>
                                            </select>
                                            @error('valpengtransportumum_rekreasi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valwaktutempuh_rekreasi">WAKTU TEMPUH SEKALI JALAN (JAM)
                                            </label>
                                            <input type="number" value="{{ $akses_sarpras->waktutempuh_rekreasi ?? ''  }}"
                                                class="form-control @error('valwaktutempuh_rekreasi') is-invalid @enderror"
                                                id="valwaktutempuh_rekreasi" name="valwaktutempuh_rekreasi"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_rekreasi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valbiaya_rekreasi">BIAYA SEKALI JALAN (Rp.)
                                            </label>
                                            <input type="number" value="{{ $akses_sarpras->biaya_rekreasi ?? ''  }}"
                                                class="form-control @error('valbiaya_rekreasi') is-invalid @enderror"
                                                id="valbiaya_rekreasi" name="valbiaya_rekreasi"
                                                placeholder="Berapa rupiah...">
                                            @error('valbiaya_rekreasi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_rekreasi">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_rekreasi') is-invalid @enderror"
                                                id="valkemudahan_rekreasi" name="valkemudahan_rekreasi">
                                                <option value="Mudah"
                                                    {{ old('valkemudahan_rekreasi') == 'Mudah' || (isset($akses_sarpras) && $akses_sarpras->kemudahan_rekreasi == 'Mudah') ? 'selected' : '' }}>
                                                    Mudah</option>
                                                <option value="Tidak Mudah"
                                                    {{ old('valkemudahan_rekreasi') == 'Tidak Mudah' || (isset($akses_sarpras) && $akses_sarpras->kemudahan_rekreasi == 'Tidak Mudah') ? 'selected' : '' }}>
                                                    Tidak Mudah</option>
                                            </select>
                                            @error('valkemudahan_rekreasi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
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
            document.getElementById('form-edit-sarpras').submit();
        });
    </script>
@endsection
