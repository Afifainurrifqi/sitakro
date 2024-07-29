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
                        <h1 class="card-title">DATA KESEHATAN {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('datakesehatan.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('kesehatan.update') }}" method="POST">
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
                                {{-- <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PENYAKIT YANG DIDERITA SETAHUN TERAKHIR <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="chkPenyakit[]"
                                                value="MUNTABER" id="chkMUNTABER"
                                                {{ in_array('MUNTABER', old('chkPenyakit', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="chkMUNTABER">MUNTABER</label><br>
                                            <input class="form-check-input" type="checkbox" name="chkPenyakit[]"
                                                {{ in_array('DEMAM BERDARAH', old('chkPenyakit', [])) ? 'checked' : '' }}
                                                value="DEMAM BERDARAH" id="chkDEMAMBERDARAH">
                                            <label class="form-check-label" for="chkDEMAMBERDARAH">DEMAM
                                                BERDARAH</label><br>
                                            <input class="form-check-input" type="checkbox" name="chkPenyakit[]"
                                                {{ in_array('CAMPAK', old('chkPenyakit', [])) ? 'checked' : '' }}
                                                value="CAMPAK" id="chkCAMPAK">
                                            <label class="form-check-label" for="chkCAMPAK">CAMPAK</label><br>
                                            <input class="form-check-input" type="checkbox" name="chkPenyakit[]"
                                                {{ in_array('MALARIA', old('chkPenyakit', [])) ? 'checked' : '' }}
                                                value="MALARIA" id="chkMALARIA">
                                            <label class="form-check-label" for="chkMALARIA">MALARIA</label><br>
                                            <input class="form-check-input" type="checkbox" name="chkPenyakit[]"
                                                {{ in_array('FLU BURUNG', old('chkPenyakit', [])) ? 'checked' : '' }}
                                                value="FLU BURUNG" id="chkFLUBURUNG">
                                            <label class="form-check-label" for="chkFLUBURUNG">FLU BURUNG</label><br>
                                            <input class="form-check-input" type="checkbox" name="chkPenyakit[]"
                                                {{ in_array('COVID-19', old('chkPenyakit', [])) ? 'checked' : '' }}
                                                value="COVID-19" id="chkCOVID19">
                                            <label class="form-check-label" for="chkCOVID19">COVID-19</label><br>
                                            <input class="form-check-input" type="checkbox" name="chkPenyakit[]"
                                            {{ in_array('HEPATITIS B', old('chkPenyakit', [])) ? 'checked' : '' }}
                                                value="HEPATITIS B" id="chkHEPATITISB">
                                            <label class="form-check-label" for="chkHEPATITISB">HEPATITIS B</label><br>
                                            <input class="form-check-input" type="checkbox" name="chkPenyakit[]"
                                            {{ in_array('LEPTOSPIROSIS', old('chkPenyakit', [])) ? 'checked' : '' }}
                                                value="LEPTOSPIROSIS" id="chkLEPTOSPIROSIS">
                                            <label class="form-check-label" for="chkLEPTOSPIROSIS">LEPTOSPIROSIS</label><br>
                                            <input class="form-check-input" type="checkbox" name="chkPenyakit[]"
                                            {{ in_array('KOLERA', old('chkPenyakit', [])) ? 'checked' : '' }}
                                                value="KOLERA" id="chkKOLERA">
                                            <label class="form-check-label" for="chkKOLERA">KOLERA</label><br>
                                            <input class="form-check-input" type="checkbox" name="chkPenyakit[]"
                                            {{ in_array('GIZI BURUK (termasuk STUNTING)', old('chkPenyakit', [])) ? 'checked' : '' }}
                                                value="GIZI BURUK (termasuk STUNTING)" id="chkGIZIBURUK">
                                            <label class="form-check-label" for="chkGIZIBURUK">GIZI BURUK (termasuk
                                                STUNTING)</label><br>
                                            <input class="form-check-input" type="checkbox" name="chkPenyakit[]"
                                            {{ in_array('JANTUNG', old('chkPenyakit', [])) ? 'checked' : '' }}
                                                value="JANTUNG" id="chkJANTUNG">
                                            <label class="form-check-label" for="chkJANTUNG">JANTUNG</label><br>
                                            <input class="form-check-input" type="checkbox" name="chkPenyakit[]"
                                            {{ in_array('TBC PARU PARU', old('chkPenyakit', [])) ? 'checked' : '' }}
                                                value="TBC PARU PARU" id="chkTBCPARUPARU">
                                            <label class="form-check-label" for="chkTBCPARUPARU">TBC PARU PARU</label><br>
                                            <input class="form-check-input" type="checkbox" name="chkPenyakit[]"
                                            {{ in_array('KANKER', old('chkPenyakit', [])) ? 'checked' : '' }}
                                                value="KANKER" id="chkKANKER">
                                            <label class="form-check-label" for="chkKANKER">KANKER</label><br>
                                            <input class="form-check-input" type="checkbox" name="chkPenyakit[]"
                                            {{ in_array('DIABETES / KENCING MANIS / GULA', old('chkPenyakit', [])) ? 'checked' : '' }}
                                                value="DIABETES / KENCING MANIS / GULA" id="chkDIABETES">
                                            <label class="form-check-label" for="chkDIABETES">DIABETES / KENCING MANIS /
                                                GULA</label><br>
                                            <input class="form-check-input" type="checkbox" name="chkPenyakit[]"
                                            {{ in_array('HEPATITIS E', old('chkPenyakit', [])) ? 'checked' : '' }}
                                                value="HEPATITIS E" id="chkHEPATITISE">
                                            <label class="form-check-label" for="chkHEPATITISE">HEPATITIS E</label><br>
                                            <input class="form-check-input" type="checkbox" name="chkPenyakit[]"
                                            {{ in_array('DIFTERI', old('chkPenyakit', [])) ? 'checked' : '' }}
                                                value="DIFTERI" id="chkDIFTERI">
                                            <label class="form-check-label" for="chkDIFTERI">DIFTERI</label><br>
                                            <input class="form-check-input" type="checkbox" name="chkPenyakit[]"
                                            {{ in_array('CHIKUNGUNYA', old('chkPenyakit', [])) ? 'checked' : '' }}
                                                value="CHIKUNGUNYA" id="chkCHIKUNGUNYA">
                                            <label class="form-check-label" for="chkCHIKUNGUNYA">CHIKUNGUNYA</label><br>
                                            <input class="form-check-input" type="checkbox" name="chkPenyakit[]"
                                            {{ in_array('LUMPUH', old('chkPenyakit', [])) ? 'checked' : '' }}
                                                value="LUMPUH" id="chkLUMPUH">
                                            <label class="form-check-label" for="chkLUMPUH">LUMPUH</label><br>
                                        </div>
                                        @error('valpenyakitsetahun')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpenyakitsetahun">PENYAKIT YANG DIDERITA SETAHUN
                                        TERAKHIR
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datakesehatan->penyakitsetahun))
                                        {{ $datakesehatan->penyakitsetahun }}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                        @error('valpenyakitsetahun')
                                            <div id="" class="invalid-feedback">
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
                                            <label for="valrumah_sakit">Rumah Sakit</label> <br>
                                            @if (isset($datakesehatan->rumah_sakit))
                                            {{ $datakesehatan->rumah_sakit }} Kali
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valKondisipekerjaan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valrumah_sakitb">Rumah Sakit Bersalin</label> <br>
                                            @if (isset($datakesehatan->rumah_sakitb))
                                            {{ $datakesehatan->rumah_sakitb }} Kali
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valKondisipekerjaan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpuskesmas_denganri">Puskesmas dengan Rawat Inap</label><br>
                                            @if (isset($datakesehatan->puseksmas_denganri))
                                            {{ $datakesehatan->puseksmas_denganri }} Kali
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valKondisipekerjaan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpuskesmas_tanpari">Puskesmas Tanpa Rawat Inap</label><br>
                                            @if (isset($datakesehatan->puskesmas_tanpari))
                                            {{ $datakesehatan->puskesmas_tanpari }} Kali
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valKondisipekerjaan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpuskemas_pembantu">Puskemas Pembantu</label><br>
                                            @if (isset($datakesehatan->puskemas_pembantu))
                                            {{ $datakesehatan->puskemas_pembantu }} Kali
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valKondisipekerjaan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpoliklinik">poliklinik</label><br>
                                            @if (isset($datakesehatan->poliklinik))
                                            {{ $datakesehatan->poliklinik }} Kali
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valKondisipekerjaan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valtempat_praktekdr">Tempat Praktek Dokter</label><br>
                                            @if (isset($datakesehatan->tempat_praktekdr))
                                            {{ $datakesehatan->tempat_praktekdr }} Kali
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valKondisipekerjaan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valrumah_bersalin">Rumah Bersalin</label><br>
                                            @if (isset($datakesehatan->rumah_bersalin))
                                            {{ $datakesehatan->rumah_bersalin }} Kali
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valKondisipekerjaan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valtempat_praktek">Tempat Praktek Bidan</label><br>
                                            @if (isset($datakesehatan->tempat_praktek))
                                            {{ $datakesehatan->tempat_praktek }} Kali
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valKondisipekerjaan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valposkesdes">poskesdes</label><br>
                                            @if (isset($datakesehatan->poskesdes))
                                            {{ $datakesehatan->poskesdes }} Kali
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valKondisipekerjaan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpolindes">valpolindes</label><br>
                                            @if (isset($datakesehatan->polindes))
                                            {{ $datakesehatan->polindes }} Kali
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valKondisipekerjaan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valapotik">APOTIK</label><br>
                                            @if (isset($datakesehatan->apotik))
                                            {{ $datakesehatan->apotik }} Kali
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valKondisipekerjaan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valtoko_obat">Toko Khusus Obat / Jamu</label><br>
                                            @if (isset($datakesehatan->toko_obat))
                                            {{ $datakesehatan->toko_obat }} Kali
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valKondisipekerjaan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valposyandu">valposyandu</label><br>
                                            @if (isset($datakesehatan->posyandu))
                                            {{ $datakesehatan->posyandu }} Kali
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valKondisipekerjaan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valposbindu">posbindu</label><br>
                                            @if (isset($datakesehatan->posbindu))
                                            {{ $datakesehatan->posbindu }} Kali
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valKondisipekerjaan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valtempat_praktikdb">TEMPAT PRAKTIK DUKUN BAYI / BERSALIN</label><br>
                                            @if (isset($datakesehatan->tempat_praktikdb))
                                            {{ $datakesehatan->tempat_praktikdb }} Kali
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valtempat_praktikdb')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjamkes">JAMKES<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                            @if (isset($datakesehatan->jamkes))
                                            {{ $datakesehatan->jamkes }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valKondisipekerjaan')
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
                                        @if (isset($datakesehatan->bayiu16))
                                        {{ $datakesehatan->bayiu16 }}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                    @error('valKondisipekerjaan')
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
