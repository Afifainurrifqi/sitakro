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
                         {{-- <button type="button" class="btn mb-1 btn-warning"
                             onclick="window.location='{{ route('disabilitas.index') }}'">Kembali
                         </button>
                         <br><br><br> --}}
                         <div class="form-validation">
                             <form class="form-valide" action="{{ route('disabilitas.update') }}" method="POST"
                                 id="form-edit-disabilitas">
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
                                 @php
                                     // Sumber kebenaran: old() → fallback ke data dari controller
                                     $checkedList = (array) old('valjenisdisab', $selectedJenis ?? []);

                                     // Daftar opsi yang konsisten (hindari typo)
                                     $opsiDisabilitas = [
                                         'TUNANETRA' => 'TUNANETRA',
                                         'TUNARUNGU' => 'TUNARUNGU (TULI)',
                                         'TUNAWICARA' => 'TUNAWICARA (BISU)',
                                         'TUNARUNGU_WICARA' => 'TUNARUNGU - WICARA (BISU - TULI)', // ← perbaiki dari TUNARUNGI_WICARA
                                         'TUNADAKSA' => 'TUNADAKSA (CACAT TUBUH)',
                                         'TUNAGRAHITA' => 'TUNAGRAHITA (CACAT MENTAL)',
                                         'TUNALARAS' => 'TUNALARAS (EX. SAKIT JIWA)',
                                         'CACAT_EX_SAKIT_KUSTA' => 'CACAT EX-SAKIT KUSTA',
                                         'CACAT_GANDA' => 'CACAT GANDA (FISIK+MENTAL)',
                                         'DIPASUNG' => 'DIPASUNG',
                                     ];
                                 @endphp

                                 <div class="form-group row">
                                     <label class="col-lg-4 col-form-label">PILIH JENIS DISABILITAS <span
                                             class="text-danger">*</span></label>
                                     <div class="col-lg-6">
                                         @foreach ($opsiDisabilitas as $val => $label)
                                             @php
                                                 $id = 'chk_' . $val;
                                                 $checked = in_array($val, $checkedList, true) ? 'checked' : '';
                                             @endphp

                                             <div class="form-check">
                                                 <input class="form-check-input" type="checkbox" name="valjenisdisab[]"
                                                     value="{{ $val }}" id="{{ $id }}"
                                                     {{ $checked }}>
                                                 <label class="form-check-label"
                                                     for="{{ $id }}">{{ $label }}</label>
                                             </div>
                                         @endforeach

                                         @error('valjenisdisab')
                                             <div class="invalid-feedback d-block">{{ $message }}</div>
                                         @enderror
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
             document.getElementById('form-edit-disabilitas').submit();
         });
     </script>
 @endsection
