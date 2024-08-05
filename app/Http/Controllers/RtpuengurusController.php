<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rtpuengurus;
use App\Http\Requests\StorertpuengurusRequest;
use App\Http\Requests\UpdatertpuengurusRequest;
use App\Models\Datart;
use Yajra\DataTables\DataTables;

class RtpuengurusController extends Controller
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
        $dataTerisi = rtpuengurus::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.rtpengurus', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = rtpuengurus::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.admin_rtpengurus', compact('presentase'));
    }

    public function jsonadmin(Request $request)
    {
        $query = Datart::query(); // Query the data_rt model

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('rtpengurus.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rtpengurus.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>


                        </td>';
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
                            <a href="' . route('rtpengurus.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rtpengurus.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
                        </a>


                        </td>';
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
        $rt_pengurus = rtpuengurus::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrtpengurus', compact('rt_pengurus', 'datart', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorertpuengurusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorertpuengurusRequest $request)
    {
        $rt_pengurus = rtpuengurus::where('nik', $request->valNIK)->first();
        if ($rt_pengurus == NULL) {
            $rt_pengurus = new rtpuengurus();
        }
        $rt_pengurus->nik = $request->valnik;
        $rt_pengurus->nama_ketuart = $request->valnama_ketuart;
        $rt_pengurus->alamat = $request->valalamat;
        $rt_pengurus->rt = $request->valrt;
        $rt_pengurus->rw = $request->valrw;
        $rt_pengurus->nohp = $request->valnohp;
        $rt_pengurus->nama_ketuarw = $request->valnama_ketuarw;
        $rt_pengurus->nik_ketuarw = $request->valnik_ketuarw;
        $rt_pengurus->nohp_ketuarw = $request->valnohp_ketuarw;
        $rt_pengurus->menjabat_ketuarw = $request->valmenjabat_ketuarw;
        $rt_pengurus->nama_sekrw = $request->valnama_sekrw;
        $rt_pengurus->nik_sekrw = $request->valnik_sekrw;
        $rt_pengurus->nohp_sekrw = $request->valnohp_sekrw;
        $rt_pengurus->menjabat_sekrw = $request->valmenjabat_sekrw;
        $rt_pengurus->nama_benrw = $request->valnama_benrw;
        $rt_pengurus->nik_benrw = $request->valnik_benrw;
        $rt_pengurus->nohp_benrw = $request->valnohp_benrw;
        $rt_pengurus->menjabat_benrw = $request->valmenjabat_benrw;
        $rt_pengurus->nama_ketuart = $request->valnama_ketuart;
        $rt_pengurus->nik_ketuart = $request->valnik_ketuart;
        $rt_pengurus->nohp_ketuart = $request->valnohp_ketuart;
        $rt_pengurus->menjabat_ketuart = $request->valmenjabat_ketuart;
        $rt_pengurus->nama_sekrt = $request->valnama_sekrt;
        $rt_pengurus->nik_sekrt = $request->valnik_sekrt;
        $rt_pengurus->nohp_sekrt = $request->valnohp_sekrt;
        $rt_pengurus->menjabat_sekrt = $request->valmenjabat_sekrt;
        $rt_pengurus->nama_benrt = $request->valnama_benrt;
        $rt_pengurus->nik_benrt = $request->valnik_benrt;
        $rt_pengurus->nohp_benrt = $request->valnohp_benrt;
        $rt_pengurus->menjabat_benrt = $request->valmenjabat_benrt;

        $rt_pengurus->save();
        return redirect()->route('rtpengurus.show', ['show' => $request->valnik]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rtpuengurus  $rtpuengurus
     * @return \Illuminate\Http\Response
     */
    public function show(rtpuengurus $rtpuengurus, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        $rt_pengurus = rtpuengurus::where('nik', $nik)->first();

        return view('sdgs.RT.showrtpengurus', compact('rt_pengurus', 'datart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rtpuengurus  $rtpuengurus
     * @return \Illuminate\Http\Response
     */
    public function edit(rtpuengurus $rtpuengurus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatertpuengurusRequest  $request
     * @param  \App\Models\rtpuengurus  $rtpuengurus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatertpuengurusRequest $request, rtpuengurus $rtpuengurus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rtpuengurus  $rtpuengurus
     * @return \Illuminate\Http\Response
     */
    public function destroy(rtpuengurus $rtpuengurus)
    {
        //
    }
}
