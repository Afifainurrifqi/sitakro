<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\lembaga_masyarakat;
use App\Http\Requests\Storelembaga_masyarakatRequest;
use App\Http\Requests\Updatelembaga_masyarakatRequest;
use App\Models\Datart;
use Yajra\DataTables\DataTables;

class LembagaMasyarakatController extends Controller
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
        $dataTerisi = lembaga_masyarakat::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.rtlembaga_masyarakat', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = lembaga_masyarakat::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.admin_rtlembaga_masyarakat', compact('presentase'));
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
                            <a href="' . route('rtlembaga_masyarakat.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rtlembaga_masyarakat.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>

                        </td>';
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
                            <a href="' . route('rtlembaga_masyarakat.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rtlembaga_masyarakat.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>

                        </td>';
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
        $rtlembaga_masyarakat = lembaga_masyarakat::where('nik', $nik)->first();


        return view('sdgs.RT.editrtlembaga_masyarakat', compact('rtlembaga_masyarakat', 'datart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storelembaga_masyarakatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storelembaga_masyarakatRequest $request)
    {
        $rtlembaga_masyarakat = lembaga_masyarakat::where('nik', $request->valnik)->first();
        if ($rtlembaga_masyarakat == NULL) {
            $rtlembaga_masyarakat = new lembaga_masyarakat();
        }
        $rtlembaga_masyarakat->nik = $request->valnik;
        $rtlembaga_masyarakat->nama_ketuart = $request->valnama_ketuart;
        $rtlembaga_masyarakat->alamat = $request->valalamat;
        $rtlembaga_masyarakat->rt = $request->valrt;
        $rtlembaga_masyarakat->rw = $request->valrw;
        $rtlembaga_masyarakat->nohp = $request->valnohp;
        $rtlembaga_masyarakat->nama = $request->valnama;
        $rtlembaga_masyarakat->jumlah_kel = $request->valjumlah_kel;
        $rtlembaga_masyarakat->jumlah_peng = $request->valjumlah_peng;
        $rtlembaga_masyarakat->jumlah_ang = $request->valjumlah_ang;
        $rtlembaga_masyarakat->fasilitas = $request->valfasilitas;
        $rtlembaga_masyarakat->save();
        return redirect()->route('rtlembaga_masyarakat.show', ['show' => $request->valnik]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lembaga_masyarakat  $lembaga_masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(lembaga_masyarakat $lembaga_masyarakat, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        $rtlembaga_masyarakat = lembaga_masyarakat::where('nik', $nik)->first();


        return view('sdgs.RT.showrtlembaga_masyarakat', compact('rtlembaga_masyarakat', 'datart'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lembaga_masyarakat  $lembaga_masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(lembaga_masyarakat $lembaga_masyarakat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatelembaga_masyarakatRequest  $request
     * @param  \App\Models\lembaga_masyarakat  $lembaga_masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Updatelembaga_masyarakatRequest $request, lembaga_masyarakat $lembaga_masyarakat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lembaga_masyarakat  $lembaga_masyarakat
     * @return \Illuminate\Http\Response
     */
    public function destroy(lembaga_masyarakat $lembaga_masyarakat)
    {
        //
    }
}
