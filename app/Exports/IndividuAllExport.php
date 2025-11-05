<?php

namespace App\Exports;

use App\Models\datapenduduk;
use App\Models\dataindividu;
use App\Models\datakesehatan;
use App\Models\datapekerjaansdgs;
use App\Models\jenisdisabilitas;
use App\Models\penghasilan;
use App\Models\sdgspendidikan;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomChunkSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class IndividuAllExport extends DefaultValueBinder implements
    FromQuery,
    WithHeadings,
    WithMapping,
    ShouldAutoSize,
    WithCustomChunkSize,
    WithColumnFormatting,
    WithCustomValueBinder
{
    /**
     * Ambil seluruh data (sesuai filter di JSON Anda).
     * Gunakan eager load relasi yang sering dipakai.
     */
    public function query()
    {
        return datapenduduk::query()
            ->with(['kk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'detailkk.kk'])
            ->whereIn('Datak', ['tetap', 'tidaktetap']);
    }

    /**
     * Header kolom Excel.
     */
    public function headings(): array
    {
        return [
            'NO KK',
            'NIK',
            'Nama',
            'Gelar Awal',
            'Gelar Akhir',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Usia (th)',
            'Status',
            'Usia 1st Menikah',
            'Agama',
            'Suku Bangsa',
            'Warga Negara',
            'No HP',
            'No WA',
            'Email',
            'Facebook',
            'Twitter',
            'Instagram',
            // PEKERJAAN
            'Kondisi Pekerjaan',
            'Pekerjaan Utama',
            'Jamsos Ketenagakerjaan',
            'Penghasilan Setahun Terakhir (format)',
            // PENGHASILAN
            'Sumber Penghasilan',
            'Jumlah Aset',
            'Satuan',
            'Penghasilan Setahun',
            'Di Ekspor',
            // KESEHATAN
            'Penyakit Setahun Terakhir',
            'Rumah Sakit (x)',
            'RS Bersalin (x)',
            'Puskesmas dgn RI (x)',
            'Puskesmas tnp RI (x)',
            'Puskesmas Pembantu (x)',
            'Poliklinik (x)',
            'Tempat Praktek Dokter (x)',
            'Rumah Bersalin (x)',
            'Tempat Praktek Bidan (x)',
            'Poskesdes (x)',
            'Polindes (x)',
            'Apotik (x)',
            'Toko Obat/Jamu (x)',
            'Posyandu (x)',
            'Posbindu (x)',
            'Tempat Praktik Dukun Bayi (x)',
            'Jamkes',
            'Bayi 1-6 bln ASI',
            // PENDIDIKAN / SOSIAL
            'Jenis Disabilitas',
            'Pendidikan Tertinggi',
            'Berapa Tahun Pendidikan Dasar',
            'Pendidikan Sedang Diikuti',
            'Bahasa di Rumah',
            'Bahasa di Lembaga Formal',
            'Kerja Bakti (x/th)',
            'Siskamling (x/th)',
            'Pesta Rakyat (x/th)',
            'Frekuensi Melayat (x/th)',
            'Frekuensi Besuk (x/th)',
            'Frekuensi Menolong Kecelakaan (x/th)',
            'Dapat Pelayanan Desa (th ini)',
            'Kualitas Pelayanan Desa',
            'Pernah Sampaikan Masukan',
            'Keterbukaan Desa',
            'Terjadi Bencana (th ini)',
            'Terkena Dampak Bencana',
            'Terima Kebutuhan Dasar',
            'Ada Penanganan Psikososial',
        ];
    }

    /**
     * Format kolom di Excel — A & B wajib TEXT.
     */
    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT, // NO KK
            'B' => NumberFormat::FORMAT_TEXT, // NIK
        ];
    }

    /**
     * Paksa nilai kolom A & B jadi TEXT, dan juga angka >=12 digit jadi TEXT.
     */
    public function bindValue(Cell $cell, $value)
    {
        if (in_array($cell->getColumn(), ['A', 'B'])) {
            $cell->setValueExplicit((string) $value, DataType::TYPE_STRING);
            return true;
        }
        if (is_numeric($value) && strlen((string) $value) >= 12) {
            $cell->setValueExplicit((string) $value, DataType::TYPE_STRING);
            return true;
        }
        return parent::bindValue($cell, $value);
    }

    /**
     * Mapping 1 baris ke array kolom.
     * (Ambil data tambahan by NIK; nantinya bisa dioptimasi via relasi hasOne 'by nik')
     */
    public function map($row): array
    {
        $individu    = dataindividu::where('nik', $row->nik)->first();
        $kesehatan   = datakesehatan::where('nik', $row->nik)->first();
        $pekerjaan   = datapekerjaansdgs::where('nik', $row->nik)->first();
        $penghasilan = penghasilan::where('nik', $row->nik)->first();
        $disabil     = jenisdisabilitas::where('nik', $row->nik)->first();
        $didik       = sdgspendidikan::where('nik', $row->nik)->first();

        $jkMap = ['1' => 'Laki-laki', '2' => 'Perempuan'];
        $jk    = $jkMap[(string)($row->Jeniskelamin ?? $row->jenis_kelamin ?? '')] ?? ($row->Jeniskelamin ?? $row->jenis_kelamin ?? '');

        $usia = '';
        $tglLahir = $row->Tanggallahir ?? $row->tanggal_lahir ?? null;
        if ($tglLahir) $usia = Carbon::parse($tglLahir)->age;

        $penyakitSetahun = $kesehatan && $kesehatan->penyakitsetahun
            ? implode(', ', array_map('trim', explode(',', $kesehatan->penyakitsetahun)))
            : '';

        // CAST ke string agar aman
        $noKk = (string) (optional(optional($row->detailkk)->kk)->nokk ?? '');
        $nik  = (string) ($row->nik ?? '');

        return [
            // A - B: TEXT
            $noKk,
            $nik,

            $row->nama ?? '',
            $individu->gelarawal ?? '',
            $individu->gelarakhir ?? '',
            $jk,
            $row->tempatlahir ?? $row->tempat_lahir ?? '',
            $tglLahir ?? '',
            $usia,
            optional($row->status)->nama ?? '',
            $individu->usia_saat_pertama_kali_menikah ?? '',
            optional($row->agama)->nama ?? '',
            $individu->suku_bangsa ?? '',
            $individu->warga_negarawarga_negara ?? '',
            $individu->nohp ?? '',
            $individu->nowa ?? '',
            $individu->email ?? '',
            $individu->facebook ?? '',
            $individu->twitter ?? '',
            $individu->instagram ?? '',

            // PEKERJAAN
            $pekerjaan->kondisi_pekerjaan ?? '',
            $pekerjaan->pekerjaan_utama ?? '',
            $pekerjaan->jaminan_sosial_ketenagakerjaan ?? '',
            isset($pekerjaan->penghasilan_setahun_terakhir)
                ? 'Rp ' . number_format($pekerjaan->penghasilan_setahun_terakhir, 0, ',', '.')
                : '',

            // PENGHASILAN
            $penghasilan->sumber_penghasilan ?? '',
            $penghasilan->jumlah_asset_darip ?? '',
            $penghasilan->satuan ?? '',
            $penghasilan->penghasilan_setahun ?? '',
            $penghasilan->expor ?? '',

            // KESEHATAN
            $penyakitSetahun,
            $kesehatan->rumah_sakit  ?? '',
            $kesehatan->rumah_sakitb ?? '',
            $kesehatan->puskesmas_denganri ?? '',
            $kesehatan->puskesmas_tanpari ?? '',
            $kesehatan->puskemas_pembantu ?? '',
            $kesehatan->poliklinik ?? '',
            $kesehatan->tempat_praktekdr ?? '',
            $kesehatan->rumah_bersalin ?? '',
            $kesehatan->tempat_praktek ?? '',
            $kesehatan->poskesdes ?? '',
            $kesehatan->polindes ?? '',
            $kesehatan->apotik ?? '',
            $kesehatan->toko_obat ?? '',
            $kesehatan->posyandu ?? '',
            $kesehatan->posbindu ?? '',
            $kesehatan->tempat_praktikdb ?? '',
            $kesehatan->jamkes ?? '',
            $kesehatan->bayiu16 ?? '',

            // PENDIDIKAN / SOSIAL
            $disabil->jenis_disabilitas ?? '',
            $didik->pendidikan_tertinggi ?? '',
            $didik->berapa_tahunp ?? '',
            $didik->pendidikan_diikuti ?? '',
            $didik->bahasa_Rumah ?? '',
            $didik->bahasa_Formal ?? '',
            $didik->jumlah_kerja1 ?? '',
            $didik->skamling1 ?? '',
            $didik->pesta_rakyat1 ?? '',
            $didik->frekuensiml ?? '',
            $didik->frekuensib ?? '',
            $didik->frekuensimn ?? '',
            $didik->mendapatp1 ?? '',
            $didik->bagaiamanap ?? '',
            $didik->pernahmasukan ?? '',
            $didik->keterbukaands ?? '',
            $didik->bencana1 ?? '',
            $didik->apakahb ?? '',
            $didik->apakahd ?? '',
            $didik->apakahp ?? '',
        ];
    }

    /**
     * Chunk export agar aman untuk data besar.
     */
    public function chunkSize(): int
    {
        return 1000;
    }
}
