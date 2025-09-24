<?php

namespace App\Http\Controllers;

use App\Models\surat_pernyataan_numpang_kk;
use App\Http\Requests\Storesurat_pernyataan_numpang_kkRequest;
use App\Http\Requests\Updatesurat_pernyataan_numpang_kkRequest;
use Illuminate\Http\Request;

class SuratPernyataanNumpangKkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = surat_pernyataan_numpang_kk::all();
        return view('surat.surat_pernyataan_numpang_kk', compact('data'));
    }

     public function usernumpangkk()
    {
        return view('surat.user_pengajuan_adminduk_numpangkk');
    }

    public function create()
    {
        return view('surat.surat_pernyataan_numpang_kk');
    }

    public function userstore(Request $request)
    {
        $validated = $request->validate([
            'nowa' => 'required|string',
            // Pemilik KK
            'nama_pemilik_kk' => 'required|string|max:255',
            'nik_pemilik_kk' => 'required|string|max:50',
            'no_kk' => 'required|string|max:20',
            'pekerjaan_pemilik_kk' => 'required|string',
            'alamat_pemilik_kk' => 'required|string',

            // Penumpang KK
            'nama_penumpang_kk' => 'required|string|max:255',
            'nik_penumpang_kk' => 'required|string|max:50',
            'tempat_lahir_penumpang_kk' => 'required|string',
            'tanggal_lahir_penumpang_kk' => 'required|date',
            'agama_penumpang_kk' => 'required|string',
            'pekerjaan_penumpang_kk' => 'required|string',

            // Status
            'status_surat' => 'required|string',
            'status_verif' => 'required|string',
        ]);

        surat_pernyataan_numpang_kk::create($validated);

        return redirect()->route('surat.suratberhasil')->with('success', 'Surat berhasil diajukan');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nowa' => 'required|string',
            // Pemilik KK
            'nama_pemilik_kk' => 'required|string|max:255',
            'nik_pemilik_kk' => 'required|string|max:50',
            'no_kk' => 'required|string|max:20',
            'pekerjaan_pemilik_kk' => 'required|string',
            'alamat_pemilik_kk' => 'required|string',

            // Penumpang KK
            'nama_penumpang_kk' => 'required|string|max:255',
            'nik_penumpang_kk' => 'required|string|max:50',
            'tempat_lahir_penumpang_kk' => 'required|string',
            'tanggal_lahir_penumpang_kk' => 'required|date',
            'agama_penumpang_kk' => 'required|string',
            'pekerjaan_penumpang_kk' => 'required|string',

            // Status
            'status_surat' => 'required|string',
            'status_verif' => 'required|string',
        ]);

        surat_pernyataan_numpang_kk::create($validated);

        return redirect()->route('surat.keluar')->with('success', 'Surat berhasil dibuat.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\surat_pernyataan_numpang_kk  $surat_pernyataan_numpang_kk
     * @return \Illuminate\Http\Response
     */
    public function show(surat_pernyataan_numpang_kk $surat_pernyataan_numpang_kk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\surat_pernyataan_numpang_kk  $surat_pernyataan_numpang_kk
     * @return \Illuminate\Http\Response
     */
   public function edit(surat_pernyataan_numpang_kk $suratPernyataanNumpangKk)
{
    return view('surat.edit_surat_pernyataan_numpang_kk', compact('suratPernyataanNumpangKk'));
}

public function update(Request $request, surat_pernyataan_numpang_kk $suratPernyataanNumpangKk)
{
    $validated = $request->validate([
        'nama_pemilik_kk' => 'required|string|max:255',
        'nik_pemilik_kk' => 'required|string|max:50',
        'no_kk' => 'required|string|max:20',
        'pekerjaan_pemilik_kk' => 'required|string|max:100',
        'alamat_pemilik_kk' => 'required|string',

        'nama_penumpang_kk' => 'required|string|max:255',
        'nik_penumpang_kk' => 'required|string|max:50',
        'tempat_lahir_penumpang_kk' => 'required|string|max:255',
        'tanggal_lahir_penumpang_kk' => 'required|date',
        'agama_penumpang_kk' => 'required|string|max:50',
        'pekerjaan_penumpang_kk' => 'required|string|max:100',

        'status_surat' => 'required|string',
        'status_verif' => 'required|string',
        'nowa' => 'required|string|max:20',
    ]);

    $suratPernyataanNumpangKk->update($validated);

    return redirect()->route('surat.keluar')->with('success', 'Data surat berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_pernyataan_numpang_kk  $surat_pernyataan_numpang_kk
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_pernyataan_numpang_kk $surat_pernyataan_numpang_kk)
    {
        //
    }
}
