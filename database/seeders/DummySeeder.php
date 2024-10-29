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
                'nik'=>"",
                'name'=>"Mas Admin",
                'email'=> 'admin@gmail.com',
                'role'=> 'admin',
                'password'=>bcrypt('123456')
            ],
            [
                'nik'=>"",
                'name'=>"Mas Operator",
                'email'=> 'operator@gmail.com',
                'role'=> 'operator',
                'password'=>bcrypt('123456')
            ],
            [
                'nik'=>"",
                'name'=>"Mas Dasawisma",
                'email'=> 'dasawisma@gmail.com',
                'role'=> 'dasawisma',
                'password'=>bcrypt('123456')
            ],
            [
                'nik'=>"",
                'name'=>"Demo User",
                'email'=> 'demo@gmail.com',
                'role'=> 'akundemo',
                'password'=>bcrypt('123456')
            ],
            [
                'nik'=>"",
                'name'=>"Wahyus",
                'email'=> 'wahyu123@gmail.com',
                'role'=> 'dasawisma',
                'password'=>bcrypt('123456')
            ],
        ];

        foreach($userData as $key => $val){
            // Pastikan user tidak duplikat berdasarkan email
            if (!User::where('email', $val['email'])->exists()) {
                User::create($val);
            } else {
                echo "User with email " . $val['email'] . " already exists! Skipping...\n";
            }
        }
    }
}
