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
        return view('surat.suratpernyataantidakbisamelampirkanktpkematian');
    }

    public function exportPdf($id)
    {
        // Ambil data
        $data = surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian::findOrFail($id);

        // Render view ke HTML dan convert ke PDF
        $pdf = Pdf::loadView('surat.pdfsuratpernyataantidakbisamelampirkanktpkematian', compact('data'))
                  ->setPaper('f4', 'portrait');

        // Download dengan nama file dinamis
        $filename = 'surat_ktp_' . $data->_id . '.pdf';
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
    public function store(Request $request)
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

        return redirect()->route('surat.arsipsuratkeluar')
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
    public function edit(surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian $surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatesurat_pernyataan_tidak_bisa_melampirkan_ktp_kematianRequest  $request
     * @param  \App\Models\surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian  $surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian
     * @return \Illuminate\Http\Response
     */
    public function update(Updatesurat_pernyataan_tidak_bisa_melampirkan_ktp_kematianRequest $request, surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian $surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian)
    {
        //
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
