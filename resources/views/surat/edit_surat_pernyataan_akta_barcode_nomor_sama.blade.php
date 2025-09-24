@extends(Auth::user() && Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
<div class="container-fluid py-3">
  <div class="row">
    <div class="col-lg-12 mx-auto"> {{-- tengah --}}
      <div class="card shadow-sm">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Edit Pernyataan Akta Barcode Nomor Sama (Baru Isi Sendiri)</h5>
          <a href="{{ url()->previous() }}" class="btn btn-light btn-sm">Kembali</a>
        </div>

        <div class="card-body">
          @if ($errors->any())
            <div class="alert alert-danger">
              <strong>Periksa kembali input:</strong>
              <ul class="mb-0">
                @foreach ($errors->all() as $e)
                  <li>{{ $e }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('surat.aktabarcode.update', $surat->_id) }}" method="POST" novalidate>
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                     value="{{ old('nama', $surat->nama) }}" required>
              @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- NIK --}}
            <div class="mb-3">
              <label class="form-label">NIK</label>
              <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                     value="{{ old('nik', $surat->nik) }}" required>
              @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Alamat --}}
            <div class="mb-3">
              <label class="form-label">Alamat</label>
              <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3" required>{{ old('alamat', $surat->alamat) }}</textarea>
              @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Nama Dalam Akta --}}
            <div class="mb-3">
              <label class="form-label">Nama Dalam Akta</label>
              <input type="text" name="nama_dalam_akta" class="form-control @error('nama_dalam_akta') is-invalid @enderror"
                     value="{{ old('nama_dalam_akta', $surat->nama_dalam_akta) }}" required>
              @error('nama_dalam_akta') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- No. Akta --}}
            <div class="mb-3">
              <label class="form-label">No. Akta</label>
              <input type="text" name="no_akta" class="form-control @error('no_akta') is-invalid @enderror"
                     value="{{ old('no_akta', $surat->no_akta) }}" required>
              @error('no_akta') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Nomor --}}
            <div class="mb-3">
              <label class="form-label">Nomor</label>
              <input type="text" name="nomor" class="form-control @error('nomor') is-invalid @enderror"
                     value="{{ old('nomor', $surat->nomor) }}" required>
              @error('nomor') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Status Surat --}}
            <div class="mb-3">
              <label class="form-label">Status Surat</label>
              <select name="status_surat" class="form-control @error('status_surat') is-invalid @enderror">
                @foreach (['Pending','Di cek','Di terima','Ditolak'] as $st)
                  <option value="{{ $st }}" {{ old('status_surat', $surat->status_surat ?? 'Pending') === $st ? 'selected' : '' }}>{{ $st }}</option>
                @endforeach
              </select>
              @error('status_surat') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Status Verifikasi --}}
            <div class="mb-3">
              <label class="form-label">Status Verifikasi</label>
              <select name="status_verif" class="form-control @error('status_verif') is-invalid @enderror">
                @foreach (['Belum Verifikasi','Terverifikasi'] as $sv)
                  <option value="{{ $sv }}" {{ old('status_verif', $surat->status_verif ?? 'Belum Verifikasi') === $sv ? 'selected' : '' }}>{{ $sv }}</option>
                @endforeach
              </select>
              @error('status_verif') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- No WhatsApp --}}
            <div class="mb-3">
              <label class="form-label">No WhatsApp</label>
              <input type="text" name="nowa" class="form-control @error('nowa') is-invalid @enderror"
                     value="{{ old('nowa', $surat->nowa) }}" required>
              @error('nowa') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="text-end">
              <button class="btn btn-primary">Update</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
