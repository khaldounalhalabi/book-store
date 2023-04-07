<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
     * @return array<string,array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'string|required|email|exists:users,email' ,
            'password' => 'required|string|min:8'
        ];
    }
}
