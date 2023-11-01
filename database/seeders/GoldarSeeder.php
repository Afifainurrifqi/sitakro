<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GoldarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goldars')->insert([
            [
                'nama' => 'Tidak Tahu',
            ],
            [
                'nama' => 'A',
            ],
            [
                'nama' => 'A+',
            ],
            [
                'nama' => 'A-',
            ],
            [
                'nama' => 'B',
            ],
            [
                'nama' => 'B+',
            ],
         [
                'nama' => 'B-',
            ],
   [
                'nama' => 'O',
            ],
   [
                'nama' => 'O-',
            ],
 [
                'nama' => 'O+',
            ],
 [
                'nama' => 'AB',
            ],
 [
                'nama' => 'AB+',
            ],
 [
                'nama' => 'AB-',
            ]
            ]);
    }
}