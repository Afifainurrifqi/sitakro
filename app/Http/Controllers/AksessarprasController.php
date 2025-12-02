<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\aksessarpras;
use App\Http\Requests\StoreaksessarprasRequest;
use App\Http\Requests\UpdateaksessarprasRequest;
use Yajra\DataTables\DataTables;

class AksessarprasController extends Controller
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
        $dataTerisi = aksessarpras::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        return view('sdgs.KK.aksessarpras', compact('presentase'));
    }
    public function admin_index(Request $request)
    {
        $totalPenduduk = datapenduduk::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = aksessarpras::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        return view('sdgs.KK.admin_aksessarpras', compact('presentase'));
    }

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
                            <a href="' . route('aksessarpras.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('aksessarpras.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
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






            ->rawColumns([
                'action',
                'jenistrasport_lokasipu',
                'pengtransportumum_lokasipu',
                'waktutempuh_lokasipu',
                'biaya_lokasipu',
                'kemudahan_lokasipu',
                'jenistrasport_lahanpertanian',
                'pengtransportumum_lahanpertanian',
                'waktutempuh_lahanpertanian',
                'biaya_lahanpertanian',
                'kemudahan_lahanpertanian',
                'jenistrasport_sekolah',
                'pengtransportumum_sekolah',
                'waktutempuh_sekolah',
                'biaya_sekolah',
                'kemudahan_sekolah',
                'jenistrasport_berobat',
                'pengtransportumum_berobat',
                'waktutempuh_berobat',
                'biaya_berobat',
                'kemudahan_berobat',
                'jenistrasport_beribadah',
                'pengtransportumum_beribadah',
                'waktutempuh_beribadah',
                'biaya_beribadah',
                'kemudahan_beribadah',
                'jenistrasport_rekreasi',
                'pengtransportumum_rekreasi',
                'waktutempuh_rekreasi',
                'biaya_rekreasi',
                'kemudahan_rekreasi',
                // ... (Add other columns similarly)
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
                            <a href="' . route('aksessarpras.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('aksessarpras.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
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






            ->rawColumns([
                'action',
                'jenistrasport_lokasipu',
                'pengtransportumum_lokasipu',
                'waktutempuh_lokasipu',
                'biaya_lokasipu',
                'kemudahan_lokasipu',
                'jenistrasport_lahanpertanian',
                'pengtransportumum_lahanpertanian',
                'waktutempuh_lahanpertanian',
                'biaya_lahanpertanian',
                'kemudahan_lahanpertanian',
                'jenistrasport_sekolah',
                'pengtransportumum_sekolah',
                'waktutempuh_sekolah',
                'biaya_sekolah',
                'kemudahan_sekolah',
                'jenistrasport_berobat',
                'pengtransportumum_berobat',
                'waktutempuh_berobat',
                'biaya_berobat',
                'kemudahan_berobat',
                'jenistrasport_beribadah',
                'pengtransportumum_beribadah',
                'waktutempuh_beribadah',
                'biaya_beribadah',
                'kemudahan_beribadah',
                'jenistrasport_rekreasi',
                'pengtransportumum_rekreasi',
                'waktutempuh_rekreasi',
                'biaya_rekreasi',
                'kemudahan_rekreasi',
                // ... (Add other columns similarly)
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
        $akses_sarpras = aksessarpras::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.editaksespras', compact('akses_sarpras', 'datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreaksessarprasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreaksessarprasRequest $request)
    {
        $akses_sarpras = aksessarpras::where('nik', $request->valNIK)->first();
        if ($akses_sarpras == NULL) {
            $akses_sarpras = new aksessarpras();
        }
        $akses_sarpras->nik = $request->valNIK;
        $akses_sarpras->jenistrasport_lokasipu = $request->valjenistrasport_lokasipu;
        $akses_sarpras->pengtransportumum_lokasipu = $request->valpengtransportumum_lokasipu;
        $akses_sarpras->waktutempuh_lokasipu = $request->valwaktutempuh_lokasipu;
        $akses_sarpras->biaya_lokasipu = $request->valbiaya_lokasipu;
        $akses_sarpras->kemudahan_lokasipu = $request->valkemudahan_lokasipu;
        $akses_sarpras->jenistrasport_lahanpertanian = $request->valjenistrasport_lahanpertanian;
        $akses_sarpras->pengtransportumum_lahanpertanian = $request->valpengtransportumum_lahanpertanian;
        $akses_sarpras->waktutempuh_lahanpertanian = $request->valwaktutempuh_lahanpertanian;
        $akses_sarpras->biaya_lahanpertanian = $request->valbiaya_lahanpertanian;
        $akses_sarpras->kemudahan_lahanpertanian = $request->valkemudahan_lahanpertanian;
        $akses_sarpras->jenistrasport_sekolah = $request->valjenistrasport_sekolah;
        $akses_sarpras->pengtransportumum_sekolah = $request->valpengtransportumum_sekolah;
        $akses_sarpras->waktutempuh_sekolah = $request->valwaktutempuh_sekolah;
        $akses_sarpras->biaya_sekolah = $request->valbiaya_sekolah;
        $akses_sarpras->kemudahan_sekolah = $request->valkemudahan_sekolah;
        $akses_sarpras->jenistrasport_berobat = $request->valjenistrasport_berobat;
        $akses_sarpras->pengtransportumum_berobat = $request->valpengtransportumum_berobat;
        $akses_sarpras->waktutempuh_berobat = $request->valwaktutempuh_berobat;
        $akses_sarpras->biaya_berobat = $request->valbiaya_berobat;
        $akses_sarpras->kemudahan_berobat = $request->valkemudahan_berobat;
        $akses_sarpras->jenistrasport_beribadah = $request->valjenistrasport_beribadah;
        $akses_sarpras->pengtransportumum_beribadah = $request->valpengtransportumum_beribadah;
        $akses_sarpras->waktutempuh_beribadah = $request->valwaktutempuh_beribadah;
        $akses_sarpras->biaya_beribadah = $request->valbiaya_beribadah;
        $akses_sarpras->kemudahan_beribadah = $request->valkemudahan_beribadah;
        $akses_sarpras->jenistrasport_rekreasi = $request->valjenistrasport_rekreasi;
        $akses_sarpras->pengtransportumum_rekreasi = $request->valpengtransportumum_rekreasi;
        $akses_sarpras->waktutempuh_rekreasi = $request->valwaktutempuh_rekreasi;
        $akses_sarpras->biaya_rekreasi = $request->valbiaya_rekreasi;
        $akses_sarpras->kemudahan_rekreasi = $request->valkemudahan_rekreasi;

        $akses_sarpras->save();
       if (auth()->check() && auth()->user()->role === 'admin') {
            return redirect()
                ->route('aksessarpras.admin_index')
                ->with('msg', 'Berhasil ditambahkan (Admin)');
        }

        // Default untuk user biasa
        return redirect()
            ->route('aksessarpras.index')
            ->with('msg', 'Penduduk Berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\aksessarpras  $aksessarpras
     * @return \Illuminate\Http\Response
     */
    public function show(aksessarpras $aksessarpras, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $akses_sarpras = aksessarpras::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.KK.showaksessarpras', compact('akses_sarpras', 'datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\aksessarpras  $aksessarpras
     * @return \Illuminate\Http\Response
     */
    public function edit(aksessarpras $aksessarpras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateaksessarprasRequest  $request
     * @param  \App\Models\aksessarpras  $aksessarpras
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateaksessarprasRequest $request, aksessarpras $aksessarpras)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\aksessarpras  $aksessarpras
     * @return \Illuminate\Http\Response
     */
    public function destroy(aksessarpras $aksessarpras)
    {
        //
    }
}
