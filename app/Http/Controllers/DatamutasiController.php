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
use Yajra\DataTables\DataTables;
use App\Models\detailkk;
use App\Models\kk;

class DatamutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $datamutasi = Datapenduduk::whereIn('datak', ['Tetap', 'Tidaktetap']);

        return view('datamutasi.datam');
    }

    public function index_admin(Request $request)
    {
        $datamutasi = Datapenduduk::whereIn('datak', ['Tetap', 'Tidaktetap']);

        return view('datamutasi.admindatam');
    }

    public function jsonadmin(Request $request)
    {
        $allowedDatakValues = ['pindah', 'meninggal'];

        $datapenduduk = Datapenduduk::with(['kk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'detailkk.kk'])
            ->whereIn('Datak', $allowedDatakValues)
            ->limit(100)
            ->get();

        return DataTables::of($datapenduduk)
            ->addColumn('nokk', function ($row) {
                return $row->detailkk->kk->nokk;
            })
            ->make(true);
    }


    public function json(Request $request)
{
    $allowedDatakValues = ['pindah', 'meninggal'];
    $query = Datapenduduk::with(['kk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'detailkk.kk'])
        ->whereIn('Datak', $allowedDatakValues);

    if ($request->has('nik') && $request->nik != '') {
        $query->where('nik', $request->nik);
    } else {
        $query->limit(0); // No data returned if no NIK provided
    }

    $datapenduduk = $query->get();

    return DataTables::of($datapenduduk)
        ->addColumn('nokk', function ($row) {
            return $row->detailkk->kk->nokk;
        })
        ->make(true);
}



    function exportexcelm()
    {
        return Excel::download(new Exportmutasi, "datamutasiMeninggal.xlsx");
    }

    function exportexcelp()
    {
        return Excel::download(new Exportmutasipindah, "datamutasiPindah.xlsx");
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
