<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rt_lingkungan;
use App\Http\Requests\Storert_lingkunganRequest;
use App\Http\Requests\Updatert_lingkunganRequest;

class RtLingkunganController extends Controller
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
        $rt_lingkungan = rt_lingkungan::all();
        $rt_lingkunganSudahProses = $rt_lingkungan->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk

        $persentaseProses = ($rt_lingkunganSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.RT.rtlingkungan', compact('rt_lingkungan', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_lingkungan = rt_lingkungan::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrtlingkungan', compact('rt_lingkungan','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_lingkunganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_lingkunganRequest $request)
    {
        $rt_lingkungan = rt_lingkungan::where('nik', $request->valNIK)->first();
        if ($rt_lingkungan == NULL ) {
            $rt_lingkungan = new rt_lingkungan();
        }
        $rt_lingkungan->nik = $request->valNIK;         
        $rt_lingkungan->lingkungan_lsi = $request -> vallingkungan_lsi;
        $rt_lingkungan->lingkungan_slno = $request -> vallingkungan_slno;
        $rt_lingkungan->lingkungan_k = $request -> vallingkungan_k;
        $rt_lingkungan->lingkungan_hl = $request -> vallingkungan_hl;
        $rt_lingkungan->lingkungan_t = $request -> vallingkungan_t;
        $rt_lingkungan->lingkungan_kte = $request -> vallingkungan_kte;
        $rt_lingkungan->lingkungan_lgt = $request -> vallingkungan_lgt;
        $rt_lingkungan->lingkungan_lpp = $request -> vallingkungan_lpp;
        $rt_lingkungan->lingkungan_ah = $request -> vallingkungan_ah;
        $rt_lingkungan->lingkungan_lpns = $request -> vallingkungan_lpns;
        $rt_lingkungan->lingkungan_lpertambangan = $request -> vallingkungan_lpertambangan;
        $rt_lingkungan->lingkungan_lperumahan = $request -> vallingkungan_lperumahan;
        $rt_lingkungan->lingkungan_lperkantoran = $request -> vallingkungan_lperkantoran;
        $rt_lingkungan->lingkungan_lindustri = $request -> vallingkungan_lindustri;
        $rt_lingkungan->lingkungan_fu = $request -> vallingkungan_fu;
        $rt_lingkungan->lingkungan_ll = $request -> vallingkungan_ll;
        $rt_lingkungan->lingkungan_nsym = $request -> vallingkungan_nsym;
        $rt_lingkungan->lingkungan_ndws = $request -> vallingkungan_ndws;
        $rt_lingkungan->lingkungan_jma = $request -> vallingkungan_jma;
        $rt_lingkungan->lingkungan_je = $request -> vallingkungan_je;
        $rt_lingkungan->lingkungan_ksb = $request -> vallingkungan_ksb;
        $rt_lingkungan->lingkungan_ks = $request -> vallingkungan_ks;
        $rt_lingkungan->lingkungan_ki = $request -> vallingkungan_ki;
        $rt_lingkungan->lingkungan_kd = $request -> vallingkungan_kd;
        $rt_lingkungan->lingkungan_ke = $request -> vallingkungan_ke;
        $rt_lingkungan->lingkungan_pair = $request -> vallingkungan_pair;
        $rt_lingkungan->lingkungan_ptanah = $request -> vallingkungan_ptanah;
        $rt_lingkungan->lingkungan_pudara = $request -> vallingkungan_pudara;
        $rt_lingkungan->lingkungan_pdusl = $request -> vallingkungan_pdusl;
        $rt_lingkungan->lingkungan_kmml = $request -> vallingkungan_kmml;
        $rt_lingkungan->lingkungan_klpg = $request -> vallingkungan_klpg;



        $rt_lingkungan->save();
        return redirect()->route('rtlingkungan.show',['show'=> $request->valNIK ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_lingkungan  $rt_lingkungan
     * @return \Illuminate\Http\Response
     */
    public function show(rt_lingkungan $rt_lingkungan, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_lingkungan = rt_lingkungan::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrtlingkungan', compact('rt_lingkungan','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rt_lingkungan  $rt_lingkungan
     * @return \Illuminate\Http\Response
     */
    public function edit(rt_lingkungan $rt_lingkungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatert_lingkunganRequest  $request
     * @param  \App\Models\rt_lingkungan  $rt_lingkungan
     * @return \Illuminate\Http\Response
     */
    public function update(Updatert_lingkunganRequest $request, rt_lingkungan $rt_lingkungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rt_lingkungan  $rt_lingkungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(rt_lingkungan $rt_lingkungan)
    {
        //
    }
}
