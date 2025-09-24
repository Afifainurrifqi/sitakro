<?php

namespace App\Http\Controllers;

use App\Models\surat_pernyataan_beda_nama_buku_nikah;
use Illuminate\Http\Request;

class SuratPernyataanBedaNamaBukuNikahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = surat_pernyataan_beda_nama_buku_nikah::all();
        return view('surat.surat_pernyataan_beda_nama_buku_nikah', compact('data'));
    }

    /** User: form */
    public function user_form()
    {
        return view('surat.user_surat_pernyataan_beda_nama_buku_nikah');
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
            'nama'             => 'required|string|max:255',
            'nik'              => 'required|string|max:32',
            'ttl_tempat'       => 'required|string|max:100',
            'ttl_tanggal'      => 'required|date',
            'pekerjaan'        => 'required|string|max:100',
            'alamat'           => 'required|string',
            'nama_sesuai'      => 'required|string|max:255',
            'sumber_data_nama' => 'required|string|max:255',
            // umum
            'status_surat'     => 'nullable|string',
            'status_verif'     => 'nullable|string',
            'nowa'             => 'required|string|max:20',
        ]);

        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        surat_pernyataan_beda_nama_buku_nikah::create($validated);

        return redirect()->route('surat.suratberhasil')
            ->with('success', 'Surat Pernyataan Beda Nama Buku Nikah berhasil disimpan.');
    }

    /** Admin: store */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'             => 'required|string|max:255',
            'nik'              => 'required|string|max:32',
            'ttl_tempat'       => 'required|string|max:100',
            'ttl_tanggal'      => 'required|date',
            'pekerjaan'        => 'required|string|max:100',
            'alamat'           => 'required|string',
            'nama_sesuai'      => 'required|string|max:255',
            'sumber_data_nama' => 'required|string|max:255',
            'status_surat'     => 'nullable|string',
            'status_verif'     => 'nullable|string',
            'nowa'             => 'required|string|max:20',
        ]);

        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        surat_pernyataan_beda_nama_buku_nikah::create($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat Pernyataan Beda Nama Buku Nikah berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\surat_pernyataan_beda_nama_buku_nikah  $surat_pernyataan_beda_nama_buku_nikah
     * @return \Illuminate\Http\Response
     */
    public function show(surat_pernyataan_beda_nama_buku_nikah $surat_pernyataan_beda_nama_buku_nikah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\surat_pernyataan_beda_nama_buku_nikah  $surat_pernyataan_beda_nama_buku_nikah
     * @return \Illuminate\Http\Response
     */
    public function edit(surat_pernyataan_beda_nama_buku_nikah $surat)
    {
        return view('surat.edit_surat_pernyataan_beda_nama_buku_nikah', compact('surat'));
    }

    /** Admin: update */
    public function update(Request $request, surat_pernyataan_beda_nama_buku_nikah $surat)
    {
        $validated = $request->validate([
            'nama'             => 'required|string|max:255',
            'nik'              => 'required|string|max:32',
            'ttl_tempat'       => 'required|string|max:100',
            'ttl_tanggal'      => 'required|date',
            'pekerjaan'        => 'required|string|max:100',
            'alamat'           => 'required|string',
            'nama_sesuai'      => 'required|string|max:255',
            'sumber_data_nama' => 'required|string|max:255',
            'status_surat'     => 'nullable|string',
            'status_verif'     => 'nullable|string',
            'nowa'             => 'required|string|max:20',
        ]);

        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        $surat->update($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat Pernyataan Beda Nama Buku Nikah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_pernyataan_beda_nama_buku_nikah  $surat_pernyataan_beda_nama_buku_nikah
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_pernyataan_beda_nama_buku_nikah $surat_pernyataan_beda_nama_buku_nikah)
    {
        //
    }
}
