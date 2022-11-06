<?php

namespace App\Http\Requests\Candidate;

use App\Models\File;
use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{
    /**
     * @var File
     */
    private $file;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $this->file = $this->route('file');

        return [
            "file_{$this->file->id}" => "required|file|mimes:jpg,png,jpeg,pdf|max:" . ($this->file->max_size * 1024), // max size per MB
        ];
    }

    public function attributes()
    {
        return [
            "file_{$this->file->id}" => "File"
        ];
    }
}
