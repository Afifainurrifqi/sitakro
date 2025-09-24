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
use App\Http\Controllers\FarmingController;
use App\Http\Controllers\JenisdisabilitasController;
use App\Http\Controllers\KkController;
use App\Http\Controllers\LembagaMasyarakatController;
use App\Http\Controllers\LokasipemukimanController;
use App\Http\Controllers\NamaAliasOrtuController;
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
use App\Http\Controllers\SuratKeteranganAhliWarisController;
use App\Http\Controllers\SuratKeteranganDesaPernahMenikahController;
use App\Http\Controllers\SuratKeteranganHargaKepemilikanTanahController;
use App\Http\Controllers\SuratKeteranganKehilanganController;
use App\Http\Controllers\SuratKeteranganKematianDesaController;
use App\Http\Controllers\SuratketerangantidakmampuController;
use App\Http\Controllers\SuratKuasaController;
use App\Http\Controllers\SuratmasukController;
use App\Http\Controllers\SuratPengantarSkckController;
use App\Http\Controllers\SuratPermohonanPembukaanRekeningController;
use App\Http\Controllers\SuratPernyataanAktaBarcodeNomorSamaController;
use App\Http\Controllers\SuratPernyataanAnakSeorangNamaIbuController;
use App\Http\Controllers\SuratPernyataanBedaNamaBukuNikahController;
use App\Http\Controllers\SuratPernyataanBelumAktaController;
use App\Http\Controllers\SuratPernyataanDanJaminanController;
use App\Http\Controllers\SuratPernyataanKesanggupanController;
use App\Http\Controllers\SuratPernyataanMemilihNamaAliasController;
use App\Http\Controllers\SuratPernyataanNumpangKkController;
use App\Http\Controllers\SuratPernyataanTidakBisaMelampirkanKtpKematianController;
use App\Http\Controllers\SuratSptjmKematianController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersuratController;
use App\Models\akseskesehatan;
use App\Models\datakesehatan;
use App\Models\datamutasi;
use App\Models\rt_kejadianluarbiasa;
use App\Models\rtlembaga_ekonomi;
use App\Models\rtlembaga_keagamaan;
use App\Models\rtlokasi;
use App\Models\rtpuengurus;
use App\Models\SuratPengantarSkck;

Route::get('/', [DashboardController::class, 'landingpage'])->name('landingpage');

