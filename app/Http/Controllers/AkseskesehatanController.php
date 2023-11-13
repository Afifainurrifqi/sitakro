<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\akseskesehatan;
use App\Http\Requests\StoreakseskesehatanRequest;
use App\Http\Requests\UpdateakseskesehatanRequest;

class AkseskesehatanController extends Controller
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
        $akses_kesehatan = akseskesehatan::all();
        $akses_kesehatanSudahProses = $akses_kesehatan->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk

        $persentaseProses = ($akses_kesehatanSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.KK.akseskesehatan', compact('akses_kesehatan', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $akses_kesehatan = akseskesehatan::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.editakseskesehatan', compact('akses_kesehatan','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreakseskesehatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreakseskesehatanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\akseskesehatan  $akseskesehatan
     * @return \Illuminate\Http\Response
     */
    public function show(akseskesehatan $akseskesehatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\akseskesehatan  $akseskesehatan
     * @return \Illuminate\Http\Response
     */
    public function edit(akseskesehatan $akseskesehatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateakseskesehatanRequest  $request
     * @param  \App\Models\akseskesehatan  $akseskesehatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateakseskesehatanRequest $request, akseskesehatan $akseskesehatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\akseskesehatan  $akseskesehatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(akseskesehatan $akseskesehatan)
    {
        //
    }
}
