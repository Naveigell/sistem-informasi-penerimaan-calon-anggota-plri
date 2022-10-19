<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'polda_id', 'name', 'height', 'weight', 'gender', 'birth_place', 'religion', 'address',
        'birth_date', 'ethnic', 'city', 'phone', 'identity_card', 'identity_card_creation_date',
    ];
}
