<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\laink;
use App\Http\Requests\StorelainkRequest;
use App\Http\Requests\UpdatelainkRequest;

class LainkController extends Controller
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
        $laink = laink::all();
        $lainkSudahProses = $laink->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk

        $persentaseProses = ($lainkSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.KK.lain', compact('laink', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $laink = laink::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.editlaink', compact('laink','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorelainkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelainkRequest $request)
    {
        $laink = laink::where('nik', $request->valNIK)->first();
        if ($laink == NULL ) {
            $laink = new laink();
        }
        $laink->nik = $request->valNIK; 
    
        $laink-> pengtransportsebelum = $request-> valpengtransportsebelum;
        $laink-> pengtransportsesudah = $request-> valpengtransportsesudah;
        $laink-> blt = $request-> valblt;
        $laink-> pkh = $request-> valpkh;
        $laink-> bst = $request-> valbst;
        $laink-> bantuan_presiden = $request-> valbantuan_presiden;
        $laink-> bantuan_umkm = $request-> valbantuan_umkm;
        $laink-> bantuan_pekerja = $request-> valbantuan_pekerja;
        $laink-> bantuan_anak = $request-> valbantuan_anak;
        $laink-> lainnya = $request-> vallainnya;
        $laink-> rata_rata = $request-> valrata_rata;

        $laink->save();
        return redirect()->route('laink.show',['show'=> $request->valNIK ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\laink  $laink
     * @return \Illuminate\Http\Response
     */
    public function show(laink $laink, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $laink = laink::where('nik',$nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.showlaink', compact('laink', 'datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\laink  $laink
     * @return \Illuminate\Http\Response
     */
    public function edit(laink $laink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelainkRequest  $request
     * @param  \App\Models\laink  $laink
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelainkRequest $request, laink $laink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\laink  $laink
     * @return \Illuminate\Http\Response
     */
    public function destroy(laink $laink)
    {
        //
    }
}
