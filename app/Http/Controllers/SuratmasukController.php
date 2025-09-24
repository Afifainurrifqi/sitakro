<?php

namespace App\Http\Controllers;

use App\Models\suratmasuk;
use App\Http\Requests\StoresuratmasukRequest;
use App\Http\Requests\UpdatesuratmasukRequest;
use App\Models\nama_alias_ortu;
use App\Models\surat_keterangan_ahli_waris;
use App\Models\surat_keterangan_desa_pernah_menikah;
use App\Models\surat_keterangan_harga_kepemilikan_tanah;
use App\Models\surat_keterangan_kehilangan;
use App\Models\surat_keterangan_kematian_desa;
use App\Models\surat_kuasa;
use App\Models\surat_permohonan_pembukaan_rekening;
use App\Models\surat_pernyataan_akta_barcode_nomor_sama;
use App\Models\surat_pernyataan_anak_seorang_nama_ibu;
use App\Models\surat_pernyataan_beda_nama_buku_nikah;
use App\Models\surat_pernyataan_belum_akta;
use App\Models\surat_pernyataan_dan_jaminan;
use App\Models\surat_pernyataan_kesanggupan;
use App\Models\surat_pernyataan_memilih_nama_alias;
use App\Models\surat_pernyataan_numpang_kk;
use App\Models\surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian;
use App\Models\surat_sptjm_kematian;
use App\Models\suratketerangantidakmampu;
use App\Models\SuratPengantarSkck;
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
        $namaalias = surat_pernyataan_memilih_nama_alias::where('status_verif', '!=', 'Terverifikasi')->get();
        $namaalias_satu_ortu = nama_alias_ortu::where('status_verif', '!=', 'Terverifikasi')->get();
        $pernyataandanjaminan      = surat_pernyataan_dan_jaminan::where('status_verif', '!=', 'Terverifikasi')->get();
        $pernah_menikah = surat_keterangan_desa_pernah_menikah::where('status_verif', '!=', 'Terverifikasi')->get();
        $kematian_desa             = surat_keterangan_kematian_desa::where('status_verif', '!=', 'Terverifikasi')->get(); // ⬅️ baru
        $ahliwaris = surat_keterangan_ahli_waris::where('status_verif', '!=', 'Terverifikasi')->get();
        $kesanggupan               = surat_pernyataan_kesanggupan::where('status_verif', '!=', 'Terverifikasi')->get(); // ⬅️ TAMBAH INI
        $kuasa = surat_kuasa::where('status_verif', '!=', 'Terverifikasi')->get();
        $bukaanrekening = surat_permohonan_pembukaan_rekening::where('status_verif', '!=', 'Terverifikasi')->get();
        $belumAkta = surat_pernyataan_belum_akta::where('status_verif', '!=', 'Terverifikasi')->get();
        $bedaNamaBukuNikah = surat_pernyataan_beda_nama_buku_nikah::where('status_verif', '!=', 'Terverifikasi')->get();
        $anakSeorangIbu = surat_pernyataan_anak_seorang_nama_ibu::where('status_verif', '!=', 'Terverifikasi')->get();
        $aktaBarcode    = surat_pernyataan_akta_barcode_nomor_sama::where('status_verif', '!=', 'Terverifikasi')->get();
        $sptjmKematian = surat_sptjm_kematian::where('status_verif', '!=', 'Terverifikasi')->get();
        $kepemilikantanah = surat_keterangan_harga_kepemilikan_tanah::where('status_verif', '!=', 'Terverifikasi')->get();
        $skck = SuratPengantarSkck::where('status_verif', '!=', 'Terverifikasi')->get();



        $data = collect()
            ->merge($pernyataan_tidak_bisa_ktp)
            ->merge($keterangan_kehilangan)
            ->merge($numpang_kk)
            ->merge($tidakmampu)
            ->merge($namaalias)
            ->merge($namaalias_satu_ortu)
            ->merge($pernyataandanjaminan)
            ->merge($pernah_menikah)
            ->merge($kematian_desa)
            ->merge($ahliwaris)
            ->merge($kesanggupan)
            ->merge($kuasa)
            ->merge($bukaanrekening)
            ->merge($belumAkta)
            ->merge($bedaNamaBukuNikah)
            ->merge($anakSeorangIbu)
            ->merge($aktaBarcode)
            ->merge($sptjmKematian)
            ->merge($kepemilikantanah)
            ->merge($skck);


        return view('surat.suratkeluar', compact('data'));
    }


    public function arsipsuratmasuk()
    {
        return view('surat.arsipsuratmasuk');
    }

    public function arsipsuratkeluar()
    {
        $ktp_kematian = surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian::where('status_verif', 'Terverifikasi')->get();
        $numpang_kk   = surat_pernyataan_numpang_kk::where('status_verif', 'Terverifikasi')->get();

        $pernyataan_tidak_bisa_ktp = surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian::where('status_verif', 'Terverifikasi')->get();
        $keterangan_kehilangan = surat_keterangan_kehilangan::where('status_verif', 'Terverifikasi')->get();
        $numpang_kk = surat_pernyataan_numpang_kk::where('status_verif', 'Terverifikasi')->get();
        $tidakmampu = suratketerangantidakmampu::where('status_verif', 'Terverifikasi')->get();
        $namaalias = surat_pernyataan_memilih_nama_alias::where('status_verif', 'Terverifikasi')->get();
        $namaalias_satu_ortu = nama_alias_ortu::where('status_verif', 'Terverifikasi')->get();
        $pernyataandanjaminan      = surat_pernyataan_dan_jaminan::where('status_verif', 'Terverifikasi')->get();
        $pernah_menikah = surat_keterangan_desa_pernah_menikah::where('status_verif', 'Terverifikasi')->get();
        $kematian_desa             = surat_keterangan_kematian_desa::where('status_verif', 'Terverifikasi')->get(); // ⬅️ baru
        $ahliwaris = surat_keterangan_ahli_waris::where('status_verif', 'Terverifikasi')->get();
        $kesanggupan               = surat_pernyataan_kesanggupan::where('status_verif', 'Terverifikasi')->get(); // ⬅️ TAMBAH INI
        $kuasa = surat_kuasa::where('status_verif', 'Terverifikasi')->get();
        $bukaanrekening = surat_permohonan_pembukaan_rekening::where('status_verif', 'Terverifikasi')->get();
        $belumAkta = surat_pernyataan_belum_akta::where('status_verif', 'Terverifikasi')->get();
        $bedaNamaBukuNikah = surat_pernyataan_beda_nama_buku_nikah::where('status_verif', 'Terverifikasi')->get();
        $anakSeorangIbu = surat_pernyataan_anak_seorang_nama_ibu::where('status_verif', 'Terverifikasi')->get();
        $aktaBarcode    = surat_pernyataan_akta_barcode_nomor_sama::where('status_verif', 'Terverifikasi')->get();
        $sptjmKematian = surat_sptjm_kematian::where('status_verif', 'Terverifikasi')->get();
        $kepemilikantanah = surat_keterangan_harga_kepemilikan_tanah::where('status_verif', 'Terverifikasi')->get();
        $skck = SuratPengantarSkck::where('status_verif', 'Terverifikasi')->get();



        $data = collect()
            ->merge($pernyataan_tidak_bisa_ktp)
            ->merge($keterangan_kehilangan)
            ->merge($numpang_kk)
            ->merge($tidakmampu)
            ->merge($namaalias)
            ->merge($namaalias_satu_ortu)
            ->merge($pernyataandanjaminan)
            ->merge($pernah_menikah)
            ->merge($kematian_desa)
            ->merge($ahliwaris)
            ->merge($kesanggupan)
            ->merge($kuasa)
            ->merge($bukaanrekening)
            ->merge($belumAkta)
            ->merge($bedaNamaBukuNikah)
            ->merge($anakSeorangIbu)
            ->merge($aktaBarcode)
            ->merge($sptjmKematian)
            ->merge($kepemilikantanah)
            ->merge($skck);

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

        if ($kategori === 'adminduk' && $jenis_form === 'surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian') {
            return redirect()->route('surat.suratpernyataantidakbisamelampirkanktpkematian')->with(compact('kategori', 'jenis_form'));
        }

        if ($kategori === 'keterangan' && $jenis_form === 'surat_keterangan_tidak_mampu') {
            return redirect()->route('surat.tidakmampu.create')->with(compact('kategori', 'jenis_form'));
        }

        if ($kategori === 'adminduk' && $jenis_form === 'surat_pernyataan_memilih_nama_alias') {
            return redirect()->route('surat.namaalias.index')->with(compact('kategori', 'jenis_form'));
        }

        if ($kategori === 'adminduk' && $jenis_form === 'surat_pernyataan_memilih_nama_alias_satu_orang_tua') {
            return redirect()->route('surat.namaaliasortu.index')->with(compact('kategori', 'jenis_form'));
        }

        if ($kategori === 'adminduk' && $jenis_form === 'surat_pernyataan_dan_jaminan') {
            return redirect()->route('surat.pernyataandanjaminan.index')->with(compact('kategori', 'jenis_form'));
        }

        if ($kategori === 'keterangan' && $jenis_form === 'surat_keterangan_desa_pernah_menikah') {
            return redirect()->route('surat.pernahmenikah.index')->with(compact('kategori', 'jenis_form'));
        }

        if ($kategori === 'keterangan' && $jenis_form === 'surat_keterangan_kematian_desa') {
            return redirect()->route('surat.kematian.index')->with(compact('kategori', 'jenis_form')); // ⬅️ baru
        }

        if ($kategori === 'keterangan' && $jenis_form === 'surat_keterangan_ahli_waris') {
            return redirect()->route('surat.ahliwaris.index')->with(compact('kategori', 'jenis_form'));
        }

        if ($kategori === 'pernyataan' && $jenis_form === 'surat_pernyataan_kesanggupan') {
            return redirect()->route('surat.kesanggupan.index')->with(compact('kategori', 'jenis_form'));
        }

        if ($kategori === 'pernyataan' && $jenis_form === 'surat__kuasa') {
            return redirect()->route('surat.kuasa.index')->with(compact('kategori', 'jenis_form'));
        }

        if ($kategori === 'pernyataan' && $jenis_form === 'permohonan_pembukaan_rekening_tabungan') {
            return redirect()->route('surat.bukaanrekening.index')->with(compact('kategori', 'jenis_form'));
        }

        if ($kategori === 'adminduk' && $jenis_form === 'surat_pernyataan_belum_pernah_mengurus_akta_kelahiran') {
            return redirect()->route('surat.belumakta.index')->with(compact('kategori', 'jenis_form'));
        }

        if ($kategori === 'adminduk' && $jenis_form === 'surat_pernyataan_beda_nama_buku_nikah') {
            return redirect()->route('surat.bedanama.index')->with(compact('kategori', 'jenis_form'));
        }

        if ($kategori === 'adminduk' && $jenis_form === 'surat_pernyataan_anak_seorang_nama_ibu_baru') {
            return redirect()->route('surat.anakseorangibu.index')->with(compact('kategori', 'jenis_form'));
        }

        if ($kategori === 'adminduk' && $jenis_form === 'surat_pernyataan_akta_barcode_nomor_samabaru_isi_sendiri') {
            return redirect()->route('surat.aktabarcode.index')->with(compact('kategori', 'jenis_form'));
        }

        if ($kategori === 'adminduk' && $jenis_form === 'sptjm_kematian') {
            return redirect()->route('surat.sptjm.index')->with(compact('kategori', 'jenis_form'));
        }

        if ($kategori === 'keterangan' && $jenis_form === 'surat_keterangan_harga_kepemilikan_tanah') {
            return redirect()->route('surat.kepemilikantanah.index')->with(compact('kategori', 'jenis_form'));
        }

        if ($kategori === 'keterangan' && $jenis_form === 'keterangan_pengantar_skck') {
            return redirect()->route('surat.skck.index')->with(compact('kategori', 'jenis_form'));
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

        if ($jenis === 'surat_pernyataan_memilih_nama_alias') {
            $data = surat_pernyataan_memilih_nama_alias::findOrFail($id);
            $pdf = Pdf::loadView('surat.pdf_surat_pernyataan_memilih_nama_alias', compact('data'))->setPaper('A4');
            return $pdf->download('pdf_surat_pernyataan_memilih_nama_alias' . $data->nama_pelapor . '.pdf');
        }


        if (
            $jenis === 'surat_pernyataan_memilih_nama_alias_satu_orang_tua' ||
            $jenis === 'surat_pernyataan_memilih_nama_alias_satu_ortu'
        ) {
            $data = nama_alias_ortu::findOrFail($id);
            $pdf = Pdf::loadView('surat.pdf_surat_pernyataan_memilih_nama_alias_satu_ortu', compact('data'))->setPaper('A4');
            // pakai nama yang tersedia: nama_menyatakan → fallback nama → fallback 'dokumen'
            $filenameName = $data->nama_menyatakan ?? $data->nama ?? 'dokumen';
            return $pdf->download('pdf_surat_pernyataan_memilih_nama_alias_satu_ortu_' . $filenameName . '.pdf');
        }

        if ($jenis === 'suratketerangandesapernahmenikah') {
            $data = surat_keterangan_desa_pernah_menikah::findOrFail($id);
            $pdf  = Pdf::loadView('surat.pdf_surat_keterangan_desa_pernah_menikah', compact('data'))->setPaper('A4');
            $filenameName = $data->nama_lengkap ?? 'dokumen';
            return $pdf->download('pdf_surat_keterangan_desa_pernah_menikah_' . $filenameName . '.pdf');
        }

        if ($jenis === 'suratpernyataandanjaminan') {
            $data = surat_pernyataan_dan_jaminan::findOrFail($id);
            $pdf  = Pdf::loadView('surat.pdf_surat_pernyataan_dan_jaminan', compact('data'))->setPaper('A4');
            $filename = $data->nama_lengkap ?? 'dokumen';
            return $pdf->download('pdf_surat_pernyataan_dan_jaminan_' . $filename . '.pdf');
        }


        if ($jenis === 'suratketeranganahliwaris') {
            $data = surat_keterangan_ahli_waris::findOrFail($id);
            $pdf  = Pdf::loadView('surat.pdf_surat_keterangan_ahli_waris', compact('data'))->setPaper('A4');
            $filename = $data->nama_lengkap ?? 'dokumen';
            return $pdf->download('pdf_surat_keterangan_ahli_waris_' . $filename . '.pdf');
        }

        if ($jenis === 'suratpernyataankesanggupan') {
            $data = surat_pernyataan_kesanggupan::findOrFail($id);
            $pdf  = Pdf::loadView('surat.pdf_surat_pernyataan_kesanggupan', compact('data'))->setPaper('A4');
            $filename = $data->nama ?? 'dokumen';
            return $pdf->download('pdf_surat_pernyataan_kesanggupan_' . $filename . '.pdf');
        }

        if ($jenis === 'suratkuasa') {
            $data = surat_kuasa::findOrFail($id);
            $pdf  = Pdf::loadView('surat.pdf_surat_kuasa', compact('data'))->setPaper('A4');
            $filename = $data->p1_nama_lengkap ?? 'dokumen';
            return $pdf->download('pdf_surat_kuasa_' . $filename . '.pdf');
        }

        if ($jenis === 'permohonanpembukaanrekening') {
            $data = surat_permohonan_pembukaan_rekening::findOrFail($id);
            $pdf  = Pdf::loadView('surat.pdf_permohonan_pembukaan_rekening', compact('data'))->setPaper('A4');
            $filename = Str::slug($data->ybt_nama ?? 'dokumen', '_');
            return $pdf->download('pdf_permohonan_pembukaan_rekening_' . $filename . '.pdf');
        }

        if ($jenis === 'suratpernyataanbelumakta') {
            $data = surat_pernyataan_belum_akta::findOrFail($id);
            $pdf  = Pdf::loadView('surat.pdf_pernyataan_belum_akta', compact('data'))->setPaper('A4');
            $filename = Str::slug($data->ybt_nama ?? 'dokumen', '_');
            return $pdf->download('pdf_pernyataan_belum_akta_' . $filename . '.pdf');
        }

        if ($jenis === 'suratpernyataanbedanamabukunikah') {
            $data = surat_pernyataan_beda_nama_buku_nikah::findOrFail($id);
            $pdf  = Pdf::loadView('surat.pdf_pernyataan_beda_nama_buku_nikah', compact('data'))->setPaper('A4');
            $filename = Str::slug($data->nama ?? 'dokumen', '_');
            return $pdf->download('pdf_pernyataan_beda_nama_buku_nikah_' . $filename . '.pdf');
        }

        if ($jenis === 'suratpernyataananakseorangibu') {
            $data = surat_pernyataan_anak_seorang_nama_ibu::findOrFail($id);
            $pdf  = Pdf::loadView('surat.pdf_pernyataan_anak_seorang_ibu', compact('data'))->setPaper('A4');
            $filename = Str::slug($data->nama ?? 'dokumen', '_');
            return $pdf->download('pdf_pernyataan_anak_seorang_ibu_' . $filename . '.pdf');
        }

        if ($jenis === 'suratpernyataanaktabarcodenomorsama') {
            $data = surat_pernyataan_akta_barcode_nomor_sama::findOrFail($id);
            $pdf  = Pdf::loadView('surat.pdf_pernyataan_akta_barcode_nomor_sama', compact('data'))->setPaper('A4');
            $filename = Str::slug($data->nama ?? 'dokumen', '_');
            return $pdf->download('pdf_pernyataan_akta_barcode_nomor_sama_' . $filename . '.pdf');
        }

        if ($jenis === 'sptjmkematian') {
            $data = surat_sptjm_kematian::findOrFail($id);
            $pdf  = Pdf::loadView('surat.pdf_sptjm_kematian', compact('data'))->setPaper('A4');
            $filename = Str::slug($data->nama ?? 'dokumen', '_');
            return $pdf->download('pdf_sptjm_kematian_' . $filename . '.pdf');
        }

        if ($jenis === 'suratketeranganhargakepemilikantanah') {
            $data = \App\Models\surat_keterangan_harga_kepemilikan_tanah::findOrFail($id);
            $pdf  = Pdf::loadView('surat.pdf_surat_keterangan_harga_kepemilikan_tanah', compact('data'))->setPaper('A4');
            $filename = Str::slug($data->nama ?? 'dokumen', '_');
            return $pdf->download('pdf_surat_keterangan_harga_kepemilikan_tanah_' . $filename . '.pdf');
        }

        if ($jenis === 'suratpengantarskck') {
            $data = SuratPengantarSkck::findOrFail($id);
            // gunakan blade cetak yang sudah kita buat sebelumnya: 'surat.cetak_skck'
            $pdf  = Pdf::loadView('surat.cetak_skck', ['skck' => $data])->setPaper('A4');
            $filename = Str::slug($data->nama ?? 'surat_pengantar_skck', '_');
            return $pdf->download('surat_pengantar_skck_' . $filename . '.pdf');
        }











        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresuratmasukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_instansi' => 'required|string|max:255',
            'keterangan'    => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'file'          => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png',
        ]);

        // Nama file yang aman
        $original = $request->file('file')->getClientOriginalName();
        $safeName = time() . '_' . Str::slug(pathinfo($original, PATHINFO_FILENAME), '_')
            . '.' . $request->file('file')->getClientOriginalExtension();

        // Pastikan direktori disk siap (opsional, biasanya otomatis)
        if (! Storage::disk('suratdesa')->exists('')) {
            Storage::disk('suratdesa')->makeDirectory('');
        }

        // Simpan file ke disk 'suratdesa'
        // Hasil $path hanya nama file (tanpa folder), contoh: 1758682751_surat_pengantar.pdf
        $path = $request->file('file')->storeAs('', $safeName, 'suratdesa');

        // Simpan data ke MongoDB
        SuratMasuk::create([
            'nama_instansi' => $request->nama_instansi,
            'keterangan'    => $request->keterangan,
            'tanggal_masuk' => $request->tanggal_masuk,
            'file'          => $path, // simpan nama file saja
        ]);

        return redirect()->route('surat.masuk')->with('msg', 'Surat masuk berhasil ditambahkan.');
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
        $request->validate([
            'nama_instansi' => 'required|string|max:255',
            'keterangan'    => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'file'          => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png',
        ]);

        // Update field non-file
        $suratmasuk->fill($request->only(['nama_instansi', 'keterangan', 'tanggal_masuk']));

        // Jika ada file baru, hapus yang lama lalu simpan yang baru
        if ($request->hasFile('file')) {

            // Hapus file lama jika ada
            if ($suratmasuk->file && Storage::disk('suratdesa')->exists($suratmasuk->file)) {
                Storage::disk('suratdesa')->delete($suratmasuk->file);
            }

            $original = $request->file('file')->getClientOriginalName();
            $safeName = time() . '_' . Str::slug(pathinfo($original, PATHINFO_FILENAME), '_')
                . '.' . $request->file('file')->getClientOriginalExtension();

            if (! Storage::disk('suratdesa')->exists('')) {
                Storage::disk('suratdesa')->makeDirectory('');
            }

            $path = $request->file('file')->storeAs('', $safeName, 'suratdesa');

            $suratmasuk->file = $path; // simpan nama file baru
        }

        $suratmasuk->save();

        return redirect()->route('surat.masuk')->with('msg', 'Surat masuk berhasil diperbarui.');
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
