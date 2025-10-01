<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use App\Models\jenisdisabilitas;
use App\Http\Requests\StorejenisdisabilitasRequest;
use App\Http\Requests\UpdatejenisdisabilitasRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class JenisdisabilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Dapatkan total data penduduk
        $totalPenduduk = datapenduduk::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = jenisdisabilitas::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;


        return view('sdgs.individu.datadisabilitas', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalPenduduk = datapenduduk::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = jenisdisabilitas::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        return view('sdgs.individu.admin_sdgs_disabilitas', compact('presentase'));
    }

    public function jsonadmin(Request $request)
    {
        $allowedDatakValues = ['tetap', 'tidaktetap'];

        $query = Datapenduduk::with(['kk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'detailkk.kk'])
            ->whereIn('Datak', $allowedDatakValues);

        return DataTables::of($query)

            ->addColumn('nokk', function ($row) {
                return optional($row->detailkk->kk)->nokk;
            })
            // ⬇️ Izinkan pencarian global di kolom NO KK (relasi)
            ->filterColumn('nokk', function ($q, $keyword) {
                $q->whereHas('detailkk.kk', function ($qq) use ($keyword) {
                    $qq->where('nokk', 'like', "%{$keyword}%");
                });
            })
            // (opsional) izinkan sorting kolom NO KK
            ->orderColumn('nokk', function ($q, $order) {
                $q->join('detailkks', 'detailkks.nik', '=', 'datapenduduks.nik')
                    ->join('kks', 'kks.id', '=', 'detailkks.kk_id')
                    ->orderBy('kks.nokk', $order)
                    ->select('datapenduduks.*'); // hindari duplikasi kolom
            })
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('disabilitas.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('disabilitas.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })
            ->addColumn('disabilitas', function ($row) {
                $datadisabilitas = jenisdisabilitas::where('nik', $row->nik)->first();
                $kondisi = $datadisabilitas ? $datadisabilitas->jenis_disabilitas : '';

                return $kondisi;
            })

            ->rawColumns(['action', 'disabilitas',])
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
                return optional($row->detailkk->kk)->nokk;
            })
            // ⬇️ Izinkan pencarian global di kolom NO KK (relasi)
            ->filterColumn('nokk', function ($q, $keyword) {
                $q->whereHas('detailkk.kk', function ($qq) use ($keyword) {
                    $qq->where('nokk', 'like', "%{$keyword}%");
                });
            })
            // (opsional) izinkan sorting kolom NO KK
            ->orderColumn('nokk', function ($q, $order) {
                $q->join('detailkks', 'detailkks.nik', '=', 'datapenduduks.nik')
                    ->join('kks', 'kks.id', '=', 'detailkks.kk_id')
                    ->orderBy('kks.nokk', $order)
                    ->select('datapenduduks.*'); // hindari duplikasi kolom
            })
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('disabilitas.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('disabilitas.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })
            ->addColumn('disabilitas', function ($row) {
                $datadisabilitas = jenisdisabilitas::where('nik', $row->nik)->first();
                $kondisi = $datadisabilitas ? $datadisabilitas->jenis_disabilitas : '';

                return $kondisi;
            })

            ->rawColumns(['action', 'disabilitas',])
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
        $datadisabilitas = jenisdisabilitas::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        // Normalisasi: dari string "A,B,C" → array ['A','B','C'], buang spasi
        $selectedJenis = [];
        if ($datadisabilitas && $datadisabilitas->jenis_disabilitas) {
            $selectedJenis = array_filter(array_map('trim', explode(',', $datadisabilitas->jenis_disabilitas)));
        }

        return view('sdgs.individu.editdisabilitas', compact(
            'datap',
            'datadisabilitas',
            'agama',
            'pendidikan',
            'pekerjaan',
            'goldar',
            'status',
            'selectedJenis'
        ));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorejenisdisabilitasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorejenisdisabilitasRequest $request)
    {
        $datadisabilitas = jenisdisabilitas::where('nik', $request->valNIK)->first();
        if ($datadisabilitas == NULL) {
            $datadisabilitas = new jenisdisabilitas();
        }
        $datadisabilitas->nik = $request->valNIK;

        // Periksa apakah valjenisdisab ada dan merupakan array
        if (is_array($request->valjenisdisab)) {
            $datadisabilitas->jenis_disabilitas = implode(",", $request->valjenisdisab);
        } else {
            $datadisabilitas->jenis_disabilitas = ''; // Atau null, tergantung kebutuhan
        }

        $datadisabilitas->save();

        return redirect()->route('disabilitas.show', ['show' => $request->valNIK]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jenisdisabilitas  $jenisdisabilitas
     * @return \Illuminate\Http\Response
     */
    public function show(jenisdisabilitas $jenisdisabilitas, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $datadisabilitas = jenisdisabilitas::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.individu.viewjenisdisabilitas', compact('datap', 'datadisabilitas', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jenisdisabilitas  $jenisdisabilitas
     * @return \Illuminate\Http\Response
     */
    public function edit(jenisdisabilitas $jenisdisabilitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatejenisdisabilitasRequest  $request
     * @param  \App\Models\jenisdisabilitas  $jenisdisabilitas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatejenisdisabilitasRequest $request, jenisdisabilitas $jenisdisabilitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jenisdisabilitas  $jenisdisabilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(jenisdisabilitas $jenisdisabilitas)
    {
        //
    }
}
