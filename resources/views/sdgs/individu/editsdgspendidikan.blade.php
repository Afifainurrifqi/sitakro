 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT PENDIDIKAN {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('pendidikan.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">

                            <form class="form-valide" action="{{ route('pendidikan.update') }}" method="POST" id="form-edit-pendidikan">
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
                                    <label class="col-lg-4 col-form-label" for="valpendidikan_tertinggi"> Pendidikan
                                        Tertinggi<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valpendidikan_tertinggi') is-invalid @enderror"
                                            id="valpendidikan_tertinggi" name="valpendidikan_tertinggi">
                                            <option value="Tidak sekolah"
                                                {{ old('valpendidikan_tertinggi') == 'Tidak sekolah' || (isset($datasdgspendidikan) && $datasdgspendidikan->pendidikan_tertinggi == 'Tidak sekolah') ? 'selected' : '' }}>
                                                Tidak sekolah</option>
                                            <option value="SD dan sederajat"
                                                {{ old('valpendidikan_tertinggi') == 'SD dan sederajat' || (isset($datasdgspendidikan) && $datasdgspendidikan->pendidikan_tertinggi == 'SD dan sederajat') ? 'selected' : '' }}>
                                                SD dan sederajat</option>
                                            <option value="SMP dan sederajat"
                                                {{ old('valpendidikan_tertinggi') == 'SMP dan sederajat' || (isset($datasdgspendidikan) && $datasdgspendidikan->pendidikan_tertinggi == 'SMP dan sederajat') ? 'selected' : '' }}>
                                                SMP dan sederajat</option>
                                            <option value="SMA dan sederajat"
                                                {{ old('valpendidikan_tertinggi') == 'SMA dan sederajat' || (isset($datasdgspendidikan) && $datasdgspendidikan->pendidikan_tertinggi == 'SMA dan sederajat') ? 'selected' : '' }}>
                                                SMA dan sederajat</option>
                                            <option value="DIPLOMA I - III"
                                                {{ old('valpendidikan_tertinggi') == 'DIPLOMA I - III' || (isset($datasdgspendidikan) && $datasdgspendidikan->pendidikan_tertinggi == 'DIPLOMA I - III') ? 'selected' : '' }}>
                                                DIPLOMA I - III</option>
                                            <option value="S-1 dan sederajat"
                                                {{ old('valpendidikan_tertinggi') == 'S-1 dan sederajat' || (isset($datasdgspendidikan) && $datasdgspendidikan->pendidikan_tertinggi == 'S-1 dan sederajat') ? 'selected' : '' }}>
                                                S-1 dan sederajat</option>
                                            <option value="S-2 dan sederajat"
                                                {{ old('valpendidikan_tertinggi') == 'S-2 dan sederajat' || (isset($datasdgspendidikan) && $datasdgspendidikan->pendidikan_tertinggi == 'S-2 dan sederajat') ? 'selected' : '' }}>
                                                S-2 dan sederajat</option>
                                            <option value="S-3 dan sederajat"
                                                {{ old('valpendidikan_tertinggi') == 'S-3 dan sederajat' || (isset($datasdgspendidikan) && $datasdgspendidikan->pendidikan_tertinggi == 'S-3 dan sederajat') ? 'selected' : '' }}>
                                                S-3 dan sederajat</option>
                                            <option value="Pesantren, Seminari, Wihara, dan sejenisnya"
                                                {{ old('valpendidikan_tertinggi') == 'Pesantren, Seminari, Wihara, dan sejenisnya' || (isset($datasdgspendidikan) && $datasdgspendidikan->pendidikan_tertinggi == 'Pesantren, Seminari, Wihara, dan sejenisnya') ? 'selected' : '' }}>
                                                Pesantren, Seminari, Wihara, dan sejenisnya</option>
                                            <option value="Lainnya"
                                                {{ old('valpendidikan_tertinggi') == 'Lainnya' || (isset($datasdgspendidikan) && $datasdgspendidikan->pendidikan_tertinggi == 'Lainnya') ? 'selected' : '' }}>
                                                Lainnya</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valberapa_tahunp">Berapa Tahun mengenyam
                                        pendidikan dasar (SD,SMP,SMA) <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $datasdgspendidikan->berapa_tahunp ?? '' }}"
                                            class="form-control @error('valberapa_tahunp') is-invalid @enderror"
                                            id="valberapa_tahunp" name="valberapa_tahunp" placeholder="Berapa kali...">
                                        @error('valberapa_tahunp')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpendidikan_diikuti">Pendidikan yang
                                        sedang di ikuti<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $datasdgspendidikan->pendidikan_diikuti ?? '' }}"
                                            class="form-control @error('valpendidikan_diikuti') is-invalid @enderror"
                                            id="valpendidikan_diikuti" name="valpendidikan_diikuti"
                                            placeholder="Pendidikan yang sedang diikuti....">
                                        @error('valpendidikan_diikuti')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valbahasa_Rumah">Bahasa yang digunakan di
                                        Rumah dan Pemukiman<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $datasdgspendidikan->bahasa_Rumah ?? '' }}"
                                            class="form-control @error('valbahasa_Rumah') is-invalid @enderror"
                                            id="valbahasa_Rumah" name="valbahasa_Rumah" placeholder="Tulis bahasa...">
                                        @error('valbahasa_Rumah')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valbahasa_Formal">Bahasa yang digunakan di
                                        Lembaga Formal<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $datasdgspendidikan->bahasa_Formal ?? '' }}"
                                            class="form-control @error('valbahasa_Formal') is-invalid @enderror"
                                            id="valbahasa_Formal" name="valbahasa_Formal" placeholder="Tulis bahasa....">
                                        @error('valbahasa_Formal')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlah_kerja1">Jumlah kerja bakti 1 tahun
                                        terakhir <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $datasdgspendidikan->jumlah_kerja1 ?? '' }}"
                                            class="form-control @error('valjumlah_kerja1') is-invalid @enderror"
                                            id="valjumlah_kerja1" name="valjumlah_kerja1" placeholder="berapa kali...">
                                        @error('valjumlah_kerja1')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valskamling">Siskamling 1 tahun terakhir
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $datasdgspendidikan->skamling1 ?? '' }}"
                                            class="form-control @error('valskamling') is-invalid @enderror"
                                            id="valskamling" name="valskamling" placeholder="berapa kali...">
                                        @error('valskamling')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpesta_rakyat1">Pesta Rakyat (Adat) 1
                                        tahun terakhir
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $datasdgspendidikan->pesta_rakyat1 ?? '' }}"
                                            class="form-control @error('valpesta_rakyat1') is-invalid @enderror"
                                            id="valpesta_rakyat1" name="valpesta_rakyat1" placeholder="berapa kali...">
                                        @error('valpesta_rakyat1')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valfrekuensiml">Frekuensi Melayat 1 tahun
                                        terakhir
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $datasdgspendidikan->frekuensiml ?? '' }}"
                                            class="form-control @error('valfrekuensiml') is-invalid @enderror"
                                            id="valfrekuensiml" name="valfrekuensiml" placeholder="berapa kali...">
                                        @error('valfrekuensiml')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valfrekuensib">Frekuensi besuk orang sakit
                                        1 tahun terakhir
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $datasdgspendidikan->frekuensib ?? '' }}"
                                            class="form-control @error('valfrekuensib') is-invalid @enderror"
                                            id="valfrekuensib" name="valfrekuensib" placeholder="berapa kali...">
                                        @error('valfrekuensib')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valfrekuensmn">Frekuensi menolong
                                        kecelakaan 1 tahun terakhir<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $datasdgspendidikan->frekuensimn ?? '' }}"
                                            class="form-control @error('valfrekuensmn') is-invalid @enderror"
                                            id="valfrekuensmn" name="valfrekuensmn" placeholder="berapa kali...">
                                        @error('valfrekuensmn')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valmendapatp1">Mendapatkan Pelayanan Desa
                                        1 tahun terakhir<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valmendapatp1') is-invalid @enderror" id="valmendapatp1" name="valmendapatp1">
                                            <option value="Iya" {{ old('valmendapatp1') == 'Iya' || (isset($datasdgspendidikan) && $datasdgspendidikan->mendapatp1 == 'Iya') ? 'selected' : '' }}>Iya</option>
                                            <option value="Tidak" {{ old('valmendapatp1') == 'Tidak' || (isset($datasdgspendidikan) && $datasdgspendidikan->mendapatp1 == 'Tidak') ? 'selected' : '' }}>Tidak</option>
                                        </select>

                                        @error('valmendapatp1')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valbagaiamanap">Bagaimana pelayanan desa
                                        yang diperoleh?
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $datasdgspendidikan->bagaiamanap ?? '' }}"
                                            class="form-control @error('valbagaiamanap') is-invalid @enderror"
                                            id="valbagaiamanap" name="valbagaiamanap" placeholder="Tulis alasan...">
                                        @error('valbagaiamanap')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpernahmasukan">Pernah menyampaikan
                                        masukan/saran kepada pihak Desa?

                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valpernahmasukan') is-invalid @enderror" id="valpernahmasukan" name="valpernahmasukan">
                                            <option value="Iya" {{ old('valpernahmasukan') == 'Iya' || (isset($datasdgspendidikan) && $datasdgspendidikan->pernahmasukan == 'Iya') ? 'selected' : '' }}>Iya</option>
                                            <option value="Tidak" {{ old('valpernahmasukan') == 'Tidak' || (isset($datasdgspendidikan) && $datasdgspendidikan->pernahmasukan == 'Tidak') ? 'selected' : '' }}>Tidak</option>
                                        </select>

                                        @error('valpernahmasukan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valketerbukaands">Bagaimana keterbukaan
                                        desa terhadap masukan?

                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $datasdgspendidikan->keterbukaands ?? '' }}"
                                            class="form-control @error('valketerbukaands') is-invalid @enderror"
                                            id="valketerbukaands" name="valketerbukaands" placeholder=" tuliskan alasan...">
                                        @error('valketerbukaands')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valbencana1">Terjadi Bencana 1 tahun
                                        terakhir

                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valbencana1') is-invalid @enderror" id="valbencana1" name="valbencana1">
                                            <option value="Iya" {{ old('valbencana1') == 'Iya' || (isset($datasdgspendidikan) && $datasdgspendidikan->bencana1 == 'Iya') ? 'selected' : '' }}>Iya</option>
                                            <option value="Tidak" {{ old('valbencana1') == 'Tidak' || (isset($datasdgspendidikan) && $datasdgspendidikan->bencana1 == 'Tidak') ? 'selected' : '' }}>Tidak</option>
                                        </select>

                                        @error('valbencana1')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valapakahb">Apakah anda terkena dampak
                                        bencana

                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valapakahb') is-invalid @enderror" id="valapakahb" name="valapakahb">
                                            <option value="Iya" {{ old('valapakahb') == 'Iya' || (isset($datasdgspendidikan) && $datasdgspendidikan->apakahb == 'Iya') ? 'selected' : '' }}>Iya</option>
                                            <option value="Tidak" {{ old('valapakahb') == 'Tidak' || (isset($datasdgspendidikan) && $datasdgspendidikan->apakahb == 'Tidak') ? 'selected' : '' }}>Tidak</option>
                                        </select>

                                        @error('valapakahb')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vvalapakahd">Apakah menerima pemenuhan
                                        Kebutuhan Dasar saat Bencana (makanan, pakaian, tempat tinggal)?

                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valapakahd') is-invalid @enderror" id="valapakahd" name="valapakahd">
                                            <option value="Iya" {{ old('valapakahd') == 'Iya' || (isset($datasdgspendidikan) && $datasdgspendidikan->apakahd == 'Iya') ? 'selected' : '' }}>Iya</option>
                                            <option value="Tidak" {{ old('valapakahd') == 'Tidak' || (isset($datasdgspendidikan) && $datasdgspendidikan->apakahd == 'Tidak') ? 'selected' : '' }}>Tidak</option>
                                        </select>

                                        @error('valapakahd')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valapakahp">Apakah ada penanganan
                                        psikososial keluarga terdampak bencana (penyuluhan/konseling/terapi)?

                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valapakahp') is-invalid @enderror" id="valapakahp" name="valapakahp">
                                            <option value="Iya" {{ old('valapakahp') == 'Iya' || (isset($datasdgspendidikan) && $datasdgspendidikan->apakahp == 'Iya') ? 'selected' : '' }}>Iya</option>
                                            <option value="Tidak" {{ old('valapakahp') == 'Tidak' || (isset($datasdgspendidikan) && $datasdgspendidikan->apakahp == 'Tidak') ? 'selected' : '' }}>Tidak</option>
                                        </select>

                                        @error('valapakahp')
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
            document.getElementById('form-edit-pendidikan').submit();
        });
    </script>

@endsection
