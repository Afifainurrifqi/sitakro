<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rt_bencana;
use App\Http\Requests\Storert_bencanaRequest;
use App\Http\Requests\Updatert_bencanaRequest;
use App\Models\Datart;
use App\Models\rt_lingkungan;
use Yajra\DataTables\DataTables;

class RtBencanaController extends Controller
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
        $dataTerisi = rt_bencana::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;
        return view('sdgs.RT.rtbencana', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = rt_bencana::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.admin_rtbencana', compact('presentase'));
    }

    public function jsonadmin(Request $request)
    {
        $query = Datart::query(); // Query the data_rt model

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('rtbencana.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rtbencana.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>


                        </td>';
            })

            ->addColumn('k_longsor', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_longsor : '';
            })
            ->addColumn('f_longsor', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_longsor : '';
            })
            ->addColumn('kj_longsor', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_longsor : '';
            })
            ->addColumn('jp_longsor', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_longsor : '';
            })
            ->addColumn('wt_longsor', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_longsor : '';
            })
            ->addColumn('k_banjir', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_banjir : '';
            })
            ->addColumn('f_banjir', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_banjir : '';
            })
            ->addColumn('kj_banjir', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_banjir : '';
            })
            ->addColumn('jp_banjir', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_banjir : '';
            })
            ->addColumn('wt_banjir', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_banjir : '';
            })
            ->addColumn('k_bandang', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_bandang : '';
            })
            ->addColumn('f_bandang', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_bandang : '';
            })
            ->addColumn('kj_bandang', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_bandang : '';
            })
            ->addColumn('jp_bandang', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_bandang : '';
            })
            ->addColumn('wt_bandang', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_bandang : '';
            })
            ->addColumn('k_gempa', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_gempa : '';
            })
            ->addColumn('f_gempa', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_gempa : '';
            })
            ->addColumn('kj_gempa', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_gempa : '';
            })
            ->addColumn('jp_gempa', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_gempa : '';
            })
            ->addColumn('wt_gempa', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_gempa : '';
            })
            ->addColumn('k_tsunami', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_tsunami : '';
            })
            ->addColumn('f_tsunami', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_tsunami : '';
            })
            ->addColumn('kj_tsunami', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_tsunami : '';
            })
            ->addColumn('jp_tsunami', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_tsunami : '';
            })
            ->addColumn('wt_tsunami', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_tsunami : '';
            })
            ->addColumn('k_puyuh', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_puyuh : '';
            })
            ->addColumn('f_puyuh', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_puyuh : '';
            })
            ->addColumn('kj_puyuh', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_puyuh : '';
            })
            ->addColumn('jp_puyuh', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_puyuh : '';
            })
            ->addColumn('wt_puyuh', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_puyuh : '';
            })
            ->addColumn('k_gunungm', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_gunungm : '';
            })
            ->addColumn('f_gunungm', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_gunungm : '';
            })
            ->addColumn('kj_gunungm', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_gunungm : '';
            })
            ->addColumn('jp_gunungm', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_gunungm : '';
            })
            ->addColumn('wt_gunungm', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_gunungm : '';
            })
            ->addColumn('k_hutank', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_hutank : '';
            })
            ->addColumn('f_hutank', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_hutank : '';
            })
            ->addColumn('kj_hutank', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_hutank : '';
            })
            ->addColumn('jp_hutank', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_hutank : '';
            })
            ->addColumn('wt_hutank', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_hutank : '';
            })
            ->addColumn('k_kekeringan', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_kekeringan : '';
            })
            ->addColumn('f_kekeringan', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_kekeringan : '';
            })
            ->addColumn('kj_kekeringan', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_kekeringan : '';
            })
            ->addColumn('jp_kekeringan', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_kekeringan : '';
            })
            ->addColumn('wt_kekeringan', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_kekeringan : '';
            })


            ->rawColumns([
                'action',


            ])
            ->toJson();
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
                            <a href="' . route('rtbencana.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rtbencana.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>


                        </td>';
            })

            ->addColumn('k_longsor', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_longsor : '';
            })
            ->addColumn('f_longsor', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_longsor : '';
            })
            ->addColumn('kj_longsor', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_longsor : '';
            })
            ->addColumn('jp_longsor', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_longsor : '';
            })
            ->addColumn('wt_longsor', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_longsor : '';
            })
            ->addColumn('k_banjir', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_banjir : '';
            })
            ->addColumn('f_banjir', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_banjir : '';
            })
            ->addColumn('kj_banjir', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_banjir : '';
            })
            ->addColumn('jp_banjir', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_banjir : '';
            })
            ->addColumn('wt_banjir', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_banjir : '';
            })
            ->addColumn('k_bandang', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_bandang : '';
            })
            ->addColumn('f_bandang', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_bandang : '';
            })
            ->addColumn('kj_bandang', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_bandang : '';
            })
            ->addColumn('jp_bandang', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_bandang : '';
            })
            ->addColumn('wt_bandang', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_bandang : '';
            })
            ->addColumn('k_gempa', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_gempa : '';
            })
            ->addColumn('f_gempa', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_gempa : '';
            })
            ->addColumn('kj_gempa', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_gempa : '';
            })
            ->addColumn('jp_gempa', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_gempa : '';
            })
            ->addColumn('wt_gempa', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_gempa : '';
            })
            ->addColumn('k_tsunami', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_tsunami : '';
            })
            ->addColumn('f_tsunami', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_tsunami : '';
            })
            ->addColumn('kj_tsunami', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_tsunami : '';
            })
            ->addColumn('jp_tsunami', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_tsunami : '';
            })
            ->addColumn('wt_tsunami', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_tsunami : '';
            })
            ->addColumn('k_puyuh', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_puyuh : '';
            })
            ->addColumn('f_puyuh', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_puyuh : '';
            })
            ->addColumn('kj_puyuh', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_puyuh : '';
            })
            ->addColumn('jp_puyuh', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_puyuh : '';
            })
            ->addColumn('wt_puyuh', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_puyuh : '';
            })
            ->addColumn('k_gunungm', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_gunungm : '';
            })
            ->addColumn('f_gunungm', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_gunungm : '';
            })
            ->addColumn('kj_gunungm', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_gunungm : '';
            })
            ->addColumn('jp_gunungm', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_gunungm : '';
            })
            ->addColumn('wt_gunungm', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_gunungm : '';
            })
            ->addColumn('k_hutank', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_hutank : '';
            })
            ->addColumn('f_hutank', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_hutank : '';
            })
            ->addColumn('kj_hutank', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_hutank : '';
            })
            ->addColumn('jp_hutank', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_hutank : '';
            })
            ->addColumn('wt_hutank', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_hutank : '';
            })
            ->addColumn('k_kekeringan', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_kekeringan : '';
            })
            ->addColumn('f_kekeringan', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_kekeringan : '';
            })
            ->addColumn('kj_kekeringan', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_kekeringan : '';
            })
            ->addColumn('jp_kekeringan', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_kekeringan : '';
            })
            ->addColumn('wt_kekeringan', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_kekeringan : '';
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
        $rtbencana = rt_bencana::where('nik', $nik)->first();

        return view('sdgs.RT.editrtbencana', compact('rtbencana','datart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_bencanaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_bencanaRequest $request)
    {
        $rtbencana = rt_bencana::where('nik', $request->valnik)->first();
        if ($rtbencana == NULL ) {
            $rtbencana = new rt_bencana();
        }
        $rtbencana->nik = $request->valnik;
        $rtbencana->nama_ketuart = $request->valnama_ketuart;
        $rtbencana->alamat = $request->valalamat;
        $rtbencana->rt = $request->valrt;
        $rtbencana->rw = $request->valrw;
        $rtbencana->nohp = $request->valnohp;
        $rtbencana->k_longsor =  $request ->valk_longsor;
        $rtbencana->f_longsor =  $request ->valf_longsor;
        $rtbencana->kj_longsor =  $request ->valkj_longsor;
        $rtbencana->jp_longsor =  $request ->valjp_longsor;
        $rtbencana->wt_longsor =  $request ->valwt_longsor;
        $rtbencana->k_banjir =  $request ->valk_banjir;
        $rtbencana->f_banjir =  $request ->valf_banjir;
        $rtbencana->kj_banjir =  $request ->valkj_banjir;
        $rtbencana->jp_banjir =  $request ->valjp_banjir;
        $rtbencana->wt_banjir =  $request ->valwt_banjir;
        $rtbencana->k_bandang =  $request ->valk_bandang;
        $rtbencana->f_bandang =  $request ->valf_bandang;
        $rtbencana->kj_bandang =  $request ->valkj_bandang;
        $rtbencana->jp_bandang =  $request ->valjp_bandang;
        $rtbencana->wt_bandang =  $request ->valwt_bandang;
        $rtbencana->k_gempa =  $request ->valk_gempa;
        $rtbencana->f_gempa =  $request ->valf_gempa;
        $rtbencana->kj_gempa =  $request ->valkj_gempa;
        $rtbencana->jp_gempa =  $request ->valjp_gempa;
        $rtbencana->wt_gempa =  $request ->valwt_gempa;
        $rtbencana->k_tsunami =  $request ->valk_tsunami;
        $rtbencana->f_tsunami =  $request ->valf_tsunami;
        $rtbencana->kj_tsunami =  $request ->valkj_tsunami;
        $rtbencana->jp_tsunami =  $request ->valjp_tsunami;
        $rtbencana->wt_tsunami =  $request ->valwt_tsunami;
        $rtbencana->k_puyuh =  $request ->valk_puyuh;
        $rtbencana->f_puyuh =  $request ->valf_puyuh;
        $rtbencana->kj_puyuh =  $request ->valkj_puyuh;
        $rtbencana->jp_puyuh =  $request ->valjp_puyuh;
        $rtbencana->wt_puyuh =  $request ->valwt_puyuh;
        $rtbencana->k_gunungm =  $request ->valk_gunungm;
        $rtbencana->f_gunungm =  $request ->valf_gunungm;
        $rtbencana->kj_gunungm =  $request ->valkj_gunungm;
        $rtbencana->jp_gunungm =  $request ->valjp_gunungm;
        $rtbencana->wt_gunungm =  $request ->valwt_gunungm;
        $rtbencana->k_hutank =  $request ->valk_hutank;
        $rtbencana->f_hutank =  $request ->valf_hutank;
        $rtbencana->kj_hutank =  $request ->valkj_hutank;
        $rtbencana->jp_hutank =  $request ->valjp_hutank;
        $rtbencana->wt_hutank =  $request ->valwt_hutank;
        $rtbencana->k_kekeringan =  $request ->valk_kekeringan;
        $rtbencana->f_kekeringan =  $request ->valf_kekeringan;
        $rtbencana->kj_kekeringan =  $request ->valkj_kekeringan;
        $rtbencana->jp_kekeringan =  $request ->valjp_kekeringan;
        $rtbencana->wt_kekeringan =  $request ->valwt_kekeringan;

        $rtbencana->save();
        return redirect()->route('rtbencana.show',['show'=> $request->valnik ]);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_bencana  $rt_bencana
     * @return \Illuminate\Http\Response
     */
    public function show(rt_bencana $rt_bencana, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        $rtbencana = rt_bencana::where('nik', $nik)->first();

        return view('sdgs.RT.showrtbencana', compact('rtbencana','datart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rt_bencana  $rt_bencana
     * @return \Illuminate\Http\Response
     */
    public function edit(rt_bencana $rt_bencana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatert_bencanaRequest  $request
     * @param  \App\Models\rt_bencana  $rt_bencana
     * @return \Illuminate\Http\Response
     */
    public function update(Updatert_bencanaRequest $request, rt_bencana $rt_bencana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rt_bencana  $rt_bencana
     * @return \Illuminate\Http\Response
     */
    public function destroy(rt_bencana $rt_bencana)
    {
        //
    }
}
