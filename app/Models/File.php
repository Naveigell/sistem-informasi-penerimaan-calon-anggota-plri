<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'max_size', 'description',
    ];

    public function candidateFile()
    {
        return $this->hasMany(CandidateFile::class);
    }
}
