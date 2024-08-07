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
use Yajra\DataTables\DataTables;

class DatadasawismaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('datadasawisma.datadw'); // Pass it to the view
    }
    public function index_admin(Request $request)
    {

        return view('datadasawisma.admindatadw'); // Pass it to the view
    }

    public function json(Request $request)
    {
        $allowedDatakValues = ['tetap', 'tidaktetap'];

        $query = Datapenduduk::with(['kk'])
            ->whereIn('Datak', $allowedDatakValues)
            ->where(function ($q) {
                $q->whereNull('user_id'); // Assuming dasawisma is determined by user_id being NULL
            });

            if ($request->has('nik')) {
                $nik = $request->input('nik');
                $query = Datapenduduk::with(['kk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'detailkk.kk'])
                    ->where('nik', $nik)
                    ->whereIn('Datak', $allowedDatakValues);
            } else {
                // Jika tidak ada parameter NIK, kembalikan data kosong
                $query = Datapenduduk::whereNull('nik'); // Tidak mengembalikan data
            }

        return DataTables::of($query)
            ->addColumn('nokk', function ($datapenduduk) {
                return optional($datapenduduk->detailkk)->kk->nokk;
            })
            ->addColumn('action', function ($datadasawisma) {
                $editUrl = route('dasawisma.show', ['nik' => $datadasawisma->nik]);
                $deleteForm = '<form onsubmit="return deleteData(\'' . $datadasawisma->nama . '\')"
                            action="' . url('dasa$datadasawisma') . '/' . $datadasawisma->nik . '" style="display: inline"
                            method="POST">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                        </form>';
                $actionsHtml = '<a href="' . $editUrl . '" class="btn mb-1 btn-info btn-sm" title="Edit data">
                            <i class="fas fa-edit"></i>
                        </a>
                        ' . $deleteForm;

                return $actionsHtml;
            })
            ->addColumn('statusdw', function (Datapenduduk $item) {
                return $item && $item->user_id == NULL ? 'dasawisma' : 'penduduk';
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function jsonadmin(Request $request)
    {
        $allowedDatakValues = ['tetap', 'tidaktetap'];

        $query = Datapenduduk::with(['kk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'detailkk.kk'])
            ->whereIn('datak', $allowedDatakValues);

        return DataTables::of($query)
            ->addColumn('nokk', function ($datapenduduk) {
                return optional($datapenduduk->detailkk)->kk->nokk;
            })
            ->addColumn('action', function ($datadasawisma) {
                $editUrl = route('dasawisma.show', ['nik' => $datadasawisma->nik]);
                $deleteForm = '<form onsubmit="return deleteData(\'' . $datadasawisma->nama . '\')"
                                action="' . url('dasawisma') . '/' . $datadasawisma->nik . '" style="display: inline"
                                method="POST">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                            </form>';
                $actionsHtml = '<a href="' . $editUrl . '" class="btn mb-1 btn-info btn-sm" title="Edit data">
                                <i class="fas fa-edit"></i>
                            </a>
                            ' . $deleteForm;

                return $actionsHtml;
            })
            ->addColumn('statusdw',function($datapenduduk) {
                return $datapenduduk && $datapenduduk->user_id == NULL ? 'penduduk' : 'dasawisma';
            })
            ->rawColumns(['action'])
            ->toJson();
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
        $user = User::where('nik', $nik)->first(); // Retrieve the associated User model

        return view('datadasawisma/tambahdw', compact('datapenduduk',  'user', 'nik'))->with([
            'valNIK' => $nik,
            'valNama' => $datapenduduk->nama,
            'valAlamat' => $datapenduduk->alamat,
            'valRT' => $datapenduduk->rt,
            'valRW' => $datapenduduk->rw,
            'valEmails' => $user->email ?? '', // Retrieve email from the associated User model
            'valPassword' => $user->password ?? '', // Retrieve password from the associated User model
            'valRole' => $user->role ?? '', // Retrieve role from the associated User model
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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        // Temukan data penduduk
        $datapenduduk = datapenduduk::where('nik', $nik)->firstOrFail();

        // Temukan data pengguna terkait, jika ada
        $user = User::where('nik', $nik)->first();

        // Jika pengguna tidak ada, buat pengguna baru
        if (!$user) {
            $user = new User();
            $user->nik = $datapenduduk->nik;
        }

        $user->name = $datapenduduk->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Menggunakan bcrypt untuk enkripsi password
        $user->role = $request->role;
        $user->save();

        // Update user_id di data penduduk jika diperlukan
        $datapenduduk->user_id = $user->id;
        $datapenduduk->save();

        return redirect()->route('dasawisma.index_admin')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($nik)
{
    // Temukan data penduduk
    $datapenduduk = Datapenduduk::where('nik', $nik)->firstOrFail();

    // Temukan data pengguna terkait, jika ada
    $user = User::where('nik', $nik)->first();

    // Hapus data pengguna jika ada
    if ($user) {
        $user->delete();
    }

    // Update user_id di data penduduk dan ubah role menjadi 'penduduk'
    $datapenduduk->user_id = null;
    $datapenduduk->role = 'penduduk';
    $datapenduduk->save();

    return redirect()->route('dasawisma.index')->with('success', 'Data berhasil dihapus');
}






}
