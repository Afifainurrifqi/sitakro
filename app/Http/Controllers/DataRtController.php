<?php

namespace App\Http\Controllers;

use App\Models\data_rt;
use App\Http\Requests\Storedata_rtRequest;
use App\Http\Requests\Updatedata_rtRequest;
use App\Models\Datart;
use App\Models\lembaga_masyarakat;
use App\Models\rt_agama;
use App\Models\rt_bencana;
use App\Models\rt_fasilitas_ekonomi;
use App\Models\rt_infrastuktur;
use App\Models\rt_keamanan;
use App\Models\rt_kejadianluarbiasa;
use App\Models\rt_kesehatan;
use App\Models\rt_lingkungan;
use App\Models\rt_mitigasib;
use App\Models\rt_sarana_ekonomi;
use App\Models\rt_saranapendidikan;
use App\Models\rt_tkejahatan;
use App\Models\rtindustri;
use App\Models\rtkegiatan_warga;
use App\Models\rtlembaga_ekonomi;
use App\Models\rtlembaga_keagamaan;
use App\Models\rtlokasi;
use App\Models\rtpuengurus;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DataRtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sdgs.RT.datart');
    }

    public function admin_index()
    {
        return view('sdgs.RT.admin_datart');
    }

    public function jsonadmin(Request $request)
    {
        $query = Datart::query(); // Query the data_rt model

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('datart.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })

            ->addColumn('lokasi_rt_pulau', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->lokasi_rt_pulau : '';
                return $nama_ketuart;
            })

            ->addColumn('topo_terluas_rt', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->topo_terluas_rt : '';
                return $nama_ketuart;
            })
            ->addColumn('jumlah_warga_lereng', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->jumlah_warga_lereng : '';
                return $nama_ketuart;
            })
            ->addColumn('penanaman_pohon_lahan_kritis', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->penanaman_pohon_lahan_kritis : '';
                return $nama_ketuart;
            })
            ->addColumn('pantai_garis_panjang', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->pantai_garis_panjang : '';
                return $nama_ketuart;
            })
            ->addColumn('pemanfaatan_laut_perangkap', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->pemanfaatan_laut_perangkap : '';
                return $nama_ketuart;
            })
            ->addColumn('pemanfaatan_laut_budidaya', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->pemanfaatan_laut_budidaya : '';
                return $nama_ketuart;
            })
            ->addColumn('pemanfaatan_laut_tambakg', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->pemanfaatan_laut_tambakg : '';
                return $nama_ketuart;
            })
            ->addColumn('pemanfaatan_laut_bahari', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->pemanfaatan_laut_bahari : '';
                return $nama_ketuart;
            })
            ->addColumn('pemanfaatan_laut_transport', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->pemanfaatan_laut_transport : '';
                return $nama_ketuart;
            })
            ->addColumn('kondisi_mangrove', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->kondisi_mangrove : '';
                return $nama_ketuart;
            })
            ->addColumn('penanaman_mangrove', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->penanaman_mangrove : '';
                return $nama_ketuart;
            })
            ->addColumn('jumlah_warga_pesisir', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->jumlah_warga_pesisir : '';
                return $nama_ketuart;
            })
            ->addColumn('jumlah_warga_atasair', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->jumlah_warga_atasair : '';
                return $nama_ketuart;
            })
            ->addColumn('wilayah_desa_dalamhutan', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->wilayah_desa_dalamhutan : '';
                return $nama_ketuart;
            })
            ->addColumn('wilayah_desa_tepihutan', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->wilayah_desa_tepihutan : '';
                return $nama_ketuart;
            })
            ->addColumn('fungsihutan_kons', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->fungsihutan_kons : '';
                return $nama_ketuart;
            })
            ->addColumn('fungsihutan_lindung', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->fungsihutan_lindung : '';
                return $nama_ketuart;
            })
            ->addColumn('fungsihutan_produk', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->fungsihutan_produk : '';
                return $nama_ketuart;
            })
            ->addColumn('fungsihutan_hutandes', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->fungsihutan_hutandes : '';
                return $nama_ketuart;
            })
            ->addColumn('jumlahwarga_tinggal_dalamhutan', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->jumlahwarga_tinggal_dalamhutan : '';
                return $nama_ketuart;
            })
            ->addColumn('jumlahwarga_tinggal_sekitarhutan', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->jumlahwarga_tinggal_sekitarhutan : '';
                return $nama_ketuart;
            })
            ->addColumn('ketergantungan_hutan', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->ketergantungan_hutan : '';
                return $nama_ketuart;
            })
            ->addColumn('reboisasi', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->reboisasi : '';
                return $nama_ketuart;
            })
            ->addColumn('jumlah_produk_luardesa_masuk', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->jumlah_produk_luardesa_masuk : '';
                return $nama_ketuart;
            })
            ->addColumn('jumlah_produk_luardesa_keluar', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->jumlah_produk_luardesa_keluar : '';
                return $nama_ketuart;
            })

            ->addColumn('nama_ketuarw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                $kondisi = $rt_pengurus ? $rt_pengurus->nama_ketuarw : '';
                return $kondisi;
            })

            ->addColumn('nik_ketuarw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nik_ketuarw : '';
            })
            ->addColumn('nohp_ketuarw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nohp_ketuarw : '';
            })
            ->addColumn('menjabat_ketuarw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->menjabat_ketuarw : '';
            })
            ->addColumn('nama_sekrw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nama_sekrw : '';
            })
            ->addColumn('nik_sekrw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nik_sekrw : '';
            })
            ->addColumn('nohp_sekrw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nohp_sekrw : '';
            })
            ->addColumn('menjabat_sekrw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->menjabat_sekrw : '';
            })
            ->addColumn('nama_benrw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nama_benrw : '';
            })
            ->addColumn('nik_benrw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nik_benrw : '';
            })
            ->addColumn('nohp_benrw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nohp_benrw : '';
            })
            ->addColumn('menjabat_benrw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->menjabat_benrw : '';
            })
            ->addColumn('nama_ketuart', function ($row) {
                $rt_pengurus = Datart::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nama : '';
            })
            ->addColumn('nik_ketuart', function ($row) {
                $rt_pengurus = Datart::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nik : '';
            })
            ->addColumn('nohp_ketuart', function ($row) {
                $rt_pengurus = Datart::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nohp : '';
            })
            ->addColumn('menjabat_ketuart', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->menjabat_ketuart : '';
            })
            ->addColumn('nama_sekrt', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nama_sekrt : '';
            })
            ->addColumn('nik_sekrt', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nik_sekrt : '';
            })
            ->addColumn('nohp_sekrt', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nohp_sekrt : '';
            })
            ->addColumn('menjabat_sekrt', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->menjabat_sekrt : '';
            })
            ->addColumn('nama_benrt', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nama_benrt : '';
            })
            ->addColumn('nik_benrt', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nik_benrt : '';
            })
            ->addColumn('nohp_benrt', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nohp_benrt : '';
            })
            ->addColumn('menjabat_benrt', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->menjabat_benrt : '';
            })

            ->addColumn('agentik_jp', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->agentik_jp : '';
            })
            ->addColumn('agentik_jtk', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->agentik_jtk : '';
            })
            ->addColumn('jtri_sentra', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->jtri_sentra : '';
            })
            ->addColumn('jtri_lingkungan', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->jtri_lingkungan : '';
            })
            ->addColumn('jtri_kampung', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->jtri_kampung : '';
            })
            ->addColumn('diskotik_kpd', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->diskotik_kpd : '';
            })
            ->addColumn('diskotik_jtl', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->diskotik_jtl : '';
            })
            ->addColumn('lpg_kpapm', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->lpg_kpapm : '';
            })
            ->addColumn('lpg_kpapg', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->lpg_kpapg : '';
            })
            ->addColumn('koperasi_jumlah', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_jumlah : '';
            })
            ->addColumn('koperasi_kudproduksi', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudproduksi : '';
            })
            ->addColumn('koperasi_kudkredit', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudkredit : '';
            })
            ->addColumn('koperasi_kudkegiatan', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudkegiatan : '';
            })
            ->addColumn('koperasi_kudindustrik', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudindustrik : '';
            })
            ->addColumn('koperasi_kudksp', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudksp : '';
            })
            ->addColumn('koperasi_kudksu', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudksu : '';
            })
            ->addColumn('koperasi_kudlainnya', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudlainnya : '';
            })
            ->addColumn('kos_kud', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->kos_kud : '';
            })
            ->addColumn('kos_bumdes', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->kos_bumdes : '';
            })
            ->addColumn('kos_selain', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->kos_selain : '';
            })

            ->addColumn('jumlahindustrik_kulit', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kulit = $rt_industri ? $rt_industri->jumlahindustrik_kulit : '';
                return $kulit;
            })

            ->addColumn('jumlahindustris_kulit', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kulit = $rt_industri ? $rt_industri->jumlahindustris_kulit : '';
                return $kulit;
            })

            ->addColumn('jumlahmanajemen_kulit', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kulit = $rt_industri ? $rt_industri->jumlahmanajemen_kulit : '';
                return $kulit;
            })

            ->addColumn('jumlahpekerja_kulit', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kulit = $rt_industri ? $rt_industri->jumlahindustrik_kulit : '';
                return $kulit;
            })

            ->addColumn('jumlahindustrik_kayu', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kayu = $rt_industri ? $rt_industri->jumlahindustrik_kayu : '';
                return $kayu;
            })

            ->addColumn('jumlahindustris_kayu', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kayu = $rt_industri ? $rt_industri->jumlahindustris_kayu : '';
                return $kayu;
            })

            ->addColumn('jumlahmanajemen_kayu', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kayu = $rt_industri ? $rt_industri->jumlahmanajemen_kayu : '';
                return $kayu;
            })

            ->addColumn('jumlahpekerja_kayu', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kayu = $rt_industri ? $rt_industri->jumlahindustrik_kayu : '';
                return $kayu;
            })

            ->addColumn('jumlahindustrik_logam', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $logam = $rt_industri ? $rt_industri->jumlahindustrik_logam : '';
                return $logam;
            })

            ->addColumn('jumlahindustris_logam', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $logam = $rt_industri ? $rt_industri->jumlahindustris_logam : '';
                return $logam;
            })

            ->addColumn('jumlahmanajemen_logam', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $logam = $rt_industri ? $rt_industri->jumlahmanajemen_logam : '';
                return $logam;
            })

            ->addColumn('jumlahpekerja_logam', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $logam = $rt_industri ? $rt_industri->jumlahindustrik_logam : '';
                return $logam;
            })

            ->addColumn('jumlahindustrik_logamb', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $logamb = $rt_industri ? $rt_industri->jumlahindustrik_logamb : '';
                return $logamb;
            })

            ->addColumn('jumlahindustris_logamb', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $logamb = $rt_industri ? $rt_industri->jumlahindustris_logamb : '';
                return $logamb;
            })

            ->addColumn('jumlahmanajemen_logamb', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $logamb = $rt_industri ? $rt_industri->jumlahmanajemen_logamb : '';
                return $logamb;
            })

            ->addColumn('jumlahpekerja_logamb', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $logamb = $rt_industri ? $rt_industri->jumlahindustrik_logamb : '';
                return $logamb;
            })

            ->addColumn('jumlahindustrik_kain', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kain = $rt_industri ? $rt_industri->jumlahindustrik_kain : '';
                return $kain;
            })

            ->addColumn('jumlahindustris_kain', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kain = $rt_industri ? $rt_industri->jumlahindustris_kain : '';
                return $kain;
            })

            ->addColumn('jumlahmanajemen_kain', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kain = $rt_industri ? $rt_industri->jumlahmanajemen_kain : '';
                return $kain;
            })

            ->addColumn('jumlahpekerja_kain', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kain = $rt_industri ? $rt_industri->jumlahindustrik_kain : '';
                return $kain;
            })

            ->addColumn('jumlahindustrik_keramik', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $keramik = $rt_industri ? $rt_industri->jumlahindustrik_keramik : '';
                return $keramik;
            })

            ->addColumn('jumlahindustris_keramik', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $keramik = $rt_industri ? $rt_industri->jumlahindustris_keramik : '';
                return $keramik;
            })

            ->addColumn('jumlahmanajemen_keramik', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $keramik = $rt_industri ? $rt_industri->jumlahmanajemen_keramik : '';
                return $keramik;
            })

            ->addColumn('jumlahpekerja_keramik', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $keramik = $rt_industri ? $rt_industri->jumlahindustrik_keramik : '';
                return $keramik;
            })

            ->addColumn('jumlahindustrik_genteng', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $genteng = $rt_industri ? $rt_industri->jumlahindustrik_genteng : '';
                return $genteng;
            })

            ->addColumn('jumlahindustris_genteng', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $genteng = $rt_industri ? $rt_industri->jumlahindustris_genteng : '';
                return $genteng;
            })

            ->addColumn('jumlahmanajemen_genteng', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $genteng = $rt_industri ? $rt_industri->jumlahmanajemen_genteng : '';
                return $genteng;
            })

            ->addColumn('jumlahpekerja_genteng', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $genteng = $rt_industri ? $rt_industri->jumlahindustrik_genteng : '';
                return $genteng;
            })

            ->addColumn('jumlahindustrik_anyaman', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $anyaman = $rt_industri ? $rt_industri->jumlahindustrik_anyaman : '';
                return $anyaman;
            })

            ->addColumn('jumlahindustris_anyaman', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $anyaman = $rt_industri ? $rt_industri->jumlahindustris_anyaman : '';
                return $anyaman;
            })

            ->addColumn('jumlahmanajemen_anyaman', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $anyaman = $rt_industri ? $rt_industri->jumlahmanajemen_anyaman : '';
                return $anyaman;
            })

            ->addColumn('jumlahpekerja_anyaman', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $anyaman = $rt_industri ? $rt_industri->jumlahindustrik_anyaman : '';
                return $anyaman;
            })

            ->addColumn('jumlahindustrik_anyaman', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $anyaman = $rt_industri ? $rt_industri->jumlahindustrik_anyaman : '';
                return $anyaman;
            })

            ->addColumn('jumlahindustris_anyaman', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $anyaman = $rt_industri ? $rt_industri->jumlahindustris_anyaman : '';
                return $anyaman;
            })

            ->addColumn('jumlahmanajemen_anyaman', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $anyaman = $rt_industri ? $rt_industri->jumlahmanajemen_anyaman : '';
                return $anyaman;
            })

            ->addColumn('jumlahpekerja_anyaman', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $anyaman = $rt_industri ? $rt_industri->jumlahindustrik_anyaman : '';
                return $anyaman;
            })

            ->addColumn('jumlahindustrik_makanan', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $makanan = $rt_industri ? $rt_industri->jumlahindustrik_makanan : '';
                return $makanan;
            })

            ->addColumn('jumlahindustris_makanan', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $makanan = $rt_industri ? $rt_industri->jumlahindustris_makanan : '';
                return $makanan;
            })

            ->addColumn('jumlahmanajemen_makanan', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $makanan = $rt_industri ? $rt_industri->jumlahmanajemen_makanan : '';
                return $makanan;
            })

            ->addColumn('jumlahpekerja_makanan', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $makanan = $rt_industri ? $rt_industri->jumlahindustrik_makanan : '';
                return $makanan;
            })

            ->addColumn('jumlahindustrik_lainnya', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $lainnya = $rt_industri ? $rt_industri->jumlahindustrik_lainnya : '';
                return $lainnya;
            })

            ->addColumn('jumlahindustris_lainnya', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $lainnya = $rt_industri ? $rt_industri->jumlahindustris_lainnya : '';
                return $lainnya;
            })

            ->addColumn('jumlahmanajemen_lainnya', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $lainnya = $rt_industri ? $rt_industri->jumlahmanajemen_lainnya : '';
                return $lainnya;
            })

            ->addColumn('jumlahpekerja_lainnya', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $lainnya = $rt_industri ? $rt_industri->jumlahindustrik_lainnya : '';
                return $lainnya;
            })

            ->addColumn('jumlah_toko', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_toko : '';
            })
            ->addColumn('kondisi_toko', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_toko : '';
            })
            ->addColumn('Jarak_toko', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_toko : '';
            })
            ->addColumn('kemudahan_toko', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_toko : '';
            })

            ->addColumn('jumlah_pasar_permanen', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_pasar_permanen : '';
            })
            ->addColumn('kondisi_pasar_permanen', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_pasar_permanen : '';
            })
            ->addColumn('Jarak_pasar_permanen', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_pasar_permanen : '';
            })
            ->addColumn('kemudahan_pasar_permanen', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_pasar_permanen : '';
            })

            ->addColumn('jumlah_semip', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_semip : '';
            })
            ->addColumn('kondisi_semip', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_semip : '';
            })
            ->addColumn('Jarak_semip', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_semip : '';
            })
            ->addColumn('kemudahan_semip', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_semip : '';
            })

            ->addColumn('jumlah_tanpap', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_tanpap : '';
            })
            ->addColumn('kondisi_tanpap', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_tanpap : '';
            })
            ->addColumn('Jarak_tanpap', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_tanpap : '';
            })
            ->addColumn('kemudahan_tanpap', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_tanpap : '';
            })

            ->addColumn('jumlah_minimarket', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_minimarket : '';
            })
            ->addColumn('kondisi_minimarket', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_minimarket : '';
            })
            ->addColumn('Jarak_minimarket', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_minimarket : '';
            })
            ->addColumn('kemudahan_minimarket', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_minimarket : '';
            })

            ->addColumn('jumlah_warungk', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_warungk : '';
            })
            ->addColumn('kondisi_warungk', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_warungk : '';
            })
            ->addColumn('Jarak_warungk', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_warungk : '';
            })
            ->addColumn('kemudahan_warungk', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_warungk : '';
            })

            ->addColumn('jumlah_warungp', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_warungp : '';
            })
            ->addColumn('kondisi_warungp', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_warungp : '';
            })
            ->addColumn('Jarak_warungp', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_warungp : '';
            })
            ->addColumn('kemudahan_warungp', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_warungp : '';
            })

            ->addColumn('jumlah_restoran', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_restoran : '';
            })
            ->addColumn('kondisi_restoran', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_restoran : '';
            })
            ->addColumn('Jarak_restoran', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_restoran : '';
            })
            ->addColumn('kemudahan_restoran', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_restoran : '';
            })

            ->addColumn('jumlah_kedaim', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_kedaim : '';
            })
            ->addColumn('kondisi_kedaim', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kedaim : '';
            })
            ->addColumn('Jarak_kedaim', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_kedaim : '';
            })
            ->addColumn('kemudahan_kedaim', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_kedaim : '';
            })

            ->addColumn('jumlah_kedaim', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_kedaim : '';
            })
            ->addColumn('kondisi_kedaim', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kedaim : '';
            })
            ->addColumn('Jarak_kedaim', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_kedaim : '';
            })
            ->addColumn('kemudahan_kedaim', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_kedaim : '';
            })

            ->addColumn('jumlah_hotel', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_hotel : '';
            })
            ->addColumn('kondisi_hotel', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_hotel : '';
            })
            ->addColumn('Jarak_hotel', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_hotel : '';
            })
            ->addColumn('kemudahan_hotel', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_hotel : '';
            })

            ->addColumn('jumlah_hostel', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_hostel : '';
            })
            ->addColumn('kondisi_hostel', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_hostel : '';
            })
            ->addColumn('Jarak_hostel', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_hostel : '';
            })
            ->addColumn('kemudahan_hostel', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_hostel : '';
            })

            ->addColumn('jumlah_bengkelm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bengkelm : '';
            })
            ->addColumn('kondisi_bengkelm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bengkelm : '';
            })
            ->addColumn('Jarak_bengkelm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bengkelm : '';
            })
            ->addColumn('kemudahan_bengkelm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bengkelm : '';
            })

            ->addColumn('jumlah_salonk', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_salonk : '';
            })
            ->addColumn('kondisi_salonk', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_salonk : '';
            })
            ->addColumn('Jarak_salonk', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_salonk : '';
            })
            ->addColumn('kemudahan_salonk', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_salonk : '';
            })

            ->addColumn('jumlah_agent', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_agent : '';
            })
            ->addColumn('kondisi_agent', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_agent : '';
            })
            ->addColumn('Jarak_agent', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_agent : '';
            })
            ->addColumn('kemudahan_agent', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_agent : '';
            })

            ->addColumn('jumlah_bankbri', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bankbri : '';
            })
            ->addColumn('kondisi_bankbri', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bankbri : '';
            })
            ->addColumn('Jarak_bankbri', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bankbri : '';
            })
            ->addColumn('kemudahan_bankbri', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bankbri : '';
            })

            ->addColumn('jumlah_briag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_briag : '';
            })
            ->addColumn('kondisi_briag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_briag : '';
            })
            ->addColumn('Jarak_briag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_briag : '';
            })
            ->addColumn('kemudahan_briag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_briag : '';
            })

            ->addColumn('jumlah_bankbni', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bankbni : '';
            })
            ->addColumn('kondisi_bankbni', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bankbni : '';
            })
            ->addColumn('Jarak_bankbni', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bankbni : '';
            })
            ->addColumn('kemudahan_bankbni', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bankbni : '';
            })

            ->addColumn('jumlah_bniag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bniag : '';
            })
            ->addColumn('kondisi_bniag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bniag : '';
            })
            ->addColumn('Jarak_bniag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bniag : '';
            })
            ->addColumn('kemudahan_bniag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bniag : '';
            })

            ->addColumn('jumlah_bankmandiri', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bankmandiri : '';
            })
            ->addColumn('kondisi_bankmandiri', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bankmandiri : '';
            })
            ->addColumn('Jarak_bankmandiri', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bankmandiri : '';
            })
            ->addColumn('kemudahan_bankmandiri', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bankmandiri : '';
            })


            ->addColumn('jumlah_mandiriag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_mandiriag : '';
            })
            ->addColumn('kondisi_mandiriag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_mandiriag : '';
            })
            ->addColumn('Jarak_mandiriag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_mandiriag : '';
            })
            ->addColumn('kemudahan_mandiriag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_mandiriag : '';
            })

            ->addColumn('jumlah_bankbpd', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bankbpd : '';
            })
            ->addColumn('kondisi_bankbpd', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bankbpd : '';
            })
            ->addColumn('Jarak_bankbpd', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bankbpd : '';
            })
            ->addColumn('kemudahan_bankbpd', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bankbpd : '';
            })

            ->addColumn('jumlah_bpdag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bpdag : '';
            })
            ->addColumn('kondisi_bpdag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bpdag : '';
            })
            ->addColumn('Jarak_bpdag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bpdag : '';
            })
            ->addColumn('kemudahan_bpdag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bpdag : '';
            })

            ->addColumn('jumlah_bankumum', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bankumum : '';
            })
            ->addColumn('kondisi_bankumum', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bankumum : '';
            })
            ->addColumn('Jarak_bankumum', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bankumum : '';
            })
            ->addColumn('kemudahan_bankumum', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bankumum : '';
            })

            ->addColumn('jumlah_bankbca', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bankbca : '';
            })
            ->addColumn('kondisi_bankbca', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bankbca : '';
            })
            ->addColumn('Jarak_bankbca', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bankbca : '';
            })
            ->addColumn('kemudahan_bankbca', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bankbca : '';
            })

            ->addColumn('jumlah_bankcimb', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bankcimb : '';
            })
            ->addColumn('kondisi_bankcimb', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bankcimb : '';
            })
            ->addColumn('Jarak_bankcimb', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bankcimb : '';
            })
            ->addColumn('kemudahan_bankcimb', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bankcimb : '';
            })

            ->addColumn('jumlah_banksinarm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_banksinarm : '';
            })
            ->addColumn('kondisi_banksinarm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_banksinarm : '';
            })
            ->addColumn('Jarak_banksinarm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_banksinarm : '';
            })
            ->addColumn('kemudahan_banksinarm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_banksinarm : '';
            })

            ->addColumn('jumlah_bankpermata', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bankpermata : '';
            })
            ->addColumn('kondisi_bankpermata', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bankpermata : '';
            })
            ->addColumn('Jarak_bankpermata', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bankpermata : '';
            })
            ->addColumn('kemudahan_bankpermata', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bankpermata : '';
            })

            ->addColumn('jumlah_bankswastalain', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bankswastalain : '';
            })
            ->addColumn('kondisi_bankswastalain', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bankswastalain : '';
            })
            ->addColumn('Jarak_bankswastalain', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bankswastalain : '';
            })
            ->addColumn('kemudahan_bankswastalain', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bankswastalain : '';
            })

            ->addColumn('jumlah_bankbpr', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bankbpr : '';
            })
            ->addColumn('kondisi_bankbpr', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bankbpr : '';
            })
            ->addColumn('Jarak_bankbpr', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bankbpr : '';
            })
            ->addColumn('kemudahan_bankbpr', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bankbpr : '';
            })
            ->addColumn('jumlah_bmt', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bmt : '';
            })
            ->addColumn('kondisi_bmt', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bmt : '';
            })
            ->addColumn('Jarak_bmt', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bmt : '';
            })
            ->addColumn('kemudahan_bmt', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bmt : '';
            })

            ->addColumn('jumlah_pegadaian', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_pegadaian : '';
            })
            ->addColumn('kondisi_pegadaian', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_pegadaian : '';
            })
            ->addColumn('Jarak_pegadaian', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_pegadaian : '';
            })
            ->addColumn('kemudahan_pegadaian', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_pegadaian : '';
            })

            ->addColumn('jumlah_atm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_atm : '';
            })
            ->addColumn('kondisi_atm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_atm : '';
            })
            ->addColumn('Jarak_atm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_atm : '';
            })
            ->addColumn('kemudahan_atm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_atm : '';
            })

            ->addColumn('jumlah_saranalain', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_saranalain : '';
            })
            ->addColumn('kondisi_saranalain', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_saranalain : '';
            })
            ->addColumn('Jarak_saranalain', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_saranalain : '';
            })
            ->addColumn('kemudahan_saranalain', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_saranalain : '';
            })
            ->addColumn('kredit_usaha_rakyat', function ($row) {
                $kreditUsahaRakyat = rt_fasilitas_ekonomi::where('your_column', $row->your_column_related_to_kredit_usaha_rakyat)->first();
                $value = $kreditUsahaRakyat ? $kreditUsahaRakyat->kredit_usaha_rakyat : '';

                return $value;
            })
            ->addColumn('kredit_ketahanan_pangan_energi', function ($row) {
                $kreditKetahananPanganEnergi = rt_fasilitas_ekonomi::where('your_column', $row->your_column_related_to_kredit_ketahanan_pangan_energi)->first();
                $value = $kreditKetahananPanganEnergi ? $kreditKetahananPanganEnergi->kredit_ketahanan_pangan_energi : '';

                return $value;
            })
            ->addColumn('kredit_usaha_kecil', function ($row) {
                $kreditUsahaKecil = rt_fasilitas_ekonomi::where('your_column', $row->your_column_related_to_kredit_usaha_kecil)->first();
                $value = $kreditUsahaKecil ? $kreditUsahaKecil->kredit_usaha_kecil : '';

                return $value;
            })
            ->addColumn('kelompok_usaha_bersama', function ($row) {
                $kelompokUsahaBersama = rt_fasilitas_ekonomi::where('your_column', $row->your_column_related_to_kelompok_usaha_bersama)->first();
                $value = $kelompokUsahaBersama ? $kelompokUsahaBersama->kelompok_usaha_bersama : '';

                return $value;
            })

            ->addColumn('penerangan_jalan', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->penerangan_jalan : '';
                return $nama_ketuart;
            })

            ->addColumn('pra_transportrt', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pra_transportrt : '';
            })
            ->addColumn('jalan_aspal', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jalan_aspal : '';
            })
            ->addColumn('jalan_makadam', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jalan_makadam : '';
            })
            ->addColumn('jalan_tanah', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jalan_tanah : '';
            })
            ->addColumn('jalan_papan_atasaair', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jalan_papan_atasaair : '';
            })
            ->addColumn('jalan_setapak', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jalan_setapak : '';
            })
            ->addColumn('jalan_lainnya', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jalan_lainnya : '';
            })
            ->addColumn('jalan_darat_roda4', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jalan_darat_roda4 : '';
            })
            ->addColumn('angkutanumum_trayek', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->angkutanumum_trayek : '';
            })
            ->addColumn('angkutanumum_opra', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->angkutanumum_opra : '';
            })
            ->addColumn('angkutanumum_jamopra', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->angkutanumum_jamopra : '';
            })
            ->addColumn('dermaga_laut', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->dermaga_laut : '';
            })
            ->addColumn('sinyalhp_bts', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->sinyalhp_bts : '';
            })
            ->addColumn('sinyalhp_telkom', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->sinyalhp_telkom : '';
            })
            ->addColumn('sinyalhp_indo', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->sinyalhp_indo : '';
            })
            ->addColumn('sinyalhp_xl', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->sinyalhp_xl : '';
            })
            ->addColumn('sinyalhp_hut', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->sinyalhp_hut : '';
            })
            ->addColumn('sinyalhp_psn', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->sinyalhp_psn : '';
            })
            ->addColumn('sinyalhp_smart', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->sinyalhp_smart : '';
            })
            ->addColumn('sinyalhp_bakrie', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->sinyalhp_bakrie : '';
            })
            ->addColumn('pos_pembantu', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pos_pembantu : '';
            })
            ->addColumn('pos_keliling', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pos_keliling : '';
            })
            ->addColumn('agen_jasa', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->agen_jasa : '';
            })
            ->addColumn('chanel_tvri', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->chanel_tvri : '';
            })
            ->addColumn('parabola_tvri', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->parabola_tvri : '';
            })
            ->addColumn('chanel_tvrid', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->chanel_tvrid : '';
            })
            ->addColumn('parabola_tvrid', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->parabola_tvrid : '';
            })
            ->addColumn('chanel_s', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->chanel_s : '';
            })
            ->addColumn('parabola_s', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->parabola_s : '';
            })
            ->addColumn('chanel_ln', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->chanel_ln : '';
            })
            ->addColumn('parabola_ln', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->parabola_ln : '';
            })
            ->addColumn('chanel_rri', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->chanel_rri : '';
            })
            ->addColumn('parabola_rri', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->parabola_rri : '';
            })
            ->addColumn('chanel_rrid', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->chanel_rrid : '';
            })
            ->addColumn('parabola_rrid', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->parabola_rrid : '';
            })
            ->addColumn('chanel_radios', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->chanel_radios : '';
            })
            ->addColumn('parabola_radios', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->parabola_radios : '';
            })
            ->addColumn('chanel_radiok', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->chanel_radiok : '';
            })
            ->addColumn('parabola_radiok', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->parabola_radiok : '';
            })
            ->addColumn('jumlah_lokasi_air', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_lokasi_air : '';
            })
            ->addColumn('fasilitas_umump_pasar', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->fasilitas_umump_pasar : '';
            })
            ->addColumn('fasilitas_umump_stasiun', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->fasilitas_umump_stasiun : '';
            })
            ->addColumn('fasilitas_umump_terminal', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->fasilitas_umump_terminal : '';
            })
            ->addColumn('fasilitas_umump_kolong', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->fasilitas_umump_kolong : '';
            })
            ->addColumn('fasilitas_umump_pelabuhan', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->fasilitas_umump_pelabuhan : '';
            })
            ->addColumn('pemukiman_khusus_mewah', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemukiman_khusus_mewah : '';
            })
            ->addColumn('pemukiman_khusus_apart', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemukiman_khusus_apart : '';
            })
            ->addColumn('pemukiman_khusus_susun', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemukiman_khusus_susun : '';
            })
            ->addColumn('pemukiman_khusus_school', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemukiman_khusus_school : '';
            })
            ->addColumn('pemukiman_khusus_kos', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemukiman_khusus_kos : '';
            })
            ->addColumn('pemukiman_khusus_asrama', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemukiman_khusus_asrama : '';
            })
            ->addColumn('pemukiman_khusus_lp', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemukiman_khusus_lp : '';
            })

            ->addColumn('lingkungan_lsi', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lsi');
            })
            ->addColumn('lingkungan_slno', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_slno');
            })
            ->addColumn('lingkungan_k', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_k');
            })
            ->addColumn('lingkungan_hl', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_hl');
            })
            ->addColumn('lingkungan_t', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_t');
            })
            ->addColumn('lingkungan_kte', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_kte');
            })
            ->addColumn('lingkungan_lgt', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lgt');
            })
            ->addColumn('lingkungan_lpp', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lpp');
            })
            ->addColumn('lingkungan_ah', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ah');
            })
            ->addColumn('lingkungan_lpns', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lpns');
            })
            ->addColumn('lingkungan_lpertambangan', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lpertambangan');
            })
            ->addColumn('lingkungan_lperumahan', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lperumahan');
            })
            ->addColumn('lingkungan_lperkantoran', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lperkantoran');
            })
            ->addColumn('lingkungan_lindustri', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lindustri');
            })
            ->addColumn('lingkungan_fu', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_fu');
            })
            ->addColumn('lingkungan_ll', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ll');
            })
            ->addColumn('lingkungan_nsym', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_nsym');
            })
            ->addColumn('lingkungan_ndws', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ndws');
            })
            ->addColumn('lingkungan_jma', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_jma');
            })
            ->addColumn('lingkungan_je', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_je');
            })
            ->addColumn('lingkungan_ksb', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ksb');
            })
            ->addColumn('lingkungan_ks', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ks');
            })
            ->addColumn('lingkungan_ki', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ki');
            })
            ->addColumn('lingkungan_kd', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_kd');
            })
            ->addColumn('lingkungan_ke', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ke');
            })
            ->addColumn('lingkungan_pair', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_pair');
            })
            ->addColumn('lingkungan_ptanah', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ptanah');
            })
            ->addColumn('lingkungan_pudara', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_pudara');
            })
            ->addColumn('lingkungan_pdusl', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_pdusl');
            })
            ->addColumn('lingkungan_kmml', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_kmml');
            })
            ->addColumn('lingkungan_klpg', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_klpg');
            })

            ->addColumn('k_longsor', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_longsor : '';
            })
            ->addColumn('f_longsor', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_longsor : '';
            })
            ->addColumn('kj_longsor', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_longsor : '';
            })
            ->addColumn('jp_longsor', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_longsor : '';
            })
            ->addColumn('wt_longsor', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_longsor : '';
            })
            ->addColumn('k_banjir', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_banjir : '';
            })
            ->addColumn('f_banjir', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_banjir : '';
            })
            ->addColumn('kj_banjir', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_banjir : '';
            })
            ->addColumn('jp_banjir', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_banjir : '';
            })
            ->addColumn('wt_banjir', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_banjir : '';
            })
            ->addColumn('k_bandang', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_bandang : '';
            })
            ->addColumn('f_bandang', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_bandang : '';
            })
            ->addColumn('kj_bandang', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_bandang : '';
            })
            ->addColumn('jp_bandang', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_bandang : '';
            })
            ->addColumn('wt_bandang', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_bandang : '';
            })
            ->addColumn('k_gempa', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_gempa : '';
            })
            ->addColumn('f_gempa', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_gempa : '';
            })
            ->addColumn('kj_gempa', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_gempa : '';
            })
            ->addColumn('jp_gempa', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_gempa : '';
            })
            ->addColumn('wt_gempa', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_gempa : '';
            })
            ->addColumn('k_tsunami', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_tsunami : '';
            })
            ->addColumn('f_tsunami', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_tsunami : '';
            })
            ->addColumn('kj_tsunami', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_tsunami : '';
            })
            ->addColumn('jp_tsunami', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_tsunami : '';
            })
            ->addColumn('wt_tsunami', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_tsunami : '';
            })
            ->addColumn('k_puyuh', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_puyuh : '';
            })
            ->addColumn('f_puyuh', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_puyuh : '';
            })
            ->addColumn('kj_puyuh', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_puyuh : '';
            })
            ->addColumn('jp_puyuh', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_puyuh : '';
            })
            ->addColumn('wt_puyuh', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_puyuh : '';
            })
            ->addColumn('k_gunungm', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_gunungm : '';
            })
            ->addColumn('f_gunungm', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_gunungm : '';
            })
            ->addColumn('kj_gunungm', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_gunungm : '';
            })
            ->addColumn('jp_gunungm', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_gunungm : '';
            })
            ->addColumn('wt_gunungm', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_gunungm : '';
            })
            ->addColumn('k_hutank', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_hutank : '';
            })
            ->addColumn('f_hutank', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_hutank : '';
            })
            ->addColumn('kj_hutank', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_hutank : '';
            })
            ->addColumn('jp_hutank', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_hutank : '';
            })
            ->addColumn('wt_hutank', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_hutank : '';
            })
            ->addColumn('k_kekeringan', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_kekeringan : '';
            })
            ->addColumn('f_kekeringan', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_kekeringan : '';
            })
            ->addColumn('kj_kekeringan', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_kekeringan : '';
            })
            ->addColumn('jp_kekeringan', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_kekeringan : '';
            })
            ->addColumn('wt_kekeringan', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_kekeringan : '';
            })

            ->addColumn('mitigasi_sp', function ($row) {
                $rtlokasi = rt_mitigasib::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->mitigasi_sp : '';
            })
            ->addColumn('mitigasi_spd', function ($row) {
                $rtlokasi = rt_mitigasib::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->mitigasi_spd : '';
            })
            ->addColumn('mitigasi_pk', function ($row) {
                $rtlokasi = rt_mitigasib::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->mitigasi_pk : '';
            })
            ->addColumn('mitigasi_rrj', function ($row) {
                $rtlokasi = rt_mitigasib::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->mitigasi_rrj : '';
            })
            ->addColumn('mitigasi_ppn', function ($row) {
                $rtlokasi = rt_mitigasib::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->mitigasi_ppn : '';
            })

            ->addColumn('nama_paud', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_paud : '';
            })
            ->addColumn('pemilik_paud', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_paud : '';
            })
            ->addColumn('kondisi_paud', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_paud : '';
            })
            ->addColumn('jumlahguru_paud', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_paud : '';
            })
            ->addColumn('jumlahmurid_paud', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_paud : '';
            })
            ->addColumn('jumlahpegawai_paud', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_paud : '';
            })

            ->addColumn('nama_tk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_tk : '';
            })
            ->addColumn('pemilik_tk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_tk : '';
            })
            ->addColumn('kondisi_tk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_tk : '';
            })
            ->addColumn('jumlahguru_tk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_tk : '';
            })
            ->addColumn('jumlahmurid_tk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_tk : '';
            })
            ->addColumn('jumlahpegawai_tk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_tk : '';
            })


            ->addColumn('nama_sd', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_sd : '';
            })
            ->addColumn('pemilik_sd', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_sd : '';
            })
            ->addColumn('kondisi_sd', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_sd : '';
            })
            ->addColumn('jumlahguru_sd', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_sd : '';
            })
            ->addColumn('jumlahmurid_sd', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_sd : '';
            })
            ->addColumn('jumlahpegawai_sd', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_sd : '';
            })


            ->addColumn('nama_smp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_smp : '';
            })
            ->addColumn('pemilik_smp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_smp : '';
            })
            ->addColumn('kondisi_smp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_smp : '';
            })
            ->addColumn('jumlahguru_smp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_smp : '';
            })
            ->addColumn('jumlahmurid_smp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_smp : '';
            })
            ->addColumn('jumlahpegawai_smp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_smp : '';
            })


            ->addColumn('nama_smplb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_smplb : '';
            })
            ->addColumn('pemilik_smplb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_smplb : '';
            })
            ->addColumn('kondisi_smplb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_smplb : '';
            })
            ->addColumn('jumlahguru_smplb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_smplb : '';
            })
            ->addColumn('jumlahmurid_smplb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_smplb : '';
            })
            ->addColumn('jumlahpegawai_smplb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_smplb : '';
            })


            ->addColumn('nama_sma', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_sma : '';
            })
            ->addColumn('pemilik_sma', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_sma : '';
            })
            ->addColumn('kondisi_sma', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_sma : '';
            })
            ->addColumn('jumlahguru_sma', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_sma : '';
            })
            ->addColumn('jumlahmurid_sma', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_sma : '';
            })
            ->addColumn('jumlahpegawai_sma', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_sma : '';
            })

            ->addColumn('nama_smk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_smk : '';
            })
            ->addColumn('pemilik_smk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_smk : '';
            })
            ->addColumn('kondisi_smk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_smk : '';
            })
            ->addColumn('jumlahguru_smk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_smk : '';
            })
            ->addColumn('jumlahmurid_smk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_smk : '';
            })
            ->addColumn('jumlahpegawai_smk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_smk : '';
            })


            ->addColumn('nama_smalb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_smalb : '';
            })
            ->addColumn('pemilik_smalb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_smalb : '';
            })
            ->addColumn('kondisi_smalb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_smalb : '';
            })
            ->addColumn('jumlahguru_smalb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_smalb : '';
            })
            ->addColumn('jumlahmurid_smalb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_smalb : '';
            })
            ->addColumn('jumlahpegawai_smalb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_smalb : '';
            })


            ->addColumn('nama_akademi', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_akademi : '';
            })
            ->addColumn('pemilik_akademi', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_akademi : '';
            })
            ->addColumn('kondisi_akademi', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_akademi : '';
            })
            ->addColumn('jumlahguru_akademi', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_akademi : '';
            })
            ->addColumn('jumlahmurid_akademi', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_akademi : '';
            })
            ->addColumn('jumlahpegawai_akademi', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_akademi : '';
            })


            ->addColumn('nama_pesantren', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_pesantren : '';
            })
            ->addColumn('pemilik_pesantren', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_pesantren : '';
            })
            ->addColumn('kondisi_pesantren', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_pesantren : '';
            })
            ->addColumn('jumlahguru_pesantren', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_pesantren : '';
            })
            ->addColumn('jumlahmurid_pesantren', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_pesantren : '';
            })
            ->addColumn('jumlahpegawai_pesantren', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_pesantren : '';
            })

            ->addColumn('nama_madrasahdn', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_madrasahdn : '';
            })
            ->addColumn('pemilik_madrasahdn', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_madrasahdn : '';
            })
            ->addColumn('kondisi_madrasahdn', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_madrasahdn : '';
            })
            ->addColumn('jumlahguru_madrasahdn', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_madrasahdn : '';
            })
            ->addColumn('jumlahmurid_madrasahdn', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_madrasahdn : '';
            })
            ->addColumn('jumlahpegawai_madrasahdn', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_madrasahdn : '';
            })


            ->addColumn('nama_seminari', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_seminari : '';
            })
            ->addColumn('pemilik_seminari', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_seminari : '';
            })
            ->addColumn('kondisi_seminari', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_seminari : '';
            })
            ->addColumn('jumlahguru_seminari', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_seminari : '';
            })
            ->addColumn('jumlahmurid_seminari', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_seminari : '';
            })
            ->addColumn('jumlahpegawai_seminari', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_seminari : '';
            })


            ->addColumn('nama_sekolahag', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_sekolahag : '';
            })
            ->addColumn('pemilik_sekolahag', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_sekolahag : '';
            })
            ->addColumn('kondisi_sekolahag', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_sekolahag : '';
            })
            ->addColumn('jumlahguru_sekolahag', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_sekolahag : '';
            })
            ->addColumn('jumlahmurid_sekolahag', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_sekolahag : '';
            })
            ->addColumn('jumlahpegawai_sekolahag', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_sekolahag : '';
            })


            ->addColumn('nama_butaaksara', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_butaaksara : '';
            })
            ->addColumn('pemilik_butaaksara', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_butaaksara : '';
            })
            ->addColumn('kondisi_butaaksara', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_butaaksara : '';
            })
            ->addColumn('jumlahguru_butaaksara', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_butaaksara : '';
            })
            ->addColumn('jumlahmurid_butaaksara', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_butaaksara : '';
            })
            ->addColumn('jumlahpegawai_butaaksara', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_butaaksara : '';
            })


            ->addColumn('nama_paketa', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_paketa : '';
            })
            ->addColumn('pemilik_paketa', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_paketa : '';
            })
            ->addColumn('kondisi_paketa', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_paketa : '';
            })
            ->addColumn('jumlahguru_paketa', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_paketa : '';
            })
            ->addColumn('jumlahmurid_paketa', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_paketa : '';
            })
            ->addColumn('jumlahpegawai_paketa', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_paketa : '';
            })


            ->addColumn('nama_paketb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_paketb : '';
            })
            ->addColumn('pemilik_paketb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_paketb : '';
            })
            ->addColumn('kondisi_paketb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_paketb : '';
            })
            ->addColumn('jumlahguru_paketb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_paketb : '';
            })
            ->addColumn('jumlahmurid_paketb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_paketb : '';
            })
            ->addColumn('jumlahpegawai_paketb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_paketb : '';
            })

            ->addColumn('nama_paketc', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_paketc : '';
            })
            ->addColumn('pemilik_paketc', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_paketc : '';
            })
            ->addColumn('kondisi_paketc', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_paketc : '';
            })
            ->addColumn('jumlahguru_paketc', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_paketc : '';
            })
            ->addColumn('jumlahmurid_paketc', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_paketc : '';
            })
            ->addColumn('jumlahpegawai_paketc', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_paketc : '';
            })

            ->addColumn('nama_playgrup', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_playgrup : '';
            })
            ->addColumn('pemilik_playgrup', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_playgrup : '';
            })
            ->addColumn('kondisi_playgrup', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_playgrup : '';
            })
            ->addColumn('jumlahguru_playgrup', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_playgrup : '';
            })
            ->addColumn('jumlahmurid_playgrup', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_playgrup : '';
            })
            ->addColumn('jumlahpegawai_playgrup', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_playgrup : '';
            })

            ->addColumn('nama_penitipananak', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_penitipananak : '';
            })
            ->addColumn('pemilik_penitipananak', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_penitipananak : '';
            })
            ->addColumn('kondisi_penitipananak', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_penitipananak : '';
            })
            ->addColumn('jumlahguru_penitipananak', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_penitipananak : '';
            })
            ->addColumn('jumlahmurid_penitipananak', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_penitipananak : '';
            })
            ->addColumn('jumlahpegawai_penitipananak', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_penitipananak : '';
            })


            ->addColumn('nama_pendidikanq', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_pendidikanq : '';
            })
            ->addColumn('pemilik_pendidikanq', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_pendidikanq : '';
            })
            ->addColumn('kondisi_pendidikanq', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_pendidikanq : '';
            })
            ->addColumn('jumlahguru_pendidikanq', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_pendidikanq : '';
            })
            ->addColumn('jumlahmurid_pendidikanq', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_pendidikanq : '';
            })
            ->addColumn('jumlahpegawai_pendidikanq', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_pendidikanq : '';
            })

            ->addColumn('nama_bahasaas', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_bahasaas : '';
            })
            ->addColumn('pemilik_bahasaas', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_bahasaas : '';
            })
            ->addColumn('kondisi_bahasaas', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bahasaas : '';
            })
            ->addColumn('jumlahguru_bahasaas', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_bahasaas : '';
            })
            ->addColumn('jumlahmurid_bahasaas', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_bahasaas : '';
            })
            ->addColumn('jumlahpegawai_bahasaas', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_bahasaas : '';
            })

            ->addColumn('nama_kursuskomp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_kursuskomp : '';
            })
            ->addColumn('pemilik_kursuskomp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_kursuskomp : '';
            })
            ->addColumn('kondisi_kursuskomp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kursuskomp : '';
            })
            ->addColumn('jumlahguru_kursuskomp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_kursuskomp : '';
            })
            ->addColumn('jumlahmurid_kursuskomp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_kursuskomp : '';
            })
            ->addColumn('jumlahpegawai_kursuskomp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_kursuskomp : '';
            })

            ->addColumn('nama_kursusmenjahit', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_kursusmenjahit : '';
            })
            ->addColumn('pemilik_kursusmenjahit', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_kursusmenjahit : '';
            })
            ->addColumn('kondisi_kursusmenjahit', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kursusmenjahit : '';
            })
            ->addColumn('jumlahguru_kursusmenjahit', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_kursusmenjahit : '';
            })
            ->addColumn('jumlahmurid_kursusmenjahit', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_kursusmenjahit : '';
            })
            ->addColumn('jumlahpegawai_kursusmenjahit', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_kursusmenjahit : '';
            })


            ->addColumn('nama_kursuskecantikan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_kursuskecantikan : '';
            })
            ->addColumn('pemilik_kursuskecantikan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_kursuskecantikan : '';
            })
            ->addColumn('kondisi_kursuskecantikan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kursuskecantikan : '';
            })
            ->addColumn('jumlahguru_kursuskecantikan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_kursuskecantikan : '';
            })
            ->addColumn('jumlahmurid_kursuskecantikan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_kursuskecantikan : '';
            })
            ->addColumn('jumlahpegawai_kursuskecantikan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_kursuskecantikan : '';
            })

            ->addColumn('nama_kursusmontir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_kursusmontir : '';
            })
            ->addColumn('pemilik_kursusmontir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_kursusmontir : '';
            })
            ->addColumn('kondisi_kursusmontir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kursusmontir : '';
            })
            ->addColumn('jumlahguru_kursusmontir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_kursusmontir : '';
            })
            ->addColumn('jumlahmurid_kursusmontir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_kursusmontir : '';
            })
            ->addColumn('jumlahpegawai_kursusmontir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_kursusmontir : '';
            })

            ->addColumn('nama_kursussetir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_kursussetir : '';
            })
            ->addColumn('pemilik_kursussetir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_kursussetir : '';
            })
            ->addColumn('kondisi_kursussetir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kursussetir : '';
            })
            ->addColumn('jumlahguru_kursussetir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_kursussetir : '';
            })
            ->addColumn('jumlahmurid_kursussetir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_kursussetir : '';
            })
            ->addColumn('jumlahpegawai_kursussetir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_kursussetir : '';
            })

            ->addColumn('nama_kursuselektronik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_kursuselektronik : '';
            })
            ->addColumn('pemilik_kursuselektronik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_kursuselektronik : '';
            })
            ->addColumn('kondisi_kursuselektronik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kursuselektronik : '';
            })
            ->addColumn('jumlahguru_kursuselektronik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_kursuselektronik : '';
            })
            ->addColumn('jumlahmurid_kursuselektronik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_kursuselektronik : '';
            })
            ->addColumn('jumlahpegawai_kursuselektronik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_kursuselektronik : '';
            })

            ->addColumn('nama_tataboga', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_tataboga : '';
            })
            ->addColumn('pemilik_tataboga', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_tataboga : '';
            })
            ->addColumn('kondisi_tataboga', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_tataboga : '';
            })
            ->addColumn('jumlahguru_tataboga', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_tataboga : '';
            })
            ->addColumn('jumlahmurid_tataboga', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_tataboga : '';
            })
            ->addColumn('jumlahpegawai_tataboga', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_tataboga : '';
            })

            ->addColumn('nama_kursusketik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_kursusketik : '';
            })
            ->addColumn('pemilik_kursusketik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_kursusketik : '';
            })
            ->addColumn('kondisi_kursusketik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kursusketik : '';
            })
            ->addColumn('jumlahguru_kursusketik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_kursusketik : '';
            })
            ->addColumn('jumlahmurid_kursusketik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_kursusketik : '';
            })
            ->addColumn('jumlahpegawai_kursusketik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_kursusketik : '';
            })

            ->addColumn('nama_kursusakuntan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_kursusakuntan : '';
            })
            ->addColumn('pemilik_kursusakuntan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_kursusakuntan : '';
            })
            ->addColumn('kondisi_kursusakuntan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kursusakuntan : '';
            })
            ->addColumn('jumlahguru_kursusakuntan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_kursusakuntan : '';
            })
            ->addColumn('jumlahmurid_kursusakuntan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_kursusakuntan : '';
            })
            ->addColumn('jumlahpegawai_kursusakuntan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_kursusakuntan : '';
            })

            ->addColumn('nama_kursuslain', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_kursuslain : '';
            })
            ->addColumn('pemilik_kursuslain', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_kursuslain : '';
            })
            ->addColumn('kondisi_kursuslain', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kursuslain : '';
            })
            ->addColumn('jumlahguru_kursuslain', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_kursuslain : '';
            })
            ->addColumn('jumlahmurid_kursuslain', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_kursuslain : '';
            })
            ->addColumn('jumlahpegawai_kursuslain', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_kursuslain : '';
            })

            ->addColumn('nama_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_rs : '';
            })
            ->addColumn('pemilik_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_rs : '';
            })
            ->addColumn('jd_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_rs : '';
            })
            ->addColumn('jb_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_rs : '';
            })
            ->addColumn('jts_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_rs : '';
            })
            ->addColumn('jp_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_rs : '';
            })

            ->addColumn('nama_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_rsb : '';
            })
            ->addColumn('pemilik_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_rsb : '';
            })
            ->addColumn('jd_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_rsb : '';
            })
            ->addColumn('jb_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_rsb : '';
            })
            ->addColumn('jts_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_rsb : '';
            })
            ->addColumn('jp_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_rsb : '';
            })

            ->addColumn('nama_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_pdri : '';
            })
            ->addColumn('pemilik_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_pdri : '';
            })
            ->addColumn('jd_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_pdri : '';
            })
            ->addColumn('jb_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_pdri : '';
            })
            ->addColumn('jts_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_pdri : '';
            })
            ->addColumn('jp_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_pdri : '';
            })

            ->addColumn('nama_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_ptri : '';
            })
            ->addColumn('pemilik_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_ptri : '';
            })
            ->addColumn('jd_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_ptri : '';
            })
            ->addColumn('jb_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_ptri : '';
            })
            ->addColumn('jts_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_ptri : '';
            })
            ->addColumn('jp_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_ptri : '';
            })

            ->addColumn('nama_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_pp : '';
            })
            ->addColumn('pemilik_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_pp : '';
            })
            ->addColumn('jd_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_pp : '';
            })
            ->addColumn('jb_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_pp : '';
            })
            ->addColumn('jts_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_pp : '';
            })
            ->addColumn('jp_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_pp : '';
            })


            ->addColumn('nama_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_pbp : '';
            })
            ->addColumn('pemilik_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_pbp : '';
            })
            ->addColumn('jd_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_pbp : '';
            })
            ->addColumn('jb_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_pbp : '';
            })
            ->addColumn('jts_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_pbp : '';
            })
            ->addColumn('jp_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_pbp : '';
            })



            ->addColumn('nama_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_tpd : '';
            })
            ->addColumn('pemilik_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_tpd : '';
            })
            ->addColumn('jd_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_tpd : '';
            })
            ->addColumn('jb_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_tpd : '';
            })
            ->addColumn('jts_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_tpd : '';
            })
            ->addColumn('jp_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_tpd : '';
            })


            ->addColumn('nama_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_rb : '';
            })
            ->addColumn('pemilik_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_rb : '';
            })
            ->addColumn('jd_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_rb : '';
            })
            ->addColumn('jb_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_rb : '';
            })
            ->addColumn('jts_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_rb : '';
            })
            ->addColumn('jp_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_rb : '';
            })


            ->addColumn('nama_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_tpb : '';
            })
            ->addColumn('pemilik_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_tpb : '';
            })
            ->addColumn('jd_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_tpb : '';
            })
            ->addColumn('jb_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_tpb : '';
            })
            ->addColumn('jts_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_tpb : '';
            })
            ->addColumn('jp_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_tpb : '';
            })



            ->addColumn('nama_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_poskedes : '';
            })
            ->addColumn('pemilik_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_poskedes : '';
            })
            ->addColumn('jd_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_poskedes : '';
            })
            ->addColumn('jb_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_poskedes : '';
            })
            ->addColumn('jts_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_poskedes : '';
            })
            ->addColumn('jp_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_poskedes : '';
            })


            ->addColumn('nama_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_polindes : '';
            })
            ->addColumn('pemilik_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_polindes : '';
            })
            ->addColumn('jd_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_polindes : '';
            })
            ->addColumn('jb_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_polindes : '';
            })
            ->addColumn('jts_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_polindes : '';
            })
            ->addColumn('jp_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_polindes : '';
            })



            ->addColumn('nama_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_apotik : '';
            })
            ->addColumn('pemilik_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_apotik : '';
            })
            ->addColumn('jd_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_apotik : '';
            })
            ->addColumn('jb_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_apotik : '';
            })
            ->addColumn('jts_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_apotik : '';
            })
            ->addColumn('jp_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_apotik : '';
            })


            ->addColumn('nama_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_tokojamu : '';
            })
            ->addColumn('pemilik_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_tokojamu : '';
            })
            ->addColumn('jd_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_tokojamu : '';
            })
            ->addColumn('jb_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_tokojamu : '';
            })
            ->addColumn('jts_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_tokojamu : '';
            })
            ->addColumn('jp_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_tokojamu : '';
            })


            ->addColumn('nama_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_posyandu : '';
            })
            ->addColumn('pemilik_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_posyandu : '';
            })
            ->addColumn('jd_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_posyandu : '';
            })
            ->addColumn('jb_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_posyandu : '';
            })
            ->addColumn('jts_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_posyandu : '';
            })
            ->addColumn('jp_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_posyandu : '';
            })


            ->addColumn('nama_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_posbindu : '';
            })
            ->addColumn('pemilik_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_posbindu : '';
            })
            ->addColumn('jd_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_posbindu : '';
            })
            ->addColumn('jb_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_posbindu : '';
            })
            ->addColumn('jts_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_posbindu : '';
            })
            ->addColumn('jp_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_posbindu : '';
            })


            ->addColumn('nama_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_tpd : '';
            })
            ->addColumn('pemilik_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_tpd : '';
            })
            ->addColumn('jd_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_tpd : '';
            })
            ->addColumn('jb_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_tpd : '';
            })
            ->addColumn('jts_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_tpd : '';
            })
            ->addColumn('jp_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_tpd : '';
            })

            ->addColumn('nama_muntaber', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_muntaber : '';
            })
            ->addColumn('jp_muntaber', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_muntaber : '';
            })
            ->addColumn('jm_muntaber', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_muntaber : '';
            })
            ->addColumn('nama_dbd', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_dbd : '';
            })
            ->addColumn('jp_dbd', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_dbd : '';
            })
            ->addColumn('jm_dbd', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_dbd : '';
            })
            ->addColumn('nama_campak', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_campak : '';
            })
            ->addColumn('jp_campak', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_campak : '';
            })
            ->addColumn('jm_campak', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_campak : '';
            })
            ->addColumn('nama_malaria', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_malaria : '';
            })
            ->addColumn('jp_malaria', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_malaria : '';
            })
            ->addColumn('jm_malaria', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_malaria : '';
            })
            ->addColumn('nama_fluburung', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_fluburung : '';
            })
            ->addColumn('jp_fluburung', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_fluburung : '';
            })
            ->addColumn('jm_fluburung', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_fluburung : '';
            })
            ->addColumn('nama_covid19', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_covid19 : '';
            })
            ->addColumn('jp_covid19', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_covid19 : '';
            })
            ->addColumn('jm_covid19', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_covid19 : '';
            })
            ->addColumn('nama_hepatitisb', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_hepatitisb : '';
            })
            ->addColumn('jp_hepatitisb', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_hepatitisb : '';
            })
            ->addColumn('jm_hepatitisb', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_hepatitisb : '';
            })
            ->addColumn('nama_hepatitise', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_hepatitise : '';
            })
            ->addColumn('jp_hepatitise', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_hepatitise : '';
            })
            ->addColumn('jm_hepatitise', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_hepatitise : '';
            })
            ->addColumn('nama_dipteri', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_dipteri : '';
            })
            ->addColumn('jp_dipteri', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_dipteri : '';
            })
            ->addColumn('jm_dipteri', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_dipteri : '';
            })
            ->addColumn('nama_chikung', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_chikung : '';
            })
            ->addColumn('jp_chikung', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_chikung : '';
            })
            ->addColumn('jm_chikung', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_chikung : '';
            })

            ->addColumn('nama_leptos', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_leptos : '';
            })
            ->addColumn('jp_leptos', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_leptos : '';
            })
            ->addColumn('jm_leptos', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_leptos : '';
            })


            ->addColumn('nama_kolera', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_kolera : '';
            })
            ->addColumn('jp_kolera', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_kolera : '';
            })
            ->addColumn('jm_kolera', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_kolera : '';
            })


            ->addColumn('nama_giziburuk', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_giziburuk : '';
            })
            ->addColumn('jp_giziburuk', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_giziburuk : '';
            })
            ->addColumn('jm_giziburuk', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_giziburuk : '';
            })


            ->addColumn('nama_lainnya', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_lainnya : '';
            })
            ->addColumn('jp_lainnya', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_lainnya : '';
            })
            ->addColumn('jm_lainnya', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_lainnya : '';
            })

            ->addColumn('jumlahwarga_jamkes', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahwarga_jamkes : '';
            })
            ->addColumn('jumlahwarga_jamketerangan', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahwarga_jamketerangan : '';
            })
            ->addColumn('jumlahtempat_masjid', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_masjid : '';
            })
            ->addColumn('jumlahtempat_musholla', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_musholla : '';
            })
            ->addColumn('jumlahtempat_kristen', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_kristen : '';
            })
            ->addColumn('jumlahtempat_katolik', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_katolik : '';
            })
            ->addColumn('jumlahtempat_kapel', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_kapel : '';
            })
            ->addColumn('jumlahtempat_pura', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_pura : '';
            })
            ->addColumn('jumlahtempat_wihara', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_wihara : '';
            })
            ->addColumn('jumlahtempat_kelenteng', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_kelenteng : '';
            })
            ->addColumn('jumlahtempat_lainnya', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_lainnya : '';
            })
            ->addColumn('cagar_bud1', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->cagar_bud1 : '';
            })
            ->addColumn('cagar_bud2', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->cagar_bud2 : '';
            })
            ->addColumn('cagar_bud3', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->cagar_bud3 : '';
            })
            ->addColumn('sukuasing_keluarga', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->sukuasing_keluarga : '';
            })
            ->addColumn('sukuasing_jiwa', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->sukuasing_jiwa : '';
            })
            ->addColumn('ruangpublik_terbuka', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->ruangpublik_terbuka : '';
            })
            ->addColumn('adat_kehamilan', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_kehamilan : '';
            })
            ->addColumn('adat_kelahiran', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_kelahiran : '';
            })
            ->addColumn('adat_pekerjaan', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_pekerjaan : '';
            })
            ->addColumn('adat_alam', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_alam : '';
            })
            ->addColumn('adat_perkawinan', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_perkawinan : '';
            })
            ->addColumn('adat_kehidupanwarga', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_kehidupanwarga : '';
            })
            ->addColumn('adat_kematian', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_kematian : '';
            })

            ->addColumn('namalembaga', function ($row) {
                $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $row->nik)->first();
                return $rtlembaga_keagamaan ? $rtlembaga_keagamaan->nama : '';
            })
            ->addColumn('jumlah_peng', function ($row) {
                $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $row->nik)->first();
                return $rtlembaga_keagamaan ? $rtlembaga_keagamaan->jumlah_peng : '';
            })
            ->addColumn('jumlah_ang', function ($row) {
                $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $row->nik)->first();
                return $rtlembaga_keagamaan ? $rtlembaga_keagamaan->jumlah_ang : '';
            })
            ->addColumn('fasilitas', function ($row) {
                $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $row->nik)->first();
                return $rtlembaga_keagamaan ? $rtlembaga_keagamaan->fasilitas : '';
            })

            ->addColumn('namalembagamas', function ($row) {
                $rtlokasi = lembaga_masyarakat::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama : '';
            })
            ->addColumn('jumlah_kel', function ($row) {
                $rtlokasi = lembaga_masyarakat::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_kel : '';
            })
            ->addColumn('jumlah_peng', function ($row) {
                $rtlokasi = lembaga_masyarakat::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_peng : '';
            })
            ->addColumn('jumlah_ang', function ($row) {
                $rtlokasi = lembaga_masyarakat::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_ang : '';
            })
            ->addColumn('fasilitas', function ($row) {
                $rtlokasi = lembaga_masyarakat::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->fasilitas : '';
            })


            ->addColumn('penyebabu_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_antarkelompokmas : '';
            })
            ->addColumn('jk_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_antarkelompokmas : '';
            })
            ->addColumn('jkl_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_antarkelompokmas : '';
            })
            ->addColumn('jt_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_antarkelompokmas : '';
            })
            ->addColumn('pen_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_antarkelompokmas : '';
            })
            ->addColumn('pp_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_antarkelompokmas : '';
            })
            ->addColumn('penyebabu_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_antardesa : '';
            })
            ->addColumn('jk_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_antardesa : '';
            })
            ->addColumn('jkl_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_antardesa : '';
            })
            ->addColumn('jt_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_antardesa : '';
            })
            ->addColumn('pen_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_antardesa : '';
            })
            ->addColumn('pp_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_antardesa : '';
            })
            ->addColumn('penyebabu_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_aparatmk : '';
            })
            ->addColumn('jk_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_aparatmk : '';
            })
            ->addColumn('jkl_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_aparatmk : '';
            })
            ->addColumn('jt_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_aparatmk : '';
            })
            ->addColumn('pen_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_aparatmk : '';
            })
            ->addColumn('pp_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_aparatmk : '';
            })
            ->addColumn('penyebabu_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_aparatmp : '';
            })
            ->addColumn('jk_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_aparatmp : '';
            })
            ->addColumn('jkl_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_aparatmp : '';
            })
            ->addColumn('jt_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_aparatmp : '';
            })
            ->addColumn('pen_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_aparatmp : '';
            })
            ->addColumn('pp_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_aparatmp : '';
            })
            ->addColumn('penyebabu_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_aparatk : '';
            })
            ->addColumn('jk_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_aparatk : '';
            })
            ->addColumn('jkl_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_aparatk : '';
            })
            ->addColumn('jt_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_aparatk : '';
            })
            ->addColumn('pen_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_aparatk : '';
            })
            ->addColumn('pp_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_aparatk : '';
            })
            ->addColumn('penyebabu_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_aparatp : '';
            })
            ->addColumn('jk_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_aparatp : '';
            })
            ->addColumn('jkl_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_aparatp : '';
            })
            ->addColumn('jt_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_aparatp : '';
            })
            ->addColumn('pen_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_aparatp : '';
            })
            ->addColumn('pp_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_aparatp : '';
            })
            ->addColumn('penyebabu_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_pelajar : '';
            })
            ->addColumn('jk_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pelajar : '';
            })
            ->addColumn('jkl_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_pelajar : '';
            })
            ->addColumn('jt_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_pelajar : '';
            })
            ->addColumn('pen_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_pelajar : '';
            })
            ->addColumn('pp_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_pelajar : '';
            })
            ->addColumn('penyebabu_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_suku : '';
            })
            ->addColumn('jk_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_suku : '';
            })
            ->addColumn('jkl_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_suku : '';
            })
            ->addColumn('jt_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_suku : '';
            })
            ->addColumn('pen_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_suku : '';
            })
            ->addColumn('pp_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_suku : '';
            })
            ->addColumn('penyebabu_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_lainnya : '';
            })
            ->addColumn('jk_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_lainnya : '';
            })
            ->addColumn('jkl_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_lainnya : '';
            })
            ->addColumn('jt_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_lainnya : '';
            })
            ->addColumn('pen_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_lainnya : '';
            })
            ->addColumn('pp_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_lainnya : '';
            })

            ->addColumn('jk_pencurian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pencurian : '';
            })
            ->addColumn('jumlahselesai_pencurian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_pencurian : '';
            })
            ->addColumn('jktbd_pencurian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_pencurian : '';
            })
            ->addColumn('kll_pencurian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_pencurian : '';
            })
            ->addColumn('kt_pencurian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_pencurian : '';
            })
            ->addColumn('jk_pencuriankeras', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pencuriankeras : '';
            })
            ->addColumn('jumlahselesai_pencuriankeras', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_pencuriankeras : '';
            })
            ->addColumn('jktbd_pencuriankeras', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_pencuriankeras : '';
            })
            ->addColumn('kll_pencuriankeras', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_pencuriankeras : '';
            })
            ->addColumn('kt_pencuriankeras', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_pencuriankeras : '';
            })
            ->addColumn('jk_penipuan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_penipuan : '';
            })
            ->addColumn('jumlahselesai_penipuan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_penipuan : '';
            })
            ->addColumn('jktbd_penipuan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_penipuan : '';
            })
            ->addColumn('kll_penipuan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_penipuan : '';
            })
            ->addColumn('kt_penipuan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_penipuan : '';
            })
            ->addColumn('jk_penganiyayaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_penganiyayaan : '';
            })
            ->addColumn('jumlahselesai_penganiyayaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_penganiyayaan : '';
            })
            ->addColumn('jktbd_penganiyayaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_penganiyayaan : '';
            })
            ->addColumn('kll_penganiyayaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_penganiyayaan : '';
            })
            ->addColumn('kt_penganiyayaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_penganiyayaan : '';
            })
            ->addColumn('jk_pembakaran', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pembakaran : '';
            })
            ->addColumn('jumlahselesai_pembakaran', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_pembakaran : '';
            })
            ->addColumn('jktbd_pembakaran', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_pembakaran : '';
            })
            ->addColumn('kll_pembakaran', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_pembakaran : '';
            })
            ->addColumn('kt_pembakaran', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_pembakaran : '';
            })
            ->addColumn('jk_pemerkosaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pemerkosaan : '';
            })
            ->addColumn('jumlahselesai_pemerkosaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_pemerkosaan : '';
            })
            ->addColumn('jktbd_pemerkosaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_pemerkosaan : '';
            })
            ->addColumn('kll_pemerkosaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_pemerkosaan : '';
            })
            ->addColumn('kt_pemerkosaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_pemerkosaan : '';
            })
            ->addColumn('jk_narkoba', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_narkoba : '';
            })
            ->addColumn('jumlahselesai_narkoba', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_narkoba : '';
            })
            ->addColumn('jktbd_narkoba', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_narkoba : '';
            })
            ->addColumn('kll_narkoba', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_narkoba : '';
            })
            ->addColumn('kt_narkoba', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_narkoba : '';
            })
            ->addColumn('jk_perjudian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_perjudian : '';
            })
            ->addColumn('jumlahselesai_perjudian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_perjudian : '';
            })
            ->addColumn('jktbd_perjudian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_perjudian : '';
            })
            ->addColumn('kll_perjudian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_perjudian : '';
            })
            ->addColumn('kt_perjudian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_perjudian : '';
            })
            ->addColumn('jk_pembunuhan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pembunuhan : '';
            })
            ->addColumn('jumlahselesai_pembunuhan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_pembunuhan : '';
            })
            ->addColumn('jktbd_pembunuhan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_pembunuhan : '';
            })
            ->addColumn('kll_pembunuhan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_pembunuhan : '';
            })
            ->addColumn('kt_pembunuhan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_pembunuhan : '';
            })
            ->addColumn('jk_perdaganganorang', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_perdaganganorang : '';
            })
            ->addColumn('jumlahselesai_perdaganganorang', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_perdaganganorang : '';
            })
            ->addColumn('jktbd_perdaganganorang', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_perdaganganorang : '';
            })
            ->addColumn('kll_perdaganganorang', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_perdaganganorang : '';
            })
            ->addColumn('kt_perdaganganorang', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_perdaganganorang : '';
            })

            ->addColumn('jk_korupsi', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_korupsi : '';
            })
            ->addColumn('jumlahselesai_korupsi', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_korupsi : '';
            })
            ->addColumn('jktbd_korupsi', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_korupsi : '';
            })
            ->addColumn('kll_korupsi', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_korupsi : '';
            })
            ->addColumn('kt_korupsi', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_korupsi : '';
            })

            ->addColumn('jk_lainnya', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_lainnya : '';
            })
            ->addColumn('jumlahselesai_lainnya', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_lainnya : '';
            })
            ->addColumn('jktbd_lainnya', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_lainnya : '';
            })
            ->addColumn('kll_lainnya', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_lainnya : '';
            })
            ->addColumn('kt_lainnya', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_lainnya : '';
            })

            ->addColumn('jumlah_kpp', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->jumlah_kpp : '';
                return $data;
            })
            ->addColumn('jumlah_ppr', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->jumlah_ppr : '';
                return $data;
            })
            ->addColumn('jumlah_hansip', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->jumlah_hansip : '';
                return $data;
            })
            ->addColumn('pelaporan_tamu_lebih24', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->pelaporan_tamu_lebih24 : '';
                return $data;
            })
            ->addColumn('sistem_keamanan', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->sistem_keamanan : '';
                return $data;
            })
            ->addColumn('sistem_linmas', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->sistem_linmas : '';
                return $data;
            })
            ->addColumn('jumlahpos_digunakan', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->jumlahpos_digunakan : '';
                return $data;
            })
            ->addColumn('jumlahpos_tidakdigunakan', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->jumlahpos_tidakdigunakan : '';
                return $data;
            })
            ->addColumn('jarak_ppt', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->jarak_ppt : '';
                return $data;
            })
            ->addColumn('kemudahan_ppt', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->kemudahan_ppt : '';
                return $data;
            })
            ->addColumn('jarak_korban', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->jarak_korban : '';
                return $data;
            })
            ->addColumn('jarak_lokasikumpul', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->jarak_lokasikumpul : '';
                return $data;
            })
            ->addColumn('jarak_mangkal', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->jarak_mangkal : '';
                return $data;
            })
            ->addColumn('jarak_lokalisasi', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->jarak_lokalisasi : '';
                return $data;
            })


            ->rawColumns(['action'])
            ->toJson();
    }

    public function json(Request $request)
    {
        $query = Datart::query(); // Query the data_rt model

        if ($request->has('nik')) {
            $nik = $request->input('nik');
            $query = Datart::with([])
                ->where('nik', $nik);
        } else {
            // Jika tidak ada parameter NIK, kembalikan data kosong
            $query = Datart::whereNull('nik'); // Tidak mengembalikan data
        }

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('datart.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })

            ->addColumn('lokasi_rt_pulau', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->lokasi_rt_pulau : '';
                return $nama_ketuart;
            })

            ->addColumn('topo_terluas_rt', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->topo_terluas_rt : '';
                return $nama_ketuart;
            })
            ->addColumn('jumlah_warga_lereng', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->jumlah_warga_lereng : '';
                return $nama_ketuart;
            })
            ->addColumn('penanaman_pohon_lahan_kritis', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->penanaman_pohon_lahan_kritis : '';
                return $nama_ketuart;
            })
            ->addColumn('pantai_garis_panjang', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->pantai_garis_panjang : '';
                return $nama_ketuart;
            })
            ->addColumn('pemanfaatan_laut_perangkap', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->pemanfaatan_laut_perangkap : '';
                return $nama_ketuart;
            })
            ->addColumn('pemanfaatan_laut_budidaya', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->pemanfaatan_laut_budidaya : '';
                return $nama_ketuart;
            })
            ->addColumn('pemanfaatan_laut_tambakg', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->pemanfaatan_laut_tambakg : '';
                return $nama_ketuart;
            })
            ->addColumn('pemanfaatan_laut_bahari', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->pemanfaatan_laut_bahari : '';
                return $nama_ketuart;
            })
            ->addColumn('pemanfaatan_laut_transport', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->pemanfaatan_laut_transport : '';
                return $nama_ketuart;
            })
            ->addColumn('kondisi_mangrove', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->kondisi_mangrove : '';
                return $nama_ketuart;
            })
            ->addColumn('penanaman_mangrove', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->penanaman_mangrove : '';
                return $nama_ketuart;
            })
            ->addColumn('jumlah_warga_pesisir', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->jumlah_warga_pesisir : '';
                return $nama_ketuart;
            })
            ->addColumn('jumlah_warga_atasair', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->jumlah_warga_atasair : '';
                return $nama_ketuart;
            })
            ->addColumn('wilayah_desa_dalamhutan', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->wilayah_desa_dalamhutan : '';
                return $nama_ketuart;
            })
            ->addColumn('wilayah_desa_tepihutan', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->wilayah_desa_tepihutan : '';
                return $nama_ketuart;
            })
            ->addColumn('fungsihutan_kons', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->fungsihutan_kons : '';
                return $nama_ketuart;
            })
            ->addColumn('fungsihutan_lindung', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->fungsihutan_lindung : '';
                return $nama_ketuart;
            })
            ->addColumn('fungsihutan_produk', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->fungsihutan_produk : '';
                return $nama_ketuart;
            })
            ->addColumn('fungsihutan_hutandes', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->fungsihutan_hutandes : '';
                return $nama_ketuart;
            })
            ->addColumn('jumlahwarga_tinggal_dalamhutan', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->jumlahwarga_tinggal_dalamhutan : '';
                return $nama_ketuart;
            })
            ->addColumn('jumlahwarga_tinggal_sekitarhutan', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->jumlahwarga_tinggal_sekitarhutan : '';
                return $nama_ketuart;
            })
            ->addColumn('ketergantungan_hutan', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->ketergantungan_hutan : '';
                return $nama_ketuart;
            })
            ->addColumn('reboisasi', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->reboisasi : '';
                return $nama_ketuart;
            })
            ->addColumn('jumlah_produk_luardesa_masuk', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->jumlah_produk_luardesa_masuk : '';
                return $nama_ketuart;
            })
            ->addColumn('jumlah_produk_luardesa_keluar', function ($row) {
                $rtlokasi = rtlokasi::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->jumlah_produk_luardesa_keluar : '';
                return $nama_ketuart;
            })

            ->addColumn('nama_ketuarw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                $kondisi = $rt_pengurus ? $rt_pengurus->nama_ketuarw : '';
                return $kondisi;
            })

            ->addColumn('nik_ketuarw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nik_ketuarw : '';
            })
            ->addColumn('nohp_ketuarw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nohp_ketuarw : '';
            })
            ->addColumn('menjabat_ketuarw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->menjabat_ketuarw : '';
            })
            ->addColumn('nama_sekrw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nama_sekrw : '';
            })
            ->addColumn('nik_sekrw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nik_sekrw : '';
            })
            ->addColumn('nohp_sekrw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nohp_sekrw : '';
            })
            ->addColumn('menjabat_sekrw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->menjabat_sekrw : '';
            })
            ->addColumn('nama_benrw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nama_benrw : '';
            })
            ->addColumn('nik_benrw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nik_benrw : '';
            })
            ->addColumn('nohp_benrw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nohp_benrw : '';
            })
            ->addColumn('menjabat_benrw', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->menjabat_benrw : '';
            })
            ->addColumn('nama_ketuart', function ($row) {
                $rt_pengurus = Datart::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nama : '';
            })
            ->addColumn('nik_ketuart', function ($row) {
                $rt_pengurus = Datart::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nik : '';
            })
            ->addColumn('nohp_ketuart', function ($row) {
                $rt_pengurus = Datart::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nohp : '';
            })
            ->addColumn('menjabat_ketuart', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->menjabat_ketuart : '';
            })
            ->addColumn('nama_sekrt', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nama_sekrt : '';
            })
            ->addColumn('nik_sekrt', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nik_sekrt : '';
            })
            ->addColumn('nohp_sekrt', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nohp_sekrt : '';
            })
            ->addColumn('menjabat_sekrt', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->menjabat_sekrt : '';
            })
            ->addColumn('nama_benrt', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nama_benrt : '';
            })
            ->addColumn('nik_benrt', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nik_benrt : '';
            })
            ->addColumn('nohp_benrt', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->nohp_benrt : '';
            })
            ->addColumn('menjabat_benrt', function ($row) {
                $rt_pengurus = rtpuengurus::where('nik', $row->nik)->first();
                return $rt_pengurus ? $rt_pengurus->menjabat_benrt : '';
            })

            ->addColumn('agentik_jp', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->agentik_jp : '';
            })
            ->addColumn('agentik_jtk', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->agentik_jtk : '';
            })
            ->addColumn('jtri_sentra', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->jtri_sentra : '';
            })
            ->addColumn('jtri_lingkungan', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->jtri_lingkungan : '';
            })
            ->addColumn('jtri_kampung', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->jtri_kampung : '';
            })
            ->addColumn('diskotik_kpd', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->diskotik_kpd : '';
            })
            ->addColumn('diskotik_jtl', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->diskotik_jtl : '';
            })
            ->addColumn('lpg_kpapm', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->lpg_kpapm : '';
            })
            ->addColumn('lpg_kpapg', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->lpg_kpapg : '';
            })
            ->addColumn('koperasi_jumlah', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_jumlah : '';
            })
            ->addColumn('koperasi_kudproduksi', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudproduksi : '';
            })
            ->addColumn('koperasi_kudkredit', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudkredit : '';
            })
            ->addColumn('koperasi_kudkegiatan', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudkegiatan : '';
            })
            ->addColumn('koperasi_kudindustrik', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudindustrik : '';
            })
            ->addColumn('koperasi_kudksp', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudksp : '';
            })
            ->addColumn('koperasi_kudksu', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudksu : '';
            })
            ->addColumn('koperasi_kudlainnya', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->koperasi_kudlainnya : '';
            })
            ->addColumn('kos_kud', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->kos_kud : '';
            })
            ->addColumn('kos_bumdes', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->kos_bumdes : '';
            })
            ->addColumn('kos_selain', function ($row) {
                $rtlembaga_ekonomi = rtlembaga_ekonomi::where('nik', $row->nik)->first();
                return $rtlembaga_ekonomi ? $rtlembaga_ekonomi->kos_selain : '';
            })

            ->addColumn('jumlahindustrik_kulit', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kulit = $rt_industri ? $rt_industri->jumlahindustrik_kulit : '';
                return $kulit;
            })

            ->addColumn('jumlahindustris_kulit', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kulit = $rt_industri ? $rt_industri->jumlahindustris_kulit : '';
                return $kulit;
            })

            ->addColumn('jumlahmanajemen_kulit', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kulit = $rt_industri ? $rt_industri->jumlahmanajemen_kulit : '';
                return $kulit;
            })

            ->addColumn('jumlahpekerja_kulit', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kulit = $rt_industri ? $rt_industri->jumlahindustrik_kulit : '';
                return $kulit;
            })

            ->addColumn('jumlahindustrik_kayu', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kayu = $rt_industri ? $rt_industri->jumlahindustrik_kayu : '';
                return $kayu;
            })

            ->addColumn('jumlahindustris_kayu', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kayu = $rt_industri ? $rt_industri->jumlahindustris_kayu : '';
                return $kayu;
            })

            ->addColumn('jumlahmanajemen_kayu', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kayu = $rt_industri ? $rt_industri->jumlahmanajemen_kayu : '';
                return $kayu;
            })

            ->addColumn('jumlahpekerja_kayu', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kayu = $rt_industri ? $rt_industri->jumlahindustrik_kayu : '';
                return $kayu;
            })

            ->addColumn('jumlahindustrik_logam', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $logam = $rt_industri ? $rt_industri->jumlahindustrik_logam : '';
                return $logam;
            })

            ->addColumn('jumlahindustris_logam', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $logam = $rt_industri ? $rt_industri->jumlahindustris_logam : '';
                return $logam;
            })

            ->addColumn('jumlahmanajemen_logam', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $logam = $rt_industri ? $rt_industri->jumlahmanajemen_logam : '';
                return $logam;
            })

            ->addColumn('jumlahpekerja_logam', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $logam = $rt_industri ? $rt_industri->jumlahindustrik_logam : '';
                return $logam;
            })

            ->addColumn('jumlahindustrik_logamb', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $logamb = $rt_industri ? $rt_industri->jumlahindustrik_logamb : '';
                return $logamb;
            })

            ->addColumn('jumlahindustris_logamb', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $logamb = $rt_industri ? $rt_industri->jumlahindustris_logamb : '';
                return $logamb;
            })

            ->addColumn('jumlahmanajemen_logamb', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $logamb = $rt_industri ? $rt_industri->jumlahmanajemen_logamb : '';
                return $logamb;
            })

            ->addColumn('jumlahpekerja_logamb', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $logamb = $rt_industri ? $rt_industri->jumlahindustrik_logamb : '';
                return $logamb;
            })

            ->addColumn('jumlahindustrik_kain', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kain = $rt_industri ? $rt_industri->jumlahindustrik_kain : '';
                return $kain;
            })

            ->addColumn('jumlahindustris_kain', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kain = $rt_industri ? $rt_industri->jumlahindustris_kain : '';
                return $kain;
            })

            ->addColumn('jumlahmanajemen_kain', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kain = $rt_industri ? $rt_industri->jumlahmanajemen_kain : '';
                return $kain;
            })

            ->addColumn('jumlahpekerja_kain', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $kain = $rt_industri ? $rt_industri->jumlahindustrik_kain : '';
                return $kain;
            })

            ->addColumn('jumlahindustrik_keramik', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $keramik = $rt_industri ? $rt_industri->jumlahindustrik_keramik : '';
                return $keramik;
            })

            ->addColumn('jumlahindustris_keramik', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $keramik = $rt_industri ? $rt_industri->jumlahindustris_keramik : '';
                return $keramik;
            })

            ->addColumn('jumlahmanajemen_keramik', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $keramik = $rt_industri ? $rt_industri->jumlahmanajemen_keramik : '';
                return $keramik;
            })

            ->addColumn('jumlahpekerja_keramik', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $keramik = $rt_industri ? $rt_industri->jumlahindustrik_keramik : '';
                return $keramik;
            })

            ->addColumn('jumlahindustrik_genteng', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $genteng = $rt_industri ? $rt_industri->jumlahindustrik_genteng : '';
                return $genteng;
            })

            ->addColumn('jumlahindustris_genteng', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $genteng = $rt_industri ? $rt_industri->jumlahindustris_genteng : '';
                return $genteng;
            })

            ->addColumn('jumlahmanajemen_genteng', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $genteng = $rt_industri ? $rt_industri->jumlahmanajemen_genteng : '';
                return $genteng;
            })

            ->addColumn('jumlahpekerja_genteng', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $genteng = $rt_industri ? $rt_industri->jumlahindustrik_genteng : '';
                return $genteng;
            })

            ->addColumn('jumlahindustrik_anyaman', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $anyaman = $rt_industri ? $rt_industri->jumlahindustrik_anyaman : '';
                return $anyaman;
            })

            ->addColumn('jumlahindustris_anyaman', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $anyaman = $rt_industri ? $rt_industri->jumlahindustris_anyaman : '';
                return $anyaman;
            })

            ->addColumn('jumlahmanajemen_anyaman', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $anyaman = $rt_industri ? $rt_industri->jumlahmanajemen_anyaman : '';
                return $anyaman;
            })

            ->addColumn('jumlahpekerja_anyaman', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $anyaman = $rt_industri ? $rt_industri->jumlahindustrik_anyaman : '';
                return $anyaman;
            })

            ->addColumn('jumlahindustrik_anyaman', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $anyaman = $rt_industri ? $rt_industri->jumlahindustrik_anyaman : '';
                return $anyaman;
            })

            ->addColumn('jumlahindustris_anyaman', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $anyaman = $rt_industri ? $rt_industri->jumlahindustris_anyaman : '';
                return $anyaman;
            })

            ->addColumn('jumlahmanajemen_anyaman', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $anyaman = $rt_industri ? $rt_industri->jumlahmanajemen_anyaman : '';
                return $anyaman;
            })

            ->addColumn('jumlahpekerja_anyaman', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $anyaman = $rt_industri ? $rt_industri->jumlahindustrik_anyaman : '';
                return $anyaman;
            })

            ->addColumn('jumlahindustrik_makanan', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $makanan = $rt_industri ? $rt_industri->jumlahindustrik_makanan : '';
                return $makanan;
            })

            ->addColumn('jumlahindustris_makanan', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $makanan = $rt_industri ? $rt_industri->jumlahindustris_makanan : '';
                return $makanan;
            })

            ->addColumn('jumlahmanajemen_makanan', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $makanan = $rt_industri ? $rt_industri->jumlahmanajemen_makanan : '';
                return $makanan;
            })

            ->addColumn('jumlahpekerja_makanan', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $makanan = $rt_industri ? $rt_industri->jumlahindustrik_makanan : '';
                return $makanan;
            })

            ->addColumn('jumlahindustrik_lainnya', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $lainnya = $rt_industri ? $rt_industri->jumlahindustrik_lainnya : '';
                return $lainnya;
            })

            ->addColumn('jumlahindustris_lainnya', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $lainnya = $rt_industri ? $rt_industri->jumlahindustris_lainnya : '';
                return $lainnya;
            })

            ->addColumn('jumlahmanajemen_lainnya', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $lainnya = $rt_industri ? $rt_industri->jumlahmanajemen_lainnya : '';
                return $lainnya;
            })

            ->addColumn('jumlahpekerja_lainnya', function ($row) {
                $rt_industri = rtindustri::where('nik', $row->nik)->first();
                $lainnya = $rt_industri ? $rt_industri->jumlahindustrik_lainnya : '';
                return $lainnya;
            })

            ->addColumn('jumlah_toko', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_toko : '';
            })
            ->addColumn('kondisi_toko', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_toko : '';
            })
            ->addColumn('Jarak_toko', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_toko : '';
            })
            ->addColumn('kemudahan_toko', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_toko : '';
            })

            ->addColumn('jumlah_pasar_permanen', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_pasar_permanen : '';
            })
            ->addColumn('kondisi_pasar_permanen', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_pasar_permanen : '';
            })
            ->addColumn('Jarak_pasar_permanen', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_pasar_permanen : '';
            })
            ->addColumn('kemudahan_pasar_permanen', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_pasar_permanen : '';
            })

            ->addColumn('jumlah_semip', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_semip : '';
            })
            ->addColumn('kondisi_semip', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_semip : '';
            })
            ->addColumn('Jarak_semip', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_semip : '';
            })
            ->addColumn('kemudahan_semip', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_semip : '';
            })

            ->addColumn('jumlah_tanpap', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_tanpap : '';
            })
            ->addColumn('kondisi_tanpap', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_tanpap : '';
            })
            ->addColumn('Jarak_tanpap', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_tanpap : '';
            })
            ->addColumn('kemudahan_tanpap', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_tanpap : '';
            })

            ->addColumn('jumlah_minimarket', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_minimarket : '';
            })
            ->addColumn('kondisi_minimarket', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_minimarket : '';
            })
            ->addColumn('Jarak_minimarket', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_minimarket : '';
            })
            ->addColumn('kemudahan_minimarket', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_minimarket : '';
            })

            ->addColumn('jumlah_warungk', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_warungk : '';
            })
            ->addColumn('kondisi_warungk', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_warungk : '';
            })
            ->addColumn('Jarak_warungk', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_warungk : '';
            })
            ->addColumn('kemudahan_warungk', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_warungk : '';
            })

            ->addColumn('jumlah_warungp', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_warungp : '';
            })
            ->addColumn('kondisi_warungp', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_warungp : '';
            })
            ->addColumn('Jarak_warungp', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_warungp : '';
            })
            ->addColumn('kemudahan_warungp', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_warungp : '';
            })

            ->addColumn('jumlah_restoran', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_restoran : '';
            })
            ->addColumn('kondisi_restoran', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_restoran : '';
            })
            ->addColumn('Jarak_restoran', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_restoran : '';
            })
            ->addColumn('kemudahan_restoran', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_restoran : '';
            })

            ->addColumn('jumlah_kedaim', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_kedaim : '';
            })
            ->addColumn('kondisi_kedaim', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kedaim : '';
            })
            ->addColumn('Jarak_kedaim', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_kedaim : '';
            })
            ->addColumn('kemudahan_kedaim', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_kedaim : '';
            })

            ->addColumn('jumlah_kedaim', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_kedaim : '';
            })
            ->addColumn('kondisi_kedaim', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kedaim : '';
            })
            ->addColumn('Jarak_kedaim', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_kedaim : '';
            })
            ->addColumn('kemudahan_kedaim', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_kedaim : '';
            })

            ->addColumn('jumlah_hotel', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_hotel : '';
            })
            ->addColumn('kondisi_hotel', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_hotel : '';
            })
            ->addColumn('Jarak_hotel', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_hotel : '';
            })
            ->addColumn('kemudahan_hotel', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_hotel : '';
            })

            ->addColumn('jumlah_hostel', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_hostel : '';
            })
            ->addColumn('kondisi_hostel', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_hostel : '';
            })
            ->addColumn('Jarak_hostel', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_hostel : '';
            })
            ->addColumn('kemudahan_hostel', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_hostel : '';
            })

            ->addColumn('jumlah_bengkelm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bengkelm : '';
            })
            ->addColumn('kondisi_bengkelm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bengkelm : '';
            })
            ->addColumn('Jarak_bengkelm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bengkelm : '';
            })
            ->addColumn('kemudahan_bengkelm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bengkelm : '';
            })

            ->addColumn('jumlah_salonk', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_salonk : '';
            })
            ->addColumn('kondisi_salonk', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_salonk : '';
            })
            ->addColumn('Jarak_salonk', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_salonk : '';
            })
            ->addColumn('kemudahan_salonk', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_salonk : '';
            })

            ->addColumn('jumlah_agent', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_agent : '';
            })
            ->addColumn('kondisi_agent', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_agent : '';
            })
            ->addColumn('Jarak_agent', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_agent : '';
            })
            ->addColumn('kemudahan_agent', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_agent : '';
            })

            ->addColumn('jumlah_bankbri', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bankbri : '';
            })
            ->addColumn('kondisi_bankbri', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bankbri : '';
            })
            ->addColumn('Jarak_bankbri', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bankbri : '';
            })
            ->addColumn('kemudahan_bankbri', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bankbri : '';
            })

            ->addColumn('jumlah_briag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_briag : '';
            })
            ->addColumn('kondisi_briag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_briag : '';
            })
            ->addColumn('Jarak_briag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_briag : '';
            })
            ->addColumn('kemudahan_briag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_briag : '';
            })

            ->addColumn('jumlah_bankbni', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bankbni : '';
            })
            ->addColumn('kondisi_bankbni', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bankbni : '';
            })
            ->addColumn('Jarak_bankbni', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bankbni : '';
            })
            ->addColumn('kemudahan_bankbni', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bankbni : '';
            })

            ->addColumn('jumlah_bniag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bniag : '';
            })
            ->addColumn('kondisi_bniag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bniag : '';
            })
            ->addColumn('Jarak_bniag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bniag : '';
            })
            ->addColumn('kemudahan_bniag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bniag : '';
            })

            ->addColumn('jumlah_bankmandiri', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bankmandiri : '';
            })
            ->addColumn('kondisi_bankmandiri', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bankmandiri : '';
            })
            ->addColumn('Jarak_bankmandiri', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bankmandiri : '';
            })
            ->addColumn('kemudahan_bankmandiri', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bankmandiri : '';
            })


            ->addColumn('jumlah_mandiriag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_mandiriag : '';
            })
            ->addColumn('kondisi_mandiriag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_mandiriag : '';
            })
            ->addColumn('Jarak_mandiriag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_mandiriag : '';
            })
            ->addColumn('kemudahan_mandiriag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_mandiriag : '';
            })

            ->addColumn('jumlah_bankbpd', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bankbpd : '';
            })
            ->addColumn('kondisi_bankbpd', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bankbpd : '';
            })
            ->addColumn('Jarak_bankbpd', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bankbpd : '';
            })
            ->addColumn('kemudahan_bankbpd', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bankbpd : '';
            })

            ->addColumn('jumlah_bpdag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bpdag : '';
            })
            ->addColumn('kondisi_bpdag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bpdag : '';
            })
            ->addColumn('Jarak_bpdag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bpdag : '';
            })
            ->addColumn('kemudahan_bpdag', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bpdag : '';
            })

            ->addColumn('jumlah_bankumum', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bankumum : '';
            })
            ->addColumn('kondisi_bankumum', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bankumum : '';
            })
            ->addColumn('Jarak_bankumum', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bankumum : '';
            })
            ->addColumn('kemudahan_bankumum', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bankumum : '';
            })

            ->addColumn('jumlah_bankbca', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bankbca : '';
            })
            ->addColumn('kondisi_bankbca', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bankbca : '';
            })
            ->addColumn('Jarak_bankbca', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bankbca : '';
            })
            ->addColumn('kemudahan_bankbca', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bankbca : '';
            })

            ->addColumn('jumlah_bankcimb', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bankcimb : '';
            })
            ->addColumn('kondisi_bankcimb', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bankcimb : '';
            })
            ->addColumn('Jarak_bankcimb', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bankcimb : '';
            })
            ->addColumn('kemudahan_bankcimb', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bankcimb : '';
            })

            ->addColumn('jumlah_banksinarm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_banksinarm : '';
            })
            ->addColumn('kondisi_banksinarm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_banksinarm : '';
            })
            ->addColumn('Jarak_banksinarm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_banksinarm : '';
            })
            ->addColumn('kemudahan_banksinarm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_banksinarm : '';
            })

            ->addColumn('jumlah_bankpermata', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bankpermata : '';
            })
            ->addColumn('kondisi_bankpermata', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bankpermata : '';
            })
            ->addColumn('Jarak_bankpermata', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bankpermata : '';
            })
            ->addColumn('kemudahan_bankpermata', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bankpermata : '';
            })

            ->addColumn('jumlah_bankswastalain', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bankswastalain : '';
            })
            ->addColumn('kondisi_bankswastalain', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bankswastalain : '';
            })
            ->addColumn('Jarak_bankswastalain', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bankswastalain : '';
            })
            ->addColumn('kemudahan_bankswastalain', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bankswastalain : '';
            })

            ->addColumn('jumlah_bankbpr', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bankbpr : '';
            })
            ->addColumn('kondisi_bankbpr', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bankbpr : '';
            })
            ->addColumn('Jarak_bankbpr', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bankbpr : '';
            })
            ->addColumn('kemudahan_bankbpr', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bankbpr : '';
            })
            ->addColumn('jumlah_bmt', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_bmt : '';
            })
            ->addColumn('kondisi_bmt', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bmt : '';
            })
            ->addColumn('Jarak_bmt', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_bmt : '';
            })
            ->addColumn('kemudahan_bmt', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_bmt : '';
            })

            ->addColumn('jumlah_pegadaian', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_pegadaian : '';
            })
            ->addColumn('kondisi_pegadaian', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_pegadaian : '';
            })
            ->addColumn('Jarak_pegadaian', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_pegadaian : '';
            })
            ->addColumn('kemudahan_pegadaian', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_pegadaian : '';
            })

            ->addColumn('jumlah_atm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_atm : '';
            })
            ->addColumn('kondisi_atm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_atm : '';
            })
            ->addColumn('Jarak_atm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_atm : '';
            })
            ->addColumn('kemudahan_atm', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_atm : '';
            })

            ->addColumn('jumlah_saranalain', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_saranalain : '';
            })
            ->addColumn('kondisi_saranalain', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_saranalain : '';
            })
            ->addColumn('Jarak_saranalain', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->Jarak_saranalain : '';
            })
            ->addColumn('kemudahan_saranalain', function ($row) {
                $rtlokasi = rt_sarana_ekonomi::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kemudahan_saranalain : '';
            })
            ->addColumn('kredit_usaha_rakyat', function ($row) {
                $kreditUsahaRakyat = rt_fasilitas_ekonomi::where('your_column', $row->your_column_related_to_kredit_usaha_rakyat)->first();
                $value = $kreditUsahaRakyat ? $kreditUsahaRakyat->kredit_usaha_rakyat : '';

                return $value;
            })
            ->addColumn('kredit_ketahanan_pangan_energi', function ($row) {
                $kreditKetahananPanganEnergi = rt_fasilitas_ekonomi::where('your_column', $row->your_column_related_to_kredit_ketahanan_pangan_energi)->first();
                $value = $kreditKetahananPanganEnergi ? $kreditKetahananPanganEnergi->kredit_ketahanan_pangan_energi : '';

                return $value;
            })
            ->addColumn('kredit_usaha_kecil', function ($row) {
                $kreditUsahaKecil = rt_fasilitas_ekonomi::where('your_column', $row->your_column_related_to_kredit_usaha_kecil)->first();
                $value = $kreditUsahaKecil ? $kreditUsahaKecil->kredit_usaha_kecil : '';

                return $value;
            })
            ->addColumn('kelompok_usaha_bersama', function ($row) {
                $kelompokUsahaBersama = rt_fasilitas_ekonomi::where('your_column', $row->your_column_related_to_kelompok_usaha_bersama)->first();
                $value = $kelompokUsahaBersama ? $kelompokUsahaBersama->kelompok_usaha_bersama : '';

                return $value;
            })

            ->addColumn('penerangan_jalan', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                $nama_ketuart = $rtlokasi ? $rtlokasi->penerangan_jalan : '';
                return $nama_ketuart;
            })

            ->addColumn('pra_transportrt', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pra_transportrt : '';
            })
            ->addColumn('jalan_aspal', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jalan_aspal : '';
            })
            ->addColumn('jalan_makadam', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jalan_makadam : '';
            })
            ->addColumn('jalan_tanah', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jalan_tanah : '';
            })
            ->addColumn('jalan_papan_atasaair', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jalan_papan_atasaair : '';
            })
            ->addColumn('jalan_setapak', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jalan_setapak : '';
            })
            ->addColumn('jalan_lainnya', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jalan_lainnya : '';
            })
            ->addColumn('jalan_darat_roda4', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jalan_darat_roda4 : '';
            })
            ->addColumn('angkutanumum_trayek', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->angkutanumum_trayek : '';
            })
            ->addColumn('angkutanumum_opra', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->angkutanumum_opra : '';
            })
            ->addColumn('angkutanumum_jamopra', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->angkutanumum_jamopra : '';
            })
            ->addColumn('dermaga_laut', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->dermaga_laut : '';
            })
            ->addColumn('sinyalhp_bts', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->sinyalhp_bts : '';
            })
            ->addColumn('sinyalhp_telkom', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->sinyalhp_telkom : '';
            })
            ->addColumn('sinyalhp_indo', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->sinyalhp_indo : '';
            })
            ->addColumn('sinyalhp_xl', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->sinyalhp_xl : '';
            })
            ->addColumn('sinyalhp_hut', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->sinyalhp_hut : '';
            })
            ->addColumn('sinyalhp_psn', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->sinyalhp_psn : '';
            })
            ->addColumn('sinyalhp_smart', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->sinyalhp_smart : '';
            })
            ->addColumn('sinyalhp_bakrie', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->sinyalhp_bakrie : '';
            })
            ->addColumn('pos_pembantu', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pos_pembantu : '';
            })
            ->addColumn('pos_keliling', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pos_keliling : '';
            })
            ->addColumn('agen_jasa', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->agen_jasa : '';
            })
            ->addColumn('chanel_tvri', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->chanel_tvri : '';
            })
            ->addColumn('parabola_tvri', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->parabola_tvri : '';
            })
            ->addColumn('chanel_tvrid', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->chanel_tvrid : '';
            })
            ->addColumn('parabola_tvrid', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->parabola_tvrid : '';
            })
            ->addColumn('chanel_s', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->chanel_s : '';
            })
            ->addColumn('parabola_s', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->parabola_s : '';
            })
            ->addColumn('chanel_ln', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->chanel_ln : '';
            })
            ->addColumn('parabola_ln', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->parabola_ln : '';
            })
            ->addColumn('chanel_rri', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->chanel_rri : '';
            })
            ->addColumn('parabola_rri', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->parabola_rri : '';
            })
            ->addColumn('chanel_rrid', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->chanel_rrid : '';
            })
            ->addColumn('parabola_rrid', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->parabola_rrid : '';
            })
            ->addColumn('chanel_radios', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->chanel_radios : '';
            })
            ->addColumn('parabola_radios', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->parabola_radios : '';
            })
            ->addColumn('chanel_radiok', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->chanel_radiok : '';
            })
            ->addColumn('parabola_radiok', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->parabola_radiok : '';
            })
            ->addColumn('jumlah_lokasi_air', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_lokasi_air : '';
            })
            ->addColumn('fasilitas_umump_pasar', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->fasilitas_umump_pasar : '';
            })
            ->addColumn('fasilitas_umump_stasiun', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->fasilitas_umump_stasiun : '';
            })
            ->addColumn('fasilitas_umump_terminal', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->fasilitas_umump_terminal : '';
            })
            ->addColumn('fasilitas_umump_kolong', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->fasilitas_umump_kolong : '';
            })
            ->addColumn('fasilitas_umump_pelabuhan', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->fasilitas_umump_pelabuhan : '';
            })
            ->addColumn('pemukiman_khusus_mewah', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemukiman_khusus_mewah : '';
            })
            ->addColumn('pemukiman_khusus_apart', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemukiman_khusus_apart : '';
            })
            ->addColumn('pemukiman_khusus_susun', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemukiman_khusus_susun : '';
            })
            ->addColumn('pemukiman_khusus_school', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemukiman_khusus_school : '';
            })
            ->addColumn('pemukiman_khusus_kos', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemukiman_khusus_kos : '';
            })
            ->addColumn('pemukiman_khusus_asrama', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemukiman_khusus_asrama : '';
            })
            ->addColumn('pemukiman_khusus_lp', function ($row) {
                $rtlokasi = rt_infrastuktur::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemukiman_khusus_lp : '';
            })

            ->addColumn('lingkungan_lsi', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lsi');
            })
            ->addColumn('lingkungan_slno', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_slno');
            })
            ->addColumn('lingkungan_k', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_k');
            })
            ->addColumn('lingkungan_hl', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_hl');
            })
            ->addColumn('lingkungan_t', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_t');
            })
            ->addColumn('lingkungan_kte', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_kte');
            })
            ->addColumn('lingkungan_lgt', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lgt');
            })
            ->addColumn('lingkungan_lpp', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lpp');
            })
            ->addColumn('lingkungan_ah', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ah');
            })
            ->addColumn('lingkungan_lpns', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lpns');
            })
            ->addColumn('lingkungan_lpertambangan', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lpertambangan');
            })
            ->addColumn('lingkungan_lperumahan', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lperumahan');
            })
            ->addColumn('lingkungan_lperkantoran', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lperkantoran');
            })
            ->addColumn('lingkungan_lindustri', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_lindustri');
            })
            ->addColumn('lingkungan_fu', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_fu');
            })
            ->addColumn('lingkungan_ll', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ll');
            })
            ->addColumn('lingkungan_nsym', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_nsym');
            })
            ->addColumn('lingkungan_ndws', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ndws');
            })
            ->addColumn('lingkungan_jma', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_jma');
            })
            ->addColumn('lingkungan_je', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_je');
            })
            ->addColumn('lingkungan_ksb', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ksb');
            })
            ->addColumn('lingkungan_ks', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ks');
            })
            ->addColumn('lingkungan_ki', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ki');
            })
            ->addColumn('lingkungan_kd', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_kd');
            })
            ->addColumn('lingkungan_ke', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ke');
            })
            ->addColumn('lingkungan_pair', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_pair');
            })
            ->addColumn('lingkungan_ptanah', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_ptanah');
            })
            ->addColumn('lingkungan_pudara', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_pudara');
            })
            ->addColumn('lingkungan_pdusl', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_pdusl');
            })
            ->addColumn('lingkungan_kmml', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_kmml');
            })
            ->addColumn('lingkungan_klpg', function ($row) {
                return rt_lingkungan::where('nik', $row->nik)->value('lingkungan_klpg');
            })

            ->addColumn('k_longsor', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_longsor : '';
            })
            ->addColumn('f_longsor', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_longsor : '';
            })
            ->addColumn('kj_longsor', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_longsor : '';
            })
            ->addColumn('jp_longsor', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_longsor : '';
            })
            ->addColumn('wt_longsor', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_longsor : '';
            })
            ->addColumn('k_banjir', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_banjir : '';
            })
            ->addColumn('f_banjir', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_banjir : '';
            })
            ->addColumn('kj_banjir', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_banjir : '';
            })
            ->addColumn('jp_banjir', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_banjir : '';
            })
            ->addColumn('wt_banjir', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_banjir : '';
            })
            ->addColumn('k_bandang', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_bandang : '';
            })
            ->addColumn('f_bandang', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_bandang : '';
            })
            ->addColumn('kj_bandang', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_bandang : '';
            })
            ->addColumn('jp_bandang', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_bandang : '';
            })
            ->addColumn('wt_bandang', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_bandang : '';
            })
            ->addColumn('k_gempa', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_gempa : '';
            })
            ->addColumn('f_gempa', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_gempa : '';
            })
            ->addColumn('kj_gempa', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_gempa : '';
            })
            ->addColumn('jp_gempa', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_gempa : '';
            })
            ->addColumn('wt_gempa', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_gempa : '';
            })
            ->addColumn('k_tsunami', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_tsunami : '';
            })
            ->addColumn('f_tsunami', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_tsunami : '';
            })
            ->addColumn('kj_tsunami', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_tsunami : '';
            })
            ->addColumn('jp_tsunami', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_tsunami : '';
            })
            ->addColumn('wt_tsunami', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_tsunami : '';
            })
            ->addColumn('k_puyuh', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_puyuh : '';
            })
            ->addColumn('f_puyuh', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_puyuh : '';
            })
            ->addColumn('kj_puyuh', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_puyuh : '';
            })
            ->addColumn('jp_puyuh', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_puyuh : '';
            })
            ->addColumn('wt_puyuh', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_puyuh : '';
            })
            ->addColumn('k_gunungm', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_gunungm : '';
            })
            ->addColumn('f_gunungm', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_gunungm : '';
            })
            ->addColumn('kj_gunungm', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_gunungm : '';
            })
            ->addColumn('jp_gunungm', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_gunungm : '';
            })
            ->addColumn('wt_gunungm', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_gunungm : '';
            })
            ->addColumn('k_hutank', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_hutank : '';
            })
            ->addColumn('f_hutank', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_hutank : '';
            })
            ->addColumn('kj_hutank', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_hutank : '';
            })
            ->addColumn('jp_hutank', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_hutank : '';
            })
            ->addColumn('wt_hutank', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_hutank : '';
            })
            ->addColumn('k_kekeringan', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->k_kekeringan : '';
            })
            ->addColumn('f_kekeringan', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->f_kekeringan : '';
            })
            ->addColumn('kj_kekeringan', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kj_kekeringan : '';
            })
            ->addColumn('jp_kekeringan', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jp_kekeringan : '';
            })
            ->addColumn('wt_kekeringan', function ($row) {
                $rtlokasi = rt_bencana::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->wt_kekeringan : '';
            })

            ->addColumn('mitigasi_sp', function ($row) {
                $rtlokasi = rt_mitigasib::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->mitigasi_sp : '';
            })
            ->addColumn('mitigasi_spd', function ($row) {
                $rtlokasi = rt_mitigasib::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->mitigasi_spd : '';
            })
            ->addColumn('mitigasi_pk', function ($row) {
                $rtlokasi = rt_mitigasib::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->mitigasi_pk : '';
            })
            ->addColumn('mitigasi_rrj', function ($row) {
                $rtlokasi = rt_mitigasib::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->mitigasi_rrj : '';
            })
            ->addColumn('mitigasi_ppn', function ($row) {
                $rtlokasi = rt_mitigasib::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->mitigasi_ppn : '';
            })

            ->addColumn('nama_paud', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_paud : '';
            })
            ->addColumn('pemilik_paud', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_paud : '';
            })
            ->addColumn('kondisi_paud', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_paud : '';
            })
            ->addColumn('jumlahguru_paud', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_paud : '';
            })
            ->addColumn('jumlahmurid_paud', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_paud : '';
            })
            ->addColumn('jumlahpegawai_paud', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_paud : '';
            })

            ->addColumn('nama_tk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_tk : '';
            })
            ->addColumn('pemilik_tk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_tk : '';
            })
            ->addColumn('kondisi_tk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_tk : '';
            })
            ->addColumn('jumlahguru_tk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_tk : '';
            })
            ->addColumn('jumlahmurid_tk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_tk : '';
            })
            ->addColumn('jumlahpegawai_tk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_tk : '';
            })


            ->addColumn('nama_sd', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_sd : '';
            })
            ->addColumn('pemilik_sd', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_sd : '';
            })
            ->addColumn('kondisi_sd', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_sd : '';
            })
            ->addColumn('jumlahguru_sd', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_sd : '';
            })
            ->addColumn('jumlahmurid_sd', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_sd : '';
            })
            ->addColumn('jumlahpegawai_sd', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_sd : '';
            })


            ->addColumn('nama_smp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_smp : '';
            })
            ->addColumn('pemilik_smp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_smp : '';
            })
            ->addColumn('kondisi_smp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_smp : '';
            })
            ->addColumn('jumlahguru_smp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_smp : '';
            })
            ->addColumn('jumlahmurid_smp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_smp : '';
            })
            ->addColumn('jumlahpegawai_smp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_smp : '';
            })


            ->addColumn('nama_smplb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_smplb : '';
            })
            ->addColumn('pemilik_smplb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_smplb : '';
            })
            ->addColumn('kondisi_smplb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_smplb : '';
            })
            ->addColumn('jumlahguru_smplb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_smplb : '';
            })
            ->addColumn('jumlahmurid_smplb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_smplb : '';
            })
            ->addColumn('jumlahpegawai_smplb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_smplb : '';
            })


            ->addColumn('nama_sma', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_sma : '';
            })
            ->addColumn('pemilik_sma', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_sma : '';
            })
            ->addColumn('kondisi_sma', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_sma : '';
            })
            ->addColumn('jumlahguru_sma', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_sma : '';
            })
            ->addColumn('jumlahmurid_sma', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_sma : '';
            })
            ->addColumn('jumlahpegawai_sma', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_sma : '';
            })

            ->addColumn('nama_smk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_smk : '';
            })
            ->addColumn('pemilik_smk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_smk : '';
            })
            ->addColumn('kondisi_smk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_smk : '';
            })
            ->addColumn('jumlahguru_smk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_smk : '';
            })
            ->addColumn('jumlahmurid_smk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_smk : '';
            })
            ->addColumn('jumlahpegawai_smk', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_smk : '';
            })


            ->addColumn('nama_smalb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_smalb : '';
            })
            ->addColumn('pemilik_smalb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_smalb : '';
            })
            ->addColumn('kondisi_smalb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_smalb : '';
            })
            ->addColumn('jumlahguru_smalb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_smalb : '';
            })
            ->addColumn('jumlahmurid_smalb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_smalb : '';
            })
            ->addColumn('jumlahpegawai_smalb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_smalb : '';
            })


            ->addColumn('nama_akademi', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_akademi : '';
            })
            ->addColumn('pemilik_akademi', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_akademi : '';
            })
            ->addColumn('kondisi_akademi', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_akademi : '';
            })
            ->addColumn('jumlahguru_akademi', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_akademi : '';
            })
            ->addColumn('jumlahmurid_akademi', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_akademi : '';
            })
            ->addColumn('jumlahpegawai_akademi', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_akademi : '';
            })


            ->addColumn('nama_pesantren', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_pesantren : '';
            })
            ->addColumn('pemilik_pesantren', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_pesantren : '';
            })
            ->addColumn('kondisi_pesantren', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_pesantren : '';
            })
            ->addColumn('jumlahguru_pesantren', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_pesantren : '';
            })
            ->addColumn('jumlahmurid_pesantren', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_pesantren : '';
            })
            ->addColumn('jumlahpegawai_pesantren', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_pesantren : '';
            })

            ->addColumn('nama_madrasahdn', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_madrasahdn : '';
            })
            ->addColumn('pemilik_madrasahdn', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_madrasahdn : '';
            })
            ->addColumn('kondisi_madrasahdn', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_madrasahdn : '';
            })
            ->addColumn('jumlahguru_madrasahdn', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_madrasahdn : '';
            })
            ->addColumn('jumlahmurid_madrasahdn', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_madrasahdn : '';
            })
            ->addColumn('jumlahpegawai_madrasahdn', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_madrasahdn : '';
            })


            ->addColumn('nama_seminari', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_seminari : '';
            })
            ->addColumn('pemilik_seminari', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_seminari : '';
            })
            ->addColumn('kondisi_seminari', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_seminari : '';
            })
            ->addColumn('jumlahguru_seminari', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_seminari : '';
            })
            ->addColumn('jumlahmurid_seminari', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_seminari : '';
            })
            ->addColumn('jumlahpegawai_seminari', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_seminari : '';
            })


            ->addColumn('nama_sekolahag', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_sekolahag : '';
            })
            ->addColumn('pemilik_sekolahag', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_sekolahag : '';
            })
            ->addColumn('kondisi_sekolahag', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_sekolahag : '';
            })
            ->addColumn('jumlahguru_sekolahag', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_sekolahag : '';
            })
            ->addColumn('jumlahmurid_sekolahag', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_sekolahag : '';
            })
            ->addColumn('jumlahpegawai_sekolahag', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_sekolahag : '';
            })


            ->addColumn('nama_butaaksara', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_butaaksara : '';
            })
            ->addColumn('pemilik_butaaksara', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_butaaksara : '';
            })
            ->addColumn('kondisi_butaaksara', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_butaaksara : '';
            })
            ->addColumn('jumlahguru_butaaksara', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_butaaksara : '';
            })
            ->addColumn('jumlahmurid_butaaksara', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_butaaksara : '';
            })
            ->addColumn('jumlahpegawai_butaaksara', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_butaaksara : '';
            })


            ->addColumn('nama_paketa', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_paketa : '';
            })
            ->addColumn('pemilik_paketa', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_paketa : '';
            })
            ->addColumn('kondisi_paketa', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_paketa : '';
            })
            ->addColumn('jumlahguru_paketa', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_paketa : '';
            })
            ->addColumn('jumlahmurid_paketa', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_paketa : '';
            })
            ->addColumn('jumlahpegawai_paketa', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_paketa : '';
            })


            ->addColumn('nama_paketb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_paketb : '';
            })
            ->addColumn('pemilik_paketb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_paketb : '';
            })
            ->addColumn('kondisi_paketb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_paketb : '';
            })
            ->addColumn('jumlahguru_paketb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_paketb : '';
            })
            ->addColumn('jumlahmurid_paketb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_paketb : '';
            })
            ->addColumn('jumlahpegawai_paketb', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_paketb : '';
            })

            ->addColumn('nama_paketc', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_paketc : '';
            })
            ->addColumn('pemilik_paketc', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_paketc : '';
            })
            ->addColumn('kondisi_paketc', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_paketc : '';
            })
            ->addColumn('jumlahguru_paketc', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_paketc : '';
            })
            ->addColumn('jumlahmurid_paketc', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_paketc : '';
            })
            ->addColumn('jumlahpegawai_paketc', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_paketc : '';
            })

            ->addColumn('nama_playgrup', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_playgrup : '';
            })
            ->addColumn('pemilik_playgrup', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_playgrup : '';
            })
            ->addColumn('kondisi_playgrup', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_playgrup : '';
            })
            ->addColumn('jumlahguru_playgrup', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_playgrup : '';
            })
            ->addColumn('jumlahmurid_playgrup', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_playgrup : '';
            })
            ->addColumn('jumlahpegawai_playgrup', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_playgrup : '';
            })

            ->addColumn('nama_penitipananak', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_penitipananak : '';
            })
            ->addColumn('pemilik_penitipananak', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_penitipananak : '';
            })
            ->addColumn('kondisi_penitipananak', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_penitipananak : '';
            })
            ->addColumn('jumlahguru_penitipananak', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_penitipananak : '';
            })
            ->addColumn('jumlahmurid_penitipananak', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_penitipananak : '';
            })
            ->addColumn('jumlahpegawai_penitipananak', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_penitipananak : '';
            })


            ->addColumn('nama_pendidikanq', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_pendidikanq : '';
            })
            ->addColumn('pemilik_pendidikanq', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_pendidikanq : '';
            })
            ->addColumn('kondisi_pendidikanq', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_pendidikanq : '';
            })
            ->addColumn('jumlahguru_pendidikanq', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_pendidikanq : '';
            })
            ->addColumn('jumlahmurid_pendidikanq', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_pendidikanq : '';
            })
            ->addColumn('jumlahpegawai_pendidikanq', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_pendidikanq : '';
            })

            ->addColumn('nama_bahasaas', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_bahasaas : '';
            })
            ->addColumn('pemilik_bahasaas', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_bahasaas : '';
            })
            ->addColumn('kondisi_bahasaas', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_bahasaas : '';
            })
            ->addColumn('jumlahguru_bahasaas', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_bahasaas : '';
            })
            ->addColumn('jumlahmurid_bahasaas', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_bahasaas : '';
            })
            ->addColumn('jumlahpegawai_bahasaas', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_bahasaas : '';
            })

            ->addColumn('nama_kursuskomp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_kursuskomp : '';
            })
            ->addColumn('pemilik_kursuskomp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_kursuskomp : '';
            })
            ->addColumn('kondisi_kursuskomp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kursuskomp : '';
            })
            ->addColumn('jumlahguru_kursuskomp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_kursuskomp : '';
            })
            ->addColumn('jumlahmurid_kursuskomp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_kursuskomp : '';
            })
            ->addColumn('jumlahpegawai_kursuskomp', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_kursuskomp : '';
            })

            ->addColumn('nama_kursusmenjahit', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_kursusmenjahit : '';
            })
            ->addColumn('pemilik_kursusmenjahit', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_kursusmenjahit : '';
            })
            ->addColumn('kondisi_kursusmenjahit', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kursusmenjahit : '';
            })
            ->addColumn('jumlahguru_kursusmenjahit', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_kursusmenjahit : '';
            })
            ->addColumn('jumlahmurid_kursusmenjahit', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_kursusmenjahit : '';
            })
            ->addColumn('jumlahpegawai_kursusmenjahit', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_kursusmenjahit : '';
            })


            ->addColumn('nama_kursuskecantikan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_kursuskecantikan : '';
            })
            ->addColumn('pemilik_kursuskecantikan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_kursuskecantikan : '';
            })
            ->addColumn('kondisi_kursuskecantikan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kursuskecantikan : '';
            })
            ->addColumn('jumlahguru_kursuskecantikan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_kursuskecantikan : '';
            })
            ->addColumn('jumlahmurid_kursuskecantikan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_kursuskecantikan : '';
            })
            ->addColumn('jumlahpegawai_kursuskecantikan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_kursuskecantikan : '';
            })

            ->addColumn('nama_kursusmontir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_kursusmontir : '';
            })
            ->addColumn('pemilik_kursusmontir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_kursusmontir : '';
            })
            ->addColumn('kondisi_kursusmontir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kursusmontir : '';
            })
            ->addColumn('jumlahguru_kursusmontir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_kursusmontir : '';
            })
            ->addColumn('jumlahmurid_kursusmontir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_kursusmontir : '';
            })
            ->addColumn('jumlahpegawai_kursusmontir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_kursusmontir : '';
            })

            ->addColumn('nama_kursussetir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_kursussetir : '';
            })
            ->addColumn('pemilik_kursussetir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_kursussetir : '';
            })
            ->addColumn('kondisi_kursussetir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kursussetir : '';
            })
            ->addColumn('jumlahguru_kursussetir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_kursussetir : '';
            })
            ->addColumn('jumlahmurid_kursussetir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_kursussetir : '';
            })
            ->addColumn('jumlahpegawai_kursussetir', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_kursussetir : '';
            })

            ->addColumn('nama_kursuselektronik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_kursuselektronik : '';
            })
            ->addColumn('pemilik_kursuselektronik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_kursuselektronik : '';
            })
            ->addColumn('kondisi_kursuselektronik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kursuselektronik : '';
            })
            ->addColumn('jumlahguru_kursuselektronik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_kursuselektronik : '';
            })
            ->addColumn('jumlahmurid_kursuselektronik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_kursuselektronik : '';
            })
            ->addColumn('jumlahpegawai_kursuselektronik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_kursuselektronik : '';
            })

            ->addColumn('nama_tataboga', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_tataboga : '';
            })
            ->addColumn('pemilik_tataboga', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_tataboga : '';
            })
            ->addColumn('kondisi_tataboga', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_tataboga : '';
            })
            ->addColumn('jumlahguru_tataboga', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_tataboga : '';
            })
            ->addColumn('jumlahmurid_tataboga', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_tataboga : '';
            })
            ->addColumn('jumlahpegawai_tataboga', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_tataboga : '';
            })

            ->addColumn('nama_kursusketik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_kursusketik : '';
            })
            ->addColumn('pemilik_kursusketik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_kursusketik : '';
            })
            ->addColumn('kondisi_kursusketik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kursusketik : '';
            })
            ->addColumn('jumlahguru_kursusketik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_kursusketik : '';
            })
            ->addColumn('jumlahmurid_kursusketik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_kursusketik : '';
            })
            ->addColumn('jumlahpegawai_kursusketik', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_kursusketik : '';
            })

            ->addColumn('nama_kursusakuntan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_kursusakuntan : '';
            })
            ->addColumn('pemilik_kursusakuntan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_kursusakuntan : '';
            })
            ->addColumn('kondisi_kursusakuntan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kursusakuntan : '';
            })
            ->addColumn('jumlahguru_kursusakuntan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_kursusakuntan : '';
            })
            ->addColumn('jumlahmurid_kursusakuntan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_kursusakuntan : '';
            })
            ->addColumn('jumlahpegawai_kursusakuntan', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_kursusakuntan : '';
            })

            ->addColumn('nama_kursuslain', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama_kursuslain : '';
            })
            ->addColumn('pemilik_kursuslain', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->pemilik_kursuslain : '';
            })
            ->addColumn('kondisi_kursuslain', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->kondisi_kursuslain : '';
            })
            ->addColumn('jumlahguru_kursuslain', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahguru_kursuslain : '';
            })
            ->addColumn('jumlahmurid_kursuslain', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahmurid_kursuslain : '';
            })
            ->addColumn('jumlahpegawai_kursuslain', function ($row) {
                $rtlokasi = rt_saranapendidikan::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlahpegawai_kursuslain : '';
            })

            ->addColumn('nama_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_rs : '';
            })
            ->addColumn('pemilik_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_rs : '';
            })
            ->addColumn('jd_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_rs : '';
            })
            ->addColumn('jb_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_rs : '';
            })
            ->addColumn('jts_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_rs : '';
            })
            ->addColumn('jp_rs', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_rs : '';
            })

            ->addColumn('nama_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_rsb : '';
            })
            ->addColumn('pemilik_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_rsb : '';
            })
            ->addColumn('jd_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_rsb : '';
            })
            ->addColumn('jb_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_rsb : '';
            })
            ->addColumn('jts_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_rsb : '';
            })
            ->addColumn('jp_rsb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_rsb : '';
            })

            ->addColumn('nama_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_pdri : '';
            })
            ->addColumn('pemilik_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_pdri : '';
            })
            ->addColumn('jd_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_pdri : '';
            })
            ->addColumn('jb_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_pdri : '';
            })
            ->addColumn('jts_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_pdri : '';
            })
            ->addColumn('jp_pdri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_pdri : '';
            })

            ->addColumn('nama_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_ptri : '';
            })
            ->addColumn('pemilik_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_ptri : '';
            })
            ->addColumn('jd_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_ptri : '';
            })
            ->addColumn('jb_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_ptri : '';
            })
            ->addColumn('jts_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_ptri : '';
            })
            ->addColumn('jp_ptri', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_ptri : '';
            })

            ->addColumn('nama_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_pp : '';
            })
            ->addColumn('pemilik_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_pp : '';
            })
            ->addColumn('jd_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_pp : '';
            })
            ->addColumn('jb_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_pp : '';
            })
            ->addColumn('jts_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_pp : '';
            })
            ->addColumn('jp_pp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_pp : '';
            })


            ->addColumn('nama_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_pbp : '';
            })
            ->addColumn('pemilik_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_pbp : '';
            })
            ->addColumn('jd_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_pbp : '';
            })
            ->addColumn('jb_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_pbp : '';
            })
            ->addColumn('jts_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_pbp : '';
            })
            ->addColumn('jp_pbp', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_pbp : '';
            })



            ->addColumn('nama_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_tpd : '';
            })
            ->addColumn('pemilik_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_tpd : '';
            })
            ->addColumn('jd_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_tpd : '';
            })
            ->addColumn('jb_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_tpd : '';
            })
            ->addColumn('jts_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_tpd : '';
            })
            ->addColumn('jp_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_tpd : '';
            })


            ->addColumn('nama_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_rb : '';
            })
            ->addColumn('pemilik_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_rb : '';
            })
            ->addColumn('jd_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_rb : '';
            })
            ->addColumn('jb_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_rb : '';
            })
            ->addColumn('jts_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_rb : '';
            })
            ->addColumn('jp_rb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_rb : '';
            })


            ->addColumn('nama_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_tpb : '';
            })
            ->addColumn('pemilik_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_tpb : '';
            })
            ->addColumn('jd_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_tpb : '';
            })
            ->addColumn('jb_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_tpb : '';
            })
            ->addColumn('jts_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_tpb : '';
            })
            ->addColumn('jp_tpb', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_tpb : '';
            })



            ->addColumn('nama_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_poskedes : '';
            })
            ->addColumn('pemilik_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_poskedes : '';
            })
            ->addColumn('jd_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_poskedes : '';
            })
            ->addColumn('jb_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_poskedes : '';
            })
            ->addColumn('jts_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_poskedes : '';
            })
            ->addColumn('jp_poskedes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_poskedes : '';
            })


            ->addColumn('nama_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_polindes : '';
            })
            ->addColumn('pemilik_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_polindes : '';
            })
            ->addColumn('jd_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_polindes : '';
            })
            ->addColumn('jb_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_polindes : '';
            })
            ->addColumn('jts_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_polindes : '';
            })
            ->addColumn('jp_polindes', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_polindes : '';
            })



            ->addColumn('nama_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_apotik : '';
            })
            ->addColumn('pemilik_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_apotik : '';
            })
            ->addColumn('jd_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_apotik : '';
            })
            ->addColumn('jb_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_apotik : '';
            })
            ->addColumn('jts_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_apotik : '';
            })
            ->addColumn('jp_apotik', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_apotik : '';
            })


            ->addColumn('nama_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_tokojamu : '';
            })
            ->addColumn('pemilik_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_tokojamu : '';
            })
            ->addColumn('jd_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_tokojamu : '';
            })
            ->addColumn('jb_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_tokojamu : '';
            })
            ->addColumn('jts_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_tokojamu : '';
            })
            ->addColumn('jp_tokojamu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_tokojamu : '';
            })


            ->addColumn('nama_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_posyandu : '';
            })
            ->addColumn('pemilik_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_posyandu : '';
            })
            ->addColumn('jd_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_posyandu : '';
            })
            ->addColumn('jb_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_posyandu : '';
            })
            ->addColumn('jts_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_posyandu : '';
            })
            ->addColumn('jp_posyandu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_posyandu : '';
            })


            ->addColumn('nama_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_posbindu : '';
            })
            ->addColumn('pemilik_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_posbindu : '';
            })
            ->addColumn('jd_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_posbindu : '';
            })
            ->addColumn('jb_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_posbindu : '';
            })
            ->addColumn('jts_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_posbindu : '';
            })
            ->addColumn('jp_posbindu', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_posbindu : '';
            })


            ->addColumn('nama_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->nama_tpd : '';
            })
            ->addColumn('pemilik_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->pemilik_tpd : '';
            })
            ->addColumn('jd_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jd_tpd : '';
            })
            ->addColumn('jb_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jb_tpd : '';
            })
            ->addColumn('jts_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jts_tpd : '';
            })
            ->addColumn('jp_tpd', function ($row) {
                $rt_kesehatan = rt_kesehatan::where('nik', $row->nik)->first();
                return $rt_kesehatan ? $rt_kesehatan->jp_tpd : '';
            })

            ->addColumn('nama_muntaber', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_muntaber : '';
            })
            ->addColumn('jp_muntaber', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_muntaber : '';
            })
            ->addColumn('jm_muntaber', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_muntaber : '';
            })
            ->addColumn('nama_dbd', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_dbd : '';
            })
            ->addColumn('jp_dbd', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_dbd : '';
            })
            ->addColumn('jm_dbd', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_dbd : '';
            })
            ->addColumn('nama_campak', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_campak : '';
            })
            ->addColumn('jp_campak', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_campak : '';
            })
            ->addColumn('jm_campak', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_campak : '';
            })
            ->addColumn('nama_malaria', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_malaria : '';
            })
            ->addColumn('jp_malaria', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_malaria : '';
            })
            ->addColumn('jm_malaria', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_malaria : '';
            })
            ->addColumn('nama_fluburung', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_fluburung : '';
            })
            ->addColumn('jp_fluburung', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_fluburung : '';
            })
            ->addColumn('jm_fluburung', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_fluburung : '';
            })
            ->addColumn('nama_covid19', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_covid19 : '';
            })
            ->addColumn('jp_covid19', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_covid19 : '';
            })
            ->addColumn('jm_covid19', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_covid19 : '';
            })
            ->addColumn('nama_hepatitisb', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_hepatitisb : '';
            })
            ->addColumn('jp_hepatitisb', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_hepatitisb : '';
            })
            ->addColumn('jm_hepatitisb', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_hepatitisb : '';
            })
            ->addColumn('nama_hepatitise', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_hepatitise : '';
            })
            ->addColumn('jp_hepatitise', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_hepatitise : '';
            })
            ->addColumn('jm_hepatitise', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_hepatitise : '';
            })
            ->addColumn('nama_dipteri', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_dipteri : '';
            })
            ->addColumn('jp_dipteri', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_dipteri : '';
            })
            ->addColumn('jm_dipteri', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_dipteri : '';
            })
            ->addColumn('nama_chikung', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_chikung : '';
            })
            ->addColumn('jp_chikung', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_chikung : '';
            })
            ->addColumn('jm_chikung', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_chikung : '';
            })

            ->addColumn('nama_leptos', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_leptos : '';
            })
            ->addColumn('jp_leptos', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_leptos : '';
            })
            ->addColumn('jm_leptos', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_leptos : '';
            })


            ->addColumn('nama_kolera', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_kolera : '';
            })
            ->addColumn('jp_kolera', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_kolera : '';
            })
            ->addColumn('jm_kolera', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_kolera : '';
            })


            ->addColumn('nama_giziburuk', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_giziburuk : '';
            })
            ->addColumn('jp_giziburuk', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_giziburuk : '';
            })
            ->addColumn('jm_giziburuk', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_giziburuk : '';
            })


            ->addColumn('nama_lainnya', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->nama_lainnya : '';
            })
            ->addColumn('jp_lainnya', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jp_lainnya : '';
            })
            ->addColumn('jm_lainnya', function ($row) {
                $rt_kejadianluarbiasa = rt_kejadianluarbiasa::where('nik', $row->nik)->first();
                return $rt_kejadianluarbiasa ? $rt_kejadianluarbiasa->jm_lainnya : '';
            })

            ->addColumn('jumlahwarga_jamkes', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahwarga_jamkes : '';
            })
            ->addColumn('jumlahwarga_jamketerangan', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahwarga_jamketerangan : '';
            })
            ->addColumn('jumlahtempat_masjid', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_masjid : '';
            })
            ->addColumn('jumlahtempat_musholla', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_musholla : '';
            })
            ->addColumn('jumlahtempat_kristen', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_kristen : '';
            })
            ->addColumn('jumlahtempat_katolik', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_katolik : '';
            })
            ->addColumn('jumlahtempat_kapel', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_kapel : '';
            })
            ->addColumn('jumlahtempat_pura', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_pura : '';
            })
            ->addColumn('jumlahtempat_wihara', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_wihara : '';
            })
            ->addColumn('jumlahtempat_kelenteng', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_kelenteng : '';
            })
            ->addColumn('jumlahtempat_lainnya', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->jumlahtempat_lainnya : '';
            })
            ->addColumn('cagar_bud1', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->cagar_bud1 : '';
            })
            ->addColumn('cagar_bud2', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->cagar_bud2 : '';
            })
            ->addColumn('cagar_bud3', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->cagar_bud3 : '';
            })
            ->addColumn('sukuasing_keluarga', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->sukuasing_keluarga : '';
            })
            ->addColumn('sukuasing_jiwa', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->sukuasing_jiwa : '';
            })
            ->addColumn('ruangpublik_terbuka', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->ruangpublik_terbuka : '';
            })
            ->addColumn('adat_kehamilan', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_kehamilan : '';
            })
            ->addColumn('adat_kelahiran', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_kelahiran : '';
            })
            ->addColumn('adat_pekerjaan', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_pekerjaan : '';
            })
            ->addColumn('adat_alam', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_alam : '';
            })
            ->addColumn('adat_perkawinan', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_perkawinan : '';
            })
            ->addColumn('adat_kehidupanwarga', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_kehidupanwarga : '';
            })
            ->addColumn('adat_kematian', function ($row) {
                $rt_agama = rt_agama::where('nik', $row->nik)->first();
                return $rt_agama ? $rt_agama->adat_kematian : '';
            })

            ->addColumn('namalembaga', function ($row) {
                $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $row->nik)->first();
                return $rtlembaga_keagamaan ? $rtlembaga_keagamaan->nama : '';
            })
            ->addColumn('jumlah_peng', function ($row) {
                $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $row->nik)->first();
                return $rtlembaga_keagamaan ? $rtlembaga_keagamaan->jumlah_peng : '';
            })
            ->addColumn('jumlah_ang', function ($row) {
                $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $row->nik)->first();
                return $rtlembaga_keagamaan ? $rtlembaga_keagamaan->jumlah_ang : '';
            })
            ->addColumn('fasilitas', function ($row) {
                $rtlembaga_keagamaan = rtlembaga_keagamaan::where('nik', $row->nik)->first();
                return $rtlembaga_keagamaan ? $rtlembaga_keagamaan->fasilitas : '';
            })

            ->addColumn('namalembagamas', function ($row) {
                $rtlokasi = lembaga_masyarakat::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->nama : '';
            })
            ->addColumn('jumlah_kel', function ($row) {
                $rtlokasi = lembaga_masyarakat::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_kel : '';
            })
            ->addColumn('jumlah_peng', function ($row) {
                $rtlokasi = lembaga_masyarakat::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_peng : '';
            })
            ->addColumn('jumlah_ang', function ($row) {
                $rtlokasi = lembaga_masyarakat::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->jumlah_ang : '';
            })
            ->addColumn('fasilitas', function ($row) {
                $rtlokasi = lembaga_masyarakat::where('nik', $row->nik)->first();
                return $rtlokasi ? $rtlokasi->fasilitas : '';
            })


            ->addColumn('penyebabu_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_antarkelompokmas : '';
            })
            ->addColumn('jk_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_antarkelompokmas : '';
            })
            ->addColumn('jkl_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_antarkelompokmas : '';
            })
            ->addColumn('jt_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_antarkelompokmas : '';
            })
            ->addColumn('pen_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_antarkelompokmas : '';
            })
            ->addColumn('pp_antarkelompokmas', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_antarkelompokmas : '';
            })
            ->addColumn('penyebabu_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_antardesa : '';
            })
            ->addColumn('jk_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_antardesa : '';
            })
            ->addColumn('jkl_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_antardesa : '';
            })
            ->addColumn('jt_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_antardesa : '';
            })
            ->addColumn('pen_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_antardesa : '';
            })
            ->addColumn('pp_antardesa', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_antardesa : '';
            })
            ->addColumn('penyebabu_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_aparatmk : '';
            })
            ->addColumn('jk_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_aparatmk : '';
            })
            ->addColumn('jkl_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_aparatmk : '';
            })
            ->addColumn('jt_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_aparatmk : '';
            })
            ->addColumn('pen_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_aparatmk : '';
            })
            ->addColumn('pp_aparatmk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_aparatmk : '';
            })
            ->addColumn('penyebabu_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_aparatmp : '';
            })
            ->addColumn('jk_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_aparatmp : '';
            })
            ->addColumn('jkl_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_aparatmp : '';
            })
            ->addColumn('jt_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_aparatmp : '';
            })
            ->addColumn('pen_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_aparatmp : '';
            })
            ->addColumn('pp_aparatmp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_aparatmp : '';
            })
            ->addColumn('penyebabu_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_aparatk : '';
            })
            ->addColumn('jk_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_aparatk : '';
            })
            ->addColumn('jkl_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_aparatk : '';
            })
            ->addColumn('jt_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_aparatk : '';
            })
            ->addColumn('pen_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_aparatk : '';
            })
            ->addColumn('pp_aparatk', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_aparatk : '';
            })
            ->addColumn('penyebabu_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_aparatp : '';
            })
            ->addColumn('jk_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_aparatp : '';
            })
            ->addColumn('jkl_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_aparatp : '';
            })
            ->addColumn('jt_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_aparatp : '';
            })
            ->addColumn('pen_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_aparatp : '';
            })
            ->addColumn('pp_aparatp', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_aparatp : '';
            })
            ->addColumn('penyebabu_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_pelajar : '';
            })
            ->addColumn('jk_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pelajar : '';
            })
            ->addColumn('jkl_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_pelajar : '';
            })
            ->addColumn('jt_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_pelajar : '';
            })
            ->addColumn('pen_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_pelajar : '';
            })
            ->addColumn('pp_pelajar', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_pelajar : '';
            })
            ->addColumn('penyebabu_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_suku : '';
            })
            ->addColumn('jk_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_suku : '';
            })
            ->addColumn('jkl_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_suku : '';
            })
            ->addColumn('jt_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_suku : '';
            })
            ->addColumn('pen_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_suku : '';
            })
            ->addColumn('pp_suku', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_suku : '';
            })
            ->addColumn('penyebabu_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->penyebabu_lainnya : '';
            })
            ->addColumn('jk_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jk_lainnya : '';
            })
            ->addColumn('jkl_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jkl_lainnya : '';
            })
            ->addColumn('jt_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->jt_lainnya : '';
            })
            ->addColumn('pen_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pen_lainnya : '';
            })
            ->addColumn('pp_lainnya', function ($row) {
                $data = rt_keamanan::where('nik', $row->nik)->first();
                return $data ? $data->pp_lainnya : '';
            })

            ->addColumn('jk_pencurian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pencurian : '';
            })
            ->addColumn('jumlahselesai_pencurian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_pencurian : '';
            })
            ->addColumn('jktbd_pencurian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_pencurian : '';
            })
            ->addColumn('kll_pencurian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_pencurian : '';
            })
            ->addColumn('kt_pencurian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_pencurian : '';
            })
            ->addColumn('jk_pencuriankeras', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pencuriankeras : '';
            })
            ->addColumn('jumlahselesai_pencuriankeras', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_pencuriankeras : '';
            })
            ->addColumn('jktbd_pencuriankeras', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_pencuriankeras : '';
            })
            ->addColumn('kll_pencuriankeras', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_pencuriankeras : '';
            })
            ->addColumn('kt_pencuriankeras', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_pencuriankeras : '';
            })
            ->addColumn('jk_penipuan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_penipuan : '';
            })
            ->addColumn('jumlahselesai_penipuan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_penipuan : '';
            })
            ->addColumn('jktbd_penipuan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_penipuan : '';
            })
            ->addColumn('kll_penipuan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_penipuan : '';
            })
            ->addColumn('kt_penipuan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_penipuan : '';
            })
            ->addColumn('jk_penganiyayaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_penganiyayaan : '';
            })
            ->addColumn('jumlahselesai_penganiyayaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_penganiyayaan : '';
            })
            ->addColumn('jktbd_penganiyayaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_penganiyayaan : '';
            })
            ->addColumn('kll_penganiyayaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_penganiyayaan : '';
            })
            ->addColumn('kt_penganiyayaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_penganiyayaan : '';
            })
            ->addColumn('jk_pembakaran', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pembakaran : '';
            })
            ->addColumn('jumlahselesai_pembakaran', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_pembakaran : '';
            })
            ->addColumn('jktbd_pembakaran', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_pembakaran : '';
            })
            ->addColumn('kll_pembakaran', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_pembakaran : '';
            })
            ->addColumn('kt_pembakaran', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_pembakaran : '';
            })
            ->addColumn('jk_pemerkosaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pemerkosaan : '';
            })
            ->addColumn('jumlahselesai_pemerkosaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_pemerkosaan : '';
            })
            ->addColumn('jktbd_pemerkosaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_pemerkosaan : '';
            })
            ->addColumn('kll_pemerkosaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_pemerkosaan : '';
            })
            ->addColumn('kt_pemerkosaan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_pemerkosaan : '';
            })
            ->addColumn('jk_narkoba', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_narkoba : '';
            })
            ->addColumn('jumlahselesai_narkoba', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_narkoba : '';
            })
            ->addColumn('jktbd_narkoba', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_narkoba : '';
            })
            ->addColumn('kll_narkoba', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_narkoba : '';
            })
            ->addColumn('kt_narkoba', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_narkoba : '';
            })
            ->addColumn('jk_perjudian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_perjudian : '';
            })
            ->addColumn('jumlahselesai_perjudian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_perjudian : '';
            })
            ->addColumn('jktbd_perjudian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_perjudian : '';
            })
            ->addColumn('kll_perjudian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_perjudian : '';
            })
            ->addColumn('kt_perjudian', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_perjudian : '';
            })
            ->addColumn('jk_pembunuhan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_pembunuhan : '';
            })
            ->addColumn('jumlahselesai_pembunuhan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_pembunuhan : '';
            })
            ->addColumn('jktbd_pembunuhan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_pembunuhan : '';
            })
            ->addColumn('kll_pembunuhan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_pembunuhan : '';
            })
            ->addColumn('kt_pembunuhan', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_pembunuhan : '';
            })
            ->addColumn('jk_perdaganganorang', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_perdaganganorang : '';
            })
            ->addColumn('jumlahselesai_perdaganganorang', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_perdaganganorang : '';
            })
            ->addColumn('jktbd_perdaganganorang', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_perdaganganorang : '';
            })
            ->addColumn('kll_perdaganganorang', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_perdaganganorang : '';
            })
            ->addColumn('kt_perdaganganorang', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_perdaganganorang : '';
            })

            ->addColumn('jk_korupsi', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_korupsi : '';
            })
            ->addColumn('jumlahselesai_korupsi', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_korupsi : '';
            })
            ->addColumn('jktbd_korupsi', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_korupsi : '';
            })
            ->addColumn('kll_korupsi', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_korupsi : '';
            })
            ->addColumn('kt_korupsi', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_korupsi : '';
            })

            ->addColumn('jk_lainnya', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jk_lainnya : '';
            })
            ->addColumn('jumlahselesai_lainnya', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jumlahselesai_lainnya : '';
            })
            ->addColumn('jktbd_lainnya', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->jktbd_lainnya : '';
            })
            ->addColumn('kll_lainnya', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kll_lainnya : '';
            })
            ->addColumn('kt_lainnya', function ($row) {
                $data = rt_tkejahatan::where('nik', $row->nik)->first();
                return $data ? $data->kt_lainnya : '';
            })

            ->addColumn('jumlah_kpp', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->jumlah_kpp : '';
                return $data;
            })
            ->addColumn('jumlah_ppr', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->jumlah_ppr : '';
                return $data;
            })
            ->addColumn('jumlah_hansip', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->jumlah_hansip : '';
                return $data;
            })
            ->addColumn('pelaporan_tamu_lebih24', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->pelaporan_tamu_lebih24 : '';
                return $data;
            })
            ->addColumn('sistem_keamanan', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->sistem_keamanan : '';
                return $data;
            })
            ->addColumn('sistem_linmas', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->sistem_linmas : '';
                return $data;
            })
            ->addColumn('jumlahpos_digunakan', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->jumlahpos_digunakan : '';
                return $data;
            })
            ->addColumn('jumlahpos_tidakdigunakan', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->jumlahpos_tidakdigunakan : '';
                return $data;
            })
            ->addColumn('jarak_ppt', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->jarak_ppt : '';
                return $data;
            })
            ->addColumn('kemudahan_ppt', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->kemudahan_ppt : '';
                return $data;
            })
            ->addColumn('jarak_korban', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->jarak_korban : '';
                return $data;
            })
            ->addColumn('jarak_lokasikumpul', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->jarak_lokasikumpul : '';
                return $data;
            })
            ->addColumn('jarak_mangkal', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->jarak_mangkal : '';
                return $data;
            })
            ->addColumn('jarak_lokalisasi', function ($row) {
                $rtkegiatan_warga = rtkegiatan_warga::where('nik', $row->nik)->first();
                $data = $rtkegiatan_warga ? $rtkegiatan_warga->jarak_lokalisasi : '';
                return $data;
            })


            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Datart $datart, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        return view('sdgs.RT.editdatart', compact('datart'))->with([
            'valnik' => $datart->nik,
            'valnama_ketuart' => $datart->nama_ketuart,
            'valalamat' => $datart->alamat,
            'valrt' => $datart->rt,
            'valrw' => $datart->rw,
            'valnohp' => $datart->nohp,
        ]);
    }


    public function add()
    {
        return view('sdgs.RT.tambahdatart');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storedata_rtRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storedata_rtRequest $request)
    {
        $datart = new Datart();
        $datart->nik = $request->valnik;
        $datart->nama = $request->valnama_ketuart;
        $datart->alamat = $request->valalamat;
        $datart->rt = $request->valrt;
        $datart->rw = $request->valrw;
        $datart->nohp = $request->valnohp;


        $datart->save();
        return redirect()->route('datart.admin_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\data_rt  $data_rt
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\data_rt  $data_rt
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatedata_rtRequest  $request
     * @param  \App\Models\data_rt  $data_rt
     * @return \Illuminate\Http\Response
     */
    public function update(Updatedata_rtRequest $request, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();

        if ($datart) {
            $datart->update([
                'nik' => $request->input('valnik'),
                'nama' => $request->input('valnama_ketuart'),
                'alamat' => $request->input('valalamat'),
                'rt' => $request->input('valrt'),
                'rw' => $request->input('valrw'),
                'nohp' => $request->input('valnohp'),
            ]);
        }

        return redirect()->route('datart.admin_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\data_rt  $data_rt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datart $data_rt)
    {
        //
    }
}
