<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\akses_pendidikan;
use App\Http\Requests\Storeakses_pendidikanRequest;
use App\Http\Requests\Updateakses_pendidikanRequest;
use App\Models\akseskesehatan;

class AksesPendidikanController extends Controller
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
        $akses_pendidikan = akses_pendidikan::all();
        $akses_pendidikanSudahProses = $akses_pendidikan->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk

        $persentaseProses = ($akses_pendidikanSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.KK.aksespendidikan', compact('akses_pendidikan', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $akses_pendidikan = akses_pendidikan::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.editaksespendidikan', compact('akses_pendidikan','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeakses_pendidikanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeakses_pendidikanRequest $request)
    {
        $akses_pendidikan = akses_pendidikan::where('nik', $request->valNIK)->first();
        if ($akses_pendidikan == NULL ) {
            $akses_pendidikan = new akses_pendidikan();
        }
        $akses_pendidikan->nik = $request->valNIK;      
        $akses_pendidikan-> jaraktempuh_paud = $request->valjaraktempuh_paud;
        $akses_pendidikan-> waktutempuh_paud = $request->valwaktutempuh_paud;
        $akses_pendidikan-> kemudahan_paud = $request->valkemudahan_paud;
        $akses_pendidikan-> jaraktempuh_tk = $request->valjaraktempuh_tk;
        $akses_pendidikan-> waktutempuh_tk = $request->valwaktutempuh_tk;
        $akses_pendidikan-> kemudahan_tk = $request->valkemudahan_tk;
        $akses_pendidikan-> jaraktempuh_sd = $request->valjaraktempuh_sd;
        $akses_pendidikan-> waktutempuh_sd = $request->valwaktutempuh_sd;
        $akses_pendidikan-> kemudahan_sd = $request->valkemudahan_sd;
        $akses_pendidikan-> jaraktempuh_smp = $request->valjaraktempuh_smp;
        $akses_pendidikan-> waktutempuh_smp = $request->valwaktutempuh_smp;
        $akses_pendidikan-> kemudahan_smp = $request->valkemudahan_smp;
        $akses_pendidikan-> jaraktempuh_sma = $request->valjaraktempuh_sma;
        $akses_pendidikan-> waktutempuh_sma = $request->valwaktutempuh_sma;
        $akses_pendidikan-> kemudahan_sma = $request->valkemudahan_sma;
        $akses_pendidikan-> jaraktempuh_pt = $request->valjaraktempuh_pt;
        $akses_pendidikan-> waktutempuh_pt = $request->valwaktutempuh_pt;
        $akses_pendidikan-> kemudahan_pt = $request->valkemudahan_pt;
        $akses_pendidikan-> jaraktempuh_ps = $request->valjaraktempuh_ps;
        $akses_pendidikan-> waktutempuh_ps = $request->valwaktutempuh_ps;
        $akses_pendidikan-> kemudahan_ps = $request->valkemudahan_ps;
        $akses_pendidikan-> jaraktempuh_seminari = $request->valjaraktempuh_seminari;
        $akses_pendidikan-> waktutempuh_seminari = $request->valwaktutempuh_seminari;
        $akses_pendidikan-> kemudahan_seminari = $request->valkemudahan_seminari;
        $akses_pendidikan-> jaraktempuh_pagamalain = $request->valjaraktempuh_pagamalain;
        $akses_pendidikan-> waktutempuh_pagamalain = $request->valwaktutempuh_pagamalain;
        $akses_pendidikan-> kemudahan_pagamalain = $request->valkemudahan_pagamalain;

        $akses_pendidikan->save();
        return redirect()->route('aksespendidikan.show',['show'=> $request->valNIK ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\akses_pendidikan  $akses_pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(akses_pendidikan $akses_pendidikan, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $akses_pendidikan = akses_pendidikan::where('nik',$nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.showaksespendidikan', compact('akses_pendidikan', 'datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\akses_pendidikan  $akses_pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(akses_pendidikan $akses_pendidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateakses_pendidikanRequest  $request
     * @param  \App\Models\akses_pendidikan  $akses_pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Updateakses_pendidikanRequest $request, akses_pendidikan $akses_pendidikan, $nik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\akses_pendidikan  $akses_pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(akses_pendidikan $akses_pendidikan)
    {
        //
    }
}
