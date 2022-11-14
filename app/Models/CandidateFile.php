<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CandidateFile extends Model
{
    use HasFactory;

    protected $table = 'candidate_file';

    public const STATUS_ACCEPTED = 'diterima';
    public const STATUS_DECLINED = 'ditolak';

    protected $fillable = [
        'candidate_id', 'filename', 'status', 'description',
    ];

    /**
     * @param UploadedFile|string $value
     * @return void
     */
    public function setFilenameAttribute($file)
    {
        if (!$file) {
            return;
        }

        $name = $file->hashName();

        if (Storage::putFileAs('public/images/candidates', $file, $name)) {
            $this->attributes['filename'] = $name;
        }
    }

    public function getFilenameUrlAttribute()
    {
        return asset("storage/images/candidates/{$this->filename}");
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
