<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\CandidateParent;
use App\Models\Education;
use App\Models\Polda;
use App\Models\Polres;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = fake('id_ID');
        $poldas = Polda::all();
        $polres = Polres::all();

        for ($i = 0; $i < 30; $i++) {
            \DB::transaction(function () use ($faker, $poldas, $polres) {
                $candidate = new Candidate([
                    "name"                        => $faker->name,
                    "type"                        => Arr::random(array_keys(config('static.candidate_type'))),
                    "email"                       => $faker->unique()->email,
                    "polda_id"                    => $poldas->random()->id,
                    "polres_id"                   => $polres->random()->id,
                    "height"                      => rand(170, 190),
                    "weight"                      => rand(50, 90),
                    "avatar"                      => UploadedFile::fake()->image(Str::random(45) . '.jpg'),
                    "gender"                      => Arr::random(['male', 'female']),
                    "birth_place"                 => $faker->country,
                    "religion"                    => Arr::random(array_keys(config('static.religion'))),
                    "address"                     => $faker->address,
                    "birth_date"                  => $faker->date,
                    "ethnic"                      => Arr::random(['Suku Jawa', 'Suku Sunda', 'Suku Batak', 'Suku Bali']),
                    "city"                        => $faker->city,
                    "phone"                       => $faker->numerify('08##########'),
                    "identity_card"               => $faker->numerify('################'),
                    "identity_card_creation_date" => $faker->date,
                ]);
                $candidate->createRegistrationNumber();
                $candidate->createTestNumber();
                $candidate->saveQuietly();

                Education::create([
                    "candidate_id"                      => $candidate->id,
                    "primary_school_name"               => $faker->company,
                    "primary_school_graduated_year"     => $faker->year,
                    "primary_school_city"               => $faker->city,
                    "primary_school_province"           => $faker->city,
                    "junior_high_school_name"           => $faker->company,
                    "junior_high_school_graduated_year" => $faker->year,
                    "junior_high_school_city"           => $faker->city,
                    "junior_high_school_province"       => $faker->city,
                    "senior_high_school_name"           => $faker->company,
                    "senior_high_school_graduated_year" => $faker->year,
                    "senior_high_school_city"           => $faker->city,
                    "senior_high_school_province"       => $faker->city,
                    "senior_high_school_department"     => $faker->country,
                    "senior_high_school_certificate"    => Arr::random(array_keys(config('static.senior_high_school_certificate'))),
                    "senior_high_school_exam_score"     => rand(40, 90),
                    "senior_high_school_report"         => rand(60, 80),
                ]);

                $hasMother   = rand(1, 10) <= 5;
                $hasGuidance = rand(1, 10) <= 5;

                $this->createCandidateParent($faker, $candidate, CandidateParent::TYPE_FATHER, $faker->firstNameMale);

                if ($hasMother) {
                    $this->createCandidateParent($faker, $candidate, CandidateParent::TYPE_MOTHER, $faker->firstNameFemale);
                }

                if ($hasGuidance) {
                    $this->createCandidateParent($faker, $candidate, CandidateParent::TYPE_GUIDANCE, $faker->name);
                }
            });
        }
    }

    private function createCandidateParent(Generator $faker, Candidate $biodata, $type, $parentName)
    {
        CandidateParent::create([
            "candidate_id"   => $biodata->id,
            "name"           => $parentName,
            "parent_type"    => $type,
            "religion"       => Arr::random(array_keys(config('static.religion'))),
            "age"            => rand(40, 70),
            "phone"          => $faker->numerify('08##########'),
            "address"        => $faker->address,
            "landline_phone" => $faker->numerify('08##########'),
            "work_group"     => Arr::random(['Wiraswasta', 'Swasta', 'Pns', 'Tidak bekerja']),
            "type_of_work"   => Arr::random(['Pedagang', 'Guru', 'Dokter', 'Dosen']),
        ]);
    }
}