Route::get('/login', [SesiController::class, 'index'])->name('login');
Route::post('/login', [SesiController::class, 'login']);
Route::get('/logout', [SesiController::class, 'logout'])->name('logout');
Route::get('/errorsrole', [SesiController::class, 'error']);
Route::get('/akundemo', [SesiController::class, 'error2']);
Route::get('/maintance', [SesiController::class, 'maintance'])->name('maintance');
Route::get('/loginfarm', [SesiController::class, 'maintance'])->name('maintance');
Route::prefix('surat')->group(function () {

    Route::get('usersuratpernyataannumpangkk', [SuratPernyataanNumpangKkController::class, 'usernumpangkk'])->name('surat.usernumpangkk');
    Route::get('usersuratketerangankehilangan', [SuratKeteranganKehilanganController::class, 'userkehilangan'])->name('surat.userkehilangan');
    Route::get('usersuratketerangantidakmampu', [SuratketerangantidakmampuController::class, 'usertidakmampu'])->name('surat.usertidakmampu');
    Route::get('usersuratnamaalias', [SuratPernyataanMemilihNamaAliasController::class, 'usernamaalias'])->name('surat.usernamaalias');
    Route::get('usersuratnamaaliasortu', [NamaAliasOrtuController::class, 'usernamaaliasortu'])->name('surat.usernamaaliasortu');
    Route::get('usersuratkesanggupan', [SuratPernyataanKesanggupanController::class, 'userkesanggupan'])->name('surat.userkesanggupan');
    Route::get('userrekening', [SuratPermohonanPembukaanRekeningController::class, 'userrekening'])->name('surat.userrekening');
    Route::get('userkepemilikantanah', [SuratKeteranganHargaKepemilikanTanahController::class, 'userkepemilikantanah'])->name('surat.userkepemilikantanah');
    Route::get('userskck', [SuratPengantarSkckController::class, 'userskck'])->name('surat.userskck');
    Route::get('user_userpernyataanjaminan', [SuratPernyataanDanJaminanController::class, 'user_pernyataanjaminan'])->name('surat.userpernyataanjaminan');
    Route::get('user_pernahmenikah', [SuratKeteranganDesaPernahMenikahController::class, 'user_pernahmenikah'])->name('surat.userpernahmenikah');
    Route::get('user_anakseorangibu', [SuratPernyataanAnakSeorangNamaIbuController::class, 'user_anakseorangibu'])->name('surat.useranakseorangibu');
    Route::get('user_kematian', [SuratKeteranganKematianDesaController::class, 'user_kematian'])->name('surat.userkematian');
    Route::get('user_ahliwaris', [SuratKeteranganAhliWarisController::class, 'user_ahliwaris'])->name('surat.userahliwaris');
    Route::get('user_userpernyataanbelumakta', [SuratPernyataanBelumAktaController::class, 'user_form'])->name('surat.userpernyataanbelumakta');
    Route::get('user_userbedanama', [SuratPernyataanBedaNamaBukuNikahController::class, 'user_form'])->name('surat.userbedanama');
    Route::get('user_aktabarcode', [SuratPernyataanAktaBarcodeNomorSamaController::class, 'user'])->name('surat.useraktabarcode');
    Route::get('user_sptjm', [SuratSptjmKematianController::class, 'user'])->name('surat.usersptjm');
    Route::get('user_kuasa', [SuratKuasaController::class, 'user_kuasa'])->name('surat.userkuasa');
    Route::get('user_surat', [UsersuratController::class, 'index'])->name('surat.usersurat');
    Route::get('pengajuan_surat', [UsersuratController::class, 'pengajuan'])->name('surat.pengajuan_surat');
    Route::get('adminduk', [UsersuratController::class, 'adminduk'])->name('surat.adminduk');
    Route::get('pernyataan', [UsersuratController::class, 'pernyataan'])->name('surat.pernyataan');
    Route::get('keterangan', [UsersuratController::class, 'keterangan'])->name('surat.keterangan');
    Route::get('suratberhasil', [UsersuratController::class, 'suratberhasil'])->name('surat.suratberhasil');
    Route::post('usersuratpernyataannumpangkk', [SuratPernyataanNumpangKkController::class, 'userstore'])->name('surat.usernumpangkk.store');
    Route::get('user_suratpernyataantidakbisamelampirkanktpkematian', [SuratPernyataanTidakBisaMelampirkanKtpKematianController::class, 'userkematianktp'])->name('surat.userkematianktp');
    Route::post('user_suratpernyataantidakbisamelampirkanktpkematian', [SuratPernyataanTidakBisaMelampirkanKtpKematianController::class, 'userstore'])->name('user_suratpernyataantidakbisamelampirkanktpkematian.store');
    Route::post('user_suratketerangankehilangan', [SuratKeteranganKehilanganController::class, 'userstore'])->name('surat.userkehilangan.store');
    Route::post('user_suratketerangantidakmampu', [SuratketerangantidakmampuController::class, 'userstore'])->name('surat.usertidakmampu.store');
    Route::post('user_kuasa', [SuratKuasaController::class, 'userstore'])->name('surat.userkuasa.store');
    Route::post('user_suratnamaalias', [SuratPernyataanMemilihNamaAliasController::class, 'userstore'])->name('surat.usernamalias.store');
    Route::post('user_suratnamaaliasortu', [NamaAliasOrtuController::class, 'userstore'])->name('surat.usernamaliasortu.store');
    Route::post('user_userpernyataanjaminan', [SuratPernyataanDanJaminanController::class, 'userstore'])->name('surat.userpernyataanjaminan.store');
    Route::post('userpernahmenikah', [SuratKeteranganDesaPernahMenikahController::class, 'userstore'])->name('surat.userpernahmenikah.store');
    Route::post('userkematian', [SuratKeteranganKematianDesaController::class, 'userstore'])->name('surat.userkematian.store');
    Route::post('userkesanggupan', [SuratPernyataanKesanggupanController::class, 'userstore'])->name('surat.userkesanggupan.store');
    Route::post('userahliwaris', [SuratKeteranganAhliWarisController::class, 'userstore'])->name('surat.userahliwaris.store');
    Route::post('userkuasa', [SuratKuasaController::class, 'userstore'])->name('surat.userkuasa.store');
    Route::post('userrekening', [SuratPermohonanPembukaanRekeningController::class, 'userstore'])->name('surat.userrekening.store');
    Route::post('userbelumakta', [SuratPernyataanBelumAktaController::class, 'userstore'])->name('surat.userbelumakta.store');
    Route::post('userbedanama', [SuratPernyataanBedaNamaBukuNikahController::class, 'userstore'])->name('surat.userbedanama.store');
    Route::post('useranakseorangibu', [SuratPernyataanAnakSeorangNamaIbuController::class, 'userstore'])->name('surat.useranakseorangibu.store');
    Route::post('useraktabarcode', [SuratPernyataanAktaBarcodeNomorSamaController::class, 'userstore'])->name('surat.useraktabarcode.store');
    Route::post('usersptjm', [SuratSptjmKematianController::class, 'userstore'])->name('surat.usersptjm.store');
    Route::post('userkepemilikantanah', [SuratKeteranganHargaKepemilikanTanahController::class, 'userstore'])->name('surat.userkepemilikantanah.store');
    Route::post('userskck', [SuratPengantarSkckController::class, 'userstore'])->name('surat.userskck.store');


    Route::middleware(['auth', 'checkrole:admin,user'])->group(function () {

        Route::get('suratmasuk', [SuratmasukController::class, 'index'])->name('surat.masuk');
        Route::get('suratkeluar', [SuratmasukController::class, 'suratkeluar'])->name('surat.keluar');
        Route::get('arsipsuratkeluar', [SuratmasukController::class, 'arsipsuratkeluar'])->name('surat.arsipsuratkeluar');
        Route::get('tambahsuratmasuk', [SuratmasukController::class, 'tambahsuratmasuk'])->name('surat.tambahsuratmasuk');
        Route::post('suratmasuk', [SuratmasukController::class, 'store'])->name('suratmasuk.store');
        Route::get('suratmasuk/{suratmasuk}/edit', [SuratmasukController::class, 'edit'])->name('suratmasuk.edit');
        Route::put('suratmasuk/{suratmasuk}', [SuratmasukController::class, 'update'])->name('suratmasuk.update');
        Route::get('suratpernyataantidakbisamelampirkanktpkematian', [SuratPernyataanTidakBisaMelampirkanKtpKematianController::class, 'index'])->name('surat.suratpernyataantidakbisamelampirkanktpkematian');
        Route::get('editsuratpernyataantidakbisamelampirkanktpkematian', [SuratPernyataanTidakBisaMelampirkanKtpKematianController::class, 'edit'])->name('surat.editsuratpernyataantidakbisamelampirkanktpkematian');
        Route::post('suratpernyataantidakbisamelampirkanktpkematian', [SuratPernyataanTidakBisaMelampirkanKtpKematianController::class, 'store'])->name('suratpernyataantidakbisamelampirkanktpkematian.store');
        Route::get('export-ktp/{id}', [SuratPernyataanTidakBisaMelampirkanKtpKematianController::class, 'exportPdf'])->name('surat.export_ktp');
        Route::get('formbertingkat', [SuratmasukController::class, 'formbertingkat'])->name('surat.formbertingkat');
        Route::post('prosesForm', [SuratmasukController::class, 'prosesForm'])->name('surat.prosesForm');

        Route::get('suratkeluar', [SuratmasukController::class, 'suratkeluar'])->name('surat.keluar');
        Route::get('surat_keterangan_kehilangan', function () {
            return view('surat.surat_keterangan_kehilangan');
        })->name('surat.surat_keterangan_kehilangan');
        Route::post('keterangan-kehilangan', [SuratKeteranganKehilanganController::class, 'store'])->name('suratkehilangan.store');
        Route::get('export-pdf/{jenis}/{id}', [SuratmasukController::class, 'exportPdf'])->name('surat.export-pdf');
        Route::get('suratkehilangan/{surat_keterangan_kehilangan}/edit', [SuratKeteranganKehilanganController::class, 'edit'])->name('suratkehilangan.edit');
        Route::put('suratkehilangan/{surat_keterangan_kehilangan}', [SuratKeteranganKehilanganController::class, 'update'])->name('suratkehilangan.update');

        Route::get('suratpernyataannumpangkk', [SuratPernyataanNumpangKkController::class, 'index'])->name('surat.numpangkk.index');

        Route::get('suratpernyataannumpangkk/create', [SuratPernyataanNumpangKkController::class, 'create'])->name('surat.numpangkk.create');

        Route::get('suratpernyataannumpangkk/{suratPernyataanNumpangKk}/edit', [SuratPernyataanNumpangKkController::class, 'edit'])->name('surat.numpangkk.edit');
        Route::post('suratpernyataannumpangkk', [SuratPernyataanNumpangKkController::class, 'store'])->name('surat.numpangkk.store');
        Route::put('suratpernyataannumpangkk/{suratPernyataanNumpangKk}', [SuratPernyataanNumpangKkController::class, 'update'])->name('surat.numpangkk.update');
        Route::get('suratpernyataantidakbisamelampirkanktpkematian/{surat}/edit', [SuratPernyataanTidakBisaMelampirkanKtpKematianController::class, 'edit'])->name('suratpernyataantidakbisamelampirkanktpkematian.edit');
        Route::put('suratpernyataantidakbisamelampirkanktpkematian/{surat}', [SuratPernyataanTidakBisaMelampirkanKtpKematianController::class, 'update'])->name('suratpernyataantidakbisamelampirkanktpkematian.update');

        Route::get('suratketerangantidakmampu', [SuratketerangantidakmampuController::class, 'index'])->name('surat.tidakmampu.index');
        Route::get('suratketerangantidakmampu/create', [SuratketerangantidakmampuController::class, 'create'])->name('surat.tidakmampu.create');
        Route::post('suratketerangantidakmampu', [SuratketerangantidakmampuController::class, 'store'])->name('surat.tidakmampu.store');
        Route::get('suratketerangantidakmampu/{suratketerangantidakmampu}/edit', [SuratketerangantidakmampuController::class, 'edit'])->name('surat.tidakmampu.edit');
        Route::put('suratketerangantidakmampu/{suratketerangantidakmampu}', [SuratketerangantidakmampuController::class, 'update'])->name('surat.tidakmampu.update');


        Route::get('suratpernyataanmemilihnamaalias', [SuratPernyataanMemilihNamaAliasController::class, 'index'])->name('surat.namaalias.index');
        Route::get('suratpernyataanmemilihnamaalias/create', [SuratPernyataanMemilihNamaAliasController::class, 'create'])->name('surat.namaalias.create');
        Route::post('suratpernyataanmemilihnamaalias', [SuratPernyataanMemilihNamaAliasController::class, 'store'])->name('surat.namaalias.store');
        Route::get('suratpernyataanmemilihnamaalias/{surat}/edit', [SuratPernyataanMemilihNamaAliasController::class, 'edit'])->name('surat.namaalias.edit');
        Route::put('suratpernyataanmemilihnamaalias/{surat}', [SuratPernyataanMemilihNamaAliasController::class, 'update'])->name('surat.namaalias.update');

        Route::get('suratpernyataanmemilihnamaaliasortu', [NamaAliasOrtuController::class, 'index'])->name('surat.namaaliasortu.index');
        Route::get('suratpernyataanmemilihnamaaliasortu/create', [NamaAliasOrtuController::class, 'create'])->name('surat.namaaliasortu.create');
        Route::post('suratpernyataanmemilihnamaaliasortu', [NamaAliasOrtuController::class, 'store'])->name('surat.namaaliasortu.store');
        Route::get('suratpernyataanmemilihnamaaliasortu/{surat}/edit', [NamaAliasOrtuController::class, 'edit'])->name('surat.namaaliasortu.edit');
        Route::put('suratpernyataanmemilihnamaaliasortu/{surat}', [NamaAliasOrtuController::class, 'update'])->name('surat.namaaliasortu.update');

        Route::get('pernyataandanjaminan', [SuratPernyataanDanJaminanController::class, 'index'])->name('surat.pernyataandanjaminan.index');
        Route::get('pernyataandanjaminan/create', [SuratPernyataanDanJaminanController::class, 'create'])->name('surat.pernyataandanjaminan.create');
        Route::post('pernyataandanjaminan', [SuratPernyataanDanJaminanController::class, 'store'])->name('surat.pernyataandanjaminan.store');
        Route::get('pernyataandanjaminan/{surat}/edit', [SuratPernyataanDanJaminanController::class, 'edit'])->name('surat.pernyataandanjaminan.edit');
        Route::put('pernyataandanjaminan/{surat}', [SuratPernyataanDanJaminanController::class, 'update'])->name('surat.pernyataandanjaminan.update');



        Route::get('pernah-menikah', [SuratKeteranganDesaPernahMenikahController::class, 'index'])->name('surat.pernahmenikah.index');
        Route::get('pernah-menikah/create', [SuratKeteranganDesaPernahMenikahController::class, 'create'])->name('surat.pernahmenikah.create');
        Route::post('pernah-menikah', [SuratKeteranganDesaPernahMenikahController::class, 'store'])->name('surat.pernahmenikah.store');
        Route::get('pernah-menikah/{surat}/edit', [SuratKeteranganDesaPernahMenikahController::class, 'edit'])->name('surat.pernahmenikah.edit');
        Route::put('pernah-menikah/{surat}', [SuratKeteranganDesaPernahMenikahController::class, 'update'])->name('surat.pernahmenikah.update');

        Route::get('kematian-desa',                 [SuratKeteranganKematianDesaController::class, 'index'])->name('surat.kematian.index');
        Route::get('kematian-desa/create',          [SuratKeteranganKematianDesaController::class, 'create'])->name('surat.kematian.create');
        Route::post('kematian-desa',                [SuratKeteranganKematianDesaController::class, 'store'])->name('surat.kematian.store');
        Route::get('kematian-desa/{surat}/edit',    [SuratKeteranganKematianDesaController::class, 'edit'])->name('surat.kematian.edit');
        Route::put('kematian-desa/{surat}',         [SuratKeteranganKematianDesaController::class, 'update'])->name('surat.kematian.update');

        Route::get('ahli-waris', [SuratKeteranganAhliWarisController::class, 'index'])->name('surat.ahliwaris.index');
        Route::post('ahli-waris', [SuratKeteranganAhliWarisController::class, 'store'])->name('surat.ahliwaris.store');
        Route::get('ahli-waris/{surat}/edit', [SuratKeteranganAhliWarisController::class, 'edit'])->name('surat.ahliwaris.edit');
        Route::put('ahli-waris/{surat}', [SuratKeteranganAhliWarisController::class, 'update'])->name('surat.ahliwaris.update');

        // SURAT PERNYATAAN KESANGGUPAN
        Route::get('kesanggupan', [SuratPernyataanKesanggupanController::class, 'index'])->name('surat.kesanggupan.index');
        Route::get('kesanggupan/create', [SuratPernyataanKesanggupanController::class, 'create'])->name('surat.kesanggupan.create');
        Route::post('kesanggupan', [SuratPernyataanKesanggupanController::class, 'store'])->name('surat.kesanggupan.store');
        Route::get('kesanggupan/{surat}/edit', [SuratPernyataanKesanggupanController::class, 'edit'])->name('surat.kesanggupan.edit');
        Route::put('kesanggupan/{surat}', [SuratPernyataanKesanggupanController::class, 'update'])->name('surat.kesanggupan.update');

        Route::get('kuasa', [SuratKuasaController::class, 'index'])->name('surat.kuasa.index');
        Route::post('kuasa', [SuratKuasaController::class, 'store'])->name('surat.kuasa.store');
        Route::get('kuasa/{surat}/edit', [SuratKuasaController::class, 'edit'])->name('surat.kuasa.edit');
        Route::put('kuasa/{surat}', [SuratKuasaController::class, 'update'])->name('surat.kuasa.update');

        Route::get('pembukaan-rekening', [SuratPermohonanPembukaanRekeningController::class, 'index'])->name('surat.bukaanrekening.index');
        Route::post('pembukaan-rekening', [SuratPermohonanPembukaanRekeningController::class, 'store'])->name('surat.bukaanrekening.store');
        Route::get('pembukaan-rekening/{surat}/edit', [SuratPermohonanPembukaanRekeningController::class, 'edit'])->name('surat.bukaanrekening.edit');
        Route::put('pembukaan-rekening/{surat}', [SuratPermohonanPembukaanRekeningController::class, 'update'])->name('surat.bukaanrekening.update');

        Route::get('pernyataan-belum-akta', [SuratPernyataanBelumAktaController::class, 'index'])->name('surat.belumakta.index');
        Route::post('pernyataan-belum-akta', [SuratPernyataanBelumAktaController::class, 'store'])->name('surat.belumakta.store');
        Route::get('pernyataan-belum-akta/{surat}/edit', [SuratPernyataanBelumAktaController::class, 'edit'])->name('surat.belumakta.edit');
        Route::put('pernyataan-belum-akta/{surat}', [SuratPernyataanBelumAktaController::class, 'update'])->name('surat.belumakta.update');


        Route::get('beda-nama-buku-nikah', [SuratPernyataanBedaNamaBukuNikahController::class, 'index'])->name('surat.bedanama.index');
        Route::post('beda-nama-buku-nikah', [SuratPernyataanBedaNamaBukuNikahController::class, 'store'])->name('surat.bedanama.store');
        Route::get('beda-nama-buku-nikah/{surat}/edit', [SuratPernyataanBedaNamaBukuNikahController::class, 'edit'])->name('surat.bedanama.edit');
        Route::put('beda-nama-buku-nikah/{surat}', [SuratPernyataanBedaNamaBukuNikahController::class, 'update'])->name('surat.bedanama.update');

        Route::get('surat/anak-seorang-ibu',                [SuratPernyataanAnakSeorangNamaIbuController::class, 'index'])->name('surat.anakseorangibu.index');
        Route::post('surat/anak-seorang-ibu',               [SuratPernyataanAnakSeorangNamaIbuController::class, 'store'])->name('surat.anakseorangibu.store');
        Route::get('surat/anak-seorang-ibu/{surat}/edit',   [SuratPernyataanAnakSeorangNamaIbuController::class, 'edit'])->name('surat.anakseorangibu.edit');
        Route::put('surat/anak-seorang-ibu/{surat}',        [SuratPernyataanAnakSeorangNamaIbuController::class, 'update'])->name('surat.anakseorangibu.update');

        Route::get('akta-barcode',                [SuratPernyataanAktaBarcodeNomorSamaController::class, 'index'])->name('surat.aktabarcode.index');
        Route::post('akta-barcode',               [SuratPernyataanAktaBarcodeNomorSamaController::class, 'store'])->name('surat.aktabarcode.store');
        Route::get('akta-barcode/{surat}/edit',   [SuratPernyataanAktaBarcodeNomorSamaController::class, 'edit'])->name('surat.aktabarcode.edit');
        Route::put('akta-barcode/{surat}',        [SuratPernyataanAktaBarcodeNomorSamaController::class, 'update'])->name('surat.aktabarcode.update');


        Route::get('/surat/sptjm-kematian',            [SuratSptjmKematianController::class, 'index'])->name('surat.sptjm.index');
        Route::post('/surat/sptjm-kematian',           [SuratSptjmKematianController::class, 'store'])->name('surat.sptjm.store');
        Route::get('/surat/sptjm-kematian/{surat}/edit', [SuratSptjmKematianController::class, 'edit'])->name('surat.sptjm.edit');
        Route::put('/surat/sptjm-kematian/{surat}',    [SuratSptjmKematianController::class, 'update'])->name('surat.sptjm.update');

        Route::get('harga-kepemilikan-tanah', [SuratKeteranganHargaKepemilikanTanahController::class, 'index'])->name('surat.kepemilikantanah.index');
        Route::get('harga-kepemilikan-tanah/create', [SuratKeteranganHargaKepemilikanTanahController::class, 'create'])->name('surat.kepemilikantanah.create');
        Route::post('harga-kepemilikan-tanah', [SuratKeteranganHargaKepemilikanTanahController::class, 'store'])->name('surat.kepemilikantanah.store');
        Route::get('harga-kepemilikan-tanah/{surat}/edit', [SuratKeteranganHargaKepemilikanTanahController::class, 'edit'])->name('surat.kepemilikantanah.edit');
        Route::put('harga-kepemilikan-tanah/{surat}', [SuratKeteranganHargaKepemilikanTanahController::class, 'update'])->name('surat.kepemilikantanah.update');

        Route::get('skck',                 [SuratPengantarSkckController::class, 'index'])->name('surat.skck.index');
        Route::post('skck',                [SuratPengantarSkckController::class, 'store'])->name('surat.skck.store');
        Route::get('skck/{skck}/edit',     [SuratPengantarSkckController::class, 'edit'])->name('surat.skck.edit');
        Route::put('skck/{skck}',          [SuratPengantarSkckController::class, 'update'])->name('surat.skck.update');
    });
});












