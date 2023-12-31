<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Exports\Exportdatapenduduk;
use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use App\Models\dataindividu;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoredatapendudukRequest;
use App\Http\Requests\UpdatedatapendudukRequest;
use App\Imports\Importdatapenduduk;
use App\Models\detailkk;
use App\Models\kk;

class DatapendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = 25; // Adjust this number based on your preference.
    
        $datapenduduk = Datapenduduk::whereIn('datak', ['Tetap', 'Tidaktetap']);
    
        if ($search) {
            $datapenduduk->where('nik', 'like', '%' . $search . '%');
        }
    
        $datapenduduk = $datapenduduk->paginate($perPage);
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
    
        return view('datapenduduk.data', compact('datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }
    

    public function add()
    {
        $datapenduduk = datapenduduk::all();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('datapenduduk.tambahpenduduk', compact('datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    function export_excel()
    {
        return Excel::download(new Exportdatapenduduk, "datapenduduk.xlsx");
    }

    public function import_excel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required'
        ]);
    
        // menangkap file excel
        $file = $request->file('file');
    
        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();
    
        // upload ke folder file_siswa di dalam folder public
        $file->move('file_datapenduduk', $nama_file);
    
        // import data
        Excel::import(new Importdatapenduduk, storage_path('app/public/file_datapenduduk/' . $nama_file));

    
        // notifikasi dengan session
    
        // alihkan halaman kembali
        return redirect('datapenduduk');
    }




   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredatapendudukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredatapendudukRequest $request)
    {
        $validate = $request->validated();

        $datapenduduk = new DataPenduduk();
        $datapenduduk->nik = $request->valNIK;
        $datapenduduk->gelarawal = $request->valGelara ?? '';
        $datapenduduk->nama = $request->valNama;
        $datapenduduk->gelarakhir = $request->valGelart ?? '';
        $datapenduduk->jenis_kelamin = $request->valJeniskelamin;
        $datapenduduk->tempat_lahir = $request->valTempatlahir;
        $datapenduduk->tanggal_lahir = $request->valTanggallahir;
        $datapenduduk->agama_id = $request->valAgama;
        $datapenduduk->pendidikan_id = $request->valPendidikan;
        $datapenduduk->pekerjaan_id = $request->valPekerjaan;
        $datapenduduk->goldar_id = $request->valGoldar;
        $datapenduduk->status_id = $request->valStatus;
        $datapenduduk->tanggal_perkawinan = $request->valTanggalperkawinan;
        $datapenduduk->hubungan = $request->valHubungan;
        $datapenduduk->ayah = $request->valAyah;
        $datapenduduk->ibu = $request->valIbu;
        $datapenduduk->alamat = $request->valAlamat;
        $datapenduduk->rt = $request->valRT;
        $datapenduduk->rw = $request->valRW;
        $datapenduduk->datak = $request->valDatak;
        $datapenduduk->save();

        $kartuk = new kk();
        $kartuk->nokk = $request-> valNokk;
        $kartuk->save();

        $detailk = new detailkk();
        $detailk->idpenduduk = $datapenduduk->id;
        $detailk->idkk = $kartuk->id;
        $detailk->save();


        return redirect('datapenduduk')->with('msg', 'Penduduk Berhasl ditambhakan');
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\datapenduduk  $datapenduduk
     * @return \Illuminate\Http\Response
     */
    public function show(datapenduduk $datapenduduk, $nik)
    {
        $datapenduduk = datapenduduk::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        
        return view('datapenduduk.formedit', compact('datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'))->with([
            'valKK' => $datapenduduk->detailkk->kk->nokk,
            'valNIK' => $nik,
            'valGelara' => $datapenduduk->gelarawal,
            'valNama' => $datapenduduk->nama,
            'valGelart' => $datapenduduk->gelarakhir,
            'valJeniskelamin' => $datapenduduk->jenis_kelamin,
            'valTempatlahir' => $datapenduduk->tempat_lahir,
            'valTanggallahir' => $datapenduduk->tanggal_lahir,
            'valAgama' => $datapenduduk->agama_id,
            'valPendidikan' => $datapenduduk->pendidikan_id,
            'valPekerjaan' => $datapenduduk->pekerjaan_id,
            'valGoldar' => $datapenduduk->goldar_id,
            'valStatus' => $datapenduduk->status_id,
            'valTanggalperkawinan' => $datapenduduk->tanggal_perkawinan,
            'valHubungan' => $datapenduduk->hubungan,
            'valAyah' => $datapenduduk->ayah,
            'valIbu' => $datapenduduk->ibu,
            'valAlamat' => $datapenduduk->alamat,
            'valRT' => $datapenduduk->rt,
            'valRW' => $datapenduduk->rw,
            'valDatak' => $datapenduduk->datak

        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\datapenduduk  $datapenduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(datapenduduk $datapenduduk)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedatapendudukRequest  $request
     * @param  \App\Models\datapenduduk  $datapenduduk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedatapendudukRequest $request, $nik)
    {
        $datapenduduk = datapenduduk::where('nik', $nik)->first();
        //    dd($datapenduduk);
        $datapenduduk->gelarawal = $request->valGelara ?? '';
        $datapenduduk->nama = $request->valNama;
        $datapenduduk->gelarakhir = $request->valGelart ?? '';
        $datapenduduk->jenis_kelamin = $request->valJeniskelamin;
        $datapenduduk->tempat_lahir = $request->valTempatlahir;
        $datapenduduk->tanggal_lahir = $request->valTanggallahir;
        $datapenduduk->agama_id = $request->valAgama;
        $datapenduduk->pendidikan_id = $request->valPendidikan;
        $datapenduduk->pekerjaan_id = $request->valPekerjaan;
        $datapenduduk->goldar_id = $request->valGoldar;
        $datapenduduk->status_id = $request->valStatus;
        $datapenduduk->tanggal_perkawinan = $request->valTanggalperkawinan;
        $datapenduduk->hubungan = $request->valHubungan;
        $datapenduduk->ayah = $request->valAyah;
        $datapenduduk->ibu = $request->valIbu;
        $datapenduduk->alamat = $request->valAlamat;
        $datapenduduk->rt = $request->valRT;
        $datapenduduk->rw = $request->valRW;
        $datapenduduk->datak = $request->valDatak;
        $datapenduduk->save();



        return redirect('datapenduduk')->with('msg', 'Data dengan nama data penduduk ' . $datapenduduk->nama . ' Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\datapenduduk  $datapenduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(datapenduduk $datapenduduk, $nik)
    {
    }
}
