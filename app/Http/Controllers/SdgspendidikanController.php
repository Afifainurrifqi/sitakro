<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use App\Models\sdgspendidikan;
use App\Http\Requests\StoresdgspendidikanRequest;
use App\Http\Requests\UpdatesdgspendidikanRequest;
use Illuminate\Http\Request;

class SdgspendidikanController extends Controller
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
        $datasdgspendidikan = sdgspendidikan::all();
        $datasdgspendidikanSudahProses = $datasdgspendidikan->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk

        if ($datapendudukTotal != 0) {
            $persentaseProses = ($datasdgspendidikanSudahProses / $datapendudukTotal) * 100;
        } else {
            $persentaseProses = 0; // or handle it in a way that makes sense for your application
        }
        $agama = Agama::all(); 
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.individu.datasdgspendidikan',compact( 'persentaseProses', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik',$nik)->first();
        $datasdgspendidikan = sdgspendidikan::where('nik',$nik)->first();
        $agama = Agama::all(); 
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.individu.editsdgspendidikan',compact('datap', 'datasdgspendidikan', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresdgspendidikanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresdgspendidikanRequest $request)
    {
        $datasdgspendidikan = sdgspendidikan::where('nik', $request->valNIK)->first();
        if ($datasdgspendidikan == NULL ) {
            $datasdgspendidikan = new sdgspendidikan();
        }
        $datasdgspendidikan->nik = $request->valNIK;
        $datasdgspendidikan->pendidikan_tertinggi= $request->valpendidikan_tertinggi;
        $datasdgspendidikan->berapa_tahunp = $request->valberapa_tahunp;
        $datasdgspendidikan->pendidikan_diikuti = $request->valpendidikan_diikuti;
        $datasdgspendidikan->bahasa_Rumah = $request->valbahasa_Rumah;
        $datasdgspendidikan->bahasa_Formal = $request->valbahasa_Formal;
        $datasdgspendidikan->jumlah_kerja1 = $request->valjumlah_kerja1;
        $datasdgspendidikan->skamling1 = $request->valskamling;
        $datasdgspendidikan->pesta_rakyat1 = $request->valpesta_rakyat1;
        $datasdgspendidikan->frekuensiml = $request->valfrekuensiml;
        $datasdgspendidikan->frekuensib = $request->valfrekuensib;
        $datasdgspendidikan->frekuensimn = $request->valfrekuensmn;
        $datasdgspendidikan->mendapatp1 = $request->valmendapatp1;
        $datasdgspendidikan->bagaiamanap = $request->valbagaiamanap;
        $datasdgspendidikan->pernahmasukan = $request->valpernahmasukan;
        $datasdgspendidikan->keterbukaands = $request->valketerbukaands;
        $datasdgspendidikan->bencana1 = $request->valbencana1;
        $datasdgspendidikan->apakahb = $request->valapakahb;
        $datasdgspendidikan->apakahd = $request->valapakahd;
        $datasdgspendidikan->apakahp = $request->valapakahp;
        
        $datasdgspendidikan->save();

        return redirect()->route('pendidikan.show',['show'=> $request->valNIK ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sdgspendidikan  $sdgspendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(sdgspendidikan $sdgspendidikan, $nik)
    {
        $datap = datapenduduk::where('nik',$nik)->first();
        $datasdgspendidikan = sdgspendidikan::where('nik',$nik)->first();
        $agama = Agama::all(); 
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.individu.viewsdgspendidikan',compact('datap', 'datasdgspendidikan', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sdgspendidikan  $sdgspendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(sdgspendidikan $sdgspendidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesdgspendidikanRequest  $request
     * @param  \App\Models\sdgspendidikan  $sdgspendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesdgspendidikanRequest $request, sdgspendidikan $sdgspendidikan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sdgspendidikan  $sdgspendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(sdgspendidikan $sdgspendidikan)
    {
        //
    }
}