Route::get('farming', [DashboardController::class, 'farm'])->name('farm.login');
Route::get('farminghome', [FarmingController::class, 'index'])->name('farm.home');
Route::get('farminglahan', [FarmingController::class, 'lahan'])->name('farm.lahan');
Route::get('farmingstart', [FarmingController::class, 'start'])->name('farm.start');
Route::get('farmingtambahlahan', [FarmingController::class, 'tambahlahan'])->name('farm.tambahlahan');
Route::get('farmingupdatelahan', [FarmingController::class, 'updatelahan'])->name('farm.updatelahan');
Route::get('farmingperawatan', [FarmingController::class, 'perawatan'])->name('farm.perawatan');
Route::get('farmingprofile', [FarmingController::class, 'profile'])->name('farm.profile');
Route::get('farmingsemualahan', [FarmingController::class, 'semualahan'])->name('farm.semualahan');
Route::get('farmingformupdatelahan', [FarmingController::class, 'formupdatelahan'])->name('farm.formupdatelahan');

Route::get('datapenduduk', [DatapendudukController::class, 'index']);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('landing', [DashboardController::class, 'landingpage'])->name('landingpage');
Route::get('/get-birth-data/{year}', [DashboardController::class, 'getBirthData']);
Route::get('KK', [KkController::class, 'index']);
Route::get('KK/{id}', [KkController::class, 'show']);

