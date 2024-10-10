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
            'title' => ['required',Rule::unique('posts')->ignore($this->post),'max:50'],
            'content' => ['required','min:10'],
            'cover_image' => ['nullable', 'image', 'max:4084'],
            'type_id' => ['nullable', Rule::exists('types', 'id')],
            // 'slug' => 'required|max:255'
            
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Il titolo è obbligatorio.',
            'title.unique' => 'Il titolo deve essere univoco.',
            'title.max' => 'Il titolo non può superare i 50 caratteri.',
            'content.required' => 'Il contenuto è obbligatorio.',
            'content.min' => 'Il contenuto deve contenere almeno 10 caratteri.',
            'cover_image.image' => 'Tipologia file immagine',
            'cover_image.max' => 'Max size 4084 kb',
            'type_id.exists' => 'Tipologia inesistente',
            // 'slug.required' => 'Obbligatorio inserire un titolo per lo slug.',
            // 'slug.max' => 'Lo slug non può superare i 255 caratteri.',
        ];
    }
}
