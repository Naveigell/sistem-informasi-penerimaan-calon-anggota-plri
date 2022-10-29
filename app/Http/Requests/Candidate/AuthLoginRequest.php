<?php

namespace App\Http\Requests\Candidate;

use App\Models\Candidate;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthLoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "registration_number" => "required|string|min:3|max:25",
            "password"            => "required|string|min:3|max:25",
        ];
    }

    protected function passedValidation()
    {
        $candidate = Candidate::where('registration_number', $this->registration_number)->first();

        if (!$candidate) {
            $this->throwAuthError('registration_number', 'Akun tidak ditemukan');
        }

        if (!Hash::check($this->password, $candidate->password)) {
            $this->throwAuthError('password', 'Password salah');
        }

        auth('candidate')->login($candidate);
    }

    private function throwAuthError($key, $message)
    {
        $this->validator->errors()->add($key, $message);

        throw (new ValidationException($this->validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
