<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rtlembaga_ekonomi;
use App\Http\Requests\Storertlembaga_ekonomiRequest;
use App\Http\Requests\Updatertlembaga_ekonomiRequest;

class RtlembagaEkonomiController extends Controller
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
        $rtlembaga_ekonomi = rtlembaga_ekonomi::all();
        $rtlembaga_ekonomiSudahProses = $rtlembaga_ekonomi->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk
        $persentaseProses = ($rtlembaga_ekonomiSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.RT.rtlembaga_ekonomi', compact('rtlembaga_ekonomi', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrtlembaga_ekonomi', compact('rtlembaga_ekonomi','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storertlembaga_ekonomiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storertlembaga_ekonomiRequest $request)
    {
        $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $request->valNIK)->first();
        if ($rtlembaga_ekonomi == NULL ) {
            $rtlembaga_ekonomi = new rtlembaga_ekonomi();
        }
        $rtlembaga_ekonomi->nik = $request->valNIK;  
        $rtlembaga_ekonomi->agentik_jp = $request->valagentik_jp;
        $rtlembaga_ekonomi->agentik_jtk = $request->valagentik_jtk;
        $rtlembaga_ekonomi->jtri_sentra = $request->valjtri_sentra;
        $rtlembaga_ekonomi->jtri_lingkungan = $request->valjtri_lingkungan;
        $rtlembaga_ekonomi->jtri_kampung = $request->valjtri_kampung;
        $rtlembaga_ekonomi->diskotik_kpd = $request->valdiskotik_kpd;
        $rtlembaga_ekonomi->diskotik_jtl = $request->valdiskotik_jtl;
        $rtlembaga_ekonomi->lpg_kpapm = $request->vallpg_kpapm;
        $rtlembaga_ekonomi->lpg_kpapg = $request->vallpg_kpapg;
        $rtlembaga_ekonomi->koperasi_jumlah = $request->valkoperasi_jumlah;
        $rtlembaga_ekonomi->koperasi_kudproduksi = $request->valkoperasi_kudproduksi;
        $rtlembaga_ekonomi->koperasi_kudkredit = $request->valkoperasi_kudkredit;
        $rtlembaga_ekonomi->koperasi_kudkegiatan = $request->valkoperasi_kudkegiatan;
        $rtlembaga_ekonomi->koperasi_kudindustrik = $request->valkoperasi_kudindustrik;
        $rtlembaga_ekonomi->koperasi_kudksp = $request->valkoperasi_kudksp;
        $rtlembaga_ekonomi->koperasi_kudksu = $request->valkoperasi_kudksu;
        $rtlembaga_ekonomi->koperasi_kudlainnya = $request->valkoperasi_kudlainnya;
        $rtlembaga_ekonomi->kos_kud = $request->valkos_kud;
        $rtlembaga_ekonomi->kos_bumdes = $request->valkos_bumdes;
        $rtlembaga_ekonomi->kos_selain = $request->valkos_selain;

        $rtlembaga_ekonomi->save();
        return redirect()->route('rtlembaga_ekonomi.show',['show'=> $request->valNIK ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rtlembaga_ekonomi  $rtlembaga_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function show(rtlembaga_ekonomi $rtlembaga_ekonomi, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $nik)->first();
        $agama   = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrtlembaga_ekonomi', compact('rtlembaga_ekonomi','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rtlembaga_ekonomi  $rtlembaga_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function edit(rtlembaga_ekonomi $rtlembaga_ekonomi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatertlembaga_ekonomiRequest  $request
     * @param  \App\Models\rtlembaga_ekonomi  $rtlembaga_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function update(Updatertlembaga_ekonomiRequest $request, rtlembaga_ekonomi $rtlembaga_ekonomi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rtlembaga_ekonomi  $rtlembaga_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function destroy(rtlembaga_ekonomi $rtlembaga_ekonomi)
    {
        //
    }
}
