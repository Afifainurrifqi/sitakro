<?php

namespace App\Http\Controllers;

use App\Models\surat_sptjm_kematian;
use Illuminate\Http\Request;

class SuratSptjmKematianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = surat_sptjm_kematian::all();
        return view('surat.sptjm_kematian', compact('data'));
    }

    public function user()
    {
        return view('surat.user_sptjm_kematian');
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            // Pelapor
            'nama'          => 'required|string|max:255',
            'nik'           => 'required|string|max:32',
            'ttl_tempat'    => 'required|string|max:100',
            'ttl_tanggal'   => 'required|date',
            'pekerjaan'     => 'required|string|max:100',
            'alamat'        => 'required|string',

            // Menyatakan (Jenazah)
            'nama_jenazah'        => 'required|string|max:255',
            'nik_jenazah'         => 'required|string|max:32',
            'ttl_tempat_jenazah'  => 'required|string|max:100',
            'ttl_tanggal_jenazah' => 'required|date',
            'jenis_kelamin'       => 'required',
            'anak_ke'             => 'required|integer|min:1', // ⬅️ integer tunggal
            'nama_ayah_kandung'   => 'required|string|max:255',
            'nama_ibu_kandung'    => 'required|string|max:255',

            // umum
            'nowa'         => 'required|string|max:20',
            'status_surat' => 'nullable|string',
            'status_verif' => 'nullable|string',
        ]);

        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        surat_sptjm_kematian::create($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'SPTJM Kematian berhasil disimpan.');
    }

    public function userstore(Request $request)
    {
        $validated = $request->validate([
            // Pelapor
            'nama'          => 'required|string|max:255',
            'nik'           => 'required|string|max:32',
            'ttl_tempat'    => 'required|string|max:100',
            'ttl_tanggal'   => 'required|date',
            'pekerjaan'     => 'required|string|max:100',
            'alamat'        => 'required|string',

            // Menyatakan (Jenazah)
            'nama_jenazah'        => 'required|string|max:255',
            'nik_jenazah'         => 'required|string|max:32',
            'ttl_tempat_jenazah'  => 'required|string|max:100',
            'ttl_tanggal_jenazah' => 'required|date',
            'jenis_kelamin'       => 'required',
            'anak_ke'             => 'required|integer|min:1', // ⬅️ integer tunggal
            'nama_ayah_kandung'   => 'required|string|max:255',
            'nama_ibu_kandung'    => 'required|string|max:255',

            // umum
            'nowa'         => 'required|string|max:20',
            'status_surat' => 'nullable|string',
            'status_verif' => 'nullable|string',
        ]);

        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        surat_sptjm_kematian::create($validated);

        return redirect()->route('surat.suratberhasil')
            ->with('success', 'SPTJM Kematian berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\surat_sptjm_kematian  $surat_sptjm_kematian
     * @return \Illuminate\Http\Response
     */
    public function show(surat_sptjm_kematian $surat_sptjm_kematian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\surat_sptjm_kematian  $surat_sptjm_kematian
     * @return \Illuminate\Http\Response
     */
    public function edit(surat_sptjm_kematian $surat)
    {
        return view('surat.edit_sptjm_kematian', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\surat_sptjm_kematian  $surat_sptjm_kematian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, surat_sptjm_kematian $surat)
    {
        $validated = $request->validate([
            // Pelapor
            'nama'          => 'required|string|max:255',
            'nik'           => 'required|string|max:32',
            'ttl_tempat'    => 'required|string|max:100',
            'ttl_tanggal'   => 'required|date',
            'pekerjaan'     => 'required|string|max:100',
            'alamat'        => 'required|string',

            // Menyatakan (Jenazah)
            'nama_jenazah'        => 'required|string|max:255',
            'nik_jenazah'         => 'required|string|max:32',
            'ttl_tempat_jenazah'  => 'required|string|max:100',
            'ttl_tanggal_jenazah' => 'required|date',
            'jenis_kelamin'       => 'required',
            'anak_ke'             => 'required|integer|min:1', // ⬅️ integer tunggal
            'nama_ayah_kandung'   => 'required|string|max:255',
            'nama_ibu_kandung'    => 'required|string|max:255',

            // umum
            'nowa'         => 'required|string|max:20',
            'status_surat' => 'nullable|string',
            'status_verif' => 'nullable|string',
        ]);

        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        $surat->update($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'SPTJM Kematian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_sptjm_kematian  $surat_sptjm_kematian
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_sptjm_kematian $surat_sptjm_kematian)
    {
        //
    }
}
