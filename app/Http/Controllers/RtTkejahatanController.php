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

class RtTkejahatanController extends Controller
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
        $rt_tkejahatan = rt_tkejahatan::all();
        $rt_tkejahatanSudahProses = $rt_tkejahatan->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk
        $persentaseProses = ($rt_tkejahatanSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.RT.rt_tkejahatan', compact('rt_tkejahatan', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_tkejahatan = rt_tkejahatan::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrt_tkejahatan', compact('rt_tkejahatan','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_tkejahatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_tkejahatanRequest $request)
    {
        $rt_tkejahatan = rt_tkejahatan::where('nik', $request->valNIK)->first();
        if ($rt_tkejahatan == NULL ) {
            $rt_tkejahatan = new rt_tkejahatan();
        }
        $rt_tkejahatan->nik = $request->valNIK;
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
        return redirect()->route('rt_tkejahatan.show',['show'=> $request->valNIK ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_tkejahatan  $rt_tkejahatan
     * @return \Illuminate\Http\Response
     */
    public function show(rt_tkejahatan $rt_tkejahatan, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_tkejahatan = rt_tkejahatan::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrt_tkejahatan', compact('rt_tkejahatan','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
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
