<?php

namespace App\Http\Controllers;

use App\Models\surat_pernyataan_anak_seorang_nama_ibu;
use Illuminate\Http\Request;

class SuratPernyataanAnakSeorangNamaIbuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = surat_pernyataan_anak_seorang_nama_ibu::all();
        return view('surat.surat_pernyataan_anak_seorang_nama_ibu', compact('data'));
    }

    public function user_anakseorangibu()
    {
        $data = surat_pernyataan_anak_seorang_nama_ibu::all();
        return view('surat.user_surat_pernyataan_anak_seorang_nama_ibu', compact('data'));
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
            'nama'          => 'required|string|max:255',
            'nik'           => 'required|string|max:32',
            'alamat'        => 'required|string',
            'nama_anak'     => 'required|string|max:255',
            'tempat_lahir'  => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'nowa'          => 'required|string|max:20',
            'status_surat'  => 'nullable|string',
            'status_verif'  => 'nullable|string',
        ]);

        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        surat_pernyataan_anak_seorang_nama_ibu::create($validated);

        return redirect()->route('surat.suratberhasil')
            ->with('success', 'Surat Pernyataan Anak Seorang Nama Ibu berhasil disimpan.');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'          => 'required|string|max:255',
            'nik'           => 'required|string|max:32',
            'alamat'        => 'required|string',
            'nama_anak'     => 'required|string|max:255',
            'tempat_lahir'  => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'nowa'          => 'required|string|max:20',
            'status_surat'  => 'nullable|string',
            'status_verif'  => 'nullable|string',
        ]);

        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        surat_pernyataan_anak_seorang_nama_ibu::create($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat Pernyataan Anak Seorang Nama Ibu berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\surat_pernyataan_anak_seorang_nama_ibu  $surat_pernyataan_anak_seorang_nama_ibu
     * @return \Illuminate\Http\Response
     */
    public function show(surat_pernyataan_anak_seorang_nama_ibu $surat_pernyataan_anak_seorang_nama_ibu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\surat_pernyataan_anak_seorang_nama_ibu  $surat_pernyataan_anak_seorang_nama_ibu
     * @return \Illuminate\Http\Response
     */
    public function edit(surat_pernyataan_anak_seorang_nama_ibu $surat)
    {
        return view('surat.edit_surat_pernyataan_anak_seorang_nama_ibu', compact('surat'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\surat_pernyataan_anak_seorang_nama_ibu  $surat_pernyataan_anak_seorang_nama_ibu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, surat_pernyataan_anak_seorang_nama_ibu $surat)
    {
        $validated = $request->validate([
            'nama'          => 'required|string|max:255',
            'nik'           => 'required|string|max:32',
            'alamat'        => 'required|string',
            'nama_anak'     => 'required|string|max:255',
            'tempat_lahir'  => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'nowa'          => 'required|string|max:20',
            'status_surat'  => 'nullable|string',
            'status_verif'  => 'nullable|string',
        ]);

        $surat->update($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat Pernyataan Anak Seorang Nama Ibu berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_pernyataan_anak_seorang_nama_ibu  $surat_pernyataan_anak_seorang_nama_ibu
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_pernyataan_anak_seorang_nama_ibu $surat_pernyataan_anak_seorang_nama_ibu)
    {
        //
    }
}
