<?php

namespace App\Http\Controllers;

use App\Models\surat_pernyataan_akta_barcode_nomor_sama;
use Illuminate\Http\Request;

class SuratPernyataanAktaBarcodeNomorSamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('surat.surat_pernyataan_akta_barcode_nomor_sama');
    }

    public function user()
    {
        return view('surat.user_surat_pernyataan_akta_barcode_nomor_sama');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userstore(Request $request)
    {
        $validated = $request->validate([
            'nama'            => 'required|string|max:255',
            'nik'             => 'required|string|max:32',
            'alamat'          => 'required|string',
            'nama_dalam_akta' => 'required|string|max:255',
            'no_akta'         => 'required|string|max:100',
            'nomor'           => 'required|string|max:100',
            'nowa'            => 'required|string|max:20',
            'status_surat'    => 'nullable|string',
            'status_verif'    => 'nullable|string',
        ]);

        // Default status utk user
        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        surat_pernyataan_akta_barcode_nomor_sama::create($validated);

        return redirect()->route('surat.suratberhasil')
            ->with('success', 'Pernyataan Akta Barcode Nomor Sama berhasil disimpan.');
    }

    /**
     * Simpan dari form ADMIN.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'            => 'required|string|max:255',
            'nik'             => 'required|string|max:32',
            'alamat'          => 'required|string',
            'nama_dalam_akta' => 'required|string|max:255',
            'no_akta'         => 'required|string|max:100',
            'nomor'           => 'required|string|max:100',
            'nowa'            => 'required|string|max:20',
            'status_surat'    => 'nullable|string',
            'status_verif'    => 'nullable|string',
        ]);

        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        surat_pernyataan_akta_barcode_nomor_sama::create($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'Pernyataan Akta Barcode Nomor Sama berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\surat_pernyataan_akta_barcode_nomor_sama  $surat_pernyataan_akta_barcode_nomor_sama
     * @return \Illuminate\Http\Response
     */
    public function show(surat_pernyataan_akta_barcode_nomor_sama $surat_pernyataan_akta_barcode_nomor_sama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\surat_pernyataan_akta_barcode_nomor_sama  $surat_pernyataan_akta_barcode_nomor_sama
     * @return \Illuminate\Http\Response
     */
    public function edit(surat_pernyataan_akta_barcode_nomor_sama $surat)
    {
        return view('surat.edit_surat_pernyataan_akta_barcode_nomor_sama', compact('surat'));
    }

    /**
     * Update (admin).
     */
    public function update(Request $request, surat_pernyataan_akta_barcode_nomor_sama $surat)
    {
        $validated = $request->validate([
            'nama'            => 'required|string|max:255',
            'nik'             => 'required|string|max:32',
            'alamat'          => 'required|string',
            'nama_dalam_akta' => 'required|string|max:255',
            'no_akta'         => 'required|string|max:100',
            'nomor'           => 'required|string|max:100',
            'nowa'            => 'required|string|max:20',
            'status_surat'    => 'nullable|string',
            'status_verif'    => 'nullable|string',
        ]);

        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        $surat->update($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'Pernyataan Akta Barcode Nomor Sama berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_pernyataan_akta_barcode_nomor_sama  $surat_pernyataan_akta_barcode_nomor_sama
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_pernyataan_akta_barcode_nomor_sama $surat_pernyataan_akta_barcode_nomor_sama)
    {
        //
    }
}
