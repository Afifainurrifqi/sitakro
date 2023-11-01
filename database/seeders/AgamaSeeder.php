<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agamas')->insert([
            [
                'nama' => 'islam',
            ],
            [
                'nama' => 'Kristen',
            ],
            [
                'nama' => 'Katolik',
            ],
            [
                'nama' => 'Hindu',
            ],
            [
                'nama' => 'Buddha',
            ],
            [
                'nama' => 'Khonghucu',
            ]]);
    }
}
