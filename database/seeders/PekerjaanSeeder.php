<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pekerjaans')->insert([
            [
                'nama' => 'BELUM/TIDAK BEKERJA',
            ],
            [
                'nama' => 'PELAJAR/MAHASISWA',
            ],
            [
                'nama' => 'TIDAK/BELUM SEKOLAH',
            ],
            [
                'nama' => 'KARYAWAN SWASTA',
            ],
            [
                'nama' => 'IBU RUMAH TANGGA',
            ],
            [
                'nama' => 'WIRASWASTA',
            ],
         [
                'nama' => 'TENTARA NASIONAL INDONESIA (TNI)',
            ],
   [
                'nama' => 'KEPOLISIAN RI (POLRI)',
            ],
   [
                'nama' => 'DOSEN',
            ],
   [
                'nama' => 'GURU',
            ],
   [
                'nama' => 'Guru agama',
            ],
   [
                'nama' => 'KEPALA DESA',
            ],
   [
                'nama' => 'PERANGKAT DESA',
            ],
   [
                'nama' => 'Pegawai Kantor Desa',
            ],
   [
                'nama' => 'BIDAN',
            ],
   [
                'nama' => 'DOKTER',
            ],
   [
                'nama' => 'PERAWAT',
            ],
            [
                'nama' => 'PETANI/PEKEBUN PEMILIK LAHAN',
            ],
            [
                'nama' => 'BURUH TANI/PERKEBUNAN',
            ],
            [
                'nama' => 'PEDAGANG',
            ],
            [
                'nama' => 'PEGAWAI NEGERI SIPIL (PNS)',
            ],
            [
                'nama' => 'BURUH HARIAN LEPAS',
            ],
            [
                'nama' => 'SOPIR',
            ],
            [
                'nama' => 'KARYAWAN BUMN',
            ],
            [
                'nama' => 'PENSIUNAN',
            ],
   [
                'nama' => 'PEMBANTU RUMAH TANGGA',
            ],
   [
                'nama' => 'BURUH PETERNAKAN',
            ],
   [
                'nama' => 'KONSTRUKSI',
            ],
   [
                'nama' => 'PELAUT',
            ],
   [
                'nama' => 'NELAYAN/PERIKANAN',
            ],
   [
                'nama' => 'KARYAWAN HONORER',
            ],
   [
                'nama' => 'PETERNAK',
            ],
   [
                'nama' => 'MEKANIK',
            ],
   [
                'nama' => 'PENATA RIAS',
            ],
   [
                'nama' => 'TUKANG LAS/PANDAI BESI',
            ],
   [
                'nama' => 'INDUSTRI',
            ],
   [
                'nama' => 'USTADZ/MUBALIGH',
            ],
   [
                'nama' => 'TABIB',
            ],
   [
                'nama' => 'BURUH NELAYAN/PERIKANAN',
            ],
   [
                'nama' => 'JURU MASAK',
            ],
   [
                'nama' => 'SENIMAN',
            ],
   [
                'nama' => 'AKUNTAN',
            ],
   [
                'nama' => 'Petani/Pekebun penyewa',
            ],
            [
                'nama' => 'TKI',
            ],
            [
                'nama' => 'Lainnya',
            ]]);
    }
}

