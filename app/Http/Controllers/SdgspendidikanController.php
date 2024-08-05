<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use App\Models\sdgspendidikan;
use App\Http\Requests\StoresdgspendidikanRequest;
use App\Http\Requests\UpdatesdgspendidikanRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SdgspendidikanController extends Controller
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
        $dataTerisi = sdgspendidikan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        $dataPendidikan = sdgspendidikan::all();

        $pendidikanLabels = $dataPendidikan->pluck('pendidikan_tertinggi')->toArray();
        $pendidikanCounts = $dataPendidikan->countBy('pendidikan_tertinggi')->values()->toArray();

        return view('sdgs.individu.datasdgspendidikan', compact('dataPendidikan', 'pendidikanLabels', 'pendidikanCounts', 'presentase'));
    }


    public function admin_index(Request $request)
    {
        $totalPenduduk = datapenduduk::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = sdgspendidikan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        $dataPendidikan = sdgspendidikan::all();

        $pendidikanLabels = $dataPendidikan->pluck('pendidikan_tertinggi')->toArray();
        $pendidikanCounts = $dataPendidikan->countBy('pendidikan_tertinggi')->values()->toArray();

        return view('sdgs.individu.admin_data_sdgs_pendidikan', compact('dataPendidikan', 'pendidikanLabels', 'pendidikanCounts', 'presentase'));
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
                            <a href="' . route('pendidikan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('pendidikan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })
            ->addColumn('pendidikan_tertinggi', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->pendidikan_tertinggi : '';

                return $kondisi;
            })
            ->addColumn('berapa_tahunp', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->berapa_tahunp : '';

                return $kondisi;
            })
            ->addColumn('pendidikan_diikuti', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->pendidikan_diikuti : '';

                return $kondisi;
            })
            ->addColumn('bahasa_Rumah', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->bahasa_Rumah : '';

                return $kondisi;
            })
            ->addColumn('bahasa_Formal', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->bahasa_Formal : '';

                return $kondisi;
            })
            ->addColumn('jumlah_kerja1', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->jumlah_kerja1 : '';

                return $kondisi;
            })
            ->addColumn('skamling1', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->skamling1 : '';

                return $kondisi;
            })
            ->addColumn('pesta_rakyat1', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->pesta_rakyat1 : '';

                return $kondisi;
            })
            ->addColumn('frekuensiml', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->frekuensiml : '';

                return $kondisi;
            })
            ->addColumn('frekuensib', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->frekuensib : '';

                return $kondisi;
            })
            ->addColumn('frekuensimn', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->frekuensimn : '';

                return $kondisi;
            })
            ->addColumn('mendapatp1', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->mendapatp1 : '';

                return $kondisi;
            })
            ->addColumn('bagaiamanap', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->bagaiamanap : '';

                return $kondisi;
            })
            ->addColumn('pernahmasukan', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->pernahmasukan : '';

                return $kondisi;
            })
            ->addColumn('keterbukaands', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->keterbukaands : '';

                return $kondisi;
            })
            ->addColumn('bencana1', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->bencana1 : '';

                return $kondisi;
            })
            ->addColumn('apakahb', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->apakahb : '';

                return $kondisi;
            })
            ->addColumn('apakahd', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->apakahd : '';

                return $kondisi;
            })
            ->addColumn('apakahp', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->apakahp : '';

                return $kondisi;
            })


            ->rawColumns([
                'action',
                'pendidikan_tertinggi',
                'berapa_tahunp',
                'pendidikan_diikuti',
                'bahasa_Rumah',
                'bahasa_Formal',
                'jumlah_kerja1',
                'skamling1',
                'pesta_rakyat1',
                'frekuensiml',
                'frekuensib',
                'frekuensimn',
                'mendapatp1',
                'bagaiamanap',
                'pernahmasukan',
                'keterbukaands',
                'bencana1',
                'apakahb',
                'apakahd',
                'apakahp',
            ])
            ->toJson();
    }


    public function json(Request $request)
    {
        $allowedDatakValues = ['tetap', 'tidaktetap'];

        if ($request->has('nik')) {
            $nik = $request->input('nik');
            $query = Datapenduduk::with(['kk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'detailkk.kk'])
                ->where('nik', $nik)
                ->whereIn('Datak', $allowedDatakValues);
        } else {
            // Jika tidak ada parameter NIK, kembalikan data kosong
            $query = Datapenduduk::whereNull('nik'); // Tidak mengembalikan data
        }
        return DataTables::of($query)

            ->addColumn('nokk', function ($row) {
                return $row->detailkk->kk->nokk;
            })
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('pendidikan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('pendidikan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })
            ->addColumn('pendidikan_tertinggi', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->pendidikan_tertinggi : '';

                return $kondisi;
            })
            ->addColumn('berapa_tahunp', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->berapa_tahunp : '';

                return $kondisi;
            })
            ->addColumn('pendidikan_diikuti', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->pendidikan_diikuti : '';

                return $kondisi;
            })
            ->addColumn('bahasa_Rumah', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->bahasa_Rumah : '';

                return $kondisi;
            })
            ->addColumn('bahasa_Formal', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->bahasa_Formal : '';

                return $kondisi;
            })
            ->addColumn('jumlah_kerja1', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->jumlah_kerja1 : '';

                return $kondisi;
            })
            ->addColumn('skamling1', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->skamling1 : '';

                return $kondisi;
            })
            ->addColumn('pesta_rakyat1', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->pesta_rakyat1 : '';

                return $kondisi;
            })
            ->addColumn('frekuensiml', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->frekuensiml : '';

                return $kondisi;
            })
            ->addColumn('frekuensib', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->frekuensib : '';

                return $kondisi;
            })
            ->addColumn('frekuensimn', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->frekuensimn : '';

                return $kondisi;
            })
            ->addColumn('mendapatp1', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->mendapatp1 : '';

                return $kondisi;
            })
            ->addColumn('bagaiamanap', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->bagaiamanap : '';

                return $kondisi;
            })
            ->addColumn('pernahmasukan', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->pernahmasukan : '';

                return $kondisi;
            })
            ->addColumn('keterbukaands', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->keterbukaands : '';

                return $kondisi;
            })
            ->addColumn('bencana1', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->bencana1 : '';

                return $kondisi;
            })
            ->addColumn('apakahb', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->apakahb : '';

                return $kondisi;
            })
            ->addColumn('apakahd', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->apakahd : '';

                return $kondisi;
            })
            ->addColumn('apakahp', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->apakahp : '';

                return $kondisi;
            })


            ->rawColumns([
                'action',
                'pendidikan_tertinggi',
                'berapa_tahunp',
                'pendidikan_diikuti',
                'bahasa_Rumah',
                'bahasa_Formal',
                'jumlah_kerja1',
                'skamling1',
                'pesta_rakyat1',
                'frekuensiml',
                'frekuensib',
                'frekuensimn',
                'mendapatp1',
                'bagaiamanap',
                'pernahmasukan',
                'keterbukaands',
                'bencana1',
                'apakahb',
                'apakahd',
                'apakahp',
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
        $datasdgspendidikan = sdgspendidikan::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.individu.editsdgspendidikan', compact('datap', 'datasdgspendidikan', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresdgspendidikanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresdgspendidikanRequest $request)
    {
        $datasdgspendidikan = sdgspendidikan::where('nik', $request->valNIK)->first();
        if ($datasdgspendidikan == NULL) {
            $datasdgspendidikan = new sdgspendidikan();
        }
        $datasdgspendidikan->nik = $request->valNIK;
        $datasdgspendidikan->pendidikan_tertinggi = $request->valpendidikan_tertinggi;
        $datasdgspendidikan->berapa_tahunp = $request->valberapa_tahunp;
        $datasdgspendidikan->pendidikan_diikuti = $request->valpendidikan_diikuti;
        $datasdgspendidikan->bahasa_Rumah = $request->valbahasa_Rumah;
        $datasdgspendidikan->bahasa_Formal = $request->valbahasa_Formal;
        $datasdgspendidikan->jumlah_kerja1 = $request->valjumlah_kerja1;
        $datasdgspendidikan->skamling1 = $request->valskamling;
        $datasdgspendidikan->pesta_rakyat1 = $request->valpesta_rakyat1;
        $datasdgspendidikan->frekuensiml = $request->valfrekuensiml;
        $datasdgspendidikan->frekuensib = $request->valfrekuensib;
        $datasdgspendidikan->frekuensimn = $request->valfrekuensmn;
        $datasdgspendidikan->mendapatp1 = $request->valmendapatp1;
        $datasdgspendidikan->bagaiamanap = $request->valbagaiamanap;
        $datasdgspendidikan->pernahmasukan = $request->valpernahmasukan;
        $datasdgspendidikan->keterbukaands = $request->valketerbukaands;
        $datasdgspendidikan->bencana1 = $request->valbencana1;
        $datasdgspendidikan->apakahb = $request->valapakahb;
        $datasdgspendidikan->apakahd = $request->valapakahd;
        $datasdgspendidikan->apakahp = $request->valapakahp;

        $datasdgspendidikan->save();

        return redirect()->route('pendidikan.show', ['show' => $request->valNIK]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sdgspendidikan  $sdgspendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(sdgspendidikan $sdgspendidikan, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $datasdgspendidikan = sdgspendidikan::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.individu.viewsdgspendidikan', compact('datap', 'datasdgspendidikan', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sdgspendidikan  $sdgspendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(sdgspendidikan $sdgspendidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesdgspendidikanRequest  $request
     * @param  \App\Models\sdgspendidikan  $sdgspendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesdgspendidikanRequest $request, sdgspendidikan $sdgspendidikan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sdgspendidikan  $sdgspendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(sdgspendidikan $sdgspendidikan)
    {
        //
    }
}
