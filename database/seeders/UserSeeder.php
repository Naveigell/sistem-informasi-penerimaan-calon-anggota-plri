<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\CandidateParent;
use App\Models\Education;
use App\Models\Polda;
use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = fake('id_ID');

        User::create([
            "name"     => $faker->name,
            "email"    => "admin@gmail.com",
            "password" => 123456,
            "role"     => "admin",
        ]);
    }
}
