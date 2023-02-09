<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreUpdateRequest extends FormRequest
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
            'title' => 'required',
            'synopsis' => 'required',
            'released' => 'required',
            'banner' => 'required|file|image',
            'status' => 'required',
            'type' => 'required',
            'genres' => 'required',
            'author_id' => 'required',
            'studio_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Campo obrigatório.',
            'banner.image' => 'Este campo deve ser uma imagem (jpg, jpeg, png, bmp, gif, svg ou webp).',
        ];
    }
}
