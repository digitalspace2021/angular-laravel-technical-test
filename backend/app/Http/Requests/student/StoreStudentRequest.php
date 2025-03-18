<?php

namespace App\Http\Requests\student;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            "name" => "required|string|min:5",
            "last_name" => "required|string|min:5",
            "email" => "required|string|min:5|unique:students,email",
            "age" => "required|numeric|min:18",
            "identification" => "required|string|min:5|max:12|unique:students,identification",
        ];
    }
}
