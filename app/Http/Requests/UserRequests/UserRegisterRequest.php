<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

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
            'first_name' => 'required|max:255|min:3' ,
            'last_name' => 'required|max:255|min:3' ,
            'phone_number' => 'required|string' ,
            'email' => 'required|email|string' ,
            'password' => 'min:8|required|confirmed|max:255' ,
        ];
    }
}
