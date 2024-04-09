<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
            'title'=>['required','min:8'],
            'description'=>['required','min:8'],
            'surface'=>['required','min:10','integer'],
            'city'=>['required','min:3'],
            'rooms'=>['required','min:1','integer'],
            'bedrooms'=>['required','min:0','integer'],
            'price'=>['required','min:0','integer'],
            'postal_code'=>['required','min:3','integer'],
            'address'=>['required','min:3'],
            'sold'=>['required','boolean'],
            'floor'=>['required','min:0']
        ];
    }
}
