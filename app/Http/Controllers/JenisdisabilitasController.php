<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use App\Models\jenisdisabilitas;
use App\Http\Requests\StorejenisdisabilitasRequest;
use App\Http\Requests\UpdatejenisdisabilitasRequest;
use Illuminate\Http\Request;

class JenisdisabilitasController extends Controller
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
        $datadisabilitas = jenisdisabilitas::all();
        $datadisabilitasProses = $datadisabilitas->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk

        $persentaseProses = ($datadisabilitasProses / $datapendudukTotal) * 100;
        $agama = Agama::all(); 
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.individu.datadisabilitas',compact( 'persentaseProses','datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $datadisabilitas = jenisdisabilitas::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        
        return view('sdgs.individu.editdisabilitas', compact('datap', 'datadisabilitas', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorejenisdisabilitasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorejenisdisabilitasRequest $request)
    {
        $datadisabilitas = jenisdisabilitas::where('nik', $request->valNIK)->first();
        if ($datadisabilitas == NULL ) {
            $datadisabilitas = new jenisdisabilitas();
        }
        $datadisabilitas->nik = $request->valNIK;
        $datadisabilitas->jenis_disabilitas = implode(",", $request->valjenisdisab);

        $datadisabilitas->save();

        return redirect()->route('disabilitas.show',['show'=> $request->valNIK ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jenisdisabilitas  $jenisdisabilitas
     * @return \Illuminate\Http\Response
     */
    public function show(jenisdisabilitas $jenisdisabilitas, $nik)
    {
        $datap = datapenduduk::where('nik',$nik)->first();
        $datadisabilitas = jenisdisabilitas::where('nik', $nik)->first();
        $agama = Agama::all(); 
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.individu.viewjenisdisabilitas',compact('datap', 'datadisabilitas', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jenisdisabilitas  $jenisdisabilitas
     * @return \Illuminate\Http\Response
     */
    public function edit(jenisdisabilitas $jenisdisabilitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatejenisdisabilitasRequest  $request
     * @param  \App\Models\jenisdisabilitas  $jenisdisabilitas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatejenisdisabilitasRequest $request, jenisdisabilitas $jenisdisabilitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jenisdisabilitas  $jenisdisabilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(jenisdisabilitas $jenisdisabilitas)
    {
        //
    }
}
