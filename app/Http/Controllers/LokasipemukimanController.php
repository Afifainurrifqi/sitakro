<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\lokasipemukiman;
use App\Http\Requests\StorelokasipemukimanRequest;
use App\Http\Requests\UpdatelokasipemukimanRequest;
use App\Models\dataindividu;

class LokasipemukimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $datapenduduk = datapenduduk::whereIn('datak', ['Tetap', 'Tidaktetap']);

        if ($search) {
            $datapenduduk->where('nik', 'like', '%' . $search . '%');
        }

        $datapenduduk = $datapenduduk->paginate(100);
        $lokasipemukiman = lokasipemukiman::all();
        $lokasipemukimanSudahProses = $lokasipemukiman->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk

        $persentaseProses = ($lokasipemukimanSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.kk.lokasidanpemukiman', compact('lokasipemukiman', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $lokasi = lokasipemukiman::where('nik', $nik)->first();
        $datai = dataindividu::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.kk.editlokasidanpemukiman', compact('datai', 'datap', 'lokasi', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorelokasipemukimanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelokasipemukimanRequest $request)
    {
        $lokasi = lokasipemukiman::where('nik', $request->valNIK)->first();
        if ($lokasi == NULL) {
            $lokasi = new lokasipemukiman();
        }
        $lokasi->nokk = $request->valNokk;
        $lokasi->nik = $request->valNIK;
        $lokasi->nama = $request->valNama;
        $lokasi->alamat = $request->valAlamat;
        $lokasi->nohp = $request->valNohp;
        $lokasi->nowa = $request->valNowa;
        $lokasi->nik_kepala = $request->valnik_kepala;
        $lokasi->tempat_tinggal = $request->valtempat_tinggal;
        $lokasi->status_lahan = $request->valstatus_lahan;
        $lokasi->luas_lantai_tinggal = $request->valluas_lantai_tinggal;
        $lokasi->luas_tanah_tinggal = $request->valluas_tanah_tinggal;
        $lokasi->jenis_lantai_tinggal = $request->valjenis_lantai_tinggal;
        $lokasi->dinding_sebagian = $request->valdinding_sebagian;
        $lokasi->jendela = $request->valjendela;
        $lokasi->atap = $request->valatap;
        $lokasi->penerangan = $request->valpenerangan;
        $lokasi->energi_masak = $request->valenergi_masak;
        $lokasi->jika_kayu_jenis = $request->valjika_kayu_jenis;
        $lokasi->tempat_sampah = $request->valtempat_sampah;
        $lokasi->mck = $request->valmck;
        $lokasi->sumber_air_mandi = $request->valsumber_air_mandi;
        $lokasi->sumber_air_mck = $request->valsumber_air_mck;
        $lokasi->sumber_air_minum = $request->valsumber_air_minum;
        $lokasi->tempat_pembuangan_limbah = $request->valtempat_pembuangan_limbah;
        $lokasi->rumah_sutet = $request->valrumah_sutet;
        $lokasi->rumah_sungai = $request->valrumah_sungai;
        $lokasi->rumah_lereng_gunung = $request->valrumah_lereng_gunung;
        $lokasi->kondi_rumah_kumuh = $request->valkondi_rumah_kumuh;
        
        $lokasi->save();

        return redirect()->route('lokasipemukiman.show', ['show' => $request->valNIK]);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lokasipemukiman  $lokasipemukiman
     * @return \Illuminate\Http\Response
     */
    public function show(lokasipemukiman $lokasipemukiman, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $lokasi = lokasipemukiman::where('nik', $nik)->first();
        $datai = dataindividu::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.kk.showlokasidanpemukiman', compact('datai', 'datap', 'lokasi', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lokasipemukiman  $lokasipemukiman
     * @return \Illuminate\Http\Response
     */
    public function edit(lokasipemukiman $lokasipemukiman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelokasipemukimanRequest  $request
     * @param  \App\Models\lokasipemukiman  $lokasipemukiman
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelokasipemukimanRequest $request, lokasipemukiman $lokasipemukiman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lokasipemukiman  $lokasipemukiman
     * @return \Illuminate\Http\Response
     */
    public function destroy(lokasipemukiman $lokasipemukiman)
    {
        //
    }
}
