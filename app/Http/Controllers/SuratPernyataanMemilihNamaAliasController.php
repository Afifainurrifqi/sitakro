<?php

namespace App\Http\Controllers;

use App\Models\surat_pernyataan_memilih_nama_alias;
use Illuminate\Http\Request;
use App\Services\NomorSuratService;

class SuratPernyataanMemilihNamaAliasController extends Controller
{
    // Injeksi service nomor surat (multi-jenis)
    public function __construct(private NomorSuratService $svc) {}

    /**
     * Jika status "Di terima" + "Terverifikasi", assign nomor_surat
     * untuk jenis 'alias' (counter terpisah dari SKTM/SPKTP/Numpang KK).
     *
     * - Tidak menimpa nomor_surat yang sudah ada
     * - Mengisi: nomor_urut, tahun_nomor, nomor_surat
     */
    protected function maybeAssignNomorSurat($suratOrNull, array &$payload): void
    {
        $status = $payload['status_surat'] ?? ($suratOrNull->status_surat ?? null);
        $verif  = $payload['status_verif'] ?? ($suratOrNull->status_verif ?? null);

        if ($status === 'Di terima' && $verif === 'Terverifikasi'
            && empty($payload['nomor_surat'])
            && empty($suratOrNull?->nomor_surat)) {

            // issue() akan atomic: naikkan counter & kembalikan format nomor
            $issued = $this->svc->issue('alias'); // ['urut'=>int,'tahun'=>int,'nomor_surat'=>string]

            $payload['nomor_urut']  = $issued['urut'];
            $payload['tahun_nomor'] = $issued['tahun'];
            $payload['nomor_surat'] = $issued['nomor_surat']; // contoh: "410 / 007 / 409.41.2 / 2025"
        }
    }

    /**
     * List data (untuk admin)
     */
    public function index()
    {
        // MongoDB pakai _id, boleh sesuaikan dengan created_at kalau ada
        $data = surat_pernyataan_memilih_nama_alias::orderBy('_id', 'desc')->get();
        return view('surat.surat_pernyataan_memilih_nama_alias', compact('data'));
    }

    /**
     * Form pengajuan (user)
     */
    public function usernamaalias()
    {
        return view('surat.user_surat_pernyataan_memilih_nama_alias');
    }

    /**
     * Form pembuatan (admin)
     */
    public function create()
    {
        return view('surat.surat_pernyataan_memilih_nama_alias');
    }

    /**
     * Store dari user (status default: Pending / Belum Verifikasi)
     */
    public function userstore(Request $request)
    {
        $validated = $request->validate([
            'nama'               => 'required|string|max:255',
            'nik'                => 'required|string|max:32',
            'alamat'             => 'required|string',
            'nama_pemilih'       => 'required|string|max:255',
            'no_akta_kelahiran'  => 'nullable|string|max:100',
            'nama_orang_tua'     => 'nullable|string|max:255',
            'alias'              => 'nullable|string|max:255',
            'data_alias_dihapus' => 'nullable|string|max:255',
            'berdasarkan'        => 'nullable|string|max:1000',
            'status_surat'       => 'nullable|string',
            'status_verif'       => 'nullable|string',
            'nowa'               => 'required|string|max:20',
        ]);

        $payload = array_merge($validated, [
            'status_surat' => $validated['status_surat'] ?? 'Pending',
            'status_verif' => $validated['status_verif'] ?? 'Belum Verifikasi',
        ]);

        // Pengajuan user TIDAK langsung terbit nomor
        surat_pernyataan_memilih_nama_alias::create($payload);

        return redirect()->route('surat.suratberhasil')
            ->with('success', 'Surat berhasil diajukan.');
    }

    /**
     * Store dari admin (bisa langsung terbit nomor jika status memenuhi)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'               => 'required|string|max:255',
            'nik'                => 'required|string|max:32',
            'alamat'             => 'required|string',
            'nama_pemilih'       => 'required|string|max:255',
            'no_akta_kelahiran'  => 'nullable|string|max:100',
            'nama_orang_tua'     => 'nullable|string|max:255',
            'alias'              => 'nullable|string|max:255',
            'data_alias_dihapus' => 'nullable|string|max:255',
            'berdasarkan'        => 'nullable|string|max:1000',
            'status_surat'       => 'required|string',
            'status_verif'       => 'required|string',
            'nowa'               => 'required|string|max:20',
        ]);

        $payload = $validated;

        // Admin boleh langsung assign nomor bila status + verif sudah final
        $this->maybeAssignNomorSurat(null, $payload);

        surat_pernyataan_memilih_nama_alias::create($payload);

        return redirect()->route('surat.keluar')
            ->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Form edit
     */
    public function edit(surat_pernyataan_memilih_nama_alias $surat)
    {
        return view('surat.edit_surat_pernyataan_memilih_nama_alias', compact('surat'));
    }

    /**
     * Update data; jika status berubah ke final, nomor akan diterbitkan
     */
    public function update(Request $request, surat_pernyataan_memilih_nama_alias $surat)
    {
        $validated = $request->validate([
            'nama'               => 'required|string|max:255',
            'nik'                => 'required|string|max:32',
            'alamat'             => 'required|string',
            'nama_pemilih'       => 'required|string|max:255',
            'no_akta_kelahiran'  => 'nullable|string|max:100',
            'nama_orang_tua'     => 'nullable|string|max:255',
            'alias'              => 'nullable|string|max:255',
            'data_alias_dihapus' => 'nullable|string|max:255',
            'berdasarkan'        => 'nullable|string|max:1000',
            'status_surat'       => 'required|string',
            'status_verif'       => 'required|string',
            'nowa'               => 'required|string|max:20',
        ]);

        $payload = $validated;

        // Terbitkan nomor jika memenuhi syarat & belum punya nomor
        $this->maybeAssignNomorSurat($surat, $payload);

        $surat->update($payload);

        return redirect()->route('surat.keluar')->with('success', 'Surat berhasil diperbarui.');
    }

    /**
     * Hapus data
     */
    public function destroy(surat_pernyataan_memilih_nama_alias $surat)
    {
        $surat->delete();
        return back()->with('success', 'Surat berhasil dihapus.');
    }
}
