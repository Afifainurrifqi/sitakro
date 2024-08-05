<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rt_keamanan;
use App\Http\Requests\Storert_keamananRequest;
use App\Http\Requests\Updatert_keamananRequest;
use App\Models\Datart;
use Yajra\DataTables\DataTables;

class RtKeamananController extends Controller
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
        $dataTerisi = rt_keamanan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.rt_keamanan', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = rt_keamanan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.admin_rt_keamanan', compact('presentase'));
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
                            <a href="' . route('rt_keamanan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rt_keamanan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>

                        </td>';
            })

            ->addColumn('penyebabu_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_antarkelompokmas : '';
            })
            ->addColumn('jk_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_antarkelompokmas : '';
            })
            ->addColumn('jkl_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_antarkelompokmas : '';
            })
            ->addColumn('jt_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_antarkelompokmas : '';
            })
            ->addColumn('pen_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_antarkelompokmas : '';
            })
            ->addColumn('pp_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_antarkelompokmas : '';
            })
            ->addColumn('penyebabu_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_antardesa : '';
            })
            ->addColumn('jk_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_antardesa : '';
            })
            ->addColumn('jkl_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_antardesa : '';
            })
            ->addColumn('jt_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_antardesa : '';
            })
            ->addColumn('pen_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_antardesa : '';
            })
            ->addColumn('pp_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_antardesa : '';
            })
            ->addColumn('penyebabu_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_aparatmk : '';
            })
            ->addColumn('jk_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_aparatmk : '';
            })
            ->addColumn('jkl_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_aparatmk : '';
            })
            ->addColumn('jt_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_aparatmk : '';
            })
            ->addColumn('pen_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_aparatmk : '';
            })
            ->addColumn('pp_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_aparatmk : '';
            })
            ->addColumn('penyebabu_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_aparatmp : '';
            })
            ->addColumn('jk_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_aparatmp : '';
            })
            ->addColumn('jkl_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_aparatmp : '';
            })
            ->addColumn('jt_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_aparatmp : '';
            })
            ->addColumn('pen_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_aparatmp : '';
            })
            ->addColumn('pp_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_aparatmp : '';
            })
            ->addColumn('penyebabu_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_aparatk : '';
            })
            ->addColumn('jk_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_aparatk : '';
            })
            ->addColumn('jkl_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_aparatk : '';
            })
            ->addColumn('jt_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_aparatk : '';
            })
            ->addColumn('pen_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_aparatk : '';
            })
            ->addColumn('pp_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_aparatk : '';
            })
            ->addColumn('penyebabu_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_aparatp : '';
            })
            ->addColumn('jk_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_aparatp : '';
            })
            ->addColumn('jkl_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_aparatp : '';
            })
            ->addColumn('jt_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_aparatp : '';
            })
            ->addColumn('pen_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_aparatp : '';
            })
            ->addColumn('pp_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_aparatp : '';
            })
            ->addColumn('penyebabu_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_pelajar : '';
            })
            ->addColumn('jk_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pelajar : '';
            })
            ->addColumn('jkl_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_pelajar : '';
            })
            ->addColumn('jt_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_pelajar : '';
            })
            ->addColumn('pen_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_pelajar : '';
            })
            ->addColumn('pp_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_pelajar : '';
            })
            ->addColumn('penyebabu_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_suku : '';
            })
            ->addColumn('jk_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_suku : '';
            })
            ->addColumn('jkl_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_suku : '';
            })
            ->addColumn('jt_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_suku : '';
            })
            ->addColumn('pen_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_suku : '';
            })
            ->addColumn('pp_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_suku : '';
            })
            ->addColumn('penyebabu_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_lainnya : '';
            })
            ->addColumn('jk_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_lainnya : '';
            })
            ->addColumn('jkl_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_lainnya : '';
            })
            ->addColumn('jt_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_lainnya : '';
            })
            ->addColumn('pen_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_lainnya : '';
            })
            ->addColumn('pp_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_lainnya : '';
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
                            <a href="' . route('rt_keamanan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rt_keamanan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>

                        </td>';
            })

            ->addColumn('penyebabu_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_antarkelompokmas : '';
            })
            ->addColumn('jk_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_antarkelompokmas : '';
            })
            ->addColumn('jkl_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_antarkelompokmas : '';
            })
            ->addColumn('jt_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_antarkelompokmas : '';
            })
            ->addColumn('pen_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_antarkelompokmas : '';
            })
            ->addColumn('pp_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_antarkelompokmas : '';
            })
            ->addColumn('penyebabu_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_antardesa : '';
            })
            ->addColumn('jk_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_antardesa : '';
            })
            ->addColumn('jkl_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_antardesa : '';
            })
            ->addColumn('jt_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_antardesa : '';
            })
            ->addColumn('pen_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_antardesa : '';
            })
            ->addColumn('pp_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_antardesa : '';
            })
            ->addColumn('penyebabu_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_aparatmk : '';
            })
            ->addColumn('jk_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_aparatmk : '';
            })
            ->addColumn('jkl_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_aparatmk : '';
            })
            ->addColumn('jt_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_aparatmk : '';
            })
            ->addColumn('pen_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_aparatmk : '';
            })
            ->addColumn('pp_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_aparatmk : '';
            })
            ->addColumn('penyebabu_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_aparatmp : '';
            })
            ->addColumn('jk_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_aparatmp : '';
            })
            ->addColumn('jkl_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_aparatmp : '';
            })
            ->addColumn('jt_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_aparatmp : '';
            })
            ->addColumn('pen_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_aparatmp : '';
            })
            ->addColumn('pp_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_aparatmp : '';
            })
            ->addColumn('penyebabu_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_aparatk : '';
            })
            ->addColumn('jk_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_aparatk : '';
            })
            ->addColumn('jkl_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_aparatk : '';
            })
            ->addColumn('jt_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_aparatk : '';
            })
            ->addColumn('pen_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_aparatk : '';
            })
            ->addColumn('pp_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_aparatk : '';
            })
            ->addColumn('penyebabu_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_aparatp : '';
            })
            ->addColumn('jk_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_aparatp : '';
            })
            ->addColumn('jkl_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_aparatp : '';
            })
            ->addColumn('jt_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_aparatp : '';
            })
            ->addColumn('pen_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_aparatp : '';
            })
            ->addColumn('pp_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_aparatp : '';
            })
            ->addColumn('penyebabu_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_pelajar : '';
            })
            ->addColumn('jk_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pelajar : '';
            })
            ->addColumn('jkl_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_pelajar : '';
            })
            ->addColumn('jt_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_pelajar : '';
            })
            ->addColumn('pen_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_pelajar : '';
            })
            ->addColumn('pp_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_pelajar : '';
            })
            ->addColumn('penyebabu_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_suku : '';
            })
            ->addColumn('jk_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_suku : '';
            })
            ->addColumn('jkl_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_suku : '';
            })
            ->addColumn('jt_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_suku : '';
            })
            ->addColumn('pen_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_suku : '';
            })
            ->addColumn('pp_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_suku : '';
            })
            ->addColumn('penyebabu_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_lainnya : '';
            })
            ->addColumn('jk_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_lainnya : '';
            })
            ->addColumn('jkl_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_lainnya : '';
            })
            ->addColumn('jt_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_lainnya : '';
            })
            ->addColumn('pen_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_lainnya : '';
            })
            ->addColumn('pp_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_lainnya : '';
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
        $rt_keamanan = rt_keamanan::where('nik', $nik)->first();


        return view('sdgs.RT.editrt_keamanan', compact('rt_keamanan','datart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_keamananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_keamananRequest $request)
    {
        $rt_keamanan = rt_keamanan::where('nik', $request->valnik)->first();
        if ($rt_keamanan == NULL ) {
            $rt_keamanan = new rt_keamanan();
        }
        $rt_keamanan->nik = $request->valnik;
        $rt_keamanan->nama_ketuart = $request->valnama_ketuart;
        $rt_keamanan->alamat = $request->valalamat;
        $rt_keamanan->rt = $request->valrt;
        $rt_keamanan->rw = $request->valrw;
        $rt_keamanan->nohp = $request->valnohp;
        $rt_keamanan->penyebabu_antarkelompokmas =  $request->valpenyebabu_antarkelompokmas;
        $rt_keamanan->jk_antarkelompokmas =  $request->valjk_antarkelompokmas;
        $rt_keamanan->jkl_antarkelompokmas =  $request->valjkl_antarkelompokmas;
        $rt_keamanan->jt_antarkelompokmas =  $request->valjt_antarkelompokmas;
        $rt_keamanan->pen_antarkelompokmas =  $request->valpen_antarkelompokmas;
        $rt_keamanan->pp_antarkelompokmas =  $request->valpp_antarkelompokmas;
        $rt_keamanan->penyebabu_antardesa =  $request->valpenyebabu_antardesa;
        $rt_keamanan->jk_antardesa =  $request->valjk_antardesa;
        $rt_keamanan->jkl_antardesa =  $request->valjkl_antardesa;
        $rt_keamanan->jt_antardesa =  $request->valjt_antardesa;
        $rt_keamanan->pen_antardesa =  $request->valpen_antardesa;
        $rt_keamanan->pp_antardesa =  $request->valpp_antardesa;
        $rt_keamanan->penyebabu_aparatmk =  $request->valpenyebabu_aparatmk;
        $rt_keamanan->jk_aparatmk =  $request->valjk_aparatmk;
        $rt_keamanan->jkl_aparatmk =  $request->valjkl_aparatmk;
        $rt_keamanan->jt_aparatmk =  $request->valjt_aparatmk;
        $rt_keamanan->pen_aparatmk =  $request->valpen_aparatmk;
        $rt_keamanan->pp_aparatmk =  $request->valpp_aparatmk;
        $rt_keamanan->penyebabu_aparatmp =  $request->valpenyebabu_aparatmp;
        $rt_keamanan->jk_aparatmp =  $request->valjk_aparatmp;
        $rt_keamanan->jkl_aparatmp =  $request->valjkl_aparatmp;
        $rt_keamanan->jt_aparatmp =  $request->valjt_aparatmp;
        $rt_keamanan->pen_aparatmp =  $request->valpen_aparatmp;
        $rt_keamanan->pp_aparatmp =  $request->valpp_aparatmp;
        $rt_keamanan->penyebabu_aparatk =  $request->valpenyebabu_aparatk;
        $rt_keamanan->jk_aparatk =  $request->valjk_aparatk;
        $rt_keamanan->jkl_aparatk =  $request->valjkl_aparatk;
        $rt_keamanan->jt_aparatk =  $request->valjt_aparatk;
        $rt_keamanan->pen_aparatk =  $request->valpen_aparatk;
        $rt_keamanan->pp_aparatk =  $request->valpp_aparatk;
        $rt_keamanan->penyebabu_aparatp =  $request->valpenyebabu_aparatp;
        $rt_keamanan->jk_aparatp =  $request->valjk_aparatp;
        $rt_keamanan->jkl_aparatp =  $request->valjkl_aparatp;
        $rt_keamanan->jt_aparatp =  $request->valjt_aparatp;
        $rt_keamanan->pen_aparatp =  $request->valpen_aparatp;
        $rt_keamanan->pp_aparatp =  $request->valpp_aparatp;
        $rt_keamanan->penyebabu_pelajar =  $request->valpenyebabu_pelajar;
        $rt_keamanan->jk_pelajar =  $request->valjk_pelajar;
        $rt_keamanan->jkl_pelajar =  $request->valjkl_pelajar;
        $rt_keamanan->jt_pelajar =  $request->valjt_pelajar;
        $rt_keamanan->pen_pelajar =  $request->valpen_pelajar;
        $rt_keamanan->pp_pelajar =  $request->valpp_pelajar;
        $rt_keamanan->penyebabu_suku =  $request->valpenyebabu_suku;
        $rt_keamanan->jk_suku =  $request->valjk_suku;
        $rt_keamanan->jkl_suku =  $request->valjkl_suku;
        $rt_keamanan->jt_suku =  $request->valjt_suku;
        $rt_keamanan->pen_suku =  $request->valpen_suku;
        $rt_keamanan->pp_suku =  $request->valpp_suku;
        $rt_keamanan->penyebabu_lainnya =  $request->valpenyebabu_lainnya;
        $rt_keamanan->jk_lainnya =  $request->valjk_lainnya;
        $rt_keamanan->jkl_lainnya =  $request->valjkl_lainnya;
        $rt_keamanan->jt_lainnya =  $request->valjt_lainnya;
        $rt_keamanan->pen_lainnya =  $request->valpen_lainnya;
        $rt_keamanan->pp_lainnya =  $request->valpp_lainnya;

        $rt_keamanan->save();
        return redirect()->route('rt_keamanan.show',['show'=> $request->valnik ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_keamanan  $rt_keamanan
     * @return \Illuminate\Http\Response
     */
    public function show(rt_keamanan $rt_keamanan, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        $rt_keamanan = rt_keamanan::where('nik', $nik)->first();


        return view('sdgs.RT.showrt_keamanan', compact('rt_keamanan','datart'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rt_keamanan  $rt_keamanan
     * @return \Illuminate\Http\Response
     */
    public function edit(rt_keamanan $rt_keamanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatert_keamananRequest  $request
     * @param  \App\Models\rt_keamanan  $rt_keamanan
     * @return \Illuminate\Http\Response
     */
    public function update(Updatert_keamananRequest $request, rt_keamanan $rt_keamanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rt_keamanan  $rt_keamanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(rt_keamanan $rt_keamanan)
    {
        //
    }
}
