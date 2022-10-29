<?php

namespace Database\Seeders;

use App\Models\Polda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $polda = Polda::where('number', 22)->first();

        $dataPolres = [
            [
                "name" => "Polresta Denpasar",
                "number" => 2226,
            ],
            [
                "name" => "Polres Buleleng",
                "number" => 2227,
            ],
            [
                "name" => "Polres Tabanan",
                "number" => 2228,
            ],
            [
                "name" => "Polres Gianyar",
                "number" => 2229,
            ],
            [
                "name" => "Polres Bangli",
                "number" => 2230,
            ],
            [
                "name" => "Polres Klungkung",
                "number" => 2231,
            ],
            [
                "name" => "Polres Karangasem",
                "number" => 2232,
            ],
            [
                "name" => "Polres Jembrana",
                "number" => 2233,
            ],
            [
                "name" => "Polres Badung",
                "number" => 2234,
            ],
        ];

        $polda->polres()->createMany($dataPolres);
    }
}
