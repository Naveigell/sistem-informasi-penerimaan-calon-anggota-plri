<?php

namespace Database\Seeders;

use App\Models\Biodata;
use App\Models\CandidateParent;
use App\Models\Education;
use App\Models\Polda;
use App\Models\User;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

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
        $poldas = Polda::all();

        for ($i = 0; $i < 30; $i++) {
            \DB::transaction(function () use ($faker, $poldas) {
                $user = User::create([
                    "name" => $faker->name,
                    "email" => $faker->unique()->email,
                    "password" => 123456,
                ]);

                $biodata = Biodata::create([
                    "name"                        => $faker->name,
                    "user_id"                     => $user->id,
                    "polda_id"                    => $poldas->random()->id,
                    "height"                      => rand(170, 190),
                    "weight"                      => rand(50, 90),
                    "gender"                      => Arr::random(['male', 'female']),
                    "birth_place"                 => $faker->country,
                    "religion"                    => Arr::random(['hindu', 'protestan', 'islam', 'buddha', 'katolik', 'konghucu']),
                    "address"                     => $faker->address,
                    "birth_date"                  => $faker->date,
                    "ethnic"                      => Arr::random(['Suku Jawa', 'Suku Sunda', 'Suku Batak', 'Suku Bali']),
                    "city"                        => $faker->city,
                    "phone"                       => $faker->numerify('08##########'),
                    "identity_card"               => $faker->numerify('################'),
                    "identity_card_creation_date" => $faker->date,
                ]);

                Education::create([
                    "biodata_id"                        => $biodata->id,
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
                    "senior_high_school_certificate"    => Arr::random(['SMA', 'MA', 'SMK']),
                    "senior_high_school_exam_score"     => rand(40, 90),
                    "senior_high_school_report"         => rand(60, 80),
                ]);

                $hasMother   = rand(1, 10) <= 5;
                $hasGuidance = rand(1, 10) <= 5;

                $this->createCandidateParent($faker, $biodata, CandidateParent::TYPE_FATHER, $faker->firstNameMale);

                if ($hasMother) {
                    $this->createCandidateParent($faker, $biodata, CandidateParent::TYPE_MOTHER, $faker->firstNameFemale);
                }

                if ($hasGuidance) {
                    $this->createCandidateParent($faker, $biodata, CandidateParent::TYPE_GUIDANCE, $faker->name);
                }
            });
        }
    }

    private function createCandidateParent(Generator $faker, Biodata $biodata, $type, $parentName)
    {
        CandidateParent::create([
            "biodata_id"     => $biodata->id,
            "name"           => $parentName,
            "parent_type"    => $type,
            "religion"       => Arr::random(['hindu', 'protestan', 'islam', 'buddha', 'katolik', 'konghucu']),
            "age"            => rand(40, 70),
            "phone"          => $faker->numerify('08##########'),
            "address"        => $faker->address,
            "landline_phone" => $faker->numerify('08##########'),
            "work_group"     => Arr::random(['Wiraswasta', 'Swasta', 'Pns', 'Tidak bekerja']),
            "type_of_work"   => Arr::random(['Pedagang', 'Guru', 'Dokter', 'Dosen']),
        ]);
    }
}
