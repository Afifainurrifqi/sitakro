<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rtindustri;
use App\Http\Requests\StorertindustriRequest;
use App\Http\Requests\UpdatertindustriRequest;

class RtindustriController extends Controller
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
        $rt_industri = rtindustri::all();
        $rt_industriSudahProses = $rt_industri->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk

        $persentaseProses = ($rt_industriSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.RT.rtindustri', compact('rt_industri', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_industri = rtindustri::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrtindustri', compact('rt_industri','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorertindustriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorertindustriRequest $request)
    {
        $rt_industri = rtindustri::where('nik', $request->valNIK)->first();
        if ($rt_industri == NULL ) {
            $rt_industri = new rtindustri();
        }     
        $rt_industri->nik = $request->valNIK; 
        $rt_industri->jumlahindustrik_kulit = $request->valjumlahindustrik_kulit;
        $rt_industri->jumlahindustris_kulit = $request->valjumlahindustris_kulit;
        $rt_industri->jumlahmanajemen_kulit = $request->valjumlahmanajemen_kulit;
        $rt_industri->jumlahpekerja_kulit = $request->valjumlahpekerja_kulit;
        $rt_industri->jumlahindustrik_kayu = $request->valjumlahindustrik_kayu;
        $rt_industri->jumlahindustris_kayu = $request->valjumlahindustris_kayu;
        $rt_industri->jumlahmanajemen_kayu = $request->valjumlahmanajemen_kayu;
        $rt_industri->jumlahpekerja_kayu = $request->valjumlahpekerja_kayu;
        $rt_industri->jumlahindustrik_logam = $request->valjumlahindustrik_logam;
        $rt_industri->jumlahindustris_logam = $request->valjumlahindustris_logam;
        $rt_industri->jumlahmanajemen_logam = $request->valjumlahmanajemen_logam;
        $rt_industri->jumlahpekerja_logam = $request->valjumlahpekerja_logam;
        $rt_industri->jumlahindustrik_logamb = $request->valjumlahindustrik_logamb;
        $rt_industri->jumlahindustris_logamb = $request->valjumlahindustris_logamb;
        $rt_industri->jumlahmanajemen_logamb = $request->valjumlahmanajemen_logamb;
        $rt_industri->jumlahpekerja_logamb = $request->valjumlahpekerja_logamb;
        $rt_industri->jumlahindustrik_kain = $request->valjumlahindustrik_kain;
        $rt_industri->jumlahindustris_kain = $request->valjumlahindustris_kain;
        $rt_industri->jumlahmanajemen_kain = $request->valjumlahmanajemen_kain;
        $rt_industri->jumlahpekerja_kain = $request->valjumlahpekerja_kain;
        $rt_industri->jumlahindustrik_keramik = $request->valjumlahindustrik_keramik;
        $rt_industri->jumlahindustris_keramik = $request->valjumlahindustris_keramik;
        $rt_industri->jumlahmanajemen_keramik = $request->valjumlahmanajemen_keramik;
        $rt_industri->jumlahpekerja_keramik = $request->valjumlahpekerja_keramik;
        $rt_industri->jumlahindustrik_genteng = $request->valjumlahindustrik_genteng;
        $rt_industri->jumlahindustris_genteng = $request->valjumlahindustris_genteng;
        $rt_industri->jumlahmanajemen_genteng = $request->valjumlahmanajemen_genteng;
        $rt_industri->jumlahpekerja_genteng = $request->valjumlahpekerja_genteng;
        $rt_industri->jumlahindustrik_anyaman = $request->valjumlahindustrik_anyaman;
        $rt_industri->jumlahindustris_anyaman = $request->valjumlahindustris_anyaman;
        $rt_industri->jumlahmanajemen_anyaman = $request->valjumlahmanajemen_anyaman;
        $rt_industri->jumlahpekerja_anyaman = $request->valjumlahpekerja_anyaman;
        $rt_industri->jumlahindustrik_makanan = $request->valjumlahindustrik_makanan;
        $rt_industri->jumlahindustris_makanan = $request->valjumlahindustris_makanan;
        $rt_industri->jumlahmanajemen_makanan = $request->valjumlahmanajemen_makanan;
        $rt_industri->jumlahpekerja_makanan = $request->valjumlahpekerja_makanan;
        $rt_industri->jumlahindustrik_lainnya = $request->valjumlahindustrik_lainnya;
        $rt_industri->jumlahindustris_lainnya = $request->valjumlahindustris_lainnya;
        $rt_industri->jumlahmanajemen_lainnya = $request->valjumlahmanajemen_lainnya;
        $rt_industri->jumlahpekerja_lainnya = $request->valjumlahpekerja_lainnya;

        $rt_industri->save();
        return redirect()->route('rtindustri.show',['show'=> $request->valNIK ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rtindustri  $rtindustri
     * @return \Illuminate\Http\Response
     */
    public function show(rtindustri $rtindustri, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_industri = rtindustri::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrtindustri', compact('rt_industri','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rtindustri  $rtindustri
     * @return \Illuminate\Http\Response
     */
    public function edit(rtindustri $rtindustri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatertindustriRequest  $request
     * @param  \App\Models\rtindustri  $rtindustri
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatertindustriRequest $request, rtindustri $rtindustri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rtindustri  $rtindustri
     * @return \Illuminate\Http\Response
     */
    public function destroy(rtindustri $rtindustri)
    {
        //
    }
}
