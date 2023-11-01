<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use App\Models\penghasilan;
use App\Http\Requests\StorepenghasilanRequest;
use App\Http\Requests\UpdatepenghasilanRequest;
use Illuminate\Http\Request;

class PenghasilanController extends Controller
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
        $penghasilan = penghasilan::all();
        $datapenghasilanSudahProses = $penghasilan->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk

        $persentaseProses = ($datapenghasilanSudahProses / $datapendudukTotal) * 100; 
        $agama = Agama::all(); 
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.individu.datapenghasilan',compact( 'persentaseProses','datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik',$nik)->first();
        $dataph = penghasilan::where('nik',$nik)->first();
        $agama = Agama::all(); 
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.individu.editpenghasilan',compact('datap', 'dataph', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepenghasilanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepenghasilanRequest $request)
    {
        $dataph = penghasilan::where('nik', $request->valNIK)->first();
        if ($dataph == NULL ) {
            $dataph = new penghasilan();
        }
        $dataph->nik = $request->valNIK;
        $dataph->sumber_penghasilan = $request->valSumberpenghasilan;
        $dataph->jumlah_asset_darip = $request->valJumlahasset;
        $dataph->satuan = $request->valSatuan;
        $dataph->penghasilan_setahun = $request->valPenghasilanset;
        $dataph->expor = $request->valExport;
        $dataph->save();

        return redirect()->route('penghasilan.show',['show'=> $request->valNIK ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\penghasilan  $penghasilan
     * @return \Illuminate\Http\Response
     */
    public function show(penghasilan $penghasilan, $nik)
    {
        $datap = datapenduduk::where('nik',$nik)->first();
        $dataph = penghasilan::where('nik',$nik)->first();
        $agama = Agama::all(); 
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.individu.viewpenghasilan',compact('datap', 'dataph', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\penghasilan  $penghasilan
     * @return \Illuminate\Http\Response
     */
    public function edit(penghasilan $penghasilan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepenghasilanRequest  $request
     * @param  \App\Models\penghasilan  $penghasilan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepenghasilanRequest $request, penghasilan $penghasilan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penghasilan  $penghasilan
     * @return \Illuminate\Http\Response
     */
    public function destroy(penghasilan $penghasilan)
    {
        //
    }
}
