<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|unique:users,email',
            'name' => 'required',
            'role' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif'
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'This User already Exists'
        ];
    }
}
