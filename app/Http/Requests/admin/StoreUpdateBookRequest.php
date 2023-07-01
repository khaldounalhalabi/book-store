<?php

namespace App\Http\Requests\admin;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (auth()->user()->hasRole('super-admin') || auth()->user()->hasRole('admin')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        if (request()->method() == 'POST') {
            return [
                'name' => 'required|string|min:3|max:255',
                'author_name' => 'required|string|min:3|max:255',
                'publisher' => 'required|string|min:3|max:255',
                'small_description' => 'required|string|min:3',
                'long_description' => 'required|string|min:3',
                'face_image' => 'required|file|image',
                'publish_date' => 'date|date_format:Y-m-d|required',
                'price' => 'required|numeric',
                'quantity' => 'numeric|required',
            ];
        }

        return [
            'name' => 'string|min:3|max:255',
            'author_name' => 'string|min:3|max:255',
            'publisher' => 'string|min:3|max:255',
            'small_description' => 'string|min:3',
            'long_description' => 'string|min:3',
            'face_image' => 'file|image|nullable',
            'publish_date' => 'date|date_format:Y-m-d',
            'price' => 'numeric',
            'quantity' => 'numeric|nullable',
        ];
    }
}
