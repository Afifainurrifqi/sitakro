<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rt_fasilitas_ekonomi;
use App\Http\Requests\Storert_fasilitas_ekonomiRequest;
use App\Http\Requests\Updatert_fasilitas_ekonomiRequest;
use App\Models\Datart;
use Yajra\DataTables\DataTables;

class RtFasilitasEkonomiController extends Controller
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
        $dataTerisi = rt_fasilitas_ekonomi::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;
        return view('sdgs.RT.rt_fasilitas_ekonomi', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = rt_fasilitas_ekonomi::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;
        return view('sdgs.RT.admin_rt_fasilitas_ekonomi', compact('presentase'));
    }

    public function json(Request $request)
    {
        $query = Datart::query(); // Query the data_rt model

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
                return '<td>
                            <a href="' . route('rt_fasilitas_ekonomi.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rt_fasilitas_ekonomi.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>
                        </td>';
            })

            ->addColumn('kredit_usaha_rakyat', function ($row) {
                $kreditUsahaRakyat = rt_fasilitas_ekonomi::where('your_column', $row->your_column_related_to_kredit_usaha_rakyat)->first();
                $value = $kreditUsahaRakyat ? $kreditUsahaRakyat->kredit_usaha_rakyat : '';

                return $value;
            })
            ->addColumn('kredit_ketahanan_pangan_energi', function ($row) {
                $kreditKetahananPanganEnergi = rt_fasilitas_ekonomi::where('your_column', $row->your_column_related_to_kredit_ketahanan_pangan_energi)->first();
                $value = $kreditKetahananPanganEnergi ? $kreditKetahananPanganEnergi->kredit_ketahanan_pangan_energi : '';

                return $value;
            })
            ->addColumn('kredit_usaha_kecil', function ($row) {
                $kreditUsahaKecil = rt_fasilitas_ekonomi::where('your_column', $row->your_column_related_to_kredit_usaha_kecil)->first();
                $value = $kreditUsahaKecil ? $kreditUsahaKecil->kredit_usaha_kecil : '';

                return $value;
            })
            ->addColumn('kelompok_usaha_bersama', function ($row) {
                $kelompokUsahaBersama = rt_fasilitas_ekonomi::where('your_column', $row->your_column_related_to_kelompok_usaha_bersama)->first();
                $value = $kelompokUsahaBersama ? $kelompokUsahaBersama->kelompok_usaha_bersama : '';

                return $value;
            })


            ->rawColumns([
                'action',


            ])
            ->toJson();
    }



    public function jsonadmin(Request $request)
    {
        $query = Datart::query(); // Query the data_rt model

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('rt_fasilitas_ekonomi.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rt_fasilitas_ekonomi.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>
                        </td>';
            })

            ->addColumn('kredit_usaha_rakyat', function ($row) {
                $kreditUsahaRakyat = rt_fasilitas_ekonomi::where('your_column', $row->your_column_related_to_kredit_usaha_rakyat)->first();
                $value = $kreditUsahaRakyat ? $kreditUsahaRakyat->kredit_usaha_rakyat : '';

                return $value;
            })
            ->addColumn('kredit_ketahanan_pangan_energi', function ($row) {
                $kreditKetahananPanganEnergi = rt_fasilitas_ekonomi::where('your_column', $row->your_column_related_to_kredit_ketahanan_pangan_energi)->first();
                $value = $kreditKetahananPanganEnergi ? $kreditKetahananPanganEnergi->kredit_ketahanan_pangan_energi : '';

                return $value;
            })
            ->addColumn('kredit_usaha_kecil', function ($row) {
                $kreditUsahaKecil = rt_fasilitas_ekonomi::where('your_column', $row->your_column_related_to_kredit_usaha_kecil)->first();
                $value = $kreditUsahaKecil ? $kreditUsahaKecil->kredit_usaha_kecil : '';

                return $value;
            })
            ->addColumn('kelompok_usaha_bersama', function ($row) {
                $kelompokUsahaBersama = rt_fasilitas_ekonomi::where('your_column', $row->your_column_related_to_kelompok_usaha_bersama)->first();
                $value = $kelompokUsahaBersama ? $kelompokUsahaBersama->kelompok_usaha_bersama : '';

                return $value;
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
        $rt_fasilitas_ekonomi = rt_fasilitas_ekonomi::where('nik', $nik)->first();

        return view('sdgs.RT.editrt_fasilitas_ekonomi', compact('rt_fasilitas_ekonomi', 'datart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_fasilitas_ekonomiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_fasilitas_ekonomiRequest $request)
    {
        $rt_fasilitas_ekonomi = rt_fasilitas_ekonomi::where('nik', $request->valnik)->first();
        if ($rt_fasilitas_ekonomi == NULL) {
            $rt_fasilitas_ekonomi = new rt_fasilitas_ekonomi();
        }
        $rt_fasilitas_ekonomi->nik = $request->valnik;
        $rt_fasilitas_ekonomi->nama_ketuart = $request->valnama_ketuart;
        $rt_fasilitas_ekonomi->alamat = $request->valalamat;
        $rt_fasilitas_ekonomi->rt = $request->valrt;
        $rt_fasilitas_ekonomi->rw = $request->valrw;
        $rt_fasilitas_ekonomi->nohp = $request->valnohp;
        $rt_fasilitas_ekonomi->kredit_usaha = $request->valkredit_usaha;
        $rt_fasilitas_ekonomi->kredit_ketahanan = $request->valkredit_ketahanan;
        $rt_fasilitas_ekonomi->kredit_kecil = $request->valkredit_kecil;
        $rt_fasilitas_ekonomi->kelompok_usaha = $request->valkelompok_usaha;


        $rt_fasilitas_ekonomi->save();
        return redirect()->route('rt_fasilitas_ekonomi.show', ['show' => $request->valnik]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_fasilitas_ekonomi  $rt_fasilitas_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function show(rt_fasilitas_ekonomi $rt_fasilitas_ekonomi, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        $rt_fasilitas_ekonomi = rt_fasilitas_ekonomi::where('nik', $nik)->first();

        return view('sdgs.RT.showrt_fasilitas_ekonomi', compact('rt_fasilitas_ekonomi', 'datart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rt_fasilitas_ekonomi  $rt_fasilitas_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function edit(rt_fasilitas_ekonomi $rt_fasilitas_ekonomi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatert_fasilitas_ekonomiRequest  $request
     * @param  \App\Models\rt_fasilitas_ekonomi  $rt_fasilitas_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function update(Updatert_fasilitas_ekonomiRequest $request, rt_fasilitas_ekonomi $rt_fasilitas_ekonomi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rt_fasilitas_ekonomi  $rt_fasilitas_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function destroy(rt_fasilitas_ekonomi $rt_fasilitas_ekonomi)
    {
        //
    }
}
