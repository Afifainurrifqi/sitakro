<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rtpuengurus;
use App\Http\Requests\StorertpuengurusRequest;
use App\Http\Requests\UpdatertpuengurusRequest;

class RtpuengurusController extends Controller
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
        $rt_pengurus = rtpuengurus::all();
        $rt_pengurusSudahProses = $rt_pengurus->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk

        $persentaseProses = ($rt_pengurusSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.RT.rtpengurus', compact('rt_pengurus', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_pengurus = rtpuengurus::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrtpengurus', compact('rt_pengurus','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorertpuengurusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorertpuengurusRequest $request)
    {
        $rt_pengurus = rtpuengurus::where('nik', $request->valNIK)->first();
        if ($rt_pengurus == NULL ) {
            $rt_pengurus = new rtpuengurus();
        }
        $rt_pengurus->nik = $request->valNIK; 
        $rt_pengurus->nama_ketuarw = $request->valnama_ketuarw;
        $rt_pengurus->nik_ketuarw = $request->valnik_ketuarw;
        $rt_pengurus->nohp_ketuarw = $request->valnohp_ketuarw;
        $rt_pengurus->menjabat_ketuarw = $request->valmenjabat_ketuarw;
        $rt_pengurus->nama_sekrw = $request->valnama_sekrw;
        $rt_pengurus->nik_sekrw = $request->valnik_sekrw;
        $rt_pengurus->nohp_sekrw = $request->valnohp_sekrw;
        $rt_pengurus->menjabat_sekrw = $request->valmenjabat_sekrw;
        $rt_pengurus->nama_benrw = $request->valnama_benrw;
        $rt_pengurus->nik_benrw = $request->valnik_benrw;
        $rt_pengurus->nohp_benrw = $request->valnohp_benrw;
        $rt_pengurus->menjabat_benrw = $request->valmenjabat_benrw;
        $rt_pengurus->nama_ketuart = $request->valnama_ketuart;
        $rt_pengurus->nik_ketuart = $request->valnik_ketuart;
        $rt_pengurus->nohp_ketuart = $request->valnohp_ketuart;
        $rt_pengurus->menjabat_ketuart = $request->valmenjabat_ketuart;
        $rt_pengurus->nama_sekrt = $request->valnama_sekrt;
        $rt_pengurus->nik_sekrt = $request->valnik_sekrt;
        $rt_pengurus->nohp_sekrt = $request->valnohp_sekrt;
        $rt_pengurus->menjabat_sekrt = $request->valmenjabat_sekrt;
        $rt_pengurus->nama_benrt = $request->valnama_benrt;
        $rt_pengurus->nik_benrt = $request->valnik_benrt;
        $rt_pengurus->nohp_benrt = $request->valnohp_benrt;
        $rt_pengurus->menjabat_benrt = $request->valmenjabat_benrt;

        $rt_pengurus->save();
        return redirect()->route('rtpengurus.show',['show'=> $request->valNIK ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rtpuengurus  $rtpuengurus
     * @return \Illuminate\Http\Response
     */
    public function show(rtpuengurus $rtpuengurus, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_pengurus = rtpuengurus::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrtpengurus', compact('rt_pengurus','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rtpuengurus  $rtpuengurus
     * @return \Illuminate\Http\Response
     */
    public function edit(rtpuengurus $rtpuengurus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatertpuengurusRequest  $request
     * @param  \App\Models\rtpuengurus  $rtpuengurus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatertpuengurusRequest $request, rtpuengurus $rtpuengurus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rtpuengurus  $rtpuengurus
     * @return \Illuminate\Http\Response
     */
    public function destroy(rtpuengurus $rtpuengurus)
    {
        //
    }
}
