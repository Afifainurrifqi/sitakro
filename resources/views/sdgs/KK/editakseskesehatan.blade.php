 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT AKSES KESEHATAN {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('akseskesehatan.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('akseskesehatan.update') }}" method="POST" id="form-edit-akseskesehatan">
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
                                            <label for="valjaraktempuh_rumahs">JARAK TEMPUH (KM)</label>
                                            <input type="number" value="{{ $akses_kesehatan->jaraktempuh_rumahs ?? ''  }}"
                                                class="form-control @error('valjaraktempuh_rumahs') is-invalid @enderror"
                                                id="valjaraktempuh_rumahs" name="valjaraktempuh_rumahs"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_rumahs')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_rumahs">WAKTU TEMPUH (JAM) </label>
                                            <input type="number" value="{{ $akses_kesehatan->waktutempuh_rumahs ?? ''  }}"
                                                class="form-control @error('valwaktutempuh_rumahs') is-invalid @enderror"
                                                id="valwaktutempuh_rumahs" name="valwaktutempuh_rumahs"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_rumahs')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_rumahs">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_rumahs') is-invalid @enderror"
                                                id="valkemudahan_rumahs" name="valkemudahan_rumahs">
                                                <option value="Mudah"
                                                    {{ old('valkemudahan_rumahs') == 'Mudah' || (isset($akses_kesehatan) && $akses_kesehatan->kemudahan_rumahs == 'Mudah') ? 'selected' : '' }}>
                                                    Mudah</option>
                                                <option value="Tidak Mudah"
                                                    {{ old('valkemudahan_rumahs') == 'Tidak Mudah' || (isset($akses_kesehatan) && $akses_kesehatan->kemudahan_rumahs == 'Tidak Mudah') ? 'selected' : '' }}>
                                                    Tidak Mudah</option>
                                            </select>
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
                                            <input type="number" value="{{ $akses_kesehatan->jaraktempuh_rumahb ?? '' }}"
                                                class="form-control @error('valjaraktempuh_rumahb') is-invalid @enderror"
                                                id="valjaraktempuh_rumahb" name="valjaraktempuh_rumahb"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_rumahb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_rumahb">WAKTU TEMPUH (JAM) </label>
                                            <input type="number" value="{{ $akses_kesehatan->waktutempuh_rumahb ?? ''  }}"
                                                class="form-control @error('valwaktutempuh_rumahb') is-invalid @enderror"
                                                id="valwaktutempuh_rumahb" name="valwaktutempuh_rumahb" placeholder="Berapa jam...">
                                            @error('valwaktutempuh_rumahb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_rumahb">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_rumahb') is-invalid @enderror"
                                                id="valkemudahan_rumahb" name="valkemudahan_rumahb">
                                                <option>Mudah</option>
                                                <option>Tidak Mudah</option>
                                            </select>
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
                                            <input type="number" value="{{ $akses_kesehatan->jaraktempuh_poliklinik ?? ''  }}"
                                                class="form-control @error('valjaraktempuh_poliklinik') is-invalid @enderror"
                                                id="valjaraktempuh_poliklinik" name="valjaraktempuh_poliklinik"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_poliklinik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_poliklinik">WAKTU TEMPUH (JAM) </label>
                                            <input type="number" value="{{ $akses_kesehatan->waktutempuh_poliklinik ?? ''  }}"
                                                class="form-control @error('valwaktutempuh_poliklinik') is-invalid @enderror"
                                                id="valwaktutempuh_poliklinik" name="valwaktutempuh_poliklinik"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_poliklinik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_poliklinik">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_poliklinik') is-invalid @enderror"
                                                id="valkemudahan_poliklinik" name="valkemudahan_poliklinik">
                                                <option value="Mudah"
                                                    {{ old('valkemudahan_poliklinik') == 'Mudah' || (isset($akses_kesehatan) && $akses_kesehatan->kemudahan_poliklinik == 'Mudah') ? 'selected' : '' }}>
                                                    Mudah</option>
                                                <option value="Tidak Mudah"
                                                    {{ old('valkemudahan_poliklinik') == 'Tidak Mudah' || (isset($akses_kesehatan) && $akses_kesehatan->kemudahan_poliklinik == 'Tidak Mudah') ? 'selected' : '' }}>
                                                    Tidak Mudah</option>
                                            </select>

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
                                            <input type="number" value="{{ $akses_kesehatan->jaraktempuh_puskesmas ?? ''  }}"
                                                class="form-control @error('valjaraktempuh_puskesmas') is-invalid @enderror"
                                                id="valjaraktempuh_puskesmas" name="valjaraktempuh_puskesmas"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_puskesmas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_puskesmas">WAKTU TEMPUH (JAM) </label>
                                            <input type="number" value="{{ $akses_kesehatan->waktutempuh_puskesmas ?? ''  }}"
                                                class="form-control @error('valwaktutempuh_puskesmas') is-invalid @enderror"
                                                id="valwaktutempuh_puskesmas" name="valwaktutempuh_puskesmas"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_puskesmas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_puskesmas">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_puskesmas') is-invalid @enderror"
                                                id="valkemudahan_puskesmas" name="valkemudahan_puskesmas">
                                                <option value="Mudah"
                                                    {{ old('valkemudahan_puskesmas') == 'Mudah' || (isset($akses_kesehatan) && $akses_kesehatan->kemudahan_puskesmas == 'Mudah') ? 'selected' : '' }}>
                                                    Mudah</option>
                                                <option value="Tidak Mudah"
                                                    {{ old('valkemudahan_puskesmas') == 'Tidak Mudah' || (isset($akses_kesehatan) && $akses_kesehatan->kemudahan_puskesmas == 'Tidak Mudah') ? 'selected' : '' }}>
                                                    Tidak Mudah</option>
                                            </select>
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
                                            <input type="number" value="{{ $akses_kesehatan->jaraktempuh_poskedes  ?? '' }}"
                                                class="form-control @error('valjaraktempuh_poskedes') is-invalid @enderror"
                                                id="valjaraktempuh_poskedes" name="valjaraktempuh_poskedes"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_poskedes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_poskedes">WAKTU TEMPUH (JAM) </label>
                                            <input type="number" value="{{ $akses_kesehatan->waktutempuh_poskedes ?? '' }}"
                                                class="form-control @error('valwaktutempuh_poskedes') is-invalid @enderror"
                                                id="valwaktutempuh_poskedes" name="valwaktutempuh_poskedes"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_poskedes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_poskedes">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_poskedes') is-invalid @enderror"
                                                id="valkemudahan_poskedes" name="valkemudahan_poskedes">
                                                <option value="Mudah"
                                                    {{ old('valkemudahan_poskedes') == 'Mudah' || (isset($akses_kesehatan) && $akses_kesehatan->kemudahan_poskedes == 'Mudah') ? 'selected' : '' }}>
                                                    Mudah
                                                </option>
                                                <option value="Tidak Mudah"
                                                    {{ old('valkemudahan_poskedes') == 'Tidak Mudah' || (isset($akses_kesehatan) && $akses_kesehatan->kemudahan_poskedes == 'Tidak Mudah') ? 'selected' : '' }}>
                                                    Tidak Mudah
                                                </option>
                                            </select>

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
                                            <input type="number" value="{{ $akses_kesehatan->jaraktempuh_posyandu ?? ''  }}"
                                                class="form-control @error('valjaraktempuh_posyandu') is-invalid @enderror"
                                                id="valjaraktempuh_posyandu" name="valjaraktempuh_posyandu"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_posyandu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_posyandu">WAKTU TEMPUH (JAM) </label>
                                            <input type="number" value="{{ $akses_kesehatan->waktutempuh_posyandu ?? '' }}"
                                                class="form-control @error('valwaktutempuh_posyandu') is-invalid @enderror"
                                                id="valwaktutempuh_posyandu" name="valwaktutempuh_posyandu"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_posyandu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_posyandu">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_posyandu') is-invalid @enderror"
                                                id="valkemudahan_posyandu" name="valkemudahan_posyandu">
                                                <option>Mudah</option>
                                                <option>Tidak Mudah</option>
                                            </select>
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
                                            <input type="number" value="{{ $akses_kesehatan->jaraktempuh_apotik ?? '' }}"
                                                class="form-control @error('valjaraktempuh_apotik') is-invalid @enderror"
                                                id="valjaraktempuh_apotik" name="valjaraktempuh_apotik"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_apotik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_apotik">WAKTU TEMPUH (JAM) </label>
                                            <input type="number"value="{{ $akses_kesehatan->waktutempuh_apotik ?? '' }}"
                                                class="form-control @error('valwaktutempuh_apotik') is-invalid @enderror"
                                                id="valwaktutempuh_apotik" name="valwaktutempuh_apotik"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_apotik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_apotik">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_apotik') is-invalid @enderror"
                                                id="valkemudahan_apotik" name="valkemudahan_apotik">
                                                <option>Mudah</option>
                                                <option>Tidak Mudah</option>
                                            </select>
                                            @error('valkemudahan_apotik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label"> TOKO OBAT <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjaraktempuh_toko_obat">JARAK TEMPUH (KM)</label>
                                            <input type="number" value="{{ $akses_kesehatan->jaraktempuh_toko_obat ?? ''  }}"
                                                class="form-control @error('valjaraktempuh_toko_obat') is-invalid @enderror"
                                                id="valjaraktempuh_toko_obat" name="valjaraktempuh_toko_obat"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_toko_obat')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_toko_obat">WAKTU TEMPUH (JAM) </label>
                                            <input type="number" value="{{ $akses_kesehatan->waktutempuh_toko_obat ?? ''  }}"
                                                class="form-control @error('valwaktutempuh_toko_obat') is-invalid @enderror"
                                                id="valwaktutempuh_toko_obat" name="valwaktutempuh_toko_obat"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_toko_obat')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_toko_obat">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_toko_obat') is-invalid @enderror"
                                            id="valkemudahan_toko_obat" name="valkemudahan_toko_obat">
                                        <option value="Mudah" {{ old('valkemudahan_toko_obat') == 'Mudah' || (isset($akses_kesehatan) && $akses_kesehatan->kemudahan_toko_obat == 'Mudah') ? 'selected' : '' }}>
                                            Mudah
                                        </option>
                                        <option value="Tidak Mudah" {{ old('valkemudahan_toko_obat') == 'Tidak Mudah' || (isset($akses_kesehatan) && $akses_kesehatan->kemudahan_toko_obat == 'Tidak Mudah') ? 'selected' : '' }}>
                                            Tidak Mudah
                                        </option>
                                    </select>

                                            @error('valkemudahan_toko_obat')
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
            document.getElementById('form-edit-akseskesehatan').submit();
        });
    </script>
@endsection
