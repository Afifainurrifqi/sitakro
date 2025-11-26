<?php

namespace App\Imports;

use App\Models\dataindividu;
use App\Models\Datapekerjaansdgs;
use App\Models\Penghasilan;
use App\Models\Datakesehatan;
use App\Models\Jenisdisabilitas;
use App\Models\Sdgspendidikan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class IndividuImport implements ToCollection, WithChunkReading
{
    /**
     * SUSUNAN KOLOM (index mulai 0)
     *  0: KK
     *  1: NIK
     *  2: Gelar Awal
     *  3: Nama
     *  4: Gelar Akhir
     *  5: Jenis Kelamin   (disimpan ke: Jeniskelamin)
     *  6: Tempat Lahir    (disimpan ke: tempatlahir)
     *
     *  Mulai index 7 ke atas = kolom-kolom SDGs.
     */

    // ❗JANGAN pakai "private array $idx" kalau PHP di hosting masih < 7.4
    protected $idx = [
        // dataindividu
        'usia_saat_pertama_kali_menikah' => 12,
        'suku_bangsa'                    => 14,
        'warga_negarawarga_negara'      => 15,
        'nohp'                           => 16,
        'nowa'                           => 17,
        'email'                          => 18,
        'facebook'                       => 19,
        'twitter'                        => 20,
        'instagram'                      => 21,

        // datapekerjaansdgs
        'kondisi_pekerjaan'              => 22,
        'pekerjaan_utama'                => 23,
        'jaminan_sosial_ketenagakerjaan' => 24,
        'penghasilan_setahun_terakhir'   => 25,

        // penghasilan
        'sumber_penghasilan'             => 26,
        'jumlah_asset_darip'             => 27,
        'satuan'                         => 28,
        'penghasilan_setahun'            => 29,
        'expor'                          => 30,

        // datakesehatan
        'penyakitsetahun'                => 31,
        'rumah_sakit'                    => 32,
        'rumah_sakitb'                   => 33,
        'puskesmas_denganri'             => 34,
        'puskesmas_tanpari'              => 35,
        'puskemas_pembantu'              => 36,
        'poliklinik'                     => 37,
        'tempat_praktekdr'               => 38,
        'rumah_bersalin'                 => 39,
        'tempat_praktek'                 => 40,
        'poskesdes'                      => 41,
        'polindes'                       => 42,
        'apotik'                         => 43,
        'toko_obat'                      => 44,
        'posyandu'                       => 45,
        'posbindu'                       => 46,
        'tempat_praktikdb'               => 47,
        'jamkes'                         => 48,
        'bayiu16'                        => 49,

        // jenisdisabilitas
        'jenis_disabilitas'              => 50,

        // sdgspendidikan
        'pendidikan_tertinggi'           => 51,
        'berapa_tahunp'                  => 52,
        'pendidikan_diikuti'             => 53,
        'bahasa_Rumah'                   => 54,
        'bahasa_Formal'                  => 55,
        'jumlah_kerja1'                  => 56,
        'skamling1'                      => 57,
        'pesta_rakyat1'                  => 58,
        'frekuensiml'                    => 59,
        'frekuensib'                     => 60,
        'frekuensimn'                    => 61,
        'mendapatp1'                     => 62,
        'bagaiamanap'                    => 63,
        'pernahmasukan'                  => 64,
        'keterbukaands'                  => 65,
        'bencana1'                       => 66,
        'apakahb'                        => 67,
        'apakahd'                        => 68,
        'apakahp'                        => 69,
    ];

    /**
     * Flag untuk skip header hanya di chunk pertama
     */
    protected $skipHeader = true;

    /**
     * Dipanggil per chunk (bukan seluruh file sekaligus).
     */
    public function collection(Collection $rows)
    {
        // Kalau ini chunk pertama, buang header baris pertama
        if ($this->skipHeader) {
            $rows = $rows->skip(1);
            $this->skipHeader = false;
        }

        $rows->each(function ($row) {
            // ------ KOLOM UMUM 1–7 ------
            $kk           = $this->asString($row[0] ?? null);
            $nik          = $this->asString($row[1] ?? null);
            $gelarAwal    = $this->asString($row[2] ?? null);
            $nama         = $this->asString($row[3] ?? null);
            $gelarAkhir   = $this->asString($row[4] ?? null);
            $jenisKelamin = $this->asString($row[5] ?? null); // ke: Jeniskelamin
            $tempatLahir  = $this->asString($row[6] ?? null); // ke: tempatlahir

            if (!$nik) {
                // NIK wajib, kalau kosong skip baris
                return;
            }

            $namaFull = trim(implode(' ', array_filter([$gelarAwal, $nama, $gelarAkhir])));

            // =========================
            // 1) dataindividu
            // =========================
            $mInd = Dataindividu::firstOrNew(['nik' => $nik]);
            $mInd->kk           = $kk;
            $mInd->nik          = $nik;
            $mInd->gelarawal    = $gelarAwal;
            $mInd->nama         = $nama ?: $namaFull;
            $mInd->gelarakhir   = $gelarAkhir;
            $mInd->Jeniskelamin = $jenisKelamin;
            $mInd->tempatlahir  = $tempatLahir;

            $mInd->usia_saat_pertama_kali_menikah = $this->colString($row, 'usia_saat_pertama_kali_menikah');
            $mInd->suku_bangsa                    = $this->colString($row, 'suku_bangsa');
            $mInd->warga_negarawarga_negara       = $this->colString($row, 'warga_negarawarga_negara');
            $mInd->nohp                           = $this->colString($row, 'nohp');
            $mInd->nowa                           = $this->colString($row, 'nowa');
            $mInd->email                          = $this->colString($row, 'email');
            $mInd->facebook                       = $this->colString($row, 'facebook');
            $mInd->twitter                        = $this->colString($row, 'twitter');
            $mInd->instagram                      = $this->colString($row, 'instagram');
            $mInd->save();

            // =========================
            // 2) datapekerjaansdgs
            // =========================
            $mPk = Datapekerjaansdgs::firstOrNew(['nik' => $nik]);
            $mPk->kk           = $kk;
            $mPk->nik          = $nik;
            $mPk->gelarawal    = $gelarAwal;
            $mPk->nama         = $nama ?: $namaFull;
            $mPk->gelarakhir   = $gelarAkhir;
            $mPk->Jeniskelamin = $jenisKelamin;
            $mPk->tempatlahir  = $tempatLahir;

            $mPk->kondisi_pekerjaan              = $this->colString($row, 'kondisi_pekerjaan');
            $mPk->pekerjaan_utama                = $this->colString($row, 'pekerjaan_utama');
            $mPk->jaminan_sosial_ketenagakerjaan = $this->colString($row, 'jaminan_sosial_ketenagakerjaan');
            $mPk->penghasilan_setahun_terakhir   = $this->colInt($row, 'penghasilan_setahun_terakhir');
            $mPk->save();

            // =========================
            // 3) penghasilan
            // =========================
            $mPh = Penghasilan::firstOrNew(['nik' => $nik]);
            $mPh->kk           = $kk;
            $mPh->nik          = $nik;
            $mPh->gelarawal    = $gelarAwal;
            $mPh->nama         = $nama ?: $namaFull;
            $mPh->gelarakhir   = $gelarAkhir;
            $mPh->Jeniskelamin = $jenisKelamin;
            $mPh->tempatlahir  = $tempatLahir;

            $mPh->sumber_penghasilan  = $this->colString($row, 'sumber_penghasilan');
            $mPh->jumlah_asset_darip  = $this->colString($row, 'jumlah_asset_darip');
            $mPh->satuan              = $this->colString($row, 'satuan');
            $mPh->penghasilan_setahun = $this->colInt($row, 'penghasilan_setahun');
            $mPh->expor               = $this->colString($row, 'expor');
            $mPh->save();

            // =========================
            // 4) datakesehatan
            // =========================
            $mKs = Datakesehatan::firstOrNew(['nik' => $nik]);
            $mKs->kk           = $kk;
            $mKs->nik          = $nik;
            $mKs->gelarawal    = $gelarAwal;
            $mKs->nama         = $nama ?: $namaFull;
            $mKs->gelarakhir   = $gelarAkhir;
            $mKs->Jeniskelamin = $jenisKelamin;
            $mKs->tempatlahir  = $tempatLahir;

            foreach ([
                'penyakitsetahun','rumah_sakit','rumah_sakitb','puskesmas_denganri','puskesmas_tanpari',
                'puskemas_pembantu','poliklinik','tempat_praktekdr','rumah_bersalin','tempat_praktek',
                'poskesdes','polindes','apotik','toko_obat','posyandu','posbindu','tempat_praktikdb',
                'jamkes','bayiu16'
            ] as $k) {
                $mKs->{$k} = $this->colString($row, $k);
            }
            $mKs->save();

            // =========================
            // 5) jenisdisabilitas
            // =========================
            $mDs = Jenisdisabilitas::firstOrNew(['nik' => $nik]);
            $mDs->kk           = $kk;
            $mDs->nik          = $nik;
            $mDs->gelarawal    = $gelarAwal;
            $mDs->nama         = $nama ?: $namaFull;
            $mDs->gelarakhir   = $gelarAkhir;
            $mDs->Jeniskelamin = $jenisKelamin;
            $mDs->tempatlahir  = $tempatLahir;

            $mDs->jenis_disabilitas = $this->colString($row, 'jenis_disabilitas');
            $mDs->save();

            // =========================
            // 6) sdgspendidikan
            // =========================
            $mPd = Sdgspendidikan::firstOrNew(['nik' => $nik]);
            $mPd->kk           = $kk;
            $mPd->nik          = $nik;
            $mPd->gelarawal    = $gelarAwal;
            $mPd->nama         = $nama ?: $namaFull;
            $mPd->gelarakhir   = $gelarAkhir;
            $mPd->Jeniskelamin = $jenisKelamin;
            $mPd->tempatlahir  = $tempatLahir;

            foreach ([
                'pendidikan_tertinggi','berapa_tahunp','pendidikan_diikuti','bahasa_Rumah','bahasa_Formal',
                'jumlah_kerja1','skamling1','pesta_rakyat1','frekuensiml','frekuensib','frekuensimn',
                'mendapatp1','bagaiamanap','pernahmasukan','keterbukaands','bencana1','apakahb','apakahd','apakahp'
            ] as $k) {
                $mPd->{$k} = $this->colString($row, $k);
            }
            $mPd->save();
        });
    }

    /**
     * Ukuran chunk (berapa baris diproses sekali jalan).
     * Silakan sesuaikan: 200 / 500 / 1000
     */
    public function chunkSize(): int
    {
        return 500;
    }

    // ---------------- Helpers ----------------

    private function asString($val): ?string
    {
        if ($val === null) {
            return null;
        }
        return trim((string) $val);
    }

    private function colString($row, string $key): ?string
    {
        $i = $this->idx[$key] ?? null;
        if ($i === null) {
            return null;
        }
        return $this->asString($row[$i] ?? null);
    }

    private function colInt($row, string $key): ?int
    {
        $i = $this->idx[$key] ?? null;
        if ($i === null) {
            return null;
        }

        $val = $row[$i] ?? null;
        if ($val === null || $val === '') {
            return null;
        }

        if (is_string($val)) {
            $val = str_replace(['.', ',', ' '], '', $val);
        }

        return (int) $val;
    }
}
