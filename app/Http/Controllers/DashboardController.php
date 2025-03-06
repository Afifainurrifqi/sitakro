<?php

namespace App\Http\Controllers;

use App\Models\dashboard;
use App\Http\Requests\StoredashboardRequest;
use App\Http\Requests\UpdatedashboardRequest;
use App\Models\datadasawisma;
use App\Models\datamutasi;
use App\Models\datapekerjaansdgs;
use App\Models\datapenduduk;
use App\Models\jenisdisabilitas;
use Carbon\Carbon;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapenduduk_tetap = Datapenduduk::where('datak', 'tetap')->get();
        $datapenduduk_tidaktetap = Datapenduduk::where('datak', 'Tidaktetap')->get();
        $datapenduduk_ada = Datapenduduk::where('datak', ['Tetap', 'Tidaktetap'])->get();
        $datapenduduk_pindah = Datapenduduk::where('datak', 'Pindah')->get();
        $datapenduduk_meninggal = Datapenduduk::where('datak', 'Meninggal')->get();

        $datapekerjaan = datapekerjaansdgs::all();
        $datapekerjaanSudahProses = $datapekerjaan->count(); // Jumlah data individu yang sudah diproses
        $datapendudukTotal = $datapenduduk_ada->count(); // Jumlah total data penduduk
        $persentaseProses = ($datapekerjaanSudahProses / $datapendudukTotal) * 100; // Hitung persentase
        $dataPekerjaan = datapekerjaansdgs::all();

        // Siapkan data untuk grafik pie
        $pekerjaanLabels = $dataPekerjaan->pluck('pekerjaan_utama')->toArray();
        $pekerjaanCounts = $dataPekerjaan->countBy('pekerjaan_utama')->values()->toArray();
        $dataDisabilitas = jenisdisabilitas::all();
        $disabilitasLabels = $dataDisabilitas->pluck('jenis_disabilitas')->toArray();
        $disabilitasCounts = $dataDisabilitas->countBy('jenis_disabilitas')->values()->toArray();



        return view('dashboard', compact('disabilitasCounts','disabilitasLabels','datapenduduk_ada', 'datapenduduk_tetap','datapenduduk_tidaktetap', 'datapenduduk_pindah', 'datapenduduk_meninggal', 'datapekerjaan', 'pekerjaanLabels', 'pekerjaanCounts' ));
    }

    public function landingpage()
    {
        $datapenduduk_ada = Datapenduduk::where('datak', ['Tetap', 'Tidaktetap'])->get();
        $datapenduduk_laki = Datapenduduk::where('jenis_kelamin', 'laki-laki')->get();
        $datapenduduk_perempuan = Datapenduduk::where('jenis_kelamin', 'perempuan')->get();
        return view('landing', compact('datapenduduk_ada','datapenduduk_laki', 'datapenduduk_perempuan'));
    }

    public function farm()
    {
        return view('farming.login');
    }
    public function getBirthData($year) {

        $months = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];
        $birthData = [];

        foreach ($months as $monthNumber => $monthName) {
            $count = Datapenduduk::where('tanggal_lahir', 'LIKE', "$year-$monthNumber-%")->count();
            $birthData[$monthName] = $count;
        }

        return response()->json($birthData);
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
     * @param  \App\Http\Requests\StoredashboardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedashboardRequest  $request
     * @param  \App\Models\dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedashboardRequest $request, dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(dashboard $dashboard)
    {
        //
    }
}
