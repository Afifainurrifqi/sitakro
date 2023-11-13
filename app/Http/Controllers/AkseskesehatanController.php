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
        $akses_kesehatan = akseskesehatan::where('nik', $request->valNIK)->first();
        if ($akses_kesehatan == NULL ) {
            $akses_kesehatan = new akseskesehatan();
        }
        $akses_kesehatan->nik = $request->valNIK;      
        $akses_kesehatan-> jaraktempuh_rumahs = $request->valjaraktempuh_rumahs;
        $akses_kesehatan-> waktutempuh_rumahs = $request->valwaktutempuh_rumahs;
        $akses_kesehatan-> kemudahan_rumahs = $request->valkemudahan_rumahs;
        $akses_kesehatan-> jaraktempuh_rumahb = $request->valjaraktempuh_rumahb;
        $akses_kesehatan-> waktutempuh_rumahb = $request->valwaktutempuh_rumahb;
        $akses_kesehatan-> kemudahan_rumahb = $request->valkemudahan_rumahb;
        $akses_kesehatan-> jaraktempuh_poliklinik = $request->valjaraktempuh_poliklinik;
        $akses_kesehatan-> waktutempuh_poliklinik = $request->valwaktutempuh_poliklinik;
        $akses_kesehatan-> kemudahan_poliklinik = $request->valkemudahan_poliklinik;
        $akses_kesehatan-> jaraktempuh_puskesmas = $request->valjaraktempuh_puskesmas;
        $akses_kesehatan-> waktutempuh_puskesmas = $request->valwaktutempuh_puskesmas;
        $akses_kesehatan-> kemudahan_puskesmas = $request->valkemudahan_puskesmas;
        $akses_kesehatan-> jaraktempuh_poskedes = $request->valjaraktempuh_poskedes;
        $akses_kesehatan-> waktutempuh_poskedes = $request->valwaktutempuh_poskedes;
        $akses_kesehatan-> kemudahan_poskedes = $request->valkemudahan_poskedes;
        $akses_kesehatan-> jaraktempuh_posyandu = $request->valjaraktempuh_posyandu;
        $akses_kesehatan-> waktutempuh_posyandu = $request->valwaktutempuh_posyandu;
        $akses_kesehatan-> kemudahan_posyandu = $request->valkemudahan_posyandu;
        $akses_kesehatan-> jaraktempuh_apotik = $request->valjaraktempuh_apotik;
        $akses_kesehatan-> waktutempuh_apotik = $request->valwaktutempuh_apotik;
        $akses_kesehatan-> kemudahan_apotik = $request->valkemudahan_apotik;
        $akses_kesehatan-> jaraktempuh_toko_obat = $request->valjaraktempuh_toko_obat;
        $akses_kesehatan-> waktutempuh_toko_obat = $request->valwaktutempuh_toko_obat;
        $akses_kesehatan-> kemudahan_toko_obat = $request->valkemudahan_toko_obat;

        $akses_kesehatan->save();
        return redirect()->route('akseskesehatan.show',['show'=> $request->valNIK ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\akseskesehatan  $akseskesehatan
     * @return \Illuminate\Http\Response
     */
    public function show(akseskesehatan $akseskesehatan, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $akses_kesehatan = akseskesehatan::where('nik',$nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.showakseskesehatan', compact('akses_kesehatan', 'datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
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
