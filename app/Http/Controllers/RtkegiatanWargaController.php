<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rtkegiatan_warga;
use App\Http\Requests\Storertkegiatan_wargaRequest;
use App\Http\Requests\Updatertkegiatan_wargaRequest;
use App\Models\Datart;
use Yajra\DataTables\Facades\DataTables;

class RtkegiatanWargaController extends Controller
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
        $dataTerisi = rtkegiatan_warga::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;


        return view('sdgs.RT.rt_kegiatanwarga', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = rtkegiatan_warga::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.admin_rt_kegiatanwarga', compact('presentase'));
    }

    public function jsonadmin(Request $request)
    {
        $query = Datart::query();

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '<a href="' . route('rt_kegiatanwarga.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="' . route('rt_kegiatanwarga.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="View Data">
                            <i class="fas fa-book"></i>
                        </a>';
            })

            ->addColumn('jumlah_kpp', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->jumlah_kpp : '';
            })
            ->addColumn('jumlah_ppr', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->jumlah_ppr : '';
            })
            ->addColumn('jumlah_hansip', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->jumlah_hansip : '';
            })
            ->addColumn('pelaporan_tamu_lebih24', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->pelaporan_tamu_lebih24 : '';
            })
            ->addColumn('sistem_keamanan', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->sistem_keamanan : '';
            })
            ->addColumn('sistem_linmas', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->sistem_linmas : '';
            })
            ->addColumn('jumlahpos_digunakan', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->jumlahpos_digunakan : '';
            })
            ->addColumn('jumlahpos_tidakdigunakan', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->jumlahpos_tidakdigunakan : '';
            })
            ->addColumn('jarak_ppt', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->jarak_ppt : '';
            })
            ->addColumn('kemudahan_ppt', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->kemudahan_ppt : '';
            })
            ->addColumn('jarak_korban', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->jarak_korban : '';
            })
            ->addColumn('jarak_lokasikumpul', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->jarak_lokasikumpul : '';
            })
            ->addColumn('jarak_mangkal', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->jarak_mangkal : '';
            })
            ->addColumn('jarak_lokalisasi', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->jarak_lokalisasi : '';
            })
            ->rawColumns(['action'])
            ->toJson();
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
                return '<a href="' . route('rt_kegiatanwarga.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="' . route('rt_kegiatanwarga.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="View Data">
                            <i class="fas fa-book"></i>
                        </a>';
            })

            ->addColumn('jumlah_kpp', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->jumlah_kpp : '';
            })
            ->addColumn('jumlah_ppr', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->jumlah_ppr : '';
            })
            ->addColumn('jumlah_hansip', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->jumlah_hansip : '';
            })
            ->addColumn('pelaporan_tamu_lebih24', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->pelaporan_tamu_lebih24 : '';
            })
            ->addColumn('sistem_keamanan', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->sistem_keamanan : '';
            })
            ->addColumn('sistem_linmas', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->sistem_linmas : '';
            })
            ->addColumn('jumlahpos_digunakan', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->jumlahpos_digunakan : '';
            })
            ->addColumn('jumlahpos_tidakdigunakan', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->jumlahpos_tidakdigunakan : '';
            })
            ->addColumn('jarak_ppt', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->jarak_ppt : '';
            })
            ->addColumn('kemudahan_ppt', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->kemudahan_ppt : '';
            })
            ->addColumn('jarak_korban', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->jarak_korban : '';
            })
            ->addColumn('jarak_lokasikumpul', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->jarak_lokasikumpul : '';
            })
            ->addColumn('jarak_mangkal', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->jarak_mangkal : '';
            })
            ->addColumn('jarak_lokalisasi', function ($row) {
                $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $row->nik)->first();
                return $rt_kegiatanwarga ? $rt_kegiatanwarga->jarak_lokalisasi : '';
            })
            ->rawColumns(['action'])
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
        $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrt_kegiatanwarga', compact('rt_kegiatanwarga', 'datart', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storertkegiatan_wargaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storertkegiatan_wargaRequest $request)
    {
        $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $request->valNIK)->first();
        if ($rt_kegiatanwarga == NULL) {
            $rt_kegiatanwarga = new rtkegiatan_warga();
        }
        $rt_kegiatanwarga->nik = $request->valNIK;
        $rt_kegiatanwarga->jumlah_kpp = $request->valjumlah_kpp;
        $rt_kegiatanwarga->jumlah_ppr = $request->valjumlah_ppr;
        $rt_kegiatanwarga->jumlah_hansip = $request->valjumlah_hansip;
        $rt_kegiatanwarga->pelaporan_tamu_lebih24 = $request->valpelaporan_tamu_lebih24;
        $rt_kegiatanwarga->sistem_keamanan = $request->valsistem_keamanan;
        $rt_kegiatanwarga->sistem_linmas = $request->valsistem_linmas;
        $rt_kegiatanwarga->jumlahpos_digunakan = $request->valjumlahpos_digunakan;
        $rt_kegiatanwarga->jumlahpos_tidakdigunakan = $request->valjumlahpos_tidakdigunakan;
        $rt_kegiatanwarga->jarak_ppt = $request->valjarak_ppt;
        $rt_kegiatanwarga->kemudahan_ppt = $request->valkemudahan_ppt;
        $rt_kegiatanwarga->jarak_korban = $request->valjarak_korban;
        $rt_kegiatanwarga->jarak_lokasikumpul = $request->valjarak_lokasikumpul;
        $rt_kegiatanwarga->jarak_mangkal = $request->valjarak_mangkal;
        $rt_kegiatanwarga->jarak_lokalisasi = $request->valjarak_lokalisasi;

        $rt_kegiatanwarga->save();
        return redirect()->route('rt_kegiatanwarga.show', ['show' => $request->valNIK]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rtkegiatan_warga  $rtkegiatan_warga
     * @return \Illuminate\Http\Response
     */
    public function show(rtkegiatan_warga $rtkegiatan_warga, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        $rt_kegiatanwarga = rtkegiatan_warga::where('nik', $nik)->first();
        $agama   = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrt_kegiatanwarga', compact('rt_kegiatanwarga', 'datart', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rtkegiatan_warga  $rtkegiatan_warga
     * @return \Illuminate\Http\Response
     */
    public function edit(rtkegiatan_warga $rtkegiatan_warga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatertkegiatan_wargaRequest  $request
     * @param  \App\Models\rtkegiatan_warga  $rtkegiatan_warga
     * @return \Illuminate\Http\Response
     */
    public function update(Updatertkegiatan_wargaRequest $request, rtkegiatan_warga $rtkegiatan_warga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rtkegiatan_warga  $rtkegiatan_warga
     * @return \Illuminate\Http\Response
     */
    public function destroy(rtkegiatan_warga $rtkegiatan_warga)
    {
        //
    }
}
