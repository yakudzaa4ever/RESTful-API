<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id', 
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Sarlavha kiritiw wart.',
            'content.required' => 'Kontent bow boliwi mumkin emas.',
            'user_id.required' => 'User ID talab qilinadi.',
            'user_id.exists' => 'Uwbu User ID mavjud emas.',
        ];
    }
}
