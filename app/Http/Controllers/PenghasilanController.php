<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use App\Models\penghasilan;
use App\Http\Requests\StorepenghasilanRequest;
use App\Http\Requests\UpdatepenghasilanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PenghasilanController extends Controller
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
        $dataTerisi = penghasilan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        // Ambil data lainnya untuk ditampilkan di view
        $datapenghasilan = penghasilan::all();
        $penghasilanLabels = $datapenghasilan->pluck('penghasilan_utama')->toArray();
        $penghasilanCounts = $datapenghasilan->countBy('penghasilan_utama')->values()->toArray();
        return view('sdgs.individu.datapenghasilan', compact('datapenghasilan', 'penghasilanLabels', 'penghasilanCounts', 'presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalPenduduk = datapenduduk::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = penghasilan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        // Ambil data lainnya untuk ditampilkan di view
        $datapenghasilan = penghasilan::all();
        $penghasilanLabels = $datapenghasilan->pluck('penghasilan_utama')->toArray();
        $penghasilanCounts = $datapenghasilan->countBy('penghasilan_utama')->values()->toArray();

        return view('sdgs.individu.admin_data_sdgs_penghasilan', compact('datapenghasilan', 'penghasilanLabels', 'penghasilanCounts', 'presentase'));
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
                            <a href="' . route('penghasilan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('penghasilan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })

            ->addColumn('sumber', function ($row) {
                $datapenghasilan = penghasilan::where('nik', $row->nik)->first();
                $sumber = $datapenghasilan ? $datapenghasilan->sumber_penghasilan : '';

                return '' . $sumber . '';
            })
            ->addColumn('jumlah_aset', function ($row) {
                $datapenghasilan = penghasilan::where('nik', $row->nik)->first();
                $jumlah_aset = $datapenghasilan ? $datapenghasilan->jumlah_asset_darip : '';

                return '' . $jumlah_aset . '';
            })
            ->addColumn('satuan', function ($row) {
                $datapenghasilan = penghasilan::where('nik', $row->nik)->first();
                $satuan = $datapenghasilan ? $datapenghasilan->satuan : '';

                return '' . $satuan . '';
            })
            ->addColumn('penghasilan', function ($row) {
                $datapenghasilan = penghasilan::where('nik', $row->nik)->first();
                $penghasilan = $datapenghasilan ? number_format($datapenghasilan->penghasilan_setahun, 0, ',', '.') : '';

                return 'Rp' . $penghasilan ;
            })
            ->addColumn('ekspor', function ($row) {
                $datapenghasilan = penghasilan::where('nik', $row->nik)->first();
                $ekspor = $datapenghasilan ? $datapenghasilan->expor : '';

                return '' . $ekspor . '';
            })
            ->rawColumns(['action', 'sumber',
            'jumlah_aset',
            'satuan',
            'penghasilan',
            'ekspor',])
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
                            <a href="' . route('penghasilan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('penghasilan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })

            ->addColumn('sumber', function ($row) {
                $datapenghasilan = penghasilan::where('nik', $row->nik)->first();
                $sumber = $datapenghasilan ? $datapenghasilan->sumber_penghasilan : '';

                return '' . $sumber . '';
            })
            ->addColumn('jumlah_aset', function ($row) {
                $datapenghasilan = penghasilan::where('nik', $row->nik)->first();
                $jumlah_aset = $datapenghasilan ? $datapenghasilan->jumlah_asset_darip : '';

                return '' . $jumlah_aset . '';
            })
            ->addColumn('satuan', function ($row) {
                $datapenghasilan = penghasilan::where('nik', $row->nik)->first();
                $satuan = $datapenghasilan ? $datapenghasilan->satuan : '';

                return '' . $satuan . '';
            })
            ->addColumn('penghasilan', function ($row) {
                $datapenghasilan = penghasilan::where('nik', $row->nik)->first();
                $penghasilan = $datapenghasilan ? number_format($datapenghasilan->penghasilan_setahun, 0, ',', '.') : '';

                return 'Rp' . $penghasilan ;
            })
            ->addColumn('ekspor', function ($row) {
                $datapenghasilan = penghasilan::where('nik', $row->nik)->first();
                $ekspor = $datapenghasilan ? $datapenghasilan->expor : '';

                return '' . $ekspor . '';
            })
            ->rawColumns(['action', 'sumber',
            'jumlah_aset',
            'satuan',
            'penghasilan',
            'ekspor',])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik',$nik)->first();
        $dataph = penghasilan::where('nik',$nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.individu.editpenghasilan',compact('datap', 'dataph', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepenghasilanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepenghasilanRequest $request)
    {
        $dataph = penghasilan::where('nik', $request->valNIK)->first();
        if ($dataph == NULL ) {
            $dataph = new penghasilan();
        }
        $dataph->nik = $request->valNIK;
        $dataph->sumber_penghasilan = $request->valSumberpenghasilan;
        $dataph->jumlah_asset_darip = $request->valJumlahasset;
        $dataph->satuan = $request->valSatuan;
        $dataph->penghasilan_setahun = $request->valPenghasilanset;
        $dataph->expor = $request->valExport;
        $dataph->save();

        return redirect()->route('penghasilan.show',['show'=> $request->valNIK ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\penghasilan  $penghasilan
     * @return \Illuminate\Http\Response
     */
    public function show(penghasilan $penghasilan, $nik)
    {
        $datap = datapenduduk::where('nik',$nik)->first();
        $dataph = penghasilan::where('nik',$nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.individu.viewpenghasilan',compact('datap', 'dataph', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\penghasilan  $penghasilan
     * @return \Illuminate\Http\Response
     */
    public function edit(penghasilan $penghasilan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepenghasilanRequest  $request
     * @param  \App\Models\penghasilan  $penghasilan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepenghasilanRequest $request, penghasilan $penghasilan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penghasilan  $penghasilan
     * @return \Illuminate\Http\Response
     */
    public function destroy(penghasilan $penghasilan)
    {
        //
    }
}
