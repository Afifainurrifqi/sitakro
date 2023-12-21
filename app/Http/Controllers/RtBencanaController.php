<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rt_bencana;
use App\Http\Requests\Storert_bencanaRequest;
use App\Http\Requests\Updatert_bencanaRequest;

class RtBencanaController extends Controller
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
        $rtbencana = rt_bencana::all();
        $rtbencanaSudahProses = $rtbencana->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk

        $persentaseProses = ($rtbencanaSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.RT.rtbencana', compact('rtbencana', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rtbencana = rt_bencana::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrtbencana', compact('rtbencana','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_bencanaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_bencanaRequest $request)
    {
        $rtbencana = rt_bencana::where('nik', $request->valNIK)->first();
        if ($rtbencana == NULL ) {
            $rtbencana = new rt_bencana();
        }
        $rtbencana->nik = $request->valNIK;        
        $rtbencana->k_longsor =  $request ->valk_longsor;
        $rtbencana->f_longsor =  $request ->valf_longsor;
        $rtbencana->kj_longsor =  $request ->valkj_longsor;
        $rtbencana->jp_longsor =  $request ->valjp_longsor;
        $rtbencana->wt_longsor =  $request ->valwt_longsor;
        $rtbencana->k_banjir =  $request ->valk_banjir;
        $rtbencana->f_banjir =  $request ->valf_banjir;
        $rtbencana->kj_banjir =  $request ->valkj_banjir;
        $rtbencana->jp_banjir =  $request ->valjp_banjir;
        $rtbencana->wt_banjir =  $request ->valwt_banjir;
        $rtbencana->k_bandang =  $request ->valk_bandang;
        $rtbencana->f_bandang =  $request ->valf_bandang;
        $rtbencana->kj_bandang =  $request ->valkj_bandang;
        $rtbencana->jp_bandang =  $request ->valjp_bandang;
        $rtbencana->wt_bandang =  $request ->valwt_bandang;
        $rtbencana->k_gempa =  $request ->valk_gempa;
        $rtbencana->f_gempa =  $request ->valf_gempa;
        $rtbencana->kj_gempa =  $request ->valkj_gempa;
        $rtbencana->jp_gempa =  $request ->valjp_gempa;
        $rtbencana->wt_gempa =  $request ->valwt_gempa;
        $rtbencana->k_tsunami =  $request ->valk_tsunami;
        $rtbencana->f_tsunami =  $request ->valf_tsunami;
        $rtbencana->kj_tsunami =  $request ->valkj_tsunami;
        $rtbencana->jp_tsunami =  $request ->valjp_tsunami;
        $rtbencana->wt_tsunami =  $request ->valwt_tsunami;
        $rtbencana->k_puyuh =  $request ->valk_puyuh;
        $rtbencana->f_puyuh =  $request ->valf_puyuh;
        $rtbencana->kj_puyuh =  $request ->valkj_puyuh;
        $rtbencana->jp_puyuh =  $request ->valjp_puyuh;
        $rtbencana->wt_puyuh =  $request ->valwt_puyuh;
        $rtbencana->k_gunungm =  $request ->valk_gunungm;
        $rtbencana->f_gunungm =  $request ->valf_gunungm;
        $rtbencana->kj_gunungm =  $request ->valkj_gunungm;
        $rtbencana->jp_gunungm =  $request ->valjp_gunungm;
        $rtbencana->wt_gunungm =  $request ->valwt_gunungm;
        $rtbencana->k_hutank =  $request ->valk_hutank;
        $rtbencana->f_hutank =  $request ->valf_hutank;
        $rtbencana->kj_hutank =  $request ->valkj_hutank;
        $rtbencana->jp_hutank =  $request ->valjp_hutank;
        $rtbencana->wt_hutank =  $request ->valwt_hutank;
        $rtbencana->k_kekeringan =  $request ->valk_kekeringan;
        $rtbencana->f_kekeringan =  $request ->valf_kekeringan;
        $rtbencana->kj_kekeringan =  $request ->valkj_kekeringan;
        $rtbencana->jp_kekeringan =  $request ->valjp_kekeringan;
        $rtbencana->wt_kekeringan =  $request ->valwt_kekeringan;

        $rtbencana->save();
        return redirect()->route('rtbencana.show',['show'=> $request->valNIK ]);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_bencana  $rt_bencana
     * @return \Illuminate\Http\Response
     */
    public function show(rt_bencana $rt_bencana, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rtbencana = rt_bencana::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrtbencana', compact('rtbencana','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rt_bencana  $rt_bencana
     * @return \Illuminate\Http\Response
     */
    public function edit(rt_bencana $rt_bencana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatert_bencanaRequest  $request
     * @param  \App\Models\rt_bencana  $rt_bencana
     * @return \Illuminate\Http\Response
     */
    public function update(Updatert_bencanaRequest $request, rt_bencana $rt_bencana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rt_bencana  $rt_bencana
     * @return \Illuminate\Http\Response
     */
    public function destroy(rt_bencana $rt_bencana)
    {
        //
    }
}
