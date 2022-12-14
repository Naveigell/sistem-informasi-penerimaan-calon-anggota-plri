<?php

return [
    "gender" => [
        "male"   => "Laki - laki",
        "female" => "Perempuan",
    ],
    "religion" => [
        "islam"      => "Islam",
        "protestant" => "Kristen Protestan",
        "catholic"   => "Kristen Katolik",
        "conficius"  => "Konghucu",
        "buddha"     => "Budha",
        "hindu"      => "Hindu",
    ],
    "senior_high_school_certificate" => [
        "sma" => "SMA",
        "smk" => "SMK",
        "ma"  => "MA",
    ],
    "parent_types" => [
        "father"   => "Bapak Kandung",
        "mother"   => "Ibu Kandung",
        "guidance" => "Wali / Bapak Tiri / Ibu Tiri",
    ],
    "candidate_type" => [
        \App\Models\Candidate::REGISTRATION_AKPOL   => 1,
        \App\Models\Candidate::REGISTRATION_SIPSS   => 2,
        \App\Models\Candidate::REGISTRATION_BINTARA => 3,
        \App\Models\Candidate::REGISTRATION_TAMTAMA => 4,
    ],
    "candidate_type_enums" => [
        \App\Models\Candidate::REGISTRATION_AKPOL   => \App\Models\Candidate::REGISTRATION_AKPOL,
        \App\Models\Candidate::REGISTRATION_SIPSS   => \App\Models\Candidate::REGISTRATION_SIPSS,
        \App\Models\Candidate::REGISTRATION_BINTARA => \App\Models\Candidate::REGISTRATION_BINTARA,
        \App\Models\Candidate::REGISTRATION_TAMTAMA => \App\Models\Candidate::REGISTRATION_TAMTAMA,
    ],
];
