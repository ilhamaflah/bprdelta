<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisUserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'username' => 'required|string|min:6|alpha_dash|unique:users',
            'no_handphone' => 'required|string|min:10|numeric|unique:users',
            'password' => 'required|string|min:8|alpha_dash|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name' => 'Maxiumum nama yang dapat diinput sebanyak 255 kata.',
            'username' => 'Terdapat username yang sama',
            'no_handphone' => 'Terdapat no handphone yang sama',
            'password' => 'Password harus lebih dari 7 characters'
        ];
    }
}
