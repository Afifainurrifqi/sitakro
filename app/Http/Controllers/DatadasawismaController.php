<?php

namespace App\Http\Controllers;

use App\Models\datapenduduk;
use App\Models\User;
use App\Models\datadasawisma;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoredatadasawismaRequest;
use App\Http\Requests\UpdatedatadasawismaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class datadasawismaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $datap = datapenduduk::whereIn('datak', ['Tetap', 'Tidaktetap']);

        if ($search) {
            $datap->where('nik', 'like', '%' . $search . '%');
        }
        $datap = $datap->paginate(100);
        return view('datadasawisma.datadw', compact('datap')); // Pass it to the view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredatadasawismaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredatadasawismaRequest $request)
    {
        //
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\datadasawisma  $datadasawisma
     * @return \Illuminate\Http\Response
     */
    public function show(datadasawisma $datadasawisma, $nik)
    {
        $datapenduduk = datapenduduk::where('nik', $nik)->first();
        $datadasawismas = Datadasawisma::all(); // Use a different variable name to avoid overwriting the model variable
        $user = User::first(); 
        // Assuming you want to get the first user. Adjust this according to your logic.
    
        return view('datadasawisma/tambahdw', compact('datapenduduk', 'datadasawismas', 'user', 'nik'))->with([
            'valNIK' => $nik,
            'valNama' => $datapenduduk->nama,
            'valAlamat' => $datapenduduk->alamat,
            'valRT' => $datapenduduk->rt,
            'valRW' => $datapenduduk->rw,
            'valEmails' => $user->email,
            'valPassword' => $user->password,
            'valRole' => $user->role,
            'valNamakelompok' => $datadasawisma->nama_kelompok,
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\datadasawisma  $datadasawisma
     * @return \Illuminate\Http\Response
     */
    public function edit(datadasawisma $datadasawisma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedatadasawismaRequest  $request
     * @param  \App\Models\datadasawisma  $datadasawisma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nik)
{
    // Validasi data dari request
    // dd($request);
    // Temukan data penduduk
    $datapenduduk = datapenduduk::where('nik', $request->nik)->first();
    $user = new User();
    $user->name = $datapenduduk->nama;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->role = $request->role;
    $user->save();

    $datapenduduk->user_id = $user->id;
    $datapenduduk->save();
    return redirect()->route('dasawisma.index')->with('success', 'Data berhasil diperbarui');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\datadasawisma  $datadasawisma
     * @return \Illuminate\Http\Response
     */
    public function destroy(datadasawisma $datadasawisma)
    {
        //
    }
}