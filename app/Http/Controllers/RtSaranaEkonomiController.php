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

class RtSaranaEkonomiController extends Controller
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
        $rt_sare = rt_sarana_ekonomi::all();
        $rt_industriSudahProses = $rt_sare->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk->count(); // Jumlah total data penduduk

        $persentaseProses = ($rt_industriSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('sdgs.RT.rtsare', compact('rt_sare', 'datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'persentaseProses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_sare = rt_sarana_ekonomi::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.editrtsare', compact('rt_sare', 'datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storert_sarana_ekonomiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storert_sarana_ekonomiRequest $request)
    {
        $rt_sare = rt_sarana_ekonomi::where('nik', $request->valNIK)->first();
        if ($rt_sare == NULL ) {
            $rt_sare = new rt_sarana_ekonomi();
        }     
        $rt_sare->nik = $request->valNIK; 
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
        $rt_sare->jumlah_umumag = $request->valjumlah_umumag;
        $rt_sare->kondisi_umumag = $request->valkondisi_umumag;
        $rt_sare->Jarak_umumag = $request->valJarak_umumag;
        $rt_sare->kemudahan_umumag = $request->valkemudahan_umumag;
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
        return redirect()->route('rtsare.show',['show'=> $request->valNIK ]);
       


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rt_sarana_ekonomi  $rt_sarana_ekonomi
     * @return \Illuminate\Http\Response
     */
    public function show(rt_sarana_ekonomi $rt_sarana_ekonomi, $nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $rt_sare = rt_sarana_ekonomi::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.RT.showrtsare', compact('rt_sare','datap', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
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
