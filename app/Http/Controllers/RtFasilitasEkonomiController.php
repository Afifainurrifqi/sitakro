<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rt_fasilitas_ekonomi;
use App\Http\Requests\Storert_fasilitas_ekonomiRequest;
use App\Http\Requests\Updatert_fasilitas_ekonomiRequest;

class RtFasilitasEkonomiController extends Controller
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
        $rt_fasilitas_ekonomi = rt_fasilitas_ekonomi::all();
        $rt_fasilitas_ekonomiSudahProses = $rt_fasilitas_ekonomi->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk

        $persentaseProses = ($rt_fasilitas_ekonomiSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.RT.rt_fasilitas_ekonomi', compact('rt_fasilitas_ekonomi', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_fasilitas_ekonomi = rt_fasilitas_ekonomi::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrt_fasilitas_ekonomi', compact('rt_fasilitas_ekonomi','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_fasilitas_ekonomiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_fasilitas_ekonomiRequest $request)
    {
        $rt_fasilitas_ekonomi = rt_fasilitas_ekonomi::where('nik', $request->valNIK)->first();
        if ($rt_fasilitas_ekonomi == NULL ) {
            $rt_fasilitas_ekonomi = new rt_fasilitas_ekonomi();
        }
        $rt_fasilitas_ekonomi->nik = $request->valNIK;         
        $rt_fasilitas_ekonomi->kredit_usaha = $request -> valkredit_usaha;
        $rt_fasilitas_ekonomi->kredit_ketahanan = $request -> valkredit_ketahanan;
        $rt_fasilitas_ekonomi->kredit_kecil = $request -> valkredit_kecil;
        $rt_fasilitas_ekonomi->kelompok_usaha = $request -> valkelompok_usaha;
       

        $rt_fasilitas_ekonomi->save();
        return redirect()->route('rt_fasilitas_ekonomi.show',['show'=> $request->valNIK ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_fasilitas_ekonomi  $rt_fasilitas_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function show(rt_fasilitas_ekonomi $rt_fasilitas_ekonomi , $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_fasilitas_ekonomi = rt_fasilitas_ekonomi::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrt_fasilitas_ekonomi', compact('rt_fasilitas_ekonomi','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rt_fasilitas_ekonomi  $rt_fasilitas_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function edit(rt_fasilitas_ekonomi $rt_fasilitas_ekonomi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatert_fasilitas_ekonomiRequest  $request
     * @param  \App\Models\rt_fasilitas_ekonomi  $rt_fasilitas_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function update(Updatert_fasilitas_ekonomiRequest $request, rt_fasilitas_ekonomi $rt_fasilitas_ekonomi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rt_fasilitas_ekonomi  $rt_fasilitas_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function destroy(rt_fasilitas_ekonomi $rt_fasilitas_ekonomi)
    {
        //
    }
}
