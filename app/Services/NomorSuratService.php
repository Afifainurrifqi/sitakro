<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use MongoDB\Operation\FindOneAndUpdate;

class NomorSuratService
{
    /**
     * Mapping prefix nomor per jenis surat.
     * Silakan ubah sesuai kebutuhanmu.
     */
    protected array $prefixMap = [
        'sktm'      => 475, // Surat Keterangan Tidak Mampu
        'spktp'     => 300, // Surat Pernyataan Tidak Bisa Melampirkan KTP Kematian
        'numpangkk' => 400, // Surat Pernyataan Numpang KK
        'alias'     => 410,
        'alias_ortu' => 411,
        'jaminan'    => 420,
        'kehilangan' => 430,
    ];

    /**
     * Section code per jenis (opsional).
     * Jika tidak didefinisikan, dipakai 'default'.
     */
    protected array $sectionMap = [
        'default'   => '409.41.2',
        // 'spktp'   => '409.41.9', // contoh jika ada perbedaan
        // 'numpangkk'=> '409.41.7',
    ];

    /**
     * Key dokumen counter di MongoDB: "{jenis}:{tahun}"
     */
    protected function key(string $jenis, int $tahun): string
    {
        return "{$jenis}:{$tahun}";
    }

    /**
     * Set seed (nilai awal) untuk counter per jenis & tahun.
     * Contoh: setSeedFor('spktp', 2025, 207, true)
     */
    public function setSeedFor(string $jenis, int $tahun, int $startAt, bool $force = false): void
    {
        if ($startAt < 1) {
            throw new \InvalidArgumentException('Start number minimal 1.');
        }

        $col = DB::connection('mongodb')->getMongoDB()->selectCollection('counters');
        $id  = $this->key($jenis, $tahun);
        $seq = $startAt - 1;

        $existing = $col->findOne(['_id' => $id]);
        if ($existing) {
            $current = (int)($existing['seq'] ?? 0);
            if ($current > $seq && !$force) {
                throw new \RuntimeException("Counter {$jenis} tahun {$tahun} sudah di {$current}. Gunakan force=true bila ingin menurunkan.");
            }
            $col->updateOne(
                ['_id' => $id],
                [['$set' => ['seq' => $seq, 'tahun' => $tahun, 'updated_at' => now()]]]
            );
        } else {
            $col->insertOne([
                '_id'        => $id,
                'tahun'      => $tahun,
                'seq'        => $seq,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Ambil nomor urut berikutnya secara atomic untuk {jenis, tahun}.
     */
    public function nextFor(string $jenis, int $tahun): int
    {
        $col = DB::connection('mongodb')->getMongoDB()->selectCollection('counters');

        $doc = $col->findOneAndUpdate(
            ['_id' => $this->key($jenis, $tahun)],
            [
                '$inc' => ['seq' => 1],
                '$set' => ['updated_at' => now()],
            ],
            [
                'upsert' => true,
                'returnDocument' => FindOneAndUpdate::RETURN_DOCUMENT_AFTER,
            ]
        );

        return (int)($doc['seq'] ?? 1);
    }

    /**
     * Format nomor untuk jenis tertentu.
     * Contoh hasil: "475 / 001 / 409.41.2 / 2025"
     */
    public function formatForJenis(string $jenis, int $urut, int $tahun): string
    {
        $prefix  = $this->prefixMap[$jenis] ?? $this->prefixMap['sktm'] ?? 475;
        $section = $this->sectionMap[$jenis] ?? $this->sectionMap['default'] ?? '409.41.2';
        $nnn     = str_pad((string)$urut, 3, '0', STR_PAD_LEFT);

        return "{$prefix} / {$nnn} / {$section} / {$tahun}";
    }

    /**
     * Helper ringkas: langsung issue nomor (ambil urut + format) untuk jenis & tahun.
     * Return: ['urut' => int, 'tahun' => int, 'nomor_surat' => string]
     */
    public function issue(string $jenis, ?int $tahun = null): array
    {
        $tahun = $tahun ?? now('Asia/Jakarta')->year;
        $urut  = $this->nextFor($jenis, $tahun);

        return [
            'urut'        => $urut,
            'tahun'       => $tahun,
            'nomor_surat' => $this->formatForJenis($jenis, $urut, $tahun),
        ];
    }

    /* ======================
     *  API Lama (back-compat)
     *  ====================== */

    /**
     * Back-compat: set seed untuk SKTM.
     */
    public function setSeed(int $tahun, int $startAt, bool $force = false): void
    {
        $this->setSeedFor('sktm', $tahun, $startAt, $force);
    }

    /**
     * Back-compat: ambil urut untuk SKTM.
     */
    public function next(int $tahun): int
    {
        return $this->nextFor('sktm', $tahun);
    }

    /**
     * Back-compat: format untuk SKTM.
     */
    public function format(int $urut, int $tahun): string
    {
        return $this->formatForJenis('sktm', $urut, $tahun);
    }

    /* ======================
     *  (Opsional) Setter dinamis
     *  ====================== */

    /**
     * (Opsional) Set/override prefix untuk jenis tertentu saat runtime.
     */
    public function setPrefix(string $jenis, int $prefix): void
    {
        $this->prefixMap[$jenis] = $prefix;
    }

    /**
     * (Opsional) Set/override section code untuk jenis tertentu saat runtime.
     */
    public function setSection(string $jenis, string $section): void
    {
        $this->sectionMap[$jenis] = $section;
    }
}
