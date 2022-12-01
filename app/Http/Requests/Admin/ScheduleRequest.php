<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name"       => "required|string|min:3|max:255",
            "date_start" => 'required|date_format:Y-m-d\TH:i|before:date_end',
            "date_end"   => 'required|date_format:Y-m-d\TH:i|after:date_start',
            "location"   => "required|string|min:4|max:255",
            "type"       => "required|string|in:" . join(',', array_keys(config('static.candidate_type'))),
            "filename"   => 'required|mimes:pdf|max:' . (1024 * 8), // 8MB
        ];
    }
}
