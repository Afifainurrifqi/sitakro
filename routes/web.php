<?php

use App\Http\Controllers\AksesPendidikanController;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\datadasawismacontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\datapendudukController;
use App\Http\Controllers\dataindividuController;
use App\Http\Controllers\datakesehatanController;
use App\Http\Controllers\datamutasiController;
use App\Http\Controllers\datapekerjaansdgsController;
use App\Http\Controllers\jenisdisabilitasController;
use App\Http\Controllers\kkController;
use App\Http\Controllers\lokasipemukimanController;
use App\Http\Controllers\penghasilanController;
use App\Http\Controllers\sdgspendidikanController;
use App\Http\Controllers\sesiController;
use App\Http\Controllers\userController;
use App\Models\dashboard;
use App\Models\datamutasi;
use App\Models\lokasipemukiman;
use Database\Seeders\datapendudukSeeder;

Route::get('/', [dashboardcontroller::class, 'landingpage'])->name('landingpage');

Route::get('/login', [sesicontroller::class, 'index'])->name('login');
Route::post('/login', [sesicontroller::class, 'login']);
Route::get('/logout', [sesicontroller::class, 'logout'])->name('logout');
Route::get('/errorsrole', [sesicontroller::class, 'error']);



Route::get('datapenduduk', [datapendudukcontroller::class, 'index']);
Route::get('dashboard', [dashboardcontroller::class, 'index'])->name('dashboard');
Route::get('landing', [dashboardcontroller::class, 'landingpage'])->name('landingpage');
Route::get('/get-birth-data/{year}', [dashboardcontroller::class, 'getBirthData']);
Route::get('kk', [kkcontroller::class, 'index']);
Route::get('kk/{id}', [kkcontroller::class, 'show']);

Route::middleware(['checkrole:admin,operator,dasawisma'])->group(
    function () {
       
        Route::get('sdgs/individu/dataindividu/{show}', [dataindividucontroller::class, 'show'])->name('individu.show');
        Route::get('sdgs/individu/datakesehatan', [datakesehatancontroller::class, 'index'])->name('datakesehatan.index');
        Route::get('sdgs/individu/datapenghasilan', [penghasilancontroller::class, 'index'])->name('datapenghasilan.index');
        Route::get('sdgs/individu/datadisabilitas', [jenisdisabilitascontroller::class, 'index'])->name('disabilitas.index');
        Route::get('sdgs/individu/datasdgspendidikan', [sdgspendidikancontroller::class, 'index'])->name('pendidikan.index');
        Route::get('sdgs/kk/lokasidanpemukiman', [lokasipemukimancontroller::class, 'index'])->name('lokasipemukiman.index');
        Route::get('sdgs/kk/aksespendidikan', [AksesPendidikanController::class, 'index'])->name('aksespendidikan.index');
        Route::get('datapenduduk', [datapendudukcontroller::class, 'index'])->name('datapenduduk.index');
        Route::get('datapenduduk/export/datapenduduk', [datapendudukcontroller::class, 'export_excel']);
        Route::get('datamutasi/datam', [datamutasicontroller::class, 'index'])->name('mutasi.index');
        Route::get('sdgs/individu/dataindividu', [dataindividucontroller::class, 'index'])->name('individu.index');

        Route::get('/home', function () {
            return redirect('dashboard');
        });
    }

);
//Operator, Admin, dasawisma


Route::middleware(['checkrole:admin,operator'])->group(
    function () {
        Route::get('datapenduduk/add', [datapendudukcontroller::class, 'add']);
        Route::post('datapenduduk/store', [datapendudukcontroller::class, 'store'])->name('datapenduduk.store');
        Route::get('datamutasi/export/datamutasi', [datamutasicontroller::class, 'exportexcelm'])->name('export.meninggal');
        Route::get('datamutasi/export/datapindah', [datamutasicontroller::class, 'exportexcelp'])->name('export.pindah');
        Route::post('datapendudukimport', [datapendudukcontroller::class, 'import_excel'])->name('import_excel');
        Route::post('/datamutasi/update/{nik}', [datamutasi::class, 'update'])->name('mutasi.update');
        // Route::get('datadasawisma/datadw', [usercontroller::class, 'index']);





    }
);


