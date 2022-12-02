<?php

namespace Database\Seeders;

use App\Models\RegistrationProcedure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class RegistrationProcedureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RegistrationProcedure::create([
            "filename" => UploadedFile::fake()->create(Str::random(40) . '.pdf'),
        ]);
    }
}
