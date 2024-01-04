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

class RtlokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('sdgs.RT.rtlokasi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_lokasi = rtlokasi::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrtlokasi', compact('rt_lokasi','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorertlokasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorertlokasiRequest $request)
    {
        $rt_lokasi = rtlokasi::where('nik', $request->valNIK)->first();
        if ($rt_lokasi == NULL ) {
            $rt_lokasi = new rtlokasi();
        }
        $rt_lokasi->nik = $request->valNIK;         
        $rt_lokasi->nama_ketuart = $request -> valnama_ketuart;
        $rt_lokasi->alamat = $request -> valalamat;
        $rt_lokasi->rt = $request -> valrt;
        $rt_lokasi->rw = $request -> valrw;
        $rt_lokasi->nohp = $request -> valnohp;
        $rt_lokasi->lokasi_rt_pulau = $request -> vallokasi_rt_pulau;
        $rt_lokasi->topo_terluas_rt = $request -> valtopo_terluas_rt;
        $rt_lokasi->jumlah_warga_lereng = $request -> valjumlah_warga_lereng;
        $rt_lokasi->penanaman_pohon_lahan_kritis = $request -> valpenanaman_pohon_lahan_kritis;
        $rt_lokasi->pantai_garis_panjang = $request -> valpantai_garis_panjang;
        $rt_lokasi->pemanfaatan_laut_perangkap = $request -> valpemanfaatan_laut_perangkap;
        $rt_lokasi->pemanfaatan_laut_budidaya = $request -> valpemanfaatan_laut_budidaya;
        $rt_lokasi->pemanfaatan_laut_tambakg = $request -> valpemanfaatan_laut_tambakg;
        $rt_lokasi->pemanfaatan_laut_bahari = $request -> valpemanfaatan_laut_bahari;
        $rt_lokasi->pemanfaatan_laut_transport = $request -> valpemanfaatan_laut_transport;
        $rt_lokasi->kondisi_mangrove = $request -> valkondisi_mangrove;
        $rt_lokasi->penanaman_mangrove = $request -> valpenanaman_mangrove;
        $rt_lokasi->jumlah_warga_pesisir = $request -> valjumlah_warga_pesisir;
        $rt_lokasi->jumlah_warga_atasair = $request -> valjumlah_warga_atasair;
        $rt_lokasi->wilayah_desa_dalamhutan = $request -> valwilayah_desa_dalamhutan;
        $rt_lokasi->wilayah_desa_tepihutan = $request -> valwilayah_desa_tepihutan;
        $rt_lokasi->fungsihutan_kons = $request -> valfungsihutan_kons;
        $rt_lokasi->fungsihutan_lindung = $request -> valfungsihutan_lindung;
        $rt_lokasi->fungsihutan_produk = $request -> valfungsihutan_produk;
        $rt_lokasi->fungsihutan_hutandes = $request -> valfungsihutan_hutandes;
        $rt_lokasi->jumlahwarga_tinggal_dalamhutan = $request -> valjumlahwarga_tinggal_dalamhutan;
        $rt_lokasi->jumlahwarga_tinggal_sekitarhutan = $request -> valjumlahwarga_tinggal_sekitarhutan;
        $rt_lokasi->ketergantungan_hutan = $request -> valketergantungan_hutan;
        $rt_lokasi->reboisasi = $request -> valreboisasi;
        $rt_lokasi->jumlah_produk_luardesa_masuk = $request -> valjumlah_produk_luardesa_masuk;
        $rt_lokasi->jumlah_produk_luardesa_keluar = $request -> valjumlah_produk_luardesa_keluar;

        $rt_lokasi->save();
        return redirect()->route('rtlokasi.show',['show'=> $request->valNIK ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rtlokasi  $rtlokasi
     * @return \Illuminate\Http\Response
     */
    public function show(rtlokasi $rtlokasi, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_lokasi = rtlokasi::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrtlokasi', compact('rt_lokasi','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
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
