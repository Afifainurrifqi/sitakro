 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">EDIT DATA PEKERJAAN {{ $datap->nama }}</h1>
                    <button type="button" class="btn mb-1 btn-warning" onclick="window.location='{{ route('pekerjaan.index') }}'">Kembali
                     </button>
                     <br><br><br>
                    <div class="form-validation">

                        <form class="form-valide" action="{{ route('pekerjaan.update') }}" method="POST" id="form-edit-pekerjaan">
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
                                <label class="col-lg-4 col-form-label" for="valNama">Nama <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    {{ $datap->nama }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valKondisipekerjaan">KONDISI PEKERJAAN <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control @error('valKondisipekerjaan') is-invalid @enderror" id="valKondisipekerjaan" name="valKondisipekerjaan">
                                        <option value="Bersekolah" {{ (old('valKondisipekerjaan') == 'Bersekolah' || (isset($datapk) && $datapk->kondisi_pekerjaan == 'Bersekolah')) ? 'selected' : '' }}>Bersekolah</option>
                                        <option value="Ibu Rumah Tangga" {{ (old('valKondisipekerjaan') == 'Ibu Rumah Tangga' || (isset($datapk) && $datapk->kondisi_pekerjaan == 'Ibu Rumah Tangga')) ? 'selected' : '' }}>Ibu Rumah Tangga</option>
                                        <option value="Tidak Bekerja" {{ (old('valKondisipekerjaan') == 'Tidak Bekerja' || (isset($datapk) && $datapk->kondisi_pekerjaan == 'Tidak Bekerja')) ? 'selected' : '' }}>Tidak Bekerja</option>
                                        <option value="Sedang Mencari Pekerjaan" {{ (old('valKondisipekerjaan') == 'Sedang Mencari Pekerjaan' || (isset($datapk) && $datapk->kondisi_pekerjaan == 'Sedang Mencari Pekerjaan')) ? 'selected' : '' }}>Sedang Mencari Pekerjaan</option>
                                        <option value="Bekerja" {{ (old('valKondisipekerjaan') == 'Bekerja' || (isset($datapk) && $datapk->kondisi_pekerjaan == 'Bekerja')) ? 'selected' : '' }}>Bekerja</option>
                                    </select>
                                    @error('valKondisipekerjaan')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valPekerjaanutama">PEKERJAAN UTAMA <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control @error('valPekerjaanutama') is-invalid @enderror" id="valPekerjaanutama" name="valPekerjaanutama">
                                        <option value="BELUM/TIDAK BEKERJA" {{ old('valPekerjaanutama') == 'BELUM/TIDAK BEKERJA' || (isset($datapk) && $datapk->pekerjaan_utama == 'BELUM/TIDAK BEKERJA') ? 'selected' : '' }}>BELUM/TIDAK BEKERJA</option>
                                        <option value="PELAJAR/MAHASISWA" {{ old('valPekerjaanutama') == 'PELAJAR/MAHASISWA' || (isset($datapk) && $datapk->pekerjaan_utama == 'PELAJAR/MAHASISWA') ? 'selected' : '' }}>PELAJAR/MAHASISWA</option>
                                        <option value="TIDAK/BELUM SEKOLAH" {{ old('valPekerjaanutama') == 'TIDAK/BELUM SEKOLAH' || (isset($datapk) && $datapk->pekerjaan_utama == 'TIDAK/BELUM SEKOLAH') ? 'selected' : '' }}>TIDAK/BELUM SEKOLAH</option>
                                        <option value="KARYAWAN SWASTA" {{ old('valPekerjaanutama') == 'KARYAWAN SWASTA' || (isset($datapk) && $datapk->pekerjaan_utama == 'KARYAWAN SWASTA') ? 'selected' : '' }}>KARYAWAN SWASTA</option>
                                        <option value="IBU RUMAH TANGGA" {{ old('valPekerjaanutama') == 'IBU RUMAH TANGGA' || (isset($datapk) && $datapk->pekerjaan_utama == 'IBU RUMAH TANGGA') ? 'selected' : '' }}>IBU RUMAH TANGGA</option>
                                        <option value="WIRASWASTA" {{ old('valPekerjaanutama') == 'WIRASWASTA' || (isset($datapk) && $datapk->pekerjaan_utama == 'WIRASWASTA') ? 'selected' : '' }}>WIRASWASTA</option>
                                        <option value="PETANI/PEKEBUN PEMILIK LAHAN" {{ old('valPekerjaanutama') == 'PETANI/PEKEBUN PEMILIK LAHAN' || (isset($datapk) && $datapk->pekerjaan_utama == 'PETANI/PEKEBUN PEMILIK LAHAN') ? 'selected' : '' }}>PETANI/PEKEBUN PEMILIK LAHAN</option>
                                        <option value="BURUH TANI/PERKEBUNAN" {{ old('valPekerjaanutama') == 'BURUH TANI/PERKEBUNAN' || (isset($datapk) && $datapk->pekerjaan_utama == 'BURUH TANI/PERKEBUNAN') ? 'selected' : '' }}>BURUH TANI/PERKEBUNAN</option>
                                        <option value="PEDAGANG" {{ old('valPekerjaanutama') == 'PEDAGANG' || (isset($datapk) && $datapk->pekerjaan_utama == 'PEDAGANG') ? 'selected' : '' }}>PEDAGANG</option>
                                        <option value="PEGAWAI NEGERI SIPIL (PNS)" {{ old('valPekerjaanutama') == 'PEGAWAI NEGERI SIPIL (PNS)' || (isset($datapk) && $datapk->pekerjaan_utama == 'PEGAWAI NEGERI SIPIL (PNS)') ? 'selected' : '' }}>PEGAWAI NEGERI SIPIL (PNS)</option>
                                        <option value="BURUH HARIAN LEPAS" {{ old('valPekerjaanutama') == 'BURUH HARIAN LEPAS' || (isset($datapk) && $datapk->pekerjaan_utama == 'BURUH HARIAN LEPAS') ? 'selected' : '' }}>BURUH HARIAN LEPAS</option>
                                        <option value="SOPIR" {{ old('valPekerjaanutama') == 'SOPIR' || (isset($datapk) && $datapk->pekerjaan_utama == 'SOPIR') ? 'selected' : '' }}>SOPIR</option>
                                        <option value="KARYAWAN BUMN" {{ old('valPekerjaanutama') == 'KARYAWAN BUMN' || (isset($datapk) && $datapk->pekerjaan_utama == 'KARYAWAN BUMN') ? 'selected' : '' }}>KARYAWAN BUMN</option>
                                        <option value="TENTARA NASIONAL INDONESIA (TNI)" {{ old('valPekerjaanutama') == 'TENTARA NASIONAL INDONESIA (TNI)' || (isset($datapk) && $datapk->pekerjaan_utama == 'TENTARA NASIONAL INDONESIA (TNI)') ? 'selected' : '' }}>TENTARA NASIONAL INDONESIA (TNI)</option>
                                        <option value="PENSIUNAN" {{ old('valPekerjaanutama') == 'PENSIUNAN' || (isset($datapk) && $datapk->pekerjaan_utama == 'PENSIUNAN') ? 'selected' : '' }}>PENSIUNAN</option>
                                        <option value="GURU" {{ old('valPekerjaanutama') == 'GURU' || (isset($datapk) && $datapk->pekerjaan_utama == 'GURU') ? 'selected' : '' }}>GURU</option>
                                        <option value="PEMBANTU RUMAH TANGGA" {{ old('valPekerjaanutama') == 'PEMBANTU RUMAH TANGGA' || (isset($datapk) && $datapk->pekerjaan_utama == 'PEMBANTU RUMAH TANGGA') ? 'selected' : '' }}>PEMBANTU RUMAH TANGGA</option>
                                        <option value="BURUH PETERNAKAN" {{ old('valPekerjaanutama') == 'BURUH PETERNAKAN' || (isset($datapk) && $datapk->pekerjaan_utama == 'BURUH PETERNAKAN') ? 'selected' : '' }}>BURUH PETERNAKAN</option>
                                        <option value="DOSEN" {{ old('valPekerjaanutama') == 'DOSEN' || (isset($datapk) && $datapk->pekerjaan_utama == 'DOSEN') ? 'selected' : '' }}>DOSEN</option>
                                        <option value="KONSTRUKSI" {{ old('valPekerjaanutama') == 'KONSTRUKSI' || (isset($datapk) && $datapk->pekerjaan_utama == 'KONSTRUKSI') ? 'selected' : '' }}>KONSTRUKSI</option>
                                        <option value="PELAUT" {{ old('valPekerjaanutama') == 'PELAUT' || (isset($datapk) && $datapk->pekerjaan_utama == 'PELAUT') ? 'selected' : '' }}>PELAUT</option>
                                        <option value="NELAYAN" {{ old('valPekerjaanutama') == 'NELAYAN' || (isset($datapk) && $datapk->pekerjaan_utama == 'NELAYAN') ? 'selected' : '' }}>NELAYAN</option>
                                        <option value="KARYAWAN HONORER" {{ old('valPekerjaanutama') == 'KARYAWAN HONORER' || (isset($datapk) && $datapk->pekerjaan_utama == 'KARYAWAN HONORER') ? 'selected' : '' }}>KARYAWAN HONORER</option>
                                        <option value="KEPOLISIAN RI (POLRI)" {{ old('valPekerjaanutama') == 'KEPOLISIAN RI (POLRI)' || (isset($datapk) && $datapk->pekerjaan_utama == 'KEPOLISIAN RI (POLRI)') ? 'selected' : '' }}>KEPOLISIAN RI (POLRI)</option>
                                        <option value="PERAWAT" {{ old('valPekerjaanutama') == 'PERAWAT' || (isset($datapk) && $datapk->pekerjaan_utama == 'PERAWAT') ? 'selected' : '' }}>PERAWAT</option>
                                        <option value="PETERNAK" {{ old('valPekerjaanutama') == 'PETERNAK' || (isset($datapk) && $datapk->pekerjaan_utama == 'PETERNAK') ? 'selected' : '' }}>PETERNAK</option>
                                        <option value="BIDAN" {{ old('valPekerjaanutama') == 'BIDAN' || (isset($datapk) && $datapk->pekerjaan_utama == 'BIDAN') ? 'selected' : '' }}>BIDAN</option>
                                        <option value="MEKANIK" {{ old('valPekerjaanutama') == 'MEKANIK' || (isset($datapk) && $datapk->pekerjaan_utama == 'MEKANIK') ? 'selected' : '' }}>MEKANIK</option>
                                        <option value="PENATA RIAS" {{ old('valPekerjaanutama') == 'PENATA RIAS' || (isset($datapk) && $datapk->pekerjaan_utama == 'PENATA RIAS') ? 'selected' : '' }}>PENATA RIAS</option>
                                        <option value="TUKANG LAS/PANDAI BESI" {{ old('valPekerjaanutama') == 'TUKANG LAS/PANDAI BESI' || (isset($datapk) && $datapk->pekerjaan_utama == 'TUKANG LAS/PANDAI BESI') ? 'selected' : '' }}>TUKANG LAS/PANDAI BESI</option>
                                        <option value="INDUSTRI" {{ old('valPekerjaanutama') == 'INDUSTRI' || (isset($datapk) && $datapk->pekerjaan_utama == 'INDUSTRI') ? 'selected' : '' }}>INDUSTRI</option>
                                        <option value="USTADZ/MUBALIGH" {{ old('valPekerjaanutama') == 'USTADZ/MUBALIGH' || (isset($datapk) && $datapk->pekerjaan_utama == 'USTADZ/MUBALIGH') ? 'selected' : '' }}>USTADZ/MUBALIGH</option>
                                        <option value="TABIB" {{ old('valPekerjaanutama') == 'TABIB' || (isset($datapk) && $datapk->pekerjaan_utama == 'TABIB') ? 'selected' : '' }}>TABIB</option>
                                        <option value="BURUH NELAYAN/PERIKANAN" {{ old('valPekerjaanutama') == 'BURUH NELAYAN/PERIKANAN' || (isset($datapk) && $datapk->pekerjaan_utama == 'BURUH NELAYAN/PERIKANAN') ? 'selected' : '' }}>BURUH NELAYAN/PERIKANAN</option>
                                        <option value="JURU MASAK" {{ old('valPekerjaanutama') == 'JURU MASAK' || (isset($datapk) && $datapk->pekerjaan_utama == 'JURU MASAK') ? 'selected' : '' }}>JURU MASAK</option>
                                        <option value="PERANGKAT DESA" {{ old('valPekerjaanutama') == 'PERANGKAT DESA' || (isset($datapk) && $datapk->pekerjaan_utama == 'PERANGKAT DESA') ? 'selected' : '' }}>PERANGKAT DESA</option>
                                        <option value="KEPALA DESA" {{ old('valPekerjaanutama') == 'KEPALA DESA' || (isset($datapk) && $datapk->pekerjaan_utama == 'KEPALA DESA') ? 'selected' : '' }}>KEPALA DESA</option>
                                        <option value="SENIMAN" {{ old('valPekerjaanutama') == 'SENIMAN' || (isset($datapk) && $datapk->pekerjaan_utama == 'SENIMAN') ? 'selected' : '' }}>SENIMAN</option>
                                        <option value="AKUNTAN" {{ old('valPekerjaanutama') == 'AKUNTAN' || (isset($datapk) && $datapk->pekerjaan_utama == 'AKUNTAN') ? 'selected' : '' }}>AKUNTAN</option>
                                        <option value="DOKTER" {{ old('valPekerjaanutama') == 'DOKTER' || (isset($datapk) && $datapk->pekerjaan_utama == 'DOKTER') ? 'selected' : '' }}>DOKTER</option>
                                        <option value="Petani/Pekebun penyewa" {{ old('valPekerjaanutama') == 'Petani/Pekebun penyewa' || (isset($datapk) && $datapk->pekerjaan_utama == 'Petani/Pekebun penyewa') ? 'selected' : '' }}>Petani/Pekebun penyewa</option>Petani/Pekebun penyewa
                                        <option value="Guru agama" {{ old('valPekerjaanutama') == 'Guru agama' || (isset($datapk) && $datapk->pekerjaan_utama == 'Guru agama') ? 'selected' : '' }}>Guru agama</option>
                                        <option value="Pegawai Kantor Desa" {{ old('valPekerjaanutama') == 'Pegawai Kantor Desa' || (isset($datapk) && $datapk->pekerjaan_utama == 'Pegawai Kantor Desa') ? 'selected' : '' }}>Pegawai Kantor Desa</option>
                                        <option value="TKI" {{ old('valPekerjaanutama') == 'TKI' || (isset($datapk) && $datapk->pekerjaan_utama == 'TKI') ? 'selected' : '' }}>TKI</option>
                                        <option value="LAINNYA" {{ old('valPekerjaanutama') == 'LAINNYA' || (isset($datapk) && $datapk->pekerjaan_utama == 'LAINNYA') ? 'selected' : '' }}>LAINNYA</option>

                                    </select>



                                    @error('valPekerjaanutama')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valJaminanketenagakerjaan">JAMINAN SOSISAL KETENAGAKERJAAN <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control @error('valJaminanketenagakerjaan') is-invalid @enderror" id="valJaminanketenagakerjaan" name="valJaminanketenagakerjaan">
                                        <option value="Peserta" {{ (old('valJaminanketenagakerjaan') == 'Peserta' || (isset($datapk) && $datapk->jaminan_sosial_ketenagakerjaan == 'Peserta')) ? 'selected' : '' }}>Peserta</option>
                                        <option value="Bukan peserta" {{ (old('valJaminanketenagakerjaan') == 'Bukan peserta' || (isset($datapk) && $datapk->jaminan_sosial_ketenagakerjaan == 'Bukan peserta')) ? 'selected' : '' }}>Bukan peserta</option>
                                    </select>
                                    @error('valJaminanketenagakerjaan')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valPenghasilansetahun">PENGHASILAN SETAHUN TERKAHIR <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $datapk->penghasilan_setahun_terakhir ?? '' }}"
                                    class="form-control @error('valPenghasilansetahun') is-invalid @enderror"
                                    id="valPenghasilansetahun" name="valPenghasilansetahun" placeholder="Tulis Nominalny"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    @error('valPenghasilansetahun')
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
        document.getElementById('form-edit-pekerjaan').submit();
    });
</script>

@endsection
