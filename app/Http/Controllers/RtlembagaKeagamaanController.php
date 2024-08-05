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
use App\Models\Datart;
use Yajra\DataTables\DataTables;

class RtlembagaKeagamaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = rtlembaga_keagamaan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.rtlembaga_keagamaan', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = rtlembaga_keagamaan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;
        return view('sdgs.RT.adminrtlembaga_keagamaan', compact('presentase'));
    }

    public function json(Request $request)
    {
        $query = Datart::query();

        if ($request->has('nik')) {
            $nik = $request->input('nik');
            $query = Datart::with([])
                ->where('nik', $nik);
        } else {
            // Jika tidak ada parameter NIK, kembalikan data kosong
            $query = Datart::whereNull('nik'); // Tidak mengembalikan data
        }

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '
                <a href="' . route('rtlembaga_keagamaan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="' . route('rtlembaga_keagamaan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                    <i class="fas fa-book"></i>
                ';
            })

            ->addColumn('namalembaga', function ($row) {
                $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $row->nik)->first();
                return $rtlembaga_keagamaan ? $rtlembaga_keagamaan->nama : '';
            })
            ->addColumn('jumlah_peng', function ($row) {
                $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $row->nik)->first();
                return $rtlembaga_keagamaan ? $rtlembaga_keagamaan->jumlah_peng : '';
            })
            ->addColumn('jumlah_ang', function ($row) {
                $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $row->nik)->first();
                return $rtlembaga_keagamaan ? $rtlembaga_keagamaan->jumlah_ang : '';
            })
            ->addColumn('fasilitas', function ($row) {
                $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $row->nik)->first();
                return $rtlembaga_keagamaan ? $rtlembaga_keagamaan->fasilitas : '';
            })


            ->rawColumns([
                'action',


            ])
            ->toJson();
    }

    public function jsonadmin(Request $request)
    {
        $query = Datart::query();

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '
                <a href="' . route('rtlembaga_keagamaan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="' . route('rtlembaga_keagamaan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                    <i class="fas fa-book"></i>
                ';
            })

            ->addColumn('namalembaga', function ($row) {
                $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $row->nik)->first();
                return $rtlembaga_keagamaan ? $rtlembaga_keagamaan->nama : '';
            })
            ->addColumn('jumlah_peng', function ($row) {
                $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $row->nik)->first();
                return $rtlembaga_keagamaan ? $rtlembaga_keagamaan->jumlah_peng : '';
            })
            ->addColumn('jumlah_ang', function ($row) {
                $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $row->nik)->first();
                return $rtlembaga_keagamaan ? $rtlembaga_keagamaan->jumlah_ang : '';
            })
            ->addColumn('fasilitas', function ($row) {
                $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $row->nik)->first();
                return $rtlembaga_keagamaan ? $rtlembaga_keagamaan->fasilitas : '';
            })


            ->rawColumns([
                'action',


            ])
            ->toJson();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $nik)->first();

        return view('sdgs.RT.editrtlembaga_keagamaan', compact('rtlembaga_keagamaan', 'datart'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storertlembaga_keagamaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storertlembaga_keagamaanRequest $request)
    {
        $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $request->valnik)->first();
        if ($rtlembaga_keagamaan == NULL) {
            $rtlembaga_keagamaan = new rtlembaga_keagamaan();
        }
        $rtlembaga_keagamaan->nik = $request->valnik;
        $rtlembaga_keagamaan->nama_ketuart = $request->valnama_ketuart;
        $rtlembaga_keagamaan->alamat = $request->valalamat;
        $rtlembaga_keagamaan->rt = $request->valrt;
        $rtlembaga_keagamaan->rw = $request->valrw;
        $rtlembaga_keagamaan->nohp = $request->valnohp;
        $rtlembaga_keagamaan->nama = $request->valnama;
        $rtlembaga_keagamaan->jumlah_peng = $request->valjumlah_peng;
        $rtlembaga_keagamaan->jumlah_ang = $request->valjumlah_ang;
        $rtlembaga_keagamaan->fasilitas = $request->valfasilitas;
        $rtlembaga_keagamaan->save();
        return redirect()->route('rtlembaga_keagamaan.show', ['show' => $request->valnik]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rtlembaga_keagamaan  $rtlembaga_keagamaan
     * @return \Illuminate\Http\Response
     */
    public function show(rtlembaga_keagamaan $rtlembaga_keagamaan, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $nik)->first();

        return view('sdgs.RT.showrtlembaga_keagamaan', compact('rtlembaga_keagamaan', 'datart'));
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
