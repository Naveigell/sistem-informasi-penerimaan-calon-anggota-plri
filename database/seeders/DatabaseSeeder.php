<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PoldaSeeder::class);
        $this->call(PolresSeeder::class);
        $this->call(CandidateSeeder::class);
        $this->call(UserSeeder::class);
    }
}
