<?php

namespace App\Http\Controllers;

use App\Models\suratmasuk;
use App\Http\Requests\StoresuratmasukRequest;
use App\Http\Requests\UpdatesuratmasukRequest;
use App\Models\surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SuratMasuk::all(); // Ambil semua data dari MongoDB
        return view('surat.suratmasuk', compact('data'));
    }

    public function suratkeluar()
    {
        return view('surat.suratkeluar');
    }

    public function arsipsuratmasuk()
    {
        return view('surat.arsipsuratmasuk');
    }
    public function arsipsuratkeluar()
    {
        // Ambil semua data dari collection surat_pernyataan_ktp
        $data = surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian::all();

        // Kirim ke view
        return view('surat.arsipsuratkeluar', compact('data'));
    }

    public function exportPdf($id)
    {
        // Ambil data
        $data = surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian::findOrFail($id);

        // Render view ke HTML dan convert ke PDF
        $pdf = Pdf::loadView('surat.pdf_pernyataan', compact('data'))
                  ->setPaper('a4', 'portrait');

        // Download dengan nama file dinamis
        $filename = 'surat_ktp_' . $data->_id . '.pdf';
        return $pdf->download($filename);
    }

    public function tambahsuratmasuk()
    {
        return view('surat.tambahsuratmasuk');
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
     * @param  \App\Http\Requests\StoresuratmasukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresuratmasukRequest $request)
    {
        $request->validate([
            'nama_instansi' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        $path = $request->file('file')->store('surat-masuk', 'public');

        // Simpan ke database (contoh)
        SuratMasuk::create([
            'nama_instansi' => $request->nama_instansi,
            'keterangan' => $request->keterangan,
            'file' => $path,
        ]);

        return redirect('surat/suratmasuk')->with('msg', 'Surat masuk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\suratmasuk  $suratmasuk
     * @return \Illuminate\Http\Response
     */
    public function show(suratmasuk $suratmasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\suratmasuk  $suratmasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(suratmasuk $suratmasuk)
    {
        return view('surat.editsuratmasuk', compact('suratmasuk'));
    }


    // Update the specified Surat Masuk
    public function update(Request $request, SuratMasuk $suratmasuk)
    {
        // Validate the request
        $request->validate([
            'nama_instansi' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048', // Optional file upload
        ]);

        // Update the fields
        $suratmasuk->nama_instansi = $request->nama_instansi;
        $suratmasuk->keterangan = $request->keterangan;

        // If a new file is uploaded, handle it
        if ($request->hasFile('file')) {
            // Delete the old file if it exists
            if ($suratmasuk->file) {
                Storage::delete('public/' . $suratmasuk->file);
            }

            // Store the new file
            $path = $request->file('file')->store('surat-masuk', 'public');
            $suratmasuk->file = $path;
        }

        // Save the updated data
        $suratmasuk->save();

        // Redirect back with a success message
        return redirect('surat/suratmasuk')->with('msg', 'Surat masuk berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\suratmasuk  $suratmasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(suratmasuk $suratmasuk)
    {
        //
    }
}
