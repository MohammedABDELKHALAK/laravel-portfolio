<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'linkedin' => [
                'nullable', 
                'url', 
                'regex:/^https?:\/\/(www\.)?linkedin\.com\/in\/[a-zA-Z0-9_-]+\/?$/'
            ],
            'github' => [
                'nullable', 
                'url', 
                'regex:/^https?:\/\/(www\.)?github\.com\/[a-zA-Z0-9_-]+$/'
            ],
            'twitter' => [
                'nullable', 
                'url', 
                'regex:/^https?:\/\/(www\.)?twitter\.com\/[a-zA-Z0-9_]+$/'
            ],
            'bio' => 'nullable|min:5'

        //     'linkedin' =>'nullable|url',
        //    'github' => 'nullable|url',
        //     'twitter' => 'nullable|url',
        //     'bio' => 'nullable|min:5'

        ];
    }
}
