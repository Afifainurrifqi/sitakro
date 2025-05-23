<?php

namespace App\Http\Controllers;

use App\Models\suratmasuk;
use App\Http\Requests\StoresuratmasukRequest;
use App\Http\Requests\UpdatesuratmasukRequest;
use App\Models\surat_keterangan_kehilangan;
use App\Models\surat_pernyataan_numpang_kk;
use App\Models\surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian;
use App\Models\suratketerangantidakmampu;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
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
        $pernyataan_tidak_bisa_ktp = surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian::where('status_verif', '!=', 'Terverifikasi')->get();
        $keterangan_kehilangan = surat_keterangan_kehilangan::where('status_verif', '!=', 'Terverifikasi')->get();
        $numpang_kk = surat_pernyataan_numpang_kk::where('status_verif', '!=', 'Terverifikasi')->get();
        $tidakmampu = suratketerangantidakmampu::where('status_verif', '!=', 'Terverifikasi')->get();

        // Gabungkan data
        $data = collect()
            ->merge($pernyataan_tidak_bisa_ktp)
            ->merge($keterangan_kehilangan)
            ->merge($numpang_kk)
            ->merge($tidakmampu);

        return view('surat.suratkeluar', compact('data'));
    }


    public function arsipsuratmasuk()
    {
        return view('surat.arsipsuratmasuk');
    }
    public function arsipsuratkeluar()
    {
        // Ambil semua data dari collection surat_pernyataan_ktp
        $data = surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian::where('status_verif', 'Terverifikasi')->get();


        // Kirim ke view
        return view('surat.arsipsuratkeluar', compact('data'));
    }

    public function prosesForm(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string',
            'jenis_form' => 'required|string',
        ]);

        $kategori = $request->kategori;
        $jenis_form = $request->jenis_form;

        if ($kategori == 'keterangan' && $jenis_form == 'surat_keterangan_kehilangan') {
            return redirect()->route('surat.surat_keterangan_kehilangan')->with(compact('kategori', 'jenis_form'));
        }

        if ($kategori === 'adminduk' && $jenis_form === 'surat_pernyataan_numpang_kk') {
            return redirect()->route('surat.numpangkk.create')->with(compact('kategori', 'jenis_form'));
        }

        if ($kategori === 'keterangan' && $jenis_form === 'surat_keterangan_tidak_mampu') {
            return redirect()->route('surat.tidakmampu.create')->with(compact('kategori', 'jenis_form'));
        }




        return redirect()->back()->withErrors(['jenis_form' => 'Form tidak ditemukan.']);
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

    public function exportPdf($jenis, $id)
    {
        if ($jenis === 'suratketerangankehilangan') {
            $data = surat_keterangan_kehilangan::findOrFail($id);
            $pdf = Pdf::loadView('surat.pdfsuratketerangankehilangan', compact('data'))->setPaper('A4');
            return $pdf->download('pdfsuratketerangankehilangan' . $data->nama_pelapor . '.pdf');
        }

        if ($jenis === 'suratpernyataantidakbisamelampirkanktpkematian') {
            $data = surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian::findOrFail($id);
            $pdf = Pdf::loadView('surat.pdfsuratpernyataantidakbisamelampirkanktpkematian', compact('data'))->setPaper('A4');
            return $pdf->download('Surat_Pernyataan_KTP_' . $data->nama_pelapor . '.pdf');
        }

        if ($jenis === 'suratpernyataannumpangkk') {
            $data = surat_pernyataan_numpang_kk::findOrFail($id);
            $pdf = Pdf::loadView('surat.pdfsuratnumpangkk', compact('data'))->setPaper('A4');
            return $pdf->download('pdfsuratnumpangkk_' . $data->nama_pelapor . '.pdf');
        }

        if ($jenis === 'surat_keterangan_tidakmampu') {
            $data = suratketerangantidakmampu::findOrFail($id);
            $pdf = Pdf::loadView('surat.pdf_surat_keterangan_tidakmampu', compact('data'))->setPaper('A4');
            return $pdf->download('pdf_surat_keterangan_tidakmampu' . $data->nama_pelapor . '.pdf');
        }

        abort(404);
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
            'tanggal_masuk' => 'required|date',
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        $path = $request->file('file')->store('surat-masuk', 'public');

        // Simpan ke database (contoh)
        SuratMasuk::create([
            'nama_instansi' => $request->nama_instansi,
            'keterangan' => $request->keterangan,
            'tanggal_masuk' => $request->tanggal_masuk,
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
            'tanggal_masuk' => 'required|date',
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        // Update the fields
        $suratmasuk->nama_instansi = $request->nama_instansi;
        $suratmasuk->keterangan = $request->keterangan;
        $suratmasuk->tanggal_masuk = $request->tanggal_masuk;


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
