<?php

namespace App\Http\Controllers;


use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rt_kesehatan;
use App\Http\Requests\Storert_kesehatanRequest;
use App\Http\Requests\Updatert_kesehatanRequest;
use App\Models\Datart;
use Yajra\DataTables\DataTables;

class RtKesehatanController extends Controller
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
        $dataTerisi = rt_kesehatan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.rt_kesehatan', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = rt_kesehatan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.admin_rt_kesehatan', compact('presentase'));
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
                            <a href="' . route('rt_kesehatan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rt_kesehatan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>


                        </td>';
            })

            ->addColumn('nama_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_rs : '';
            })
            ->addColumn('pemilik_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_rs : '';
            })
            ->addColumn('jd_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_rs : '';
            })
            ->addColumn('jb_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_rs : '';
            })
            ->addColumn('jts_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_rs : '';
            })
            ->addColumn('jp_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_rs : '';
            })

            ->addColumn('nama_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_rsb : '';
            })
            ->addColumn('pemilik_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_rsb : '';
            })
            ->addColumn('jd_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_rsb : '';
            })
            ->addColumn('jb_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_rsb : '';
            })
            ->addColumn('jts_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_rsb : '';
            })
            ->addColumn('jp_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_rsb : '';
            })

            ->addColumn('nama_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_pdri : '';
            })
            ->addColumn('pemilik_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_pdri : '';
            })
            ->addColumn('jd_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_pdri : '';
            })
            ->addColumn('jb_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_pdri : '';
            })
            ->addColumn('jts_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_pdri : '';
            })
            ->addColumn('jp_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_pdri : '';
            })

            ->addColumn('nama_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_ptri : '';
            })
            ->addColumn('pemilik_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_ptri : '';
            })
            ->addColumn('jd_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_ptri : '';
            })
            ->addColumn('jb_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_ptri : '';
            })
            ->addColumn('jts_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_ptri : '';
            })
            ->addColumn('jp_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_ptri : '';
            })

            ->addColumn('nama_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_pp : '';
            })
            ->addColumn('pemilik_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_pp : '';
            })
            ->addColumn('jd_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_pp : '';
            })
            ->addColumn('jb_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_pp : '';
            })
            ->addColumn('jts_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_pp : '';
            })
            ->addColumn('jp_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_pp : '';
            })


            ->addColumn('nama_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_pbp : '';
            })
            ->addColumn('pemilik_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_pbp : '';
            })
            ->addColumn('jd_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_pbp : '';
            })
            ->addColumn('jb_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_pbp : '';
            })
            ->addColumn('jts_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_pbp : '';
            })
            ->addColumn('jp_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_pbp : '';
            })



            ->addColumn('nama_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_tpd : '';
            })
            ->addColumn('pemilik_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_tpd : '';
            })
            ->addColumn('jd_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_tpd : '';
            })
            ->addColumn('jb_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_tpd : '';
            })
            ->addColumn('jts_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_tpd : '';
            })
            ->addColumn('jp_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_tpd : '';
            })


            ->addColumn('nama_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_rb : '';
            })
            ->addColumn('pemilik_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_rb : '';
            })
            ->addColumn('jd_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_rb : '';
            })
            ->addColumn('jb_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_rb : '';
            })
            ->addColumn('jts_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_rb : '';
            })
            ->addColumn('jp_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_rb : '';
            })


            ->addColumn('nama_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_tpb : '';
            })
            ->addColumn('pemilik_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_tpb : '';
            })
            ->addColumn('jd_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_tpb : '';
            })
            ->addColumn('jb_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_tpb : '';
            })
            ->addColumn('jts_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_tpb : '';
            })
            ->addColumn('jp_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_tpb : '';
            })



            ->addColumn('nama_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_poskedes : '';
            })
            ->addColumn('pemilik_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_poskedes : '';
            })
            ->addColumn('jd_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_poskedes : '';
            })
            ->addColumn('jb_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_poskedes : '';
            })
            ->addColumn('jts_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_poskedes : '';
            })
            ->addColumn('jp_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_poskedes : '';
            })


            ->addColumn('nama_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_polindes : '';
            })
            ->addColumn('pemilik_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_polindes : '';
            })
            ->addColumn('jd_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_polindes : '';
            })
            ->addColumn('jb_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_polindes : '';
            })
            ->addColumn('jts_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_polindes : '';
            })
            ->addColumn('jp_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_polindes : '';
            })



            ->addColumn('nama_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_apotik : '';
            })
            ->addColumn('pemilik_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_apotik : '';
            })
            ->addColumn('jd_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_apotik : '';
            })
            ->addColumn('jb_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_apotik : '';
            })
            ->addColumn('jts_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_apotik : '';
            })
            ->addColumn('jp_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_apotik : '';
            })


            ->addColumn('nama_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_tokojamu : '';
            })
            ->addColumn('pemilik_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_tokojamu : '';
            })
            ->addColumn('jd_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_tokojamu : '';
            })
            ->addColumn('jb_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_tokojamu : '';
            })
            ->addColumn('jts_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_tokojamu : '';
            })
            ->addColumn('jp_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_tokojamu : '';
            })


            ->addColumn('nama_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_posyandu : '';
            })
            ->addColumn('pemilik_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_posyandu : '';
            })
            ->addColumn('jd_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_posyandu : '';
            })
            ->addColumn('jb_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_posyandu : '';
            })
            ->addColumn('jts_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_posyandu : '';
            })
            ->addColumn('jp_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_posyandu : '';
            })


            ->addColumn('nama_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_posbindu : '';
            })
            ->addColumn('pemilik_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_posbindu : '';
            })
            ->addColumn('jd_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_posbindu : '';
            })
            ->addColumn('jb_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_posbindu : '';
            })
            ->addColumn('jts_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_posbindu : '';
            })
            ->addColumn('jp_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_posbindu : '';
            })


            ->addColumn('nama_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_tpd : '';
            })
            ->addColumn('pemilik_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_tpd : '';
            })
            ->addColumn('jd_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_tpd : '';
            })
            ->addColumn('jb_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_tpd : '';
            })
            ->addColumn('jts_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_tpd : '';
            })
            ->addColumn('jp_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_tpd : '';
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
                            <a href="' . route('rt_kesehatan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rt_kesehatan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>


                        </td>';
            })

            ->addColumn('nama_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_rs : '';
            })
            ->addColumn('pemilik_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_rs : '';
            })
            ->addColumn('jd_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_rs : '';
            })
            ->addColumn('jb_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_rs : '';
            })
            ->addColumn('jts_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_rs : '';
            })
            ->addColumn('jp_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_rs : '';
            })

            ->addColumn('nama_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_rsb : '';
            })
            ->addColumn('pemilik_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_rsb : '';
            })
            ->addColumn('jd_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_rsb : '';
            })
            ->addColumn('jb_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_rsb : '';
            })
            ->addColumn('jts_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_rsb : '';
            })
            ->addColumn('jp_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_rsb : '';
            })

            ->addColumn('nama_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_pdri : '';
            })
            ->addColumn('pemilik_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_pdri : '';
            })
            ->addColumn('jd_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_pdri : '';
            })
            ->addColumn('jb_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_pdri : '';
            })
            ->addColumn('jts_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_pdri : '';
            })
            ->addColumn('jp_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_pdri : '';
            })

            ->addColumn('nama_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_ptri : '';
            })
            ->addColumn('pemilik_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_ptri : '';
            })
            ->addColumn('jd_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_ptri : '';
            })
            ->addColumn('jb_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_ptri : '';
            })
            ->addColumn('jts_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_ptri : '';
            })
            ->addColumn('jp_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_ptri : '';
            })

            ->addColumn('nama_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_pp : '';
            })
            ->addColumn('pemilik_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_pp : '';
            })
            ->addColumn('jd_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_pp : '';
            })
            ->addColumn('jb_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_pp : '';
            })
            ->addColumn('jts_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_pp : '';
            })
            ->addColumn('jp_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_pp : '';
            })


            ->addColumn('nama_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_pbp : '';
            })
            ->addColumn('pemilik_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_pbp : '';
            })
            ->addColumn('jd_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_pbp : '';
            })
            ->addColumn('jb_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_pbp : '';
            })
            ->addColumn('jts_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_pbp : '';
            })
            ->addColumn('jp_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_pbp : '';
            })



            ->addColumn('nama_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_tpd : '';
            })
            ->addColumn('pemilik_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_tpd : '';
            })
            ->addColumn('jd_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_tpd : '';
            })
            ->addColumn('jb_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_tpd : '';
            })
            ->addColumn('jts_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_tpd : '';
            })
            ->addColumn('jp_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_tpd : '';
            })


            ->addColumn('nama_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_rb : '';
            })
            ->addColumn('pemilik_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_rb : '';
            })
            ->addColumn('jd_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_rb : '';
            })
            ->addColumn('jb_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_rb : '';
            })
            ->addColumn('jts_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_rb : '';
            })
            ->addColumn('jp_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_rb : '';
            })


            ->addColumn('nama_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_tpb : '';
            })
            ->addColumn('pemilik_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_tpb : '';
            })
            ->addColumn('jd_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_tpb : '';
            })
            ->addColumn('jb_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_tpb : '';
            })
            ->addColumn('jts_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_tpb : '';
            })
            ->addColumn('jp_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_tpb : '';
            })



            ->addColumn('nama_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_poskedes : '';
            })
            ->addColumn('pemilik_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_poskedes : '';
            })
            ->addColumn('jd_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_poskedes : '';
            })
            ->addColumn('jb_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_poskedes : '';
            })
            ->addColumn('jts_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_poskedes : '';
            })
            ->addColumn('jp_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_poskedes : '';
            })


            ->addColumn('nama_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_polindes : '';
            })
            ->addColumn('pemilik_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_polindes : '';
            })
            ->addColumn('jd_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_polindes : '';
            })
            ->addColumn('jb_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_polindes : '';
            })
            ->addColumn('jts_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_polindes : '';
            })
            ->addColumn('jp_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_polindes : '';
            })



            ->addColumn('nama_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_apotik : '';
            })
            ->addColumn('pemilik_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_apotik : '';
            })
            ->addColumn('jd_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_apotik : '';
            })
            ->addColumn('jb_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_apotik : '';
            })
            ->addColumn('jts_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_apotik : '';
            })
            ->addColumn('jp_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_apotik : '';
            })


            ->addColumn('nama_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_tokojamu : '';
            })
            ->addColumn('pemilik_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_tokojamu : '';
            })
            ->addColumn('jd_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_tokojamu : '';
            })
            ->addColumn('jb_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_tokojamu : '';
            })
            ->addColumn('jts_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_tokojamu : '';
            })
            ->addColumn('jp_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_tokojamu : '';
            })


            ->addColumn('nama_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_posyandu : '';
            })
            ->addColumn('pemilik_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_posyandu : '';
            })
            ->addColumn('jd_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_posyandu : '';
            })
            ->addColumn('jb_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_posyandu : '';
            })
            ->addColumn('jts_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_posyandu : '';
            })
            ->addColumn('jp_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_posyandu : '';
            })


            ->addColumn('nama_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_posbindu : '';
            })
            ->addColumn('pemilik_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_posbindu : '';
            })
            ->addColumn('jd_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_posbindu : '';
            })
            ->addColumn('jb_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_posbindu : '';
            })
            ->addColumn('jts_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_posbindu : '';
            })
            ->addColumn('jp_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_posbindu : '';
            })


            ->addColumn('nama_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_tpd : '';
            })
            ->addColumn('pemilik_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_tpd : '';
            })
            ->addColumn('jd_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_tpd : '';
            })
            ->addColumn('jb_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_tpd : '';
            })
            ->addColumn('jts_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_tpd : '';
            })
            ->addColumn('jp_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_tpd : '';
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
        $rt_kesehatan = rt_kesehatan::where('nik', $nik)->first();

        return view('sdgs.RT.editrt_kesehatan', compact('rt_kesehatan','datart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_kesehatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_kesehatanRequest $request)
    {
        $rt_kesehatan = rt_kesehatan::where('nik', $request->valnik)->first();
        if ($rt_kesehatan == NULL ) {
            $rt_kesehatan = new rt_kesehatan();
        }
        $rt_kesehatan->nik = $request->valnik;
        $rt_kesehatan->nama_ketuart = $request->valnama_ketuart;
        $rt_kesehatan->alamat = $request->valalamat;
        $rt_kesehatan->rt = $request->valrt;
        $rt_kesehatan->rw = $request->valrw;
        $rt_kesehatan->nohp = $request->valnohp;
        $rt_kesehatan->nama_rs = $request->valnama_rs;
        $rt_kesehatan->pemilik_rs = $request->valpemilik_rs;
        $rt_kesehatan->jd_rs = $request->valjd_rs;
        $rt_kesehatan->jb_rs = $request->valjb_rs;
        $rt_kesehatan->jts_rs = $request->valjts_rs;
        $rt_kesehatan->jp_rs = $request->valjp_rs;
        $rt_kesehatan->nama_rsb = $request->valnama_rsb;
        $rt_kesehatan->pemilik_rsb = $request->valpemilik_rsb;
        $rt_kesehatan->jd_rsb = $request->valjd_rsb;
        $rt_kesehatan->jb_rsb = $request->valjb_rsb;
        $rt_kesehatan->jts_rsb = $request->valjts_rsb;
        $rt_kesehatan->jp_rsb = $request->valjp_rsb;
        $rt_kesehatan->nama_pdri = $request->valnama_pdri;
        $rt_kesehatan->pemilik_pdri = $request->valpemilik_pdri;
        $rt_kesehatan->jd_pdri = $request->valjd_pdri;
        $rt_kesehatan->jb_pdri = $request->valjb_pdri;
        $rt_kesehatan->jts_pdri = $request->valjts_pdri;
        $rt_kesehatan->jp_pdri = $request->valjp_pdri;
        $rt_kesehatan->nama_ptri = $request->valnama_ptri;
        $rt_kesehatan->pemilik_ptri = $request->valpemilik_ptri;
        $rt_kesehatan->jd_ptri = $request->valjd_ptri;
        $rt_kesehatan->jb_ptri = $request->valjb_ptri;
        $rt_kesehatan->jts_ptri = $request->valjts_ptri;
        $rt_kesehatan->jp_ptri = $request->valjp_ptri;
        $rt_kesehatan->nama_pp = $request->valnama_pp;
        $rt_kesehatan->pemilik_pp = $request->valpemilik_pp;
        $rt_kesehatan->jd_pp = $request->valjd_pp;
        $rt_kesehatan->jb_pp = $request->valjb_pp;
        $rt_kesehatan->jts_pp = $request->valjts_pp;
        $rt_kesehatan->jp_pp = $request->valjp_pp;
        $rt_kesehatan->nama_pbp = $request->valnama_pbp;
        $rt_kesehatan->pemilik_pbp = $request->valpemilik_pbp;
        $rt_kesehatan->jd_pbp = $request->valjd_pbp;
        $rt_kesehatan->jb_pbp = $request->valjb_pbp;
        $rt_kesehatan->jts_pbp = $request->valjts_pbp;
        $rt_kesehatan->jp_pbp = $request->valjp_pbp;
        $rt_kesehatan->nama_tpd = $request->valnama_tpd;
        $rt_kesehatan->pemilik_tpd = $request->valpemilik_tpd;
        $rt_kesehatan->jd_tpd = $request->valjd_tpd;
        $rt_kesehatan->jb_tpd = $request->valjb_tpd;
        $rt_kesehatan->jts_tpd = $request->valjts_tpd;
        $rt_kesehatan->jp_tpd = $request->valjp_tpd;
        $rt_kesehatan->nama_rb = $request->valnama_rb;
        $rt_kesehatan->pemilik_rb = $request->valpemilik_rb;
        $rt_kesehatan->jd_rb = $request->valjd_rb;
        $rt_kesehatan->jb_rb = $request->valjb_rb;
        $rt_kesehatan->jts_rb = $request->valjts_rb;
        $rt_kesehatan->jp_rb = $request->valjp_rb;
        $rt_kesehatan->nama_tpb = $request->valnama_tpb;
        $rt_kesehatan->pemilik_tpb = $request->valpemilik_tpb;
        $rt_kesehatan->jd_tpb = $request->valjd_tpb;
        $rt_kesehatan->jb_tpb = $request->valjb_tpb;
        $rt_kesehatan->jts_tpb = $request->valjts_tpb;
        $rt_kesehatan->jp_tpb = $request->valjp_tpb;
        $rt_kesehatan->nama_poskedes = $request->valnama_poskedes;
        $rt_kesehatan->pemilik_poskedes = $request->valpemilik_poskedes;
        $rt_kesehatan->jd_poskedes = $request->valjd_poskedes;
        $rt_kesehatan->jb_poskedes = $request->valjb_poskedes;
        $rt_kesehatan->jts_poskedes = $request->valjts_poskedes;
        $rt_kesehatan->jp_poskedes = $request->valjp_poskedes;
        $rt_kesehatan->nama_polindes = $request->valnama_polindes;
        $rt_kesehatan->pemilik_polindes = $request->valpemilik_polindes;
        $rt_kesehatan->jd_polindes = $request->valjd_polindes;
        $rt_kesehatan->jb_polindes = $request->valjb_polindes;
        $rt_kesehatan->jts_polindes = $request->valjts_polindes;
        $rt_kesehatan->jp_polindes = $request->valjp_polindes;
        $rt_kesehatan->nama_apotik = $request->valnama_apotik;
        $rt_kesehatan->pemilik_apotik = $request->valpemilik_apotik;
        $rt_kesehatan->jd_apotik = $request->valjd_apotik;
        $rt_kesehatan->jb_apotik = $request->valjb_apotik;
        $rt_kesehatan->jts_apotik = $request->valjts_apotik;
        $rt_kesehatan->jp_apotik = $request->valjp_apotik;
        $rt_kesehatan->nama_tokojamu = $request->valnama_tokojamu;
        $rt_kesehatan->pemilik_tokojamu = $request->valpemilik_tokojamu;
        $rt_kesehatan->jd_tokojamu = $request->valjd_tokojamu;
        $rt_kesehatan->jb_tokojamu = $request->valjb_tokojamu;
        $rt_kesehatan->jts_tokojamu = $request->valjts_tokojamu;
        $rt_kesehatan->jp_tokojamu = $request->valjp_tokojamu;
        $rt_kesehatan->nama_posyandu = $request->valnama_posyandu;
        $rt_kesehatan->pemilik_posyandu = $request->valpemilik_posyandu;
        $rt_kesehatan->jd_posyandu = $request->valjd_posyandu;
        $rt_kesehatan->jb_posyandu = $request->valjb_posyandu;
        $rt_kesehatan->jts_posyandu = $request->valjts_posyandu;
        $rt_kesehatan->jp_posyandu = $request->valjp_posyandu;
        $rt_kesehatan->nama_posbindu = $request->valnama_posbindu;
        $rt_kesehatan->pemilik_posbindu = $request->valpemilik_posbindu;
        $rt_kesehatan->jd_posbindu = $request->valjd_posbindu;
        $rt_kesehatan->jb_posbindu = $request->valjb_posbindu;
        $rt_kesehatan->jts_posbindu = $request->valjts_posbindu;
        $rt_kesehatan->jp_posbindu = $request->valjp_posbindu;
        $rt_kesehatan->nama_tpd = $request->valnama_tpd;
        $rt_kesehatan->pemilik_tpd = $request->valpemilik_tpd;
        $rt_kesehatan->jd_tpd = $request->valjd_tpd;
        $rt_kesehatan->jb_tpd = $request->valjb_tpd;
        $rt_kesehatan->jts_tpd = $request->valjts_tpd;
        $rt_kesehatan->jp_tpd = $request->valjp_tpd;

        $rt_kesehatan->save();
        return redirect()->route('rt_kesehatan.show',['show'=> $request->valnik ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_kesehatan  $rt_kesehatan
     * @return \Illuminate\Http\Response
     */
    public function show(rt_kesehatan $rt_kesehatan, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        $rt_kesehatan = rt_kesehatan::where('nik', $nik)->first();
        return view('sdgs.RT.showrt_kesehatan', compact('rt_kesehatan','datart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rt_kesehatan  $rt_kesehatan
     * @return \Illuminate\Http\Response
     */
    public function edit(rt_kesehatan $rt_kesehatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatert_kesehatanRequest  $request
     * @param  \App\Models\rt_kesehatan  $rt_kesehatan
     * @return \Illuminate\Http\Response
     */
    public function update(Updatert_kesehatanRequest $request, rt_kesehatan $rt_kesehatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rt_kesehatan  $rt_kesehatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(rt_kesehatan $rt_kesehatan)
    {
        //
    }
}
