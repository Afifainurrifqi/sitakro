<?php

namespace App\Http\Controllers;

use App\Models\nama_alias_ortu;
use Illuminate\Http\Request;

class NamaAliasOrtuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = nama_alias_ortu::all();
        return view('surat.surat_pernyataan_memilih_nama_alias_satu_ortu', compact('data'));
    }

    public function usernamaaliasortu()
    {
        $data = nama_alias_ortu::all();
        return view('surat.user_surat_pernyataan_memilih_nama_alias_satu_ortu', compact('data'));
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
            // data utama
            'nama'               => 'required|string|max:255',
            'nik'                => 'required|string|max:32',
            'alamat'             => 'required|string',
            'nama_menyatakan'    => 'required|string|max:255',
            'no_akta_kelahiran'  => 'nullable|string|max:100',

            // orang tua & alias
            'nama_ortu_ayah_tercatat' => 'nullable|string|max:255',
            'nama_alias_ayah'         => 'nullable|string|max:255',
            'nama_ortu_ibu_tercatat'  => 'nullable|string|max:255',
            'nama_alias_ibu'          => 'nullable|string|max:255',

            // alias yang dihapus
            'nama_alias_dihapus_1' => 'nullable|string|max:255',
            'nama_alias_dihapus_2' => 'nullable|string|max:255',

            'berdasarkan' => 'nullable|string|max:1000',

            // status & kontak
            'status_surat' => 'required|string',
            'status_verif' => 'required|string',
            'nowa'         => 'required|string|max:20',
        ]);

        nama_alias_ortu::create($validatedData);

        return redirect()->route('surat.suratberhasil')
            ->with('success', 'Data berhasil disimpan dan diarahkan ke arsip surat keluar.');
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // data utama
            'nama'               => 'required|string|max:255',
            'nik'                => 'required|string|max:32',
            'alamat'             => 'required|string',
            'nama_menyatakan'    => 'required|string|max:255',
            'no_akta_kelahiran'  => 'nullable|string|max:100',

            // orang tua & alias
            'nama_ortu_ayah_tercatat' => 'nullable|string|max:255',
            'nama_alias_ayah'         => 'nullable|string|max:255',
            'nama_ortu_ibu_tercatat'  => 'nullable|string|max:255',
            'nama_alias_ibu'          => 'nullable|string|max:255',

            // alias yang dihapus
            'nama_alias_dihapus_1' => 'nullable|string|max:255',
            'nama_alias_dihapus_2' => 'nullable|string|max:255',

            'berdasarkan' => 'nullable|string|max:1000',

            // status & kontak
            'status_surat' => 'required|string',
            'status_verif' => 'required|string',
            'nowa'         => 'required|string|max:20',
        ]);

        nama_alias_ortu::create($validatedData);

        return redirect()->route('surat.keluar')
            ->with('success', 'Data berhasil disimpan dan diarahkan ke arsip surat keluar.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nama_alias_ortu  $nama_alias_ortu
     * @return \Illuminate\Http\Response
     */
    public function show(nama_alias_ortu $nama_alias_ortu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nama_alias_ortu  $nama_alias_ortu
     * @return \Illuminate\Http\Response
     */
    public function edit(nama_alias_ortu $surat)
    {
        // $surat = instance dari nama_alias_ortu yang di-bind dari {surat}
        return view('surat.edit_surat_pernyataan_memilih_nama_alias_satu_ortu', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nama_alias_ortu  $nama_alias_ortu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nama_alias_ortu $surat)
    {
        $validated = $request->validate([
            // data utama
            'nama'               => 'required|string|max:255',
            'nik'                => 'required|string|max:32',
            'alamat'             => 'required|string',
            'nama_menyatakan'    => 'required|string|max:255',
            'no_akta_kelahiran'  => 'nullable|string|max:100',

            // orang tua & alias
            'nama_ortu_ayah_tercatat' => 'nullable|string|max:255',
            'nama_alias_ayah'         => 'nullable|string|max:255',
            'nama_ortu_ibu_tercatat'  => 'nullable|string|max:255',
            'nama_alias_ibu'          => 'nullable|string|max:255',

            // alias yang dihapus
            'nama_alias_dihapus_1' => 'nullable|string|max:255',
            'nama_alias_dihapus_2' => 'nullable|string|max:255',

            'berdasarkan' => 'nullable|string|max:1000',

            // status & kontak
            'status_surat' => 'required|string',
            'status_verif' => 'required|string',
            'nowa'         => 'required|string|max:20',
        ]);

        $surat->update($validated);

        return redirect()->route('surat.keluar')->with('success', 'Surat alias (satu ortu) berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nama_alias_ortu  $nama_alias_ortu
     * @return \Illuminate\Http\Response
     */
    public function destroy(nama_alias_ortu $nama_alias_ortu)
    {
        //
    }
}
