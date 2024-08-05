<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rt_infrastuktur;
use App\Http\Requests\Storert_infrastukturRequest;
use App\Http\Requests\Updatert_infrastukturRequest;
use App\Models\Datart;
use Yajra\DataTables\DataTables;

class RtInfrastukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = rt_infrastuktur::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.rt_infrastuktur', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = rt_infrastuktur::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.admin_rt_infrastuktur', compact('presentase'));
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
                            <a href="' . route('rtinfrastuktur.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rtinfrastuktur.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>

                        </td>';
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



            ->rawColumns([
                'action',


            ])
            ->toJson();
    }

    public function jsonadmin(Request $request)
    {
        $query = Datart::query(); // Query the data_rt model

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('rtinfrastuktur.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rtinfrastuktur.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>

                        </td>';
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



            ->rawColumns([
                'action',


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
        $datart = Datart::where('nik', $nik)->first();
        $rtinfrastuktur = rt_infrastuktur::where('nik', $nik)->first();

        return view('sdgs.RT.editrt_infrastuktur', compact('rtinfrastuktur', 'datart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_infrastukturRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_infrastukturRequest $request)
    {
        $rtinfrastuktur = rt_infrastuktur::where('nik', $request->valnik)->first();
        if ($rtinfrastuktur == NULL) {
            $rtinfrastuktur = new rt_infrastuktur();
        }
        $rtinfrastuktur->nik = $request->valnik;
        $rtinfrastuktur->nama_ketuart = $request->valnama_ketuart;
        $rtinfrastuktur->alamat = $request->valalamat;
        $rtinfrastuktur->rt = $request->valrt;
        $rtinfrastuktur->rw = $request->valrw;
        $rtinfrastuktur->nohp = $request->valnohp;

        $rtinfrastuktur->penerangan_jalan = $request->valpenerangan_jalan;
        $rtinfrastuktur->pra_transportrt = $request->valpra_transportrt;
        $rtinfrastuktur->jalan_aspal = $request->valjalan_aspal;
        $rtinfrastuktur->jalan_makadam = $request->valjalan_makadam;
        $rtinfrastuktur->jalan_tanah = $request->valjalan_tanah;
        $rtinfrastuktur->jalan_papan_atasaair = $request->valjalan_papan_atasaair;
        $rtinfrastuktur->jalan_setapak = $request->valjalan_setapak;
        $rtinfrastuktur->jalan_lainnya = $request->valjalan_lainnya;
        $rtinfrastuktur->jalan_darat_roda4 = $request->valjalan_darat_roda4;
        $rtinfrastuktur->angkutanumum_trayek = $request->valangkutanumum_trayek;
        $rtinfrastuktur->angkutanumum_opra = $request->valangkutanumum_opra;
        $rtinfrastuktur->angkutanumum_jamopra = $request->valangkutanumum_jamopra;
        $rtinfrastuktur->dermaga_laut = $request->valdermaga_laut;
        $rtinfrastuktur->sinyalhp_bts = $request->valsinyalhp_bts;
        $rtinfrastuktur->sinyalhp_telkom = $request->valsinyalhp_telkom;
        $rtinfrastuktur->sinyalhp_indo = $request->valsinyalhp_indo;
        $rtinfrastuktur->sinyalhp_xl = $request->valsinyalhp_xl;
        $rtinfrastuktur->sinyalhp_hut = $request->valsinyalhp_hut;
        $rtinfrastuktur->sinyalhp_psn = $request->valsinyalhp_psn;
        $rtinfrastuktur->sinyalhp_smart = $request->valsinyalhp_smart;
        $rtinfrastuktur->sinyalhp_bakrie = $request->valsinyalhp_bakrie;
        $rtinfrastuktur->pos_pembantu = $request->valpos_pembantu;
        $rtinfrastuktur->pos_keliling = $request->valpos_keliling;
        $rtinfrastuktur->agen_jasa = $request->valagen_jasa;
        $rtinfrastuktur->chanel_tvri = $request->valchanel_tvri;
        $rtinfrastuktur->parabola_tvri = $request->valparabola_tvri;
        $rtinfrastuktur->chanel_tvrid = $request->valchanel_tvrid;
        $rtinfrastuktur->parabola_tvrid = $request->valparabola_tvrid;
        $rtinfrastuktur->chanel_s = $request->valchanel_s;
        $rtinfrastuktur->parabola_s = $request->valparabola_s;
        $rtinfrastuktur->chanel_ln = $request->valchanel_ln;
        $rtinfrastuktur->parabola_ln = $request->valparabola_ln;
        $rtinfrastuktur->chanel_rri = $request->valchanel_rri;
        $rtinfrastuktur->parabola_rri = $request->valparabola_rri;
        $rtinfrastuktur->chanel_rrid = $request->valchanel_rrid;
        $rtinfrastuktur->parabola_rrid = $request->valparabola_rrid;
        $rtinfrastuktur->chanel_radios = $request->valchanel_radios;
        $rtinfrastuktur->parabola_radios = $request->valparabola_radios;
        $rtinfrastuktur->chanel_radiok = $request->valchanel_radiok;
        $rtinfrastuktur->parabola_radiok = $request->valparabola_radiok;
        $rtinfrastuktur->jumlah_lokasi_air = $request->valjumlah_lokasi_air;
        $rtinfrastuktur->fasilitas_umump_pasar = $request->valfasilitas_umump_pasar;
        $rtinfrastuktur->fasilitas_umump_stasiun = $request->valfasilitas_umump_stasiun;
        $rtinfrastuktur->fasilitas_umump_terminal = $request->valfasilitas_umump_terminal;
        $rtinfrastuktur->fasilitas_umump_kolong = $request->valfasilitas_umump_kolong;
        $rtinfrastuktur->fasilitas_umump_pelabuhan = $request->valfasilitas_umump_pelabuhan;
        $rtinfrastuktur->pemukiman_khusus_mewah = $request->valpemukiman_khusus_mewah;
        $rtinfrastuktur->pemukiman_khusus_apart = $request->valpemukiman_khusus_apart;
        $rtinfrastuktur->pemukiman_khusus_susun = $request->valpemukiman_khusus_susun;
        $rtinfrastuktur->pemukiman_khusus_school = $request->valpemukiman_khusus_school;
        $rtinfrastuktur->pemukiman_khusus_kos = $request->valpemukiman_khusus_kos;
        $rtinfrastuktur->pemukiman_khusus_asrama = $request->valpemukiman_khusus_asrama;
        $rtinfrastuktur->pemukiman_khusus_lp = $request->valpemukiman_khusus_lp;

        $rtinfrastuktur->save();
        return redirect()->route('rtinfrastuktur.show', ['show' => $request->valnik]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_infrastuktur  $rt_infrastuktur
     * @return \Illuminate\Http\Response
     */
    public function show(rt_infrastuktur $rt_infrastuktur, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        $rtinfrastuktur = rt_infrastuktur::where('nik', $nik)->first();

        return view('sdgs.RT.showrt_infrastuktur', compact('rtinfrastuktur', 'datart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rt_infrastuktur  $rt_infrastuktur
     * @return \Illuminate\Http\Response
     */
    public function edit(rt_infrastuktur $rt_infrastuktur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatert_infrastukturRequest  $request
     * @param  \App\Models\rt_infrastuktur  $rt_infrastuktur
     * @return \Illuminate\Http\Response
     */
    public function update(Updatert_infrastukturRequest $request, rt_infrastuktur $rt_infrastuktur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rt_infrastuktur  $rt_infrastuktur
     * @return \Illuminate\Http\Response
     */
    public function destroy(rt_infrastuktur $rt_infrastuktur)
    {
        //
    }
}
