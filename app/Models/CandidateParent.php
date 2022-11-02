<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateParent extends Model
{
    use HasFactory;

    const TYPE_FATHER   = 'father';
    const TYPE_MOTHER   = 'mother';
    const TYPE_GUIDANCE = 'guidance';

    const PARENT_TYPES  = [
        "father"   => "Ayah Kandung",
        "mother"   => "Ibu Kandung",
        "guidance" => "Wali / Bapak Tiri / Ibu Tiri",
    ];

    protected $fillable = [
        'biodata_id', 'name', 'parent_type', 'religion', 'age', 'phone', 'address', 'landline_phone', 'work_group',
        'type_of_work', 'grade', 'position', 'office_name', 'office_address', 'office_phone',
    ];

    public function getParentTypeFormattedAttribute()
    {
        return self::PARENT_TYPES[$this->parent_type];
    }
}
