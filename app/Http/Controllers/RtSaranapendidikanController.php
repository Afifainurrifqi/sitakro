<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rt_saranapendidikan;
use App\Http\Requests\Storert_saranapendidikanRequest;
use App\Http\Requests\Updatert_saranapendidikanRequest;
use App\Models\Datart;
use Yajra\DataTables\DataTables;

class RtSaranapendidikanController extends Controller
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
        $dataTerisi = rt_saranapendidikan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.rt_saranapendidikan', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = rt_saranapendidikan::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.admin_rt_saranapendidikan', compact('presentase'));
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
                            <a href="' . route('rt_saranapendidikan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rt_saranapendidikan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>
                        </td>';
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
                            <a href="' . route('rt_saranapendidikan.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rt_saranapendidikan.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>
                        </td>';
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
        $rt_saranapendidikan = rt_saranapendidikan::where('nik', $nik)->first();

        return view('sdgs.RT.editrt_saranapendidikan', compact('rt_saranapendidikan', 'datart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_saranapendidikanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_saranapendidikanRequest $request)
    {
        $rt_saranapendidikan = rt_saranapendidikan::where('nik', $request->valnik)->first();
        if ($rt_saranapendidikan == NULL ) {
            $rt_saranapendidikan = new rt_saranapendidikan();
        }
        $rt_saranapendidikan->nik = $request->valnik;
        $rt_saranapendidikan->nama_ketuart = $request->valnama_ketuart;
        $rt_saranapendidikan->alamat = $request->valalamat;
        $rt_saranapendidikan->rt = $request->valrt;
        $rt_saranapendidikan->rw = $request->valrw;
        $rt_saranapendidikan->nohp = $request->valnohp;
        $rt_saranapendidikan->nama_paud = $request->valnama_paud;
        $rt_saranapendidikan->pemilik_paud = $request->valpemilik_paud;
        $rt_saranapendidikan->kondisi_paud = $request->valkondisi_paud;
        $rt_saranapendidikan->jumlahguru_paud = $request->valjumlahguru_paud;
        $rt_saranapendidikan->jumlahmurid_paud = $request->valjumlahmurid_paud;
        $rt_saranapendidikan->jumlahpegawai_paud = $request->valjumlahpegawai_paud;
        $rt_saranapendidikan->nama_tk = $request->valnama_tk;
        $rt_saranapendidikan->pemilik_tk = $request->valpemilik_tk;
        $rt_saranapendidikan->kondisi_tk = $request->valkondisi_tk;
        $rt_saranapendidikan->jumlahguru_tk = $request->valjumlahguru_tk;
        $rt_saranapendidikan->jumlahmurid_tk = $request->valjumlahmurid_tk;
        $rt_saranapendidikan->jumlahpegawai_tk = $request->valjumlahpegawai_tk;
        $rt_saranapendidikan->nama_sd = $request->valnama_sd;
        $rt_saranapendidikan->pemilik_sd = $request->valpemilik_sd;
        $rt_saranapendidikan->kondisi_sd = $request->valkondisi_sd;
        $rt_saranapendidikan->jumlahguru_sd = $request->valjumlahguru_sd;
        $rt_saranapendidikan->jumlahmurid_sd = $request->valjumlahmurid_sd;
        $rt_saranapendidikan->jumlahpegawai_sd = $request->valjumlahpegawai_sd;
        $rt_saranapendidikan->nama_smp = $request->valnama_smp;
        $rt_saranapendidikan->pemilik_smp = $request->valpemilik_smp;
        $rt_saranapendidikan->kondisi_smp = $request->valkondisi_smp;
        $rt_saranapendidikan->jumlahguru_smp = $request->valjumlahguru_smp;
        $rt_saranapendidikan->jumlahmurid_smp = $request->valjumlahmurid_smp;
        $rt_saranapendidikan->jumlahpegawai_smp = $request->valjumlahpegawai_smp;
        $rt_saranapendidikan->nama_smplb = $request->valnama_smplb;
        $rt_saranapendidikan->pemilik_smplb = $request->valpemilik_smplb;
        $rt_saranapendidikan->kondisi_smplb = $request->valkondisi_smplb;
        $rt_saranapendidikan->jumlahguru_smplb = $request->valjumlahguru_smplb;
        $rt_saranapendidikan->jumlahmurid_smplb = $request->valjumlahmurid_smplb;
        $rt_saranapendidikan->jumlahpegawai_smplb = $request->valjumlahpegawai_smplb;
        $rt_saranapendidikan->nama_sma = $request->valnama_sma;
        $rt_saranapendidikan->pemilik_sma = $request->valpemilik_sma;
        $rt_saranapendidikan->kondisi_sma = $request->valkondisi_sma;
        $rt_saranapendidikan->jumlahguru_sma = $request->valjumlahguru_sma;
        $rt_saranapendidikan->jumlahmurid_sma = $request->valjumlahmurid_sma;
        $rt_saranapendidikan->jumlahpegawai_sma = $request->valjumlahpegawai_sma;
        $rt_saranapendidikan->nama_smk = $request->valnama_smk;
        $rt_saranapendidikan->pemilik_smk = $request->valpemilik_smk;
        $rt_saranapendidikan->kondisi_smk = $request->valkondisi_smk;
        $rt_saranapendidikan->jumlahguru_smk = $request->valjumlahguru_smk;
        $rt_saranapendidikan->jumlahmurid_smk = $request->valjumlahmurid_smk;
        $rt_saranapendidikan->jumlahpegawai_smk = $request->valjumlahpegawai_smk;
        $rt_saranapendidikan->nama_smalb = $request->valnama_smalb;
        $rt_saranapendidikan->pemilik_smalb = $request->valpemilik_smalb;
        $rt_saranapendidikan->kondisi_smalb = $request->valkondisi_smalb;
        $rt_saranapendidikan->jumlahguru_smalb = $request->valjumlahguru_smalb;
        $rt_saranapendidikan->jumlahmurid_smalb = $request->valjumlahmurid_smalb;
        $rt_saranapendidikan->jumlahpegawai_smalb = $request->valjumlahpegawai_smalb;
        $rt_saranapendidikan->nama_akademi = $request->valnama_akademi;
        $rt_saranapendidikan->pemilik_akademi = $request->valpemilik_akademi;
        $rt_saranapendidikan->kondisi_akademi = $request->valkondisi_akademi;
        $rt_saranapendidikan->jumlahguru_akademi = $request->valjumlahguru_akademi;
        $rt_saranapendidikan->jumlahmurid_akademi = $request->valjumlahmurid_akademi;
        $rt_saranapendidikan->jumlahpegawai_akademi = $request->valjumlahpegawai_akademi;
        $rt_saranapendidikan->nama_pesantren = $request->valnama_pesantren;
        $rt_saranapendidikan->pemilik_pesantren = $request->valpemilik_pesantren;
        $rt_saranapendidikan->kondisi_pesantren = $request->valkondisi_pesantren;
        $rt_saranapendidikan->jumlahguru_pesantren = $request->valjumlahguru_pesantren;
        $rt_saranapendidikan->jumlahmurid_pesantren = $request->valjumlahmurid_pesantren;
        $rt_saranapendidikan->jumlahpegawai_pesantren = $request->valjumlahpegawai_pesantren;
        $rt_saranapendidikan->nama_madrasahdn = $request->valnama_madrasahdn;
        $rt_saranapendidikan->pemilik_madrasahdn = $request->valpemilik_madrasahdn;
        $rt_saranapendidikan->kondisi_madrasahdn = $request->valkondisi_madrasahdn;
        $rt_saranapendidikan->jumlahguru_madrasahdn = $request->valjumlahguru_madrasahdn;
        $rt_saranapendidikan->jumlahmurid_madrasahdn = $request->valjumlahmurid_madrasahdn;
        $rt_saranapendidikan->jumlahpegawai_madrasahdn = $request->valjumlahpegawai_madrasahdn;
        $rt_saranapendidikan->nama_seminari = $request->valnama_seminari;
        $rt_saranapendidikan->pemilik_seminari = $request->valpemilik_seminari;
        $rt_saranapendidikan->kondisi_seminari = $request->valkondisi_seminari;
        $rt_saranapendidikan->jumlahguru_seminari = $request->valjumlahguru_seminari;
        $rt_saranapendidikan->jumlahmurid_seminari = $request->valjumlahmurid_seminari;
        $rt_saranapendidikan->jumlahpegawai_seminari = $request->valjumlahpegawai_seminari;
        $rt_saranapendidikan->nama_sekolahag = $request->valnama_sekolahag;
        $rt_saranapendidikan->pemilik_sekolahag = $request->valpemilik_sekolahag;
        $rt_saranapendidikan->kondisi_sekolahag = $request->valkondisi_sekolahag;
        $rt_saranapendidikan->jumlahguru_sekolahag = $request->valjumlahguru_sekolahag;
        $rt_saranapendidikan->jumlahmurid_sekolahag = $request->valjumlahmurid_sekolahag;
        $rt_saranapendidikan->jumlahpegawai_sekolahag = $request->valjumlahpegawai_sekolahag;
        $rt_saranapendidikan->nama_butaaksara = $request->valnama_butaaksara;
        $rt_saranapendidikan->pemilik_butaaksara = $request->valpemilik_butaaksara;
        $rt_saranapendidikan->kondisi_butaaksara = $request->valkondisi_butaaksara;
        $rt_saranapendidikan->jumlahguru_butaaksara = $request->valjumlahguru_butaaksara;
        $rt_saranapendidikan->jumlahmurid_butaaksara = $request->valjumlahmurid_butaaksara;
        $rt_saranapendidikan->jumlahpegawai_butaaksara = $request->valjumlahpegawai_butaaksara;
        $rt_saranapendidikan->nama_paketa = $request->valnama_paketa;
        $rt_saranapendidikan->pemilik_paketa = $request->valpemilik_paketa;
        $rt_saranapendidikan->kondisi_paketa = $request->valkondisi_paketa;
        $rt_saranapendidikan->jumlahguru_paketa = $request->valjumlahguru_paketa;
        $rt_saranapendidikan->jumlahmurid_paketa = $request->valjumlahmurid_paketa;
        $rt_saranapendidikan->jumlahpegawai_paketa = $request->valjumlahpegawai_paketa;
        $rt_saranapendidikan->nama_paketb = $request->valnama_paketb;
        $rt_saranapendidikan->pemilik_paketb = $request->valpemilik_paketb;
        $rt_saranapendidikan->kondisi_paketb = $request->valkondisi_paketb;
        $rt_saranapendidikan->jumlahguru_paketb = $request->valjumlahguru_paketb;
        $rt_saranapendidikan->jumlahmurid_paketb = $request->valjumlahmurid_paketb;
        $rt_saranapendidikan->jumlahpegawai_paketb = $request->valjumlahpegawai_paketb;
        $rt_saranapendidikan->nama_paketc = $request->valnama_paketc;
        $rt_saranapendidikan->pemilik_paketc = $request->valpemilik_paketc;
        $rt_saranapendidikan->kondisi_paketc = $request->valkondisi_paketc;
        $rt_saranapendidikan->jumlahguru_paketc = $request->valjumlahguru_paketc;
        $rt_saranapendidikan->jumlahmurid_paketc = $request->valjumlahmurid_paketc;
        $rt_saranapendidikan->jumlahpegawai_paketc = $request->valjumlahpegawai_paketc;
        $rt_saranapendidikan->nama_playgrup = $request->valnama_playgrup;
        $rt_saranapendidikan->pemilik_playgrup = $request->valpemilik_playgrup;
        $rt_saranapendidikan->kondisi_playgrup = $request->valkondisi_playgrup;
        $rt_saranapendidikan->jumlahguru_playgrup = $request->valjumlahguru_playgrup;
        $rt_saranapendidikan->jumlahmurid_playgrup = $request->valjumlahmurid_playgrup;
        $rt_saranapendidikan->jumlahpegawai_playgrup = $request->valjumlahpegawai_playgrup;
        $rt_saranapendidikan->nama_penitipananak = $request->valnama_penitipananak;
        $rt_saranapendidikan->pemilik_penitipananak = $request->valpemilik_penitipananak;
        $rt_saranapendidikan->kondisi_penitipananak = $request->valkondisi_penitipananak;
        $rt_saranapendidikan->jumlahguru_penitipananak = $request->valjumlahguru_penitipananak;
        $rt_saranapendidikan->jumlahmurid_penitipananak = $request->valjumlahmurid_penitipananak;
        $rt_saranapendidikan->jumlahpegawai_penitipananak = $request->valjumlahpegawai_penitipananak;
        $rt_saranapendidikan->nama_pendidikanq = $request->valnama_pendidikanq;
        $rt_saranapendidikan->pemilik_pendidikanq = $request->valpemilik_pendidikanq;
        $rt_saranapendidikan->kondisi_pendidikanq = $request->valkondisi_pendidikanq;
        $rt_saranapendidikan->jumlahguru_pendidikanq = $request->valjumlahguru_pendidikanq;
        $rt_saranapendidikan->jumlahmurid_pendidikanq = $request->valjumlahmurid_pendidikanq;
        $rt_saranapendidikan->jumlahpegawai_pendidikanq = $request->valjumlahpegawai_pendidikanq;
        $rt_saranapendidikan->nama_bahasaas = $request->valnama_bahasaas;
        $rt_saranapendidikan->pemilik_bahasaas = $request->valpemilik_bahasaas;
        $rt_saranapendidikan->kondisi_bahasaas = $request->valkondisi_bahasaas;
        $rt_saranapendidikan->jumlahguru_bahasaas = $request->valjumlahguru_bahasaas;
        $rt_saranapendidikan->jumlahmurid_bahasaas = $request->valjumlahmurid_bahasaas;
        $rt_saranapendidikan->jumlahpegawai_bahasaas = $request->valjumlahpegawai_bahasaas;
        $rt_saranapendidikan->nama_kursuskomp = $request->valnama_kursuskomp;
        $rt_saranapendidikan->pemilik_kursuskomp = $request->valpemilik_kursuskomp;
        $rt_saranapendidikan->kondisi_kursuskomp = $request->valkondisi_kursuskomp;
        $rt_saranapendidikan->jumlahguru_kursuskomp = $request->valjumlahguru_kursuskomp;
        $rt_saranapendidikan->jumlahmurid_kursuskomp = $request->valjumlahmurid_kursuskomp;
        $rt_saranapendidikan->jumlahpegawai_kursuskomp = $request->valjumlahpegawai_kursuskomp;
        $rt_saranapendidikan->nama_kursusmenjahit = $request->valnama_kursusmenjahit;
        $rt_saranapendidikan->pemilik_kursusmenjahit = $request->valpemilik_kursusmenjahit;
        $rt_saranapendidikan->kondisi_kursusmenjahit = $request->valkondisi_kursusmenjahit;
        $rt_saranapendidikan->jumlahguru_kursusmenjahit = $request->valjumlahguru_kursusmenjahit;
        $rt_saranapendidikan->jumlahmurid_kursusmenjahit = $request->valjumlahmurid_kursusmenjahit;
        $rt_saranapendidikan->jumlahpegawai_kursusmenjahit = $request->valjumlahpegawai_kursusmenjahit;
        $rt_saranapendidikan->nama_kursuskecantikan = $request->valnama_kursuskecantikan;
        $rt_saranapendidikan->pemilik_kursuskecantikan = $request->valpemilik_kursuskecantikan;
        $rt_saranapendidikan->kondisi_kursuskecantikan = $request->valkondisi_kursuskecantikan;
        $rt_saranapendidikan->jumlahguru_kursuskecantikan = $request->valjumlahguru_kursuskecantikan;
        $rt_saranapendidikan->jumlahmurid_kursuskecantikan = $request->valjumlahmurid_kursuskecantikan;
        $rt_saranapendidikan->jumlahpegawai_kursuskecantikan = $request->valjumlahpegawai_kursuskecantikan;
        $rt_saranapendidikan->nama_kursusmontir = $request->valnama_kursusmontir;
        $rt_saranapendidikan->pemilik_kursusmontir = $request->valpemilik_kursusmontir;
        $rt_saranapendidikan->kondisi_kursusmontir = $request->valkondisi_kursusmontir;
        $rt_saranapendidikan->jumlahguru_kursusmontir = $request->valjumlahguru_kursusmontir;
        $rt_saranapendidikan->jumlahmurid_kursusmontir = $request->valjumlahmurid_kursusmontir;
        $rt_saranapendidikan->jumlahpegawai_kursusmontir = $request->valjumlahpegawai_kursusmontir;
        $rt_saranapendidikan->nama_kursussetir = $request->valnama_kursussetir;
        $rt_saranapendidikan->pemilik_kursussetir = $request->valpemilik_kursussetir;
        $rt_saranapendidikan->kondisi_kursussetir = $request->valkondisi_kursussetir;
        $rt_saranapendidikan->jumlahguru_kursussetir = $request->valjumlahguru_kursussetir;
        $rt_saranapendidikan->jumlahmurid_kursussetir = $request->valjumlahmurid_kursussetir;
        $rt_saranapendidikan->jumlahpegawai_kursussetir = $request->valjumlahpegawai_kursussetir;
        $rt_saranapendidikan->nama_kursuselektronik = $request->valnama_kursuselektronik;
        $rt_saranapendidikan->pemilik_kursuselektronik = $request->valpemilik_kursuselektronik;
        $rt_saranapendidikan->kondisi_kursuselektronik = $request->valkondisi_kursuselektronik;
        $rt_saranapendidikan->jumlahguru_kursuselektronik = $request->valjumlahguru_kursuselektronik;
        $rt_saranapendidikan->jumlahmurid_kursuselektronik = $request->valjumlahmurid_kursuselektronik;
        $rt_saranapendidikan->jumlahpegawai_kursuselektronik = $request->valjumlahpegawai_kursuselektronik;
        $rt_saranapendidikan->nama_tataboga = $request->valnama_tataboga;
        $rt_saranapendidikan->pemilik_tataboga = $request->valpemilik_tataboga;
        $rt_saranapendidikan->kondisi_tataboga = $request->valkondisi_tataboga;
        $rt_saranapendidikan->jumlahguru_tataboga = $request->valjumlahguru_tataboga;
        $rt_saranapendidikan->jumlahmurid_tataboga = $request->valjumlahmurid_tataboga;
        $rt_saranapendidikan->jumlahpegawai_tataboga = $request->valjumlahpegawai_tataboga;
        $rt_saranapendidikan->nama_kursusketik = $request->valnama_kursusketik;
        $rt_saranapendidikan->pemilik_kursusketik = $request->valpemilik_kursusketik;
        $rt_saranapendidikan->kondisi_kursusketik = $request->valkondisi_kursusketik;
        $rt_saranapendidikan->jumlahguru_kursusketik = $request->valjumlahguru_kursusketik;
        $rt_saranapendidikan->jumlahmurid_kursusketik = $request->valjumlahmurid_kursusketik;
        $rt_saranapendidikan->jumlahpegawai_kursusketik = $request->valjumlahpegawai_kursusketik;
        $rt_saranapendidikan->nama_kursusakuntan = $request->valnama_kursusakuntan;
        $rt_saranapendidikan->pemilik_kursusakuntan = $request->valpemilik_kursusakuntan;
        $rt_saranapendidikan->kondisi_kursusakuntan = $request->valkondisi_kursusakuntan;
        $rt_saranapendidikan->jumlahguru_kursusakuntan = $request->valjumlahguru_kursusakuntan;
        $rt_saranapendidikan->jumlahmurid_kursusakuntan = $request->valjumlahmurid_kursusakuntan;
        $rt_saranapendidikan->jumlahpegawai_kursusakuntan = $request->valjumlahpegawai_kursusakuntan;
        $rt_saranapendidikan->nama_kursuslain = $request->valnama_kursuslain;
        $rt_saranapendidikan->pemilik_kursuslain = $request->valpemilik_kursuslain;
        $rt_saranapendidikan->kondisi_kursuslain = $request->valkondisi_kursuslain;
        $rt_saranapendidikan->jumlahguru_kursuslain = $request->valjumlahguru_kursuslain;
        $rt_saranapendidikan->jumlahmurid_kursuslain = $request->valjumlahmurid_kursuslain;
        $rt_saranapendidikan->jumlahpegawai_kursuslain = $request->valjumlahpegawai_kursuslain;



        $rt_saranapendidikan->save();
        return redirect()->route('rt_saranapendidikan.show',['show'=> $request->valnik ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_saranapendidikan  $rt_saranapendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(rt_saranapendidikan $rt_saranapendidikan, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        $rt_saranapendidikan = rt_saranapendidikan::where('nik', $nik)->first();

        return view('sdgs.RT.showrt_saranapendidikan', compact('rt_saranapendidikan', 'datart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rt_saranapendidikan  $rt_saranapendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(rt_saranapendidikan $rt_saranapendidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatert_saranapendidikanRequest  $request
     * @param  \App\Models\rt_saranapendidikan  $rt_saranapendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Updatert_saranapendidikanRequest $request, rt_saranapendidikan $rt_saranapendidikan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rt_saranapendidikan  $rt_saranapendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(rt_saranapendidikan $rt_saranapendidikan)
    {
        //
    }
}
