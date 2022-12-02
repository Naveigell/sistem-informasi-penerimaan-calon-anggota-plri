<?php

namespace Database\Seeders;

use App\Models\Registration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registrations = array_keys(
            config('static.candidate_type_enums')
        );

        foreach ($registrations as $registration) {
            Registration::create([
                "name"      => $registration,
                "is_active" => 1,
            ]);
        }
    }
}
