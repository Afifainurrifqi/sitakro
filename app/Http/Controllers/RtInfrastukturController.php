<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rt_infrastuktur;
use App\Http\Requests\Storert_infrastukturRequest;
use App\Http\Requests\Updatert_infrastukturRequest;

class RtInfrastukturController extends Controller
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
        $rtinfrastuktur = rt_infrastuktur::all();
        $rtinfrastukturSudahProses = $rtinfrastuktur->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk

        $persentaseProses = ($rtinfrastukturSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.RT.rt_infrastuktur', compact('rtinfrastuktur', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rtinfrastuktur = rt_infrastuktur::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrt_infrastuktur', compact('rtinfrastuktur','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_infrastukturRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_infrastukturRequest $request)
    {
        $rtinfrastuktur = rt_infrastuktur::where('nik', $request->valNIK)->first();
        if ($rtinfrastuktur == NULL ) {
            $rtinfrastuktur = new rt_infrastuktur();
        }
        $rtinfrastuktur->nik = $request->valNIK;         
        
        $rtinfrastuktur->penerangan_jalan = $request -> valpenerangan_jalan;
        $rtinfrastuktur->pra_transportrt = $request -> valpra_transportrt;
        $rtinfrastuktur->jalan_aspal = $request -> valjalan_aspal;
        $rtinfrastuktur->jalan_makadam = $request -> valjalan_makadam;
        $rtinfrastuktur->jalan_tanah = $request -> valjalan_tanah;
        $rtinfrastuktur->jalan_papan_atasaair = $request -> valjalan_papan_atasaair;
        $rtinfrastuktur->jalan_setapak = $request -> valjalan_setapak;
        $rtinfrastuktur->jalan_lainnya = $request -> valjalan_lainnya;
        $rtinfrastuktur->jalan_darat_roda4 = $request -> valjalan_darat_roda4;
        $rtinfrastuktur->angkutanumum_trayek = $request -> valangkutanumum_trayek;
        $rtinfrastuktur->angkutanumum_opra = $request -> valangkutanumum_opra;
        $rtinfrastuktur->angkutanumum_jamopra = $request -> valangkutanumum_jamopra;
        $rtinfrastuktur->dermaga_laut = $request -> valdermaga_laut;
        $rtinfrastuktur->sinyalhp_bts = $request -> valsinyalhp_bts;
        $rtinfrastuktur->sinyalhp_telkom = $request -> valsinyalhp_telkom;
        $rtinfrastuktur->sinyalhp_indo = $request -> valsinyalhp_indo;
        $rtinfrastuktur->sinyalhp_xl = $request -> valsinyalhp_xl;
        $rtinfrastuktur->sinyalhp_hut = $request -> valsinyalhp_hut;
        $rtinfrastuktur->sinyalhp_psn = $request -> valsinyalhp_psn;
        $rtinfrastuktur->sinyalhp_smart = $request -> valsinyalhp_smart;
        $rtinfrastuktur->sinyalhp_bakrie = $request -> valsinyalhp_bakrie;
        $rtinfrastuktur->pos_pembantu = $request -> valpos_pembantu;
        $rtinfrastuktur->pos_keliling = $request -> valpos_keliling;
        $rtinfrastuktur->agen_jasa = $request -> valagen_jasa;
        $rtinfrastuktur->chanel_tvri = $request -> valchanel_tvri;
        $rtinfrastuktur->parabola_tvri = $request -> valparabola_tvri;
        $rtinfrastuktur->chanel_tvrid = $request -> valchanel_tvrid;
        $rtinfrastuktur->parabola_tvrid = $request -> valparabola_tvrid;
        $rtinfrastuktur->chanel_s = $request -> valchanel_s;
        $rtinfrastuktur->parabola_s = $request -> valparabola_s;
        $rtinfrastuktur->chanel_ln = $request -> valchanel_ln;
        $rtinfrastuktur->parabola_ln = $request -> valparabola_ln;
        $rtinfrastuktur->chanel_rri = $request -> valchanel_rri;
        $rtinfrastuktur->parabola_rri = $request -> valparabola_rri;
        $rtinfrastuktur->chanel_rrid = $request -> valchanel_rrid;
        $rtinfrastuktur->parabola_rrid = $request -> valparabola_rrid;
        $rtinfrastuktur->chanel_radios = $request -> valchanel_radios;
        $rtinfrastuktur->parabola_radios = $request -> valparabola_radios;
        $rtinfrastuktur->chanel_radiok = $request -> valchanel_radiok;
        $rtinfrastuktur->parabola_radiok = $request -> valparabola_radiok;
        $rtinfrastuktur->jumlah_lokasi_air = $request -> valjumlah_lokasi_air;
        $rtinfrastuktur->fasilitas_umump_pasar = $request -> valfasilitas_umump_pasar;
        $rtinfrastuktur->fasilitas_umump_stasiun = $request -> valfasilitas_umump_stasiun;
        $rtinfrastuktur->fasilitas_umump_terminal = $request -> valfasilitas_umump_terminal;
        $rtinfrastuktur->fasilitas_umump_kolong = $request -> valfasilitas_umump_kolong;
        $rtinfrastuktur->fasilitas_umump_pelabuhan = $request -> valfasilitas_umump_pelabuhan;
        $rtinfrastuktur->pemukiman_khusus_mewah = $request -> valpemukiman_khusus_mewah;
        $rtinfrastuktur->pemukiman_khusus_apart = $request -> valpemukiman_khusus_apart;
        $rtinfrastuktur->pemukiman_khusus_susun = $request -> valpemukiman_khusus_susun;
        $rtinfrastuktur->pemukiman_khusus_school = $request -> valpemukiman_khusus_school;
        $rtinfrastuktur->pemukiman_khusus_kos = $request -> valpemukiman_khusus_kos;
        $rtinfrastuktur->pemukiman_khusus_asrama = $request -> valpemukiman_khusus_asrama;
        $rtinfrastuktur->pemukiman_khusus_lp = $request -> valpemukiman_khusus_lp;

        $rtinfrastuktur->save();
        return redirect()->route('rtinfrastuktur.show',['show'=> $request->valNIK ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_infrastuktur  $rt_infrastuktur
     * @return \Illuminate\Http\Response
     */
    public function show(rt_infrastuktur $rt_infrastuktur, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rtinfrastuktur = rt_infrastuktur::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrt_infrastuktur', compact('rtinfrastuktur','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rt_infrastuktur  $rt_infrastuktur
     * @return \Illuminate\Http\Response
     */
    public function edit(rt_infrastuktur $rt_infrastuktur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatert_infrastukturRequest  $request
     * @param  \App\Models\rt_infrastuktur  $rt_infrastuktur
     * @return \Illuminate\Http\Response
     */
    public function update(Updatert_infrastukturRequest $request, rt_infrastuktur $rt_infrastuktur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rt_infrastuktur  $rt_infrastuktur
     * @return \Illuminate\Http\Response
     */
    public function destroy(rt_infrastuktur $rt_infrastuktur)
    {
        //
    }
}
