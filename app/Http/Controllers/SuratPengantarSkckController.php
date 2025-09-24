<?php

namespace App\Http\Controllers;

use App\Models\SuratPengantarSkck;
use Illuminate\Http\Request;

class SuratPengantarSkckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SuratPengantarSkck::all();
        return view('surat.surat_pengantar_skck', compact('data'));
    }

    public function userskck()
    {
        $data = SuratPengantarSkck::all();
        return view('surat.user_surat_pengantar_skck', compact('data'));
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
            'tempat_lahir'    => 'required|string|max:100',
            'tanggal_lahir'   => 'required|date',
            'jenis_kelamin'   => 'required|string|max:20',
            'kewarganegaraan' => 'required|string|max:50',
            'status'          => 'required|string|max:50',
            'nik'             => 'required|string|max:32',
            'agama'           => 'required|string|max:50',
            'pendidikan'      => 'required|string|max:100',
            'pekerjaan'       => 'required|string|max:100',
            'alamat'          => 'required|string',
            'keperuntukan'    => 'required|string|max:255',
            'nowa'            => 'required|string|max:20',
            'status_surat'    => 'nullable|string',
            'status_verif'    => 'nullable|string',
        ]);

        SuratPengantarSkck::create($validated);

        return redirect()->route('surat.suratberhasil')
            ->with('success', 'Surat Pengantar SKCK berhasil dibuat.');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'            => 'required|string|max:255',
            'tempat_lahir'    => 'required|string|max:100',
            'tanggal_lahir'   => 'required|date',
            'jenis_kelamin'   => 'required|string|max:20',
            'kewarganegaraan' => 'required|string|max:50',
            'status'          => 'required|string|max:50',
            'nik'             => 'required|string|max:32',
            'agama'           => 'required|string|max:50',
            'pendidikan'      => 'required|string|max:100',
            'pekerjaan'       => 'required|string|max:100',
            'alamat'          => 'required|string',
            'keperuntukan'    => 'required|string|max:255',
            'nowa'            => 'required|string|max:20',
            'status_surat'    => 'nullable|string',
            'status_verif'    => 'nullable|string',
        ]);

        SuratPengantarSkck::create($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat Pengantar SKCK berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuratPengantarSkck  $suratPengantarSkck
     * @return \Illuminate\Http\Response
     */
    public function show(SuratPengantarSkck $suratPengantarSkck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuratPengantarSkck  $suratPengantarSkck
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surat = SuratPengantarSkck::findOrFail($id);
        return view('surat.edit_surat_pengantar_skck', compact('surat'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuratPengantarSkck  $suratPengantarSkck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratPengantarSkck $skck)
    {
        $validated = $request->validate([
            'nama'            => 'required|string|max:255',
            'tempat_lahir'    => 'required|string|max:100',
            'tanggal_lahir'   => 'required|date',
            'jenis_kelamin'   => 'required|string|max:20',
            'kewarganegaraan' => 'required|string|max:50',
            'status'          => 'required|string|max:50',
            'nik'             => 'required|string|max:32',
            'agama'           => 'required|string|max:50',
            'pendidikan'      => 'required|string|max:100',
            'pekerjaan'       => 'required|string|max:100',
            'alamat'          => 'required|string',
            'keperuntukan'    => 'required|string|max:255',
            'nowa'            => 'required|string|max:20',
            'status_surat'    => 'nullable|string',
            'status_verif'    => 'nullable|string',
        ]);

        $skck->update($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat Pengantar SKCK berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuratPengantarSkck  $suratPengantarSkck
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratPengantarSkck $suratPengantarSkck)
    {
        //
    }
}
