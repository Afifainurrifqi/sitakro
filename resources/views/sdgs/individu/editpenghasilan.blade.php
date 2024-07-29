 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT PENGHASILAN {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('datapenghasilan.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">

                            <form class="form-valide" action="{{ route('penghasilan.update') }}" method="POST" id="form-edit-penghasilan">
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
                                    <label class="col-lg-4 col-form-label" for="valSumberpenghasilan">SUMBER PENGHASILAN
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valSumberpenghasilan') is-invalid @enderror"
                                            id="valSumberpenghasilan" name="valSumberpenghasilan">
                                            <option value="Padi"
                                                {{ old('valSumberpenghasilan') == 'Padi' || (isset($dataph) && $dataph->sumber_penghasilan == 'Padi') ? 'selected' : '' }}>
                                                Padi</option>
                                            <option value="Paliwijaya (Jagung, Kacang-kacangan, ubi-ubian, dll)"
                                                {{ old('valSumberpenghasilan') == 'Paliwijaya (Jagung, Kacang-kacangan, ubi-ubian, dll)' || (isset($dataph) && $dataph->sumber_penghasilan == 'Paliwijaya (Jagung, Kacang-kacangan, ubi-ubian, dll)') ? 'selected' : '' }}>
                                                Paliwijaya (Jagung, Kacang-kacangan, ubi-ubian, dll)</option>
                                            <option
                                                value="Hortikultura ( buah-buahan, sayur-sayuran, tanaman hias, obat-obatan)"
                                                {{ old('valSumberpenghasilan') == 'Hortikultura ( buah-buahan, sayur-sayuran, tanaman hias, obat-obatan)' || (isset($dataph) && $dataph->sumber_penghasilan == 'Hortikultura ( buah-buahan, sayur-sayuran, tanaman hias, obat-obatan)') ? 'selected' : '' }}>
                                                Hortikultura ( buah-buahan, sayur-sayuran, tanaman hias, obat-obatan)
                                            </option>
                                            <option value="Karet"
                                                {{ old('valSumberpenghasilan') == 'Karet' || (isset($dataph) && $dataph->sumber_penghasilan == 'Karet') ? 'selected' : '' }}>
                                                Karet</option>
                                            <option value="Kelapa Sawit"
                                                {{ old('valSumberpenghasilan') == 'Kelapa Sawit' || (isset($dataph) && $dataph->sumber_penghasilan == 'Kelapa Sawit') ? 'selected' : '' }}>
                                                Kelapa Sawit</option>
                                            <option value="Kakao"
                                                {{ old('valSumberpenghasilan') == 'Kakao' || (isset($dataph) && $dataph->sumber_penghasilan == 'Kakao') ? 'selected' : '' }}>
                                                Kakao</option>
                                            <option value="Kelapa"
                                                {{ old('valSumberpenghasilan') == 'Kelapa' || (isset($dataph) && $dataph->sumber_penghasilan == 'Kelapa') ? 'selected' : '' }}>
                                                Kelapa</option>
                                            <option value="Lada"
                                                {{ old('valSumberpenghasilan') == 'Lada' || (isset($dataph) && $dataph->sumber_penghasilan == 'Lada') ? 'selected' : '' }}>
                                                Lada</option>
                                            <option value="Cengkeh"
                                                {{ old('valSumberpenghasilan') == 'Cengkeh' || (isset($dataph) && $dataph->sumber_penghasilan == 'Cengkeh') ? 'selected' : '' }}>
                                                Cengkeh</option>
                                            <option value="Tembakau"
                                                {{ old('valSumberpenghasilan') == 'Tembakau' || (isset($dataph) && $dataph->sumber_penghasilan == 'Tembakau') ? 'selected' : '' }}>
                                                Tembakau</option>
                                            <option value="Tebu"
                                                {{ old('valSumberpenghasilan') == 'Tebu' || (isset($dataph) && $dataph->sumber_penghasilan == 'Tebu') ? 'selected' : '' }}>
                                                Tebu</option>
                                            <option value="Sapi Potong"
                                                {{ old('valSumberpenghasilan') == 'Sapi Potong' || (isset($dataph) && $dataph->sumber_penghasilan == 'Sapi Potong') ? 'selected' : '' }}>
                                                Sapi Potong</option>
                                            <option value="Susu Sapi"
                                                {{ old('valSumberpenghasilan') == 'Susu Sapi' || (isset($dataph) && $dataph->sumber_penghasilan == 'Susu Sapi') ? 'selected' : '' }}>
                                                Susu Sapi</option>
                                            <option value="Ternak Besar Lainnya (Kuda, Kerbau dll)"
                                                {{ old('valSumberpenghasilan') == 'Ternak Besar Lainnya (Kuda, Kerbau dll)' || (isset($dataph) && $dataph->sumber_penghasilan == 'Ternak Besar Lainnya (Kuda, Kerbau dll)') ? 'selected' : '' }}>
                                                Ternak Besar Lainnya (Kuda, Kerbau dll)</option>
                                            <option value="Perikanan Tangkap (termasuk biota lainnya)"
                                                {{ old('valSumberpenghasilan') == 'Perikanan Tangkap (termasuk biota lainnya)' || (isset($dataph) && $dataph->sumber_penghasilan == 'Perikanan Tangkap (termasuk biota lainnya)') ? 'selected' : '' }}>
                                                Perikanan Tangkap (termasuk biota lainnya)</option>
                                            <option value="Perikanan Budidaya (termasuk biota lainnya)"
                                                {{ old('valSumberpenghasilan') == 'Perikanan Budidaya (termasuk biota lainnya)' || (isset($dataph) && $dataph->sumber_penghasilan == 'Perikanan Budidaya (termasuk biota lainnya)') ? 'selected' : '' }}>
                                                Perikanan Budidaya (termasuk biota lainnya)</option>
                                            <option value="Budidaya Tanaman Kehutanan (Jati, Mahoni, Sengon, dll)"
                                                {{ old('valSumberpenghasilan') == 'Budidaya Tanaman Kehutanan (Jati, Mahoni, Sengon, dll)' || (isset($dataph) && $dataph->sumber_penghasilan == 'Budidaya Tanaman Kehutanan (Jati, Mahoni, Sengon, dll)') ? 'selected' : '' }}>
                                                Budidaya Tanaman Kehutanan (Jati, Mahoni, Sengon, dll)</option>
                                            <option
                                                value="Pemungutan Hasil Hutan (Madu, Gaharu, Buah-buahan, Kayu Bakar, Rotan, dll)"
                                                {{ old('valSumberpenghasilan') == 'Pemungutan Hasil Hutan (Madu, Gaharu, Buah-buahan, Kayu Bakar, Rotan, dll)' || (isset($dataph) && $dataph->sumber_penghasilan == 'Pemungutan Hasil Hutan (Madu, Gaharu, Buah-buahan, Kayu Bakar, Rotan, dll)') ? 'selected' : '' }}>
                                                Pemungutan Hasil Hutan (Madu, Gaharu, Buah-buahan, Kayu Bakar, Rotan,
                                                dll)</option>
                                            <option value="Penangkapan Satwa Liar (Babi, Ayam Hutan, Kijang, dll)"
                                                {{ old('valSumberpenghasilan') == 'Penangkapan Satwa Liar (Babi, Ayam Hutan, Kijang, dll)' || (isset($dataph) && $dataph->sumber_penghasilan == 'Penangkapan Satwa Liar (Babi, Ayam Hutan, Kijang, dll)') ? 'selected' : '' }}>
                                                Penangkapan Satwa Liar (Babi, Ayam Hutan, Kijang, dll)</option>
                                            <option value="Penangkaran Satwa Liar (Arwana, Buaya, dll)"
                                                {{ old('valSumberpenghasilan') == 'Penangkaran Satwa Liar (Arwana, Buaya, dll)' || (isset($dataph) && $dataph->sumber_penghasilan == 'Penangkaran Satwa Liar (Arwana, Buaya, dll)') ? 'selected' : '' }}>
                                                Penangkaran Satwa Liar (Arwana, Buaya, dll)</option>
                                            <option value="Jasa Pertanian (Sewa Traktor, Penggilingan, dll)"
                                                {{ old('valSumberpenghasilan') == 'Jasa Pertanian (Sewa Traktor, Penggilingan, dll)' || (isset($dataph) && $dataph->sumber_penghasilan == 'Jasa Pertanian (Sewa Traktor, Penggilingan, dll)') ? 'selected' : '' }}>
                                                Jasa Pertanian (Sewa Traktor, Penggilingan, dll)</option>
                                            <option value="Pertambangan dan Penggalian"
                                                {{ old('valSumberpenghasilan') == 'Pertambangan dan Penggalian' || (isset($dataph) && $dataph->sumber_penghasilan == 'Pertambangan dan Penggalian') ? 'selected' : '' }}>
                                                Pertambangan dan Penggalian</option>
                                            <option value="Industri Kerajinan"
                                                {{ old('valSumberpenghasilan') == 'Industri Kerajinan' || (isset($dataph) && $dataph->sumber_penghasilan == 'Industri Kerajinan') ? 'selected' : '' }}>
                                                Industri Kerajinan</option>
                                            <option value="Perdagangan"
                                                {{ old('valSumberpenghasilan') == 'Perdagangan' || (isset($dataph) && $dataph->sumber_penghasilan == 'Perdagangan') ? 'selected' : '' }}>
                                                Perdagangan</option>
                                            <option value="Komunikasi"
                                                {{ old('valSumberpenghasilan') == 'Komunikasi' || (isset($dataph) && $dataph->sumber_penghasilan == 'Komunikasi') ? 'selected' : '' }}>
                                                Komunikasi</option>
                                            <option value="Jasa Pertanian"
                                                {{ old('valSumberpenghasilan') == 'Jasa Pertanian' || (isset($dataph) && $dataph->sumber_penghasilan == 'Jasa Pertanian') ? 'selected' : '' }}>
                                                Jasa Pertanian</option>
                                            <option value="Lainnya"
                                                {{ old('valSumberpenghasilan') == 'Lainnya' || (isset($dataph) && $dataph->sumber_penghasilan == 'Lainnya') ? 'selected' : '' }}>
                                                Lainnya</option>
                                            <option value="Karyawan Tetap"
                                                {{ old('valSumberpenghasilan') == 'Karyawan Tetap' || (isset($dataph) && $dataph->sumber_penghasilan == 'Karyawan Tetap') ? 'selected' : '' }}>
                                                Karyawan Tetap</option>
                                            <option value="Karyawan Tidak Tetap"
                                                {{ old('valSumberpenghasilan') == 'Karyawan Tidak Tetap' || (isset($dataph) && $dataph->sumber_penghasilan == 'Karyawan Tidak Tetap') ? 'selected' : '' }}>
                                                Karyawan Tidak Tetap</option>
                                            <option value="PNS"
                                                {{ old('valSumberpenghasilan') == 'PNS' || (isset($dataph) && $dataph->sumber_penghasilan == 'PNS') ? 'selected' : '' }}>
                                                PNS</option>
                                            <option value="Uang Pensiunan"
                                                {{ old('valSumberpenghasilan') == 'Uang Pensiunan' || (isset($dataph) && $dataph->sumber_penghasilan == 'Uang Pensiunan') ? 'selected' : '' }}>
                                                Uang Pensiunan</option>
                                            <option value="TKI di luar ngeri"
                                                {{ old('valSumberpenghasilan') == 'TKI di luar ngeri' || (isset($dataph) && $dataph->sumber_penghasilan == 'TKI di luar ngeri') ? 'selected' : '' }}>
                                                TKI di luar ngeri</option>
                                            <option value="Uang Pensiunan"
                                                {{ old('valSumberpenghasilan') == 'Uang Pensiunan' || (isset($dataph) && $dataph->sumber_penghasilan == 'Uang Pensiunan') ? 'selected' : '' }}>
                                                Uang Pensiunan</option>
                                            <option value="Sumbangan (dari keluarga, dari pemerintah)"
                                                {{ old('valSumberpenghasilan') == 'Sumbangan (dari keluarga, dari pemerintah)' || (isset($dataph) && $dataph->sumber_penghasilan == 'Sumbangan (dari keluarga, dari pemerintah)') ? 'selected' : '' }}>
                                                Sumbangan (dari keluarga, dari pemerintah)</option>
                                        </select>
                                        @error('valSumberpenghasilan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valJumlahasset">JUMLAH ASET DARI SUMBER
                                        PENGHASILAN <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $dataph->jumlah_asset_darip ?? '' }}"
                                            class="form-control @error('valJumlahasset') is-invalid @enderror"
                                            id="valJumlahasset" name="valJumlahasset"
                                            class="form-control @error('valJumlahasset') is-invalid @enderror"
                                            id="valJumlahasset" name="valJumlahasset" placeholder="Tuliskan angka...">

                                        @error('valJumlahasset')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valSatuan">SATUAN <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valSatuan') is-invalid @enderror" id="valSatuan"
                                            name="valSatuan">
                                            <option value="Ton"
                                                {{ old('valSatuan') == 'Ton' || (isset($dataph) && $dataph->satuan == 'Ton') ? 'selected' : '' }}>
                                                Ton</option>
                                            <option value="KG"
                                                {{ old('valSatuan') == 'KG' || (isset($dataph) && $dataph->satuan == 'KG') ? 'selected' : '' }}>
                                                KG</option>
                                            <option value="Ekor"
                                                {{ old('valSatuan') == 'Ekor' || (isset($dataph) && $dataph->satuan == 'Ekor') ? 'selected' : '' }}>
                                                Ekor</option>
                                            <option value="Liter"
                                                {{ old('valSatuan') == 'Liter' || (isset($dataph) && $dataph->satuan == 'Liter') ? 'selected' : '' }}>
                                                Liter</option>
                                            <option value="Barang"
                                                {{ old('valSatuan') == 'Barang' || (isset($dataph) && $dataph->satuan == 'Barang') ? 'selected' : '' }}>
                                                Barang</option>
                                            <option value="Hari"
                                                {{ old('valSatuan') == 'Hari' || (isset($dataph) && $dataph->satuan == 'Hari') ? 'selected' : '' }}>
                                                Hari</option>
                                            <option value="Bulan"
                                                {{ old('valSatuan') == 'Bulan' || (isset($dataph) && $dataph->satuan == 'Bulan') ? 'selected' : '' }}>
                                                Bulan</option>
                                        </select>

                                        @error('valSatuan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valPenghasilanset">PENGHASILAN SETAHUN
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $dataph->penghasilan_setahun ?? '' }}"
                                            class="form-control @error('valPenghasilanset') is-invalid @enderror"
                                            id="valPenghasilanset" name="valPenghasilanset"
                                            placeholder="Tuliskan angka...">
                                        @error('valPenghasilanset')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valExport">DI EKSPOR <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valExport') is-invalid @enderror"
                                            id="valExport" name="valExport">
                                            <option value="Tidak"
                                                {{ old('valExport') == 'Tidak' || (isset($dataph) && $dataph->expor == 'Tidak') ? 'selected' : '' }}>
                                                Tidak</option>
                                            <option value="Semua"
                                                {{ old('valExport') == 'Semua' || (isset($dataph) && $dataph->expor == 'Semua') ? 'selected' : '' }}>
                                                Semua</option>
                                            <option value="Sebagian besar"
                                                {{ old('valExport') == 'Sebagian besar' || (isset($dataph) && $dataph->expor == 'Sebagian besar') ? 'selected' : '' }}>
                                                Sebagian besar</option>
                                        </select>
                                        @error('valExport')
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
            document.getElementById('form-edit-penghasilan').submit();
        });
    </script>
@endsection
