<?php

namespace App\Http\Requests\Candidate;

use App\Models\Schedule;
use Illuminate\Foundation\Http\FormRequest;

class SelectionResultRequest extends FormRequest
{
    /**
     * @var Schedule
     */
    private $schedule;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $this->schedule = $this->route('schedule');

        return [
            "file_{$this->schedule->id}" => "required|file|mimes:xlsx|max:" . (5 * 1024),
        ];
    }

    public function attributes()
    {
        return [
            "file_{$this->schedule->id}" => "File"
        ];
    }

    public function getUploadedFile()
    {
        return $this->file("file_{$this->schedule->id}");
    }
}
