<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class MessageRequest extends FormRequest
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
     * @return array<string, Rule|array|string>
     */
    #[ArrayShape(['email' => 'string', 'name' => 'string', 'body' => 'string'])]
    public function rules(): array
    {
        return [
            'email' => 'string|required|email',
            'name' => 'string|required',
            'body' => 'required|string',
        ];
    }
}
