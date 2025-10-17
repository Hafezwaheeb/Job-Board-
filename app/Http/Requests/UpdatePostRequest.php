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
            'title' => "bail|required|min:5|max:255|unique:post,title,{$this->input('id')}",
            'content' => 'bail|required|min:10',
            'author' => 'bail|required|min:2|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.min' => 'The title must be at least :min characters.',
            'title.max' => 'The title may not be greater than :max characters.',
            'title.unique' => 'The title has already been taken.',
            'content.required' => 'The content field is required.',
            'content.min' => 'The content must be at least :min characters.',
            'author.required' => 'The author field is required.',
            'author.min' => 'The author must be at least :min characters.',
            'author.max' => 'The author may not be greater than :max characters.',
        ];
    }
}
