<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rtlembaga_keagamaan;
use App\Http\Requests\Storertlembaga_keagamaanRequest;
use App\Http\Requests\Updatertlembaga_keagamaanRequest;

class RtlembagaKeagamaanController extends Controller
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
        $rtlembaga_keagamaan = rtlembaga_keagamaan::all();
        $rtlembaga_keagamaanSudahProses = $rtlembaga_keagamaan->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk
        $persentaseProses = ($rtlembaga_keagamaanSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.RT.rtlembaga_keagamaan', compact('rtlembaga_keagamaan', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrtlembaga_keagamaan', compact('rtlembaga_keagamaan','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storertlembaga_keagamaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storertlembaga_keagamaanRequest $request)
    {
        $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $request->valNIK)->first();
        if ($rtlembaga_keagamaan == NULL ) {
            $rtlembaga_keagamaan = new rtlembaga_keagamaan();
        }
        $rtlembaga_keagamaan->nik = $request->valNIK;      
        $rtlembaga_keagamaan->nama = $request->valnama;
        $rtlembaga_keagamaan->jumlah_peng = $request->valjumlah_peng;
        $rtlembaga_keagamaan->jumlah_ang = $request->valjumlah_ang;
        $rtlembaga_keagamaan->fasilitas = $request->valfasilitas;
        $rtlembaga_keagamaan->save();
        return redirect()->route('rtlembaga_keagamaan.show',['show'=> $request->valNIK ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rtlembaga_keagamaan  $rtlembaga_keagamaan
     * @return \Illuminate\Http\Response
     */
    public function show(rtlembaga_keagamaan $rtlembaga_keagamaan, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrtlembaga_keagamaan', compact('rtlembaga_keagamaan','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rtlembaga_keagamaan  $rtlembaga_keagamaan
     * @return \Illuminate\Http\Response
     */
    public function edit(rtlembaga_keagamaan $rtlembaga_keagamaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatertlembaga_keagamaanRequest  $request
     * @param  \App\Models\rtlembaga_keagamaan  $rtlembaga_keagamaan
     * @return \Illuminate\Http\Response
     */
    public function update(Updatertlembaga_keagamaanRequest $request, rtlembaga_keagamaan $rtlembaga_keagamaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rtlembaga_keagamaan  $rtlembaga_keagamaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(rtlembaga_keagamaan $rtlembaga_keagamaan)
    {
        //
    }
}
