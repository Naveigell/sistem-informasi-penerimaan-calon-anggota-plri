<?php

namespace App\Http\Requests\Candidate;

use App\Models\Polda;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $poldaIds = Polda::pluck('id')->join(',');

        return [
            // CANDIDATE VALIDATION RULE
            "polda_id"                    => "required|string|in:" . $poldaIds,
            "name"                        => "required|string|max:255",
            "height"                      => "required|integer|min:1|max:300", // in cm
            "weight"                      => "required|integer|min:1|max:300", // in kg
            "avatar"                      => "required|image|min:20|max:" . (1024 * 5), // 5 MB
            "gender"                      => "required|string|in:" . join(',', array_keys(config('static.gender'))),
            "birth_place"                 => "required|string|min:3|max:255",
            "religion"                    => "required|string|in:" . join(',', array_keys(config('static.religion'))),
            "address"                     => "required|string|min:6|max:255",
            "birth_date"                  => "required|date|before:" . now()->subYears(8)->toDateString(),
            "ethnic"                      => "required|string|min:3|max:255",
            "city"                        => "required|string|min:3|max:255",
            "phone"                       => "required|string|regex:/(08)[0-9]{9}/",
            "identity_card"               => "required|string|min:1|max:255",
            "identity_card_creation_date" => "required|date",

            // EDUCATION VALIDATION RULE
            "primary_school_name"               => "required|string|min:1|max:255",
            "primary_school_graduated_year"     => "required|integer|min_digits:4|max_digits:4",
            "primary_school_city"               => "required|string|min:1|max:255",
            "primary_school_province"           => "required|string|min:1|max:255",

            "junior_high_school_name"           => "required|string|min:1|max:255",
            "junior_high_school_graduated_year" => "required|integer|min_digits:4|max_digits:4",
            "junior_high_school_city"           => "required|string|min:1|max:255",
            "junior_high_school_province"       => "required|string|min:1|max:255",

            "senior_high_school_name"           => "required|string|min:1|max:255",
            "senior_high_school_graduated_year" => "required|integer|min_digits:4|max_digits:4",
            "senior_high_school_city"           => "required|string|min:1|max:255",
            "senior_high_school_province"       => "required|string|min:1|max:255",

            "senior_high_school_certificate"    => "required|string|in:" . join(',', array_keys(config('static.senior_high_school_certificate'))),
            "senior_high_school_exam_score"     => "required|integer|min:1|max:1000",
            "senior_high_school_report"         => "required|integer|min:1|max:1000",
            "senior_high_school_department"     => "required|string|min:3|max:255",

            // PARENT VALIDATION RULE
            ...$this->constructRuleForParent('father'),
            ...$this->constructRuleForParent('mother'),
            ...$this->constructRuleForParent('guidance', true),
        ];
    }

    private function constructRuleForParent($parentType, $nullable = false)
    {
        return [
            "{$parentType}.name"           => ($nullable ? 'nullable' : $this->constructRequiredRule('name', $parentType)) ."|string|min:1|max:255",
            "{$parentType}.religion"       => ($nullable ? 'nullable' : $this->constructRequiredRule('religion', $parentType)) . "|string|in:" . join(',', array_keys(config('static.religion'))),
            "{$parentType}.age"            => ($nullable ? 'nullable' : $this->constructRequiredRule('age', $parentType)) ."|integer|min:10|max:200",
            "{$parentType}.phone"          => ($nullable ? 'nullable' : $this->constructRequiredRule('phone', $parentType)) ."|string|regex:/(08)[0-9]{9}/",
            "{$parentType}.address"        => ($nullable ? 'nullable' : $this->constructRequiredRule('address', $parentType)) ."|string|min:1|max:255",
            "{$parentType}.landline_phone" => "nullable|string|regex:/(08)[0-9]{9}/",
            "{$parentType}.work_group"     => "nullable|string|min:1|max:255",
            "{$parentType}.type_of_work"   => "nullable|string|min:1|max:255",
            "{$parentType}.grade"          => "nullable|string|min:1|max:255",
            "{$parentType}.position"       => "nullable|string|min:1|max:255",
            "{$parentType}.office_name"    => "nullable|string|min:1|max:255",
            "{$parentType}.office_address" => "nullable|string|min:1|max:255",
            "{$parentType}.office_phone"   => "nullable|string|min:1|max:255",
        ];
    }

    private function constructRequiredRule($without, $parentType)
    {
        return $this->noneHasFilled($parentType) ? "required" : "required_with:" . collect([
            'name', 'religion', 'age', 'phone', 'address',
        ])->filter(function ($item) use ($without) {
            return $item != $without;
        })->map(function ($item) use ($parentType) {
            return "{$parentType}.$item";
        })->join(',');
    }

    private function noneHasFilled($parentType)
    {
        foreach (["{$parentType}.name", "{$parentType}.religion", "{$parentType}.age", "{$parentType}.phone", "{$parentType}.address"] as $item) {
            if ($this->filled($item)) {
                return false;
            }
        }

        return true;
    }
}
