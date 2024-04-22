<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FerryRequest extends FormRequest
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
            'nom' => 'bail|required|between:2,30|alpha',
            'longueur' => 'bail|required|numeric|min:0',
            'largeur' => 'bail|required|numeric|min:0',
            'vitesse' => 'bail|required|between:2,30',
            'photo' => 'bail|required|image|mimes:jpeg,jpg,png,gif,webp|max:1000',
        ];
    }
}
