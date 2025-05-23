<?php

namespace App\Http\Controllers;

use App\Models\suratketerangantidakmampu;
use App\Http\Requests\StoresuratketerangantidakmampuRequest;
use App\Http\Requests\UpdatesuratketerangantidakmampuRequest;
use Illuminate\Http\Request;

class SuratketerangantidakmampuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = suratketerangantidakmampu::all();
        return view('surat.surat_keterangan_tidakmampu', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surat.surat_keterangan_tidakmampu'); // Buat view khusus form tambah baru jika perlu
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresuratketerangantidakmampuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nowa' => 'required|string',
            'status_surat' => 'required|string',
            'status_verif' => 'required|string',
            'nama_lengkap' => 'required|string',
            'nik' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'kewarganegaraan' => 'required|string',
            'agama' => 'required|string',
            'status_perkawinan' => 'required|string',
            'pekerjaan' => 'required|string',
            'alamat_rumah' => 'required|string',
            'keterangan_fungsi_surat' => 'required|string',
        ]);

        suratketerangantidakmampu::create($validated);

        return redirect()->route('surat.keluar')->with('success', 'Surat berhasil ditambahkan.');
    }

    public function edit(suratketerangantidakmampu $suratketerangantidakmampu)
    {
        return view('surat.edit_surat_keterangan_tidakmampu', compact('suratketerangantidakmampu'));
    }

    public function update(Request $request, suratketerangantidakmampu $suratketerangantidakmampu)
    {
        $validated = $request->validate([
            'nowa' => 'required|string',
            'status_surat' => 'required|string',
            'status_verif' => 'required|string',
            'nama_lengkap' => 'required|string',
            'nik' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'kewarganegaraan' => 'required|string',
            'agama' => 'required|string',
            'status_perkawinan' => 'required|string',
            'pekerjaan' => 'required|string',
            'alamat_rumah' => 'required|string',
            'keterangan_fungsi_surat' => 'required|string',
        ]);

        $suratketerangantidakmampu->update($validated);

        return redirect()->route('surat.keluar')->with('success', 'Surat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\suratketerangantidakmampu  $suratketerangantidakmampu
     * @return \Illuminate\Http\Response
     */
    public function destroy(suratketerangantidakmampu $suratketerangantidakmampu)
    {
        //
    }
}
