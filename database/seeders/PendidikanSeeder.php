<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pendidikans')->insert([
            [
                'nama' => 'TIDAK/BLM SEKOLAH',
            ],
            [
                'nama' => 'BELUM TAMAT SD/SEDERAJAT',
            ],
            [
                'nama' => 'TAMAT SD/SEDERAJAT',
            ],
            [
                'nama' => 'SLTP/SEDERAJAT',
            ],
            [
                'nama' => 'SLTA/SEDERAJAT',
            ],
            [
                'nama' => 'DIPLOMA I/II',
            ],
            [
                'nama' => 'AKADEMI/DIPLOMA III/SARJANA MUDA',
            ],
            [
                'nama' => 'DIPLOMA IV/STRATA I',
            ],
            [
                'nama' => 'STRATA-II',
            ],
            [
                'nama' => 'STRATA-III',
            ]]);
    }
}
