<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rtlembaga_ekonomi;
use App\Http\Requests\Storertlembaga_ekonomiRequest;
use App\Http\Requests\Updatertlembaga_ekonomiRequest;
use App\Models\Datart;
use Yajra\DataTables\DataTables;

class RtlembagaEkonomiController extends Controller
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
        $dataTerisi = rtlembaga_ekonomi::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.rtlembaga_ekonomi', compact('presentase'));
    }

    public function admin_index(Request $request)
    {

        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = rtlembaga_ekonomi::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.admin_rtlembaga_ekonomi', compact('presentase'));
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
                            <a href="' . route('rtlembaga_ekonomi.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rtlembaga_ekonomi.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>


                        </td>';
            })

            ->addColumn('agentik_jp', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->agentik_jp : '';
            })
            ->addColumn('agentik_jtk', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->agentik_jtk : '';
            })
            ->addColumn('jtri_sentra', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->jtri_sentra : '';
            })
            ->addColumn('jtri_lingkungan', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->jtri_lingkungan : '';
            })
            ->addColumn('jtri_kampung', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->jtri_kampung : '';
            })
            ->addColumn('diskotik_kpd', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->diskotik_kpd : '';
            })
            ->addColumn('diskotik_jtl', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->diskotik_jtl : '';
            })
            ->addColumn('lpg_kpapm', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->lpg_kpapm : '';
            })
            ->addColumn('lpg_kpapg', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->lpg_kpapg : '';
            })
            ->addColumn('koperasi_jumlah', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_jumlah : '';
            })
            ->addColumn('koperasi_kudproduksi', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudproduksi : '';
            })
            ->addColumn('koperasi_kudkredit', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudkredit : '';
            })
            ->addColumn('koperasi_kudkegiatan', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudkegiatan : '';
            })
            ->addColumn('koperasi_kudindustrik', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudindustrik : '';
            })
            ->addColumn('koperasi_kudksp', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudksp : '';
            })
            ->addColumn('koperasi_kudksu', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudksu : '';
            })
            ->addColumn('koperasi_kudlainnya', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudlainnya : '';
            })
            ->addColumn('kos_kud', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->kos_kud : '';
            })
            ->addColumn('kos_bumdes', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->kos_bumdes : '';
            })
            ->addColumn('kos_selain', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->kos_selain : '';
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
                            <a href="' . route('rtlembaga_ekonomi.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rtlembaga_ekonomi.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>


                        </td>';
            })

            ->addColumn('agentik_jp', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->agentik_jp : '';
            })
            ->addColumn('agentik_jtk', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->agentik_jtk : '';
            })
            ->addColumn('jtri_sentra', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->jtri_sentra : '';
            })
            ->addColumn('jtri_lingkungan', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->jtri_lingkungan : '';
            })
            ->addColumn('jtri_kampung', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->jtri_kampung : '';
            })
            ->addColumn('diskotik_kpd', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->diskotik_kpd : '';
            })
            ->addColumn('diskotik_jtl', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->diskotik_jtl : '';
            })
            ->addColumn('lpg_kpapm', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->lpg_kpapm : '';
            })
            ->addColumn('lpg_kpapg', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->lpg_kpapg : '';
            })
            ->addColumn('koperasi_jumlah', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_jumlah : '';
            })
            ->addColumn('koperasi_kudproduksi', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudproduksi : '';
            })
            ->addColumn('koperasi_kudkredit', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudkredit : '';
            })
            ->addColumn('koperasi_kudkegiatan', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudkegiatan : '';
            })
            ->addColumn('koperasi_kudindustrik', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudindustrik : '';
            })
            ->addColumn('koperasi_kudksp', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudksp : '';
            })
            ->addColumn('koperasi_kudksu', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudksu : '';
            })
            ->addColumn('koperasi_kudlainnya', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudlainnya : '';
            })
            ->addColumn('kos_kud', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->kos_kud : '';
            })
            ->addColumn('kos_bumdes', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->kos_bumdes : '';
            })
            ->addColumn('kos_selain', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->kos_selain : '';
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
        $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrtlembaga_ekonomi', compact('rtlembaga_ekonomi', 'datart', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storertlembaga_ekonomiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storertlembaga_ekonomiRequest $request)
    {
        $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $request->valNIK)->first();
        if ($rtlembaga_ekonomi == NULL) {
            $rtlembaga_ekonomi = new rtlembaga_ekonomi();
        }
        $rtlembaga_ekonomi->nik = $request->valnik;
        $rtlembaga_ekonomi->nama_ketuart = $request->valnama_ketuart;
        $rtlembaga_ekonomi->alamat = $request->valalamat;
        $rtlembaga_ekonomi->rt = $request->valrt;
        $rtlembaga_ekonomi->rw = $request->valrw;
        $rtlembaga_ekonomi->nohp = $request->valnohp;
        $rtlembaga_ekonomi->agentik_jp = $request->valagentik_jp;
        $rtlembaga_ekonomi->agentik_jtk = $request->valagentik_jtk;
        $rtlembaga_ekonomi->jtri_sentra = $request->valjtri_sentra;
        $rtlembaga_ekonomi->jtri_lingkungan = $request->valjtri_lingkungan;
        $rtlembaga_ekonomi->jtri_kampung = $request->valjtri_kampung;
        $rtlembaga_ekonomi->diskotik_kpd = $request->valdiskotik_kpd;
        $rtlembaga_ekonomi->diskotik_jtl = $request->valdiskotik_jtl;
        $rtlembaga_ekonomi->lpg_kpapm = $request->vallpg_kpapm;
        $rtlembaga_ekonomi->lpg_kpapg = $request->vallpg_kpapg;
        $rtlembaga_ekonomi->koperasi_jumlah = $request->valkoperasi_jumlah;
        $rtlembaga_ekonomi->koperasi_kudproduksi = $request->valkoperasi_kudproduksi;
        $rtlembaga_ekonomi->koperasi_kudkredit = $request->valkoperasi_kudkredit;
        $rtlembaga_ekonomi->koperasi_kudkegiatan = $request->valkoperasi_kudkegiatan;
        $rtlembaga_ekonomi->koperasi_kudindustrik = $request->valkoperasi_kudindustrik;
        $rtlembaga_ekonomi->koperasi_kudksp = $request->valkoperasi_kudksp;
        $rtlembaga_ekonomi->koperasi_kudksu = $request->valkoperasi_kudksu;
        $rtlembaga_ekonomi->koperasi_kudlainnya = $request->valkoperasi_kudlainnya;
        $rtlembaga_ekonomi->kos_kud = $request->valkos_kud;
        $rtlembaga_ekonomi->kos_bumdes = $request->valkos_bumdes;
        $rtlembaga_ekonomi->kos_selain = $request->valkos_selain;

        $rtlembaga_ekonomi->save();
        return redirect()->route('rtlembaga_ekonomi.show', ['show' => $request->valnik]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rtlembaga_ekonomi  $rtlembaga_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function show(rtlembaga_ekonomi $rtlembaga_ekonomi, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $nik)->first();
        $agama   = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrtlembaga_ekonomi', compact('rtlembaga_ekonomi', 'datart', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rtlembaga_ekonomi  $rtlembaga_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function edit(rtlembaga_ekonomi $rtlembaga_ekonomi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatertlembaga_ekonomiRequest  $request
     * @param  \App\Models\rtlembaga_ekonomi  $rtlembaga_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function update(Updatertlembaga_ekonomiRequest $request, rtlembaga_ekonomi $rtlembaga_ekonomi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rtlembaga_ekonomi  $rtlembaga_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function destroy(rtlembaga_ekonomi $rtlembaga_ekonomi)
    {
        //
    }
}
