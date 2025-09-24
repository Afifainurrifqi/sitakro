<?php

namespace App\Http\Controllers;

use App\Models\surat_keterangan_kehilangan;
use App\Http\Requests\Storesurat_keterangan_kehilanganRequest;
use App\Http\Requests\Updatesurat_keterangan_kehilanganRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SuratKeteranganKehilanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('surat.suratpernyataantidakbisamelampirkanktpkematian');
    }

    public function userkehilangan()
    {
        return view('surat.user_pengajuan_keterangan_kehilangan');
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

    public function exportPdf($id)
    {
        // Ambil data surat berdasarkan ID
        $data = surat_keterangan_kehilangan::findOrFail($id);

        // Render view dan konversi ke PDF
        $pdf = Pdf::loadView('surat.pdfsuratketerangankehilangan', compact('data'))
            ->setPaper('a4', 'portrait');

        // Buat nama file yang aman
        $filename = 'surat_keterangan_kehilangan_' . preg_replace('/[^A-Za-z0-9\-]/', '_', $data->_id) . '.pdf';

        // Unduh file
        return $pdf->download($filename);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storesurat_keterangan_kehilanganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nowa' => 'required|string',
            'status_surat' => 'required|string',
            'status_verif' => 'required|string',
            'nama_pelapor' => 'required|string|max:255',
            'tempat_lahir_pelapor' => 'required|string|max:100',
            'tanggal_lahir_pelapor' => 'required|date',
            'jenis_kelamin_pelapor' => 'required|in:Laki-laki,Perempuan',
            'nik_pelapor' => 'required|string|max:50',
            'agama_pelapor' => 'required|string|max:100',
            'status_pelapor' => 'required|string|max:100',
            'pekerjaan_pelapor' => 'required|string|max:100',
            'alamat_pelapor' => 'required|string',
            'jenis_kehilangan' => 'required|string|max:100',
            'atas_nama' => 'required|string|max:255',
            'berisi' => 'required|string|max:255',
            'tanggal_kehilangan' => 'required|date',
            'hilang_saat' => 'required|string|max:255',
        ]);

        surat_keterangan_kehilangan::create($validated);

        return redirect()->route('surat.keluar')->with('success', 'Surat Kehilangan berhasil diperbarui.');
    }

    public function userstore(Request $request)
    {
        $validated = $request->validate([
            'nowa' => 'required|string',
            'status_surat' => 'required|string',
            'status_verif' => 'required|string',
            'nama_pelapor' => 'required|string|max:255',
            'tempat_lahir_pelapor' => 'required|string|max:100',
            'tanggal_lahir_pelapor' => 'required|date',
            'jenis_kelamin_pelapor' => 'required|in:Laki-laki,Perempuan',
            'nik_pelapor' => 'required|string|max:50',
            'agama_pelapor' => 'required|string|max:100',
            'status_pelapor' => 'required|string|max:100',
            'pekerjaan_pelapor' => 'required|string|max:100',
            'alamat_pelapor' => 'required|string',
            'jenis_kehilangan' => 'required|string|max:100',
            'atas_nama' => 'required|string|max:255',
            'berisi' => 'required|string|max:255',
            'tanggal_kehilangan' => 'required|date',
            'hilang_saat' => 'required|string|max:255',
        ]);

        surat_keterangan_kehilangan::create($validated);

        return redirect()->route('surat.suratberhasil')->with('success', 'Surat Kehilangan berhasil diperbarui.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\surat_keterangan_kehilangan  $surat_keterangan_kehilangan
     * @return \Illuminate\Http\Response
     */
    public function show(surat_keterangan_kehilangan $surat_keterangan_kehilangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\surat_keterangan_kehilangan  $surat_keterangan_kehilangan
     * @return \Illuminate\Http\Response
     */
    public function edit(surat_keterangan_kehilangan $surat_keterangan_kehilangan)
    {
        return view('surat.edit_surat_keterangan_kehilangan', compact('surat_keterangan_kehilangan'));
    }

    // Update data yang sudah diedit
    public function update(Request $request, surat_keterangan_kehilangan $surat_keterangan_kehilangan)
    {
        $validated = $request->validate([
            'nowa' => 'required|string',
            'status_surat' => 'required|string',
            'status_verif' => 'required|string',
            'nama_pelapor' => 'required|string|max:255',
            'tempat_lahir_pelapor' => 'required|string|max:100',
            'tanggal_lahir_pelapor' => 'required|date',
            'jenis_kelamin_pelapor' => 'required|in:Laki-laki,Perempuan',
            'nik_pelapor' => 'required|string|max:50',
            'agama_pelapor' => 'required|string|max:100',
            'status_pelapor' => 'required|string|max:100',
            'pekerjaan_pelapor' => 'required|string|max:100',
            'alamat_pelapor' => 'required|string',
            'jenis_kehilangan' => 'required|string|max:100',
            'atas_nama' => 'required|string|max:255',
            'berisi' => 'required|string|max:255',
            'tanggal_kehilangan' => 'required|date',
            'hilang_saat' => 'required|string|max:255',
        ]);

        $surat_keterangan_kehilangan->update($validated);

        return redirect()->route('surat.keluar')->with('success', 'Surat Kehilangan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_keterangan_kehilangan  $surat_keterangan_kehilangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_keterangan_kehilangan $surat_keterangan_kehilangan)
    {
        //
    }
}
