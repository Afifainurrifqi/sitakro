<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rt_mitigasib;
use App\Http\Requests\Storert_mitigasibRequest;
use App\Http\Requests\Updatert_mitigasibRequest;

class RtMitigasibController extends Controller
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
        $rtmitigasib = rt_mitigasib::all();
        $rtmitigasibSudahProses = $rtmitigasib->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk

        $persentaseProses = ($rtmitigasibSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.RT.rtmitigasib', compact('rtmitigasib', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rtmitigasib = rt_mitigasib::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrtmitigasib', compact('rtmitigasib','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_mitigasibRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_mitigasibRequest $request)
    {
        $rtmitigasib = rt_mitigasib::where('nik', $request->valNIK)->first();
        if ($rtmitigasib == NULL ) {
            $rtmitigasib = new rt_mitigasib();
        }
        $rtmitigasib->nik = $request->valNIK; 
        $rtmitigasib->mitigasi_sp = $request->valmitigasi_sp;
        $rtmitigasib->mitigasi_spd = $request->valmitigasi_spd;
        $rtmitigasib->mitigasi_pk = $request->valmitigasi_pk;
        $rtmitigasib->mitigasi_rrj = $request->valmitigasi_rrj;
        $rtmitigasib->mitigasi_ppn = $request->valmitigasi_ppn;

        $rtmitigasib->save();
        return redirect()->route('rtmitigasib.show',['show'=> $request->valNIK ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_mitigasib  $rt_mitigasib
     * @return \Illuminate\Http\Response
     */
    public function show(rt_mitigasib $rt_mitigasib, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rtmitigasib = rt_mitigasib::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrtmitigasib', compact('rtmitigasib','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rt_mitigasib  $rt_mitigasib
     * @return \Illuminate\Http\Response
     */
    public function edit(rt_mitigasib $rt_mitigasib)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatert_mitigasibRequest  $request
     * @param  \App\Models\rt_mitigasib  $rt_mitigasib
     * @return \Illuminate\Http\Response
     */
    public function update(Updatert_mitigasibRequest $request, rt_mitigasib $rt_mitigasib)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rt_mitigasib  $rt_mitigasib
     * @return \Illuminate\Http\Response
     */
    public function destroy(rt_mitigasib $rt_mitigasib)
    {
        //
    }
}
