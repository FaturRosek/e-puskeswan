<?php

namespace App\Http\Requests\Users\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->route('user')->id;

        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $userId,
            'role_id' => 'required|exists:roles,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Email already exists',
            'role_id.required' => 'Role is required',
            'role_id.exists' => 'Selected role does not exist',
        ];
    }
}
