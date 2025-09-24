<?php

namespace App\Http\Controllers;

use App\Models\surat_keterangan_kematian_desa;
use Illuminate\Http\Request;

class SuratKeteranganKematianDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = surat_keterangan_kematian_desa::all();
        return view('surat.surat_keterangan_kematian_desa', compact('data'));
    }

    public function user_kematian()
    {
        $data = surat_keterangan_kematian_desa::all();
        return view('surat.user_surat_keterangan_kematian_desa', compact('data'));
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

     public function userstore(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap'    => 'required|string|max:255',
            'jenis_kelamin'   => 'required|string|max:20',
            'kewarganegaraan' => 'required|string|max:50',
            'status'          => 'required|string|max:50',
            'pekerjaan'       => 'required|string|max:100',
            'alamat'          => 'required|string|max:255',

            'hari'     => 'required|string|max:20',
            'tanggal'  => 'required|date',
            'penyebab' => 'required|string|max:255',

            'status_surat' => 'nullable|string',
            'status_verif' => 'nullable|string',
            'nowa'         => 'required|string|max:20',
        ]);

        surat_keterangan_kematian_desa::create($validated);

        return redirect()->route('surat.suratberhasil')
            ->with('success', 'Surat Keterangan Kematian Desa berhasil dibuat.');
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
            'nama_lengkap'    => 'required|string|max:255',
            'jenis_kelamin'   => 'required|string|max:20',
            'kewarganegaraan' => 'required|string|max:50',
            'status'          => 'required|string|max:50',
            'pekerjaan'       => 'required|string|max:100',
            'alamat'          => 'required|string|max:255',

            'hari'     => 'required|string|max:20',
            'tanggal'  => 'required|date',
            'penyebab' => 'required|string|max:255',

            'status_surat' => 'nullable|string',
            'status_verif' => 'nullable|string',
            'nowa'         => 'required|string|max:20',
        ]);

        surat_keterangan_kematian_desa::create($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat Keterangan Kematian Desa berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\surat_keterangan_kematian_desa  $surat_keterangan_kematian_desa
     * @return \Illuminate\Http\Response
     */
    public function show(surat_keterangan_kematian_desa $surat_keterangan_kematian_desa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\surat_keterangan_kematian_desa  $surat_keterangan_kematian_desa
     * @return \Illuminate\Http\Response
     */
    public function edit(surat_keterangan_kematian_desa $surat)
    {
        return view('surat.edit_surat_keterangan_kematian_desa', compact('surat'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\surat_keterangan_kematian_desa  $surat_keterangan_kematian_desa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, surat_keterangan_kematian_desa $surat)
    {
        $validated = $request->validate([
            'nama_lengkap'    => 'required|string|max:255',
            'jenis_kelamin'   => 'required|string|max:20',
            'kewarganegaraan' => 'required|string|max:50',
            'status'          => 'required|string|max:50',
            'pekerjaan'       => 'required|string|max:100',
            'alamat'          => 'required|string|max:255',

            'hari'     => 'required|string|max:20',
            'tanggal'  => 'required|date',
            'penyebab' => 'required|string|max:255',

            'status_surat' => 'nullable|string',
            'status_verif' => 'nullable|string',
            'nowa'         => 'required|string|max:20',
        ]);

        $surat->update($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat Keterangan Kematian Desa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_keterangan_kematian_desa  $surat_keterangan_kematian_desa
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_keterangan_kematian_desa $surat_keterangan_kematian_desa)
    {
        //
    }
}
