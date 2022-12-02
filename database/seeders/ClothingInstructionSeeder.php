<?php

namespace Database\Seeders;

use App\Models\ClothingInstruction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Str;

class ClothingInstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClothingInstruction::create([
            "filename" => UploadedFile::fake()->create(Str::random(40) . '.pdf'),
        ]);
    }
}
