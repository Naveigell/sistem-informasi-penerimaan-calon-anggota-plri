<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function getFilenameFileAttribute()
    {
        return asset('storage/files/xlsx/selection-results/' . $this->filename);
    }
}
