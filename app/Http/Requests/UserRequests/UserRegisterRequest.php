<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use JetBrains\PhpStorm\ArrayShape;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|max:255|min:3|string',
            'last_name' => 'required|max:255|min:3|string',
            'phone_number' => 'required|string',
            'email' => 'required|email|string',
            'password' => ['required', 'string', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()],
            'street' => 'required|string' ,
            'house_number' => 'string|required' ,
            'door_number' => 'string|required' ,
            'post_code' => 'string|required' ,
            'city' => 'string|required' ,
            'country' => 'string|required' ,
        ];
    }
}



