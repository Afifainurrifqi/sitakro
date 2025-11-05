<?php

namespace App\Exports;

use App\Models\datapenduduk;
use App\Models\lokasipemukiman;
use App\Models\dataindividu;
use App\Models\akses_pendidikan;
use App\Models\akseskesehatan;
use App\Models\aksessarpras;
use App\Models\aksestenagakerja;
use App\Models\laink;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class LokasidanPemukimanExport extends DefaultValueBinder implements
    FromQuery, WithHeadings, WithMapping, ShouldAutoSize,
    WithColumnFormatting, WithCustomValueBinder
{
    public function __construct(protected ?string $filterNik = null) {}

    public function query()
    {
        $allowed = ['tetap','tidaktetap'];

        $q = datapenduduk::query()
            ->with(['detailkk.kk'])
            ->whereIn('Datak',$allowed);

        if ($this->filterNik) {
            $q->where('nik',$this->filterNik);
        }

        return $q;
    }

    public function headings(): array
    {
        return [
            'NO KK','NIK','NAMA','ALAMAT','NO. HP','NO. Telpon Rumah',
            'NIK Kepala Keluarga','TEMPAT TINGGAL YANG DITEMPATI','STATUS LAHAN',
            'LUAS LANTAI TEMPAT TINGGAL (m2)','LUAS TANAH TEMPAT TINGGAL (m2)',
            'JENIS LANTAI TEMPAT TINGGAL TERLUAS','DINDING SEBAGIAN BESAR RUMAH',
            'JENDELA','ATAP','PENERANGAN RUMAH','ENERGI UNTUK MEMASAK',
            'JIKA MENGGUNAKAN KAYU BAKAR, SUMBER KAYU BAKAR','TEMPAT PEMBUANGAN SAMPAH',
            'FASILITAS MCK','SUMBER AIR MANDI TERBANYAK DARI','FASILITAS BUANG AIR BESAR',
            'SUMBER AIR MINUM TERBANYAK','TEMPAT PEMBUANGAN AIR LIMBAH',
            'RUMAH DILEWATI SUTET','RUMAH DIPANTARAN SUNGAI','RUMAH DI LERENG GUNUNG / BUKIT',
            'KONDISI RUMAH KUMUH / TIDAK',
            // Contoh blok akses PAUD (sisanya tinggal ikuti pola ini bila diperlukan):
            'PAUD - JARAK (KM)','PAUD - WAKTU (JAM)','PAUD - KEMUDAHAN',
        ];
    }

    public function columnFormats(): array
    {
        // A & B dipaksa TEXT (NO KK & NIK). Nomor telp juga sering panjang → TEXT.
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_TEXT, // NO. HP
            'F' => NumberFormat::FORMAT_TEXT, // NO. Telpon Rumah
            'G' => NumberFormat::FORMAT_TEXT, // NIK Kepala Keluarga
        ];
    }

    // Pastikan kolom tertentu & angka panjang jadi teks
    public function bindValue(Cell $cell, $value)
    {
        if (in_array($cell->getColumn(), ['A','B','E','F','G'])) {
            $cell->setValueExplicit((string)$value, DataType::TYPE_STRING);
            return true;
        }
        if (is_numeric($value) && strlen((string)$value) >= 12) {
            $cell->setValueExplicit((string)$value, DataType::TYPE_STRING);
            return true;
        }
        return parent::bindValue($cell, $value);
    }

    public function map($row): array
    {
        $kk = optional(optional($row->detailkk)->kk)->nokk ?? '';

        $lok   = lokasipemukiman::where('nik',$row->nik)->first();
        $ind   = dataindividu::where('nik',$row->nik)->first();
        $pend  = akses_pendidikan::where('nik',$row->nik)->first();
        $kes   = akseskesehatan::where('nik',$row->nik)->first();

        return [
            (string)$kk,
            (string)$row->nik,
            $row->nama ?? ($lok->nama ?? ''),
            $lok->alamat ?? '',
            (string)($lok->nohp ?? $ind->nohp ?? ''),
            (string)($lok->nowa ?? ''),
            (string)($lok->nik_kepala ?? ''),
            $lok->tempat_tinggal ?? '',
            $lok->status_lahan ?? '',
            $lok->luas_lantai_tinggal ?? '',
            $lok->luas_tanah_tinggal ?? '',
            $lok->jenis_lantai_tinggal ?? '',
            $lok->dinding_sebagian ?? '',
            $lok->jendela ?? '',
            $lok->atap ?? '',
            $lok->penerangan ?? '',
            $lok->energi_masak ?? '',
            $lok->jika_kayu_jenis ?? '',
            $lok->tempat_sampah ?? '',
            $lok->mck ?? '',
            $lok->sumber_air_mandi ?? '',
            $lok->sumber_air_mck ?? '',
            $lok->sumber_air_minum ?? '',
            $lok->tempat_pembuangan_limbah ?? '',
            $lok->rumah_sutet ?? '',
            $lok->rumah_sungai ?? '',
            $lok->rumah_lereng_gunung ?? '',
            $lok->kondi_rumah_kumuh ?? '',
            // PAUD (contoh 3 kolom awal akses pendidikan)
            $pend->jaraktempuh_paud ?? '',
            $pend->waktutempuh_paud ?? '',
            $pend->kemudahan_paud ?? '',
        ];
    }
}
