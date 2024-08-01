 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    @error('field-name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT JENIS DISABILITAS {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('disabilitas.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('disabilitas.update') }}" method="POST" id="form-edit-disabilitas">
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
                                    <label class="col-lg-4 col-form-label">PILIH JENIS DISABILITAS <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="valjenisdisab[]"
                                                value="TUNANETRA" id="chkTUNANETRA"
                                                {{ in_array('TUNANETRA', explode(',', $datadisabilitas->jenis_disabilitas ?? '')) ? 'checked' : '' }}>                                            <label class="form-check-label" for="chkTUNANETRA">TUNANETRA</label><br>

                                            <input class="form-check-input" type="checkbox" name="valjenisdisab[]"
                                                value="TUNARUNGU" id="chkTUNARUNGU"
                                                {{ in_array('TUNARUNGU', explode(',', $datadisabilitas->jenis_disabilitas ?? '')) ? 'checked' : '' }}>                                            <label class="form-check-label" for="chkTUNARUNGU">TUNARUNGU (TULI)</label><br>

                                            <input class="form-check-input" type="checkbox" name="valjenisdisab[]"
                                                value="TUNAWICARA" id="chkTUNAWICARA"
                                                {{ in_array('TUNAWICARA', explode(',', $datadisabilitas->jenis_disabilitas ?? '')) ? 'checked' : '' }}>                                            <label class="form-check-label" for="chkTUNAWICARA">TUNAWICARA
                                                (BISU)</label><br>

                                            <input class="form-check-input" type="checkbox" name="valjenisdisab[]"
                                                value="TUNARUNGI_WICARA" id="chkTUNARUNGI_WICARA"
                                                {{ in_array('TUNARUNGI_WICARA', explode(',', $datadisabilitas->jenis_disabilitas ?? '')) ? 'checked' : '' }}>                                            <label class="form-check-label" for="chkTUNARUNGI_WICARA">TUNARUNGI - WICARA
                                                (BISU - TULI)</label><br>

                                            <input class="form-check-input" type="checkbox" name="valjenisdisab[]"
                                                value="TUNADAKSA" id="chkTUNADAKSA"
                                                {{ in_array('TUNADAKSA', explode(',', $datadisabilitas->jenis_disabilitas ?? '')) ? 'checked' : '' }}>                                            <label class="form-check-label" for="chkTUNADAKSA">TUNADAKSA (CACAT
                                                TUBUH)</label><br>

                                            <input class="form-check-input" type="checkbox" name="valjenisdisab[]"
                                                value="TUNAGRAHITA" id="chkTUNAGRAHITA"
                                                {{ in_array('TUNAGRAHITA', explode(',', $datadisabilitas->jenis_disabilitas ?? '')) ? 'checked' : '' }}>                                            <label class="form-check-label" for="chkTUNAGRAHITA">TUNAGRAHITA (CACAT
                                                MENTAL)</label><br>

                                            <input class="form-check-input" type="checkbox" name="valjenisdisab[]"
                                                value="TUNALARAS" id="chkTUNALARAS"
                                                {{ in_array('TUNALARAS', explode(',', $datadisabilitas->jenis_disabilitas ?? '')) ? 'checked' : '' }}>                                            <label class="form-check-label" for="chkTUNALARAS">TUNALARAS (EX. SAKIT
                                                JIWA)</label><br>

                                            <input class="form-check-input" type="checkbox" name="valjenisdisab[]"
                                                value="CACAT_EX_SAKIT_KUSTA" id="chkCACAT_EX_SAKIT_KUSTA"
                                                {{ in_array('CACAT_EX_SAKIT_KUSTA', explode(',', $datadisabilitas->jenis_disabilitas ?? '')) ? 'checked' : '' }}>                                            <label class="form-check-label" for="chkCACAT_EX_SAKIT_KUSTA">CACAT EX-SAKIT
                                                KUSTA</label><br>

                                            <input class="form-check-input" type="checkbox" name="valjenisdisab[]"
                                                value="CACAT_GANDA" id="chkCACAT_GANDA"
                                                {{ in_array('CACAT_GANDA', explode(',', $datadisabilitas->jenis_disabilitas ?? '')) ? 'checked' : '' }}>                                            <label class="form-check-label" for="chkCACAT_GANDA">CACAT GANDA
                                                (FISIK+MENTAL)</label><br>

                                            <input class="form-check-input" type="checkbox" name="valjenisdisab[]"
                                                value="DIPASUNG" id="chkDIPASUNG"
                                                {{ in_array('DIPASUNG', explode(',', $datadisabilitas->jenis_disabilitas ?? '')) ? 'checked' : '' }}>                                            <label class="form-check-label" for="chkDIPASUNG">DIPASUNG</label><br>

                                        </div>
                                        @error('valjenisdisab')
                                            <div class="invalid-feedback">
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
            document.getElementById('form-edit-disabilitas').submit();
        });
    </script>

@endsection
