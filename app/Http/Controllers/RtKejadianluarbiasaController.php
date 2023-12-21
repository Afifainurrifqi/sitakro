<?php

namespace App\Http\Controllers;


use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rt_kejadianluarbiasa;
use App\Http\Requests\Storert_kejadianluarbiasaRequest;
use App\Http\Requests\Updatert_kejadianluarbiasaRequest;

class RtKejadianluarbiasaController extends Controller
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
        $rt_kejadianluarbiasa = rt_kejadianluarbiasa::all();
        $rt_kejadianluarbiasaSudahProses = $rt_kejadianluarbiasa->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk
        $persentaseProses = ($rt_kejadianluarbiasaSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.RT.rt_kejadianluarbiasa', compact('rt_kejadianluarbiasa', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrt_kejadianluarbiasa', compact('rt_kejadianluarbiasa','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_kejadianluarbiasaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_kejadianluarbiasaRequest $request)
    {   
        $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $request->valNIK)->first();
        if ($rt_kejadianluarbiasa == NULL ) {
            $rt_kejadianluarbiasa = new rt_kejadianluarbiasa();
        }
        $rt_kejadianluarbiasa->nik = $request->valNIK;   
        $rt_kejadianluarbiasa->nama_muntaber = $request->valnama_muntaber;
        $rt_kejadianluarbiasa->jp_muntaber = $request->valjp_muntaber;
        $rt_kejadianluarbiasa->jm_muntaber = $request->valjm_muntaber;
        $rt_kejadianluarbiasa->nama_dbd = $request->valnama_dbd;
        $rt_kejadianluarbiasa->jp_dbd = $request->valjp_dbd;
        $rt_kejadianluarbiasa->jm_dbd = $request->valjm_dbd;
        $rt_kejadianluarbiasa->nama_campak = $request->valnama_campak;
        $rt_kejadianluarbiasa->jp_campak = $request->valjp_campak;
        $rt_kejadianluarbiasa->jm_campak = $request->valjm_campak;
        $rt_kejadianluarbiasa->nama_malaria = $request->valnama_malaria;
        $rt_kejadianluarbiasa->jp_malaria = $request->valjp_malaria;
        $rt_kejadianluarbiasa->jm_malaria = $request->valjm_malaria;
        $rt_kejadianluarbiasa->nama_fluburung = $request->valnama_fluburung;
        $rt_kejadianluarbiasa->jp_fluburung = $request->valjp_fluburung;
        $rt_kejadianluarbiasa->jm_fluburung = $request->valjm_fluburung;
        $rt_kejadianluarbiasa->nama_covid19 = $request->valnama_covid19;
        $rt_kejadianluarbiasa->jp_covid19 = $request->valjp_covid19;
        $rt_kejadianluarbiasa->jm_covid19 = $request->valjm_covid19;
        $rt_kejadianluarbiasa->nama_hepatitisb = $request->valnama_hepatitisb;
        $rt_kejadianluarbiasa->jp_hepatitisb = $request->valjp_hepatitisb;
        $rt_kejadianluarbiasa->jm_hepatitisb = $request->valjm_hepatitisb;
        $rt_kejadianluarbiasa->nama_hepatitise = $request->valnama_hepatitise;
        $rt_kejadianluarbiasa->jp_hepatitise = $request->valjp_hepatitise;
        $rt_kejadianluarbiasa->jm_hepatitise = $request->valjm_hepatitise;
        $rt_kejadianluarbiasa->nama_dipteri = $request->valnama_dipteri;
        $rt_kejadianluarbiasa->jp_dipteri = $request->valjp_dipteri;
        $rt_kejadianluarbiasa->jm_dipteri = $request->valjm_dipteri;
        $rt_kejadianluarbiasa->nama_chikung = $request->valnama_chikung;
        $rt_kejadianluarbiasa->jp_chikung = $request->valjp_chikung;
        $rt_kejadianluarbiasa->jm_chikung = $request->valjm_chikung;
        $rt_kejadianluarbiasa->nama_leptos = $request->valnama_leptos;
        $rt_kejadianluarbiasa->jp_leptos = $request->valjp_leptos;
        $rt_kejadianluarbiasa->jm_leptos = $request->valjm_leptos;
        $rt_kejadianluarbiasa->nama_giziburuk = $request->valnama_giziburuk;
        $rt_kejadianluarbiasa->jp_giziburuk = $request->valjp_giziburuk;
        $rt_kejadianluarbiasa->jm_giziburuk = $request->valjm_giziburuk;
        $rt_kejadianluarbiasa->nama_lainnya = $request->valnama_lainnya;
        $rt_kejadianluarbiasa->jp_lainnya = $request->valjp_lainnya;
        $rt_kejadianluarbiasa->jm_lainnya = $request->valjm_lainnya;

        $rt_kejadianluarbiasa->save();
        return redirect()->route('rt_kejadianluarbiasa.show',['show'=> $request->valNIK ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_kejadianluarbiasa  $rt_kejadianluarbiasa
     * @return \Illuminate\Http\Response
     */
    public function show(rt_kejadianluarbiasa $rt_kejadianluarbiasa, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $nik)->first();
        $agama   = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrt_kejadianluarbiasa', compact('rt_kejadianluarbiasa','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rt_kejadianluarbiasa  $rt_kejadianluarbiasa
     * @return \Illuminate\Http\Response
     */
    public function edit(rt_kejadianluarbiasa $rt_kejadianluarbiasa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatert_kejadianluarbiasaRequest  $request
     * @param  \App\Models\rt_kejadianluarbiasa  $rt_kejadianluarbiasa
     * @return \Illuminate\Http\Response
     */
    public function update(Updatert_kejadianluarbiasaRequest $request, rt_kejadianluarbiasa $rt_kejadianluarbiasa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rt_kejadianluarbiasa  $rt_kejadianluarbiasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(rt_kejadianluarbiasa $rt_kejadianluarbiasa)
    {
        //
    }
}
