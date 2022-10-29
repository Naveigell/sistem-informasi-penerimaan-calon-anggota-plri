<?php

namespace Database\Seeders;

use App\Models\Polda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoldaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $poldas = [
            [
                "name" => "Polda Bali",
                "number" => 22,
            ],
            [
                "name" => "Polda Jatim",
                "number" => 23,
            ],
            [
                "name" => "Polda Jabar",
                "number" => 24,
            ],
            [
                "name" => "Polda Metro",
                "number" => 25,
            ],
        ];

        foreach ($poldas as $polda) {
            Polda::create([
                "name" => $polda['name'],
                "number" => $polda['number'],
            ]);
        }
    }
}
