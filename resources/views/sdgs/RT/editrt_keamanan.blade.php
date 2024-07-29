 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT KEAMANAN</h1>
                        <h1  class="card-title"> RT : {{ $datart->rt }}</h1> <h1 class="card-title"> RW :  {{ $datart->rw }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rt_keamanan.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rt_keamanan.update') }}" method="POST" id="form-edit-rtkeamanan">
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
                                    <label class="col-lg-4 col-form-label">ANTAR KELOMPOK MASYARAKAT
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valpenyebabu_antarkelompokmas">PENYEBAB UTAMA
                                            </label>
                                            <select class="form-control @error('valpenyebabu_antarkelompokmas') is-invalid @enderror"
                                                id="valpenyebabu_antarkelompokmas" name="valpenyebabu_antarkelompokmas">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Harta"
                                                    {{ old('valpenyebabu_antarkelompokmas') == 'Harta' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_antarkelompokmas == 'Harta') ? 'selected' : '' }}>
                                                    Harta
                                                </option>
                                                <option value="Kekuasaan"
                                                    {{ old('valpenyebabu_antarkelompokmas') == 'Kekuasaan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_antarkelompokmas == 'Kekuasaan') ? 'selected' : '' }}>
                                                    Kekuasaan
                                                </option>
                                                <option value="Asmara"
                                                    {{ old('valpenyebabu_antarkelompokmas') == 'Asmara' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_antarkelompokmas == 'Asmara') ? 'selected' : '' }}>
                                                    Asmara
                                                </option>
                                                <option value="Ideologi"
                                                    {{ old('valpenyebabu_antarkelompokmas') == 'Ideologi' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_antarkelompokmas == 'Ideologi') ? 'selected' : '' }}>
                                                    Ideologi
                                                </option>
                                                <option value="Agama/Kepercayaan"
                                                    {{ old('valpenyebabu_antarkelompokmas') == 'Agama/Kepercayaan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_antarkelompokmas == 'Agama/Kepercayaan') ? 'selected' : '' }}>
                                                    Agama/Kepercayaan
                                                </option>
                                                <option value="Keramaian (olahraga, hiburan, dll)"
                                                    {{ old('valpenyebabu_antarkelompokmas') == 'Keramaian (olahraga, hiburan, dll)' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_antarkelompokmas == 'Keramaian (olahraga, hiburan, dll)') ? 'selected' : '' }}>
                                                    Keramaian (olahraga, hiburan, dll)
                                                </option>
                                                <option value="Ketidakpuasan atas kebijakan / Pelayananan"
                                                    {{ old('valpenyebabu_antarkelompokmas') == 'Ketidakpuasan atas kebijakan / Pelayananan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_antarkelompokmas == 'Ketidakpuasan atas kebijakan / Pelayananan') ? 'selected' : '' }}>
                                                    Ketidakpuasan atas kebijakan / Pelayananan
                                                </option>
                                                <option value="Lainnya"
                                                    {{ old('valpenyebabu_antarkelompokmas') == 'Lainnya' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_antarkelompokmas == 'Lainnya') ? 'selected' : '' }}>
                                                    Lainnya
                                                </option>
                                            </select>
                                            @error('valpenyebabu_antarkelompokmas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH KEJADIAN
                                            </label>
                                            <input type="text" value="{{ $rt_keamanan->jk_antarkelompokmas ?? '' }}"
                                                class="form-control @error('valjk_antarkelompokmas') is-invalid @enderror"
                                                id="valjk_antarkelompokmas" name="valjk_antarkelompokmas" placeholder="jumlah...">

                                            @error('valjk_antarkelompokmas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjkl_antarkelompokmas">JUMLAH KORBAN LUKA
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->jkl_antarkelompokmas ?? '' }}"
                                                class="form-control @error('valjkl_antarkelompokmas') is-invalid @enderror"
                                                id="valjkl_antarkelompokmas" name="valjkl_antarkelompokmas" placeholder="Jumlah...">
                                            @error('valjkl_antarkelompokmas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">JUMLAH TEWAS
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->jt_antarkelompokmas ?? '' }}"
                                                class="form-control @error('valjt_antarkelompokmas') is-invalid @enderror"
                                                id="valjt_antarkelompokmas" name="valjt_antarkelompokmas" placeholder="Jumlah...">
                                            @error('valjt_antarkelompokmas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpen_antarkelompokmas">PENYELESAIAN
                                            </label>
                                            <select class="form-control @error('valpen_antarkelompokmas') is-invalid @enderror"
                                                id="valpen_antarkelompokmas" name="valpen_antarkelompokmas">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="iya semuanya"
                                                    {{ old('valpen_antarkelompokmas') == 'iya semuanya' || (isset($rt_keamanan) && $rt_keamanan->pen_antarkelompokmas == 'iya semuanya') ? 'selected' : '' }}>
                                                    Iya Semuanya
                                                </option>
                                                <option value="iya sebagian"
                                                    {{ old('valpen_antarkelompokmas') == 'iya sebagian' || (isset($rt_keamanan) && $rt_keamanan->pen_antarkelompokmas == 'iya sebagian') ? 'selected' : '' }}>
                                                    Iya Sebagian
                                                </option>
                                                <option value="tidak"
                                                    {{ old('valpen_antarkelompokmas') == 'tidak' || (isset($rt_keamanan) && $rt_keamanan->pen_antarkelompokmas == 'tidak') ? 'selected' : '' }}>
                                                    Tidak
                                                </option>
                                            </select>
                                            @error('valpen_antarkelompokmas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpp_antarkelompokmas">PIHAK PENDAMAI
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->pp_antarkelompokmas ?? '' }}"
                                                class="form-control @error('valpp_antarkelompokmas') is-invalid @enderror"
                                                id="valpp_antarkelompokmas" name="valpp_antarkelompokmas" placeholder="Jumlah...">
                                            @error('valpp_antarkelompokmas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KELOMPOK MASYARAKAT ANTAR DESA
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valpenyebabu_antardesa">PENYEBAB UTAMA
                                            </label>
                                            <select class="form-control @error('valpenyebabu_antardesa') is-invalid @enderror"
                                                id="valpenyebabu_antardesa" name="valpenyebabu_antardesa">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Harta"
                                                    {{ old('valpenyebabu_antardesa') == 'Harta' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_antardesa == 'Harta') ? 'selected' : '' }}>
                                                    Harta
                                                </option>
                                                <option value="Kekuasaan"
                                                    {{ old('valpenyebabu_antardesa') == 'Kekuasaan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_antardesa == 'Kekuasaan') ? 'selected' : '' }}>
                                                    Kekuasaan
                                                </option>
                                                <option value="Asmara"
                                                    {{ old('valpenyebabu_antardesa') == 'Asmara' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_antardesa == 'Asmara') ? 'selected' : '' }}>
                                                    Asmara
                                                </option>
                                                <option value="Ideologi"
                                                    {{ old('valpenyebabu_antardesa') == 'Ideologi' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_antardesa == 'Ideologi') ? 'selected' : '' }}>
                                                    Ideologi
                                                </option>
                                                <option value="Agama/Kepercayaan"
                                                    {{ old('valpenyebabu_antardesa') == 'Agama/Kepercayaan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_antardesa == 'Agama/Kepercayaan') ? 'selected' : '' }}>
                                                    Agama/Kepercayaan
                                                </option>
                                                <option value="Keramaian (olahraga, hiburan, dll)"
                                                    {{ old('valpenyebabu_antardesa') == 'Keramaian (olahraga, hiburan, dll)' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_antardesa == 'Keramaian (olahraga, hiburan, dll)') ? 'selected' : '' }}>
                                                    Keramaian (olahraga, hiburan, dll)
                                                </option>
                                                <option value="Ketidakpuasan atas kebijakan / Pelayananan"
                                                    {{ old('valpenyebabu_antardesa') == 'Ketidakpuasan atas kebijakan / Pelayananan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_antardesa == 'Ketidakpuasan atas kebijakan / Pelayananan') ? 'selected' : '' }}>
                                                    Ketidakpuasan atas kebijakan / Pelayananan
                                                </option>
                                                <option value="Lainnya"
                                                    {{ old('valpenyebabu_antardesa') == 'Lainnya' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_antardesa == 'Lainnya') ? 'selected' : '' }}>
                                                    Lainnya
                                                </option>
                                            </select>
                                            @error('valpenyebabu_antardesa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antardesa">JUMLAH KEJADIAN
                                            </label>
                                            <input type="text" value="{{ $rt_keamanan->jk_antardesa ?? '' }}"
                                                class="form-control @error('valjk_antardesa') is-invalid @enderror"
                                                id="valjk_antardesa" name="valjk_antardesa" placeholder="jumlah...">

                                            @error('valjk_antardesa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjkl_antardesa">JUMLAH KORBAN LUKA
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->jkl_antardesa ?? '' }}"
                                                class="form-control @error('valjkl_antardesa') is-invalid @enderror"
                                                id="valjkl_antardesa" name="valjkl_antardesa" placeholder="Jumlah...">
                                            @error('valjkl_antardesa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antardesa">JUMLAH TEWAS
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->jt_antardesa ?? '' }}"
                                                class="form-control @error('valjt_antardesa') is-invalid @enderror"
                                                id="valjt_antardesa" name="valjt_antardesa" placeholder="Jumlah...">
                                            @error('valjt_antardesa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpen_antardesa">PENYELESAIAN
                                            </label>
                                            <select class="form-control @error('valpen_antardesa') is-invalid @enderror"
                                                id="valpen_antardesa" name="valpen_antardesa">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="iya semuanya"
                                                    {{ old('valpen_antardesa') == 'iya semuanya' || (isset($rt_keamanan) && $rt_keamanan->pen_antardesa == 'iya semuanya') ? 'selected' : '' }}>
                                                    Iya Semuanya
                                                </option>
                                                <option value="iya sebagian"
                                                    {{ old('valpen_antardesa') == 'iya sebagian' || (isset($rt_keamanan) && $rt_keamanan->pen_antardesa == 'iya sebagian') ? 'selected' : '' }}>
                                                    Iya Sebagian
                                                </option>
                                                <option value="tidak"
                                                    {{ old('valpen_antardesa') == 'tidak' || (isset($rt_keamanan) && $rt_keamanan->pen_antardesa == 'tidak') ? 'selected' : '' }}>
                                                    Tidak
                                                </option>
                                            </select>
                                            @error('valpen_antardesa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpp_antardesa">PIHAK PENDAMAI
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->pp_antardesa ?? '' }}"
                                                class="form-control @error('valpp_antardesa') is-invalid @enderror"
                                                id="valpp_antardesa" name="valpp_antardesa" placeholder="Jumlah...">
                                            @error('valpp_antardesa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KELOMPOK MASYARAKAT DENGAN APARAT KEAMANAN
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valpenyebabu_aparatmk">PENYEBAB UTAMA
                                            </label>
                                            <select class="form-control @error('valpenyebabu_aparatmk') is-invalid @enderror"
                                                id="valpenyebabu_aparatmk" name="valpenyebabu_aparatmk">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Harta"
                                                    {{ old('valpenyebabu_aparatmk') == 'Harta' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatmk == 'Harta') ? 'selected' : '' }}>
                                                    Harta
                                                </option>
                                                <option value="Kekuasaan"
                                                    {{ old('valpenyebabu_aparatmk') == 'Kekuasaan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatmk == 'Kekuasaan') ? 'selected' : '' }}>
                                                    Kekuasaan
                                                </option>
                                                <option value="Asmara"
                                                    {{ old('valpenyebabu_aparatmk') == 'Asmara' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatmk == 'Asmara') ? 'selected' : '' }}>
                                                    Asmara
                                                </option>
                                                <option value="Ideologi"
                                                    {{ old('valpenyebabu_aparatmk') == 'Ideologi' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatmk == 'Ideologi') ? 'selected' : '' }}>
                                                    Ideologi
                                                </option>
                                                <option value="Agama/Kepercayaan"
                                                    {{ old('valpenyebabu_aparatmk') == 'Agama/Kepercayaan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatmk == 'Agama/Kepercayaan') ? 'selected' : '' }}>
                                                    Agama/Kepercayaan
                                                </option>
                                                <option value="Keramaian (olahraga, hiburan, dll)"
                                                    {{ old('valpenyebabu_aparatmk') == 'Keramaian (olahraga, hiburan, dll)' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatmk == 'Keramaian (olahraga, hiburan, dll)') ? 'selected' : '' }}>
                                                    Keramaian (olahraga, hiburan, dll)
                                                </option>
                                                <option value="Ketidakpuasan atas kebijakan / Pelayananan"
                                                    {{ old('valpenyebabu_aparatmk') == 'Ketidakpuasan atas kebijakan / Pelayananan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatmk == 'Ketidakpuasan atas kebijakan / Pelayananan') ? 'selected' : '' }}>
                                                    Ketidakpuasan atas kebijakan / Pelayananan
                                                </option>
                                                <option value="Lainnya"
                                                    {{ old('valpenyebabu_aparatmk') == 'Lainnya' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatmk == 'Lainnya') ? 'selected' : '' }}>
                                                    Lainnya
                                                </option>
                                            </select>
                                            @error('valpenyebabu_aparatmk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_aparatmk">JUMLAH KEJADIAN
                                            </label>
                                            <input type="text" value="{{ $rt_keamanan->jk_aparatmk ?? '' }}"
                                                class="form-control @error('valjk_aparatmk') is-invalid @enderror"
                                                id="valjk_aparatmk" name="valjk_aparatmk" placeholder="jumlah...">

                                            @error('valjk_aparatmk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjkl_aparatmk">JUMLAH KORBAN LUKA
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->jkl_aparatmk ?? '' }}"
                                                class="form-control @error('valjkl_aparatmk') is-invalid @enderror"
                                                id="valjkl_aparatmk" name="valjkl_aparatmk" placeholder="Jumlah...">
                                            @error('valjkl_aparatmk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_aparatmk">JUMLAH TEWAS
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->jt_aparatmk ?? '' }}"
                                                class="form-control @error('valjt_aparatmk') is-invalid @enderror"
                                                id="valjt_aparatmk" name="valjt_aparatmk" placeholder="Jumlah...">
                                            @error('valjt_aparatmk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpen_aparatmk">PENYELESAIAN
                                            </label>
                                            <select class="form-control @error('valpen_aparatmk') is-invalid @enderror"
                                                id="valpen_aparatmk" name="valpen_aparatmk">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="iya semuanya"
                                                    {{ old('valpen_aparatmk') == 'iya semuanya' || (isset($rt_keamanan) && $rt_keamanan->pen_aparatmk == 'iya semuanya') ? 'selected' : '' }}>
                                                    Iya Semuanya
                                                </option>
                                                <option value="iya sebagian"
                                                    {{ old('valpen_aparatmk') == 'iya sebagian' || (isset($rt_keamanan) && $rt_keamanan->pen_aparatmk == 'iya sebagian') ? 'selected' : '' }}>
                                                    Iya Sebagian
                                                </option>
                                                <option value="tidak"
                                                    {{ old('valpen_aparatmk') == 'tidak' || (isset($rt_keamanan) && $rt_keamanan->pen_aparatmk == 'tidak') ? 'selected' : '' }}>
                                                    Tidak
                                                </option>
                                            </select>
                                            @error('valpen_aparatmk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpp_aparatmk">PIHAK PENDAMAI
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->pp_aparatmk ?? '' }}"
                                                class="form-control @error('valpp_aparatmk') is-invalid @enderror"
                                                id="valpp_aparatmk" name="valpp_aparatmk" placeholder="Jumlah...">
                                            @error('valpp_aparatmk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KELOMPOK MASYARAKAT DENGAN APARAT PEMERINTAH
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valpenyebabu_aparatmp">PENYEBAB UTAMA
                                            </label>
                                            <select class="form-control @error('valpenyebabu_aparatmp') is-invalid @enderror"
                                                id="valpenyebabu_aparatmp" name="valpenyebabu_aparatmp">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Harta"
                                                    {{ old('valpenyebabu_aparatmp') == 'Harta' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatmp == 'Harta') ? 'selected' : '' }}>
                                                    Harta
                                                </option>
                                                <option value="Kekuasaan"
                                                    {{ old('valpenyebabu_aparatmp') == 'Kekuasaan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatmp == 'Kekuasaan') ? 'selected' : '' }}>
                                                    Kekuasaan
                                                </option>
                                                <option value="Asmara"
                                                    {{ old('valpenyebabu_aparatmp') == 'Asmara' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatmp == 'Asmara') ? 'selected' : '' }}>
                                                    Asmara
                                                </option>
                                                <option value="Ideologi"
                                                    {{ old('valpenyebabu_aparatmp') == 'Ideologi' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatmp == 'Ideologi') ? 'selected' : '' }}>
                                                    Ideologi
                                                </option>
                                                <option value="Agama/Kepercayaan"
                                                    {{ old('valpenyebabu_aparatmp') == 'Agama/Kepercayaan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatmp == 'Agama/Kepercayaan') ? 'selected' : '' }}>
                                                    Agama/Kepercayaan
                                                </option>
                                                <option value="Keramaian (olahraga, hiburan, dll)"
                                                    {{ old('valpenyebabu_aparatmp') == 'Keramaian (olahraga, hiburan, dll)' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatmp == 'Keramaian (olahraga, hiburan, dll)') ? 'selected' : '' }}>
                                                    Keramaian (olahraga, hiburan, dll)
                                                </option>
                                                <option value="Ketidakpuasan atas kebijakan / Pelayananan"
                                                    {{ old('valpenyebabu_aparatmp') == 'Ketidakpuasan atas kebijakan / Pelayananan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatmp == 'Ketidakpuasan atas kebijakan / Pelayananan') ? 'selected' : '' }}>
                                                    Ketidakpuasan atas kebijakan / Pelayananan
                                                </option>
                                                <option value="Lainnya"
                                                    {{ old('valpenyebabu_aparatmp') == 'Lainnya' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatmp == 'Lainnya') ? 'selected' : '' }}>
                                                    Lainnya
                                                </option>
                                            </select>
                                            @error('valpenyebabu_aparatmp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_aparatmp">JUMLAH KEJADIAN
                                            </label>
                                            <input type="text" value="{{ $rt_keamanan->jk_aparatmp ?? '' }}"
                                                class="form-control @error('valjk_aparatmp') is-invalid @enderror"
                                                id="valjk_aparatmp" name="valjk_aparatmp" placeholder="jumlah...">

                                            @error('valjk_aparatmp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjkl_aparatmp">JUMLAH KORBAN LUKA
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->jkl_aparatmp ?? '' }}"
                                                class="form-control @error('valjkl_aparatmp') is-invalid @enderror"
                                                id="valjkl_aparatmp" name="valjkl_aparatmp" placeholder="Jumlah...">
                                            @error('valjkl_aparatmp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_aparatmp">JUMLAH TEWAS
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->jt_aparatmp ?? '' }}"
                                                class="form-control @error('valjt_aparatmp') is-invalid @enderror"
                                                id="valjt_aparatmp" name="valjt_aparatmp" placeholder="Jumlah...">
                                            @error('valjt_aparatmp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpen_aparatmp">PENYELESAIAN
                                            </label>
                                            <select class="form-control @error('valpen_aparatmp') is-invalid @enderror"
                                                id="valpen_aparatmp" name="valpen_aparatmp">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="iya semuanya"
                                                    {{ old('valpen_aparatmp') == 'iya semuanya' || (isset($rt_keamanan) && $rt_keamanan->pen_aparatmp == 'iya semuanya') ? 'selected' : '' }}>
                                                    Iya Semuanya
                                                </option>
                                                <option value="iya sebagian"
                                                    {{ old('valpen_aparatmp') == 'iya sebagian' || (isset($rt_keamanan) && $rt_keamanan->pen_aparatmp == 'iya sebagian') ? 'selected' : '' }}>
                                                    Iya Sebagian
                                                </option>
                                                <option value="tidak"
                                                    {{ old('valpen_aparatmp') == 'tidak' || (isset($rt_keamanan) && $rt_keamanan->pen_aparatmp == 'tidak') ? 'selected' : '' }}>
                                                    Tidak
                                                </option>
                                            </select>
                                            @error('valpen_aparatmp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpp_aparatmp">PIHAK PENDAMAI
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->pp_aparatmp ?? '' }}"
                                                class="form-control @error('valpp_aparatmp') is-invalid @enderror"
                                                id="valpp_aparatmp" name="valpp_aparatmp" placeholder="Jumlah...">
                                            @error('valpp_aparatmp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">ANTAR APARAT KEAMANAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valpenyebabu_aparatk">PENYEBAB UTAMA
                                            </label>
                                            <select class="form-control @error('valpenyebabu_aparatk') is-invalid @enderror"
                                                id="valpenyebabu_aparatk" name="valpenyebabu_aparatk">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Harta"
                                                    {{ old('valpenyebabu_aparatk') == 'Harta' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatk == 'Harta') ? 'selected' : '' }}>
                                                    Harta
                                                </option>
                                                <option value="Kekuasaan"
                                                    {{ old('valpenyebabu_aparatk') == 'Kekuasaan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatk == 'Kekuasaan') ? 'selected' : '' }}>
                                                    Kekuasaan
                                                </option>
                                                <option value="Asmara"
                                                    {{ old('valpenyebabu_aparatk') == 'Asmara' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatk == 'Asmara') ? 'selected' : '' }}>
                                                    Asmara
                                                </option>
                                                <option value="Ideologi"
                                                    {{ old('valpenyebabu_aparatk') == 'Ideologi' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatk == 'Ideologi') ? 'selected' : '' }}>
                                                    Ideologi
                                                </option>
                                                <option value="Agama/Kepercayaan"
                                                    {{ old('valpenyebabu_aparatk') == 'Agama/Kepercayaan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatk == 'Agama/Kepercayaan') ? 'selected' : '' }}>
                                                    Agama/Kepercayaan
                                                </option>
                                                <option value="Keramaian (olahraga, hiburan, dll)"
                                                    {{ old('valpenyebabu_aparatk') == 'Keramaian (olahraga, hiburan, dll)' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatk == 'Keramaian (olahraga, hiburan, dll)') ? 'selected' : '' }}>
                                                    Keramaian (olahraga, hiburan, dll)
                                                </option>
                                                <option value="Ketidakpuasan atas kebijakan / Pelayananan"
                                                    {{ old('valpenyebabu_aparatk') == 'Ketidakpuasan atas kebijakan / Pelayananan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatk == 'Ketidakpuasan atas kebijakan / Pelayananan') ? 'selected' : '' }}>
                                                    Ketidakpuasan atas kebijakan / Pelayananan
                                                </option>
                                                <option value="Lainnya"
                                                    {{ old('valpenyebabu_aparatk') == 'Lainnya' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatk == 'Lainnya') ? 'selected' : '' }}>
                                                    Lainnya
                                                </option>
                                            </select>
                                            @error('valpenyebabu_aparatk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_aparatk">JUMLAH KEJADIAN
                                            </label>
                                            <input type="text" value="{{ $rt_keamanan->jk_aparatk ?? '' }}"
                                                class="form-control @error('valjk_aparatk') is-invalid @enderror"
                                                id="valjk_aparatk" name="valjk_aparatk" placeholder="jumlah...">

                                            @error('valjk_aparatk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjkl_aparatk">JUMLAH KORBAN LUKA
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->jkl_aparatk ?? '' }}"
                                                class="form-control @error('valjkl_aparatk') is-invalid @enderror"
                                                id="valjkl_aparatk" name="valjkl_aparatk" placeholder="Jumlah...">
                                            @error('valjkl_aparatk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_aparatk">JUMLAH TEWAS
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->jt_aparatk ?? '' }}"
                                                class="form-control @error('valjt_aparatk') is-invalid @enderror"
                                                id="valjt_aparatk" name="valjt_aparatk" placeholder="Jumlah...">
                                            @error('valjt_aparatk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpen_aparatk">PENYELESAIAN
                                            </label>
                                            <select class="form-control @error('valpen_aparatk') is-invalid @enderror"
                                                id="valpen_aparatk" name="valpen_aparatk">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="iya semuanya"
                                                    {{ old('valpen_aparatk') == 'iya semuanya' || (isset($rt_keamanan) && $rt_keamanan->pen_aparatk == 'iya semuanya') ? 'selected' : '' }}>
                                                    Iya Semuanya
                                                </option>
                                                <option value="iya sebagian"
                                                    {{ old('valpen_aparatk') == 'iya sebagian' || (isset($rt_keamanan) && $rt_keamanan->pen_aparatk == 'iya sebagian') ? 'selected' : '' }}>
                                                    Iya Sebagian
                                                </option>
                                                <option value="tidak"
                                                    {{ old('valpen_aparatk') == 'tidak' || (isset($rt_keamanan) && $rt_keamanan->pen_aparatk == 'tidak') ? 'selected' : '' }}>
                                                    Tidak
                                                </option>
                                            </select>
                                            @error('valpen_aparatk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpp_aparatk">PIHAK PENDAMAI
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->pp_aparatk ?? '' }}"
                                                class="form-control @error('valpp_aparatk') is-invalid @enderror"
                                                id="valpp_aparatk" name="valpp_aparatk" placeholder="Jumlah...">
                                            @error('valpp_aparatk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">ANTAR APARAT PEMERINTAH
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valpenyebabu_aparatp">PENYEBAB UTAMA
                                            </label>
                                            <select class="form-control @error('valpenyebabu_aparatp') is-invalid @enderror"
                                                id="valpenyebabu_aparatp" name="valpenyebabu_aparatp">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Harta"
                                                    {{ old('valpenyebabu_aparatp') == 'Harta' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatp == 'Harta') ? 'selected' : '' }}>
                                                    Harta
                                                </option>
                                                <option value="Kekuasaan"
                                                    {{ old('valpenyebabu_aparatp') == 'Kekuasaan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatp == 'Kekuasaan') ? 'selected' : '' }}>
                                                    Kekuasaan
                                                </option>
                                                <option value="Asmara"
                                                    {{ old('valpenyebabu_aparatp') == 'Asmara' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatp == 'Asmara') ? 'selected' : '' }}>
                                                    Asmara
                                                </option>
                                                <option value="Ideologi"
                                                    {{ old('valpenyebabu_aparatp') == 'Ideologi' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatp == 'Ideologi') ? 'selected' : '' }}>
                                                    Ideologi
                                                </option>
                                                <option value="Agama/Kepercayaan"
                                                    {{ old('valpenyebabu_aparatp') == 'Agama/Kepercayaan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatp == 'Agama/Kepercayaan') ? 'selected' : '' }}>
                                                    Agama/Kepercayaan
                                                </option>
                                                <option value="Keramaian (olahraga, hiburan, dll)"
                                                    {{ old('valpenyebabu_aparatp') == 'Keramaian (olahraga, hiburan, dll)' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatp == 'Keramaian (olahraga, hiburan, dll)') ? 'selected' : '' }}>
                                                    Keramaian (olahraga, hiburan, dll)
                                                </option>
                                                <option value="Ketidakpuasan atas kebijakan / Pelayananan"
                                                    {{ old('valpenyebabu_aparatp') == 'Ketidakpuasan atas kebijakan / Pelayananan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatp == 'Ketidakpuasan atas kebijakan / Pelayananan') ? 'selected' : '' }}>
                                                    Ketidakpuasan atas kebijakan / Pelayananan
                                                </option>
                                                <option value="Lainnya"
                                                    {{ old('valpenyebabu_aparatp') == 'Lainnya' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_aparatp == 'Lainnya') ? 'selected' : '' }}>
                                                    Lainnya
                                                </option>
                                            </select>
                                            @error('valpenyebabu_aparatp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_aparatp">JUMLAH KEJADIAN
                                            </label>
                                            <input type="text" value="{{ $rt_keamanan->jk_aparatp ?? '' }}"
                                                class="form-control @error('valjk_aparatp') is-invalid @enderror"
                                                id="valjk_aparatp" name="valjk_aparatp" placeholder="jumlah...">

                                            @error('valjk_aparatp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjkl_aparatp">JUMLAH KORBAN LUKA
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->jkl_aparatp ?? '' }}"
                                                class="form-control @error('valjkl_aparatp') is-invalid @enderror"
                                                id="valjkl_aparatp" name="valjkl_aparatp" placeholder="Jumlah...">
                                            @error('valjkl_aparatp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_aparatp">JUMLAH TEWAS
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->jt_aparatp ?? '' }}"
                                                class="form-control @error('valjt_aparatp') is-invalid @enderror"
                                                id="valjt_aparatp" name="valjt_aparatp" placeholder="Jumlah...">
                                            @error('valjt_aparatp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpen_aparatp">PENYELESAIAN
                                            </label>
                                            <select class="form-control @error('valpen_aparatp') is-invalid @enderror"
                                                id="valpen_aparatp" name="valpen_aparatp">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="iya semuanya"
                                                    {{ old('valpen_aparatp') == 'iya semuanya' || (isset($rt_keamanan) && $rt_keamanan->pen_aparatp == 'iya semuanya') ? 'selected' : '' }}>
                                                    Iya Semuanya
                                                </option>
                                                <option value="iya sebagian"
                                                    {{ old('valpen_aparatp') == 'iya sebagian' || (isset($rt_keamanan) && $rt_keamanan->pen_aparatp == 'iya sebagian') ? 'selected' : '' }}>
                                                    Iya Sebagian
                                                </option>
                                                <option value="tidak"
                                                    {{ old('valpen_aparatp') == 'tidak' || (isset($rt_keamanan) && $rt_keamanan->pen_aparatp == 'tidak') ? 'selected' : '' }}>
                                                    Tidak
                                                </option>
                                            </select>
                                            @error('valpen_aparatp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpp_aparatp">PIHAK PENDAMAI
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->pp_aparatp ?? '' }}"
                                                class="form-control @error('valpp_aparatp') is-invalid @enderror"
                                                id="valpp_aparatp" name="valpp_aparatp" placeholder="Jumlah...">
                                            @error('valpp_aparatp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PELAJAR/MAHASISWA

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valpenyebabu_pelajar">PENYEBAB UTAMA
                                            </label>
                                            <select class="form-control @error('valpenyebabu_pelajar') is-invalid @enderror"
                                                id="valpenyebabu_pelajar" name="valpenyebabu_pelajar">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Harta"
                                                    {{ old('valpenyebabu_pelajar') == 'Harta' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_pelajar == 'Harta') ? 'selected' : '' }}>
                                                    Harta
                                                </option>
                                                <option value="Kekuasaan"
                                                    {{ old('valpenyebabu_pelajar') == 'Kekuasaan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_pelajar == 'Kekuasaan') ? 'selected' : '' }}>
                                                    Kekuasaan
                                                </option>
                                                <option value="Asmara"
                                                    {{ old('valpenyebabu_pelajar') == 'Asmara' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_pelajar == 'Asmara') ? 'selected' : '' }}>
                                                    Asmara
                                                </option>
                                                <option value="Ideologi"
                                                    {{ old('valpenyebabu_pelajar') == 'Ideologi' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_pelajar == 'Ideologi') ? 'selected' : '' }}>
                                                    Ideologi
                                                </option>
                                                <option value="Agama/Kepercayaan"
                                                    {{ old('valpenyebabu_pelajar') == 'Agama/Kepercayaan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_pelajar == 'Agama/Kepercayaan') ? 'selected' : '' }}>
                                                    Agama/Kepercayaan
                                                </option>
                                                <option value="Keramaian (olahraga, hiburan, dll)"
                                                    {{ old('valpenyebabu_pelajar') == 'Keramaian (olahraga, hiburan, dll)' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_pelajar == 'Keramaian (olahraga, hiburan, dll)') ? 'selected' : '' }}>
                                                    Keramaian (olahraga, hiburan, dll)
                                                </option>
                                                <option value="Ketidakpuasan atas kebijakan / Pelayananan"
                                                    {{ old('valpenyebabu_pelajar') == 'Ketidakpuasan atas kebijakan / Pelayananan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_pelajar == 'Ketidakpuasan atas kebijakan / Pelayananan') ? 'selected' : '' }}>
                                                    Ketidakpuasan atas kebijakan / Pelayananan
                                                </option>
                                                <option value="Lainnya"
                                                    {{ old('valpenyebabu_pelajar') == 'Lainnya' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_pelajar == 'Lainnya') ? 'selected' : '' }}>
                                                    Lainnya
                                                </option>
                                            </select>
                                            @error('valpenyebabu_pelajar')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_pelajar">JUMLAH KEJADIAN
                                            </label>
                                            <input type="text" value="{{ $rt_keamanan->jk_pelajar ?? '' }}"
                                                class="form-control @error('valjk_pelajar') is-invalid @enderror"
                                                id="valjk_pelajar" name="valjk_pelajar" placeholder="jumlah...">

                                            @error('valjk_pelajar')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjkl_pelajar">JUMLAH KORBAN LUKA
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->jkl_pelajar ?? '' }}"
                                                class="form-control @error('valjkl_pelajar') is-invalid @enderror"
                                                id="valjkl_pelajar" name="valjkl_pelajar" placeholder="Jumlah...">
                                            @error('valjkl_pelajar')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_pelajar">JUMLAH TEWAS
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->jt_pelajar ?? '' }}"
                                                class="form-control @error('valjt_pelajar') is-invalid @enderror"
                                                id="valjt_pelajar" name="valjt_pelajar" placeholder="Jumlah...">
                                            @error('valjt_pelajar')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpen_pelajar">PENYELESAIAN
                                            </label>
                                            <select class="form-control @error('valpen_pelajar') is-invalid @enderror"
                                                id="valpen_pelajar" name="valpen_pelajar">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="iya semuanya"
                                                    {{ old('valpen_pelajar') == 'iya semuanya' || (isset($rt_keamanan) && $rt_keamanan->pen_pelajar == 'iya semuanya') ? 'selected' : '' }}>
                                                    Iya Semuanya
                                                </option>
                                                <option value="iya sebagian"
                                                    {{ old('valpen_pelajar') == 'iya sebagian' || (isset($rt_keamanan) && $rt_keamanan->pen_pelajar == 'iya sebagian') ? 'selected' : '' }}>
                                                    Iya Sebagian
                                                </option>
                                                <option value="tidak"
                                                    {{ old('valpen_pelajar') == 'tidak' || (isset($rt_keamanan) && $rt_keamanan->pen_pelajar == 'tidak') ? 'selected' : '' }}>
                                                    Tidak
                                                </option>
                                            </select>
                                            @error('valpen_pelajar')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpp_pelajar">PIHAK PENDAMAI
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->pp_pelajar ?? '' }}"
                                                class="form-control @error('valpp_pelajar') is-invalid @enderror"
                                                id="valpp_pelajar" name="valpp_pelajar" placeholder="Jumlah...">
                                            @error('valpp_pelajar')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">ANTAR SUKU

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valpenyebabu_suku">PENYEBAB UTAMA
                                            </label>
                                            <select class="form-control @error('valpenyebabu_suku') is-invalid @enderror"
                                                id="valpenyebabu_suku" name="valpenyebabu_suku">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Harta"
                                                    {{ old('valpenyebabu_suku') == 'Harta' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_suku == 'Harta') ? 'selected' : '' }}>
                                                    Harta
                                                </option>
                                                <option value="Kekuasaan"
                                                    {{ old('valpenyebabu_suku') == 'Kekuasaan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_suku == 'Kekuasaan') ? 'selected' : '' }}>
                                                    Kekuasaan
                                                </option>
                                                <option value="Asmara"
                                                    {{ old('valpenyebabu_suku') == 'Asmara' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_suku == 'Asmara') ? 'selected' : '' }}>
                                                    Asmara
                                                </option>
                                                <option value="Ideologi"
                                                    {{ old('valpenyebabu_suku') == 'Ideologi' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_suku == 'Ideologi') ? 'selected' : '' }}>
                                                    Ideologi
                                                </option>
                                                <option value="Agama/Kepercayaan"
                                                    {{ old('valpenyebabu_suku') == 'Agama/Kepercayaan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_suku == 'Agama/Kepercayaan') ? 'selected' : '' }}>
                                                    Agama/Kepercayaan
                                                </option>
                                                <option value="Keramaian (olahraga, hiburan, dll)"
                                                    {{ old('valpenyebabu_suku') == 'Keramaian (olahraga, hiburan, dll)' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_suku == 'Keramaian (olahraga, hiburan, dll)') ? 'selected' : '' }}>
                                                    Keramaian (olahraga, hiburan, dll)
                                                </option>
                                                <option value="Ketidakpuasan atas kebijakan / Pelayananan"
                                                    {{ old('valpenyebabu_suku') == 'Ketidakpuasan atas kebijakan / Pelayananan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_suku == 'Ketidakpuasan atas kebijakan / Pelayananan') ? 'selected' : '' }}>
                                                    Ketidakpuasan atas kebijakan / Pelayananan
                                                </option>
                                                <option value="Lainnya"
                                                    {{ old('valpenyebabu_suku') == 'Lainnya' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_suku == 'Lainnya') ? 'selected' : '' }}>
                                                    Lainnya
                                                </option>
                                            </select>
                                            @error('valpenyebabu_suku')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_suku">JUMLAH KEJADIAN
                                            </label>
                                            <input type="text" value="{{ $rt_keamanan->jk_suku ?? '' }}"
                                                class="form-control @error('valjk_suku') is-invalid @enderror"
                                                id="valjk_suku" name="valjk_suku" placeholder="jumlah...">

                                            @error('valjk_suku')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjkl_suku">JUMLAH KORBAN LUKA
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->jkl_suku ?? '' }}"
                                                class="form-control @error('valjkl_suku') is-invalid @enderror"
                                                id="valjkl_suku" name="valjkl_suku" placeholder="Jumlah...">
                                            @error('valjkl_suku')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_suku">JUMLAH TEWAS
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->jt_suku ?? '' }}"
                                                class="form-control @error('valjt_suku') is-invalid @enderror"
                                                id="valjt_suku" name="valjt_suku" placeholder="Jumlah...">
                                            @error('valjt_suku')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpen_suku">PENYELESAIAN
                                            </label>
                                            <select class="form-control @error('valpen_suku') is-invalid @enderror"
                                                id="valpen_suku" name="valpen_suku">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="iya semuanya"
                                                    {{ old('valpen_suku') == 'iya semuanya' || (isset($rt_keamanan) && $rt_keamanan->pen_suku == 'iya semuanya') ? 'selected' : '' }}>
                                                    Iya Semuanya
                                                </option>
                                                <option value="iya sebagian"
                                                    {{ old('valpen_suku') == 'iya sebagian' || (isset($rt_keamanan) && $rt_keamanan->pen_suku == 'iya sebagian') ? 'selected' : '' }}>
                                                    Iya Sebagian
                                                </option>
                                                <option value="tidak"
                                                    {{ old('valpen_suku') == 'tidak' || (isset($rt_keamanan) && $rt_keamanan->pen_suku == 'tidak') ? 'selected' : '' }}>
                                                    Tidak
                                                </option>
                                            </select>
                                            @error('valpen_suku')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpp_suku">PIHAK PENDAMAI
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->pp_suku ?? '' }}"
                                                class="form-control @error('valpp_suku') is-invalid @enderror"
                                                id="valpp_suku" name="valpp_suku" placeholder="Jumlah...">
                                            @error('valpp_suku')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">LAINNYA

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valpenyebabu_lainnya">PENYEBAB UTAMA
                                            </label>
                                            <select class="form-control @error('valpenyebabu_lainnya') is-invalid @enderror"
                                                id="valpenyebabu_lainnya" name="valpenyebabu_lainnya">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Harta"
                                                    {{ old('valpenyebabu_lainnya') == 'Harta' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_lainnya == 'Harta') ? 'selected' : '' }}>
                                                    Harta
                                                </option>
                                                <option value="Kekuasaan"
                                                    {{ old('valpenyebabu_lainnya') == 'Kekuasaan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_lainnya == 'Kekuasaan') ? 'selected' : '' }}>
                                                    Kekuasaan
                                                </option>
                                                <option value="Asmara"
                                                    {{ old('valpenyebabu_lainnya') == 'Asmara' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_lainnya == 'Asmara') ? 'selected' : '' }}>
                                                    Asmara
                                                </option>
                                                <option value="Ideologi"
                                                    {{ old('valpenyebabu_lainnya') == 'Ideologi' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_lainnya == 'Ideologi') ? 'selected' : '' }}>
                                                    Ideologi
                                                </option>
                                                <option value="Agama/Kepercayaan"
                                                    {{ old('valpenyebabu_lainnya') == 'Agama/Kepercayaan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_lainnya == 'Agama/Kepercayaan') ? 'selected' : '' }}>
                                                    Agama/Kepercayaan
                                                </option>
                                                <option value="Keramaian (olahraga, hiburan, dll)"
                                                    {{ old('valpenyebabu_lainnya') == 'Keramaian (olahraga, hiburan, dll)' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_lainnya == 'Keramaian (olahraga, hiburan, dll)') ? 'selected' : '' }}>
                                                    Keramaian (olahraga, hiburan, dll)
                                                </option>
                                                <option value="Ketidakpuasan atas kebijakan / Pelayananan"
                                                    {{ old('valpenyebabu_lainnya') == 'Ketidakpuasan atas kebijakan / Pelayananan' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_lainnya == 'Ketidakpuasan atas kebijakan / Pelayananan') ? 'selected' : '' }}>
                                                    Ketidakpuasan atas kebijakan / Pelayananan
                                                </option>
                                                <option value="Lainnya"
                                                    {{ old('valpenyebabu_lainnya') == 'Lainnya' || (isset($rt_keamanan) && $rt_keamanan->penyebabu_lainnya == 'Lainnya') ? 'selected' : '' }}>
                                                    Lainnya
                                                </option>
                                            </select>
                                            @error('valpenyebabu_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_lainnya">JUMLAH KEJADIAN
                                            </label>
                                            <input type="text" value="{{ $rt_keamanan->jk_lainnya ?? '' }}"
                                                class="form-control @error('valjk_lainnya') is-invalid @enderror"
                                                id="valjk_lainnya" name="valjk_lainnya" placeholder="jumlah...">

                                            @error('valjk_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjkl_lainnya">JUMLAH KORBAN LUKA
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->jkl_lainnya ?? '' }}"
                                                class="form-control @error('valjkl_lainnya') is-invalid @enderror"
                                                id="valjkl_lainnya" name="valjkl_lainnya" placeholder="Jumlah...">
                                            @error('valjkl_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_lainnya">JUMLAH TEWAS
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->jt_lainnya ?? '' }}"
                                                class="form-control @error('valjt_lainnya') is-invalid @enderror"
                                                id="valjt_lainnya" name="valjt_lainnya" placeholder="Jumlah...">
                                            @error('valjt_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpen_lainnya">PENYELESAIAN
                                            </label>
                                            <select class="form-control @error('valpen_lainnya') is-invalid @enderror"
                                                id="valpen_lainnya" name="valpen_lainnya">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="iya semuanya"
                                                    {{ old('valpen_lainnya') == 'iya semuanya' || (isset($rt_keamanan) && $rt_keamanan->pen_lainnya == 'iya semuanya') ? 'selected' : '' }}>
                                                    Iya Semuanya
                                                </option>
                                                <option value="iya sebagian"
                                                    {{ old('valpen_lainnya') == 'iya sebagian' || (isset($rt_keamanan) && $rt_keamanan->pen_lainnya == 'iya sebagian') ? 'selected' : '' }}>
                                                    Iya Sebagian
                                                </option>
                                                <option value="tidak"
                                                    {{ old('valpen_lainnya') == 'tidak' || (isset($rt_keamanan) && $rt_keamanan->pen_lainnya == 'tidak') ? 'selected' : '' }}>
                                                    Tidak
                                                </option>
                                            </select>
                                            @error('valpen_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpp_lainnya">PIHAK PENDAMAI
                                            </label>
                                            <input type="number" value="{{ $rt_keamanan->pp_lainnya ?? '' }}"
                                                class="form-control @error('valpp_lainnya') is-invalid @enderror"
                                                id="valpp_lainnya" name="valpp_lainnya" placeholder="Jumlah...">
                                            @error('valpp_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>





                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#confirmModal">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
    aria-hidden="true">
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
        document.getElementById('form-edit-rtkeamanan').submit();
    });
</script>

@endsection
