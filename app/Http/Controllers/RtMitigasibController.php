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
use App\Models\Datart;
use Yajra\DataTables\DataTables;

class RtMitigasibController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = rt_mitigasib::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;
        return view('sdgs.RT.rtmitigasib', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = rt_mitigasib::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;
        return view('sdgs.RT.admin_rtmitigasib', compact('presentase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        $rtmitigasib = rt_mitigasib::where('nik', $nik)->first();

        return view('sdgs.RT.editrtmitigasib', compact('rtmitigasib','datart'));
    }

    public function json(Request $request)
    {
        $query = Datart::query(); // Query the data_rt model

        if ($request->has('nik')) {
            $nik = $request->input('nik');
            $query = Datart::with([])
                ->where('nik', $nik);
        } else {
            // Jika tidak ada parameter NIK, kembalikan data kosong
            $query = Datart::whereNull('nik'); // Tidak mengembalikan data
        }

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('rtmitigasib.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rtmitigasib.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>


                        </td>';
            })

            ->addColumn('mitigasi_sp', function ($row) {
                $rtlokasi = rt_mitigasib::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->mitigasi_sp : '';
            })
            ->addColumn('mitigasi_spd', function ($row) {
                $rtlokasi = rt_mitigasib::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->mitigasi_spd : '';
            })
            ->addColumn('mitigasi_pk', function ($row) {
                $rtlokasi = rt_mitigasib::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->mitigasi_pk : '';
            })
            ->addColumn('mitigasi_rrj', function ($row) {
                $rtlokasi = rt_mitigasib::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->mitigasi_rrj : '';
            })
            ->addColumn('mitigasi_ppn', function ($row) {
                $rtlokasi = rt_mitigasib::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->mitigasi_ppn : '';
            })




            ->rawColumns([
                'action',


            ])
            ->toJson();
    }

    public function jsonadmin(Request $request)
    {
        $query = Datart::query(); // Query the data_rt model

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('rtmitigasib.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rtmitigasib.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>


                        </td>';
            })

            ->addColumn('mitigasi_sp', function ($row) {
                $rtlokasi = rt_mitigasib::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->mitigasi_sp : '';
            })
            ->addColumn('mitigasi_spd', function ($row) {
                $rtlokasi = rt_mitigasib::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->mitigasi_spd : '';
            })
            ->addColumn('mitigasi_pk', function ($row) {
                $rtlokasi = rt_mitigasib::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->mitigasi_pk : '';
            })
            ->addColumn('mitigasi_rrj', function ($row) {
                $rtlokasi = rt_mitigasib::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->mitigasi_rrj : '';
            })
            ->addColumn('mitigasi_ppn', function ($row) {
                $rtlokasi = rt_mitigasib::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->mitigasi_ppn : '';
            })




            ->rawColumns([
                'action',


            ])
            ->toJson();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_mitigasibRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_mitigasibRequest $request)
    {
        $rtmitigasib = rt_mitigasib::where('nik', $request->valnik)->first();
        if ($rtmitigasib == NULL ) {
            $rtmitigasib = new rt_mitigasib();
        }
        $rtmitigasib->nik = $request->valnik;
        $rtmitigasib->nama_ketuart = $request->valnama_ketuart;
        $rtmitigasib->alamat = $request->valalamat;
        $rtmitigasib->rt = $request->valrt;
        $rtmitigasib->rw = $request->valrw;
        $rtmitigasib->nohp = $request->valnohp;
        $rtmitigasib->mitigasi_sp = $request->valmitigasi_sp;
        $rtmitigasib->mitigasi_spd = $request->valmitigasi_spd;
        $rtmitigasib->mitigasi_pk = $request->valmitigasi_pk;
        $rtmitigasib->mitigasi_rrj = $request->valmitigasi_rrj;
        $rtmitigasib->mitigasi_ppn = $request->valmitigasi_ppn;

        $rtmitigasib->save();
        return redirect()->route('rtmitigasib.show',['show'=> $request->valnik ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_mitigasib  $rt_mitigasib
     * @return \Illuminate\Http\Response
     */
    public function show(rt_mitigasib $rt_mitigasib, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        $rtmitigasib = rt_mitigasib::where('nik', $nik)->first();
        return view('sdgs.RT.showrtmitigasib', compact('rtmitigasib','datart'));
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
