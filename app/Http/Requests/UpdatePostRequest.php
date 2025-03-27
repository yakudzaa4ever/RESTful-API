<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }


    public function rules(): array
    {
        return [
            'title' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
            'user_id' => 'required|exists:users,id'
        ];
    }

    public function messages(): array
    {
        return [
            'title.string' => 'Sarlavha matn bolishi kerak.',
            'content.string' => 'Kontent matn bolishi kerak.',
            'user_id.required' => 'User ID talab qilinadi.',
            'user_id.exists' => 'Ushbu User ID mavjud emas.'
        ];
    }
}
