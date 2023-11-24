<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\aksessarpras;
use App\Http\Requests\StoreaksessarprasRequest;
use App\Http\Requests\UpdateaksessarprasRequest;

class AksessarprasController extends Controller
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
        $akses_sarpras = aksessarpras::all();
        $akses_sarprasSudahProses = $akses_sarpras->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk

        $persentaseProses = ($akses_sarprasSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.KK.aksessarpras', compact('akses_sarpras', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $akses_sarpras = aksessarpras::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.editaksespras', compact('akses_sarpras','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreaksessarprasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreaksessarprasRequest $request)
    {
        $akses_sarpras = aksessarpras::where('nik', $request->valNIK)->first();
        if ($akses_sarpras == NULL ) {
            $akses_sarpras = new aksessarpras();
        }
        $akses_sarpras->nik = $request->valNIK;   
        $akses_sarpras->jenistrasport_lokasipu = $request-> valjenistrasport_lokasipu;
        $akses_sarpras->pengtransportumum_lokasipu = $request-> valpengtransportumum_lokasipu;
        $akses_sarpras->waktutempuh_lokasipu = $request-> valwaktutempuh_lokasipu;
        $akses_sarpras->biaya_lokasipu = $request-> valbiaya_lokasipu;
        $akses_sarpras->kemudahan_lokasipu = $request-> valkemudahan_lokasipu;
        $akses_sarpras->jenistrasport_lahanpertanian = $request-> valjenistrasport_lahanpertanian;
        $akses_sarpras->pengtransportumum_lahanpertanian = $request-> valpengtransportumum_lahanpertanian;
        $akses_sarpras->waktutempuh_lahanpertanian = $request-> valwaktutempuh_lahanpertanian;
        $akses_sarpras->biaya_lahanpertanian = $request-> valbiaya_lahanpertanian;
        $akses_sarpras->kemudahan_lahanpertanian = $request-> valkemudahan_lahanpertanian;
        $akses_sarpras->jenistrasport_sekolah = $request-> valjenistrasport_sekolah;
        $akses_sarpras->pengtransportumum_sekolah = $request-> valpengtransportumum_sekolah;
        $akses_sarpras->waktutempuh_sekolah = $request-> valwaktutempuh_sekolah;
        $akses_sarpras->biaya_sekolah = $request-> valbiaya_sekolah;
        $akses_sarpras->kemudahan_sekolah = $request-> valkemudahan_sekolah;
        $akses_sarpras->jenistrasport_berobat = $request-> valjenistrasport_berobat;
        $akses_sarpras->pengtransportumum_berobat = $request-> valpengtransportumum_berobat;
        $akses_sarpras->waktutempuh_berobat = $request-> valwaktutempuh_berobat;
        $akses_sarpras->biaya_berobat = $request-> valbiaya_berobat;
        $akses_sarpras->kemudahan_berobat = $request-> valkemudahan_berobat;
        $akses_sarpras->jenistrasport_beribadah = $request-> valjenistrasport_beribadah;
        $akses_sarpras->pengtransportumum_beribadah = $request-> valpengtransportumum_beribadah;
        $akses_sarpras->waktutempuh_beribadah = $request-> valwaktutempuh_beribadah;
        $akses_sarpras->biaya_beribadah = $request-> valbiaya_beribadah;
        $akses_sarpras->kemudahan_beribadah = $request-> valkemudahan_beribadah;
        $akses_sarpras->jenistrasport_rekreasi = $request-> valjenistrasport_rekreasi;
        $akses_sarpras->pengtransportumum_rekreasi = $request-> valpengtransportumum_rekreasi;
        $akses_sarpras->waktutempuh_rekreasi = $request-> valwaktutempuh_rekreasi;
        $akses_sarpras->biaya_rekreasi = $request-> valbiaya_rekreasi;
        $akses_sarpras->kemudahan_rekreasi = $request-> valkemudahan_rekreasi;

        $akses_sarpras->save();
        return redirect()->route('aksessarpras.show',['show'=> $request->valNIK ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\aksessarpras  $aksessarpras
     * @return \Illuminate\Http\Response
     */
    public function show(aksessarpras $aksessarpras, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $akses_sarpras = aksessarpras::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.showaksessarpras', compact('akses_sarpras','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\aksessarpras  $aksessarpras
     * @return \Illuminate\Http\Response
     */
    public function edit(aksessarpras $aksessarpras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateaksessarprasRequest  $request
     * @param  \App\Models\aksessarpras  $aksessarpras
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateaksessarprasRequest $request, aksessarpras $aksessarpras)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\aksessarpras  $aksessarpras
     * @return \Illuminate\Http\Response
     */
    public function destroy(aksessarpras $aksessarpras)
    {
        //
    }
}
