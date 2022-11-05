<?php

namespace App\Http\Requests\Admin\Master;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name"        => "required|string|min:3|max:255",
            "max_size"    => "required|int|min:1|max:10",
            "description" => "nullable|string|min:2|max:255",
        ];
    }
}
