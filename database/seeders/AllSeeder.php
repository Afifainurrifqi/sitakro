<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PendidikanSeeder::class);
        $this->call(PekerjaanSeeder::class);
        $this->call(AgamaSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(DummySeeder::class);
        $this->call(GoldarSeeder::class);
    }
}
