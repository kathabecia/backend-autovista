<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
            'price' => 'required|integer',
            'transmission' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,bmp,png|max:2048',
            'user_id' => 'required|integer',
            'model_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'dealer_id' => 'required|integer',
        ];
    }
}
