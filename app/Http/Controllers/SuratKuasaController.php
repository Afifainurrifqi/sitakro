<?php

namespace App\Http\Controllers;

use App\Models\surat_kuasa;
use Illuminate\Http\Request;

class SuratKuasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = surat_kuasa::all();
        return view('surat.surat_kuasa', compact('data'));
    }

    public function user_kuasa()
    {
        $data = surat_kuasa::all();
        return view('surat.user_surat_kuasa', compact('data'));
    }

    public function userstore(Request $request)
    {
        $validated = $request->validate([
            // PIHAK 1 (Pemberi Kuasa)
            'p1_nama_lengkap'   => 'required|string|max:255',
            'p1_jenis_kelamin'  => 'required|string|max:20',
            'p1_tempat_lahir'   => 'required|string|max:100',
            'p1_tanggal_lahir'  => 'required|date',
            'p1_agama'          => 'required|string|max:50',
            'p1_status'         => 'required|string|max:50',
            'p1_nik'            => 'required|string|max:32',
            'p1_pekerjaan'      => 'required|string|max:100',
            'p1_alamat'         => 'required|string',

            // PIHAK 2 (Penerima Kuasa)
            'p2_nama_lengkap'   => 'required|string|max:255',
            'p2_jenis_kelamin'  => 'required|string|max:20',
            'p2_tempat_lahir'   => 'required|string|max:100',
            'p2_tanggal_lahir'  => 'required|date',
            'p2_agama'          => 'required|string|max:50',
            'p2_status'         => 'required|string|max:50',
            'p2_nik'            => 'required|string|max:32',
            'p2_pekerjaan'      => 'required|string|max:100',
            'p2_alamat'         => 'required|string',

            // umum
            'uraian_kuasa'      => 'nullable|string',
            'status_surat'      => 'nullable|string',
            'status_verif'      => 'nullable|string',
            'nowa'              => 'required|string|max:20',
        ]);

        // default untuk user
        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        surat_kuasa::create($validated);

        return redirect()->route('surat.suratberhasil')
            ->with('success', 'Surat Kuasa berhasil dibuat.');
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
            // PIHAK 1 (Pemberi Kuasa)
            'p1_nama_lengkap'   => 'required|string|max:255',
            'p1_jenis_kelamin'  => 'required|string|max:20',
            'p1_tempat_lahir'   => 'required|string|max:100',
            'p1_tanggal_lahir'  => 'required|date',
            'p1_agama'          => 'required|string|max:50',
            'p1_status'         => 'required|string|max:50',
            'p1_nik'            => 'required|string|max:32',
            'p1_pekerjaan'      => 'required|string|max:100',
            'p1_alamat'         => 'required|string',

            // PIHAK 2 (Penerima Kuasa)
            'p2_nama_lengkap'   => 'required|string|max:255',
            'p2_jenis_kelamin'  => 'required|string|max:20',
            'p2_tempat_lahir'   => 'required|string|max:100',
            'p2_tanggal_lahir'  => 'required|date',
            'p2_agama'          => 'required|string|max:50',
            'p2_status'         => 'required|string|max:50',
            'p2_nik'            => 'required|string|max:32',
            'p2_pekerjaan'      => 'required|string|max:100',
            'p2_alamat'         => 'required|string',

            // umum
            'uraian_kuasa'      => 'nullable|string',
            'status_surat'      => 'nullable|string',
            'status_verif'      => 'nullable|string',
            'nowa'              => 'required|string|max:20',
        ]);

        surat_kuasa::create($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat Kuasa berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\surat_kuasa  $surat_kuasa
     * @return \Illuminate\Http\Response
     */
    public function show(surat_kuasa $surat_kuasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\surat_kuasa  $surat_kuasa
     * @return \Illuminate\Http\Response
     */
    public function edit(surat_kuasa $surat)
    {
        return view('surat.edit_surat_kuasa', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\surat_kuasa  $surat_kuasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, surat_kuasa $surat)
    {
        $validated = $request->validate([
            // PIHAK 1 (Pemberi Kuasa)
            'p1_nama_lengkap'   => 'required|string|max:255',
            'p1_jenis_kelamin'  => 'required|string|max:20',
            'p1_tempat_lahir'   => 'required|string|max:100',
            'p1_tanggal_lahir'  => 'required|date',
            'p1_agama'          => 'required|string|max:50',
            'p1_status'         => 'required|string|max:50',
            'p1_nik'            => 'required|string|max:32',
            'p1_pekerjaan'      => 'required|string|max:100',
            'p1_alamat'         => 'required|string',

            // PIHAK 2 (Penerima Kuasa)
            'p2_nama_lengkap'   => 'required|string|max:255',
            'p2_jenis_kelamin'  => 'required|string|max:20',
            'p2_tempat_lahir'   => 'required|string|max:100',
            'p2_tanggal_lahir'  => 'required|date',
            'p2_agama'          => 'required|string|max:50',
            'p2_status'         => 'required|string|max:50',
            'p2_nik'            => 'required|string|max:32',
            'p2_pekerjaan'      => 'required|string|max:100',
            'p2_alamat'         => 'required|string',

            // umum
            'uraian_kuasa'      => 'nullable|string',
            'status_surat'      => 'nullable|string',
            'status_verif'      => 'nullable|string',
            'nowa'              => 'required|string|max:20',
        ]);

        $surat->update($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat Kuasa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_kuasa  $surat_kuasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_kuasa $surat_kuasa)
    {
        //
    }
}
