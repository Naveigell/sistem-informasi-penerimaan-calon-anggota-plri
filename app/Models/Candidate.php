<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'polda_id', 'name', 'height', 'weight', 'avatar', 'gender', 'birth_place', 'religion', 'address',
        'birth_date', 'ethnic', 'city', 'phone', 'identity_card', 'identity_card_creation_date',
    ];

    const REGISTRATION_AKPOL   = 'akpol';
    const REGISTRATION_SIPSS   = 'sipss';
    const REGISTRATION_BINTARA = 'bintara';
    const REGISTRATION_TAMTAMA = 'tamtama';

    /**
     * @param string|UploadedFile $file
     * @return void
     */
    public function setAvatarAttribute($file)
    {
        if (is_string($file)) {
            $this->attributes['avatar'] = $file;
        } else if ($file instanceof UploadedFile) {
            $name = date('dmYHis') . uniqid() . '.' . $file->getClientOriginalExtension();

            Storage::putFileAs('public/images/candidates', $file, $name);

            $this->attributes['avatar'] = $name;
        }
    }

    public function candidateParents()
    {
        return $this->hasMany(CandidateParent::class);
    }
}