Route::middleware(['checkrole:admin,operator,dasawisma,akundemo'])->group(
    function () {
        Route::get('sdgs/individu/dataindividu/{show}', [DataindividuController::class, 'show'])->name('individu.show');
        Route::get('sdgs/individu/datakesehatan', [DatakesehatanController::class, 'index'])->name('datakesehatan.index');
        Route::get('sdgs/individu/admindatakesehatan', [DatakesehatanController::class, 'admin_index'])->name('datakesehatan.admin_index');
        Route::get('sdgs/individu/datapenghasilan', [PenghasilanController::class, 'index'])->name('datapenghasilan.index');
        Route::get('sdgs/individu/admindatapenghasilan', [PenghasilanController::class, 'admin_index'])->name('datapenghasilan.admin_index');
        Route::get('sdgs/individu/datadisabilitas', [JenisdisabilitasController::class, 'index'])->name('disabilitas.index');
        Route::get('sdgs/individu/admindatadisabilitas', [JenisdisabilitasController::class, 'admin_index'])->name('disabilitas.admin_index');
        Route::get('sdgs/individu/datasdgspendidikan', [SdgspendidikanController::class, 'index'])->name('pendidikan.index');
        Route::get('sdgs/individu/admindatasdgspendidikan', [SdgspendidikanController::class, 'admin_index'])->name('pendidikan.admin_index');
        Route::get('sdgs/KK/lokasidanpemukiman', [LokasipemukimanController::class, 'index'])->name('lokasipemukiman.index');
        Route::get('sdgs/KK/adminlokasidanpemukiman', [LokasipemukimanController::class, 'admin_index'])->name('lokasipemukiman.admin_index');
        Route::get('sdgs/KK/aksespendidikan', [AksesPendidikanController::class, 'index'])->name('aksespendidikan.index');
        Route::get('sdgs/KK/adminaksespendidikan', [AksesPendidikanController::class, 'admin_index'])->name('aksespendidikan.admin_index');
        Route::get('sdgs/KK/akseskesehatan', [AkseskesehatanController::class, 'index'])->name('akseskesehatan.index');
        Route::get('sdgs/KK/adminakseskesehatan', [AkseskesehatanController::class, 'admin_index'])->name('akseskesehatan.admin_index');
        Route::get('sdgs/KK/adminakseskesehatan', [AkseskesehatanController::class, 'admin_index'])->name('akseskesehatan.admin_index');
        Route::get('sdgs/KK/aksestenagakerja', [AksestenagakerjaController::class, 'index'])->name('aksestenagakerja.index');
        Route::get('sdgs/KK/adminaksestenagakerja', [AksestenagakerjaController::class, 'admin_index'])->name('aksestenagakerja.admin_index');
        Route::get('sdgs/KK/aksessarpras', [AksessarprasController::class, 'index'])->name('aksessarpras.index');
        Route::get('sdgs/KK/adminaksessarpras', [AksessarprasController::class, 'admin_index'])->name('aksessarpras.admin_index');
        Route::get('sdgs/KK/laink', [LainkController::class, 'index'])->name('laink.index');
        Route::get('sdgs/KK/adminlaink', [LainkController::class, 'admin_index'])->name('laink.admin_index');
        Route::get('sdgs/rt/rtlokasi', [RtlokasiController::class, 'index'])->name('rtlokasi.index');
        Route::get('sdgs/rt/adminrtlokasi', [RtlokasiController::class, 'admin_index'])->name('rtlokasi.admin_index');
        Route::get('sdgs/rt/rtpengurus', [RtpuengurusController::class, 'index'])->name('rtpengurus.index');
        Route::get('sdgs/rt/adminrtpengurus', [RtpuengurusController::class, 'admin_index'])->name('rtpengurus.admin_index');
        Route::get('sdgs/rt/rtindustri', [RtindustriController::class, 'index'])->name('rtindustri.index');
        Route::get('sdgs/rt/adminrtindustri', [RtindustriController::class, 'admin_index'])->name('rtindustri.admin_index');
        Route::get('sdgs/rt/rtsare', [RtSaranaEkonomiController::class, 'index'])->name('rtsare.index');
        Route::get('sdgs/rt/adminrtsare', [RtSaranaEkonomiController::class, 'admin_index'])->name('rtsare.admin_index');
        Route::get('sdgs/rt/rt_fasilitas_ekonomi', [RtFasilitasEkonomiController::class, 'index'])->name('rt_fasilitas_ekonomi.index');
        Route::get('sdgs/rt/adminrt_fasilitas_ekonomi', [RtFasilitasEkonomiController::class, 'admin_index'])->name('rt_fasilitas_ekonomi.admin_index');
        Route::get('sdgs/rt/rtinfrastuktur', [RtInfrastukturController::class, 'index'])->name('rtinfrastuktur.index');
        Route::get('sdgs/rt/adminrtinfrastuktur', [RtInfrastukturController::class, 'admin_index'])->name('rtinfrastuktur.admin_index');
        Route::get('sdgs/rt/rtlingkungan', [RtLingkunganController::class, 'index'])->name('rtlingkungan.index');
        Route::get('sdgs/rt/adminrtlingkungan', [RtLingkunganController::class, 'admin_index'])->name('rtlingkungan.admin_index');
        Route::get('sdgs/rt/rtmitigasib', [RtMitigasibController::class, 'index'])->name('rtmitigasib.index');
        Route::get('sdgs/rt/adminrtmitigasib', [RtMitigasibController::class, 'admin_index'])->name('rtmitigasib.admin_index');
        Route::get('sdgs/rt/rtbencana', [RtBencanaController::class, 'index'])->name('rtbencana.index');
        Route::get('sdgs/rt/adminrtbencana', [RtBencanaController::class, 'admin_index'])->name('rtbencana.admin_index');
        Route::get('sdgs/rt/rt_saranapendidikan', [RtSaranapendidikanController::class, 'index'])->name('rt_saranapendidikan.index');
        Route::get('sdgs/rt/adminrt_saranapendidikan', [RtSaranapendidikanController::class, 'admin_index'])->name('rt_saranapendidikan.admin_index');
        Route::get('sdgs/rt/rt_kesehatan', [RtKesehatanController::class, 'index'])->name('rt_kesehatan.index');
        Route::get('sdgs/rt/adminrt_kesehatan', [RtKesehatanController::class, 'admin_index'])->name('rt_kesehatan.admin_index');
        Route::get('sdgs/rt/rt_kejadianluarbiasa', [RtKejadianluarbiasaController::class, 'index'])->name('rt_kejadianluarbiasa.index');
        Route::get('sdgs/rt/adminrt_kejadianluarbiasa', [RtKejadianluarbiasaController::class, 'admin_index'])->name('rt_kejadianluarbiasa.admin_index');
        Route::get('sdgs/rt/rt_keamanan', [RtKeamananController::class, 'index'])->name('rt_keamanan.index');
        Route::get('sdgs/rt/adminrt_keamanan', [RtKeamananController::class, 'admin_index'])->name('rt_keamanan.admin_index');
        Route::get('sdgs/rt/rt_tkejahatan', [RtTkejahatanController::class, 'index'])->name('rt_tkejahatan.index');
        Route::get('sdgs/rt/adminrt_tkejahatan', [RtTkejahatanController::class, 'admin_index'])->name('rt_tkejahatan.admin_index');
        Route::get('sdgs/rt/rtlembaga_ekonomi', [RtlembagaEkonomiController::class, 'index'])->name('rtlembaga_ekonomi.index');
        Route::get('sdgs/rt/adminrtlembaga_ekonomi', [RtlembagaEkonomiController::class, 'admin_index'])->name('rtlembaga_ekonomi.admin_index');
        Route::get('sdgs/rt/rtagama', [RtAgamaController::class, 'index'])->name('rt_agama.index');
        Route::get('sdgs/rt/adminrtagama', [RtAgamaController::class, 'admin_index'])->name('rt_agama.admin_index');
        Route::get('sdgs/rt/adminrtlembaga_keagamaan', [RtlembagaKeagamaanController::class, 'admin_index'])->name('rtlembaga_keagamaan.admin_index');
        Route::get('sdgs/rt/rtlembaga_keagamaan', [RtlembagaKeagamaanController::class, 'index'])->name('rtlembaga_keagamaan.index');
        Route::get('sdgs/rt/rtlembaga_masyarakat', [LembagaMasyarakatController::class, 'index'])->name('rtlembaga_masyarakat.index');
        Route::get('sdgs/rt/adminrtlembaga_masyarakat', [LembagaMasyarakatController::class, 'admin_index'])->name('rtlembaga_masyarakat.admin_index');
        Route::get('sdgs/rt/rt_kegiatanwarga', [RtkegiatanWargaController::class, 'index'])->name('rt_kegiatanwarga.index');
        Route::get('sdgs/rt/adminrt_kegiatanwarga', [RtkegiatanWargaController::class, 'admin_index'])->name('rt_kegiatanwarga.admin_index');
        Route::get('sdgs/rt/datart', [DataRtController::class, 'index'])->name('datart.index');
        Route::get('sdgs/rt/admindatart', [DataRtController::class, 'admin_index'])->name('datart.admin_index');
        Route::get('datapenduduk', [DatapendudukController::class, 'index'])->name('datapenduduk.index');
        Route::get('datapenduduk/admin', [DatapendudukController::class, 'index_admin'])->name('datapenduduk.index_admin');
        Route::get('datamutasi/datam', [DatamutasiController::class, 'index'])->name('mutasi.index');
        Route::get('datamutasi/admin', [DatamutasiController::class, 'index_admin'])->name('mutasi.index_admin');
        Route::get('sdgs/individu/dataindividu', [DataindividuController::class, 'index'])->name('individu.index');
        Route::get('sdgs/individu/admin', [DataindividuController::class, 'index_admin'])->name('individu.admin');
        Route::get('datadasawisma/datadw', [DatadasawismaController::class, 'index'])->name('dasawisma.index');
        Route::get('datadasawisma/admin', [DatadasawismaController::class, 'index_admin'])->name('dasawisma.index_admin');
        Route::get('datapenduduk/add', [DatapendudukController::class, 'add']);
        Route::post('datapenduduk/store', [DatapendudukController::class, 'store'])->name('datapenduduk.store');

        // JSON DATATABLES
        Route::post('datapenduduk/json', [DatapendudukController::class, 'json'])->name('datapenduduk.json');
        Route::post('datapenduduk/jsonadmin', [DatapendudukController::class, 'jsonadmin'])->name('datapenduduk.jsonadmin');
        Route::post('datadasawisma/datadw/json', [DatadasawismaController::class, 'json'])->name('datadw.json');
        Route::post('datadasawisma/datadw/jsonadmin', [DatadasawismaController::class, 'jsonadmin'])->name('datadw.jsonadmin');
        Route::post('datam/json', [DatamutasiController::class, 'json'])->name('datam.json');
        Route::post('datam/jsonadmin', [DatamutasiController::class, 'jsonadmin'])->name('datam.jsonadmin');
        Route::post('/dataindividu/json', [DataindividuController::class, 'json'])->name('dataindividu.json');
        Route::post('/dataindividu/jsonadmin', [DataindividuController::class, 'jsonadmin'])->name('dataindividu.jsonadmin');
        Route::post('/datasdgspekerjaan/json', [DatapekerjaansdgsController::class, 'json'])->name('datasdgspekerjaan.json');
        Route::post('/datasdgspekerjaan/jsonadmin', [DatapekerjaansdgsController::class, 'jsonadmin'])->name('datasdgspekerjaan.jsonadmin');
        Route::post('/datapenghasilan/json', [PenghasilanController::class, 'json'])->name('datapenghasilan.json');
        Route::post('/datapenghasilan/jsonadmin', [PenghasilanController::class, 'jsonadmin'])->name('datapenghasilan.jsonadmin');
        Route::post('/datakesehatan/json', [DatakesehatanController::class, 'json'])->name('datakesehatan.json');
        Route::post('/datakesehatan/jsonadmin', [DatakesehatanController::class, 'jsonadmin'])->name('datakesehatan.jsonadmin');
        Route::post('/datadisabilitas/json', [JenisdisabilitasController::class, 'json'])->name('datadisabilitas.json');
        Route::post('/datadisabilitas/jsonadmin', [JenisdisabilitasController::class, 'jsonadmin'])->name('datadisabilitas.jsonadmin');
        Route::post('/datasdgspendidikan/json', [SdgspendidikanController::class, 'json'])->name('datasdgspendidikan.json');
        Route::post('/datasdgspendidikan/jsonadmin', [SdgspendidikanController::class, 'jsonadmin'])->name('datasdgspendidikan.jsonadmin');
        Route::post('/lokasidanpemukiman/json', [LokasipemukimanController::class, 'json'])->name('lokasidanpemukiman.json');
        Route::post('/lokasidanpemukiman/jsonadmin', [LokasipemukimanController::class, 'jsonadmin'])->name('lokasidanpemukiman.jsonadmin');
        Route::post('/aksespendidikan/json', [AksesPendidikanController::class, 'json'])->name('aksespendidikan.json');
        Route::post('/aksespendidikan/jsonadmin', [AksesPendidikanController::class, 'jsonadmin'])->name('aksespendidikan.jsonadmin');
        Route::post('/akseskesehatan/json', [AkseskesehatanController::class, 'json'])->name('akseskesehatan.json');
        Route::post('/akseskesehatan/jsonadmin', [AkseskesehatanController::class, 'jsonadmin'])->name('akseskesehatan.jsonadmin');
        Route::post('/aksestenagakerja/json', [AksestenagakerjaController::class, 'json'])->name('aksestenagakerja.json');
        Route::post('/aksestenagakerja/jsonadmin', [AksestenagakerjaController::class, 'jsonadmin'])->name('aksestenagakerja.jsonadmin');
        Route::post('/aksessarpras/json', [AksessarprasController::class, 'json'])->name('aksessarpras.json');
        Route::post('/aksessarpras/jsonadmin', [AksessarprasController::class, 'jsonadmin'])->name('aksessarpras.jsonadmin');
        Route::post('/laink/json', [LainkController::class, 'json'])->name('laink.json');
        Route::post('/laink/jsonadmin', [LainkController::class, 'jsonadmin'])->name('laink.jsonadmin');
        Route::post('/rtlokasi/json', [RtlokasiController::class, 'json'])->name('rtlokasi.json');
        Route::post('/rtlokasi/jsonadmin', [RtlokasiController::class, 'jsonadmin'])->name('rtlokasi.jsonadmin');
        Route::post('/rtpengurus/json', [RtpuengurusController::class, 'json'])->name('rtpengurus.json');
        Route::post('/rtpengurus/jsonadmin', [RtpuengurusController::class, 'jsonadmin'])->name('rtpengurus.jsonadmin');
        Route::post('/rtlembaga_ekonomi/json', [RtlembagaEkonomiController::class, 'json'])->name('rtlembaga_ekonomi.json');
        Route::post('/rtlembaga_ekonomi/jsonadmin', [RtlembagaEkonomiController::class, 'jsonadmin'])->name('rtlembaga_ekonomi.jsonadmin');
        Route::post('/datart/json', [DataRtController::class, 'json'])->name('datart.json');
        Route::post('/datart/jsonadmin', [DataRtController::class, 'jsonadmin'])->name('datart.jsonadmin');
        Route::post('/rtindustri/json', [RtindustriController::class, 'json'])->name('rtindustri.json');
        Route::post('/rtindustri/jsonadmin', [RtindustriController::class, 'jsonadmin'])->name('rtindustri.jsonadmin');
        Route::post('/rtsare/json', [RtSaranaEkonomiController::class, 'json'])->name('rtsare.json');
        Route::post('/rtsare/jsonadmin', [RtSaranaEkonomiController::class, 'jsonadmin'])->name('rtsare.jsonadmin');
        Route::post('/rt_fasilitas_ekonomi/json', [RtFasilitasEkonomiController::class, 'json'])->name('rt_fasilitas_ekonomi.json');
        Route::post('/rt_fasilitas_ekonomi/jsonadmin', [RtFasilitasEkonomiController::class, 'jsonadmin'])->name('rt_fasilitas_ekonomi.jsonadmin');
        Route::post('/rtinfrastuktur/json', [RtInfrastukturController::class, 'json'])->name('rtinfrastuktur.json');
        Route::post('/rtinfrastuktur/jsonadmin', [RtInfrastukturController::class, 'jsonadmin'])->name('rtinfrastuktur.jsonadmin');
        Route::post('/rtlingkungan/json', [RtLingkunganController::class, 'json'])->name('rtlingkungan.json');
        Route::post('/rtlingkungan/jsonadmin', [RtLingkunganController::class, 'jsonadmin'])->name('rtlingkungan.jsonadmin');
        Route::post('/rtbencana/json', [RtBencanaController::class, 'json'])->name('rtbencana.json');
        Route::post('/rtbencana/jsonadmin', [RtBencanaController::class, 'jsonadmin'])->name('rtbencana.jsonadmin');
        Route::post('/rtmitigasib/json', [RtMitigasibController::class, 'json'])->name('rtmitigasib.json');
        Route::post('/rtmitigasib/jsonadmin', [RtMitigasibController::class, 'jsonadmin'])->name('rtmitigasib.jsonadmin');
        Route::post('/rt_saranapendidikan/json', [RtSaranapendidikanController::class, 'json'])->name('rt_saranapendidikan.json');
        Route::post('/rt_saranapendidikan/jsonadmin', [RtSaranapendidikanController::class, 'jsonadmin'])->name('rt_saranapendidikan.jsonadmin');
        Route::post('/rt_kesehatan/json', [RtKesehatanController::class, 'json'])->name('rt_kesehatan.json');
        Route::post('/rt_kesehatan/jsonadmin', [RtKesehatanController::class, 'jsonadmin'])->name('rt_kesehatan.jsonadmin');
        Route::post('/rt_kejadianluarbiasa/json', [RtKejadianluarbiasaController::class, 'json'])->name('rt_kejadianluarbiasa.json');
        Route::post('/rt_kejadianluarbiasa/jsonadmin', [RtKejadianluarbiasaController::class, 'jsonadmin'])->name('rt_kejadianluarbiasa.jsonadmin');
        Route::post('/rt_agama/json', [RtAgamaController::class, 'json'])->name('rt_agama.json');
        Route::post('/rt_agama/jsonadmin', [RtAgamaController::class, 'jsonadmin'])->name('rt_agama.jsonadmin');
        Route::post('/rtlembaga_keagamaan/json', [RtlembagaKeagamaanController::class, 'json'])->name('rtlembaga_keagamaan.json');
        Route::post('/rtlembaga_keagamaan/jsonadmin', [RtlembagaKeagamaanController::class, 'jsonadmin'])->name('rtlembaga_keagamaan.jsonadmin');
        Route::post('/rtlembaga_masyarakat/json', [LembagaMasyarakatController::class, 'json'])->name('rtlembaga_masyarakat.json');
        Route::post('/rtlembaga_masyarakat/jsonadmin', [LembagaMasyarakatController::class, 'jsonadmin'])->name('rtlembaga_masyarakat.jsonadmin');
        Route::post('/rt_keamanan/json', [RtKeamananController::class, 'json'])->name('rt_keamanan.json');
        Route::post('/rt_keamanan/jsonadmin', [RtKeamananController::class, 'jsonadmin'])->name('rt_keamanan.jsonadmin');
        Route::post('/rt_tkejahatan/json', [RtTkejahatanController::class, 'json'])->name('rt_tkejahatan.json');
        Route::post('/rt_tkejahatan/jsonadmin', [RtTkejahatanController::class, 'jsonadmin'])->name('rt_tkejahatan.jsonadmin');
        Route::post('/rt_kegiatanwarga/json', [RtkegiatanWargaController::class, 'json'])->name('rt_kegiatanwarga.json');
        Route::post('/rt_kegiatanwarga/jsonadmin', [RtkegiatanWargaController::class, 'jsonadmin'])->name('rt_kegiatanwarga.jsonadmin');


        Route::get('/home', function () {
            return redirect('dashboard');
        });
    }

);
//Operator, Admin, dasawisma


