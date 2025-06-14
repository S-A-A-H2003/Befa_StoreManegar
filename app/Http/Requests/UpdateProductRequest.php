<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            "name" => ['required' , 'string' , 'max:30'] ,
            "picture" => ['required' , 'image'] ,
            "price" => ['required' , 'integer'] ,
            "price_before" => ['required' , 'integer'],
            "discription" => ['required' , 'string'] ,
            "inventory" => ['required' , 'integer'] ,
            "options" => ['nullable' , 'json']
        ];
    }
}
