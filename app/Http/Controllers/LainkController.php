<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\laink;
use App\Http\Requests\StorelainkRequest;
use App\Http\Requests\UpdatelainkRequest;
use Yajra\DataTables\DataTables;

class LainkController extends Controller
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
        $dataTerisi = laink::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        return view('sdgs.KK.lain', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalPenduduk = datapenduduk::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = laink::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        return view('sdgs.KK.admin_lain', compact('presentase'));
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
                            <a href="' . route('laink.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('editlaink.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })

            ->addColumn('pengtransportsebelum', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $pengtransportsebelum = $datakesehatan ? $datakesehatan->pengtransportsebelum : '';

                return '' . $pengtransportsebelum . '';
            })

            ->addColumn('pengtransportsesudah', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $pengtransportsesudah = $datakesehatan ? $datakesehatan->pengtransportsesudah : '';

                return '' . $pengtransportsesudah . '';
            })

            ->addColumn('blt', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $blt = $datakesehatan ? $datakesehatan->blt : '';

                return '' . $blt . '';
            })

            ->addColumn('pkh', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $pkh = $datakesehatan ? $datakesehatan->pkh : '';

                return '' . $pkh . '';
            })

            ->addColumn('bst', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $bst = $datakesehatan ? $datakesehatan->bst : '';

                return '' . $bst . '';
            })

            ->addColumn('bantuan_presiden', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $bantuan_presiden = $datakesehatan ? $datakesehatan->bantuan_presiden : '';

                return '' . $bantuan_presiden . '';
            })

            ->addColumn('bantuan_umkm', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $bantuan_umkm = $datakesehatan ? $datakesehatan->bantuan_umkm : '';

                return '' . $bantuan_umkm . '';
            })

            ->addColumn('bantuan_pekerja', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $bantuan_pekerja = $datakesehatan ? $datakesehatan->bantuan_pekerja : '';

                return '' . $bantuan_pekerja . '';
            })

            ->addColumn('bantuan_anak', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $bantuan_anak = $datakesehatan ? $datakesehatan->bantuan_anak : '';

                return '' . $bantuan_anak . '';
            })

            ->addColumn('lainnya', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $lainnya = $datakesehatan ? $datakesehatan->lainnya : '';

                return '' . $lainnya . '';
            })

            ->addColumn('rata_rata', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $rata_rata = $datakesehatan ? $datakesehatan->rata_rata : '';

                return '' . $rata_rata . '';
            })

            ->rawColumns([
                'action',
                'pengtransportsebelum',
                'pengtransportsesudah',
                'blt',
                'pkh',
                'bst',
                'bantuan_presiden',
                'bantuan_umkm',
                'bantuan_pekerja',
                'bantuan_anak',
                'lainnya',
                'rata_rata',
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
                            <a href="' . route('laink.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('editlaink.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })

            ->addColumn('pengtransportsebelum', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $pengtransportsebelum = $datakesehatan ? $datakesehatan->pengtransportsebelum : '';

                return '' . $pengtransportsebelum . '';
            })

            ->addColumn('pengtransportsesudah', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $pengtransportsesudah = $datakesehatan ? $datakesehatan->pengtransportsesudah : '';

                return '' . $pengtransportsesudah . '';
            })

            ->addColumn('blt', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $blt = $datakesehatan ? $datakesehatan->blt : '';

                return '' . $blt . '';
            })

            ->addColumn('pkh', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $pkh = $datakesehatan ? $datakesehatan->pkh : '';

                return '' . $pkh . '';
            })

            ->addColumn('bst', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $bst = $datakesehatan ? $datakesehatan->bst : '';

                return '' . $bst . '';
            })

            ->addColumn('bantuan_presiden', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $bantuan_presiden = $datakesehatan ? $datakesehatan->bantuan_presiden : '';

                return '' . $bantuan_presiden . '';
            })

            ->addColumn('bantuan_umkm', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $bantuan_umkm = $datakesehatan ? $datakesehatan->bantuan_umkm : '';

                return '' . $bantuan_umkm . '';
            })

            ->addColumn('bantuan_pekerja', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $bantuan_pekerja = $datakesehatan ? $datakesehatan->bantuan_pekerja : '';

                return '' . $bantuan_pekerja . '';
            })

            ->addColumn('bantuan_anak', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $bantuan_anak = $datakesehatan ? $datakesehatan->bantuan_anak : '';

                return '' . $bantuan_anak . '';
            })

            ->addColumn('lainnya', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $lainnya = $datakesehatan ? $datakesehatan->lainnya : '';

                return '' . $lainnya . '';
            })

            ->addColumn('rata_rata', function ($row) {
                $datakesehatan = laink::where('nik', $row->nik)->first();
                $rata_rata = $datakesehatan ? $datakesehatan->rata_rata : '';

                return '' . $rata_rata . '';
            })

            ->rawColumns([
                'action',
                'pengtransportsebelum',
                'pengtransportsesudah',
                'blt',
                'pkh',
                'bst',
                'bantuan_presiden',
                'bantuan_umkm',
                'bantuan_pekerja',
                'bantuan_anak',
                'lainnya',
                'rata_rata',
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
        $datap = datapenduduk::where('nik', $nik)->first();
        $laink = laink::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.editlaink', compact('laink', 'datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorelainkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelainkRequest $request)
    {
        $laink = laink::where('nik', $request->valNIK)->first();
        if ($laink == NULL) {
            $laink = new laink();
        }
        $laink->nik = $request->valNIK;

        $laink->pengtransportsebelum = $request->valpengtransportsebelum;
        $laink->pengtransportsesudah = $request->valpengtransportsesudah;
        $laink->blt = $request->valblt;
        $laink->pkh = $request->valpkh;
        $laink->bst = $request->valbst;
        $laink->bantuan_presiden = $request->valbantuan_presiden;
        $laink->bantuan_umkm = $request->valbantuan_umkm;
        $laink->bantuan_pekerja = $request->valbantuan_pekerja;
        $laink->bantuan_anak = $request->valbantuan_anak;
        $laink->lainnya = $request->vallainnya;
        $laink->rata_rata = $request->valrata_rata;

        $laink->save();
        return redirect()->route('laink.show', ['show' => $request->valNIK]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\laink  $laink
     * @return \Illuminate\Http\Response
     */
    public function show(laink $laink, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $laink = laink::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.showlaink', compact('laink', 'datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\laink  $laink
     * @return \Illuminate\Http\Response
     */
    public function edit(laink $laink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelainkRequest  $request
     * @param  \App\Models\laink  $laink
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelainkRequest $request, laink $laink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\laink  $laink
     * @return \Illuminate\Http\Response
     */
    public function destroy(laink $laink)
    {
        //
    }
}
