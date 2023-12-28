<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rtkegiatan_warga;
use App\Http\Requests\Storertkegiatan_wargaRequest;
use App\Http\Requests\Updatertkegiatan_wargaRequest;

class RtkegiatanWargaController extends Controller
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
        $rt_kegiatanwarga = rtkegiatan_warga::all();
        $rt_kegiatanwargaSudahProses = $rt_kegiatanwarga->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk
        $persentaseProses = ($rt_kegiatanwargaSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.RT.rt_kegiatanwarga', compact('rt_kegiatanwarga', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrt_kegiatanwarga', compact('rt_kegiatanwarga','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storertkegiatan_wargaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storertkegiatan_wargaRequest $request)
    {
        $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $request->valNIK)->first();
        if ($rt_kegiatanwarga == NULL ) {
            $rt_kegiatanwarga = new rtkegiatan_warga();
        }
        $rt_kegiatanwarga->nik = $request->valNIK;  
        $rt_kegiatanwarga->jumlah_kpp = $request->valjumlah_kpp;
        $rt_kegiatanwarga->jumlah_ppr = $request->valjumlah_ppr;
        $rt_kegiatanwarga->jumlah_hansip = $request->valjumlah_hansip;
        $rt_kegiatanwarga->pelaporan_tamu_lebih24 = $request->valpelaporan_tamu_lebih24;
        $rt_kegiatanwarga->sistem_keamanan = $request->valsistem_keamanan;
        $rt_kegiatanwarga->sistem_linmas = $request->valsistem_linmas;
        $rt_kegiatanwarga->jumlahpos_digunakan = $request->valjumlahpos_digunakan;
        $rt_kegiatanwarga->jumlahpos_tidakdigunakan = $request->valjumlahpos_tidakdigunakan;
        $rt_kegiatanwarga->jarak_ppt = $request->valjarak_ppt;
        $rt_kegiatanwarga->kemudahan_ppt = $request->valkemudahan_ppt;
        $rt_kegiatanwarga->jarak_korban = $request->valjarak_korban;
        $rt_kegiatanwarga->jarak_lokasikumpul = $request->valjarak_lokasikumpul;
        $rt_kegiatanwarga->jarak_mangkal = $request->valjarak_mangkal;
        $rt_kegiatanwarga->jarak_lokalisasi = $request->valjarak_lokalisasi;

        $rt_kegiatanwarga->save();
        return redirect()->route('rt_kegiatanwarga.show',['show'=> $request->valNIK ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rtkegiatan_warga  $rtkegiatan_warga
     * @return \Illuminate\Http\Response
     */
    public function show(rtkegiatan_warga $rtkegiatan_warga, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $nik)->first();
        $agama   = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrt_kegiatanwarga', compact('rt_kegiatanwarga','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rtkegiatan_warga  $rtkegiatan_warga
     * @return \Illuminate\Http\Response
     */
    public function edit(rtkegiatan_warga $rtkegiatan_warga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatertkegiatan_wargaRequest  $request
     * @param  \App\Models\rtkegiatan_warga  $rtkegiatan_warga
     * @return \Illuminate\Http\Response
     */
    public function update(Updatertkegiatan_wargaRequest $request, rtkegiatan_warga $rtkegiatan_warga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rtkegiatan_warga  $rtkegiatan_warga
     * @return \Illuminate\Http\Response
     */
    public function destroy(rtkegiatan_warga $rtkegiatan_warga)
    {
        //
    }
}
