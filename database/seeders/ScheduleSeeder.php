<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 6; $i++) {
            $dateStart = now()->addDays(rand(20, 60))->addHours(rand(20, 40))->addMinutes(rand(20 , 40));

            Schedule::create([
                "type"       => Arr::random(array_keys(config('static.candidate_type'))),
                "name"       => Arr::random(["RIKMIN", "RIKKES"]) . ' ' . Arr::random(["TAHAP AWAL", "TAHAP " . rand(1, 4)]),
                "date_start" => $dateStart->toDateTimeString(),
                "date_end"   => $dateStart->addDays(rand(2, 4))->addHours(rand(20, 40))->addMinutes(rand(20 , 40))->toDateTimeString(),
                "location"   => $faker->address,
                "filename"   => UploadedFile::fake()->create(Str::random(40) . '.pdf', 45),
            ]);
        }
    }
}
