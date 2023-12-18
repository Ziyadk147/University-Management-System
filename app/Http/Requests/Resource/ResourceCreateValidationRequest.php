<?php

namespace App\Http\Requests\Resource;

use Illuminate\Foundation\Http\FormRequest;

class ResourceCreateValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:resources,name,NULL,id,deleted_at,NULL',
            'path' => 'required',
            'course' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Name already Exists',
            'path.required' => 'File Upload is Required'
        ];
    }
}