Route::middleware(['checkrole:admin,operator,akundemo'])->group(
    function () {
        Route::get('datamutasi/export/datamutasi', [DatamutasiController::class, 'exportexcelm'])->name('export.meninggal');
        Route::get('datamutasi/export/datapindah', [DatamutasiController::class, 'exportexcelp'])->name('export.pindah');
        Route::post('/datamutasi/update/{nik}', [datamutasi::class, 'update'])->name('mutasi.update');
        // Route::get('datadasawisma/datadw', [UserController::class, 'index']);
    }
);

Route::middleware(['checkrole:admin,operator'])->group(
    function () {

        Route::get('datamutasi/export/datamutasi', [DatamutasiController::class, 'exportexcelm'])->name('export.meninggal');
        Route::get('datamutasi/export/datapindah', [DatamutasiController::class, 'exportexcelp'])->name('export.pindah');
        Route::post('datapendudukimport', [DatapendudukController::class, 'import_excel'])->name('import_excel');
        Route::post('/datamutasi/update/{nik}', [datamutasi::class, 'update'])->name('mutasi.update');
        // Route::get('datadasawisma/datadw', [UserController::class, 'index']);
    }
);


Route::middleware(['checkrole:admin,dasawisma,akundemo'])->group(
    function () {
        Route::get('datapenduduk/edit/{nik}', [DatapendudukController::class, 'edit'])->name('datapenduduk.edit');
        Route::get('datapenduduk/show/{nik}', [DatapendudukController::class, 'show'])->name('datapenduduk.show');
        Route::get('sdgs/individu/editdataindividu/{nik}', [DataindividuController::class, 'create'])->name('individu.edit');
        Route::get('sdgs/individu/datasdgspekerjaan', [DatapekerjaansdgsController::class, 'index'])->name('pekerjaan.index');
        Route::get('sdgs/individu/admindatasdgspekerjaan', [DatapekerjaansdgsController::class, 'admin_index'])->name('pekerjaan.admin_index');
        Route::get('sdgs/individu/editdatasdgspekerjaan/{nik}', [DatapekerjaansdgsController::class, 'create'])->name('pekerjaan.create');
        Route::get('sdgs/individu/datasdgspekerjaan/{show}', [DatapekerjaansdgsController::class, 'show'])->name('pekerjaan.show');
        Route::get('sdgs/individu/editkesehatan/{nik}', [DatakesehatanController::class, 'create'])->name('kesehatan.edit');
        Route::get('sdgs/individu/viewkesehatan/{show}', [DatakesehatanController::class, 'show'])->name('kesehatan.show');
        Route::get('sdgs/individu/editpenghasilan/{nik}', [PenghasilanController::class, 'create'])->name('penghasilan.edit');
        Route::get('sdgs/individu/datapenghasilan/{show}', [PenghasilanController::class, 'show'])->name('penghasilan.show');
        Route::get('sdgs/individu/editdisabilitas/{nik}', [JenisdisabilitasController::class, 'create'])->name('disabilitas.edit');
        Route::get('sdgs/individu/datadisabilitas/{show}', [JenisdisabilitasController::class, 'show'])->name('disabilitas.show');
        Route::get('sdgs/individu/editsdgspendidikan/{nik}', [SdgspendidikanController::class, 'create'])->name('pendidikan.edit');
        Route::get('sdgs/individu/datasdgsppendidikan/{show}', [SdgspendidikanController::class, 'show'])->name('pendidikan.show');
        Route::get('sdgs/KK/editlokasidanpemukiman/{nik}', [LokasipemukimanController::class, 'create'])->name('lokasipemukiman.edit');
        Route::get('sdgs/KK/lokasidanpemukiman/{show}', [LokasipemukimanController::class, 'show'])->name('lokasipemukiman.show');
        Route::get('sdgs/KK/editaksespendidikan/{nik}', [AksesPendidikanController::class, 'create'])->name('aksespendidikan.edit');
        Route::get('sdgs/KK/aksespendidikan/{show}', [AksesPendidikanController::class, 'show'])->name('aksespendidikan.show');
        Route::get('sdgs/KK/editakseskesehatan/{nik}', [AkseskesehatanController::class, 'create'])->name('akseskesehatan.edit');
        Route::get('sdgs/KK/akseskesehatan/{show}', [AkseskesehatanController::class, 'show'])->name('akseskesehatan.show');
        Route::get('sdgs/KK/editaksestenagakerja/{nik}', [AksestenagakerjaController::class, 'create'])->name('aksestenagakerja.edit');
        Route::get('sdgs/KK/aksestenagakerja/{show}', [AksestenagakerjaController::class, 'show'])->name('aksestenagakerja.show');
        Route::get('sdgs/KK/editaksespras/{nik}', [AksessarprasController::class, 'create'])->name('aksessarpras.edit');
        Route::get('sdgs/KK/aksessarpras/{show}', [AksessarprasController::class, 'show'])->name('aksessarpras.show');
        Route::get('sdgs/KK/editlaink/{nik}', [LainkController::class, 'create'])->name('editlaink.edit');
        Route::get('sdgs/KK/laink/{show}', [LainkController::class, 'show'])->name('laink.show');
        Route::get('sdgs/RT/editrtlokasi/{nik}', [RtlokasiController::class, 'create'])->name('rtlokasi.edit');
        Route::get('sdgs/RT/rtlokasi/{show}', [RtlokasiController::class, 'show'])->name('rtlokasi.show');
        Route::get('sdgs/RT/editrtpengurus/{nik}', [RtpuengurusController::class, 'create'])->name('rtpengurus.edit');
        Route::get('sdgs/RT/rtpengurus/{show}', [RtpuengurusController::class, 'show'])->name('rtpengurus.show');
        Route::get('sdgs/RT/editrtindustri/{nik}', [RtindustriController::class, 'create'])->name('rtindustri.edit');
        Route::get('sdgs/RT/rtindustri/{show}', [RtindustriController::class, 'show'])->name('rtindustri.show');
        Route::get('sdgs/RT/editrtsare/{nik}', [RtSaranaEkonomiController::class, 'create'])->name('rtsare.edit');
        Route::get('sdgs/RT/rtsare/{show}', [RtSaranaEkonomiController::class, 'show'])->name('rtsare.show');
        Route::get('sdgs/RT/editrt_fasilitas_ekonomi/{nik}', [RtFasilitasEkonomiController::class, 'create'])->name('rt_fasilitas_ekonomi.edit');
        Route::get('sdgs/RT/rt_fasilitas_ekonomi/{show}', [RtFasilitasEkonomiController::class, 'show'])->name('rt_fasilitas_ekonomi.show');
        Route::get('sdgs/RT/editrtinfrastuktur/{nik}', [RtInfrastukturController::class, 'create'])->name('rtinfrastuktur.edit');
        Route::get('sdgs/RT/rtinfrastuktur/{show}', [RtInfrastukturController::class, 'show'])->name('rtinfrastuktur.show');
        Route::get('sdgs/RT/editrtlingkungan/{nik}', [RtLingkunganController::class, 'create'])->name('rtlingkungan.edit');
        Route::get('sdgs/RT/rtlingkungan/{show}', [RtLingkunganController::class, 'show'])->name('rtlingkungan.show');
        Route::get('sdgs/RT/editrtbencana/{nik}', [RtBencanaController::class, 'create'])->name('rtbencana.edit');
        Route::get('sdgs/RT/rtbencana/{show}', [RtBencanaController::class, 'show'])->name('rtbencana.show');
        Route::get('sdgs/RT/editrtmitigasib/{nik}', [RtMitigasibController::class, 'create'])->name('rtmitigasib.edit');
        Route::get('sdgs/RT/rtmitigasib/{show}', [RtMitigasibController::class, 'show'])->name('rtmitigasib.show');
        Route::get('sdgs/RT/editrt_saranapendidikan/{nik}', [RtSaranapendidikanController::class, 'create'])->name('rt_saranapendidikan.edit');
        Route::get('sdgs/RT/rt_saranapendidikan/{show}', [RtSaranapendidikanController::class, 'show'])->name('rt_saranapendidikan.show');
        Route::get('sdgs/RT/editrt_kesehatan/{nik}', [RtKesehatanController::class, 'create'])->name('rt_kesehatan.edit');
        Route::get('sdgs/RT/rt_kesehatan/{show}', [RtKesehatanController::class, 'show'])->name('rt_kesehatan.show');
        Route::get('sdgs/RT/editrt_kejadianluarbiasa/{nik}', [RtKejadianluarbiasaController::class, 'create'])->name('rt_kejadianluarbiasa.edit');
        Route::get('sdgs/RT/rt_kejadianluarbiasa/{show}', [RtKejadianluarbiasaController::class, 'show'])->name('rt_kejadianluarbiasa.show');
        Route::get('sdgs/RT/editrt_keamanan/{nik}', [RtKeamananController::class, 'create'])->name('rt_keamanan.edit');
        Route::get('sdgs/RT/rt_keamanan/{show}', [RtKeamananController::class, 'show'])->name('rt_keamanan.show');
        Route::get('sdgs/RT/editrt_tkejahatan/{nik}', [RtTkejahatanController::class, 'create'])->name('rt_tkejahatan.edit');
        Route::get('sdgs/RT/rt_tkejahatan/{show}', [RtTkejahatanController::class, 'show'])->name('rt_tkejahatan.show');
        Route::get('sdgs/RT/editrtlembaga_ekonomi/{nik}', [RtlembagaEkonomiController::class, 'create'])->name('rtlembaga_ekonomi.edit');
        Route::get('sdgs/RT/rtlembaga_ekonomi/{show}', [RtlembagaEkonomiController::class, 'show'])->name('rtlembaga_ekonomi.show');
        Route::get('sdgs/RT/editrt_agama/{nik}', [RtAgamaController::class, 'create'])->name('rt_agama.edit');
        Route::get('sdgs/RT/rt_agama/{show}', [RtAgamaController::class, 'show'])->name('rt_agama.show');
        Route::get('sdgs/RT/editrtlembaga_keagamaan/{nik}', [RtlembagaKeagamaanController::class, 'create'])->name('rtlembaga_keagamaan.edit');
        Route::get('sdgs/RT/rtlembaga_keagamaan/{show}', [RtlembagaKeagamaanController::class, 'show'])->name('rtlembaga_keagamaan.show');
        Route::get('sdgs/RT/editrtlembaga_masyarakat/{nik}', [LembagaMasyarakatController::class, 'create'])->name('rtlembaga_masyarakat.edit');
        Route::get('sdgs/RT/rtlembaga_masyarakat/{show}', [LembagaMasyarakatController::class, 'show'])->name('rtlembaga_masyarakat.show');
        Route::get('sdgs/RT/editrt_kegiatanwarga/{nik}', [RtkegiatanWargaController::class, 'create'])->name('rt_kegiatanwarga.edit');
        Route::get('sdgs/RT/rt_kegiatanwarga/{show}', [RtkegiatanWargaController::class, 'show'])->name('rt_kegiatanwarga.show');

        Route::get('sdgs/RT/tambahdatart', [DataRtController::class, 'add'])->name('datart.create');
        Route::get('sdgs/RT/editdatart/{nik}', [DataRtController::class, 'edit'])->name('datart.edit');
    }
);

