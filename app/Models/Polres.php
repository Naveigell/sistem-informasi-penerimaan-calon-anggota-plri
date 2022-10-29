<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polres extends Model
{
    use HasFactory;

    protected $fillable = ['polda_id', 'name', 'number'];
}
