<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\aksestenagakerja;
use App\Http\Requests\StoreaksestenagakerjaRequest;
use App\Http\Requests\UpdateaksestenagakerjaRequest;

class AksestenagakerjaController extends Controller
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
        $akses_tenagakerja = aksestenagakerja::all();
        $akses_tenagakerjaProses = $akses_tenagakerja->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk

        $persentaseProses = ($akses_tenagakerjaProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.KK.aksestenagakerja', compact('akses_tenagakerja', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $akses_tenagakerja = aksestenagakerja::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.editaksestenagakerja', compact('akses_tenagakerja','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreaksestenagakerjaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreaksestenagakerjaRequest $request)
    {
        $akses_tenagakerja = aksestenagakerja::where('nik', $request->valNIK)->first();
        if ($akses_tenagakerja == NULL ) {
            $akses_tenagakerja = new aksestenagakerja();
        }
        $akses_tenagakerja->nik = $request->valNIK;      
        $akses_tenagakerja-> jaraktempuh_dr_spesialis = $request->valjaraktempuh_dr_spesialis;
        $akses_tenagakerja-> waktutempuh_dr_spesialis = $request->valwaktutempuh_dr_spesialis;
        $akses_tenagakerja-> kemudahan_dr_spesialis = $request->valkemudahan_dr_spesialis;
        $akses_tenagakerja-> jaraktempuh_dr_umum = $request->valjaraktempuh_dr_umum;
        $akses_tenagakerja-> waktutempuh_dr_umum = $request->valwaktutempuh_dr_umum;
        $akses_tenagakerja-> kemudahan_dr_umum = $request->valkemudahan_dr_umum;
        $akses_tenagakerja-> jaraktempuh_bidan = $request->valjaraktempuh_bidan;
        $akses_tenagakerja-> waktutempuh_bidan = $request->valwaktutempuh_bidan;
        $akses_tenagakerja-> kemudahan_bidan = $request->valkemudahan_bidan;
        $akses_tenagakerja-> jaraktempuh_tenagakes = $request->valjaraktempuh_tenagakes;
        $akses_tenagakerja-> waktutempuh_tenagakes = $request->valwaktutempuh_tenagakes;
        $akses_tenagakerja-> kemudahan_tenagakes = $request->valkemudahan_tenagakes;
        $akses_tenagakerja-> jaraktempuh_dukun = $request->valjaraktempuh_dukun;
        $akses_tenagakerja-> waktutempuh_dukun = $request->valwaktutempuh_dukun;
        $akses_tenagakerja-> kemudahan_dukun = $request->valkemudahan_dukun;

        $akses_tenagakerja->save();
        return redirect()->route('aksestenagakerja.show',['show'=> $request->valNIK ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\aksestenagakerja  $aksestenagakerja
     * @return \Illuminate\Http\Response
     */
    public function show(aksestenagakerja $aksestenagakerja, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $akses_tenagakerja = aksestenagakerja::where('nik',$nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.showaksestenagakerja', compact('akses_tenagakerja', 'datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\aksestenagakerja  $aksestenagakerja
     * @return \Illuminate\Http\Response
     */
    public function edit(aksestenagakerja $aksestenagakerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateaksestenagakerjaRequest  $request
     * @param  \App\Models\aksestenagakerja  $aksestenagakerja
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateaksestenagakerjaRequest $request, aksestenagakerja $aksestenagakerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\aksestenagakerja  $aksestenagakerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(aksestenagakerja $aksestenagakerja)
    {
        //
    }
}
