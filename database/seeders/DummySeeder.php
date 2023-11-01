<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name'=>"Mas Admin",
                'email'=> 'admin@gmail.com',
                'role'=> 'admin',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>"Mas Operator",
                'email'=> 'operator@gmail.com',
                'role'=> 'operator',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>"Mas Dasawisma",
                'email'=> 'dasawisma@gmail.com',
                'role'=> 'dasawisma',
                'password'=>bcrypt('123456')
            ],

        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
