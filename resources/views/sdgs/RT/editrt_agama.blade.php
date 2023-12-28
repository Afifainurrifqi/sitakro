@extends('layout.main')


@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT LAIN-LAIN	
                            {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rt_agama.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rt_agama.update') }}" method="POST">
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
                                    <label class="col-lg-4 col-form-label" for="valjumlahwarga_jamkes">JUMLAH WARGA PESERTA JAMSKES
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $rt_agama->jumlahwarga_jamkes ?? '' }}"
                                            class="form-control @error('valjumlahwarga_jamkes') is-invalid @enderror"
                                            id="valjumlahwarga_jamkes" name="valjumlahwarga_jamkes" placeholder="berapa jumlahnya...">
                                        @error('valjumlahwarga_jamkes')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlahwarga_jamketerangan">JUMLAH WARGA PESERTA JAMS KETENAGAKERJAAN
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $rt_agama->jumlahwarga_jamketerangan ?? '' }}"
                                            class="form-control @error('valjumlahwarga_jamketerangan') is-invalid @enderror"
                                            id="valjumlahwarga_jamketerangan" name="valjumlahwarga_jamketerangan" placeholder="berapa jumlahnya...">
                                        @error('valjumlahwarga_jamketerangan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">JUMLAH TEMPAT IBADAH								
                                        <span class="text-danger">*</span></label>
                                        

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlahtempat_masjid">MASJID
                                            </label>
                                            <input type="number" value="{{ $rt_agama->jumlahtempat_masjid ?? '' }}"
                                            class="form-control @error('valjumlahtempat_masjid') is-invalid @enderror"
                                            id="valjumlahtempat_masjid" name="valjumlahtempat_masjid" placeholder="berapa jumlahnya...">
                                            @error('valjumlahtempat_masjid')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div> 
                                        <div class="form-group">
                                            <label for="valjumlahtempat_musholla">MUSHOLLAH
                                            </label>
                                            <input type="number" value="{{ $rt_agama->jumlahtempat_musholla ?? '' }}"
                                            class="form-control @error('valjumlahtempat_musholla') is-invalid @enderror"
                                            id="valjumlahtempat_musholla" name="valjumlahtempat_musholla" placeholder="berapa jumlahnya...">
                                            @error('valjumlahtempat_musholla')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>                                   
                                  
                                   
                                        <div class="form-group">
                                            <label for="valjumlahtempat_kristen">GEREJA KRISTEN
                                            </label>
                                            <input type="number" value="{{ $rt_agama->jumlahtempat_kristen ?? '' }}"
                                            class="form-control @error('valjumlahtempat_kristen') is-invalid @enderror"
                                            id="valjumlahtempat_kristen" name="valjumlahtempat_kristen" placeholder="berapa jumlahnya...">
                                            @error('valjumlahtempat_kristen')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>                                   
                                  
                                  
                                        <div class="form-group">
                                            <label for="valjumlahtempat_masjid">GEREJA KATOLIK


                                            </label>
                                            <input type="number" value="{{ $rt_agama->jumlahtempat_katolik ?? '' }}"
                                            class="form-control @error('valjumlahtempat_katolik') is-invalid @enderror"
                                            id="valjumlahtempat_katolik" name="valjumlahtempat_katolik" placeholder="berapa jumlahnya...">
                                            @error('valjumlahtempat_katolik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>                                   
                                  
                                   
                                        <div class="form-group">
                                            <label for="valjumlahtempat_masjid">KAPEL


                                            </label>
                                            <input type="number" value="{{ $rt_agama->jumlahtempat_kapel ?? '' }}"
                                            class="form-control @error('valjumlahtempat_kapel') is-invalid @enderror"
                                            id="valjumlahtempat_kapel" name="valjumlahtempat_kapel" placeholder="berapa jumlahnya...">
                                            @error('valjumlahtempat_kapel')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>                                   
                                  
                                        <div class="form-group">
                                            <label for="valjumlahtempat_pura">PURA


                                            </label>
                                            <input type="number" value="{{ $rt_agama->jumlahtempat_pura ?? '' }}"
                                            class="form-control @error('valjumlahtempat_pura') is-invalid @enderror"
                                            id="valjumlahtempat_pura" name="valjumlahtempat_pura" placeholder="berapa jumlahnya...">
                                            @error('valjumlahtempat_pura')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>                                   
                                    
                                        <div class="form-group">
                                            <label for="valjumlahtempat_wihara">WIHARA


                                            </label>
                                            <input type="number" value="{{ $rt_agama->jumlahtempat_wihara ?? '' }}"
                                            class="form-control @error('valjumlahtempat_wihara') is-invalid @enderror"
                                            id="valjumlahtempat_wihara" name="valjumlahtempat_wihara" placeholder="berapa jumlahnya...">
                                            @error('valjumlahtempat_wihara')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>                                   
                               
                                        <div class="form-group">
                                            <label for="valjumlahtempat_kelenteng">KELENTENG


                                            </label>
                                            <input type="number" value="{{ $rt_agama->jumlahtempat_kelenteng ?? '' }}"
                                            class="form-control @error('valjumlahtempat_kelenteng') is-invalid @enderror"
                                            id="valjumlahtempat_kelenteng" name="valjumlahtempat_kelenteng" placeholder="berapa jumlahnya...">
                                            @error('valjumlahtempat_kelenteng')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>                                   
                                  
                                        <div class="form-group">
                                            <label for="valjumlahtempat_lainnya">LAINNYA


                                            </label>
                                            <input type="number" value="{{ $rt_agama->jumlahtempat_lainnya ?? '' }}"
                                            class="form-control @error('valjumlahtempat_lainnya') is-invalid @enderror"
                                            id="valjumlahtempat_lainnya" name="valjumlahtempat_lainnya" placeholder="berapa jumlahnya...">
                                            @error('valjumlahtempat_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>                                                 
                                    </div>
                                  
                                                           
                                   
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SITUS CAGAR BUDAYA		

                                        <span class="text-danger">*</span></label>
                                        

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valcagar_bud1">SITUS CAGAR BUDAYA 1

                                            </label>
                                            <input type="number" value="{{ $rt_agama->cagar_bud1 ?? '' }}"
                                            class="form-control @error('valcagar_bud1') is-invalid @enderror"
                                            id="valcagar_bud1" name="valcagar_bud1" placeholder="berapa jumlahnya...">
                                            @error('valcagar_bud1')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>        
                                        <div class="form-group">
                                            <label for="valcagar_bud2">SITUS CAGAR BUDAYA 2

                                            </label>
                                            <input type="number" value="{{ $rt_agama->cagar_bud2 ?? '' }}"
                                            class="form-control @error('valcagar_bud2') is-invalid @enderror"
                                            id="valcagar_bud2" name="valcagar_bud2" placeholder="berapa jumlahnya...">
                                            @error('valcagar_bud2')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>        
                                        <div class="form-group">
                                            <label for="valcagar_bud3">SITUS CAGAR BUDAYA 3
                                            </label>
                                            <input type="number" value="{{ $rt_agama->cagar_bud3 ?? '' }}"
                                            class="form-control @error('valcagar_bud3') is-invalid @enderror"
                                            id="valcagar_bud3" name="valcagar_bud3" placeholder="berapa jumlahnya...">
                                            @error('valcagar_bud3')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>                                    
                                    </div>
                                  
                                                           
                                   
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KEBERADAAN SUKU TERASING	
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valsukuasing_keluarga">JUMLAH KELUARGA
                                            </label>
                                            <input type="number" value="{{ $rt_agama->sukuasing_keluarga ?? '' }}"
                                            class="form-control @error('valsukuasing_keluarga') is-invalid @enderror"
                                            id="valsukuasing_keluarga" name="valsukuasing_keluarga" placeholder="berapa jumlahnya...">
                                            @error('valsukuasing_keluarga')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>        
                                        <div class="form-group">
                                            <label for="valsukuasing_jiwa">JUMLAH JIWA


                                            </label>
                                            <input type="number" value="{{ $rt_agama->sukuasing_jiwa ?? '' }}"
                                            class="form-control @error('valsukuasing_jiwa') is-invalid @enderror"
                                            id="valsukuasing_jiwa" name="valsukuasing_jiwa" placeholder="berapa jumlahnya...">
                                            @error('valsukuasing_jiwa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>                                   
                                    </div>                 
                                </div>                                
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valruangpublik_terbuka">RUANG PUBLIK TERBUKA UNTUK SANTAI/ BERMAIN


                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valruangpublik_terbuka') is-invalid @enderror"
                                        id="valruangpublik_terbuka" name="valruangpublik_terbuka">
                                    <option value="" disabled selected>Pilih...</option>
                                    <option value="ada_dikelola"
                                        {{ old('valruangpublik_terbuka') == 'ada_dikelola' || (isset($rt_agama) && $rt_agama->ruangpublik_terbuka == 'ada_dikelola') ? 'selected' : '' }}>
                                        Ada, dikelola
                                    </option>
                                    <option value="ada_tidak_dikelola"
                                        {{ old('valruangpublik_terbuka') == 'ada_tidak_dikelola' || (isset($rt_agama) && $rt_agama->ruangpublik_terbuka == 'ada_tidak_dikelola') ? 'selected' : '' }}>
                                        Ada, tidak dikelola
                                    </option>
                                    <option value="tidak_ada"
                                        {{ old('valruangpublik_terbuka') == 'tidak_ada' || (isset($rt_agama) && $rt_agama->ruangpublik_terbuka == 'tidak_ada') ? 'selected' : '' }}>
                                        Tidak Ada
                                    </option>
                                </select>
                                        @error('valruangpublik_terbuka')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">NAMA KEARIFAN LOKAL ATAU ADAT					
                                        <span class="text-danger">*</span></label>
                                        

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valadat_kehamilan">KEHAMILAN
                                            </label>
                                            <input type="number" value="{{ $rt_agama->adat_kehamilan ?? '' }}"
                                            class="form-control @error('valadat_kehamilan') is-invalid @enderror"
                                            id="valadat_kehamilan" name="valadat_kehamilan" placeholder="berapa jumlahnya...">
                                            @error('valadat_kehamilan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>              
                                        <div class="form-group">
                                            <label for="valadat_kelahiran">KELAHIRAN

                                            </label>
                                            <input type="number" value="{{ $rt_agama->adat_kelahiran ?? '' }}"
                                            class="form-control @error('valadat_kelahiran') is-invalid @enderror"
                                            id="valadat_kelahiran" name="valadat_kelahiran" placeholder="berapa jumlahnya...">
                                            @error('valadat_kelahiran')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>    
                                        <div class="form-group">
                                            <label for="valadat_pekerjaan">PEKERJAAN

                                            </label>
                                            <input type="number" value="{{ $rt_agama->adat_pekerjaan ?? '' }}"
                                            class="form-control @error('valadat_pekerjaan') is-invalid @enderror"
                                            id="valadat_pekerjaan" name="valadat_pekerjaan" placeholder="berapa jumlahnya...">
                                            @error('valadat_pekerjaan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>    
                                        <div class="form-group">
                                            <label for="valadat_alam">ALAM / LINGKUNGAN HIDUP

                                            </label>
                                            <input type="number" value="{{ $rt_agama->adat_alam ?? '' }}"
                                            class="form-control @error('valadat_alam') is-invalid @enderror"
                                            id="valadat_alam" name="valadat_alam" placeholder="berapa jumlahnya...">
                                            @error('valadat_alam')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>    
                                        <div class="form-group">
                                            <label for="valadat_perkawinan">PERKAWINAN
                                            </label>
                                            <input type="number" value="{{ $rt_agama->adat_perkawinan ?? '' }}"
                                            class="form-control @error('valadat_perkawinan') is-invalid @enderror"
                                            id="valadat_perkawinan" name="valadat_perkawinan" placeholder="berapa jumlahnya...">
                                            @error('valadat_perkawinan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>    
                                        <div class="form-group">
                                            <label for="valadat_kehidupanwarga">KEHIDUPAN WARGA

                                            </label>
                                            <input type="number" value="{{ $rt_agama->adat_kehidupanwarga ?? '' }}"
                                            class="form-control @error('valadat_kehidupanwarga') is-invalid @enderror"
                                            id="valadat_kehidupanwarga" name="valadat_kehidupanwarga" placeholder="berapa jumlahnya...">
                                            @error('valadat_kehidupanwarga')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>    
                                        <div class="form-group">
                                            <label for="valadat_kematian">KEMATIAN

                                            </label>
                                            <input type="number" value="{{ $rt_agama->adat_kematian ?? '' }}"
                                            class="form-control @error('valadat_kematian') is-invalid @enderror"
                                            id="valadat_kematian" name="valadat_kematian" placeholder="berapa jumlahnya...">
                                            @error('valadat_kematian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>                          
                                    </div>
                                  
                                                           
                                   
                                </div>


                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
