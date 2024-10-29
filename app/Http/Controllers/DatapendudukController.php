<?php

namespace App\Http\Controllers;

use App\Exports\data_individu;
use Carbon\Carbon;
use App\Exports\Exportdatapenduduk;
use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use App\Models\dataindividu;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoredatapendudukRequest;
use App\Http\Requests\UpdatedatapendudukRequest;
use App\Imports\Importdatapenduduk;
use App\Models\detailkk;
use App\Models\kk;
use PhpOffice\PhpSpreadsheet\IOFactory;



class DatapendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('datapenduduk.data');
    }
    public function index_admin(Request $request)
    {
        return view('datapenduduk.admindata');
    }


    public function dasawisma(Request $request)
    {
        return view('datapenduduk.dasawismaindex');
    }

    public function jsonadmin(Request $request)
    {
        $allowedDatakValues = ['tetap', 'tidaktetap'];

        $query = Datapenduduk::with(['kk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'detailkk.kk','updatedByUser'])
            ->whereIn('Datak', $allowedDatakValues);

            return DataTables::of($query)
            ->addColumn('nokk', function ($datapenduduk) {
                return optional($datapenduduk->detailkk)->kk->nokk;
            })
            ->addColumn('updated_by', function ($datapenduduk) {
                return optional($datapenduduk->updatedByUser)->name; // Menampilkan nama user
            })
            ->addColumn('action', function ($datapenduduk) {
                $editUrl = route('datapenduduk.show', ['nik' => $datapenduduk->nik]);
                $deleteForm = '<form onsubmit="return deleteData(\'' . $datapenduduk->nama . '\')"
                                action="' . url('datapenduduk') . '/' . $datapenduduk->nik . '" style="display: inline"
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
            ->rawColumns(['action'])
            ->toJson();

    }



    public function json(Request $request)
    {
        $allowedDatakValues = ['tetap', 'tidaktetap'];

        // Jika terdapat parameter NIK pada request, lakukan pencarian berdasarkan NIK
        if ($request->has('nokk')) {
            $nokk = $request->input('nokk');
            $query = Datapenduduk::with(['kk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'detailkk.kk'])
                ->whereHas('detailkk.kk', function ($query) use ($nokk) {
                    $query->where('nokk', $nokk);
                })
                ->whereIn('Datak', $allowedDatakValues);
        } else {
            // Jika tidak ada parameter noKK, kembalikan data kosong
            $query = Datapenduduk::whereNull('id'); // Tidak mengembalikan data
        }

        return DataTables::of($query)
            ->addColumn('nokk', function ($datapenduduk) {
                return optional($datapenduduk->detailkk)->kk->nokk;
            })
            ->addColumn('action', function ($datapenduduk) {
                $editUrl = route('datapenduduk.show', ['nik' => $datapenduduk->nik]);
                $deleteForm = '<form onsubmit="return deleteData(\'' . $datapenduduk->nama . '\')"
                            action="' . url('datapenduduk') . '/' . $datapenduduk->nik . '" style="display: inline"
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
            ->rawColumns(['action'])
            ->toJson();
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

    public function export_excel()
    {
        return Excel::download(new Exportdatapenduduk, "datapenduduk.xlsx");
    }

    public function import_excel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray();

        // Skip the header row
        array_shift($data);

        foreach ($data as $rowData) {
            (new Importdatapenduduk())->model($rowData);
        }

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
        $kartuk->nokk = $request->valNokk;
        $kartuk->save();

        $detailk = new detailkk();
        $detailk->idpenduduk = $datapenduduk->id;
        $detailk->idkk = $kartuk->id;
        $detailk->save();


        return redirect('datapenduduk/admin')->with('msg', 'Penduduk Berhasl ditambhakan');
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
        // Retrieve the existing data for the specified NIK
        $datapenduduk = datapenduduk::where('nik', $nik)->first();

        if (!$datapenduduk) {
            return redirect()->back()->with('error', 'Data not found!');
        }

        // Update the penduduk fields
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

        // Now update the related kk record
        $detailkk = $datapenduduk->detailkk; // Get the related detailkk
        if ($detailkk) {
            $kk = $detailkk->kk; // Get the related kk
            if ($kk) {
                $kk->nokk = $request->valNokk; // Update the nokk
                $kk->save();
            }
        }

        return redirect('datapenduduk/admin')->with('msg', 'Penduduk Berhasil diperbarui');
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
