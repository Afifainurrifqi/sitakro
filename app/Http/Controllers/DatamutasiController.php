<?php

namespace App\Http\Controllers;


use App\Exports\Exportmutasi;
use App\Exports\Exportmutasipindah;
use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use App\Models\datamutasi;
use App\Models\dataindividu;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoredatamutasiRequest;
use App\Http\Requests\UpdatedatamutasiRequest;

class datamutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $datapenduduk = datapenduduk::whereIn('datak', ['Meninggal', 'Pindah']);

        if ($search) {
            $datapenduduk->where('nik', 'like', '%' . $search . '%');
        }  
        $datapenduduk = $datapenduduk->paginate(100);     
        $agama = Agama::all(); 
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('datamutasi.datam',compact('datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status')); 
    }

    function exportexcelm()
    {
        return Excel::download(new Exportmutasi, "datamutasiMeninggal.xlsx" );
    }

    function exportexcelp()
    {
        return Excel::download(new Exportmutasipindah, "datamutasiPindah.xlsx" );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredatamutasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredatamutasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\datamutasi  $datamutasi
     * @return \Illuminate\Http\Response
     */
    public function show(datamutasi $datamutasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\datamutasi  $datamutasi
     * @return \Illuminate\Http\Response
     */
    public function edit(datamutasi $datamutasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedatamutasiRequest  $request
     * @param  \App\Models\datamutasi  $datamutasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedatamutasiRequest $request, datamutasi $datamutasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\datamutasi  $datamutasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(datamutasi $datamutasi)
    {
        //
    }
}
