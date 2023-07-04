<?php

namespace App\Http\Requests\admin;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SiteContentRequest extends FormRequest
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
        return [
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'youtube' => 'nullable|string',
            'whatsapp' => 'nullable|string',
            'telegram' => 'nullable|string',
            'instgram' => 'nullable|string',
            'snapchat' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'logo' => 'file|image|nullable',
            'favicon' => 'file|image|nullable',
            'footer_quot' => 'required|string',
            'phone_number' => 'required|string',
            'about' => 'string|required',
            'email' => 'string|required|email',
            'address' => 'string',
            'contact_content' => 'string|required',
            'terms_conditions' => 'string|required',
        ];
    }
}