Route::middleware(['checkrole:admin,dasawisma'])->group(
    function () {
        Route::get('datapenduduk/edit/{nik}', [datapendudukcontroller::class, 'edit'])->name('datapenduduk.edit');
        Route::get('datapenduduk/show/{nik}', [datapendudukcontroller::class, 'show'])->name('datapenduduk.show');
        Route::post('datapenduduk/update/{nik}', [datapendudukcontroller::class, 'update'])->name('datapenduduk.update');
        Route::get('sdgs/individu/editdataindividu/{nik}', [dataindividucontroller::class, 'create'])->name('individu.edit');
        Route::post('sdgs/individu/editdataindividu', [dataindividucontroller::class, 'store'])->name('individu.update');
        Route::get('sdgs/individu/datasdgspekerjaan', [datapekerjaansdgscontroller::class, 'index'])->name('pekerjaan.index');
        Route::get('sdgs/individu/editdatasdgspekerjaan/{nik}', [datapekerjaansdgscontroller::class, 'create'])->name('pekerjaan.create');
        Route::post('sdgs/individu/editdatasdgspekerjaan', [datapekerjaansdgscontroller::class, 'store'])->name('pekerjaan.update');
        Route::get('sdgs/individu/datasdgspekerjaan/{show}', [datapekerjaansdgscontroller::class, 'show'])->name('pekerjaan.show');
        Route::get('sdgs/individu/editkesehatan/{nik}', [datakesehatancontroller::class, 'create'])->name('kesehatan.edit');
        Route::post('sdgs/individu/editkesehatan', [datakesehatancontroller::class, 'store'])->name('kesehatan.update');
        Route::get('sdgs/individu/viewkesehatan/{show}', [datakesehatancontroller::class, 'show'])->name('kesehatan.show');
        Route::get('sdgs/individu/editpenghasilan/{nik}', [penghasilancontroller::class, 'create'])->name('penghasilan.edit');
        Route::post('sdgs/individu/editpenghasilan', [penghasilancontroller::class, 'store'])->name('penghasilan.update');
        Route::get('sdgs/individu/datapenghasilan/{show}', [penghasilancontroller::class, 'show'])->name('penghasilan.show');
        Route::get('sdgs/individu/editdisabilitas/{nik}', [jenisdisabilitascontroller::class, 'create'])->name('disabilitas.edit');
        Route::post('sdgs/individu/editdisabilitas', [jenisdisabilitascontroller::class, 'store'])->name('disabilitas.update');
        Route::get('sdgs/individu/datadisabilitas/{show}', [jenisdisabilitascontroller::class, 'show'])->name('disabilitas.show');
        Route::get('sdgs/individu/editsdgspendidikan/{nik}', [sdgspendidikancontroller::class, 'create'])->name('pendidikan.edit');
        Route::post('sdgs/individu/editsdgspendidikan', [sdgspendidikancontroller::class, 'store'])->name('pendidikan.update');
        Route::get('sdgs/individu/datasdgsppendidikan/{show}', [sdgspendidikancontroller::class, 'show'])->name('pendidikan.show');
        Route::get('sdgs/kk/editlokasidanpemukiman/{nik}', [lokasipemukimancontroller::class, 'create'])->name('lokasipemukiman.edit');
        Route::post('sdgs/kk/editlokasidanpemukiman', [lokasipemukimancontroller::class, 'store'])->name('lokasipemukiman.update');
        Route::get('sdgs/kk/lokasidanpemukiman/{show}', [lokasipemukimancontroller::class, 'show'])->name('lokasipemukiman.show');
        Route::get('sdgs/kk/editaksespendidikan/{nik}', [AksesPendidikanController::class, 'create'])->name('aksespendidikan.edit');
        Route::post('sdgs/kk/editaksespendidikan', [AksesPendidikanController::class, 'store'])->name('aksespendidikan.update');
        Route::get('sdgs/kk/aksespendidikan/{show}', [AksesPendidikanController::class, 'show'])->name('aksespendidikan.show');







    }
);


// Route::middleware(['checkrole:dasawisma'])->group(
//     function () {


//         // Route::get('datapenduduk/{update}', [datapendudukcontroller::class, 'update']);
//         // Route::delete('datapenduduk/{destroy}', [datapendudukcontroller::class, 'destroy']);
//         // Route::get('datapenduduk/{nik}', [datapendudukcontroller::class, 'show']);
//         // Route::put('datapenduduk/{nik}', [datapendudukcontroller::class, 'update']);
//         // Route::resource('datapenduduk', datapendudukcontroller::class);
//     }
// );




Route::middleware(['checkrole:operator'])->group(
    function () {
        Route::get('/datadasawisma/show/{nik}', [datadasawismacontroller::class, 'show'])->name('dasawisma.show');
        Route::get('datadasawisma/datadw', [datadasawismacontroller::class, 'index'])->name('dasawisma.index');
        Route::post('/datadasawisma/update/{nik}', [datadasawismacontroller::class, 'update'])->name('dasawisma.update');
    }
);


//dasawisma
