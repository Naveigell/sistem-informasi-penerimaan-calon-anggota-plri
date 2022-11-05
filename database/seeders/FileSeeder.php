<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files = [
            [
                "name" => "Kartu Tanda Penduduk (KTP)",
                "max_size" => 2,
                "description" => null,
            ],
            [
                "name" => "Kartu Keluarga (KK)",
                "max_size" => 2,
                "description" => null,
            ],
            [
                "name" => "Ijazah Pendidikan Umum Terakhir",
                "max_size" => 2,
                "description" => "sesuai persyaratan jenis diktuk yang dipilih",
            ],
            [
                "name" => "Transkrip nilai",
                "max_size" => 2,
                "description" => "bagi peserta lulusan sekolah tinggi/akademi/perguruan tinggi",
            ],
            [
                "name" => "Surat Keterangan Catatan Kepolisian",
                "max_size" => 2,
                "description" => "yang dikeluarkan oleh polres setempat",
            ],
            [
                "name" => "Photo Berwarna 4x6",
                "max_size" => 2,
                "description" => "(Background Merah, Kemeja Putih) type file : .jpg, .jpeg",
            ],
        ];

        foreach ($files as $file) {
            File::create($file);
        }
    }
}
