<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\akseskesehatan;
use App\Http\Requests\StoreakseskesehatanRequest;
use App\Http\Requests\UpdateakseskesehatanRequest;
use Yajra\DataTables\DataTables;

class AkseskesehatanController extends Controller
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
        $dataTerisi = akseskesehatan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        return view('sdgs.KK.akseskesehatan', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalPenduduk = datapenduduk::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = akseskesehatan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        return view('sdgs.KK.admin_akses_kesehatan', compact('presentase'));
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
                            <a href="' . route('akseskesehatan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('akseskesehatan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })

            ->addColumn('jaraktempuh_rumahs', function ($row) {
                $datakesehatan = akseskesehatan::where('nik', $row->nik)->first();
                $jaraktempuh_rumahs = $datakesehatan ? $datakesehatan->jaraktempuh_rumahs : '';

                return '' . $jaraktempuh_rumahs . '';
            })

            ->addColumn('jaraktempuh_rumahs', function ($row) {
                $datakesehatan = akseskesehatan::where('nik', $row->nik)->first();
                $jaraktempuh_rumahs = $datakesehatan ? $datakesehatan->jaraktempuh_rumahs : '';
                return '' . $jaraktempuh_rumahs . '';
            })

            ->addColumn('waktutempuh_rumahs', function ($row) {
                $datakesehatan = akseskesehatan::where('nik', $row->nik)->first();
                $waktutempuh_rumahs = $datakesehatan ? $datakesehatan->waktutempuh_rumahs : '';
                return '' . $waktutempuh_rumahs . '';
            })

            ->addColumn('kemudahan_rumahs', function ($row) {
                $datakesehatan = akseskesehatan::where('nik', $row->nik)->first();
                $kemudahan_rumahs = $datakesehatan ? $datakesehatan->kemudahan_rumahs : '';
                return '' . $kemudahan_rumahs . '';
            })

            ->addColumn('jaraktempuh_rumahb', function ($row) {
                $dataRumahB = akseskesehatan::where('nik', $row->nik)->first();
                $jaraktempuh_rumahb = $dataRumahB ? $dataRumahB->jaraktempuh_rumahb : '';
                return '' . $jaraktempuh_rumahb . '';
            })

            ->addColumn('waktutempuh_rumahb', function ($row) {
                $dataRumahB = akseskesehatan::where('nik', $row->nik)->first();
                $waktutempuh_rumahb = $dataRumahB ? $dataRumahB->waktutempuh_rumahb : '';
                return '' . $waktutempuh_rumahb . '';
            })

            ->addColumn('kemudahan_rumahb', function ($row) {
                $dataRumahB = akseskesehatan::where('nik', $row->nik)->first();
                $kemudahan_rumahb = $dataRumahB ? $dataRumahB->kemudahan_rumahb : '';
                return '' . $kemudahan_rumahb . '';
            })

            ->addColumn('jaraktempuh_poliklinik', function ($row) {
                $dataPoliklinik = akseskesehatan::where('nik', $row->nik)->first();
                $jaraktempuh_poliklinik = $dataPoliklinik ? $dataPoliklinik->jaraktempuh_poliklinik : '';
                return '' . $jaraktempuh_poliklinik . '';
            })

            ->addColumn('waktutempuh_poliklinik', function ($row) {
                $dataPoliklinik = akseskesehatan::where('nik', $row->nik)->first();
                $waktutempuh_poliklinik = $dataPoliklinik ? $dataPoliklinik->waktutempuh_poliklinik : '';
                return '' . $waktutempuh_poliklinik . '';
            })

            ->addColumn('kemudahan_poliklinik', function ($row) {
                $dataPoliklinik = akseskesehatan::where('nik', $row->nik)->first();
                $kemudahan_poliklinik = $dataPoliklinik ? $dataPoliklinik->kemudahan_poliklinik : '';
                return '' . $kemudahan_poliklinik . '';
            })

            ->addColumn('jaraktempuh_puskesmas', function ($row) {
                $dataPuskesmas = akseskesehatan::where('nik', $row->nik)->first();
                $jaraktempuh_puskesmas = $dataPuskesmas ? $dataPuskesmas->jaraktempuh_puskesmas : '';
                return '' . $jaraktempuh_puskesmas . '';
            })

            ->addColumn('waktutempuh_puskesmas', function ($row) {
                $dataPuskesmas = akseskesehatan::where('nik', $row->nik)->first();
                $waktutempuh_puskesmas = $dataPuskesmas ? $dataPuskesmas->waktutempuh_puskesmas : '';
                return '' . $waktutempuh_puskesmas . '';
            })

            ->addColumn('kemudahan_puskesmas', function ($row) {
                $dataPuskesmas = akseskesehatan::where('nik', $row->nik)->first();
                $kemudahan_puskesmas = $dataPuskesmas ? $dataPuskesmas->kemudahan_puskesmas : '';
                return '' . $kemudahan_puskesmas . '';
            })

            ->addColumn('jaraktempuh_poskedes', function ($row) {
                $dataPoskedes = akseskesehatan::where('nik', $row->nik)->first();
                $jaraktempuh_poskedes = $dataPoskedes ? $dataPoskedes->jaraktempuh_poskedes : '';
                return '' . $jaraktempuh_poskedes . '';
            })

            ->addColumn('waktutempuh_poskedes', function ($row) {
                $dataPoskedes = akseskesehatan::where('nik', $row->nik)->first();
                $waktutempuh_poskedes = $dataPoskedes ? $dataPoskedes->waktutempuh_poskedes : '';
                return '' . $waktutempuh_poskedes . '';
            })

            ->addColumn('kemudahan_poskedes', function ($row) {
                $dataPoskedes = akseskesehatan::where('nik', $row->nik)->first();
                $kemudahan_poskedes = $dataPoskedes ? $dataPoskedes->kemudahan_poskedes : '';
                return '' . $kemudahan_poskedes . '';
            })

            ->addColumn('jaraktempuh_posyandu', function ($row) {
                $dataPosyandu = akseskesehatan::where('nik', $row->nik)->first();
                $jaraktempuh_posyandu = $dataPosyandu ? $dataPosyandu->jaraktempuh_posyandu : '';
                return '' . $jaraktempuh_posyandu . '';
            })

            ->addColumn('waktutempuh_posyandu', function ($row) {
                $dataPosyandu = akseskesehatan::where('nik', $row->nik)->first();
                $waktutempuh_posyandu = $dataPosyandu ? $dataPosyandu->waktutempuh_posyandu : '';
                return '' . $waktutempuh_posyandu . '';
            })

            ->addColumn('kemudahan_posyandu', function ($row) {
                $dataPosyandu = akseskesehatan::where('nik', $row->nik)->first();
                $kemudahan_posyandu = $dataPosyandu ? $dataPosyandu->kemudahan_posyandu : '';
                return '' . $kemudahan_posyandu . '';
            })

            ->addColumn('jaraktempuh_apotik', function ($row) {
                $dataApotik = akseskesehatan::where('nik', $row->nik)->first();
                $jaraktempuh_apotik = $dataApotik ? $dataApotik->jaraktempuh_apotik : '';
                return '' . $jaraktempuh_apotik . '';
            })

            ->addColumn('waktutempuh_apotik', function ($row) {
                $dataApotik = akseskesehatan::where('nik', $row->nik)->first();
                $waktutempuh_apotik = $dataApotik ? $dataApotik->waktutempuh_apotik : '';
                return '' . $waktutempuh_apotik . '';
            })

            ->addColumn('kemudahan_apotik', function ($row) {
                $dataApotik = akseskesehatan::where('nik', $row->nik)->first();
                $kemudahan_apotik = $dataApotik ? $dataApotik->kemudahan_apotik : '';
                return '' . $kemudahan_apotik . '';
            })

            ->addColumn('jaraktempuh_toko_obat', function ($row) {
                $dataTokoObat = akseskesehatan::where('nik', $row->nik)->first();
                $jaraktempuh_toko_obat = $dataTokoObat ? $dataTokoObat->jaraktempuh_toko_obat : '';
                return '' . $jaraktempuh_toko_obat . '';
            })

            ->addColumn('waktutempuh_toko_obat', function ($row) {
                $dataTokoObat = akseskesehatan::where('nik', $row->nik)->first();
                $waktutempuh_toko_obat = $dataTokoObat ? $dataTokoObat->waktutempuh_toko_obat : '';
                return '' . $waktutempuh_toko_obat . '';
            })

            ->addColumn('kemudahan_toko_obat', function ($row) {
                $dataTokoObat = akseskesehatan::where('nik', $row->nik)->first();
                $kemudahan_toko_obat = $dataTokoObat ? $dataTokoObat->kemudahan_toko_obat : '';
                return '' . $kemudahan_toko_obat . '';
            })


            ->rawColumns([
                'action',
                'jaraktempuh_rumahs',
                'waktutempuh_rumahs',
                'kemudahan_rumahs',
                'jaraktempuh_rumahb',
                'waktutempuh_rumahb',
                'kemudahan_rumahb',
                'jaraktempuh_poliklinik',
                'waktutempuh_poliklinik',
                'kemudahan_poliklinik',
                'jaraktempuh_puskesmas',
                'waktutempuh_puskesmas',
                'kemudahan_puskesmas',
                'jaraktempuh_poskedes',
                'waktutempuh_poskedes',
                'kemudahan_poskedes',
                'jaraktempuh_posyandu',
                'waktutempuh_posyandu',
                'kemudahan_posyandu',
                'jaraktempuh_apotik',
                'waktutempuh_apotik',
                'kemudahan_apotik',
                'jaraktempuh_toko_obat',
                'waktutempuh_toko_obat',
                'kemudahan_toko_obat',
            ])

            ->toJson();
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
                            <a href="' . route('akseskesehatan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('akseskesehatan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })

            ->addColumn('jaraktempuh_rumahs', function ($row) {
                $datakesehatan = akseskesehatan::where('nik', $row->nik)->first();
                $jaraktempuh_rumahs = $datakesehatan ? $datakesehatan->jaraktempuh_rumahs : '';

                return '' . $jaraktempuh_rumahs . '';
            })

            ->addColumn('jaraktempuh_rumahs', function ($row) {
                $datakesehatan = akseskesehatan::where('nik', $row->nik)->first();
                $jaraktempuh_rumahs = $datakesehatan ? $datakesehatan->jaraktempuh_rumahs : '';
                return '' . $jaraktempuh_rumahs . '';
            })

            ->addColumn('waktutempuh_rumahs', function ($row) {
                $datakesehatan = akseskesehatan::where('nik', $row->nik)->first();
                $waktutempuh_rumahs = $datakesehatan ? $datakesehatan->waktutempuh_rumahs : '';
                return '' . $waktutempuh_rumahs . '';
            })

            ->addColumn('kemudahan_rumahs', function ($row) {
                $datakesehatan = akseskesehatan::where('nik', $row->nik)->first();
                $kemudahan_rumahs = $datakesehatan ? $datakesehatan->kemudahan_rumahs : '';
                return '' . $kemudahan_rumahs . '';
            })

            ->addColumn('jaraktempuh_rumahb', function ($row) {
                $dataRumahB = akseskesehatan::where('nik', $row->nik)->first();
                $jaraktempuh_rumahb = $dataRumahB ? $dataRumahB->jaraktempuh_rumahb : '';
                return '' . $jaraktempuh_rumahb . '';
            })

            ->addColumn('waktutempuh_rumahb', function ($row) {
                $dataRumahB = akseskesehatan::where('nik', $row->nik)->first();
                $waktutempuh_rumahb = $dataRumahB ? $dataRumahB->waktutempuh_rumahb : '';
                return '' . $waktutempuh_rumahb . '';
            })

            ->addColumn('kemudahan_rumahb', function ($row) {
                $dataRumahB = akseskesehatan::where('nik', $row->nik)->first();
                $kemudahan_rumahb = $dataRumahB ? $dataRumahB->kemudahan_rumahb : '';
                return '' . $kemudahan_rumahb . '';
            })

            ->addColumn('jaraktempuh_poliklinik', function ($row) {
                $dataPoliklinik = akseskesehatan::where('nik', $row->nik)->first();
                $jaraktempuh_poliklinik = $dataPoliklinik ? $dataPoliklinik->jaraktempuh_poliklinik : '';
                return '' . $jaraktempuh_poliklinik . '';
            })

            ->addColumn('waktutempuh_poliklinik', function ($row) {
                $dataPoliklinik = akseskesehatan::where('nik', $row->nik)->first();
                $waktutempuh_poliklinik = $dataPoliklinik ? $dataPoliklinik->waktutempuh_poliklinik : '';
                return '' . $waktutempuh_poliklinik . '';
            })

            ->addColumn('kemudahan_poliklinik', function ($row) {
                $dataPoliklinik = akseskesehatan::where('nik', $row->nik)->first();
                $kemudahan_poliklinik = $dataPoliklinik ? $dataPoliklinik->kemudahan_poliklinik : '';
                return '' . $kemudahan_poliklinik . '';
            })

            ->addColumn('jaraktempuh_puskesmas', function ($row) {
                $dataPuskesmas = akseskesehatan::where('nik', $row->nik)->first();
                $jaraktempuh_puskesmas = $dataPuskesmas ? $dataPuskesmas->jaraktempuh_puskesmas : '';
                return '' . $jaraktempuh_puskesmas . '';
            })

            ->addColumn('waktutempuh_puskesmas', function ($row) {
                $dataPuskesmas = akseskesehatan::where('nik', $row->nik)->first();
                $waktutempuh_puskesmas = $dataPuskesmas ? $dataPuskesmas->waktutempuh_puskesmas : '';
                return '' . $waktutempuh_puskesmas . '';
            })

            ->addColumn('kemudahan_puskesmas', function ($row) {
                $dataPuskesmas = akseskesehatan::where('nik', $row->nik)->first();
                $kemudahan_puskesmas = $dataPuskesmas ? $dataPuskesmas->kemudahan_puskesmas : '';
                return '' . $kemudahan_puskesmas . '';
            })

            ->addColumn('jaraktempuh_poskedes', function ($row) {
                $dataPoskedes = akseskesehatan::where('nik', $row->nik)->first();
                $jaraktempuh_poskedes = $dataPoskedes ? $dataPoskedes->jaraktempuh_poskedes : '';
                return '' . $jaraktempuh_poskedes . '';
            })

            ->addColumn('waktutempuh_poskedes', function ($row) {
                $dataPoskedes = akseskesehatan::where('nik', $row->nik)->first();
                $waktutempuh_poskedes = $dataPoskedes ? $dataPoskedes->waktutempuh_poskedes : '';
                return '' . $waktutempuh_poskedes . '';
            })

            ->addColumn('kemudahan_poskedes', function ($row) {
                $dataPoskedes = akseskesehatan::where('nik', $row->nik)->first();
                $kemudahan_poskedes = $dataPoskedes ? $dataPoskedes->kemudahan_poskedes : '';
                return '' . $kemudahan_poskedes . '';
            })

            ->addColumn('jaraktempuh_posyandu', function ($row) {
                $dataPosyandu = akseskesehatan::where('nik', $row->nik)->first();
                $jaraktempuh_posyandu = $dataPosyandu ? $dataPosyandu->jaraktempuh_posyandu : '';
                return '' . $jaraktempuh_posyandu . '';
            })

            ->addColumn('waktutempuh_posyandu', function ($row) {
                $dataPosyandu = akseskesehatan::where('nik', $row->nik)->first();
                $waktutempuh_posyandu = $dataPosyandu ? $dataPosyandu->waktutempuh_posyandu : '';
                return '' . $waktutempuh_posyandu . '';
            })

            ->addColumn('kemudahan_posyandu', function ($row) {
                $dataPosyandu = akseskesehatan::where('nik', $row->nik)->first();
                $kemudahan_posyandu = $dataPosyandu ? $dataPosyandu->kemudahan_posyandu : '';
                return '' . $kemudahan_posyandu . '';
            })

            ->addColumn('jaraktempuh_apotik', function ($row) {
                $dataApotik = akseskesehatan::where('nik', $row->nik)->first();
                $jaraktempuh_apotik = $dataApotik ? $dataApotik->jaraktempuh_apotik : '';
                return '' . $jaraktempuh_apotik . '';
            })

            ->addColumn('waktutempuh_apotik', function ($row) {
                $dataApotik = akseskesehatan::where('nik', $row->nik)->first();
                $waktutempuh_apotik = $dataApotik ? $dataApotik->waktutempuh_apotik : '';
                return '' . $waktutempuh_apotik . '';
            })

            ->addColumn('kemudahan_apotik', function ($row) {
                $dataApotik = akseskesehatan::where('nik', $row->nik)->first();
                $kemudahan_apotik = $dataApotik ? $dataApotik->kemudahan_apotik : '';
                return '' . $kemudahan_apotik . '';
            })

            ->addColumn('jaraktempuh_toko_obat', function ($row) {
                $dataTokoObat = akseskesehatan::where('nik', $row->nik)->first();
                $jaraktempuh_toko_obat = $dataTokoObat ? $dataTokoObat->jaraktempuh_toko_obat : '';
                return '' . $jaraktempuh_toko_obat . '';
            })

            ->addColumn('waktutempuh_toko_obat', function ($row) {
                $dataTokoObat = akseskesehatan::where('nik', $row->nik)->first();
                $waktutempuh_toko_obat = $dataTokoObat ? $dataTokoObat->waktutempuh_toko_obat : '';
                return '' . $waktutempuh_toko_obat . '';
            })

            ->addColumn('kemudahan_toko_obat', function ($row) {
                $dataTokoObat = akseskesehatan::where('nik', $row->nik)->first();
                $kemudahan_toko_obat = $dataTokoObat ? $dataTokoObat->kemudahan_toko_obat : '';
                return '' . $kemudahan_toko_obat . '';
            })


            ->rawColumns([
                'action',
                'jaraktempuh_rumahs',
                'waktutempuh_rumahs',
                'kemudahan_rumahs',
                'jaraktempuh_rumahb',
                'waktutempuh_rumahb',
                'kemudahan_rumahb',
                'jaraktempuh_poliklinik',
                'waktutempuh_poliklinik',
                'kemudahan_poliklinik',
                'jaraktempuh_puskesmas',
                'waktutempuh_puskesmas',
                'kemudahan_puskesmas',
                'jaraktempuh_poskedes',
                'waktutempuh_poskedes',
                'kemudahan_poskedes',
                'jaraktempuh_posyandu',
                'waktutempuh_posyandu',
                'kemudahan_posyandu',
                'jaraktempuh_apotik',
                'waktutempuh_apotik',
                'kemudahan_apotik',
                'jaraktempuh_toko_obat',
                'waktutempuh_toko_obat',
                'kemudahan_toko_obat',
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
        $akses_kesehatan = akseskesehatan::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.editakseskesehatan', compact('akses_kesehatan', 'datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreakseskesehatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreakseskesehatanRequest $request)
    {
        $akses_kesehatan = akseskesehatan::where('nik', $request->valNIK)->first();
        if ($akses_kesehatan == NULL) {
            $akses_kesehatan = new akseskesehatan();
        }
        $akses_kesehatan->kk = $request->valNokk;
        $akses_kesehatan->nik = $request->valNIK;
        $akses_kesehatan->jaraktempuh_rumahs = $request->valjaraktempuh_rumahs;
        $akses_kesehatan->waktutempuh_rumahs = $request->valwaktutempuh_rumahs;
        $akses_kesehatan->kemudahan_rumahs = $request->valkemudahan_rumahs;
        $akses_kesehatan->jaraktempuh_rumahb = $request->valjaraktempuh_rumahb;
        $akses_kesehatan->waktutempuh_rumahb = $request->valwaktutempuh_rumahb;
        $akses_kesehatan->kemudahan_rumahb = $request->valkemudahan_rumahb;
        $akses_kesehatan->jaraktempuh_poliklinik = $request->valjaraktempuh_poliklinik;
        $akses_kesehatan->waktutempuh_poliklinik = $request->valwaktutempuh_poliklinik;
        $akses_kesehatan->kemudahan_poliklinik = $request->valkemudahan_poliklinik;
        $akses_kesehatan->jaraktempuh_puskesmas = $request->valjaraktempuh_puskesmas;
        $akses_kesehatan->waktutempuh_puskesmas = $request->valwaktutempuh_puskesmas;
        $akses_kesehatan->kemudahan_puskesmas = $request->valkemudahan_puskesmas;
        $akses_kesehatan->jaraktempuh_poskedes = $request->valjaraktempuh_poskedes;
        $akses_kesehatan->waktutempuh_poskedes = $request->valwaktutempuh_poskedes;
        $akses_kesehatan->kemudahan_poskedes = $request->valkemudahan_poskedes;
        $akses_kesehatan->jaraktempuh_posyandu = $request->valjaraktempuh_posyandu;
        $akses_kesehatan->waktutempuh_posyandu = $request->valwaktutempuh_posyandu;
        $akses_kesehatan->kemudahan_posyandu = $request->valkemudahan_posyandu;
        $akses_kesehatan->jaraktempuh_apotik = $request->valjaraktempuh_apotik;
        $akses_kesehatan->waktutempuh_apotik = $request->valwaktutempuh_apotik;
        $akses_kesehatan->kemudahan_apotik = $request->valkemudahan_apotik;
        $akses_kesehatan->jaraktempuh_toko_obat = $request->valjaraktempuh_toko_obat;
        $akses_kesehatan->waktutempuh_toko_obat = $request->valwaktutempuh_toko_obat;
        $akses_kesehatan->kemudahan_toko_obat = $request->valkemudahan_toko_obat;

        $akses_kesehatan->save();
        return redirect()->route('akseskesehatan.show', ['show' => $request->valNIK]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\akseskesehatan  $akseskesehatan
     * @return \Illuminate\Http\Response
     */
    public function show(akseskesehatan $akseskesehatan, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $akses_kesehatan = akseskesehatan::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.showakseskesehatan', compact('akses_kesehatan', 'datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\akseskesehatan  $akseskesehatan
     * @return \Illuminate\Http\Response
     */
    public function edit(akseskesehatan $akseskesehatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateakseskesehatanRequest  $request
     * @param  \App\Models\akseskesehatan  $akseskesehatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateakseskesehatanRequest $request, akseskesehatan $akseskesehatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\akseskesehatan  $akseskesehatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(akseskesehatan $akseskesehatan)
    {
        //
    }
}
