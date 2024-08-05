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
use Yajra\DataTables\DataTables;

class DatakesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $totalPenduduk = datapenduduk::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = datakesehatan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        // Ambil data lainnya untuk ditampilkan di view
        $datakesehatan = datakesehatan::all();
        $kesehatanLabels = $datakesehatan->pluck('kesehatan_utama')->toArray();
        $kesehatanCounts = $datakesehatan->countBy('kesehatan_utama')->values()->toArray();

        return view('sdgs.individu.datakesehatan', compact('datakesehatan', 'kesehatanLabels', 'kesehatanCounts', 'presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalPenduduk = datapenduduk::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = datakesehatan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        // Ambil data lainnya untuk ditampilkan di view
        $datakesehatan = datakesehatan::all();
        $kesehatanLabels = $datakesehatan->pluck('kesehatan_utama')->toArray();
        $kesehatanCounts = $datakesehatan->countBy('kesehatan_utama')->values()->toArray();
        return view('sdgs.individu.admin_data_kesehatan', compact('datakesehatan', 'kesehatanLabels', 'kesehatanCounts', 'presentase'));
    }

    public function jsonadmin(Request $request)
    {
        $allowedDatakValues = ['tetap', 'tidaktetap'];

        $query = Datapenduduk::with(['kk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'detailkk.kk'])
            ->whereIn('Datak', $allowedDatakValues);

        return DataTables::of($query)

            ->addColumn('nokk', function ($row) {
                return $row->detailkk->kk->nokk;
            })
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('kesehatan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('kesehatan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })

            ->addColumn('penyakit', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $penyakitsetahun = $datakesehatan ? explode(',', $datakesehatan->penyakitsetahun) : [];

                if (is_array($penyakitsetahun)) {
                    return implode(', ', $penyakitsetahun);
                } else {
                    return $penyakitsetahun;
                }
            })

            ->addColumn('rumahsakit', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $rumahsakit = $datakesehatan ? $datakesehatan->rumah_sakit : '';

                return '' . $rumahsakit . ' kali';
            })
            ->addColumn('rumahsakitb', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $rumahsakitb = $datakesehatan ? $datakesehatan->rumah_sakitb : '';

                return '' . $rumahsakitb . ' kali';
            })
            ->addColumn('pusekesmas_denganri', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $pusekesmas_denganri = $datakesehatan ? $datakesehatan->puskesmas_denganri : '';

                return '' . $pusekesmas_denganri . ' kali';
            })
            ->addColumn('pusekesmas_tanpari', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $pusekesmas_tanpari = $datakesehatan ? $datakesehatan->puskesmas_tanpari : '';

                return '' . $pusekesmas_tanpari . ' kali';
            })
            ->addColumn('puskesmas_pembantu', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $puskesmas_pembantu = $datakesehatan ? $datakesehatan->puskemas_pembantu : '';

                return '' . $puskesmas_pembantu . ' kali';
            })
            ->addColumn('poliklinik', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $poliklinik = $datakesehatan ? $datakesehatan->poliklinik : '';

                return '' . $poliklinik . ' kali';
            })
            ->addColumn('tempat_prakterkdr', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $tempat_prakterkdr = $datakesehatan ? $datakesehatan->tempat_praktekdr : '';

                return '' . $tempat_prakterkdr . ' kali';
            })
            ->addColumn('rumah_bersalin', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $rumah_bersalin = $datakesehatan ? $datakesehatan->rumah_bersalin : '';

                return '' . $rumah_bersalin . ' kali';
            })
            ->addColumn('tempat_praktek', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $tempat_praktek = $datakesehatan ? $datakesehatan->tempat_praktek : '';

                return '' . $tempat_praktek . ' kali';
            })
            ->addColumn('poskedes', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $poskedes = $datakesehatan ? $datakesehatan->poskesdes : '';

                return '' . $poskedes . ' kali';
            })
            ->addColumn('polindes', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $polindes = $datakesehatan ? $datakesehatan->polindes : '';

                return '' . $polindes . ' kali';
            })
            ->addColumn('apotik', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $apotik = $datakesehatan ? $datakesehatan->apotik : '';

                return '' . $apotik . ' kali';
            })
            ->addColumn('toko_obat', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $toko_obat = $datakesehatan ? $datakesehatan->toko_obat : '';

                return '' . $toko_obat . ' kali';
            })
            ->addColumn('posyandu', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $posyandu = $datakesehatan ? $datakesehatan->posyandu : '';

                return '' . $posyandu . ' kali';
            })
            ->addColumn('posbindu', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $posbindu = $datakesehatan ? $datakesehatan->posbindu : '';

                return '' . $posbindu . ' kali';
            })
            ->addColumn('tempat_praktikdb', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $tempat_praktikdb = $datakesehatan ? $datakesehatan->tempat_praktikdb : '';

                return '' . $tempat_praktikdb . ' kali';
            })
            ->addColumn('jamkes', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $jamkes = $datakesehatan ? $datakesehatan->jamkes : '';

                return '' . $jamkes . '';
            })
            ->addColumn('bayi', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $bayi = $datakesehatan ? $datakesehatan->bayiu16 : '';

                return '' . $bayi . '';
            })

            ->rawColumns([
                'action',                'penyakit',
                'rumahsakit',
                'rumahsakitb',
                'pusekesmas_denganri',
                'pusekesmas_tanpari',
                'puskesmas_pembantu',
                'poliklinik',
                'tempat_prakterkdr',
                'rumah_bersalin',
                'tempat_praktek',
                'poskedes',
                'polindes',
                'apotik',
                'toko_obat',
                'posyandu',
                'posbindu',
                'tempat_praktikdb',
                'jamkes',
                'bayi',
            ])
            ->toJson();
    }

    public function json(Request $request)
    {
        $allowedDatakValues = ['tetap', 'tidaktetap'];

        if ($request->has('nokk')) {
            $nokk = $request->input('nokk');
            $query = Datapenduduk::with(['kk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'detailkk.kk'])
                ->whereHas('detailkk.kk', function ($query) use ($nokk) {
                    $query->where('nokk', $nokk);
                })
                ->whereIn('Datak', $allowedDatakValues);
        } else {
            // Jika tidak ada parameter noKK, kembalikan data kosong
            $query = Datapenduduk::whereNull('id'); // Tidak mengembalikan data
        }

        return DataTables::of($query)

            ->addColumn('nokk', function ($row) {
                return $row->detailkk->kk->nokk;
            })
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('kesehatan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('kesehatan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })

            ->addColumn('penyakit', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $penyakitsetahun = $datakesehatan ? explode(',', $datakesehatan->penyakitsetahun) : [];

                if (is_array($penyakitsetahun)) {
                    return implode(', ', $penyakitsetahun);
                } else {
                    return $penyakitsetahun;
                }
            })

            ->addColumn('rumahsakit', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $rumahsakit = $datakesehatan ? $datakesehatan->rumah_sakit : '';

                return '' . $rumahsakit . ' kali';
            })
            ->addColumn('rumahsakitb', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $rumahsakitb = $datakesehatan ? $datakesehatan->rumah_sakitb : '';

                return '' . $rumahsakitb . ' kali';
            })
            ->addColumn('pusekesmas_denganri', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $pusekesmas_denganri = $datakesehatan ? $datakesehatan->puskesmas_denganri : '';

                return '' . $pusekesmas_denganri . ' kali';
            })
            ->addColumn('pusekesmas_tanpari', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $pusekesmas_tanpari = $datakesehatan ? $datakesehatan->puskesmas_tanpari : '';

                return '' . $pusekesmas_tanpari . ' kali';
            })
            ->addColumn('puskesmas_pembantu', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $puskesmas_pembantu = $datakesehatan ? $datakesehatan->puskemas_pembantu : '';

                return '' . $puskesmas_pembantu . ' kali';
            })
            ->addColumn('poliklinik', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $poliklinik = $datakesehatan ? $datakesehatan->poliklinik : '';

                return '' . $poliklinik . ' kali';
            })
            ->addColumn('tempat_prakterkdr', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $tempat_prakterkdr = $datakesehatan ? $datakesehatan->tempat_praktekdr : '';

                return '' . $tempat_prakterkdr . ' kali';
            })
            ->addColumn('rumah_bersalin', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $rumah_bersalin = $datakesehatan ? $datakesehatan->rumah_bersalin : '';

                return '' . $rumah_bersalin . ' kali';
            })
            ->addColumn('tempat_praktek', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $tempat_praktek = $datakesehatan ? $datakesehatan->tempat_praktek : '';

                return '' . $tempat_praktek . ' kali';
            })
            ->addColumn('poskedes', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $poskedes = $datakesehatan ? $datakesehatan->poskesdes : '';

                return '' . $poskedes . ' kali';
            })
            ->addColumn('polindes', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $polindes = $datakesehatan ? $datakesehatan->polindes : '';

                return '' . $polindes . ' kali';
            })
            ->addColumn('apotik', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $apotik = $datakesehatan ? $datakesehatan->apotik : '';

                return '' . $apotik . ' kali';
            })
            ->addColumn('toko_obat', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $toko_obat = $datakesehatan ? $datakesehatan->toko_obat : '';

                return '' . $toko_obat . ' kali';
            })
            ->addColumn('posyandu', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $posyandu = $datakesehatan ? $datakesehatan->posyandu : '';

                return '' . $posyandu . ' kali';
            })
            ->addColumn('posbindu', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $posbindu = $datakesehatan ? $datakesehatan->posbindu : '';

                return '' . $posbindu . ' kali';
            })
            ->addColumn('tempat_praktikdb', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $tempat_praktikdb = $datakesehatan ? $datakesehatan->tempat_praktikdb : '';

                return '' . $tempat_praktikdb . ' kali';
            })
            ->addColumn('jamkes', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $jamkes = $datakesehatan ? $datakesehatan->jamkes : '';

                return '' . $jamkes . '';
            })
            ->addColumn('bayi', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $bayi = $datakesehatan ? $datakesehatan->bayiu16 : '';

                return '' . $bayi . '';
            })

            ->rawColumns([
                'action',                'penyakit',
                'rumahsakit',
                'rumahsakitb',
                'pusekesmas_denganri',
                'pusekesmas_tanpari',
                'puskesmas_pembantu',
                'poliklinik',
                'tempat_prakterkdr',
                'rumah_bersalin',
                'tempat_praktek',
                'poskedes',
                'polindes',
                'apotik',
                'toko_obat',
                'posyandu',
                'posbindu',
                'tempat_praktikdb',
                'jamkes',
                'bayi',
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
        if ($datakesehatan == NULL) {
            $datakesehatan = new datakesehatan();
        }
        $datakesehatan->nik = $request->valNIK;
        if (is_array($request->valpenyakitsetahun)) {
            $datakesehatan->penyakitsetahun = implode(",", $request->valpenyakitsetahun);
        } else {
            // Handle the case where $request->valpenyakitsetahun is not an array
            $datakesehatan->penyakitsetahun = $request->valpenyakitsetahun;
        }
        $datakesehatan->rumah_sakit = $request->valrumah_sakit;
        $datakesehatan->rumah_sakitb = $request->valrumah_sakitb;
        $datakesehatan->puskesmas_denganri = $request->valpuskesmas_denganri;
        $datakesehatan->puskesmas_tanpari = $request->valpuskesmas_tanpari;
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

        return redirect()->route('kesehatan.show', ['show' => $request->valNIK]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\datakesehatan  $datakesehatan
     * @return \Illuminate\Http\Response
     */
    public function show(datakesehatan $datakesehatan, $nik)
    {
        $datap = Datapenduduk::where('nik', $nik)->first();
        $datakesehatan = datakesehatan::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.individu.viewkesehatan', compact('datap', 'datakesehatan', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
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
