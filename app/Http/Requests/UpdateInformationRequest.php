<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInformationRequest extends FormRequest
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
            "photo" => ['image'],
            "city"   => ['required' , 'string'],
            "address"   => ['required' , 'string'],
            "date_barth"   => ['required' , 'date'],
            "age"   => ['required' , 'between:1,110'],
            "gender"  => ['required'],
        ];
    }
}
