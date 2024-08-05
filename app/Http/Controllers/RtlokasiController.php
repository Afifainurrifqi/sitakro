<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use Illuminate\Http\Request;
use App\Models\rtlokasi;
use App\Http\Requests\StorertlokasiRequest;
use App\Http\Requests\UpdatertlokasiRequest;
use App\Models\Datart;
use Yajra\DataTables\DataTables;

class RtlokasiController extends Controller
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
        $dataTerisi = rtlokasi::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.rtlokasi', compact('presentase'));
    }

    public function admin_index(Request $request)
    {
        $totalrt = Datart::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = rtlokasi::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalrt > 0 ? ($dataTerisi / $totalrt) * 100 : 0;

        return view('sdgs.RT.admin_rtlokasi', compact('presentase'));
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
                            <a href="' . route('rtlokasi.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rtlokasi.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
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
                            <a href="' . route('rtlokasi.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('rtlokasi.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                            <i class="fas fa-book"></i>
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
        $rt_lokasi = rtlokasi::where('nik', $nik)->first();


        return view('sdgs.RT.editrtlokasi', compact('rt_lokasi', 'datart'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorertlokasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorertlokasiRequest $request)
    {
        $rt_lokasi = rtlokasi::where('nik', $request->valnik)->first();
        if ($rt_lokasi == NULL) {
            $rt_lokasi = new rtlokasi();
        }
        $rt_lokasi->nik = $request->valnik;
        $rt_lokasi->nama_ketuart = $request->valnama_ketuart;
        $rt_lokasi->alamat = $request->valalamat;
        $rt_lokasi->rt = $request->valrt;
        $rt_lokasi->rw = $request->valrw;
        $rt_lokasi->nohp = $request->valnohp;
        $rt_lokasi->lokasi_rt_pulau = $request->vallokasi_rt_pulau;
        $rt_lokasi->topo_terluas_rt = $request->valtopo_terluas_rt;
        $rt_lokasi->jumlah_warga_lereng = $request->valjumlah_warga_lereng;
        $rt_lokasi->penanaman_pohon_lahan_kritis = $request->valpenanaman_pohon_lahan_kritis;
        $rt_lokasi->pantai_garis_panjang = $request->valpantai_garis_panjang;
        $rt_lokasi->pemanfaatan_laut_perangkap = $request->valpemanfaatan_laut_perangkap;
        $rt_lokasi->pemanfaatan_laut_budidaya = $request->valpemanfaatan_laut_budidaya;
        $rt_lokasi->pemanfaatan_laut_tambakg = $request->valpemanfaatan_laut_tambakg;
        $rt_lokasi->pemanfaatan_laut_bahari = $request->valpemanfaatan_laut_bahari;
        $rt_lokasi->pemanfaatan_laut_transport = $request->valpemanfaatan_laut_transport;
        $rt_lokasi->kondisi_mangrove = $request->valkondisi_mangrove;
        $rt_lokasi->penanaman_mangrove = $request->valpenanaman_mangrove;
        $rt_lokasi->jumlah_warga_pesisir = $request->valjumlah_warga_pesisir;
        $rt_lokasi->jumlah_warga_atasair = $request->valjumlah_warga_atasair;
        $rt_lokasi->wilayah_desa_dalamhutan = $request->valwilayah_desa_dalamhutan;
        $rt_lokasi->wilayah_desa_tepihutan = $request->valwilayah_desa_tepihutan;
        $rt_lokasi->fungsihutan_kons = $request->valfungsihutan_kons;
        $rt_lokasi->fungsihutan_lindung = $request->valfungsihutan_lindung;
        $rt_lokasi->fungsihutan_produk = $request->valfungsihutan_produk;
        $rt_lokasi->fungsihutan_hutandes = $request->valfungsihutan_hutandes;
        $rt_lokasi->jumlahwarga_tinggal_dalamhutan = $request->valjumlahwarga_tinggal_dalamhutan;
        $rt_lokasi->jumlahwarga_tinggal_sekitarhutan = $request->valjumlahwarga_tinggal_sekitarhutan;
        $rt_lokasi->ketergantungan_hutan = $request->valketergantungan_hutan;
        $rt_lokasi->reboisasi = $request->valreboisasi;
        $rt_lokasi->jumlah_produk_luardesa_masuk = $request->valjumlah_produk_luardesa_masuk;
        $rt_lokasi->jumlah_produk_luardesa_keluar = $request->valjumlah_produk_luardesa_keluar;

        $rt_lokasi->save();
        return redirect()->route('rtlokasi.show', ['show' => $request->valnik]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rtlokasi  $rtlokasi
     * @return \Illuminate\Http\Response
     */
    public function show(rtlokasi $rtlokasi, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        $rt_lokasi = rtlokasi::where('nik', $nik)->first();


        return view('sdgs.RT.showrtlokasi', compact('rt_lokasi', 'datart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rtlokasi  $rtlokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(rtlokasi $rtlokasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatertlokasiRequest  $request
     * @param  \App\Models\rtlokasi  $rtlokasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatertlokasiRequest $request, rtlokasi $rtlokasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rtlokasi  $rtlokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(rtlokasi $rtlokasi)
    {
        //
    }
}
