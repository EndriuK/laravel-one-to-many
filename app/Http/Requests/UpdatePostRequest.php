<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'title' => 'required|unique:posts|max:150',
            'title' => ['required', Rule::unique('posts')->ignore($this->route('post')), 'max:150'],
            'slug' => ['max:255'],
            'cover_image' => ['nullable', 'image', 'max:4084'],
            'content' => ['nullable'],
            'category_id' => ['nullable', 'exists:categories,id'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.unique' => 'Il titolo deve essere unico',
            'title.max' => 'Il titolo deve avere massimo :max caratteri',
            'slug.max' => 'Il link slug deve avere massimo :max caratteri',
            'cover_image.image' => 'L\'immagine deve essere un file immagine',
            'cover_image.max' => 'L\'immagine deve avere massimo: 4084 kb',
            'category_id.exists' => 'La categoria selezionata non esiste',
        ];
    }
}
