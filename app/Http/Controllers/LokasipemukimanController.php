<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\lokasipemukiman;
use App\Http\Requests\StorelokasipemukimanRequest;
use App\Http\Requests\UpdatelokasipemukimanRequest;
use App\Models\dataindividu;
use Yajra\DataTables\DataTables;

class LokasipemukimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('sdgs.KK.lokasidanpemukiman');
    }

    public function json(Request $request)
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
                            <a href="' . route('lokasipemukiman.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('lokasipemukiman.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })

            ->addColumn('nowa', function ($row) {
                $dataIndividu = dataindividu::where('nik', $row->nik)->first();
                $kondisi = $dataIndividu ? $dataIndividu->nowa : '';

                return $kondisi;
            })
            ->addColumn('nohp', function ($row) {
                $dataIndividu = dataindividu::where('nik', $row->nik)->first();
                $kondisi = $dataIndividu ? $dataIndividu->nohp : '';

                return $kondisi;
            })
            ->addColumn('nik_kepala', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->nik_kepala : '';

                return $kondisi;
            })
            ->addColumn('tempat_tinggal', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->tempat_tinggal : '';

                return $kondisi;
            })
            ->addColumn('status_lahan', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->status_lahan : '';

                return $kondisi;
            })
            ->addColumn('luas_lantai_tinggal', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->luas_lantai_tinggal : '';

                return $kondisi;
            })
            ->addColumn('luas_tanah_tinggal', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->luas_tanah_tinggal : '';

                return $kondisi;
            })
            ->addColumn('jenis_lantai_tinggal', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->jenis_lantai_tinggal : '';

                return $kondisi;
            })
            ->addColumn('dinding_sebagian', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->dinding_sebagian : '';

                return $kondisi;
            })
            ->addColumn('jendela', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->jendela : '';

                return $kondisi;
            })
            ->addColumn('atap', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->atap : '';

                return $kondisi;
            })
            ->addColumn('penerangan', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->penerangan : '';

                return $kondisi;
            })
            ->addColumn('energi_masak', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->energi_masak : '';

                return $kondisi;
            })
            ->addColumn('jika_kayu_jenis', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->jika_kayu_jenis : '';

                return $kondisi;
            })
            ->addColumn('tempat_sampah', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->tempat_sampah : '';

                return $kondisi;
            })
            ->addColumn('mck', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->mck : '';

                return $kondisi;
            })
            ->addColumn('sumber_air_mandi', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->sumber_air_mandi : '';

                return $kondisi;
            })
            ->addColumn('sumber_air_mck', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->sumber_air_mck : '';

                return $kondisi;
            })
            ->addColumn('sumber_air_minum', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->sumber_air_minum : '';

                return $kondisi;
            })
            ->addColumn('tempat_pembuangan_limbah', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->tempat_pembuangan_limbah : '';

                return $kondisi;
            })
            ->addColumn('rumah_sungai', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->rumah_sungai : '';

                return $kondisi;
            })
            ->addColumn('rumah_sutet', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->rumah_sutet : '';

                return $kondisi;
            })
            ->addColumn('rumah_lereng_gunung', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->rumah_lereng_gunung : '';

                return $kondisi;
            })
            ->addColumn('kondi_rumah_kumuh', function ($row) {
                $lokasi = lokasipemukiman::where('nik', $row->nik)->first();
                $kondisi = $lokasi ? $lokasi->kondi_rumah_kumuh : '';

                return $kondisi;
            })


            ->rawColumns([
                'action',
                'nowa',
                'nohp',
                'nik_kepala',
                'tempat_tinggal',
                'status_lahan',
                'luas_lantai_tinggal',
                'luas_tanah_tinggal',
                'jenis_lantai_tinggal',
                'dinding_sebagian',
                'jendela',
                'atap',
                'penerangan',
                'energi_masak',
                'jika_kayu_jenis',
                'tempat_sampah',
                'mck',
                'sumber_air_mandi',
                'sumber_air_mck',
                'sumber_air_minum',
                'tempat_pembuangan_limbah',
                'rumah_sungai',
                'rumah_sutet',
                'rumah_lereng_gunung',
                'kondi_rumah_kumuh',
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
        $lokasi = lokasipemukiman::where('nik', $nik)->first();
        $datai = dataindividu::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.editlokasidanpemukiman', compact('datai', 'datap', 'lokasi', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorelokasipemukimanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelokasipemukimanRequest $request)
    {
        $lokasi = lokasipemukiman::where('nik', $request->valNIK)->first();
        if ($lokasi == NULL) {
            $lokasi = new lokasipemukiman();
        }
        $lokasi->nokk = $request->valNokk;
        $lokasi->nik = $request->valNIK;
        $lokasi->nama = $request->valNama;
        $lokasi->alamat = $request->valAlamat;
        $lokasi->nohp = $request->valNohp;
        $lokasi->nowa = $request->valNowa;
        $lokasi->nik_kepala = $request->valnik_kepala;
        $lokasi->tempat_tinggal = $request->valtempat_tinggal;
        $lokasi->status_lahan = $request->valstatus_lahan;
        $lokasi->luas_lantai_tinggal = $request->valluas_lantai_tinggal;
        $lokasi->luas_tanah_tinggal = $request->valluas_tanah_tinggal;
        $lokasi->jenis_lantai_tinggal = $request->valjenis_lantai_tinggal;
        $lokasi->dinding_sebagian = $request->valdinding_sebagian;
        $lokasi->jendela = $request->valjendela;
        $lokasi->atap = $request->valatap;
        $lokasi->penerangan = $request->valpenerangan;
        $lokasi->energi_masak = $request->valenergi_masak;
        $lokasi->jika_kayu_jenis = $request->valjika_kayu_jenis;
        $lokasi->tempat_sampah = $request->valtempat_sampah;
        $lokasi->mck = $request->valmck;
        $lokasi->sumber_air_mandi = $request->valsumber_air_mandi;
        $lokasi->sumber_air_mck = $request->valsumber_air_mck;
        $lokasi->sumber_air_minum = $request->valsumber_air_minum;
        $lokasi->tempat_pembuangan_limbah = $request->valtempat_pembuangan_limbah;
        $lokasi->rumah_sutet = $request->valrumah_sutet;
        $lokasi->rumah_sungai = $request->valrumah_sungai;
        $lokasi->rumah_lereng_gunung = $request->valrumah_lereng_gunung;
        $lokasi->kondi_rumah_kumuh = $request->valkondi_rumah_kumuh;

        $lokasi->save();

        return redirect()->route('lokasipemukiman.show', ['show' => $request->valNIK]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lokasipemukiman  $lokasipemukiman
     * @return \Illuminate\Http\Response
     */
    public function show(lokasipemukiman $lokasipemukiman, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $lokasi = lokasipemukiman::where('nik', $nik)->first();
        $datai = dataindividu::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.showlokasidanpemukiman', compact('datai', 'datap', 'lokasi', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lokasipemukiman  $lokasipemukiman
     * @return \Illuminate\Http\Response
     */
    public function edit(lokasipemukiman $lokasipemukiman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelokasipemukimanRequest  $request
     * @param  \App\Models\lokasipemukiman  $lokasipemukiman
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelokasipemukimanRequest $request, lokasipemukiman $lokasipemukiman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lokasipemukiman  $lokasipemukiman
     * @return \Illuminate\Http\Response
     */
    public function destroy(lokasipemukiman $lokasipemukiman)
    {
        //
    }
}
