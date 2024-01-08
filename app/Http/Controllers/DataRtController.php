<?php

namespace App\Http\Controllers;

use App\Models\data_rt;
use App\Http\Requests\Storedata_rtRequest;
use App\Http\Requests\Updatedata_rtRequest;
use App\Models\Datart;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DataRtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sdgs.RT.datart');
    }

    public function json(Request $request)
    {
        $query = Datart::query(); // Query the data_rt model

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('datart.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Datart $datart, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();
        return view('sdgs.RT.editdatart', compact('datart'))->with([
            'valnik' => $datart->nik,
            'valnama_ketuart' => $datart->nama_ketuart,
            'valalamat' => $datart->alamat,
            'valrt' => $datart->rt,
            'valrw' => $datart->rw,
            'valnohp' => $datart->nohp,
        ]);
    }


    public function add()
    {
        return view('sdgs.RT.tambahdatart');
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storedata_rtRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storedata_rtRequest $request)
    {
        $datart = new Datart();
        $datart->nik = $request->valnik;
        $datart->nama = $request->valnama_ketuart;
        $datart->alamat = $request->valalamat;
        $datart->rt = $request->valrt;
        $datart->rw = $request->valrw;
        $datart->nohp = $request->valnohp;


        $datart->save();
        return redirect()->route('datart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\data_rt  $data_rt
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\data_rt  $data_rt
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatedata_rtRequest  $request
     * @param  \App\Models\data_rt  $data_rt
     * @return \Illuminate\Http\Response
     */
    public function update(Updatedata_rtRequest $request, $nik)
    {
        $datart = Datart::where('nik', $nik)->first();

        if ($datart) {
            $datart->update([
                'nik' => $request->input('valnik'),
                'nama' => $request->input('valnama_ketuart'),
                'alamat' => $request->input('valalamat'),
                'rt' => $request->input('valrt'),
                'rw' => $request->input('valrw'),
                'nohp' => $request->input('valnohp'),
            ]);
        }

        return redirect()->route('datart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\data_rt  $data_rt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datart $data_rt)
    {
        //
    }
}
