<?php

namespace App\Http\Controllers;

use App\Models\surat_permohonan_pembukaan_rekening;
use Illuminate\Http\Request;

class SuratPermohonanPembukaanRekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = surat_permohonan_pembukaan_rekening::all();
        return view('surat.permohonan_pembukaan_rekening', compact('data'));
    }

    public function userrekening()
    {
        return view('surat.user_permohonan_pembukaan_rekening');
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
            // Kepada
            'kepada_nama_instansi' => 'required|string|max:255',
            'kepada_alamat'        => 'required|string',

            // Yang Bertanda Tangan
            'ybt_nama'    => 'required|string|max:255',
            'ybt_jabatan' => 'required|string|max:100',
            'ybt_alamat'  => 'required|string',

            // Ketentuan
            'rekening_atas_nama' => 'required|string|max:255',
            'rekening_alamat'    => 'required|string',

            // Yang Berwenang (dinamis)
            'berwenang_jumlah'    => 'nullable|integer|min:0',
            'berwenang_nama'      => 'array',
            'berwenang_nama.*'    => 'nullable|string|max:255',
            'berwenang_jabatan'   => 'array',
            'berwenang_jabatan.*' => 'nullable|string|max:150',

            // umum
            'status_surat' => 'nullable|string',
            'status_verif' => 'nullable|string',
            'nowa'         => 'required|string|max:20',
        ]);

        // Bersihkan entri kosong pada array dinamis (pola referensi)
        $validated['berwenang_nama'] = collect($request->input('berwenang_nama', []))
            ->filter(fn($v) => trim((string)$v) !== '')
            ->values()->all();

        $validated['berwenang_jabatan'] = collect($request->input('berwenang_jabatan', []))
            ->filter(fn($v) => trim((string)$v) !== '')
            ->values()->all();

        // Safety: simpan jumlah aktual sesuai input
        $validated['berwenang_jumlah'] = min(
            count($validated['berwenang_nama']),
            count($validated['berwenang_jabatan'])
        );

        // Default status bila tidak dikirim dari form
        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        surat_permohonan_pembukaan_rekening::create($validated);

        return redirect()->route('surat.suratberhasil')
            ->with('success', 'Permohonan Pembukaan Rekening berhasil disimpan.');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // Kepada
            'kepada_nama_instansi' => 'required|string|max:255',
            'kepada_alamat'        => 'required|string',

            // Yang Bertanda Tangan
            'ybt_nama'    => 'required|string|max:255',
            'ybt_jabatan' => 'required|string|max:100',
            'ybt_alamat'  => 'required|string',

            // Ketentuan
            'rekening_atas_nama' => 'required|string|max:255',
            'rekening_alamat'    => 'required|string',

            // Yang Berwenang (dinamis)
            'berwenang_jumlah'    => 'nullable|integer|min:0',
            'berwenang_nama'      => 'array',
            'berwenang_nama.*'    => 'nullable|string|max:255',
            'berwenang_jabatan'   => 'array',
            'berwenang_jabatan.*' => 'nullable|string|max:150',

            // umum
            'status_surat' => 'nullable|string',
            'status_verif' => 'nullable|string',
            'nowa'         => 'required|string|max:20',
        ]);

        $validated['berwenang_nama'] = collect($request->input('berwenang_nama', []))
            ->filter(fn($v) => trim((string)$v) !== '')
            ->values()->all();

        $validated['berwenang_jabatan'] = collect($request->input('berwenang_jabatan', []))
            ->filter(fn($v) => trim((string)$v) !== '')
            ->values()->all();

        $validated['berwenang_jumlah'] = min(
            count($validated['berwenang_nama']),
            count($validated['berwenang_jabatan'])
        );

        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        surat_permohonan_pembukaan_rekening::create($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'Permohonan Pembukaan Rekening berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\surat_permohonan_pembukaan_rekening  $surat_permohonan_pembukaan_rekening
     * @return \Illuminate\Http\Response
     */
    public function show(surat_permohonan_pembukaan_rekening $surat_permohonan_pembukaan_rekening)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\surat_permohonan_pembukaan_rekening  $surat_permohonan_pembukaan_rekening
     * @return \Illuminate\Http\Response
     */
public function edit(surat_permohonan_pembukaan_rekening $surat)
    {
        return view('surat.edit_permohonan_pembukaan_rekening', compact('surat'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\surat_permohonan_pembukaan_rekening  $surat_permohonan_pembukaan_rekening
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, surat_permohonan_pembukaan_rekening $surat)
    {
        $validated = $request->validate([
            // Kepada
            'kepada_nama_instansi' => 'required|string|max:255',
            'kepada_alamat'        => 'required|string',

            // Yang Bertanda Tangan
            'ybt_nama'    => 'required|string|max:255',
            'ybt_jabatan' => 'required|string|max:100',
            'ybt_alamat'  => 'required|string',

            // Ketentuan
            'rekening_atas_nama' => 'required|string|max:255',
            'rekening_alamat'    => 'required|string',

            // Yang Berwenang (dinamis)
            'berwenang_jumlah'    => 'nullable|integer|min:0',
            'berwenang_nama'      => 'array',
            'berwenang_nama.*'    => 'nullable|string|max:255',
            'berwenang_jabatan'   => 'array',
            'berwenang_jabatan.*' => 'nullable|string|max:150',

            // umum
            'status_surat' => 'nullable|string',
            'status_verif' => 'nullable|string',
            'nowa'         => 'required|string|max:20',
        ]);

        $validated['berwenang_nama'] = collect($request->input('berwenang_nama', []))
            ->filter(fn($v) => trim((string)$v) !== '')
            ->values()->all();

        $validated['berwenang_jabatan'] = collect($request->input('berwenang_jabatan', []))
            ->filter(fn($v) => trim((string)$v) !== '')
            ->values()->all();

        $validated['berwenang_jumlah'] = min(
            count($validated['berwenang_nama']),
            count($validated['berwenang_jabatan'])
        );

        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        $surat->update($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'Permohonan Pembukaan Rekening berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_permohonan_pembukaan_rekening  $surat_permohonan_pembukaan_rekening
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_permohonan_pembukaan_rekening $surat_permohonan_pembukaan_rekening)
    {
        //
    }
}
