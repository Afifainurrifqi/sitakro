<?php

use App\Http\Controllers\AkseskesehatanController;
use App\Http\Controllers\AksesPendidikanController;
use App\Http\Controllers\AksessarprasController;
use App\Http\Controllers\LainkController;
use App\Http\Controllers\AksestenagakerjaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatadasawismaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatapendudukController;
use App\Http\Controllers\DataindividuController;
use App\Http\Controllers\DatakesehatanController;
use App\Http\Controllers\DatamutasiController;
use App\Http\Controllers\DatapekerjaansdgsController;
use App\Http\Controllers\JenisdisabilitasController;
use App\Http\Controllers\KkController;
use App\Http\Controllers\LokasipemukimanController;
use App\Http\Controllers\PenghasilanController;
use App\Http\Controllers\RtindustriController;
use App\Http\Controllers\RtlokasiController;
use App\Http\Controllers\RtpuengurusController;
use App\Http\Controllers\SdgspendidikanController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use App\Models\rtlokasi;

Route::get('/', [DashboardController::class, 'landingpage'])->name('landingpage');

Route::get('/login', [SesiController::class, 'index'])->name('login');
Route::post('/login', [SesiController::class, 'login']);
Route::get('/logout', [SesiController::class, 'logout'])->name('logout');
Route::get('/errorsrole', [SesiController::class, 'error']);
Route::get('/maintance', [SesiController::class, 'maintance'])->name('maintance');



Route::get('datapenduduk', [DatapendudukController::class, 'index']);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('landing', [DashboardController::class, 'landingpage'])->name('landingpage');
Route::get('/get-birth-data/{year}', [DashboardController::class, 'getBirthData']);
Route::get('KK', [KkController::class, 'index']);
Route::get('KK/{id}', [KkController::class, 'show']);

Route::middleware(['checkrole:admin,operator,dasawisma'])->group(
    function () {
       
        Route::get('sdgs/individu/dataindividu/{show}', [DataindividuController::class, 'show'])->name('individu.show');
        Route::get('sdgs/individu/datakesehatan', [DatakesehatanController::class, 'index'])->name('datakesehatan.index');
        Route::get('sdgs/individu/datapenghasilan', [PenghasilanController::class, 'index'])->name('datapenghasilan.index');
        Route::get('sdgs/individu/datadisabilitas', [JenisdisabilitasController::class, 'index'])->name('disabilitas.index');
        Route::get('sdgs/individu/datasdgspendidikan', [SdgspendidikanController::class, 'index'])->name('pendidikan.index');
        Route::get('sdgs/KK/lokasidanpemukiman', [LokasipemukimanController::class, 'index'])->name('lokasipemukiman.index');
        Route::get('sdgs/KK/aksespendidikan', [AksesPendidikanController::class, 'index'])->name('aksespendidikan.index');
        Route::get('sdgs/KK/akseskesehatan', [AkseskesehatanController::class, 'index'])->name('akseskesehatan.index');
        Route::get('sdgs/KK/aksestenagakerja', [AksestenagakerjaController::class, 'index'])->name('aksestenagakerja.index');
        Route::get('sdgs/KK/aksessarpras', [AksessarprasController::class, 'index'])->name('aksessarpras.index');
        Route::get('sdgs/KK/laink', [LainkController::class, 'index'])->name('laink.index');
        Route::get('sdgs/rt/rtlokasi', [RtlokasiController::class, 'index'])->name('rtlokasi.index');
        Route::get('sdgs/rt/rtpengurus', [RtpuengurusController::class, 'index'])->name('rtpengurus.index');
        Route::get('sdgs/rt/rtindustri', [RtindustriController::class, 'index'])->name('rtindustri.index');
        Route::get('datapenduduk', [DatapendudukController::class, 'index'])->name('datapenduduk.index');
        Route::get('datapenduduk/export/datapenduduk', [DatapendudukController::class, 'export_excel']);
        Route::get('datamutasi/datam', [DatamutasiController::class, 'index'])->name('mutasi.index');
        Route::get('sdgs/individu/dataindividu', [DataindividuController::class, 'index'])->name('individu.index');

        Route::get('/home', function () {
            return redirect('dashboard');
        });
    }

);
//Operator, Admin, dasawisma


