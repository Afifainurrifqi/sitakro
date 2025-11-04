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

        $query = Datapenduduk::query()
            ->with(['agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'detailkk.kk'])
            ->whereIn('datak', $allowedDatakValues);

        return DataTables::of($query)
            ->addIndexColumn() // otomatis kolom nomor (DT_RowIndex)
            ->addColumn('nokk', function ($row) {
                return optional(optional($row->detailkk)->kk)->nokk;
            })
            // Izinkan search untuk kolom relasi NO KK
            ->filterColumn('nokk', function ($q, $keyword) {
                $q->whereHas('detailkk.kk', function ($qq) use ($keyword) {
                    $qq->where('nokk', 'like', "%{$keyword}%");
                });
            })
            // Izinkan sort kolom relasi NO KK
            ->orderColumn('nokk', function ($q, $order) {
                $q->leftJoin('detailkks', 'detailkks.nik', '=', 'datapenduduks.nik')
                    ->leftJoin('kks', 'kks.id', '=', 'detailkks.kk_id')
                    ->orderBy('kks.nokk', $order)
                    ->select('datapenduduks.*'); // pastikan kolom unik
            })
            // Kolom nested aman null
            ->addColumn('agama.nama', fn($r) => optional($r->agama)->nama ?? '-')
            ->addColumn('pendidikan.nama', fn($r) => optional($r->pendidikan)->nama ?? '-')
            ->addColumn('pekerjaan.nama', fn($r) => optional($r->pekerjaan)->nama ?? '-')
            ->addColumn('goldar.nama', fn($r) => optional($r->goldar)->nama ?? '-')
            ->addColumn('status.nama', fn($r) => optional($r->status)->nama ?? '-')
            ->toJson();
    }


    public function json(Request $request)
    {
        $allowed = ['pindah', 'Pindah', 'meninggal', 'Meninggal'];

        // Deteksi global search dari DataTables (search[value])
        $hasGlobalSearch = filled(data_get($request->all(), 'search.value'));
        $hasNik  = $request->filled('nik');
        $hasNokk = $request->filled('nokk');

        if (!$hasGlobalSearch && !$hasNik && !$hasNokk) {
            // Kosong saat load awal
            $query = Datapenduduk::query()->whereRaw('1=0');
        } else {
            $query = Datapenduduk::query()
                ->with(['agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'detailkk.kk'])
                ->whereIn('datak', $allowed);

            // Filter spesifik (opsional)
            if ($hasNik) {
                $query->where('nik', $request->nik);
            }
            if ($hasNokk) {
                $nokk = $request->nokk;
                $query->whereHas('detailkk.kk', function ($qq) use ($nokk) {
                    $qq->where('nokk', 'like', "%{$nokk}%");
                });
            }
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('nokk', fn($r) => optional(optional($r->detailkk)->kk)->nokk)
            // Enable search NOKK saat global search
            ->filterColumn('nokk', function ($q, $keyword) {
                $q->whereHas('detailkk.kk', function ($qq) use ($keyword) {
                    $qq->where('nokk', 'like', "%{$keyword}%");
                });
            })
            ->orderColumn('nokk', function ($q, $order) {
                $q->leftJoin('detailkks', 'detailkks.nik', '=', 'datapenduduks.nik')
                    ->leftJoin('kks', 'kks.id', '=', 'detailkks.kk_id')
                    ->orderBy('kks.nokk', $order)
                    ->select('datapenduduks.*');
            })
            ->toJson();
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
