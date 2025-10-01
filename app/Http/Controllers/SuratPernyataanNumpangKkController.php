<?php

namespace App\Http\Controllers;

use App\Models\surat_pernyataan_numpang_kk;
use Illuminate\Http\Request;
use App\Services\NomorSuratService;

class SuratPernyataanNumpangKkController extends Controller
{
    public function __construct(private NomorSuratService $svc) {}

    /**
     * Cek & assign nomor surat jika status "Di terima" + "Terverifikasi"
     */
    protected function maybeAssignNomorSurat($suratOrNull, array &$payload): void
    {
        $status = $payload['status_surat'] ?? ($suratOrNull->status_surat ?? null);
        $verif  = $payload['status_verif'] ?? ($suratOrNull->status_verif ?? null);

        if (
            $status === 'Di terima' && $verif === 'Terverifikasi'
            && empty($payload['nomor_surat'])
            && empty($suratOrNull?->nomor_surat)
        ) {

            // PAKAI COUNTER JENIS "numpangkk", BUKAN default SKTM
            $issued = $this->svc->issue('numpangkk'); // ['urut'=>..., 'tahun'=>..., 'nomor_surat'=>"..."]

            $payload['nomor_urut']  = $issued['urut'];
            $payload['tahun_nomor'] = $issued['tahun'];
            $payload['nomor_surat'] = $issued['nomor_surat']; // contoh: "400 / 107 / 409.41.2 / 2025"
        }
    }


    /**
     * List semua surat numpang KK
     */
    public function index()
    {
        $data = surat_pernyataan_numpang_kk::orderBy('_id', 'desc')->get();
        return view('surat.surat_pernyataan_numpang_kk', compact('data'));
    }

    /**
     * Form untuk user
     */
    public function usernumpangkk()
    {
        return view('surat.user_pengajuan_adminduk_numpangkk');
    }

    /**
     * Form untuk admin
     */
    public function create()
    {
        return view('surat.surat_pernyataan_numpang_kk');
    }

    /**
     * Store data dari user
     */
    public function userstore(Request $request)
    {
        $validated = $request->validate([
            'nowa' => 'required|string|max:20',

            // Pemilik KK
            'nama_pemilik_kk' => 'required|string|max:255',
            'nik_pemilik_kk' => 'required|string|max:50',
            'no_kk' => 'required|string|max:20',
            'pekerjaan_pemilik_kk' => 'required|string|max:100',
            'alamat_pemilik_kk' => 'required|string',

            // Penumpang KK
            'nama_penumpang_kk' => 'required|string|max:255',
            'nik_penumpang_kk' => 'required|string|max:50',
            'tempat_lahir_penumpang_kk' => 'required|string|max:255',
            'tanggal_lahir_penumpang_kk' => 'required|date',
            'agama_penumpang_kk' => 'required|string|max:50',
            'pekerjaan_penumpang_kk' => 'required|string|max:100',

            // Status default
            'status_surat' => 'nullable|string',
            'status_verif' => 'nullable|string',
        ]);

        $payload = array_merge($validated, [
            'status_surat' => $validated['status_surat'] ?? 'Pending',
            'status_verif' => $validated['status_verif'] ?? 'Belum Verifikasi',
        ]);

        // userstore tidak langsung dapat nomor, jadi skip maybeAssign
        surat_pernyataan_numpang_kk::create($payload);

        return redirect()->route('surat.suratberhasil')->with('success', 'Surat berhasil diajukan.');
    }

    /**
     * Store data dari admin
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nowa' => 'required|string|max:20',

            // Pemilik KK
            'nama_pemilik_kk' => 'required|string|max:255',
            'nik_pemilik_kk' => 'required|string|max:50',
            'no_kk' => 'required|string|max:20',
            'pekerjaan_pemilik_kk' => 'required|string|max:100',
            'alamat_pemilik_kk' => 'required|string',

            // Penumpang KK
            'nama_penumpang_kk' => 'required|string|max:255',
            'nik_penumpang_kk' => 'required|string|max:50',
            'tempat_lahir_penumpang_kk' => 'required|string|max:255',
            'tanggal_lahir_penumpang_kk' => 'required|date',
            'agama_penumpang_kk' => 'required|string|max:50',
            'pekerjaan_penumpang_kk' => 'required|string|max:100',

            // Status
            'status_surat' => 'required|string',
            'status_verif' => 'required|string',
        ]);

        $payload = $validated;

        // admin bisa langsung assign nomor
        $this->maybeAssignNomorSurat(null, $payload);

        surat_pernyataan_numpang_kk::create($payload);

        return redirect()->route('surat.keluar')->with('success', 'Surat berhasil dibuat.');
    }

    /**
     * Form edit
     */
    public function edit(surat_pernyataan_numpang_kk $suratPernyataanNumpangKk)
    {
        return view('surat.edit_surat_pernyataan_numpang_kk', compact('suratPernyataanNumpangKk'));
    }

    /**
     * Update data
     */
    public function update(Request $request, surat_pernyataan_numpang_kk $suratPernyataanNumpangKk)
    {
        $validated = $request->validate([
            'nama_pemilik_kk' => 'required|string|max:255',
            'nik_pemilik_kk' => 'required|string|max:50',
            'no_kk' => 'required|string|max:20',
            'pekerjaan_pemilik_kk' => 'required|string|max:100',
            'alamat_pemilik_kk' => 'required|string',

            'nama_penumpang_kk' => 'required|string|max:255',
            'nik_penumpang_kk' => 'required|string|max:50',
            'tempat_lahir_penumpang_kk' => 'required|string|max:255',
            'tanggal_lahir_penumpang_kk' => 'required|date',
            'agama_penumpang_kk' => 'required|string|max:50',
            'pekerjaan_penumpang_kk' => 'required|string|max:100',

            'status_surat' => 'required|string',
            'status_verif' => 'required|string',
            'nowa' => 'required|string|max:20',
        ]);

        $payload = $validated;

        $this->maybeAssignNomorSurat($suratPernyataanNumpangKk, $payload);

        $suratPernyataanNumpangKk->update($payload);

        return redirect()->route('surat.keluar')->with('success', 'Surat berhasil diperbarui.');
    }

    /**
     * Hapus data
     */
    public function destroy(surat_pernyataan_numpang_kk $surat)
    {
        $surat->delete();
        return back()->with('success', 'Surat berhasil dihapus.');
    }
}
