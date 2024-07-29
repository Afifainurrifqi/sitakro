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
                        <h1 class="card-title">EDIT DATA KESEHATAN {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('datakesehatan.index')}}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('kesehatan.update') }}" method="POST" id="form-edit-kesehatan">
                                @csrf

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valNIK">NIK <span class="text-danger">*</span>
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
                                    <label class="col-lg-4 col-form-label">PENYAKIT YANG DIDERITA SETAHUN TERAKHIR <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="valpenyakitsetahun"
                                                value="MUNTABER" id="chkMUNTABER"
                                                {{ in_array('MUNTABER', old('valpenyakitsetahun', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="chkMUNTABER">MUNTABER</label><br>
                                            <input class="form-check-input" type="checkbox" name="valpenyakitsetahun[]"
                                                {{ in_array('DEMAM BERDARAH', old('valpenyakitsetahun', [])) ? 'checked' : '' }}
                                                value="DEMAM BERDARAH" id="chkDEMAMBERDARAH">
                                            <label class="form-check-label" for="chkDEMAMBERDARAH">DEMAM
                                                BERDARAH</label><br>
                                            <input class="form-check-input" type="checkbox" name="valpenyakitsetahun[]"
                                                {{ in_array('CAMPAK', old('valpenyakitsetahun', [])) ? 'checked' : '' }}
                                                value="CAMPAK" id="chkCAMPAK">
                                            <label class="form-check-label" for="chkCAMPAK">CAMPAK</label><br>
                                            <input class="form-check-input" type="checkbox" name="valpenyakitsetahun[]"
                                                {{ in_array('MALARIA', old('valpenyakitsetahun', [])) ? 'checked' : '' }}
                                                value="MALARIA" id="chkMALARIA">
                                            <label class="form-check-label" for="chkMALARIA">MALARIA</label><br>
                                            <input class="form-check-input" type="checkbox" name="valpenyakitsetahun[]"
                                                {{ in_array('FLU BURUNG', old('valpenyakitsetahun', [])) ? 'checked' : '' }}
                                                value="FLU BURUNG" id="chkFLUBURUNG">
                                            <label class="form-check-label" for="chkFLUBURUNG">FLU BURUNG</label><br>
                                            <input class="form-check-input" type="checkbox" name="valpenyakitsetahun[]"
                                                {{ in_array('COVID-19', old('valpenyakitsetahun', [])) ? 'checked' : '' }}
                                                value="COVID-19" id="chkCOVID19">
                                            <label class="form-check-label" for="chkCOVID19">COVID-19</label><br>
                                            <input class="form-check-input" type="checkbox" name="valpenyakitsetahun[]"
                                            {{ in_array('HEPATITIS B', old('valpenyakitsetahun', [])) ? 'checked' : '' }}
                                                value="HEPATITIS B" id="chkHEPATITISB">
                                            <label class="form-check-label" for="chkHEPATITISB">HEPATITIS B</label><br>
                                            <input class="form-check-input" type="checkbox" name="valpenyakitsetahun[]"
                                            {{ in_array('LEPTOSPIROSIS', old('valpenyakitsetahun', [])) ? 'checked' : '' }}
                                                value="LEPTOSPIROSIS" id="chkLEPTOSPIROSIS">
                                            <label class="form-check-label" for="chkLEPTOSPIROSIS">LEPTOSPIROSIS</label><br>
                                            <input class="form-check-input" type="checkbox" name="valpenyakitsetahun[]"
                                            {{ in_array('KOLERA', old('valpenyakitsetahun', [])) ? 'checked' : '' }}
                                                value="KOLERA" id="chkKOLERA">
                                            <label class="form-check-label" for="chkKOLERA">KOLERA</label><br>
                                            <input class="form-check-input" type="checkbox" name="valpenyakitsetahun[]"
                                            {{ in_array('GIZI BURUK (termasuk STUNTING)', old('valpenyakitsetahun', [])) ? 'checked' : '' }}
                                                value="GIZI BURUK (termasuk STUNTING)" id="chkGIZIBURUK">
                                            <label class="form-check-label" for="chkGIZIBURUK">GIZI BURUK (termasuk
                                                STUNTING)</label><br>
                                            <input class="form-check-input" type="checkbox" name="valpenyakitsetahun[]"
                                            {{ in_array('JANTUNG', old('valpenyakitsetahun', [])) ? 'checked' : '' }}
                                                value="JANTUNG" id="chkJANTUNG">
                                            <label class="form-check-label" for="chkJANTUNG">JANTUNG</label><br>
                                            <input class="form-check-input" type="checkbox" name="valpenyakitsetahun[]"
                                            {{ in_array('TBC PARU PARU', old('valpenyakitsetahun', [])) ? 'checked' : '' }}
                                                value="TBC PARU PARU" id="chkTBCPARUPARU">
                                            <label class="form-check-label" for="chkTBCPARUPARU">TBC PARU PARU</label><br>
                                            <input class="form-check-input" type="checkbox" name="valpenyakitsetahun[]"
                                            {{ in_array('KANKER', old('valpenyakitsetahun', [])) ? 'checked' : '' }}
                                                value="KANKER" id="chkKANKER">
                                            <label class="form-check-label" for="chkKANKER">KANKER</label><br>
                                            <input class="form-check-input" type="checkbox" name="valpenyakitsetahun[]"
                                            {{ in_array('DIABETES / KENCING MANIS / GULA', old('valpenyakitsetahun', [])) ? 'checked' : '' }}
                                                value="DIABETES / KENCING MANIS / GULA" id="chkDIABETES">
                                            <label class="form-check-label" for="chkDIABETES">DIABETES / KENCING MANIS /
                                                GULA</label><br>
                                            <input class="form-check-input" type="checkbox" name="valpenyakitsetahun[]"
                                            {{ in_array('HEPATITIS E', old('valpenyakitsetahun', [])) ? 'checked' : '' }}
                                                value="HEPATITIS E" id="chkHEPATITISE">
                                            <label class="form-check-label" for="chkHEPATITISE">HEPATITIS E</label><br>
                                            <input class="form-check-input" type="checkbox" name="valpenyakitsetahun[]"
                                            {{ in_array('DIFTERI', old('valpenyakitsetahun', [])) ? 'checked' : '' }}
                                                value="DIFTERI" id="chkDIFTERI">
                                            <label class="form-check-label" for="chkDIFTERI">DIFTERI</label><br>
                                            <input class="form-check-input" type="checkbox" name="valpenyakitsetahun[]"
                                            {{ in_array('CHIKUNGUNYA', old('valpenyakitsetahun', [])) ? 'checked' : '' }}
                                                value="CHIKUNGUNYA" id="chkCHIKUNGUNYA">
                                            <label class="form-check-label" for="chkCHIKUNGUNYA">CHIKUNGUNYA</label><br>
                                            <input class="form-check-input" type="checkbox" name="valpenyakitsetahun[]"
                                            {{ in_array('LUMPUH', old('valpenyakitsetahun', [])) ? 'checked' : '' }}
                                                value="LUMPUH" id="chkLUMPUH">
                                            <label class="form-check-label" for="chkLUMPUH">LUMPUH</label><br>
                                        </div>
                                        @error('valpenyakitsetahun')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BERAPA KALI FASILITAS KESEHATAN BERIKUT
                                        DIDATANGI SETAHUN TERAKHIR UNTUK PENGOBATAN / PERAWATAN<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valrumah_sakit">Rumah Sakit</label>
                                            <input type="number" value="{{ $datakesehatan->rumah_sakit ?? '' }}"
                                                class="form-control @error('valrumah_sakit') is-invalid @enderror"
                                                id="valrumah_sakit" name="valrumah_sakit" placeholder="Berapa kali...">
                                            @error('valrumah_sakit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valrumah_sakitb">Rumah Sakit Bersalin</label>
                                            <input type="number" value="{{ $datakesehatan->rumah_sakitb ?? '' }}"
                                                class="form-control @error('valrumah_sakitb') is-invalid @enderror"
                                                id="valrumah_sakitb" name="valrumah_sakitb" placeholder="Berapa kali...">
                                            @error('valrumah_sakitb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpuskesmas_denganri">Puskesmas dengan Rawat Inap</label>
                                            <input type="number" value="{{ $datakesehatan->puskesmas_denganri ?? '' }}"
                                                class="form-control @error('valpuskesmas_denganri') is-invalid @enderror"
                                                id="valpuskesmas_denganri" name="valpuskesmas_denganri"
                                                placeholder="Berapa kali...">
                                            @error('valpuskesmas_denganri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpuskesmas_tanpari">Puskesmas Tanpa Rawat Inap</label>
                                            <input type="number"  value="{{ $datakesehatan->puskesmas_tanpari ?? '' }}"
                                                class="form-control @error('valpuskesmas_tanpari') is-invalid @enderror"
                                                id="valpuskesmas_tanpari" name="valpuskesmas_tanpari"
                                                placeholder="Berapa kali...">
                                            @error('valpuskesmas_tanpari')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpuskemas_pembantu">Puskemas Pembantu</label>
                                            <input type="number" value="{{ $datakesehatan->puskemas_pembantu ?? '' }}"
                                                class="form-control @error('valpuskemas_pembantu') is-invalid @enderror"
                                                id="valpuskemas_pembantu" name="valpuskemas_pembantu"
                                                placeholder="Berapa kali...">
                                            @error('valpuskemas_pembantu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpoliklinik">poliklinik</label>
                                            <input type="number" value="{{ $datakesehatan->poliklinik ?? '' }}"
                                                class="form-control @error('valpoliklinik') is-invalid @enderror"
                                                id="valpoliklinik" name="valpoliklinik" placeholder="Berapa kali...">
                                            @error('valpoliklinik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valtempat_praktekdr">Tempat Praktek Dokter</label>
                                            <input type="number" value="{{ $datakesehatan->tempat_praktekdr ?? '' }}"
                                                class="form-control @error('valtempat_praktekdr') is-invalid @enderror"
                                                id="valtempat_praktekdr" name="valtempat_praktekdr"
                                                placeholder="Berapa kali...">
                                            @error('valtempat_praktekdr')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valrumah_bersalin">Rumah Bersalin</label>
                                            <input type="number" value="{{ $datakesehatan->rumah_bersalin ?? '' }}"
                                                class="form-control @error('valrumah_bersalin') is-invalid @enderror"
                                                id="valrumah_bersalin" name="valrumah_bersalin"
                                                placeholder="Berapa kali...">
                                            @error('valrumah_bersalin')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valtempat_praktek">Tempat Praktek Bidan</label>
                                            <input type="number"  value="{{ $datakesehatan->tempat_praktek ?? '' }}"
                                                class="form-control @error('valtempat_praktek') is-invalid @enderror"
                                                id="valtempat_praktek" name="valtempat_praktek"
                                                placeholder="Berapa kali...">
                                            @error('valtempat_praktek')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valposkesdes">Poskesdes</label>
                                            <input type="number"  value="{{ $datakesehatan->poskesdes ?? '' }}"
                                                class="form-control @error('valposkesdes') is-invalid @enderror"
                                                id="valposkesdes" name="valposkesdes" placeholder="Berapa kali...">
                                            @error('valposkesdes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpolindes">Polindes</label>
                                            <input type="number"  value="{{ $datakesehatan->polindes ?? '' }}"
                                                class="form-control @error('valpolindes') is-invalid @enderror"
                                                id="valpolindes" name="valpolindes" placeholder="Berapa kali...">
                                                @error('valpolindes')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valapotik">APOTIK</label>
                                            <input type="number"  value="{{ $datakesehatan->apotik ?? '' }}"
                                                class="form-control @error('valapotik') is-invalid @enderror"
                                                id="valapotik" name="valapotik" placeholder="Berapa kali...">
                                            @error('valapotik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valtoko_obat">Toko Khusus Obat / Jamu</label>
                                            <input type="number"  value="{{ $datakesehatan->toko_obat ?? '' }}"
                                                class="form-control @error('valtoko_obat') is-invalid @enderror"
                                                id="valtoko_obat" name="valtoko_obat" placeholder="Berapa kali...">
                                            @error('valtoko_obat')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valposyandu">Posyandu</label>
                                            <input type="number"  value="{{ $datakesehatan->posyandu ?? '' }}"
                                                class="form-control @error('valposyandu') is-invalid @enderror"
                                                id="valposyandu" name="valposyandu" placeholder="Berapa kali...">
                                            @error('valposyandu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valposbindu">Posbindu</label>
                                            <input type="number"  value="{{ $datakesehatan->posbindu ?? '' }}"
                                                class="form-control @error('valposbindu') is-invalid @enderror"
                                                id="valposbindu" name="valposbindu" placeholder="Berapa kali...">
                                            @error('valposbindu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valtempat_praktikdb">TEMPAT PRAKTIK DUKUN BAYI / BERSALIN</label>
                                            <input type="number"  value="{{ $datakesehatan->tempat_praktikdb ?? '' }}"
                                                class="form-control @error('valtempat_praktikdb') is-invalid @enderror"
                                                id="valtempat_praktikdb" name="valtempat_praktikdb" placeholder="Berapa kali...">
                                            @error('valtempat_praktikdb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjamkes">JAMKES <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valjamkes') is-invalid @enderror" id="valjamkes" name="valjamkes">
                                            <option value="Peserta" {{ old('valjamkes') == 'Peserta' || (isset($datakesehatan) && $datakesehatan->jamkes == 'Peserta') ? 'selected' : '' }}>Peserta</option>
                                            <option value="Bukan peserta" {{ old('valjamkes') == 'Bukan peserta' || (isset($datakesehatan) && $datakesehatan->jamkes == 'Bukan peserta') ? 'selected' : '' }}>Bukan peserta</option>
                                        </select>
                                        @error('valjamkes')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valbayiu16">BAYI Usia 1-6 bulan Konsumsi
                                        ASI <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">


                                        <select class="form-control @error('valbayiu16') is-invalid @enderror" id="valbayiu16" name="valbayiu16">
                                            <option value="Ya" {{ old('valbayiu16') == 'Ya' || (isset($datakesehatan) && $datakesehatan->bayiu16 == 'Ya') ? 'selected' : '' }}>Ya</option>
                                            <option value="Tidak" {{ old('valbayiu16') == 'Tidak' || (isset($datakesehatan) && $datakesehatan->bayiu16 == 'Tidak') ? 'selected' : '' }}>Tidak</option>
                                        </select>


                                        @error('valbayiu16')
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
            document.getElementById('form-edit-kesehatan').submit();
        });
    </script>

@endsection
