 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT SARANA EKONOMI
                            <h1  class="card-title"> RT : {{ $datart->rt }}</h1> <h1 class="card-title"> RW :  {{ $datart->rw }}</h1></h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rtsare.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rtsare.update') }}" method="POST" id="form-edit-rtsare">
                                @csrf
                                <div class="form-group row" >
                                    <label class="col-lg-4 col-form-label" for="valnik">NIK <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="hidden" value="{{ old('valnik', $datart->nik) }}" class="form-control @error('valnik') is-invalid @enderror" id="valnik" name="valnik" placeholder="Nama Lengkap...">
                                        <div class="col-lg-6">
                                            {{ $datart->nik }}
                                        </div>
                                        @error('valnik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valnama_ketuart">Nama Ketua RT <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="hidden" value="{{ old('valnama_ketuart', $datart->nama) }}" class="form-control @error('valnama_ketuart') is-invalid @enderror" id="valnama_ketuart" name="valnama_ketuart" placeholder="Nama Lengkap...">
                                        <div class="col-lg-6">
                                            {{ $datart->nama }}
                                        </div>
                                        @error('valnama_ketuart')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valalamat">ALAMAT<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input value="{{ old('valnama_ketuart', $datart->alamat) }}" type="hidden"
                                            class="form-control @error('valalamat') is-invalid @enderror" id="valalamat"
                                            name="valalamat" placeholder="Alamat...">
                                            <div class="col-lg-6">
                                                {{ $datart->alamat }}
                                            </div>
                                        @error('valalamat')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valrt">RT<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input value="{{ old('valnama_ketuart', $datart->rt) }}" type="hidden"
                                            class="form-control @error('valrt') is-invalid @enderror" id="valrt"
                                            name="valrt" placeholder="RT...">
                                            <div class="col-lg-6">
                                                {{ $datart->rt }}
                                            </div>
                                        @error('valrt')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valrw">RW <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input value="{{ old('valnama_ketuart', $datart->rw) }}" type="hidden"
                                            class="form-control @error('valrw') is-invalid @enderror" id="valrw"
                                            name="valrw" placeholder="RW..">
                                            <div class="col-lg-6">
                                                {{ $datart->rw }}
                                            </div>
                                        @error('valrw')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valnohp">NO HP <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input value="{{ old('valnama_ketuart', $datart->nohp) }}" type="hidden"
                                            class="form-control @error('valnohp') is-invalid @enderror" id="valnohp"
                                            name="valnohp" placeholder="RW..">
                                            <div class="col-lg-6">
                                                {{ $datart->nohp }}
                                            </div>
                                        @error('valnohp')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KELOMPOK PERTOKOAN (MINIMAL 10 TOKO DAN MENGELOMPOK DALAM SATU LOKASI)

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_toko">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_toko ?? '' }}"
                                                class="form-control @error('valjumlah_toko') is-invalid @enderror"
                                                id="valjumlah_toko" name="valjumlah_toko" placeholder="Jumlah...">
                                            @error('valjumlah_toko')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_toko">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_toko') is-invalid @enderror"
                                            id="valkondisi_toko" name="valkondisi_toko">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_toko') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_toko == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_toko') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_toko == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_toko') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_toko == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_toko') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_toko == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_toko')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_toko">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_toko ?? '' }}"
                                                class="form-control @error('valJarak_toko') is-invalid @enderror"
                                                id="valJarak_toko" name="valJarak_toko" placeholder="Jumlah...">
                                            @error('valJarak_toko')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_toko">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_toko') is-invalid @enderror"
                                            id="valkemudahan_toko" name="valkemudahan_toko">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_toko') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_toko == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_toko') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_toko == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_toko') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_toko == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_toko') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_toko == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_toko')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PASAR DENGAN BANGUNAN PERMANEN MEMILIKI ATAP, LANTAI, DAN DINDING
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_pasar_permanen">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_pasar_permanen ?? '' }}"
                                                class="form-control @error('valjumlah_pasar_permanen') is-invalid @enderror"
                                                id="valjumlah_pasar_permanen" name="valjumlah_pasar_permanen" placeholder="Jumlah...">
                                            @error('valjumlah_pasar_permanen')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_pasar_permanen">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_pasar_permanen') is-invalid @enderror"
                                            id="valkondisi_pasar_permanen" name="valkondisi_pasar_permanen">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_pasar_permanen') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_pasar_permanen == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_pasar_permanen') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_pasar_permanen == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_pasar_permanen') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_pasar_permanen == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_pasar_permanen') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_pasar_permanen == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_pasar_permanen')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_pasar_permanen">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_pasar_permanen ?? '' }}"
                                                class="form-control @error('valJarak_pasar_permanen') is-invalid @enderror"
                                                id="valJarak_pasar_permanen" name="valJarak_pasar_permanen" placeholder="Jumlah...">
                                            @error('valJarak_pasar_permanen')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_pasar_permanen">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_pasar_permanen') is-invalid @enderror"
                                            id="valkemudahan_pasar_permanen" name="valkemudahan_pasar_permanen">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_pasar_permanen') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_pasar_permanen == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_pasar_permanen') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_pasar_permanen == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_pasar_permanen') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_pasar_permanen == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_pasar_permanen') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_pasar_permanen == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_pasar_permanen')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PASAR DENGAN BANGUNAN SEMI PERMANEN MEMILIKI ATAP DAN LANTAI TANPA DINDING
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_semip">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_semip ?? '' }}"
                                                class="form-control @error('valjumlah_semip') is-invalid @enderror"
                                                id="valjumlah_semip" name="valjumlah_semip" placeholder="Jumlah...">
                                            @error('valjumlah_semip')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_semip">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_semip') is-invalid @enderror"
                                            id="valkondisi_semip" name="valkondisi_semip">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_semip') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_semip == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_semip') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_semip == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_semip') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_semip == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_semip') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_semip == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>
                                            @error('valkondisi_semip')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_semip">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_semip ?? '' }}"
                                                class="form-control @error('valJarak_semip') is-invalid @enderror"
                                                id="valJarak_semip" name="valJarak_semip" placeholder="Jumlah...">
                                            @error('valJarak_semip')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_semip">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_semip') is-invalid @enderror"
                                            id="valkemudahan_semip" name="valkemudahan_semip">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_semip') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_semip == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_semip') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_semip == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_semip') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_semip == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_semip') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_semip == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_semip')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PASAR TANPA BANGUNAN (MISALNYA : PASAR SUBUH, PASAR TERAPUNG)
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_tanpap">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_tanpap ?? '' }}"
                                                class="form-control @error('valjumlah_tanpap') is-invalid @enderror"
                                                id="valjumlah_tanpap" name="valjumlah_tanpap" placeholder="Jumlah...">
                                            @error('valjumlah_tanpap')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_tanpap">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_tanpap') is-invalid @enderror"
                                            id="valkondisi_tanpap" name="valkondisi_tanpap">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_tanpap') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_tanpap == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_tanpap') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_tanpap == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_tanpap') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_tanpap == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_tanpap') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_tanpap == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_tanpap')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_tanpap">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_tanpap ?? '' }}"
                                                class="form-control @error('valJarak_tanpap') is-invalid @enderror"
                                                id="valJarak_tanpap" name="valJarak_tanpap" placeholder="Jumlah...">
                                            @error('valJarak_tanpap')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_tanpap">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_tanpap') is-invalid @enderror"
                                            id="valkemudahan_tanpap" name="valkemudahan_tanpap">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_tanpap') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_tanpap == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_tanpap') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_tanpap == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_tanpap') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_tanpap == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_tanpap') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_tanpap == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_tanpap')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">JUMLAH MINIMARKET / SWALAYAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_minimarket">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_minimarket ?? '' }}"
                                                class="form-control @error('valjumlah_minimarket') is-invalid @enderror"
                                                id="valjumlah_minimarket" name="valjumlah_minimarket" placeholder="Jumlah...">
                                            @error('valjumlah_minimarket')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_minimarket">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_minimarket') is-invalid @enderror"
                                            id="valkondisi_minimarket" name="valkondisi_minimarket">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_minimarket') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_minimarket == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_minimarket') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_minimarket == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_minimarket') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_minimarket == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_minimarket') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_minimarket == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_minimarket')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_minimarket">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_minimarket ?? '' }}"
                                                class="form-control @error('valJarak_minimarket') is-invalid @enderror"
                                                id="valJarak_minimarket" name="valJarak_minimarket" placeholder="Jumlah...">
                                            @error('valJarak_minimarket')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_minimarket">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_minimarket') is-invalid @enderror"
                                            id="valkemudahan_minimarket" name="valkemudahan_minimarket">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_minimarket') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_minimarket == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_minimarket') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_minimarket == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_minimarket') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_minimarket == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_minimarket') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_minimarket == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_minimarket')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">TOKO / WARUNG KELONTONG

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_warungk">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_warungk ?? '' }}"
                                                class="form-control @error('valjumlah_warungk') is-invalid @enderror"
                                                id="valjumlah_warungk" name="valjumlah_warungk" placeholder="Jumlah...">
                                            @error('valjumlah_warungk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_warungk">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_warungk') is-invalid @enderror"
                                            id="valkondisi_warungk" name="valkondisi_warungk">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_warungk') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_warungk == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_warungk') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_warungk == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_warungk') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_warungk == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_warungk') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_warungk == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_warungk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_warungk">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_warungk ?? '' }}"
                                                class="form-control @error('valJarak_warungk') is-invalid @enderror"
                                                id="valJarak_warungk" name="valJarak_warungk" placeholder="Jumlah...">
                                            @error('valJarak_warungk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_warungk">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_warungk') is-invalid @enderror"
                                            id="valkemudahan_warungk" name="valkemudahan_warungk">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_warungk') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_warungk == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_warungk') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_warungk == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_warungk') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_warungk == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_warungk') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_warungk == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_warungk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">TOKO / WARUNG KELONTONG YANG MENJUAL BAHAN PANGAN


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_warungp">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_warungp ?? '' }}"
                                                class="form-control @error('valjumlah_warungp') is-invalid @enderror"
                                                id="valjumlah_warungp" name="valjumlah_warungp" placeholder="Jumlah...">
                                            @error('valjumlah_warungp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_warungp">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_warungp') is-invalid @enderror"
                                            id="valkondisi_warungp" name="valkondisi_warungp">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_warungp') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_warungp == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_warungp') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_warungp == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_warungp') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_warungp == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_warungp') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_warungp == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_warungp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_warungp">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_warungp ?? '' }}"
                                                class="form-control @error('valJarak_warungp') is-invalid @enderror"
                                                id="valJarak_warungp" name="valJarak_warungp" placeholder="Jumlah...">
                                            @error('valJarak_warungp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_warungp">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_warungp') is-invalid @enderror"
                                            id="valkemudahan_warungp" name="valkemudahan_warungp">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_warungp') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_warungp == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_warungp') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_warungp == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_warungp') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_warungp == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_warungp') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_warungp == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_warungp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">RESTORAN / RUMAH MAKAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_restoran">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_restoran ?? '' }}"
                                                class="form-control @error('valjumlah_restoran') is-invalid @enderror"
                                                id="valjumlah_restoran" name="valjumlah_restoran" placeholder="Jumlah...">
                                            @error('valjumlah_restoran')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_restoran">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_restoran') is-invalid @enderror"
                                            id="valkondisi_restoran" name="valkondisi_restoran">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_restoran') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_restoran == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_restoran') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_restoran == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_restoran') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_restoran == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_restoran') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_restoran == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_restoran')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_restoran">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_restoran ?? '' }}"
                                                class="form-control @error('valJarak_restoran') is-invalid @enderror"
                                                id="valJarak_restoran" name="valJarak_restoran" placeholder="Jumlah...">
                                            @error('valJarak_restoran')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_restoran">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_restoran') is-invalid @enderror"
                                            id="valkemudahan_restoran" name="valkemudahan_restoran">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_restoran') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_restoran == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_restoran') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_restoran == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_restoran') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_restoran == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_restoran') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_restoran == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_restoran')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">WARUNG / KEDAI MAKANAN MINUMAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_kedaim">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_kedaim ?? '' }}"
                                                class="form-control @error('valjumlah_kedaim') is-invalid @enderror"
                                                id="valjumlah_kedaim" name="valjumlah_kedaim" placeholder="Jumlah...">
                                            @error('valjumlah_kedaim')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_kedaim">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_kedaim') is-invalid @enderror"
                                            id="valkondisi_kedaim" name="valkondisi_kedaim">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_kedaim') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_kedaim == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_kedaim') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_kedaim == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_kedaim') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_kedaim == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_kedaim') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_kedaim == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_kedaim')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_kedaim">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_kedaim ?? '' }}"
                                                class="form-control @error('valJarak_kedaim') is-invalid @enderror"
                                                id="valJarak_kedaim" name="valJarak_kedaim" placeholder="Jumlah...">
                                            @error('valJarak_kedaim')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_kedaim">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_kedaim') is-invalid @enderror"
                                            id="valkemudahan_kedaim" name="valkemudahan_kedaim">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_kedaim') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_kedaim == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_kedaim') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_kedaim == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_kedaim') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_kedaim == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_kedaim') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_kedaim == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_kedaim')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">HOTEL
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_hotel">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_hotel ?? '' }}"
                                                class="form-control @error('valjumlah_hotel') is-invalid @enderror"
                                                id="valjumlah_hotel" name="valjumlah_hotel" placeholder="Jumlah...">
                                            @error('valjumlah_hotel')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_hotel">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_hotel') is-invalid @enderror"
                                            id="valkondisi_hotel" name="valkondisi_hotel">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_hotel') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_hotel == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_hotel') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_hotel == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_hotel') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_hotel == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_hotel') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_hotel == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_hotel')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_hotel">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_hotel ?? '' }}"
                                                class="form-control @error('valJarak_hotel') is-invalid @enderror"
                                                id="valJarak_hotel" name="valJarak_hotel" placeholder="Jumlah...">
                                            @error('valJarak_hotel')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_hotel">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_hotel') is-invalid @enderror"
                                            id="valkemudahan_hotel" name="valkemudahan_hotel">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_hotel') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_hotel == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_hotel') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_hotel == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_hotel') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_hotel == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_hotel') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_hotel == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_hotel')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PENGINAPAN : HOSTEL/MOTEL/LOSMEN/WISMA

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_hostel">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_hostel ?? '' }}"
                                                class="form-control @error('valjumlah_hostel') is-invalid @enderror"
                                                id="valjumlah_hostel" name="valjumlah_hostel" placeholder="Jumlah...">
                                            @error('valjumlah_hostel')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_hostel">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_hostel') is-invalid @enderror"
                                            id="valkondisi_hostel" name="valkondisi_hostel">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_hostel') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_hostel == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_hostel') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_hostel == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_hostel') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_hostel == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_hostel') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_hostel == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_hostel')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_hostel">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_hostel ?? '' }}"
                                                class="form-control @error('valJarak_hostel') is-invalid @enderror"
                                                id="valJarak_hostel" name="valJarak_hostel" placeholder="Jumlah...">
                                            @error('valJarak_hostel')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_hostel">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_hostel') is-invalid @enderror"
                                            id="valkemudahan_hostel" name="valkemudahan_hostel">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_hostel') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_hostel == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_hostel') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_hostel == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_hostel') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_hostel == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_hostel') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_hostel == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_hostel')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BENGKEL MOBIL/MOTOR

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bengkelm">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_bengkelm ?? '' }}"
                                                class="form-control @error('valjumlah_bengkelm') is-invalid @enderror"
                                                id="valjumlah_bengkelm" name="valjumlah_bengkelm" placeholder="Jumlah...">
                                            @error('valjumlah_bengkelm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bengkelm">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_bengkelm') is-invalid @enderror"
                                            id="valkondisi_bengkelm" name="valkondisi_bengkelm">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_bengkelm') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_bengkelm == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_bengkelm') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_bengkelm == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_bengkelm') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_bengkelm == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_bengkelm') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_bengkelm == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_bengkelm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bengkelm">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_bengkelm ?? '' }}"
                                                class="form-control @error('valJarak_bengkelm') is-invalid @enderror"
                                                id="valJarak_bengkelm" name="valJarak_bengkelm" placeholder="Jumlah...">
                                            @error('valJarak_bengkelm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bengkelm">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_bengkelm') is-invalid @enderror"
                                            id="valkemudahan_bengkelm" name="valkemudahan_bengkelm">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_bengkelm') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bengkelm == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_bengkelm') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bengkelm == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_bengkelm') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bengkelm == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_bengkelm') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bengkelm == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_bengkelm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SALON KECANTIKAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_salonk">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_salonk ?? '' }}"
                                                class="form-control @error('valjumlah_salonk') is-invalid @enderror"
                                                id="valjumlah_salonk" name="valjumlah_salonk" placeholder="Jumlah...">
                                            @error('valjumlah_salonk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_salonk">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_salonk') is-invalid @enderror"
                                            id="valkondisi_salonk" name="valkondisi_salonk">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_salonk') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_salonk == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_salonk') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_salonk == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_salonk') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_salonk == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_salonk') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_salonk == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_salonk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_salonk">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_salonk ?? '' }}"
                                                class="form-control @error('valJarak_salonk') is-invalid @enderror"
                                                id="valJarak_salonk" name="valJarak_salonk" placeholder="Jumlah...">
                                            @error('valJarak_salonk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_salonk">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_salonk') is-invalid @enderror"
                                            id="valkemudahan_salonk" name="valkemudahan_salonk">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_salonk') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_salonk == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_salonk') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_salonk == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_salonk') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_salonk == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_salonk') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_salonk == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_salonk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">AGEN TIKET / TRAVEL / BIRO PERJALANAN


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_agent">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_agent ?? '' }}"
                                                class="form-control @error('valjumlah_agent') is-invalid @enderror"
                                                id="valjumlah_agent" name="valjumlah_agent" placeholder="Jumlah...">
                                            @error('valjumlah_agent')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_agent">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_agent') is-invalid @enderror"
                                            id="valkondisi_agent" name="valkondisi_agent">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_agent') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_agent == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_agent') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_agent == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_agent') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_agent == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_agent') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_agent == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_agent')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_agent">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_agent ?? '' }}"
                                                class="form-control @error('valJarak_agent') is-invalid @enderror"
                                                id="valJarak_agent" name="valJarak_agent" placeholder="Jumlah...">
                                            @error('valJarak_agent')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_agent">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_agent') is-invalid @enderror"
                                            id="valkemudahan_agent" name="valkemudahan_agent">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_agent') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_agent == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_agent') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_agent == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_agent') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_agent == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_agent') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_agent == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_agent')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANK BRI


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bankbri">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_bankbri ?? '' }}"
                                                class="form-control @error('valjumlah_bankbri') is-invalid @enderror"
                                                id="valjumlah_bankbri" name="valjumlah_bankbri" placeholder="Jumlah...">
                                            @error('valjumlah_bankbri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bankbri">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_bankbri') is-invalid @enderror"
                                            id="valkondisi_bankbri" name="valkondisi_bankbri">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_bankbri') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_bankbri == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_bankbri') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_bankbri == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_bankbri') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_bankbri == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_bankbri') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_bankbri == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_bankbri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bankbri">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_bankbri ?? '' }}"
                                                class="form-control @error('valJarak_bankbri') is-invalid @enderror"
                                                id="valJarak_bankbri" name="valJarak_bankbri" placeholder="Jumlah...">
                                            @error('valJarak_bankbri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bankbri">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_bankbri') is-invalid @enderror"
                                            id="valkemudahan_bankbri" name="valkemudahan_bankbri">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_bankbri') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bankbri == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_bankbri') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bankbri == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_bankbri') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bankbri == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_bankbri') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bankbri == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_bankbri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">AGEN BRI


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_briag">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_briag ?? '' }}"
                                                class="form-control @error('valjumlah_briag') is-invalid @enderror"
                                                id="valjumlah_briag" name="valjumlah_briag" placeholder="Jumlah...">
                                            @error('valjumlah_briag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_briag">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_briag') is-invalid @enderror"
                                            id="valkondisi_briag" name="valkondisi_briag">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_briag') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_briag == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_briag') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_briag == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_briag') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_briag == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_briag') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_briag == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_briag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_briag">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_briag ?? '' }}"
                                                class="form-control @error('valJarak_briag') is-invalid @enderror"
                                                id="valJarak_briag" name="valJarak_briag" placeholder="Jumlah...">
                                            @error('valJarak_briag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_briag">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_briag') is-invalid @enderror"
                                            id="valkemudahan_briag" name="valkemudahan_briag">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_briag') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_briag == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_briag') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_briag == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_briag') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_briag == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_briag') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_briag == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_briag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANK BNI
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bankbni">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_bankbni ?? '' }}"
                                                class="form-control @error('valjumlah_bankbni') is-invalid @enderror"
                                                id="valjumlah_bankbni" name="valjumlah_bankbni" placeholder="Jumlah...">
                                            @error('valjumlah_bankbni')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bankbni">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_bankbni') is-invalid @enderror"
                                            id="valkondisi_bankbni" name="valkondisi_bankbni">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_bankbni') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_bankbni == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_bankbni') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_bankbni == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_bankbni') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_bankbni == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_bankbni') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_bankbni == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_bankbni')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bankbni">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_bankbni ?? '' }}"
                                                class="form-control @error('valJarak_bankbni') is-invalid @enderror"
                                                id="valJarak_bankbni" name="valJarak_bankbni" placeholder="Jumlah...">
                                            @error('valJarak_bankbni')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bankbni">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_bankbni') is-invalid @enderror"
                                            id="valkemudahan_bankbni" name="valkemudahan_bankbni">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_bankbni') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bankbni == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_bankbni') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bankbni == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_bankbni') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bankbni == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_bankbni') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bankbni == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_bankbni')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">AGEN BNI			                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bniag">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_bniag ?? '' }}"
                                                class="form-control @error('valjumlah_bniag') is-invalid @enderror"
                                                id="valjumlah_bniag" name="valjumlah_bniag" placeholder="Jumlah...">
                                            @error('valjumlah_bniag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bniag">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_bniag') is-invalid @enderror"
                                            id="valkondisi_bniag" name="valkondisi_bniag">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_bniag') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_bniag == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_bniag') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_bniag == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_bniag') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_bniag == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_bniag') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_bniag == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_bniag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bniag">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_bniag ?? '' }}"
                                                class="form-control @error('valJarak_bniag') is-invalid @enderror"
                                                id="valJarak_bniag" name="valJarak_bniag" placeholder="Jumlah...">
                                            @error('valJarak_bniag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bniag">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_bniag') is-invalid @enderror"
                                            id="valkemudahan_bniag" name="valkemudahan_bniag">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_bniag') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bniag == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_bniag') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bniag == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_bniag') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bniag == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_bniag') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bniag == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_bniag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANK MANDIRI

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bankmandiri">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_bankmandiri ?? '' }}"
                                                class="form-control @error('valjumlah_bankmandiri') is-invalid @enderror"
                                                id="valjumlah_bankmandiri" name="valjumlah_bankmandiri" placeholder="Jumlah...">
                                            @error('valjumlah_bankmandiri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bankmandiri">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_bankmandiri') is-invalid @enderror"
                                            id="valkondisi_bankmandiri" name="valkondisi_bankmandiri">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_bankmandiri') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_bankmandiri == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_bankmandiri') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_bankmandiri == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_bankmandiri') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_bankmandiri == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_bankmandiri') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_bankmandiri == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_bankmandiri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bankmandiri">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_bankmandiri ?? '' }}"
                                                class="form-control @error('valJarak_bankmandiri') is-invalid @enderror"
                                                id="valJarak_bankmandiri" name="valJarak_bankmandiri" placeholder="Jumlah...">
                                            @error('valJarak_bankmandiri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bankmandiri">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_bankmandiri') is-invalid @enderror"
                                            id="valkemudahan_bankmandiri" name="valkemudahan_bankmandiri">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_bankmandiri') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bankmandiri == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_bankmandiri') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bankmandiri == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_bankmandiri') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bankmandiri == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_bankmandiri') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bankmandiri == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_bankmandiri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">AGEN MANDIRI


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_mandiriag">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_mandiriag ?? '' }}"
                                                class="form-control @error('valjumlah_mandiriag') is-invalid @enderror"
                                                id="valjumlah_mandiriag" name="valjumlah_mandiriag" placeholder="Jumlah...">
                                            @error('valjumlah_mandiriag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_mandiriag">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_mandiriag') is-invalid @enderror"
                                            id="valkondisi_mandiriag" name="valkondisi_mandiriag">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_mandiriag') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_mandiriag == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_mandiriag') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_mandiriag == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_mandiriag') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_mandiriag == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_mandiriag') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_mandiriag == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_mandiriag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_mandiriag">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_mandiriag ?? '' }}"
                                                class="form-control @error('valJarak_mandiriag') is-invalid @enderror"
                                                id="valJarak_mandiriag" name="valJarak_mandiriag" placeholder="Jumlah...">
                                            @error('valJarak_mandiriag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_mandiriag">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_mandiriag') is-invalid @enderror"
                                            id="valkemudahan_mandiriag" name="valkemudahan_mandiriag">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_mandiriag') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_mandiriag == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_mandiriag') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_mandiriag == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_mandiriag') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_mandiriag == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_mandiriag') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_mandiriag == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_mandiriag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANK BPD

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bankbpd">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_bankbpd ?? '' }}"
                                                class="form-control @error('valjumlah_bankbpd') is-invalid @enderror"
                                                id="valjumlah_bankbpd" name="valjumlah_bankbpd" placeholder="Jumlah...">
                                            @error('valjumlah_bankbpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bankbpd">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_bankbpd') is-invalid @enderror"
                                            id="valkondisi_bankbpd" name="valkondisi_bankbpd">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_bankbpd') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_bankbpd == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_bankbpd') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_bankbpd == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_bankbpd') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_bankbpd == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_bankbpd') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_bankbpd == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_bankbpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bankbpd">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_bankbpd ?? '' }}"
                                                class="form-control @error('valJarak_bankbpd') is-invalid @enderror"
                                                id="valJarak_bankbpd" name="valJarak_bankbpd" placeholder="Jumlah...">
                                            @error('valJarak_bankbpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bankbpd">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_bankbpd') is-invalid @enderror"
                                            id="valkemudahan_bankbpd" name="valkemudahan_bankbpd">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_bankbpd') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bankbpd == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_bankbpd') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bankbpd == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_bankbpd') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bankbpd == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_bankbpd') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bankbpd == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_bankbpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">AGEN BPD


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bpdag">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_bpdag ?? '' }}"
                                                class="form-control @error('valjumlah_bpdag') is-invalid @enderror"
                                                id="valjumlah_bpdag" name="valjumlah_bpdag" placeholder="Jumlah...">
                                            @error('valjumlah_bpdag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bpdag">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_bpdag') is-invalid @enderror"
                                            id="valkondisi_bpdag" name="valkondisi_bpdag">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_bpdag') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_bpdag == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_bpdag') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_bpdag == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_bpdag') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_bpdag == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_bpdag') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_bpdag == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_bpdag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bpdag">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_bpdag ?? '' }}"
                                                class="form-control @error('valJarak_bpdag') is-invalid @enderror"
                                                id="valJarak_bpdag" name="valJarak_bpdag" placeholder="Jumlah...">
                                            @error('valJarak_bpdag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bpdag">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_bpdag') is-invalid @enderror"
                                            id="valkemudahan_bpdag" name="valkemudahan_bpdag">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_bpdag') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bpdag == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_bpdag') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bpdag == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_bpdag') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bpdag == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_bpdag') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bpdag == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_bpdag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANK UMUM PEMERINTAH LAINNYA
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bankumum">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_bankumum ?? '' }}"
                                                class="form-control @error('valjumlah_bankumum') is-invalid @enderror"
                                                id="valjumlah_bankumum" name="valjumlah_bankumum" placeholder="Jumlah...">
                                            @error('valjumlah_bankumum')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bankumum">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_bankumum') is-invalid @enderror"
                                            id="valkondisi_bankumum" name="valkondisi_bankumum">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_bankumum') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_bankumum == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_bankumum') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_bankumum == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_bankumum') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_bankumum == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_bankumum') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_bankumum == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_bankumum')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bankumum">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_bankumum ?? '' }}"
                                                class="form-control @error('valJarak_bankumum') is-invalid @enderror"
                                                id="valJarak_bankumum" name="valJarak_bankumum" placeholder="Jumlah...">
                                            @error('valJarak_bankumum')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bankumum">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_bankumum') is-invalid @enderror"
                                            id="valkemudahan_bankumum" name="valkemudahan_bankumum">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_bankumum') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bankumum == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_bankumum') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bankumum == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_bankumum') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bankumum == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_bankumum') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bankumum == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_bankumum')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANK BCA
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bankbca">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_bankbca ?? '' }}"
                                                class="form-control @error('valjumlah_bankbca') is-invalid @enderror"
                                                id="valjumlah_bankbca" name="valjumlah_bankbca" placeholder="Jumlah...">
                                            @error('valjumlah_bankbca')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bankbca">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_bankbca') is-invalid @enderror"
                                            id="valkondisi_bankbca" name="valkondisi_bankbca">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_bankbca') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_bankbca == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_bankbca') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_bankbca == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_bankbca') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_bankbca == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_bankbca') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_bankbca == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_bankbca')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bankbca">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_bankbca ?? '' }}"
                                                class="form-control @error('valJarak_bankbca') is-invalid @enderror"
                                                id="valJarak_bankbca" name="valJarak_bankbca" placeholder="Jumlah...">
                                            @error('valJarak_bankbca')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bankbca">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_bankbca') is-invalid @enderror"
                                            id="valkemudahan_bankbca" name="valkemudahan_bankbca">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_bankbca') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bankbca == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_bankbca') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bankbca == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_bankbca') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bankbca == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_bankbca') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bankbca == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_bankbca')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANK CIMB / NIAGA / MAYBANK


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bankcimb">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_bankcimb ?? '' }}"
                                                class="form-control @error('valjumlah_bankcimb') is-invalid @enderror"
                                                id="valjumlah_bankcimb" name="valjumlah_bankcimb" placeholder="Jumlah...">
                                            @error('valjumlah_bankcimb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bankcimb">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_bankcimb') is-invalid @enderror"
                                            id="valkondisi_bankcimb" name="valkondisi_bankcimb">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_bankcimb') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_bankcimb == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_bankcimb') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_bankcimb == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_bankcimb') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_bankcimb == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_bankcimb') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_bankcimb == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_bankcimb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bankcimb">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_bankcimb ?? '' }}"
                                                class="form-control @error('valJarak_bankcimb') is-invalid @enderror"
                                                id="valJarak_bankcimb" name="valJarak_bankcimb" placeholder="Jumlah...">
                                            @error('valJarak_bankcimb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bankcimb">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_bankcimb') is-invalid @enderror"
                                            id="valkemudahan_bankcimb" name="valkemudahan_bankcimb">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_bankcimb') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bankcimb == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_bankcimb') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bankcimb == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_bankcimb') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bankcimb == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_bankcimb') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bankcimb == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_bankcimb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANK SINARMAS


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_banksinarm">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_banksinarm ?? '' }}"
                                                class="form-control @error('valjumlah_banksinarm') is-invalid @enderror"
                                                id="valjumlah_banksinarm" name="valjumlah_banksinarm" placeholder="Jumlah...">
                                            @error('valjumlah_banksinarm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_banksinarm">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_banksinarm') is-invalid @enderror"
                                            id="valkondisi_banksinarm" name="valkondisi_banksinarm">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_banksinarm') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_banksinarm == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_banksinarm') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_banksinarm == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_banksinarm') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_banksinarm == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_banksinarm') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_banksinarm == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_banksinarm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_banksinarm">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_banksinarm ?? '' }}"
                                                class="form-control @error('valJarak_banksinarm') is-invalid @enderror"
                                                id="valJarak_banksinarm" name="valJarak_banksinarm" placeholder="Jumlah...">
                                            @error('valJarak_banksinarm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_banksinarm">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_banksinarm') is-invalid @enderror"
                                            id="valkemudahan_banksinarm" name="valkemudahan_banksinarm">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_banksinarm') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_banksinarm == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_banksinarm') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_banksinarm == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_banksinarm') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_banksinarm == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_banksinarm') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_banksinarm == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_banksinarm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANK PERMATA


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bankpermata">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_bankpermata ?? '' }}"
                                                class="form-control @error('valjumlah_bankpermata') is-invalid @enderror"
                                                id="valjumlah_bankpermata" name="valjumlah_bankpermata" placeholder="Jumlah...">
                                            @error('valjumlah_bankpermata')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bankpermata">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_bankpermata') is-invalid @enderror"
                                            id="valkondisi_bankpermata" name="valkondisi_bankpermata">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_bankpermata') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_bankpermata == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_bankpermata') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_bankpermata == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_bankpermata') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_bankpermata == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_bankpermata') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_bankpermata == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_bankpermata')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bankpermata">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_bankpermata ?? '' }}"
                                                class="form-control @error('valJarak_bankpermata') is-invalid @enderror"
                                                id="valJarak_bankpermata" name="valJarak_bankpermata" placeholder="Jumlah...">
                                            @error('valJarak_bankpermata')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bankpermata">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_bankpermata') is-invalid @enderror"
                                            id="valkemudahan_bankpermata" name="valkemudahan_bankpermata">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_bankpermata') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bankpermata == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_bankpermata') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bankpermata == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_bankpermata') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bankpermata == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_bankpermata') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bankpermata == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_bankpermata')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANK SWASTA LAINNYA
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bankswastalain">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_bankswastalain ?? '' }}"
                                                class="form-control @error('valjumlah_bankswastalain') is-invalid @enderror"
                                                id="valjumlah_bankswastalain" name="valjumlah_bankswastalain" placeholder="Jumlah...">
                                            @error('valjumlah_bankswastalain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bankswastalain">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_bankswastalain') is-invalid @enderror"
                                            id="valkondisi_bankswastalain" name="valkondisi_bankswastalain">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_bankswastalain') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_bankswastalain == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_bankswastalain') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_bankswastalain == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_bankswastalain') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_bankswastalain == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_bankswastalain') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_bankswastalain == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_bankswastalain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bankswastalain">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_bankswastalain ?? '' }}"
                                                class="form-control @error('valJarak_bankswastalain') is-invalid @enderror"
                                                id="valJarak_bankswastalain" name="valJarak_bankswastalain" placeholder="Jumlah...">
                                            @error('valJarak_bankswastalain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bankswastalain">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_bankswastalain') is-invalid @enderror"
                                            id="valkemudahan_bankswastalain" name="valkemudahan_bankswastalain">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_bankswastalain') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bankswastalain == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_bankswastalain') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bankswastalain == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_bankswastalain') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bankswastalain == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_bankswastalain') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bankswastalain == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_bankswastalain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BPR (BANK PERKREDITAN RAKYAT)


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bankbpr">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_bankbpr ?? '' }}"
                                                class="form-control @error('valjumlah_bankbpr') is-invalid @enderror"
                                                id="valjumlah_bankbpr" name="valjumlah_bankbpr" placeholder="Jumlah...">
                                            @error('valjumlah_bankbpr')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bankbpr">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_bankbpr') is-invalid @enderror"
                                            id="valkondisi_bankbpr" name="valkondisi_bankbpr">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_bankbpr') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_bankbpr == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_bankbpr') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_bankbpr == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_bankbpr') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_bankbpr == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_bankbpr') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_bankbpr == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_bankbpr')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bankbpr">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_bankbpr ?? '' }}"
                                                class="form-control @error('valJarak_bankbpr') is-invalid @enderror"
                                                id="valJarak_bankbpr" name="valJarak_bankbpr" placeholder="Jumlah...">
                                            @error('valJarak_bankbpr')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bankbpr">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_bankbpr') is-invalid @enderror"
                                            id="valkemudahan_bankbpr" name="valkemudahan_bankbpr">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_bankbpr') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bankbpr == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_bankbpr') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bankbpr == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_bankbpr') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bankbpr == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_bankbpr') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bankbpr == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_bankbpr')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BAITUL MAAL WA TAMWIL (BMT)

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bmt">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_bmt ?? '' }}"
                                                class="form-control @error('valjumlah_bmt') is-invalid @enderror"
                                                id="valjumlah_bmt" name="valjumlah_bmt" placeholder="Jumlah...">
                                            @error('valjumlah_bmt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bmt">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_bmt') is-invalid @enderror"
                                            id="valkondisi_bmt" name="valkondisi_bmt">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_bmt') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_bmt == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_bmt') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_bmt == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_bmt') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_bmt == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_bmt') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_bmt == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_bmt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bmt">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_bmt ?? '' }}"
                                                class="form-control @error('valJarak_bmt') is-invalid @enderror"
                                                id="valJarak_bmt" name="valJarak_bmt" placeholder="Jumlah...">
                                            @error('valJarak_bmt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bmt">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_bmt') is-invalid @enderror"
                                            id="valkemudahan_bmt" name="valkemudahan_bmt">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_bmt') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bmt == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_bmt') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_bmt == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_bmt') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bmt == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_bmt') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_bmt == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_bmt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PEGADAIAN


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_pegadaian">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_pegadaian ?? '' }}"
                                                class="form-control @error('valjumlah_pegadaian') is-invalid @enderror"
                                                id="valjumlah_pegadaian" name="valjumlah_pegadaian" placeholder="Jumlah...">
                                            @error('valjumlah_pegadaian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_pegadaian">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_pegadaian') is-invalid @enderror"
                                            id="valkondisi_pegadaian" name="valkondisi_pegadaian">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_pegadaian') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_pegadaian == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_pegadaian') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_pegadaian == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_pegadaian') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_pegadaian == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_pegadaian') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_pegadaian == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_pegadaian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_pegadaian">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_pegadaian ?? '' }}"
                                                class="form-control @error('valJarak_pegadaian') is-invalid @enderror"
                                                id="valJarak_pegadaian" name="valJarak_pegadaian" placeholder="Jumlah...">
                                            @error('valJarak_pegadaian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_pegadaian">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_pegadaian') is-invalid @enderror"
                                            id="valkemudahan_pegadaian" name="valkemudahan_pegadaian">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_pegadaian') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_pegadaian == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_pegadaian') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_pegadaian == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_pegadaian') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_pegadaian == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_pegadaian') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_pegadaian == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_pegadaian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">ANJUNGAN TUNAI MANDIRI (ATM)



                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_atm">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_atm ?? '' }}"
                                                class="form-control @error('valjumlah_atm') is-invalid @enderror"
                                                id="valjumlah_atm" name="valjumlah_atm" placeholder="Jumlah...">
                                            @error('valjumlah_atm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_atm">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_atm') is-invalid @enderror"
                                            id="valkondisi_atm" name="valkondisi_atm">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_atm') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_atm == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_atm') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_atm == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_atm') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_atm == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_atm') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_atm == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_atm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_atm">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_atm ?? '' }}"
                                                class="form-control @error('valJarak_atm') is-invalid @enderror"
                                                id="valJarak_atm" name="valJarak_atm" placeholder="Jumlah...">
                                            @error('valJarak_atm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_atm">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_atm') is-invalid @enderror"
                                            id="valkemudahan_atm" name="valkemudahan_atm">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_atm') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_atm == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_atm') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_atm == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_atm') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_atm == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_atm') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_atm == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_atm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SARANA EKONOMI LAIN


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_saranalain">JUMLAH
                                            </label>
                                            <input type="text" value="{{ $rt_sare->jumlah_saranalain ?? '' }}"
                                                class="form-control @error('valjumlah_saranalain') is-invalid @enderror"
                                                id="valjumlah_saranalain" name="valjumlah_saranalain" placeholder="Jumlah...">
                                            @error('valjumlah_saranalain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_saranalain">KONDISI
                                            </label>
                                            <select class="form-control @error('valkondisi_saranalain') is-invalid @enderror"
                                            id="valkondisi_saranalain" name="valkondisi_saranalain">
                                        <option value="" disabled selected>Pilih Wilayah Topografi...</option>
                                        <option value="baik"
                                            {{ old('valkondisi_saranalain') == 'baik' || (isset($rt_sare) && $rt_sare->kondisi_saranalain == 'baik') ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="buruk"
                                            {{ old('valkondisi_saranalain') == 'buruk' || (isset($rt_sare) && $rt_sare->kondisi_saranalain == 'buruk') ? 'selected' : '' }}>
                                            Buruk</option>
                                        <option value="tidak berfungsi"
                                            {{ old('valkondisi_saranalain') == 'tidak berfungsi' || (isset($rt_sare) && $rt_sare->kondisi_saranalain == 'tidak berfungsi') ? 'selected' : '' }}>
                                            Tidak Berfungsi</option>
                                        <option value="tidak ada"
                                            {{ old('valkondisi_saranalain') == 'tidak ada' || (isset($rt_sare) && $rt_sare->kondisi_saranalain == 'tidak ada') ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>

                                            @error('valkondisi_saranalain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_saranalain">JARAK TERDEKAT

                                            </label>
                                            <input type="number" value="{{ $rt_sare->Jarak_saranalain ?? '' }}"
                                                class="form-control @error('valJarak_saranalain') is-invalid @enderror"
                                                id="valJarak_saranalain" name="valJarak_saranalain" placeholder="Jumlah...">
                                            @error('valJarak_saranalain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_saranalain">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            <select class="form-control @error('valkemudahan_saranalain') is-invalid @enderror"
                                            id="valkemudahan_saranalain" name="valkemudahan_saranalain">
                                        <option value="" disabled selected>Pilih kemudahan mencapai...</option>
                                        <option value="sangat mudah"
                                            {{ old('valkemudahan_saranalain') == 'sangat mudah' || (isset($rt_sare) && $rt_sare->kemudahan_saranalain == 'sangat mudah') ? 'selected' : '' }}>
                                            Sangat Mudah</option>
                                        <option value="mudah"
                                            {{ old('valkemudahan_saranalain') == 'mudah' || (isset($rt_sare) && $rt_sare->kemudahan_saranalain == 'mudah') ? 'selected' : '' }}>
                                            Mudah</option>
                                        <option value="sulit"
                                            {{ old('valkemudahan_saranalain') == 'sulit' || (isset($rt_sare) && $rt_sare->kemudahan_saranalain == 'sulit') ? 'selected' : '' }}>
                                            Sulit</option>
                                        <option value="sangat sulit"
                                            {{ old('valkemudahan_saranalain') == 'sangat sulit' || (isset($rt_sare) && $rt_sare->kemudahan_saranalain == 'sangat sulit') ? 'selected' : '' }}>
                                            Sangat Sulit</option>
                                    </select>

                                            @error('valkemudahan_saranalain')
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
            document.getElementById('form-edit-rtsare').submit();
        });
    </script>
@endsection
