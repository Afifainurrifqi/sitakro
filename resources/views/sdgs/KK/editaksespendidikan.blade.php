 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT AKSES PENDIDIKAN {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('aksespendidikan.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('aksespendidikan.update') }}" method="POST" id="form-edit-aksespendidikan">
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
                                            <input type="number" value="{{ $akses_pendidikan->jaraktempuh_paud ?? ''  }}"
                                                class="form-control @error('valjaraktempuh_paud') is-invalid @enderror"
                                                id="valjaraktempuh_paud" name="valjaraktempuh_paud"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_paud')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_paud">WAKTU TEMPUH (JAM) </label>
                                            <input type="number" value="{{ $akses_pendidikan->waktutempuh_paud ?? ''  }}"
                                                class="form-control @error('valwaktutempuh_paud') is-invalid @enderror"
                                                id="valwaktutempuh_paud" name="valwaktutempuh_paud"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_paud')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_paud">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_paud') is-invalid @enderror"
                                                id="valkemudahan_paud" name="valkemudahan_paud">
                                                <option value="Mudah"
                                                    {{ old('valkemudahan_paud') == 'Mudah' || (isset($akses_pendidikan) && $akses_pendidikan->kemudahan_paud == 'Mudah') ? 'selected' : '' }}>
                                                    Mudah</option>
                                                <option value="Tidak Mudah"
                                                    {{ old('valkemudahan_paud') == 'Tidak Mudah' || (isset($akses_pendidikan) && $akses_pendidikan->kemudahan_paud == 'Tidak Mudah') ? 'selected' : '' }}>
                                                    Tidak Mudah</option>
                                            </select>
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
                                            <input type="number" value="{{ $akses_pendidikan->jaraktempuh_tk ?? '' }}"
                                                class="form-control @error('valjaraktempuh_tk') is-invalid @enderror"
                                                id="valjaraktempuh_tk" name="valjaraktempuh_tk"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_tk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_tk">WAKTU TEMPUH (JAM) </label>
                                            <input type="number" value="{{ $akses_pendidikan->waktutempuh_tk ?? ''  }}"
                                                class="form-control @error('valwaktutempuh_tk') is-invalid @enderror"
                                                id="valwaktutempuh_tk" name="valwaktutempuh_tk" placeholder="Berapa jam...">
                                            @error('valwaktutempuh_tk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_tk">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_tk') is-invalid @enderror"
                                                id="valkemudahan_tk" name="valkemudahan_tk">
                                                <option>Mudah</option>
                                                <option>Tidak Mudah</option>
                                            </select>
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
                                            <input type="number" value="{{ $akses_pendidikan->jaraktempuh_sd ?? ''  }}"
                                                class="form-control @error('valjaraktempuh_sd') is-invalid @enderror"
                                                id="valjaraktempuh_sd" name="valjaraktempuh_sd"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_sd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_sd">WAKTU TEMPUH (JAM) </label>
                                            <input type="number" value="{{ $akses_pendidikan->waktutempuh_sd ?? ''  }}"
                                                class="form-control @error('valwaktutempuh_sd') is-invalid @enderror"
                                                id="valwaktutempuh_sd" name="valwaktutempuh_sd"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_sd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_sd">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_sd') is-invalid @enderror"
                                                id="valkemudahan_sd" name="valkemudahan_sd">
                                                <option value="Mudah"
                                                    {{ old('valkemudahan_sd') == 'Mudah' || (isset($akses_pendidikan) && $akses_pendidikan->kemudahan_sd == 'Mudah') ? 'selected' : '' }}>
                                                    Mudah</option>
                                                <option value="Tidak Mudah"
                                                    {{ old('valkemudahan_sd') == 'Tidak Mudah' || (isset($akses_pendidikan) && $akses_pendidikan->kemudahan_sd == 'Tidak Mudah') ? 'selected' : '' }}>
                                                    Tidak Mudah</option>
                                            </select>

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
                                            <input type="number" value="{{ $akses_pendidikan->jaraktempuh_smp ?? ''  }}"
                                                class="form-control @error('valjaraktempuh_smp') is-invalid @enderror"
                                                id="valjaraktempuh_smp" name="valjaraktempuh_smp"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_smp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_smp">WAKTU TEMPUH (JAM) </label>
                                            <input type="number" value="{{ $akses_pendidikan->waktutempuh_smp ?? ''  }}"
                                                class="form-control @error('valwaktutempuh_smp') is-invalid @enderror"
                                                id="valwaktutempuh_smp" name="valwaktutempuh_smp"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_smp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_smp">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_smp') is-invalid @enderror"
                                                id="valkemudahan_smp" name="valkemudahan_smp">
                                                <option value="Mudah"
                                                    {{ old('valkemudahan_smp') == 'Mudah' || (isset($akses_pendidikan) && $akses_pendidikan->kemudahan_smp == 'Mudah') ? 'selected' : '' }}>
                                                    Mudah</option>
                                                <option value="Tidak Mudah"
                                                    {{ old('valkemudahan_smp') == 'Tidak Mudah' || (isset($akses_pendidikan) && $akses_pendidikan->kemudahan_smp == 'Tidak Mudah') ? 'selected' : '' }}>
                                                    Tidak Mudah</option>
                                            </select>
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
                                            <input type="number" value="{{ $akses_pendidikan->jaraktempuh_sma  ?? '' }}"
                                                class="form-control @error('valjaraktempuh_sma') is-invalid @enderror"
                                                id="valjaraktempuh_sma" name="valjaraktempuh_sma"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_sma')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_sma">WAKTU TEMPUH (JAM) </label>
                                            <input type="number" value="{{ $akses_pendidikan->waktutempuh_sma ?? '' }}"
                                                class="form-control @error('valwaktutempuh_sma') is-invalid @enderror"
                                                id="valwaktutempuh_sma" name="valwaktutempuh_sma"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_sma')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_sma">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_sma') is-invalid @enderror"
                                                id="valkemudahan_sma" name="valkemudahan_sma">
                                                <option value="Mudah"
                                                    {{ old('valkemudahan_sma') == 'Mudah' || (isset($akses_pendidikan) && $akses_pendidikan->kemudahan_sma == 'Mudah') ? 'selected' : '' }}>
                                                    Mudah
                                                </option>
                                                <option value="Tidak Mudah"
                                                    {{ old('valkemudahan_sma') == 'Tidak Mudah' || (isset($akses_pendidikan) && $akses_pendidikan->kemudahan_sma == 'Tidak Mudah') ? 'selected' : '' }}>
                                                    Tidak Mudah
                                                </option>
                                            </select>

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
                                            <input type="number" value="{{ $akses_pendidikan->jaraktempuh_pt ?? ''  }}"
                                                class="form-control @error('valjaraktempuh_pt') is-invalid @enderror"
                                                id="valjaraktempuh_pt" name="valjaraktempuh_pt"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_pt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_pt">WAKTU TEMPUH (JAM) </label>
                                            <input type="number" value="{{ $akses_pendidikan->waktutempuh_pt ?? '' }}"
                                                class="form-control @error('valwaktutempuh_pt') is-invalid @enderror"
                                                id="valwaktutempuh_pt" name="valwaktutempuh_pt"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_pt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_pt">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_pt') is-invalid @enderror"
                                                id="valkemudahan_pt" name="valkemudahan_pt">
                                                <option>Mudah</option>
                                                <option>Tidak Mudah</option>
                                            </select>
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
                                            <input type="number" value="{{ $akses_pendidikan->jaraktempuh_ps ?? '' }}"
                                                class="form-control @error('valjaraktempuh_ps') is-invalid @enderror"
                                                id="valjaraktempuh_ps" name="valjaraktempuh_ps"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_ps')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_ps">WAKTU TEMPUH (JAM) </label>
                                            <input type="number"value="{{ $akses_pendidikan->waktutempuh_ps ?? '' }}"
                                                class="form-control @error('valwaktutempuh_ps') is-invalid @enderror"
                                                id="valwaktutempuh_ps" name="valwaktutempuh_ps"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_ps')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_ps">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_ps') is-invalid @enderror"
                                                id="valkemudahan_ps" name="valkemudahan_ps">
                                                <option>Mudah</option>
                                                <option>Tidak Mudah</option>
                                            </select>
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
                                            <input type="number" value="{{ $akses_pendidikan->jaraktempuh_seminari ?? ''  }}"
                                                class="form-control @error('valjaraktempuh_seminari') is-invalid @enderror"
                                                id="valjaraktempuh_seminari" name="valjaraktempuh_seminari"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_seminari')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_seminari">WAKTU TEMPUH (JAM) </label>
                                            <input type="number" value="{{ $akses_pendidikan->waktutempuh_seminari ?? ''  }}"
                                                class="form-control @error('valwaktutempuh_seminari') is-invalid @enderror"
                                                id="valwaktutempuh_seminari" name="valwaktutempuh_seminari"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_seminari')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_seminari">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_seminari') is-invalid @enderror"
                                            id="valkemudahan_seminari" name="valkemudahan_seminari">
                                        <option value="Mudah" {{ old('valkemudahan_seminari') == 'Mudah' || (isset($akses_pendidikan) && $akses_pendidikan->kemudahan_seminari == 'Mudah') ? 'selected' : '' }}>
                                            Mudah
                                        </option>
                                        <option value="Tidak Mudah" {{ old('valkemudahan_seminari') == 'Tidak Mudah' || (isset($akses_pendidikan) && $akses_pendidikan->kemudahan_seminari == 'Tidak Mudah') ? 'selected' : '' }}>
                                            Tidak Mudah
                                        </option>
                                    </select>

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
                                            <input type="number" value="{{ $akses_pendidikan->jaraktempuh_pagamalain ?? ''  }}"
                                                class="form-control @error('valjaraktempuh_pagamalain') is-invalid @enderror"
                                                id="valjaraktempuh_pagamalain" name="valjaraktempuh_pagamalain"
                                                placeholder="Berapa kilometer...">
                                            @error('valjaraktempuh_pagamalain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwaktutempuh_pagamalain">WAKTU TEMPUH (JAM) </label>
                                            <input type="number" value="{{ $akses_pendidikan->waktutempuh_pagamalain  ?? '' }}"
                                                class="form-control @error('valwaktutempuh_pagamalain') is-invalid @enderror"
                                                id="valwaktutempuh_pagamalain" name="valwaktutempuh_pagamalain"
                                                placeholder="Berapa jam...">
                                            @error('valwaktutempuh_pagamalain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_pagamalain">KEMUDAHAN</label>
                                            <select class="form-control @error('valkemudahan_pagamalain') is-invalid @enderror"
                                            id="valkemudahan_pagamalain" name="valkemudahan_pagamalain">
                                        <option value="Mudah" {{ old('valkemudahan_pagamalain') == 'Mudah' || (isset($akses_pendidikan) && $akses_pendidikan->kemudahan_pagamalain == 'Mudah') ? 'selected' : '' }}>
                                            Mudah
                                        </option>
                                        <option value="Tidak Mudah" {{ old('valkemudahan_pagamalain') == 'Tidak Mudah' || (isset($akses_pendidikan) && $akses_pendidikan->kemudahan_pagamalain == 'Tidak Mudah') ? 'selected' : '' }}>
                                            Tidak Mudah
                                        </option>
                                    </select>

                                            @error('valkemudahan_pagamalain')
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
            document.getElementById('form-edit-aksespendidikan').submit();
        });
    </script>

@endsection
