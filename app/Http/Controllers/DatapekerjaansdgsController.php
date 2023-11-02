<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use App\Models\datapekerjaansdgs;
use Illuminate\Http\Request;
use App\Http\Requests\StoredatapekerjaansdgsRequest;
use App\Http\Requests\UpdatedatapekerjaansdgsRequest;

class DatapekerjaansdgsController extends Controller
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
        $datapekerjaan = datapekerjaansdgs::all();
        $datapekerjaanSudahProses = $datapekerjaan->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk     
        if ($datapendudukTotal != 0) {
            $persentaseProses = ($datapekerjaanSudahProses/ $datapendudukTotal) * 100;
        } else {
            $persentaseProses = 0; // or handle it in a way that makes sense for your application
        } // Hitung// Hitung persentase
        $dataPekerjaan = datapekerjaansdgs::all();

        // Siapkan data untuk grafik pie
        $pekerjaanLabels = $dataPekerjaan->pluck('pekerjaan_utama')->toArray();
        $pekerjaanCounts = $dataPekerjaan->countBy('pekerjaan_utama')->values()->toArray();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.individu.datasdgspekerjaan', compact('datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses', 'datapekerjaan', 'pekerjaanLabels', 'pekerjaanCounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $datapk = datapekerjaansdgs::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.individu.editdatasdgspekerjaan', compact('datap', 'datapk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredatapekerjaansdgsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredatapekerjaansdgsRequest $request)
    {

        $datapekerjaan = datapekerjaansdgs::where('nik', $request->valNIK)->first();
        if ($datapekerjaan == NULL) {
            $datapekerjaan = new datapekerjaansdgs();
        }
        $datapekerjaan->nik = $request->valNIK;
        $datapekerjaan->kondisi_pekerjaan = $request->valKondisipekerjaan;
        $datapekerjaan->pekerjaan_utama = $request->valPekerjaanutama;
        $datapekerjaan->jaminan_sosial_ketenagakerjaan = $request->valJaminanketenagakerjaan;
        $datapekerjaan->penghasilan_setahun_terakhir = $request->valPenghasilansetahun;
        $datapekerjaan->save();

        return redirect()->route('pekerjaan.show', ['show' => $request->valNIK]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\datapekerjaansdgs  $datapekerjaansdgs
     * @return \Illuminate\Http\Response
     */
    public function show(datapekerjaansdgs $datapekerjaansdgs,  $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $datapk = datapekerjaansdgs::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.individu.viewdatasdgspekerjaan', compact('datap', 'datapk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\datapekerjaansdgs  $datapekerjaansdgs
     * @return \Illuminate\Http\Response
     */
    public function edit(datapekerjaansdgs $datapekerjaansdgs, $nik)
    {
            //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedatapekerjaansdgsRequest  $request
     * @param  \App\Models\datapekerjaansdgs  $datapekerjaansdgs
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedatapekerjaansdgsRequest $request, datapekerjaansdgs $datapekerjaansdgs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\datapekerjaansdgs  $datapekerjaansdgs
     * @return \Illuminate\Http\Response
     */
    public function destroy(datapekerjaansdgs $datapekerjaansdgs)
    {
        //
    }
}
