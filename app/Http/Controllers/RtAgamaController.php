<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rt_agama;
use App\Http\Requests\Storert_agamaRequest;
use App\Http\Requests\Updatert_agamaRequest;
use App\Models\Datart;
use Yajra\DataTables\DataTables;

class RtAgamaController extends Controller
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
        $dataTerisi = rt_agama::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.rt_agama', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = rt_agama::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;
        return view('sdgs.RT.admin_rt_agama', compact('presentase'));
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
                            <a href="' . route('rt_agama.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rt_agama.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>

                        </td>';
            })

            ->addColumn('jumlahwarga_jamkes', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahwarga_jamkes : '';
            })
            ->addColumn('jumlahwarga_jamketerangan', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahwarga_jamketerangan : '';
            })
            ->addColumn('jumlahtempat_masjid', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_masjid : '';
            })
            ->addColumn('jumlahtempat_musholla', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_musholla : '';
            })
            ->addColumn('jumlahtempat_kristen', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_kristen : '';
            })
            ->addColumn('jumlahtempat_katolik', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_katolik : '';
            })
            ->addColumn('jumlahtempat_kapel', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_kapel : '';
            })
            ->addColumn('jumlahtempat_pura', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_pura : '';
            })
            ->addColumn('jumlahtempat_wihara', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_wihara : '';
            })
            ->addColumn('jumlahtempat_kelenteng', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_kelenteng : '';
            })
            ->addColumn('jumlahtempat_lainnya', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_lainnya : '';
            })
            ->addColumn('cagar_bud1', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->cagar_bud1 : '';
            })
            ->addColumn('cagar_bud2', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->cagar_bud2 : '';
            })
            ->addColumn('cagar_bud3', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->cagar_bud3 : '';
            })
            ->addColumn('sukuasing_keluarga', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->sukuasing_keluarga : '';
            })
            ->addColumn('sukuasing_jiwa', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->sukuasing_jiwa : '';
            })
            ->addColumn('ruangpublik_terbuka', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->ruangpublik_terbuka : '';
            })
            ->addColumn('adat_kehamilan', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_kehamilan : '';
            })
            ->addColumn('adat_kelahiran', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_kelahiran : '';
            })
            ->addColumn('adat_pekerjaan', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_pekerjaan : '';
            })
            ->addColumn('adat_alam', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_alam : '';
            })
            ->addColumn('adat_perkawinan', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_perkawinan : '';
            })
            ->addColumn('adat_kehidupanwarga', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_kehidupanwarga : '';
            })
            ->addColumn('adat_kematian', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_kematian : '';
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
                            <a href="' . route('rt_agama.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rt_agama.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>

                        </td>';
            })

            ->addColumn('jumlahwarga_jamkes', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahwarga_jamkes : '';
            })
            ->addColumn('jumlahwarga_jamketerangan', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahwarga_jamketerangan : '';
            })
            ->addColumn('jumlahtempat_masjid', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_masjid : '';
            })
            ->addColumn('jumlahtempat_musholla', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_musholla : '';
            })
            ->addColumn('jumlahtempat_kristen', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_kristen : '';
            })
            ->addColumn('jumlahtempat_katolik', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_katolik : '';
            })
            ->addColumn('jumlahtempat_kapel', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_kapel : '';
            })
            ->addColumn('jumlahtempat_pura', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_pura : '';
            })
            ->addColumn('jumlahtempat_wihara', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_wihara : '';
            })
            ->addColumn('jumlahtempat_kelenteng', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_kelenteng : '';
            })
            ->addColumn('jumlahtempat_lainnya', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_lainnya : '';
            })
            ->addColumn('cagar_bud1', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->cagar_bud1 : '';
            })
            ->addColumn('cagar_bud2', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->cagar_bud2 : '';
            })
            ->addColumn('cagar_bud3', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->cagar_bud3 : '';
            })
            ->addColumn('sukuasing_keluarga', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->sukuasing_keluarga : '';
            })
            ->addColumn('sukuasing_jiwa', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->sukuasing_jiwa : '';
            })
            ->addColumn('ruangpublik_terbuka', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->ruangpublik_terbuka : '';
            })
            ->addColumn('adat_kehamilan', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_kehamilan : '';
            })
            ->addColumn('adat_kelahiran', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_kelahiran : '';
            })
            ->addColumn('adat_pekerjaan', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_pekerjaan : '';
            })
            ->addColumn('adat_alam', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_alam : '';
            })
            ->addColumn('adat_perkawinan', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_perkawinan : '';
            })
            ->addColumn('adat_kehidupanwarga', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_kehidupanwarga : '';
            })
            ->addColumn('adat_kematian', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_kematian : '';
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
        $rt_agama = rt_agama::where('nik', $nik)->first();


        return view('sdgs.RT.editrt_agama', compact('rt_agama', 'datart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_agamaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_agamaRequest $request)
    {
        $rt_agama = rt_agama::where('nik', $request->valnik)->first();
        if ($rt_agama == NULL) {
            $rt_agama = new rt_agama();
        }
        $rt_agama->nik = $request->valnik;
        $rt_agama->nama_ketuart = $request->valnama_ketuart;
        $rt_agama->alamat = $request->valalamat;
        $rt_agama->rt = $request->valrt;
        $rt_agama->rw = $request->valrw;
        $rt_agama->nohp = $request->valnohp;
        $rt_agama->jumlahwarga_jamkes = $request->valjumlahwarga_jamkes;
        $rt_agama->jumlahwarga_jamketerangan = $request->valjumlahwarga_jamketerangan;
        $rt_agama->jumlahtempat_masjid = $request->valjumlahtempat_masjid;
        $rt_agama->jumlahtempat_musholla = $request->valjumlahtempat_musholla;
        $rt_agama->jumlahtempat_kristen = $request->valjumlahtempat_kristen;
        $rt_agama->jumlahtempat_katolik = $request->valjumlahtempat_katolik;
        $rt_agama->jumlahtempat_kapel = $request->valjumlahtempat_kapel;
        $rt_agama->jumlahtempat_pura = $request->valjumlahtempat_pura;
        $rt_agama->jumlahtempat_wihara = $request->valjumlahtempat_wihara;
        $rt_agama->jumlahtempat_kelenteng = $request->valjumlahtempat_kelenteng;
        $rt_agama->jumlahtempat_lainnya = $request->valjumlahtempat_lainnya;
        $rt_agama->cagar_bud1 = $request->valcagar_bud1;
        $rt_agama->cagar_bud2 = $request->valcagar_bud2;
        $rt_agama->cagar_bud3 = $request->valcagar_bud3;
        $rt_agama->sukuasing_keluarga = $request->valsukuasing_keluarga;
        $rt_agama->sukuasing_jiwa = $request->valsukuasing_jiwa;
        $rt_agama->ruangpublik_terbuka = $request->valruangpublik_terbuka;
        $rt_agama->adat_kehamilan = $request->valadat_kehamilan;
        $rt_agama->adat_kelahiran = $request->valadat_kelahiran;
        $rt_agama->adat_pekerjaan = $request->valadat_pekerjaan;
        $rt_agama->adat_alam = $request->valadat_alam;
        $rt_agama->adat_perkawinan = $request->valadat_perkawinan;
        $rt_agama->adat_kehidupanwarga = $request->valadat_kehidupanwarga;
        $rt_agama->adat_kematian = $request->valadat_kematian;

        $rt_agama->save();
        return redirect()->route('rt_agama.show', ['show' => $request->valnik]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_agama  $rt_agama
     * @return \Illuminate\Http\Response
     */
    public function show(rt_agama $rt_agama, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        $rt_agama = rt_agama::where('nik', $nik)->first();

        return view('sdgs.RT.showrt_agama', compact('rt_agama', 'datart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rt_agama  $rt_agama
     * @return \Illuminate\Http\Response
     */
    public function edit(rt_agama $rt_agama)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatert_agamaRequest  $request
     * @param  \App\Models\rt_agama  $rt_agama
     * @return \Illuminate\Http\Response
     */
    public function update(Updatert_agamaRequest $request, rt_agama $rt_agama)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rt_agama  $rt_agama
     * @return \Illuminate\Http\Response
     */
    public function destroy(rt_agama $rt_agama)
    {
        //
    }
}