Route::middleware(['checkrole:admin,operator'])->group(
    function () {
        Route::get('datapenduduk/add', [DatapendudukController::class, 'add']);
        Route::post('datapenduduk/store', [DatapendudukController::class, 'store'])->name('datapenduduk.store');
        Route::get('datamutasi/export/datamutasi', [DatamutasiController::class, 'exportexcelm'])->name('export.meninggal');
        Route::get('datamutasi/export/datapindah', [DatamutasiController::class, 'exportexcelp'])->name('export.pindah');
        Route::post('datapendudukimport', [DatapendudukController::class, 'import_excel'])->name('import_excel');
        Route::post('/datamutasi/update/{nik}', [datamutasi::class, 'update'])->name('mutasi.update');
        // Route::get('datadasawisma/datadw', [UserController::class, 'index']);





    }
);


Route::middleware(['checkrole:admin,dasawisma'])->group(
    function () {
        Route::get('datapenduduk/edit/{nik}', [DatapendudukController::class, 'edit'])->name('datapenduduk.edit');
        Route::get('datapenduduk/show/{nik}', [DatapendudukController::class, 'show'])->name('datapenduduk.show');
        Route::post('datapenduduk/update/{nik}', [DatapendudukController::class, 'update'])->name('datapenduduk.update');
        Route::get('sdgs/individu/editdataindividu/{nik}', [DataindividuController::class, 'create'])->name('individu.edit');
        Route::post('sdgs/individu/editdataindividu', [DataindividuController::class, 'store'])->name('individu.update');
        Route::get('sdgs/individu/datasdgspekerjaan', [DatapekerjaansdgsController::class, 'index'])->name('pekerjaan.index');
        Route::get('sdgs/individu/editdatasdgspekerjaan/{nik}', [DatapekerjaansdgsController::class, 'create'])->name('pekerjaan.create');
        Route::post('sdgs/individu/editdatasdgspekerjaan', [DatapekerjaansdgsController::class, 'store'])->name('pekerjaan.update');
        Route::get('sdgs/individu/datasdgspekerjaan/{show}', [DatapekerjaansdgsController::class, 'show'])->name('pekerjaan.show');
        Route::get('sdgs/individu/editkesehatan/{nik}', [DatakesehatanController::class, 'create'])->name('kesehatan.edit');
        Route::post('sdgs/individu/editkesehatan', [DatakesehatanController::class, 'store'])->name('kesehatan.update');
        Route::get('sdgs/individu/viewkesehatan/{show}', [DatakesehatanController::class, 'show'])->name('kesehatan.show');
        Route::get('sdgs/individu/editpenghasilan/{nik}', [PenghasilanController::class, 'create'])->name('penghasilan.edit');
        Route::post('sdgs/individu/editpenghasilan', [PenghasilanController::class, 'store'])->name('penghasilan.update');
        Route::get('sdgs/individu/datapenghasilan/{show}', [PenghasilanController::class, 'show'])->name('penghasilan.show');
        Route::get('sdgs/individu/editdisabilitas/{nik}', [JenisdisabilitasController::class, 'create'])->name('disabilitas.edit');
        Route::post('sdgs/individu/editdisabilitas', [JenisdisabilitasController::class, 'store'])->name('disabilitas.update');
        Route::get('sdgs/individu/datadisabilitas/{show}', [JenisdisabilitasController::class, 'show'])->name('disabilitas.show');
        Route::get('sdgs/individu/editsdgspendidikan/{nik}', [SdgspendidikanController::class, 'create'])->name('pendidikan.edit');
        Route::post('sdgs/individu/editsdgspendidikan', [SdgspendidikanController::class, 'store'])->name('pendidikan.update');
        Route::get('sdgs/individu/datasdgsppendidikan/{show}', [SdgspendidikanController::class, 'show'])->name('pendidikan.show');
        Route::get('sdgs/KK/editlokasidanpemukiman/{nik}', [LokasipemukimanController::class, 'create'])->name('lokasipemukiman.edit');
        Route::post('sdgs/KK/editlokasidanpemukiman', [LokasipemukimanController::class, 'store'])->name('lokasipemukiman.update');
        Route::get('sdgs/KK/lokasidanpemukiman/{show}', [LokasipemukimanController::class, 'show'])->name('lokasipemukiman.show');
        Route::get('sdgs/KK/editaksespendidikan/{nik}', [AksesPendidikanController::class, 'create'])->name('aksespendidikan.edit');
        Route::post('sdgs/KK/editaksespendidikan', [AksesPendidikanController::class, 'store'])->name('aksespendidikan.update');
        Route::get('sdgs/KK/aksespendidikan/{show}', [AksesPendidikanController::class, 'show'])->name('aksespendidikan.show');
        Route::get('sdgs/KK/editakseskesehatan/{nik}', [AkseskesehatanController::class, 'create'])->name('akseskesehatan.edit');
        Route::post('sdgs/KK/editakseskesehatan', [AkseskesehatanController::class, 'store'])->name('akseskesehatan.update');
        Route::get('sdgs/KK/akseskesehatan/{show}', [AkseskesehatanController::class, 'show'])->name('akseskesehatan.show');
        Route::get('sdgs/KK/editaksestenagakerja/{nik}', [AksestenagakerjaController::class, 'create'])->name('aksestenagakerja.edit');
        Route::post('sdgs/KK/editaksestenagakerja', [AksestenagakerjaController::class, 'store'])->name('aksestenagakerja.update');
        Route::get('sdgs/KK/aksestenagakerja/{show}', [AksestenagakerjaController::class, 'show'])->name('aksestenagakerja.show');
        Route::get('sdgs/KK/editaksespras/{nik}', [AksessarprasController::class, 'create'])->name('aksessarpras.edit');
        Route::post('sdgs/KK/editaksespras', [AksessarprasController::class, 'store'])->name('aksessarpras.update');
        Route::get('sdgs/KK/aksessarpras/{show}', [AksessarprasController::class, 'show'])->name('aksessarpras.show');
        Route::get('sdgs/KK/editlaink/{nik}', [LainkController::class, 'create'])->name('editlaink.edit');
        Route::post('sdgs/KK/editlaink', [LainkController::class, 'store'])->name('laink.update');
        Route::get('sdgs/KK/laink/{show}', [LainkController::class, 'show'])->name('laink.show');
        Route::get('sdgs/RT/editrtlokasi/{nik}', [RtlokasiController::class, 'create'])->name('rtlokasi.edit');
        Route::post('sdgs/RT/editrtlokasi', [RtlokasiController::class, 'store'])->name('rtlokasi.update');
        Route::get('sdgs/RT/rtlokasi/{show}', [RtlokasiController::class, 'show'])->name('rtlokasi.show');
        Route::get('sdgs/RT/editrtpengurus/{nik}', [RtpuengurusController::class, 'create'])->name('rtpengurus.edit');
        Route::post('sdgs/RT/editrtpengurus', [RtpuengurusController::class, 'store'])->name('rtpengurus.update');
        Route::get('sdgs/RT/rtpengurus/{show}', [RtpuengurusController::class, 'show'])->name('rtpengurus.show');
        Route::get('sdgs/RT/editrtindustri/{nik}', [RtindustriController::class, 'create'])->name('rtindustri.edit');
        Route::post('sdgs/RT/editrtindustri', [RtindustriController::class, 'store'])->name('rtindustri.update');
        Route::get('sdgs/RT/rtindustri/{show}', [RtindustriController::class, 'show'])->name('rtindustri.show');























    }
);




Route::middleware(['checkrole:operator'])->group(
    function () {
        Route::get('/datadasawisma/show/{nik}', [DatadasawismaController::class, 'show'])->name('dasawisma.show');
        Route::get('datadasawisma/datadw', [DatadasawismaController::class, 'index'])->name('dasawisma.index');
        Route::post('/datadasawisma/update/{nik}', [DatadasawismaController::class, 'update'])->name('dasawisma.update');
    }
);


//dasawisma
