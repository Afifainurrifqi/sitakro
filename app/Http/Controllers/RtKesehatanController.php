<?php

namespace App\Http\Controllers;


use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rt_kesehatan;
use App\Http\Requests\Storert_kesehatanRequest;
use App\Http\Requests\Updatert_kesehatanRequest;

class RtKesehatanController extends Controller
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
        $rt_kesehatan = rt_kesehatan::all();
        $rt_kesehatanSudahProses = $rt_kesehatan->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk

        $persentaseProses = ($rt_kesehatanSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.RT.rt_kesehatan', compact('rt_kesehatan', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_kesehatan = rt_kesehatan::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrt_kesehatan', compact('rt_kesehatan','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_kesehatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_kesehatanRequest $request)
    {
        $rt_kesehatan = rt_kesehatan::where('nik', $request->valNIK)->first();
        if ($rt_kesehatan == NULL ) {
            $rt_kesehatan = new rt_kesehatan();
        }
        $rt_kesehatan->nik = $request->valNIK;      
        $rt_kesehatan->nama_rs = $request->valnama_rs;
        $rt_kesehatan->pemilik_rs = $request->valpemilik_rs;
        $rt_kesehatan->jd_rs = $request->valjd_rs;
        $rt_kesehatan->jb_rs = $request->valjb_rs;
        $rt_kesehatan->jts_rs = $request->valjts_rs;
        $rt_kesehatan->jp_rs = $request->valjp_rs;
        $rt_kesehatan->nama_rsb = $request->valnama_rsb;
        $rt_kesehatan->pemilik_rsb = $request->valpemilik_rsb;
        $rt_kesehatan->jd_rsb = $request->valjd_rsb;
        $rt_kesehatan->jb_rsb = $request->valjb_rsb;
        $rt_kesehatan->jts_rsb = $request->valjts_rsb;
        $rt_kesehatan->jp_rsb = $request->valjp_rsb;
        $rt_kesehatan->nama_pdri = $request->valnama_pdri;
        $rt_kesehatan->pemilik_pdri = $request->valpemilik_pdri;
        $rt_kesehatan->jd_pdri = $request->valjd_pdri;
        $rt_kesehatan->jb_pdri = $request->valjb_pdri;
        $rt_kesehatan->jts_pdri = $request->valjts_pdri;
        $rt_kesehatan->jp_pdri = $request->valjp_pdri;
        $rt_kesehatan->nama_ptri = $request->valnama_ptri;
        $rt_kesehatan->pemilik_ptri = $request->valpemilik_ptri;
        $rt_kesehatan->jd_ptri = $request->valjd_ptri;
        $rt_kesehatan->jb_ptri = $request->valjb_ptri;
        $rt_kesehatan->jts_ptri = $request->valjts_ptri;
        $rt_kesehatan->jp_ptri = $request->valjp_ptri;
        $rt_kesehatan->nama_pp = $request->valnama_pp;
        $rt_kesehatan->pemilik_pp = $request->valpemilik_pp;
        $rt_kesehatan->jd_pp = $request->valjd_pp;
        $rt_kesehatan->jb_pp = $request->valjb_pp;
        $rt_kesehatan->jts_pp = $request->valjts_pp;
        $rt_kesehatan->jp_pp = $request->valjp_pp;
        $rt_kesehatan->nama_pbp = $request->valnama_pbp;
        $rt_kesehatan->pemilik_pbp = $request->valpemilik_pbp;
        $rt_kesehatan->jd_pbp = $request->valjd_pbp;
        $rt_kesehatan->jb_pbp = $request->valjb_pbp;
        $rt_kesehatan->jts_pbp = $request->valjts_pbp;
        $rt_kesehatan->jp_pbp = $request->valjp_pbp;
        $rt_kesehatan->nama_tpd = $request->valnama_tpd;
        $rt_kesehatan->pemilik_tpd = $request->valpemilik_tpd;
        $rt_kesehatan->jd_tpd = $request->valjd_tpd;
        $rt_kesehatan->jb_tpd = $request->valjb_tpd;
        $rt_kesehatan->jts_tpd = $request->valjts_tpd;
        $rt_kesehatan->jp_tpd = $request->valjp_tpd;
        $rt_kesehatan->nama_rb = $request->valnama_rb;
        $rt_kesehatan->pemilik_rb = $request->valpemilik_rb;
        $rt_kesehatan->jd_rb = $request->valjd_rb;
        $rt_kesehatan->jb_rb = $request->valjb_rb;
        $rt_kesehatan->jts_rb = $request->valjts_rb;
        $rt_kesehatan->jp_rb = $request->valjp_rb;
        $rt_kesehatan->nama_tpb = $request->valnama_tpb;
        $rt_kesehatan->pemilik_tpb = $request->valpemilik_tpb;
        $rt_kesehatan->jd_tpb = $request->valjd_tpb;
        $rt_kesehatan->jb_tpb = $request->valjb_tpb;
        $rt_kesehatan->jts_tpb = $request->valjts_tpb;
        $rt_kesehatan->jp_tpb = $request->valjp_tpb;
        $rt_kesehatan->nama_poskedes = $request->valnama_poskedes;
        $rt_kesehatan->pemilik_poskedes = $request->valpemilik_poskedes;
        $rt_kesehatan->jd_poskedes = $request->valjd_poskedes;
        $rt_kesehatan->jb_poskedes = $request->valjb_poskedes;
        $rt_kesehatan->jts_poskedes = $request->valjts_poskedes;
        $rt_kesehatan->jp_poskedes = $request->valjp_poskedes;
        $rt_kesehatan->nama_polindes = $request->valnama_polindes;
        $rt_kesehatan->pemilik_polindes = $request->valpemilik_polindes;
        $rt_kesehatan->jd_polindes = $request->valjd_polindes;
        $rt_kesehatan->jb_polindes = $request->valjb_polindes;
        $rt_kesehatan->jts_polindes = $request->valjts_polindes;
        $rt_kesehatan->jp_polindes = $request->valjp_polindes;
        $rt_kesehatan->nama_apotik = $request->valnama_apotik;
        $rt_kesehatan->pemilik_apotik = $request->valpemilik_apotik;
        $rt_kesehatan->jd_apotik = $request->valjd_apotik;
        $rt_kesehatan->jb_apotik = $request->valjb_apotik;
        $rt_kesehatan->jts_apotik = $request->valjts_apotik;
        $rt_kesehatan->jp_apotik = $request->valjp_apotik;
        $rt_kesehatan->nama_tokojamu = $request->valnama_tokojamu;
        $rt_kesehatan->pemilik_tokojamu = $request->valpemilik_tokojamu;
        $rt_kesehatan->jd_tokojamu = $request->valjd_tokojamu;
        $rt_kesehatan->jb_tokojamu = $request->valjb_tokojamu;
        $rt_kesehatan->jts_tokojamu = $request->valjts_tokojamu;
        $rt_kesehatan->jp_tokojamu = $request->valjp_tokojamu;
        $rt_kesehatan->nama_posyandu = $request->valnama_posyandu;
        $rt_kesehatan->pemilik_posyandu = $request->valpemilik_posyandu;
        $rt_kesehatan->jd_posyandu = $request->valjd_posyandu;
        $rt_kesehatan->jb_posyandu = $request->valjb_posyandu;
        $rt_kesehatan->jts_posyandu = $request->valjts_posyandu;
        $rt_kesehatan->jp_posyandu = $request->valjp_posyandu;
        $rt_kesehatan->nama_posbindu = $request->valnama_posbindu;
        $rt_kesehatan->pemilik_posbindu = $request->valpemilik_posbindu;
        $rt_kesehatan->jd_posbindu = $request->valjd_posbindu;
        $rt_kesehatan->jb_posbindu = $request->valjb_posbindu;
        $rt_kesehatan->jts_posbindu = $request->valjts_posbindu;
        $rt_kesehatan->jp_posbindu = $request->valjp_posbindu;
        $rt_kesehatan->nama_tpd = $request->valnama_tpd;
        $rt_kesehatan->pemilik_tpd = $request->valpemilik_tpd;
        $rt_kesehatan->jd_tpd = $request->valjd_tpd;
        $rt_kesehatan->jb_tpd = $request->valjb_tpd;
        $rt_kesehatan->jts_tpd = $request->valjts_tpd;
        $rt_kesehatan->jp_tpd = $request->valjp_tpd;

        $rt_kesehatan->save();
        return redirect()->route('rt_kesehatan.show',['show'=> $request->valNIK ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_kesehatan  $rt_kesehatan
     * @return \Illuminate\Http\Response
     */
    public function show(rt_kesehatan $rt_kesehatan, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_kesehatan = rt_kesehatan::where('nik', $nik)->first();
        $agama   = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrt_kesehatan', compact('rt_kesehatan','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rt_kesehatan  $rt_kesehatan
     * @return \Illuminate\Http\Response
     */
    public function edit(rt_kesehatan $rt_kesehatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatert_kesehatanRequest  $request
     * @param  \App\Models\rt_kesehatan  $rt_kesehatan
     * @return \Illuminate\Http\Response
     */
    public function update(Updatert_kesehatanRequest $request, rt_kesehatan $rt_kesehatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rt_kesehatan  $rt_kesehatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(rt_kesehatan $rt_kesehatan)
    {
        //
    }
}
