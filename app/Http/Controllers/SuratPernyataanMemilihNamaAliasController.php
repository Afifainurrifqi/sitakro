<?php

namespace App\Http\Controllers;

use App\Models\surat_pernyataan_memilih_nama_alias;
use Illuminate\Http\Request;

class SuratPernyataanMemilihNamaAliasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = surat_pernyataan_memilih_nama_alias::all();
        return view('surat.surat_pernyataan_memilih_nama_alias', compact('data'));
    }

    public function usernamaalias()
    {
        return view('surat.user_surat_pernyataan_memilih_nama_alias');
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
        $validatedData = $request->validate([
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

        surat_pernyataan_memilih_nama_alias::create($validatedData);

        return redirect()->route('surat.suratberhasil')
            ->with('success', 'surat berhasil di ajukan.');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
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

        surat_pernyataan_memilih_nama_alias::create($validatedData);

        return redirect()->route('surat.keluar')
            ->with('success', 'Data berhasil disimpan dan diarahkan ke arsip surat keluar.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\surat_pernyataan_memilih_nama_alias  $surat_pernyataan_memilih_nama_alias
     * @return \Illuminate\Http\Response
     */
    public function show(surat_pernyataan_memilih_nama_alias $surat_pernyataan_memilih_nama_alias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\surat_pernyataan_memilih_nama_alias  $surat_pernyataan_memilih_nama_alias
     * @return \Illuminate\Http\Response
     */
    public function edit(surat_pernyataan_memilih_nama_alias $surat)
    {
        return view('surat.edit_surat_pernyataan_memilih_nama_alias', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\surat_pernyataan_memilih_nama_alias  $surat_pernyataan_memilih_nama_alias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, surat_pernyataan_memilih_nama_alias $surat)
    {
        $validatedData = $request->validate([
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

        $surat->update($validatedData);

        return redirect()->route('surat.keluar')->with('success', 'Surat berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_pernyataan_memilih_nama_alias  $surat_pernyataan_memilih_nama_alias
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_pernyataan_memilih_nama_alias $surat_pernyataan_memilih_nama_alias)
    {
        //
    }
}
