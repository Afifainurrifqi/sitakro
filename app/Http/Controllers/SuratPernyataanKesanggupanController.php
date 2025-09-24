<?php

namespace App\Http\Controllers;

use App\Models\surat_pernyataan_kesanggupan;
use Illuminate\Http\Request;

class SuratPernyataanKesanggupanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = surat_pernyataan_kesanggupan::all();
        return view('surat.surat_pernyataan_kesanggupan', compact('data'));
    }

    public function userkesanggupan()
    {
        $data = surat_pernyataan_kesanggupan::all();
        return view('surat.user_surat_pernyataan_kesanggupan', compact('data'));
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
            'tempat_lahir'    => 'required|string|max:100',
            'tanggal_lahir'   => 'required|date',
            'alamat'          => 'required|string',
            'tujuan_kegiatan' => 'required|string|max:255',
            'hari'            => 'required|string|max:50',
            'tanggal'         => 'required|date',
            'waktu'           => 'required|string|max:50',
            'tempat'          => 'required|string|max:255',
            'nowa'            => 'required|string|max:20',
            'status_surat'    => 'nullable|string',
            'status_verif'    => 'nullable|string',
        ]);

        surat_pernyataan_kesanggupan::create($validated);

        return redirect()->route('surat.suratberhasil')->with('success', 'Surat Pernyataan Kesanggupan berhasil dibuat.');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'            => 'required|string|max:255',
            'nik'             => 'required|string|max:32',
            'tempat_lahir'    => 'required|string|max:100',
            'tanggal_lahir'   => 'required|date',
            'alamat'          => 'required|string',
            'tujuan_kegiatan' => 'required|string|max:255',
            'hari'            => 'required|string|max:50',
            'tanggal'         => 'required|date',
            'waktu'           => 'required|string|max:50',
            'tempat'          => 'required|string|max:255',
            'nowa'            => 'required|string|max:20',
            'status_surat'    => 'nullable|string',
            'status_verif'    => 'nullable|string',
        ]);

        surat_pernyataan_kesanggupan::create($validated);

        return redirect()->route('surat.keluar')->with('success', 'Surat Pernyataan Kesanggupan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\surat_pernyataan_kesanggupan  $surat_pernyataan_kesanggupan
     * @return \Illuminate\Http\Response
     */
    public function show(surat_pernyataan_kesanggupan $surat_pernyataan_kesanggupan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\surat_pernyataan_kesanggupan  $surat_pernyataan_kesanggupan
     * @return \Illuminate\Http\Response
     */
    public function edit(surat_pernyataan_kesanggupan $surat)
    {
        return view('surat.edit_surat_pernyataan_kesanggupan', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\surat_pernyataan_kesanggupan  $surat_pernyataan_kesanggupan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, surat_pernyataan_kesanggupan $surat)
    {
        $validated = $request->validate([
            'nama'            => 'required|string|max:255',
            'nik'             => 'required|string|max:32',
            'tempat_lahir'    => 'required|string|max:100',
            'tanggal_lahir'   => 'required|date',
            'alamat'          => 'required|string',
            'tujuan_kegiatan' => 'required|string|max:255',
            'hari'            => 'required|string|max:50',
            'tanggal'         => 'required|date',
            'waktu'           => 'required|string|max:50',
            'tempat'          => 'required|string|max:255',
            'nowa'            => 'required|string|max:20',
            'status_surat'    => 'nullable|string',
            'status_verif'    => 'nullable|string',
        ]);

        $surat->update($validated);

        // Pilih salah satu redirect yang tidak perlu parameter:
        return redirect()->route('surat.keluar')
            ->with('success', 'Surat Pernyataan Kesanggupan berhasil diperbarui.');

        // Atau:
        // return redirect()->route('surat.kesanggupan.index')->with('success', '...');

        // Atau kembali ke halaman edit (butuh parameter):
        // return redirect()->route('surat.kesanggupan.edit', ['surat' => $surat->_id])->with('success', '...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_pernyataan_kesanggupan  $surat_pernyataan_kesanggupan
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_pernyataan_kesanggupan $surat_pernyataan_kesanggupan)
    {
        //
    }
}
