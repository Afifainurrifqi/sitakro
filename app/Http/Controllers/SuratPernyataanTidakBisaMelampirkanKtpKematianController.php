<?php

namespace App\Http\Controllers;

use App\Models\surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian;
use App\Http\Requests\Storesurat_pernyataan_tidak_bisa_melampirkan_ktp_kematianRequest;
use App\Http\Requests\Updatesurat_pernyataan_tidak_bisa_melampirkan_ktp_kematianRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SuratPernyataanTidakBisaMelampirkanKtpKematianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian::all();
        return view('surat.suratpernyataantidakbisamelampirkanktpkematian', compact('data'));
    }

    public function userkematianktp()
    {
        return view('surat.user_suratpernyataantidakbisamelampirkanktpkematian');
    }

    public function exportPdf($id)
    {
        // Ambil data surat berdasarkan ID
        $data = surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian::findOrFail($id);

        // Render view dan konversi ke PDF dengan ukuran A4 portrait
        $pdf = Pdf::loadView('surat.pdfsuratpernyataantidakbisamelampirkanktpkematian', compact('data'))
            ->setPaper('a4', 'portrait');

        // Buat nama file yang dinamis dan aman
        $filename = 'surat_pernyataan_ktp_' . preg_replace('/[^A-Za-z0-9\-]/', '_', $data->_id) . '.pdf';

        // Kembalikan sebagai file untuk diunduh
        return $pdf->download($filename);
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
     * @param  \App\Http\Requests\Storesurat_pernyataan_tidak_bisa_melampirkan_ktp_kematianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function userstore(Request $request)
    {
        $validatedData = $request->validate([
            'nowa' => 'required|string',
            'status_surat' => 'required|string',
            'status_verif' => 'required|string', // perhatikan: bukan "starus_verif"
            'nama_pelapor' => 'required|string',
            'nik_pelapor' => 'required|string',
            'tempat_lahir_pelapor' => 'required|string',
            'tanggal_lahir_pelapor' => 'required|date',
            'jenis_kelamin_pelapor' => 'required|string',
            'pekerjaan_pelapor' => 'required|string',
            'alamat_pelapor' => 'required|string',
            'alasan' => 'required|string',
            'nik_jenazah' => 'required|string',
            'nama_jenazah' => 'required|string',
            'tanggal_lahir_jenazah' => 'required|date',
            'jenis_kelamin_jenazah' => 'required|string',
            'alamat_jenazah' => 'required|string',
        ]);
        surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian::create($validatedData);

        return redirect()->route('surat.suratberhasil')
            ->with('success', 'Data berhasil disimpan dan diarahkan ke arsip surat keluar.');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nowa' => 'required|string',
            'status_surat' => 'required|string',
            'status_verif' => 'required|string', // perhatikan: bukan "starus_verif"
            'nama_pelapor' => 'required|string',
            'nik_pelapor' => 'required|string',
            'tempat_lahir_pelapor' => 'required|string',
            'agama_pelapor' => 'required|string',
            'tanggal_lahir_pelapor' => 'required|date',
            'jenis_kelamin_pelapor' => 'required|string',
            'pekerjaan_pelapor' => 'required|string',
            'alamat_pelapor' => 'required|string',
            'alasan' => 'required|string',
            'nik_jenazah' => 'required|string',
            'nama_jenazah' => 'required|string',
            'tanggal_lahir_jenazah' => 'required|date',
            'jenis_kelamin_jenazah' => 'required|string',
            'alamat_jenazah' => 'required|string',
        ]);
        surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian::create($validatedData);

        return redirect()->route('surat.keluar')
            ->with('success', 'Data berhasil disimpan dan diarahkan ke arsip surat keluar.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian  $surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian
     * @return \Illuminate\Http\Response
     */
    public function show(surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian $surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian  $surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian
     * @return \Illuminate\Http\Response
     */
    public function edit(surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian $surat)
    {
        return view('surat.edit_suratpernyataantidakbisamelampirkanktpkematian', compact('surat'));
    }

    public function update(Request $request, surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian $surat)
    {
        $validatedData = $request->validate([
            'nowa' => 'required|string',
            'status_surat' => 'required|string',
            'status_verif' => 'required|string',
            'nama_pelapor' => 'required|string',
            'nik_pelapor' => 'required|string',
            'tempat_lahir_pelapor' => 'required|string',
            'tanggal_lahir_pelapor' => 'required|date',
            'agama_pelapor' => 'required|string',
            'jenis_kelamin_pelapor' => 'required|string',
            'pekerjaan_pelapor' => 'required|string',
            'alamat_pelapor' => 'required|string',
            'alasan' => 'required|string',
            'nik_jenazah' => 'required|string',
            'nama_jenazah' => 'required|string',
            'tanggal_lahir_jenazah' => 'required|date',
            'jenis_kelamin_jenazah' => 'required|string',
            'alamat_jenazah' => 'required|string',
        ]);

        $surat->update($validatedData);

        return redirect()->route('surat.keluar')->with('success', 'Surat berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian  $surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian $surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian)
    {
        //
    }
}
