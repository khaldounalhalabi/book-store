<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserDataRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|max:255|min:3|string',
            'last_name' => 'required|max:255|min:3|string',
            'country_code' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email|string',
            'street' => 'required|string',
            'house_number' => 'string|required',
            'door_number' => 'string|required',
            'post_code' => 'string|required',
            'city' => 'string|required',
            'country' => 'string|required',
        ];
    }
}
