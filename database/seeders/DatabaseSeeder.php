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
        $this->call(ScheduleSeeder::class);
        $this->call(FileSeeder::class);
        $this->call(RegistrationSeeder::class);
        $this->call(RegistrationProcedureSeeder::class);
        $this->call(ClothingInstructionSeeder::class);
    }
}
