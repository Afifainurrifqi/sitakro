<?php

namespace App\Http\Controllers;

use App\Models\surat_pernyataan_belum_akta;
use Illuminate\Http\Request;

class SuratPernyataanBelumAktaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = surat_pernyataan_belum_akta::all();
        return view('surat.surat_pernyataan_ belum_akta', compact('data'));
    }

    public function user_form()
    {
        return view('surat.user_surat_pernyataan_ belum_akta');
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
            // Yang bertandatangan
            'ybt_nama'   => 'required|string|max:255',
            'ybt_nik'    => 'required|string|max:32',
            'ybt_alamat' => 'required|string',

            // Menyatakan bahwa
            'subjek_nama'          => 'required|string|max:255',
            'subjek_tempat_lahir'  => 'required|string|max:100',
            'subjek_tanggal_lahir' => 'required|date',

            // umum
            'status_surat' => 'nullable|string',
            'status_verif' => 'nullable|string',
            'nowa'         => 'required|string|max:20',
        ]);

        // Default status bila tidak diisi
        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        surat_pernyataan_belum_akta::create($validated);

        return redirect()->route('surat.suratberhasil')
            ->with('success', 'Surat Pernyataan Belum Pernah Mengurus Akta Kelahiran berhasil disimpan.');
    }

    /**
     * Optional: create (tidak dipakai karena form user/admin sudah ada).
     */

    /**
     * Admin submit -> simpan data.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // Yang bertandatangan
            'ybt_nama'   => 'required|string|max:255',
            'ybt_nik'    => 'required|string|max:32',
            'ybt_alamat' => 'required|string',

            // Menyatakan bahwa
            'subjek_nama'          => 'required|string|max:255',
            'subjek_tempat_lahir'  => 'required|string|max:100',
            'subjek_tanggal_lahir' => 'required|date',

            // umum
            'status_surat' => 'nullable|string',
            'status_verif' => 'nullable|string',
            'nowa'         => 'required|string|max:20',
        ]);

        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        surat_pernyataan_belum_akta::create($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat Pernyataan Belum Pernah Mengurus Akta Kelahiran berhasil disimpan.');
    }

    /**
     * Show a single resource (optional).
     */
    public function show(surat_pernyataan_belum_akta $surat_pernyataan_belum_akta)
    {
        //
    }

    /**
     * Admin: form edit.
     */
    public function edit(surat_pernyataan_belum_akta $surat)
    {
        return view('surat.edit_surat_pernyataan_ belum_akta', compact('surat'));
    }

    /**
     * Admin: update data.
     */
    public function update(Request $request, surat_pernyataan_belum_akta $surat)
    {
        $validated = $request->validate([
            // Yang bertandatangan
            'ybt_nama'   => 'required|string|max:255',
            'ybt_nik'    => 'required|string|max:32',
            'ybt_alamat' => 'required|string',

            // Menyatakan bahwa
            'subjek_nama'          => 'required|string|max:255',
            'subjek_tempat_lahir'  => 'required|string|max:100',
            'subjek_tanggal_lahir' => 'required|date',

            // umum
            'status_surat' => 'nullable|string',
            'status_verif' => 'nullable|string',
            'nowa'         => 'required|string|max:20',
        ]);

        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        $surat->update($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat Pernyataan Belum Pernah Mengurus Akta Kelahiran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_pernyataan_belum_akta  $surat_pernyataan_belum_akta
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_pernyataan_belum_akta $surat_pernyataan_belum_akta)
    {
        //
    }
}