Route::middleware(['checkrole:admin,dasawisma'])->group(
    function () {

        Route::post('datapenduduk/update/{nik}', [DatapendudukController::class, 'update'])->name('datapenduduk.update');

        Route::post('sdgs/individu/editdataindividu', [DataindividuController::class, 'store'])->name('individu.update');

        Route::post('sdgs/individu/editdatasdgspekerjaan', [DatapekerjaansdgsController::class, 'store'])->name('pekerjaan.update');

        Route::post('sdgs/individu/editkesehatan', [DatakesehatanController::class, 'store'])->name('kesehatan.update');

        Route::post('sdgs/individu/editpenghasilan', [PenghasilanController::class, 'store'])->name('penghasilan.update');

        Route::post('sdgs/individu/editdisabilitas', [JenisdisabilitasController::class, 'store'])->name('disabilitas.update');

        Route::post('sdgs/individu/editsdgspendidikan', [SdgspendidikanController::class, 'store'])->name('pendidikan.update');

        Route::post('sdgs/KK/editlokasidanpemukiman', [LokasipemukimanController::class, 'store'])->name('lokasipemukiman.update');

        Route::post('sdgs/KK/editaksespendidikan', [AksesPendidikanController::class, 'store'])->name('aksespendidikan.update');

        Route::post('sdgs/KK/editakseskesehatan', [AkseskesehatanController::class, 'store'])->name('akseskesehatan.update');

        Route::post('sdgs/KK/editaksestenagakerja', [AksestenagakerjaController::class, 'store'])->name('aksestenagakerja.update');

        Route::post('sdgs/KK/editaksespras', [AksessarprasController::class, 'store'])->name('aksessarpras.update');

        Route::post('sdgs/KK/editlaink', [LainkController::class, 'store'])->name('laink.update');

        Route::post('sdgs/RT/editrtlokasi', [RtlokasiController::class, 'store'])->name('rtlokasi.update');;
        Route::post('sdgs/RT/editrtpengurus', [RtpuengurusController::class, 'store'])->name('rtpengurus.update');

        Route::post('sdgs/RT/editrtindustri', [RtindustriController::class, 'store'])->name('rtindustri.update');

        Route::post('sdgs/RT/editrtsare', [RtSaranaEkonomiController::class, 'store'])->name('rtsare.update');

        Route::post('sdgs/RT/editrt_fasilitas_ekonomi', [RtFasilitasEkonomiController::class, 'store'])->name('rt_fasilitas_ekonomi.update');

        Route::post('sdgs/RT/editrtinfrastuktur', [RtInfrastukturController::class, 'store'])->name('rtinfrastuktur.update');

        Route::post('sdgs/RT/editrtlingkungan', [RtLingkunganController::class, 'store'])->name('rtlingkungan.update');

        Route::post('sdgs/RT/editrtbencana', [RtBencanaController::class, 'store'])->name('rtbencana.update');

        Route::post('sdgs/RT/editrtmitigasib', [RtMitigasibController::class, 'store'])->name('rtmitigasib.update');

        Route::post('sdgs/RT/editrt_saranapendidikan', [RtSaranapendidikanController::class, 'store'])->name('rt_saranapendidikan.update');

        Route::post('sdgs/RT/editrt_kesehatan', [RtKesehatanController::class, 'store'])->name('rt_kesehatan.update');

        Route::post('sdgs/RT/editrt_kejadianluarbiasa', [RtKejadianluarbiasaController::class, 'store'])->name('rt_kejadianluarbiasa.update');

        Route::post('sdgs/RT/editrt_keamanan', [RtKeamananController::class, 'store'])->name('rt_keamanan.update');

        Route::post('sdgs/RT/editrt_tkejahatan', [RtTkejahatanController::class, 'store'])->name('rt_tkejahatan.update');

        Route::post('sdgs/RT/editrtlembaga_ekonomi', [RtlembagaEkonomiController::class, 'store'])->name('rtlembaga_ekonomi.update');

        Route::post('sdgs/RT/editrt_agama', [RtAgamaController::class, 'store'])->name('rt_agama.update');
        Route::post('sdgs/RT/editrtlembaga_keagamaan', [RtlembagaKeagamaanController::class, 'store'])->name('rtlembaga_keagamaan.update');

        Route::post('sdgs/RT/editrtlembaga_masyarakat', [LembagaMasyarakatController::class, 'store'])->name('rtlembaga_masyarakat.update');

        Route::post('sdgs/RT/editrt_kegiatanwarga', [RtkegiatanWargaController::class, 'store'])->name('rt_kegiatanwarga.update');



        Route::post('sdgs/RT/tambahdatart', [DataRtController::class, 'store'])->name('datart.add');

        Route::post('sdgs/RT/editdatart/{nik}', [DataRtController::class, 'update'])->name('datart.update');
    }
);

Route::middleware(['checkrole:admin'])->group(
    function () {
        Route::get('datapenduduk/export/datapenduduk', [DatapendudukController::class, 'export_excel']);
    }
);


Route::middleware(['checkrole:operator,admin'])->group(
    function () {
        Route::get('/datadasawisma/show/{nik}', [DatadasawismaController::class, 'show'])->name('dasawisma.show');
        Route::post('/datadasawisma/update/{nik}', [DatadasawismaController::class, 'update'])->name('dasawisma.update');
    }
);



//dasawisma
