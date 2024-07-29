 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT AKSES TENAGA KESEHATAN {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('aksestenagakerja.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('aksestenagakerja.update') }}" method="POST" id="form-edit-aksestenkes">
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
                                            <input type="number" value="{{ $akses_tenagakerja->jaraktempuh_dr_spesialis ?? ''  }}"
                                                class="form-control @error('valjaraktempuh_dr_spesialis') is-invalid @enderror"
                                                id="valjaraktempuh_dr_spesialis" name="valjaraktempuh_dr_spesialis"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_dr_spesialis')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_dr_spesialis">WAKTU TEMPUH (JAM) </label>
                                            <input type="number" value="{{ $akses_tenagakerja->waktutempuh_dr_spesialis ?? ''  }}"
                                                class="form-control @error('valwaktutempuh_dr_spesialis') is-invalid @enderror"
                                                id="valwaktutempuh_dr_spesialis" name="valwaktutempuh_dr_spesialis"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_dr_spesialis')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_dr_spesialis">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_dr_spesialis') is-invalid @enderror"
                                                id="valkemudahan_dr_spesialis" name="valkemudahan_dr_spesialis">
                                                <option value="Mudah"
                                                    {{ old('valkemudahan_dr_spesialis') == 'Mudah' || (isset($akses_tenagakerja) && $akses_tenagakerja->kemudahan_dr_spesialis == 'Mudah') ? 'selected' : '' }}>
                                                    Mudah</option>
                                                <option value="Tidak Mudah"
                                                    {{ old('valkemudahan_dr_spesialis') == 'Tidak Mudah' || (isset($akses_tenagakerja) && $akses_tenagakerja->kemudahan_dr_spesialis == 'Tidak Mudah') ? 'selected' : '' }}>
                                                    Tidak Mudah</option>
                                            </select>
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
                                            <input type="number" value="{{ $akses_tenagakerja->jaraktempuh_dr_umum ?? '' }}"
                                                class="form-control @error('valjaraktempuh_dr_umum') is-invalid @enderror"
                                                id="valjaraktempuh_dr_umum" name="valjaraktempuh_dr_umum"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_dr_umum')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_dr_umum">WAKTU TEMPUH (JAM) </label>
                                            <input type="number" value="{{ $akses_tenagakerja->waktutempuh_dr_umum ?? ''  }}"
                                                class="form-control @error('valwaktutempuh_dr_umum') is-invalid @enderror"
                                                id="valwaktutempuh_dr_umum" name="valwaktutempuh_dr_umum" placeholder="Berapa jam...">
                                            @error('valwaktutempuh_dr_umum')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_dr_umum">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_dr_umum') is-invalid @enderror"
                                                id="valkemudahan_dr_umum" name="valkemudahan_dr_umum">
                                                <option>Mudah</option>
                                                <option>Tidak Mudah</option>
                                            </select>
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
                                            <input type="number" value="{{ $akses_tenagakerja->jaraktempuh_bidan ?? ''  }}"
                                                class="form-control @error('valjaraktempuh_bidan') is-invalid @enderror"
                                                id="valjaraktempuh_bidan" name="valjaraktempuh_bidan"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_bidan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_bidan">WAKTU TEMPUH (JAM) </label>
                                            <input type="number" value="{{ $akses_tenagakerja->waktutempuh_bidan ?? ''  }}"
                                                class="form-control @error('valwaktutempuh_bidan') is-invalid @enderror"
                                                id="valwaktutempuh_bidan" name="valwaktutempuh_bidan"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_bidan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bidan">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_bidan') is-invalid @enderror"
                                                id="valkemudahan_bidan" name="valkemudahan_bidan">
                                                <option value="Mudah"
                                                    {{ old('valkemudahan_bidan') == 'Mudah' || (isset($akses_tenagakerja) && $akses_tenagakerja->kemudahan_bidan == 'Mudah') ? 'selected' : '' }}>
                                                    Mudah</option>
                                                <option value="Tidak Mudah"
                                                    {{ old('valkemudahan_bidan') == 'Tidak Mudah' || (isset($akses_tenagakerja) && $akses_tenagakerja->kemudahan_bidan == 'Tidak Mudah') ? 'selected' : '' }}>
                                                    Tidak Mudah</option>
                                            </select>

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
                                            <input type="number" value="{{ $akses_tenagakerja->jaraktempuh_tenagakes ?? ''  }}"
                                                class="form-control @error('valjaraktempuh_tenagakes') is-invalid @enderror"
                                                id="valjaraktempuh_tenagakes" name="valjaraktempuh_tenagakes"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_tenagakes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_tenagakes">WAKTU TEMPUH (JAM) </label>
                                            <input type="number" value="{{ $akses_tenagakerja->waktutempuh_tenagakes ?? ''  }}"
                                                class="form-control @error('valwaktutempuh_tenagakes') is-invalid @enderror"
                                                id="valwaktutempuh_tenagakes" name="valwaktutempuh_tenagakes"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_tenagakes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_tenagakes">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_tenagakes') is-invalid @enderror"
                                                id="valkemudahan_tenagakes" name="valkemudahan_tenagakes">
                                                <option value="Mudah"
                                                    {{ old('valkemudahan_tenagakes') == 'Mudah' || (isset($akses_tenagakerja) && $akses_tenagakerja->kemudahan_tenagakes == 'Mudah') ? 'selected' : '' }}>
                                                    Mudah</option>
                                                <option value="Tidak Mudah"
                                                    {{ old('valkemudahan_tenagakes') == 'Tidak Mudah' || (isset($akses_tenagakerja) && $akses_tenagakerja->kemudahan_tenagakes == 'Tidak Mudah') ? 'selected' : '' }}>
                                                    Tidak Mudah</option>
                                            </select>
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
                                            <input type="number" value="{{ $akses_tenagakerja->jaraktempuh_dukun  ?? '' }}"
                                                class="form-control @error('valjaraktempuh_dukun') is-invalid @enderror"
                                                id="valjaraktempuh_dukun" name="valjaraktempuh_dukun"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_dukun')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_dukun">WAKTU TEMPUH (JAM) </label>
                                            <input type="number" value="{{ $akses_tenagakerja->waktutempuh_dukun ?? '' }}"
                                                class="form-control @error('valwaktutempuh_dukun') is-invalid @enderror"
                                                id="valwaktutempuh_dukun" name="valwaktutempuh_dukun"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_dukun')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_dukun">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_dukun') is-invalid @enderror"
                                                id="valkemudahan_dukun" name="valkemudahan_dukun">
                                                <option value="Mudah"
                                                    {{ old('valkemudahan_dukun') == 'Mudah' || (isset($akses_tenagakerja) && $akses_tenagakerja->kemudahan_dukun == 'Mudah') ? 'selected' : '' }}>
                                                    Mudah
                                                </option>
                                                <option value="Tidak Mudah"
                                                    {{ old('valkemudahan_dukun') == 'Tidak Mudah' || (isset($akses_tenagakerja) && $akses_tenagakerja->kemudahan_dukun == 'Tidak Mudah') ? 'selected' : '' }}>
                                                    Tidak Mudah
                                                </option>
                                            </select>

                                            @error('valkemudahan_dukun')
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
            document.getElementById('form-edit-aksestenkes').submit();
        });
    </script>
@endsection
