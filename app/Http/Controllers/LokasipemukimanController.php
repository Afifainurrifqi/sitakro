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
use App\Models\akses_pendidikan;
use App\Models\akseskesehatan;
use App\Models\aksessarpras;
use App\Models\aksestenagakerja;
use App\Models\dataindividu;
use App\Models\laink;
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
        $totalPenduduk = datapenduduk::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = lokasipemukiman::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        return view('sdgs.KK.lokasidanpemukiman', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalPenduduk = datapenduduk::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = lokasipemukiman::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        return view('sdgs.KK.admin_lokasidanpemukiman', compact('presentase'));
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

            ->addColumn('jaraktempuh_paud', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                $kondisi = $akses_pendidikan ? $akses_pendidikan->jaraktempuh_paud : '';
                return $kondisi;
            })

            ->addColumn('waktutempuh_paud', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_paud : '';
            })
            ->addColumn('kemudahan_paud', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_paud : '';
            })
            ->addColumn('jaraktempuh_tk', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_tk : '';
            })
            ->addColumn('waktutempuh_tk', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_tk : '';
            })
            ->addColumn('kemudahan_tk', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_tk : '';
            })
            ->addColumn('jaraktempuh_sd', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_sd : '';
            })
            ->addColumn('waktutempuh_sd', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_sd : '';
            })
            ->addColumn('kemudahan_sd', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_sd : '';
            })
            ->addColumn('jaraktempuh_smp', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_smp : '';
            })
            ->addColumn('waktutempuh_smp', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_smp : '';
            })
            ->addColumn('kemudahan_smp', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_smp : '';
            })
            ->addColumn('jaraktempuh_sma', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_sma : '';
            })
            ->addColumn('waktutempuh_sma', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_sma : '';
            })
            ->addColumn('kemudahan_sma', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_sma : '';
            })
            ->addColumn('jaraktempuh_pt', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_pt : '';
            })
            ->addColumn('waktutempuh_pt', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_pt : '';
            })
            ->addColumn('kemudahan_pt', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_pt : '';
            })
            ->addColumn('jaraktempuh_ps', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_ps : '';
            })
            ->addColumn('waktutempuh_ps', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_ps : '';
            })
            ->addColumn('kemudahan_ps', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_ps : '';
            })
            ->addColumn('jaraktempuh_seminari', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_seminari : '';
            })
            ->addColumn('waktutempuh_seminari', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_seminari : '';
            })
            ->addColumn('kemudahan_seminari', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_seminari : '';
            })
            ->addColumn('jaraktempuh_pagamalain', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_pagamalain : '';
            })
            ->addColumn('waktutempuh_pagamalain', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_pagamalain : '';
            })
            ->addColumn('kemudahan_pagamalain', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_pagamalain : '';
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

            ->addColumn('jenistrasport_lokasipu', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->jenistrasport_lokasipu : '';
                return '' . $sarpras . '';
            })
            ->addColumn('pengtransportumum_lokasipu', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->pengtransportumum_lokasipu : '';
                return '' . $sarpras . '';
            })
            ->addColumn('waktutempuh_lokasipu', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->waktutempuh_lokasipu : '';
                return '' . $sarpras . '';
            })
            ->addColumn('biaya_lokasipu', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->biaya_lokasipu : '';
                return '' . $sarpras . '';
            })
            ->addColumn('kemudahan_lokasipu', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->kemudahan_lokasipu : '';
                return '' . $sarpras . '';
            })

            ->addColumn('jenistrasport_lahanpertanian', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->jenistrasport_lahanpertanian : '';
                return '' . $sarpras . '';
            })
            ->addColumn('pengtransportumum_lahanpertanian', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->pengtransportumum_lahanpertanian : '';
                return '' . $sarpras . '';
            })
            ->addColumn('waktutempuh_lahanpertanian', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->waktutempuh_lahanpertanian : '';
                return '' . $sarpras . '';
            })
            ->addColumn('biaya_lahanpertanian', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->biaya_lahanpertanian : '';
                return '' . $sarpras . '';
            })
            ->addColumn('kemudahan_lahanpertanian', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->kemudahan_lahanpertanian : '';
                return '' . $sarpras . '';
            })

            ->addColumn('jenistrasport_sekolah', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->jenistrasport_sekolah : '';
                return '' . $sarpras . '';
            })
            ->addColumn('pengtransportumum_sekolah', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->pengtransportumum_sekolah : '';
                return '' . $sarpras . '';
            })
            ->addColumn('waktutempuh_sekolah', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->waktutempuh_sekolah : '';
                return '' . $sarpras . '';
            })
            ->addColumn('biaya_sekolah', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->biaya_sekolah : '';
                return '' . $sarpras . '';
            })
            ->addColumn('kemudahan_sekolah', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->kemudahan_sekolah : '';
                return '' . $sarpras . '';
            })

            ->addColumn('jenistrasport_berobat', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->jenistrasport_berobat : '';
                return '' . $sarpras . '';
            })
            ->addColumn('pengtransportumum_berobat', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->pengtransportumum_berobat : '';
                return '' . $sarpras . '';
            })
            ->addColumn('waktutempuh_berobat', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->waktutempuh_berobat : '';
                return '' . $sarpras . '';
            })
            ->addColumn('biaya_berobat', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->biaya_berobat : '';
                return '' . $sarpras . '';
            })
            ->addColumn('kemudahan_berobat', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->kemudahan_berobat : '';
                return '' . $sarpras . '';
            })

            ->addColumn('jenistrasport_beribadah', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->jenistrasport_beribadah : '';
                return '' . $sarpras . '';
            })
            ->addColumn('pengtransportumum_beribadah', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->pengtransportumum_beribadah : '';
                return '' . $sarpras . '';
            })
            ->addColumn('waktutempuh_beribadah', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->waktutempuh_beribadah : '';
                return '' . $sarpras . '';
            })
            ->addColumn('biaya_beribadah', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->biaya_beribadah : '';
                return '' . $sarpras . '';
            })
            ->addColumn('kemudahan_beribadah', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->kemudahan_beribadah : '';
                return '' . $sarpras . '';
            })
            ->addColumn('jenistrasport_rekreasi', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->jenistrasport_rekreasi : '';
                return '' . $sarpras . '';
            })
            ->addColumn('pengtransportumum_rekreasi', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->pengtransportumum_rekreasi : '';
                return '' . $sarpras . '';
            })
            ->addColumn('waktutempuh_rekreasi', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->waktutempuh_rekreasi : '';
                return '' . $sarpras . '';
            })
            ->addColumn('biaya_rekreasi', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->biaya_rekreasi : '';
                return '' . $sarpras . '';
            })
            ->addColumn('kemudahan_rekreasi', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->kemudahan_rekreasi : '';
                return '' . $sarpras . '';
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

            ->addColumn('jaraktempuh_paud', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                $kondisi = $akses_pendidikan ? $akses_pendidikan->jaraktempuh_paud : '';
                return $kondisi;
            })

            ->addColumn('waktutempuh_paud', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_paud : '';
            })
            ->addColumn('kemudahan_paud', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_paud : '';
            })
            ->addColumn('jaraktempuh_tk', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_tk : '';
            })
            ->addColumn('waktutempuh_tk', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_tk : '';
            })
            ->addColumn('kemudahan_tk', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_tk : '';
            })
            ->addColumn('jaraktempuh_sd', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_sd : '';
            })
            ->addColumn('waktutempuh_sd', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_sd : '';
            })
            ->addColumn('kemudahan_sd', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_sd : '';
            })
            ->addColumn('jaraktempuh_smp', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_smp : '';
            })
            ->addColumn('waktutempuh_smp', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_smp : '';
            })
            ->addColumn('kemudahan_smp', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_smp : '';
            })
            ->addColumn('jaraktempuh_sma', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_sma : '';
            })
            ->addColumn('waktutempuh_sma', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_sma : '';
            })
            ->addColumn('kemudahan_sma', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_sma : '';
            })
            ->addColumn('jaraktempuh_pt', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_pt : '';
            })
            ->addColumn('waktutempuh_pt', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_pt : '';
            })
            ->addColumn('kemudahan_pt', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_pt : '';
            })
            ->addColumn('jaraktempuh_ps', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_ps : '';
            })
            ->addColumn('waktutempuh_ps', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_ps : '';
            })
            ->addColumn('kemudahan_ps', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_ps : '';
            })
            ->addColumn('jaraktempuh_seminari', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_seminari : '';
            })
            ->addColumn('waktutempuh_seminari', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_seminari : '';
            })
            ->addColumn('kemudahan_seminari', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_seminari : '';
            })
            ->addColumn('jaraktempuh_pagamalain', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->jaraktempuh_pagamalain : '';
            })
            ->addColumn('waktutempuh_pagamalain', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->waktutempuh_pagamalain : '';
            })
            ->addColumn('kemudahan_pagamalain', function ($row) {
                $akses_pendidikan = akses_pendidikan::where('nik', $row->nik)->first();
                return $akses_pendidikan ? $akses_pendidikan->kemudahan_pagamalain : '';
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

            ->addColumn('jenistrasport_lokasipu', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->jenistrasport_lokasipu : '';
                return '' . $sarpras . '';
            })
            ->addColumn('pengtransportumum_lokasipu', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->pengtransportumum_lokasipu : '';
                return '' . $sarpras . '';
            })
            ->addColumn('waktutempuh_lokasipu', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->waktutempuh_lokasipu : '';
                return '' . $sarpras . '';
            })
            ->addColumn('biaya_lokasipu', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->biaya_lokasipu : '';
                return '' . $sarpras . '';
            })
            ->addColumn('kemudahan_lokasipu', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->kemudahan_lokasipu : '';
                return '' . $sarpras . '';
            })

            ->addColumn('jenistrasport_lahanpertanian', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->jenistrasport_lahanpertanian : '';
                return '' . $sarpras . '';
            })
            ->addColumn('pengtransportumum_lahanpertanian', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->pengtransportumum_lahanpertanian : '';
                return '' . $sarpras . '';
            })
            ->addColumn('waktutempuh_lahanpertanian', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->waktutempuh_lahanpertanian : '';
                return '' . $sarpras . '';
            })
            ->addColumn('biaya_lahanpertanian', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->biaya_lahanpertanian : '';
                return '' . $sarpras . '';
            })
            ->addColumn('kemudahan_lahanpertanian', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->kemudahan_lahanpertanian : '';
                return '' . $sarpras . '';
            })

            ->addColumn('jenistrasport_sekolah', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->jenistrasport_sekolah : '';
                return '' . $sarpras . '';
            })
            ->addColumn('pengtransportumum_sekolah', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->pengtransportumum_sekolah : '';
                return '' . $sarpras . '';
            })
            ->addColumn('waktutempuh_sekolah', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->waktutempuh_sekolah : '';
                return '' . $sarpras . '';
            })
            ->addColumn('biaya_sekolah', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->biaya_sekolah : '';
                return '' . $sarpras . '';
            })
            ->addColumn('kemudahan_sekolah', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->kemudahan_sekolah : '';
                return '' . $sarpras . '';
            })

            ->addColumn('jenistrasport_berobat', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->jenistrasport_berobat : '';
                return '' . $sarpras . '';
            })
            ->addColumn('pengtransportumum_berobat', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->pengtransportumum_berobat : '';
                return '' . $sarpras . '';
            })
            ->addColumn('waktutempuh_berobat', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->waktutempuh_berobat : '';
                return '' . $sarpras . '';
            })
            ->addColumn('biaya_berobat', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->biaya_berobat : '';
                return '' . $sarpras . '';
            })
            ->addColumn('kemudahan_berobat', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->kemudahan_berobat : '';
                return '' . $sarpras . '';
            })

            ->addColumn('jenistrasport_beribadah', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->jenistrasport_beribadah : '';
                return '' . $sarpras . '';
            })
            ->addColumn('pengtransportumum_beribadah', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->pengtransportumum_beribadah : '';
                return '' . $sarpras . '';
            })
            ->addColumn('waktutempuh_beribadah', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->waktutempuh_beribadah : '';
                return '' . $sarpras . '';
            })
            ->addColumn('biaya_beribadah', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->biaya_beribadah : '';
                return '' . $sarpras . '';
            })
            ->addColumn('kemudahan_beribadah', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->kemudahan_beribadah : '';
                return '' . $sarpras . '';
            })
            ->addColumn('jenistrasport_rekreasi', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->jenistrasport_rekreasi : '';
                return '' . $sarpras . '';
            })
            ->addColumn('pengtransportumum_rekreasi', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->pengtransportumum_rekreasi : '';
                return '' . $sarpras . '';
            })
            ->addColumn('waktutempuh_rekreasi', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->waktutempuh_rekreasi : '';
                return '' . $sarpras . '';
            })
            ->addColumn('biaya_rekreasi', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->biaya_rekreasi : '';
                return '' . $sarpras . '';
            })
            ->addColumn('kemudahan_rekreasi', function ($row) {
                $akses_sarpras = aksessarpras::where('nik', $row->nik)->first();
                $sarpras = $akses_sarpras ? $akses_sarpras->kemudahan_rekreasi : '';
                return '' . $sarpras . '';
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
