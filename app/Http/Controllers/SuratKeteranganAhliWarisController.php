<?php

namespace App\Http\Controllers;

use App\Models\surat_keterangan_ahli_waris;
use Illuminate\Http\Request;

class SuratKeteranganAhliWarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = surat_keterangan_ahli_waris::all();
        return view('surat.surat_keterangan_ahli_waris', compact('data'));
    }

    public function user_ahliwaris()
    {
        $data = surat_keterangan_ahli_waris::all();
        return view('surat.user_surat_keterangan_ahli_waris', compact('data'));
    }

    public function userstore(Request $request)
    {
        $validated = $request->validate([
            // Yang bertanda tangan
            'nama_lengkap'   => 'required|string|max:255',
            'tempat_lahir'   => 'required|string|max:100',
            'tanggal_lahir'  => 'required|date',
            'agama'          => 'required|string|max:50',
            'pekerjaan'      => 'required|string|max:100',
            'no_ktp'         => 'required|string|max:32',
            'status'         => 'required|string|max:50',
            'alamat'         => 'required|string',

            // Keterangan istri
            'nama_istri'          => 'required|string|max:255',
            'tempat_lahir_istri'  => 'required|string|max:100',
            'tanggal_lahir_istri' => 'required|date',
            'agama_istri'         => 'required|string|max:50',
            'pekerjaan_istri'     => 'required|string|max:100',
            'status_istri'        => 'required|string|max:50',
            'no_ktp_istri'        => 'required|string|max:32',
            'alamat_istri'        => 'required|string',

            // Anak (dinamis)
            'jumlah_anak'   => 'required|integer|min:0',
            'nama_anak'     => 'array',                // ← akan diisi array dari form JS
            'nama_anak.*'   => 'nullable|string|max:255',

            // Saksi (dinamis)
            'jumlah_saksi'  => 'required|integer|min:0',
            'nama_saksi'    => 'array',
            'nama_saksi.*'  => 'nullable|string|max:255',

            'hubungan_dengan_ahli_waris' => 'required|string|max:255',

            // umum
            'status_surat' => 'nullable|string',
            'status_verif' => 'nullable|string',
            'nowa'         => 'required|string|max:20',
        ]);

        // Bersihkan entri kosong pada array
        $validated['nama_anak']  = collect($request->input('nama_anak', []))->filter(fn($v) => trim((string)$v) !== '')->values()->all();
        $validated['nama_saksi'] = collect($request->input('nama_saksi', []))->filter(fn($v) => trim((string)$v) !== '')->values()->all();

        // Safety: jika jumlah tidak sesuai banyaknya input, tetap simpan jumlah input aktual
        $validated['jumlah_anak']  = count($validated['nama_anak']);
        $validated['jumlah_saksi'] = count($validated['nama_saksi']);

        // Default status bila tidak dikirim dari form
        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        // Opsi jika ingin disimpan sebagai string (bukan array), tinggal uncomment:
        // $validated['nama_anak']  = implode(', ', $validated['nama_anak']);
        // $validated['nama_saksi'] = implode(', ', $validated['nama_saksi']);

        surat_keterangan_ahli_waris::create($validated);

        return redirect()->route('surat.suratberhasil')
            ->with('success', 'Surat Keterangan Ahli Waris berhasil disimpan.');
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
            // Yang bertanda tangan
            'nama_lengkap'   => 'required|string|max:255',
            'tempat_lahir'   => 'required|string|max:100',
            'tanggal_lahir'  => 'required|date',
            'agama'          => 'required|string|max:50',
            'pekerjaan'      => 'required|string|max:100',
            'no_ktp'         => 'required|string|max:32',
            'status'         => 'required|string|max:50',
            'alamat'         => 'required|string',

            // Keterangan istri
            'nama_istri'          => 'required|string|max:255',
            'tempat_lahir_istri'  => 'required|string|max:100',
            'tanggal_lahir_istri' => 'required|date',
            'agama_istri'         => 'required|string|max:50',
            'pekerjaan_istri'     => 'required|string|max:100',
            'status_istri'        => 'required|string|max:50',
            'no_ktp_istri'        => 'required|string|max:32',
            'alamat_istri'        => 'required|string',

            // Anak (dinamis)
            'jumlah_anak'   => 'required|integer|min:0',
            'nama_anak'     => 'array',
            'nama_anak.*'   => 'nullable|string|max:255',

            // Saksi (dinamis)
            'jumlah_saksi'  => 'required|integer|min:0',
            'nama_saksi'    => 'array',
            'nama_saksi.*'  => 'nullable|string|max:255',

            'hubungan_dengan_ahli_waris' => 'required|string|max:255',

            // umum
            'status_surat' => 'nullable|string',
            'status_verif' => 'nullable|string',
            'nowa'         => 'required|string|max:20',
        ]);

        $validated['nama_anak']  = collect($request->input('nama_anak', []))->filter(fn($v) => trim((string)$v) !== '')->values()->all();
        $validated['nama_saksi'] = collect($request->input('nama_saksi', []))->filter(fn($v) => trim((string)$v) !== '')->values()->all();

        $validated['jumlah_anak']  = count($validated['nama_anak']);
        $validated['jumlah_saksi'] = count($validated['nama_saksi']);

        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        // Opsi string:
        // $validated['nama_anak']  = implode(', ', $validated['nama_anak']);
        // $validated['nama_saksi'] = implode(', ', $validated['nama_saksi']);

        surat_keterangan_ahli_waris::create($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat Keterangan Ahli Waris berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\surat_keterangan_ahli_waris  $surat_keterangan_ahli_waris
     * @return \Illuminate\Http\Response
     */
    public function show(surat_keterangan_ahli_waris $surat_keterangan_ahli_waris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\surat_keterangan_ahli_waris  $surat_keterangan_ahli_waris
     * @return \Illuminate\Http\Response
     */
    public function edit(surat_keterangan_ahli_waris $surat)
    {
        return view('surat.edit_surat_keterangan_ahli_waris', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\surat_keterangan_ahli_waris  $surat_keterangan_ahli_waris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, surat_keterangan_ahli_waris $surat)
    {
        $validated = $request->validate([
            // Yang bertanda tangan
            'nama_lengkap'   => 'required|string|max:255',
            'tempat_lahir'   => 'required|string|max:100',
            'tanggal_lahir'  => 'required|date',
            'agama'          => 'required|string|max:50',
            'pekerjaan'      => 'required|string|max:100',
            'no_ktp'         => 'required|string|max:32',
            'status'         => 'required|string|max:50',
            'alamat'         => 'required|string',

            // Keterangan istri
            'nama_istri'          => 'required|string|max:255',
            'tempat_lahir_istri'  => 'required|string|max:100',
            'tanggal_lahir_istri' => 'required|date',
            'agama_istri'         => 'required|string|max:50',
            'pekerjaan_istri'     => 'required|string|max:100',
            'status_istri'        => 'required|string|max:50',
            'no_ktp_istri'        => 'required|string|max:32',
            'alamat_istri'        => 'required|string',

            // Anak (dinamis)
            'jumlah_anak'   => 'required|integer|min:0',
            'nama_anak'     => 'array',
            'nama_anak.*'   => 'nullable|string|max:255',

            // Saksi (dinamis)
            'jumlah_saksi'  => 'required|integer|min:0',
            'nama_saksi'    => 'array',
            'nama_saksi.*'  => 'nullable|string|max:255',

            'hubungan_dengan_ahli_waris' => 'required|string|max:255',

            // umum
            'status_surat' => 'nullable|string',
            'status_verif' => 'nullable|string',
            'nowa'         => 'required|string|max:20',
        ]);

        $validated['nama_anak']  = collect($request->input('nama_anak', []))->filter(fn($v) => trim((string)$v) !== '')->values()->all();
        $validated['nama_saksi'] = collect($request->input('nama_saksi', []))->filter(fn($v) => trim((string)$v) !== '')->values()->all();

        $validated['jumlah_anak']  = count($validated['nama_anak']);
        $validated['jumlah_saksi'] = count($validated['nama_saksi']);

        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        // Opsi string:
        // $validated['nama_anak']  = implode(', ', $validated['nama_anak']);
        // $validated['nama_saksi'] = implode(', ', $validated['nama_saksi']);

        $surat->update($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat Keterangan Ahli Waris berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_keterangan_ahli_waris  $surat_keterangan_ahli_waris
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_keterangan_ahli_waris $surat_keterangan_ahli_waris)
    {
        //
    }
}
