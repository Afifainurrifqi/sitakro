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

class RtKeamananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $datapenduduk = datapenduduk::whereIn('datak', ['Tetap', 'Tidaktetap']);

        if ($search) {
            $datapenduduk->where('nik', 'like', '%' . $search . '%');
        }

        $datapenduduk = $datapenduduk->paginate(100);
        $rt_keamanan = rt_keamanan::all();
        $rt_keamananSudahProses = $rt_keamanan->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk
        $persentaseProses = ($rt_keamananSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.RT.rt_keamanan', compact('rt_keamanan', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_keamanan = rt_keamanan::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrt_keamanan', compact('rt_keamanan','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_keamananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_keamananRequest $request)
    {
        $rt_keamanan = rt_keamanan::where('nik', $request->valNIK)->first();
        if ($rt_keamanan == NULL ) {
            $rt_keamanan = new rt_keamanan();
        }
        $rt_keamanan->nik = $request->valNIK;  
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
        return redirect()->route('rt_keamanan.show',['show'=> $request->valNIK ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_keamanan  $rt_keamanan
     * @return \Illuminate\Http\Response
     */
    public function show(rt_keamanan $rt_keamanan, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_keamanan = rt_keamanan::where('nik', $nik)->first();
        $agama   = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrt_keamanan', compact('rt_keamanan','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
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
