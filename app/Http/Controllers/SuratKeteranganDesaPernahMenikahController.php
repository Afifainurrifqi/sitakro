<?php

namespace App\Http\Controllers;

use App\Models\surat_keterangan_desa_pernah_menikah;
use Illuminate\Http\Request;

class SuratKeteranganDesaPernahMenikahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = surat_keterangan_desa_pernah_menikah::all();
        return view('surat.surat_keterangan_desa_pernah_menikah', compact('data'));
    }

    public function user_pernahmenikah()
    {
        $data = surat_keterangan_desa_pernah_menikah::all();
        return view('surat.user_surat_keterangan_desa_pernah_menikah', compact('data'));
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
            'nama_lengkap'      => 'required|string|max:255',
            'nik'               => 'required|string|max:32',
            'jenis_kelamin'     => 'required|string|max:30',
            'tempat_lahir'      => 'required|string|max:100',
            'tanggal_lahir'     => 'required|date',
            'agama'             => 'required|string|max:50',
            'kewarganegaraan'   => 'required|string|max:50',
            'status_perkawinan' => 'required|string|max:50',
            'pekerjaan'         => 'required|string|max:100',
            'alamat'            => 'required|string',
            'rt'                => 'required|string|max:10',
            'rw'                => 'required|string|max:10',
            'status_surat'      => 'required|string',
            'status_verif'      => 'required|string',
            'nowa'              => 'required|string|max:20',
        ]);

        surat_keterangan_desa_pernah_menikah::create($validated);

        return redirect()->route('surat.suratberhasil')->with('success', 'Surat Keterangan Desa Pernah Menikah berhasil disimpan.');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap'      => 'required|string|max:255',
            'nik'               => 'required|string|max:32',
            'jenis_kelamin'     => 'required|string|max:30',
            'tempat_lahir'      => 'required|string|max:100',
            'tanggal_lahir'     => 'required|date',
            'agama'             => 'required|string|max:50',
            'kewarganegaraan'   => 'required|string|max:50',
            'status_perkawinan' => 'required|string|max:50',
            'pekerjaan'         => 'required|string|max:100',
            'alamat'            => 'required|string',
            'rt'                => 'required|string|max:10',
            'rw'                => 'required|string|max:10',
            'status_surat'      => 'required|string',
            'status_verif'      => 'required|string',
            'nowa'              => 'required|string|max:20',
        ]);

        surat_keterangan_desa_pernah_menikah::create($validated);

        return redirect()->route('surat.keluar')->with('success', 'Surat Keterangan Desa Pernah Menikah berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\surat_keterangan_desa_pernah_menikah  $surat_keterangan_desa_pernah_menikah
     * @return \Illuminate\Http\Response
     */
    public function show(surat_keterangan_desa_pernah_menikah $surat_keterangan_desa_pernah_menikah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\surat_keterangan_desa_pernah_menikah  $surat_keterangan_desa_pernah_menikah
     * @return \Illuminate\Http\Response
     */
     public function edit(surat_keterangan_desa_pernah_menikah $surat)
    {
        return view('surat.edit_surat_keterangan_desa_pernah_menikah', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\surat_keterangan_desa_pernah_menikah  $surat_keterangan_desa_pernah_menikah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, surat_keterangan_desa_pernah_menikah $surat)
    {
        $validated = $request->validate([
            'nama_lengkap'      => 'required|string|max:255',
            'nik'               => 'required|string|max:32',
            'jenis_kelamin'     => 'required|string|max:30',
            'tempat_lahir'      => 'required|string|max:100',
            'tanggal_lahir'     => 'required|date',
            'agama'             => 'required|string|max:50',
            'kewarganegaraan'   => 'required|string|max:50',
            'status_perkawinan' => 'required|string|max:50',
            'pekerjaan'         => 'required|string|max:100',
            'alamat'            => 'required|string',
            'rt'                => 'required|string|max:10',
            'rw'                => 'required|string|max:10',
            'status_surat'      => 'required|string',
            'status_verif'      => 'required|string',
            'nowa'              => 'required|string|max:20',
        ]);

        $surat->update($validated);

        return redirect()->route('surat.keluar')->with('success', 'Surat Keterangan Desa Pernah Menikah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_keterangan_desa_pernah_menikah  $surat_keterangan_desa_pernah_menikah
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_keterangan_desa_pernah_menikah $surat_keterangan_desa_pernah_menikah)
    {
        //
    }
}
