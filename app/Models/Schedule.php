<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'name', 'date_start', 'date_end', 'location',
    ];

    protected $casts = [
        "date_start" => "datetime",
        "date_end"   => "datetime",
    ];
}
