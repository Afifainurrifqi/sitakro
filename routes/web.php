<?php

use App\Http\Controllers\AksesPendidikanController;
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
use App\Http\Controllers\SdgspendidikanController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;

Route::get('/', [DashboardController::class, 'landingpage'])->name('landingpage');

Route::get('/login', [SesiController::class, 'index'])->name('login');
Route::post('/login', [SesiController::class, 'login']);
Route::get('/logout', [SesiController::class, 'logout'])->name('logout');
Route::get('/errorsrole', [SesiController::class, 'error']);



Route::get('datapenduduk', [DatapendudukController::class, 'index']);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('landing', [DashboardController::class, 'landingpage'])->name('landingpage');
Route::get('/get-birth-data/{year}', [DashboardController::class, 'getBirthData']);
Route::get('kk', [KkController::class, 'index']);
Route::get('kk/{id}', [KkController::class, 'show']);

Route::middleware(['checkrole:admin,operator,dasawisma'])->group(
    function () {
       
        Route::get('sdgs/individu/dataindividu/{show}', [DataindividuController::class, 'show'])->name('individu.show');
        Route::get('sdgs/individu/datakesehatan', [DatakesehatanController::class, 'index'])->name('datakesehatan.index');
        Route::get('sdgs/individu/datapenghasilan', [PenghasilanController::class, 'index'])->name('datapenghasilan.index');
        Route::get('sdgs/individu/datadisabilitas', [JenisdisabilitasController::class, 'index'])->name('disabilitas.index');
        Route::get('sdgs/individu/datasdgspendidikan', [SdgspendidikanController::class, 'index'])->name('pendidikan.index');
        Route::get('sdgs/kk/lokasidanpemukiman', [LokasipemukimanController::class, 'index'])->name('lokasipemukiman.index');
        Route::get('sdgs/kk/aksespendidikan', [AksesPendidikanController::class, 'index'])->name('aksespendidikan.index');
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
        Route::get('sdgs/kk/editlokasidanpemukiman/{nik}', [LokasipemukimanController::class, 'create'])->name('lokasipemukiman.edit');
        Route::post('sdgs/kk/editlokasidanpemukiman', [LokasipemukimanController::class, 'store'])->name('lokasipemukiman.update');
        Route::get('sdgs/kk/lokasidanpemukiman/{show}', [LokasipemukimanController::class, 'show'])->name('lokasipemukiman.show');
        Route::get('sdgs/kk/editaksespendidikan/{nik}', [AksesPendidikanController::class, 'create'])->name('aksespendidikan.edit');
        Route::post('sdgs/kk/editaksespendidikan', [AksesPendidikanController::class, 'store'])->name('aksespendidikan.update');
        Route::get('sdgs/kk/aksespendidikan/{show}', [AksesPendidikanController::class, 'show'])->name('aksespendidikan.show');







    }
);


// Route::middleware(['checkrole:dasawisma'])->group(
//     function () {


//         // Route::get('datapenduduk/{update}', [DatapendudukController::class, 'update']);
//         // Route::delete('datapenduduk/{destroy}', [DatapendudukController::class, 'destroy']);
//         // Route::get('datapenduduk/{nik}', [DatapendudukController::class, 'show']);
//         // Route::put('datapenduduk/{nik}', [DatapendudukController::class, 'update']);
//         // Route::resource('datapenduduk', DatapendudukController::class);
//     }
// );




Route::middleware(['checkrole:operator'])->group(
    function () {
        Route::get('/datadasawisma/show/{nik}', [DatadasawismaController::class, 'show'])->name('dasawisma.show');
        Route::get('datadasawisma/datadw', [DatadasawismaController::class, 'index'])->name('dasawisma.index');
        Route::post('/datadasawisma/update/{nik}', [DatadasawismaController::class, 'update'])->name('dasawisma.update');
    }
);


//dasawisma
