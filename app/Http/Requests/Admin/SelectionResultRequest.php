<?php

namespace App\Http\Requests\Admin;

use App\Models\Schedule;
use Illuminate\Foundation\Http\FormRequest;

class SelectionResultRequest extends FormRequest
{
    /**
     * @var Schedule
     */
    private $schedules;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $this->schedules = Schedule::all();

        return [
            "results"         => "required|array|min:" . $this->schedules->count() . "|max:" . $this->schedules->count(),
            "results.*.value" => "required|integer|min:0|max:100",
        ];
    }

    protected function passedValidation()
    {
        $results = $this->input('results');

        foreach ($this->schedules as $index => $schedule) {
            $results[$index]['schedule_id'] = $schedule->id;
        }

        $this->merge(["results" => $results]);
    }
}
