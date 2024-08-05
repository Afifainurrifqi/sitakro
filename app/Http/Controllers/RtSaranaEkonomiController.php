<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rt_sarana_ekonomi;
use App\Http\Requests\Storert_sarana_ekonomiRequest;
use App\Http\Requests\Updatert_sarana_ekonomiRequest;
use App\Models\Datart;
use Yajra\DataTables\DataTables;

class RtSaranaEkonomiController extends Controller
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
        $dataTerisi = rt_sarana_ekonomi::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;
        return view('sdgs.RT.rtsare', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = rt_sarana_ekonomi::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;
        return view('sdgs.RT.admin_rtsare', compact('presentase'));
    }

    public function jsonadmin(Request $request)
    {
        $query = Datart::query(); // Query the data_rt model

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('rtsare.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rtsare.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>
                        </td>';
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
            ->rawColumns([
                'action',


            ])
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
                            <a href="' . route('rtsare.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rtsare.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>
                        </td>';
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
        $rt_sare = rt_sarana_ekonomi::where('nik', $nik)->first();


        return view('sdgs.RT.editrtsare', compact('rt_sare', 'datart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_sarana_ekonomiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_sarana_ekonomiRequest $request)
    {
        $rt_sare = rt_sarana_ekonomi::where('nik', $request->valnik)->first();
        if ($rt_sare == NULL ) {
            $rt_sare = new rt_sarana_ekonomi();
        }
        $rt_sare->nik = $request->valnik;
        $rt_sare->nama_ketuart = $request->valnama_ketuart;
        $rt_sare->alamat = $request->valalamat;
        $rt_sare->rt = $request->valrt;
        $rt_sare->rw = $request->valrw;
        $rt_sare->nohp = $request->valnohp;
        $rt_sare->jumlah_toko = $request->valjumlah_toko;
        $rt_sare->kondisi_toko = $request->valkondisi_toko;
        $rt_sare->Jarak_toko = $request->valJarak_toko;
        $rt_sare->kemudahan_toko = $request->valkemudahan_toko;
        $rt_sare->jumlah_pasar_permanen = $request->valjumlah_pasar_permanen;
        $rt_sare->kondisi_pasar_permanen = $request->valkondisi_pasar_permanen;
        $rt_sare->Jarak_pasar_permanen = $request->valJarak_pasar_permanen;
        $rt_sare->kemudahan_pasar_permanen = $request->valkemudahan_pasar_permanen;
        $rt_sare->jumlah_semip = $request->valjumlah_semip;
        $rt_sare->kondisi_semip = $request->valkondisi_semip;
        $rt_sare->Jarak_semip = $request->valJarak_semip;
        $rt_sare->kemudahan_semip = $request->valkemudahan_semip;
        $rt_sare->jumlah_tanpap = $request->valjumlah_tanpap;
        $rt_sare->kondisi_tanpap = $request->valkondisi_tanpap;
        $rt_sare->Jarak_tanpap = $request->valJarak_tanpap;
        $rt_sare->kemudahan_tanpap = $request->valkemudahan_tanpap;
        $rt_sare->jumlah_minimarket = $request->valjumlah_minimarket;
        $rt_sare->kondisi_minimarket = $request->valkondisi_minimarket;
        $rt_sare->Jarak_minimarket = $request->valJarak_minimarket;
        $rt_sare->kemudahan_minimarket = $request->valkemudahan_minimarket;
        $rt_sare->jumlah_warungk = $request->valjumlah_warungk;
        $rt_sare->kondisi_warungk = $request->valkondisi_warungk;
        $rt_sare->Jarak_warungk = $request->valJarak_warungk;
        $rt_sare->kemudahan_warungk = $request->valkemudahan_warungk;
        $rt_sare->jumlah_warungp = $request->valjumlah_warungp;
        $rt_sare->kondisi_warungp = $request->valkondisi_warungp;
        $rt_sare->Jarak_warungp = $request->valJarak_warungp;
        $rt_sare->kemudahan_warungp = $request->valkemudahan_warungp;
        $rt_sare->jumlah_restoran = $request->valjumlah_restoran;
        $rt_sare->kondisi_restoran = $request->valkondisi_restoran;
        $rt_sare->Jarak_restoran = $request->valJarak_restoran;
        $rt_sare->kemudahan_restoran = $request->valkemudahan_restoran;
        $rt_sare->jumlah_kedaim = $request->valjumlah_kedaim;
        $rt_sare->kondisi_kedaim = $request->valkondisi_kedaim;
        $rt_sare->Jarak_kedaim = $request->valJarak_kedaim;
        $rt_sare->kemudahan_kedaim = $request->valkemudahan_kedaim;
        $rt_sare->jumlah_hotel = $request->valjumlah_hotel;
        $rt_sare->kondisi_hotel = $request->valkondisi_hotel;
        $rt_sare->Jarak_hotel = $request->valJarak_hotel;
        $rt_sare->kemudahan_hotel = $request->valkemudahan_hotel;
        $rt_sare->jumlah_hostel = $request->valjumlah_hostel;
        $rt_sare->kondisi_hostel = $request->valkondisi_hostel;
        $rt_sare->Jarak_hostel = $request->valJarak_hostel;
        $rt_sare->kemudahan_hostel = $request->valkemudahan_hostel;
        $rt_sare->jumlah_bengkelm = $request->valjumlah_bengkelm;
        $rt_sare->kondisi_bengkelm = $request->valkondisi_bengkelm;
        $rt_sare->Jarak_bengkelm = $request->valJarak_bengkelm;
        $rt_sare->kemudahan_bengkelm = $request->valkemudahan_bengkelm;
        $rt_sare->jumlah_salonk = $request->valjumlah_salonk;
        $rt_sare->kondisi_salonk = $request->valkondisi_salonk;
        $rt_sare->Jarak_salonk = $request->valJarak_salonk;
        $rt_sare->kemudahan_salonk = $request->valkemudahan_salonk;
        $rt_sare->jumlah_agent = $request->valjumlah_agent;
        $rt_sare->kondisi_agent = $request->valkondisi_agent;
        $rt_sare->Jarak_agent = $request->valJarak_agent;
        $rt_sare->kemudahan_agent = $request->valkemudahan_agent;
        $rt_sare->jumlah_bankbri = $request->valjumlah_bankbri;
        $rt_sare->kondisi_bankbri = $request->valkondisi_bankbri;
        $rt_sare->Jarak_bankbri = $request->valJarak_bankbri;
        $rt_sare->kemudahan_bankbri = $request->valkemudahan_bankbri;
        $rt_sare->jumlah_briag = $request->valjumlah_briag;
        $rt_sare->kondisi_briag = $request->valkondisi_briag;
        $rt_sare->Jarak_briag = $request->valJarak_briag;
        $rt_sare->kemudahan_briag = $request->valkemudahan_briag;
        $rt_sare->jumlah_bankbni = $request->valjumlah_bankbni;
        $rt_sare->kondisi_bankbni = $request->valkondisi_bankbni;
        $rt_sare->Jarak_bankbni = $request->valJarak_bankbni;
        $rt_sare->kemudahan_bankbni = $request->valkemudahan_bankbni;
        $rt_sare->jumlah_bniag = $request->valjumlah_bniag;
        $rt_sare->kondisi_bniag = $request->valkondisi_bniag;
        $rt_sare->Jarak_bniag = $request->valJarak_bniag;
        $rt_sare->kemudahan_bniag = $request->valkemudahan_bniag;
        $rt_sare->jumlah_bankmandiri = $request->valjumlah_bankmandiri;
        $rt_sare->kondisi_bankmandiri = $request->valkondisi_bankmandiri;
        $rt_sare->Jarak_bankmandiri = $request->valJarak_bankmandiri;
        $rt_sare->kemudahan_bankmandiri = $request->valkemudahan_bankmandiri;
        $rt_sare->jumlah_mandiriag = $request->valjumlah_mandiriag;
        $rt_sare->kondisi_mandiriag = $request->valkondisi_mandiriag;
        $rt_sare->Jarak_mandiriag = $request->valJarak_mandiriag;
        $rt_sare->kemudahan_mandiriag = $request->valkemudahan_mandiriag;
        $rt_sare->jumlah_bankbpd = $request->valjumlah_bankbpd;
        $rt_sare->kondisi_bankbpd = $request->valkondisi_bankbpd;
        $rt_sare->Jarak_bankbpd = $request->valJarak_bankbpd;
        $rt_sare->kemudahan_bankbpd = $request->valkemudahan_bankbpd;
        $rt_sare->jumlah_bpdag = $request->valjumlah_bpdag;
        $rt_sare->kondisi_bpdag = $request->valkondisi_bpdag;
        $rt_sare->Jarak_bpdag = $request->valJarak_bpdag;
        $rt_sare->kemudahan_bpdag = $request->valkemudahan_bpdag;
        $rt_sare->jumlah_bankumum = $request->valjumlah_bankumum;
        $rt_sare->kondisi_bankumum = $request->valkondisi_bankumum;
        $rt_sare->Jarak_bankumum = $request->valJarak_bankumum;
        $rt_sare->kemudahan_bankumum = $request->valkemudahan_bankumum;
        $rt_sare->jumlah_bankbca = $request->valjumlah_bankbca;
        $rt_sare->kondisi_bankbca = $request->valkondisi_bankbca;
        $rt_sare->Jarak_bankbca = $request->valJarak_bankbca;
        $rt_sare->kemudahan_bankbca = $request->valkemudahan_bankbca;
        $rt_sare->jumlah_bankcimb = $request->valjumlah_bankcimb;
        $rt_sare->kondisi_bankcimb = $request->valkondisi_bankcimb;
        $rt_sare->Jarak_bankcimb = $request->valJarak_bankcimb;
        $rt_sare->kemudahan_bankcimb = $request->valkemudahan_bankcimb;
        $rt_sare->jumlah_banksinarm = $request->valjumlah_banksinarm;
        $rt_sare->kondisi_banksinarm = $request->valkondisi_banksinarm;
        $rt_sare->Jarak_banksinarm = $request->valJarak_banksinarm;
        $rt_sare->kemudahan_banksinarm = $request->valkemudahan_banksinarm;
        $rt_sare->jumlah_bankpermata = $request->valjumlah_bankpermata;
        $rt_sare->kondisi_bankpermata = $request->valkondisi_bankpermata;
        $rt_sare->Jarak_bankpermata = $request->valJarak_bankpermata;
        $rt_sare->kemudahan_bankpermata = $request->valkemudahan_bankpermata;
        $rt_sare->jumlah_bankswastalain = $request->valjumlah_bankswastalain;
        $rt_sare->kondisi_bankswastalain = $request->valkondisi_bankswastalain;
        $rt_sare->Jarak_bankswastalain = $request->valJarak_bankswastalain;
        $rt_sare->kemudahan_bankswastalain = $request->valkemudahan_bankswastalain;
        $rt_sare->jumlah_bankbpr = $request->valjumlah_bankbpr;
        $rt_sare->kondisi_bankbpr = $request->valkondisi_bankbpr;
        $rt_sare->Jarak_bankbpr = $request->valJarak_bankbpr;
        $rt_sare->kemudahan_bankbpr = $request->valkemudahan_bankbpr;
        $rt_sare->jumlah_bmt = $request->valjumlah_bmt;
        $rt_sare->kondisi_bmt = $request->valkondisi_bmt;
        $rt_sare->Jarak_bmt = $request->valJarak_bmt;
        $rt_sare->kemudahan_bmt = $request->valkemudahan_bmt;
        $rt_sare->jumlah_pegadaian = $request->valjumlah_pegadaian;
        $rt_sare->kondisi_pegadaian = $request->valkondisi_pegadaian;
        $rt_sare->Jarak_pegadaian = $request->valJarak_pegadaian;
        $rt_sare->kemudahan_pegadaian = $request->valkemudahan_pegadaian;
        $rt_sare->jumlah_atm = $request->valjumlah_atm;
        $rt_sare->kondisi_atm = $request->valkondisi_atm;
        $rt_sare->Jarak_atm = $request->valJarak_atm;
        $rt_sare->kemudahan_atm = $request->valkemudahan_atm;
        $rt_sare->jumlah_saranalain = $request->valjumlah_saranalain;
        $rt_sare->kondisi_saranalain = $request->valkondisi_saranalain;
        $rt_sare->Jarak_saranalain = $request->valJarak_saranalain;
        $rt_sare->kemudahan_saranalain = $request->valkemudahan_saranalain;

        $rt_sare->save();
        return redirect()->route('rtsare.show',['show'=> $request->valnik ]);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_sarana_ekonomi  $rt_sarana_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function show(rt_sarana_ekonomi $rt_sarana_ekonomi, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        $rt_sare = rt_sarana_ekonomi::where('nik', $nik)->first();
        return view('sdgs.RT.showrtsare', compact('rt_sare','datart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rt_sarana_ekonomi  $rt_sarana_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function edit(rt_sarana_ekonomi $rt_sarana_ekonomi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatert_sarana_ekonomiRequest  $request
     * @param  \App\Models\rt_sarana_ekonomi  $rt_sarana_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function update(Updatert_sarana_ekonomiRequest $request, rt_sarana_ekonomi $rt_sarana_ekonomi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rt_sarana_ekonomi  $rt_sarana_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function destroy(rt_sarana_ekonomi $rt_sarana_ekonomi)
    {
        //
    }
}
