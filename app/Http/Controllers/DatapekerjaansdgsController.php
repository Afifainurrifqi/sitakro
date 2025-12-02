<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use App\Models\datapekerjaansdgs;
use Illuminate\Http\Request;
use App\Http\Requests\StoredatapekerjaansdgsRequest;
use App\Http\Requests\UpdatedatapekerjaansdgsRequest;
use Yajra\DataTables\DataTables;

class DatapekerjaansdgsController extends Controller
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
        $dataTerisi = datapekerjaansdgs::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        // Ambil data lainnya untuk ditampilkan di view
        $dataPekerjaan = datapekerjaansdgs::all();
        $pekerjaanLabels = $dataPekerjaan->pluck('pekerjaan_utama')->toArray();
        $pekerjaanCounts = $dataPekerjaan->countBy('pekerjaan_utama')->values()->toArray();

        return view('sdgs.individu.datasdgspekerjaan', compact('dataPekerjaan', 'pekerjaanLabels', 'pekerjaanCounts', 'presentase'));
    }

    public function admin_index(Request $request)
    {
        // Dapatkan total data penduduk
        $totalPenduduk = datapenduduk::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = datapekerjaansdgs::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        // Ambil data lainnya untuk ditampilkan di view
        $dataPekerjaan = datapekerjaansdgs::all();
        $pekerjaanLabels = $dataPekerjaan->pluck('pekerjaan_utama')->toArray();
        $pekerjaanCounts = $dataPekerjaan->countBy('pekerjaan_utama')->values()->toArray();

        return view('sdgs.individu.admin_data_sdgs_pekerjaan', compact('dataPekerjaan', 'pekerjaanLabels', 'pekerjaanCounts', 'presentase'));
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
                            <a href="' . route('pekerjaan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('pekerjaan.create', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })
            ->addColumn('kondisi_pekerjaan', function ($row) {
                $datapekerjaan = Datapekerjaansdgs::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->kondisi_pekerjaan : '';

                return $kondisi;
            })
            ->addColumn('pekerjaan_utama', function ($row) {
                $datapekerjaan = Datapekerjaansdgs::where('nik', $row->nik)->first();
                $utama = $datapekerjaan ? $datapekerjaan->pekerjaan_utama : '';

                return $utama;
            })
            ->addColumn('jaminan_sosial_ketenagakerjaan', function ($row) {
                $datapekerjaan = Datapekerjaansdgs::where('nik', $row->nik)->first();
                $jamkes = $datapekerjaan ? $datapekerjaan->jaminan_sosial_ketenagakerjaan : '';

                return $jamkes;
            })
            ->addColumn('penghasilan_setahun_terakhir', function ($row) {
                $datapekerjaan = Datapekerjaansdgs::where('nik', $row->nik)->first();
                $hasil = $datapekerjaan ? number_format($datapekerjaan->penghasilan_setahun_terakhir, 0, ',', '.') : '';
                return 'Rp ' . $hasil;
            })

            ->rawColumns([
                'action',
                'kondisi_pekerjaan',
                'pekerjaan_utama',
                'jaminan_sosial_ketenagakerjaan',
                'penghasilan_setahun_terakhir'
            ])
            ->toJson();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function json(Request $request)
    {
        $allowedDatakValues = ['tetap', 'tidaktetap'];

        // Cek apakah ada pencarian global dari DataTables atau filter nokk khusus
        $hasGlobalSearch = filled(data_get($request->all(), 'search.value')); // DataTables global search
        $hasNokkFilter   = $request->filled('nokk');

        if (! $hasGlobalSearch && ! $hasNokkFilter) {
            // Tidak ada search & tidak ada filter spesifik → sembunyikan data
            $query = Datapenduduk::query()->whereRaw('1=0');
        } else {
            // Ada search atau ada filter nokk → tampilkan data dengan relasi
            $query = Datapenduduk::with([
                'kk',
                'agama',
                'pendidikan',
                'pekerjaan',
                'goldar',
                'status',
                'detailkk.kk',
                'updatedByUser'
            ])->whereIn('Datak', $allowedDatakValues);

            // Filter opsional by NoKK dari parameter khusus
            if ($hasNokkFilter) {
                $nokk = $request->input('nokk');
                $query->whereHas('detailkk.kk', function ($qq) use ($nokk) {
                    $qq->where('nokk', 'like', "%{$nokk}%");
                });
            }
            // Catatan: global search akan ditangani otomatis oleh Yajra pada kolom sederhana.
            // Untuk kolom relasi (nokk) kita sediakan filterColumn di bawah.
        }


        return DataTables::of($query)

            ->addColumn('nokk', function ($row) {
                return $row->detailkk->kk->nokk;
            })
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('pekerjaan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('pekerjaan.create', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })
            ->addColumn('kondisi_pekerjaan', function ($row) {
                $datapekerjaan = Datapekerjaansdgs::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->kondisi_pekerjaan : '';

                return $kondisi;
            })
            ->addColumn('pekerjaan_utama', function ($row) {
                $datapekerjaan = Datapekerjaansdgs::where('nik', $row->nik)->first();
                $utama = $datapekerjaan ? $datapekerjaan->pekerjaan_utama : '';

                return $utama;
            })
            ->addColumn('jaminan_sosial_ketenagakerjaan', function ($row) {
                $datapekerjaan = Datapekerjaansdgs::where('nik', $row->nik)->first();
                $jamkes = $datapekerjaan ? $datapekerjaan->jaminan_sosial_ketenagakerjaan : '';

                return $jamkes;
            })
            ->addColumn('penghasilan_setahun_terakhir', function ($row) {
                $datapekerjaan = Datapekerjaansdgs::where('nik', $row->nik)->first();
                $hasil = $datapekerjaan ? number_format($datapekerjaan->penghasilan_setahun_terakhir, 0, ',', '.') : '';
                return 'Rp ' . $hasil;
            })

            ->rawColumns([
                'action',
                'kondisi_pekerjaan',
                'pekerjaan_utama',
                'jaminan_sosial_ketenagakerjaan',
                'penghasilan_setahun_terakhir'
            ])
            ->toJson();
    }

    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $datapk = datapekerjaansdgs::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.individu.editdatasdgspekerjaan', compact('datap', 'datapk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredatapekerjaansdgsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredatapekerjaansdgsRequest $request)
    {

        $datapekerjaan = datapekerjaansdgs::where('nik', $request->valNIK)->first();
        if ($datapekerjaan == NULL) {
            $datapekerjaan = new datapekerjaansdgs();
        }
        $datapekerjaan->nik = $request->valNIK;
        $datapekerjaan->kondisi_pekerjaan = $request->valKondisipekerjaan;
        $datapekerjaan->pekerjaan_utama = $request->valPekerjaanutama;
        $datapekerjaan->jaminan_sosial_ketenagakerjaan = $request->valJaminanketenagakerjaan;
        $datapekerjaan->penghasilan_setahun_terakhir = $request->valPenghasilansetahun;
        $datapekerjaan->save();

        if (auth()->check() && auth()->user()->role === 'admin') {
            return redirect()
                ->route('pekerjaan.admin_index')
                ->with('msg', 'Berhasil ditambahkan (Admin)');
        }

        // Default untuk user biasa
        return redirect()
            ->route('pekerjaan.index')
            ->with('msg', 'Penduduk Berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\datapekerjaansdgs  $datapekerjaansdgs
     * @return \Illuminate\Http\Response
     */
    public function show(datapekerjaansdgs $datapekerjaansdgs,  $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $datapk = datapekerjaansdgs::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.individu.viewdatasdgspekerjaan', compact('datap', 'datapk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\datapekerjaansdgs  $datapekerjaansdgs
     * @return \Illuminate\Http\Response
     */
    public function edit(datapekerjaansdgs $datapekerjaansdgs, $nik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedatapekerjaansdgsRequest  $request
     * @param  \App\Models\datapekerjaansdgs  $datapekerjaansdgs
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedatapekerjaansdgsRequest $request, datapekerjaansdgs $datapekerjaansdgs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\datapekerjaansdgs  $datapekerjaansdgs
     * @return \Illuminate\Http\Response
     */
    public function destroy(datapekerjaansdgs $datapekerjaansdgs)
    {
        //
    }
}
