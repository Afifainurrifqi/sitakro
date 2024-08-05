<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\pendidikan;
use App\Models\pekerjaan;
use App\Models\status;
use App\Models\goldar;
use App\Models\datapenduduk;
use App\Models\dataindividu;
use Illuminate\Http\Request;
use App\Http\Requests\StoredataindividuRequest;
use App\Http\Requests\UpdatedataindividuRequest;
use App\Models\datakesehatan;
use App\Models\datapekerjaansdgs;
use App\Models\jenisdisabilitas;
use App\Models\penghasilan;
use App\Models\sdgspendidikan;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;

class DataindividuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $totalPenduduk = datapenduduk::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = dataindividu::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        // Ambil data lainnya untuk ditampilkan di view
        $dataindividu = dataindividu::all();
        $individuLabels = $dataindividu->pluck('dataindividu_utama')->toArray();
        $individuCounts = $dataindividu->countBy('dataindividu_utama')->values()->toArray();


        return view('sdgs.individu.dataindividu', compact('dataindividu', 'individuLabels', 'individuCounts', 'presentase'));
    }

    public function index_admin(Request $request)
    {
        $totalPenduduk = datapenduduk::count();

        // Dapatkan jumlah data yang sudah terisi di tabel datapekerjaansdgs
        $dataTerisi = dataindividu::count();

        // Hitung presentase penyelesaian data
        $presentase = $totalPenduduk > 0 ? ($dataTerisi / $totalPenduduk) * 100 : 0;

        // Ambil data lainnya untuk ditampilkan di view
        $dataindividu = dataindividu::all();
        $individuLabels = $dataindividu->pluck('dataindividu_utama')->toArray();
        $individuCounts = $dataindividu->countBy('dataindividu_utama')->values()->toArray();
        return view('sdgs.individu.admin_data_individu', compact('dataindividu', 'individuLabels', 'individuCounts', 'presentase'));
    }

    public function jsonadmin(Request $request)
    {
        $allowedDatakValues = ['tetap', 'tidaktetap'];

        $query = Datapenduduk::with(['kk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'detailkk.kk'])
            ->whereIn('Datak', $allowedDatakValues);

        return DataTables::of($query)

            ->addColumn('nokk', function ($row) {
                return $row->detailkk->kk->nokk;
            })
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('individu.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('individu.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })
            ->addColumn('Usia', function ($row) {
                $usia = Carbon::parse($row->tanggal_lahir)->age;

                return '' . $usia . ' tahun.';
            })
            ->addColumn('usia_nikah', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $usianikah = $dataIndividu ? $dataIndividu->usia_saat_pertama_kali_menikah : '';

                return '' . $usianikah . '';
            })
            ->addColumn('warga_negara', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $warga_negara = $dataIndividu ? $dataIndividu->warga_negarawarga_negara : '';

                return '' . $warga_negara . '';
            })
            ->addColumn('hp', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $hp = $dataIndividu ? $dataIndividu->nohp : '';

                return '' . $hp . '';
            })
            ->addColumn('wa', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $wa = $dataIndividu ? $dataIndividu->nowa : '';

                return '' . $wa . '';
            })
            ->addColumn('email', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $email = $dataIndividu ? $dataIndividu->email : '';

                return '' . $email . '';
            })
            ->addColumn('facebook', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $facebook = $dataIndividu ? $dataIndividu->facebook : '';

                return   $facebook . '';
            })

            ->addColumn('twitter', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $twitter = $dataIndividu ? $dataIndividu->twitter : '';

                return  $twitter . '';
            })

            ->addColumn('instagram', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $instagram = $dataIndividu ? $dataIndividu->instagram : '';

                return $instagram  . '';
            })
            ->addColumn('suku_bangsa', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $sukuBangsa = $dataIndividu ? $dataIndividu->suku_bangsa : '';

                return '' . $sukuBangsa . '';
            })

            ->addColumn('kondisi_pekerjaan', function ($row) {
                $datapekerjaan = datapekerjaansdgs::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->kondisi_pekerjaan : '';

                return $kondisi;
            })
            ->addColumn('pekerjaan_utama', function ($row) {
                $datapekerjaan = Datapekerjaansdgs::where('nik', $row->nik)->first();
                $utama = $datapekerjaan ? $datapekerjaan->pekerjaan_utama : '';

                return $utama;
            })
            ->addColumn('jaminan_sosial_ketenagakerjaan', function ($row) {
                $datapekerjaan = Datapekerjaansdgs::where('nik', $row->nik)->first();
                $jamkes = $datapekerjaan ? $datapekerjaan->jaminan_sosial_ketenagakerjaan : '';

                return $jamkes;
            })
            ->addColumn('penghasilan_setahun_terakhir', function ($row) {
                $datapekerjaan = Datapekerjaansdgs::where('nik', $row->nik)->first();
                $hasil = $datapekerjaan ? number_format($datapekerjaan->penghasilan_setahun_terakhir, 0, ',', '.') : '';
                return 'Rp ' . $hasil;
            })
            ->addColumn('sumber', function ($row) {
                $datapenghasilan = penghasilan::where('nik', $row->nik)->first();
                $sumber = $datapenghasilan ? $datapenghasilan->sumber_penghasilan : '';

                return '' . $sumber . '';
            })
            ->addColumn('jumlah_aset', function ($row) {
                $datapenghasilan = penghasilan::where('nik', $row->nik)->first();
                $jumlah_aset = $datapenghasilan ? $datapenghasilan->jumlah_asset_darip : '';

                return '' . $jumlah_aset . '';
            })
            ->addColumn('satuan', function ($row) {
                $datapenghasilan = penghasilan::where('nik', $row->nik)->first();
                $satuan = $datapenghasilan ? $datapenghasilan->satuan : '';

                return '' . $satuan . '';
            })
            ->addColumn('penghasilan', function ($row) {
                $datapenghasilan = penghasilan::where('nik', $row->nik)->first();
                $penghasilan = $datapenghasilan ? number_format($datapenghasilan->penghasilan_setahun, 0, ',', '.') : '';

                return 'Rp' . $penghasilan ;
            })
            ->addColumn('ekspor', function ($row) {
                $datapenghasilan = penghasilan::where('nik', $row->nik)->first();
                $ekspor = $datapenghasilan ? $datapenghasilan->expor : '';

                return '' . $ekspor . '';
            })

            ->addColumn('penyakit', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $penyakitsetahun = $datakesehatan ? explode(',', $datakesehatan->penyakitsetahun) : [];

                return implode(', ', $penyakitsetahun);
            })
            ->addColumn('rumahsakit', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $rumahsakit = $datakesehatan ? $datakesehatan->rumah_sakit : '';

                return '' . $rumahsakit . ' kali';
            })
            ->addColumn('rumahsakitb', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $rumahsakitb = $datakesehatan ? $datakesehatan->rumah_sakitb : '';

                return '' . $rumahsakitb . ' kali';
            })
            ->addColumn('pusekesmas_denganri', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $pusekesmas_denganri = $datakesehatan ? $datakesehatan->puskesmas_denganri : '';

                return '' . $pusekesmas_denganri . ' kali';
            })
            ->addColumn('pusekesmas_tanpari', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $pusekesmas_tanpari = $datakesehatan ? $datakesehatan->puskesmas_tanpari : '';

                return '' . $pusekesmas_tanpari . ' kali';
            })
            ->addColumn('puskesmas_pembantu', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $puskesmas_pembantu = $datakesehatan ? $datakesehatan->puskemas_pembantu : '';

                return '' . $puskesmas_pembantu . ' kali';
            })
            ->addColumn('poliklinik', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $poliklinik = $datakesehatan ? $datakesehatan->poliklinik : '';

                return '' . $poliklinik . ' kali';
            })
            ->addColumn('tempat_prakterkdr', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $tempat_prakterkdr = $datakesehatan ? $datakesehatan->tempat_praktekdr : '';

                return '' . $tempat_prakterkdr . ' kali';
            })
            ->addColumn('rumah_bersalin', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $rumah_bersalin = $datakesehatan ? $datakesehatan->rumah_bersalin : '';

                return '' . $rumah_bersalin . ' kali';
            })
            ->addColumn('tempat_praktek', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $tempat_praktek = $datakesehatan ? $datakesehatan->tempat_praktek : '';

                return '' . $tempat_praktek . ' kali';
            })
            ->addColumn('poskedes', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $poskedes = $datakesehatan ? $datakesehatan->poskesdes : '';

                return '' . $poskedes . ' kali';
            })
            ->addColumn('polindes', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $polindes = $datakesehatan ? $datakesehatan->polindes : '';

                return '' . $polindes . ' kali';
            })
            ->addColumn('apotik', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $apotik = $datakesehatan ? $datakesehatan->apotik : '';

                return '' . $apotik . ' kali';
            })
            ->addColumn('toko_obat', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $toko_obat = $datakesehatan ? $datakesehatan->toko_obat : '';

                return '' . $toko_obat . ' kali';
            })
            ->addColumn('posyandu', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $posyandu = $datakesehatan ? $datakesehatan->posyandu : '';

                return '' . $posyandu . ' kali';
            })
            ->addColumn('posbindu', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $posbindu = $datakesehatan ? $datakesehatan->posbindu : '';

                return '' . $posbindu . ' kali';
            })
            ->addColumn('tempat_praktikdb', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $tempat_praktikdb = $datakesehatan ? $datakesehatan->tempat_praktikdb : '';

                return '' . $tempat_praktikdb . ' kali';
            })
            ->addColumn('jamkes', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $jamkes = $datakesehatan ? $datakesehatan->jamkes : '';

                return '' . $jamkes . '';
            })
            ->addColumn('bayi', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $bayi = $datakesehatan ? $datakesehatan->bayiu16 : '';

                return '' . $bayi . '';
            })

            ->addColumn('disabilitas', function ($row) {
                $datadisabilitas = jenisdisabilitas::where('nik', $row->nik)->first();
                $kondisi = $datadisabilitas ? $datadisabilitas->jenis_disabilitas : '';

                return $kondisi;
            })

            ->addColumn('pendidikan_tertinggi', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->pendidikan_tertinggi : '';

                return $kondisi;
            })
            ->addColumn('berapa_tahunp', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->berapa_tahunp : '';

                return $kondisi;
            })
            ->addColumn('pendidikan_diikuti', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->pendidikan_diikuti : '';

                return $kondisi;
            })
            ->addColumn('bahasa_Rumah', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->bahasa_Rumah : '';

                return $kondisi;
            })
            ->addColumn('bahasa_Formal', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->bahasa_Formal : '';

                return $kondisi;
            })
            ->addColumn('jumlah_kerja1', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->jumlah_kerja1 : '';

                return $kondisi;
            })
            ->addColumn('skamling1', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->skamling1 : '';

                return $kondisi;
            })
            ->addColumn('pesta_rakyat1', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->pesta_rakyat1 : '';

                return $kondisi;
            })
            ->addColumn('frekuensiml', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->frekuensiml : '';

                return $kondisi;
            })
            ->addColumn('frekuensib', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->frekuensib : '';

                return $kondisi;
            })
            ->addColumn('frekuensimn', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->frekuensimn : '';

                return $kondisi;
            })
            ->addColumn('mendapatp1', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->mendapatp1 : '';

                return $kondisi;
            })
            ->addColumn('bagaiamanap', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->bagaiamanap : '';

                return $kondisi;
            })
            ->addColumn('pernahmasukan', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->pernahmasukan : '';

                return $kondisi;
            })
            ->addColumn('keterbukaands', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->keterbukaands : '';

                return $kondisi;
            })
            ->addColumn('bencana1', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->bencana1 : '';

                return $kondisi;
            })
            ->addColumn('apakahb', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->apakahb : '';

                return $kondisi;
            })
            ->addColumn('apakahd', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->apakahd : '';

                return $kondisi;
            })
            ->addColumn('apakahp', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->apakahp : '';

                return $kondisi;
            })


            ->rawColumns([
                'action',
            ])
            ->toJson();
    }

    public function json(Request $request)
    {
        $allowedDatakValues = ['tetap', 'tidaktetap'];

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

            ->addColumn('nokk', function ($row) {
                return $row->detailkk->kk->nokk;
            })
            ->addColumn('action', function ($row) {
                return '<td>
                            <a href="' . route('individu.show', ['show' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Lihat Data">
                                <i class="fas fa-book"></i>
                            </a>
                            <a href="' . route('individu.edit', ['nik' => $row->nik]) . '" class="btn mb-1 btn-info btn-sm" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>';
            })
            ->addColumn('Usia', function ($row) {
                $usia = Carbon::parse($row->tanggal_lahir)->age;

                return '' . $usia . ' tahun.';
            })
            ->addColumn('usia_nikah', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $usianikah = $dataIndividu ? $dataIndividu->usia_saat_pertama_kali_menikah : '';

                return '' . $usianikah . '';
            })
            ->addColumn('warga_negara', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $warga_negara = $dataIndividu ? $dataIndividu->warga_negarawarga_negara : '';

                return '' . $warga_negara . '';
            })
            ->addColumn('hp', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $hp = $dataIndividu ? $dataIndividu->nohp : '';

                return '' . $hp . '';
            })
            ->addColumn('wa', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $wa = $dataIndividu ? $dataIndividu->nowa : '';

                return '' . $wa . '';
            })
            ->addColumn('email', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $email = $dataIndividu ? $dataIndividu->email : '';

                return '' . $email . '';
            })
            ->addColumn('facebook', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $facebook = $dataIndividu ? $dataIndividu->facebook : '';

                return   $facebook . '';
            })

            ->addColumn('twitter', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $twitter = $dataIndividu ? $dataIndividu->twitter : '';

                return  $twitter . '';
            })

            ->addColumn('instagram', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $instagram = $dataIndividu ? $dataIndividu->instagram : '';

                return $instagram  . '';
            })
            ->addColumn('suku_bangsa', function ($row) {
                $dataIndividu = Dataindividu::where('nik', $row->nik)->first();
                $sukuBangsa = $dataIndividu ? $dataIndividu->suku_bangsa : '';

                return '' . $sukuBangsa . '';
            })

            ->addColumn('kondisi_pekerjaan', function ($row) {
                $datapekerjaan = datapekerjaansdgs::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->kondisi_pekerjaan : '';

                return $kondisi;
            })
            ->addColumn('pekerjaan_utama', function ($row) {
                $datapekerjaan = Datapekerjaansdgs::where('nik', $row->nik)->first();
                $utama = $datapekerjaan ? $datapekerjaan->pekerjaan_utama : '';

                return $utama;
            })
            ->addColumn('jaminan_sosial_ketenagakerjaan', function ($row) {
                $datapekerjaan = Datapekerjaansdgs::where('nik', $row->nik)->first();
                $jamkes = $datapekerjaan ? $datapekerjaan->jaminan_sosial_ketenagakerjaan : '';

                return $jamkes;
            })
            ->addColumn('penghasilan_setahun_terakhir', function ($row) {
                $datapekerjaan = Datapekerjaansdgs::where('nik', $row->nik)->first();
                $hasil = $datapekerjaan ? number_format($datapekerjaan->penghasilan_setahun_terakhir, 0, ',', '.') : '';
                return 'Rp ' . $hasil;
            })
            ->addColumn('sumber', function ($row) {
                $datapenghasilan = penghasilan::where('nik', $row->nik)->first();
                $sumber = $datapenghasilan ? $datapenghasilan->sumber_penghasilan : '';

                return '' . $sumber . '';
            })
            ->addColumn('jumlah_aset', function ($row) {
                $datapenghasilan = penghasilan::where('nik', $row->nik)->first();
                $jumlah_aset = $datapenghasilan ? $datapenghasilan->jumlah_asset_darip : '';

                return '' . $jumlah_aset . '';
            })
            ->addColumn('satuan', function ($row) {
                $datapenghasilan = penghasilan::where('nik', $row->nik)->first();
                $satuan = $datapenghasilan ? $datapenghasilan->satuan : '';

                return '' . $satuan . '';
            })
            ->addColumn('penghasilan', function ($row) {
                $datapenghasilan = penghasilan::where('nik', $row->nik)->first();
                $penghasilan = $datapenghasilan ? number_format($datapenghasilan->penghasilan_setahun, 0, ',', '.') : '';

                return 'Rp' . $penghasilan ;
            })
            ->addColumn('ekspor', function ($row) {
                $datapenghasilan = penghasilan::where('nik', $row->nik)->first();
                $ekspor = $datapenghasilan ? $datapenghasilan->expor : '';

                return '' . $ekspor . '';
            })

            ->addColumn('penyakit', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $penyakitsetahun = $datakesehatan ? explode(',', $datakesehatan->penyakitsetahun) : [];

                return implode(', ', $penyakitsetahun);
            })
            ->addColumn('rumahsakit', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $rumahsakit = $datakesehatan ? $datakesehatan->rumah_sakit : '';

                return '' . $rumahsakit . ' kali';
            })
            ->addColumn('rumahsakitb', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $rumahsakitb = $datakesehatan ? $datakesehatan->rumah_sakitb : '';

                return '' . $rumahsakitb . ' kali';
            })
            ->addColumn('pusekesmas_denganri', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $pusekesmas_denganri = $datakesehatan ? $datakesehatan->puskesmas_denganri : '';

                return '' . $pusekesmas_denganri . ' kali';
            })
            ->addColumn('pusekesmas_tanpari', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $pusekesmas_tanpari = $datakesehatan ? $datakesehatan->puskesmas_tanpari : '';

                return '' . $pusekesmas_tanpari . ' kali';
            })
            ->addColumn('puskesmas_pembantu', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $puskesmas_pembantu = $datakesehatan ? $datakesehatan->puskemas_pembantu : '';

                return '' . $puskesmas_pembantu . ' kali';
            })
            ->addColumn('poliklinik', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $poliklinik = $datakesehatan ? $datakesehatan->poliklinik : '';

                return '' . $poliklinik . ' kali';
            })
            ->addColumn('tempat_prakterkdr', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $tempat_prakterkdr = $datakesehatan ? $datakesehatan->tempat_praktekdr : '';

                return '' . $tempat_prakterkdr . ' kali';
            })
            ->addColumn('rumah_bersalin', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $rumah_bersalin = $datakesehatan ? $datakesehatan->rumah_bersalin : '';

                return '' . $rumah_bersalin . ' kali';
            })
            ->addColumn('tempat_praktek', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $tempat_praktek = $datakesehatan ? $datakesehatan->tempat_praktek : '';

                return '' . $tempat_praktek . ' kali';
            })
            ->addColumn('poskedes', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $poskedes = $datakesehatan ? $datakesehatan->poskesdes : '';

                return '' . $poskedes . ' kali';
            })
            ->addColumn('polindes', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $polindes = $datakesehatan ? $datakesehatan->polindes : '';

                return '' . $polindes . ' kali';
            })
            ->addColumn('apotik', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $apotik = $datakesehatan ? $datakesehatan->apotik : '';

                return '' . $apotik . ' kali';
            })
            ->addColumn('toko_obat', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $toko_obat = $datakesehatan ? $datakesehatan->toko_obat : '';

                return '' . $toko_obat . ' kali';
            })
            ->addColumn('posyandu', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $posyandu = $datakesehatan ? $datakesehatan->posyandu : '';

                return '' . $posyandu . ' kali';
            })
            ->addColumn('posbindu', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $posbindu = $datakesehatan ? $datakesehatan->posbindu : '';

                return '' . $posbindu . ' kali';
            })
            ->addColumn('tempat_praktikdb', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $tempat_praktikdb = $datakesehatan ? $datakesehatan->tempat_praktikdb : '';

                return '' . $tempat_praktikdb . ' kali';
            })
            ->addColumn('jamkes', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $jamkes = $datakesehatan ? $datakesehatan->jamkes : '';

                return '' . $jamkes . '';
            })
            ->addColumn('bayi', function ($row) {
                $datakesehatan = datakesehatan::where('nik', $row->nik)->first();
                $bayi = $datakesehatan ? $datakesehatan->bayiu16 : '';

                return '' . $bayi . '';
            })

            ->addColumn('disabilitas', function ($row) {
                $datadisabilitas = jenisdisabilitas::where('nik', $row->nik)->first();
                $kondisi = $datadisabilitas ? $datadisabilitas->jenis_disabilitas : '';

                return $kondisi;
            })

            ->addColumn('pendidikan_tertinggi', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->pendidikan_tertinggi : '';

                return $kondisi;
            })
            ->addColumn('berapa_tahunp', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->berapa_tahunp : '';

                return $kondisi;
            })
            ->addColumn('pendidikan_diikuti', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->pendidikan_diikuti : '';

                return $kondisi;
            })
            ->addColumn('bahasa_Rumah', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->bahasa_Rumah : '';

                return $kondisi;
            })
            ->addColumn('bahasa_Formal', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->bahasa_Formal : '';

                return $kondisi;
            })
            ->addColumn('jumlah_kerja1', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->jumlah_kerja1 : '';

                return $kondisi;
            })
            ->addColumn('skamling1', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->skamling1 : '';

                return $kondisi;
            })
            ->addColumn('pesta_rakyat1', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->pesta_rakyat1 : '';

                return $kondisi;
            })
            ->addColumn('frekuensiml', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->frekuensiml : '';

                return $kondisi;
            })
            ->addColumn('frekuensib', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->frekuensib : '';

                return $kondisi;
            })
            ->addColumn('frekuensimn', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->frekuensimn : '';

                return $kondisi;
            })
            ->addColumn('mendapatp1', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->mendapatp1 : '';

                return $kondisi;
            })
            ->addColumn('bagaiamanap', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->bagaiamanap : '';

                return $kondisi;
            })
            ->addColumn('pernahmasukan', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->pernahmasukan : '';

                return $kondisi;
            })
            ->addColumn('keterbukaands', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->keterbukaands : '';

                return $kondisi;
            })
            ->addColumn('bencana1', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->bencana1 : '';

                return $kondisi;
            })
            ->addColumn('apakahb', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->apakahb : '';

                return $kondisi;
            })
            ->addColumn('apakahd', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->apakahd : '';

                return $kondisi;
            })
            ->addColumn('apakahp', function ($row) {
                $datapekerjaan = sdgspendidikan::where('nik', $row->nik)->first();
                $kondisi = $datapekerjaan ? $datapekerjaan->apakahp : '';

                return $kondisi;
            })


            ->rawColumns([
                'action',
            ])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
        $datap = datapenduduk::where('nik', $nik)->first();
        $datai = dataindividu::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.individu.editdataindividu', compact('datap', 'datai', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredataindividuRequest $request)
    {
        // dd($request->all());
        $dataindividu = dataindividu::where('nik', $request->valNIK)->first();
        if ($dataindividu == NULL) {
            $dataindividu = new dataindividu();
        }
        $dataindividu->kk = $request->valKK;
        $dataindividu->nik = $request->valNIK;
        $dataindividu->nama = $request->valNama;
        $dataindividu->Jeniskelamin = $request->valJeniskelamin;
        $dataindividu->tempatlahir = $request->valTempatlahir;
        $dataindividu->Tanggallahir = $request->valTanggallahir;
        $dataindividu->usia = $request->valUsia;
        $dataindividu->status = $request->valStatus;
        $dataindividu->agama = $request->valAgama;
        $dataindividu->usia_saat_pertama_kali_menikah = $request->valUsiapertamamenikah;
        $dataindividu->suku_bangsa = $request->valSukubangsa;
        $dataindividu->warga_negarawarga_negara = $request->valWarganegara;
        $dataindividu->nohp = $request->valNohp;
        $dataindividu->nowa = $request->valNowa;
        $dataindividu->email = $request->valEmail;
        $dataindividu->facebook = $request->valFacebook;
        $dataindividu->twitter = $request->valTwitter;
        $dataindividu->instagram = $request->valInstagram;
        $dataindividu->save();

        return redirect()->route('individu.show', ['show' => $request->valNIK]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(dataindividu $dataindividu, $nik)
    {

        $datap = datapenduduk::where('nik', $nik)->first();
        $datai = dataindividu::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();

        return view('sdgs.individu.viewdataindividu', compact('datap', 'datai', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(dataindividu $request, $nik)
    {

        $datapenduduk = Dataindividu::where('nik', $nik)->first();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $pekerjaan = Pekerjaan::all();
        $goldar = Goldar::all();
        $status = Status::all();
        $dataindividu = Dataindividu::all();
        return view('sdgs.individu.editdataindividu', compact('datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'))->with([

            'valUsiapertamamenikah' =>  $dataindividu->usiapertamamenikah,
            'valSukubangsa' =>  $dataindividu->sukubangsa,
            'valWarganegara' =>  $dataindividu->warga_negara,
            'valNohp' =>  $dataindividu->nohp,
            'valNowa' =>  $dataindividu->nowa,
            'valEmail' =>  $dataindividu->email,
            'valFacebook' =>  $dataindividu->facebook,
            'valTwitter' =>  $dataindividu->twitter,
            'valInstagram' =>  $dataindividu->instagram,


        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedataindividuRequest $request, $nik)
    {
        $dataindividu = datapenduduk::where('nik', $nik)->first();
        $dataindividu->kk = $request->valKK;
        $dataindividu->nik = $request->valNIK;
        $dataindividu->nama = $request->valNama;
        $dataindividu->Jeniskelamin = $request->valJeniskelamin;
        $dataindividu->tempatlahir = $request->valconfirmTempatlahir;
        $dataindividu->Tanggallahir = $request->valTanggallahir;
        $dataindividu->usia = $request->valUsia;
        $dataindividu->status = $request->valStatus;
        $dataindividu->agama = $request->valagama;
        $dataindividu->usia_saat_pertama_kali_menikah = $request->valUsiapertamamenikah;
        $dataindividu->suku_bangsa = $request->valSukubangsa;
        $dataindividu->warga_negarawarga_negara = $request->valWarganegara;
        $dataindividu->nohp = $request->valNohp;
        $dataindividu->nowa = $request->valNowa;
        $dataindividu->email = $request->valEmail;
        $dataindividu->facebook = $request->valFacebook;
        $dataindividu->twitter = $request->valTwitter;
        $dataindividu->instagram = $request->valInstagram;
        $dataindividu->save();


        return redirect('datapenduduk')->with('msg', 'Data dengan nama data penduduk ' . $dataindividu->nama . ' Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
