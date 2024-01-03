<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use App\Models\dataindividu;
use Illuminate\Http\Request;
use App\Http\Requests\StoredataindividuRequest;
use App\Http\Requests\UpdatedataindividuRequest;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;

class DataindividuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function index(Request $request)
    {
       
        return view('sdgs.individu.dataindividu');
    }

    public function json(Request $request)
    {
        $allowedDatakValues = ['tetap', 'tidaktetap'];

        $query = Datapenduduk::with(['kk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'detailkk.kk'])
            ->whereIn('Datak', $allowedDatakValues);
    
            return DataTables::of($query)
         
            ->addColumn('nokk', function ($row) {
                return $row->detailkk->kk->nokk;
            })
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('individu.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('individu.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })
            ->addColumn('Usia', function ($row) {
                $usia = Carbon::parse($row->tanggal_lahir)->age;
    
                return '' . $usia . ' tahun.';
            })
            ->addColumn('usia_nikah', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $usianikah = $dataIndividu ? $dataIndividu->usia_saat_pertama_kali_menikah : '';
    
                return '' . $usianikah . '';
            })
            ->addColumn('warga_negara', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $warga_negara = $dataIndividu ? $dataIndividu->warga_negarawarga_negara : '';
    
                return '' . $warga_negara . '';
            })
            ->addColumn('hp', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $hp = $dataIndividu ? $dataIndividu->nohp : '';
    
                return '' . $hp . '';
            })
            ->addColumn('wa', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $wa = $dataIndividu ? $dataIndividu->nowa : '';
    
                return '' . $wa . '';
            })
            ->addColumn('email', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $email = $dataIndividu ? $dataIndividu->email : '';
    
                return '' . $email . '';
            })
            ->addColumn('facebook', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $facebook = $dataIndividu ? $dataIndividu->facebook : '';
    
                return   $facebook . '';
            })
    
            ->addColumn('twitter', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $twitter = $dataIndividu ? $dataIndividu->twitter : '';
    
                return  $twitter . '';
            })
    
            ->addColumn('instagram', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $instagram = $dataIndividu ? $dataIndividu->instagram : '';
    
                return $instagram  .'';
            })
            ->addColumn('suku_bangsa', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $sukuBangsa = $dataIndividu ? $dataIndividu->suku_bangsa : '';
    
                return '' . $sukuBangsa . '';
            })
            
            ->rawColumns([
                'action','Usia',
            'usia_nikah',
            'warga_negara',
            'hp',
            'wa',
            'email',
            'facebook',
            'twitter',
            'instagram',
            'suku_bangsa'])
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
        $datai = dataindividu::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.individu.editdataindividu', compact('datap', 'datai', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredataindividuRequest $request)
    {
        // dd($request->all());
        $dataindividu = dataindividu::where('nik', $request->valNIK)->first();
        if ($dataindividu == NULL) {
            $dataindividu = new dataindividu();
        }
        $dataindividu->kk = $request->valKK;
        $dataindividu->nik = $request->valNIK;
        $dataindividu->nama = $request->valNama;
        $dataindividu->Jeniskelamin = $request->valJeniskelamin;
        $dataindividu->tempatlahir = $request->valTempatlahir;
        $dataindividu->Tanggallahir = $request->valTanggallahir;
        $dataindividu->usia = $request->valUsia;
        $dataindividu->status = $request->valStatus;
        $dataindividu->agama = $request->valAgama;
        $dataindividu->usia_saat_pertama_kali_menikah = $request->valUsiapertamamenikah;
        $dataindividu->suku_bangsa = $request->valSukubangsa;
        $dataindividu->warga_negarawarga_negara = $request->valWarganegara;
        $dataindividu->nohp = $request->valNohp;
        $dataindividu->nowa = $request->valNowa;
        $dataindividu->email = $request->valEmail;
        $dataindividu->facebook = $request->valFacebook;
        $dataindividu->twitter = $request->valTwitter;
        $dataindividu->instagram = $request->valInstagram;
        $dataindividu->save();

        return redirect()->route('individu.show', ['show' => $request->valNIK]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(dataindividu $dataindividu, $nik)
    {

        $datap = datapenduduk::where('nik', $nik)->first();
        $datai = dataindividu::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.individu.viewdataindividu', compact('datap', 'datai', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(dataindividu $request, $nik)
    {

        $datapenduduk = Dataindividu::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        $dataindividu = Dataindividu::all();
        return view('sdgs.individu.editdataindividu', compact('datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'))->with([

            'valUsiapertamamenikah' =>  $dataindividu->usiapertamamenikah,
            'valSukubangsa' =>  $dataindividu->sukubangsa,
            'valWarganegara' =>  $dataindividu->warga_negara,
            'valNohp' =>  $dataindividu->nohp,
            'valNowa' =>  $dataindividu->nowa,
            'valEmail' =>  $dataindividu->email,
            'valFacebook' =>  $dataindividu->facebook,
            'valTwitter' =>  $dataindividu->twitter,
            'valInstagram' =>  $dataindividu->instagram,


        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedataindividuRequest $request, $nik)
    {
        $dataindividu = datapenduduk::where('nik', $nik)->first();
        $dataindividu->kk = $request->valKK;
        $dataindividu->nik = $request->valNIK;
        $dataindividu->nama = $request->valNama;
        $dataindividu->Jeniskelamin = $request->valJeniskelamin;
        $dataindividu->tempatlahir = $request->valconfirmTempatlahir;
        $dataindividu->Tanggallahir = $request->valTanggallahir;
        $dataindividu->usia = $request->valUsia;
        $dataindividu->status = $request->valStatus;
        $dataindividu->agama = $request->valagama;
        $dataindividu->usia_saat_pertama_kali_menikah = $request->valUsiapertamamenikah;
        $dataindividu->suku_bangsa = $request->valSukubangsa;
        $dataindividu->warga_negarawarga_negara = $request->valWarganegara;
        $dataindividu->nohp = $request->valNohp;
        $dataindividu->nowa = $request->valNowa;
        $dataindividu->email = $request->valEmail;
        $dataindividu->facebook = $request->valFacebook;
        $dataindividu->twitter = $request->valTwitter;
        $dataindividu->instagram = $request->valInstagram;
        $dataindividu->save();


        return redirect('datapenduduk')->with('msg', 'Data dengan nama data penduduk ' . $dataindividu->nama . ' Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
