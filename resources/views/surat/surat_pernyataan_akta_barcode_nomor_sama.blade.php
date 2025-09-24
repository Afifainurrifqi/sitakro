@extends(Auth::user() && Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
<div class="container-fluid py-3">
  <div class="row">
    <div class="col-lg-12 mx-auto"> {{-- tengah, 1 kolom --}}
      <div class="card shadow-sm mb-4">
        <div class="card-header">
          <h5 class="mb-0">Tambah Pernyataan Akta Barcode Nomor Sama (Baru Isi Sendiri)</h5>
        </div>

        <div class="card-body">
          {{-- Notifikasi validasi umum --}}
          @if ($errors->any())
            <div class="alert alert-danger">
              <div class="fw-bold mb-1">Periksa kembali input Anda:</div>
              <ul class="mb-0">
                @foreach ($errors->all() as $e)
                  <li>{{ $e }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('surat.aktabarcode.store') }}" method="POST" novalidate>
            @csrf

            {{-- Nama --}}
            <div class="mb-3">
              <label class="form-label" for="nama">Nama</label>
              <input type="text" id="nama" name="nama"
                     class="form-control @error('nama') is-invalid @enderror"
                     value="{{ old('nama') }}" required>
              @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- NIK --}}
            <div class="mb-3">
              <label class="form-label" for="nik">NIK</label>
              <input type="text" id="nik" name="nik"
                     class="form-control @error('nik') is-invalid @enderror"
                     value="{{ old('nik') }}" required>
              @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Alamat --}}
            <div class="mb-3">
              <label class="form-label" for="alamat">Alamat</label>
              <textarea id="alamat" name="alamat" rows="3"
                        class="form-control @error('alamat') is-invalid @enderror"
                        required>{{ old('alamat') }}</textarea>
              @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Nama Dalam Akta --}}
            <div class="mb-3">
              <label class="form-label" for="nama_dalam_akta">Nama Dalam Akta</label>
              <input type="text" id="nama_dalam_akta" name="nama_dalam_akta"
                     class="form-control @error('nama_dalam_akta') is-invalid @enderror"
                     value="{{ old('nama_dalam_akta') }}" required>
              @error('nama_dalam_akta') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- No. Akta --}}
            <div class="mb-3">
              <label class="form-label" for="no_akta">No. Akta</label>
              <input type="text" id="no_akta" name="no_akta"
                     class="form-control @error('no_akta') is-invalid @enderror"
                     value="{{ old('no_akta') }}" required>
              @error('no_akta') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Nomor --}}
            <div class="mb-3">
              <label class="form-label" for="nomor">Nomor</label>
              <input type="text" id="nomor" name="nomor"
                     class="form-control @error('nomor') is-invalid @enderror"
                     value="{{ old('nomor') }}" required>
              @error('nomor') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Status Surat --}}
            <div class="mb-3">
              <label class="form-label" for="status_surat">Status Surat</label>
              <select id="status_surat" name="status_surat"
                      class="form-control @error('status_surat') is-invalid @enderror">
                @foreach (['Pending','Di cek','Di terima','Ditolak'] as $st)
                  <option value="{{ $st }}" {{ old('status_surat','Pending') === $st ? 'selected' : '' }}>
                    {{ $st }}
                  </option>
                @endforeach
              </select>
              @error('status_surat') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Status Verifikasi --}}
            <div class="mb-3">
              <label class="form-label" for="status_verif">Status Verifikasi</label>
              <select id="status_verif" name="status_verif"
                      class="form-control @error('status_verif') is-invalid @enderror">
                @foreach (['Belum Verifikasi','Terverifikasi'] as $sv)
                  <option value="{{ $sv }}" {{ old('status_verif','Belum Verifikasi') === $sv ? 'selected' : '' }}>
                    {{ $sv }}
                  </option>
                @endforeach
              </select>
              @error('status_verif') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- No WhatsApp --}}
            <div class="mb-3">
              <label class="form-label" for="nowa">No WhatsApp</label>
              <input type="text" id="nowa" name="nowa"
                     class="form-control @error('nowa') is-invalid @enderror"
                     value="{{ old('nowa') }}" required>
              @error('nowa') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="text-end">
              <button class="btn btn-primary">Simpan</button>
            </div>

          </form>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
