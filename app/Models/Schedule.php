<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'name', 'date_start', 'date_end', 'location', 'filename', 'grade',
    ];

    protected $casts = [
        "date_start" => "datetime",
        "date_end"   => "datetime",
    ];

    public const GRADE_CENTRAL = 'central';
    public const GRADE_REGION  = 'region';

    public const GRADES = [
        "central" => "Pusat",
        "region"  => "Daerah",
    ];

    public function setFilenameAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['filename'] = $value;
        } elseif ($value instanceof UploadedFile) {
            $filename = $value->hashName();

            Storage::putFileAs('public/files/pdf/schedules', $value, $filename);

            $this->attributes['filename'] = $filename;
        }
    }

    public function getFilenameUrlAttribute()
    {
        return asset('storage/files/pdf/schedules/' . $this->filename);
    }

    public function selectionResults()
    {
        return $this->hasMany(SelectionResult::class);
    }

    public function selectionResult()
    {
        return $this->hasOne(SelectionResult::class);
    }
}
