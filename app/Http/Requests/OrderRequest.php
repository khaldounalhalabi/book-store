<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
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
            'phone_number' => ['nullable', 'string', Rule::requiredIf(!auth()->user())],
            'country_code' => ['nullable', 'string', Rule::requiredIf(!auth()->user())],
            'street' => ['nullable', 'string', Rule::requiredIf(!auth()->user())],
            'house_number' => ['nullable', 'string', Rule::requiredIf(!auth()->user())],
            'door_number' => ['nullable', 'string', Rule::requiredIf(!auth()->user())],
            'post_code' => ['nullable', 'string', Rule::requiredIf(!auth()->user())],
            'city' => ['nullable', 'string', Rule::requiredIf(!auth()->user())],
            'country' => ['nullable', 'string', Rule::requiredIf(!auth()->user())],
        ];
    }
}
