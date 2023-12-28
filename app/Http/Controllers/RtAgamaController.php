<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rt_agama;
use App\Http\Requests\Storert_agamaRequest;
use App\Http\Requests\Updatert_agamaRequest;

class RtAgamaController extends Controller
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
        $rt_agama = rt_agama::all();
        $rt_agamaSudahProses = $rt_agama->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk
        $persentaseProses = ($rt_agamaSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.RT.rt_agama', compact('rt_agama', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_agama = rt_agama::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrt_agama', compact('rt_agama','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_agamaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_agamaRequest $request)
    {
        $rt_agama = rt_agama::where('nik', $request->valNIK)->first();
        if ($rt_agama == NULL ) {
            $rt_agama = new rt_agama();
        }
        $rt_agama->nik = $request->valNIK;  
        $rt_agama->jumlahwarga_jamkes = $request->valjumlahwarga_jamkes;
        $rt_agama->jumlahwarga_jamketerangan = $request->valjumlahwarga_jamketerangan;
        $rt_agama->jumlahtempat_masjid = $request->valjumlahtempat_masjid;
        $rt_agama->jumlahtempat_musholla = $request->valjumlahtempat_musholla;
        $rt_agama->jumlahtempat_kristen = $request->valjumlahtempat_kristen;
        $rt_agama->jumlahtempat_katolik = $request->valjumlahtempat_katolik;
        $rt_agama->jumlahtempat_kapel = $request->valjumlahtempat_kapel;
        $rt_agama->jumlahtempat_pura = $request->valjumlahtempat_pura;
        $rt_agama->jumlahtempat_wihara = $request->valjumlahtempat_wihara;
        $rt_agama->jumlahtempat_kelenteng = $request->valjumlahtempat_kelenteng;
        $rt_agama->jumlahtempat_lainnya = $request->valjumlahtempat_lainnya;
        $rt_agama->cagar_bud1 = $request->valcagar_bud1;
        $rt_agama->cagar_bud2 = $request->valcagar_bud2;
        $rt_agama->cagar_bud3 = $request->valcagar_bud3;
        $rt_agama->sukuasing_keluarga = $request->valsukuasing_keluarga;
        $rt_agama->sukuasing_jiwa = $request->valsukuasing_jiwa;
        $rt_agama->ruangpublik_terbuka = $request->valruangpublik_terbuka;
        $rt_agama->adat_kehamilan = $request->valadat_kehamilan;
        $rt_agama->adat_kelahiran = $request->valadat_kelahiran;
        $rt_agama->adat_pekerjaan = $request->valadat_pekerjaan;
        $rt_agama->adat_alam = $request->valadat_alam;
        $rt_agama->adat_perkawinan = $request->valadat_perkawinan;
        $rt_agama->adat_kehidupanwarga = $request->valadat_kehidupanwarga;
        $rt_agama->adat_kematian = $request->valadat_kematian;

        $rt_agama->save();
        return redirect()->route('rt_agama.show',['show'=> $request->valNIK ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_agama  $rt_agama
     * @return \Illuminate\Http\Response
     */
    public function show(rt_agama $rt_agama, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_agama = rt_agama::where('nik', $nik)->first();
        $agama   = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrt_agama', compact('rt_agama','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rt_agama  $rt_agama
     * @return \Illuminate\Http\Response
     */
    public function edit(rt_agama $rt_agama)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatert_agamaRequest  $request
     * @param  \App\Models\rt_agama  $rt_agama
     * @return \Illuminate\Http\Response
     */
    public function update(Updatert_agamaRequest $request, rt_agama $rt_agama)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rt_agama  $rt_agama
     * @return \Illuminate\Http\Response
     */
    public function destroy(rt_agama $rt_agama)
    {
        //
    }
}
