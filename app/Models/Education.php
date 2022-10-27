<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'biodata_id', 'primary_school_name', 'primary_school_graduated_year', 'primary_school_city', 'primary_school_province',
        'junior_high_school_name', 'junior_high_school_graduated_year', 'junior_high_school_city', 'junior_high_school_province',
        'senior_high_school_name', 'senior_high_school_graduated_year', 'senior_high_school_city', 'senior_high_school_province',
        'senior_high_school_department', 'senior_high_school_certificate', 'senior_high_school_exam_score', 'senior_high_school_report'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
