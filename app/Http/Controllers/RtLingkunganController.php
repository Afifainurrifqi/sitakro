<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rt_lingkungan;
use App\Http\Requests\Storert_lingkunganRequest;
use App\Http\Requests\Updatert_lingkunganRequest;
use App\Models\Datart;
use Yajra\DataTables\DataTables;

class RtLingkunganController extends Controller
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
        $dataTerisi = rt_lingkungan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;
        return view('sdgs.RT.rtlingkungan', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = rt_lingkungan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;
        return view('sdgs.RT.admin_rtlingkungan', compact('presentase'));
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
                            <a href="' . route('rtlingkungan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rtlingkungan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>
                        </td>';
            })


            ->addColumn('lingkungan_lsi', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lsi');
            })
            ->addColumn('lingkungan_slno', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_slno');
            })
            ->addColumn('lingkungan_k', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_k');
            })
            ->addColumn('lingkungan_hl', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_hl');
            })
            ->addColumn('lingkungan_t', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_t');
            })
            ->addColumn('lingkungan_kte', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_kte');
            })
            ->addColumn('lingkungan_lgt', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lgt');
            })
            ->addColumn('lingkungan_lpp', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lpp');
            })
            ->addColumn('lingkungan_ah', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ah');
            })
            ->addColumn('lingkungan_lpns', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lpns');
            })
            ->addColumn('lingkungan_lpertambangan', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lpertambangan');
            })
            ->addColumn('lingkungan_lperumahan', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lperumahan');
            })
            ->addColumn('lingkungan_lperkantoran', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lperkantoran');
            })
            ->addColumn('lingkungan_lindustri', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lindustri');
            })
            ->addColumn('lingkungan_fu', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_fu');
            })
            ->addColumn('lingkungan_ll', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ll');
            })
            ->addColumn('lingkungan_nsym', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_nsym');
            })
            ->addColumn('lingkungan_ndws', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ndws');
            })
            ->addColumn('lingkungan_jma', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_jma');
            })
            ->addColumn('lingkungan_je', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_je');
            })
            ->addColumn('lingkungan_ksb', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ksb');
            })
            ->addColumn('lingkungan_ks', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ks');
            })
            ->addColumn('lingkungan_ki', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ki');
            })
            ->addColumn('lingkungan_kd', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_kd');
            })
            ->addColumn('lingkungan_ke', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ke');
            })
            ->addColumn('lingkungan_pair', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_pair');
            })
            ->addColumn('lingkungan_ptanah', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ptanah');
            })
            ->addColumn('lingkungan_pudara', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_pudara');
            })
            ->addColumn('lingkungan_pdusl', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_pdusl');
            })
            ->addColumn('lingkungan_kmml', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_kmml');
            })
            ->addColumn('lingkungan_klpg', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_klpg');
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
                            <a href="' . route('rtlingkungan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rtlingkungan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>
                        </td>';
            })


            ->addColumn('lingkungan_lsi', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lsi');
            })
            ->addColumn('lingkungan_slno', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_slno');
            })
            ->addColumn('lingkungan_k', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_k');
            })
            ->addColumn('lingkungan_hl', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_hl');
            })
            ->addColumn('lingkungan_t', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_t');
            })
            ->addColumn('lingkungan_kte', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_kte');
            })
            ->addColumn('lingkungan_lgt', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lgt');
            })
            ->addColumn('lingkungan_lpp', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lpp');
            })
            ->addColumn('lingkungan_ah', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ah');
            })
            ->addColumn('lingkungan_lpns', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lpns');
            })
            ->addColumn('lingkungan_lpertambangan', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lpertambangan');
            })
            ->addColumn('lingkungan_lperumahan', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lperumahan');
            })
            ->addColumn('lingkungan_lperkantoran', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lperkantoran');
            })
            ->addColumn('lingkungan_lindustri', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lindustri');
            })
            ->addColumn('lingkungan_fu', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_fu');
            })
            ->addColumn('lingkungan_ll', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ll');
            })
            ->addColumn('lingkungan_nsym', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_nsym');
            })
            ->addColumn('lingkungan_ndws', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ndws');
            })
            ->addColumn('lingkungan_jma', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_jma');
            })
            ->addColumn('lingkungan_je', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_je');
            })
            ->addColumn('lingkungan_ksb', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ksb');
            })
            ->addColumn('lingkungan_ks', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ks');
            })
            ->addColumn('lingkungan_ki', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ki');
            })
            ->addColumn('lingkungan_kd', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_kd');
            })
            ->addColumn('lingkungan_ke', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ke');
            })
            ->addColumn('lingkungan_pair', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_pair');
            })
            ->addColumn('lingkungan_ptanah', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ptanah');
            })
            ->addColumn('lingkungan_pudara', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_pudara');
            })
            ->addColumn('lingkungan_pdusl', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_pdusl');
            })
            ->addColumn('lingkungan_kmml', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_kmml');
            })
            ->addColumn('lingkungan_klpg', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_klpg');
            })


            ->rawColumns([
                'action',


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
        $datart = Datart::where('nik', $nik)->first();
        $rt_lingkungan = rt_lingkungan::where('nik', $nik)->first();

        return view('sdgs.RT.editrtlingkungan', compact('rt_lingkungan','datart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_lingkunganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_lingkunganRequest $request)
    {
        $rt_lingkungan = rt_lingkungan::where('nik', $request->valnik)->first();
        if ($rt_lingkungan == NULL ) {
            $rt_lingkungan = new rt_lingkungan();
        }
        $rt_lingkungan->nik = $request->valnik;
        $rt_lingkungan->nama_ketuart = $request->valnama_ketuart;
        $rt_lingkungan->alamat = $request->valalamat;
        $rt_lingkungan->rt = $request->valrt;
        $rt_lingkungan->rw = $request->valrw;
        $rt_lingkungan->nohp = $request->valnohp;
        $rt_lingkungan->lingkungan_lsi = $request -> vallingkungan_lsi;
        $rt_lingkungan->lingkungan_slno = $request -> vallingkungan_slno;
        $rt_lingkungan->lingkungan_k = $request -> vallingkungan_k;
        $rt_lingkungan->lingkungan_hl = $request -> vallingkungan_hl;
        $rt_lingkungan->lingkungan_t = $request -> vallingkungan_t;
        $rt_lingkungan->lingkungan_kte = $request -> vallingkungan_kte;
        $rt_lingkungan->lingkungan_lgt = $request -> vallingkungan_lgt;
        $rt_lingkungan->lingkungan_lpp = $request -> vallingkungan_lpp;
        $rt_lingkungan->lingkungan_ah = $request -> vallingkungan_ah;
        $rt_lingkungan->lingkungan_lpns = $request -> vallingkungan_lpns;
        $rt_lingkungan->lingkungan_lpertambangan = $request -> vallingkungan_lpertambangan;
        $rt_lingkungan->lingkungan_lperumahan = $request -> vallingkungan_lperumahan;
        $rt_lingkungan->lingkungan_lperkantoran = $request -> vallingkungan_lperkantoran;
        $rt_lingkungan->lingkungan_lindustri = $request -> vallingkungan_lindustri;
        $rt_lingkungan->lingkungan_fu = $request -> vallingkungan_fu;
        $rt_lingkungan->lingkungan_ll = $request -> vallingkungan_ll;
        $rt_lingkungan->lingkungan_nsym = $request -> vallingkungan_nsym;
        $rt_lingkungan->lingkungan_ndws = $request -> vallingkungan_ndws;
        $rt_lingkungan->lingkungan_jma = $request -> vallingkungan_jma;
        $rt_lingkungan->lingkungan_je = $request -> vallingkungan_je;
        $rt_lingkungan->lingkungan_ksb = $request -> vallingkungan_ksb;
        $rt_lingkungan->lingkungan_ks = $request -> vallingkungan_ks;
        $rt_lingkungan->lingkungan_ki = $request -> vallingkungan_ki;
        $rt_lingkungan->lingkungan_kd = $request -> vallingkungan_kd;
        $rt_lingkungan->lingkungan_ke = $request -> vallingkungan_ke;
        $rt_lingkungan->lingkungan_pair = $request -> vallingkungan_pair;
        $rt_lingkungan->lingkungan_ptanah = $request -> vallingkungan_ptanah;
        $rt_lingkungan->lingkungan_pudara = $request -> vallingkungan_pudara;
        $rt_lingkungan->lingkungan_pdusl = $request -> vallingkungan_pdusl;
        $rt_lingkungan->lingkungan_kmml = $request -> vallingkungan_kmml;
        $rt_lingkungan->lingkungan_klpg = $request -> vallingkungan_klpg;



        $rt_lingkungan->save();
        return redirect()->route('rtlingkungan.show',['show'=> $request->valnik ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_lingkungan  $rt_lingkungan
     * @return \Illuminate\Http\Response
     */
    public function show(rt_lingkungan $rt_lingkungan, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        $rt_lingkungan = rt_lingkungan::where('nik', $nik)->first();


        return view('sdgs.RT.showrtlingkungan', compact('rt_lingkungan','datart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rt_lingkungan  $rt_lingkungan
     * @return \Illuminate\Http\Response
     */
    public function edit(rt_lingkungan $rt_lingkungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatert_lingkunganRequest  $request
     * @param  \App\Models\rt_lingkungan  $rt_lingkungan
     * @return \Illuminate\Http\Response
     */
    public function update(Updatert_lingkunganRequest $request, rt_lingkungan $rt_lingkungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rt_lingkungan  $rt_lingkungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(rt_lingkungan $rt_lingkungan)
    {
        //
    }
}
