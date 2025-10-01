<?php

namespace App\Http\Controllers;

use App\Models\surat_pernyataan_dan_jaminan;
use Illuminate\Http\Request;
use App\Services\NomorSuratService;

class SuratPernyataanDanJaminanController extends Controller
{
    public function __construct(private NomorSuratService $svc) {}

    /**
     * Cek & assign nomor surat jika status "Di terima" + "Terverifikasi"
     */
    protected function maybeAssignNomorSurat($suratOrNull, array &$payload): void
    {
        $status = $payload['status_surat'] ?? ($suratOrNull->status_surat ?? null);
        $verif  = $payload['status_verif'] ?? ($suratOrNull->status_verif ?? null);

        if ($status === 'Di terima' && $verif === 'Terverifikasi'
            && empty($payload['nomor_surat'])
            && empty($suratOrNull?->nomor_surat)) {

            $tahun = now('Asia/Jakarta')->year;
            $issued = $this->svc->issue('jaminan', $tahun); // gunakan key "jaminan"

            $payload['nomor_urut']  = $issued['urut'];
            $payload['tahun_nomor'] = $issued['tahun'];
            $payload['nomor_surat'] = $issued['nomor_surat'];
        }
    }

    /**
     * List semua surat
     */
    public function index()
    {
        $data = surat_pernyataan_dan_jaminan::orderBy('_id','desc')->get();
        return view('surat.surat_pernyataan_dan_jaminan', compact('data'));
    }

    /**
     * Form untuk user
     */
    public function user_pernyataanjaminan()
    {
        return view('surat.user_surat_pernyataan_dan_jaminan');
    }

    /**
     * Store dari user
     */
    public function userstore(Request $request)
    {
        $validated = $request->validate([
            // pembuat (penjamin)
            'nama_pembuat'  => 'required|string|max:255',
            'nik_pembuat'   => 'required|string|max:32',
            'alamat_pembuat'=> 'required|string',
            'hubungan_dengan_terjamin' => 'required|string|max:100',

            // terjamin
            'nama_terjamin' => 'required|string|max:255',
            'nik_terjamin'  => 'required|string|max:32',
            'alamat_terjamin' => 'required|string',

            // isi
            'uraian_pernyataan' => 'required|string',
            'bentuk_jaminan'    => 'nullable|string|max:255',
            'berlaku_mulai'     => 'required|date',
            'berlaku_sampai'    => 'nullable|date|after_or_equal:berlaku_mulai',

            'berdasarkan'   => 'nullable|string|max:1000',

            // status & kontak
            'status_surat'  => 'nullable|string',
            'status_verif'  => 'nullable|string',
            'nowa'          => 'required|string|max:20',
        ]);

        $payload = array_merge($validated, [
            'status_surat' => $validated['status_surat'] ?? 'Pending',
            'status_verif' => $validated['status_verif'] ?? 'Belum Verifikasi',
        ]);

        surat_pernyataan_dan_jaminan::create($payload);

        return redirect()->route('surat.suratberhasil')
            ->with('success', 'Surat berhasil diajukan.');
    }

    /**
     * Store dari admin
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pembuat'  => 'required|string|max:255',
            'nik_pembuat'   => 'required|string|max:32',
            'alamat_pembuat'=> 'required|string',
            'hubungan_dengan_terjamin' => 'required|string|max:100',

            'nama_terjamin' => 'required|string|max:255',
            'nik_terjamin'  => 'required|string|max:32',
            'alamat_terjamin' => 'required|string',

            'uraian_pernyataan' => 'required|string',
            'bentuk_jaminan'    => 'nullable|string|max:255',
            'berlaku_mulai'     => 'required|date',
            'berlaku_sampai'    => 'nullable|date|after_or_equal:berlaku_mulai',

            'berdasarkan'   => 'nullable|string|max:1000',

            'status_surat'  => 'required|string',
            'status_verif'  => 'required|string',
            'nowa'          => 'required|string|max:20',
        ]);

        $payload = $validated;

        // admin bisa langsung assign nomor
        $this->maybeAssignNomorSurat(null, $payload);

        surat_pernyataan_dan_jaminan::create($payload);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat berhasil dibuat.');
    }

    /**
     * Form edit
     */
    public function edit(surat_pernyataan_dan_jaminan $surat)
    {
        return view('surat.edit_surat_pernyataan_dan_jaminan', compact('surat'));
    }

    /**
     * Update surat
     */
    public function update(Request $request, surat_pernyataan_dan_jaminan $surat)
    {
        $validated = $request->validate([
            'nama_pembuat'  => 'required|string|max:255',
            'nik_pembuat'   => 'required|string|max:32',
            'alamat_pembuat'=> 'required|string',
            'hubungan_dengan_terjamin' => 'required|string|max:100',

            'nama_terjamin' => 'required|string|max:255',
            'nik_terjamin'  => 'required|string|max:32',
            'alamat_terjamin' => 'required|string',

            'uraian_pernyataan' => 'required|string',
            'bentuk_jaminan'    => 'nullable|string|max:255',
            'berlaku_mulai'     => 'required|date',
            'berlaku_sampai'    => 'nullable|date|after_or_equal:berlaku_mulai',

            'berdasarkan'   => 'nullable|string|max:1000',

            'status_surat'  => 'required|string',
            'status_verif'  => 'required|string',
            'nowa'          => 'required|string|max:20',
        ]);

        $payload = $validated;

        $this->maybeAssignNomorSurat($surat, $payload);

        $surat->update($payload);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat berhasil diperbarui.');
    }

    /**
     * Hapus surat
     */
    public function destroy(surat_pernyataan_dan_jaminan $surat)
    {
        $surat->delete();
        return back()->with('success', 'Surat berhasil dihapus.');
    }
}
