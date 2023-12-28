<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\lembaga_masyarakat;
use App\Http\Requests\Storelembaga_masyarakatRequest;
use App\Http\Requests\Updatelembaga_masyarakatRequest;

class LembagaMasyarakatController extends Controller
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
        $rtlembaga_masyarakat = lembaga_masyarakat::all();
        $rtlembaga_masyarakatSudahProses = $rtlembaga_masyarakat->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk
        $persentaseProses = ($rtlembaga_masyarakatSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.RT.rtlembaga_masyarakat', compact('rtlembaga_masyarakat', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rtlembaga_masyarakat = lembaga_masyarakat::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrtlembaga_masyarakat', compact('rtlembaga_masyarakat','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storelembaga_masyarakatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storelembaga_masyarakatRequest $request)
    {
        $rtlembaga_masyarakat = lembaga_masyarakat::where('nik', $request->valNIK)->first();
        if ($rtlembaga_masyarakat == NULL ) {
            $rtlembaga_masyarakat = new lembaga_masyarakat();
        }
        $rtlembaga_masyarakat->nik = $request->valNIK;      
        $rtlembaga_masyarakat->nama = $request->valnama;
        $rtlembaga_masyarakat->jumlah_kel = $request->valjumlah_kel;
        $rtlembaga_masyarakat->jumlah_peng = $request->valjumlah_peng;
        $rtlembaga_masyarakat->jumlah_ang = $request->valjumlah_ang;
        $rtlembaga_masyarakat->fasilitas = $request->valfasilitas;
        $rtlembaga_masyarakat->save();
        return redirect()->route('rtlembaga_masyarakat.show',['show'=> $request->valNIK ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lembaga_masyarakat  $lembaga_masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(lembaga_masyarakat $lembaga_masyarakat, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rtlembaga_masyarakat = lembaga_masyarakat::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrtlembaga_masyarakat', compact('rtlembaga_masyarakat','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lembaga_masyarakat  $lembaga_masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(lembaga_masyarakat $lembaga_masyarakat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatelembaga_masyarakatRequest  $request
     * @param  \App\Models\lembaga_masyarakat  $lembaga_masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Updatelembaga_masyarakatRequest $request, lembaga_masyarakat $lembaga_masyarakat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lembaga_masyarakat  $lembaga_masyarakat
     * @return \Illuminate\Http\Response
     */
    public function destroy(lembaga_masyarakat $lembaga_masyarakat)
    {
        //
    }
}
