<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rtindustri;
use App\Http\Requests\StorertindustriRequest;
use App\Http\Requests\UpdatertindustriRequest;
use App\Models\Datart;
use Yajra\DataTables\DataTables;

class RtindustriController extends Controller
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
        $dataTerisi = rtindustri::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.rtindustri', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = rtindustri::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.admin_rtindustri', compact('presentase'));
    }

    public function jsonadmin(Request $request)
    {
        $query = Datart::query(); // Query the data_rt model

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('rtindustri.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rtindustri.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>


                        </td>';
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
                            <a href="' . route('rtindustri.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rtindustri.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>


                        </td>';
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
        $rt_industri = rtindustri::where('nik', $nik)->first();

        return view('sdgs.RT.editrtindustri', compact('rt_industri', 'datart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorertindustriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorertindustriRequest $request)
    {
        $rt_industri = rtindustri::where('nik', $request->valnik)->first();
        if ($rt_industri == NULL) {
            $rt_industri = new rtindustri();
        }
        $rt_industri->nik = $request->valnik;
        $rt_industri->nama_ketuart = $request->valnama_ketuart;
        $rt_industri->alamat = $request->valalamat;
        $rt_industri->rt = $request->valrt;
        $rt_industri->rw = $request->valrw;
        $rt_industri->nohp = $request->valnohp;
        $rt_industri->jumlahindustrik_kulit = $request->valjumlahindustrik_kulit;
        $rt_industri->jumlahindustris_kulit = $request->valjumlahindustris_kulit;
        $rt_industri->jumlahmanajemen_kulit = $request->valjumlahmanajemen_kulit;
        $rt_industri->jumlahpekerja_kulit = $request->valjumlahpekerja_kulit;
        $rt_industri->jumlahindustrik_kayu = $request->valjumlahindustrik_kayu;
        $rt_industri->jumlahindustris_kayu = $request->valjumlahindustris_kayu;
        $rt_industri->jumlahmanajemen_kayu = $request->valjumlahmanajemen_kayu;
        $rt_industri->jumlahpekerja_kayu = $request->valjumlahpekerja_kayu;
        $rt_industri->jumlahindustrik_logam = $request->valjumlahindustrik_logam;
        $rt_industri->jumlahindustris_logam = $request->valjumlahindustris_logam;
        $rt_industri->jumlahmanajemen_logam = $request->valjumlahmanajemen_logam;
        $rt_industri->jumlahpekerja_logam = $request->valjumlahpekerja_logam;
        $rt_industri->jumlahindustrik_logamb = $request->valjumlahindustrik_logamb;
        $rt_industri->jumlahindustris_logamb = $request->valjumlahindustris_logamb;
        $rt_industri->jumlahmanajemen_logamb = $request->valjumlahmanajemen_logamb;
        $rt_industri->jumlahpekerja_logamb = $request->valjumlahpekerja_logamb;
        $rt_industri->jumlahindustrik_kain = $request->valjumlahindustrik_kain;
        $rt_industri->jumlahindustris_kain = $request->valjumlahindustris_kain;
        $rt_industri->jumlahmanajemen_kain = $request->valjumlahmanajemen_kain;
        $rt_industri->jumlahpekerja_kain = $request->valjumlahpekerja_kain;
        $rt_industri->jumlahindustrik_keramik = $request->valjumlahindustrik_keramik;
        $rt_industri->jumlahindustris_keramik = $request->valjumlahindustris_keramik;
        $rt_industri->jumlahmanajemen_keramik = $request->valjumlahmanajemen_keramik;
        $rt_industri->jumlahpekerja_keramik = $request->valjumlahpekerja_keramik;
        $rt_industri->jumlahindustrik_genteng = $request->valjumlahindustrik_genteng;
        $rt_industri->jumlahindustris_genteng = $request->valjumlahindustris_genteng;
        $rt_industri->jumlahmanajemen_genteng = $request->valjumlahmanajemen_genteng;
        $rt_industri->jumlahpekerja_genteng = $request->valjumlahpekerja_genteng;
        $rt_industri->jumlahindustrik_anyaman = $request->valjumlahindustrik_anyaman;
        $rt_industri->jumlahindustris_anyaman = $request->valjumlahindustris_anyaman;
        $rt_industri->jumlahmanajemen_anyaman = $request->valjumlahmanajemen_anyaman;
        $rt_industri->jumlahpekerja_anyaman = $request->valjumlahpekerja_anyaman;
        $rt_industri->jumlahindustrik_makanan = $request->valjumlahindustrik_makanan;
        $rt_industri->jumlahindustris_makanan = $request->valjumlahindustris_makanan;
        $rt_industri->jumlahmanajemen_makanan = $request->valjumlahmanajemen_makanan;
        $rt_industri->jumlahpekerja_makanan = $request->valjumlahpekerja_makanan;
        $rt_industri->jumlahindustrik_lainnya = $request->valjumlahindustrik_lainnya;
        $rt_industri->jumlahindustris_lainnya = $request->valjumlahindustris_lainnya;
        $rt_industri->jumlahmanajemen_lainnya = $request->valjumlahmanajemen_lainnya;
        $rt_industri->jumlahpekerja_lainnya = $request->valjumlahpekerja_lainnya;

        $rt_industri->save();
        return redirect()->route('rtindustri.show', ['show' => $request->valnik]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rtindustri  $rtindustri
     * @return \Illuminate\Http\Response
     */
    public function show(rtindustri $rtindustri, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        $rt_industri = rtindustri::where('nik', $nik)->first();

        return view('sdgs.RT.showrtindustri', compact('rt_industri', 'datart'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rtindustri  $rtindustri
     * @return \Illuminate\Http\Response
     */
    public function edit(rtindustri $rtindustri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatertindustriRequest  $request
     * @param  \App\Models\rtindustri  $rtindustri
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatertindustriRequest $request, rtindustri $rtindustri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rtindustri  $rtindustri
     * @return \Illuminate\Http\Response
     */
    public function destroy(rtindustri $rtindustri)
    {
        //
    }
}
