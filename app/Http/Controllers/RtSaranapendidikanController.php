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

class RtSaranapendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $datapenduduk = datapenduduk::whereIn('datak', ['Tetap', 'Tidaktetap']);

        if ($search) {
            $datapenduduk->where('nik', 'like', '%' . $search . '%');
        }

        $datapenduduk = $datapenduduk->paginate(100);
        $rt_saranapendidikan = rt_saranapendidikan::all();
        $rt_industriSudahProses = $rt_saranapendidikan->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk

        $persentaseProses = ($rt_industriSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.RT.rt_saranapendidikan', compact('rt_saranapendidikan', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_saranapendidikan = rt_saranapendidikan::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrt_saranapendidikan', compact('rt_saranapendidikan', 'datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_saranapendidikanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_saranapendidikanRequest $request)
    {
        $rt_saranapendidikan = rt_saranapendidikan::where('nik', $request->valNIK)->first();
        if ($rt_saranapendidikan == NULL ) {
            $rt_saranapendidikan = new rt_saranapendidikan();
        }     
        $rt_saranapendidikan->nik = $request->valNIK;           
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
        return redirect()->route('rt_saranapendidikan.show',['show'=> $request->valNIK ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_saranapendidikan  $rt_saranapendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(rt_saranapendidikan $rt_saranapendidikan, $nik)
    {
         $datap = datapenduduk::where('nik', $nik)->first();
        $rt_saranapendidikan = rt_saranapendidikan::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrt_saranapendidikan', compact('rt_saranapendidikan', 'datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
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
