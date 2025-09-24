<?php

namespace App\Http\Controllers;

use App\Models\surat_pernyataan_dan_jaminan;
use Illuminate\Http\Request;

class SuratPernyataanDanJaminanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = surat_pernyataan_dan_jaminan::all();
        return view('surat.surat_pernyataan_dan_jaminan', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user_pernyataanjaminan()
    {
        $data = surat_pernyataan_dan_jaminan::all();
        return view('surat.user_surat_pernyataan_dan_jaminan', compact('data'));
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
            // pembuat (penjamin)
            'nama_pembuat'  => 'required|string|max:255',
            'nik_pembuat'   => 'required|string|max:32',
            'alamat_pembuat' => 'required|string',
            'hubungan_dengan_terjamin' => 'required|string|max:100',

            // terjamin
            'nama_terjamin' => 'required|string|max:255',
            'nik_terjamin'  => 'required|string|max:32',
            'alamat_terjamin' => 'required|string',

            // isi pernyataan
            'uraian_pernyataan' => 'required|string',
            'bentuk_jaminan'    => 'nullable|string|max:255',
            'berlaku_mulai'     => 'required|date',
            'berlaku_sampai'    => 'nullable|date|after_or_equal:berlaku_mulai',

            'berdasarkan'   => 'nullable|string|max:1000',

            // status & kontak
            'status_surat'  => 'required|string',
            'status_verif'  => 'required|string',
            'nowa'          => 'required|string|max:20',
        ]);

        surat_pernyataan_dan_jaminan::create($validated);

        // kalau admin: ke arsip keluar
        return redirect()->route('surat.suratberhasil')
            ->with('success', 'Data berhasil disimpan dan diarahkan ke arsip surat keluar.');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            // pembuat (penjamin)
            'nama_pembuat'  => 'required|string|max:255',
            'nik_pembuat'   => 'required|string|max:32',
            'alamat_pembuat' => 'required|string',
            'hubungan_dengan_terjamin' => 'required|string|max:100',

            // terjamin
            'nama_terjamin' => 'required|string|max:255',
            'nik_terjamin'  => 'required|string|max:32',
            'alamat_terjamin' => 'required|string',

            // isi pernyataan
            'uraian_pernyataan' => 'required|string',
            'bentuk_jaminan'    => 'nullable|string|max:255',
            'berlaku_mulai'     => 'required|date',
            'berlaku_sampai'    => 'nullable|date|after_or_equal:berlaku_mulai',

            'berdasarkan'   => 'nullable|string|max:1000',

            // status & kontak
            'status_surat'  => 'required|string',
            'status_verif'  => 'required|string',
            'nowa'          => 'required|string|max:20',
        ]);

        surat_pernyataan_dan_jaminan::create($validated);

        // kalau admin: ke arsip keluar
        return redirect()->route('surat.keluar')
            ->with('success', 'Data berhasil disimpan dan diarahkan ke arsip surat keluar.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\surat_pernyataan_dan_jaminan  $surat_pernyataan_dan_jaminan
     * @return \Illuminate\Http\Response
     */
    public function show(surat_pernyataan_dan_jaminan $surat_pernyataan_dan_jaminan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\surat_pernyataan_dan_jaminan  $surat_pernyataan_dan_jaminan
     * @return \Illuminate\Http\Response
     */
    public function edit(surat_pernyataan_dan_jaminan $surat)
    {
        return view('surat.edit_surat_pernyataan_dan_jaminan', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\surat_pernyataan_dan_jaminan  $surat_pernyataan_dan_jaminan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, surat_pernyataan_dan_jaminan $surat)
    {
        $validated = $request->validate([
            'nama_pembuat'  => 'required|string|max:255',
            'nik_pembuat'   => 'required|string|max:32',
            'alamat_pembuat' => 'required|string',
            'hubungan_dengan_terjamin' => 'required|string|max:100',

            'nama_terjamin' => 'required|string|max:255',
            'nik_terjamin'  => 'required|string|max:32',
            'alamat_terjamin' => 'required|string',

            'uraian_pernyataan' => 'required|string',
            'bentuk_jaminan'    => 'nullable|string|max:255',
            'berlaku_mulai'     => 'required|date',
            'berlaku_sampai'    => 'nullable|date|after_or_equal:berlaku_mulai',

            'berdasarkan'   => 'nullable|string|max:1000',

            'status_surat'  => 'required|string',
            'status_verif'  => 'required|string',
            'nowa'          => 'required|string|max:20',
        ]);

        $surat->update($validated);

        return redirect()->route('surat.keluar')->with('success', 'Surat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_pernyataan_dan_jaminan  $surat_pernyataan_dan_jaminan
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_pernyataan_dan_jaminan $surat_pernyataan_dan_jaminan)
    {
        //
    }
}
