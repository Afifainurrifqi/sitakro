<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use App\Models\datakesehatan;
use Illuminate\Http\Request;
use App\Http\Requests\StoredatakesehatanRequest;
use App\Http\Requests\UpdatedatakesehatanRequest;

class DatakesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $datapenduduk = Datapenduduk::whereIn('datak', ['Tetap', 'Tidaktetap']);
    
        if ($search) {
            $datapenduduk->where('nik', 'like', '%' . $search . '%');
        }
    
        $datapenduduk = $datapenduduk->paginate(100);
        $datakesehatan = datakesehatan::all();
        $datakesehatanSudahProses = $datakesehatan->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk

        
        if ($datapendudukTotal != 0) {
            $persentaseProses = ($datakesehatanSudahProses / $datapendudukTotal) * 100;
        } else {
            $persentaseProses = 0; // or handle it in a way that makes sense for your application
        }
        // dd($datapenduduk);
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.individu.datakesehatan', compact('persentaseProses','datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = Datapenduduk::where('nik', $nik)->first();
        $datakesehatan = datakesehatan::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        
        return view('sdgs.individu.editkesehatan', compact('datap', 'datakesehatan', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredatakesehatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredatakesehatanRequest $request)
    {

        
        $datakesehatan = datakesehatan::where('nik', $request->valNIK)->first();
        if ($datakesehatan == NULL ) {
            $datakesehatan = new datakesehatan();
        }
        $datakesehatan->nik = $request->valNIK;
        $datakesehatan->penyakitsetahun = implode(",", $request->valpenyakitsetahun);
        $datakesehatan->rumah_sakit = $request->valrumah_sakit;
        $datakesehatan->rumah_sakitb = $request->valrumah_sakitb;
        $datakesehatan->puskesmas_denganri = $request->valpuskesmas_denganri;
        $datakesehatan->puskesmas_tanpari = $request-> valpuskesmas_tanpari;
        $datakesehatan->puskemas_pembantu = $request->valpuskemas_pembantu;
        $datakesehatan->poliklinik = $request->valpoliklinik;
        $datakesehatan->tempat_praktekdr = $request->valtempat_praktekdr;
        $datakesehatan->rumah_bersalin = $request->valrumah_bersalin;
        $datakesehatan->tempat_praktek = $request->valtempat_praktek;
        $datakesehatan->poskesdes = $request->valposkesdes;
        $datakesehatan->polindes = $request->valpolindes;
        $datakesehatan->apotik = $request->valapotik;
        $datakesehatan->toko_obat = $request->valtoko_obat;
        $datakesehatan->posyandu = $request->valposyandu;
        $datakesehatan->posbindu = $request->valposbindu;
        $datakesehatan->tempat_praktikdb = $request->valtempat_praktikdb;
        $datakesehatan->jamkes = $request->valjamkes;
        $datakesehatan->bayiu16 = $request->valbayiu16;

        $datakesehatan->save();

        return redirect()->route('kesehatan.show',['show'=> $request->valNIK ]);

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\datakesehatan  $datakesehatan
     * @return \Illuminate\Http\Response
     */
    public function show(datakesehatan $datakesehatan, $nik)
    {
        $datap = Datapenduduk::where('nik',$nik)->first();
        $datakesehatan = datakesehatan::where('nik', $nik)->first();
        $agama = Agama::all(); 
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.individu.viewkesehatan',compact('datap', 'datakesehatan', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\datakesehatan  $datakesehatan
     * @return \Illuminate\Http\Response
     */
    public function edit(datakesehatan $datakesehatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedatakesehatanRequest  $request
     * @param  \App\Models\datakesehatan  $datakesehatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedatakesehatanRequest $request, datakesehatan $datakesehatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\datakesehatan  $datakesehatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(datakesehatan $datakesehatan)
    {
        //
    }
}
