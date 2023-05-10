<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class SiteContentRequest extends FormRequest
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
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'youtube' => 'nullable|string',
            'whatsapp' => 'nullable|string',
            'telegram' => 'nullable|string',
            'instgram' => 'nullable|string',
            'snapchat' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'logo' => 'file|image|required',
            'footer_quot' => 'required|string',
            'phone_number' => 'required|string',
            'about' => 'string|required',
            'email' => 'string|required|email',
            'address' => 'string',
            'contact_content' => 'string|required',
        ];
    }
}
