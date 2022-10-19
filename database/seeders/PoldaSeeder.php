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
            'Polda Bali', 'Polda Jatim', 'Polda Jabar', 'Polda Metro',
        ];

        foreach ($poldas as $polda) {
            Polda::create([
                "name" => $polda,
            ]);
        }
    }
}
