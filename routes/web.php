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
use App\Http\Controllers\DataRtController;
use App\Http\Controllers\JenisdisabilitasController;
use App\Http\Controllers\KkController;
use App\Http\Controllers\LembagaMasyarakatController;
use App\Http\Controllers\LokasipemukimanController;
use App\Http\Controllers\PenghasilanController;
use App\Http\Controllers\RtAgamaController;
use App\Http\Controllers\RtBencanaController;
use App\Http\Controllers\RtFasilitasEkonomiController;
use App\Http\Controllers\RtindustriController;
use App\Http\Controllers\RtInfrastukturController;
use App\Http\Controllers\RtKeamananController;
use App\Http\Controllers\RtkegiatanWargaController;
use App\Http\Controllers\RtKejadianluarbiasaController;
use App\Http\Controllers\RtKesehatanController;
use App\Http\Controllers\RtlembagaEkonomiController;
use App\Http\Controllers\RtlembagaKeagamaanController;
use App\Http\Controllers\RtLingkunganController;
use App\Http\Controllers\RtlokasiController;
use App\Http\Controllers\RtMitigasibController;
use App\Http\Controllers\RtpuengurusController;
use App\Http\Controllers\RtSaranaEkonomiController;
use App\Http\Controllers\RtSaranapendidikanController;
use App\Http\Controllers\RtTkejahatanController;
use App\Http\Controllers\SdgspendidikanController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use App\Models\akseskesehatan;
use App\Models\datakesehatan;
use App\Models\datamutasi;
use App\Models\rt_kejadianluarbiasa;
use App\Models\rtlembaga_ekonomi;
use App\Models\rtlembaga_keagamaan;
use App\Models\rtlokasi;
use App\Models\rtpuengurus;

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
        Route::get('sdgs/rt/rtsare', [RtSaranaEkonomiController::class, 'index'])->name('rtsare.index');
        Route::get('sdgs/rt/rt_fasilitas_ekonomi', [RtFasilitasEkonomiController::class, 'index'])->name('rt_fasilitas_ekonomi.index');
        Route::get('sdgs/rt/rtinfrastuktur', [RtInfrastukturController::class, 'index'])->name('rtinfrastuktur.index');
        Route::get('sdgs/rt/rtlingkungan', [RtLingkunganController::class, 'index'])->name('rtlingkungan.index');
        Route::get('sdgs/rt/rtmitigasib', [RtMitigasibController::class, 'index'])->name('rtmitigasib.index');
        Route::get('sdgs/rt/rtbencana', [RtBencanaController::class, 'index'])->name('rtbencana.index');
        Route::get('sdgs/rt/rt_saranapendidikan', [RtSaranapendidikanController::class, 'index'])->name('rt_saranapendidikan.index');
        Route::get('sdgs/rt/rt_kesehatan', [RtKesehatanController::class, 'index'])->name('rt_kesehatan.index');
        Route::get('sdgs/rt/rt_kejadianluarbiasa', [RtKejadianluarbiasaController::class, 'index'])->name('rt_kejadianluarbiasa.index');
        Route::get('sdgs/rt/rt_keamanan', [RtKeamananController::class, 'index'])->name('rt_keamanan.index');
        Route::get('sdgs/rt/rt_tkejahatan', [RtTkejahatanController::class, 'index'])->name('rt_tkejahatan.index');
        Route::get('sdgs/rt/rtlembaga_ekonomi', [RtlembagaEkonomiController::class, 'index'])->name('rtlembaga_ekonomi.index');
        Route::get('sdgs/rt/rtagama', [RtAgamaController::class, 'index'])->name('rt_agama.index');
        Route::get('sdgs/rt/rtlembaga_keagamaan', [RtlembagaKeagamaanController::class, 'index'])->name('rtlembaga_keagamaan.index');
        Route::get('sdgs/rt/rtlembaga_masyarakat', [LembagaMasyarakatController::class, 'index'])->name('rtlembaga_masyarakat.index');
        Route::get('sdgs/rt/rt_kegiatanwarga', [RtkegiatanWargaController::class, 'index'])->name('rt_kegiatanwarga.index');
        Route::get('sdgs/rt/datart', [DataRtController::class, 'index'])->name('datart.index');
        Route::get('datapenduduk', [DatapendudukController::class, 'index'])->name('datapenduduk.index');
        Route::get('datapenduduk/export/datapenduduk', [DatapendudukController::class, 'export_excel']);
        Route::get('datamutasi/datam', [DatamutasiController::class, 'index'])->name('mutasi.index');
        Route::get('sdgs/individu/dataindividu', [DataindividuController::class, 'index'])->name('individu.index');
        Route::get('datadasawisma/datadw', [DatadasawismaController::class, 'index'])->name('dasawisma.index');

        // JSON DATATABLES
        Route::get('datapenduduk/json', [DatapendudukController::class, 'json']);
        Route::get('/datam/json', [DatamutasiController::class, 'json']);
        Route::get('/dataindividu/json', [DataindividuController::class, 'json']);
        Route::get('/datasdgspekerjaan/json', [DatapekerjaansdgsController::class, 'json']);
        Route::get('/datasdgspekerjaan/json', [DatapekerjaansdgsController::class, 'json']);
        Route::get('/datapenghasilan/json', [PenghasilanController::class, 'json']);
        Route::get('/datakesehatan/json', [DatakesehatanController::class, 'json']);
        Route::get('/datadisabilitas/json', [JenisdisabilitasController::class, 'json']);
        Route::get('/datasdgspendidikan/json', [SdgspendidikanController::class, 'json']);
        Route::get('/lokasidanpemukiman/json', [LokasipemukimanController::class, 'json']);
        Route::get('/aksespendidikan/json', [AksesPendidikanController::class, 'json']);
        Route::get('/akseskesehatan/json', [AkseskesehatanController::class, 'json']);
        Route::get('/aksestenagakerja/json', [AksestenagakerjaController::class, 'json']);
        Route::get('/aksessarpras/json', [AksessarprasController::class, 'json']);
        Route::get('/laink/json', [LainkController::class, 'json']);
        Route::get('/rtlokasi/json', [RtlokasiController::class, 'json']);
        Route::get('/rtpengurus/json', [RtpuengurusController::class, 'json']);
        Route::get('/rtlembaga_ekonomi/json', [RtlembagaEkonomiController::class, 'json']);
        Route::get('/datart/json', [DataRtController::class, 'json']);
        Route::get('/rtindustri/json', [RtindustriController::class, 'json']);
        Route::get('/rtsare/json', [RtSaranaEkonomiController::class, 'json']);
        Route::get('/rt_fasilitas_ekonomi/json', [RtFasilitasEkonomiController::class, 'json']);
        Route::get('/rtinfrastuktur/json', [RtInfrastukturController::class, 'json']);
        Route::get('/rtlingkungan/json', [RtLingkunganController::class, 'json']);
        Route::get('/rtbencana/json', [RtBencanaController::class, 'json']);
        Route::get('/rtmitigasib/json', [RtMitigasibController::class, 'json']);
        Route::get('/rt_saranapendidikan/json', [RtSaranapendidikanController::class, 'json']);
        Route::get('/rt_kesehatan/json', [RtKesehatanController::class, 'json']);




       

        
       










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
        Route::get('sdgs/RT/editrtsare/{nik}', [RtSaranaEkonomiController::class, 'create'])->name('rtsare.edit');
        Route::post('sdgs/RT/editrtsare', [RtSaranaEkonomiController::class, 'store'])->name('rtsare.update');
        Route::get('sdgs/RT/rtsare/{show}', [RtSaranaEkonomiController::class, 'show'])->name('rtsare.show');
        Route::get('sdgs/RT/editrt_fasilitas_ekonomi/{nik}', [RtFasilitasEkonomiController::class, 'create'])->name('rt_fasilitas_ekonomi.edit');
        Route::post('sdgs/RT/editrt_fasilitas_ekonomi', [RtFasilitasEkonomiController::class, 'store'])->name('rt_fasilitas_ekonomi.update');
        Route::get('sdgs/RT/rt_fasilitas_ekonomi/{show}', [RtFasilitasEkonomiController::class, 'show'])->name('rt_fasilitas_ekonomi.show');
        Route::get('sdgs/RT/editrtinfrastuktur/{nik}', [RtInfrastukturController::class, 'create'])->name('rtinfrastuktur.edit');
        Route::post('sdgs/RT/editrtinfrastuktur', [RtInfrastukturController::class, 'store'])->name('rtinfrastuktur.update');
        Route::get('sdgs/RT/rtinfrastuktur/{show}', [RtInfrastukturController::class, 'show'])->name('rtinfrastuktur.show');
        Route::get('sdgs/RT/editrtlingkungan/{nik}', [RtLingkunganController::class, 'create'])->name('rtlingkungan.edit');
        Route::post('sdgs/RT/editrtlingkungan', [RtLingkunganController::class, 'store'])->name('rtlingkungan.update');
        Route::get('sdgs/RT/rtlingkungan/{show}', [RtLingkunganController::class, 'show'])->name('rtlingkungan.show');
        Route::get('sdgs/RT/editrtbencana/{nik}', [RtBencanaController::class, 'create'])->name('rtbencana.edit');
        Route::post('sdgs/RT/editrtbencana', [RtBencanaController::class, 'store'])->name('rtbencana.update');
        Route::get('sdgs/RT/rtbencana/{show}', [RtBencanaController::class, 'show'])->name('rtbencana.show');
        Route::get('sdgs/RT/editrtmitigasib/{nik}', [RtMitigasibController::class, 'create'])->name('rtmitigasib.edit');
        Route::post('sdgs/RT/editrtmitigasib', [RtMitigasibController::class, 'store'])->name('rtmitigasib.update');
        Route::get('sdgs/RT/rtmitigasib/{show}', [RtMitigasibController::class, 'show'])->name('rtmitigasib.show');
        Route::get('sdgs/RT/editrt_saranapendidikan/{nik}', [RtSaranapendidikanController::class, 'create'])->name('rt_saranapendidikan.edit');
        Route::post('sdgs/RT/editrt_saranapendidikan', [RtSaranapendidikanController::class, 'store'])->name('rt_saranapendidikan.update');
        Route::get('sdgs/RT/rt_saranapendidikan/{show}', [RtSaranapendidikanController::class, 'show'])->name('rt_saranapendidikan.show');
        Route::get('sdgs/RT/editrt_kesehatan/{nik}', [RtKesehatanController::class, 'create'])->name('rt_kesehatan.edit');
        Route::post('sdgs/RT/editrt_kesehatan', [RtKesehatanController::class, 'store'])->name('rt_kesehatan.update');
        Route::get('sdgs/RT/rt_kesehatan/{show}', [RtKesehatanController::class, 'show'])->name('rt_kesehatan.show');
        Route::get('sdgs/RT/editrt_kejadianluarbiasa/{nik}', [RtKejadianluarbiasaController::class, 'create'])->name('rt_kejadianluarbiasa.edit');
        Route::post('sdgs/RT/editrt_kejadianluarbiasa', [RtKejadianluarbiasaController::class, 'store'])->name('rt_kejadianluarbiasa.update');
        Route::get('sdgs/RT/rt_kejadianluarbiasa/{show}', [RtKejadianluarbiasaController::class, 'show'])->name('rt_kejadianluarbiasa.show');
        Route::get('sdgs/RT/editrt_keamanan/{nik}', [RtKeamananController::class, 'create'])->name('rt_keamanan.edit');
        Route::post('sdgs/RT/editrt_keamanan', [RtKeamananController::class, 'store'])->name('rt_keamanan.update');
        Route::get('sdgs/RT/rt_keamanan/{show}', [RtKeamananController::class, 'show'])->name('rt_keamanan.show');
        Route::get('sdgs/RT/editrt_tkejahatan/{nik}', [RtTkejahatanController::class, 'create'])->name('rt_tkejahatan.edit');
        Route::post('sdgs/RT/editrt_tkejahatan', [RtTkejahatanController::class, 'store'])->name('rt_tkejahatan.update');
        Route::get('sdgs/RT/rt_tkejahatan/{show}', [RtTkejahatanController::class, 'show'])->name('rt_tkejahatan.show');
        Route::get('sdgs/RT/editrtlembaga_ekonomi/{nik}', [RtlembagaEkonomiController::class, 'create'])->name('rtlembaga_ekonomi.edit');
        Route::post('sdgs/RT/editrtlembaga_ekonomi', [RtlembagaEkonomiController::class, 'store'])->name('rtlembaga_ekonomi.update');
        Route::get('sdgs/RT/rtlembaga_ekonomi/{show}', [RtlembagaEkonomiController::class, 'show'])->name('rtlembaga_ekonomi.show');
        Route::get('sdgs/RT/editrt_agama/{nik}', [RtAgamaController::class, 'create'])->name('rt_agama.edit');
        Route::post('sdgs/RT/editrt_agama', [RtAgamaController::class, 'store'])->name('rt_agama.update');
        Route::get('sdgs/RT/rt_agama/{show}', [RtAgamaController::class, 'show'])->name('rt_agama.show');
        Route::get('sdgs/RT/editrtlembaga_keagamaan/{nik}', [RtlembagaKeagamaanController::class, 'create'])->name('rtlembaga_keagamaan.edit');
        Route::post('sdgs/RT/editrtlembaga_keagamaan', [RtlembagaKeagamaanController::class, 'store'])->name('rtlembaga_keagamaan.update');
        Route::get('sdgs/RT/rtlembaga_keagamaan/{show}', [RtlembagaKeagamaanController::class, 'show'])->name('rtlembaga_keagamaan.show');
        Route::get('sdgs/RT/editrtlembaga_masyarakat/{nik}', [LembagaMasyarakatController::class, 'create'])->name('rtlembaga_masyarakat.edit');
        Route::post('sdgs/RT/editrtlembaga_masyarakat', [LembagaMasyarakatController::class, 'store'])->name('rtlembaga_masyarakat.update');
        Route::get('sdgs/RT/rtlembaga_masyarakat/{show}', [LembagaMasyarakatController::class, 'show'])->name('rtlembaga_masyarakat.show');
        Route::get('sdgs/RT/editrt_kegiatanwarga/{nik}', [RtkegiatanWargaController::class, 'create'])->name('rt_kegiatanwarga.edit');
        Route::post('sdgs/RT/editrt_kegiatanwarga', [RtkegiatanWargaController::class, 'store'])->name('rt_kegiatanwarga.update');
        Route::get('sdgs/RT/rt_kegiatanwarga/{show}', [RtkegiatanWargaController::class, 'show'])->name('rt_kegiatanwarga.show');

        Route::get('sdgs/RT/tambahdatart', [DataRtController::class, 'add'])->name('datart.create');
        Route::post('sdgs/RT/tambahdatart', [DataRtController::class, 'store'])->name('datart.add');
        Route::get('sdgs/RT/editdatart/{nik}', [DataRtController::class, 'edit'])->name('datart.edit');
        Route::post('sdgs/RT/editdatart/{nik}', [DataRtController::class, 'update'])->name('datart.update');
    }
);




Route::middleware(['checkrole:operator'])->group(
    function () {
        Route::get('/datadasawisma/show/{nik}', [DatadasawismaController::class, 'show'])->name('dasawisma.show');
       
        Route::post('/datadasawisma/update/{nik}', [DatadasawismaController::class, 'update'])->name('dasawisma.update');
    }
);


//dasawisma
