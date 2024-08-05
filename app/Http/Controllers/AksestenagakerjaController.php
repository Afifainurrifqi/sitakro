<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\aksestenagakerja;
use App\Http\Requests\StoreaksestenagakerjaRequest;
use App\Http\Requests\UpdateaksestenagakerjaRequest;
use App\Models\akseskesehatan;
use Yajra\DataTables\DataTables;

class AksestenagakerjaController extends Controller
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
        $dataTerisi = akseskesehatan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        return view('sdgs.KK.aksestenagakerja', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalPenduduk = datapenduduk::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = akseskesehatan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        return view('sdgs.KK.admin_aksestenagakerja', compact('presentase'));
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
                            <a href="' . route('aksestenagakerja.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('aksestenagakerja.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })
            ->addColumn('jaraktempuh_dr_spesialis', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->jaraktempuh_dr_spesialis : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('waktutempuh_dr_spesialis', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->waktutempuh_dr_spesialis : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('kemudahan_dr_spesialis', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->kemudahan_dr_spesialis : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('jaraktempuh_dr_umum', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->jaraktempuh_dr_umum : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('waktutempuh_dr_umum', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->waktutempuh_dr_umum : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('kemudahan_dr_umum', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->kemudahan_dr_umum : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('jaraktempuh_bidan', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->jaraktempuh_bidan : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('waktutempuh_bidan', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->waktutempuh_bidan : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('kemudahan_bidan', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->kemudahan_bidan : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('jaraktempuh_tenagakes', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->jaraktempuh_tenagakes : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('waktutempuh_tenagakes', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->waktutempuh_tenagakes : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('kemudahan_tenagakes', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->kemudahan_tenagakes : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('jaraktempuh_dukun', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->jaraktempuh_dukun : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('waktutempuh_dukun', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->waktutempuh_dukun : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('kemudahan_dukun', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->kemudahan_dukun : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })

            ->rawColumns([
                'action',
                'jaraktempuh_dr_spesialis',
                'waktutempuh_dr_spesialis',
                'kemudahan_dr_spesialis',
                'jaraktempuh_dr_umum',
                'waktutempuh_dr_umum',
                'kemudahan_dr_umum',
                'jaraktempuh_bidan',
                'waktutempuh_bidan',
                'kemudahan_bidan',
                'jaraktempuh_tenagakes',
                'waktutempuh_tenagakes',
                'kemudahan_tenagakes',
                'jaraktempuh_dukun',
                'waktutempuh_dukun',
                'kemudahan_dukun',
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
                            <a href="' . route('aksestenagakerja.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('aksestenagakerja.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })
            ->addColumn('jaraktempuh_dr_spesialis', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->jaraktempuh_dr_spesialis : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('waktutempuh_dr_spesialis', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->waktutempuh_dr_spesialis : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('kemudahan_dr_spesialis', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->kemudahan_dr_spesialis : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('jaraktempuh_dr_umum', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->jaraktempuh_dr_umum : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('waktutempuh_dr_umum', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->waktutempuh_dr_umum : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('kemudahan_dr_umum', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->kemudahan_dr_umum : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('jaraktempuh_bidan', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->jaraktempuh_bidan : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('waktutempuh_bidan', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->waktutempuh_bidan : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('kemudahan_bidan', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->kemudahan_bidan : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('jaraktempuh_tenagakes', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->jaraktempuh_tenagakes : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('waktutempuh_tenagakes', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->waktutempuh_tenagakes : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('kemudahan_tenagakes', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->kemudahan_tenagakes : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('jaraktempuh_dukun', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->jaraktempuh_dukun : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('waktutempuh_dukun', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->waktutempuh_dukun : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })
            ->addColumn('kemudahan_dukun', function ($row) {
                $data = aksestenagakerja::where('nik', $row->nik)->first();
                $jaraktempuh_dr_spesialis = $data ? $data->kemudahan_dukun : '';
                return '' . $jaraktempuh_dr_spesialis . '';
            })

            ->rawColumns([
                'action',
                'jaraktempuh_dr_spesialis',
                'waktutempuh_dr_spesialis',
                'kemudahan_dr_spesialis',
                'jaraktempuh_dr_umum',
                'waktutempuh_dr_umum',
                'kemudahan_dr_umum',
                'jaraktempuh_bidan',
                'waktutempuh_bidan',
                'kemudahan_bidan',
                'jaraktempuh_tenagakes',
                'waktutempuh_tenagakes',
                'kemudahan_tenagakes',
                'jaraktempuh_dukun',
                'waktutempuh_dukun',
                'kemudahan_dukun',
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
        $akses_tenagakerja = aksestenagakerja::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.editaksestenagakerja', compact('akses_tenagakerja', 'datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreaksestenagakerjaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreaksestenagakerjaRequest $request)
    {
        $akses_tenagakerja = aksestenagakerja::where('nik', $request->valNIK)->first();
        if ($akses_tenagakerja == NULL) {
            $akses_tenagakerja = new aksestenagakerja();
        }
        $akses_tenagakerja->nik = $request->valNIK;
        $akses_tenagakerja->jaraktempuh_dr_spesialis = $request->valjaraktempuh_dr_spesialis;
        $akses_tenagakerja->waktutempuh_dr_spesialis = $request->valwaktutempuh_dr_spesialis;
        $akses_tenagakerja->kemudahan_dr_spesialis = $request->valkemudahan_dr_spesialis;
        $akses_tenagakerja->jaraktempuh_dr_umum = $request->valjaraktempuh_dr_umum;
        $akses_tenagakerja->waktutempuh_dr_umum = $request->valwaktutempuh_dr_umum;
        $akses_tenagakerja->kemudahan_dr_umum = $request->valkemudahan_dr_umum;
        $akses_tenagakerja->jaraktempuh_bidan = $request->valjaraktempuh_bidan;
        $akses_tenagakerja->waktutempuh_bidan = $request->valwaktutempuh_bidan;
        $akses_tenagakerja->kemudahan_bidan = $request->valkemudahan_bidan;
        $akses_tenagakerja->jaraktempuh_tenagakes = $request->valjaraktempuh_tenagakes;
        $akses_tenagakerja->waktutempuh_tenagakes = $request->valwaktutempuh_tenagakes;
        $akses_tenagakerja->kemudahan_tenagakes = $request->valkemudahan_tenagakes;
        $akses_tenagakerja->jaraktempuh_dukun = $request->valjaraktempuh_dukun;
        $akses_tenagakerja->waktutempuh_dukun = $request->valwaktutempuh_dukun;
        $akses_tenagakerja->kemudahan_dukun = $request->valkemudahan_dukun;

        $akses_tenagakerja->save();
        return redirect()->route('aksestenagakerja.show', ['show' => $request->valNIK]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\aksestenagakerja  $aksestenagakerja
     * @return \Illuminate\Http\Response
     */
    public function show(aksestenagakerja $aksestenagakerja, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $akses_tenagakerja = aksestenagakerja::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.showaksestenagakerja', compact('akses_tenagakerja', 'datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\aksestenagakerja  $aksestenagakerja
     * @return \Illuminate\Http\Response
     */
    public function edit(aksestenagakerja $aksestenagakerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateaksestenagakerjaRequest  $request
     * @param  \App\Models\aksestenagakerja  $aksestenagakerja
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateaksestenagakerjaRequest $request, aksestenagakerja $aksestenagakerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\aksestenagakerja  $aksestenagakerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(aksestenagakerja $aksestenagakerja)
    {
        //
    }
}
