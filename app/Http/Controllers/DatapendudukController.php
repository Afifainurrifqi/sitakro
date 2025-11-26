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
use App\Models\datapenduduks;
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

        $query = Datapenduduk::with(['kk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'detailkk.kk', 'updatedByUser'])
            ->whereIn('Datak', $allowedDatakValues);

        return DataTables::of($query)
            ->addColumn('nokk', function ($row) {
                return optional($row->detailkk->kk)->nokk;
            })
            // ⬇️ Izinkan pencarian global di kolom NO KK (relasi)
            ->filterColumn('nokk', function ($q, $keyword) {
                $q->whereHas('detailkk.kk', function ($qq) use ($keyword) {
                    $qq->where('nokk', 'like', "%{$keyword}%");
                });
            })
            // (opsional) izinkan sorting kolom NO KK
            ->orderColumn('nokk', function ($q, $order) {
                $q->join('detailkks', 'detailkks.nik', '=', 'datapenduduks.nik')
                    ->join('kks', 'kks.id', '=', 'detailkks.kk_id')
                    ->orderBy('kks.nokk', $order)
                    ->select('datapenduduks.*'); // hindari duplikasi kolom
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

        // Cek apakah ada pencarian global dari DataTables atau filter nokk khusus
        $hasGlobalSearch = filled(data_get($request->all(), 'search.value')); // DataTables global search
        $hasNokkFilter   = $request->filled('nokk');

        if (! $hasGlobalSearch && ! $hasNokkFilter) {
            // Tidak ada search & tidak ada filter spesifik → sembunyikan data
            $query = Datapenduduk::query()->whereRaw('1=0');
        } else {
            // Ada search atau ada filter nokk → tampilkan data dengan relasi
            $query = Datapenduduk::with([
                'kk',
                'agama',
                'pendidikan',
                'pekerjaan',
                'goldar',
                'status',
                'detailkk.kk',
                'updatedByUser'
            ])->whereIn('Datak', $allowedDatakValues);

            // Filter opsional by NoKK dari parameter khusus
            if ($hasNokkFilter) {
                $nokk = $request->input('nokk');
                $query->whereHas('detailkk.kk', function ($qq) use ($nokk) {
                    $qq->where('nokk', 'like', "%{$nokk}%");
                });
            }
            // Catatan: global search akan ditangani otomatis oleh Yajra pada kolom sederhana.
            // Untuk kolom relasi (nokk) kita sediakan filterColumn di bawah.
        }

        return DataTables::of($query)
            ->addColumn('nokk', function ($row) {
                return optional(optional($row->detailkk)->kk)->nokk;
            })
            // Global search untuk kolom relasi NOKK
            ->filterColumn('nokk', function ($q, $keyword) {
                $q->whereHas('detailkk.kk', function ($qq) use ($keyword) {
                    $qq->where('nokk', 'like', "%{$keyword}%");
                });
            })
            // Sorting NOKK (opsional)
            ->orderColumn('nokk', function ($q, $order) {
                $q->join('detailkks', 'detailkks.nik', '=', 'datapenduduks.nik')
                    ->join('kks', 'kks.id', '=', 'detailkks.kk_id')
                    ->orderBy('kks.nokk', $order)
                    ->select('datapenduduks.*');
            })
            ->addColumn('updated_by', function ($row) {
                return optional($row->updatedByUser)->name;
            })
            ->addColumn('action', function ($row) {
                $editUrl = route('datapenduduk.show', ['nik' => $row->nik]);
                $deleteForm = '<form onsubmit="return deleteData(\'' . e($row->nama) . '\')"
                               action="' . url('datapenduduk/' . $row->nik) . '"
                               method="POST" style="display:inline">' .
                    csrf_field() . method_field('DELETE') .
                    '</form>';
                return '<a href="' . $editUrl . '" class="btn mb-1 btn-info btn-sm" title="Edit data">
                        <i class="fas fa-edit"></i>
                    </a>' . $deleteForm;
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

    public function addadmin()
    {
        $datapenduduk = datapenduduk::all();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        return view('datapenduduk.tambahpendudukuser', compact('datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
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


        return redirect('datapenduduk')->with('msg', 'Penduduk Berhasl ditambhakan');
    }


    public function adminstore(StoredatapendudukRequest $request)
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
        $datapenduduk = datapenduduk::where('nik', $nik)->with(['detailkk.kk'])->firstOrFail();
        $agama      = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan  = Pekerjaan::all();
        $goldar     = Goldar::all();
        $status     = Status::all();

        // Cari ID status "Kawin" (fallback ke '1' jika tidak ditemukan)
        $statusKawinId = Status::whereRaw('LOWER(nama) = ?', ['kawin'])->value('id') ?? '1';

        // Format tanggal untuk <input type="date">
        $tglLahir = $datapenduduk->tanggal_lahir
            ? \Carbon\Carbon::parse($datapenduduk->tanggal_lahir)->format('Y-m-d')
            : '';
        $tglNikah = $datapenduduk->tanggal_perkawinan
            ? \Carbon\Carbon::parse($datapenduduk->tanggal_perkawinan)->format('Y-m-d')
            : '';

        return view('datapenduduk.formedit', compact(
            'datapenduduk',
            'agama',
            'pendidikan',
            'pekerjaan',
            'goldar',
            'status',
            'statusKawinId'
        ))->with([
            'valKK'                 => optional(optional($datapenduduk->detailkk)->kk)->nokk,
            'valNIK'                => $nik,
            'valGelara'             => $datapenduduk->gelarawal,
            'valNama'               => $datapenduduk->nama,
            'valGelart'             => $datapenduduk->gelarakhir,
            'valJeniskelamin'       => (string)$datapenduduk->jenis_kelamin, // pastikan string
            'valTempatlahir'        => $datapenduduk->tempat_lahir,
            'valTanggallahir'       => $tglLahir,
            'valAgama'              => $datapenduduk->agama_id,
            'valPendidikan'         => $datapenduduk->pendidikan_id,
            'valPekerjaan'          => $datapenduduk->pekerjaan_id,
            'valGoldar'             => $datapenduduk->goldar_id,
            'valStatus'             => $datapenduduk->status_id,
            'valTanggalperkawinan'  => $tglNikah,
            'valHubungan'           => $datapenduduk->hubungan,
            'valAyah'               => $datapenduduk->ayah,
            'valIbu'                => $datapenduduk->ibu,
            'valAlamat'             => $datapenduduk->alamat,
            'valRT'                 => $datapenduduk->rt,
            'valRW'                 => $datapenduduk->rw,
            'valDatak'              => $datapenduduk->datak,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\datapenduduk  $datapenduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(datapenduduk $datapenduduk) {}

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
        $datapenduduk->tanggal_perkawinan = !empty($request->valTanggalperkawinan)
            ? $request->valTanggalperkawinan
            : null;
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
    public function destroy(datapenduduk $datapenduduk, $nik) {}
}
