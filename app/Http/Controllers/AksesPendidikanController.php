<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\akses_pendidikan;
use App\Http\Requests\Storeakses_pendidikanRequest;
use App\Http\Requests\Updateakses_pendidikanRequest;
use App\Models\akseskesehatan;
use Yajra\DataTables\DataTables;

class AksesPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         // Dapatkan total data penduduk
         $totalPenduduk = datapenduduk::count();

         // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
         $dataTerisi = akses_pendidikan::count();

         // Hitung presentase penyelesaian data
         $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        return view('sdgs.KK.aksespendidikan', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
         // Dapatkan total data penduduk
         $totalPenduduk = datapenduduk::count();

         // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
         $dataTerisi = akses_pendidikan::count();

         // Hitung presentase penyelesaian data
         $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;


        return view('sdgs.KK.admin_aksespendidikan', compact('presentase'));
    }

    public function jsonadmin(Request $request)
    {
        $allowedDatakValues = ['tetap', 'tidaktetap'];

        $query = Datapenduduk::with(['kk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'detailkk.kk'])
            ->whereIn('Datak', $allowedDatakValues);

        return DataTables::of($query)

            ->addColumn('nokk', function ($row) {
                return $row->detailkk->kk->nokk;
            })
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('aksespendidikan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('aksespendidikan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })

            ->addColumn('jaraktempuh_paud', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                $kondisi = $akses_pendidikan ? $akses_pendidikan->jaraktempuh_paud : '';
                return $kondisi;
            })

            ->addColumn('waktutempuh_paud', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_paud : '';
            })
            ->addColumn('kemudahan_paud', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_paud : '';
            })
            ->addColumn('jaraktempuh_tk', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_tk : '';
            })
            ->addColumn('waktutempuh_tk', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_tk : '';
            })
            ->addColumn('kemudahan_tk', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_tk : '';
            })
            ->addColumn('jaraktempuh_sd', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_sd : '';
            })
            ->addColumn('waktutempuh_sd', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_sd : '';
            })
            ->addColumn('kemudahan_sd', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_sd : '';
            })
            ->addColumn('jaraktempuh_smp', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_smp : '';
            })
            ->addColumn('waktutempuh_smp', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_smp : '';
            })
            ->addColumn('kemudahan_smp', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_smp : '';
            })
            ->addColumn('jaraktempuh_sma', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_sma : '';
            })
            ->addColumn('waktutempuh_sma', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_sma : '';
            })
            ->addColumn('kemudahan_sma', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_sma : '';
            })
            ->addColumn('jaraktempuh_pt', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_pt : '';
            })
            ->addColumn('waktutempuh_pt', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_pt : '';
            })
            ->addColumn('kemudahan_pt', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_pt : '';
            })
            ->addColumn('jaraktempuh_ps', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_ps : '';
            })
            ->addColumn('waktutempuh_ps', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_ps : '';
            })
            ->addColumn('kemudahan_ps', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_ps : '';
            })
            ->addColumn('jaraktempuh_seminari', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_seminari : '';
            })
            ->addColumn('waktutempuh_seminari', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_seminari : '';
            })
            ->addColumn('kemudahan_seminari', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_seminari : '';
            })
            ->addColumn('jaraktempuh_pagamalain', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_pagamalain : '';
            })
            ->addColumn('waktutempuh_pagamalain', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_pagamalain : '';
            })
            ->addColumn('kemudahan_pagamalain', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_pagamalain : '';
            })



            ->rawColumns([
                'action',
                'jaraktempuh_paud',
                'waktutempuh_paud',
                'kemudahan_paud',
                'jaraktempuh_tk',
                'waktutempuh_tk',
                'kemudahan_tk',
                'jaraktempuh_sd',
                'waktutempuh_sd',
                'kemudahan_sd',
                'jaraktempuh_smp',
                'waktutempuh_smp',
                'kemudahan_smp',
                'jaraktempuh_sma',
                'waktutempuh_sma',
                'kemudahan_sma',
                'jaraktempuh_pt',
                'waktutempuh_pt',
                'kemudahan_pt',
                'jaraktempuh_ps',
                'waktutempuh_ps',
                'kemudahan_ps',
                'jaraktempuh_seminari',
                'waktutempuh_seminari',
                'kemudahan_seminari',
                'jaraktempuh_pagamalain',
                'waktutempuh_pagamalain',
                'kemudahan_pagamalain',
            ])
            ->toJson();
    }


    public function json(Request $request)
    {
        $allowedDatakValues = ['tetap', 'tidaktetap'];

        if ($request->has('nokk')) {
            $nokk = $request->input('nokk');
            $query = Datapenduduk::with(['kk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'detailkk.kk'])
                ->whereHas('detailkk.kk', function ($query) use ($nokk) {
                    $query->where('nokk', $nokk);
                })
                ->whereIn('Datak', $allowedDatakValues);
        } else {
            // Jika tidak ada parameter noKK, kembalikan data kosong
            $query = Datapenduduk::whereNull('id'); // Tidak mengembalikan data
        }

        return DataTables::of($query)

            ->addColumn('nokk', function ($row) {
                return $row->detailkk->kk->nokk;
            })
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('aksespendidikan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('aksespendidikan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })

            ->addColumn('jaraktempuh_paud', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                $kondisi = $akses_pendidikan ? $akses_pendidikan->jaraktempuh_paud : '';
                return $kondisi;
            })

            ->addColumn('waktutempuh_paud', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_paud : '';
            })
            ->addColumn('kemudahan_paud', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_paud : '';
            })
            ->addColumn('jaraktempuh_tk', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_tk : '';
            })
            ->addColumn('waktutempuh_tk', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_tk : '';
            })
            ->addColumn('kemudahan_tk', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_tk : '';
            })
            ->addColumn('jaraktempuh_sd', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_sd : '';
            })
            ->addColumn('waktutempuh_sd', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_sd : '';
            })
            ->addColumn('kemudahan_sd', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_sd : '';
            })
            ->addColumn('jaraktempuh_smp', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_smp : '';
            })
            ->addColumn('waktutempuh_smp', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_smp : '';
            })
            ->addColumn('kemudahan_smp', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_smp : '';
            })
            ->addColumn('jaraktempuh_sma', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_sma : '';
            })
            ->addColumn('waktutempuh_sma', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_sma : '';
            })
            ->addColumn('kemudahan_sma', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_sma : '';
            })
            ->addColumn('jaraktempuh_pt', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_pt : '';
            })
            ->addColumn('waktutempuh_pt', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_pt : '';
            })
            ->addColumn('kemudahan_pt', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_pt : '';
            })
            ->addColumn('jaraktempuh_ps', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_ps : '';
            })
            ->addColumn('waktutempuh_ps', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_ps : '';
            })
            ->addColumn('kemudahan_ps', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_ps : '';
            })
            ->addColumn('jaraktempuh_seminari', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_seminari : '';
            })
            ->addColumn('waktutempuh_seminari', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_seminari : '';
            })
            ->addColumn('kemudahan_seminari', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_seminari : '';
            })
            ->addColumn('jaraktempuh_pagamalain', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_pagamalain : '';
            })
            ->addColumn('waktutempuh_pagamalain', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_pagamalain : '';
            })
            ->addColumn('kemudahan_pagamalain', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_pagamalain : '';
            })



            ->rawColumns([
                'action',
                'jaraktempuh_paud',
                'waktutempuh_paud',
                'kemudahan_paud',
                'jaraktempuh_tk',
                'waktutempuh_tk',
                'kemudahan_tk',
                'jaraktempuh_sd',
                'waktutempuh_sd',
                'kemudahan_sd',
                'jaraktempuh_smp',
                'waktutempuh_smp',
                'kemudahan_smp',
                'jaraktempuh_sma',
                'waktutempuh_sma',
                'kemudahan_sma',
                'jaraktempuh_pt',
                'waktutempuh_pt',
                'kemudahan_pt',
                'jaraktempuh_ps',
                'waktutempuh_ps',
                'kemudahan_ps',
                'jaraktempuh_seminari',
                'waktutempuh_seminari',
                'kemudahan_seminari',
                'jaraktempuh_pagamalain',
                'waktutempuh_pagamalain',
                'kemudahan_pagamalain',
            ])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $akses_pendidikan = akses_pendidikan::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.editaksespendidikan', compact('akses_pendidikan','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeakses_pendidikanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeakses_pendidikanRequest $request)
    {
        $akses_pendidikan = akses_pendidikan::where('nik', $request->valNIK)->first();
        if ($akses_pendidikan == NULL ) {
            $akses_pendidikan = new akses_pendidikan();
        }
        $akses_pendidikan->nokk = $request->valNokk;
        $akses_pendidikan->nik = $request->valNIK;
        $akses_pendidikan-> jaraktempuh_paud = $request->valjaraktempuh_paud;
        $akses_pendidikan-> waktutempuh_paud = $request->valwaktutempuh_paud;
        $akses_pendidikan-> kemudahan_paud = $request->valkemudahan_paud;
        $akses_pendidikan-> jaraktempuh_tk = $request->valjaraktempuh_tk;
        $akses_pendidikan-> waktutempuh_tk = $request->valwaktutempuh_tk;
        $akses_pendidikan-> kemudahan_tk = $request->valkemudahan_tk;
        $akses_pendidikan-> jaraktempuh_sd = $request->valjaraktempuh_sd;
        $akses_pendidikan-> waktutempuh_sd = $request->valwaktutempuh_sd;
        $akses_pendidikan-> kemudahan_sd = $request->valkemudahan_sd;
        $akses_pendidikan-> jaraktempuh_smp = $request->valjaraktempuh_smp;
        $akses_pendidikan-> waktutempuh_smp = $request->valwaktutempuh_smp;
        $akses_pendidikan-> kemudahan_smp = $request->valkemudahan_smp;
        $akses_pendidikan-> jaraktempuh_sma = $request->valjaraktempuh_sma;
        $akses_pendidikan-> waktutempuh_sma = $request->valwaktutempuh_sma;
        $akses_pendidikan-> kemudahan_sma = $request->valkemudahan_sma;
        $akses_pendidikan-> jaraktempuh_pt = $request->valjaraktempuh_pt;
        $akses_pendidikan-> waktutempuh_pt = $request->valwaktutempuh_pt;
        $akses_pendidikan-> kemudahan_pt = $request->valkemudahan_pt;
        $akses_pendidikan-> jaraktempuh_ps = $request->valjaraktempuh_ps;
        $akses_pendidikan-> waktutempuh_ps = $request->valwaktutempuh_ps;
        $akses_pendidikan-> kemudahan_ps = $request->valkemudahan_ps;
        $akses_pendidikan-> jaraktempuh_seminari = $request->valjaraktempuh_seminari;
        $akses_pendidikan-> waktutempuh_seminari = $request->valwaktutempuh_seminari;
        $akses_pendidikan-> kemudahan_seminari = $request->valkemudahan_seminari;
        $akses_pendidikan-> jaraktempuh_pagamalain = $request->valjaraktempuh_pagamalain;
        $akses_pendidikan-> waktutempuh_pagamalain = $request->valwaktutempuh_pagamalain;
        $akses_pendidikan-> kemudahan_pagamalain = $request->valkemudahan_pagamalain;

        $akses_pendidikan->save();
        return redirect()->route('aksespendidikan.show',['show'=> $request->valNIK ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\akses_pendidikan  $akses_pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(akses_pendidikan $akses_pendidikan, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $akses_pendidikan = akses_pendidikan::where('nik',$nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.showaksespendidikan', compact('akses_pendidikan', 'datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\akses_pendidikan  $akses_pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(akses_pendidikan $akses_pendidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateakses_pendidikanRequest  $request
     * @param  \App\Models\akses_pendidikan  $akses_pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Updateakses_pendidikanRequest $request, akses_pendidikan $akses_pendidikan, $nik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\akses_pendidikan  $akses_pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(akses_pendidikan $akses_pendidikan)
    {
        //
    }
}
