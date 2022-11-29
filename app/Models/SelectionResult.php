<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectionResult extends Model
{
    use HasFactory;

    protected $fillable = ['schedule_id', 'candidate_id', 'filename', 'value'];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
