<?php

namespace App\Http\Controllers;

use App\Models\nama_alias_ortu;
use Illuminate\Http\Request;
use App\Services\NomorSuratService;

class NamaAliasOrtuController extends Controller
{
    public function __construct(private NomorSuratService $svc) {}

    /**
     * Jika status "Di terima" + "Terverifikasi", assign nomor_surat
     * khusus jenis 'alias_ortu' (counter terpisah dari jenis lain).
     * - Tidak menimpa nomor yang sudah ada.
     * - Mengisi nomor_urut, tahun_nomor, nomor_surat.
     */
    protected function maybeAssignNomorSurat($suratOrNull, array &$payload): void
    {
        $status = $payload['status_surat'] ?? ($suratOrNull->status_surat ?? null);
        $verif  = $payload['status_verif'] ?? ($suratOrNull->status_verif ?? null);

        if ($status === 'Di terima' && $verif === 'Terverifikasi'
            && empty($payload['nomor_surat'])
            && empty($suratOrNull?->nomor_surat)) {

            $issued = $this->svc->issue('alias_ortu'); // ['urut'=>int,'tahun'=>int,'nomor_surat'=>string]
            $payload['nomor_urut']  = $issued['urut'];
            $payload['tahun_nomor'] = $issued['tahun'];
            $payload['nomor_surat'] = $issued['nomor_surat'];
        }
    }

    /** ================== LIST / FORM ================== */

    public function index()
    {
        $data = nama_alias_ortu::orderBy('_id', 'desc')->get();
        return view('surat.surat_pernyataan_memilih_nama_alias_satu_ortu', compact('data'));
    }

    public function usernamaaliasortu()
    {
        return view('surat.user_surat_pernyataan_memilih_nama_alias_satu_ortu');
    }

    public function create()
    {
        return view('surat.surat_pernyataan_memilih_nama_alias_satu_ortu');
    }

    /** ================== STORE (USER) ================== */

    public function userstore(Request $request)
    {
        $validated = $request->validate([
            // data utama
            'nama'               => 'required|string|max:255',
            'nik'                => 'required|string|max:32',
            'alamat'             => 'required|string',
            'nama_menyatakan'    => 'required|string|max:255',
            'no_akta_kelahiran'  => 'nullable|string|max:100',

            // orang tua & alias
            'nama_ortu_ayah_tercatat' => 'nullable|string|max:255',
            'nama_alias_ayah'         => 'nullable|string|max:255',
            'nama_ortu_ibu_tercatat'  => 'nullable|string|max:255',
            'nama_alias_ibu'          => 'nullable|string|max:255',

            // alias yang dihapus
            'nama_alias_dihapus_1' => 'nullable|string|max:255',
            'nama_alias_dihapus_2' => 'nullable|string|max:255',

            'berdasarkan' => 'nullable|string|max:1000',

            // status & kontak
            'status_surat' => 'nullable|string',
            'status_verif' => 'nullable|string',
            'nowa'         => 'required|string|max:20',
        ]);

        // default status untuk pengajuan user
        $payload = array_merge($validated, [
            'status_surat' => $validated['status_surat'] ?? 'Pending',
            'status_verif' => $validated['status_verif'] ?? 'Belum Verifikasi',
        ]);

        // Pengajuan user tidak langsung diberi nomor
        nama_alias_ortu::create($payload);

        return redirect()->route('surat.suratberhasil')
            ->with('success', 'Data berhasil diajukan.');
    }

    /** ================== STORE (ADMIN) ================== */

    public function store(Request $request)
    {
        $validated = $request->validate([
            // data utama
            'nama'               => 'required|string|max:255',
            'nik'                => 'required|string|max:32',
            'alamat'             => 'required|string',
            'nama_menyatakan'    => 'required|string|max:255',
            'no_akta_kelahiran'  => 'nullable|string|max:100',

            // orang tua & alias
            'nama_ortu_ayah_tercatat' => 'nullable|string|max:255',
            'nama_alias_ayah'         => 'nullable|string|max:255',
            'nama_ortu_ibu_tercatat'  => 'nullable|string|max:255',
            'nama_alias_ibu'          => 'nullable|string|max:255',

            // alias yang dihapus
            'nama_alias_dihapus_1' => 'nullable|string|max:255',
            'nama_alias_dihapus_2' => 'nullable|string|max:255',

            'berdasarkan' => 'nullable|string|max:1000',

            // status & kontak
            'status_surat' => 'required|string',
            'status_verif' => 'required|string',
            'nowa'         => 'required|string|max:20',
        ]);

        $payload = $validated;

        // Admin boleh langsung terbitkan nomor bila status final
        $this->maybeAssignNomorSurat(null, $payload);

        nama_alias_ortu::create($payload);

        return redirect()->route('surat.keluar')
            ->with('success', 'Data berhasil disimpan.');
    }

    /** ================== EDIT / UPDATE ================== */

    public function edit(nama_alias_ortu $surat)
    {
        return view('surat.edit_surat_pernyataan_memilih_nama_alias_satu_ortu', compact('surat'));
    }

    public function update(Request $request, nama_alias_ortu $surat)
    {
        $validated = $request->validate([
            // data utama
            'nama'               => 'required|string|max:255',
            'nik'                => 'required|string|max:32',
            'alamat'             => 'required|string',
            'nama_menyatakan'    => 'required|string|max:255',
            'no_akta_kelahiran'  => 'nullable|string|max:100',

            // orang tua & alias
            'nama_ortu_ayah_tercatat' => 'nullable|string|max:255',
            'nama_alias_ayah'         => 'nullable|string|max:255',
            'nama_ortu_ibu_tercatat'  => 'nullable|string|max:255',
            'nama_alias_ibu'          => 'nullable|string|max:255',

            // alias yang dihapus
            'nama_alias_dihapus_1' => 'nullable|string|max:255',
            'nama_alias_dihapus_2' => 'nullable|string|max:255',

            'berdasarkan' => 'nullable|string|max:1000',

            // status & kontak
            'status_surat' => 'required|string',
            'status_verif' => 'required|string',
            'nowa'         => 'required|string|max:20',
        ]);

        $payload = $validated;

        // Terbitkan nomor jika memenuhi syarat & belum ada
        $this->maybeAssignNomorSurat($surat, $payload);

        $surat->update($payload);

        return redirect()->route('surat.keluar')->with('success', 'Surat alias (satu ortu) berhasil diperbarui.');
    }

    /** ================== DELETE ================== */

    public function destroy(nama_alias_ortu $surat)
    {
        $surat->delete();
        return back()->with('success', 'Surat berhasil dihapus.');
    }
}
