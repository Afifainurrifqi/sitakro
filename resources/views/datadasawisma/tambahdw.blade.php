@extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('title', $isEdit ? 'Edit Dasawisma' : 'Tambah Dasawisma')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('msg'))
                    <div class="alert alert-success">{{ session('msg') }}</div>
                @endif

                <div class="card">
                    <div class="card-body">

                        <h1 class="card-title">{{ $isEdit ? 'Edit Dasawisma' : 'Form Tambah Dasawisma' }}</h1>
                        <br><br>

                        <form action="{{ route('dasawisma.store') }}" method="POST" id="form-tambah-dasawisma"
                            autocomplete="off">
                            @csrf
                            {{-- JANGAN pakai @method('PUT') karena route store pakai POST --}}

                            {{-- NIK --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="ValNIK">
                                    NIK <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input value="{{ old('ValNIK', $valNIK ?? '') }}" type="text"
                                            class="form-control @error('ValNIK') is-invalid @enderror" id="ValNIK"
                                            name="ValNIK" placeholder="NIK..." inputmode="numeric" maxlength="20"
                                            pattern="[0-9]{8,20}" title="Masukkan 8–20 digit angka">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="button" id="btnCariNik"
                                                aria-live="polite">
                                                <span id="btnCariNikText">Cari</span>
                                                <span id="btnCariNikSpinner" class="spinner-border spinner-border-sm d-none"
                                                    role="status" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </div>
                                    @error('ValNIK')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div id="nik-alert" class="mt-2"></div>
                                </div>
                            </div>

                            {{-- Nama --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="nama">Nama <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input value="{{ old('nama', $valNama ?? '') }}" type="text"
                                        class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        name="nama" placeholder="nama..." readonly>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Alamat / RT / RW --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="alamat">Alamat</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        value="{{ old('alamat', $valAlamat ?? '') }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="rt">RT</label>
                                <div class="col-lg-2">
                                    <input type="text" class="form-control" id="rt" name="rt"
                                        value="{{ old('rt', $valRT ?? '') }}" readonly>
                                </div>
                                <label class="col-lg-2 col-form-label" for="rw">RW</label>
                                <div class="col-lg-2">
                                    <input type="text" class="form-control" id="rw" name="rw"
                                        value="{{ old('rw', $valRW ?? '') }}" readonly>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="email">Email <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input value="{{ old('email', $valEmail ?? '') }}" type="text"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        name="email" placeholder="Email...">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Password --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="password">Password <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="password...">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Role (hidden) --}}
                            <div class="d-none">
                                <select id="role" name="role">
                                    <option value="dasawisma"
                                        {{ old('role', $valRole ?? 'dasawisma') === 'dasawisma' ? 'selected' : '' }}>
                                        dasawisma
                                    </option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#confirmModal" id="btnOpenConfirm">Simpan</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal konfirmasi --}}
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Simpan</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">Apakah kamu sudah yakin?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="confirmSave">Yakin</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        (function() {
            const btnCari = document.getElementById('btnCariNik');
            const inputNik = document.getElementById('ValNIK');
            const namaInput = document.getElementById('nama');
            const alamatInput = document.getElementById('alamat');
            const rtInput = document.getElementById('rt');
            const rwInput = document.getElementById('rw');
            const alertBox = document.getElementById('nik-alert');
            const btnText = document.getElementById('btnCariNikText');
            const btnSpinner = document.getElementById('btnCariNikSpinner');

            const routeUrl = "{{ route('datapenduduk.findByNik') }}";

            function setLoading(on) {
                if (on) {
                    btnCari.disabled = true;
                    btnText.textContent = 'Mencari...';
                    btnSpinner.classList.remove('d-none');
                } else {
                    btnCari.disabled = false;
                    btnText.textContent = 'Cari';
                    btnSpinner.classList.add('d-none');
                }
            }

            function clearFields() {
                namaInput.value = '';
                alamatInput.value = '';
                rtInput.value = '';
                rwInput.value = '';
            }

            function fillFields(data) {
                namaInput.value = data.nama ?? data.NAMA ?? '';
                alamatInput.value = data.alamat ?? data.ALAMAT ?? '';
                rtInput.value = data.rt ?? data.RT ?? '';
                rwInput.value = data.rw ?? data.RW ?? '';
            }

            function getCsrfToken() {
                const m = document.querySelector('meta[name="csrf-token"]');
                return m ? m.content : null;
            }

            function showAlert(type, message, timeout = 7000) {
                const html = `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
      ${message}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>`;
                alertBox.innerHTML = html;
                alertBox.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
                if (timeout) setTimeout(() => {
                    const a = alertBox.querySelector('.alert');
                    if (a) a.remove();
                }, timeout);
            }
            async function cariNik(nik) {
                setLoading(true);
                clearFields();
                const csrf = getCsrfToken();
                if (!csrf) {
                    setLoading(false);
                    return showAlert('danger', 'CSRF token tidak ditemukan. Muat ulang halaman.');
                }
                try {
                    const res = await fetch(routeUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrf
                        },
                        body: JSON.stringify({
                            nik
                        }),
                        credentials: 'same-origin'
                    });
                    const text = await res.text();
                    let parsed = null;
                    try {
                        parsed = JSON.parse(text);
                    } catch (e) {}
                    if (!res.ok) {
                        if (res.status === 419) return showAlert('warning',
                        'Sesi habis/CSRF invalid. Login ulang.');
                        if (res.status === 404) return showAlert('warning', parsed?.message ||
                            'NIK tidak ditemukan.');
                        if (res.status === 422) {
                            const msg = parsed?.errors ? Object.values(parsed.errors)[0][0] : (parsed?.message ||
                                'Input tidak valid.');
                            return showAlert('warning', 'Validasi: ' + msg);
                        }
                        if (text.trim().startsWith('<')) return showAlert('warning',
                            'Ter-redirect (mungkin ke login). Muat ulang.');
                        return showAlert('danger', parsed?.message || `Kesalahan (${res.status}).`);
                    }
                    if (parsed?.ok && parsed?.data) {
                        fillFields(parsed.data);
                        showAlert('success', 'Data NIK ditemukan dan terisi otomatis.');
                    } else {
                        showAlert('warning', parsed?.message || 'NIK tidak ditemukan.');
                    }
                } catch (err) {
                    showAlert('danger', 'Gagal terhubung ke server: ' + (err?.message || err));
                } finally {
                    setLoading(false);
                }
            }

            btnCari.addEventListener('click', function(e) {
                e.preventDefault();
                const nik = (inputNik.value || '').trim();
                if (!/^[0-9]{8,20}$/.test(nik)) return showAlert('warning', 'NIK harus 8–20 digit angka.');
                cariNik(nik);
            });

            inputNik.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    btnCari.click();
                }
            });

            document.getElementById('confirmSave').addEventListener('click', function() {
                document.getElementById('form-tambah-dasawisma').submit();
            });
        })();
    </script>
@endsection
