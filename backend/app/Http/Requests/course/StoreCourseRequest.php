<?php

namespace App\Http\Requests\course;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCourseRequest extends FormRequest
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
        // dd($this->date_start);
        return [
            "name"=>"string|required|min:4",
            "schedules"=>"array|required",
            "schedules.monday"=>"array|required",
            "schedules.monday.start"=>"string|required",
            "schedules.monday.end"=>"string|required",
            "schedules.tuesday"=>"array|required",
            "schedules.tuesday.start"=>"string|required",
            "schedules.tuesday.end"=>"string|required",
            "schedules.wednesday"=>"array|required",
            "schedules.wednesday.start"=>"string|required",
            "schedules.wednesday.end"=>"string|required",
            "schedules.thursday"=>"array|required",
            "schedules.thursday.start"=>"string|required",
            "schedules.thursday.end"=>"string|required",
            "schedules.friday"=>"array|required",
            "schedules.friday.start"=>"string|required",
            "schedules.friday.end"=>"string|required",
            "schedules.saturday"=>"array|required",
            "schedules.saturday.start"=>"string|required",
            "schedules.saturday.end"=>"string|required",
            "schedules.sunday"=>"array|required",
            "schedules.sunday.start"=>"string|required",
            "schedules.sunday.end"=>"string|required",
            "date_start"=>["required", Rule::date()->format('Y-m-d'),],
            "date_end"=>["required", Rule::date()->format('Y-m-d'),],
            "type"=>"string|required|in:presential,virtual"
        ];
    }
}
