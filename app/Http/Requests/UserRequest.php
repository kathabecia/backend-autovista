<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if (request()->routeIs('user.login')) {
            return [
                'email' => 'required|string|email|max:255',
                'password' => 'required|min:8',
            ];
        } else if (request()->routeIs('user.store')) { //user register and user store/adding
            return [
                'lastname' => 'required|string|min:5',
                'firstname' => 'required|string|min:5',
                'role'      => 'nullable|string',
                'email' => 'required|string|email|unique:App\Models\User|max:255',
                'password' => 'required|min:8|confirmed',
                'image' => 'nullable|image|mimes:jpg,bmp,png|max:2048'
            ];
        } else if (request()->routeIs('user.update')) {
            return [
                'lastname' => 'required|string|min:5',
                'firstname' => 'required|string|min:5',
                'role'     => 'required|string',
                'email' => 'required|string|email|max:255',
                'password' => 'required|min:8|confirmed',
                'image' => 'nullable|image|mimes:jpg,bmp,png|max:2048'
            ];
        }
    }
}
