<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
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
            "email"    => "required|email|string|min:4|max:25",
            "password" => "required|string|min:3|max:25",
        ];
    }

    public function validateUser()
    {
        $admin = User::where('email', $this->email)->first();

        if (!$admin) {
            $this->throwAuthError('email', 'Akun tidak ditemukan');
        }

        if (!Hash::check($this->password, $admin->password)) {
            $this->throwAuthError('password', 'Password salah');
        }

        auth('admin')->login($admin);
    }

    private function throwAuthError($key, $message)
    {
        $this->validator->errors()->add($key, $message);

        throw (new ValidationException($this->validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
