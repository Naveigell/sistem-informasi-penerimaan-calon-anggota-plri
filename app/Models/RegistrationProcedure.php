<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class RegistrationProcedure extends Model
{
    use HasFactory;

    protected $fillable = ['filename'];

    public function setFilenameAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['filename'] = $value;
        } elseif ($value instanceof UploadedFile) {
            $filename = $value->hashName();

            Storage::putFileAs('public/files/pdf/registration-procedures', $value, $filename);

            $this->attributes['filename'] = $filename;
        }
    }

    public function getFilenameUrlAttribute()
    {
        return asset('storage/files/pdf/registration-procedures/' . $this->filename);
    }
}
