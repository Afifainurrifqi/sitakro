<?php

namespace App\Http\Controllers;

use App\Models\surat_keterangan_harga_kepemilikan_tanah;
use Illuminate\Http\Request;

class SuratKeteranganHargaKepemilikanTanahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = surat_keterangan_harga_kepemilikan_tanah::all();
        return view('surat.surat_keterangan_harga_kepemilikan_tanah', compact('data'));
    }

    /**
     * Menampilkan daftar data untuk pengguna (user-facing view).
     *
     * @return \Illuminate\Http\Response
     */
    public function userkepemilikantanah()
    {
        $data = surat_keterangan_harga_kepemilikan_tanah::all();
        return view('surat.user_surat_keterangan_harga_kepemilikan_tanah', compact('data'));
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
            'rt'                 => 'required|string|max:10',
            'rw'                 => 'required|string|max:10',
            'no_persil'          => 'required|string|max:50',
            'no_sppt'            => 'required|string|max:50',
            'no_sertifikat'      => 'nullable|string|max:50',
            'luas'               => 'required|string|max:50', // Menggunakan string untuk fleksibilitas (misal: "200 m2")
            'atas_nama_hak_milik' => 'required|string|max:255',
            'batas_utara'        => 'required|string|max:255',
            'batas_timur'        => 'required|string|max:255',
            'batas_selatan'      => 'required|string|max:255',
            'batas_barat'        => 'required|string|max:255',
            'nama'               => 'required|string|max:255',
            'alamat'             => 'required|string',
            'pekerjaan'          => 'required|string|max:100',
            'tanah_atas_nama'    => 'required|string|max:255',
            'harga_tanah'        => 'required|numeric',
            'harga_bangunan'     => 'required|numeric',
            'harga_jumlah'       => 'required|numeric',
            'status_surat'       => 'nullable|string',
            'status_verif'       => 'nullable|string',
            'nowa'               => 'required|string|max:20',
        ]);

        // Tetapkan status default jika tidak dikirim dari form
        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        surat_keterangan_harga_kepemilikan_tanah::create($validated);

        return redirect()->route('surat.suratberhasil')
            ->with('success', 'Surat Keterangan Harga Kepemilikan Tanah berhasil disimpan.');
    }

    /**
     * Memproses dan menyimpan data surat baru (metode duplikat, sering digunakan untuk admin panel).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'rt'                 => 'required|string|max:10',
            'rw'                 => 'required|string|max:10',
            'no_persil'          => 'required|string|max:50',
            'no_sppt'            => 'required|string|max:50',
            'no_sertifikat'      => 'nullable|string|max:50',
            'luas'               => 'required|string|max:50',
            'atas_nama_hak_milik' => 'required|string|max:255',
            'batas_utara'        => 'required|string|max:255',
            'batas_timur'        => 'required|string|max:255',
            'batas_selatan'      => 'required|string|max:255',
            'batas_barat'        => 'required|string|max:255',
            'nama'               => 'required|string|max:255',
            'alamat'             => 'required|string',
            'pekerjaan'          => 'required|string|max:100',
            'tanah_atas_nama'    => 'required|string|max:255',
            'harga_tanah'        => 'required|numeric',
            'harga_bangunan'     => 'required|numeric',
            'harga_jumlah'       => 'required|numeric',
            'status_surat'       => 'nullable|string',
            'status_verif'       => 'nullable|string',
            'nowa'               => 'required|string|max:20',
        ]);

        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        surat_keterangan_harga_kepemilikan_tanah::create($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat Keterangan Harga Kepemilikan Tanah berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\surat_keterangan_harga_kepemilikan_tanah  $surat_keterangan_harga_kepemilikan_tanah
     * @return \Illuminate\Http\Response
     */
    public function show(surat_keterangan_harga_kepemilikan_tanah $surat_keterangan_harga_kepemilikan_tanah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\surat_keterangan_harga_kepemilikan_tanah  $surat_keterangan_harga_kepemilikan_tanah
     * @return \Illuminate\Http\Response
     */
    public function edit(surat_keterangan_harga_kepemilikan_tanah $surat)
    {
        return view('surat.edit_surat_keterangan_harga_kepemilikan_tanah', compact('surat'));
    }



    public function update(Request $request, surat_keterangan_harga_kepemilikan_tanah $surat)
    {
        $validated = $request->validate([
            'rt'                 => 'required|string|max:10',
            'rw'                 => 'required|string|max:10',
            'no_persil'          => 'required|string|max:50',
            'no_sppt'            => 'required|string|max:50',
            'no_sertifikat'      => 'nullable|string|max:50',
            'luas'               => 'required|string|max:50',
            'atas_nama_hak_milik' => 'required|string|max:255',
            'batas_utara'        => 'required|string|max:255',
            'batas_timur'        => 'required|string|max:255',
            'batas_selatan'      => 'required|string|max:255',
            'batas_barat'        => 'required|string|max:255',
            'nama'               => 'required|string|max:255',
            'alamat'             => 'required|string',
            'pekerjaan'          => 'required|string|max:100',
            'tanah_atas_nama'    => 'required|string|max:255',
            'harga_tanah'        => 'required|numeric',
            'harga_bangunan'     => 'required|numeric',
            'harga_jumlah'       => 'required|numeric',
            'status_surat'       => 'nullable|string',
            'status_verif'       => 'nullable|string',
            'nowa'               => 'required|string|max:20',
        ]);

        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        $surat->update($validated);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat Keterangan Harga Kepemilikan Tanah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_keterangan_harga_kepemilikan_tanah  $surat_keterangan_harga_kepemilikan_tanah
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_keterangan_harga_kepemilikan_tanah $surat_keterangan_harga_kepemilikan_tanah)
    {
        //
    }
}
