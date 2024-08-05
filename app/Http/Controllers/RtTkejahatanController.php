<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rt_tkejahatan;
use App\Http\Requests\Storert_tkejahatanRequest;
use App\Http\Requests\Updatert_tkejahatanRequest;
use App\Models\Datart;
use Yajra\DataTables\DataTables;

class RtTkejahatanController extends Controller
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
        $dataTerisi = rt_tkejahatan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

      return view('sdgs.RT.rt_tkejahatan', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = rt_tkejahatan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;
      return view('sdgs.RT.admin_rt_tkejahatan', compact('presentase'));
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
                            <a href="' . route('rt_tkejahatan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rt_tkejahatan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>

                        </td>';
            })

            ->addColumn('jk_pencurian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pencurian : '';
            })
            ->addColumn('jumlahselesai_pencurian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_pencurian : '';
            })
            ->addColumn('jktbd_pencurian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_pencurian : '';
            })
            ->addColumn('kll_pencurian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_pencurian : '';
            })
            ->addColumn('kt_pencurian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_pencurian : '';
            })
            ->addColumn('jk_pencuriankeras', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pencuriankeras : '';
            })
            ->addColumn('jumlahselesai_pencuriankeras', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_pencuriankeras : '';
            })
            ->addColumn('jktbd_pencuriankeras', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_pencuriankeras : '';
            })
            ->addColumn('kll_pencuriankeras', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_pencuriankeras : '';
            })
            ->addColumn('kt_pencuriankeras', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_pencuriankeras : '';
            })
            ->addColumn('jk_penipuan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_penipuan : '';
            })
            ->addColumn('jumlahselesai_penipuan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_penipuan : '';
            })
            ->addColumn('jktbd_penipuan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_penipuan : '';
            })
            ->addColumn('kll_penipuan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_penipuan : '';
            })
            ->addColumn('kt_penipuan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_penipuan : '';
            })
            ->addColumn('jk_penganiyayaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_penganiyayaan : '';
            })
            ->addColumn('jumlahselesai_penganiyayaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_penganiyayaan : '';
            })
            ->addColumn('jktbd_penganiyayaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_penganiyayaan : '';
            })
            ->addColumn('kll_penganiyayaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_penganiyayaan : '';
            })
            ->addColumn('kt_penganiyayaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_penganiyayaan : '';
            })
            ->addColumn('jk_pembakaran', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pembakaran : '';
            })
            ->addColumn('jumlahselesai_pembakaran', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_pembakaran : '';
            })
            ->addColumn('jktbd_pembakaran', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_pembakaran : '';
            })
            ->addColumn('kll_pembakaran', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_pembakaran : '';
            })
            ->addColumn('kt_pembakaran', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_pembakaran : '';
            })
            ->addColumn('jk_pemerkosaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pemerkosaan : '';
            })
            ->addColumn('jumlahselesai_pemerkosaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_pemerkosaan : '';
            })
            ->addColumn('jktbd_pemerkosaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_pemerkosaan : '';
            })
            ->addColumn('kll_pemerkosaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_pemerkosaan : '';
            })
            ->addColumn('kt_pemerkosaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_pemerkosaan : '';
            })
            ->addColumn('jk_narkoba', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_narkoba : '';
            })
            ->addColumn('jumlahselesai_narkoba', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_narkoba : '';
            })
            ->addColumn('jktbd_narkoba', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_narkoba : '';
            })
            ->addColumn('kll_narkoba', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_narkoba : '';
            })
            ->addColumn('kt_narkoba', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_narkoba : '';
            })
            ->addColumn('jk_perjudian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_perjudian : '';
            })
            ->addColumn('jumlahselesai_perjudian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_perjudian : '';
            })
            ->addColumn('jktbd_perjudian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_perjudian : '';
            })
            ->addColumn('kll_perjudian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_perjudian : '';
            })
            ->addColumn('kt_perjudian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_perjudian : '';
            })
            ->addColumn('jk_pembunuhan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pembunuhan : '';
            })
            ->addColumn('jumlahselesai_pembunuhan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_pembunuhan : '';
            })
            ->addColumn('jktbd_pembunuhan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_pembunuhan : '';
            })
            ->addColumn('kll_pembunuhan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_pembunuhan : '';
            })
            ->addColumn('kt_pembunuhan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_pembunuhan : '';
            })
            ->addColumn('jk_perdaganganorang', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_perdaganganorang : '';
            })
            ->addColumn('jumlahselesai_perdaganganorang', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_perdaganganorang : '';
            })
            ->addColumn('jktbd_perdaganganorang', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_perdaganganorang : '';
            })
            ->addColumn('kll_perdaganganorang', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_perdaganganorang : '';
            })
            ->addColumn('kt_perdaganganorang', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_perdaganganorang : '';
            })

            ->addColumn('jk_korupsi', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_korupsi : '';
            })
            ->addColumn('jumlahselesai_korupsi', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_korupsi : '';
            })
            ->addColumn('jktbd_korupsi', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_korupsi : '';
            })
            ->addColumn('kll_korupsi', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_korupsi : '';
            })
            ->addColumn('kt_korupsi', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_korupsi : '';
            })

            ->addColumn('jk_lainnya', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_lainnya : '';
            })
            ->addColumn('jumlahselesai_lainnya', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_lainnya : '';
            })
            ->addColumn('jktbd_lainnya', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_lainnya : '';
            })
            ->addColumn('kll_lainnya', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_lainnya : '';
            })
            ->addColumn('kt_lainnya', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_lainnya : '';
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
                            <a href="' . route('rt_tkejahatan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rt_tkejahatan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>

                        </td>';
            })

            ->addColumn('jk_pencurian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pencurian : '';
            })
            ->addColumn('jumlahselesai_pencurian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_pencurian : '';
            })
            ->addColumn('jktbd_pencurian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_pencurian : '';
            })
            ->addColumn('kll_pencurian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_pencurian : '';
            })
            ->addColumn('kt_pencurian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_pencurian : '';
            })
            ->addColumn('jk_pencuriankeras', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pencuriankeras : '';
            })
            ->addColumn('jumlahselesai_pencuriankeras', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_pencuriankeras : '';
            })
            ->addColumn('jktbd_pencuriankeras', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_pencuriankeras : '';
            })
            ->addColumn('kll_pencuriankeras', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_pencuriankeras : '';
            })
            ->addColumn('kt_pencuriankeras', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_pencuriankeras : '';
            })
            ->addColumn('jk_penipuan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_penipuan : '';
            })
            ->addColumn('jumlahselesai_penipuan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_penipuan : '';
            })
            ->addColumn('jktbd_penipuan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_penipuan : '';
            })
            ->addColumn('kll_penipuan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_penipuan : '';
            })
            ->addColumn('kt_penipuan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_penipuan : '';
            })
            ->addColumn('jk_penganiyayaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_penganiyayaan : '';
            })
            ->addColumn('jumlahselesai_penganiyayaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_penganiyayaan : '';
            })
            ->addColumn('jktbd_penganiyayaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_penganiyayaan : '';
            })
            ->addColumn('kll_penganiyayaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_penganiyayaan : '';
            })
            ->addColumn('kt_penganiyayaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_penganiyayaan : '';
            })
            ->addColumn('jk_pembakaran', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pembakaran : '';
            })
            ->addColumn('jumlahselesai_pembakaran', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_pembakaran : '';
            })
            ->addColumn('jktbd_pembakaran', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_pembakaran : '';
            })
            ->addColumn('kll_pembakaran', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_pembakaran : '';
            })
            ->addColumn('kt_pembakaran', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_pembakaran : '';
            })
            ->addColumn('jk_pemerkosaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pemerkosaan : '';
            })
            ->addColumn('jumlahselesai_pemerkosaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_pemerkosaan : '';
            })
            ->addColumn('jktbd_pemerkosaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_pemerkosaan : '';
            })
            ->addColumn('kll_pemerkosaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_pemerkosaan : '';
            })
            ->addColumn('kt_pemerkosaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_pemerkosaan : '';
            })
            ->addColumn('jk_narkoba', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_narkoba : '';
            })
            ->addColumn('jumlahselesai_narkoba', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_narkoba : '';
            })
            ->addColumn('jktbd_narkoba', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_narkoba : '';
            })
            ->addColumn('kll_narkoba', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_narkoba : '';
            })
            ->addColumn('kt_narkoba', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_narkoba : '';
            })
            ->addColumn('jk_perjudian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_perjudian : '';
            })
            ->addColumn('jumlahselesai_perjudian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_perjudian : '';
            })
            ->addColumn('jktbd_perjudian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_perjudian : '';
            })
            ->addColumn('kll_perjudian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_perjudian : '';
            })
            ->addColumn('kt_perjudian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_perjudian : '';
            })
            ->addColumn('jk_pembunuhan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pembunuhan : '';
            })
            ->addColumn('jumlahselesai_pembunuhan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_pembunuhan : '';
            })
            ->addColumn('jktbd_pembunuhan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_pembunuhan : '';
            })
            ->addColumn('kll_pembunuhan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_pembunuhan : '';
            })
            ->addColumn('kt_pembunuhan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_pembunuhan : '';
            })
            ->addColumn('jk_perdaganganorang', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_perdaganganorang : '';
            })
            ->addColumn('jumlahselesai_perdaganganorang', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_perdaganganorang : '';
            })
            ->addColumn('jktbd_perdaganganorang', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_perdaganganorang : '';
            })
            ->addColumn('kll_perdaganganorang', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_perdaganganorang : '';
            })
            ->addColumn('kt_perdaganganorang', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_perdaganganorang : '';
            })

            ->addColumn('jk_korupsi', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_korupsi : '';
            })
            ->addColumn('jumlahselesai_korupsi', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_korupsi : '';
            })
            ->addColumn('jktbd_korupsi', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_korupsi : '';
            })
            ->addColumn('kll_korupsi', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_korupsi : '';
            })
            ->addColumn('kt_korupsi', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_korupsi : '';
            })

            ->addColumn('jk_lainnya', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_lainnya : '';
            })
            ->addColumn('jumlahselesai_lainnya', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_lainnya : '';
            })
            ->addColumn('jktbd_lainnya', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_lainnya : '';
            })
            ->addColumn('kll_lainnya', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_lainnya : '';
            })
            ->addColumn('kt_lainnya', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_lainnya : '';
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
        $rt_tkejahatan = rt_tkejahatan::where('nik', $nik)->first();

        return view('sdgs.RT.editrt_tkejahatan', compact('rt_tkejahatan','datart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_tkejahatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_tkejahatanRequest $request)
    {
        $rt_tkejahatan = rt_tkejahatan::where('nik', $request->valnik)->first();
        if ($rt_tkejahatan == NULL ) {
            $rt_tkejahatan = new rt_tkejahatan();
        }
        $rt_tkejahatan->nik = $request->valnik;
        $rt_tkejahatan->nama_ketuart = $request->valnama_ketuart;
        $rt_tkejahatan->alamat = $request->valalamat;
        $rt_tkejahatan->rt = $request->valrt;
        $rt_tkejahatan->rw = $request->valrw;
        $rt_tkejahatan->nohp = $request->valnohp;
        $rt_tkejahatan->jk_pencurian = $request->valjk_pencurian;
        $rt_tkejahatan->jumlahselesai_pencurian = $request->valjumlahselesai_pencurian;
        $rt_tkejahatan->jktbd_pencurian = $request->valjktbd_pencurian;
        $rt_tkejahatan->kll_pencurian = $request->valkll_pencurian;
        $rt_tkejahatan->kt_pencurian = $request->valkt_pencurian;
        $rt_tkejahatan->jk_pencuriankeras = $request->valjk_pencuriankeras;
        $rt_tkejahatan->jumlahselesai_pencuriankeras = $request->valjumlahselesai_pencuriankeras;
        $rt_tkejahatan->jktbd_pencuriankeras = $request->valjktbd_pencuriankeras;
        $rt_tkejahatan->kll_pencuriankeras = $request->valkll_pencuriankeras;
        $rt_tkejahatan->kt_pencuriankeras = $request->valkt_pencuriankeras;
        $rt_tkejahatan->jk_penipuan = $request->valjk_penipuan;
        $rt_tkejahatan->jumlahselesai_penipuan = $request->valjumlahselesai_penipuan;
        $rt_tkejahatan->jktbd_penipuan = $request->valjktbd_penipuan;
        $rt_tkejahatan->kll_penipuan = $request->valkll_penipuan;
        $rt_tkejahatan->kt_penipuan = $request->valkt_penipuan;
        $rt_tkejahatan->jk_penganiyayaan = $request->valjk_penganiyayaan;
        $rt_tkejahatan->jumlahselesai_penganiyayaan = $request->valjumlahselesai_penganiyayaan;
        $rt_tkejahatan->jktbd_penganiyayaan = $request->valjktbd_penganiyayaan;
        $rt_tkejahatan->kll_penganiyayaan = $request->valkll_penganiyayaan;
        $rt_tkejahatan->kt_penganiyayaan = $request->valkt_penganiyayaan;
        $rt_tkejahatan->jk_pembakaran = $request->valjk_pembakaran;
        $rt_tkejahatan->jumlahselesai_pembakaran = $request->valjumlahselesai_pembakaran;
        $rt_tkejahatan->jktbd_pembakaran = $request->valjktbd_pembakaran;
        $rt_tkejahatan->kll_pembakaran = $request->valkll_pembakaran;
        $rt_tkejahatan->kt_pembakaran = $request->valkt_pembakaran;
        $rt_tkejahatan->jk_pemerkosaan = $request->valjk_pemerkosaan;
        $rt_tkejahatan->jumlahselesai_pemerkosaan = $request->valjumlahselesai_pemerkosaan;
        $rt_tkejahatan->jktbd_pemerkosaan = $request->valjktbd_pemerkosaan;
        $rt_tkejahatan->kll_pemerkosaan = $request->valkll_pemerkosaan;
        $rt_tkejahatan->kt_pemerkosaan = $request->valkt_pemerkosaan;
        $rt_tkejahatan->jk_narkoba = $request->valjk_narkoba;
        $rt_tkejahatan->jumlahselesai_narkoba = $request->valjumlahselesai_narkoba;
        $rt_tkejahatan->jktbd_narkoba = $request->valjktbd_narkoba;
        $rt_tkejahatan->kll_narkoba = $request->valkll_narkoba;
        $rt_tkejahatan->kt_narkoba = $request->valkt_narkoba;
        $rt_tkejahatan->jk_perjudian = $request->valjk_perjudian;
        $rt_tkejahatan->jumlahselesai_perjudian = $request->valjumlahselesai_perjudian;
        $rt_tkejahatan->jktbd_perjudian = $request->valjktbd_perjudian;
        $rt_tkejahatan->kll_perjudian = $request->valkll_perjudian;
        $rt_tkejahatan->kt_perjudian = $request->valkt_perjudian;
        $rt_tkejahatan->jk_pembunuhan = $request->valjk_pembunuhan;
        $rt_tkejahatan->jumlahselesai_pembunuhan = $request->valjumlahselesai_pembunuhan;
        $rt_tkejahatan->jktbd_pembunuhan = $request->valjktbd_pembunuhan;
        $rt_tkejahatan->kll_pembunuhan = $request->valkll_pembunuhan;
        $rt_tkejahatan->kt_pembunuhan = $request->valkt_pembunuhan;
        $rt_tkejahatan->jk_perdaganganorang = $request->valjk_perdaganganorang;
        $rt_tkejahatan->jumlahselesai_perdaganganorang = $request->valjumlahselesai_perdaganganorang;
        $rt_tkejahatan->jktbd_perdaganganorang = $request->valjktbd_perdaganganorang;
        $rt_tkejahatan->kll_perdaganganorang = $request->valkll_perdaganganorang;
        $rt_tkejahatan->kt_perdaganganorang = $request->valkt_perdaganganorang;
        $rt_tkejahatan->jk_korupsi = $request->valjk_korupsi;
        $rt_tkejahatan->jumlahselesai_korupsi = $request->valjumlahselesai_korupsi;
        $rt_tkejahatan->jktbd_korupsi = $request->valjktbd_korupsi;
        $rt_tkejahatan->kll_korupsi = $request->valkll_korupsi;
        $rt_tkejahatan->kt_korupsi = $request->valkt_korupsi;
        $rt_tkejahatan->jk_lainnya = $request->valjk_lainnya;
        $rt_tkejahatan->jumlahselesai_lainnya = $request->valjumlahselesai_lainnya;
        $rt_tkejahatan->jktbd_lainnya = $request->valjktbd_lainnya;
        $rt_tkejahatan->kll_lainnya = $request->valkll_lainnya;
        $rt_tkejahatan->kt_lainnya = $request->valkt_lainnya;

        $rt_tkejahatan->save();
        return redirect()->route('rt_tkejahatan.show',['show'=> $request->valnik ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_tkejahatan  $rt_tkejahatan
     * @return \Illuminate\Http\Response
     */
    public function show(rt_tkejahatan $rt_tkejahatan, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        $rt_tkejahatan = rt_tkejahatan::where('nik', $nik)->first();

        return view('sdgs.RT.showrt_tkejahatan', compact('rt_tkejahatan','datart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rt_tkejahatan  $rt_tkejahatan
     * @return \Illuminate\Http\Response
     */
    public function edit(rt_tkejahatan $rt_tkejahatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatert_tkejahatanRequest  $request
     * @param  \App\Models\rt_tkejahatan  $rt_tkejahatan
     * @return \Illuminate\Http\Response
     */
    public function update(Updatert_tkejahatanRequest $request, rt_tkejahatan $rt_tkejahatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rt_tkejahatan  $rt_tkejahatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(rt_tkejahatan $rt_tkejahatan)
    {
        //
    }
}
